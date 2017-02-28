<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- 开始头部 -->
<head>
	<meta charset="utf-8" />
	<title>manager<?php $arr = explode(".",$_SERVER['SERVER_NAME']); $judge = $arr[1]; if($judge == "cattrip"){echo "-预上线";}else if($judge =="cattour"){echo "-正式";}?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?=STATIC_FILE_HOST?>assets/css/uploadify.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="<?=STATIC_FILE_HOST?>assets/css/q_style.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="<?=STATIC_FILE_HOST?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=STATIC_FILE_HOST?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=STATIC_FILE_HOST?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=STATIC_FILE_HOST?>assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="<?=STATIC_FILE_HOST?>assets/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?=STATIC_FILE_HOST?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="<?=STATIC_FILE_HOST?>assets/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?=STATIC_FILE_HOST?>assets/css/uniform.default.css" rel="stylesheet" type="text/css"/>

	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?=STATIC_FILE_HOST?>assets/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
	<link href="<?=STATIC_FILE_HOST?>assets/css/daterangepicker.css" rel="stylesheet" type="text/css" />
	<link href="<?=STATIC_FILE_HOST?>assets/css/fullcalendar.css" rel="stylesheet" type="text/css"/>
	<link href="<?=STATIC_FILE_HOST?>assets/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!--自定义样式文件-->
	<link href="<?=STATIC_FILE_HOST?>assets/css/design.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="<?=STATIC_FILE_HOST?>assets/css/list_reset.css" rel="stylesheet" type="text/css" media="screen"/>
   <script src="<?=STATIC_FILE_HOST?>assets/js/jquery-1.10.1.min.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="<?=STATIC_FILE_HOST?>assets/image/logoMacMicro_16pt.png" />
	<script type="text/javascript">
		//全局的JS路径
		var base_url = "<?=STATIC_FILE_HOST?>";
		var image_url = "<?=IMAGE_FILE_HOST?>";
	</script>
</head>
