<!--底部header  begin -->
<header class="index_header">
  <section class="top0">
    <div class="center">
      <div class="left"></div>
      <div class="rightul">
        <ul>
          <li>
            <a href="/about/contactus"><span>chat now</span></a>
          </li>
          <li class="li2">
            <a href="/login/register"><span>register</span></a>
          </li>
          <li class="li3">
            <a href="/login"><span>login</span></a>
          </li>
          <!--<li class="li4">
            <a href="/product/download"><span>brochure</span></a>
          </li>-->
          <li class="li5"><a href="/cart"><span style="width:20px;height:20px;"></span></a></li>
          <li class="li6"><a href="/search"><span style="width:20px;height:20px;"></span></a></li>
        </ul>
      </div>
    </div>
  </section>
  <section class="top1">
    <div class="center">
      <div><a style="display:block;height:100%;" href="/"></a></div>
      <ul>
        <?php foreach($category as $key => $val):?>
          <li><a href="/product/category/<?=$val['id']?>/0/"><span style="width:72px;"><?=$val['title']?></span></a></li>
        <?php endforeach;?>
      </ul>
    </div>
  </section>
</header>
<!-- header  end -->