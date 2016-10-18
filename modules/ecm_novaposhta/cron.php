<?php
include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
include(dirname(__FILE__).'/ecm_novaposhta.php');
require_once(_PS_MODULE_DIR_ . 'ecm_novaposhta/classes/api2.php');
require_once(_PS_MODULE_DIR_ . 'ecm_novaposhta/classes/exec.php');



if (isset($_GET['secure_key']))
{
	$secureKey = md5(_COOKIE_KEY_.Configuration::get('PS_SHOP_NAME'));
	if (!empty($secureKey) && $secureKey === $_GET['secure_key'])
	{
			$arr = np::warehouse();
			$arr_c = np::city();
			$arr_a = np::area();
			Exec::warehouse($arr, $arr_c, $arr_a);
			echo 'OK';
	}else{
		echo $secureKey;
		echo $_GET['secure_key'];
	}
}else{
	echo 'no secure_key';
	}
