<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('home/base/header_meta.php');?>
		<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>static/css/cart_list.css">
		<title>Search</title>
	</head>
	<body>
		<div class="wrapper">
			<?php $this->load->view('home/base/header.php');?>
			<div class="content center">
				<div class="main">
					<section class="seainput"><div class="input"><input type="text" maxlength="80" placeholder="Please enter the name of the commodity" value=""></div><i id="gosearch"></i></section>
					<section class="showlist">
			 		<ul>
			 			<li>
			 				<div class="img"></div>
			 				<p class="tit">Markless Fashion Mens  Down Jacket Men's Brand</p>
			 				<p class="subtit">Brand Clothing Casual</p>
			 			</li>
			 			<li>
			 				<div class="img"></div>
			 				<p class="tit">Markless Fashion Mens  Down Jacket Men's Brand</p>
			 				<p class="subtit">Brand Clothing Casual</p>
			 			</li>
			 			<li>
			 				<div class="img"></div>
			 				<p class="tit">Markless Fashion Mens  Down Jacket Men's Brand</p>
			 				<p class="subtit">Brand Clothing Casual</p>
			 			</li>
			 			<li>
			 				<div class="img"></div>
			 				<p class="tit">Markless Fashion Mens  Down Jacket Men's Brand</p>
			 				<p class="subtit">Brand Clothing Casual</p>
			 			</li>
			 			<li>
			 				<div class="img"></div>
			 				<p class="tit">Markless Fashion Mens  Down Jacket Men's Brand</p>
			 				<p class="subtit">Brand Clothing Casual</p>
			 			</li>
			 			<li>
			 				<div class="img"></div>
			 				<p class="tit">Markless Fashion Mens  Down Jacket Men's Brand</p>
			 				<p class="subtit">Brand Clothing Casual</p>
			 			</li>
			 			<li>
			 				<div class="img"></div>
			 				<p class="tit">Markless Fashion Mens  Down Jacket Men's Brand</p>
			 				<p class="subtit">Brand Clothing Casual</p>
			 			</li>
			 			<li>
			 				<div class="img"></div>
			 				<p class="tit">Markless Fashion Mens  Down Jacket Men's Brand</p>
			 				<p class="subtit">Brand Clothing Casual</p>
			 			</li>
			 			<li>
			 				<div class="img"></div>
			 				<p class="tit">Markless Fashion Mens  Down Jacket Men's Brand</p>
			 				<p class="subtit">Brand Clothing Casual</p>
			 			</li>
			 		</ul>
			 	</section>
			 	<div id="page" class="pager"></div>
				</div> 
				<!--main end -->
			</div>
			<?php $this->load->view('home/base/index_footer.php');?>
		</div>
		<?php $this->load->view('home/base/footer_script.php');?>
		<script src="<?=STATIC_FILE_HOST?>static/commonJs/laypage/laypage.js"></script>
		<script type="text/javascript" src="<?=STATIC_FILE_HOST?>static/js/search.js"></script>
	</body>
</html>
