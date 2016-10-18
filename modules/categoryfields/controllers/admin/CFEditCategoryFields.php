<?php
/**
 * @author    Musaffar Patel <musaffar.pate@gmail.com>
 * @copyright 2014 Musaffar Patel
 * @license   Commercial Single License
 */

class CFEditCategoryFields extends Module
{
	protected $sibling;

	public function __construct($sibling)
	{
		$this->sibling = $sibling;
	}

	public function displayForms()
	{
		return $this->renderForm();
	}

	protected function renderForm()
	{
		$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		$fields = CategoryField::getFields($id_lang);
		$helper = new HelperForm();
		$fields_form = array();

		if (count($fields) == 0)
		{
			//@Todo: print error
			return '';
		}

		$i = 0;
		foreach ($fields as $key => $value)
		{
			$fields_form[$i]['form'] = array(
				'legend' => array(
					'title' => $value['display_name'],
				),
				'input' => array(
					array(
						'name' => 'id_category',
						'type' => 'hidden'
					),
					array(
						'name' => 'content_'.$value['id_category_field'],
						'type' => 'textarea',
						'label' => $this->l('Text:'),
						'lang' => true,
						'cols' => 90,
						'rows' => 10,
						'autoload_rte' => true
					),
					array(
						'name' => 'excerpt_'.$value['id_category_field'],
						'type' => 'textarea',
						'label' => $this->l('Excerpt:'),
						'lang' => true,
						'cols' => 90,
						'rows' => 6,
						'autoload_rte' => true
					),
					array(
						'type' => 'checkbox',
						'name' => 'collapsible_'.$value['id_category_field'],
						'values' => array(
							'query' => array(
								array(
									'id' => 'collapsible',
									'name' => 'collapsible',
									'val' => '1',
								),
							),
							'id' => 'id',
							'name' => 'name'
						)

					)
				),
				'submit' => array(
					'title' => $this->l('   Save   '),
					'class' => 'button'
				)
			);
			$i++;
		}

		$helper->module = $this->sibling;
		$helper->identifier = $this->identifier;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		foreach (Language::getLanguages(false) as $lang)
			$helper->languages[] = array(
				'id_lang' => $lang['id_lang'],
				'iso_code' => $lang['iso_code'],
				'name' => $lang['name'],
				'is_default' => ($id_lang == $lang['id_lang'] ? 1 : 0)
			);

		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->sibling->name;
		$helper->default_form_language = $id_lang;
		$helper->allow_employee_form_lang = $id_lang;
		$helper->toolbar_scroll = true;
		$helper->title = $this->displayName;
		$helper->submit_action = 'processcategoryfields';
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

		$category_fields = CategoryField::getCatgoryFields(Tools::getValue('id_category'));

		$helper->fields_value['id_category'] = Tools::getValue('id_category');

		foreach ($fields as $key => $value)
		{
			foreach (Language::getLanguages(false) as $lang)
			{
				if (isset($category_fields[$value['id_category_field']]))
				{
					$helper->fields_value['content_'.$value['id_category_field']][$lang['id_lang']] = $category_fields[$value['id_category_field']]->content_collection[$lang['id_lang']]->content;
					$helper->fields_value['excerpt_'.$value['id_category_field']][$lang['id_lang']] = $category_fields[$value['id_category_field']]->content_collection[$lang['id_lang']]->excerpt;
					$helper->fields_value['collapsible_'.$value['id_category_field'].'_collapsible'] = $category_fields[$value['id_category_field']]->content_collection[$lang['id_lang']]->collapsable;
				}
				else
				{
					$helper->fields_value['content_'.$value['id_category_field']][$lang['id_lang']] = '';
					$helper->fields_value['excerpt_'.$value['id_category_field']][$lang['id_lang']] = '';
					$helper->fields_value['collapsible_'.$value['id_category_field']][$lang['id_lang']] = '';
				}
			}
			$i++;
		}
		return $helper->generateForm($fields_form);
	}
	
	public function save()
	{
		$category_field_collection = array();

		Tools::safePostVars();

		foreach ($_POST as $key => $value)
		{
			$arr_temp = explode('_', $key);
			if (count($arr_temp) > 2)
			{
				$id_category_field = $arr_temp[1];
				$id_lang = $arr_temp[2];

				$cf_content_value = new TCategoryFieldContentValue();
				switch ($arr_temp[0])
				{
					case 'excerpt':
						$varname = 'excerpt';
						break;
					case 'content':
						$varname = 'content';
						break;
				}

				if (isset($category_field_collection[$id_category_field]) && $category_field_collection[$id_category_field] instanceof TCategoryFieldContent)
				{
					if (isset($category_field_collection[$id_category_field]->content_collection[$id_lang]))
						$category_field_collection[$id_category_field]->content_collection[$id_lang]->$varname = Tools::htmlentitiesDecodeUTF8($value);
					else
					{
						$cf_content_value = new TCategoryFieldContentValue();
						$cf_content_value->$varname = Tools::htmlentitiesDecodeUTF8($value); //html_entity_decode($value);
						$category_field_collection[$id_category_field]->content_collection[$id_lang] = $cf_content_value;
					}
				}
				else
				{
					$cf_content = new TCategoryFieldContent();
					$cf_content->id_category_field = $arr_temp[1];
					$cf_content->id_category = Tools::getValue('id_category');

					$cf_content_value = new TCategoryFieldContentValue();
					$cf_content_value->$varname = Tools::htmlentitiesDecodeUTF8($value);;

					$cf_content->content_collection[$id_lang] = $cf_content_value;
					$category_field_collection[$id_category_field] = $cf_content;
				}
			}
		}
		

		foreach ($category_field_collection as &$cf1)
		{
			foreach ($cf1->content_collection as &$cf2)
				$cf2->collapsable = (int)Tools::getValue('collapsible_'.$cf1->id_category_field.'_collapsible');
		}
		foreach ($category_field_collection as $key => $cfield)
			CategoryField::saveCategoryField($cfield);
	}


}
