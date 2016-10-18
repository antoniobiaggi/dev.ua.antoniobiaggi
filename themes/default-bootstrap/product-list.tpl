{* * 2007-2016 PrestaShop * * NOTICE OF LICENSE * * This source file is subject to the Academic Free License (AFL 3.0) * that is bundled with this package in the file LICENSE.txt. * It is also available through the world-wide-web at this URL: * http://opensource.org/licenses/afl-3.0.php * If you did not receive a copy of the license and are unable to * obtain it through the world-wide-web, please send an email * to license@prestashop.com so we can send you a copy immediately. * * DISCLAIMER * * Do not edit or add to this file if you wish to upgrade PrestaShop to newer * versions in the future. If you wish to customize PrestaShop for your * needs please refer to http://www.prestashop.com for more information. * * @author PrestaShop SA
<contact@prestashop.com>
    * @copyright 2007-2016 PrestaShop SA * @license http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0) * International Registered Trademark & Property of PrestaShop SA *} {if isset($products) && $products} {*define number of products per line in other page for desktop*} {if $page_name !='index' && $page_name !='product'} {assign var='nbItemsPerLine' value=3} {assign var='nbItemsPerLineTablet' value=2} {assign var='nbItemsPerLineMobile' value=3} {else} {assign var='nbItemsPerLine' value=4} {assign var='nbItemsPerLineTablet' value=3} {assign var='nbItemsPerLineMobile' value=2} {/if} {*define numbers of product per line in other page for tablet*} {assign var='nbLi' value=$products|@count} {math equation="nbLi/nbItemsPerLine" nbLi=$nbLi nbItemsPerLine=$nbItemsPerLine assign=nbLines} {math equation="nbLi/nbItemsPerLineTablet" nbLi=$nbLi nbItemsPerLineTablet=$nbItemsPerLineTablet assign=nbLinesTablet}
    <!-- Products list -->
    {if $page_name == 'index'}
    <ul{if isset($id) && $id} id="{$id}" {/if} class="popular-product-items clearfix">
        {foreach from=$products item=product name=products} {math equation="(total%perLine)" total=$smarty.foreach.products.total perLine=$nbItemsPerLine assign=totModulo} {math equation="(total%perLineT)" total=$smarty.foreach.products.total perLineT=$nbItemsPerLineTablet assign=totModuloTablet} {math equation="(total%perLineT)" total=$smarty.foreach.products.total perLineT=$nbItemsPerLineMobile assign=totModuloMobile} {if $totModulo == 0}{assign var='totModulo' value=$nbItemsPerLine}{/if} {if $totModuloTablet == 0}{assign var='totModuloTablet' value=$nbItemsPerLineTablet}{/if} {if $totModuloMobile == 0}{assign var='totModuloMobile' value=$nbItemsPerLineMobile}{/if}
        <li class="item">
            <a href="{$product.link|escape:'html':'UTF-8'}">
									<img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')|escape:'html':'UTF-8'}" >
    </a>
            <div class="wrapp-price">
                <p>{$product.name|truncate:45:'...'|escape:'html':'UTF-8'}</p>
                <p class="price">
                    {hook h="displayProductPriceBlock" product=$product type="before_price"} {hook h="displayProductPriceBlock" product=$product type="old_price"}
                    <strong>{hook h="displayProductPriceBlock" product=$product type="before_price"}
										{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</strong>
                </p>
            </div>


        </li>
        {/foreach}
        </ul>
        {else}

        <ul class="catalog-itemsWrap product_list">
            {foreach from=$products item=product name=products} {math equation="(total%perLine)" total=$smarty.foreach.products.total perLine=$nbItemsPerLine assign=totModulo} {math equation="(total%perLineT)" total=$smarty.foreach.products.total perLineT=$nbItemsPerLineTablet assign=totModuloTablet} {math equation="(total%perLineT)" total=$smarty.foreach.products.total perLineT=$nbItemsPerLineMobile assign=totModuloMobile} {if $totModulo == 0}{assign var='totModulo' value=$nbItemsPerLine}{/if} {if $totModuloTablet == 0}{assign var='totModuloTablet' value=$nbItemsPerLineTablet}{/if} {if $totModuloMobile == 0}{assign var='totModuloMobile' value=$nbItemsPerLineMobile}{/if}
            <li class="ajax_block_product catalog-singleItem">
                <div class="catalog-likeWrap">
                    <div class="catalog-like">
                        <div class="star"></div>
                        <a class=" text addToWishlist wishlistProd_{$product.id_product|intval}" href="#" rel="{$product.id_product|intval}" onclick="WishlistCart('wishlist_block_list', 'add', '{$product.id_product|intval}', false, 1); return false;">{l s='like'}</a>
                    </div>
                    <div class="catalog-like popup">
                        <div class="search"></div>         
                      						{if isset($quick_view) && $quick_view}
						<a class="quick-view text" href="{$product.link|escape:'html':'UTF-8'}" rel="{$product.link|escape:'html':'UTF-8'}">
							{l s='Quick view'}
						</a>
						{/if}
                    </div>
                </div>
                <a href="{$product.link|escape:'html':'UTF-8'}">
                    <img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')|escape:'html':'UTF-8'}">
                    <div class="disc">{$product.name|truncate:45:'...'|escape:'html':'UTF-8'}</div>
                    <div class="price">
                    {hook h="displayProductPriceBlock" product=$product type="before_price"}
                    {hook h="displayProductPriceBlock" product=$product type="old_price"}
                        <div class="old"><strike>{displayWtPrice p=$product.price_without_reduction}</strike></div>
                        <div class="new">{hook h="displayProductPriceBlock" product=$product type="before_price"}
                        {if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</div>
                    </div>
                </a>


            </li>
            {/foreach}
        </ul>
        
        {/if} {addJsDefL name=min_item}{l s='Please select at least one product' js=1}{/addJsDefL} {addJsDefL name=max_item}{l s='You cannot add more than %d product(s) to the product comparison' sprintf=$comparator_max_item js=1}{/addJsDefL} {addJsDef comparator_max_item=$comparator_max_item} {addJsDef comparedProductsIds=$compared_products} {/if}