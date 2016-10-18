{*
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<!-- Block Viewed products -->
<div class="ab-wishlist-recently-viewed clearfix">
    <p>{l s='Viewed products' mod='blockviewed'}</p>
    <div class="recently-viewed-gallery clearfix">
       {foreach from=$productsViewedObj item=viewedProduct name=myLoop}
        <div class="item">
            <img src="{if isset($viewedProduct->id_image) && $viewedProduct->id_image}{$link->getImageLink($viewedProduct->link_rewrite, $viewedProduct->cover, 'small_default')}{else}{$img_prod_dir}{$lang_iso}-default-medium_default.jpg{/if}" alt="{$viewedProduct->legend|escape:'html':'UTF-8'}" />
            <h3>{$viewedProduct->name|truncate:25:'...'|escape:'html':'UTF-8'}</h3>
            <p><span><strike>$560</strike></span>$480</p>
        </div>
        	{/foreach}
    </div>
    <div class="more"><a class="control btn" href="#">see more</a></div>
</div>

