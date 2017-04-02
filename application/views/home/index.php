<!DOCTYPE html>
<html>
  <head>
    <?php $this->load->view('home/base/header_meta.php');?>
    <title>index</title>
    <link rel="stylesheet" href="<?=STATIC_FILE_HOST?>static/css/index.css">
  </head>
  <body>
    <div class="wrapper">
      <?php $this->load->view('home/base/header.php');?>
      <!--导航 -->
      <section class="banner">
        <div class="ck-slide">
          <!-- 轮播项目 -->
          <div class="ck-slide-wrapper">
            <?php if(!empty($banner)):?>
                <?php foreach($banner as $k => $v):?>
                  <a class="item" href="/product/details/<?=$v['product_id']?>" style='background-image: url("<?=$v['image']?>")'></a>
                <?php endforeach;?>
            <?php endif;?>
          </div>
          <!-- 轮播指标 -->
          <div class="ck-slidebox">
            <span class="current"></span>
            <span></span>
            <span></span>
          </div> 
          <!-- 轮播导航 -->
          <!-- <a class="left left-right"  data-slide="prev"></a>
          <a class="right left-right" data-slide="next"></a> -->
        </div>
      </section>
      <!--展示 -->
      <section class="showgoods center">
        <h3>Commercial Restaurant Supplies & Equipment from WebstaurantStor</h3>
        <ul class="ul0">
          <?php if(!empty($six_product)):?>
            <?php foreach($six_product as $key => $val):?>
                  <li><a href="/product/details/<?=$val['id']?>"><img src="<?=$val['image']?>" width="325" height="225"></a></li>
            <?php endforeach;?>
          <?php endif;?>
        </ul>
      </section>
      <!--轮播 -->
      <section class="showgoods center slider">
        <h3>Recommended Products</h3>
        <div class=" hotdeswrapper">
        <div class="scrollcontainer">
          <ul>
           <?php if(!empty($recommend_product)):?>
              <?php foreach($recommend_product as $key => $val):?>
                <li>
                  <a href="/product/details/<?=$val['product_id']?>" target="_blank">
                    <div style="background-image:url('<?=$val['image']?>')"></div>
                    <p class="p0"><?=$val['name']?></p>
                    <p class="p1"><?=$val['price']?></p>
                    <p class="p2"><i></i><i></i><i></i><i></i></p>
                  </a>
                </li>
               <?php endforeach;?>
           <?php endif;?>
          </ul>
          </div>
          <a class="pageprev aleft pageicon"></a>
          <a class="pagenext aright pageicon"></a>
        </div>
        <!-- <a class="pageprev aleft pageicon"></a>
        <a class="pagenext aright pageicon"></a> -->
      </section>
      <section class="showtext center">
        <ul>
         <?php if(!empty($six_product)):?>
         <?php foreach($six_product as $key => $val):?>
            <li>
                 <div class="img" style="background-image:url('<?=$val['image']?>')"></div>
                 <h2><?=$val['name']?></h2>
                 <p><?=$val['title']?></p>
                 <div class="hr"></div>
            </li>
         <?php endforeach;?>
         <?php endif;?>
        </ul>
      </section>
        <?php $this->load->view('home/base/index_footer.php');?>
    </div>
    <?php $this->load->view('home/base/footer_script.php');?>
    <script src="<?=STATIC_FILE_HOST?>static/commonJs/slide.js"></script>
      <script src="<?=STATIC_FILE_HOST?>static/commonJs/Xslider.js"></script>
      <script type="text/javascript" src="<?=STATIC_FILE_HOST?>static/js/index.js"></script>
  </body>
</html>