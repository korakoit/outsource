<?php $this->load->view('admin/block/header.php');?>

<?php $this->load->view('admin/block/nav_top.php');?>

<?php $this->load->view('admin/block/nav_bar.php');?>

<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>assets/css/select2_metro.css" />

<link>
<!-- BEGIN PAGE -->
<style type="text/css">
    .table th, .table td {
        border-top: 1px solid #ddd;
        line-height: 20px;
        padding: 8px;
        text-align: center;
        vertical-align:middle;
    }
</style>
<div class="page-content">

    <!-- BEGIN PAGE CONTAINER-->

    <div class="container-fluid">

        <!-- BEGIN PAGE HEADER-->

        <div class="row-fluid">


        </div>

        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->

        <div class="row-fluid">

            <div class="span12 booking-search">

                <form action="" method="get" class="form-horizontal">
                    <div class="clearfix margin_left_90">

                        <div class="control-group pull-left margin-right-20" style="margin-right:20px;">

                            <label class="control-label">所属国家:</label>

                            <div class="controls">
                                <select name="countryId" id="countryId" class="medium m-wrap" >
                                    <option value="-1">选择国家</option>
                                </select>
                            </div>

                        </div>

                        <div class="control-group pull-left margin-right-20"  style="margin-left:-20px;">

                            <label class="control-label">商品关键字:</label>

                            <div class="controls">

                                <input type="text" name="productKeyword" class="medium m-wrap" placeholder="键入商品关键字" >

                            </div>

                        </div>



                    </div>


                    <div class="clearfix margin-bottom-10">

                        <div class="pull-left margin-right-20" style="margin-right:20px;">

                            <button class="btn blue" type="submit">开始搜索</button>

                        </div>

                        <div class="pull-left margin-left-20" style="margin-right:20px;">

                            <a class="btn blue" href="/product/">清空条件</a>

                        </div>

                    </div>

                </form>
            </div>

            <!-- 开始分割线-->
            <ul class="nav nav-list">

                <li class="divider"></li>

            </ul>
            <!-- 结束分割线-->
            <form id="batch-form" name="batch-form" method="post" >
                <table class="table table-striped table-bordered table-hover" id="sample_1">

                    <thead>

                    <tr>
                        <th>序号</th>

                        <th class="hidden-480">商品编号</th>

                        <th class="hidden-480">商品名称</th>

                        <th class="hidden-480">完善状态</th>

                        <th class="hidden-480">商品状态</th>

                        <th class="hidden-480"></th>

                    </tr>

                    </thead>

                    <tbody>
                        <tr>
                            <td class="hidden-480"></td>
                            <td class="hidden-480"></td>
                            <td class="hidden-480"></td>
                            <td class="hidden-480"></td>
                            <td class="hidden-480"></td>
                            <td class="hidden-480"></td>
                        </tr>
                    </tbody>

                </table>
            </form>

            <?php if(isset($pagination)):?>
                <tfoot>
                <tr>
                    <td colspan="13" >
                        <div class="pagination pagination-centered" >
                            <?=$pagination?>
                        </div>
                    </td>
                </tr>
                </tfoot>
            <?php endif;?>

        </div>

    </div>

    <!-- END PAGE CONTAINER-->

</div>

<!-- END PAGE -->

<?php $this->load->view('admin/block/footer.php')?>
<!-- 弹窗相关 -->
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/select2.min.js"></script>
<script type="text/javascript">

    /**
     *@desc　批量上架列表
     */
    $("#batch-on-shelf").click(function(e){
        layer.confirm('确定批量上架？', {
            btn: ['确定','取消']
        }, function(){
            var form = document.getElementById("batch-form");
            form.action = base_url + '/Product/onBatchShelf/';
            form.submit();
            return;
        }, function(){

        });
    });

</script>
