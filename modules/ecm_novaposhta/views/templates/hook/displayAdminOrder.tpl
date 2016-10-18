
<br>
<input id="module_dir" name="module_dir" type="hidden" value ="{$modulesdir}"/>
<input id="customer" name="customer" type="hidden" value ="{$order_details.id_customer}"/>
<input id="id_order" name="id_order" type="hidden" value ="{$order_details.id_order}"/>
<input id="id_address" name="id_address" type="hidden" value ="{$order_details.id_address_delivery}"/>
<input id="id_ware_od" name="id_ware_od" type="hidden" value ="{$order_details.ware}"/>
<input id="id_city_od" name="id_city_od" type="hidden" value ="{$order_details.city}"/>
<input id="id_area_od" name="id_area_od" type="hidden" value ="{$order_details.area}"/>
<input id="weight_od" name="weight_od" type="hidden" value ="{$order_details.weight_od}"/>
<input id="vweight_od" name="vweight_od" type="hidden" value ="{$order_details.vweight_od}"/>
<input id="id_cart" name="id_cart" type="hidden" value ="{$order_details.id_cart}"/>
<input id="insurance_od" name="insurance_od" type="hidden" value ="{$order_details.insurance}"/>
<input id="cod_value_od" name="cod_value_od" type="hidden" value ="{$order_details.total_products_wt}"/>
<input id="x" name="x" type="hidden" value ="{$order_details.x}"/>
<input id="y" name="y" type="hidden" value ="{$order_details.y}"/>
<input id="ware" name="ware" type="hidden" value ="{$ware}"/>

<a onclick="changecarrier({$id_order})" class="button button-small btn btn-default" title="{l s='Change carrier' mod='ecm_novaposhta'}">
<span><i class="icon-truck "></i> <i class="icon-refresh"></i> {l s='Change carrier' mod='ecm_novaposhta'} </span></a>
{if $order_details.id_carrier != $np_id}
<a onclick="changecarrier_np({$id_order})" class="button button-small btn btn-default" title="{l s='Change carrier to New Post' mod='ecm_novaposhta'}">
<span><i class="icon-truck "></i> <i class="icon-refresh"></i> {l s='Change carrier to New Post' mod='ecm_novaposhta'} </span></a>
{/if}
<br>&nbsp;
{if $order_details.id_carrier == $np_id}
{if $order_details.nal == "1"}{assign var=nal_checked value="checked='checked'"}{else}{assign var=nal_checked value=""}{/if}
{if $order_details.senderpay == "1"}{assign var=pay_checked value="checked='checked'"}{else}{assign var=pay_checked value=""}{/if}
{if $order_details.senderpaynal == "1"}{assign var=nal_pay_checked value="checked='checked'"}{else}{assign var=nal_pay_checked value=""}{/if}
{if $order_details.insurance == "0"}{assign var=insurance value=$order_details.total_products_wt}{else}{assign var=insurance value=$order_details.insurance}{/if}
{if !isset($format)}{assign var=format value="pdf"}{/if}

<fieldset>
<div class="panel">
<div class="panel-heading"><i class="icon-truck "></i>
	{l s='Details of Nova Poshta delivery' mod='ecm_novaposhta'} <span class="badge"> № {$order_details.id_carrier} </span>
	{l s='address' mod='ecm_novaposhta'} <span class="badge"> № {$order_details.id_address_delivery} </span>
</div>

