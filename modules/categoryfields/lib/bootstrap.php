<?php
/**
 * @author    Musaffar Patel <musaffar.pate@gmail.com>
 * @copyright 2014 Musaffar Patel
 * @license   Commercial Single License
 */

/* types */
include_once(_PS_MODULE_DIR_.'/categoryfields/lib/types/category_fields.php');

/* models */
include_once(_PS_MODULE_DIR_.'/categoryfields/models/CFInstall.php');
include_once(_PS_MODULE_DIR_.'/categoryfields/models/CategoryField.php');

/* controllers */
include_once(_PS_MODULE_DIR_.'/categoryfields/controllers/front/CFFrontController.php');
include_once(_PS_MODULE_DIR_.'/categoryfields/controllers/admin/CFEditFields.php');
include_once(_PS_MODULE_DIR_.'/categoryfields/controllers/admin/CFEditCategoryFields.php');
include_once(_PS_MODULE_DIR_.'/categoryfields/controllers/admin/CFConfig.php');

/* helper */
include_once(_PS_MODULE_DIR_.'/categoryfields/lib/CFHelper.php');