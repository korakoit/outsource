<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>

<style type="text/css">
    #thumbnails ul li{float:left;list-style-type:none;width:105px;margin-left:5px;}
    #thumbnails .button{display:block;position: relative;right:-84px;top: -118px;width: 30px;z-index: 1103;cursor:pointer;}
</style>

<!-- BEGIN PAGE -->
<div class="page-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">
                首页BANNER的管理
            </div>
        </div>

        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid profile">
            <div class="span12">
                <!--BEGIN TABS-->
                <div class="tabbable tabbable-custom tabbable-full-width">
                    <div class="tab-content">
                        <div class="tab-pane row-fluid active" id="tab_1_1">
                            <div class="row-fluid">
                                <div class="span12">

                                    <form action="/banner/save" class="form-horizontal" method="post">
                                        <input type="hidden" name="id" id="id" value="<?=V($banner,'id',"")?>">
                                        <div class="control-group">
                                            <label class="control-label">终端:</label>
                                            <div class="controls">
                                                <select name="type" id="type" class="medium m-wrap" >
                                                    <option value="-1">选择终端</option>
                                                    <option value="0" <?php if(V($banner,'type',"") =="0") echo 'selected';?> >移动端</option>
                                                    <option value="1" <?php if(V($banner,'type',"") =="1") echo 'selected';?> >PC端</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">标题:</label>
                                            <div class="controls">
                                                <input type="text" name="title"  placeholder="<?=V($banner,'title',"")?>" value="<?=V($banner,'title',"")?>" class="m-wrap large">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">描述:</label>
                                            <div class="controls">
                                                <input type="text" name="profile"  placeholder="<?=V($banner,'profile',"")?>" class="m-wrap large" value="<?=V($banner,'profile',"")?>">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">链接:</label>
                                            <div class="controls">
                                                <input type="text" name="url"  placeholder="<?=V($banner,'url',"")?>" class="m-wrap large" value="<?=V($banner,'url',"")?>">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">是否有效:</label>
                                            <div class="controls">
                                                <input type="radio" value="0" name="valid" <?php if(V($banner,'valid',0) == "0"):?>checked<?php endif; ?>>无效
                                                <input type="radio" value="1" name="valid" <?php if(V($banner,'valid',1) == "1"):?>checked<?php endif; ?>>有效
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">排序值:</label>
                                            <div class="controls">
                                                <input type="text" name="ord" id="ord" placeholder="排序值，默认为0" class="m-wrap large" value="<?=V($banner,'ord',"0")?>">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">位置标志:</label>
                                            <div class="controls">
                                                <input type="text" name="position" id="position" placeholder="位置标志，默认为空" class="m-wrap large" value="<?=V($banner,'position',"")?>">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">图片：</label>
                                            <input type="hidden" name="catepic" id="catepic" value="<?=V($banner,'pic',"")?>">
                                            <div class="controls">
                                                <div class="margin-bottom-10" title="pic">
                                                    <div id="queue"></div>
                                                    <div style="width:250px; height: auto; border: 1px solid #e1e1e1; font-size: 12px; padding: 10px;">
                                                        <div id="thumbnails" class="margin-bottom-10">
                                                            <ul id="pic_list" style="margin: 5px;">
                                                                <?php if(!empty(V($banner,'pic',""))):?>
                                                                    <li><img class='content'  src='<?=IMAGE_FILE_HOST?><?=substr(V($banner,'pic',""),0,2)?>/<?=V($banner,'pic',"")?>' style="width:100px;height:100px;"></li>
                                                                <?php endif; ?>
                                                            </ul>
                                                            <div style="clear: both;"></div>
                                                            <div style="">[移动端]请使用750*400宽度的图片<br>
                                                                [PC端&nbsp;&nbsp;]请使用1920*1010宽度图片<br>
                                                                [PC端小Banner]请使用640*400宽度图片,位置标志使用1
                                                            </div>
                                                        </div>
                                                        <input name="file_upload" id='cate_upload' type="file" multiple="false">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <button class="btn blue" type="submit"><i class="icon-ok"></i>保存</button>
                                            <button class="btn" type="button">取消</button>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <!--END TABS-->

            </div>

        </div>

    </div>

    <!-- END PAGE CONTAINER-->

</div>


<!-- END PAGE -->

<?php $this->load->view('block/footer.php')?>
<!-- 数据验证相关 -->
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/jquery.validate.min.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/form-validation.js"></script>

<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>

<script src="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>

<script language="javascript">
    $("#cate_upload").uploadify({
        height        : 27,
        width         : 80,
        buttonText   : '选择图片',
        fileSizeLimit : '2048KB',
        fileTypeDesc : 'Image Files',
        fileTypeExts : '*.gif; *.jpg; *.png',
        swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
        auto: true,
        multi: true,
        formData : { 'width': '200', 'height': '200' },
        uploader      : '/upload/uploadCountryPic/',
        onUploadSuccess:function(file,data,response){
            var obj=eval('('+data+')');
            if(obj.error_code==0){
                var newElement = "<li><img class='content'  src='"+image_url+obj.path+"' style=\"width:100px;height:100px;\"></li>";
                $("#pic_list").html(newElement);
                $("#catepic").val(obj.raw_name);
            }else{
                alert(obj.error_msg)
                return false;
            }
        },
    });
</script>

