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

{if $opc}
	{assign var="back_order_page" value="order-opc.php"}
	{else}
	{assign var="back_order_page" value="order.php"}
{/if}

{if $PS_CATALOG_MODE}
	{capture name=path}{l s='Your shopping cart'}{/capture}
	<h2 id="cart_title">{l s='Your shopping cart'}</h2>
	<p class="alert alert-warning">{l s='Your new order was not accepted.'}</p>
{else}
	{if $productNumber}
		<!-- Shopping Cart -->

		{include file="$tpl_dir./shopping-cart.tpl"}
		<!-- End Shopping Cart -->
		{if $is_logged AND !$is_guest}
			{include file="$tpl_dir./order-address.tpl"}
		{else}
			<!-- Create account / Guest account / Login block -->
			{include file="$tpl_dir./order-opc-new-account.tpl"}
			<!-- END Create account / Guest account / Login block -->
		{/if}
		<!-- Carrier -->
			<div class="clear"></div>
<div class="basket_footer">
					<div class="basket_rules">
						<div class="basket_rules_name">{l s='basket rules'}</div>
						<ul>
							<li>{l s='Add the product to the wishlist does not cause the reservation.'}</li>
							<li>{l s='Wishlist content is saved automatically.'}</li>
							<li>{l s='Products sold are marked as "not available".'}</li>
							<li>{l s='For customers logged wishlist contents stored by month.'}</li>
							<li>{l s='For registered customers contents of the wishlist is stored until it is manually cleaned.'}</li>
						</ul>
					</div>
					<div class="basket_f_right">
						<div class="phone_info">
							<div class="phone_info_name">{l s='phone'}</div>
                            <p>{l s='+1 (213) 550-3798 (Available Monday to Friday 8am-11pm EST and Saturday to Sunday 9am-9pm EST)'}</p>
						</div>
						<div class="chat_info">
							<div class="chat_info_name">{l s='chat'}</div>
							<p>{l s='Please note that whilst we will always try to have an agent available, we may not be free during peak service times.'}</p>
						</div>
						<div class="email_info">
							<div class="email_info_name">{l s='email'}</div>
							<p><a href="mailto:shop@antoniobiaggi.com" class="eee">{l s='Click here'} </a>{l s='to send us an Email.'}</p>
						</div>
					</div>
				</div>
		<!-- END Carrier -->
	

		<!-- END Payment -->
		<div class="clear"></div>
	{else}
		{capture name=path}{l s='Your shopping cart'}{/capture}
		<h2 class="page-heading">{l s='Your shopping cart'}</h2>
		{include file="$tpl_dir./errors.tpl"}
		<p class="alert alert-warning">{l s='Your shopping cart is empty.'}</p>
	{/if}
{strip}
{addJsDef imgDir=$img_dir}
{addJsDef authenticationUrl=$link->getPageLink("authentication", true)|escape:'quotes':'UTF-8'}
{addJsDef orderOpcUrl=$link->getPageLink("order-opc", true)|escape:'quotes':'UTF-8'}
{addJsDef historyUrl=$link->getPageLink("history", true)|escape:'quotes':'UTF-8'}
{addJsDef guestTrackingUrl=$link->getPageLink("guest-tracking", true)|escape:'quotes':'UTF-8'}
{addJsDef addressUrl=$link->getPageLink("address", true, NULL, "back={$back_order_page}")|escape:'quotes':'UTF-8'}
{addJsDef orderProcess='order-opc'}
{addJsDef guestCheckoutEnabled=$PS_GUEST_CHECKOUT_ENABLED|intval}
{addJsDef displayPrice=$priceDisplay}
{addJsDef taxEnabled=$use_taxes}
{addJsDef conditionEnabled=$conditions|intval}
{addJsDef vat_management=$vat_management|intval}
{addJsDef errorCarrier=$errorCarrier|@addcslashes:'\''}
{addJsDef errorTOS=$errorTOS|@addcslashes:'\''}
{addJsDef checkedCarrier=$checked|intval}
{addJsDef addresses=array()}
{addJsDef isVirtualCart=$isVirtualCart|intval}
{addJsDef isPaymentStep=$isPaymentStep|intval}
{addJsDefL name=txtWithTax}{l s='(tax incl.)' js=1}{/addJsDefL}
{addJsDefL name=txtWithoutTax}{l s='(tax excl.)' js=1}{/addJsDefL}
{addJsDefL name=txtHasBeenSelected}{l s='has been selected' js=1}{/addJsDefL}
{addJsDefL name=txtNoCarrierIsSelected}{l s='No carrier has been selected' js=1}{/addJsDefL}
{addJsDefL name=txtNoCarrierIsNeeded}{l s='No carrier is needed for this order' js=1}{/addJsDefL}
{addJsDefL name=txtConditionsIsNotNeeded}{l s='You do not need to accept the Terms of Service for this order.' js=1}{/addJsDefL}
{addJsDefL name=txtTOSIsAccepted}{l s='The service terms have been accepted' js=1}{/addJsDefL}
{addJsDefL name=txtTOSIsNotAccepted}{l s='The service terms have not been accepted' js=1}{/addJsDefL}
{addJsDefL name=txtThereis}{l s='There is' js=1}{/addJsDefL}
{addJsDefL name=txtErrors}{l s='Error(s)' js=1}{/addJsDefL}
{addJsDefL name=txtDeliveryAddress}{l s='Delivery address' js=1}{/addJsDefL}
{addJsDefL name=txtInvoiceAddress}{l s='Invoice address' js=1}{/addJsDefL}
{addJsDefL name=txtModifyMyAddress}{l s='Modify my address' js=1}{/addJsDefL}
{addJsDefL name=txtInstantCheckout}{l s='Instant checkout' js=1}{/addJsDefL}
{addJsDefL name=txtSelectAnAddressFirst}{l s='Please start by selecting an address.' js=1}{/addJsDefL}
{addJsDefL name=txtFree}{l s='Free' js=1}{/addJsDefL}

{capture}{if $back}&mod={$back|urlencode}{/if}{/capture}
{capture name=addressUrl}{$link->getPageLink('address', true, NULL, 'back='|cat:$back_order_page|cat:'?step=1'|cat:$smarty.capture.default)|escape:'quotes':'UTF-8'}{/capture}
{addJsDef addressUrl=$smarty.capture.addressUrl}
{capture}{'&multi-shipping=1'|urlencode}{/capture}
{addJsDef addressMultishippingUrl=$smarty.capture.addressUrl|cat:$smarty.capture.default}
{capture name=addressUrlAdd}{$smarty.capture.addressUrl|cat:'&id_address='}{/capture}
{addJsDef addressUrlAdd=$smarty.capture.addressUrlAdd}
{addJsDef opc=$opc|boolval}
{capture}<h3 class="page-subheading">{l s='Your billing address' js=1}</h3>{/capture}
{addJsDefL name=titleInvoice}{$smarty.capture.default|@addcslashes:'\''}{/addJsDefL}
{capture}<h3 class="page-subheading">{l s='Your delivery address' js=1}</h3>{/capture}
{addJsDefL name=titleDelivery}{$smarty.capture.default|@addcslashes:'\''}{/addJsDefL}
{capture}<a class="button button-small btn btn-default" href="{$smarty.capture.addressUrlAdd}" title="{l s='Update' js=1}"><span>{l s='Update' js=1}<i class="icon-chevron-right right"></i></span></a>{/capture}
{addJsDefL name=liUpdate}{$smarty.capture.default|@addcslashes:'\''}{/addJsDefL}
{/strip}
{/if}