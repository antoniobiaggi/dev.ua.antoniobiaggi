<?php
//НоваПошта
define ("_NP_ADMIN_", "adminnp");
if (!defined('_PS_VERSION_'))
	exit;

require_once(_PS_MODULE_DIR_ . 'ecm_novaposhta/classes/json.php');
require_once(_PS_MODULE_DIR_ . 'ecm_novaposhta/classes/load_files.php');
require_once(_PS_MODULE_DIR_ . 'ecm_novaposhta/classes/api2.php');
require_once(_PS_MODULE_DIR_ . 'ecm_novaposhta/classes/exec.php');
require_once(_PS_MODULE_DIR_ . 'ecm_novaposhta/classes/exec_.php');
require_once(_PS_MODULE_DIR_ . 'ecm_novaposhta/classes/areaRu.php');
require_once(_PS_MODULE_DIR_ . 'ecm_novaposhta/classes/split.php');
require_once(_PS_MODULE_DIR_ . 'ecm_novaposhta/classes/klogger.php');
require_once(_PS_MODULE_DIR_ . 'ecm_novaposhta/classes/npmail.php');
require_once(_PS_MODULE_DIR_ . 'ecm_novaposhta/upgrade.php');

$log = new klogger("log.txt", klogger::DEBUG);

class ecm_novaposhta extends CarrierModule {
	const PREFIX = 'ecm_';
	private $_last_updated = '';

	protected $_hooks = array(
		'actionCarrierUpdate',
		'actionPaymentConfirmation',
		'actionValidateOrder',
		'actionCartSave',
		'displayOrderDetail',
		'displayAdminOrder',
		'DisplayBackOfficeHeader',
		'ExtraCarrier' //For control change of the carrier's ID (id_carrier), the module must use the updateCarrier hook.
		);

	protected $_carriers = array(
	//"Public carrier name" => "technical name",
		'Нова Пошта' => 'ecm_novaposhta');

	public
	function __construct() {

		$this->name = 'ecm_novaposhta';
		$this->tab = 'shipping_logistics';
		$this->version = '2.2.8';
		$this->author = 'Elcommerce';
		$this->bootstrap = TRUE;
		parent::__construct();
		$this->displayName = $this->l('NovaPoshta Shipping');
		$this->description = $this->l('Shipping module for NovaPoshta');
		$this->ps_versions_compliancy = array(
			'min' => '1.5',
			'max' => _PS_VERSION_
		);
		if ($this->upgradeCheck('NP'))
			$this->warning = $this->l('We have released a new version of the module, click to upgrade!!!');
		if (!(Currency::getIdByIsoCode('UAH')))
			$this->warning = $this->l('There is currency "UAH" not presently in your shop! Creat it!');

	}

