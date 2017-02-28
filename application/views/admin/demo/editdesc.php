<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>

<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.css">
<link rel="stylesheet" href="<?=STATIC_FILE_HOST?>assets/plugin/pace/themes/blue/pace-theme-center-simple.css" />
<style type="text/css">
    .edit_wrap{ background:#f5f5f5;padding:15px;margin:25px 0!important;}
    #thumbnails ul li{float:left;list-style-type:none;width:105px;margin-left:5px;}
    #thumbnails .button{display:block;position: relative;right:-84px;top: -118px;width: 30px;z-index: 1103;cursor:pointer;}
    .uploadify-queue {height: 0px;}
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

        <div class="row-fluid" style="height:50px;">
            <?php if(empty($product['supplier_remark'])):?>
                <span class="span12" style="height:50px;"><h3><?=$product['name']?></h3></span>
            <?php else: ?>
                <span class="span12" style="height:50px;"><h3><?=$product['supplier_remark']?></h3></span>
            <?php endif;?>    

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
                                                <?php if(empty($product['supplier_remark'])):?>
                                                    <input type="text" disabled="" placeholder="<?=$product['name']?>" class="m-wrap span6">
                                                <?php else:?>
                                                    <input type="text" disabled="" placeholder="<?=$product['supplier_remark']?>" class="m-wrap span6">
                                                <?php endif;?>   
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

                                            <label class="control-label">商品名(销售):<span class="required">*</span></label>

                                            <div class="controls">
                                                <input type="text" class="m-wrap span6 required" name="sale_name" placeholder="" value="<?=$product['lm_sale_name']?>" >
                                            </div>

                                        </div>

                                        <div class="control-group">

                                            <label class="control-label">副标题:<span class="required">*</span></label>

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

                                     <!--    <div class="control-group">
                                            <label class="control-label">商品标签:</label>
                                            <div class="controls" id="lab">
                                                <?php if(!empty($product['lm_sale_tag'])):?>
                                                    <?php foreach ($tag as $tagK => $tagRow):?>
                                                        <div class="btn "><?=$tagRow?></div>
                                                        <input type="hidden" name="tag[]" value="<?=$tagRow?>">
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                                <a class="btn" href="#" data-toggle="modal" data-target="#myModal"><i class="icon-plus"></i></a>
                                            </div>
                                        </div> -->

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
                                                                             <?=$value['name_2nd']?><input style="margin-left:15px" class="format m-wrap small" data="<?=$value['id']?>" value="<?=$value['name_3rd']?>"/>  可改: <input name="is_change" type="checkbox" value="1" <?php if($value['is_change']==1){echo 'checked';} ?>>
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
                                    </form>
                                    <div class="form-actions">
                                        <button class="btn green" onclick="submitForm()">保存</button>
                                        <a class="btn" type="button" href="/product/">取消</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="tabbable tabbable-custom tabbable-full-width">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab_2_1" data-toggle="tab">商品详细</a></li>
                                       <!--  <li><a href="#tab_2_2" data-toggle="tab" href="">web端商详</a></li> -->
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane row-fluid active" id="tab_2_1">
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
                                                                    预订须知

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
                                                                    退改规则

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
                                                                                <input type="text" id="long" class="m-wrap large" value="<?=$product['lm_longitude']?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="control-group">
                                                                            <label class="control-label">纬度:</label>
                                                                            <div class="controls">
                                                                                <input type="text" id="lat" class="m-wrap large" value="<?=$product['lm_latitude']?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="control-group">
                                                                            <label class="control-label">地址:</label>
                                                                            <div class="controls">
                                                                                <input type="text" id="address" class="m-wrap large" value="<?=$product['lm_address']?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-actions">
                                                                            <button type="submit" class="btn blue" onclick="saveMap();">保存</button>
                                                                        </div>
                                                    
                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                             <a type="submit" class="btn blue" target="_blank" href="http://www.cattrip.net/app/views/product/detail.php?id=<?=$id?>">预览H5详情</a>
                                             <a type="submit" class="btn blue" target="_blank" href="http://pc.cattrip.net/product-details/<?=$id?>.html">预览PC详情</a>  
                                        </div>

                                        <div class="tab-pane row-fluid" id="tab_2_2">
                                            <div class="accordion" id="web_desc">
                                                <div class="accordion-group">
                                                    <div class="accordion-heading"><a class="accordion-toggle collapsed" contenteditable="true" data-parent="#web_desc" data-toggle="collapse" href="#web-1">产品亮点</a></div>

                                                    <div class="accordion-body collapse" id="web-1" style="height: 0px;">
                                                        <div class="accordion-inner" contenteditable="true">
                                                            <?php $this->load->view('productdesc/web_h.php');?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                    <a class="accordion-toggle" contenteditable="true" data-parent="#web_desc" data-toggle="collapse" href="#web-2">商品详情</a>
                                                    </div>
                                                    <div class="accordion-body collapse" id="web-2" style="height: 0px;">
                                                    <div class="accordion-inner" contenteditable="true">
                                                        <?php $this->load->view('productdesc/web_d.php');?>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                    <a class="accordion-toggle" contenteditable="true" data-parent="#web_desc" data-toggle="collapse" href="#web-3">行程安排</a>
                                                    </div>
                                                    <div class="accordion-body collapse" id="web-3" style="height: 0px;">
                                                    <div class="accordion-inner" contenteditable="true">
                                                        <?php $this->load->view('productdesc/web_t.php');?>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                    <a class="accordion-toggle" contenteditable="true" data-parent="#web_desc" data-toggle="collapse" href="#web-4">费用说明</a>
                                                    </div>
                                                    <div class="accordion-body collapse" id="web-4" style="height: 0px;">
                                                    <div class="accordion-inner" contenteditable="true">
                                                        <?php $this->load->view('productdesc/web_c.php');?>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                    <a class="accordion-toggle" contenteditable="true" data-parent="#web_desc" data-toggle="collapse" href="#web-5">预定需知</a>
                                                    </div>
                                                    <div class="accordion-body collapse" id="web-5" style="height: 0px;">
                                                    <div class="accordion-inner" contenteditable="true">
                                                        <?php $this->load->view('productdesc/web_b.php');?>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                    <a class="accordion-toggle" contenteditable="true" data-parent="#web_desc" data-toggle="collapse" href="#web-6">退改规则</a>
                                                    </div>
                                                    <div class="accordion-body collapse" id="web-6" style="height: 0px;">
                                                    <div class="accordion-inner" contenteditable="true">
                                                        <?php $this->load->view('productdesc/web_k.php');?>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                           <!--  <a type="submit" class="btn blue" target="_blank" href="">预览详情</a> -->
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
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
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
<div class="modal fade " id="cateModal" style="display: none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">添加分类</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="category" action="#" novalidate="novalidate" method="post">
                <div class="form-group">
                    <?php if(empty(!$allcate)):?>
                        <?php foreach($allcate as $key => $val):?>
                        <?php if(isset($val['child'])):?>
                            <div class="control-group">
                                <label class="control-label"><?=$val['name']?>:</label>
                                <div class="controls">
                                <?php foreach($val['child'] as $k => $v):?>
                                    <div class="btn <?php if(in_array($v['id'],$ids)){echo 'blue';}?>" onclick="selectTag(this);"><?=$v['name']?><input type="hidden" name="cate" title="<?=$v['name']?>" value="<?=$v['id']?>"></div>
                                <?php endforeach;?>
                                </div>
                            </div>
                        <?php endif;?>
                        <?php endforeach ?>
                    <?php endif;?>
                 <!--    <?php if(!empty($allcate)): ?>
                        <?php foreach($allcate as $cateRow):?>
                            <?php foreach($cateRow as $cRow):?>
                                <div class="btn <?php if(in_array($cRow['id'],$ids)){echo 'blue';}?>" onclick="selectTag(this);"><?=$cRow['name']?><input type="hidden" name="cate" title="<?=$cRow['name']?>" value="<?=$cRow['id']?>"> </div>
                            <?php endforeach;?>
                        <?php endforeach ?>
                    <?php endif; ?> -->
                </div>
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveCate">确定</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">取消</button>
            </div>
        </div>
    </div>
</div>

<!--模态框结束-->

<!-- END PAGE -->

<?php $this->load->view('block/footer.php')?>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/form-validation.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/custom-popover.js" type="text/javascript" ></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/custom-validate.js" type="text/javascript" ></script>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/ueditor/lang/zh-cn/zh-cn.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/json.js" type="text/javascript"></script>
<script data-pace-options='{"ajax": false}' src="<?=STATIC_FILE_HOST?>assets/plugin/pace/pace.js"></script>

<script type="text/javascript">

    //标签
    $("#saveBtn").click(function(){
        var lab = new Array();
        var obj = $("#lab");
        var isReturn = false;
        $("input[name^='lab']").each(function(){
            if($(this).val().length>4){
                layer.msg('单个标签最多4个字符！');
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
            obj.prepend(html);
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
$(function(){
    UE.getEditor('travel_highlights',{
        initialFrameWidth:900,
        initialFrameHeight:400,
        topOffset:42,
        wordCount:false,
        elementPathEnabled:false
    })
    UE.getEditor('travel_desc',{
        initialFrameWidth:900,
        initialFrameHeight:400,
        topOffset:42,
        wordCount:false,
        elementPathEnabled:false
    })
    UE.getEditor('travel_cost',{
        initialFrameWidth:900,
        initialFrameHeight:400,
        topOffset:42,
        wordCount:false,
        elementPathEnabled:false
    })
    UE.getEditor('travel_book',{
        initialFrameWidth:900,
        initialFrameHeight:400,
        topOffset:42,
        wordCount:false,
        elementPathEnabled:false
    })
    UE.getEditor('travel_know',{
        initialFrameWidth:900,
        initialFrameHeight:400,
        topOffset:42,
        wordCount:false,
        elementPathEnabled:false
    })
    UE.getEditor('travel_arrange',{
        initialFrameWidth:900,
        initialFrameHeight:400,
        topOffset:42,
        wordCount:false,
        elementPathEnabled:false
    })
    //增加按钮
    UE.registerUI('addimg',function(editor,uiName){
    //创建dialog
    var dialog = new UE.ui.Dialog({
        //指定弹出层中页面的路径，这里只能支持页面,因为跟addCustomizeDialog.js相同目录，所以无需加路径
        iframeUrl:'/product/mangerImg',
        //需要指定当前的编辑器实例
        editor:editor,
        //指定dialog的名字
        name:uiName,
        //dialog的标题
        title:"添加图片",

        //指定dialog的外围样式

        cssRules:"width:1000px;height:500px;",

        //如果给出了buttons就代表dialog有确定和取消
        buttons:[
            {
                className:'edui-okbutton',
                label:'插入',
                onclick:function () {
                    var html = '';
                    var focusTab = '#cloud';
                    if(jQuery('iframe').contents().find('li.active a').attr('href')=='#upload') focusTab = '#upload';
                    var iframe = jQuery('iframe').contents().find(focusTab);
                    var size = iframe.find('.ui-selected').size();
                    if(size <= 0){
                        layer.msg('请选择图片插入');
                        return false;
                    }
                    iframe.find('.ui-selected').each(function(){
                        var src = $(this).find('img').attr('src');
                        if(focusTab=="#upload"&& (typeof src!="undefined")){
                            src  = src.split('?')[0];
                        }
                        if(typeof src!="undefined"){
                            html += '<p><img src="'+src+'"></p>';
                        }
                    });

                    editor.focus();
                    editor.execCommand('inserthtml',html);
                    dialog.close(true);
                }
            },
            {
                className:'edui-cancelbutton',
                label:'取消',
                onclick:function () {
                    dialog.close(false);
                }
            }
        ]});

    //参考addCustomizeButton.js
    var btn = new UE.ui.Button({
        name:'dialogbutton' + uiName,
        title:'dialogbutton' + uiName,
        //需要添加的额外样式，指定icon图标，这里默认使用一个重复的icon
        cssRules :'background-position: -726px -77px;',
        onclick:function () {
            //渲染dialog
            dialog.render();
            dialog.open();
        }
    });

    return btn;
}/*index 指定添加到工具栏上的那个位置，默认时追加到最后,editorId 指定这个UI是那个编辑器实例上的，默认是页面上所有的编辑器都会添加这个按钮*/);
})

    //经纬度
   function saveMap(){
        var long = $('#long').val();
        var lat = $('#lat').val();
        var address = $('#address').val();
       if(lat==''){
           layer.msg('请输入纬度！');
           return false;
       }
       if(long==''){
           layer.msg('请输入经度！');
           return false;
       }
       if(address==''){
           layer.msg('请输入地址！');
           return false;
       }
        $.post("/product/saveMap/<?=$id?>",{long:long,lat:lat,address:address},function(result){
            if(result.error_code==0){
                layer.msg('保存成功！');
            }else{
                layer.msg('保存失败！');
            }
        });
    }
    function save_cont(obj){
        var content = UE.getEditor(obj).getContent();
        $.post("/product/saveDesc/<?=$id?>",{type:obj,data:content},function(result){
            var obj=eval('('+result+')');
            if(obj.error_code==0){
                layer.msg('保存成功！');
            }else{
                layer.msg('保存失败！');
            }
        });
    }
</script>

<script type="text/javascript">
    function  submitForm(){
        if(format_validate()){
            $('#form_sample_2').submit();
        }
    }

    function format_validate(){
        var format_list = new Array();
        var format_val_list = new Array();
        var flag = true;
        var is_change;
        $('.format').each(function(){
            if(!valid_required($(this).val())){
                flag = false;
                show_error_css($(this));
            }
            if($(this).next().attr('checked')=='checked'){
                 is_change = 1;
            }else {
                 is_change = 0;
            }
            format_list.push({
                id : $(this).attr('data'),
                name_3rd : $(this).val(),
                is_change: is_change
            });
        });

        $('.format_val').each(function(){
            if(!valid_required($(this).val())){
                flag = false;
                show_error_css($(this));
            }
            format_val_list.push({
                id : $(this).attr('data'),
                name_3rd : $(this).val()
            });
        });
        $("#format_list").text(JSON.stringify(format_list));
        $("#format_val_list").text(JSON.stringify(format_val_list));

        var sale_name = $("input[name='sale_name']");
        var sale_title = $("input[name='sale_title']");
        var catesize = $("#category").find('.blue').size();
        if(catesize<=0){
            flag = false;
            layer.msg('商品分类必填');
        }
        if(!valid_required(sale_name.val())){
            flag = false;
            show_error_css(sale_name);
        }
        if(!valid_required(sale_title.val())){
            flag = false;
            show_error_css(sale_title);
        }
        //var list= $('input:radio[name="is_change"]:checked').val();
        //if(list==null){
        //    layer.msg("请选择是否可改!");
        //    return false;
       // }
        return flag;
    }

    function show_error_css(element){
        element.css('border','1px solid #b94a48');

        element.click(function(){
            $(this).css('border','1px solid #e5e5e5');
        });

        element.focus(function(){
            $(this).css('border','1px solid #e5e5e5');
        });

        element.change(function(){
            $(this).css('border','1px solid #e5e5e5');
        });
    }
</script>
