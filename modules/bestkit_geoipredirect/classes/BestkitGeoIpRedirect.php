<?php
/**
 * 2007-2013 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 *         DISCLAIMER   *
 * *************************************** */
 /* Do not edit or add to this file if you wish to upgrade Prestashop to newer
 * versions in the future.
 * ****************************************************
 *
 *  @author     BEST-KIT.COM (contact@best-kit.com)
 *  @copyright  http://best-kit.com
 *  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

class BestkitGeoIpRedirect extends ObjectModel
{
    public $id;

    public $id_bestkit_geoipredirect;

    public $title;

    public $type = 'ip';

    public $status = 1;

    public $cycle = 0;
    
    public $position = 0;

    public $ip_list;

    public $countries;

    public $cities;

    public $to_page;

    public static $definition = array(
        'table' => 'bestkit_geoipredirect',
        'primary' => 'id_bestkit_geoipredirect',
        'multilang' => FALSE,
        'fields' => array(
            'title' =>     	array('type' => self::TYPE_STRING, 'required' => TRUE, 'size' => 255),
            'type' =>		array('type' => self::TYPE_STRING),
            'status' =>     array('type' => self::TYPE_INT, 'validate' => 'isInt'),
            'cycle' =>      array('type' => self::TYPE_INT, 'validate' => 'isInt'),
            'position' =>	array('type' => self::TYPE_INT, 'validate' => 'isInt'),
            'ip_list' =>	array('type' => self::TYPE_STRING),
            'countries' =>	array('type' => self::TYPE_STRING),
            'cities' =>		array('type' => self::TYPE_STRING),
            'to_page' =>	array('type' => self::TYPE_STRING, 'required' => TRUE),
        ),
    );

	public static function findRedirect($location)
	{
		if (!is_object($location)) {
			return false;
		}

		$items = Db::getInstance()->ExecuteS('
			SELECT * FROM `' . _DB_PREFIX_ . 'bestkit_geoipredirect`
			WHERE `status` = 1
			ORDER BY `position` ASC
		');

		$isFound = false;
		foreach ($items as $item) {
			if ($item['type'] == 'ip') {
				$ip_list = explode(chr(10), $item['ip_list']);
				$ip_list = array_map('trim', $ip_list);
				foreach ($ip_list as $ip) {
					if ($ip == $location->ip) {
						$isFound = $item;
						break(2);
					}

					if (substr_count($ip, '-')) {
						$ipRange = explode('-', $ip);
						$ip2long = ip2long($location->ip);
						if ($ip2long >= ip2long($ipRange[0]) && $ip2long <= ip2long($ipRange[1])) {
							$isFound = $item;
							break(2);
						}
					}
				}
			} else {
				$countries = explode(chr(10), $item['countries']);
				$countries = array_map('strtoupper', $countries);
				$countries = array_map('trim', $countries); 

				$country_name = trim(Tools::strtoupper($location->country_name));
				$country_code = trim(Tools::strtoupper($location->country_code));
				if (in_array($country_name, $countries) || in_array($country_code, $countries)) {
					$isFound = $item;
					break;
				}

				$cities = explode(chr(10), $item['cities']);
				$cities = array_map('strtoupper', $cities);
				$cities = array_map('trim', $cities);

				$city = trim(Tools::strtoupper($location->city));
				if (in_array($city, $cities)) {
					$isFound = $item;
					break;
				}
			}
		}

		return $isFound;
	}
}