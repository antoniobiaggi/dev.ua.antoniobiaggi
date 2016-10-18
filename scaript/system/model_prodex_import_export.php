<?php
class ModelModuleProdexImportExport {

	private $db = null;

	public function __construct($db){
		$this->db = $db;
	}

	public function getLanguages(){
		$sql = "SELECT * FROM "._DB_PREFIX_."lang";
		$result = $this->db->query($sql);
		return $result->rows;
	}

	public function getProductByReference($reference = 0){
		$sql = "SELECT * FROM "._DB_PREFIX_."product WHERE reference = '" . $this->db->escape($reference) . "'";
		$result = $this->db->query($sql);
		if($result->num_rows){
			return $result->row;
		}else{
			return false;
		}
	}

	public function editProductByReference($product = array(), $id_product = 0){
		
		if(isset($product['description']) && !empty($product['description'])){
			$sql = "UPDATE "._DB_PREFIX_."product_lang SET
				description = '" . $this->db->escape($product['description']) . "'
				WHERE id_product = '" . (int)$id_product . "' AND id_lang = '1'
			";
			$this->db->query($sql);
		}

		if(isset($product['name']) && !empty($product['name'])){
			$sql = "UPDATE "._DB_PREFIX_."product_lang SET
				name = '" . $this->db->escape($product['name']) . "'
				WHERE id_product = '" . (int)$id_product . "' AND id_lang = '1'
			";
			$this->db->query($sql);
		}
	}

	public function addProduct($product = array()){

		$sql = "
			INSERT INTO "._DB_PREFIX_."product SET
			id_supplier = 0,
			id_manufacturer = 1,
			id_category_default = 2,
			active = 0,
			redirect_type = 404,
			date_add = NOW(),
			date_upd = NOW(),
			price = '" . (float)$product['price'] . "',
			reference = '" . $this->db->escape($product['reference']) . "'
		";

		$this->db->query($sql);

		$id_product = $this->db->getLastId();

		$sql = "
			INSERT INTO "._DB_PREFIX_."product_shop SET
			id_product = '" . (int)$id_product . "',
			id_shop = 1,
			id_category_default = 2,
			price = '" . (float)$product['price'] . "',
			active = 0,
			date_add = NOW(),
			date_upd = NOW(),
			indexed = 1,
			redirect_type = 404
		";

		$this->db->query($sql);
		
		if(isset($product['name']) && !empty($product['name'])){
			foreach($this->getLanguages() as $lang){
				$sql = "INSERT INTO "._DB_PREFIX_."product_lang SET
					name = '" . $this->db->escape($product['name']) . "',
					id_product = '" . (int)$id_product . "',
					id_lang = '".(int)$lang['id_lang']."',
					id_shop = '1'
				";
				$this->db->query($sql);
			}
			if(isset($product['description']) && !empty($product['description'])){
				if(isset($product['description']) && !empty($product['description'])){
					$sql = "UPDATE "._DB_PREFIX_."product_lang SET
						description = '" . $this->db->escape($product['description']) . "'
						WHERE id_product = '" . (int)$id_product . "' 
						AND id_lang = '1'
					";
					$this->db->query($sql);
				}
			}
		}
	}

	public function editProductAccessory($product = array(), $id_product = 0){
		$sql = "DELETE FROM `"._DB_PREFIX_."accessory` WHERE id_product_1 = '" . (int)$id_product . "'";
		$this->db->query($sql);
		foreach ($product as $key => $value) {
			$sql = "INSERT INTO `"._DB_PREFIX_."accessory` SET id_product_1 = '" . (int)$id_product . "', id_product_2 = '" . (int)$value . "'";
			$this->db->query($sql);
		}
	}

	public function editProductStock($stock = 0, $product_stock = array(), $id_product = 0){
		$sql = "DELETE FROM `"._DB_PREFIX_."stock_available` WHERE id_product = '" . (int)$id_product . "'";
		$this->db->query($sql);
		if(isset($product_stock) && !empty($product_stock)){
			foreach ($product_stock as $key => $value) {
				$sql = "INSERT INTO `"._DB_PREFIX_."stock_available` SET 
					id_product = '" . (int)$id_product . "', 
					id_product_attribute = '" . (int)$key . "',
					id_shop = 1,
					id_shop_group = 0,
					quantity = '" . (int)$value . "',
					depends_on_stock = 0,
					out_of_stock = 2
				";
				$this->db->query($sql);
			}	
		}else{
			$sql = "INSERT INTO `"._DB_PREFIX_."stock_available` SET 
				id_product = '" . (int)$id_product . "', 
				id_product_attribute = '0',
				id_shop = 1,
				id_shop_group = 0,
				quantity = '" . (int)$stock . "',
				depends_on_stock = 0,
				out_of_stock = 2
			";
			$this->db->query($sql);
		}
	}

	public function getFeatureValueByValue($value = ''){
		if($value){
			$sql = "SELECT * FROM "._DB_PREFIX_."feature_value_lang WHERE LOWER(`value`) = '" . mb_strtolower($value) . "'";
			$result = $this->db->query($sql);
			if($result->num_rows){
				return $result->row;
			}else{
				return false;
			}
		}
	}

	public function editFeatursProducts($id_product = 0, $features = array()){
		$sql = "DELETE FROM `"._DB_PREFIX_."feature_product` WHERE id_product = '" . (int)$id_product . "'";
		$this->db->query($sql);
		if($features){
			foreach($features as $key => $f){
				$sql = "INSERT INTO `"._DB_PREFIX_."feature_product` SET 
					id_feature = '" . (int)$key . "',
					id_product = '" . (int)$id_product . "', 
					id_feature_value = '" . $f . "'
				";
				$this->db->query($sql);
			}
		}
	}
}