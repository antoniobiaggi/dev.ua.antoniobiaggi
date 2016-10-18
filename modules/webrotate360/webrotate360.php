<?php
/**
 * 2015 WebRotate 360 LLC
 *
 * @version 2.1
 * @module WebRotate 360 Product Viewer for Prestashop
 * @author    WebRotate 360 LLC
 * @copyright Copyright (C) 2015 WebRotate 360 LLC. All rights reserved.
 * @license   GNU General Public License version 2 or later (http://www.gnu.org/copyleft/gpl.html).
 */

if (!defined('_PS_VERSION_'))
    exit;

class WebRotate360 extends Module
{
    private $_admin_prodrec_saved;

    public function __construct()
    {
        $this->name                   = "webrotate360";
        $this->tab                    = "others";
        $this->version                = "2.1.0";
        $this->author                 = "WebRotate 360 LLC";
        $this->need_instance          = 0;
        $this->module_key             = "5503098f2a84ade86a4e1478fb8cded1";
        $this->bootstrap              = true;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->_admin_prodrec_saved   = false;

        parent::__construct();

        $this->displayName            = $this->l("WebRotate 360");
        $this->description            = $this->l("Integrates WebRotate 360 Product Viewer with PrestaShop product pages");
        $this->confirmUninstall       = $this->l('Are you sure you want to uninstall?');
    }

