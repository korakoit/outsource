<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('home/base/header_meta.php');?>
	<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>static/css/home/contact.css">
	<title>Contact US</title>
</head>
<body>
<div class="wrapper">
	<?php $this->load->view('home/base/header.php');?>
	<section class="navmap" id="navmap">
	<div class="center">
		<a href="/">Homepage</a><span>&gt;</span><a class="active">Contact US</a>
	</div>
	</section>
	<section class="showinfo center">
		<div class="banner"></div>
		<h2>GLEAD Kitchen Equipment (Guangzhou) Co., Ltd.</h2>
		<p class="p0">GLEAD Headquarters in Guangzhou, PRC</p>
		<ul>
			<li>
				<div></div>
				<p class="lip">Office Tel.: 0086 (0) 20-3997 8089 Mobile No.: 0086 137 6077 3620</p>
			</li>
			<li class="sec">
				<div></div>
				<p class="lip">Email: info@gleadkitchen.com</p>
			</li>
			<li class="thirds">
				<div></div>
				<p class="lip">Address: Yiheng Road 7, Xingye Road West, Chen Chung Village, Shawan Town, Panyu District, Guangzhou, PRC 411500 </p>
			</li>
		</ul>
	</section>
	<!-- input -->
	<section class="writeinfo center">
		<section class="inputinfo">
			<div class="subinfo">
				<div class="left">Name:</div>
				<div class="right"><input type="text" id="Name" maxlength="60"></div>
			</div>
			<div class="subinfo">
				<div class="left">Email:</div>
				<div class="right"><input type="text" id="Email" maxlength="60"></div>
			</div>
			<div class="subinfo">
				<div class="left">Subject:</div>
				<div class="right"><input type="text" id="Subject"></div>
			</div>
			<div class="subinfo">
				<div class="left">Note:</div>
				<div class="right"><input type="text" id="Note"></div>
			</div>
		</section>
		<div class="hr"></div>
		<p>We will not sell or distribute your information to third parties. <strong>Privacy Statement</strong></p>
		<div id="submit">Submit</div>
	</section>
	<?php $this->load->view('home/base/index_footer.php');?>
</div>
   <div id="navinfo" data-info="1"></div>
	<?php $this->load->view('home/base/footer_script.php');?>
	<script type="text/javascript">
		$('#submit').on('click',function(){
			var Name = $('#Name').val()
			var Email = $('#Email').val()
			var Subject = $('#Subject').val()
			var Note = $('#Note').val()
			if(Name.length<1){
				alert('Please enter Name');
			}
			else if(Email.length<1){
				alert('Please enter Email');
			}
			else if(!Common.regExp.email.test(Email)){
				alert('Mailbox format error');
			}
			else if(Subject.length<1){
				alert('Please enter Subject');
			}
			else if(Note.length<1){
				alert('Please enter Note');
			}
			// do something  submit
            $.post("/about/add",{name:Name,email:Email,subject:Subject,note:Note},function(result){
                var obj =  eval("("+result+")");
                if(obj.err_code == '0000'){
                    alert('success');
                    window.location.href = '/home';
                }else{
                    alert(obj.err_code)
                }
            });
		});
	</script>
</body>
</html>