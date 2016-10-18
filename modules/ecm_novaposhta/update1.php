<?php
//Нова Пошта
set_time_limit(0);
define('_DS', DIRECTORY_SEPARATOR);
include(dirname(__FILE__) . '/../../config/config.inc.php');
require_once(_PS_MODULE_DIR_.'ecm_novaposhta/classes/exec.php');
require_once(_PS_MODULE_DIR_.'ecm_novaposhta/classes/api2.php');
require_once(_PS_MODULE_DIR_.'ecm_novaposhta/classes/areaRu.php');
require_once(_PS_MODULE_DIR_.'ecm_novaposhta/ecm_novaposhta.php');

if (!Configuration::get('ecm_np_FreeLimit')) Configuration::updateValue('ecm_np_FreeLimit', 99999);

$sql = "ALTER TABLE `"._DB_PREFIX_."ecm_newpost_cart` CHANGE `cost` `cost` DECIMAL( 10, 4 ) NOT NULL DEFAULT '25',
CHANGE `width` `width` DECIMAL( 10, 4 ) NOT NULL ,
CHANGE `height` `height` DECIMAL( 10, 4 ) NOT NULL ,
CHANGE `depth` `depth` DECIMAL( 10, 4 ) NOT NULL ,
CHANGE `weight` `weight` DECIMAL( 10, 4 ) NOT NULL;
";
Db::getInstance()->Execute($sql);

$sql = "describe `"._DB_PREFIX_."ecm_newpost_orders`";
$fields = Db::getInstance()->ExecuteS($sql);
$field = $sql =array();
foreach ($fields as $rec) $field[]=$rec['Field'];
//p($field);
$sql_o = $sql_r = "ALTER TABLE `"._DB_PREFIX_."ecm_newpost_orders` ";
if (!in_array('width', $field)) $sql[]="ADD `width` DECIMAL( 10, 4 ) NOT NULL ";
if (!in_array('height', $field)) $sql[]="ADD `height` DECIMAL( 10, 4 ) NOT NULL ";
if (!in_array('depth', $field)) $sql[]="ADD `depth` DECIMAL( 10, 4 ) NOT NULL ";
if (!in_array('weight', $field)) $sql[]="ADD `weight` DECIMAL( 10, 4 ) NOT NULL ";
if (!in_array('vweight', $field)) $sql[]="ADD `vweight` DECIMAL( 10, 4 ) NOT NULL ";
if (!in_array('insurance', $field)) $sql[]="ADD `insurance` DECIMAL( 10, 4 ) NOT NULL ";
if (!in_array('cod_value', $field)) $sql[]="ADD `cod_value` DECIMAL( 10, 4 ) NOT NULL ";
if (!in_array('description', $field)) $sql[]="ADD `description` VARCHAR( 100 ) NOT NULL ";
if (!in_array('pack', $field)) $sql[]="ADD `pack` VARCHAR( 100 ) NOT NULL ";
if (!in_array('senderpaynal', $field)) $sql[]="ADD `senderpaynal` TINYINT NOT NULL ";
if (!in_array('msg', $field)) $sql[]="ADD `msg` text NOT NULL ";
if (!in_array('seats_amount', $field)) $sql[]="ADD `seats_amount` INT NOT NULL ";
if (!in_array('firstname', $field)) $sql[]="ADD `firstname` VARCHAR( 32 ) NOT NULL ";
if (!in_array('lastname', $field)) $sql[]="ADD `lastname` VARCHAR( 32 ) NOT NULL ";
if (!in_array('phone', $field)) $sql[]="ADD `phone` VARCHAR( 32 ) NOT NULL ";
if (!in_array('x', $field)) $sql[]="ADD `x` DOUBLE( 16, 10 ) NOT NULL ";
if (!in_array('y', $field)) $sql[]="ADD `y` DOUBLE( 16, 10 ) NOT NULL ";
if ( in_array('PackingNumber', $field)) $sql[]= "CHANGE `PackingNumber` `PackingNumber` BIGINT NOT NULL";
if (!in_array('PackingNumber', $field)) $sql[]="ADD `PackingNumber` BIGINT NOT NULL ";
$sql_r .= implode(",", $sql);
Db::getInstance()->Execute($sql_r);
if($sql_r != $sql_o) p($sql_r);

