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
			<?php $this->load->view('home/base/loginheader.php');?>
			<div class="main_login">
				<!-- 主要内容 -->
				<section class="logo"></section>
				<h2>Sign in</h2>
				<div class="txt_phone"><input type="text" placeholder="Enter your email"></div>
				<div class="txt_pass"><input type="password" placeholder="Password"></div>
				<div id="signin" class="signin">Sign in</div>
				<p><span>Don't have an account? </span><a>Sign up</a></p>
				<a>Forgot password?</a>
			</div>
		</div>
	</div>
	<!-- 底部授权 -->
</body>
</html>