<table class="table">
	<tr>
		<td width='400' >{l s='First name' mod='ecm_novaposhta'}</td>
		<td width='400' ><input id="firstname" name="firstname" value="{$order_details.firstname}"></input></td>
		<td rowspan='12' ><div id="map_canvas" style="width: 280px; height: 280px;"></div></td>
	</tr>
	<tr>
		<td>{l s='Last name' mod='ecm_novaposhta'}</td>
		<td><input id="lastname" name="lastname" value="{$order_details.lastname}"></input></td>
	</tr>
	<tr>
		<td>{l s='Mobile phone' mod='ecm_novaposhta'}</td>
		<td><input id="phone" name="phone" value="{$order_details.phone}"></input></td>
	</tr>
	<tr>
		<td>{l s='Area' mod='ecm_novaposhta'}</td>
		<td>
			<select name='id_area_delivery' id='id_area_delivery' class='address_select form-control'
			onchange='refreshcity()'>
			{html_options options=$Areas selected=$order_details.area}
			</select>
		</td>
	</tr>
	<tr>
		<td>{l s='City' mod='ecm_novaposhta'}</td>
		<td>
			<select name='id_city_delivery' id='id_city_delivery' class='address_select form-control'
			onchange='refreshware()'>
			{html_options options=$Citys selected=$order_details.city}
			</select>
		</td>
	</tr>
	<tr>
		<td>{l s='Warehouse' mod='ecm_novaposhta'}</td>
		<td>
			<select name='id_ware_delivery' id='id_ware_delivery' class='address_select form-control' 
			onchange='saveform_od()'>
			{html_options options=$Wares selected=$order_details.ware}
			</select>
		</td>
	</tr>
	<tr>
		<td>{l s='Weight' mod='ecm_novaposhta'}</td>
		<td><input id="weight" name="weight" value="{$order_details.weight}"></input>&nbsp;
			<a onclick="copy('weight')" class="button button-small btn btn-default" title="{l s='Get weight from order' mod='ecm_novaposhta'}">
			<span> <i class="icon-refresh"></i> {l s='From order' mod='ecm_novaposhta'} </span>
			</a>
		</td>
	</tr>
	<tr>
		<td>{l s='Volumetric weight' mod='ecm_novaposhta'}</td>
		<td><input id="vweight" name="vweight" value="{$order_details.vweight}"></input>&nbsp;
			<a onclick="copy('vweight')" class="button button-small btn btn-default" title="{l s='Get volumetric weight from order' mod='ecm_novaposhta'}">
			<span> <i class="icon-refresh"></i> {l s='From order' mod='ecm_novaposhta'} </span>
			</a>
		</td>
	</tr>
	<tr>
		<td>{l s='Description' mod='ecm_novaposhta'}</td>
		<td><input id="description" name="description" value="{$order_details.description}"></input></td>
	</tr>
	<tr>
		<td>{l s='Pack' mod='ecm_novaposhta'}</td>
		<td><input id="pack" name="pack" value="{$order_details.pack}"></input></td>
	</tr>
	<tr>
		<td>{l s='Packing Number' mod='ecm_novaposhta'}</td>
		<td><input id="PackingNumber" name="PackingNumber" value="{$order_details.PackingNumber}"></input></td>
	</tr>
	<tr>
		<td>{l s='Seats Amount' mod='ecm_novaposhta'}</td>
		<td><input id="seats_amount" name="seats_amount" value="{$order_details.seats_amount}"></input></td>
	</tr>
	<tr style="display:none">
		<td>{l s='Cargo Types' mod='ecm_novaposhta'}</td>
		<td>{html_options name=CargoType options=$CargoTypes selected=$CargoType}</td>
	</tr>
	<tr style="display:none">
		<td>{l s='Service Types' mod='ecm_novaposhta'}</td>
		<td>{html_options name=ServiceType options=$ServiceTypes selected=$ServiceType}</td>
	</tr>
	<tr>
		<td>{l s='Amount of insurance' mod='ecm_novaposhta'}</td>
		<td><input id="insurance" name="insurance" value="{$insurance}"></input>&nbsp;
			<a onclick="copy('insurance')" class="button button-small btn btn-default" title="{l s='Get amount of insurance from order' mod='ecm_novaposhta'}">
			<span> <i class="icon-refresh"></i> {l s='From order' mod='ecm_novaposhta'} </span>
			</a>
		</td>
	</tr>
	<tr>
		<td>{l s='COD amount' mod='ecm_novaposhta'}</td>
		<td><input id="cod_value" name="cod_value" value="{$order_details.cod_value}"></input>&nbsp;
			<a onclick="copy('cod_value')" class="button button-small btn btn-default" title="{l s='Get COD amount from order' mod='ecm_novaposhta'}">
			<span> <i class="icon-refresh"></i> {l s='From order' mod='ecm_novaposhta'} </span>
			</a>
		</td>
	</tr>
	<tr>
		<td>{l s='Cache on delivery' mod='ecm_novaposhta'}</td>
		<td><input {$nal_checked} id="nal_check" name="nal_check" value="0" type="checkbox"></td>
	</tr>
	<tr>
		<td>{l s='Sender pay for delivery' mod='ecm_novaposhta'}</td>
		<td><input {$pay_checked} id="pay_check" name="pay_check" value="0" type="checkbox"></td>
	</tr>
	<tr>
		<td>{l s='Sender pay for Cache on delivery' mod='ecm_novaposhta'}</td>
		<td><input {$nal_pay_checked} id="nal_pay_check" name="nal_pay_check" value="0" type="checkbox"></td>
	</tr>
	<tr>
		<td>
			{$TrimMsg} {l s='characters maximum !' mod='ecm_novaposhta'} 
			{l s='Left' mod='ecm_novaposhta'} - 
			<span id="counter">{$TrimMsg - mb_strlen($order_details.msg)}</span>
		</td>
		<td><input id="TrimMsg" name="TrimMsg" type="hidden" value ="{$TrimMsg}"/>
			<textarea id="msg" name="msg" value="{$order_details.msg}" 
			onclick="length_check({$TrimMsg}, 'msg', 'counter')" 
			onkeyup="length_check({$TrimMsg}, 'msg', 'counter')"
			>{$order_details.msg}</textarea>
			<a onclick="copy('msg');setTimeout('length_check({$TrimMsg}, \'msg\', \'counter\')',250)" class="button button-small btn btn-default" title="{l s='Get amount of insurance from order' mod='ecm_novaposhta'}">
			<span> <i class="icon-refresh"></i> {l s='From order' mod='ecm_novaposhta'} </span>
			</a>

		</td>
	</tr>
	<tr>
		<td>{l s='Departure date' mod='ecm_novaposhta'}</td>
		<td><input id="data" name="data" value="{$data}"></input></td>
	</tr>
