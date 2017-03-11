<?php $this->load->view('admin/block/header.php');?>

<?php $this->load->view('admin/block/nav_top.php');?>

<?php $this->load->view('admin/block/nav_bar.php');?>


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


            <div class="span12">
                <div class="portlet box blue tabbable">

                    <div class="portlet-title">

                        <div class="caption">

                            <i class="icon-reorder"></i>

                            <span class="hidden-480">Home Page</span>

                        </div>

                    </div>

                    <div class="portlet-body form">

                        <div class="tabbable portlet-tabs">

                            <ul class="nav nav-tabs">

                                <li><a href="" onclick="window.location.href='<?=base_url('admin/home/friendLinkList')?>';"  data-toggle="tab">Friend Link</a></li>
                                <li><a href="#home_product" onclick="window.location.href='<?=base_url('admin/home/homeProductList')?>';"  data-toggle="tab">Home Product</a></li>
                                <li class="active" ><a href="" onclick="window.location.href='<?=base_url('admin/home/recommendList')?>';" data-toggle="tab">Recommend Product</a></li>
                                <li><a href="#six_product" onclick="window.location.href='<?=base_url('admin/home/sixProductList')?>';" data-toggle="tab">Six Product</a></li>
                                <li><a href="" onclick="window.location.href='<?=base_url('admin/home/bannerList')?>';" data-toggle="tab">Banner</a></li>

                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane" id="banner">
                                </div>
                                <div class="tab-pane active" id="six_product">
                                    <div class="span12 booking-search">
                                        <div class="clearfix margin-bottom-10">

                                            <div class="pull-left margin-right-20" style="margin-right:20px;">

                                                <button class="btn green" onclick="$('#recommend_form').modal('show');">Add</button>

                                            </div>

                                        </div>
                                    </div>

                                    <!-- 开始分割线-->
                                    <ul class="nav nav-list">

                                        <li class="divider"></li>

                                    </ul>
                                    <!-- 结束分割线-->
                                    <form id="batch-form" name="batch-form" method="post"  >
                                        <table class="table table-striped table-bordered table-hover" id="sample_1">

                                            <thead>

                                            <tr>
                                                <th class="hidden-480">Number</th>

                                                <th class="hidden-480">Image</th>

                                                <th class="hidden-480">Name</th>

                                                <th class="hidden-480">Code</th>

                                                <th class="hidden-480">Operation</th>

                                            </tr>

                                            </thead>

                                            <tbody>
                                            <?php if (isset($result)):?>
                                                <?php foreach ($result as $key=>$value):?>
                                                    <tr>
                                                        <td class="hidden-480"><?=($key+1)?></td>
                                                        <td class="hidden-480"><img src="<?=IMAGE_HOST.$value['image']?>" style="width:30px;height: 30px"/></td>
                                                        <td class="hidden-480"><?=$value['name']?></td>
                                                        <td class="hidden-480"><?=$value['pcode']?></td>
                                                        <td class="hidden-480">
                                                            <a class="btn red" onclick="deleteRecommend('<?=$value['id']?>')">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach;?>
                                            <?php else:?>
                                                <tr><td colspan="15">No Data</td></tr>
                                            <?php endif;?>

                                            </tbody>

                                        </table>
                                    </form>
                                </div>
                                <div class="tab-pane" id="recommend_product"></div>
                                <div class="tab-pane" id="home_product"></div>
                                <div class="tab-pane" id="friend_link"></div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            <!-- 结束分割线-->

        </div>

    </div>

    <!-- END PAGE CONTAINER-->

</div>

<!-- END PAGE -->

<div class="modal fade" id="recommend_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">Add Banner</h4>
            </div>
            <div class="modal-body">
                <div class="row-fluid">
                    <div class="span12">
                        <form class="form-horizontal" method="post" novalidate="novalidate">
                            <div class="control-group not_private_car">
                                <label class="control-label">Pcode<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" class="small m-wrap" data-required="1" id="pcode" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="main_btn" class="btn btn-primary" onclick="addRecommend()">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal -->
</div>


<?php $this->load->view('admin/block/footer.php')?>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.form.js"></script>
<script type="application/javascript">

    function addRecommend() {
        var pcode = $('#pcode').val();
        $.post("<?=base_url('admin/home/addRecommend')?>",{pcode:pcode},function(data){
            if (data.err_code=='0000'){
                layer.msg('Save Success');
                window.location.reload();
            }else{
                layer.msg(data.err_msg);
            }

        });
    }

    function deleteRecommend(id) {

        layer.confirm('Confirm Delete？', {
            btn: ['Yes','No']
        }, function(index){
            $.post("<?=base_url('admin/home/deleteRecommend')?>",{product_id:id},function(data){
                if (data.err_code=='0000'){
                    layer.msg('Delete Success');
                    window.location.reload();
                }else{
                    layer.msg(data.err_msg);
                }

            });
            layer.close(index);
        }, function(){

        });


    }
</script>
