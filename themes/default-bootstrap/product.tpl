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
{include file="$tpl_dir./errors.tpl"}
{if $errors|@count == 0}
	{if !isset($priceDisplayPrecision)}
		{assign var='priceDisplayPrecision' value=2}
	{/if}
	{if !$priceDisplay || $priceDisplay == 2}
		{assign var='productPrice' value=$product->getPrice(true, $smarty.const.NULL, 6)}
		{assign var='productPriceWithoutReduction' value=$product->getPriceWithoutReduct(false, $smarty.const.NULL)}
	{elseif $priceDisplay == 1}
		{assign var='productPrice' value=$product->getPrice(false, $smarty.const.NULL, 6)}
		{assign var='productPriceWithoutReduction' value=$product->getPriceWithoutReduct(true, $smarty.const.NULL)}
	{/if}
<div itemscope itemtype="https://schema.org/Product">
	<meta itemprop="url" content="{$link->getProductLink($product)}">
	<div class="container">
		{if isset($adminActionDisplay) && $adminActionDisplay}
			<div id="admin-action" class="container">
				<p class="alert alert-info">{l s='This product is not visible to your customers.'}
					<input type="hidden" id="admin-action-product-id" value="{$product->id}" />
					<a id="publish_button" class="btn btn-default button button-small" href="#">
						<span>{l s='Publish'}</span>
					</a>
					<a id="lnk_view" class="btn btn-default button button-small" href="#">
						<span>{l s='Back'}</span>
					</a>
				</p>
				<p id="admin-action-result"></p>
			</div>
		{/if}
		{if isset($confirmation) && $confirmation}
			<p class="confirmation">
				{$confirmation}
			</p>
		{/if}
		<!-- left infos-->
		<div class="wrap">
		<div class="social">
            <p class="name">{l s='Share:'}</p>
            {if isset($HOOK_EXTRA_RIGHT) && $HOOK_EXTRA_RIGHT}{$HOOK_EXTRA_RIGHT}{/if}
        </div>
        <div id="gallery">
           {if isset($images)}
            <ul class="slick">
<!--                <li class="totop"></li>-->
                {foreach from=$images item=image name=thumbnails}
                    {assign var=imageIds value="`$product->id`-`$image.id_image`"}
                    {if !empty($image.legend)}
                        {assign var=imageTitle value=$image.legend|escape:'html':'UTF-8'}
                    {else}
                        {assign var=imageTitle value=$product->name|escape:'html':'UTF-8'}
                    {/if}
                <li>
                   <img class="gallery_img" data-href="{$link->getImageLink($product->link_rewrite, $imageIds, 'thickbox_default')|escape:'html':'UTF-8'}" src="{$link->getImageLink($product->link_rewrite, $imageIds, 'cart_default')|escape:'html':'UTF-8'}" alt="{$imageTitle}" title="{$imageTitle}">
                </li>
                    {/foreach}
<!--                <li class="tonext"></li>-->
            </ul>
       		{/if}
       		<img src="{$link->getImageLink($product->link_rewrite, $cover.id_image, 'large_default')|escape:'html':'UTF-8'}" title="{if !empty($cover.legend)}{$cover.legend|escape:'html':'UTF-8'}{else}{$product->name|escape:'html':'UTF-8'}{/if}" alt="{if !empty($cover.legend)}{$cover.legend|escape:'html':'UTF-8'}{else}{$product->name|escape:'html':'UTF-8'}{/if}" id="main-img">
       		<div id="for360">
       		   <img src="{$link->getImageLink($product->link_rewrite, $cover.id_image, 'large_default')|escape:'html':'UTF-8'}" title="{if !empty($cover.legend)}{$cover.legend|escape:'html':'UTF-8'}{else}{$product->name|escape:'html':'UTF-8'}{/if}" alt="{if !empty($cover.legend)}{$cover.legend|escape:'html':'UTF-8'}{else}{$product->name|escape:'html':'UTF-8'}{/if}" id="main-img">
       		</div>
        </div>
        <div id="owl-demo2">
           {foreach from=$images item=image name=thumbnails}
                {assign var=imageIds value="`$product->id`-`$image.id_image`"}
                {if !empty($image.legend)}
                    {assign var=imageTitle value=$image.legend|escape:'html':'UTF-8'}
                {else}
                    {assign var=imageTitle value=$product->name|escape:'html':'UTF-8'}
                {/if}
            <div class="item">
                                  <img data-href="{$link->getImageLink($product->link_rewrite, $imageIds, 'large_default')|escape:'html':'UTF-8'}" src="{$link->getImageLink($product->link_rewrite, $imageIds, 'large_default')|escape:'html':'UTF-8'}" alt="{$imageTitle}" title="{$imageTitle}">
            </div>
             {/foreach}
        </div>
        <div class="lineBottom">
						<a class="vive" href="#">{l s="360° view"}</a>
