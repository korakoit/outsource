<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta content="yes" name="apple-mobile-web-app-capable" />
	<meta content="yes" name="apple-touch-fullscreen" />
	<meta name="full-screen" content="yes">
	<meta name="x5-fullscreen" content="true" />
	<meta name="screen-orientation" content="portrait">
	<meta name="x5-orientation" content="portrait">
	<meta content="telephone=no,email=no" name="format-detection" />
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="http://www.cattour.cn/app/styles/common.css?v=1.0">
	<link rel="stylesheet" href="http://www.cattour.cn/app/styles/pro_detail_com.css">
	<link rel="stylesheet" href="http://www.cattour.cn/app/styles/product_detail.css">
	<script type="text/javascript" src="http://www.cattour.cn/vendor/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="http://www.cattour.cn/app/scripts/jquery_md5.js"></script>
	<script type="text/javascript" src="http://www.cattour.cn/app/scripts/pro_detail_com.js?v=1.2"></script>
	<title>商品详情预览</title>
</head>
<body>
<header data-page="product" class="">

</header>
<body class="pro_detail_com">
<section class="container">
	<section class="white_bg padding20 item margin_bottom">
		<div class="title flex" href="">
			<div class="flex_item">产品亮点</div>
		</div>
		<!--产品亮点-->
		<div class="hightlight">
			<?=$desc['travel_highlights']['html']?>
		</div>
	</section>
	<?php foreach($desc['desc_list'] as $key => $val):?>
	<section class="white_bg item expand up icon3">
		<a class="title flex" href="javascript:void(0)">
			<div class="flex_item"><?=$val['name']?></div>
			<div class="right"></div>
		</a>

		<?=$val['html']?>

	</section>
	<?php endforeach;?>
</section>
</body>
<footer>

</footer>
</body>
</html>
