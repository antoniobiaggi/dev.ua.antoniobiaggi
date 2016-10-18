{*
* @version     2.1
* @module      WebRotate 360 Product Viewer for Prestashop
* @author      WebRotate 360 LLC
* @copyright   Copyright (C) 2015 WebRotate 360 LLC. All rights reserved.
* @license     GNU General Public License version 2 or later (http://www.gnu.org/copyleft/gpl.html).
*}

{if !empty($webrotate360.config_file_url) || $webrotate360.is_gallery_on}
    <script type="text/javascript" src="{$webrotate360.module_path|escape:'html':'UTF-8'}webrotate_prestahook.js"></script>
    <link type="text/css" href="{$webrotate360.module_path|escape:'html':'UTF-8'}webrotate_overrides.css" rel="stylesheet"/>
{/if}

{if empty($webrotate360.config_file_url)}
    {if $webrotate360.is_gallery_on}
        <script type="text/javascript" src="{$webrotate360.module_path|escape:'html':'UTF-8'}prettyphoto/js/jquery.prettyPhoto.js"></script>
        <link type="text/css" href="{$webrotate360.module_path|escape:'html':'UTF-8'}prettyphoto/css/prettyphoto.css" rel="stylesheet"/>

        <script type="text/javascript">
            jQuery(document).ready(function(){
                WR360InitGallery("{$webrotate360.popup_skin|escape:'html':'UTF-8'}", false);
            });
        </script>
    {/if}
{else}
    {if $webrotate360.is_gallery_on}
        {if !$webrotate360.is_viewer_popup}
            <link type="text/css" href="{$webrotate360.module_path|escape:'html':'UTF-8'}prettyphoto/css/prettyphoto.css" rel="stylesheet"/>
            <script type="text/javascript" src="{$webrotate360.module_path|escape:'html':'UTF-8'}prettyphoto/js/jquery.prettyPhoto.js"></script>
            <script type="text/javascript">
                jQuery(document).ready(function(){
                    WR360MakeGalleryBorderLookGoodWhenEmbedded();
                    WR360InitGallery("{$webrotate360.popup_skin|escape:'html':'UTF-8'}", true);
                });
            </script>
        {else}
            <link type="text/css" href="{$webrotate360.module_path|escape:'html':'UTF-8'}prettyphoto/css/prettyphoto.css" rel="stylesheet"/>
            <script type="text/javascript" src="{$webrotate360.module_path|escape:'html':'UTF-8'}prettyphoto/js/jquery.prettyPhoto.js"></script>
            <script type="text/javascript">
                jQuery(document).ready(function(){
                    WR360InitPopupViewer("{$webrotate360.popup_href|escape:'html':'UTF-8'}", "{$webrotate360.popup_thumb|escape:'html':'UTF-8'}", "{$webrotate360.placeholder|escape:'html':'UTF-8'}");
                    WR360InitGallery("{$webrotate360.popup_skin|escape:'html':'UTF-8'}", false);
                });
            </script>
        {/if}
    {/if}
    {if !$webrotate360.is_viewer_popup}
        <style type="text/css">
            {$webrotate360.placeholder|escape:'html':'UTF-8'}{literal}{visibility: hidden;}{/literal}
        </style>

        <link type="text/css" rel="stylesheet" href="{$webrotate360.module_path|escape:'html':'UTF-8'}imagerotator/html/css/{$webrotate360.viewer_skin}.css"/>
        <script type="text/javascript" src="{$webrotate360.module_path|escape:'html':'UTF-8'}imagerotator/html/js/imagerotator.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                WR360InitEmbeddedViewer(
                    "{$webrotate360.license_path|escape:'html':'UTF-8'}",
                    "{$webrotate360.graphics_path|escape:'html':'UTF-8'}",
                    "{$webrotate360.config_file_url|escape:'html':'UTF-8'}",
                    "{$webrotate360.placeholder|escape:'html':'UTF-8'}",
                    "{$webrotate360.viewer_width|escape:'html':'UTF-8'}",
                    "{$webrotate360.viewer_height|escape:'html':'UTF-8'}",
                    "{$webrotate360.root_path|escape:'html':'UTF-8'}",
                    "{$webrotate360.base_width|escape:'html':'UTF-8'}");

                WR360MakeGalleryBorderLookGoodWhenEmbedded();
            });
        </script>
    {/if}
{/if}





