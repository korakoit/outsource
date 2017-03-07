<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 校验非空
 */
if(!function_exists('required')){
	function required($value){
		return $value!=null&&$value!='';
	}
}

/**
 * 手机正则表达式
 */
if(!function_exists('phone')){
	function phone($value){
		return preg_match('/^1(3[0-9]|5[012356789]|8[03256789]|7[0678])\d{8}$/',$value);
	}
}

/**
 * 邮箱正则表达式
 */
if(!function_exists('email')){
	function email($value){
		return preg_match('/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/',$value);
	}
}

/**
 *  校验是否是整数
 */
if(!function_exists('integer')){
	function integer($value){
		return is_int($value);
	}
}

/**
 *  校验是否是浮点型
 */
if(!function_exists('float')){
	function float($value){
		return is_float($value);
	}
}

/**
 *  校验是否是数字
 */
if(!function_exists('number')){
	function number($value){
		return is_numeric($value);
	}
}

/**
 * 校验中文
 */
if(!function_exists('chinese')){
	function chinese($value){
		return preg_match("/^[x{4e00}-x{9fa5}]+$/u",$value); 
	}
}


if(!function_exists('form_validate')){
	function form_validate($filed_list){
		$ci = &get_instance();
		if(isset($ci->json_params)){
			$input = $ci->json_params;	
		}else{
			$input = $_REQUEST;
		}
	
		foreach($filed_list as $key=>$value){
			$field = isset($input[$key]) ? $input[$key] : '';
			foreach ($value as $k =>$v) {
				if(isset($v['params'])){
					if(!$k($field,$v['params'])){
						header('Access-Control-Allow-Origin: *');
					    header('Access-Control-Max-Age: 3628800');
					    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE,OPTIONS');			
						header("content-type:application/json");
						echo json_encode(array('error_code'=>'1000','error_msg'=>$v['error_msg']));
						exit(0);
					}
				}else{
					if(!$k($field)){
						header('Access-Control-Allow-Origin: *');
					    header('Access-Control-Max-Age: 3628800');
					    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE,OPTIONS');			
						header("content-type:application/json");
						echo json_encode(array('error_code'=>'1000','error_msg'=>$v['error_msg']));
						exit(0);
					}
				}
			}
		}
	}
}

if(!function_exists('identity')){
	function identity($vStr)
	{
	    $vCity = array(
	        '11','12','13','14','15','21','22',
	        '23','31','32','33','34','35','36',
	        '37','41','42','43','44','45','46',
	        '50','51','52','53','54','61','62',
	        '63','64','65','71','81','82','91'
	    );

	    if (!preg_match('/^([\d]{17}[xX\d]|[\d]{15})$/', $vStr)) return false;

	    if (!in_array(substr($vStr, 0, 2), $vCity)) return false;

	    $vStr = preg_replace('/[xX]$/i', 'a', $vStr);
	    $vLength = strlen($vStr);

	    if ($vLength == 18)
	    {
	        $vBirthday = substr($vStr, 6, 4) . '-' . substr($vStr, 10, 2) . '-' . substr($vStr, 12, 2);
	    } else {
	        $vBirthday = '19' . substr($vStr, 6, 2) . '-' . substr($vStr, 8, 2) . '-' . substr($vStr, 10, 2);
	    }

	    if (date('Y-m-d', strtotime($vBirthday)) != $vBirthday) return false;
	    if ($vLength == 18)
	    {
	        $vSum = 0;

	        for ($i = 17 ; $i >= 0 ; $i--)
	        {
	            $vSubStr = substr($vStr, 17 - $i, 1);
	            $vSum += (pow(2, $i) % 11) * (($vSubStr == 'a') ? 10 : intval($vSubStr , 11));
	        }

	        if($vSum % 11 != 1) return false;
	    }

	    return true;
	}
}