<!--						<a class="sendLink" href="#">{l s="Send a link"}</a>-->
					</div>
		</div> <!-- end pb-left-column -->
		<!-- end left infos-->
		<!-- center infos -->
		<div class="description">
		{if $product->reference}
			<p class="art">{l s='Art.'} {$product->reference|escape:'html':'UTF-8'}</p>
        {/if}
        
       {*} {if ($display_qties == 1 && !$PS_CATALOG_MODE && $PS_STOCK_MANAGEMENT && $product->available_for_order)}  {*}
           {if $product->quantity <= 2}
            <p class="left">{$product->quantity|intval} {l s='items left!'}</p>
            {/if}
        {*}  {/if}   {*}
            <p class="name">{$product->name|escape:'html':'UTF-8'}</p>
        {if $priceDisplay >= 0 && $priceDisplay <= 2}
            {hook h="displayProductPriceBlock" product=$product type="old_price"}
             <p class="oldPrice">
            {if $productPriceWithoutReduction > $productPrice}
            {convertPrice price=$productPriceWithoutReduction|floatval}{/if}</p>
        {/if}
        {if $priceDisplay >= 0 && $priceDisplay <= 2}
			<p class="price">{convertPrice price=$productPrice|floatval}</p>
        {/if}
        {if isset($features) && $features}
        <div class="features">
            <p class="name">{l s='features'}</p>
            <ul id="boxscroll">
					{foreach from=$features item=feature}
						{if isset($feature.value)}
						<li>{$feature.value|escape:'html':'UTF-8'}</li>
						{/if}
					{/foreach}
				</table>
			</section>
			<!--end Data sheet -->
		
            </ul>
        </div>
                    {/if}
                  
        			{if ($product->show_price && !isset($restricted_country_mode)) || isset($groups) || $product->reference || (isset($HOOK_PRODUCT_ACTIONS) && $HOOK_PRODUCT_ACTIONS)}
			<!-- add to cart form-->
			<form id="buy_block"{if $PS_CATALOG_MODE && !isset($groups) && $product->quantity > 0} class="hidden"{/if} action="{$link->getPageLink('cart')|escape:'html':'UTF-8'}" method="post">
				<!-- hidden datas -->
				<p class="hidden">
					<input type="hidden" name="token" value="{$static_token}" />
					<input type="hidden" name="id_product" value="{$product->id|intval}" id="product_page_product_id" />
					<input type="hidden" name="add" value="1" />
					<input type="hidden" name="id_product_attribute" id="idCombination" value="" />
				</p>
					{if isset($groups)}
							<!-- attributes -->
							<div id="attributes">
								<div class="clearfix"></div>
								{foreach from=$groups key=id_attribute_group item=group}
									{if $group.attributes|@count}
										<fieldset class="{if $group.group_type == 'color'}color {else} size{/if}">
											<p class="name" {if $group.group_type != 'color' && $group.group_type != 'radio'}for="group_{$id_attribute_group|intval}"{/if}>{$group.name|escape:'html':'UTF-8'}&nbsp;</p>
											{if $group.group_type != 'color'}
											<a href="#" class="guide">{l s='guide'}</a>
											{/if}
											
											{assign var="groupName" value="group_$id_attribute_group"}
											<div class="attribute_list">
												{if ($group.group_type == 'color')}
												<ul id="color_to_pick_list" class="clearfix">
														{assign var="default_colorpicker" value=""}
														{foreach from=$group.attributes key=id_attribute item=group_attribute}
															{assign var='img_color_exists' value=file_exists($col_img_dir|cat:$id_attribute|cat:'.jpg')}
															<li{if $group.default == $id_attribute} class="colorBox selected"{else} class="colorBox{if ($group.default == $id_attribute)} active{/if}" {/if}>
																<a href="{$link->getProductLink($product)|escape:'html':'UTF-8'}" id="color_{$id_attribute|intval}" name="{$colors.$id_attribute.name|escape:'html':'UTF-8'}" class="color_pick"{if !$img_color_exists && isset($colors.$id_attribute.value) && $colors.$id_attribute.value} style="background:{$colors.$id_attribute.value|escape:'html':'UTF-8'};"{/if} title="{$colors.$id_attribute.name|escape:'html':'UTF-8'}"> <span>{$group_attribute|escape:'html':'UTF-8'}</span>
																	{if $img_color_exists}
																		<img src="{$img_col_dir}{$id_attribute|intval}.jpg" alt="{$colors.$id_attribute.name|escape:'html':'UTF-8'}" title="{$colors.$id_attribute.name|escape:'html':'UTF-8'}" width="20" height="20" />
																	{/if}
																</a>
																
															</li>
															{if ($group.default == $id_attribute)}
																{$default_colorpicker = $id_attribute}
															{/if}
														{/foreach}
													</ul>
													<input type="hidden" class="color_pick_hidden" name="{$groupName|escape:'html':'UTF-8'}" value="{$default_colorpicker|intval}" />
												{elseif ($group.group_type == 'select') }
												<select name="{$groupName}" id="group_{$id_attribute_group|intval}" class="form-control attribute_select no-print">
														{foreach from=$group.attributes key=id_attribute item=group_attribute}
															<option value="{$id_attribute|intval}"{if (isset($smarty.get.$groupName) && $smarty.get.$groupName|intval == $id_attribute) || $group.default == $id_attribute} selected="selected"{/if} title="{$group_attribute|escape:'html':'UTF-8'}">{$group_attribute|escape:'html':'UTF-8'}</option>
														{/foreach}
													</select>

												{elseif ($group.group_type == 'radio')}
													<ul>
														{foreach from=$group.attributes key=id_attribute item=group_attribute}
															<li>
																<input type="radio" class="attribute_radio" name="{$groupName|escape:'html':'UTF-8'}" value="{$id_attribute}" {if ($group.default == $id_attribute)} checked="checked"{/if} />
																<span>{$group_attribute|escape:'html':'UTF-8'}</span>
															</li>
														{/foreach}
													</ul>
												{/if}
											</div> <!-- end attribute_list -->
										</fieldset>
									{/if}
								{/foreach}
							</div> <!-- end attributes -->
						{/if}
        {if isset($features) && $features}
        <div class="features featuresXS">
            <p class="name">{l s='features'}</p>
            <ul id="boxscroll">
					{foreach from=$features item=feature}
						{if isset($feature.value)}
						<li>{$feature.value|escape:'html':'UTF-8'}</li>
						{/if}
					{/foreach}
				</table>
			</section>
			<!--end Data sheet -->
		
            </ul>
        </div>
        {/if}
				<div class="payment">
                    <a target="_blank" href="{$link->getProductLink($product)|escape:'html':'UTF-8'}"  class="full cont-only">{l s="See full details"}</a>
						<p class="name cont-hide">{l s="Split payment available"}</p>
						{if !$PS_CATALOG_MODE}
						<div id="quantity_wanted_p1">
