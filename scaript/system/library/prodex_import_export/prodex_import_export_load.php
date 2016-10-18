<?php
	
	Class prodex_import_export_load{		

		protected $_class = null;

		public function __construct($_name = 'export', $_type = 'xlsx', $_path = ''){
        	include_once(DIR_SYSTEM.'library/prodex_import_export/prodex_import_export.php');
        	include_once(DIR_SYSTEM.'library/prodex_import_export/prodex_'.$_type.'.php');

			$name_class = 'prodex_'.$_type;

			$this->_class = new $name_class($_name,$_type,$_path);
		}
		
		public function setDelimiter($delimiter = ';'){
			$this->_class->setDelimiter($delimiter);
		}

		public function replaceDelimiter($in, $out){
			$this->_class->replaceDelimiter($in, $out);
		}

		public function setEnclosure($enclosure = '"'){
			$this->_class->setEnclosure($enclosure);
		}

		public function getData(){
			return $this->_class->getData();
		}

		public function get_Text(){
			return $this->_class->get_Text();
		}

		public function get_Opis(){
			return $this->_class->get_Opis();
		}

		public function get_Head(){
			return $this->_class->get_Head();
		}

		public function setHeaderOpis($value = ''){
			$this->_class->setHeaderOpis($value);
		}

		public function setHeaderValue($value = ''){
			$this->_class->setHeaderValue($value);
		}

		public function setHeaderTitle($text = ''){
			$this->_class->setHeaderTitle($text);
		}
		
		public function setText($_text){			
			$this->_class->setText($_text);
		}
		
		public function setArrayText($array_ = array()){
			$this->_class->setArrayText($array_);
		}
		
		public function createFile($delNULL = 0){
			$this->_class->InsertData();
			if($delNULL){
				$this->_class->delNULL();
			}
			$this->_class->createFile();
		}

		public function getFileUpload(){
			$this->_class->getFileUpload();
		}	
		
		public function LoadData(){
			$this->_class->LoadData();
		}	
	}
?>