	public
	function install() {

		$sql = array();
		//$sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'ecm_newpost`;';
		//$sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'ecm_newpost_warehouse`;';
		//$sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'ecm_newpost_last`';
		//$sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'ecm_newpost_orders`';
		//$sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'ecm_newpost_cart`';

		//таблица для хранения последнего / текущего адреса доставки
		$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'ecm_newpost_last` (
        `id_customer` int(11) NOT NULL,
        `id_cart` int(11) NOT NULL,
        `nal` tinyint(1) NOT NULL,
        `customsize` tinyint(1) NOT NULL,
        `area` varchar(36) NOT NULL DEFAULT "71508129-9b87-11de-822f-000c2965ae0e",
        `city` varchar(36) NOT NULL DEFAULT "ebc0eda9-93ec-11e3-b441-0050568002cf",
        `ref` varchar(36) NOT NULL DEFAULT "2bb8cecb-e1c2-11e3-8c4a-0050568002cf",
		`counterparty` varchar(36) NOT NULL DEFAULT "ZZZ",
		`firstname` VARCHAR( 32 ) NOT NULL ,
		`lastname` VARCHAR( 32 ) NOT NULL ,
		`phone` VARCHAR( 32 ) NOT NULL ,
        PRIMARY KEY (`id_customer`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';

		$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'ecm_newpost_orders` (
        `id_order` int(10) NOT NULL,
        `id_customer` int(10) NOT NULL,
        `senderpay` tinyint(1) NOT NULL DEFAULT "0",
        `nal` tinyint(1) NOT NULL DEFAULT "0",
        `senderpaynal` tinyint(4) NOT NULL,
        `customsize` tinyint(1) NOT NULL DEFAULT "0",
        `area` varchar(36) NOT NULL,
        `city` varchar(36) NOT NULL,
        `ware` varchar(36) NOT NULL,
        `ref` varchar(36) DEFAULT NULL,
        `en` varchar(36) DEFAULT NULL,
        `counterparty` varchar(36) NOT NULL,
        `width` decimal(10,4) NOT NULL,
        `height` decimal(10,4) NOT NULL,
        `depth` decimal(10,4) NOT NULL,
        `weight` decimal(10,4) NOT NULL,
        `vweight` decimal(10,4) NOT NULL,
        `insurance` decimal(10,4) NOT NULL,
		`cod_value` DECIMAL( 10, 4 ) NOT NULL,
		`description` varchar(100) NOT NULL,
        `pack` varchar(100) NOT NULL,
        `seats_amount` int(11) NOT NULL,
        `PackingNumber` BIGINT NOT NULL,
        `msg` text NOT NULL,
		`firstname` VARCHAR( 32 ) NOT NULL ,
		`lastname` VARCHAR( 32 ) NOT NULL ,
		`phone` VARCHAR( 32 ) NOT NULL ,
		`x` DOUBLE( 16, 10 ) NOT NULL ,
		`y` DOUBLE( 16, 10 ) NOT NULL ,
        PRIMARY KEY (`id_order`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';


		$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'ecm_newpost_cart` (
        `id_cart` int(11) NOT NULL,
        `id_customer` int(11) NOT NULL,
        `area` varchar(36) NOT NULL DEFAULT "71508129-9b87-11de-822f-000c2965ae0e",
        `city` varchar(36) NOT NULL DEFAULT "ebc0eda9-93ec-11e3-b441-0050568002cf",
        `ref` varchar(36) NOT NULL DEFAULT "2bb8cecb-e1c2-11e3-8c4a-0050568002cf",
        `customsize` tinyint(1) NOT NULL DEFAULT "0",
        `nal` tinyint(1) NOT NULL DEFAULT "0",
        `cost` decimal(10,4) NOT NULL DEFAULT "25",
		`costredelivery` decimal( 10, 4 ) NOT NULL,
		`costpack` decimal( 10, 4 ) NOT NULL,
		`width` decimal(10,4) NOT NULL,
        `height` decimal(10,4) NOT NULL,
        `depth` decimal(10,4) NOT NULL,
        `weight` decimal(10,4) NOT NULL,
        `vweight` decimal(10,4) NOT NULL,
        `full_address` varchar(256) NOT NULL,
        `counterparty` varchar(36) NOT NULL,
		`firstname` VARCHAR( 32 ) NOT NULL ,
		`lastname` VARCHAR( 32 ) NOT NULL ,
		`phone` VARCHAR( 32 ) NOT NULL ,
		`total_wt` DOUBLE( 10, 4 ) NOT NULL,
        PRIMARY KEY (`id_cart`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8'; //таблица для хранения деталей корзинки

		$sql[] = "CREATE TABLE IF NOT EXISTS `" . _DB_PREFIX_ . "ecm_newpost` (
        `id` INT(10) UNSIGNED NOT NULL,
        `description` VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL,
        `name` VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL,
        `is_active` TINYINT(1) UNSIGNED NOT NULL,
        `id_carrier` INT(11) NOT NULL DEFAULT '0',
        `id_carrier_history` INT(10) UNSIGNED NOT NULL DEFAULT '0',
        KEY `is_active` (`is_active`)
        ) AUTO_INCREMENT=25 ENGINE=InnoDB DEFAULT CHARSET=utf8
        "; //в этой таблице будут перечислены имеющиеся способы доставки в информационной системе. id нужен для синхронизации с ERP.

		$sql[] = "INSERT INTO `" . _DB_PREFIX_ . "ecm_newpost` (`id`,`description`,`name`,`is_active`,`id_carrier`,`id_carrier_history`) VALUES (1,'Новая почта','Доставка Новой почтой',1,0,0);
        "; //Вставляем список имеющихся способов доставки
		$sql[] = "CREATE TABLE IF NOT EXISTS `" . _DB_PREFIX_ . "ecm_newpost_warehouse` (
        `area_ref` varchar(36) NOT NULL,
        `area` varchar(256) NOT NULL,
        `city_ref` varchar(36) NOT NULL,
        `city_id` int(11) NOT NULL,
        `city` varchar(255) NOT NULL,
        `cityRu` varchar(255) DEFAULT NULL,
        `ref` varchar(255) NOT NULL,
        `address` varchar(255) NOT NULL,
        `addressRu` varchar(255) DEFAULT NULL,
        `number` int(10) unsigned NOT NULL,
        `wareId` int(10) unsigned NOT NULL,
        `phone` varchar(255) DEFAULT NULL,
        `weekday_work_hours` varchar(255) DEFAULT NULL,
        `weekday_reseiving_hours` varchar(255) DEFAULT NULL,
        `weekday_delivery_hours` varchar(255) DEFAULT NULL,
        `saturday_work_hours` varchar(255) DEFAULT NULL,
        `saturday_reseiving_hours` varchar(255) DEFAULT NULL,
        `saturday_delivery_hours` varchar(255) DEFAULT NULL,
        `working_monday` varchar(255) DEFAULT NULL,
        `working_tuesday` varchar(255) DEFAULT NULL,
        `working_wednesday` varchar(255) DEFAULT NULL,
        `working_thursday` varchar(255) DEFAULT NULL,
        `working_friday` varchar(255) DEFAULT NULL,
        `working_saturday` varchar(255) DEFAULT NULL,
        `working_sunday` varchar(255) DEFAULT NULL,
        `departure_monday` varchar(255) DEFAULT NULL,
        `departure_tuesday` varchar(255) DEFAULT NULL,
        `departure_wednesday` varchar(255) DEFAULT NULL,
        `departure_thursday` varchar(255) DEFAULT NULL,
        `departure_friday` varchar(255) DEFAULT NULL,
        `departure_saturday` varchar(255) DEFAULT NULL,
        `departure_sunday` varchar(255) DEFAULT NULL,
        `receipt_monday` varchar(255) DEFAULT NULL,
        `receipt_tuesday` varchar(255) DEFAULT NULL,
        `receipt_wednesday` varchar(255) DEFAULT NULL,
        `receipt_thursday` varchar(255) DEFAULT NULL,
        `receipt_friday` varchar(255) DEFAULT NULL,
        `receipt_saturday` varchar(255) DEFAULT NULL,
        `receipt_sunday` varchar(255) DEFAULT NULL,
        `max_weight_allowed` int(11) DEFAULT NULL,
        `x` double(16,10) DEFAULT NULL,
        `y` double(16,10) DEFAULT NULL,
        UNIQUE KEY `UNIQUE` (`ref`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ";
		//$sql[] = "INSERT INTO `" . _DB_PREFIX_ . "ecm_newpost_warehouse` SET `area_ref` = '0000'";
		//$sql[] = 'ALTER TABLE `'._DB_PREFIX_.'ecm_newpost_warehouse` ADD UNIQUE  `UNIQUE` (  `wareId` )';
		//в этой таблице будут перечислены имеющиеся способы доставки в информационной системе. id нужен для синхронизации с ERP
		foreach ($sql as $s) // исполняем все запросы в очереди
			if (!Db::getInstance()->Execute($s)) {
				$this->_errors[] = "Failed on SQL Query";
				return false;
			}

		$idTabs = array();
		$idTabs[] = Tab::getIdFromClassName('AdminNPMain');
		$idTabs[] = Tab::getIdFromClassName('AdminNP');
		$idTabs[] = Tab::getIdFromClassName('AdminNPLog');
		foreach ($idTabs as $idTab) {
			if ($idTab) {
				$tab = new Tab($idTab);
				$tab->delete();
			}
		}

		// $parent_tab = new Tab();
		// $parent_tab->class_name = 'AdminNPMain';
		// $parent_tab->id_parent = 0;
		// $parent_tab->module = $this->name;
		// $parent_tab->name[(int) (Configuration::get('PS_LANG_DEFAULT'))] = $this->l('NP Delivery');
		// $parent_tab->add();

		$id = Tab::getIdFromClassName('AdminParentShipping');

		// settings
		$tab = new Tab();
		$tab->class_name = 'AdminNP';
		$tab->name[(int) (Configuration::get('PS_LANG_DEFAULT'))] = $this->l('NP Settings');
		//$tab->id_parent = $parent_tab->id;
		$tab->id_parent = $id;
		$tab->module = $this->name;
		$tab->add();

		// log
		$tab = new Tab();
		$tab->class_name = 'AdminNPLog';
		$tab->name[(int) (Configuration::get('PS_LANG_DEFAULT'))] = $this->l('NP Log');
		//$tab->id_parent = $parent_tab->id;
		$tab->id_parent = $id;
		$tab->module = $this->name;
		$tab->add();

		Configuration::updateValue(self::PREFIX . 'np_TrimMsg', 100);
		Configuration::updateValue(self::PREFIX . 'np_comiso', 2);
		Configuration::updateValue(self::PREFIX . 'np_insurance', 0);
		Configuration::updateValue(self::PREFIX . 'np_CargoType', 'Cargo');
		Configuration::updateValue(self::PREFIX . 'np_ServiceType', 'WarehouseWarehouse');
		Configuration::updateValue(self::PREFIX . 'np_time', '20:00');
		Configuration::updateValue(self::PREFIX . 'np_weght', 0);
		Configuration::updateValue(self::PREFIX . 'np_vweght', 0);
		Configuration::updateValue(self::PREFIX . 'np_FreeLimit', 99999);


		if (parent::install()) {
			foreach ($this->_hooks as $hook) {
				if (!$this->registerHook($hook)) {
					return FALSE;
				}
			}
			if (!$this->createCarriers()) {
				//function for creating new currier
				return FALSE;
			}
			return TRUE;
		}
		return FALSE;
	}

	protected
	function createCarriers() {
		foreach ($this->_carriers as $key => $value) {
			//Create new carrier
			$carrier = new Carrier();
			$carrier->name = $key;
			$carrier->active = TRUE;
			$carrier->deleted = 0;
			$carrier->url = "http://novaposhta.ua/tracking/?cargo_number=@";
			$carrier->shipping_handling = FALSE;
			$carrier->range_behavior = 0;
			$carrier->delay[Configuration::get('PS_LANG_DEFAULT')] = $key;
			$carrier->shipping_external = TRUE;
			$carrier->is_module = TRUE;
			$carrier->external_module_name = $this->name;
			$carrier->need_range = TRUE;
			if ($carrier->add()) {
				$groups = Group::getGroups(true);
				foreach ($groups as $group) {
					Db::getInstance()->autoExecute(_DB_PREFIX_ . 'carrier_group', array(
						'id_carrier' => (int) $carrier->id,
						'id_group' => (int) $group['id_group']
					), 'INSERT');
				}
				$rangePrice = new RangePrice();
				$rangePrice->id_carrier = $carrier->id;
				$rangePrice->delimiter1 = '0';
				$rangePrice->delimiter2 = '1000000';
				$rangePrice->add();
				$rangeWeight = new RangeWeight();
				$rangeWeight->id_carrier = $carrier->id;
				$rangeWeight->delimiter1 = '0';
				$rangeWeight->delimiter2 = '1000000';
				$rangeWeight->add();
				$zones = Zone::getZones(true);
				foreach ($zones as $z) {
					Db::getInstance()->autoExecute(_DB_PREFIX_ . 'carrier_zone', array(
						'id_carrier' => (int) $carrier->id,
						'id_zone' => (int) $z['id_zone']
					), 'INSERT');
					Db::getInstance()->autoExecuteWithNullValues(_DB_PREFIX_ . 'delivery', array(
						'id_carrier' => $carrier->id,
						'id_range_price' => (int) $rangePrice->id,
						'id_range_weight' => NULL,
						'id_zone' => (int) $z['id_zone'],
						'price' => '0'
					), 'INSERT');
					Db::getInstance()->autoExecuteWithNullValues(_DB_PREFIX_ . 'delivery', array(
						'id_carrier' => $carrier->id,
						'id_range_price' => NULL,
						'id_range_weight' => (int) $rangeWeight->id,
						'id_zone' => (int) $z['id_zone'],
						'price' => '0'
					), 'INSERT');
				}
				copy(dirname(__FILE__) . '/img/' . $value . '.jpg', _PS_SHIP_IMG_DIR_ . '/' . (int) $carrier->id . '.jpg'); //assign carrier logo
				Configuration::updateValue(self::PREFIX . $value, $carrier->id);
				Configuration::updateValue(self::PREFIX . $value . '_reference', $carrier->id);
			}
		}
		return TRUE;
	}

	protected
	function deleteCarriers() {
		foreach ($this->_carriers as $value) {
			$tmp_carrier_id = Configuration::get(self::PREFIX . $value);
			$carrier = new Carrier($tmp_carrier_id);
			$carrier->delete();
		}
		return TRUE;
	}

	public
	function uninstall() {
		if (parent::uninstall()) {
			foreach ($this->_hooks as $hook) {
				if (!$this->unregisterHook($hook)) {
					return FALSE;
				}
			}
			if (!$this->deleteCarriers()) {
				return FALSE;
			}
			return TRUE;
		}
		return FALSE;
	}

	public
	function getOrderShippingCost($params, $shipping_cost) {
		if (Configuration::get(self::PREFIX . 'np_chk_fixcost'))
			return Configuration::get(self::PREFIX . 'np_fixcost');
		else {
			$rshiping = 0;
			$costnp = exec::getcost($params->id);
			if (!(bool) Configuration::get('ecm_np_senderpay_redelivery')) {
//				if (Tools::getValue('module') == 'ecm_cashnovaposta') {
				if ((bool)Configuration::get('ecm_np_redelivery')) {
					$rshiping = $costnp['costredelivery'];
				}
			}
			$cart = new Cart($params->id);
			if (Configuration::get(self::PREFIX . 'np_FreeLimit') < $cart->getOrderTotal(true, Cart::ONLY_PHYSICAL_PRODUCTS_WITHOUT_SHIPPING))
				$costnp['cost'] = 0 ;

			return $costnp['cost'] + $rshiping;
		}

	}

	public
	function getOrderShippingCostExternal($params) {
			return $this->getOrderShippingCost($params, 0);
	}

	public
	function hookActionCarrierUpdate($params) {
		if ($params['carrier']->id_reference == Configuration::get(self::PREFIX . $this->name . '_reference')) {
			$ecm_novaposhta_prev = Configuration::get(self::PREFIX . $this->name);
			Configuration::updateValue(self::PREFIX . 'ecm_novaposhta', $params['carrier']->id);
			exec::ChangeCarriers($ecm_novaposhta_prev, Configuration::get(self::PREFIX . $this->name));
		}
	}

	private
	function _displayabout() {
		$this->_html .= '<form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
        <fieldset class="space">
        <legend><img src="../img/admin/email.gif" /> ' . $this->l('Information') . '</legend>
        <div id="dev_div">
        <span><b>' . $this->l('Version') . ':</b> ' . $this->version . '</span><br>
        <span><b>' . $this->l('Developer') . ':</b> <a class="link" href="mailto:admin@elcommerce.com.ua" target="_blank">Mice  </a>
        <span><b>' . $this->l('Decription') . ':</b> <a class="link" href="http://elcommerce.com.ua" target="_blank">ElCommerce.com.ua</a><br>
        <span><b>' . $this->l('Licension key') . ':</b> ' . $this->l(Configuration::get(self::PREFIX . 'np_LIC_KEY')) . '</span><br><br>
        <p style="text-align:center"><a href="http://elcommerce.com.ua/"><img src="http://elcommerce.com.ua/img/m/logo.png" alt="Электронный учет коммерческой деятельности" /></a>
        </div>
        </fieldset>
        ';
		
	}



	private
	function _cron() {
		$secureKey = md5(_COOKIE_KEY_.Configuration::get('PS_SHOP_NAME'));
		$domain = Tools::getHttpHost(true);
		$cron_url = $domain.__PS_BASE_URI__.'modules/ecm_novaposhta/cron.php?secure_key='.$secureKey;
		$class    = version_compare(_PS_VERSION_, '1.6', '>=') ? 'alert alert-info' : 'description';
		$this->_html .= '
		<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
		<fieldset class="product-tab-content" style="clear: both;margin-top: 15px;">
		<p class="'.$class.'">
		'.$this->l('Добавьте этот адрес в планировщик cron ').': <a href="'.$cron_url.'">'.$cron_url.'</a><br/>
		'.$this->l('для получения списка городов и отделений Новой Почты по расписанию.').'</p>

		';
	}

	private
	function _displayupgrade() {
		$this->_html .= '<form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
        <fieldset class="space">
        <legend><img src="../img/admin/module_warning.png" /> ' . $this->l('Upgrade') . '</legend>
        <div id="dev_div">
        <span style="color:red"><b>' . $this->l('New version is available!!! Please, click button "Upgrade" to install it!') . ':</b></span>
        <center><hr>
        <input class="button" type="submit" name="submitUPGR" value="' . $this->l('Upgrade') . '" />
        </center>
        </div>
        </fieldset>
        ';
	}

	private
	function _settings() {
		if (!Configuration::get(self::PREFIX . 'np_LIC_KEY')) {
			$this->_html .= '<fieldset class="space">
            <legend><img src="../img/admin/cog.gif" alt="" class="middle" />' . $this->l('Settings') . '</legend>
            <div class="col-xs-12">
            <label>' . $this->l('Licension key') . '</label>
            <div class="margin-form">
            <input type="text" name="LIC_KEY" placeholder="' . $this->l('Licension key') . '" required
            value=""/>
            <p class="clear">' . $this->l('Enter your Licension key ') . '</p>
            </div>
            <center><hr>
            <input class="button" type="submit" name="submitLIC" value="' . $this->l('Save') . '" />
            </center>
            ';
			return;
		}
		if (!Configuration::get(self::PREFIX . 'np_API_KEY')) {
			$this->_html .= '<fieldset class="space">
            <legend><img src="../img/admin/cog.gif" alt="" class="middle" />' . $this->l('Settings') . '</legend>
            <input id="customer" name="customer" type="hidden" value ="-1"/>
            <input type="hidden" name="TrimMsg" value="101"/>
            <input type="hidden" name="comiso" value="2"/>
            <input type="hidden" name="insurance" value="0"/>
            <input type="hidden" name="ServiceType" value="WarehouseWarehouse"/>
            <div class="col-xs-12">
            <label>' . $this->l('API key') . '</label>
            <div class="margin-form">
            <input type="text" name="API_KEY" placeholder="' . $this->l('API key') . '" required
            value=""/>
            <p class="clear">' . $this->l('Enter your API key (in the particular office at site "Nova poshta")') . '</p>
            </div>
            <center><hr>
            <input class="button" type="submit" name="submitAPI" value="' . $this->l('Save') . '" />
            </center>
            ';
			return;
		}


		if ($errors = exec::getLists()) {
			$errorlist = '';
			foreach ($errors as $error)
				$errorlist .= '<li>' . $error . '</li>';
			$this->_html .= '
            <div class="bootstrap">
            <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>' . $this->l('Errors detect" !!!') . '</h4>
            <ul class="list-unstyled">' . $errorlist . '</ul>
            </div>
            </div>
            ';
		}
		$countwh = Db::getInstance()->GetValue("SELECT COUNT(`ref`) FROM `" . _DB_PREFIX_ . "ecm_newpost_warehouse`");
		$this->context->smarty->assign(array(
			'out_company' => Configuration::get(self::PREFIX . 'np_out_company'),
			'out_name' => Configuration::get(self::PREFIX . 'np_out_name'),
			'out_phone' => Configuration::get(self::PREFIX . 'np_out_phone'),
			'out_email' => Configuration::get(self::PREFIX . 'np_out_email'),
			'API_KEY' => Configuration::get(self::PREFIX . 'np_API_KEY'),
			'LIC_KEY' => Configuration::get(self::PREFIX . 'np_LIC_KEY'),
			'countwh' => $countwh,
			'percentage' => Configuration::get(self::PREFIX . 'np_percentage'),
			'comiso' => Configuration::get(self::PREFIX . 'np_comiso'),
			'modulesdir' => _MODULE_DIR_ . $this->name,
			'counterparty' => exec::getout('counterparty'),
			'payment_form' => Configuration::get(self::PREFIX . 'np_payment_method'),
			'payment_forms' => Exec::simpleList('PaymentForms'),
			'Ownership' => Configuration::get(self::PREFIX . 'np_Ownership'),
			'OwnershipFormsList' => Exec::simpleList('OwnershipFormsList', 'FullName'),
			'ServiceType' => Configuration::get(self::PREFIX . 'np_ServiceType'),
			'ServiceTypes' => Exec::simpleList('ServiceTypes'),
			'CargoType' => Configuration::get(self::PREFIX . 'np_CargoType'),
			'CargoTypes' => Exec::simpleList('CargoTypes'),
			'description' => Configuration::get(self::PREFIX . 'np_description'),
			'pack' => Configuration::get(self::PREFIX . 'np_pack'),
			'insurance' => Configuration::get(self::PREFIX . 'np_insurance'),
			'time' => Configuration::get(self::PREFIX . 'np_time'),
			'format' => Configuration::get(self::PREFIX . 'np_format'),
			'formats' => array(
				'html' => 'HTML',
				'pdf' => 'PDF'
			),
			'InfoRegClientBarcode' => Configuration::get(self::PREFIX . 'np_InfoRegClientBarcode'),
			'InfoRegClientBarcodes' => array(
				'id_order' => $this->l('Id order'),
				'reference' => $this->l('Reference'),
				'' => $this->l('None')
			),
			'redelivery' => (Configuration::get(self::PREFIX . 'np_redelivery') ? 'checked="checked" ' : ''),
			'senderpay' => (Configuration::get(self::PREFIX . 'np_senderpay') ? 'checked="checked" ' : ''),
			'senderpay_redelivery' => (Configuration::get(self::PREFIX . 'np_senderpay_redelivery') ? 'checked="checked" ' : ''),
			'AfterpaymentOnGoods' => (Configuration::get(self::PREFIX . 'np_AfterpaymentOnGoods') ? 'checked="checked" ' : ''),
			'add_msg' => (Configuration::get(self::PREFIX . 'np_add_msg') ? 'checked="checked" ' : ''),
			'fill' => (Configuration::get(self::PREFIX . 'np_fill') ? 'checked="checked" ' : ''),
			'show' => (Configuration::get(self::PREFIX . 'np_show') ? 'checked="checked" ' : ''),
			'ac' => (Configuration::get(self::PREFIX . 'np_ac') ? 'checked="checked" ' : ''),
			'SendNPmail' => (Configuration::get(self::PREFIX . 'np_SendNPmail') ? 'checked="checked" ' : ''),
			'SendNPadminmail' => Configuration::get(self::PREFIX . 'np_SendNPadminmail'),
			'weght' => Configuration::get(self::PREFIX . 'np_weght'),
			'vweght' => Configuration::get(self::PREFIX . 'np_vweght'),
			'fixcost' => Configuration::get(self::PREFIX . 'np_fixcost'),
			'chk_fixcost' => (Configuration::get(self::PREFIX . 'np_chk_fixcost') ? 'checked="checked" ' : ''),
			'addtoorder' => Configuration::get(self::PREFIX . 'np_addtoorder'),
			'Area' => exec::getout('area',-1),
			'City' => exec::getout('city',-1),
			'Ware' => exec::getout('ref',-1),
			'Areas' => exec::areaList2(),
			'Citys' => exec::cityList2(exec::getout('area',-1)),
			'Wares' => exec::wareList2(exec::getout('city',-1)),
			'FreeLimit' => Configuration::get(self::PREFIX . 'np_FreeLimit'),
			'TrimMsg' => Configuration::get(self::PREFIX . 'np_TrimMsg')

		));
		$this->_html .= $this->display(__FILE__, 'views/settings.tpl');

	}


	public
	function getContent() {
		$this->_html = '<h2>' . $this->l('Delivery "Nova poshta"') . '</h2>';
		//$this->postProcess();
		$this->_html .= '<form action="' . $_SERVER['REQUEST_URI'] . '" method="post">';

		if (Tools::isSubmit('submitWarehouse')) {
			$arr = np::warehouse();
			$arr_c = np::city();
			$arr_a = np::area();
			//p($arr_a->data);
			Exec::warehouse($arr, $arr_c, $arr_a);
			$this->_html .= '
            <div class="bootstrap">
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            ' . $this->l('Settings refresh') . '
            </div>
            </div>
            ';
		} else {
			if (null == Configuration::get(self::PREFIX . 'np_API_KEY'))
				$this->_html .= '
            <div class="bootstrap">
            <div class="alert error">
            <button type="button" class="close" data-dismiss="alert">×</button>
            ' . $this->l('Since fill in "Settings" !!!') . '
            </div>
            </div>
            ';
		}

		if (Tools::isSubmit('submitLIC')) {
			$pattern = '/^[0-9A-Fa-f]{5}\-[0-9A-Fa-f]{5}\-[0-9A-Fa-f]{5}\-[0-9A-Fa-f]{5}\-[0-9A-Fa-f]{5}$/';
			$lic_key = Configuration::get(self::PREFIX . 'np_LIC_KEY');
			if (empty($lic_key))
				$lic_key = Tools::getValue('LIC_KEY');
			preg_match($pattern, $lic_key, $matches);
			if (sizeof($matches))
				Configuration::updateValue(self::PREFIX . 'np_LIC_KEY', $lic_key);
			else {
				$this->_html .= '
                <div class="bootstrap">
                <div class="alert alert-danger">
                <btn btn-default button type="btn btn-default button" class="close" data-dismiss="alert">×</btn btn-default button>
                Укажите валидный лицензионный ключ!!!
                </div>
                </div>
                ';
			}
		}
		if (Tools::isSubmit('submitUPGR')) {

			upgrade::load();
			header("Refresh:0");
			$this->_html .= '
            <div class="bootstrap">
            <div class="alert alert-success">
            <btn btn-default button type="btn btn-default button" class="close" data-dismiss="alert">×</btn btn-default button>
            Обновление успешно завершено!!!
            </div>
            </div>
            ';

		}
		if (Tools::isSubmit('submitAPI')) {
			$pattern = '/^[0-9a-f]{32}$/';
			$api_key = Tools::getValue('API_KEY');
			preg_match($pattern, $api_key, $matches);
			if (sizeof($matches))
				Configuration::updateValue(self::PREFIX . 'np_API_KEY', $api_key);
			else {
				$this->_html .= '
                <div class="bootstrap">
                <div class="alert alert-danger">
                <btn btn-default button type="btn btn-default button" class="close" data-dismiss="alert">×</btn btn-default button>
                API ключ не соответствует требованиям!!!
                </div>
                </div>
                ';
			}
			Configuration::updateValue(self::PREFIX . 'np_comiso', Tools::getValue('comiso'));
			Configuration::updateValue(self::PREFIX . 'np_TrimMsg', Tools::getValue('TrimMsg'));
			Configuration::updateValue(self::PREFIX . 'np_insurance', Tools::getValue('insurance'));
		}

		if (Tools::isSubmit('submitUPDATE')) {
			$pattern = '/^[0-9a-f]{32}$/';
			$api_key = Tools::getValue('API_KEY');
			preg_match($pattern, $api_key, $matches);
			if (sizeof($matches))
				Configuration::updateValue(self::PREFIX . 'np_API_KEY', $api_key);
			else {
				$this->_html .= '
                <div class="bootstrap">
                <div class="alert alert-danger">
                <btn btn-default button type="btn btn-default button" class="close" data-dismiss="alert">×</btn btn-default button>
                API ключ не соответствует требованиям!!!
                </div>
                </div>
                ';
			}
			Configuration::updateValue(self::PREFIX . 'np_out_company', Tools::getValue('out_company'));
			Configuration::updateValue(self::PREFIX . 'np_out_name', Tools::getValue('out_name'));
			Configuration::updateValue(self::PREFIX . 'np_out_phone', Tools::getValue('out_phone'));
			Configuration::updateValue(self::PREFIX . 'np_out_email', Tools::getValue('out_email'));
			Configuration::updateValue(self::PREFIX . 'np_time', Tools::getValue('time'));
			Configuration::updateValue(self::PREFIX . 'np_weght', Tools::getValue('weght'));
			Configuration::updateValue(self::PREFIX . 'np_vweght', Tools::getValue('vweght'));
			Configuration::updateValue(self::PREFIX . 'np_fixcost', Tools::getValue('fixcost'));
			Configuration::updateValue(self::PREFIX . 'np_chk_fixcost', Tools::getValue('chk_fixcost') ? 1 : 0);
			Configuration::updateValue(self::PREFIX . 'np_addtoorder', Tools::getValue('addtoorder') ? 1 : 0);
			Configuration::updateValue(self::PREFIX . 'np_add_msg', Tools::getValue('add_msg') ? 1 : 0);
			Configuration::updateValue(self::PREFIX . 'np_show', Tools::getValue('show') ? 1 : 0);
			Configuration::updateValue(self::PREFIX . 'np_fill', Tools::getValue('fill') ? 1 : 0);
			Configuration::updateValue(self::PREFIX . 'np_ac', Tools::getValue('ac') ? 1 : 0);
			Configuration::updateValue(self::PREFIX . 'np_redelivery', Tools::getValue('redelivery') ? 1 : 0);
			Configuration::updateValue(self::PREFIX . 'np_senderpay', Tools::getValue('senderpay') ? 1 : 0);
			Configuration::updateValue(self::PREFIX . 'np_SendNPmail', Tools::getValue('SendNPmail') ? 1 : 0);
			Configuration::updateValue(self::PREFIX . 'np_SendNPadminmail', Tools::getValue('SendNPadminmail'));
			Configuration::updateValue(self::PREFIX . 'np_senderpay_redelivery', Tools::getValue('senderpay_redelivery') ? 1 : 0);
			Configuration::updateValue(self::PREFIX . 'np_AfterpaymentOnGoods', Tools::getValue('AfterpaymentOnGoods') ? 1 : 0);
			Configuration::updateValue(self::PREFIX . 'np_percentage', Tools::getValue('percentage'));
			Configuration::updateValue(self::PREFIX . 'np_comiso', Tools::getValue('comiso'));
			Configuration::updateValue(self::PREFIX . 'np_payment_method', Tools::getValue('payment_method'));
			Configuration::updateValue(self::PREFIX . 'np_description', Tools::getValue('description'));
			Configuration::updateValue(self::PREFIX . 'np_pack', Tools::getValue('pack'));
			Configuration::updateValue(self::PREFIX . 'np_insurance', Tools::getValue('insurance'));
			Configuration::updateValue(self::PREFIX . 'np_format', Tools::getValue('format'));
			Configuration::updateValue(self::PREFIX . 'np_InfoRegClientBarcode', Tools::getValue('InfoRegClientBarcode'));
			Configuration::updateValue(self::PREFIX . 'np_CargoType', Tools::getValue('CargoType'));
			Configuration::updateValue(self::PREFIX . 'np_ServiceType', Tools::getValue('ServiceType'));
			Configuration::updateValue(self::PREFIX . 'np_TrimMsg', Tools::getValue('TrimMsg'));
			Configuration::updateValue(self::PREFIX . 'np_FreeLimit', Tools::getValue('FreeLimit'));
			Configuration::updateValue(self::PREFIX . 'np_Ownership', Tools::getValue('Ownership'));
		}



		if (Tools::isSubmit('submitCREATE')) {
			$address = array();
			$address['id_customer'] = -1;
			$address['cityref'] = exec::getout('city');
			$address['firstname'] = Configuration::get(self::PREFIX . 'np_out_name');
			$address['lastname'] = Configuration::get(self::PREFIX . 'np_out_company');
			$address['phone_mobile'] = Configuration::get(self::PREFIX . 'np_out_phone');
			$address['email'] = Configuration::get(self::PREFIX . 'np_out_email');

			//$counterparty = exec::getout('counterparty');
			//if($counterparty == "ZZZ") $counterparty = np::SaveCounterpartySender($address, "Sender");
			$counterparty = np::SaveCounterpartySender($address, "Sender");

			//else{np::deleteCounterparty($counterparty); $counterparty = np::SaveCounterpartySender($address, "Recipient");}
			//np::UpdateCounterparty($counterparty, $address);

			//$CounterpartyOptions = np::getCounterpartyContactPersons($counterparty);
			//p($CounterpartyOptions);
			//$contact = (string)$CounterpartyOptions->data->item->Ref;


		}
		if (Tools::isSubmit('submitGET')) {
			$address['cityref'] = exec::getout('city');
			$counterparty = np::getCounterparties($address, "Sender");
			if ($counterparty) {
				//p((string)$xml->data->item->Ref);
				$sql = "UPDATE `" . _DB_PREFIX_ . "ecm_newpost_last` SET
                `counterparty` = '" . (string) $counterparty . "'
                WHERE `id_customer` = '-1'";
				Db::getInstance()->Execute($sql);
				$this->_html .= '
                <div class="bootstrap">
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                ' . $this->l('Counterparty for Sender has been created sucsefully') . '
                </div>
                </div>
                ';
			} else {
				$this->_html .= '
                <div class="bootstrap">
                <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">×</button>
                ' . $this->l('Please wait for Sender Counterparty created') . '
                </div>
                </div>
                ';
			}
		}
		if ($this->upgradeCheck('NP'))
			$this->_displayupgrade();
		$this->_cron();
		$this->_settings();
		$this->_html .= '</form>';

		$this->_displayabout();

		return $this->_html;
	}

	public
	function hookExtraCarrier($params) {
		$np_id = Configuration::get(self::PREFIX . $this->name);
		$cart_np = exec::GetCartNP($params['cart']->id);
	/*	$params['cart']->id_carrier = $np_id;
		if ($np_id == $params['cart']->id_carrier) {*/
			$cartdetails = exec::cartdetails($params['cart']->id);
			//$address = exec::CheckAddress($params['cart'], $np_id);
			$this->context->smarty->assign(array(
				'carrier' => $np_id,
				'np_id' => $np_id,
				'cart_id' => $params['cart']->id,
				'customer_id' => $params['cart']->id_customer,
				'cart_np' => $cart_np,
				'cartdetails' => $cartdetails,
				'fixcost' => Configuration::get(self::PREFIX . 'np_chk_fixcost'),
				'fill' => Configuration::get(self::PREFIX . 'np_fill'),
				'show' => Configuration::get(self::PREFIX . 'np_show'),
				'ac' => Configuration::get(self::PREFIX . 'np_ac'),
				'pnp' => (int)Db::getInstance()->GetValue("
					SELECT ms.`id_shop` FROM `"._DB_PREFIX_."module` m
					LEFT JOIN `"._DB_PREFIX_."module_shop` ms ON ms.`id_module` = m.`id_module`
					WHERE m.`name` = 'ecm_cashnovaposta'"),
				'Areas' => exec::areaList2(),
				'Citys' => exec::cityList2($cart_np['area']),
				'Wares' => exec::wareList2($cart_np['city']),
				'modulesdir' => _MODULE_DIR_ . $this->name
			));
			return $this->display(__FILE__, 'changeshipping.tpl');
	/*	}
		else{
		}*/
	}

	public
	function hookdisplayOrderDetail($params) {
		$np_id = Configuration::get(self::PREFIX . $this->name);
		$order_details = exec::GetOrderDetails($params['order']->id);
		$this->context->smarty->assign(array(
			'np_id' => $np_id,
			'order_details' => $order_details,
			'area' => exec::getareaname($order_details['area']),
			'city' => exec::getcityname($order_details['city']),
			'ware' => exec::getwarename($order_details['ware']),
			'modulesdir' => _MODULE_DIR_ . $this->name
		));
		return $this->display(__FILE__, 'orderdetail.tpl');
	}


	public
	function hookdisplayAdminOrder($params) {
		//p($params['cart']);
		//$id_order = $params['id_order'];
		$order_details = exec::GetOrderDetails($params['id_order']);
		$this->context->smarty->assign(array(
			'np_id' => Configuration::get(self::PREFIX . $this->name),
			'id_order' => $params['id_order'],
			'order_details' => $order_details,
			'address' => exec::GetAddresDelivery($order_details['id_address_delivery'], $params['id_order']),
			'api_key' => Configuration::get('ecm_np_API_KEY'),
			'weght' => Configuration::get(self::PREFIX . 'np_weght'),
			'vweght' => Configuration::get(self::PREFIX . 'np_vweght'),
			'format' => Configuration::get(self::PREFIX . 'np_format'),
			'modulesdir' => _MODULE_DIR_ . $this->name,
			'Areas' => exec::areaList2(),
			'Citys' => exec::cityList2($order_details['area']),
			'Wares' => exec::wareList2($order_details['city']),
			'ware' => exec::getwarename($order_details['ware']),
			'ServiceType' => Configuration::get(self::PREFIX . 'np_ServiceType'),
			'ServiceTypes' => Exec::simpleList('ServiceTypes'),
			'CargoType' => Configuration::get(self::PREFIX . 'np_CargoType'),
			'CargoTypes' => Exec::simpleList('CargoTypes'),
			'data' => (date("H:i") >= Configuration::get(self::PREFIX.'np_time'))? date("d.m.Y",(time()+3600*24)) : date("d.m.Y"),
			'TrimMsg' => Configuration::get(self::PREFIX . 'np_TrimMsg')
		));
		return $this->display(__FILE__, 'displayAdminOrder.tpl');
	}

	public
	function hookactionPaymentConfirmation($params) {
		//exec::fixAddress((int) $params['order']->id);
		//exec::copyOrder((int) $params['order']->id);
		return true;
	}

	public
	function hookactionCartSave($params) {
		if (!Configuration::get(self::PREFIX . 'np_chk_fixcost'))
			if(isset($params['cart']->id))
				exec::fixCost((int) $params['cart']->id);
		return true;
	}

	public
	function hookactionValidateOrder($params) {
		exec::copyOrder((int) $params['order']->id);
		if(Configuration::get(self::PREFIX . 'np_SendNPmail') and $params['order']->id_carrier == Configuration::get(self::PREFIX . $this->name))npmail::sendnpmail((int) $params['order']->id);
		if(Configuration::get(self::PREFIX . 'np_SendNPadminmail') and $params['order']->id_carrier == Configuration::get(self::PREFIX . $this->name))npmail::sendnpadminmail((int) $params['order']->id);
		//exec::fixAddress((int) $params['order']->id);
		return true;
	}

	public
	function hookDisplayBackOfficeHeader() {
		if (method_exists($this->context->controller, 'addCSS'))
			$this->context->controller->addCSS(($this->_path) . 'css/ecm_novaposhta.css', 'all');
	}

	private
	function upgradeCheck($module) {

		global $cookie;

		$context = Context::getContext();
		if (!isset($context->employee) || !$context->employee->isLoggedBack())
			return;

		// Get module version info
		$mod_info = $this->version;
		$time = time();
		if ($this->_last_updated <= 0) {
			$time_up = Configuration::get('ECM_NP_UP');
			if (!Configuration::get('ECM_NP_UP')) {
				Configuration::updateValue('ECM_NP_UP', $time);
				$this->_last_updated = $time;
			} else {
				$this->_last_updated = $time_up;
			}
		}
		if ($time - $this->_last_updated > 86400) {
			$url = 'http://update.elcommerce.com.ua/version.xml';

			if (function_exists('curl_init')) {
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$mod = curl_exec($ch);
			}
			$xml = simplexml_load_string($mod);
			@$current_version = $xml->novaposhta->version;

			if ((string) $current_version > $this->version)
				return true;
			else
				return false;
		}
	}
}
