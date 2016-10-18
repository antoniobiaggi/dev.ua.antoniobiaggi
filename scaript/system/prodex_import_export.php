	<?php
class ControllerModuleProdexImportExport{
	
	#private
		private $error = array();

		private $table_product = array(
			'наименование' => 'name',
			'арт.' => 'model',
			'первая цена' => 1,
			'вторая цена' => 1,
			'описание' => 1,
			'похожие товары' => 1,
			'комплекты' => 1,
			'скидка в %' => 1,
			'популярные' => 1,
			'тип товара ' => 1
		);

		private $table_q = array(
			'арт.' => 'model',
			'общий остаток' => 'stock',
			'размер' => 'razmer'
		);

		private $table_a = array(
			'арт.' => 'model',
			'материал верха' => 1,
			'материал подошвы' => 1,
			'материал подкладки' => 1,
			'вид каблука' => 1,
			'стиль' => 1,
			'сезон' => 1,
			'коллекция' => 1,
			'цвет' => 1,
			'цвет код' => 1,
			'параметры' => 1,
			'пол' => 1,
			'материал стельки' => 1,
			'высота каблука' => 1,
			'тип каблука' => 1,
			'длинная ручка' => 1,
			'цвет фурнитуры' => 1
		);

		private $_default_csv_type = 'csv';
		private $db = null;
	#

	private $model = null;

	public function __construct($db){
		$this->db = $db;
		require_once(DIR_SYSTEM . 'model_prodex_import_export.php');
		$this->model = new ModelModuleProdexImportExport($this->db);
	}
	
	private function translit($text){
		$ru = explode('-', "А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-?-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я-&-/-\"-'->-<-*-.-)-(-+"); 
		$en = explode('-', "A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch---Y-y---E-e-YU-yu-YA-ya----------------------");

	 	$res = str_replace($ru, $en, $text);
		$res = preg_replace("/[\s]+/ui", '-', $res);
		$res = str_replace(array(',','?','<','>','.','/',';',':','{','}','[',']','~','`','!','@','#','$','%','^','&','*','(',')','_','+','='), '', $res);
	 	$res = mb_strtolower($res);
	    return $res;  
	}

