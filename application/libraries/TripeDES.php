<?php

/*
用法示例：
$this->load->library("TripeDES","tripedes");            //加载加解密类
$this->tripedes->setKey(ENCRYPT_KEY);                   //设置密钥，暂定为CATTOURCOMLANMAOSZENCTYPTKEYS
$str = "TICOWONG";                                      //待加密的字串
$str_encrypt = $this->tripedes->encrypt($str);          //加密
$str_decrypt = $this->tripedes->decrypt($str_encrypt);  //对已加密字串进行解密
 */
class TripeDES
{
    public function __construct()
    {
        $lib = dirname(__FILE__).'/phpseclib/Crypt/TripleDES.php';
        include  $lib;
        $this->des = new Crypt_TripleDES();
        if(  !$this->des)
        {
            echo("can't find the lib file:".$lib);
        }
    }
    //设置加密密钥
    public function setKey($key)
    {
        $this->key = $key;
        $this->des->setKey($key);
    }
    //加密
    public function encrypt($str)
    {
        if( ! $this->key) {
            return "set key first.plz.";
        }
        $tmp = $this->des->encrypt($str);
        $res = base64_encode($tmp);
        return $res;
    }
    //解密
    public function decrypt($str)
    {
        if( ! $this->key) {
            return "set key first.plz.";
        }
        $tmp = base64_decode($str);
        $res = $this->des->decrypt($tmp);
        return $res;
    }
}