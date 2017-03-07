<?php defined('BASEPATH') OR exit('No direct script access allowed');

//静态文件服务器
define('STATIC_FILE_HOST','http://'.$_SERVER['SERVER_NAME'].'/');

define('ADMIN_SESS','ADMIN_SESS');



//product status
define('STATUS_ON_SHELF',1);
define('STATUS_DOWN_SHELF',2);
define('UPLOAD_PATH',$_SERVER['DOCUMENT_ROOT'].'/uploads');
define('IMAGE_HOST',STATIC_FILE_HOST.'uploads/');


//mail
define('MAIL_HOST','smtp.gmail.com');
define('MAIL_PORT',"587");
define('MAIL_USER','cheyezheng@gmail.com');
define('MAIL_PASS','qq5607344');
define('MAIL_FROM','CLEAD <lanmaohello@gmail.com>');