<?php
/**
 * @author    Musaffar Patel <musaffar.pate@gmail.com>
 * @copyright 2014 Musaffar Patel
 * @license   Commercial Single License
 */

class CFFrontController extends Module
{

	protected $sibling;

	public function __construct(&$sibling)
	{
		parent::__construct();
		if ($sibling !== null)
			$this->sibling = &$sibling;
	}

	public function hookHeader()
	{
		$allowed_controllers = array('category');
		$_controller = $this->context->controller;

		if (isset($_controller->php_self) && in_array($_controller->php_self, $allowed_controllers))
		{
			$this->sibling->context->controller->addJS($this->sibling->_path.'js/front/categoryfields.js');
			$this->sibling->context->controller->addCSS($this->sibling->_path.'css/front/categoryfields.css');
		}
	}
	
	private function _tinymceCleanup($html)
	{
		$html = str_replace('&nbsp;', '', $html);
		return $html;
	}

	public function render($module_file, $params = array())
	{
		$id_lang = Context::getContext()->language->id;
		if (!isset($params['name']) && $params['name'] == '') return '';
		if (Tools::getValue('id_category') == '' && (!isset($params['id_category']) && $params['id_category'] == ''))
			return '';

		$id_category = (int)Tools::getValue('id_category');
		$collapsible = true;

		$cat_field_content = CategoryField::getFieldContentByName($params['name'], $id_category);
		
		if (isset($cat_field_content->content_collection[$id_lang]->content))
		{
			$this->sibling->smarty->assign(array(
				'content' => $this->_tinymceCleanup($cat_field_content->content_collection[$id_lang]->content),
				'excerpt' => $this->_tinymceCleanup($cat_field_content->content_collection[$id_lang]->excerpt),
				'collapsible' => $cat_field_content->content_collection[$id_lang]->collapsable,
			));
		}
		return $this->sibling->display($module_file, 'views/templates/front/categoryfield.tpl');
	}

}