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
* Do not edit or add to this file if you wish to upgrade PrestaShop to newersend_friend_form_content
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<div id="">
				{if (!$too_early AND ($is_logged OR $allow_guests))}
				<a id="new_comment_tab_btn" class="writeReview open-comment-form" href="#new_comment_form">
					{l s='Write a Review' mod='productcomments'}
				</a>
			{/if}
		
			{if (!$too_early AND ($is_logged OR $allow_guests))}
				<a id="new_comment_tab_btn" class="writeReview open-comment-form" href="#new_comment_form">
					{l s='Write a Review' mod='productcomments'}
				</a>
			{else}
			<a id="new_comment_tab_btn" class="writeReview open-comment-form" href="#new_comment_form">
					{l s='Write a Review' mod='productcomments'}
				</a>
			{/if}
	 <div id="owl-demo">
			{foreach from=$comments item=comment}
				{if $comment.content}
         <div class="item">
             <a href="#" class="name">{$comment.title}</a>
             <a href="#" class="text">{$comment.content|escape:'html':'UTF-8'|nl2br}</a>
         </div>
				{/if}
			{/foreach}
	</div> <!-- #product_comments_block_tab -->
	</div> 


<!-- Fancybox -->
<div style="display: none;">
	<div id="new_comment_form">
		<form id="id_new_comment_form" action="#">
			<h2 class="page-subheading">
				{l s='Write a review' mod='productcomments'}
			</h2>
			<div class="row">
				{if isset($product) && $product}
					<div class="product clearfix  col-xs-12 col-sm-6">
						<img src="{$productcomment_cover_image}" height="{$mediumSize.height}" width="{$mediumSize.width}" alt="{$product->name|escape:'html':'UTF-8'}" />
						<div class="product_desc">
							<p class="product_name">
								<strong>{$product->name}</strong>
							</p>
							{$product->description_short}
						</div>
					</div>
				{/if}
				<div class="new_comment_form_content col-xs-12 col-sm-6">
					<div id="new_comment_form_error" class="error" style="display: none; padding: 15px 25px">
						<ul></ul>
					</div>

					<label for="comment_title">
						{l s='Title:' mod='productcomments'} <sup class="required">*</sup>
					</label>
					<input id="comment_title" name="title" type="text" value=""/>
					<label for="content">
						{l s='Comment:' mod='productcomments'} <sup class="required">*</sup>
					</label>
					<textarea id="content" name="content"></textarea>
					{if $allow_guests == true && !$is_logged}
						<label>
							{l s='Your name:' mod='productcomments'} <sup class="required">*</sup>
						</label>
						<input id="commentCustomerName" name="customer_name" type="text" value=""/>
					{/if}
					<div id="new_comment_form_footer">
						<input id="id_product_comment_send" name="id_product" type="hidden" value='{$id_product_comment_form}' />
						<p class="fl required"><sup>*</sup> {l s='Required fields' mod='productcomments'}</p>
						<p class="fr">
							<button id="submitNewMessage" name="submitMessage" type="submit" class="btn button button-small">
								<span>{l s='Submit' mod='productcomments'}</span>
							</button>&nbsp;
							{l s='or' mod='productcomments'}&nbsp;
							<a class="closefb" href="#">
								{l s='Cancel' mod='productcomments'}
							</a>
						</p>
						<div class="clearfix"></div>
					</div> <!-- #new_comment_form_footer -->
				</div>
			</div>
		</form><!-- /end new_comment_form_content -->
	</div>
</div>
<!-- End fancybox -->
{strip}
{addJsDef productcomments_controller_url=$productcomments_controller_url|@addcslashes:'\''}
{addJsDef moderation_active=$moderation_active|boolval}
{addJsDef productcomments_url_rewrite=$productcomments_url_rewriting_activated|boolval}
{addJsDef secure_key=$secure_key}

{addJsDefL name=confirm_report_message}{l s='Are you sure that you want to report this comment?' mod='productcomments' js=1}{/addJsDefL}
{addJsDefL name=productcomment_added}{l s='Your comment has been added!' mod='productcomments' js=1}{/addJsDefL}
{addJsDefL name=productcomment_added_moderation}{l s='Your comment has been added and will be available once approved by a moderator.' mod='productcomments' js=1}{/addJsDefL}
{addJsDefL name=productcomment_title}{l s='New comment' mod='productcomments' js=1}{/addJsDefL}
{addJsDefL name=productcomment_ok}{l s='OK' mod='productcomments' js=1}{/addJsDefL}
{/strip}