	//Выгрузка товаров
	public function cron_product(){

		echo '<pre>';
		
		$start = microtime(true);
		
		set_time_limit(10000000000);
		ini_set('memory_limit', '-1');

		$csv_delimiter = ';';

		require_once('system/library/prodex_import_export/prodex_import_export_load.php');
				
		$start_tovar = microtime(true);
		if(file_exists(DIR_DATA_CRON . 'tovar.csv')){
			
			$mas_product_id = array();

			$tovar_csv = new prodex_import_export_load( 'tovar.csv', 'csv', DIR_DATA_CRON);
			$tovar_csv->setDelimiter($csv_delimiter);
			$tovar_csv->LoadData();
			$data_tovar = $tovar_csv->getData();

			$products_ = array();
			
			$count_ = count($data_tovar);
			$keys = array();
			$step = 0;
			$one_key = '';

			for ($i=0; $i < $count_; $i++) {
				foreach($data_tovar[$i] as $key){
					if(!empty($key) && $key && array_key_exists($key,$this->table_product)){
						//Проишли Первую колонку
						$step = $i;
						$keys = $data_tovar[$i];
						break 2;
					}
				}
			}
			
			for ($i=$step+1; $i < $count_; $i++) {
				
				foreach ($keys as $key => $value) {
					//$value = iconv(mb_detect_encoding($value), "ASCII//TRANSLIT", $value);
					switch($value){
						case 'арт.':{
							$reference = $data_tovar[$i][$key];
						}break;
						default:{}
					}
				}
						
				if($reference){

					$product_name = '';
					$product_description = '';

					//Вибераєм товар.
					$product_info = $this->model->getProductByReference($reference);
					
					if($product_info){
						$id_product = $product_info['id_product'];
					}
						
					foreach ($keys as $key => $value) {
											
						//$value = iconv(mb_detect_encoding($value), "ASCII//TRANSLIT", $value);
						
						switch($value){
							case 'наименование':{
								$product_name = trim($data_tovar[$i][$key]);
							}break;
							case 'первая цена':{
								$product_price1 = trim($data_tovar[$i][$key]);
							}break;
							case 'вторая цена':{
								$product_price2 = trim($data_tovar[$i][$key]);
							}break;
							case 'описание':{
								$product_description = trim($data_tovar[$i][$key]);
							}break;
							case 'похожие товары':{
								$product_pohojie_tovari = array();
							}break;
							case 'комплекты':{
								$product_komplekti = array();
							}break;
							default:{}
						}
					}

					$product = array(
						'description' => $product_description,
						'reference' => $reference,
						'price' => $product_price1,
						'name' => $product_name
					);

					if(!empty($product_info)){
						$this->model->editProductByReference($product, $id_product);
					}else{
						$this->model->addProduct($product);
					}
				}
			}
			
			for ($i=$step+1; $i < $count_; $i++) {
				
				foreach ($keys as $key => $value) {
					//$value = iconv(mb_detect_encoding($value), "ASCII//TRANSLIT", $value);
					switch($value){
						case 'арт.':{
							$reference = $data_tovar[$i][$key];
						}break;
						default:{}
					}
				}

				$product_pohojie_tovari = array();
						
				if($reference){

					//Вибераєм товар.
					$product_info = $this->model->getProductByReference($reference);
					
					if($product_info){
						$id_product = $product_info['id_product'];
					}
						
					foreach ($keys as $key => $value) {
											
						//$value = iconv(mb_detect_encoding($value), "ASCII//TRANSLIT", $value);
						
						switch($value){
							case 'похожие товары':{
								$mas = explode(',',$data_tovar[$i][$key]);
								if($mas){
									foreach($mas as $m){
										$p = $this->model->getProductByReference($m);
										$product_pohojie_tovari[$p['id_product']] = $p['id_product'];
									}
								}
							}break;
							
							default:{}
						}
					}

					if($product_pohojie_tovari && $id_product){
						$this->model->editProductAccessory($product_pohojie_tovari, $id_product);
					}
				}
			}
		}
	
		

		$time = microtime(true) - $start;
		echo '<br/>------------------------------------------<br/>';
		printf('Script success %.4F', $time);
		echo '<br/>';
	}

	//Выгрузка остатков
	public function cron_quantity(){
		echo '<pre>';
		
		$start = microtime(true);
		
		set_time_limit(10000000000);
		ini_set('memory_limit', '-1');

		$csv_delimiter = ';';

		require_once('system/library/prodex_import_export/prodex_import_export_load.php');
				
		$start_tovar = microtime(true);
		if(file_exists(DIR_DATA_CRON . 'q.csv')){
			
			$mas_product_id = array();

			$tovar_csv = new prodex_import_export_load( 'q.csv', 'csv', DIR_DATA_CRON);
			$tovar_csv->setDelimiter($csv_delimiter);
			$tovar_csv->LoadData();
			$data_tovar = $tovar_csv->getData();

			$products_ = array();
			
			$count_ = count($data_tovar);
			$keys = array();
			$step = 0;
			$one_key = '';

			for ($i=0; $i < $count_; $i++) {
				foreach($data_tovar[$i] as $key){
					if(!empty($key) && $key && array_key_exists($key,$this->table_q)){
						//Проишли Первую колонку
						$step = $i;
						$keys = $data_tovar[$i];
						break 2;
					}
				}
			}
			
			for ($i=$step+1; $i < $count_; $i++) {
				
				foreach ($keys as $key => $value) {
					//$value = iconv(mb_detect_encoding($value), "ASCII//TRANSLIT", $value);
					switch($value){
						case 'арт.':{
							$reference = $data_tovar[$i][$key];
						}break;
						default:{}
					}
				}

				$product_stock = array();
				$stock = 0;

				if($reference){

					//Вибераєм товар.
					$product_info = $this->model->getProductByReference($reference);
					
					if($product_info){
						$id_product = $product_info['id_product'];
					}
					
					foreach ($keys as $key => $value) {
											
						//$value = iconv(mb_detect_encoding($value), "ASCII//TRANSLIT", $value);
						
						switch($value){
							case 'общий остаток':{
								$stock = $data_tovar[$i][$key];
							}break;
							case 'размер':{
								$mas = explode(',',$data_tovar[$i][$key]);
								if($mas){
									foreach($mas as $m){
										$t = explode(':',$m);
										if(isset($t[0]) && isset($t[1])){
											$product_stock[$t[0]] = $t[1];
										}
									}
								}
							}break;
							
							default:{}
						}
					}
					
					if($id_product){
						$this->model->editProductStock($stock, $product_stock, $id_product);
					}
				}
			}
		}
	
		$time = microtime(true) - $start;
		echo '<br/>------------------------------------------<br/>';
		printf('Script success %.4F', $time);
		echo '<br/>';
	}

