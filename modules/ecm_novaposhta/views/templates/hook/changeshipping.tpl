{nocache}
<style>
.opc-form-control, #orderform select {
    padding: 0;
}
</style>
<input id="module_dir" name="module_dir" type="hidden" value ="{$modulesdir}"/>
<input id="customer" name="customer" type="hidden" value ="{$cart->id_customer}"/>
<input id="cart_id" name="cart_id" type="hidden" value ="{$cart->id}"/>
<input id="np" name="np" type="hidden" value ="{$np_id}"/>
<input id="fixcost" name="fixcost" type="hidden" value ="{$fixcost}"/>
<input id="ac" name="ac" type="hidden" value ="{$ac}"/>
<input id="fill" name="fill" type="hidden" value ="{$fill}"/>
<input id='npcost' name="npcost" type="hidden" value ="{round($cart_np.cost)}"/>
<input id='total_wt' name="total_wt" type="hidden" value ="{$cartdetails.total_wt}"/>
{if !isset($delivery_option) and !$ac}{literal}
<script>
if ($("#ac").val()==1 || $("div").is("#opc_delivery_methods")) location.reload();
else window.location = window.location.href.toString().replace("?step=2", "") + "?step=2";
</script>{/literal}
{else}
	{if $cart->id_carrier == $np_id}
	<div class="delivery_option alternate_item my_np">
		<div >
			<table class="resume table table-bordered">
			<tbody>
			<tr>
				<td>
				<div class="col-xs-12">
						{if $ac} <div id="recipient" style="display:none">
						{else} <div id="recipient" style="display:none"> {/if}
						<div class="address_delivery">
							<label for="np_firstname">{l s='First name' mod='ecm_novaposhta'}</label>
							<input id="np_firstname" name="np_firstname" value="{$cart_np.firstname}"
							oninput='delaysave(5000)'></input>
						</div>
						<div class="address_delivery">
							<label for="np_lastname">{l s='Last name' mod='ecm_novaposhta'}</label>
							<input id="np_lastname" name="np_lastname" value="{$cart_np.lastname}"
							oninput='delaysave(5000)'></input>
						</div>
						<div class="address_delivery">
							<label for="np_phone">{l s='Mobile phone' mod='ecm_novaposhta'}</label>
							<input id="np_phone" name="np_phone" value="{$cart_np.phone}"
							oninput='delaysave(5000)'></input>
						</div>
						<hr></hr>
						</div>
						<div class='address_delivery select form-group selectorl'>
						<label for='id_area_delivery'>{l s='Area' mod='ecm_novaposhta'}</label>
							<select name='id_area_delivery' id='id_area_delivery' class='form-control'
							onchange='refreshcity()'>
							{html_options options=$Areas selected=$cart_np.area}
							</select>
						</div>
											
						<div class='address_delivery select form-group selectorl'>
						<label for='id_city_delivery'>{l s='City' mod='ecm_novaposhta'}</label>
							<select name='id_city_delivery' id='id_city_delivery' class='form-control'
							onchange='refreshware()'>
							{html_options options=$Citys selected=$cart_np.city}
							</select>
						</div>
						<div class='address_delivery select form-group selectorl'>
						<label for='id_ware_delivery'>{l s='Postoffice' mod='ecm_novaposhta'}</label>
							<select name='id_ware_delivery' id='id_ware_delivery' class='form-control'
							onchange='saveform(0)'>
							{html_options options=$Wares selected=$cart_np.ref}
							</select>
						</div>
						{if 0}
						<hr></hr>
						<div class="address_delivery">
							<p class="checkbox">
							<input type="checkbox" name="nal" id="nal" 
							{if $cart_np.nal > 0} value="1" checked="checked"
							{else} value="0" {/if}
							onchange="saveform(0)">
							<label for="nal">{l s='Cash on delivery' mod='ecm_novaposhta'}</label>
							</p>
						</div>
						{/if}
					</div>	
				</div>
			</td>
		{if $show}		<td>
			{if isset($delivery_option)}
				{l s='The calculation is based on the total weight of the goods and the order value' mod='ecm_novaposhta'}
				<hr>
				{l s='Total weight' mod='ecm_novaposhta'} - {$cartdetails.weight} кг.<br>
				{l s='Volumeric weight' mod='ecm_novaposhta'} - {$cartdetails.vweight} кг.<br>
				{l s='Cost of order' mod='ecm_novaposhta'} - {$cartdetails.total_wt} {$currency->sign}<br>
					{if isset($cart_np.cost) and !$fixcost} 
					{l s='Shiping cost' mod='ecm_novaposhta'} - <span id='np_cost'>{round($cart_np.cost)}</span> {$currency->sign}<br>
					{l s='Comiso of COD' mod='ecm_novaposhta'} - <span id='np_costredelivery'>{round($cart_np.costredelivery)}</span> {$currency->sign}<br>
					{/if}
			{else}
				{l s='Please by patient!' mod='ecm_novaposhta'}
			{/if}
			</td>
		{/if}
		</tr>
		</tbody>
		</table>

		</div>
		
		<div id="refreshdelivery"></div>
	</div>
	<script language="JavaScript" src="{$module_dir}js/np.js" type="text/javascript"></script>
	{/if}
{/if}

<!-- /Change shipping module -->