$sql = "describe `"._DB_PREFIX_."ecm_newpost_last`";
$fields = Db::getInstance()->ExecuteS($sql);
$field = $sql =array();
foreach ($fields as $rec) $field[]=$rec['Field'];
//p($field);
$sql_o = $sql_r = "ALTER TABLE `"._DB_PREFIX_."ecm_newpost_last` ";
if (!in_array('firstname', $field)) $sql[]="ADD `firstname` VARCHAR( 32 ) NOT NULL ";
if (!in_array('lastname', $field)) $sql[]="ADD `lastname` VARCHAR( 32 ) NOT NULL ";
if (!in_array('phone', $field)) $sql[]="ADD `phone` VARCHAR( 32 ) NOT NULL ";
$sql_r .= implode(",", $sql);
Db::getInstance()->Execute($sql_r);
if($sql_r != $sql_o) p($sql_r);

$sql = "describe `"._DB_PREFIX_."ecm_newpost_cart`";
$fields = Db::getInstance()->ExecuteS($sql);
$field = $sql =array();
foreach ($fields as $rec) $field[]=$rec['Field'];
//p($field);
$sql_o = $sql_r = "ALTER TABLE `"._DB_PREFIX_."ecm_newpost_cart` ";
if (!in_array('vweight', $field)) $sql[]="ADD `vweight` DECIMAL( 10, 4 ) NOT NULL ";
if (!in_array('firstname', $field)) $sql[]="ADD `firstname` VARCHAR( 32 ) NOT NULL ";
if (!in_array('lastname', $field)) $sql[]="ADD `lastname` VARCHAR( 32 ) NOT NULL ";
if (!in_array('phone', $field)) $sql[]="ADD `phone` VARCHAR( 32 ) NOT NULL ";
if (!in_array('costredelivery', $field)) $sql[]="ADD `costredelivery` DOUBLE( 10, 4 ) NOT NULL ";
if (!in_array('costpack', $field)) $sql[]="ADD `costpack` DOUBLE( 10, 4 ) NOT NULL ";
if (!in_array('total_wt', $field)) $sql[]="ADD `total_wt` DOUBLE( 10, 4 ) NOT NULL ";
$sql_r .= implode(",", $sql);
Db::getInstance()->Execute($sql_r);
if($sql_r != $sql_o) p($sql_r);



$module = new ecm_novaposhta();
//Configuration::updateValue('_home_', 1);
//Configuration::updateValue('_QTP_',1);
//Configuration::updateValue('_FU_',1);
$idTabs = array();
$idTabs[] = Tab::getIdFromClassName('AdminNP');
$idTabs[] = Tab::getIdFromClassName('AdminNPLog');
$idTabs[] = Tab::getIdFromClassName('AdminNPMain');
foreach ($idTabs as $idTab) {
	if ($idTab) {
		$tab = new Tab($idTab);
		$tab->delete();
	}
}

// $parent_tab = new Tab();
// $parent_tab->class_name = 'AdminNPMain';
// $parent_tab->id_parent = 0;
// $parent_tab->module = $module->name;
// $parent_tab->name[(int) (Configuration::get('PS_LANG_DEFAULT'))] = $module->l('NP Delivery');
// $parent_tab->add();

$id = Tab::getIdFromClassName('AdminParentShipping');
p($id);
// settings
$tab = new Tab();
$tab->class_name = 'AdminNP';
$tab->name[(int) (Configuration::get('PS_LANG_DEFAULT'))] = $module->l('NP Settings');
//$tab->id_parent = $parent_tab->id;
$tab->id_parent = $id;
$tab->module = $module->name;
$tab->add();

// log
$tab = new Tab();
$tab->class_name = 'AdminNPLog';
$tab->name[(int) (Configuration::get('PS_LANG_DEFAULT'))] = $module->l('NP Log');
//$tab->id_parent = $parent_tab->id;
$tab->id_parent = $id;
$tab->module = $module->name;
$tab->add();

$module->hookDisplayBackOfficeHeader();
$module->registerHook('actionPaymentConfirmation');
$module->registerHook('actionCartSave');
p('Обновление модуля успешно завершено');

?>
