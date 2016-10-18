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
{if !$opc}
	{assign var='current_step' value='address'}
	{capture name=path}{l s='Addresses'}{/capture}
	{assign var="back_order_page" value="order.php"}
	<h1 class="page-heading">{l s='Addresses'}</h1>
	{include file="$tpl_dir./order-steps.tpl"}
	{include file="$tpl_dir./errors.tpl"}
		<form action="{$link->getPageLink($back_order_page, true)|escape:'html':'UTF-8'}" method="post">
{else}
	{assign var="back_order_page" value="order-opc.php"}
	<div id="opc_account" class="opc-main-block">
		<div id="opc_account-overlay" class="opc-overlay" style="display: none;"></div>
{/if}
<div class="addresses clearfix">
	<div class="row">
		<div class="col-xs-12">
			<div class="address_delivery select form-group selector1">
				
				<select name="id_address_delivery" id="id_address_delivery" class="address_select form-control">
					{foreach from=$addresses key=k item=address}
						<option value="{$address.id_address|intval}"{if $address.id_address == $cart->id_address_delivery} selected="selected"{/if}>
							{$address.alias|escape:'html':'UTF-8'}
						</option>
					{/foreach}
				</select><span class="waitimage"></span>
			</div>
			<p class="checkbox addressesAreEquals"{if $cart->isVirtualCart()} style="display:none;"{/if}>
<input type="checkbox" name="same" id="addressesAreEquals" value="1"{if $cart->id_address_invoice == $cart->id_address_delivery || $addresses|@count == 1} checked="checked"{/if} />
				<label for="addressesAreEquals"> {l s='Use the delivery address as the billing address.'}
				<b><a href="/content/21-termsConditions">{l s='Соглашение'}</a></b>
				</label>
			</p>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div id="address_invoice_form" class="select form-group selector1"{if $cart->id_address_invoice == $cart->id_address_delivery} style="display: none;"{/if}>
				{if $addresses|@count > 1}
					<label for="id_address_invoice" class="strong">{l s='Choose a billing address:'}</label>
					<select name="id_address_invoice" id="id_address_invoice" class="address_select form-control">
					{section loop=$addresses step=-1 name=address}
						<option value="{$addresses[address].id_address|intval}"{if $addresses[address].id_address == $cart->id_address_invoice && $cart->id_address_delivery != $cart->id_address_invoice} selected="selected"{/if}>
							{$addresses[address].alias|escape:'html':'UTF-8'}
						</option>
					{/section}
					</select><span class="waitimage"></span>
				{else}
					<a href="{$link->getPageLink('address', true, NULL, "back={$back_order_page}?step=1&select_address=1{if $back}&mod={$back}{/if}")|escape:'html':'UTF-8'}" title="{l s='Add'}" class="button button-small btn btn-default">
						<span>
							{l s='Add a new address'}
							<i class="icon-chevron-right right"></i>
						</span>
					</a>
				{/if}
			</div>
		</div>
		  
	</div>
	<div class="row">
		<div class="col-xs-12"{if $cart->isVirtualCart()} style="display:none;"{/if}>
			<ul class="address item box" id="address_delivery">
			</ul>
				<p class="address_add submit">
		<a href="{$link->getPageLink('address', true, NULL, "back={$back_order_page}?step=1{if $back}&mod={$back}{/if}")|escape:'html':'UTF-8'}" title="{l s='Add'}" class="button button-small btn btn-default">
			<span>{l s='Add a new address'}<i class="icon-chevron-right right"></i></span>
		</a>
	</p>
		</div>

<!--
		<div class="col-xs-12 col-sm-6">
			<ul class="address alternate_item{if $cart->isVirtualCart()} full_width{/if} box" id="address_invoice">
			</ul>
		</div>
