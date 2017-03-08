<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('home/base/header_meta.php');?>
    <!-- <link rel="stylesheet" href="/.tmp/public/css/common.css"> -->
    <title>商品详情</title>
    <link rel="stylesheet" href="<?=STATIC_FILE_HOST?>static/css/details.css?1">
</head>
<body>
    <div class="wrapper">
        <?php $this->load->view('home/base/header.php');?>
        <?php $this->load->view('home/base/nav.php');?>
        <div class="center">
            <section class="detail">
                <div class="descimg">
                    <div class="img" style="background-image:url(/static/images/index2.png);"></div>
                    <div id="prev"></div>
                    <div id="next"></div>
                    <ul>
                        <li><div style="background-image:url(/static/images/index2.png);"></div></li>
                        <li><div style="background-image:url(/static/images/index2.png);"></div></li>
                        <li><div style="background-image:url(/static/images/index2.png);"></div></li>
                        <li><div style="background-image:url(/static/images/index2.png);"></div></li>
                        <li><div style="background-image:url(/static/images/index2.png);"></div></li>
                    </ul>
                </div>
                <div class="descprice">
                    <div class="main">
                        <h2>Since company was established  committed to recommend the most</h2>
                        <p class="title">Ff the digital textile technology, we will give the most,We  ho</p>
                        <span>You cost:</span>
                        <p class="eachprice"><span class="money">$1000</span><span>/each</span></p>
                        <div class="num">Quantity: <input type="text" value="1"> <input type="button" value="+"></div>
                        <div class="tocart" id="tocart">Add to Chart</div>
                        <div class="beizhu">
                            <p class="p0">NEED help ? contact us </p>
                            <div class="hr"></div>
                            <p class="p1">Call US At :  (800)215-9293 </br>MEIL US :  glead61888@vip.163.com</p>
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- Product Details -->
            <section class="Productdecs subtitle">
                <div class="title"><span>Product Details</span><a>Back to Top</a></div>
                <p class="po">This Dormont BRWMAX-S2S-PMPH is available from Central Restaurant Products.</p>
                <p>Replacement filter pack with phosphate scale control for the Brew Max-S2 filtration system that includes two 10-inch Slimline replacement filters. The first filter is a high-end coconut shell carbon block for reducing lead, cysts, VOCs, sand, silt, sediment, rust, chlorine taste and odor. The second is a 16-ounce phosphate filter for scale and lime control.</p>
                <h4>Features Include:</h4>
                <ul>
                    <li>1</li>
                    <li>000 Gallon capacity</li>
                    <li>Reduces lead</li>
                    <li>cysts</li>
                    <li>VO</li>
                    <li>1</li>
                    <li>000 Gallon capacity</li>
                    <li>Reduces lead</li>
                    <li>cysts</li>
                    <li>VO</li>

                </ul>
            </section>
            <!-- Similar products -->
            <section class="Similarpro subtitle">
                <div class="title"><span>Similar products</span><a>Back to Top</a></div>
                <div class="hotdeswrapper">
                  <ul>
                    <li>
                      <a href="#" target="_black">
                        <div style="background-image:url(/static/images/index1.png)"></div>
                        <p class="p0">Restaurant Food  Storage Baking  Smallwares Beverage  Supplies</p>
                        <p class="p1">$600</p>
                        <p class="p2"><i></i><i></i><i></i><i></i></p>
                      </a>
                    </li>
                    <li>
                      <a href="#" target="_black">
                        <div style="background-image:url(/static/images/index1.png)"></div>
                        <p class="p0">Restaurant Food  Storage Baking  Smallwares Beverage  Supplies</p>
                        <p class="p1">$600</p>
                        <p class="p2"><i></i><i></i><i></i><i></i></p>
                      </a>
                    </li>
                    <li>
                      <a href="#" target="_black">
                        <div style="background-image:url(/static/images/index1.png)"></div>
                        <p class="p0">Restaurant Food  Storage Baking  Smallwares Beverage  Supplies</p>
                        <p class="p1">$600</p>
                        <p class="p2"><i></i><i></i><i></i><i></i></p>
                      </a>
                    </li>
                    <li>
                      <a href="#" target="_black">
                        <div style="background-image:url(/static/images/index1.png)"></div>
                        <p class="p0">Restaurant Food  Storage Baking  Smallwares Beverage  Supplies</p>
                        <p class="p1">$600</p>
                        <p class="p2"><i></i><i></i><i></i><i></i></p>
                      </a>
                    </li>
                    <li>
                      <a href="#" target="_black">
                        <div style="background-image:url(/static/images/index1.png)"></div>
                        <p class="p0">Restaurant Food  Storage Baking  Smallwares Beverage  Supplies</p>
                        <p class="p1">$600</p>
                        <p class="p2"><i></i><i></i><i></i><i></i></p>
                      </a>
                    </li>
                    <li>
                      <a href="#" target="_black">
                        <div style="background-image:url(/static/images/index1.png)"></div>
                        <p class="p0">Restaurant Food  Storage Baking  Smallwares Beverage  Supplies</p>
                        <p class="p1">$600</p>
                        <p class="p2"><i></i><i></i><i></i><i></i></p>
                      </a>
                    </li>
                  </ul>
                </div>
                <a class="pageprev aleft pageicon"></a>
                <a class="pagenext aright pageicon"></a>
            </section>
        </div>
        <?php $this->load->view('home/base/index_footer.php');?>
    </div>
</body>
</html>