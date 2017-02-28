<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_auth {
	
    private $CI;

    //需要忽略的
    private $ignore_list = array(
    	array('model'=>'Validate','method'=>'getValidateCode'),

    );
    
	public function __construct() {
		$this->CI = & get_instance();
		$this->CI->load->library('session');
        $this->CI->load->helper('url');
        $this->CI->load->helper('session_helper');
        //启动SESSION
        if (!session_id()) {
        	session_start();
        }
		//模块获取
        $this->url_model 	= $this->CI->uri->segment(1);
        //方法获取
        $this->url_method 	= $this->CI->uri->segment(2);
        //
        $this->url_param	= $this->CI->uri->segment(3);
        
	}
	
	/**
	 * @desc 权限过滤器
	 */
	public function filter(){
		#foreach ($this-> as $key => $value) {
			# code...
		#}
	}
}

/* End of file login_auth.php */
/* Location: ./application/hooks/login_auth.php */