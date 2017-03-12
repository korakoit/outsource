<?php $this->load->view('admin/block/header.php'); ?>

<?php $this->load->view('admin/block/nav_top.php'); ?>

<?php $this->load->view('admin/block/nav_bar.php'); ?>

<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>assets/css/select2_metro.css"/>

<!-- BEGIN PAGE -->
<style type="text/css">
    .table th, .table td {
        border-top: 1px solid #ddd;
        line-height: 20px;
        padding: 8px;
        text-align: center;
        vertical-align: middle;
    }

     .img{
         position:relative;
         width:30%;
         height:100px;
         display: inline-block;
     }

    .img img{
        width:100%;
        height:100%;
    }
    .img i{
        position:absolute;
        top:-7px;
        right:-7px;
        display:block;
        background:url(<?=STATIC_FILE_HOST.'assets/image/xx.png'?>) no-repeat center center;
        background-size:contain;
        width:10px;
        height:10px;
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

        <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN BREADCRUMB-->
                        <ul class="breadcrumb" style="margin-top:10px;">
                            <li>
                                <a href="<?= base_url("product/index") ?>">Product Info</a>
                                <i class="icon-angle-right"></i>
                            </li>
                        </ul>
                        <!-- END BREADCRUMB -->
                    </div>
                </div>
                <form class="form-horizontal" method="post" id="product_form" action="<?=$action?>">
                    <h3 class="form-section">Product Info</h3>
                    <div class="row-fluid">
                        <div class="span12">

                            <?php if (isset($product)):?>
                                <input type="hidden" name="id" value="<?=$product['id']?>"/>
                            <?php endif;?>

                            <div class="control-group">
                                <label class="control-label">Name:<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" placeholder="Input Name" name="name" value="<?=isset($product)?$product['name']:''?>">
                                    <span class="help-inline" for="name"></span>
                                </div>
                            </div>

                            <?php if (isset($product)):?>
                                <div class="control-group">
                                    <label class="control-label">Pcode:<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text"  name="pcode" value="<?=isset($product)?$product['pcode']:''?>">
                                        <span class="help-inline" for="pcode"></span>
                                    </div>
                                </div>
                            <?php endif;?>

                            <div class="control-group">
                                <label class="control-label">Title:<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" placeholder="Input Title" name="title" value="<?=isset($product)?$product['title']:''?>">
                                    <span class="help-inline" for="title"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Price<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" placeholder="Input Price" name="price" value="<?=isset($product)?$product['price']:''?>">
                                    <span class="help-inline" for="price"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Storage<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" placeholder="Input Storage" name="storage" value="<?=isset($product)?$product['storage']:''?>">
                                    <span class="help-inline" for="storage"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Star:<span class="required">*</span></label>
                                <div class="controls">
                                    <select name="star">
                                        <option value="1" <?php if(isset($product)&&$product['star']==1) echo "selected";?>>One</option>
                                        <option value="2" <?php if(isset($product)&&$product['star']==2) echo "selected";?>>Two</option>
                                        <option value="3" <?php if(isset($product)&&$product['star']==3) echo "selected";?>>Three</option>
                                        <option value="4" <?php if(isset($product)&&$product['star']==4) echo "selected";?>>Four</option>
                                        <option value="5" <?php if(isset($product)&&$product['star']==5) echo "selected";?>>Five</option>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Detail<span class="required">*</span></label>
                                <div class="controls">
                                    <textarea name="detail"><?=isset($product)?$product['detail']:''?></textarea>
                                    <span class="help-inline" for="detail"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Main Category:<span class="required">*</span></label>
                                <div class="controls">
                                    <select name="main_category" id="main_category" onchange="changeMainCategory()">
                                        <option value="">Select</option>
                                        <?php foreach ($main_list as $key=>$value):?>
                                            <option value="<?=$key?>" <?php if(isset($product)&&$product['main_category']==$key) echo 'selected';?>><?=$value?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Sub Category:<span class="required">*</span></label>
                                <div class="controls">
                                    <select name="sub_category" id="sub_category">
                                        <option value="">Select</option>
                                        <?php if(isset($sub_list)):?>
                                            <?php foreach ($sub_list as $key=>$value):?>
                                                <option value="<?=$key?>" <?php if(isset($product)&&$product['sub_category']==$key) echo 'selected';?>><?=$value?></option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Seo Title:<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" placeholder="Input Seo Title" name="seo_title" value="<?=isset($product)?$product['price']:''?>">
                                    <span class="help-inline" for="seo_title"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Seo Content:<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" placeholder="Input Seo Content" name="seo_content" value="<?=isset($product)?$product['seo_content']:''?>">
                                    <span class="help-inline" for="seo_content"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Seo Desc:<span class="required">*</span></label>
                                <div class="controls">
                                    <textarea name="seo_desc"><?=isset($product)?$product['seo_desc']:''?></textarea>
                                    <span class="help-inline" for="seo_desc"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Detail:<span class="required">*</span></label>
                                <div class="controls">
                                    <textarea name="detail"><?=isset($product)?$product['detail']:''?></textarea>
                                    <span class="help-inline" for="detail"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Brochure:<span class="required">*</span></label>
                                <div class="controls">
                                    <div id="brochure">Upload</div>

                                    <div id="brochureDiv" class="alert alert-success" <?=empty($product['brochure'])?' style="display: none"':''?>>

                                        <a class="close" onclick="deleteBrochure()"></a>

                                        <a id="brochureA"><strong id="brochureText"><?=isset($product)?$product['brochure']:''?></strong></a>

                                    </div>

                                    <input type="hidden" name="brochure" id="brochure" value="<?=isset($product)?$product['brochure']:''?>"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">First Image:<span class="required">*</span></label>
                                <div class="controls">
                                    <div id="image">Upload</div>
                                    <?php if (empty($product['image'])):?>
                                        <img id="showImage" src="" style="width:30%;height:100px;display:none"/>
                                    <?php else:?>
                                        <img id="showImage" src="<?=$product['image']?>" style="width:30%;height:100px;"/>
                                    <?php endif;?>
                                    <input type="hidden" name="image" id="logo" value="<?=isset($product)?$product['image']:''?>"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Images:<span class="required">*</span></label>
                                <div class="controls" id="imageDiv">
                                    <div id="images">Upload</div>
                                    <?php if(isset($image_list)):?>
                                        <?php foreach ($image_list as $key=>$value):?>
                                            <div id="<?=$key?>" class="img"><img src="<?=$value?>"><i onclick="removeImage(<?=$key?>)"></i><input type="hidden" name="images[]" value="<?=$value?>"/></div>
                                        <?php endforeach;?>
                                    <?php endif;?>
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
                    $('#logo').val('<?=IMAGE_HOST?>'+result.path)
                }else{
                    layer.msg(result.err_msg);
                }
            }
        });

        $("#images").uploadify({
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
                $('#image-queues').remove();
                var result = JSON.parse(data);
                if (result.err_code=='0000'){
                    var time = new Date().getTime();
                    $('#imageDiv').append('<div id="'+time+'" class="img"><img src="<?=IMAGE_HOST?>'+result.path+'"><i onclick="removeImage(\''+time+'\')"></i><input type="hidden" name="images[]" value="<?=IMAGE_HOST?>'+result.path+'"/></div>');
                }else{
                    layer.msg(result.err_msg);
                }
            }
        });

        $("#brochure").uploadify({
            height        : 27,
            width         : 80,
            fileName      : "image",               //提交到服务器的文件名
            maxFileCount: 1,                //上传文件个数（多个时修改此处
            returnType    : 'json',              //服务返回数据
            showDone: false,                     //是否显示"Done"(完成)按钮
            showDelete: false,
            buttonText   : 'Select File',
            fileSizeLimit : '2048KB',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            uploader      : '/admin/upload/uploadImage',
            onUploadSuccess:function(file,data,response){
                $('#brochure-queue').remove();
                var result = JSON.parse(data);
                if (result.err_code=='0000'){
                    $('#brochureA').attr('href','<?=IMAGE_HOST?>'+result.path);
                    $('#brochureText').text('<?=IMAGE_HOST?>'+result.path);
                    $('#brochureDiv').show();
                    $('input[name="brochure"]').val('<?=IMAGE_HOST?>'+result.path);
                }else{
                    layer.msg(result.err_msg);
                }
            }
        });

        $('#image-queue').remove();
        $('#images-queue').remove();
        $('#brochure-queue').remove();

        $('#product_form').ajaxForm(function(data){
            if (data.err_code=='0000') {
                layer.msg("Save Success");
                window.location.href = '<?=base_url('admin/product/detail?product_id=')?>'+data.product_id;
            }else{
                layer.msg(data.err_msg);
            }
        });

    });

    function removeImage(id){
        $('#'+id).remove();
    }

    function changeMainCategory() {
        var pid = $('#main_category').val();
        $('#sub_category').empty();
        if (pid!=undefined||pid!=''){
            $.post("<?=base_url('admin/product/ajaxGetSubCategory')?>",{pid:pid},function (data) {

                $('#sub_category').append("<option value=''>Select</option>");
                $.each(data,function(index,value){
                    $('#sub_category').append("<option value='"+index+"'>"+value+"</option>");
                });
            });
        }

    }

    function deleteBrochure() {
        $('#brochureDiv').hide();
        $('input[name="brochure"]').val('');
    }
</script>
