<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>
<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.css">
<style type="text/css">
    .uploadify-queue {height: 0px;}
</style>
<!-- BEGIN PAGE -->
<div class="page-content">

    <!-- BEGIN PAGE CONTAINER-->

    <div class="container-fluid">

        <!-- BEGIN PAGE HEADER-->

        <div class="row-fluid" style="height:50px;">
            <?php if(empty($product['supplier_remark'])):?>
                <span class="span12" style="height:50px;"><h3><?=$product['name']?></h3></span>
            <?php else: ?>
                <span class="span12" style="height:50px;"><h3><?=$product['supplier_remark']?></h3></span>
            <?php endif;?>
        </div>

        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->

        <div class="row-fluid profile">

            <div class="span12">

                <!--BEGIN TABS-->

                <div class="tabbable tabbable-custom tabbable-full-width">

                    <ul class="nav nav-tabs">

                        <li><a href="/product/editFirst/<?=$id?>">基础信息</a></li>

                        <li><a href="/product/editSecond/<?=$id?>">商品详情</a></li>

                        <li class="active"><a href="#tab_1_3" data-toggle="tab">图片管理</a></li>

                        <li><a href="/product/editFour/<?=$id?>">价格管理</a></li>

                        <li><a href="/product/editFive/<?=$id?>">评价管理</a></li>

                        <li><a href="/product/editSix/<?=$id?>">上下架管理</a></li>
                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane row-fluid" id="tab_1_1">

                        </div>


                        <div class="tab-pane profile-classic row-fluid" id="tab_1_2">

                        </div>

                        <div class="tab-pane row-fluid profile-account active" id="tab_1_3">
                            <div class="portlet-title">
                                <div class="caption"><i class="icon-reorder"></i>WEB商品轮播图</div>
                            </div>
                            <input name="file_upload" id='web_upload' type="file" multiple="false">
                                <div class="alert alert-error">
                                   请上传尺寸为 <strong>3:2</strong>的图片
                                </div>
                                <div id="webProgressContainer"></div>
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <tbody id="pic_list">
                                    <?php if(!empty($pic[1])):?>
                                        <?php foreach ($pic[1] as $webpicK => $webpicRow):?>
                                            <tr>
                                                <td><a title='<?=$webpicRow['img_title']?>' href='<?=IMAGE_FILE_HOST?><?=substr($webpicRow['img_url'],0,2)?>/<?=$webpicRow['img_url']?>'><img src='<?=IMAGE_FILE_HOST?><?=substr($webpicRow['img_url'],0,2)?>/<?=$webpicRow['img_url']?>' style='width:100px;height:60px;'></a></td>
                                                <td><span><?=$webpicRow['img_title']?></span></td>
                                                <td><span class='size'><?=$webpicRow['img_size']?>KB</span></td>
                                                <td>
                                                     <?php if($webpicRow['is_first']==1):?>
                                                        <a href='#' class='btn blue'>设为首页</a>
                                                     <?php else:?>
                                                        <a href='/product/onindex/<?=$webpicRow['id']?>?type=1' class='btn'>设为首页</a>
                                                    <?php endif;?>
                                                    <a href='/product/delpic/<?=$webpicRow['id']?>' class='btn'>删除</a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                    </tbody>
                                </table>

                            <div class="portlet-title">
                                <div class="caption"><i class="icon-reorder"></i>APP商品轮播图</div>
                            </div>
                            <input name="file_upload" id='app_upload' type="file" multiple="false">
                            <div class="alert alert-error">
                                请上传尺寸比例为 <strong>1.7</strong>的图片
                        </div>
                            <table class="table table-striped table-bordered table-advance table-hover">
                                <tbody id="apppic_list">
                                <?php if(!empty($pic[2])):?>
                                    <?php foreach ($pic[2] as $apppicK => $apppicRow):?>
                                        <tr>
                                            <td><a title='<?=$apppicRow['img_title']?>' href='<?=IMAGE_FILE_HOST?><?=substr($apppicRow['img_url'],0,2)?>/<?=$apppicRow['img_url']?>'><img src='<?=IMAGE_FILE_HOST?><?=substr($apppicRow['img_url'],0,2)?>/<?=$apppicRow['img_url']?>' style='width:100px;height:60px;'></a></td>
                                            <td><span><?=$apppicRow['img_title']?></span></td>
                                            <td><span class='size'><?=$apppicRow['img_size']?>KB</span></td>
                                            <td>
                                                <?php if($apppicRow['is_first']==1):?>
                                                    <a href='#' class='btn blue'>设为首页</a>
                                                <?php else:?>
                                                    <a href='/product/onindex/<?=$apppicRow['id']?>?type=2' class='btn'>设为首页</a>
                                                <?php endif;?>
                                                <a href='/product/delpic/<?=$apppicRow['id']?>' class='btn'>删除</a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                                </tbody>
                            </table>

                        </div>


                        <div class="tab-pane" id="tab_1_4">
                            TAB4


                        </div>


                        <div class="tab-pane row-fluid" id="tab_1_5">

                            <div class="row-fluid">
                                TAB5

                            </div>

                        </div>

                        <div class="tab-pane row-fluid" id="tab_1_6">

                            <div class="row-fluid">
                                TAB6

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
<!-- 图片上传 -->
<script src="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<script type="text/javascript">
        $("#web_upload").uploadify({
            height        : 27,
            width         : 80,
            buttonText   : '选择图片',
            fileSizeLimit : '1024KB',
            fileTypeDesc : 'Image Files',
            fileTypeExts : '*.gif; *.jpg; *.png',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            auto: true,
            multi: true,
            formData : { 'width': '726','type':1 },
            uploader      : '/upload/uploadList/<?=$id?>/',
            onUploadSuccess:function(file,data,response){
                var obj=eval('('+data+')');
                if(obj.error_code==0){
                    var newElement = "<tr><td><a title='' href=''><img src='" + image_url+obj.url + "' style='width:100px;height:60px;'></a></td><td><span></span>"+obj.title+"</td> <td><span class='size'>"+obj.size+"KB</span></td><td><a href='/product/onindex/"+obj.id+"?type=1' class='btn'>设为首页</a> <a href='/product/delpic/"+obj.id+"' class='btn'>删除</a></td></tr>";
                    $("#pic_list").prepend(newElement);
                }else{
                    alert(obj.error_msg)
                    return false;
                }
            },
        });

        $("#app_upload").uploadify({
            height        : 27,
            width         : 80,
            buttonText   : '选择图片',
            fileSizeLimit : '100KB',
            fileTypeDesc : 'Image Files',
            fileTypeExts : '*.gif; *.jpg; *.png',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            auto: true,
            multi: true,
            formData : { 'width': '748','type':2},
            uploader      : '/upload/uploadList/<?=$id?>/',
            onUploadSuccess:function(file,data,response){
                var obj=eval('('+data+')');
                if(obj.error_code==0){
                    var newElement = "<tr><td><a title='' href=''><img src='" + image_url+obj.url + "' style='width:100px;height:60px;'></a></td><td><span></span>"+obj.title+"</td> <td><span class='size'>"+obj.size+"KB</span></td><td><a href='/product/onindex/"+obj.id+"?type=2' class='btn'>设为首页</a> <a href='/product/delpic/"+obj.id+"' class='btn'>删除</a></td></tr>";
                    $("#apppic_list").prepend(newElement);
                }else{
                    alert(obj.error_msg)
                    return false;
                }
            },
        });
</script>


