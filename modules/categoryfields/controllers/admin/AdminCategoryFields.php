<?php
/**
 * @author    Musaffar Patel <musaffar.pate@gmail.com>
 * @copyright 2014 Musaffar Patel
 * @license   Commercial Single License
 */

class AdminCategoryFieldsController extends AdminModulesController
{
	public $module_base_url;

	private function set_module_base_admin_url()
	{
		if (!defined('_PS_ADMIN_DIR_'))
		{
			$this->admin_mode = false;
			return false;
		}
		else
		{
			$this->admin_mode = true;
			$arr_temp = explode('/', _PS_ADMIN_DIR_);
			if (count($arr_temp) <= 1) $arr_temp = explode('\\', _PS_ADMIN_DIR_);
			$dir_name = end($arr_temp);
			$this->module_base_url = $dir_name.'/index.php?controller=adminmodules&configure=categoryfields&token='.Tools::getAdminTokenLite('AdminModules');
		}
	}


	public function initContent()
	{
		$this->set_module_base_admin_url();
		Tools::redirectAdmin('/'.$this->module_base_url);
	}


}