<div{if (!$allow_oosp && $product->quantity <= 0) || !$product->available_for_order || (isset($restricted_country_mode) && $restricted_country_mode) || $PS_CATALOG_MODE} class="unvisible"{/if}>
<input type="text" min="1" name="qty" id="quantity_wanted" class="text" value="{if isset($quantityBackup)}{$quantityBackup|intval}{else}{if $product->minimal_quantity > 1}{$product->minimal_quantity}{else}1{/if}{/if}" />
						<button class="addToBasket"  type="submit">{l s="add to Basket"}</button>
                </div>
                </div>
				{/if}
                        {if isset($HOOK_PRODUCT_ACTIONS) && $HOOK_PRODUCT_ACTIONS}{$HOOK_PRODUCT_ACTIONS}{/if}					
<!--							<button class="addToWishList"></button>		-->
					<div class="share cont-only">
							<div class="img"></div>
							<div class="text">{l s="Share"}</div>
							<div class="shareLinksWrap">
<a target="_blank" href="http://www.facebook.com/share.php?u={$link->getProductLink($product)|escape:'html':'UTF-8'}"><i class="fa fa-facebook"></i></a>
								<a class="twitter-share-button" target="_blank" data-url="{$link->getProductLink($product)|escape:'html':'UTF-8'}" href="https://twitter.com/share"><i class="fa fa-twitter"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				
			</form>
			{/if}
     

			<p id="availability_date"{if ($product->quantity > 0) || !$product->available_for_order || $PS_CATALOG_MODE || !isset($product->available_date) || $product->available_date < $smarty.now|date_format:'%Y-%m-%d'} style="display: none;"{/if}>
				<span id="availability_date_label">{l s='Availability date:'}</span>
				<span id="availability_date_value">{if Validate::isDate($product->available_date)}{dateFormat date=$product->available_date full=false}{/if}</span>
			</p>
			<!-- Out of stock hook -->
			<div id="oosHook"{if $product->quantity > 0} style="display: none;"{/if}>
				{$HOOK_PRODUCT_OOS}
			</div>

		</div>
		<!-- end center infos-->
		<!-- pb-right-column-->
	</div> <!-- end primary_block -->

