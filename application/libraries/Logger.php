<?php 

define('LOG_DIR','/tmp/stock_log');

class Logger{

	public function __construct(){
		$this->file_handle = NULL;
		$this->date = date('Y-m-d');
	}

	public function open(){
		$date = date('Y-m-d');
		if(!($this->file_handle = fopen(LOG_DIR.'/'.$date.'.log','a+'))){
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function close(){
		if($this->file_handle!==NULL){
			fclose($this->file_handle);
		}
	}

	public function reopen(){
		$this->close();
		$this->open();
	}

	public function checkDate(){
		return date('Y-m-d')==$this->date;
	}

	public function error($info){

		if(!$this->checkDate()){
			$this->reopen();
		}
		fwrite($this->file_handle,'[ERROR]['.date('Y-m-d H:i:s').']:'.$info."\r\n");
	}

	public function info($info){
		if(!$this->checkDate()){
			$this->reopen();
		}
		fwrite($this->file_handle,'[INFO]['.date('Y-m-d H:i:s').']:'.$info."\r\n");
	}
}