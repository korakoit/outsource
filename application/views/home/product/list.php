<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('home/base/header_meta.php');?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>目的地</title>
	<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>static/css/list.css">
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('home/base/header.php');?>
		<?php $this->load->view('home/base/nav.php');?>
		<div class="center">
			<!-- left -->
			 <section class="left" id="leftlist">
				 <?php foreach($category as $k => $v):?>
                    <div class="list">
                        <div class="title first <?php if($v['id']==$pid):?>show<?php endif;?>"><i></i><?=$v['title']?></div>
                        <ul>
                            <?php if(isset($v['son'])):?>
                                <?php foreach($v['son'] as $key => $val):?>
                                <li <?php if($val['id']==$id):?>class='show'<?php endif; ?> id="<?=$val['id']?>"><a href="/product/category/<?=$v['id']?>/<?=$val['id']?>/"><?=$val['title']?></a></li>
                                <?php endforeach;?>
                            <?php endif;?>
                        </ul>
                    </div>
                <?php endforeach;?>
			 </section>
			 <!-- right -->
			 <section class="right">
			 	<section class="banner"></section>
			 	<section class="twolist">
			 		<ul>
			 			<li>
			 				<div class="l" style="background-image:url(/static/images/list0.png);"></div>
			 				<div class="r">
			 					<p class="p0">Markless Fashion  Down Jacket Mens   Brand Men's  Markless Fash</p>
			 					<p class="p1">Men's Brand Men's  Commercial Ranges</p>
			 				</div>
			 				<div class="hr"></div>
			 			</li>
			 			<li>
			 				<div class="l" style="background-image:url(/static/images/list0.png);"></div>
			 				<div class="r">
			 					<p class="p0">Markless Fashion  Down Jacket Mens   Brand Men's  Markless Fash</p>
			 					<p class="p1">Men's Brand Men's  Commercial Ranges</p>
			 				</div>
			 			</li>
			 		</ul>
			 	</section>
			 	<section class="showlist">
			 		<ul>
                        <?php if(count($product_lsit)>0):?>
                            <?php foreach($product_lsit as $key => $val):?>
                                <li>
                                    <div class="img" style="background-image:url(<?=$val['image']?>);"></div>
                                    <p class="tit"><?=$val['name']?></p>
                                    <p class="subtit"><?=$val['title']?></p>
                                </li>
                            <?php endforeach;?>
                        <?php else:?>

                                没有数据！

                        <?php endif;?>
			 		</ul>
			 	</section>
                    <input type="hidden" id="page_num" val="<?=$totle?>">
			 		<div id="page" class="pager"></div>
			 </section>
		</div>
		<!-- footer -->
		<?php $this->load->view('home/base/index_footer.php');?>
	</div>
		<?php $this->load->view('home/base/footer_script.php');?>
		<script src="<?=STATIC_FILE_HOST?>static/commonJs/laypage/laypage.js"></script>
		<script type="text/javascript" src="<?=STATIC_FILE_HOST?>static/js/prod_list.js"></script>
</body>
</html>