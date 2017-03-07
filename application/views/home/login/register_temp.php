<!DOCTYPE html>
<html>
<head>
    <title>注册-懒猫旅游</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/login_register.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<div class="wrapper">
		<!-- 头部logo -->
		<div class="header">
			<div class="logo"><img src="../../public/images/login/logo.png" height="48" width="184"/></div>
			<div class="nav">
				<!-- <a><img src="../../public/images/login/search.jpg" height="35" width="41" /></a>|
				<a><img src="../../public/images/login/cart.jpg" height="35" width="35" />  购物车(<span>8</span>)</a>&nbsp;|&nbsp; -->
				<div ><a href="register.html">注册</a></div class="border_div"><div><a href="login.html">登录</a></div>
			</div>
		</div>
		<!-- 注册内容 -->
		<div class="content_register">
			<form id="registerForm">
				<div class="register">
					<div>
						<label class="input_tips" id="uin_tips" for="txt_phone">手机号/邮箱</label>
						<div class="input_div"> 
							<input type="text" class="inputstyle" id="txt_phone" name="user" placeholder="" value="" tabindex="1" /><input style="visibility:hidden;" />
							<div class="cancel"><img id="cancel" src="../../public/images/login/cancel_03.png" height="27" width="33"/></div>
						</div>
					</div>
					<div class="valid"> 
						<div>
							<label class="input_tips" id="valid_tips" for="txt_code">验证码</label>
							<div class="valid_div"><input type="text" class="inputValid" id="txt_code" name="valid" placeholder="" value="" tabindex="2" /><input style="visibility:hidden;" /></div>
						</div>
						<div class="countdown" id="getCode">发送验证码</div>
						<!-- <div class="valid_get_div"><input type="button" value="发送验证码" class="valid_get_div" id="getCode"></div> -->
					</div>
					<div>
						<label class="input_tips" id="pwd_tips" for="txt_pass">密码</label>
						<div class="input_div"><input type="password" class="inputstyle" id="txt_pass" name="pass" placeholder="" value=""  maxlength="16" tabindex="3" /><input style="visibility:hidden;" /></div>
					</div>
					<div id="showtip"></div>
					<div class="service">创建懒猫旅行账户即表示你已同意<a herf="#">服务条款</a></div>
					<div ><input id="registerBtn" type="button" value="注册" /></div>
					<div class="isMember">已经是懒猫会员？&nbsp;&nbsp;&nbsp;<a href="login.html">登录</a></div>
				</div>
			</form>
		</div>
		
	</div>
	<!-- 底部授权 -->
	<div class="bottom">
		<div class="bottom_content"><img src="../../public/images/login/img_bottom.jpg" height="127" width="650" /></div>
	</div>
	<script type="text/javascript" src="../../public/commonJs/jquery.min.js"></script>
    <script type="text/javascript" src="../../public/commonJs/jquery_md5.js"></script>
    <script type="text/javascript" src="../../public/commonJs/globalobj.js"></script>
    <script type="text/javascript" src="../../public/commonJs/common.js"></script>
    <script type="text/javascript" src="../../public/js/countdown.js"></script>
    <script type="text/javascript" src="../../public/js/register.js"></script>
</body>
</html>