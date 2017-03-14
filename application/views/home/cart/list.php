<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('home/base/header_meta.php');?>
		<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>static/css/cart_list.css">
		<title>Cart</title>
	</head>
	<body>
		<div class="wrapper">
			<?php $this->load->view('home/base/header.php');?>
			<div class="content center">
				<div class="main">
					<section class="showlist">
			 		<ul>
                        <?php if(!empty($cart)):?>
                            <?php foreach($cart as $key => $val):?>
                                <li>
                                    <a href="/product/details/<?=$val['product_id']?>">
                                        <div class="img" style="background-image:url(<?=$val['image']?>);"></div>
                                        <p class="tit"><?=$val['name']?></p>
                                        <p class="subtit"><?=$val['title']?></p>
                                    </a>
                                    <input type="hidden" id="product_id" value="<?=$val['product_id']?>">
                                    <div class="delete"><div class="icon"></div></div>
                                </li>
                            <?php endforeach;?>
                        <?php else: ?>
                            NO DATA!
                        <?php endif;?>
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
		<script type="text/javascript" src="<?=STATIC_FILE_HOST?>static/js/cart.js"></script>

	</body>
</html>
