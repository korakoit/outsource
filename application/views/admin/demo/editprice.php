<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>
<link href="<?=STATIC_FILE_HOST?>assets/css/fullcalendar.css" rel="stylesheet" type="text/css"/>

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

                        <li><a href="/product/editThird/<?=$id?>">图片管理</a></li>

                        <li class="active"><a href="#tab_1_4" data-toggle="tab">价格管理</a></li>

                        <li><a href="/product/editFive/<?=$id?>">评价管理</a></li>

                        <li><a href="/product/editSix/<?=$id?>">上下架管理</a></li>
                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane row-fluid" id="tab_1_1">

                        </div>


                        <div class="tab-pane profile-classic row-fluid" id="tab_1_2">

                        </div>

                        <div class="tab-pane row-fluid profile-account" id="tab_1_3">

                        </div>


                        <div class="tab-pane row-fluid profile-account active" id="tab_1_4">
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption"><i class="icon-reorder"></i>价格设置</div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="row-fluid margin-bottom-10">
                                        <select tabindex="1" class="large m-wrap" id="sku_name">
                                            <option value="0">请选择SKU</option>
                                            <?php if(!empty($list)):?>
                                            <?php foreach($list as $skuKey => $skuRow):?>
                                                <?php if($skuRow['supplier_status']!=0):?>
                                                    <?php if(empty($skuRow['sku_remark'])):?>
                                                        <option value="<?=$skuRow['sku_sale_id']?>" <?php if($skuRow['sku_sale_id']==$sid){echo 'selected';}?>><?=$skuRow['sku_name']?></option>
                                                    <?php else:?>
                                                        <option value="<?=$skuRow['sku_sale_id']?>" <?php if($skuRow['sku_sale_id']==$sid){echo 'selected';}?>><?=$skuRow['sku_remark']?></option>
                                                    <?php endif;?>
                                                <?php endif;?>    
                                                <?php endforeach ?>
                                            <?php endif;?>
                                        </select>
                                    </div>

                                    <div class="row-fluid">
                                        <?php if(!empty($sku)): ?>
                                            <?php if($sku['is_date']==1):?>
                                                <div class="control-group"><button style="margin-left:10px" onclick="init_form_batch();return false;" class="btn blue pull-right">批量修改</button><button onclick="init_clear_dialog();return false;" class="btn blue pull-right">批量清空</button></div>
                                                <div id="ca"></div>
                                            <?php else: ?>
                                                <form class="form-horizontal" method="post"  id="not_date_stock_form" action="/sku/ajaxSavePrice" novalidate="novalidate">
                                                    <input type="hidden" name="sku_id" value="<?=$sku['sku_sale_id']?>"/>
                                                    <input type="hidden" name="price_id" value="<?=$sku_price['id']?>"/>
                                                    <?php if($sku['sale_unit']==0):?>
                                                        <?php if($sku['adult_selected']==1):?>
                                                            <div class="control-group">
                                                                <label class="control-label">成人价格<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input class="m-wrap"  value="<?=$sku_price['adult_price']?>" type="text" name="pc_adult_price"/>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">成人移动端价格<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input class="m-wrap"  value="<?=$sku_price['adult_mobile_price']?>" type="text" name="mobile_adult_price"/>
                                                                </div>
                                                            </div>
                                                        <?php endif;?>
                                                        <?php if($sku['child_selected']==1):?>
                                                            <div class="control-group">
                                                                <label class="control-label">儿童价格<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input class="m-wrap" value="<?=$sku_price['child_price']?>" type="text" name="pc_child_price"/>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">儿童移动端价格<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input class="m-wrap"  value="<?=$sku_price['child_mobile_price']?>" type="text" name="mobile_child_price"/>
                                                                </div>
                                                            </div>
                                                        <?php endif;?>
                                                        <?php if($sku['baby_selected']==1):?>
                                                            <div class="control-group">
                                                                <label class="control-label">婴儿价格<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input class="m-wrap"  value="<?=$sku_price['baby_price']?>" type="text" name="pc_baby_price"/>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">婴儿移动端价格<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input class="m-wrap"  value="<?=$sku_price['baby_mobile_price']?>" type="text" name="mobile_baby_price"/>
                                                                </div>
                                                            </div>
                                                        <?php endif;?>
                                                    <?php else:?>
                                                        <div class="control-group">
                                                            <label class="control-label">单品PC端价格：<span class="required">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" value="<?=$sku_price['single_price']?>" name="pc_single_price" data-required="1" class="m-wrap">
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">单品移动端价格：<span class="required">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" value="<?=$sku_price['single_mobile_price']?>" name="mobile_single_price" data-required="1" class="m-wrap">
                                                            </div>
                                                        </div>
                                                    <?php endif;?>
                                                    <div class="form-actions">
                                                        <a onclick="submit_not_date_stock_form()" class="btn green">保存</a>
                                                    </div>
                                                 </form>
                                            <?php endif;?>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane row-fluid" id="tab_1_5">

                            <div class="row-fluid">


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

