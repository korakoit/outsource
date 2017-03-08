<?php

ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);

class Wechat{

	function curl_post($url,$vars,$second=30,$aHeader=array("Content-type: text/xml")){
		$ch = curl_init();
        curl_setopt($ch,CURLOPT_TIMEOUT,$second);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_URL,$url);  
        if( count($aHeader) >= 1 ){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeader);
        }
        curl_setopt($ch,CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$vars);
        $data = curl_exec($ch);
        if($data){
            curl_close($ch);
            return $data;
        }
        else { 
            $error = curl_errno($ch);
            echo "call faild, errorCode:$error\n"; 
            curl_close($ch);
            return false;
        }
	}

    /**
     * 输出xml字符
     * @throws WxPayException
    **/
    public function ToXml($params)
    {
        $xml = "<xml>";
        foreach ($params as $key=>$val)
        {
            if (is_numeric($val)){
                $xml.="<".$key.">".$val."</".$key.">";
            }else{
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml; 
    }

    /**
     * 将xml转为array
     * @param string $xml
     * @throws WxPayException
     */
    public function FromXml($xml)
    {   
        //将XML转为array
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $result = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);        
        return $result;
    }

    /**
     * 格式化参数格式化成url参数
     */
    public function ToUrlParams($params)
    {
        $buff = "";
        foreach ($params as $k => $v)
        {
            if($k != "sign" && $v != "" && !is_array($v)){
                $buff .= $k . "=" . $v . "&";
            }
        }
        
        $buff = trim($buff, "&");
        return $buff;
    }

	//生成微信签名
    public function createSign($params){
        ksort($params);
        $result = '';
        foreach ($params as $key => $value) {
            if($key=='sign') continue;
            if(!empty($value)){
                $result .= $key.'='.$value.'&';
            }
        }
        return strtoupper(md5($result.'key='.PAY_SIGN_KEY));
    }

    public function orderquery($out_trade_no,$pay_type){
        $CI = &get_instance();
        $CI->load->helper('string_helper');
        $nonce_str = strtoupper(random_string('alnum', 32));
             $params = array(
            'appid'=>APPID,
            'mch_id'=>MCH_ID,
            'nonce_str'=>$nonce_str,
            'out_trade_no'=>$out_trade_no
        );
        $sign =  $this->createSign($params);
        $params['sign'] = $sign;
        //参数拼接成xml
        $post_params = '<xml>';
        foreach ($params as $key => $value) {
            $post_params .= '<'.$key.'>'.$value.'</'.$key.'>';
        }
        $post_params .= '</xml>';
        $xml = $this->curl_post('https://api.mch.weixin.qq.com/pay/orderquery', $post_params);
        $result = $this->FromXml($xml);
        return $result;
    }

    public function createWechatParameter($out_trade_no,$total_fee,$body,$detail,$spbill_create_ip,$trade_type){
        $CI = &get_instance();
        $CI->load->helper('string_helper');
        $nonce_str = strtoupper(random_string('alnum', 32));
        
        $prepay_id = $this->unifiedorder($out_trade_no,$total_fee,$body,$detail,$spbill_create_ip,$trade_type);
        $params = [ 'appid'=>APPID,
                    'partnerid'=>MCH_ID,
                    'prepayid'=>strval($prepay_id),
                    'package'=>'Sign=WXPay',
                    'noncestr'=>$nonce_str,
                    'timestamp'=>strval(time())
                    ];
        $sign =  $this->createSign($params);
        $params['sign'] = $sign;
        unset($params['package']);
        $params['package_str'] = 'Sign=WXPay';
        return $params;       
    }

    //公众号统一下单接口 
    public function unifiedorderOA($out_trade_no,$total_fee,$body,$attach,$spbill_create_ip,$trade_type){
        $CI = &get_instance();
        $CI->load->helper('string_helper');

        $nonce_str = strtoupper(random_string('alnum', 32));
        // $rand_str = 'abcdefghijklmnopqrstuvwxyz';
        $params = array(
            'appid'=>OA_APPID,
            'mch_id'=>OA_MCH_ID,
            'nonce_str'=>$nonce_str,
            'body'=>'懒猫商品',
            'attach'=>$attach,
            'out_trade_no'=>$out_trade_no,
            'fee_type'=>OA_FEE_TYPE,
            'total_fee'=>$total_fee,
            'spbill_create_ip'=>$spbill_create_ip,
            'notify_url'=>WECHAT_NOTIFY_URL,
         	'trade_type'=>$trade_type
        );

        $sign =  $this->createSign($params);
        $params['sign'] = $sign;
        //参数拼接成xml
        $post_params = '<xml>';
        foreach ($params as $key => $value) {
            $post_params .= '<'.$key.'>'.$value.'</'.$key.'>';
        }
        $post_params .= '</xml>';

        $result_str = $this->curl_post('https://api.mch.weixin.qq.com/pay/unifiedorder', $post_params);
        if($result_str!=false){
            $result = (array)simplexml_load_string($result_str);
            foreach($result as $key=>$value){
                preg_match("/<{$key}>[\S\s\S]*?<\/{$key}>/",$result_str,$matches);
                sscanf($matches[0], "<{$key}><![CDATA[%[^]]]></{$key}>",$tmp);
                $result[$key] = $tmp;
            }
            if(isset($result['code_url'])){
                return $result['code_url'];
            }else{
                log_message('DEBUG','微信签名错误:'.json_encode($result));
                return false;
            }
        }else{
            return false;
        }
    }

    //公众号统一下单接口
    public function unifiedorder($out_trade_no,$total_fee,$body,$attach,$spbill_create_ip,$trade_type){
        $CI = &get_instance();
        $CI->load->helper('string_helper');

        $nonce_str = strtoupper(random_string('alnum', 32));
        // $rand_str = 'abcdefghijklmnopqrstuvwxyz';
        $params = array(
            'appid'=>APPID,
            'mch_id'=>MCH_ID,
            'nonce_str'=>$nonce_str,
            'body'=>$body,
            'attach'=>$attach,
            'out_trade_no'=>$out_trade_no,
            'fee_type'=>FEE_TYPE,
            'total_fee'=>$total_fee,
            'spbill_create_ip'=>$spbill_create_ip,
            'notify_url'=>WECHAT_NOTIFY_URL,
            'trade_type'=>$trade_type
        );

        $sign =  $this->createSign($params);
        $params['sign'] = $sign;
        //参数拼接成xml
        $post_params = '<xml>';
        foreach ($params as $key => $value) {
            $post_params .= '<'.$key.'>'.$value.'</'.$key.'>';
        }
        $post_params .= '</xml>';

        $result_str = $this->curl_post('https://api.mch.weixin.qq.com/pay/unifiedorder', $post_params);
        if($result_str!=false){
            $result = (array)simplexml_load_string($result_str);
            foreach($result as $key=>$value){
                preg_match("/<{$key}>[\S\s\S]*?<\/{$key}>/",$result_str,$matches);
                sscanf($matches[0], "<{$key}><![CDATA[%[^]]]></{$key}>",$tmp);
                $result[$key] = $tmp;
            }
            if(isset($result['prepay_id'])){
                return $result['prepay_id'];
            }else{
                log_message('DEBUG','微信签名错误:'.json_encode($result));
                return false;
            }
        }else{
            return false;
        }
    }
}
