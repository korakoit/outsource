<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
    <?php $this->load->view('home/base/header_meta.php');?>
    <link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>static/css/home/aboutus.css">
</head>
<body>
    <div class="wrapper">
        <?php $this->load->view('home/base/header.php');?>
        <section class="navmap" id="navmap">
            <div class="center">
                <a href="/">Homepage</a><span>&gt;</span><a class="active">About Us</a>
            </div>
        </section>
        <!-- bg -->
        <div class="banner_top"><a><span>About Us</span></a></div>
        <section class="text">
            <div class="center">
                <h2>How Did We Get Here?</h2>
                <p>GLEAD is a FULLY AUTHORIZED Food Service Equipment and Supplies Dealer that represents all major brands of commercial kitchen equipment. Since our inception in 2003, we focused on quality products and upscale projects. Our projects division is responsible for some of the largest food service projects throughout the world including Hotels, Restaurants and Institutions. </p>
                <p>We are loyal to our customers as well as our employees. Our average sales professional has been with us for over 5 years. This accounts for the fact that they are some of the most knowledgeable in the Restaurant Equipment industry. We continue to strive for value added service while maintaining the lowest prices in the industry. The bottom line is that we would like you to be pleased with your purchase today and for years to come... </p>
            </div>
            
        </section>
        <section class="imgmap">
            <div class="center">
                <div class="desc">
                    <h3>Our Warehouse Locations </h3>
                    <p>Our continuous growth and expansion is made possible by our 5 warehouse locations in Georgia, Kentucky, Maryland, Pennsylvania and Nevada. We work hard to continually provide our customers with the best service possible to make sure each order is a success. For more details about shipping from each of our warehouse locations check out the Ground and Common Carrier estimated shipping times to your area.</p>
                </div>
                <div class="map"></div>
            </div>
        </section>
        <section class="shangbiao">
            <div class="center"><img src="/static/images/about.png" width="1000" height="197"></div>
        </section>
        <?php $this->load->view('home/base/index_footer.php');?>
    </div>
    <div id="navinfo" data-info="0"></div>
    <script type="text/javascript" src="<?=STATIC_FILE_HOST?>static/commonJs/jquery.min.js"></script>
    <?php $this->load->view('home/base/footer_script.php');?>
        <script type="text/javascript"   src="<?=STATIC_FILE_HOST?>static/commonJs/jquery.lazyload.min.js"></script>
    <script type="text/javascript">
    $(function(){
        $('img').lazyload({
            effect:'fadeIn',
            threshold:200
        });
    });
    </script>
</body>
</html>