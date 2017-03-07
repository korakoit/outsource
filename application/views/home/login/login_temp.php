<!DOCTYPE html>
<html>
<head>
    <title>登录-懒猫旅行</title>
    <link rel="stylesheet" href="../../public/css/login_register.css">
     <link rel="stylesheet" href="../../public/css/validate.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10" />
</head>
<body>
	<div class="wrapper">
		<!-- 头部logo -->
		<div class="header">
			<div class="logo"><img src="../../public/images/login/logo.png" height="48" width="184"/></div>
			<div class="nav">
				<!-- <a><img src="../images/login/search.jpg" height="35" width="41" /></a>|
				<a><img src="../images/login/cart.jpg" height="35" width="35" />  购物车(<span>8</span>)</a>&nbsp;|&nbsp; -->
				<div ><a href="register.html">注册</a></div class="border_div"><div><a href="login.html">登录</a></div>
			</div>
		</div>
		<!-- 主要内容 -->
		<div class="content_login">
			<div class="login">
		        <form id="loginform" name="loginform" action="#" method="post" >
			        <div>
			       		 <span class="input_tips" id="user_tips" for="txt_phone">手机/邮箱/账号</span>
			            <div class="input_div">
			            	<input type="text" class="inputstyle" id="txt_phone" name="user" placeholder="" value="" tabindex="1" /><input style="visibility:hidden;" />
			            	<div class="cancel"><img id="cancel" src="../../public/images/login/cancel_03.png" height="27" width="33"/></div>
			            </div>
		            </div>
		             <div>
		             	 <span class="input_tips" id="pwd_tips" for="txt_pass">密码</span>
		           		 <div class="input_div"><input type="password" class="inputstyle" id="txt_pass" name="pass" placeholder="" value=""  maxlength="15" tabindex="3" /><input style="visibility:hidden;" /></div>
		            </div>
		            <div id="showtip"></div>
		            <div class="remenberPass">
		            	<div class="rememberCheck"><input type="checkbox" id="check" class="checkbo" name="check"  /><label for="check"></label></div>
		            	<div class="remember_div">记住登录状态</div>
		            	<div class="forget"><a href="callBackPass.html">忘记密码？</a></div>
		            </div>
		            
		           <div class="form_btn"><input type="button" value="登录" id="login_button" /></div>
		        </form>
		        <div class="creat">
		        	<div class="child1">没有账号？</div>
		            <div class="child2"><a href="register.html">注册！</a></div>	
		        </div>
		    </div>
		    
	    </div>
	    
    </div>
    <!-- 底部授权 -->
    <div>
		<div class="bottom">
			<div class="bottom_content"><img src="../../public/images/login/img_bottom.jpg" height="127" width="650" /></div>
		</div>
	</div>
    <script type="text/javascript" src="../../public/commonJs/jquery.min.js"></script>
    <!--<script type="text/javascript" src="../../public/js/store.min.js"></script>-->
    <script type="text/javascript" src="../../public/commonJs/jquery_md5.js"></script>
    <!--<script type="text/javascript" src="../../public/commonJs/validform.js"></script>-->
    <script type="text/javascript" src="../../public/commonJs/globalobj.js"></script>
    <script type="text/javascript" src="../../public/commonJs/common.js"></script>
    
    <script type="text/javascript" src="../../public/js/login.js"></script>
   
 
</body>
</html>