<!-- BEGIN DIALOG -->
<!-- 清空价格dialog （Modal） -->
<div class="modal fade" id="clear_dialog" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;min-width:800px">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                </button>
                <h4 class="modal-title" id="myModalLabel">
                </h4>
            </div>
            <div class="modal-body" id="validate_tip">
                <div class="row-fluid">
                    <div class="span12">
                        <div id="dialog_clear_alert" class="alert alert-error" style="display:none">
                            <button class="close" onclick="$('#dialog_clear_alert').hide()"></button>
                            <strong id="dialog_clear_tip"></strong>
                        </div>
                        <form class="form-horizontal" method="post"  id="clear_form" action="/sku/ajaxClearDatePrice" novalidate="novalidate">
                            <input type="hidden" name="sku_id" value="<?=$sku['sku_sale_id']?>"/>
                            <div class="control-group">
                                <label class="control-label">选择时间段:<span class="required">*</span></label>
                                <div class="controls">
                                    <input class="m-wrap span5" size="16" type="text" id="clear_begin" name="clear_begin" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',el:'clear_begin'})"/>
                                    <span class="text-inline">to</span>
                                    <input class="m-wrap span5" size="16" type="text" id="clear_end" name="clear_end" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',el:'clear_end'})"/>
                                </div>
                            </div>

                            <div id="clear_period_div">
                                <div class="control-group">
                                    <label class="control-label">在以上时间段中选择：<span class="required">*</span></label>
                                    <div class="controls">
                                        <label class="radio">
                                            <input id="clear_readio_first" type="radio" name="clear_period" value="0" checked>全部
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="clear_period" value="1">单日
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="clear_period" value="2">双日
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="clear_period" value="3">星期
                                        </label>
                                    </div>
                                </div>

                                <div class="control-group" id="clear_week_div">
                                    <label class="control-label"></label>
                                    <div class="controls">
                                        <label class="checkbox">
                                            <input type="checkbox" name="clear_week_day_list[]" value="Monday">星期一
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="clear_week_day_list[]" value="Tuesday">星期二
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="clear_week_day_list[]" value="Wednesday">星期三
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="clear_week_day_list[]" value="Thursday">星期四
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="clear_week_day_list[]" value="Friday">星期五
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="clear_week_day_list[]" value="Saturday">星期六
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="clear_week_day_list[]" value="Sunday">星期日
                                        </label>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">关闭
                </button>
                <input type="button" class="btn blue" value="提交更改" onclick="dialog_clear_submit()" />
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!-- END DIALOG -->

