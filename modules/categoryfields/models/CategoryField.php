<?php
/**
 * @author    Musaffar Patel <musaffar.pate@gmail.com>
 * @copyright 2014 Musaffar Patel
 * @license   Commercial Single License
 */
if (!defined('_PS_VERSION_'))
	exit;

class CategoryField
{
	/** @var integer Unique ID */
	public $id_category_field;

	/** @var integer Shop ID */
	public $id_shop;

	/** @var string Unit Name */
	public $name;

	/** @var string Display name */
	public $display_name;

	public static $definition = array(
		'table' => 'category_fields',
		'primary' => 'id_category_fields',
		'multilang' => true,
		'fields' => array(
			'id_shop'     =>	array(
				'type' => self::TYPE_INT,
			),
			'name'     =>	array(
				'type' => self::TYPE_STRING,
				'validate' => 'isMessage',
				'size' => 32,
				'required' => true
			),
			'display_name'  =>	array(
				'type' => self::TYPE_STRING,
				'validate' => 'isMessage',
				'size' => 128,
				'required' => true,
				'lang' => true
			),
		)
	);

	public static function getFields($id_lang = 1)
	{
		$sql = 'SELECT * FROM
				'._DB_PREFIX_.'category_fields cf
				INNER JOIN '._DB_PREFIX_.'category_fields_lang cfl ON cf.id_category_field = cfl.id_category_field AND cfl.id_lang = '.(int)$id_lang;
		$fields = Db::getInstance()->executeS($sql);
		return $fields;
	}

	/**
	 * @param integer $id_category_field
	 * @return TCategoryField
	 */
	public static function getField($id_category_field)
	{
		$sql = 'SELECT * FROM
				'._DB_PREFIX_.'category_fields cf
				INNER JOIN '._DB_PREFIX_.'category_fields_lang cfl ON cf.id_category_field = cfl.id_category_field AND cf.id_category_field = '.(int)$id_category_field;
		$fields = Db::getInstance()->executeS($sql);

		if (count($fields) > 0)
		{
			$category_field = new TCategoryField();
			$category_field->id = $fields[0]['id_category_field'];
			$category_field->name = $fields[0]['name'];

			foreach ($fields as $key => $value)
				$category_field->translations[$value['id_lang']] = $value['display_name'];
		}
		return $category_field;
	}

	public static function add(TCategoryField $field, $id_shop)
	{
		Db::getInstance()->insert('category_fields', array(
			'id_shop' => (int)$id_shop,
			'name' => pSQL(Tools::getValue('name'))
		));
		$category_field_id = Db::getInstance()->Insert_ID();

		foreach ($field->translations as $key => $value)
		{
			Db::getInstance()->insert('category_fields_lang', array(
				'id_category_field' => $category_field_id,
				'id_lang' => (int)$key,
				'display_name' => pSQL($value)
			));
		}
	}

	public static function update($id_category_field, TCategoryField $field, $id_shop)
	{
		Db::getInstance()->update('category_fields', array(
				'name' => pSQL(Tools::getValue('name'))
			),
			'id_category_field = '.(int)$id_category_field
		);
		$sql = 'DELETE FROM '._DB_PREFIX_.'category_fields_lang WHERE id_category_field = '.(int)$id_category_field;
		Db::getInstance()->execute($sql);
		foreach ($field->translations as $key => $value)
		{
			Db::getInstance()->insert('category_fields_lang', array(
				'id_category_field' => $id_category_field,
				'id_lang' => (int)$key,
				'display_name' => pSQL($value)
			));
		}
	}

