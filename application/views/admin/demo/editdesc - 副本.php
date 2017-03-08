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
                                        <li class="active"><a href="#tab_2_1" data-toggle="tab">移动端商详</a></li>
                                        <li><a href="#tab_2_2" data-toggle="tab" href="">web端商详</a></li>
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
                                            <a type="submit" class="btn blue" target="_blank" href="/product/preview/<?=$id?>">预览详情</a>
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
                                            <a type="submit" class="btn blue" target="_blank" href="">预览详情</a>
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
<div class="modal fade " id="cateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    var desc =  <?php if(!empty($desc)) echo json_encode($desc); else echo '""';?>;
    var list =  <?php echo json_encode($list);?>;
    var web_desc =  <?php if(!empty($web_desc)) echo json_encode($web_desc); else echo '""';?>;
    var web_list =  <?php echo json_encode($web_list);?>;
    $(function(){
        for(z=0;z<list.length;z++){
            if(desc.hasOwnProperty(list[z].en)){
                for(var i=0;i<desc[list[z].en].length;i++){
                    if(desc[list[z].en][i].type=='img'){
                        addImg(this,z,true,list[z].en);
                        for(var j=0;j<desc[list[z].en][i].pic.length;j++){
                            //图片宽高属性获取开始
                            var img_attr_str = "";
                            if(desc[list[z].en][i].attr != undefined)
                            {
                                var img_attr = desc[list[z].en][i].attr[j];
                                if(img_attr != undefined)
                                {
                                    img_attr_str = " data-w=\""+img_attr.w+"\"  data-h=\""+img_attr.h+"\"";
                                }
                            }
                            //图片宽高属性获取结束
                            var newElement = "<li><img class='content' src='" + desc[list[z].en][i].pic[j] + "' style=\"width:100px;height:100px;\""+img_attr_str+">" +
                                "<img class='button' src=" +base_url+ "assets/plugin/uploadify/fancy_close.png></li>";
                            $('#'+list[z].en +'> .'+z).eq(i).find("input").val(desc[list[z].en][i].title)
                            $('#'+list[z].en+'> .'+z).eq(i).find('ul').append(newElement);
                            $('#'+list[z].en+'> .'+z).eq(i).find("img.button").bind("click", del);
                        }
                    }
                    if(desc[list[z].en][i].type=='text'){
                        addText(this,z,true,list[z].en);
                        $('#'+list[z].en+' > .'+z).eq(i).find("input").val(desc[list[z].en][i].title)
                        $('#'+list[z].en+' > .'+z).eq(i).find('textarea').val(desc[list[z].en][i].cont);
                    }
                }
            }
        }

        for(z=0;z<web_list.length;z++){
            if(web_desc.hasOwnProperty(web_list[z].en)){
                for(var i=0;i<web_desc[web_list[z].en].length;i++){
                    if(web_desc[list[z].en][i].type=='img'){
                        addWebImg(this,z,true,web_list[z].en);
                        for(var j=0;j<web_desc[web_list[z].en][i].pic.length;j++){
                            //图片宽高属性获取开始
                            var img_attr_str = "";
                            if(web_desc[web_list[z].en][i].attr != undefined)
                            {
                                var img_attr = web_desc[web_list[z].en][i].attr[j];
                                if(img_attr != undefined)
                                {
                                    img_attr_str = " data-w=\""+img_attr.w+"\"  data-h=\""+img_attr.h+"\"";
                                }
                            }
                            //图片宽高属性获取结束
                            var newElement = "<li><img class='content' src='" + web_desc[web_list[z].en][i].pic[j] + "' style=\"width:100px;height:100px;\"" + img_attr_str + ">" +
                                "<img class='button' src=" +base_url+ "assets/plugin/uploadify/fancy_close.png></li>";
                            $('#pc_'+web_list[z].en+'> .'+z).eq(i).find('ul').append(newElement);
                            $('#pc_'+web_list[z].en+'> .'+z).eq(i).find("img.button").bind("click", del);
                        }
                    }
                    if(web_desc[web_list[z].en][i].type=='text'){
                        addWebText(this,z,true,web_list[z].en);
                        $('#pc_'+web_list[z].en+' > .'+z).eq(i).find('textarea').val(web_desc[web_list[z].en][i].cont);
                    }
                    if(web_desc[web_list[z].en][i].type=='title'){
                        addWebTitle(this,z,true,web_list[z].en);
                        $('#pc_'+web_list[z].en+' > .'+z).eq(i).find("input[name='title']").val(web_desc[web_list[z].en][i].title);
                    }
                }
            }
        }
    })

    function delHtml(obj){
        layer.confirm('确定删除？', {
            btn: ['是','否'] //按钮
        }, function(index){
            $(obj).parent().remove();
            layer.close(index);
        }, function(){

        });
    }

    function getUuid(){
        var time=new Date().getTime();
        var randomNum=Math.floor(Math.random()*1000+1);
        return ''+time+randomNum;
    }

    function addImg(obj,type,shelf,kind){
        shelf = arguments[2] ? arguments[2]:false;
        kind = arguments[3] ? arguments[3]:'';
        var timestamp = getUuid();
        var html = '';
        html += "<div class='"+type+" margin-bottom-10 edit_wrap' title='img'>";
        html += "<input type='text' name='title' placeholder='标题'> <a class='btn blue' onclick='addText(this,"+type+",true);'>文</a> <a class='btn blue' onclick='addImg(this,"+type+",true);'>图</a> <a class='btn blue' onclick='delHtml(this);'>删除</a> ";
        html += "<a class='btn blue' onclick='sortUp(this);'>↑</a> <a class='btn blue' onclick='sortDown(this);'>↓</a>";
        html += "<div style='width:750px; height: auto;border:1px solid #e1e1e1;font-size:12px; padding:10px;'><div id='thumbnails'>";
        html += "<ul id='pic_list' style='margin:5px;'></ul> <div style='clear:both;'></div></div><input class='file_upload' name='file_upload' id='"+timestamp+"' type='file' multiple='true'></div>";
        if(shelf==false){
            $(obj).parent().next().append(html);
        }else if(kind!=''){
            $('#'+kind).append(html);
        }else{
            $(obj).parent().after(html);
        }
        $("#"+timestamp).uploadify({
            height        : 27,
            width         : 80,
            buttonText   : '选择图片',
            fileSizeLimit : '100KB',
            fileTypeDesc : 'Image Files',
            fileTypeExts : '*.gif; *.jpg; *.png; *.jpeg',
            swf         : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            auto: true,
            multi: true,
            formData : { 'min': '692'},
            uploader      : '/upload/uploadPic/',
            onUploadSuccess:function(file,data,response){
                var obj=eval('('+data+')');
                if(obj.error_code==0) {
                    var newElement = "<li><img class='content' src='" + image_url + obj.path + "' style=\"width:100px;height:100px;\" data-w='"+ obj.width +"' data-h='" + obj.height + "'><img class='button' src=" + base_url + "assets/plugin/uploadify/fancy_close.png></li>";
                    $('#' + timestamp).prev().find('ul').append(newElement);
                    $('#' + timestamp).prev().find("img.button").last().bind("click", del);
                }else {
                    alert(obj.error_msg);
                    return false;
                }
            },
        });
    }

    function addText(obj,type,shelf,kind){
        shelf = arguments[2] ? arguments[2]:false;
        kind = arguments[3] ? arguments[3]:'';
        var timestamp = getUuid();
        var html = "";
        html += "<div class='"+type+" margin-bottom-10 edit_wrap' title='text'>";
        html += "<input type='text' name='title' placeholder='标题' value=''> <a class='btn blue' onclick='addText(this,"+type+",true);'>文</a> <a class='btn blue' onclick='addImg(this,"+type+",true);'>图</a> <a class='btn blue' onclick='delHtml(this);'>删除</a> ";
        html += "<a class='btn blue' onclick='sortUp(this);'>↑</a> <a class='btn blue' onclick='sortDown(this);'>↓</a>";
        html += "<div><textarea id='"+timestamp+"' name='content'></textarea></div>";
        html += "</div>";
        if(shelf==false){
            $(obj).parent().next().append(html);
        }else if(kind!=''){
            $('#'+kind).append(html)
        } else{
            $(obj).parent().after(html);
        }
        UE.getEditor(timestamp,{
            toolbars: [
                [ 'source', 'undo', 'redo', 'bold','forecolor','indent']
            ],
            initialFrameWidth:780,
            initialFrameHeight:300
        });
        UE.getEditor(timestamp).addListener("afterinserthtml",function(){
            var r = /style="[^"]*"/g;
            UE.getEditor(timestamp).setContent(UE.getEditor(timestamp).getContent().replace(r, ''));
        });
    }
    function del(){
        var src = $(this).siblings('img').attr('src');
        $(this).parent().remove();
    }
    function save_cont(type){
        var i = 0;
        var data = {};
        var result = true;
        $('#accordion1 .'+type).each(function(){
            var title = $(this).attr('title');
            var temp = {};
            var tit = $(this).find("input[name='title']").val();
            //if(tit==''){
            //    layer.msg('标题不能为空！');
            //    result = false;
            //}
            if(title == 'img'){
                var pic = [];
                var attr = [];
                if($(this).find('.content').length<=0){
                    layer.msg('请上传图片！');
                    result = false;
                }
                $(this).find('.content').each(function(){
                    pic.push($(this).attr('src'));
                    var w = $(this).data("w");
                    var h = $(this).data("h");
                    attr.push({"w":w,"h":h});
                });
                temp = {
                    'type': title,
                    'title': tit,
                    'pic' : pic,
                    'attr' : attr,
                };
            }else{
                var id =  $(this).find(".edui-default").eq(0).attr('id');
                var cont = UE.getEditor(id).getContent();
                if(cont==''){
                    layer.msg('请填写文本！');
                    result = false;
                }
                temp = {
                    'type': title,
                    'title': tit,
                    'cont' : cont,
                }
            }
            data[i] = temp;
            i++;
        })
        if(result==false){
            return false;
        }
        //alert(JSON.stringify(data));return false;
        $.post("/product/saveDesc/<?=$id?>",{type:type,data:JSON.stringify(data)},function(result){
            var obj=eval('('+result+')');
            if(obj.error_code==0){
                layer.msg('保存成功！');
            }else{
                layer.msg('保存失败！');
            }
        });
    }

    function save_web_cont(type){
        var i = 0;
        var data = {};
        var result = true;
        var client = 'web';
        $('#web_desc .'+type).each(function(){
            var title = $(this).attr('title');
            var temp = {};
            //var tit = $(this).find("input[name='title']").val();
            if(title == 'img'){
                var pic = [];
                var attr = [];
                if($(this).find('.content').length<=0){
                    layer.msg('请上传图片！');
                    result = false;
                }
                $(this).find('.content').each(function(){
                    pic.push($(this).attr('src'));
                    var w = $(this).data("w");
                    var h = $(this).data("h");
                    attr.push({"w":w,"h":h});
                });
                temp = {
                    'type': title,
                    'pic' : pic,
                    'attr' : attr,
                };
            }else if(title == 'text'){
                var id =  $(this).find(".edui-default").eq(0).attr('id');
                var cont = UE.getEditor(id).getContent();
                if(cont==''){
                    layer.msg('请填写文本！');
                    result = false;
                }
                temp = {
                    'type': title,
                    'cont' : cont,
                }
            }else{
                var web_title = $(this).find("input[name='title']").val();
                if(web_title == ''){
                    layer.msg('请填写标题！');
                    result = false;
                }
                temp = {
                    'type' : title,
                    'title' : web_title,
                }
            }
            data[i] = temp;
            i++;
        })
        if(result==false){
            return false;
        }
        //alert(type);return false;
        //alert(JSON.stringify(data));return false;
        $.post("/product/saveDesc/<?=$id?>",{client:client,type:type,data:JSON.stringify(data)},function(result){
            var obj=eval('('+result+')');
            if(obj.error_code==0){
                layer.msg('保存成功！');
            }else{
                layer.msg('保存失败！');
            }
        });
    }    

    //经纬度
   function saveMap(){
        var long = $('#long').val();
        var lat = $('#lat').val();
        var address = $('#address').val();
        //var longReg = /^-?(?:(?:180(?:\.0{1,5})?)|(?:(?:(?:1[0-7]\d)|(?:[1-9]?\d))(?:\.\d{1,5})?))$/;
        //var latReg = /^-?(?:90(?:\.0{1,5})?|(?:[1-8]?\d(?:\.\d{1,5})?))$/;
        //if(!longReg.test(long)){
        //    layer.msg('经度填写格式不正确！');
        //   return false;
        //}
        //if(!latReg.test(lat)){
        //    layer.msg('纬度填写格式不正确！');
        //    return false;
        //}
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

   function sortUp(obj){
       var html = $(obj).parent();
       var prev = $(obj).parent().prev().html();
       if(prev == undefined){
           layer.msg('已经是第一位了!');
           return false;
       }
       $(obj).parent().prev().before(html);
   }

    function sortDown(obj){
        var html = $(obj).parent();
        var next = $(obj).parent().next().html();
        if(next == undefined){
            layer.msg('已经是最后位了!');
            return false;
        }
        $(obj).parent().next().after(html);
        //$(obj).parent().remove();
    }

    function addWebImg(obj,type,shelf,kind){
        shelf = arguments[2] ? arguments[2]:false;
        kind = arguments[3] ? arguments[3]:'';
        var timestamp = getUuid();
        var html = '';
        html += "<div class='"+type+" margin-bottom-10 edit_wrap' title='img'>";
        html += "<a class='btn blue' onclick='addWebTitle(this,"+type+",true);'>标题</a> <a class='btn blue' onclick='addWebText(this,"+type+",true);'>文</a> <a class='btn blue' onclick='addWebImg(this,"+type+",true);'>图</a> <a class='btn blue' onclick='delHtml(this);'>删除</a> ";
        html += "<a class='btn blue' onclick='sortUp(this);'>↑</a> <a class='btn blue' onclick='sortDown(this);'>↓</a>";
        html += "<div class='margin-top-10' style='width:750px; height: auto;border:1px solid #e1e1e1;font-size:12px; padding:10px;'><div id='thumbnails'>";
        html += "<ul id='pic_list' style='margin:5px;'></ul> <div style='clear:both;'></div></div><input class='file_upload' name='file_upload' id='"+timestamp+"' type='file' multiple='true'></div>";
        if(shelf==false){
            $(obj).parent().next().append(html);
        }else if(kind!=''){
            $('#pc_'+kind).append(html);
        }else{
            $(obj).parent().after(html);
        }
        $("#"+timestamp).uploadify({
            height        : 27,
            width         : 80,
            buttonText   : '选择图片',
            fileSizeLimit : '100KB',
            fileTypeDesc : 'Image Files',
            fileTypeExts : '*.gif; *.jpg; *.png; *.jpeg',
            swf         : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            auto: true,
            multi: true,
            formData : { 'min': '692'},
            uploader      : '/upload/uploadPic/',
            onUploadSuccess:function(file,data,response){
                var obj=eval('('+data+')');
                if(obj.error_code==0) {
                    var newElement = "<li><img class='content' src='" + image_url + obj.path + "' style=\"width:100px;height:100px;\" data-w='"+ obj.width +"' data-h='" + obj.height + "'><img class='button' src=" + base_url + "assets/plugin/uploadify/fancy_close.png></li>";
                    $('#' + timestamp).prev().find('ul').append(newElement);
                    $('#' + timestamp).prev().find("img.button").last().bind("click", del);
                }else {
                    alert(obj.error_msg);
                    return false;
                }
            },
        });
    }

    function addWebText(obj,type,shelf,kind){
        shelf = arguments[2] ? arguments[2]:false;
        kind = arguments[3] ? arguments[3]:'';
        var timestamp = getUuid();
        var html = "";
        html += "<div class='"+type+" margin-bottom-10 edit_wrap' title='text'>";
        html += "<a class='btn blue' onclick='addWebTitle(this,"+type+",true);'>标题</a> <a class='btn blue' onclick='addWebText(this,"+type+",true);'>文</a> <a class='btn blue' onclick='addWebImg(this,"+type+",true);'>图</a> <a class='btn blue' onclick='delHtml(this);'>删除</a> ";
        html += "<a class='btn blue' onclick='sortUp(this);'>↑</a> <a class='btn blue' onclick='sortDown(this);'>↓</a>";
        html += "<div class='margin-top-10'><textarea id='"+timestamp+"' name='content'></textarea></div>";
        html += "</div>";
        if(shelf==false){
            $(obj).parent().next().append(html);
        }else if(kind!=''){
            $('#pc_'+kind).append(html)
        } else{
            $(obj).parent().after(html);
        }
        UE.getEditor(timestamp,{
            toolbars: [
                [ 'source', 'undo', 'redo', 'bold','forecolor','indent']
            ],
            initialFrameWidth:780,
            initialFrameHeight:300
        });
        UE.getEditor(timestamp).addListener("afterinserthtml",function(){
            var r = /style="[^"]*"/g;
            UE.getEditor(timestamp).setContent(UE.getEditor(timestamp).getContent().replace(r, ''));
        });
    }

    function addWebTitle(obj,type,shelf,kind){
        shelf = arguments[2] ? arguments[2]:false;
        kind = arguments[3] ? arguments[3]:'';
        var timestamp = getUuid();
        var html = "";
        shelf = arguments[2] ? arguments[2]:false;
        kind = arguments[3] ? arguments[3]:'';
        var timestamp = getUuid();
        var html = "";
        html += "<div class='"+type+" margin-bottom-10 edit_wrap' title='title'>";
        html += "<a class='btn blue' onclick='addWebTitle(this,"+type+",true);'>标题</a> <a class='btn blue' onclick='addWebText(this,"+type+",true);'>文</a> <a class='btn blue' onclick='addWebImg(this,"+type+",true);'>图</a> <a class='btn blue' onclick='delHtml(this);'>删除</a> ";
        html += "<a class='btn blue' onclick='sortUp(this);'>↑</a> <a class='btn blue' onclick='sortDown(this);'>↓</a>";
        html += "<div class='margin-top-10'><input type='text' name='title' placeholder='标题' value=''></div>";
        html += "</div>";
        if(shelf==false){
            $(obj).parent().next().append(html);
        }else if(kind!=''){
            $('#pc_'+kind).append(html)
        } else{
            $(obj).parent().after(html);
        }
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
