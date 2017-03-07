<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>找回密码--懒猫旅行</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/login_register.css">
</head>
<body>
	<!-- wrapper -->
	<div class="wrapper">
		<!-- 头部logo -->
		<div class="header">
			<div class="logo"><img src="../../public/images/login/logo.png" height="48" width="184" /></div>
			<div class="nav">
				<!-- <a><img src="../images/login/search.jpg" height="35" width="41" /></a>|
				<a><img src="../images/login/cart.jpg" height="35" width="35" />  购物车(<span>8</span>)</a>&nbsp;|&nbsp; -->
				<div ><a href="register.html">注册</a></div class="border_div"><div><a href="login.html">登录</a></div>
			</div>
		</div>
		<!-- 找回密码内容 -->
		<div class="callBack_content">
			<form id="registerForm">
				<div class="callBack">
					<div>
						<label class="input_tips" id="uin_tips" for="txt_phone">手机号</label>
						<div class="input_div"> 
							<input type="text" class="inputstyle_callback" id="txt_phone" name="user" placeholder="" value="" tabindex="1" /><input style="visibility:hidden;" />
							<div class="cancel"><img id="cancel" src="../../public/images/login/cancel_03.png" height="27" width="33"/></div>
						</div>

					</div>
					<div class="valid"> 
						<div>
							<label class="input_tips" id="valid_tips" for="txt_code">验证码</label>
							<div class="valid_div"><input type="text" class="inputValid_callBack" id="txt_code" name="valid" placeholder="" value="" tabindex="2" /><input style="visibility:hidden;" /></div>
						</div>
						<div class="countdown" id="getCode">发送验证码</div>
						<!-- <div class="valid_get_div"><input type="button" value="发送验证码" class="valid_get_div" id="getCode"></div> -->
					</div>
					<div>
						<label class="input_tips" id="pwd_tips" for="txt_pass">新密码</label>
						<div class="input_div"> <input type="password" class="inputstyle_callback" id="txt_pass" name="txt_pass" maxlength="15"  placeholder="" value="" tabindex="3" /><input style="visibility:hidden;" /></div>
					</div>
					<div id="showtip"></div>
					<div class="form_btn"><input type="button" value="立即找回" id="callBackBtn" /></div>
				</div>
			</form>
		</div>
		
	</div>
	<!-- 底部授权 -->
	<div class="bottom">
		<div class="bottom_content"><img src="../../images/login/img_bottom.jpg" height="127" width="650" /></div>
	</div>
	<script type="text/javascript" src="../../public/commonJs/jquery.min.js"></script>
    <script type="text/javascript" src="../../public/commonJs/jquery_md5.js"></script>
    <script type="text/javascript" src="../../public/commonJs/globalobj.js"></script>
    <script type="text/javascript" src="../../public/commonJs/common.js"></script>
    <script type="text/javascript" src="../../public/js/countdown.js"></script>
    <script type="text/javascript" src="../../public/js/callbackPass.js"></script>
</body>
</html>