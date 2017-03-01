<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginAuth {

    //需要忽略的
    private $ignore_list = array(
    	array('directory'=>'admin','model'=>'admin','method'=>'getValidateCode')
    );
    
	public function __construct() {

        $this->CI = &get_instance();
	}
	
	/**
	 * @desc 权限过滤器
	 */
	public function filter(){
		foreach ($this->ignore_list as $key=>$value){

        }
	}
}

/* End of file login_auth.php */
/* Location: ./application/hooks/login_auth.php */