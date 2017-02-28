<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>

<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.css">
<link rel="stylesheet" href="<?=STATIC_FILE_HOST?>assets/plugin/pace/themes/blue/pace-theme-center-simple.css" />
<script type="text/javascript">

</script>
<style type="text/css">
    #thumbnails ul li{float:left;list-style-type:none;width:105px;margin-left:5px;}
    #thumbnails .button{display:block;position: relative;right:-84px;top: -118px;width: 30px;z-index: 1103;cursor:pointer;}
    #page-content {
        opacity: 0;
    }
    #page-content {
        -webkit-transform: opacity 0.5s ease;
        -moz-transform: opacity 0.5s ease;
        -o-transform: opacity 0.5s ease;
        -ms-transform: opacity 0.5s ease;
        transform: opacity 0.5s ease;
    }
    body.pace-running #page-content {
        opacity: 0;
    }
    body.pace-done #page-content{
        opacity: 1;
    }

    .pace {
        -webkit-pointer-events: none;
        pointer-events: none;

        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;

        z-index: 2000;
        position: fixed;
        margin: auto;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        height: 5px;
        width: 200px;
        overflow: hidden;
    }

    .pace .pace-progress {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -ms-box-sizing: border-box;
        -o-box-sizing: border-box;
        box-sizing: border-box;

        -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);

        max-width: 200px;
        position: fixed;
        z-index: 2000;
        display: block;
        position: absolute;
        top: 0;
        right: 100%;
        height: 100%;
        width: 100%;
    }

    .pace.pace-inactive {
        display: none;
    }
