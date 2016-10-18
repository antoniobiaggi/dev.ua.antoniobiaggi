<?php
	
	abstract Class prodex_import_export{		

		protected $folder = 'prodex_import_export';
		protected $type = null;
		protected $file_name = null;
		protected $file = null;
		protected $_class = null;
		protected $name = "prodex";
		protected $data = array();
		protected $path = DIR_UPLOAD;

		protected $upload_file = '';

		public $new_array = array();
		public $_array = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

		protected $_text = array();
		protected $_opis = array();
		protected $_head = array();
		private $file_text = array();

		public function getData(){
			return $this->data;
		}

		public function getFileText(){
			return $this->file_text;
		}

		public function get_Text(){
			return $this->_text;
		}

		public function get_Opis(){
			return $this->_opis;
		}

		public function get_Head(){
			return $this->_head;
		}

		public function setHeaderOpis($value = ''){
			$this->_opis[] = $value;
		}

		public function setHeaderTitle($text = ''){
			$this->_text[] = $text;
		}

		public function setHeaderValue($value = ''){
			$this->_head[] = $value;
		}

		public function setText($_text = array()){	
			$this->file_text[] = $_text;
		}
		
		public function setArrayText($array_ = array()){
			if($array_){
				$t_ = '';
				foreach($array_ as $row){
					$t_[] = $row;
				}
				$this->setText($t_);
			}else{
				$this->error[] = 'Передан пустой масив данных.';
			}
		}

		public function getFileName(){
			return $this->file_name;
		}
		
		public function __construct($_name = 'export', $_type, $_path = ''){
			if($_path){
				$this->path = $_path;
			}
			$this->type = $_type;
			$this->file_name = $_name;
			$this->file = $this->folder.'/'.$this->file_name.'.'.$this->type;

			$this->upload_file = $this->path.$this->file;
			
			if(!file_exists($this->path.$this->folder)){
				if (!mkdir($this->path.$this->folder, 0777, true)) {
				    die('Не удалось создать директории...');
				}
			}

			include_once(DIR_SYSTEM.'library/prodex_import_export/PHPExcel.php');

        	$this->_class = new PHPExcel();
			$this->_class->getProperties()->setCreator($this->name)
										 ->setLastModifiedBy($this->name);
						
			$this->_class->getActiveSheet(0)->setTitle($this->name);
		}

		public function getFileUpload(){
		
			if(file_exists($this->upload_file)){
				header('Location: ' . HTTP_CATALOG . 'system/storage/upload/'.$this->file);
			}else{
				$this->error[] = 'Нет файла для загрузки';
			}

		}

		public function delFile(){
			if(file_exists($this->upload_file)){
				unlink($this->upload_file);
			}
		}

		public function InsertData(){

			if($this->file_text){
				$i = 1;

				foreach($this->file_text as $row){
					
					$count_ = count($row);
					
					if(empty($this->new_array)){
						for($j=0;$j<$count_;$j++){
							if($j > count($this->_array)){
								$st = 0;
							}elseif($j > 2*count($this->_array)){
								$st = 1;
							}else{
								$st = 0;
							}
							if(!isset($this->_array[$j])){
								$this->new_array[] = $this->_array[$st].$this->_array[$j-count($this->_array)];
							}else{
								$this->new_array[] = $this->_array[$j];
							}
						}
					}
					
					for($j=0; $j<$count_; $j++){
						
						$a = $this->new_array[$j].$i;

						if(isset($row[$j])){
							$this->_class->setActiveSheetIndex(0)->setCellValue($a, $row[$j]);
						}
					}

					$i++;
				}
			}
		}
	}
?>