<!DOCTYPE html>
<html>
<head>
	<title>LOGIN IN</title>
	<?php $this->load->view('home/base/header_meta.php');?>
	<link rel="stylesheet" href="<?=STATIC_FILE_HOST?>static/css/login.css">
</head>
<body>
	<div class="wrapper">
		<div class="content reg">
			<!-- 头部logo -->
			<?php $this->load->view('home/base/loginheader.php');?>
			<div class="main_register">
				<!-- 主要内容 -->
				<section class="logo"></section>
				<h2>Sign UP</h2>
				<section class="subcontent">
					<div class="title"><i></i><span>Personal Information</span></div>
					<section class="sub">
						<div class="left"><b>*</b>First Name</div>
						<div class="right"><input type="text"></div>
					</section>
					<section class="sub">
						<div class="left"><b>*</b>Last Name</div>
						<div class="right"><input type="text"></div>
					</section>
					<section class="sub">
						<div class="left"><b>*</b>Email Address</div>
						<div class="right"><input type="text"></div>
					</section>
					<section class="sub">
						<div class="left"><b>*</b>Choose a Password</div>
						<div class="right"><input type="text"></div>
					</section>
					<section class="sub">
						<div class="left"><b>*</b>Confirm Password</div>
						<div class="right"><input type="text"></div>
					</section>
					
				</section>

				<section class="subcontent ">
					<div class="title"><i class="sub1"></i><span>Company Profile</span></div>
					<section class="sub">
						<div class="left">Company Profile</div>
						<div class="right textarea"><input type="textarea"></div>
					</section>
					<section class="sub">
						<div class="left">Location</div>
						<div class="right"><input type="text"></div>
					</section>
					<section class="sub">
						<div class="left">Company Website</div>
						<div class="right"><input type="text"></div>
					</section>
					<section class="sub">
						<div class="left">Business Phone</div>
						<div class="right"><input type="text"></div>
					</section>
				</section>
				<section class="check">
					<span></span>I'd like to receive information on related products and events.
				</section>
				<div class="signup">Sign up</div>
				<p class="import"><span>Already have an account? </span><a href="login.html">Sign in</a></p>
			</div>
		</div>
	</div>
	<!-- 底部授权 -->
</body>
</html>