</style>
<!-- BEGIN PAGE -->
<div class="page-content">

    <!-- BEGIN PAGE CONTAINER-->

    <div class="container-fluid">

        <!-- BEGIN PAGE HEADER-->

        <div class="row-fluid">

            <div class="span12">

              
            </div>

        </div>

        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->

        <div class="row-fluid profile" id="page-content">

            <div class="span12">

                <!--BEGIN TABS-->

                <div class="tabbable tabbable-custom tabbable-full-width">

                    <ul class="nav nav-tabs">

                        <li><a href="/product/editFirst/<?=$id?>">基础信息</a></li>

                        <li class="active"><a href="#tab_1_2" data-toggle="tab">商品详情</a></li>

                        <li><a href="/product/editThird/<?=$id?>">图片管理</a></li>

                        <li><a href="/product/editFour/<?=$id?>">价格管理</a></li>

                        <li><a href="/product/editFive/<?=$id?>">评价管理</a></li>

                        <li><a href="/product/editSix/<?=$id?>">上下架管理</a></li>
                    </ul>
                    <?php
                    if(isset($product)){
                        $tmp = explode(",",$product['city_id']);
                        @$citytmp = '';
                        if(!empty($tmp)){
                            foreach ($tmp as $v) {
                                @$citytmp.= $city_index[$v]['cn'] . ";";
                            }
                        }
                    }
                    ?>
                    <div class="tab-content">

                        <div class="tab-pane row-fluid" id="tab_1_1">

                        </div>


                        <div class="tab-pane profile-classic row-fluid active" id="tab_1_2">

                            <div class="row-fluid">

                                <div class="span12">
                                    <div class="portlet-title">

                                        <div class="caption"><i class="icon-reorder"></i>基础信息</div>

                                    </div>

                                    <form class="form-horizontal" id="form_sample_2" action="/product/editdetail" novalidate="novalidate" method="post">

                                        <div class="control-group">

                                            <label class="control-label">商品名:</label>
                                            <div class="controls">

                                                <input type="text" disabled="" placeholder="<?=$product['lm_name_remark']?>" class="m-wrap span6">

                                            </div>

                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">商品编号:</label>
                                            <div class="controls">
                                                <input type="text" placeholder="<?=$product['lm_number']?>" class="m-wrap large"  disabled="" />
                                                <input type="hidden" name="productId" value="<?=$id?>" />
                                            </div>
                                        </div>

                                        <div class="control-group">

                                            <label class="control-label" for="sale_name">商品名(销售):<span class="required">*</span></label>

                                            <div class="controls">
                                                <input type="text" class="m-wrap span6 required" name="sale_name" placeholder="" value="<?=$product['lm_sale_name']?>" >
                                            </div>

                                        </div>

                                        <div class="control-group">

                                            <label class="control-label" for="sale_title">副标题:<span class="required">*</span></label>

                                            <div class="controls">

                                                <input type="text" name="sale_title" class="m-wrap span6 required" placeholder="" value="<?=$product['lm_sale_title']?>">

                                            </div>

                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">商品所属地:</label>
                                            <div class="controls">
                                                <input type="text" class="m-wrap large" placeholder="<?=@$country_index[$product['country_id']]['cn']?> <?=$citytmp?>" disabled="">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">商品分类:</label>
                                            <div class="controls" id="category">
                                                <?php if(!empty($cate)): ?>
                                                    <?php foreach($cate as $row):?>
                                                      <div class="btn blue"><?=$row['name']?><input type="hidden" name="cate[]" value="<?=$row['id']?>"></div>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                                <a class="btn" href="#" data-toggle="modal" data-target="#cateModal"><i class="icon-plus"></i></a>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">商品标签:</label>
                                            <div class="controls" id="lab">
                                                <?php if(!empty($product['lm_sale_tag'])):?>
                                                    <?php $tag = json_decode($product['lm_sale_tag']); ?>
                                                    <?php foreach ($tag as $tagK => $tagRow):?>
                                                        <div class="btn "><?=$tagRow?></div>
                                                        <input type="hidden" name="tag[]" value="<?=$tagRow?>">
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                                <a class="btn" href="#" data-toggle="modal" data-target="#myModal"><i class="icon-plus"></i></a>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">规格设置:</label>
                                            <div class="controls">
                                                  <table class="table table-striped table-bordered table-hover dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>规格名</th>
                                                            <th>规格值</th>
                                                        </tr>    
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($format_list as $key => $value):?>
                                                            <?php foreach ($value['format_val_list'] as $k => $v):?>
                                                                <tr>
                                                                    <?php if($k==0):?>
                                                                        <td rowspan="<?=count($value['format_val_list'])?>">
                                                                             <?=$value['name_2nd']?><input style="margin-left:15px" class="format m-wrap small" data="<?=$value['id']?>" value="<?=$value['name_3rd']?>"/>     
                                                                        </td>
                                                                        <td>
                                                                           <?=$v['name_2nd']?><input style="margin-left:15px" class="format_val m-wrap small" data="<?=$v['id']?>" value="<?=$v['name_3rd']?>"/> 
                                                                        </td>
                                                                    <?php else:?>
                                                                         <td>
                                                                           <?=$v['name_2nd']?><input style="margin-left:15px" class="format_val m-wrap small" data="<?=$v['id']?>" value="<?=$v['name_3rd']?>"/> 
                                                                        </td>
                                                                    <?php endif;?>
    
                                                                </tr>
                                                            <?php endforeach;?>
                                                        <?php endforeach;?>
                                                    </tbody>
                                                </table>
                                                <textarea style="display:none" id="format_list" name="format_list"></textarea>
                                                <textarea style="display:none" id="format_val_list" name="format_val_list"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <button class="btn green" onclick="submitForm()">保存</button>
                                            <button class="btn" type="button">取消</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row-fluid">

                                <div class="portlet-title">
                                    <div class="caption"><i class="icon-reorder"></i>商品详细</div>
                                </div>

                                    <div class="tab-content span12">
                                        <div class="tab-pane active" id="tab_1">

                                            <div class="accordion in collapse" id="accordion1" style="height: auto;">

                                                <div class="accordion-group">

                                                    <div class="accordion-heading">

                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1">
                                                            <i class="icon-angle-left"></i>
                                                            产品亮点
                                                        </a>

                                                    </div>

                                                    <div id="collapse_1" class="accordion-body collapse">

                                                        <div class="accordion-inner">
                                                            <?php $this->load->view('productdesc/highlights.php');?>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="accordion-group">

                                                    <div class="accordion-heading">

                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2">
                                                            <i class="icon-angle-left"></i>
                                                            行程安排
                                                        </a>

                                                    </div>

                                                    <div id="collapse_2" class="accordion-body collapse">

                                                        <div class="accordion-inner">
                                                            <?php $this->load->view('productdesc/trip.php');?>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="accordion-group">

                                                    <div class="accordion-heading">

                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3">
                                                            <i class="icon-angle-left"></i>
                                                            商品详情
                                                        </a>

                                                    </div>

                                                    <div id="collapse_3" class="accordion-body collapse">

                                                        <div class="accordion-inner">

                                                            <?php $this->load->view('productdesc/desc.php');?>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="accordion-group">

                                                    <div class="accordion-heading">

                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_4">
                                                            <i class="icon-angle-left"></i>
                                                            费用说明
                                                        </a>

                                                    </div>

                                                    <div id="collapse_4" class="accordion-body collapse">

                                                        <div class="accordion-inner">

                                                            <?php $this->load->view('productdesc/cost.php');?>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="accordion-group">

                                                    <div class="accordion-heading">

                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_5">
                                                            <i class="icon-angle-left"></i>
                                                            预定流程

                                                        </a>

                                                    </div>

                                                    <div id="collapse_5" class="accordion-body collapse">

                                                        <div class="accordion-inner">

                                                            <?php $this->load->view('productdesc/book.php');?>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="accordion-group">

                                                    <div class="accordion-heading">

                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_6">
                                                            <i class="icon-angle-left"></i>
                                                            预定需知

                                                        </a>

                                                    </div>

                                                    <div id="collapse_6" class="accordion-body collapse">

                                                        <div class="accordion-inner">

                                                            <?php $this->load->view('productdesc/know.php');?>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="accordion-group">

                                                    <div class="accordion-heading">

                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_7">
                                                            <i class="icon-angle-left"></i>
                                                            地图

                                                        </a>

                                                    </div>

                                                    <div id="collapse_7" class="accordion-body collapse">

                                                        <div class="accordion-inner">

                                                            <div class="span12">
                                                                <div class="control-group">
                                                                    <label class="control-label">经度:</label>
                                                                    <div class="controls">
                                                                        <input type="text" id="long" class="m-wrap large" value="<?=$product['lm_latitude']?>">
                                                                    </div>
                                                                </div>

                                                                <div class="control-group">
                                                                    <label class="control-label">纬度:</label>
                                                                    <div class="controls">
                                                                        <input type="text" id="lat" class="m-wrap large" value="<?=$product['lm_longitude']?>">
                                                                    </div>
                                                                </div>

                                                                <div class="control-group">
                                                                    <label class="control-label">地址:</label>
                                                                    <div class="controls">
                                                                        <input type="text" id="address" class="m-wrap large" value="<?=$product['lm_address']?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-actions">
                                                                    <button type="submit" class="btn blue" onclick="thisjs.saveMap();">保存</button>
                                                                    <button type="button" class="btn">取消</button>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                            </div>
                        </div>


                        <div class="tab-pane row-fluid profile-account" id="tab_1_3">

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
<!--模态框-->
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">添加修改标签</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?php for ($i=0;$i<5;$i++):?>
                        <?php $temp[$i] = empty($tag[$i])?'':$tag[$i]; ?>
                        <label class="control-label" for="recipient-name">标签<?=$i+1?>: <input type="text" name="lab" id="recipient-name" class="form-control" value="<?=$temp[$i]?>"></label>
                    <?php endfor;?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveBtn">保存</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="cateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">添加分类</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?php if(!empty($allcate)): ?>
                        <?php foreach($allcate as $cateRow):?>
                            <?php foreach($cateRow as $cRow):?>
                                <div class="btn <?php if(in_array($cRow['id'],$ids)){echo 'blue';}?>" onclick="selectTag(this);"><?=$cRow['name']?><input type="hidden" name="cate" title="<?=$cRow['name']?>" value="<?=$cRow['id']?>"> </div>
                            <?php endforeach;?>
                        <?php endforeach ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveCate">保存</button>
            </div>
        </div>
    </div>
