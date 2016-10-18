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

include_once(_PS_MODULE_DIR_ . 'bestkit_geoipredirect/bestkit_geoipredirect.php');

class AdminGeoIpRedirectController extends AdminController {

    protected $position_identifier = 'id_bestkit_geoipredirect';

    protected $_js = '<script type="text/javascript" src="../modules/bestkit_geoipredirect/views/js/admin/admin.js"></script>';

    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'bestkit_geoipredirect';
        $this->identifier = 'id_bestkit_geoipredirect';
        $this->className = 'BestkitGeoIpRedirect';
        $this->addRowAction('edit');
        $this->addRowAction('delete');

        $this->fields_list = array(
            'id_bestkit_geoipredirect' => array(
                'title' => $this->l('ID'),
                'align' => 'center',
                'width' => 30
            ),
            'title' => array(
                'title' => $this->l('Title'),
                'width' => 300
            ),
            'type' => array(
                'title' => $this->l('Type'),
                'width' => 40
            ),
            'position' => array(
                'title' => $this->l('Position'),
                'width' => 40
            ),
            'status' => array(
                'title' => $this->l('Status'),
                'width' => 40,
                'active' => 'update',
                'align' => 'center',
                'type' => 'bool',
                'orderby' => FALSE
            ),
        );

        parent::__construct();
    }

    public function renderForm()
    {
        $this->display = 'edit';
        $this->initToolbar();
        if (!$this->loadObject(TRUE)) {
            return;
        }

        $this->fields_form = array(
            'tinymce' => FALSE,
            'legend' => array(
                'title' => $this->l('Geo IP Redirect'),
                'image' => '../img/admin/tab-categories.gif'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Redirect Title:'),
                    'name' => 'title',
                    'id' => 'title',
                    'required' => TRUE,
                    'size' => 50,
                    'maxlength' => 50,
                ),
               array(
                    'type' => 'radio',
                    'label' => $this->l('Redirect Type:'),
                    'name' => 'type',
                    'class' => 't',
                    'is_bool' => TRUE,
                    'values' => array(array(
                        'id' => 'type_ip',
                        'value' => 'ip',
                        'label' => $this->l('by IP')), array(
                        'id' => 'type_location',
                        'value' => 'location',
                        'label' => $this->l('by Location'))
                    )
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Enable Redirect:'),
                    'name' => 'status',
                    'class' => 't',
                    'is_bool' => TRUE,
                    'values' => array(array(
                        'id' => 'is_enabled_on',
                        'value' => 1), array(
                        'id' => 'is_enabled_off',
                        'value' => 0)
                    )
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Is Cycle:'),
                    'name' => 'cycle',
                    'class' => 't',
                    'is_bool' => TRUE,
                    'desc' => $this->l('If you choose "Yes" then customers will be redirecting each time when they will be trying to open the site.') . '<br>' . $this->l('If "No" then customers will be redirected only one time.'),
                    'values' => array(array(
                        'id' => 'cycle_on',
                        'value' => 1), array(
                        'id' => 'cycle_off',
                        'value' => 0)
                    )
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Redirect Order:'),
                    'name' => 'position',
                    'id' => 'position',
                    'size' => 50,
                    'maxlength' => 10,
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('IP List:'),
                    'name' => 'ip_list',
                    'id' => 'ip_list',
                    'desc' => $this->l('Allows single IPs or IP ranges. For example:') . '<br/><b>192.87.20.10</b> - single IP<br/><b>192.164.0.1-192.164.99.99</b> - IP range',
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('From Countries:'),
                    'name' => 'countries',
                    'id' => 'countries',
                    'desc' => $this->l('Allows the Country name or Country code'),
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('From Cities:'),
                    'name' => 'cities',
                    'id' => 'cities',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('To Page:'),
                    'name' => 'to_page',
                    'id' => 'to_page',
                    'required' => true,
                    'desc' => $this->l('Customers will be redirected to this URL'),
                ),
            ),
            'submit' => array(
                'title' => $this->l('   Save   '),
            )
        );

        return parent::renderForm() . $this->_js;
    }
}
