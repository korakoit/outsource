<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('home/base/header_meta.php');?>
    <!-- <link rel="stylesheet" href="/.tmp/public/css/common.css"> -->
    <title><?=$title?></title>
    <link rel="stylesheet" href="<?=STATIC_FILE_HOST?>static/css/details.css?1">
</head>
<body>
<div class="wrapper">
    <?php $this->load->view('home/base/header.php');?>
    <?php $this->load->view('home/base/nav.php');?>
    <div class="center">
        <section class="detail">
            <div class="descimg">
                <div id="picBox" class="picBox">
                    <!--  <span id="prevTop" class="nav prev"></span>
                     <span id="nextTop" class="nav next"></span> -->
                    <ul class="cf">
                        <?php foreach($pic_list as $k => $v):?>
                            <li class="on">
                                <a href='<?=$v['link']?>'>
                                    <div class="img" style="background-size:contain;background-image:url(<?=$v['link']?>);"></div>
                                </a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div id="prev"></div>
                <div id="next"></div>
                <div id="listBox" class="listBox">
                    <ul class="ul1">
                        <?php foreach($pic_list as $k => $v):?>
                            <li><div style="background-image:url(<?=$v['link']?>);"></div></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
            <div class="descprice">
                <div class="main">
                    <input  type="hidden" id="pid" value="<?=$product['id']?>">
                    <h2><?=$product['name']?></h2>
                    <p class="title"><?=$product['title']?></p>
                    <span>You cost:</span>
                    <p class="eachprice"><span class="money"><?=$product['price']?></span><span>/each</span></p>
                    <div class="num">Quantity: <input type="button" id="numj" class="numj" value=""><input id="num" type="text" value="1" readonly="readonly"> <input  id="addnum" type="button" value=""></div>
                    <div class="tocart" id="tocart">Add to Chart</div>
                    <div class="beizhu">
                        <p class="p0">NEED help ? <a href="/about/contactus">contact us </a></p>
                        <div class="hr"></div>
                        <p class="p1">Call US At :  <?=$seller['business_phone']?> </br>MEIL US :  <?=$seller['email_address']?></p>
                    </div>
                    <?php if(!empty($product['brochure'])):?>
                        <div class="tocart" id="download"><a href="<?=$product['brochure']?>">Download Brochure</a></div>
                    <?php endif;?>
                </div>
            </div>
        </section>
        <!-- Product Details -->
        <section class="Productdecs subtitle">
            <div class="title"><span>Product Details</span><a>Back to Top</a></div>
            <?=$product['detail']?>
        </section>
        <!-- Similar products -->
        <section class="Similarpro subtitle">
            <div class="title"><span>Similar products</span><a>Back to Top</a></div>
            <div class="hotdeswrapper">
                <ul>
                    <?php foreach($similar_product as $key => $val):?>
                        <li>
                            <a href="/prodoct/details/<?=$val['id']?>" target="_black">
                                <div style="background-image:url(<?=$val['image']?>)"></div>
                                <p class="p0"><?=$val['name']?></p>
                                <p class="p1"><?=$val['price']?></p>
                                <p class="p2"><i></i><i></i><i></i><i></i></p>
                            </a>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <a class="pageprev aleft pageicon"></a>
            <a class="pagenext aright pageicon"></a>
        </section>
    </div>
    <?php $this->load->view('home/base/index_footer.php');?>
</div>
<?php $this->load->view('home/base/footer_script.php');?>
<script src="<?=STATIC_FILE_HOST?>static/commonJs/jqueryPhoto.js"></script>
<script src="<?=STATIC_FILE_HOST?>static/commonJs/Xslider.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>static/js/details.js"></script>
</body>
</html>