-->
{* <div class="col-xs-12">
<div class="delivery_options_address">
			<div id="deliv">{l s="Select Shipping"} <b class="button mr15fr">▾</b></div>
				{if isset($delivery_option_list)}
					{foreach $delivery_option_list as $id_address => $option_list}
						<ul class="delivery_options">
							{foreach $option_list as $key => $option}
							<li id="delivery_option_{$id_address|intval}_{$option@index}" class="delivery_option_radio" type="radio" name="delivery_option[{$id_address|intval}]" data-key="{$key}" data-id_address="{$id_address|intval}" value="{$key}"{if isset($delivery_option[$id_address]) && $delivery_option[$id_address] == $key} checked="checked"{/if} >
							    {if $option.unique_carrier}
														{foreach $option.carrier_list as $carrier}
															{$carrier.instance->name|escape:'htmlall':'UTF-8'}
														{/foreach}
													{/if}
							</li>
								 <!-- end delivery_option -->
							{/foreach}
						</ul> <!-- end delivery_options -->
						<div class="hook_extracarrier" id="HOOK_EXTRACARRIER_{$id_address}">
							{if isset($HOOK_EXTRACARRIER_ADDR) &&  isset($HOOK_EXTRACARRIER_ADDR.$id_address)}{$HOOK_EXTRACARRIER_ADDR.$id_address}{/if}
						</div>
						{foreachelse}
							{assign var='errors' value=' '|explode:''}
							<p class="alert alert-warning" id="noCarrierWarning">
								{foreach $cart->getDeliveryAddressesWithoutCarriers(true, $errors) as $address}
									{if empty($address->alias)}
										{l s='No carriers available.'}
									{else}
										{assign var='flag_error_message' value=false}
										{foreach $errors as $error}
											{if $error == Carrier::SHIPPING_WEIGHT_EXCEPTION}
												{$flag_error_message = true}
												{l s='The product selection cannot be delivered by the available carrier(s): it is too heavy. Please amend your cart to lower its weight.'}
											{elseif $error == Carrier::SHIPPING_PRICE_EXCEPTION}
												{$flag_error_message = true}
												{l s='The product selection cannot be delivered by the available carrier(s). Please amend your cart.'}
											{elseif $error == Carrier::SHIPPING_SIZE_EXCEPTION}
												{$flag_error_message = true}
												{l s='The product selection cannot be delivered by the available carrier(s): its size does not fit. Please amend your cart to reduce its size.'}
											{/if}
										{/foreach}
										{if !$flag_error_message}
											{l s='No carriers available for the address "%s".' sprintf=$address->alias}
										{/if}
									{/if}
									{if !$address@last}
										<br />
									{/if}
								{foreachelse}
									{l s='No carriers available.'}
								{/foreach}
							</p>
						{/foreach}
					{/if}
</div>
</div> *}
	</div> <!-- end row -->
        <div class="row">
			<div class="col-xs-12 mymg">
                {include file = "$tpl_dir./order-payment.tpl"}
            </div>
            <div class="col-xs-12">
                <button type="submit" name="submitAccount" id="submitAccount"  class="button btn nn btn-default button-medium">
					<span>{l s='Proceed to checkout'}<i class="icon-chevron-right right"></i></span>
				</button>
            </div>
		</div>
	{if !$opc}
		<div id="ordermsg" class="form-group">
			<label>{l s='If you would like to add a comment about your order, please write it in the field below.'}</label>
			<textarea class="form-control" cols="60" rows="6" name="message">{if isset($oldMessage)}{$oldMessage}{/if}</textarea>
		</div>
	{/if}
</div> <!-- end addresses -->

{if !$opc}
			<p class="cart_navigation clearfix">
				<input type="hidden" class="hidden" name="step" value="2" />
				<input type="hidden" name="back" value="{$back}" />
				<a href="{$link->getPageLink($back_order_page, true, NULL, "{if $back}back={$back}{/if}")|escape:'html':'UTF-8'}" title="{l s='Previous'}" class="button-exclusive btn btn-default">
					<i class="icon-chevron-left"></i>
					{l s='Continue Shopping'}
				</a>
				<button type="submit" name="processAddress" class="button btn btn-default button-medium">
					<span>{l s='Proceed to checkout'}<i class="icon-chevron-right right"></i></span>
				</button>
			</p>
		</form>
{else}
	</div> <!--  end opc_account -->
{/if}
{strip}
{if !$opc}
	{addJsDef orderProcess='order'}
	{addJsDefL name=txtProduct}{l s='product' js=1}{/addJsDefL}
	{addJsDefL name=txtProducts}{l s='products' js=1}{/addJsDefL}
	{addJsDefL name=CloseTxt}{l s='Submit' js=1}{/addJsDefL}
{/if}
{capture}{if $back}&mod={$back|urlencode}{/if}{/capture}
{capture name=addressUrl}{$link->getPageLink('address', true, NULL, 'back='|cat:$back_order_page|cat:'?step=1'|cat:$smarty.capture.default)|escape:'quotes':'UTF-8'}{/capture}
{addJsDef addressUrl=$smarty.capture.addressUrl}
{capture}{'&multi-shipping=1'|urlencode}{/capture}
{addJsDef addressMultishippingUrl=$smarty.capture.addressUrl|cat:$smarty.capture.default}
{capture name=addressUrlAdd}{$smarty.capture.addressUrl|cat:'&id_address='}{/capture}
{addJsDef addressUrlAdd=$smarty.capture.addressUrlAdd}
{addJsDef formatedAddressFieldsValuesList=$formatedAddressFieldsValuesList}
{addJsDef opc=$opc|boolval}
{capture}<h3 class="page-subheading">{l s='Your billing address' js=1}</h3>{/capture}
{addJsDefL name=titleInvoice}{$smarty.capture.default|@addcslashes:'\''}{/addJsDefL}
{capture}<h3 class="page-subheading">{l s='Your delivery address' js=1}</h3>{/capture}
{addJsDefL name=titleDelivery}{$smarty.capture.default|@addcslashes:'\''}{/addJsDefL}
{capture}<a class="button button-small btn btn-default" href="{$smarty.capture.addressUrlAdd}" title="{l s='Update' js=1}"><span>{l s='Update' js=1}<i class="icon-chevron-right right"></i></span></a>{/capture}
{addJsDefL name=liUpdate}{$smarty.capture.default|@addcslashes:'\''}{/addJsDefL}
{/strip}