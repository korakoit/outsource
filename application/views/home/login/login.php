<!DOCTYPE html>
<html>
<head>
	<title>LOGIN IN</title>
	<?php $this->load->view('home/base/header_meta.php');?>
	<link rel="stylesheet" href="<?=STATIC_FILE_HOST?>static/css/login.css">
</head>
<body>
	<div class="wrapper">
		<div class="content">
			<!-- 头部logo -->
            <header class="loginheader">
                <div class="back" onclick="window.history.go(-1);">&lt;&nbsp;&nbsp;BACK</div>
                <a href="/login/register"> <div class="sign">sign up</div></a>
            </header>
			<div class="main_login">
				<!-- 主要内容 -->
				<section class="logo"></section>
				<h2>Sign in</h2>
				<div class="txt_phone"><input id="email" type="text" placeholder="Enter your email"></div>
				<div class="txt_pass"><input id="password" type="password" placeholder="Password"></div>
				<div id="signin" class="signin">Sign in</div>
				<p><span>Don't have an account? </span><a href="/login/register">Sign up</a></p>
				<a href="/about/contactus">Forgot password?</a>
			</div>
		</div>
	</div>
    <?php $this->load->view('home/base/footer_script.php');?>
    <!-- 底部授权 -->
</body>
<script type="text/javascript">
    $(document).ready(function(){
        $("#signin").click(function(){
            var email = $("#email").val();
            var password = $("#password").val();
            if(email == ''){
                alert('miss email');
                return false;
            }
            if(password == ''){
                alert('miss password');
                return false;
            }
            $.post("/login/login",{email:email,password:password},function(result){
               var obj =  eval("("+result+")");
                if(obj.err_msg == 'successful'){
                    alert(obj.err_msg);
                    window.location.href = '/home/';
                }else{
                    alert(obj.err_msg);
                }
            });
        })
    });
</script>
</html>
