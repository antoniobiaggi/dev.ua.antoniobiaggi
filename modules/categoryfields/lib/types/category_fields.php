<?php
/**
 * @author    Musaffar Patel <musaffar.pate@gmail.com>
 * @copyright 2014 Musaffar Patel
 * @license   Commercial Single License
 */

class TCategoryField
{
	public $id;
	public $name;
	public $translations = array(); //array of string
}

class TCategoryFieldContent
{
	public
		$id_category_field = -1,
		$id_category = -1,
		$name = '',
		$content_collection = array(); // array of TCategoryFieldContentValue
}

	class TCategoryFieldContentValue {
		public
			$display_name = '',
			$excerpt = '',
			$content = '',
			$collapsable = 0;
	}