<!-- BEGIN DIALOG -->
<!-- 日期价格修改dialog （Modal） -->
<div class="modal fade" id="stock_form" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;min-width:800px">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                </button>
                <h4 class="modal-title" id="myModalLabel">
                </h4>
            </div>
            <div class="modal-body" id="validate_tip">
                <div class="row-fluid">
                    <div class="span12">
                        <div id="dialog_form_alert" class="alert alert-error" style="display:none">
                            <button class="close" onclick="$('#dialog_form_alert').hide()"></button>
                            <strong id="dialog_form_tip"></strong>
                        </div>
                        <form class="form-horizontal" method="post"  id="dialog_form" action="/sku/ajaxSavePrice" novalidate="novalidate">
                            <input type="hidden" name="sku_id" value="<?=$sku['sku_sale_id']?>"/>
                            <div class="control-group">
                                <label class="control-label">选择时间段:<span class="required">*</span></label>
                                <div class="controls">
                                    <input class="m-wrap span5" size="16" type="text" id="begin" name="begin" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',el:'begin'})"/>
                                    <span class="text-inline">to</span>
                                    <input class="m-wrap span5" size="16" type="text" id="end" name="end" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',el:'end'})"/>
                                </div>
                            </div>

                            <div id="period_div">
                                <div class="control-group">
                                    <label class="control-label">在以上时间段中选择：<span class="required">*</span></label>
                                    <div class="controls">
                                        <label class="radio">
                                            <input type="radio" name="period" value="0" checked>全部
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="period" value="1">单日
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="period" value="2">双日
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="period" value="3">星期
                                        </label>
                                    </div>
                                </div>

                                <div class="control-group" id="week_div">
                                    <label class="control-label"></label>
                                    <div class="controls">
                                        <label class="checkbox">
                                            <input type="checkbox" name="week_day_list[]" value="Monday">星期一
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="week_day_list[]" value="Tuesday">星期二
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="week_day_list[]" value="Wednesday">星期三
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="week_day_list[]" value="Thursday">星期四
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="week_day_list[]" value="Friday">星期五
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="week_day_list[]" value="Saturday">星期六
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="week_day_list[]" value="Sunday">星期日
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-left:0px">
                                <div class="span6">
                                    <div class="portlet-title">
                                        <div class="caption">售价设置</div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="span2"><strong style="line-height:30px">PC端</strong></div>
                                        <div class="span10">
                                            <?php if($sku['sale_unit']==0):?>
                                                <?php if($sku['adult_selected']==1):?>
                                                    <div class="control-group">
                                                        <label class="control-label span3">成人价格<span class="required">*</span></label>
                                                        <div class="controls span8">
                                                            <input class="m-wrap span9"  size="10" type="text" name="pc_adult_price"/>
                                                        </div>
                                                    </div>
                                                <?php endif;?>
                                                <?php if($sku['child_selected']==1):?>
                                                    <div class="control-group">
                                                        <label class="control-label span3">儿童价格<span class="required">*</span></label>
                                                        <div class="controls span8">
                                                            <input class="m-wrap span9"  size="10" type="text" name="pc_child_price"/>
                                                        </div>
                                                    </div>
                                                <?php endif;?>
                                                <?php if($sku['baby_selected']==1):?>
                                                    <div class="control-group">
                                                        <label class="control-label span3">婴儿价格<span class="required">*</span></label>
                                                        <div class="controls span8">
                                                            <input class="m-wrap span9"  size="10" type="text" name="pc_baby_price"/>
                                                        </div>
                                                    </div>
                                                <?php endif;?>
                                            <?php else:?>
                                                <div class="control-group">
                                                    <label class="control-label span3">单品价格<span class="required">*</span></label>
                                                    <div class="controls span8">
                                                        <input class="m-wrap span9"  size="10" type="text" name="pc_single_price"/>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="span2"><strong  style="line-height:30px">移动端</strong></div>
                                        <div class="span10">
                                            <?php if($sku['sale_unit']==0):?>
                                                <?php if($sku['adult_selected']==1):?>
                                                    <div class="control-group">
                                                        <label class="control-label span3">成人价格<span class="required">*</span></label>
                                                        <div class="controls span8">
                                                            <input class="m-wrap span9" size="10" type="text" name="mobile_adult_price"/>
                                                        </div>
                                                    </div>
                                                <?php endif;?>
                                                <?php if($sku['child_selected']==1):?>
                                                    <div class="control-group">
                                                        <label class="control-label span3">儿童价格<span class="required">*</span></label>
                                                        <div class="controls span8">
                                                            <input class="m-wrap span9" size="10" type="text" name="mobile_child_price"/>
                                                        </div>
                                                    </div>
                                                <?php endif;?>
                                                <?php if($sku['baby_selected']==1):?>
                                                    <div class="control-group">
                                                        <label class="control-label span3">婴儿价格<span class="required">*</span></label>
                                                        <div class="controls span8">
                                                            <input class="m-wrap span9" size="10" type="text" name="mobile_baby_price"/>
                                                        </div>
                                                    </div>
                                                <?php endif;?>
                                            <?php else:?>
                                                <div class="control-group">
                                                    <label class="control-label span3">单品价格<span class="required">*</span></label>
                                                    <div class="controls span8">
                                                        <input class="m-wrap span9" size="10" type="text" name="mobile_single_price"/>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                        <div class="control-group" style="margin-top:-15px">
                                        <label class="control-label span5" style="margin-left:-16px">促销活动标签<span class="required">*</span></label>
                                        <div class="controls span7">
                                            <input class="m-wrap span8" disabled size="10" type="text" name=""/>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="clearfix">
                                        <div class="span2"><strong style="line-height:30px">PC端</strong></div>
                                        <div class="span10">
                                            <?php if($sku['sale_unit']==0):?>
                                                <?php if($sku['adult_selected']==1):?>
                                                    <div class="control-group">
                                                        <label class="control-label span3">成人价格<span class="required">*</span></label>
                                                        <div class="controls span8">
                                                            <input class="m-wrap span9" disabled size="10" type="text" name=""/>
                                                        </div>
                                                    </div>
                                                <?php endif;?>
                                                <?php if($sku['child_selected']==1):?>
                                                    <div class="control-group">
                                                        <label class="control-label span3">儿童价格<span class="required">*</span></label>
                                                        <div class="controls span8">
                                                            <input class="m-wrap span9" disabled size="10" type="text" name=""/>
                                                        </div>
                                                    </div>
                                                <?php endif;?>
                                                <?php if($sku['baby_selected']==1):?>
                                                    <div class="control-group">
                                                        <label class="control-label span3">婴儿价格<span class="required">*</span></label>
                                                        <div class="controls span8">
                                                            <input class="m-wrap span9" disabled size="10" type="text" name=""/>
                                                        </div>
                                                    </div>
                                                <?php endif;?>
                                            <?php else:?>
                                                <div class="control-group">
                                                    <label class="control-label span3">单品价格<span class="required">*</span></label>
                                                    <div class="controls span8">
                                                        <input class="m-wrap span9" disabled size="10" type="text" name=""/>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="span2"><strong  style="line-height:30px">移动端</strong></div>
                                        <div class="span10">
                                            <?php if($sku['sale_unit']==0):?>
                                                <?php if($sku['adult_selected']==1):?>
                                                    <div class="control-group">
                                                        <label class="control-label span3">成人价格<span class="required">*</span></label>
                                                        <div class="controls span8">
                                                            <input class="m-wrap span9" disabled size="10" type="text" name=""/>
                                                        </div>
                                                    </div>
                                                <?php endif;?>
                                                <?php if($sku['child_selected']==1):?>
                                                <div class="control-group">
                                                    <label class="control-label span3">儿童价格<span class="required">*</span></label>
                                                    <div class="controls span8">
                                                        <input class="m-wrap span9" disabled size="10" type="text" name=""/>
                                                    </div>
                                                </div>
                                                <?php endif;?>
                                                <?php if($sku['baby_selected']==1):?>
                                                <div class="control-group">
                                                    <label class="control-label span3">婴儿价格<span class="required">*</span></label>
                                                    <div class="controls span8">
                                                        <input class="m-wrap span9" disabled size="10" type="text" name=""/>
                                                    </div>
                                                </div>
                                                <?php endif;?>
                                            <?php else:?>
                                                <div class="control-group">
                                                    <label class="control-label span3">单品价格<span class="required">*</span></label>
                                                    <div class="controls span8">
                                                        <input class="m-wrap span9" disabled size="10" type="text" name=""/>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">关闭
                </button>
                <input type="button" class="btn blue" value="提交更改" onclick="dialog_form_submit()" />
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!-- END DIALOG -->

