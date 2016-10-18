{nocache}
<style>
.bootstrap input[type="email"] {
    background-color: #f5f8f9;
    background-image: none;
    border: 1px solid #c7d6db;
    border-radius: 3px;
    color: #555;
    display: block;
    font-size: 12px;
    height: 31px;
    line-height: 1.42857;
    padding: 6px 8px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    width: 100%;
}</style>
{assign var=checkvalue value=1}
<input id="module_dir" name="module_dir" type="hidden" value ="{$modulesdir}"/>

<fieldset class="space">
	<legend><img src="../img/admin/cog.gif" alt="" class="middle" />{l s='Settings' mod='ecm_novaposhta'}</legend>
	<input id="customer" name="customer" type="hidden" value ="-1"/>
	<div class="col-xs-12">
		<table>
			<tr valign="top">
				<td width="48%">
					<legend>{l s='Sender information' mod='ecm_novaposhta'}</legend>
					<label>{l s='Sender' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input type="text" name="out_company" placeholder="{l s='Organizations or name of the sender' mod='ecm_novaposhta'}" required
						value="{$out_company}"/>
						<p class="clear">{l s='Organizations or name of the sender' mod='ecm_novaposhta'}</p>
					</div>
					
					<label>{l s='Ownership' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						{html_options name=Ownership options=$OwnershipFormsList selected=$Ownership}
						<p class="clear">{l s='Ownership the sender' mod='ecm_novaposhta'}</p>
					</div>
					
					<label>{l s='Representative sender' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input type="text" name="out_name" placeholder="{l s='Name of the responsible person' mod='ecm_novaposhta'}" required
						value="{$out_name}"/>
						<p class="clear">{l s='Name of the responsible person' mod='ecm_novaposhta'}</p>
					</div>
					
					<label>{l s='Sender phone' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input type="text" name="out_phone" placeholder="{l s='Sender phone' mod='ecm_novaposhta'}" required
						value="{$out_phone}"/>
						<p class="clear">{l s='Sender phone' mod='ecm_novaposhta'}</p>
					</div>
					
					<label>{l s='Sender email' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input type="text" name="out_email" placeholder="{l s='Sender email' mod='ecm_novaposhta'}" required
						value="{$out_email}"/>
						<p class="clear">{l s='Sender email' mod='ecm_novaposhta'}</p>
					</div>
					
					<label>{l s='Description' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input type="text" name="description" placeholder="{l s='Description' mod='ecm_novaposhta'}" required
						value="{$description}"/>
						<p class="clear">{l s='Description of cargo' mod='ecm_novaposhta'}</p>
					</div>
					
					<label>{l s='Pack' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input type="text" name="pack" placeholder="{l s='Pack' mod='ecm_novaposhta'}"
						value="{$pack}"/>
						<p class="clear">{l s='Packing of cargo' mod='ecm_novaposhta'}</p>
					</div>
					
					<label>{l s='Amount of insurance' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input type="text" name="insurance" placeholder="{l s='Amount of insurance' mod='ecm_novaposhta'}" required
						value="{$insurance}"/>
						<p class="clear">{l s='Amount of insurance, 0 for full price' mod='ecm_novaposhta'}</p>
					</div>
					
					<label>{l s='API key' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input type="text" name="API_KEY" placeholder="{l s='API key' mod='ecm_novaposhta'}" required
						value="{$API_KEY}"/>
						<p class="clear">{l s='Enter your API key (in the particular office at site "Nova poshta")' mod='ecm_novaposhta'}</p>
					</div>
					
					<label>{l s='Send mail for delivery NP' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
					<input type="checkbox" name="SendNPmail" value="1" {$SendNPmail} />
						<p class="clear">{l s='If checked, send additional mail notification' mod='ecm_novaposhta'}</p>
					</div>
				
					<label>{l s='Send mail for administrator' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input type="email" name="SendNPadminmail" value="{$SendNPadminmail}" 
						placeholder="{l s='administrator e-mail' mod='ecm_novaposhta'}"/>
						<p class="clear">{l s='If filled, send mail notification for administrator' mod='ecm_novaposhta'}</p>
					</div>
				
					<label>{l s='Sender pay' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
					<input type="checkbox" name="senderpay" value="1" {$senderpay} />
						<p class="clear">{l s='If checked, sender pay for delivery' mod='ecm_novaposhta'}</p>
					</div>
				
					<label>{l s='Payment Method' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
					{html_options name=payment_method options=$payment_forms selected=$payment_form}
						<p class="clear">{l s='Select payment method for delivery' mod='ecm_novaposhta'}</p>
					</div>
				
				
					<label>{l s='Printing format' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
					{html_options name=format options=$formats selected=$format}					
						<p class="clear">{l s='Select format for printed form' mod='ecm_novaposhta'}</p>
					</div>
				
					<label>{l s='Info for order number' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
					{html_options name=InfoRegClientBarcode options=$InfoRegClientBarcodes selected=$InfoRegClientBarcode}					
						<p class="clear">{l s='Select info for order number' mod='ecm_novaposhta'}</p>
					</div>
				
					<label>{l s='Add detail description' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
					<input type="checkbox" name="add_msg" value="1" {$add_msg} />
						<p class="clear">{l s='If checked, detail description add to order' mod='ecm_novaposhta'}</p>
					</div>
				
					<label>{l s='Show detail cost of delivery' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
					<input type="checkbox" name="show" value="1" {$show} />
						<p class="clear">{l s='If checked, detail cost information is show' mod='ecm_novaposhta'}</p>
					</div>
				
					<label>{l s='Time B' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input name="time" value="{$time}"/>
						<p class="clear">{l s='Set time for automatic shift date on next day from this time to 00:00' mod='ecm_novaposhta'}</p>
					</div>
				
					<label>{l s='Default weght' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input name="weght" value="{$weght}"/>
						<p class="clear">{l s='Set minimal weght' mod='ecm_novaposhta'}</p>
					</div>
				
					<label>{l s='Default volumetric weght' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input name="vweght" value="{$vweght}"/>
						<p class="clear">{l s='Set minimal volumetric weght' mod='ecm_novaposhta'}</p>
					</div>
				
				</td>
				<td width="4%"></td>
				<td width="48%">
					<legend>{l s='Areas, Citys and postoffices' mod='ecm_novaposhta'}</legend>
					<label>{l s='Get a list of postoffices, cities and areas:' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input class="button" type="submit" name="submitWarehouse" value="{l s='Get' mod='ecm_novaposhta'}, {l s='current: ' mod='ecm_novaposhta'} {$countwh}" />
					</div>
					<hr>
					<div>
						<label for="id_area_delivery">{l s='Area' mod='ecm_novaposhta'}</label>
						<div class="margin-form">
								<select style='width:50%;' name="id_area_delivery" id="id_area_delivery" class="address_select form-control"
								onchange="refreshcity()">
								{html_options options=$Areas selected=$Area}
								</select>
						</div>
					</div>
					<div>
						<label for="id_city_delivery">{l s='City' mod='ecm_novaposhta'}</label>
						<div class="margin-form">
								<select style='width:50%;' name="id_city_delivery" id="id_city_delivery" class="address_select form-control"
								onchange="refreshware()">
								{html_options options=$Citys selected=$City}
								</select>
						</div>
					</div>
					<div>
						<label for="id_ware_delivery">{l s='Postofice' mod='ecm_novaposhta'}</label>
						<div class="margin-form">
								<select  style='width:50%;' name="id_ware_delivery" id="id_ware_delivery" class="address_select form-control"
								onchange="saveform()">
								{html_options options=$Wares selected=$Ware}
								</select>
						</div>
					</div>
					<hr>
					<legend>{l s='Redelivery cost' mod='ecm_novaposhta'}</legend>
					<label>{l s='Add redelivery cost to shiping cost' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
					<input type="checkbox" name="redelivery" value="1" {$redelivery} />
						<p class="clear">{l s='If checked, redelivery cost will be added to cost of delivery' mod='ecm_novaposhta'}</p>
					</div>
					
					<label>{l s='Sender pay for redelivery' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
					<input type="checkbox" name="senderpay_redelivery" value="1" {$senderpay_redelivery} />
						<p class="clear">{l s='If checked, sender pay for redelivery' mod='ecm_novaposhta'}</p>
					</div>
				
					<label>{l s='Control for pay' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
					<input type="checkbox" name="AfterpaymentOnGoods" value="1" {$AfterpaymentOnGoods} />
						<p class="clear">{l s='If checked, use Afterpayment on goods' mod='ecm_novaposhta'}</p>
					</div>
				
					<label>{l s='Percentage control for pay' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input type="text" name="percentage"  value="{$percentage}"/>
						<p class="clear">{l s='A percentage of the value of the order' mod='ecm_novaposhta'}</p>
					</div>

					<div style="display:none">
						<label>{l s='Shipping rate' mod='ecm_novaposhta'}</label>
						<div class="margin-form">
							<input type="text" name="comiso" value="{$comiso}"/>
							<p class="clear">{l s='Redelivery shipping rate' mod='ecm_novaposhta'}</p>
						</div>
					</div>

					<label>{l s='Fixed cost for delivery' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
					<input type="text" name="fixcost" value="{$fixcost}"/> <input type="checkbox" name="chk_fixcost" value="1" {$chk_fixcost} />
						<p class="clear">{l s='If checked, use fixed cost for delivery' mod='ecm_novaposhta'}</p>
					</div>

<div style="display:none">				
					<label>{l s='Add fix delivery to order price' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
					{html_checkboxes name="addtoorder" value=$checkvalue selected=$addtoorder}
						<p class="clear">{l s='If checked, when you make the EH to the amount of the order is added fix shipping cost' mod='ecm_novaposhta'}</p>
					</div>
</div>				

					<label>{l s='Message length' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input type="text" name="TrimMsg" value="{$TrimMsg}"/>
						<p class="clear">{l s='Default message length 100 charachters' mod='ecm_novaposhta'}.
						{l s='To increase this value, please contact Support NP' mod='ecm_novaposhta'}</p>
					</div>

					<label>{l s='Free Limit' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input type="text" name="FreeLimit" value="{$FreeLimit}"/>
						<p class="clear">{l s='Limit total paid for free shipping' mod='ecm_novaposhta'}</p>
					</div>

					<label>{l s='Cargo Types' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
					{html_options name=CargoType options=$CargoTypes selected=$CargoType}					
						<p class="clear">{l s='Select default cargo type' mod='ecm_novaposhta'}</p>
					</div>
				
					<label>{l s='Service Types' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
					{html_options name=ServiceType options=$ServiceTypes selected=$ServiceType}					
						<p class="clear">{l s='Select default service types' mod='ecm_novaposhta'}</p>
					</div>
				
					
					
				</td>
			</tr>
			<tr>
				<td colspan=3>
					<hr>
					<center>
					<label>{l s='Advanced checkout compatibility' mod='ecm_novaposhta'}</label>
					<div class="margin-form">
						<input type="checkbox" name="ac" value="1" {$ac} />
						<p class="clear">Если Вы используете модуль 
						<a href="http://addons.prestashop.com/ru/checkout/11167--.html" target="_blank">
						<b>"Модуль Покупка на одной странице + самовывоз"</b>
						</a>  ,не забудьте  включить режим совместимости</p>
					</div>
					<label>{l s='Fill address fields'  mod='ecm_novaposhta'}</label>
					<div class="margin-form">
					<input type="checkbox" name="fill" value="1" {$fill} />
						<p class="clear">{l s='If checked, the address fields are filled in choosing the delivery address' mod='ecm_novaposhta'}</p>
					</div>
				
					</center>
				</td>
			</tr>
			<tr>
				<td colspan=3>
					<center><hr><input class="button" type="submit" name="submitUPDATE" value="{l s='Save' mod='ecm_novaposhta'}" /></center>
				</td>
			</tr>
			<tr>
				<td colspan=3>
					<center><hr>
					<input class="button" type="submit" name="submitGET" value="{l s='Get Sender Counterparty' mod='ecm_novaposhta'}" />
					<hr>
{l s='If Sender Counterparty not received several times' mod='ecm_novaposhta'}<br>
					<input class="button" type="submit" name="submitCREATE" value="{l s='Create Sender Counterparty' mod='ecm_novaposhta'}" /></center>
				</td>
			</tr>
			<tr>
				<td colspan=3>
					<hr>
				</td>
			</tr>
			
		</table>
		
		
	</div>
</fieldset>
<script language="JavaScript" src="{$module_dir}js/np.js" type="text/javascript"></script>
{literal}
<script>
//getlastarea($("#customer").val());
</script>
{/literal}