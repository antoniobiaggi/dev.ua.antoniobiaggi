<?php
/**
 * @author    Musaffar Patel <musaffar.pate@gmail.com>
 * @copyright 2014 Musaffar Patel
 * @license   Commercial Single License
 */

class CFEditFields extends Module
{
	protected $sibling;

	public function __construct($sibling)
	{
		$this->sibling = $sibling;
	}

	public function renderForm()
	{
		$default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		$fields_form = array();

		$fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->l('Reinsurance new block'),
			),
			'input' => array(
				array(
					'type' => 'file',
					'label' => $this->l('Image:'),
					'name' => 'image',
					'value' => true
				),
				array(
					'type' => 'textarea',
					'label' => $this->l('Text:'),
					'lang' => true,
					'name' => 'text',
					'cols' => 40,
					'rows' => 10
				)
			),
			'submit' => array(
				'title' => $this->l('   Save   '),
				'class' => 'button'
			)
		);

		$fields_form[1]['form'] = array(
			'legend' => array(
				'title' => $this->l('Reinsurance new block'),
			),
			'input' => array(
				array(
					'type' => 'file',
					'label' => $this->l('Image:'),
					'name' => 'image',
					'value' => true
				),
				array(
					'type' => 'textarea',
					'label' => $this->l('Text:'),
					'lang' => true,
					'name' => 'text',
					'cols' => 40,
					'rows' => 10
				)
			),
			'submit' => array(
				'title' => $this->l('   Save   '),
				'class' => 'button'
			)
		);


		$helper = new HelperForm();
		$helper->module = $this->sibling;
		$helper->identifier = $this->identifier;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		foreach (Language::getLanguages(false) as $lang)
			$helper->languages[] = array(
				'id_lang' => $lang['id_lang'],
				'iso_code' => $lang['iso_code'],
				'name' => $lang['name'],
				'is_default' => ($default_lang == $lang['id_lang'] ? 1 : 0)
			);

		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->sibling->name;
		$helper->default_form_language = $default_lang;
		$helper->allow_employee_form_lang = $default_lang;
		$helper->toolbar_scroll = true;
		$helper->title = $this->displayName;
		$helper->submit_action = 'saveblockreinsurance';
		$helper->toolbar_btn = array(
			'save' =>
				array(
					'desc' => $this->l('Save'),
					'href' => AdminController::$currentIndex.'&configure='.$this->sibling->name.'&save'.$this->sibling->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
				),
			'back' =>
				array(
					'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
					'desc' => $this->l('Back to list')
				)
		);
		return $helper->generateForm($fields_form);
	}

	public function renderFieldsList()
	{
		$id_lang = Context::getContext()->language->id;
		$fields = CategoryField::getFields($id_lang);

		$fields_list = array(
			'name' => array(
				'title' => $this->l('Internal Name'),
				'width' => 140,
				'type' => 'text',
			),
			'display_name' => array(
				'title' => $this->l('Display Name'),
				'width' => 140,
				'type' => 'text',
			)
		);

		$helper = new HelperList();
		$helper->shopLinkType = '';
		$helper->simple_header = false;
		$helper->token = Tools::getAdminTokenLite('AdminModules');

		$helper->actions = array('edit', 'delete');

		$helper->identifier = 'id_category_field';
		$helper->show_toolbar = true;
		$helper->title = 'Category Extra Fields';
		$helper->table = $this->sibling->name.'category_fields';

		$helper->toolbar_btn['new'] = array(
			'href' => AdminController::$currentIndex.'&configure='.$this->sibling->name.'&token='.$helper->token.'&addfield',
			'desc' => $this->l('Add new')
		);

		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->sibling->name;

		if (_PS_VERSION_ >= 1.6)
		{
			$return = $this->displayAddForm();
			$return .= $helper->generateList($fields, $fields_list);
			$return .= $this->renderBackToCategoriesLink();
		}
		else
		{
			$return = $helper->generateList($fields, $fields_list);
			$return .= $this->renderBackToCategoriesLink();
		}


		return $return;
	}

	public function renderBackToCategoriesLink()
	{
		$fields = array(
			'form' => array(
				'submit' => array(
					'title' => $this->l('Back to category list'),
					'class' => 'btn btn-default pull-left',
					'icon' => 'icon-list',
					'name' => 'submit_',
				)
			),
		);

		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->title = '';

		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->module = $this->sibling;
		$helper->submit_action = '';
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->sibling->name.'&token='.$helper->token;
		$helper->token = Tools::getAdminTokenLite('AdminModules');

		return $helper->generateForm(array($fields));
	}

	public function displayAddForm()
	{
		$default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		$fields_form = array();

		if (Tools::getValue('id_category_field') != '')
			$extra_field = CategoryField::getField(Tools::getValue('id_category_field'));

		$fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->l('Add New Category Field'),
			),
			'input' => array(
				array(
					'name' => 'id_category_field',
					'type' => 'hidden',
					'label' => $this->l('Name:')
				),
				array(
					'name' => 'name',
					'type' => 'text',
					'label' => $this->l('Name:')
				),
				array(
					'name' => 'display_name',
					'type' => 'text',
					'label' => $this->l('Display Name:'),
					'lang' => true
				)
			),
			'submit' => array(
				'title' => $this->l('   Save   '),
				'class' => 'button'
			)
		);

		$helper = new HelperForm();
		$helper->module = $this->sibling;
		$helper->identifier = $this->identifier;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		foreach (Language::getLanguages(false) as $lang)
			$helper->languages[] = array(
				'id_lang' => $lang['id_lang'],
				'iso_code' => $lang['iso_code'],
				'name' => $lang['name'],
				'is_default' => ($default_lang == $lang['id_lang'] ? 1 : 0)
			);

		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->sibling->name;
		$helper->default_form_language = $default_lang;
		$helper->allow_employee_form_lang = $default_lang;
		$helper->toolbar_scroll = true;
		$helper->title = $this->displayName;
		$helper->submit_action = 'processaddfield';
		$helper->toolbar_btn = array(
			'save' =>
				array(
					'desc' => $this->l('Save'),
					'href' => AdminController::$currentIndex.'&configure='.$this->sibling->name.'&save'.$this->sibling->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
				),
			'back' =>
				array(
					'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
					'desc' => $this->l('Back to list')
				)
		);

		if (isset($extra_field))
		{
			$helper->fields_value['id_category_field'] = $extra_field->id;
			$helper->fields_value['name'] = $extra_field->name;
			foreach (Language::getLanguages(false) as $lang)
				$helper->fields_value['display_name'][$lang['id_lang']] = $extra_field->translations[$lang['id_lang']];
		}
		else
		{
			$helper->fields_value['id_category_field'] = '';
			$helper->fields_value['name'] = '';
			foreach (Language::getLanguages(false) as $lang)
				$helper->fields_value['display_name'][$lang['id_lang']] = '';
		}

		return $helper->generateForm($fields_form);
	}

	public function processAddField()
	{
		$field = new TCategoryField();
		$field->name = Tools::getValue('name');

		Tools::safePostVars();
		foreach ($_POST as $key => $value)
		{
			if (strpos($key, 'display_name_') !== false)
			{
				$arr_parts = explode('_', $key);
				$id_lang = end($arr_parts);
				$field->translations[$id_lang] = $value;
			}
		}
		$field->name = Tools::getValue('name');

		if (Tools::getValue('id_category_field') != '')
			CategoryField::update(Tools::getValue('id_category_field'), $field, Context::getContext()->shop->id);
		else
			CategoryField::add($field, Context::getContext()->shop->id);

		Tools::redirectAdmin('/'.$this->sibling->module_base_url.'&editfields');
	}


	public function displayForm()
	{
		return $this->renderFieldsList();
	}

	public function deleteExtraField()
	{
		CategoryField::deleteField(Tools::getValue('id_category_field'));
	}

}