	//Выгрузка Атрибутов
	public function cron_attr(){
		echo '<pre>';
		
		$start = microtime(true);
		
		set_time_limit(10000000000);
		ini_set('memory_limit', '-1');

		$csv_delimiter = ';';

		require_once('system/library/prodex_import_export/prodex_import_export_load.php');
				
		$start_tovar = microtime(true);
		if(file_exists(DIR_DATA_CRON . 'attr.csv')){
			
			$mas_product_id = array();

			$tovar_csv = new prodex_import_export_load( 'attr.csv', 'csv', DIR_DATA_CRON);
			$tovar_csv->setDelimiter($csv_delimiter);
			$tovar_csv->LoadData();
			$data_tovar = $tovar_csv->getData();
			
			$products_ = array();
			
			$count_ = count($data_tovar);
			$keys = array();
			$step = 0;
			$one_key = '';

			for ($i=0; $i < $count_; $i++) {
				foreach($data_tovar[$i] as $key){
					if(!empty($key) && $key && array_key_exists($key,$this->table_a)){
						//Проишли Первую колонку
						$step = $i;
						$keys = $data_tovar[$i];
						break 2;
					}
				}
			}
			
			for ($i=$step+1; $i < $count_; $i++) {
				
				foreach ($keys as $key => $value) {
					//$value = iconv(mb_detect_encoding($value), "ASCII//TRANSLIT", $value);
					switch($value){
						case 'арт.':{
							$reference = $data_tovar[$i][$key];
						}break;
						default:{}
					}
				}

				$features = array();

				if($reference){

					//Вибераєм товар.
					$product_info = $this->model->getProductByReference($reference);
					
					if($product_info){
						$id_product = $product_info['id_product'];
					}
					
					foreach ($keys as $key => $value) {
											
						//$value = iconv(mb_detect_encoding($value), "ASCII//TRANSLIT", $value);
						
						switch($value){
							case 'материал верха':{
								$string = 'материал верха: '.$data_tovar[$i][$key];
								$featureValue = $this->model->getFeatureValueByValue($string);

								if($featureValue){
									$features[8] = $featureValue['id_feature_value'];
								}
							}break;
							case 'материал подошвы':{
								$string = 'материал подошвы: '.$data_tovar[$i][$key];
								$featureValue = $this->model->getFeatureValueByValue($string);

								if($featureValue){
									$features[6] = $featureValue['id_feature_value'];
								}
							}break;
							case 'материал подкладки':{
								$string = 'материал подкладки: '.$data_tovar[$i][$key];
								$featureValue = $this->model->getFeatureValueByValue($string);

								if($featureValue){
									$features[9] = $featureValue['id_feature_value'];
								}
							}break;
							case 'вид каблука':{
								$string = 'каблук: '.$data_tovar[$i][$key];
								$featureValue = $this->model->getFeatureValueByValue($string);

								if($featureValue){
									$features[5] = $featureValue['id_feature_value'];
								}
							}break;
							case 'стиль':{
								$string = 'стиль: '.$data_tovar[$i][$key];
								$featureValue = $this->model->getFeatureValueByValue($string);

								if($featureValue){
									$features[11] = $featureValue['id_feature_value'];
								}
							}break;
							/*case 'сезон':{
								$string = 'сезон: '.$data_tovar[$i][$key];
								$featureValue = $this->model->getFeatureValueByValue($string);

								if($featureValue){
									$features[11] = $featureValue['id_feature_value'];
								}
							}break;*/
							
							default:{}
						}
					}

					if($id_product){
						$this->model->editFeatursProducts($id_product,$features);
					}
				}
			}
		}
	
		$time = microtime(true) - $start;
		echo '<br/>------------------------------------------<br/>';
		printf('Script success %.4F', $time);
		echo '<br/>';
	}
}