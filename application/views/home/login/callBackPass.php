<!DOCTYPE html>
<html>
<head>
	<!--#include virtual="/views/base/header_meta.html" -->
	<title>找回密码--懒猫旅行</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/login_register.css">
</head>
<body>
	<!-- 头部logo -->
	<!--#include virtual="/views/base/header.html" -->
	<!-- wrapper -->
	<div class="wrapper callBackPass">
		<!-- 找回密码内容 -->
		<div class="callBack_content">
			<form id="registerForm">
				<div class="callBack">
					<div>
						<label class="input_tips" id="uin_tips" for="txt_phone">手机号/邮箱</label>
						<div class="input_div"> 
							<input type="text" class="inputstyle" id="txt_phone" name="user" placeholder="" value="" tabindex="1" /><input style="visibility:hidden;" />
							<div class="cancel"><img id="cancel" src="../../public/images/login/cancel_03.png" height="27" width="33"/></div>
						</div>
					</div>
					<div class="valid"> 
						<div>
							<label class="input_tips" id="img_tips" for="img_code">图片验证码</label>
							<div class="valid_div"><input type="text" class="inputstyle" id="img_code" name="valid" placeholder="" value="" tabindex="2" /><input style="visibility:hidden;" /></div>
						</div>
						<div class="countdown" id="getimgCode"><div class="codetip">获取图片验证码</div><img src="" width="100%" height="100%"></div>
					</div>
					<div class="valid"> 
						<div>
							<label class="input_tips" id="valid_tips" for="txt_code">手机验证码</label>
							<div class="valid_div"><input type="text" class="inputstyle" id="txt_code" name="valid" placeholder="" value="" tabindex="2" /><input style="visibility:hidden;" /></div>
						</div>
						<div class="countdown dis_color" id="getCode">获取验证码</div>
					</div>
					<div>
						<label class="input_tips" id="pwd_tips" for="txt_pass">新密码</label>
						<div class="input_div"> <input type="password" class="inputstyle" id="txt_pass" name="txt_pass" maxlength="15"  placeholder="" value="" tabindex="3" /><input type="password" style="visibility:hidden;" /></div>
					</div>
					<div id="showtip"></div>
					<div class="form_btn"><input type="button" value="立即找回" id="callBackBtn" /></div>
				</div>
			</form>
		</div>
		
	</div>
	<!-- 底部授权 -->
	<!--#include virtual="/views/base/white_footer.html" -->
	<!--#include virtual="/views/base/footer_script.html" -->
    <script type="text/javascript" src="../../public/js/countdown.js"></script>
    <script type="text/javascript" src="../../public/js/callbackPass.js"></script>
</body>
</html>