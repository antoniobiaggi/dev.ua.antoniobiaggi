{*
* 2007-2015 PrestaShop
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
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if isset($products) && $products}
    {*define number of products per line in other page for desktop*}
    {if $page_name !='index' && $page_name !='product'}
        {assign var='nbItemsPerLine' value=3}
        {assign var='nbItemsPerLineTablet' value=2}
        {assign var='nbItemsPerLineMobile' value=3}
    {else}
        {assign var='nbItemsPerLine' value=4}
        {assign var='nbItemsPerLineTablet' value=3}
        {assign var='nbItemsPerLineMobile' value=2}
    {/if}
    {*define numbers of product per line in other page for tablet*}
    {assign var='nbLi' value=$products|@count}
    {math equation="nbLi/nbItemsPerLine" nbLi=$nbLi nbItemsPerLine=$nbItemsPerLine assign=nbLines}
    {math equation="nbLi/nbItemsPerLineTablet" nbLi=$nbLi nbItemsPerLineTablet=$nbItemsPerLineTablet assign=nbLinesTablet}
{assign var='product' value=Tools::getProductObjectById($mainProd)}
{assign var='productPrice' value=$product->getPrice(true, $smarty.const.NULL, 6)}
{assign var='productPriceWithoutReduction' value=$product->getPriceWithoutReduct(false, $smarty.const.NULL)}
    <div class="completeSet">
				<div class="text">
					<p class="text">{l s='Stylist advice'}</p>
					<p class="bigText">{l s='Buy'}</p>
					<p class="bigText2">{l s='a complete set'}</p>
				</div>
                {$i=true}
				{foreach from=$products item=prod name=products}
					<div class="prod">
						<img src="{$link->getImageLink($prod.link_rewrite, $prod.id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{if !empty($prod.legend)}{$prod.legend|escape:'html':'UTF-8'}{else}{$prod.name|escape:'html':'UTF-8'}{/if}">
						<p class="name"> {$prod.name|truncate:30:'...'|escape:'html':'UTF-8'}</p>
						<p class="price"> {if !$priceDisplay}{convertPrice price=Tools::getProductPriceById($prod['id_product'])}{else}{convertPrice price=$prod.price_tax_exc}{/if}						{if $prod.attributes}
						<select class="ssss" name="hero[{$prod.id_product}]">
							{foreach from=$prod.attributes key=id_attribute item=group_attribute}	
								<option value="{$prod.id_product}_{$group_attribute.attribute_name|escape:'html':'UTF-8'}">{$group_attribute.attribute_name|escape:'html':'UTF-8'}</option>
							{/foreach}
						</select>
						{/if}
						</p>

					</div>			
					{if $i}
					<div class="plus">
					</div>
					{/if}
			        {$i=false}
					{$pid[$prod['id_product']] = $prod.attributes.0.attribute_name}
					{$total = $total + Tools::getProductPriceById($prod['id_product'])}
				{/foreach}
				<div class="equally"> 
				</div>
				<div class="total">
					<p class="price">{convertPrice price=$total|floatval}</p>
					<p class="text">{l s='for total look'}</p>
					<a class="buy-complect url" data-url="{$base_dir}cart?add=1&amp;id_product={$mainProd}&amp;token=172ab9e7f6e15a8cb28441c1cc869e53&" href="{$base_dir}cart?add=1&amp;id_product={$mainProd}&amp;token=172ab9e7f6e15a8cb28441c1cc869e53&{Tools::sizes($pid)}" rel="nofollow" title="Add to cart" data-id-product="{$mainProd}" data-minimal_quantity="1">{l s='add to Basket'}</a>
				</div>
			</div>
    
    <!-- Products list -->
   

{addJsDefL name=min_item}{l s='Please select at least one product' js=1}{/addJsDefL}
{addJsDefL name=max_item}{l s='You cannot add more than %d product(s) to the product comparison' sprintf=$comparator_max_item js=1}{/addJsDefL}
{addJsDef comparator_max_item=$comparator_max_item}
{addJsDef comparedProductsIds=$compared_products}
{/if}