</div>
<!--模态框结束-->

<!-- END PAGE -->

<?php $this->load->view('block/footer.php')?>
<!-- 数据验证相关 -->
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/jquery.validate.min.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/form-validation.js"></script>

<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>

<!-- 图片上传 -->
<script src="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/ueditor/lang/zh-cn/zh-cn.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/json.js" type="text/javascript"></script>
<script data-pace-options='{"ajax": false}' src="<?=STATIC_FILE_HOST?>assets/plugin/pace/pace.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        //数据验证
        $("#form_sample_2").validate();

    });

    //标签
    $("#saveBtn").click(function(){
        var lab = new Array();
        var obj = $("#lab");
        var isReturn = false;
        $("input[name^='lab']").each(function(){
            if($(this).val().length>5){
                layer.msg('单个标签最多5个字符！');
                isReturn = true;
            }else {
                lab.push($(this).val());
            }
        });
        if(isReturn) return false;
        $('#myModal').modal('hide');
        var html = '';
        for(i=0;i<lab.length;i++){
            if(lab[i]!=''){
                html += '<div class="btn " style="margin-right:5px;">'+lab[i]+'</div>';
                html += '<input type="hidden" name="tag[]" value="'+lab[i]+'">';
            }
        }
        html += '<a class="btn" href="#" data-toggle="modal" data-target="#myModal"><i class="icon-plus"></i></a>';
        obj.html('');
        obj .prepend(html);
    })

    //促销分类
    $("#saveCate").click(function(){
        var obj = $("#category");
        var cate = new Array();
        $("input[name='cate']").each(function(){
            if($(this).parent().hasClass('blue')){
                cate.push({
                    id : $(this).val(),
                    name :  $(this).attr('title')
                });
            }
            $('#cateModal').modal('hide');
            var html = '';
            for(i=0;i<cate.length;i++){
                if(cate[i].name!=''){
                    html += '<div class="btn blue">'+cate[i].name+'<input type="hidden" name="cate[]" value="'+cate[i].id+'"></div> ';
                }
            }
            html += '<a class="btn" href="#" data-toggle="modal" data-target="#cateModal"><i class="icon-plus"></i></a>';
            obj.html('');
            obj .prepend(html);
        })
    })
    function selectTag(obj){
       var isSelect =  $(obj).hasClass('blue');
        if(isSelect){
            $(obj).removeClass('blue');
        }else{
            $(obj).addClass('blue');
        }
    }
