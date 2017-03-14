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

                            <span class="hidden-480">Category Manage</span>

                        </div>

                    </div>

                    <div class="portlet-body form">

                        <div class="tabbable portlet-tabs">

                            <ul class="nav nav-tabs">

                                <li><a href="javascript:void(0)" "></a></li>

                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane active" id="portlet_tab1">


                                    <div class="span12 booking-search">
                                        <div class="clearfix margin-bottom-10">

                                            <div class="pull-left margin-right-20" style="margin-right:20px;">

                                                <button class="btn green" onclick="beforeAddMainCategory()">Add Main Category</button>

                                            </div>

                                        </div>
                                    </div>

                                    <!-- 开始分割线-->
                                    <ul class="nav nav-list">

                                        <li class="divider"></li>

                                    </ul>

                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal" id="category_form" action="" novalidate="novalidate">

                                            <?php if(!empty($main_list)):?>
                                                <?php foreach ($main_list as $value):?>
                                                    <div class="control-group">
                                                        <label class="control-label"><?=$value['title']?><span class="required"></span></label>
                                                        <div class="controls">
                                                            <ul id="<?=$value['id']?>" class="unstyled inline sidebar-tags">
                                                                <?php if(!empty($value['sub'])):?>
                                                                    <?php foreach ($value['sub'] as $category):?>
                                                                        <li style="margin-top: 5px" id="<?=$category['id']?>">
                                                                            <a href="javascript:void(0)" onmouseover="$(this).find('i').show();"
                                                                               onmouseout="$(this).find('i').hide();">
                                                                                <?=$category['title']?>
                                                                                <i style="display: none" class="icon-remove" onclick="deleteSubCategory('<?=$category['id']?>')">
                                                                                </i>
                                                                            </a>
                                                                        </li>
                                                                    <?php endforeach;?>
                                                                <?php endif;?>
                                                                <li style="margin-top: 5px">
                                                                    <a href="javascript:void(0)">
                                                                        <i class="icon-add" onclick="beforeAddSubCategory(<?=$value['id']?>)">+</i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php endforeach;?>
                                            <?php endif;?>
                                    </form>
                                    <!-- END FORM-->

                                </div>
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

<div class="modal fade" id="main_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">Main Cateogry</h4>
            </div>
            <div class="modal-body">
                <div class="row-fluid">
                    <div class="span12">
                        <form class="form-horizontal" method="post" novalidate="novalidate">
                            <div class="control-group not_private_car">
                                <label class="control-label">Title<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" class="small m-wrap" data-required="1" id="title" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="main_btn" class="btn btn-primary" onclick="submitMainCategory()">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal -->
</div>





<div class="modal fade" id="sub_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">Main Cateogry</h4>
            </div>
            <div class="modal-body">
                <div class="row-fluid">
                    <div class="span12">
                        <form class="form-horizontal" method="post" novalidate="novalidate">
                            <input type="hidden" id="pid" />
                            <div class="control-group not_private_car">
                                <label class="control-label">Title<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" class="small m-wrap" data-required="1" id="subTitle" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="main_btn" class="btn btn-primary" onclick="submitSubCategory()">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal -->
</div>

<?php $this->load->view('admin/block/footer.php')?>
<script type="application/javascript">
    function beforeAddMainCategory(){
        $('#main_form').modal('show');
    }

    function submitMainCategory(){
        var title = $('#title').val();
        $.post('<?=base_url('admin/category/addMainCategory')?>',{title:title},function(data){
            if(data.err_code=='0000'){
                layer.msg('Save Success');
                window.location.href = '<?=base_url('admin/category/beforeEdit')?>';
            }else{
                layer.msg(data.err_msg);
            }
        });
    }

    function beforeAddSubCategory(pid){
        $('#pid').val(pid);
        $('#sub_form').modal('show');
    }

    function submitSubCategory(){
        var pid = $('#pid').val();
        var title = $('#subTitle').val();
        $.post('<?=base_url('admin/category/addSubCategory')?>',{title:title,pid:pid},function(data){
            if(data.err_code=='0000'){
                layer.msg('Save Success');
                window.location.href = '<?=base_url('admin/category/beforeEdit')?>';
            }else{
                layer.msg(data.err_msg);
            }
        });
    }

    function deleteSubCategory(id){
        layer.confirm('Confirm Delete？', {
            btn: ['Yes','No']
        }, function(index){
            $.post('<?=base_url('admin/category/deleteSubCategory')?>',
                {
                    'id' : id
                },
                function(data){
                    if(data.err_code=='0000'){
                        layer.msg('Delete Success');
                        window.location.href = '<?=base_url('admin/category/beforeEdit')?>';
                    }else{
                        layer.msg(data.err_msg);
                    }
                }
            );
            layer.close(index);
        }, function(){

        });
    }
</script>
