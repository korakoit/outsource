<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>

<!-- BEGIN PAGE -->

<div class="page-content">

    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

    <div id="portlet-config" class="modal hide">

        <div class="modal-header">

            <button data-dismiss="modal" class="close" type="button"></button>

            <h3>portlet Settings</h3>

        </div>

        <div class="modal-body">

            <p>Here will be a configuration form</p>

        </div>

    </div>

    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

    <!-- BEGIN PAGE CONTAINER-->

    <div class="container-fluid">

        <!-- BEGIN PAGE HEADER-->

        <div class="row-fluid">

            <div class="span12">

                <?php $this->load->view('block/style_bar.php');?>

               <!-- BEGIN PAGE TITLE & BREADCRUMB-->

                        <h3 class="page-title">

                            商品管理 <small>商品列表</small>

                        </h3>

                        <ul class="breadcrumb">

                            <li>

                                <i class="icon-home"></i>

                                <a href="#">首页</a>

                                <i class="icon-angle-right"></i>

                            </li>

                            <li>

                                <a href="#">商品管理</a>

                                <i class="icon-angle-right"></i>

                            </li>

                            <li><a href="#">商品列表</a></li>

                         </ul>
               <!-- END PAGE TITLE & BREADCRUMB -->

            </div>

        </div>

        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->

        <div class="row-fluid">

            <div class="span12">
                <form action="" method="get">
                    <!-- 条件1 -->
                    <div style="margin-bottom:10px;margin-left:0px" class="row">
                        <div class="col-sm-1">
                            <label class="form-label">所属国家 :</label>
                        </div>
                        <div class="col-sm-2">
                            <select class="filter-status form-control" name="countryId" id="countryId">
                                <option value="-1">选择国家</option>
                                <option value="1">泰国</option>
                                <option value="2">马来西亚</option>
                                <option value="5">新西兰</option>
                                <option value="6">毛里求斯</option>
                                <option value="7">中国</option>
                                <option value="17">俄罗斯</option>
                                <option value="25">阿拉伯</option>
                                <option value="26">澳大利亚</option>
                                <option value="39">希腊</option>
                                <option value="40">巴勒斯坦</option>
                            </select>
                        </div>
                        <!-- 异步获取城市 -->
                        <div class="col-sm-1">
                            <label class="form-label">所属城市 :</label>
                        </div>
                        <div class="col-sm-2">
                            <select class="filter-status form-control" id="cityId" name="cityId">
                                <option value="-1">选择城市</option>

                                <option value="1">普吉</option>

                                <option value="7">曼谷</option>

                                <option value="19">芭提雅</option>

                                <option value="20">清迈</option>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <label class="form-label">所属分类 :</label>
                        </div>
                        <div class="col-sm-2">
                            <select class="filter-status form-control" name="categoryId">
                                <option value="-1">选择分类</option>

                                <option value="1">一日游</option>

                                <option value="4">接送机</option>

                                <option value="5">多日游</option>

                                <option value="6">半日游</option>

                                <option value="7">两日游</option>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <label class="form-label">商品状态 :</label>
                        </div>
                        <div class="col-sm-2">
                            <select class="filter-status form-control" name="productStatus">
                                <option selected="" value="-1">选择状态</option>
                                <option value="0">


                                    A PHP Error was encountered

                                    Severity: Notice
                                    Message:  Array to string conversion
                                    Filename: product/index.php
                                    Line Number: 64


                                    Backtrace:







                                    File: /data/vhost/supplier.lanmao.cn/application/views/product/index.php
                                    Line: 64
                                    Function: _error_handler









                                    File: /data/vhost/supplier.lanmao.cn/application/controllers/Product.php
                                    Line: 175
                                    Function: view









                                    File: /data/vhost/supplier.lanmao.cn/index.php
                                    Line: 293
                                    Function: require_once




                                    Array</option>
                                <option value="1">


                                    A PHP Error was encountered

                                    Severity: Notice
                                    Message:  Array to string conversion
                                    Filename: product/index.php
                                    Line Number: 64


                                    Backtrace:







                                    File: /data/vhost/supplier.lanmao.cn/application/views/product/index.php
                                    Line: 64
                                    Function: _error_handler









                                    File: /data/vhost/supplier.lanmao.cn/application/controllers/Product.php
                                    Line: 175
                                    Function: view









                                    File: /data/vhost/supplier.lanmao.cn/index.php
                                    Line: 293
                                    Function: require_once




                                    Array</option>
                                <option value="2">


                                    A PHP Error was encountered

                                    Severity: Notice
                                    Message:  Array to string conversion
                                    Filename: product/index.php
                                    Line Number: 64


                                    Backtrace:







                                    File: /data/vhost/supplier.lanmao.cn/application/views/product/index.php
                                    Line: 64
                                    Function: _error_handler









                                    File: /data/vhost/supplier.lanmao.cn/application/controllers/Product.php
                                    Line: 175
                                    Function: view









                                    File: /data/vhost/supplier.lanmao.cn/index.php
                                    Line: 293
                                    Function: require_once




                                    Array</option>
                                <option value="3">


                                    A PHP Error was encountered

                                    Severity: Notice
                                    Message:  Array to string conversion
                                    Filename: product/index.php
                                    Line Number: 64


                                    Backtrace:







                                    File: /data/vhost/supplier.lanmao.cn/application/views/product/index.php
                                    Line: 64
                                    Function: _error_handler









                                    File: /data/vhost/supplier.lanmao.cn/application/controllers/Product.php
                                    Line: 175
                                    Function: view









                                    File: /data/vhost/supplier.lanmao.cn/index.php
                                    Line: 293
                                    Function: require_once




                                    Array</option>
                                <option value="4">


                                    A PHP Error was encountered

                                    Severity: Notice
                                    Message:  Array to string conversion
                                    Filename: product/index.php
                                    Line Number: 64


                                    Backtrace:







                                    File: /data/vhost/supplier.lanmao.cn/application/views/product/index.php
                                    Line: 64
                                    Function: _error_handler









                                    File: /data/vhost/supplier.lanmao.cn/application/controllers/Product.php
                                    Line: 175
                                    Function: view









                                    File: /data/vhost/supplier.lanmao.cn/index.php
                                    Line: 293
                                    Function: require_once




                                    Array</option>
                                <option value="5">


                                    A PHP Error was encountered

                                    Severity: Notice
                                    Message:  Array to string conversion
                                    Filename: product/index.php
                                    Line Number: 64


                                    Backtrace:







                                    File: /data/vhost/supplier.lanmao.cn/application/views/product/index.php
                                    Line: 64
                                    Function: _error_handler









                                    File: /data/vhost/supplier.lanmao.cn/application/controllers/Product.php
                                    Line: 175
                                    Function: view









                                    File: /data/vhost/supplier.lanmao.cn/index.php
                                    Line: 293
                                    Function: require_once




                                    Array</option>
                                <option value="6">


                                    A PHP Error was encountered

                                    Severity: Notice
                                    Message:  Array to string conversion
                                    Filename: product/index.php
                                    Line Number: 64


                                    Backtrace:







                                    File: /data/vhost/supplier.lanmao.cn/application/views/product/index.php
                                    Line: 64
                                    Function: _error_handler









                                    File: /data/vhost/supplier.lanmao.cn/application/controllers/Product.php
                                    Line: 175
                                    Function: view









                                    File: /data/vhost/supplier.lanmao.cn/index.php
                                    Line: 293
                                    Function: require_once




                                    Array</option>
                            </select>
                        </div>

                    </div>
                    <!-- 条件2 -->
                    <div style="margin-bottom: 10px;margin-left:0px" class="row">
                        <div class="col-sm-1">
                            <label class="form-label">商品编号:</label>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="productNum" class="form-control" value="" placeholder="">
                        </div>

                        <div class="col-sm-1">
                            <label class="form-label">商品名称关键词 :</label>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="productKeyword" class="form-control" value="" placeholder="">
                        </div>
                        <div class="col-sm-2">
                            <a href="http://192.168.1.5:8092/product/index" class="btn btn-info">清空条件</a>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;margin-left:0px" class="row">
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-info">开始搜索</button>

                        </div>
                        <div class="col-sm-1">
                            <a href="http://192.168.1.5:8092/product/add" class="btn btn-info">新增商品</a>
                        </div>
                    </div>
                </form>

            </div>

        </div>

        <!-- END PAGE -->

     </div>

    <!-- END PAGE CONTAINER-->

</div>

<!-- END PAGE -->

<?php $this->load->view('block/footer.php')?>

<!--全选-->
<script type="text/javascript">
    jQuery('#sample_1 .group-checkable').change(function () {
        var set = jQuery(this).attr("data-set");
        var checked = jQuery(this).is(":checked");
        jQuery(set).each(function () {
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });
        jQuery.uniform.update(set);
    });
</script>