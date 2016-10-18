<?php
//нова пошта
//5C3D6-80F0A-18AA2-56DC7-D41CF
set_time_limit(0);
define('_DS', DIRECTORY_SEPARATOR);
$SELF = 'ecm_novaposhta';
include(dirname(__FILE__).'/../../config/config.inc.php');
require_once(_PS_MODULE_DIR_.$SELF._DS.$SELF.'.php');
$np = new ecm_novaposhta();
$html= '<fieldset class="space">
			<form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
            <legend>' . $np->l('Новый') . '</legend>
            <div class="col-xs-12">
            <label>' . $np->l('Licension key') . '</label>
            <div class="margin-form">
            <input type="text" style="width: 270px" name="LIC_KEY" placeholder="' . $np->l('Licension key') . '" required
            value=""/>
            <p class="clear">' . $np->l('Enter your Licension key ') . '</p>
            </div>
            <center><hr>
            <input class="button" type="submit" name="submitLIC" value="' . $np->l('Save') . '" />
            </center>
            ';

 echo($html);
 if (Tools::isSubmit('submitLIC')) {
			$pattern = '/^[0-9A-Fa-f]{5}\-[0-9A-Fa-f]{5}\-[0-9A-Fa-f]{5}\-[0-9A-Fa-f]{5}\-[0-9A-Fa-f]{5}$/';
			//$lic_key = Configuration::get('ecm_np_LIC_KEY');
			//if (empty($lic_key))
				$lic_key = Tools::getValue('LIC_KEY');
			preg_match($pattern, $lic_key, $matches);
			if (sizeof($matches)){
				Configuration::updateValue('ecm_np_LIC_KEY', $lic_key);
				unlink(_PS_MODULE_DIR_.$SELF._DS.'key.lic');
				echo( '
                <div class="bootstrap">
                <div class="alert alert-success">
                Успех!!!
                </div>
                </div>
                ');}
			else {
				echo( '
                <div class="bootstrap">
                <div class="alert alert-danger">
                <btn btn-default button type="btn btn-default button" class="close" data-dismiss="alert">×</btn btn-default button>
                Укажите валидный лицензионный ключ!!!
                </div>
                </div>
                ');
			}
		}
?>


