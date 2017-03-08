<?php
/**
 * 使用方法，执行命令  php cli.php [controller or model] [method] [arg1] [arg2] [arg3] ...
 * CLI执行控制器,执行前请先配置ENVIRONMENT
 */
date_default_timezone_set('Asia/Shanghai');
if( ! defined('ENVIRONMENT'))
{
    define('ENVIRONMENT','development');
    //define('ENVIRONMENT','production');
}

if(!defined('APPPATH'))define('APPPATH',dirname(__FILE__));
require_once(APPPATH.'/config/'.ENVIRONMENT.'/constants.php');
require_once(APPPATH.'/config/'.ENVIRONMENT.'/config.php');
echo("ENVIRONMENT Config is ".ENVIRONMENT.",Sure?\r\n");

$path_c = APPPATH."/controllers/";
$path_m = APPPATH."/model/";
if(isset($argv[1])){
    $controller = $argv[1];
    $method = isset($argv[2])?$argv[2]:"";
    if($method) {
        $file = $path_c . $controller . ".php";
        if ( ! file_exists($file))
        {
            $file = $path_c . $controller;
        }
        if ( ! file_exists($file))
        {
            $file = $path_m. $controller . ".php";
        }
        if ( ! file_exists($file))
        {
            $file = $path_m. $controller;
        }
        if( ! file_exists($file))
        {
            echo("Can't find the controller or model files\r\n");
            return;
        }
        require_once($file);
        $c = new $controller();
        $arg = [];
        foreach($argv as $k=>$v)
        {
            if($k > 2)
            {
                $arg[] = $v;
            }
        }
        if(count($arg)) {
            echo("call {$controller}::{$method}(".implode(",",$arg).")\r\n");
            call_user_func_array(array($c, $method), $arg);
        }
        else{
            echo("call {$controller}::{$method}()\r\n");
            call_user_func(array($c,$method));
        }
    }
    else
    {
        echo("input the method plz.\r\n");
    }
}
else
{
    echo("input the controller plz.\r\n");
}
