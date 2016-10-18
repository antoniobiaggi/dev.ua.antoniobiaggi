<?php
/**
 * @author    Musaffar Patel <musaffar.pate@gmail.com>
 * @copyright 2014 Musaffar Patel
 * @license   Commercial Single License
 */
class CFInstall
{

	public static function install()
	{
		self::_installDB();
		self::_installTab();
	}

	private static function _installTab()
	{
		$sql = 'SELECT COUNT(*) AS total_count FROM '._DB_PREFIX_.'tab WHERE class_name LIKE "AdminCategoryFields"';
		$result = Db::getInstance()->executeS($sql);

		if (isset($result[0]['total_count']) && $result[0]['total_count'] > 0) return true;

		$tab = new Tab();

		if (CFHelper::isVersion(array('1.5.2', '1.5.3')))
			$tab->name = 'Category Fields';
		else
		{
			foreach (Language::getLanguages(false) as $lang)
				$tab->name[(int)$lang['id_lang']] = 'Category Fields';
		}

		$tab->module = 'categoryfields';
		$tab->id_parent = 9; // Root tab
		$tab->class_name = 'AdminCategoryFields';
		$tab->active = 1;
		$tab->add();
	}

	private static function _installDB()
	{
		$return = true;
		$return &= Db::getInstance()->execute('
		CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'category_fields` (
		  `id_category_field` int(10) unsigned NOT NULL AUTO_INCREMENT,
		  `name` varchar(64) NOT NULL,
		  `id_shop` mediumint(8) unsigned NOT NULL,
		  PRIMARY KEY (`id_category_field`)
		)ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');

		$return &= Db::getInstance()->execute('
		CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'category_fields_content` (
		  `id_content` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `id_category_field` int(10) unsigned NOT NULL,
		  `id_category` int(10) NOT NULL,
		  `id_lang` int(10) unsigned NOT NULL,
		  `id_shop` int(10) unsigned NOT NULL,
		  `content` text NOT NULL,
		  `excerpt` text NOT NULL,
		  `collapsable` tinyint(3) unsigned NOT NULL,
		  PRIMARY KEY (`id_content`)
		)ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');

		$return &= Db::getInstance()->execute('
		CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'category_fields_lang` (
		  `id_category_field` int(11) unsigned NOT NULL,
		  `id_lang` int(10) unsigned NOT NULL,
		  `display_name` varchar(128) NOT NULL,
		  PRIMARY KEY (`id_category_field`,`id_lang`)
		)ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');

		return $return;
	}

}