</div> <!-- itemscope product wrapper -->

    <div class="review importedst">
			<div class="container">
				<div class="commentSlider">
			{if isset($HOOK_PRODUCT_TAB_CONTENT) && $HOOK_PRODUCT_TAB_CONTENT}{$HOOK_PRODUCT_TAB_CONTENT}{/if}
				</div>
				<div class="description_wrap">
					<div class="wrap_description">
						<ul>
							<li class="title active" data-id="description">{l s='Description'}</li>
							<li class="title"><a href="/content/19-oplata-i-dostavka">{l s='delivery & payment'}</a></li>
						</ul>
						<div class="bow_wrap">
							<div id="description" class="box active">
							{$product->description}
							</div>
							<div id="delivery" class="box">{$product->description_short}</div>
						</div>
						<div class="it_contacts">{l s='Contacts'}</div>
						<a href="/content/17-obmen-i-vozvrat" class="guarantee">{l s='guarantee'}</a>
					</div>
				</div> 
				<div id="accordion" class="description_wrap">
					<p class="accordion-toggle">{l s='Description'}</p>
					<div class="accordion-content">
						<p class="box active">{$product->description}</p>
					</div>
					<p class="accordion-toggle"><a href="/content/19-oplata-i-dostavka">{l s='delivery & payment'}</a></p>
					<div class="accordion-content">
						{$product->description_short}
					</div>
					<a href="#" class="contacts">{l s='Contacts'}</a>
					<a href="/content/17-obmen-i-vozvrat" class="guarantee">{l s='guarantee'}</a>
				</div>
			</div>
		</div>
		
			{if isset($packItemsMainProd) && $packItemsMainProd|@count > 0 && $product->main_prod}
                                                <section class="blockpack" id="s10">
                                                  
                                                    {foreach from=$packItemsMainProd item=packItemsMainProdOne}
                                                      
                                                        {include file="$tpl_dir./product-list-main-prod.tpl" products=$packItemsMainProdOne mainProd=$packItemsMainProdOne.0.id_product_pack}
                                                      
                                                       
                                                    {/foreach}
                                                  
                                                </section>
                                            {/if}        
            {if !$content_only}
		<div class="container set importedst ">
		{if isset($accessories) && $accessories}
			<!--Accessories -->
			<div class="like">
				<p class="title">{l s='Accessories'}</p>
				{$i=0}
				
				{foreach from=$accessories item=accessory name=accessories_list}
				    {if ($accessory.allow_oosp || $accessory.quantity_all_versions > 0 || $accessory.quantity > 0) && $accessory.available_for_order && !isset($restricted_country_mode)}
									{assign var='accessoryLink' value=$link->getProductLink($accessory.id_product, $accessory.link_rewrite, $accessory.category)}
                        <a href="{$accessoryLink|escape:'html':'UTF-8'}" title="{$accessory.legend|escape:'html':'UTF-8'}" class="prod">
                            <img class="lazyOwl" src="{$link->getImageLink($accessory.link_rewrite, $accessory.id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{$accessory.legend|escape:'html':'UTF-8'}" />
                            <p class="name">{$accessory.name|truncate:20:'...':true|escape:'html':'UTF-8'}</p>
                            <p class="price">
                                {if $priceDisplay != 1}
													{displayWtPrice p=$accessory.price}
												{else}
													{displayWtPrice p=$accessory.price_tax_exc}
												{/if}
												{hook h="displayProductPriceBlock" product=$accessory type="price"}
                            </p>
                        </a>
                	{/if}
                <div class="d_n">	{$i++}</div>
				{/foreach}
				
			</div>
			{if $i > 4}
			<a href="#" class="seeMore">{l s='see more'}</a>
			{/if}
			<!--end Accessories -->
		{/if}
		</div>
	{/if}
		
