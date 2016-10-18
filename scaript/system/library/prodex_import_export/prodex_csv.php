<?php
	
	Class prodex_csv extends prodex_import_export{		
		
		private $ads = "\r\n";
		private $delimiter = ';';
		private $enclosure = '"';

		public function __call($key, $array){}
		
		public function setDelimiter($delimiter = ';'){
			$this->delimiter = $delimiter;
		}

		public function setEnclosure($enclosure = '"'){
			$this->enclosure = $enclosure;
		}

		public function replaceDelimiter($in,$out){
			
			$data = file_get_contents($this->path.$this->getFileName());
			$data = str_replace('"'.$in.'"', '"'.$out.'"', $data);
			file_put_contents($this->path.$this->getFileName(),$data);
		}

        public function __construct($_name = '', $_type = '', $_path = ''){
        	parent::__construct($_name, $_type, $_path);
		}
		
		public function createFile(){
			$objWriter = PHPExcel_IOFactory::createWriter($this->_class, 'CSV')
				->setDelimiter($this->delimiter)
				->setEnclosure($this->enclosure)
				->setLineEnding($this->ads)
				->setSheetIndex(0)
				->save(str_replace('.php', '.csv', $this->upload_file));
		}

		public function LoadData(){

			$objReader = PHPExcel_IOFactory::createReader('CSV')->setDelimiter($this->delimiter)->setEnclosure('"')->setSheetIndex(0);
			$objPHPExcel = $objReader->load($this->path.$this->getFileName());

			$objPHPExcel->setActiveSheetIndex(0);
			$aSheet = $objPHPExcel->getActiveSheet();
			
			foreach($aSheet->getRowIterator() as $row)
			{
				$cellIterator = $row->getCellIterator();
				$cellIterator->setIterateOnlyExistingCells(false);
				$arr = array();
				$i = 0;
				foreach($cellIterator as $cell){ 	
					$arr[$i] = $cell->getCalculatedValue();
					$i++;
				}
				
				$this->data[] = $arr;
			}
		}
	}
?>