<!-- END PAGE -->

<?php $this->load->view('block/footer.php')?>
<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.uniform.min.js" type="text/javascript" ></script>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script src='<?=STATIC_FILE_HOST?>assets/js/jquery-ui.js'></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.form.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/My97DatePicker/WdatePicker.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/form-validation.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/custom-popover.js" type="text/javascript" ></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/custom-validate.js" type="text/javascript" ></script>

<?php if($sku['is_date']==1):?>
<script type="text/javascript">
    var sku = <?=json_encode($sku)?>;
    var sku_price_list = <?php if(!empty($sku_price_list)) echo json_encode($sku_price_list); else echo '""';?>;
    $(function() {
        var today = get_today();
        //初始化日历
        $('#ca').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: ''
            },
            monthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
            monthNamesShort: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
            dayNames: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"],
            dayNamesShort: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"],
            today: ["今天"],
            firstDay: 1,
            buttonText: {
                today: '今天',
                month: '月',
                week: '周',
                day: '日',
                prev: '上一月',
                next: '下一月'
            },
            editable: true,
            dragOpacity: {
                agenda: .5,
                '': .6
            },
            defaultDate: today,
            dayClick: function (date, allDay, jsEvent, view) {
                var selDate =$.fullCalendar.formatDate(date,'yyyy-MM-dd');
                if(today<=selDate){
                    init_form_one(selDate);
                    $("#stock_form").modal('show');
                }
            },
        });

        //初始化时间表
        init_day_table();
        //上一页
        $('.fc-button-prev').click(function(){
            init_day_table();
        });
        //下一页
        $('.fc-button-next').click(function(){
            init_day_table();
        });
        //今天
        $('.fc-button-today').click(function(){
            init_day_table();
        });

        $('input[name="period"]').change(function(){
            if($('input[name="period"]:checked').val()==3){
                $("#week_div").show();
            }else{
                $("#week_div").hide();
            }
        });
        $('input[name="clear_period"]').change(function(){
            if($('input[name="clear_period"]:checked').val()==3){
                $("#clear_week_div").show();
            }else{
                $("#clear_week_div").hide();
            }
        });
    })

    function get_today(){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10) {
            dd='0'+dd;
        }
        if(mm<10) {
            mm='0'+mm;
        }
        today = yyyy+'-'+mm+'-'+dd;
        return today;
    }

    //单天初始化form
    function init_form_one(date){
        reset_form();
        $("#period_div").hide();
        if(sku_price_list.hasOwnProperty(date)){
            if(sku.sale_unit==0){
                if(sku.adult_selected==1){
                    $('input[name="pc_adult_price"]').val(sku_price_list[date].adult_price);
                    $('input[name="mobile_adult_price"]').val(sku_price_list[date].adult_mobile_price);
                }
                if(sku.child_selected==1){
                    $('input[name="pc_child_price"]').val(sku_price_list[date].child_price);
                    $('input[name="mobile_child_price"]').val(sku_price_list[date].child_mobile_price);
                }
                if(sku.baby_selected==1){
                    $('input[name="pc_baby_price"]').val(sku_price_list[date].baby_price);
                    $('input[name="mobile_baby_price"]').val(sku_price_list[date].baby_mobile_price);
                }
            }else{
                $('input[name="pc_single_price"]').val(sku_price_list[date].single_price);
                $('input[name="mobile_single_price"]').val(sku_price_list[date].single_mobile_price);
            }
        }
        $("#begin").val(date);
        $("#end").val(date);
    }

    function reset_form(){
        $("#dialog_form")[0].reset();
    }

    function init_clear_dialog(){
        $("#clear_form")[0].reset();
        $("#clear_form span.checked").each(function(index,obj){
           $(obj).removeClass('checked');
        });
        $('#clear_period_div').show();
        $("#clear_week_div").hide();
        $('#clear_readio_first').click();
        $("#clear_dialog").modal('show');
    }

    //批量修改初始化form
    function init_form_batch(){
        reset_form();
        $('#period_div').show();
        $("#week_div").hide();
        $("#stock_form").modal('show');
    }

    function dialog_form_submit(){
        if(dialog_form_validate()){
            $("#dialog_form").submit();
        }
    }

    function dialog_clear_submit(){
        if(dialog_clear_validate()){
            $("#clear_form").submit();
        }
    }

    $('#dialog_form').ajaxForm(function(data){
        if(data.error_code==0){
            sku_price_list = data.sku_price_list;
            init_day_table();
            $("#stock_form").modal('hide');
        }else{
            alert(data.error_msg);
        }
    });

    $('#clear_form').ajaxForm(function(data){
        if(data.error_code==0){
            sku_price_list = data.sku_price_list;
            init_day_table();
            $("#clear_dialog").modal('hide');
        }else{
            alert(data.error_msg);
        }
    });

    /**
     * [init_day_table 初始化table表的显示]
     * @return {[type]} [description]
     */
    function init_day_table(){
        $(".day_table").remove();
        $('.fc-day').each(function(){
            var data_date = $(this).attr('data-date');
                if(sku_price_list.hasOwnProperty(data_date)){
                    if($(this).hasClass('fc-first')){
                        $(this).find('.fc-day-number').parent().css('min-height','0px');
                    }
                    var sku_price = sku_price_list[data_date];
                    if(sku.sale_unit==0){
                        if(sku.adult_selected==1){
                            if(sku_price.adult_price>=0&&sku_price.adult_price!=null){
                                $(this).append('<div class="day_table" style="text-align:center">成人价格:'+sku_price.adult_price+'</div>');
                            }
                        }
                        if(sku.child_selected==1){
                            if(sku_price.child_price>=0&&sku_price.child_price!=null){
                                $(this).append('<div class="day_table" style="text-align:center">儿童价格:'+sku_price.child_price+'</div>');
                            }
                        }
                        if(sku.baby_selected == 1){
                            if(sku_price.baby_price>=0&&sku_price.baby_price!=null){
                                $(this).append('<div class="day_table" style="text-align:center">婴儿价格:'+sku_price.baby_price+'</div>');
                            } 
                        }
                        if(sku.adult_selected==1){
                            if(sku_price.adult_mobile_price>=0&&sku_price.adult_mobile_price!=null){
                                $(this).append('<div class="day_table" style="text-align:center">成人移动端价格:'+sku_price.adult_mobile_price+'</div>');
                            }
                        }
                        if(sku.child_selected==1){
                            if(sku_price.child_mobile_price>=0&&sku_price.child_mobile_price!=null){
                                $(this).append('<div class="day_table" style="text-align:center">儿童移动端价格:'+sku_price.child_mobile_price+'</div>');
                            }
                        }
                        if(sku.baby_selected == 1){
                            if(sku_price.baby_mobile_price>=0&&sku_price.baby_mobile_price!=null){
                                $(this).append('<div class="day_table" style="text-align:center">婴儿移动端价格:'+sku_price.baby_mobile_price+'</div>');
                            }
                        }
                    }else{
                        if(sku_price.single_price>=0&&sku_price.single_price!=null){
                            $(this).append('<div class="day_table" style="text-align:center">单品价格:'+sku_price.single_price+'</div>');
                        }
                        if(sku_price.single_mobile_price>=0&&sku_price.single_mobile_price!=null){
                            $(this).append('<div class="day_table" style="text-align:center">单品价格:'+sku_price.single_mobile_price+'</div>');
                        }
                    }
                    $(this).append('<div class="day_table" style="text-align:center"><label class="label tags-5" onclick="clearPrice(event,\''+data_date+'\')">清空</label></div>');
                }
        });
    }

    function clearPrice(e,date){
        layer.confirm('确定清空？', {
            btn: ['确定','取消']
        }, 
        function(index){
           $.post('/sku/ajaxClearDatePrice/',
                    {
                        'sku_id' : <?=$sku['sku_sale_id']?>,
                        'clear_begin': date,
                        'clear_end' : date,
                        'clear_period' : 0
                    },
                    function(data){
                        if(data.error_code=='0000'){
                            sku_price_list = data.sku_price_list;
                            init_day_table();
                         }else{
                            show_error(data.error_msg);
                         }  
                    }
        );
            layer.close(index);
        }, function(){

        });
        if (e && e.stopPropagation) {
          //W3C取消冒泡事件
          e.stopPropagation();
        } else {
          //IE取消冒泡事件
          window.event.cancelBubble = true;
        }
    }

    function dialog_form_validate(){
        var flag = true;
        var begin = $("input[name='begin']");
        var end = $("input[name='end']");

        if(sku.sale_unit==0){
            var pc_adult_price = $("input[name='pc_adult_price']");
            var pc_child_price = $("input[name='pc_child_price']");
            var pc_baby_price = $("input[name='pc_baby_price']");

            var mobile_adult_price = $("input[name='mobile_adult_price']");
            var mobile_child_price = $("input[name='mobile_child_price']");
            var mobile_baby_price = $("input[name='mobile_baby_price']");
        }else {
            var pc_single_price = $("input[name='pc_single_price']");
            var mobile_single_price = $("input[name='mobile_single_price']");
        }

        if(!valid_required(begin.val())){
            flag = false;
            show_error_messsage(begin,'请选择日期');
        }else if(get_today()>begin.val()){
            flag = false;
            show_error_messsage(begin,'起始日期必须大于或者等于今天');
        }
        if(!valid_required(end.val())){
            flag = false;
            show_error_messsage(end,'请选择日期');
        }else if(begin.val()>end.val()){
            flag = false;
            show_error_messsage(end,'结束日期必须大于起始日期');
        }
        if(sku.sale_unit==0){
            if(sku.adult_selected==1) {
                if (!valid_required(pc_adult_price.val())) {
                    flag = false;
                    show_error_css(pc_adult_price);
                } else if (!valid_number(pc_adult_price.val())) {
                    flag = false;
                    show_error_css(pc_adult_price);
                }
                if (!valid_required(mobile_adult_price.val())) {
                    flag = false;
                    show_error_css(mobile_adult_price);
                } else if (!valid_number(mobile_adult_price.val())) {
                    flag = false;
                    show_error_css(mobile_adult_price);
                }
            }
            if(sku.child_selected==1) {
                if (!valid_required(pc_child_price.val())) {
                    flag = false;
                    show_error_css(pc_child_price);
                } else if (!valid_number(pc_child_price.val())) {
                    flag = false;
                    show_error_css(pc_child_price);
                }
                if (!valid_required(mobile_child_price.val())) {
                    flag = false;
                    show_error_css(mobile_child_price);
                } else if (!valid_number(mobile_child_price.val())) {
                    flag = false;
                    show_error_css(mobile_child_price);
                }
            }

            if(sku.baby_selected==1){
                if(!valid_required(pc_baby_price.val())){
                    flag = false;
                    show_error_css(pc_baby_price);
                }else if(!valid_number(pc_baby_price.val())){
                    flag = false;
                    show_error_css(pc_baby_price);
                }
                if(!valid_required(mobile_baby_price.val())){
                    flag = false;
                    show_error_css(mobile_baby_price);
                }else if(!valid_number(mobile_baby_price.val())){
                    flag = false;
                    show_error_css(mobile_baby_price);
                }
            }
        }else{
            if (!valid_required(pc_single_price.val())) {
                flag = false;
                show_error_css(pc_single_price);
            } else if (!valid_number(pc_single_price.val())) {
                flag = false;
                show_error_css(pc_single_price);
            }
            if (!valid_required(mobile_single_price.val())) {
                flag = false;
                show_error_css(mobile_single_price);
            } else if (!valid_number(mobile_single_price.val())) {
                flag = false;
                show_error_css(mobile_single_price);
            }
        }

        if(flag==false){
            $("#dialog_form_tip").text('请完善信息');
            $("#dialog_form_alert").show();
        }else{
            $("#dialog_form_alert").hide();
        }
        return flag;
    }

    function dialog_clear_validate(){
        var flag = true;
        var begin = $("input[name='clear_begin']");
        var end = $("input[name='clear_end']");

        if(!valid_required(begin.val())){
            flag = false;
            show_error_messsage(begin,'请选择日期');
        }else if(get_today()>begin.val()){
            flag = false;
            show_error_messsage(begin,'起始日期必须大于或者等于今天');
        }
        if(!valid_required(end.val())){
            flag = false;
            show_error_messsage(end,'请选择日期');
        }else if(begin.val()>end.val()){
            flag = false;
            show_error_messsage(end,'结束日期必须大于起始日期');
        }
        if(flag==false){
            $("#dialog_clear_tip").text('请完善信息');
            $("#dialog_clear_alert").show();
        }else{
            $("#dialog_clear_alert").hide();
        }
        return flag;
    }
