<?php
/**
 * @author    Musaffar Patel <musaffar.pate@gmail.com>
 * @copyright 2014 Musaffar Patel
 * @license   Commercial Single License
 */

class CFConfigController extends Module
{

	protected $sibling;

	public function __construct($sibling)
	{
		$this->sibling = $sibling;
	}

	public function renderExtraFieldInfoForm()
	{
		$fields = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Extra Fields'),
					'icon' => 'icon-list'
				),
				'submit' => array(
					'title' => $this->l('Manage Extra Fields'),
					'class' => 'btn btn-default pull-left',
					'icon' => 'icon-list',
					'name' => 'submit_',
				)
			),
		);

		$helper = new HelperForm();
		$helper->show_toolbar = true;
		$helper->title = 'Area based prices';

		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->module = $this->sibling;
		$helper->submit_action = 'editfields';
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->sibling->name.'&token='.$helper->token.'&editfields';
		$helper->token = Tools::getAdminTokenLite('AdminModules');

		return $helper->generateForm(array($fields));
	}

	public function renderCategoryList()
	{
		$categories = Category::getCategories(false, false, false, '', '', '');

		$this->fields_list = array(
			'id_category' => array(
				'title' => $this->l('Id'),
				'width' => 140,
				'type' => 'text',
			),
			'name' => array(
				'title' => $this->l('Name'),
				'width' => 140,
				'type' => 'text',
			),
		);
		$helper = new HelperList();

		$helper->shopLinkType = '';
		$helper->simple_header = false;
		$helper->actions = array('edit');

		$helper->identifier = 'id_category';
		$helper->show_toolbar = true;
		$helper->title = 'Categories';
		$helper->table = 'categories';
		$helper->token = Tools::getAdminTokenLite('AdminModules');

		$helper->toolbar_btn['new'] = array(
			'href' => AdminController::$currentIndex.'&configure='.$this->sibling->name.'&token='.$helper->token.'&editfields',
			'desc' => $this->l('Extra Fields')
		);

		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->sibling->name;

		if (_PS_VERSION_ >= 1.6)
		{
			$return = $this->renderExtraFieldInfoForm();
			$return .= $helper->generateList($categories, $this->fields_list);
		}
		else
			$return = $helper->generateList($categories, $this->fields_list);

		return $return;
	}

}