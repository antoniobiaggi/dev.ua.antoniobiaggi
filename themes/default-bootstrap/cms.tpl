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
{if isset($cms) && !isset($cms_category)}
	{if !$cms->active}
		<br />
		<div id="admin-action-cms">
			<p>
				<span>{l s='This CMS page is not visible to your customers.'}</span>
				<input type="hidden" id="admin-action-cms-id" value="{$cms->id}" />
				<input type="submit" value="{l s='Publish'}" name="publish_button" class="button btn btn-default"/>
				<input type="submit" value="{l s='Back'}" name="lnk_view" class="button btn btn-default"/>
			</p>
			<div class="clear" ></div>
			<p id="admin-action-result"></p>
		</div>
	{/if}
   
    <div class="ab-news-share">
        <span>share:</span>
        <ul>
            <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={$smarty.server.REQUEST_URI}" class="social-icon-fb"><img src="/themes/default-bootstrap/images/n_pages/icon3.png"></a></li>
            <li><a href="https://twitter.com/share?url={$smarty.server.REQUEST_URI}" class="social-icon-tw"> <img src="/themes/default-bootstrap/images/n_pages/icon2.png"></a></li>
        </ul>
    </div>
    

				<div class="mairon_Stores">

					<h1 class="mairon_Title">{l s='store finder'}</h1>

					<div class="mairon_StoresMap" id="mairon_StoresMap">
					</div>

					<div class="mairon_Location">
						<div class="mairon_LocationForm__txt">{l s='Your location'}</div>
						<input type="text" class="Form__field field_effect" value="" placeholder="{l s='enter zip/postal code, address, city or country'}" />
						<button class="mairon_button"><span>{l s='Search'}</span></button>
					</div>

				</div>
				<!-- / mairon_Stores -->

    
	<div class="rte{if $content_only} content_only{/if}">
		{$cms->content}
		{if $prestablog}
			<div class="mairon_WorldPublic">
				<div class="mairon_WorldPublicHead">
					<div class="mairon_WorldPublicHeadTitle">
						<div class="mairon_WorldPublicHeadTitle__txt mairon_WorldPublicHeadTitle__txt_dark">Biaggi</div>
						<div class="mairon_WorldPublicHeadTitle__txt mairon_WorldPublicHeadTitle__txt_italic">Блог</div>
					</div>
					<div class="mairon_WorldPublicHead__slogan">последние новости и модные советы</div>
				</div>
				<!--/ mairon_WorldPublicHead -->
			</div>
			
				<div class="model-foto-style">
					<div class="wrapp-model-foto-style clearfix">
						
							{$irr='0'}
							{$sty='1'}
							{$step1 = ''}
							{$btn = 0}
							{foreach from=$prestablog item=Item name=myLoop}
								{if $irr==0}
									{$step = 'item-model frolova'}
									{$step1 = 'name-model'}
									{$sty = 0}
								{/if}
								{if $irr==1}
									{$step = 'item-model center-marg'}
									{$step1 = 'name-model'}
									{$sty = 0}
								{/if}
								{if $irr==2}
									{$step = 'takes-her'}
									{$step1 = 'text-takes'}
									{$sty = 1}
								{/if}
								{if $irr==3}
									{$step = 'item-model position-centr for-adapt'}
									{$step1 = 'name-model'}
									{$sty = 0}
									{$btn = 1}
								{/if}
								<div class="{$step}">
									<div class="foto-model ">
										<a href="{PrestaBlogUrl id=$Item.id_prestablog_news seo=$Item.link_rewrite titre=$Item.title}">
										<img src="{$prestablog_theme_upimg|escape:'html':'UTF-8'}thumb_{$Item.id_prestablog_news|intval}.jpg?{$md5pic|escape:'htmlall':'UTF-8'}" alt="{$Item.title|escape:'htmlall':'UTF-8'}">
										</a>
										{if $btn}
											<a class="mairon_button" href="/blog">загрузить еще</a>
										{/if}
									</div>
									<div class="{$step1}">
										{if $sty == 1}<p>{/if}
										<a href="{PrestaBlogUrl id=$Item.id_prestablog_news seo=$Item.link_rewrite titre=$Item.title}">{$Item.title|escape:'htmlall':'UTF-8'}</a>
										{if $sty == 1}</p>{/if}
									</div>
								</div>
								{$irr = $irr+1}
							{/foreach}
						
					</div>
				</div>
			
		{/if}
	</div>
{elseif isset($cms_category)}
	<div class="block-cms">
		<h1><a href="{if $cms_category->id eq 1}{$base_dir}{else}{$link->getCMSCategoryLink($cms_category->id, $cms_category->link_rewrite)}{/if}">{$cms_category->name|escape:'html':'UTF-8'}</a></h1>
		{if $cms_category->description}
			<p>{$cms_category->description|escape:'html':'UTF-8'}</p>
		{/if}
		{if isset($sub_category) && !empty($sub_category)}	
			<p class="title_block">{l s='List of sub categories in %s:' sprintf=$cms_category->name}</p>
			<ul class="bullet list-group">
				{foreach from=$sub_category item=subcategory}
					<li>
						<a class="list-group-item" href="{$link->getCMSCategoryLink($subcategory.id_cms_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}">{$subcategory.name|escape:'html':'UTF-8'}</a>
					</li>
				{/foreach}
			</ul>
		{/if}
		{if isset($cms_pages) && !empty($cms_pages)}
		<p class="title_block">{l s='List of pages in %s:' sprintf=$cms_category->name}</p>
			<ul class="bullet list-group">
				{foreach from=$cms_pages item=cmspages}
					<li>
						<a class="list-group-item" href="{$link->getCMSLink($cmspages.id_cms, $cmspages.link_rewrite)|escape:'html':'UTF-8'}">{$cmspages.meta_title|escape:'html':'UTF-8'}</a>
					</li>
				{/foreach}
			</ul>
		{/if}
	</div>
{else}
	<div class="alert alert-danger">
		{l s='This page does not exist.'}
	</div>
{/if}

{strip}
{if isset($smarty.get.ad) && $smarty.get.ad}
{addJsDefL name=ad}{$base_dir|cat:$smarty.get.ad|escape:'html':'UTF-8'}{/addJsDefL}
{/if}
{if isset($smarty.get.adtoken) && $smarty.get.adtoken}
{addJsDefL name=adtoken}{$smarty.get.adtoken|escape:'html':'UTF-8'}{/addJsDefL}
{/if}
{/strip}
