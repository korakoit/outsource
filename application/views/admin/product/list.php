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

                <form action="<?=base_url('admin/product/list')?>" method="get" class="form-horizontal">
                    <div class="clearfix margin_left_90">

                        <div class="control-group pull-left margin-right-20" style="margin-right:20px;">

                            <label class="control-label">Category:</label>

                            <div class="controls">
                                <select name="countryId" id="countryId" class="medium m-wrap" >
                                    <option value="">Select Category</option>
                                    <?php foreach ($category_list as $key=>$value):?>
                                        <option value="<?=$key?>"
                                            <?=isset($search['category_id'])&&$search['category_id']==$key?" selected":""?>
                                        ><?=$value?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                        </div>

                        <div class="control-group pull-left margin-right-20"  style="margin-left:-20px;">

                            <label class="control-label">Name:</label>

                            <div class="controls">

                                <input type="text" name="name" class="medium m-wrap" placeholder="Input Name"value="<?=isset($search['name'])?$search['name']:''?>">

                            </div>

                        </div>

                        <div class="control-group pull-left margin-right-20"  style="margin-left:-20px;">

                            <label class="control-label">Code:</label>

                            <div class="controls">

                                <input type="text" name="pcode" class="medium m-wrap" placeholder="Input Code" value="<?=isset($search['pcode'])?$search['pcode']:''?>">

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
                            <th class="hidden-480">Number</th>

                            <th class="hidden-480">Image</th>

                            <th class="hidden-480">Name</th>

                            <th class="hidden-480">Code</th>

                            <th class="hidden-480">Status</th>

                            <th class="hidden-480">Storage</th>

                            <th class="hidden-480">Operation</th>

                        </tr>

                    </thead>

                    <tbody>
                    <?php if (isset($result)):?>
                    <?php foreach ($result as $key=>$value):?>
                            <tr>
                                <td class="hidden-480"><?=($key+1)?></td>
                                <td class="hidden-480"><img src="<?=$value['image']?>"/></td>
                                <td class="hidden-480"><?=value['name']?></td>
                                <td class="hidden-480"><?=$value['pcode']?></td>
                                <td class="hidden-480"><?=$value['status']==1?'On Shelf':'Down Shelf'?></td>
                                <td class="hidden-480"><?=$value['storage']?></td>
                                <td class="hidden-480">
                                    <a class="btn blue" href="<?=base_url('admin/product/edit?product_id='.$value['id'])?>">Edit</a>
                                    <?php if($value['status']==STATUS_ON_SHELF):?>
                                        <a class="btn blue" href="<?=base_url('admin/product/downShelf?product_id='.$value['id'])?>">Down Shelf</a>
                                    <?php else:?>
                                        <a class="btn blue" href="<?=base_url('admin/product/onShelf?product_id='.$value['id'])?>">On Shelf</a>
                                    <?php endif;?>
                                </td>
                            </tr>
                    <?php endforeach;?>
                    <?php else:?>
                        <tr><td colspan="15">No Data</td></tr>
                    <?php endif;?>

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