	public static function getCatgoryFields($id_category)
	{
		$sql = 'SELECT
		            cf.name,
		            cfl.display_name,
		            cfc.id_lang,
		            cfc.content,
		            cfc.excerpt,
		            cfc.collapsable,
		            cfc.id_category_field,
		            cfc.id_category
				FROM '._DB_PREFIX_.'category_fields_content cfc
		        INNER JOIN '._DB_PREFIX_.'category_fields_lang cfl ON cfc.id_category_field = cfl.id_category_field AND cfl.id_lang = cfc.id_lang
		        INNER JOIN '._DB_PREFIX_.'category_fields cf ON cfc.id_category_field = cf.id_category_field
				WHERE cfc.id_category = '.(int)$id_category.'
				AND cfc.id_shop = '.(int)Context::getContext()->shop->id;
		
		$result = Db::getInstance()->executeS($sql);
		$category_fields_collection = array();

		if ($result)
		{
			foreach ($result as $key => $row)
			{
				if (isset($category_fields_collection[$row['id_category_field']]))
				{
					$category_content = new TCategoryFieldContentValue();
					$category_content->display_name = $row['display_name'];
					$category_content->excerpt = $row['excerpt'];
					$category_content->content = $row['content'];
					$category_content->collapsable = $row['collapsable'];
					$category_fields_collection[$row['id_category_field']]->content_collection[$row['id_lang']] = $category_content;
				}
				else
				{
					$category_field = new TCategoryFieldContent();
					$category_field->id_category_field = $row['id_category_field'];
					$category_field->id_category = $row['id_category'];
					$category_field->name = $row['name'];

					$category_content = new TCategoryFieldContentValue();
					$category_content->display_name = $row['display_name'];
					$category_content->excerpt = $row['excerpt'];
					$category_content->content = $row['content'];
					$category_content->collapsable = $row['collapsable'];
					$category_field->content_collection[$row['id_lang']] = $category_content;

					$category_fields_collection[$row['id_category_field']] = $category_field;
				}

			}
			return $category_fields_collection;
		}
		else
			return false;
	}

	/**
	 * @param integer $id_category_field
	 * @return TCategoryFieldContent
	 */
	public static function getFieldContentByName($name, $id_category)
	{
		$all_cat_fields = self::getCatgoryFields($id_category);
		$sql = 'SELECT cf.id_category_field FROM '._DB_PREFIX_.'category_fields cf
		        INNER JOIN '._DB_PREFIX_."category_fields_content cfc ON cf.id_category_field = cfc.id_category_field
				WHERE cf.name LIKE '".pSQL($name)."'
				AND cfc.id_category = ".(int)$id_category.'
				LIMIT 1
				';
		$result = Db::getInstance()->executeS($sql);
		if ($result && count($result) > 0)
		{
			$id_category_field = $result[0]['id_category_field'];
			if (isset($all_cat_fields[$id_category_field])) return $all_cat_fields[$id_category_field];
			else return false;
		}
		else
			return false;
	}


	public static function saveCategoryField(TCategoryFieldContent $category_field)
	{
		$sql = 'DELETE FROM '._DB_PREFIX_.'category_fields_content WHERE id_category = '.(int)$category_field->id_category.' AND id_category_field = '.(int)$category_field->id_category_field;
		Db::getInstance()->execute($sql);

		foreach ($category_field->content_collection as $key => $content)
		{
			Db::getInstance()->insert('category_fields_content', array(
				'id_category_field' => $category_field->id_category_field,
				'id_category' => $category_field->id_category,
				'id_shop' => Context::getContext()->shop->id,
				'id_lang' => (int)$key,
				'content' => pSQL($content->content, true),
				'excerpt' => pSQL($content->excerpt, true),
				'collapsable' => (int)$content->collapsable,
			));
		}
	}

	/**
	 * Delete category extra field completely
	 * @param integer $id_category_field
	 * @return Boolean
	 */
	public static function deleteField($id_category_field)
	{
		$sql = 'DELETE FROM '._DB_PREFIX_.'category_fields_content WHERE id_category_field='.(int)$id_category_field.' AND id_shop='.(int)Context::getContext()->shop->id;
		Db::getInstance()->execute($sql);

		$sql = 'DELETE FROM '._DB_PREFIX_.'category_fields_lang WHERE id_category_field='.(int)$id_category_field;
		Db::getInstance()->execute($sql);

		$sql = 'DELETE FROM '._DB_PREFIX_.'category_fields WHERE id_category_field='.(int)$id_category_field.' AND id_shop='.(int)Context::getContext()->shop->id;
		Db::getInstance()->execute($sql);

		return true;
	}
}