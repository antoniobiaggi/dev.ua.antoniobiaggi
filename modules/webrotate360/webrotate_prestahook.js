/**
* @version     2.1
* @module      WebRotate 360 Product Viewer for Prestashop
* @author      WebRotate 360 LLC
* @copyright   Copyright (C) 2015 WebRotate 360 LLC. All rights reserved.
* @license     GNU General Public License version 2 or later (http://www.gnu.org/copyleft/gpl.html).
*/

function WR360InitEmbeddedViewer(licensePath, graphicsPath, configFileURL, divID, viewerWidth, viewerHeight, rootPath, baseWidth)
{
    // Unhook main image click so that viewer doesn't trigger zoomed images.
    // This is setup in native Prestashop's product.js
    jQuery(document).off("click", "#view_full_size, #image-block");

    // Let's unhook click on #image-block when inside quick view as well.
    if ((typeof (contentOnly) !== "undefined") && (contentOnly == true))
    {
        jQuery(document).off("click", "#image-block");
    }

    var imageDiv = jQuery(divID);
    if (imageDiv.length <= 0)
        return;

    if (viewerWidth != "")
        imageDiv.css("width", viewerWidth);

    if (viewerHeight != "")
        imageDiv.css("height", viewerHeight)

    imageDiv.css("padding", 0);

    var baseWidthInt = parseInt(baseWidth);

    var newHtml = "<div id='wr360PlayerId'> \
        <script language='javascript' type='text/javascript'> \
            _imageRotator.settings.graphicsPath   = '" + graphicsPath + "'; \
            _imageRotator.settings.configFileURL  = '" + configFileURL + "'; \
            _imageRotator.settings.rootPath  = '" + rootPath + "'; \
            _imageRotator.settings.responsiveBaseWidth  = " + baseWidthInt + "; \
            _imageRotator.licenseFileURL = '" + licensePath + "'; \
        </script> \
    </div>";

    imageDiv.html(newHtml);
    imageDiv.css("visibility", "visible");
    _imageRotator.runImageRotator("wr360PlayerId");
}

function WR360InitGallery(skin, embeddedViewer)
{
    var nativeThumbs = jQuery("#views_block ul#thumbs_list_frame");
    if (nativeThumbs.length > 0)
    {
        var fancyThumbs = jQuery("#views_block .fancybox");
        if (fancyThumbs.length > 0)
        {
            fancyThumbs.attr("rel", "prettyPhoto[]");
            fancyThumbs.removeClass("fancybox");

            if (embeddedViewer == false)
            {
                // Unhook main image click so that it doesn't trigger thumb click event twice (on both #view_full_size and #image-block) which breaks prettyPhoto.
                // This is setup in native Prestashop's product.js
                jQuery(document).off("click", "#view_full_size, #image-block");

                if ((typeof (contentOnly) === "undefined") || (contentOnly == false))
                {
                    // And resubscribe to just the single block if it's not in quick view.
                    jQuery("#image-block").click(function()
                    {
                        jQuery("#views_block .shown").click();
                    });
                }
            }
        }
    }

    jQuery("a[rel^='prettyPhoto']").prettyPhoto({animation_speed:0, deeplinking:false, theme:skin});
}

function WR360InitPopupViewer(hrefParam, srcThumbPath, divID)
{
    var nativeThumbs = jQuery("#views_block ul#thumbs_list_frame");
    if (nativeThumbs.length <= 0)
    {
        var popupElm = jQuery(divID);
        if (popupElm.length <= 0)
            return;

        var newHtml = "<a href='" + hrefParam + "'" + "rel='prettyPhoto'><img src='" + srcThumbPath + "'/></a>";
        popupElm.html(newHtml);
    }
    else
    {
        nativeThumbs.find(".last").removeClass("last");
        jQuery("#views_block").removeClass("hidden");

        var thumbWidth = 90; // const based on default 100% wide PS 1.6.0.9 theme.
        var firstThumb = nativeThumbs.find("li:first-child");
        if (firstThumb.length > 0)
            thumbWidth = firstThumb.outerWidth(true);

        var newHtml = "<li class='last'><a href='" + hrefParam + "'" + "rel='prettyPhoto[]'><img class='img-responsive' title='360 view' src='" + srcThumbPath + "'/></a></li>";
        nativeThumbs.find(".last").removeClass("last");
        nativeThumbs.append(newHtml);
        nativeThumbs.css("width", nativeThumbs.width() + thumbWidth);

        // Starting with PS 1.6.0.11, have to unhook mouseover on all the thumbs as product.js will try to extract image path from
        // our thumbnail's a and we have prettyPhoto href there that can't be used or changed without updating default product.js.

        jQuery(document).off("mouseover", "#views_block li a");

        // Call product.js to refresh gallery arrow visibility to adjust for our new thumb.
        if (typeof(serialScrollFixLock) !== "undefined")
            serialScrollFixLock('', '', '', '', 0);
    }
}

function WR360MakeGalleryBorderLookGoodWhenEmbedded()
{
    // When viewer is embedded lets hide sticky default (.show) border as it doesn't make sense in that case.
    var nativeThumbs = jQuery("#views_block ul#thumbs_list_frame");
    if (nativeThumbs.length > 0)
    {
        var fancyThumbs = jQuery("#views_block .fancybox");
        if (fancyThumbs.length > 0)
        {
            fancyThumbs.addClass("remove_border_highlight");
            nativeThumbs.find("li").addClass("viewer_embed_gallery");
        }
    }
}