</script>

<script type="text/javascript">
    //初始化产品亮点
    <?php if(!isset($desc['travel_highlights'])):?>
        $(function(){
            $("#light_upload").uploadify({
                height        : 27,
                width         : 80,
                buttonText    : '选择图片',
                swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
                uploader      : '/product/uploadDesc/<?=$id?>',
                onUploadSuccess:function(file,data,response){
                    var newElement = "<li><img class='content'  src='" +base_url+data + "' style=\"width:100px;height:100px;\"><img class='button' src=" +base_url+ "assets/plugin/uploadify/fancy_close.png></li>";
                    $("#pic_list").append(newElement);
                    $('#light_upload').prev().find("img.button").last().bind("click", del);
                },
            });
        });
    <?php else:?>
    <?php $light = json_decode(html_entity_decode($desc['travel_highlights']),true);?>
    <?php foreach($light as $lightKey => $lightRow):?>
        <?php if($lightRow['type']=='pic'): ?>
            $(function(){
                $("#light_<?=$lightKey?>").prev().find("img.button").bind("click", del);
                $("#light_<?=$lightKey?>").uploadify({
                    height        : 27,
                    width         : 80,
                    buttonText   : '选择图片',
                    swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
                    uploader      : '/product/uploadDesc/<?=$id?>',
                    onUploadSuccess:function(file,data,response){
                        var newElement = "<li><img class='content'  src='" +base_url+ data + "' style=\"width:100px;height:100px;\"><img class='button' src=" +base_url+ "assets/plugin/uploadify/fancy_close.png></li>";
                        $("#light_<?=$lightKey?>").prev().find('ul').append(newElement);
                        $("#light_<?=$lightKey?>").prev().find("img.button").last().bind("click", del);
                    },
                });
            });
        <?php else: ?>
            UE.getEditor("light_<?=$lightKey?>",{
                toolbars: [
                    [ 'source', 'undo', 'redo', 'bold']
                ],
                initialFrameWidth:780,
                initialFrameHeight:300
            });
        <?php endif; ?>
    <?php endforeach;?>
    <?php endif; ?>

    //初始化行程安排
    <?php if(!isset($desc['travel_arrange'])):?>
    $(function(){
        $("#arrange_upload").uploadify({
            height        : 27,
            width         : 80,
            buttonText    : '选择图片',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            uploader      : '/product/uploadDesc/<?=$id?>',
            onUploadSuccess:function(file,data,response){
                var newElement = "<li><img class='content'  src='" +base_url+data + "' style=\"width:100px;height:100px;\"><img class='button' src=" +base_url+ "assets/plugin/uploadify/fancy_close.png></li>";
                //$("#pic_list").append(newElement);
                $("#arrange_upload").prev().find('ul').append(newElement);
                $('#arrange_upload').prev().find("img.button").last().bind("click", del);
            },
        });
    });
    <?php else:?>
    <?php $arrange = json_decode(html_entity_decode($desc['travel_arrange']),true);?>
    <?php foreach($arrange as $arrangeKey => $arrangeRow):?>
    <?php if($arrangeRow['type']=='pic'): ?>
    $(function(){
        $("#trip_<?=$arrangeKey?>").prev().find("img.button").bind("click", del);
        $("#trip_<?=$arrangeKey?>").uploadify({
            height        : 27,
            width         : 80,
            buttonText   : '选择图片',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            uploader      : '/product/uploadDesc/<?=$id?>',
            onUploadSuccess:function(file,data,response){
                var newElement = "<li><img class='content'  src='" +base_url+ data + "' style=\"width:100px;height:100px;\"><img class='button' src=" +base_url+ "assets/plugin/uploadify/fancy_close.png></li>";
                $("#trip_<?=$arrangeKey?>").prev().find('ul').append(newElement);
                $("#trip_<?=$arrangeKey?>").prev().find("img.button").last().bind("click", del);
            },
        });
    });
    <?php else: ?>
    UE.getEditor("trip_<?=$arrangeKey?>",{
        toolbars: [
            [ 'source', 'undo', 'redo', 'bold']
        ],
        initialFrameWidth:780,
        initialFrameHeight:300
    });
    <?php endif; ?>
    <?php endforeach;?>
    <?php endif; ?>

    //初始化详细
    <?php if(!isset($desc['travel_desc'])):?>
    $(function(){
        $("#desc_upload").uploadify({
            height        : 27,
            width         : 80,
            buttonText    : '选择图片',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            uploader      : '/product/uploadDesc/<?=$id?>',
            onUploadSuccess:function(file,data,response){
                var newElement = "<li><img class='content'  src='" +base_url+data + "' style=\"width:100px;height:100px;\"><img class='button' src=" +base_url+ "assets/plugin/uploadify/fancy_close.png></li>";
                //$("#pic_list").append(newElement);
                $("#desc_upload").prev().find('ul').append(newElement);
                $('#desc_upload').prev().find("img.button").last().bind("click", del);
            },
        });
    });
    <?php else:?>
    <?php $travel_desc = json_decode(html_entity_decode($desc['travel_desc']),true);?>
    <?php foreach($travel_desc as $descKey => $descRow):?>
    <?php if($descRow['type']=='pic'): ?>
    $(function(){
        $("#desc_<?=$descKey?>").prev().find("img.button").bind("click", del);
        $("#desc_<?=$descKey?>").uploadify({
            height        : 27,
            width         : 80,
            buttonText   : '选择图片',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            uploader      : '/product/uploadDesc/<?=$id?>',
            onUploadSuccess:function(file,data,response){
                var newElement = "<li><img class='content'  src='" +base_url+ data + "' style=\"width:100px;height:100px;\"><img class='button' src=" +base_url+ "assets/plugin/uploadify/fancy_close.png></li>";
                $("#desc_<?=$descKey?>").prev().find('ul').append(newElement);
                $("#desc_<?=$descKey?>").prev().find("img.button").last().bind("click", del);
            },
        });
    });
    <?php else: ?>
    UE.getEditor("desc_<?=$descKey?>",{
        toolbars: [
            [ 'source', 'undo', 'redo', 'bold']
        ],
        initialFrameWidth:780,
        initialFrameHeight:300
    });
    <?php endif; ?>
    <?php endforeach;?>
    <?php endif; ?>

    //初始化费用说明
    <?php if(!isset($desc['travel_cost'])):?>
    $(function(){
        $("#cost_upload").uploadify({
            height        : 27,
            width         : 80,
            buttonText    : '选择图片',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            uploader      : '/product/uploadDesc/<?=$id?>',
            onUploadSuccess:function(file,data,response){
                var newElement = "<li><img class='content'  src='" +base_url+data + "' style=\"width:100px;height:100px;\"><img class='button' src=" +base_url+ "assets/plugin/uploadify/fancy_close.png></li>";
                $("#cost_upload").prev().find('ul').append(newElement);
                $('#cost_upload').prev().find("img.button").last().bind("click", del);
            },
        });
    });
    <?php else:?>
    <?php $cost = json_decode(html_entity_decode($desc['travel_cost']),true);?>
    <?php foreach($cost as $costKey => $costRow):?>
    <?php if($costRow['type']=='pic'): ?>
    $(function(){
        $("#cost_<?=$costKey?>").prev().find("img.button").bind("click", del);
        $("#cost_<?=$costKey?>").uploadify({
            height        : 27,
            width         : 80,
            buttonText   : '选择图片',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            uploader      : '/product/uploadDesc/<?=$id?>',
            onUploadSuccess:function(file,data,response){
                var newElement = "<li><img class='content'  src='" +base_url+ data + "' style=\"width:100px;height:100px;\"><img class='button' src=" +base_url+ "assets/plugin/uploadify/fancy_close.png></li>";
                $("#cost_<?=$costKey?>").prev().find('ul').append(newElement);
                $("#cost_<?=$costKey?>").prev().find("img.button").last().bind("click", del);
            },
        });
    });
    <?php else: ?>
    UE.getEditor("cost_<?=$costKey?>",{
        toolbars: [
            [ 'source', 'undo', 'redo', 'bold']
        ],
        initialFrameWidth:780,
        initialFrameHeight:300
    });
    <?php endif; ?>
    <?php endforeach;?>
    <?php endif; ?>

    //初始化预定流程
    <?php if(!isset($desc['travel_book'])):?>
    $(function(){
        $("#book_upload").uploadify({
            height        : 27,
            width         : 80,
            buttonText    : '选择图片',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            uploader      : '/product/uploadDesc/<?=$id?>',
            onUploadSuccess:function(file,data,response){
                var newElement = "<li><img class='content'  src='" +base_url+data + "' style=\"width:100px;height:100px;\"><img class='button' src=" +base_url+ "assets/plugin/uploadify/fancy_close.png></li>";
                $("#book_upload").prev().find('ul').append(newElement);
                $('#book_upload').prev().find("img.button").last().bind("click", del);
            },
        });
    });
    <?php else:?>
    <?php $book = json_decode(html_entity_decode($desc['travel_book']),true);?>
    <?php foreach($book as $bookKey => $bookRow):?>
    <?php if($bookRow['type']=='pic'): ?>
    $(function(){
        $("#cost_<?=$bookKey?>").prev().find("img.button").bind("click", del);
        $("#cost_<?=$bookKey?>").uploadify({
            height        : 27,
            width         : 80,
            buttonText   : '选择图片',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            uploader      : '/product/uploadDesc/<?=$id?>',
            onUploadSuccess:function(file,data,response){
                var newElement = "<li><img class='content'  src='" +base_url+ data + "' style=\"width:100px;height:100px;\"><img class='button' src=" +base_url+ "assets/plugin/uploadify/fancy_close.png></li>";
                $("#book_<?=$bookKey?>").prev().find('ul').append(newElement);
                $("#book_<?=$bookKey?>").prev().find("img.button").last().bind("click", del);
            },
        });
    });
    <?php else: ?>
    UE.getEditor("book_<?=$bookKey?>",{
        toolbars: [
            [ 'source', 'undo', 'redo', 'bold']
        ],
        initialFrameWidth:780,
        initialFrameHeight:300
    });
    <?php endif; ?>
    <?php endforeach;?>
    <?php endif; ?>

    //初始化预定需知
    <?php if(!isset($desc['travel_know'])):?>
    $(function(){
        $("#know_upload").uploadify({
            height        : 27,
            width         : 80,
            buttonText    : '选择图片',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            uploader      : '/product/uploadDesc/<?=$id?>',
            onUploadSuccess:function(file,data,response){
                var newElement = "<li><img class='content'  src='" +base_url+data + "' style=\"width:100px;height:100px;\"><img class='button' src=" +base_url+ "assets/plugin/uploadify/fancy_close.png></li>";
                $("#know_upload").prev().find('ul').append(newElement);
                $('#know_upload').prev().find("img.button").last().bind("click", del);
            },
        });
    });
    <?php else:?>
    <?php $know = json_decode(html_entity_decode($desc['travel_know']),true);?>
    <?php foreach($know as $knowKey => $knowRow):?>
    <?php if($knowRow['type']=='pic'): ?>
    $(function(){
        $("#know_<?=$knowKey?>").prev().find("img.button").bind("click", del);
        $("#know_<?=$knowKey?>").uploadify({
            height        : 27,
            width         : 80,
            buttonText   : '选择图片',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            uploader      : '/product/uploadDesc/<?=$id?>',
            onUploadSuccess:function(file,data,response){
                var newElement = "<li><img class='content'  src='" +base_url+ data + "' style=\"width:100px;height:100px;\"><img class='button' src=" +base_url+ "assets/plugin/uploadify/fancy_close.png></li>";
                $("#know_<?=$knowKey?>").prev().find('ul').append(newElement);
                $("#know_<?=$knowKey?>").prev().find("img.button").last().bind("click", del);
            },
        });
    });
    <?php else: ?>
    UE.getEditor("know_<?=$knowKey?>",{
        toolbars: [
            [ 'source', 'undo', 'redo', 'bold']
        ],
        initialFrameWidth:780,
        initialFrameHeight:300
    });
    <?php endif; ?>
    <?php endforeach;?>
    <?php endif; ?>

    function del(){
        var src = $(this).siblings('img').attr('src');
        $.ajax({
            type: "GET", //访问WebService使用Post方式请求
            url: "ajax.php?act=del", //调用WebService的地址和方法名称组合---WsURL/方法名
            data: "src=" + src,
            success: function (data) {
            }
        });
        $(this).parent().remove();
    }

    var thisjs = new function(){
        //添加图片
        this.addHtml = function(obj,type){
                var timestamp = thisjs.getUuid();
                var html = '';
                html += "<div class='"+type+" margin-bottom-10' title='pic'>";
                html += "<input type='text' name='title' placeholder='标题'> <a class='btn blue' onclick='thisjs.addText(this,"+type+");'>文</a> <a class='btn blue' onclick='thisjs.addHtml(this,"+type+");'>图</a> <a class='btn blue' onclick='thisjs.delHtml(this);'>删除</a>";
                html += "<div style='width:750px; height: auto;border:1px solid #e1e1e1;font-size:12px; padding:10px;'><div id='thumbnails'>";
                html += "<ul id='pic_list' style='margin:5px;'></ul> <div style='clear:both;'></div></div><input class='file_upload' name='file_upload' id='"+timestamp+"' type='file' multiple='true'></div></div>";
                $(obj).parent().after(html);
                $("#"+timestamp).uploadify({
                    height        : 27,
                    width         : 80,
                    buttonText   : '选择图片',
                    swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
                    uploader      : '/product/uploadDesc/<?=$id?>',
                    onUploadSuccess:function(file,data,response){
                        var newElement = "<li><img class='content'  src='" +base_url+ data + "' style=\"width:100px;height:100px;\"><img class='button' src=" +base_url+ "assets/plugin/uploadify/fancy_close.png></li>";
                        $('#'+timestamp).prev().find('ul').append(newElement);
                        $('#'+timestamp).prev().find("img.button").last().bind("click", del);
                    },
                });
        }

        //获取唯一ID
        this.getUuid = function(){
            var time=new Date().getTime();
            var randomNum=Math.floor(Math.random()*1000+1);
            return ''+time+randomNum;
        }

        //删除HTML
        this.delHtml = function(obj){
            $(obj).parent().remove();
        }

        //添加文字项目
        this.addText = function(obj,type){
            var timestamp = thisjs.getUuid();
            var html = "";
            html += "<div class='"+type+" margin-bottom-10' title='text'>";
            html += "<input type='text' name='title' placeholder='标题'> <a class='btn blue' onclick='thisjs.addText(this,"+type+");'>文</a> <a class='btn blue' onclick='thisjs.addHtml(this,"+type+");'>图</a> <a class='btn blue' onclick='thisjs.delHtml(this);'>删除</a>";
            html += "<div><textarea id='"+timestamp+"' name='content'></textarea></div>";
            html += "</div>";
            $(obj).parent().after(html);
            UE.getEditor(timestamp,{
                toolbars: [
                    [ 'source', 'undo', 'redo', 'bold']
                ],
                    initialFrameWidth:780,
                    initialFrameHeight:300
             });
        }

        //保存
        this.save = function(type){
            var i = 0;
            var data = {};
            $("."+type).each(function(){
                var title = $(this).attr('title');
                var temp = {};
                if(title == 'pic'){
                    var tit = $(this).find("input[name='title']").val();
                    var pic = [];
                    $(this).find('.content').each(function(){
                        pic.push($(this).attr('src'));
                    });
                    temp = {
                        'type': title,
                        'title': tit,
                        'pic' : pic,
                    };
                }else{
                    var tit = $(this).find("input[name='title']").val();
                    var id =  $(this).find(".edui-default").eq(0).attr('id');
                    var cont = UE.getEditor(id).getContent();
                    temp = {
                        'type': title,
                        'title': tit,
                        'cont' : cont,
                    }
                }
                data[i] = temp;
                i++;
            })
            $.post("/product/saveDesc/<?=$id?>",{type:type,data:JSON.stringify(data)},function(result){
                if(result){
                    layer.msg('保存成功！');
                }
            });
        }
        //经纬度
        this.saveMap = function(){
            var long = $('#long').val();
            var lat = $('#lat').val();
            var address = $('#address').val();
            var longReg = /^-?(?:(?:180(?:\.0{1,5})?)|(?:(?:(?:1[0-7]\d)|(?:[1-9]?\d))(?:\.\d{1,5})?))$/;
            var latReg = /^-?(?:90(?:\.0{1,5})?|(?:[1-8]?\d(?:\.\d{1,5})?))$/;
            if(!longReg.test(long)){
                layer.msg('经度填写格式不正确！');
                return false;
            }
            if(!latReg.test(lat)){
                layer.msg('纬度填写格式不正确！');
                return false;
            }
            $.post("/product/saveMap/<?=$id?>",{long:long,lat:lat,address:address},function(result){
                if(result){
                    layer.msg('保存成功！');
                }
            });
        }
    }
</script>

<script type="text/javascript">
    
    function  submitForm(){
        var format_list = new Array();
        var format_val_list = new Array();

        $('.format').each(function(){
            format_list.push({
                id : $(this).attr('data'),
                name_3rd : $(this).val()
            });
        });

        $('.format_val').each(function(){
            format_val_list.push({
                id : $(this).attr('data'),
                name_3rd : $(this).val()
            });
        });

        $("#format_list").text(JSON.stringify(format_list));
        $("#format_val_list").text(JSON.stringify(format_val_list));

        $('#form_sample_2').submit();
    }

</script>
