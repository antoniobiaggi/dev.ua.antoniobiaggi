<?php
/**
* Prestashop Addons | Module by: <App1Pro>
*
* @author    Chuyen Nguyen [App1Pro].
* @copyright Chuyenim@gmail.com
* @license   http://app1pro.com/license.txt
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_2_1_0()
{
    $res = true;
    $sql = array();

    $sql[] = 'ALTER TABLE `'._DB_PREFIX_.'product_related_pro` ADD `position` INT(10) NULL DEFAULT 0;';

    foreach ($sql as $query) {
        $res &= Db::getInstance()->execute($query);
    }

    return $res;
}
