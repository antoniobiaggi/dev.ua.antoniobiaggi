<?php
	
	Class prodex_xlsx extends prodex_import_export{		
		
		public function __call($key, $array){}

        public function __construct($_name = '', $_type){
        	parent::__construct($_name, $_type);
		}
		
		public function createFile(){
			
			$objWriter = PHPExcel_IOFactory::createWriter($this->_class, 'Excel2007');
			$objWriter->save($this->upload_file);
		}
	}
?>