{strip}
{if isset($smarty.get.ad) && $smarty.get.ad}
	{addJsDefL name=ad}{$base_dir|cat:$smarty.get.ad|escape:'html':'UTF-8'}{/addJsDefL}
{/if}
{if isset($smarty.get.adtoken) && $smarty.get.adtoken}
	{addJsDefL name=adtoken}{$smarty.get.adtoken|escape:'html':'UTF-8'}{/addJsDefL}
{/if}
{addJsDef allowBuyWhenOutOfStock=$allow_oosp|boolval}
{addJsDef availableNowValue=$product->available_now|escape:'quotes':'UTF-8'}
{addJsDef availableLaterValue=$product->available_later|escape:'quotes':'UTF-8'}
{addJsDef attribute_anchor_separator=$attribute_anchor_separator|escape:'quotes':'UTF-8'}
{addJsDef attributesCombinations=$attributesCombinations}
{addJsDef currentDate=$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'}
{if isset($combinations) && $combinations}
	{addJsDef combinations=$combinations}
	{addJsDef combinationsFromController=$combinations}
	{addJsDef displayDiscountPrice=$display_discount_price}
	{addJsDefL name='upToTxt'}{l s='Up to' js=1}{/addJsDefL}
{/if}
{if isset($combinationImages) && $combinationImages}
	{addJsDef combinationImages=$combinationImages}
{/if}
{addJsDef customizationId=$id_customization}
{addJsDef customizationFields=$customizationFields}
{addJsDef default_eco_tax=$product->ecotax|floatval}
{addJsDef displayPrice=$priceDisplay|intval}
{addJsDef ecotaxTax_rate=$ecotaxTax_rate|floatval}
{if isset($cover.id_image_only)}
	{addJsDef idDefaultImage=$cover.id_image_only|intval}
{else}
	{addJsDef idDefaultImage=0}
{/if}
{addJsDef img_ps_dir=$img_ps_dir}
{addJsDef img_prod_dir=$img_prod_dir}
{addJsDef id_product=$product->id|intval}
{addJsDef jqZoomEnabled=$jqZoomEnabled|boolval}
{addJsDef maxQuantityToAllowDisplayOfLastQuantityMessage=$last_qties|intval}
{addJsDef minimalQuantity=$product->minimal_quantity|intval}
{addJsDef noTaxForThisProduct=$no_tax|boolval}
{if isset($customer_group_without_tax)}
	{addJsDef customerGroupWithoutTax=$customer_group_without_tax|boolval}
{else}
	{addJsDef customerGroupWithoutTax=false}
{/if}
{if isset($group_reduction)}
	{addJsDef groupReduction=$group_reduction|floatval}
{else}
	{addJsDef groupReduction=false}
{/if}
{addJsDef oosHookJsCodeFunctions=Array()}
{addJsDef productHasAttributes=isset($groups)|boolval}
{addJsDef productPriceTaxExcluded=($product->getPriceWithoutReduct(true)|default:'null' - $product->ecotax)|floatval}
{addJsDef productPriceTaxIncluded=($product->getPriceWithoutReduct(false)|default:'null' - $product->ecotax * (1 + $ecotaxTax_rate / 100))|floatval}
{addJsDef productBasePriceTaxExcluded=($product->getPrice(false, null, 6, null, false, false) - $product->ecotax)|floatval}
{addJsDef productBasePriceTaxExcl=($product->getPrice(false, null, 6, null, false, false)|floatval)}
{addJsDef productBasePriceTaxIncl=($product->getPrice(true, null, 6, null, false, false)|floatval)}
{addJsDef productReference=$product->reference|escape:'html':'UTF-8'}
{addJsDef productAvailableForOrder=$product->available_for_order|boolval}
{addJsDef productPriceWithoutReduction=$productPriceWithoutReduction|floatval}
{addJsDef productPrice=$productPrice|floatval}
{addJsDef productUnitPriceRatio=$product->unit_price_ratio|floatval}
{addJsDef productShowPrice=(!$PS_CATALOG_MODE && $product->show_price)|boolval}
{addJsDef PS_CATALOG_MODE=$PS_CATALOG_MODE}
{if $product->specificPrice && $product->specificPrice|@count}
	{addJsDef product_specific_price=$product->specificPrice}
{else}
	{addJsDef product_specific_price=array()}
{/if}
{if $display_qties == 1 && $product->quantity}
	{addJsDef quantityAvailable=$product->quantity}
{else}
	{addJsDef quantityAvailable=0}
{/if}
{addJsDef quantitiesDisplayAllowed=$display_qties|boolval}
{if $product->specificPrice && $product->specificPrice.reduction && $product->specificPrice.reduction_type == 'percentage'}
	{addJsDef reduction_percent=$product->specificPrice.reduction*100|floatval}
{else}
	{addJsDef reduction_percent=0}
{/if}
{if $product->specificPrice && $product->specificPrice.reduction && $product->specificPrice.reduction_type == 'amount'}
	{addJsDef reduction_price=$product->specificPrice.reduction|floatval}
{else}
	{addJsDef reduction_price=0}
{/if}
{if $product->specificPrice && $product->specificPrice.price}
	{addJsDef specific_price=$product->specificPrice.price|floatval}
{else}
	{addJsDef specific_price=0}
{/if}
{addJsDef specific_currency=($product->specificPrice && $product->specificPrice.id_currency)|boolval} {* TODO: remove if always false *}
{addJsDef stock_management=$PS_STOCK_MANAGEMENT|intval}
{addJsDef taxRate=$tax_rate|floatval}
{addJsDefL name=doesntExist}{l s='This combination does not exist for this product. Please select another combination.' js=1}{/addJsDefL}
{addJsDefL name=doesntExistNoMore}{l s='This product is no longer in stock' js=1}{/addJsDefL}
{addJsDefL name=doesntExistNoMoreBut}{l s='with those attributes but is available with others.' js=1}{/addJsDefL}
{addJsDefL name=fieldRequired}{l s='Please fill in all the required fields before saving your customization.' js=1}{/addJsDefL}
{addJsDefL name=uploading_in_progress}{l s='Uploading in progress, please be patient.' js=1}{/addJsDefL}
{addJsDefL name='product_fileDefaultHtml'}{l s='No file selected' js=1}{/addJsDefL}
{addJsDefL name='product_fileButtonHtml'}{l s='Choose File' js=1}{/addJsDefL}
{/strip}
{/if}
