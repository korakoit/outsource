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
						<div class="right"><input id="first" type="text"></div>
					</section>
					<section class="sub">
						<div class="left"><b>*</b>Last Name</div>
						<div class="right"><input id="last" type="text"></div>
					</section>
					<section class="sub">
						<div class="left"><b>*</b>Email Address</div>
						<div class="right"><input id="email" type="text"></div>
					</section>
					<section class="sub">
						<div class="left"><b>*</b>Choose a Password</div>
						<div class="right"><input id="password" type="password"></div>
					</section>
					<section class="sub">
						<div class="left"><b>*</b>Confirm Password</div>
						<div class="right"><input id="confirm" type="password"></div>
					</section>
					
				</section>

				<section class="subcontent ">
					<div class="title"><i class="sub1"></i><span>Company Profile</span></div>
					<section class="sub">
						<div class="left">Company Profile</div>
						<div class="right textarea"><input id="company" type="textarea"></div>
					</section>
					<section class="sub">
						<div class="left">Location</div>
						<div class="right"><input id="location" type="text"></div>
					</section>
					<section class="sub">
						<div class="left">Company Website</div>
						<div class="right"><input id="website" type="text"></div>
					</section>
					<section class="sub">
						<div class="left">Business Phone</div>
						<div class="right"><input id="phone" type="text"></div>
					</section>
				</section>
				<section class="check">
					<span></span>I'd like to receive information on related products and events.
				</section>
				<div class="signup" id="signup">Sign up</div>
				<p class="import"><span>Already have an account? </span><a href="/login/">Sign in</a></p>
			</div>
		</div>
	</div>
	<?php $this->load->view('home/base/footer_script.php');?>
	<!-- 底部授权 -->
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$("#signup").click(function(){
			var first = $("#first").val();
            var last = $("#last").val();
			var email = $("#email").val();
			var password = $("#password").val();
            var confirm = $("#confirm").val();
            var company = $("#company").val();
            var location = $("#location").val();
            var website = $("#website").val();
            var phone = $("#phone").val();
            if(first == ''){
                alert('miss first name');
                return false;
            }
            if(last == ''){
                alert('miss last name');
                return false;
            }
			if(email == ''){
				alert('miss email');
				return false;
			}
			if(password == ''){
				alert('miss password');
				return false;
			}
            if(confirm == ''){
                alert('miss confirm password');
                return false;
            }
			$.post("/login/register",{first:first,last:last,email:email,password:password,confirm:confirm,company:company,website:website,location:location,phone:phone},function(result){
				var obj =  eval("("+result+")");
				if(obj.err_msg == 'successful'){
					alert(obj.err_msg);
                    window.location.href = '/login/';
				}else{
                    alert(obj.err_msg)
                }
			});
		})
	});
</script>
</html>