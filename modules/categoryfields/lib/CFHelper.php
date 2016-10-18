<?php
/**
 * @author    Musaffar Patel <musaffar.pate@gmail.com>
 * @copyright 2014 Musaffar Patel
 * @license   Commercial Single License
 */
class CFHelper
{
	public static function isVersion($version_array)
	{
		if (is_array($version_array))
		{
			foreach ($version_array as $value)
			{
				if (version_compare( substr(_PS_VERSION_, 0, strlen($value)), $value, '=')) {
					return true;
				}
			}
		}
		else return false;
		return false;
	}
}