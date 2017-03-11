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

			 	<section class="showlist">
			 		<ul>
                        <?php if(count($product_lsit)>0):?>
                            <?php foreach($product_lsit as $key => $val):?>
                                <a href="/product/details/<?=$val['id']?>">
									<li>
										<div class="img" style="background-image:url(<?=$val['image']?>);"></div>
										<p class="tit"><?=$val['name']?></p>
										<p class="subtit"><?=$val['title']?></p>
									</li>
								</a>
                            <?php endforeach;?>
                        <?php else:?>

                                NO DATA！

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