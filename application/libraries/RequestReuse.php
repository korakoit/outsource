<?php
//Redis.Request.Reuse生效并使用缓存后，请求返回的Response Header会有Diy-Cache-Type，Diy-Cache-Time等标志

switch (ENVIRONMENT) {
    case 'development':
        define('REDIS_HOST_REUSE', '127.0.0.1');
        define('REDIS_PORT_REUSE',6379);
        break;
    default:
        define('REDIS_HOST_REUSE', '127.0.0.1');
        define('REDIS_PORT_REUSE',6379);
        break;
}

//默认缓存的首KEY
define('REDIS_REUSE_KEY','REUSE');
//默认缓存的TTL设置
define('REDIS_REUSE_TTL',10);
//连接到REDIS
$redis = new Redis();
$redis->connect(REDIS_HOST_REUSE,REDIS_PORT_REUSE);

/**
 * Reuse的配置,需要TOKEN验证的暂时不配置进来，支持验证后可配置
 */
$Reuse_Config =
[
    //配置列子
    [
        'path'=>'\/Product\/getProductDetail(\?.+)?',   //路径匹配
        'key'=>'Product/getProductDetail',              //缓存键值片段，不设置则使用path,正则的path需要配key
        'method'=>['POST','GET','ALL'],                 //方法限制，不设置则不限制
        'params'=>['device_type','user_id','id'],       //关键参数表,参数表的值直接决定数据的值，请参考接口参数
        'ttl'=>10,                                      //自动过期时间,不设置则默认REDIS_REUSE_TTL
        'enable'=>1                                     //配置是否生效的开关，不设置或是设置成1是生效
    ]
];
@include_once dirname(__FILE__) . "/../config/RequestReuse.php";

/**
 * 检测是否不使用REUSE
 */
$NO_REUSE = isset($_REQUEST['NO_REUSE']) ? $_REQUEST['NO_REUSE'] : "0";
if($NO_REUSE == "0")
{
    //根据配置获取重用KEY
    $REUSE_KEY = getKeys($Reuse_Config);
    //检测是否有可重用缓存,有则直接返回
    getReuse_Cache($redis,$REUSE_KEY);
}

/**
 * 根据配置获取KEY及TTL
 * @param $Reuse_Config
 * @return array
 */
function getKeys($Reuse_Config)
{
    if( ! isset($_SERVER['REQUEST_METHOD']))
    {
        syslog(4,"RequestReuse no REQUEST_METHOD found.");
        return [];
    }
    if( ! isset($_SERVER['REQUEST_URI']))
    {
        syslog(4,"RequestReuse no REQUEST_URI found.");
        return [];
    }
    $path = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];
    $params = $_REQUEST;
    $ttl = REDIS_REUSE_TTL;
    foreach($Reuse_Config as $config)
    {
        if($config['path'] == $path OR @preg_match('/'.strval($config['path']).'/i',$path))
        {
            //配置的方法过滤
            if(isset($config['method'])) {
                if (!in_array($method, $config['method']) AND !in_array("ALL", $config['method'])) {
                    return [];
                }
            }
            //配置的开关检测
            if(isset($config['enable']))
            {
                if( ! $config['enable'])
                {
                    return [];
                }
            }
            //配置KEY的检测
            if(isset($config['key']))
            {
                if( ! $config['key'])
                {
                    $str_key = $path;
                }else{
                    $str_key = $config['key'];
                }
            }else{
                $str_key = $path;
            }
            //配置的参数的检测
            if(isset($config['params'])) {
                foreach ($params as $pk => $pv) {
                    if (in_array($pk, $config['params'])) {
                        if ($pv) {
                            $str_key .= "/" . $pv;
                        }
                    }
                }
            }
            //配置的TTL检测
            if(isset($config['ttl']))
            {
                $tmp = intval($config['ttl']);
                if($tmp)
                {
                    $ttl =$tmp;
                }
            }
            $res['KEY'] = REDIS_REUSE_KEY.":".ltrim(str_replace("/",":",$str_key),":");
            $res['TTL'] =$ttl;
            return $res;
        }
    }
    return [];
}

/**
 * 直接输出结果
 * @param $key
 * @param $ttl
 * @param $result
 */
function Reuse_Output($result,$key="",$ttl=0){
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Max-Age: 3628800');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers:Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
    if($key){
        header('Diy-Cache-Key: '.$key);
    }
    if($ttl){
        header('Diy-Cache-Time: '.$ttl);
    }
    header('Diy-Cache-Type: Redis_Request_Reuse');
    header("content-type:application/json");
    //判断是否返回JSONP
    if(isset($_REQUEST['callback'])){
        $json_targ = $_REQUEST['callback'];
        if($json_targ)
        {
            $result = $json_targ."(".$result.")";
        }
    }
    //返回json
    echo $result;
    exit();
}

/**
 * 根据重用KEY，缓存结果
 * @param $redis
 * @param $reuse_key
 * @param $result
 */
function Reuse_Cache($redis,$reuse_key,$result)
{
    if($reuse_key AND $redis AND $result)
    {
        if(count($reuse_key))
        {
            $key = $reuse_key['KEY'];
            $ttl = $reuse_key['TTL'];
            $redis->set($key,$result);
            $redis->setTimeOut($key,$ttl);
        }
    }
}

/**
 * 根据REUSE_KEY获取结果，如果有结果则直接输出
 * @param $redis
 * @param $reuse_key
 */
function getReuse_Cache($redis,$reuse_key)
{
    if($redis)
    {
        if($reuse_key AND count($reuse_key))
        {
            $key = $reuse_key['KEY'];
            $result = $redis->get($key);
            $ttl = $redis->ttl($key);
            if($result){
                Reuse_Output($result,$key,$ttl);
            }
        }
    }
}

/**
 * 测试函数
 */
function test()
{
    $patten = '\/Destination\/[^\/]+';
    $match = array();
    preg_match('/'.strval($patten).'/i',$_SERVER['QUERY_STRING'],$match);
    var_dump($match);
}