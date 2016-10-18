<?php
/**
 * @author    Musaffar Patel <musaffar.pate@gmail.com>
 * @copyright 2014 Musaffar Patel
 * @license   Commercial Single License
 */
if (!defined('_PS_VERSION_'))
	exit;

include_once(_PS_MODULE_DIR_.'/categoryfields/lib/bootstrap.php');

class CategoryFields extends Module
{

	public $module_base_url;
	public $admin_mode = false;

	protected $controller_front;
	protected $controller_config;
	protected $controller_fields;

	public function __construct()
	{
		$this->name = 'categoryfields';
		$this->tab = 'others';
		$this->version = '1.0.2';
		$this->author = 'Musaffar Patel';
		$this->need_instance = 0;
		$this->module_key = '905b029390317dd0b3c0d631036ffbee';

		parent::__construct();
		$this->displayName = $this->l('Category Fields');
		$this->description = $this->l('Category Fields display additional rich content fields on your category pages');
		$this->bootstrap = true;

		$this->set_module_base_admin_url();

		/* Instantiate various controllers */
		$this->controller_front = new CFFrontController($this);
		$this->controller_config = new CFConfigController($this);
		$this->controller_fields = new CFEditFields($this);
		$this->controller_cat_fields = new CFEditCategoryFields($this);
	}

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
			$this->module_base_url = $dir_name.'/'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules');
		}
	}

	public function install()
	{
		if (parent::install() == false
			|| !$this->install_module()
			|| !$this->registerHook('categoryField')
			|| !$this->registerHook('displayHeader'))
			return false;
		return true;
	}

	public function install_module()
	{
		CFInstall::install();
		return true;
	}

	public function route()
	{
		/* List Extra Fields */
		if (Tools::getIsset('editfields'))
			return $this->controller_fields->displayForm();

		/* Edit Extra Field Form */
		if (Tools::getIsset('updatecategoryfieldscategory_fields'))
			return $this->controller_fields->displayAddForm();

		/* Add Extra Field Form */
		if (Tools::getIsset('addfield'))
			return $this->controller_fields->displayAddForm();

		/* Delete Extra Field Pocess */
		if (Tools::getIsset('deletecategoryfieldscategory_fields'))
			return $this->controller_fields->deleteExtraField();

		/* Add Extra Field Process */
		if (Tools::getIsset('processaddfield'))
			return $this->controller_fields->processAddField();

		/* Category Extra Fields Form */
		if (Tools::getIsset('updatecategories'))
			return $this->controller_cat_fields->displayForms();

		/* Category Field Contents Process */
		if (Tools::getIsset('processcategoryfields'))
			return $this->controller_cat_fields->save();
	}

	public function getContent()
	{
		$result = $this->route();
		if (!$result)
			return $this->controller_config->renderCategoryList();
		else
			return $result;
	}

	public function hookDisplayHeader($params)
	{
		$this->controller_front->hookHeader();
	}

	public function hookCategoryField($params)
	{
		return $this->controller_front->render(__FILE__, $params);
	}
}