</script>
<?php else: ?>
<script type="text/javascript">
    var sku = <?=json_encode($sku)?>;
      function  submit_not_date_stock_form(){
          if(not_date_form_validate()){
              $("#not_date_stock_form").submit();
          }
      }
      $(document).ready(function(){
          $("#not_date_stock_form").ajaxForm(function(data){
              if(data.error_code==0){
                  layer.msg('保存成功');
              }else{
                  alert(data.error_msg);
              }
          });
      });

      function not_date_form_validate(){
          var flag = true;
          if(sku.sale_unit==0){
              var pc_adult_price = $("input[name='pc_adult_price']");
              var pc_child_price = $("input[name='pc_child_price']");
              var pc_baby_price = $("input[name='pc_baby_price']");

              var mobile_adult_price = $("input[name='mobile_adult_price']");
              var mobile_child_price = $("input[name='mobile_child_price']");
              var mobile_baby_price = $("input[name='mobile_baby_price']");

              if(sku.adult_selected==1) {
                  if (!valid_required(pc_adult_price.val())) {
                      flag = false;
                      show_error_css(pc_adult_price);
                  } else if (!valid_number(pc_adult_price.val())) {
                      flag = false;
                      show_error_css(pc_adult_price);
                  }
                  if (!valid_required(mobile_adult_price.val())) {
                      flag = false;
                      show_error_css(mobile_adult_price);
                  } else if (!valid_number(mobile_adult_price.val())) {
                      flag = false;
                      show_error_css(mobile_adult_price);
                  }
              }
              if(sku.child_selected==1) {
                  if (!valid_required(pc_child_price.val())) {
                      flag = false;
                      show_error_css(pc_child_price);
                  } else if (!valid_number(pc_child_price.val())) {
                      flag = false;
                      show_error_css(pc_child_price);
                  }
                  if (!valid_required(mobile_child_price.val())) {
                      flag = false;
                      show_error_css(mobile_child_price);
                  } else if (!valid_number(mobile_child_price.val())) {
                      flag = false;
                      show_error_css(mobile_child_price);
                  }
              }

              if(sku.baby_selected==1){
                  if(!valid_required(pc_baby_price.val())){
                      flag = false;
                      show_error_css(pc_baby_price);
                  }else if(!valid_number(pc_baby_price.val())){
                      flag = false;
                      show_error_css(pc_baby_price);
                  }
                  if(!valid_required(mobile_baby_price.val())){
                      flag = false;
                      show_error_css(mobile_baby_price);
                  }else if(!valid_number(mobile_baby_price.val())){
                      flag = false;
                      show_error_css(mobile_baby_price);
                  }
              }
          }else{
              var pc_single_price = $("input[name='pc_single_price']");
              var mobile_single_price = $("input[name='mobile_single_price']");

              if (!valid_required(pc_single_price.val())) {
                  flag = false;
                  show_error_css(pc_single_price);
              } else if (!valid_number(pc_single_price.val())) {
                  flag = false;
                  show_error_css(pc_single_price);
              }
              if (!valid_required(mobile_single_price.val())) {
                  flag = false;
                  show_error_css(mobile_single_price);
              } else if (!valid_number(mobile_single_price.val())) {
                  flag = false;
                  show_error_css(mobile_single_price);
              }
          }
          return flag;
      }
</script>
<?php endif;?>

<script type="text/javascript">
    //验证样式
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

    //选择SKU
    $('#sku_name').change(function(){
        var sku_id = $("#sku_name").find("option:selected").val();
        var url = base_url + "product/editfour/<?=$id?>/"+ sku_id;
        window.location.href = url;
    });
</script>






