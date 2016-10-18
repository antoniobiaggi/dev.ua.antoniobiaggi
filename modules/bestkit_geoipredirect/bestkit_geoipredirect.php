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

if (!defined('_PS_VERSION_')) {
    exit;
}

include_once(_PS_MODULE_DIR_ . 'bestkit_geoipredirect/classes/BestkitGeoIpRedirect.php');

class bestkit_geoipredirect extends Module
{
	protected $_apiService = 'http://api.hostip.info/get_json.php?ip=';

	protected $_hooks = array(
		'displayHeader',
	);

    public function __construct()
    {
        $this->name = 'bestkit_geoipredirect';
        $this->tab = 'front_office_features';
        $this->version = '1.1.0';
        $this->author = 'best-kit.com';
        $this->need_instance = 0;
        $this->module_key = 'e79b5bb73a79d13e8ddf92efff6b11f9';

        parent::__construct();

        $this->displayName = $this->l('Geo Ip Redirect');
        $this->description = $this->l('Geo Ip Redirect');
    }

    public function install()
    {
        $sql = array();
        $sql[] =
            'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'bestkit_geoipredirect` (
              `id_bestkit_geoipredirect` int(10) unsigned NOT NULL auto_increment,
              `title` varchar(255) NOT NULL,
              `type` ENUM("ip", "location"),
              `status` int(1) NOT NULL default "1",
              `cycle` int(1) NOT NULL default "0",
              `position` INT(11) NOT NULL,
              `ip_list` varchar(255) NOT NULL COMMENT "Value for IP type",
              `countries` TEXT NOT NULL COMMENT "Value for LOCATION type",
              `cities` TEXT NOT NULL COMMENT "Value for LOCATION type",
              `to_page` TEXT NOT NULL,
              PRIMARY KEY  (`id_bestkit_geoipredirect`)
            ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

        foreach ($sql as $_sql) {
            Db::getInstance()->Execute($_sql);
        }

        $new_tab = new Tab();
        $new_tab->class_name = 'AdminGeoIpRedirect';
        $new_tab->id_parent = Tab::getCurrentParentId();
        $new_tab->module = $this->name;
        $languages = Language::getLanguages();
        foreach ($languages as $language) {
            $new_tab->name[$language['id_lang']] = 'Geo Ip Redirect';
        }

        $new_tab->add();

        $install = parent::install();
        foreach ($this->_hooks as $hook) {
	        $this->registerHook($hook);
        }

        return $install;
    }

    public function uninstall()
    {
        $sql = array();
        $sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'bestkit_geoipredirect`';

        foreach ($sql as $_sql) {
            Db::getInstance()->Execute($_sql);
        }

        $idTab = Tab::getIdFromClassName('AdminGeoIpRedirect');
        if ($idTab) {
            $tab = new Tab($idTab);
            $tab->delete();
        }

        foreach ($this->_hooks as $hook) {
	        $this->unregisterHook($hook);
        }

        return parent::uninstall();
    }

	public function hookDisplayHeader()
	{
		$ip = Tools::getRemoteAddr();

		$location = self::getGeolocation($ip);
		if ($location == false) {
			$location = Tools::jsonDecode(Tools::file_get_contents($this->_apiService . $ip));
		}

		$redirect = BestkitGeoIpRedirect::findRedirect($location);
		if ($redirect !== false) {
			$to_page = parse_url($redirect['to_page']);
			if (isset($to_page['path']) && $to_page['path'] == $_SERVER['REQUEST_URI']) {
				return false;
			}

			if ($redirect['cycle']) {
				Tools::redirectAdmin($redirect['to_page']);
			}

			$cookie = Context::getContext()->cookie;
			if (!$cookie->hasGeoRedirect) {
				$cookie->hasGeoRedirect = true;
				Tools::redirectAdmin($redirect['to_page']);
			}
		}
	}

	public static function getGeolocation($ip)
	{
		if (!in_array($_SERVER['SERVER_NAME'], array('localhost', '127.0.0.1'))) {
			$base = _PS_MODULE_DIR_ . 'bestkit_geoipredirect/GeoLiteCity.dat';
			if (file_exists($base)) {
				include_once(_PS_GEOIP_DIR_.'geoipcity.inc');
				$gi = geoip_open(realpath($base), GEOIP_STANDARD);
				$record = geoip_record_by_addr($gi, $ip);
				if (is_object($record)) {
					$record->ip = $ip;
					return $record;
				}
			}
		}

		return false;
	}
}
