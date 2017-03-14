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
                                <li class="active"><a href="" onclick="window.location.href='<?=base_url('admin/home/homeList')?>';"  data-toggle="tab">Home Product</a></li>
                                <li><a href="" onclick="window.location.href='<?=base_url('admin/home/recommendList')?>';" data-toggle="tab">Recommend Product</a></li>
                                <li><a href="" onclick="window.location.href='<?=base_url('admin/home/sixList')?>';" data-toggle="tab">Six Product</a></li>
                                <li><a href="" onclick="window.location.href='<?=base_url('admin/home/bannerList')?>';" data-toggle="tab">Banner</a></li>


                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane active" id="Home">

                                    <div class="span12 booking-search">
                                        <div class="clearfix margin-bottom-10">

                                            <div class="pull-left margin-right-20" style="margin-right:20px;">

                                                <a class="btn green" onclick="$('#home_form').modal('show');">Add</a>

                                            </div>

                                        </div>
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
                                                            <a class="btn red" onclick="deleteHome('<?=$value['id']?>')">Delete</a>
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
                                <div class="tab-pane" id="six_product"></div>
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

<div class="modal fade" id="home_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">Home Product</h4>
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
                <button type="button" id="main_btn" class="btn btn-primary" onclick="addHome()">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal -->
</div>


<?php $this->load->view('admin/block/footer.php')?>
<script type="application/javascript">

    function addHome() {
        var pcode = $('#pcode').val();
        $.post("<?=base_url('admin/home/addHome')?>",{pcode:pcode},function(data){
            if (data.err_code=='0000'){
                layer.msg('Save Success');
                window.location.reload();
            }else{
                layer.msg(data.err_msg);
            }

        });
    }

    function deleteHome(product_id) {

        layer.confirm('Confirm Delete？', {
            btn: ['Yes','No']
        }, function(index){
            $.post("<?=base_url('admin/home/deleteHome')?>",{product_id:product_id},function(data){
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
