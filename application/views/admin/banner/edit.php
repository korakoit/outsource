<?php $this->load->view('admin/block/header.php'); ?>

<?php $this->load->view('admin/block/nav_top.php'); ?>

<?php $this->load->view('admin/block/nav_bar.php'); ?>


<!-- BEGIN PAGE -->
<style type="text/css">
    .table th, .table td {
        border-top: 1px solid #ddd;
        line-height: 20px;
        padding: 8px;
        text-align: center;
        vertical-align: middle;
    }
</style>

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

                <!--                --><?php //$this->load->view('block/style_bar.php'); ?>

                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <!--                --><?php //$this->load->view('block/bread_crumb.php'); ?>
                <!-- END PAGE TITLE & BREADCRUMB -->

            </div>

        </div>

        <!-- END PAGE HEADER-->

        <div class="page-content" id="content">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN BREADCRUMB-->
                        <ul class="breadcrumb" style="margin-top:10px;">
                            <li>
                                <a href="<?= base_url("product/index") ?>">Banner</a>
                                <i class="icon-angle-right"></i>
                            </li>
                        </ul>
                        <!-- END BREADCRUMB -->
                    </div>
                </div>
                <form class="form-horizontal" method="post" id="data_form" action="<?=$action?>">
                    <h3 class="form-section">Product Info</h3>
                    <div class="row-fluid">
                        <div class="span12">

                            <?php if (isset($banner)):?>
                                <input type="hidden" name="id" value="<?=$banner['id']?>"/>
                            <?php endif;?>

                            <div class="control-group">
                                <label class="control-label">Pcode:<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" placeholder="Input Product Code" name="pcode" value="<?=isset($banner)?$banner['pcode']:''?>">
                                    <span class="help-inline" for="pcode"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">First Image:<span class="required">*</span></label>
                                <div class="controls">
                                    <div id="image">Upload</div>
                                    <?php if (empty($banner['image'])):?>
                                        <img id="showImage" src="" style="width:30%;height:100px;display:none"/>
                                    <?php else:?>
                                        <img id="showImage" src="<?=IMAGE_HOST.$banner['image']?>" style="width:30%;height:100px;"/>
                                    <?php endif;?>
                                    <input type="hidden" name="image" id="image" value="<?=isset($banner)?$banner['image']:''?>"/>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="form-actions">

                        <button class="btn green" type="submit">Save</button>

                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

<!-- END PAGE -->

<?php $this->load->view('admin/block/footer.php') ?>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.form.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $('#product_form').ajaxForm(function(data){
            if (data.err_code=='0000'){
                layer.msg('Save Success');
            }
        });

        $("#image").uploadify({
            height        : 27,
            width         : 80,
            fileName      : "image",               //提交到服务器的文件名
            maxFileCount: 1,                //上传文件个数（多个时修改此处
            returnType    : 'json',              //服务返回数据
            allowedTypes: 'jpg,jpeg,png,gif',  //允许上传的文件式
            showDone: false,                     //是否显示"Done"(完成)按钮
            showDelete: false,
            buttonText   : 'Select Image',
            fileSizeLimit : '2048KB',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            uploader      : '/admin/upload/uploadImage',
            onUploadSuccess:function(file,data,response){
                $('#image-queue').remove();
                var result = JSON.parse(data);
                if (result.err_code=='0000'){
                    $('#showImage').attr('src','<?=IMAGE_HOST?>'+result.path);
                    $('#showImage').show();
                    $('#image').val(result.path)
                }else{
                    layer.msg(result.err_msg);
                }
            }
        });

        $('#image-queue').remove();

        $('#product_form').ajaxForm(function(data){
            if (data.err_code=='0000') {
                layer.msg("Save Success");
                window.location.href = '<?=base_url('admin/banner/index?id=')?>'+data.banner_id;
            }else{
                layer.msg(data.err_msg);
            }
        });

    });

</script>