    public function install()
    {
        if ((parent::install() == false) ||
            (!$this->registerHook("header")) ||
            (!$this->registerHook("actionProductUpdate")) ||
            (!$this->registerHook("displayAdminProductsExtra")))
        {
            return (false);
        }

        if (!Db::getInstance()->Execute(
            "CREATE TABLE IF NOT EXISTS `" . _DB_PREFIX_ . "webrotate360` (
            `id_view` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `id_product` INT UNSIGNED NOT NULL,
            `config_file_url` VARCHAR(2048) NOT NULL,
            `root_path` VARCHAR(2048) NOT NULL) ENGINE = " . _MYSQL_ENGINE_ . " DEFAULT CHARSET=utf8"))
        {
            return (false);
        }

        Configuration::updateValue("wr360_placeholder",    "#image-block");
        Configuration::updateValue("wr360_skin",           "basic");
        Configuration::updateValue("wr360_viewer_width",   "100%");
        Configuration::updateValue("wr360_viewer_height",  "458px");
        Configuration::updateValue("wr360_popup_skin",     "default");
        Configuration::updateValue("wr360_viewer_inpopup", "no");

        return (true);
    }

    public function uninstall()
    {
        if (parent::uninstall() == false)
            return (false);

        return (Db::getInstance()->Execute("DROP TABLE IF EXISTS `" . _DB_PREFIX_ . "webrotate360`;"));
    }

    public function hookDisplayAdminProductsExtra($params)
    {
        // global $smarty;

        $id_product   = (int)Tools::getValue("id_product");
        $web360_fetch = Db::getInstance()->ExecuteS("SELECT config_file_url, root_path FROM " . _DB_PREFIX_ . "webrotate360 WHERE id_product = " . (int)$id_product);

        if (!empty($web360_fetch))
        {
            $this->smarty->assign($web360_fetch[0]);
            $this->smarty->assign(array("rec_exists" => "1"));
        }
        else
        {
            $this->smarty->assign(array("config_file_url" => "", "root_path" => "", "rec_exists" => ""));
        }

        $this->smarty->assign(array("link" => $this->context->link));
        $this->_admin_prodrec_saved = false;

        return ($this->display(__FILE__, "webrotate360_admin_product.tpl"));
    }

    public function hookActionProductUpdate($params)
    {
        if ($this->_admin_prodrec_saved)
            return;

        $id_product = Tools::getValue("id_product");
        $config_url = Tools::getValue("config_file_url");
        $root_path  = Tools::getValue("root_path");
        $rec_exists = Tools::getValue("rec_exists");

        if (empty($rec_exists))
        {
            Db::getInstance()->insert("webrotate360", array("id_product" => (int)$id_product, "config_file_url" => pSQL($config_url), "root_path" => pSQL($root_path)));
        }
        else
        {
            Db::getInstance()->update("webrotate360", array("config_file_url" => pSQL($config_url), "root_path" => pSQL($root_path)), "id_product=" . $id_product);
        }

        $this->_admin_prodrec_saved = true;
    }

    public function hookHeader($params)
    {
        $currProductId = Tools::getValue("id_product");
        if (empty($currProductId))
            return ("");

        //global $smarty;

        $config_file_url = "";
        $root_path       = "";

        $fetch = Db::getInstance()->ExecuteS("SELECT config_file_url, root_path FROM " . _DB_PREFIX_ . "webrotate360 WHERE id_product = " . (int)$currProductId);
        if (!empty($fetch))
        {
            $product_config  = $fetch[0];
            $root_path       = $product_config["root_path"];
            $master_config   = Configuration::get("wr360_master_config");
            $config_file_url = $product_config["config_file_url"];

            if (!empty($master_config) && empty($config_file_url))
                $config_file_url = $master_config;
        }

        $viewer_skin = Configuration::get("wr360_skin");
        if (empty($viewer_skin))
            $viewer_skin = "basic";

        $popup_skin = Configuration::get("wr360_popup_skin");
        if ($popup_skin === "default")
            $popup_skin = "pp_default";

        $is_viewer_popup = (Configuration::get("wr360_viewer_inpopup") === "yes");
        $is_gallery_on   = ($popup_skin !== "disabled");

        $viewer_width = Configuration::get("wr360_viewer_width");
        if (!empty($viewer_width))
        {
            $viewer_width = str_ireplace("px", "", $viewer_width);
            if ((!$is_viewer_popup) && (strpos($viewer_width, "%") === FALSE))
                $viewer_width .= "px";
        }

        $viewer_height = Configuration::get("wr360_viewer_height");
        if (!empty($viewer_height))
        {
            $viewer_height = str_ireplace("px", "", $viewer_height);
            if ((!$is_viewer_popup) && (strpos($viewer_height, "%") === FALSE))
                $viewer_height .= "px";
        }

        $base_width = Configuration::get("wr360_base_width");
        if (!empty($base_width))
            $base_width = preg_replace("/[^0-9]/", "", $base_width);

        if (empty($base_width))
            $base_width = 0;

        $license_path = Configuration::get("wr360_license");
        if (empty($license_path))
            $license_path = ($is_viewer_popup) ? "license.lic" : _MODULE_DIR_."webrotate360/license.lic";

        if ($is_gallery_on && !empty($config_file_url))
        {
            $popup_ref_fmt = '%s?config=%s&root=%s&height=%s&lic=%s&grphpath=%s&iframe=true&width=%s&height=%s';

            $popup_ref_hrf = sprintf(
                $popup_ref_fmt,
                _MODULE_DIR_ . "webrotate360/viewloader_" . $viewer_skin . ".html",
                urlencode($config_file_url),
                urlencode($root_path),
                $viewer_height,
                urlencode($license_path),
                urlencode("imagerotator/html/img/" . $viewer_skin),
                str_ireplace("%", "", $viewer_width),
                $viewer_height);

            $popup_thumb_path = _MODULE_DIR_ . "webrotate360/360thumb.png";
        }

        $module_settings = array(
            "module_path"     => _MODULE_DIR_ . "webrotate360/",
            "license_path"    => $license_path,
            "graphics_path"   => _MODULE_DIR_ . "webrotate360/imagerotator/html/img/" . $viewer_skin,
            "placeholder"     => Configuration::get("wr360_placeholder"),
            "viewer_skin"     => $viewer_skin,
            "popup_skin"      => $popup_skin,
            "popup_href"      => $popup_ref_hrf,
            "popup_thumb"     => $popup_thumb_path,
            "viewer_height"   => $viewer_height,
            "viewer_width"    => $viewer_width,
            "base_width"      => $base_width,
            "config_file_url" => $config_file_url,
            "root_path"       => $root_path,
            "is_viewer_popup" => $is_viewer_popup,
            "is_gallery_on"   => $is_gallery_on,
        );

        $this->smarty->assign("webrotate360", $module_settings);

        return ($this->display(__FILE__, "webrotate360_header.tpl"));
    }

    public function getContent()
    {
        $output = null;

        if (Tools::isSubmit("submit" . $this->name))
        {
            // $output .= $this->displayError($this->l('Invalid Configuration value'));
            $output .= $this->displayConfirmation($this->l("Settings updated"));

            Configuration::updateValue("wr360_placeholder",    Tools::getValue("wr360_placeholder"));
            Configuration::updateValue("wr360_master_config",  Tools::getValue("wr360_master_config"));
            Configuration::updateValue("wr360_theme",          Tools::getValue("wr360_theme"));
            Configuration::updateValue("wr360_viewer_width",   Tools::getValue("wr360_viewer_width"));
            Configuration::updateValue("wr360_viewer_height",  Tools::getValue("wr360_viewer_height"));
            Configuration::updateValue("wr360_base_width",     Tools::getValue("wr360_base_width"));
            Configuration::updateValue("wr360_skin",           Tools::getValue("wr360_skin"));
            Configuration::updateValue("wr360_popup_skin",     Tools::getValue("wr360_popup_skin"));
            Configuration::updateValue("wr360_viewer_inpopup", Tools::getValue("wr360_viewer_inpopup"));
            Configuration::updateValue("wr360_license",        Tools::getValue("wr360_license"));
        }

        return ($output . $this->displayForm());
    }

    private function getViewInPopupArray()
    {
        $yesno = array("no", "yes");
        $yesno_fmt = array();
        foreach ($yesno as $flag)
        {
            $yesno_fmt[] = array("id" => $flag, "name" => $flag);
        }

        return ($yesno_fmt);
    }

    private function getViewerSkinArray()
    {
        $viewer_skins = array("basic", "thin", "round", "retina", "empty");
        $viewer_skins_fmt = array();
        foreach ($viewer_skins as $skin)
        {
            $viewer_skins_fmt[] = array("id" => $skin, "name" => $skin);
        }

        return ($viewer_skins_fmt);
    }

    private function getGallerySkinArray()
    {
        $popup_skins = array("disabled", "default", "light_rounded", "dark_rounded", "dark_square", "light_square", "facebook");
        $popup_skins_fmt = array();
        foreach ($popup_skins as $skin)
        {
            $popup_skins_fmt[] = array("id" => $skin, "name" => $skin);
        }

        return ($popup_skins_fmt);
    }

    private function displayForm()
    {
        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');

        $fields_form = array(
            'form' => array(
                "legend" => array(
                    "title" => $this->l('Settings'),
                    "icon"  => "icon-cogs"
                ),
                'description' => $this->l("If you haven't created 360 product views with WebRotate 360 Product Viewer before, please download our free software (Windows or Mac OS X) using links under this YouTube video - http://youtu.be/W3uFpXy1ne4. There you can also find our user guide on how to create 360 spins on your computer which you can then upload to your PrestaShop installation via FTP. Note that you only need to upload a single folder that is auto-created under 360_assets in the published folder of your SpotEditor project upon publish.
                        To see a sample 360 view supplied with this module, just enter the following URL under Config URL under your test product in Catalog->Products under WebRotate 360: /modules/webrotate360/360assets/sampleshoe/config.xml.
                        Or use a full URL including your domain name, e.g http://yoursite.com/360assets/sampleshoe/config.xml. For questions and support, email us at support@webrotate360.com or visit our forum here: https://www.360-product-views.com/forum/"),
                "input" => array(
                    array(
                        "type"      => "text",
                        "label"     => $this->l("Page Placeholder (#id or .class)"),
                        "name"      => "wr360_placeholder",
                        "required"  => true,
                        "desc"      => $this->l("Page placeholder is an HTML element on your product pages where WebRotate 360 Product Viewer will be embedded. If Viewer In Popup below is set to Yes, it will first try to find Prestashop's default product image gallery and will append a clickable 360 thumbnail there. If default image gallery is not found, it will append the thumbnail in place of the placeholder."),
                    ),
                    array(
                        "type"      => "text",
                        "label"     => $this->l("Viewer Width (px or %)"),
                        "name"      => "wr360_viewer_width",
                        "required"  => true,
                        "desc"      => $this->l("Viewer width in pixel. If Viewer In Popup below is set to No, the width can be a relative value (e.g. 100%) for responsive themes."),
                    ),
                    array(
                        "type"      => "text",
                        "label"     => $this->l("Viewer Height (px)"),
                        "name"      => "wr360_viewer_height",
                        "required"  => true,
                        "desc"      => $this->l("Viewer height in pixel."),
                    ),
                    array(
                        "type"      => "select",
                        "label"     => $this->l("Viewer In Popup"),
                        "name"      => "wr360_viewer_inpopup",
                        "desc"      => $this->l("If Yes is selected, the viewer doesn't embed itself inside the page placeholder. Instead, a small clickable thumbnail graphic is inserted inside the page placeholder which then activates the prettyPhoto lightbox popup with configured 360 view. If your theme's image gallery on the product page is based on PrestaShop's default, page placeholder is not used and the thumbnail is added at the end of the image gallery. Popup Gallery below should not be set to disabled for this to work. Thumb graphic is 80x80 and is located under /modules/webrotate360 as 360thumb.png."),
                        "options"   => array(
                            "query" => $this->getViewInPopupArray(),
                            "id"    => "id",
                            "name"  => "name",
                        ),
                    ),
                    array(
                        "type"      => "text",
                        "label"     => $this->l("Responsive Base Width (px)"),
                        "name"      => "wr360_base_width",
                        "required"  => false,
                        "desc"      => $this->l("Optionally force viewer to scale its height relative to your original viewer width (base width). The setting usually applies when your viewer width is relative (%), i.e when your product page is responsive."),
                    ),
                    array(
                        "type"      => "select",
                        "label"     => $this->l("Viewer Skin"),
                        "name"      => "wr360_skin",
                        "desc"      => $this->l("Viewer skin."),
                        "options"   => array(
                            "query" => $this->getViewerSkinArray(),
                            "id"    => "id",
                            "name"  => "name",
                        ),
                    ),
                    array(
                        "type"      => "select",
                        "label"     => $this->l("Popup Gallery"),
                        "name"      => "wr360_popup_skin",
                        "desc"      => $this->l("Choose one of the prettyPhoto skins to enable the popup gallery. If enabled and your theme's image gallery on the product page is based on PrestaShop's default, the popup will be used for all of your product images. Required when 360 view is configured to launch inside the popup (i.e when Viewer In Popup is set to Yes)."),
                        "options"   => array(
                            "query" => $this->getGallerySkinArray(),
                            "id"    => "id",
                            "name"  => "name",
                        ),
                    ),
                    array(
                        "type"      => "text",
                        "label"     => $this->l("Master Config URL (PRO)"),
                        "name"      => "wr360_master_config",
                        "required"  => false,
                        "desc"      => $this->l("Master Config allows setting a single XML configuration file for all products and only enter Root Path (under Catalog->Products->Product->WebRotate 360) pointing to a product asset folder for each product on your server (or CDN). If not using Master Config, just enter Config URL under WebRotate 360 for each product under your Catalog->Products."),
                    ),
                    array(
                        "type"      => "text",
                        "label"     => $this->l("License Path"),
                        "name"      => "wr360_license",
                        "required"  => false,
                        "desc"      => $this->l("URL path to license.lic on this server (PRO and Enterprise).")
                    ),
                ),
                "submit" => array(
                    "title" => $this->l("Save"),
                    "class" => "button pull-right"
                )
            ),
        );

        $helper = new HelperForm();

        $helper->module                   = $this;
        $helper->name_controller          = $this->name;
        $helper->token                    = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex             = AdminController::$currentIndex . '&configure=' . $this->name;
        $helper->default_form_language    = $default_lang;
        $helper->allow_employee_form_lang = $default_lang;
        $helper->title                    = $this->displayName;
        $helper->show_toolbar             = false;
        $helper->submit_action            = "submit" . $this->name;
        $helper->identifier               = $this->identifier;

        $helper->fields_value["wr360_placeholder"]    = Configuration::get("wr360_placeholder");
        $helper->fields_value["wr360_viewer_width" ]  = Configuration::get("wr360_viewer_width");
        $helper->fields_value["wr360_viewer_height"]  = Configuration::get("wr360_viewer_height");
        $helper->fields_value["wr360_base_width"]     = Configuration::get("wr360_base_width");
        $helper->fields_value["wr360_master_config"]  = Configuration::get("wr360_master_config");
        $helper->fields_value["wr360_license"]        = Configuration::get("wr360_license");
        $helper->fields_value["wr360_skin"]           = Configuration::get("wr360_skin");
        $helper->fields_value["wr360_popup_skin"]     = Configuration::get("wr360_popup_skin");
        $helper->fields_value["wr360_viewer_inpopup"] = Configuration::get("wr360_viewer_inpopup");

        return ($helper->generateForm(array($fields_form)));
    }
}