</table>

<hr>
<table>
	<tr>
		<td>
			{if $order_details.tracking_number == ""}
			{assign var=shipping_number value=""}
			<a onclick="makettn('{$id_order}','0')" class="button button-small btn btn-default pull-left" 
			title="{l s='Make EN' mod='ecm_novaposhta'}">
			<span> <i class="icon-truck"></i> {l s='Make EN' mod='ecm_novaposhta'} </span>
			</a>

			{else}
			{assign var=shipping_number value=$order_details.tracking_number}
			<a onclick="makettn('{$id_order}','1')" class="button button-small btn btn-default pull-left" 
			title="{l s='Update EN #' mod='ecm_novaposhta'}">
			<span> <i class="icon-refresh"></i> {l s='Update EN #' mod='ecm_novaposhta'} </span>
			</a>&nbsp;<span class="badge">{$order_details.tracking_number}</span>
			{/if}
		</td>
		<td rowspan='4' valign="top"><div id='result' name='result'> </div></td>
	</tr>
	{if $shipping_number == ""}
	<tr>
		<td><br>
			<a onclick="cost()" class="button button-small btn btn-default"
				title="{l s='Recalculate shipping' mod='ecm_novaposhta'}">
				<span> <i class="icon-refresh"></i> 
				{l s='Recalculate shipping' mod='ecm_novaposhta'} </span>
			</a>
		</td>
	</tr>
	{else}
	<tr>
		<td><br>
			<a href="https://my.novaposhta.ua/orders/printDocument/orders/{$shipping_number}/type/{$format}/apiKey/{$api_key}" target="_blank"
				class="button button-small btn btn-default" title="{l s='Print TTN' mod='ecm_novaposhta'}">
				<span> <i class="icon-print"></i> {l s='TTN' mod='ecm_novaposhta'} </span>
			</a>
			<a href="https://my.novaposhta.ua/orders/printMarkings/orders/{$shipping_number}/type/{$format}/apiKey/{$api_key}" target="_blank"
							  class="button button-small btn btn-default" title="{l s='Print Mark' mod='ecm_novaposhta'}">
				<span> <i class="icon-print"></i> {l s='Mark' mod='ecm_novaposhta'} </span>
			</a>
			<a onclick="deletettn('{$id_order}')" class="button button-small btn btn-default" title="{l s='Delete TTN' mod='ecm_novaposhta'}">
				<span> <i class="icon-trash"></i> {l s='Delete TTN' mod='ecm_novaposhta'} </span>
			</a>
			<a onclick="checkpackage('{$shipping_number}','{$id_order}')" class="button button-small btn btn-default" title="{l s='Tracking parcel' mod='ecm_novaposhta'}">
				<span> <i class="icon-eye"></i> {l s='Tracking' mod='ecm_novaposhta'} </span>
			</a>
		</td>
	</tr>
	<tr>
		<td><br>
			<div class="alert alert-warning">
			<strong>{l s='After printing document don’t  editable!!!' mod='ecm_novaposhta'}</strong>
			</div>
		</td>
	</tr>
	{/if}
	{if $order_details.item_quantity > 1}
	<tr>
		<td><br>
			<a onclick="splitorder('{$id_order}')" class="button button-small btn btn-default pull-left" 
			title="{l s='Split order' mod='ecm_novaposhta'}">
			<span> {l s='Split into' mod='ecm_novaposhta'} {$order_details.item_quantity} {l s='separate orders' mod='ecm_novaposhta'} </span>
			</a>
		</td>
	</tr>
	{/if}
	<tr>
		<td><br>
			<div class="alert alert-warning">
			<strong>{l s='After changing discounts Do not forget to check the amount of insurance and COD' mod='ecm_novaposhta'} !!!</strong>
			</div>
		</td>
	</tr>
</table>

</div>
</fieldset>

{else}

{/if}
<script language="JavaScript" src="{$module_dir}js/np.js" type="text/javascript"></script>
<script>

$(document).ready(function() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&' + 'libraries=places&'+'callback=initialize';
    //document.body.appendChild(script);
	initialize();
});

function initialize() {     
	var myLatlng = new google.maps.LatLng($("#y").val(), $("#x").val());
	var myOptions = {
		zoom: 15,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: $("#ware").val() 
	});	
}
</script>
