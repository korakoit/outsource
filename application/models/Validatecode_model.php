<?php if ( ! defined('BASEPATH'))  exit('No direct script access allowed');



class Validatecode_model extends CI_Model {

	private $code_length = 6;

	public function __construct(){
		parent::__construct();
		$this->config->load('custom');
		$this->load->model('User_model','user_model');
		$this->error_code = $this->config->item('error_code');
	}

	private function createCode(){
		$code = '';
		for($i=0;$i<$this->code_length;$i++){
			$code .= mt_rand(0,9);
		}
		return $code;
	}

	public function getValidateCode($account,$account_type,$service_type){
		
		$this->load->helper('sms_helper');
		$this->load->helper('email_helper');

		$code = $this->createCode();
		if($this->redis){
			switch ($service_type) {
				case 'REGISTER':
					//验证用户是否已经注册
					if($this->user_model->checkAccountRegistered($account,$account_type))
						return array('error_code'=>'1006','error_msg'=>$this->error_code['1006']);
					
					if($account_type=='PHONE'){
						$validate_code_cache = $this->redis->get('VALIDATECODE:REGISTER:PHONE'.$account);
						if($validate_code_cache!=FALSE){
							$tmp = explode(';',$validate_code_cache);
							//如果请求时间少于60秒，则拒绝请求
							if(time()-$tmp[1]<60)
								return array('error_code'=>'1010','error_msg'=>$this->error_code['1010']);
							//重用上次的验证码
							$code = $tmp[0];
						}
						send_message($account,'【懒猫旅行】您的验证码是'.$code);
						$this->redis->setEx('VALIDATECODE:REGISTER:PHONE'.$account,300,$code.';'.time());
					}else if($account_type=='EMAIL'){
						$validate_code_cache = $this->redis->get('VALIDATECODE:REGISTER:EMAIL'.$account);
						if($validate_code_cache!=FALSE){
							$tmp = explode(';',$validate_code_cache);
							//如果请求时间少于60秒，则拒绝请求
							if(time()-$tmp[1]<60)
								return array('error_code'=>'1010','error_msg'=>$this->error_code['1010']);
							$code = $tmp[0];
						}

						$email = array(
							'from'=>'service@lanmaotrip.net',
							'sender'=>'懒猫旅行',
							'to'=>$account,
							'subject'=>'验证码',
							'message'=>'【懒猫旅行】您的验证码是'.$code
						);
						send_email($email);
						$this->redis->setEx('VALIDATECODE:REGISTER:EMAIL'.$account,300,$code.';'.time());
					}
					break;
				case 'FINDBACKPASSWORD':
					if(!$this->user_model->checkAccountRegistered($account,$account_type))
						return array('error_code'=>'1009','error_msg'=>$this->error_code['1009']);
					
					if($account_type=='PHONE'){
						$validate_code_cache = $this->redis->get('VALIDATECODE:FINDBACKPASSWORD:PHONE'.$account);
						if($validate_code_cache!=FALSE){
							$tmp = explode(';',$validate_code_cache);
							//如果请求时间少于60秒，则拒绝请求
							if(time()-$tmp[1]<60)
								return array('error_code'=>'1010','error_msg'=>$this->error_code['1010']);
							$code = $tmp[0];
						}
						send_message($account,'【懒猫旅行】您的验证码是'.$code);						
						$this->redis->setEx('VALIDATECODE:FINDBACKPASSWORD:PHONE'.$account,300,$code.';'.time());
					}else if($account_type=='EMAIL'){
						$validate_code_cache = $this->redis->get('VALIDATECODE:FINDBACKPASSWORD:EMAIL'.$account);
						if($validate_code_cache!=FALSE){
							$tmp = explode(';',$validate_code_cache);
							//如果请求时间少于60秒，则拒绝请求
							if(time()-$tmp[1]<60)
								return array('error_code'=>'1010','error_msg'=>$this->error_code['1010']);
							$code = $tmp[0];
						}

						$email = array(
							'from'=>'service@lanmaotrip.net',
							'sender'=>'懒猫旅行',
							'to'=>$account,
							'subject'=>'验证码',
							'message'=>'【懒猫旅行】您的验证码是'.$code
						);
						send_email($email);
						$this->redis->setEx('VALIDATECODE:FINDBACKPASSWORD:EMAIL'.$account,300,$code.';'.time());
					}
					break;
				case 'BINDPHONE':
					//用户已经存在也可以绑定
					//if($this->user_model->checkAccountRegistered($account,$account_type))
					//	return array('error_code'=>'1006','error_msg'=>$this->error_code['1006']);
					
					$validate_code_cache = $this->redis->get('VALIDATECODE:BINDPHONE:PHONE'.$account);
					if($validate_code_cache!=FALSE){
						$tmp = explode(';',$validate_code_cache);
						//如果请求时间少于60秒，则拒绝请求
						if(time()-$tmp[1]<60)
							return array('error_code'=>'1010','error_msg'=>$this->error_code['1010']);
						$code = $tmp[0];
					}
					send_message($account,'【懒猫旅行】您的验证码是'.$code);
					$this->redis->setEx('VALIDATECODE:BINDPHONE:PHONE'.$account,300,$code.';'.time());
					break;
				case 'UNBINDPHONE':
					$validate_code_cache = $this->redis->get('VALIDATECODE:UNBINDPHONE:PHONE'.$account);
					if($validate_code_cache!=FALSE){
						$tmp = explode(';',$validate_code_cache);
						//如果请求时间少于60秒，则拒绝请求
						if(time()-$tmp[1]<60)
							return array('error_code'=>'1010','error_msg'=>$this->error_code['1010']);
						$code = $tmp[0];
					}
					send_message($account,'【懒猫旅行】您的验证码是'.$code);
					$this->redis->setEx('VALIDATECODE:UNBINDPHONE:PHONE'.$account,300,$code.';'.time());
					break;
				case 'TAOBAOPHONE':
					$validate_code_cache = $this->redis->get('VALIDATECODE:TAOBAOPHONE:PHONE'.$account);
					if($validate_code_cache!=FALSe){
						$tmp = explode(';',$validate_code_cache);
						//如果请求时间少于60秒，则拒绝请求
						if(time()-$tmp[1]<60)
							return array('error_code'=>'1010','error_msg'=>$this->error_code['1010']);
						$code = $tmp[0];
					}
					send_message($account,'【懒猫旅行】您的验证码是'.$code);
					$this->redis->setEx('VALIDATECODE:TAOBAOPHONE:PHONE'.$account,300,$code.';'.time());
					break;
			}
			return TRUE;
		}else{
			return array('error_code'=>'2001','error_msg'=>$this->error_code['2001']);
		}
	}

}