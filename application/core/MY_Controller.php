<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	protected $error;

    public function __construct(){
        parent::__construct();
	}

	public function errorLog($code,$message='') {
	    error_log("code[{$code}] message[{$message}]");
        $this->jsonOutput(['err_code'=>$code,'err_msg'=>$message]);
    }

    public function jsonOutput($data){
        header('content-type:application/json');
        echo json_encode($data);
        exit();
    }

}