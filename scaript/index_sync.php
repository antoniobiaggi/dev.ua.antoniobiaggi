<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

define('HTTP_CATALOG', 'http://abs/');

define('DIR_SYSTEM', '/home/lemb3/dev.ua.antoniobiaggi.com/www/scaript/system/');
define('DIR_UPLOAD', '/home/lemb3/dev.ua.antoniobiaggi.com/www/scaript/system/storage/upload/');
define('DIR_DOWNLOAD', '/home/lemb3/dev.ua.antoniobiaggi.com/www/scaript/system/storage/download/');
define('DIR_DATA_CRON', '/home/lemb3/dev.ua.antoniobiaggi.com/www/scaript/dta/');

// Configuration
if (is_file('../config/settings.inc.php')) {
	require_once('../config/settings.inc.php');
}

require_once(DIR_SYSTEM . 'library/db/mysqli.php');
require_once(DIR_SYSTEM . 'library/db.php');

require_once(DIR_SYSTEM . 'prodex_import_export.php');

// Database
$db = new DB('mysqli', _DB_SERVER_, _DB_USER_, _DB_PASSWD_, _DB_NAME_, 3306);

$ControllerModuleProdexImportExport = new ControllerModuleProdexImportExport($db);
if(isset($_GET['q'])){
	$ControllerModuleProdexImportExport->cron_quantity();
}elseif(isset($_GET['a'])){
	$ControllerModuleProdexImportExport->cron_attr();
}else{
	$ControllerModuleProdexImportExport->cron_product();
}