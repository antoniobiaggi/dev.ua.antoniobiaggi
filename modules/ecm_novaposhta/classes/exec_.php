<?php
//НоваПошта

class exec_  extends exec {

	
	public static
	function checkpackage () {
		setlocale(LC_TIME, "uk_UA.UTF8");
		$deklaracia = Tools::getValue('deklaracia');
		$id_order = Tools::getValue('order');
		$sql = "SELECT `delivery_date` FROM `"._DB_PREFIX_."orders`
			   WHERE `id_order` = '$id_order'
			   ";
		$delivery_date = date('d.m.Y', strtotime(Db::getInstance()->GetValue($sql)));
		$sql = "SELECT `city` FROM `"._DB_PREFIX_."ecm_newpost_orders`
			   WHERE `id_order` = '$id_order'
			   ";
		$city = Db::getInstance()->GetValue($sql);
		$est_date = np::getDocumentDeliveryDate($delivery_date,$city);
		//p($est_date);
		$tracking = np::tracking($deklaracia);
		//p($tracking);
		$html = "Невідома помилка";
		if (isset($tracking)) {
			$html = (string)$tracking->StateName."<br>";
			if (!empty($tracking->CitySenderUA)) $html .= " з міста - ".(string)$tracking->CitySenderUA;
			if (!empty($tracking->CityReceiverUA)) $html .= ", до міста - ".(string)$tracking->CityReceiverUA."<br>";
			if (!empty($tracking->AddressUA)) $html .= " Отримати в ".(string)$tracking->AddressUA."<br>";
			if (!empty($tracking->ReceiptDateTime)) $html .= " Дата отримання вантажу - ".strftime('%d %B %Y',strtotime((string)$tracking->ReceiptDateTime))."<br>";
			else if (isset($tracking)) if (!empty($est_date->DeliveryDate->date)) $html .= " Дата прибуття - ".strftime('%d %B %Y',strtotime((string)$est_date->DeliveryDate->date))."<br>";
			if (!empty($tracking->RecipientFullName)) $html .= " Отримувач - ".(string)$tracking->RecipientFullName."<br>";
			if (!empty($tracking->DocumentCost)) $html .= " Вартість замовлення - ".(string)$tracking->DocumentCost."<br>";
			if (!empty($tracking->Sum)) $html .= " Вартість доставки - ".(string)$tracking->Sum."<br>";
			if (!empty($tracking->ReasonDescription)) $html .= " Причина відмови - ".(string)$tracking->ReasonDescription."<br>";
		}

		return $html;
	}

	
	public static
	function GetOrderDetails2($id_order) {
		$sql = "
			SELECT	o.`total_products_wt` insurance_od, 
					o.`total_products_wt` cod_value_od,
					o.`total_discounts_tax_incl` discounts_od
			FROM `"._DB_PREFIX_."orders` o, 
				`"._DB_PREFIX_."order_carrier` oc, 
				`"._DB_PREFIX_."order_detail` od, 
				`"._DB_PREFIX_."ecm_newpost_orders` onp 
			WHERE o.`id_order` = '$id_order' AND oc.`id_order` = '$id_order' 
			AND onp.`id_order` = '$id_order' AND od.`id_order` = '$id_order'
			";
		$order = Db::getInstance()->getRow($sql);
		//p($result);
		if(!empty($order)){
			$sql = "
				SELECT 
					COUNT(*) item_quantity,
					group_concat(DISTINCT concat(od.product_name,', Артикул: ', p.reference,' - ',od.product_quantity,' шт')) msg_od,
					round(sum(p.width * p.height * p.depth / 4000 * od.product_quantity),4) vweight_od, 
					round(sum(p.weight * od.product_quantity),4) weight_od,
					round(max(p.width),4) width_od,
					round(max(p.depth),4) depth_od,
					round(sum(p.height * od.product_quantity),4) height_od
				FROM `"._DB_PREFIX_."order_detail` od
				LEFT JOIN `"._DB_PREFIX_."product` p ON p.`id_product` = od.`product_id`
				WHERE od.`id_order` = '$id_order'
				";
			$order = array_merge($order, Db::getInstance()->getRow($sql));
			$order['msg_od'] = trim($order['msg_od']," \t\n\r\0\x0B");
			$order['weight_od'] = max($order['weight_od'], Configuration::get('ecm_np_weght'));
			$order['vweight_od'] = max($order['vweight_od'], Configuration::get('ecm_np_vweght'));
			$order['insurance_od'] = Tools::ps_round((float)$order['insurance_od']);
			$order['cod_value_od'] = Tools::ps_round((float)$order['cod_value_od']);
			return $order;
		}
		else {
			return false;
		}
	}


}