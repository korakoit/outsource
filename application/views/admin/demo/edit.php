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

                

            </div>

        </div>

        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->

        <div class="row-fluid profile">

            <div class="span12">

                <!--BEGIN TABS-->

                <div class="tabbable tabbable-custom tabbable-full-width">

                    <ul class="nav nav-tabs">

                        <li class="active"><a href="#tab_1_1" data-toggle="tab">基础信息</a></li>

                        <li><a href="#tab_1_2" data-toggle="tab">商品详情</a></li>

                        <li><a href="#tab_1_3" data-toggle="tab">图片管理</a></li>

                        <li><a href="#tab_1_4" data-toggle="tab">价格管理</a></li>

                        <li><a href="#tab_1_5" data-toggle="tab">评价管理</a></li>

                        <li><a href="#tab_1_6" data-toggle="tab">上下架管理</a></li>
                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane row-fluid active" id="tab_1_1">
                            <div class="row-fluid">
                                <div class="span12">

                                    <div class="portlet-title">

                                        <div class="caption"><i class="icon-reorder"></i>基础信息</div>

                                    </div>

                                    <form action="/product/editbase" class="form-horizontal" method="post">

                                        <div class="control-group">

                                            <label class="control-label">商品名称:</label>

                                            <div class="controls">

                                                <input type="text" disabled="" placeholder="<?=$product['name']?>" class="m-wrap large">

                                            </div>

                                        </div>

                                        <div class="control-group">

                                            <label class="control-label">商品名称(备注):</label>

                                            <div class="controls">

                                                <input type="text" placeholder="商品备注名称" name="product_remark" value="<?=$product['lm_name_remark']?>" class="m-wrap large" />
                                                <input type="hidden" name="productId" value="<?=$id?>" />
                                            </div>

                                        </div>

                                        <div class="control-group">

                                            <label class="control-label">所属国家:</label>

                                            <div class="controls">
                                                <input type="text" class="m-wrap small" placeholder="<?=@$country_index[$product['country_id']]['cn']?>" disabled="">
                                            </div>

                                        </div>
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
                                        <div class="control-group">

                                            <label class="control-label">所属城市:</label>

                                            <div class="controls">

                                                <input type="text" class="m-wrap small" placeholder="<?=$citytmp?>" disabled="">

                                            </div>

                                        </div>

                                        <div class="control-group">

                                            <label class="control-label">所属分类:</label>

                                            <div class="controls">

                                                <input type="text" class="m-wrap small" placeholder="<?=@$category_index[$product['category_id']]['cn']?>" disabled="">

                                            </div>

                                        </div>

                                        <div class="control-group">

                                            <label class="control-label">供应商:</label>

                                            <div class="controls">

                                                <input type="text" disabled="" placeholder="<?=$product['lm_supplier_code']?>" class="m-wrap small">

                                            </div>

                                        </div>

                                        <div class="control-group">

                                            <label class="control-label">SKU共享库存:</label>

                                            <div class="controls">

                                                <input type="text" disabled="" placeholder="<?php if($product['is_shared'] ==1) echo '是';else echo '否';?>" class="m-wrap small">

                                            </div>

                                        </div>

                                        <div class="control-group">

                                            <label class="control-label">是否为承包类商品:</label>

                                            <div class="controls">

                                                <input type="text" disabled="" placeholder="<?php if($product['is_contract'] ==1) echo '整包整卖';else echo '否';?>" class="m-wrap small">

                                            </div>

                                        </div>

                                            <div class="row-fluid">

                                                <div class="portlet-title">

                                                    <div class="caption"><i class="icon-reorder"></i>规格设置</div>

                                                </div>
                                                <?php if(!empty($format)):?>
                                                <?php foreach ($format as $formK => $formRow):?>
                                                    <div class="span3">
                                                        <div class="control-group">
                                                            <label class="control-label text-error"><strong>规格<?=$formK+1?></strong></label>
                                                            <div class="controls">
                                                            </div>
                                                        </div>
                                                                <div class="control-group">
                                                                    <label class="control-label"><?=$formRow['name']?></label>
                                                                    <div class="controls">
                                                                        <div class="span2"><input type="text" value="<?=$formRow['remark']?>" name="format_name[<?=$formRow['id']?>][]"></div>
                                                                    </div>
                                                                </div>
                                                                <?php if(!empty($formRow['value'])):?>
                                                                    <?php $foramtValue = explode(";",$formRow['value']);?>
                                                                    <?php
                                                                           $foramtRemark = explode(";",$formRow['value_remark']);
                                                                    ?>
                                                                    <?php for($i=0;$i< count($foramtValue) - 1;$i++):?>
                                                                        <div class="control-group">
                                                                            <label class="control-label"><?=$foramtValue[$i]?></label>
                                                                            <div class="controls">
                                                                                <div class="span2"><input type="text" value="<?=@$foramtRemark[$i]?>" name="format_value[<?=@$formRow['id']?>][]"></div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endfor;?>
                                                                <?php endif;?>
                                                    </div>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                             </div>
                                        <div class="form-actions">
                                            <button class="btn blue" type="submit"><i class="icon-ok"></i>保存</button>
                                            <button class="btn" type="button">取消</button>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>


                        <div class="tab-pane profile-classic row-fluid" id="tab_1_2">

                            <div class="row-fluid">

                                <div class="span12">
                                    <div class="portlet-title">

                                        <div class="caption"><i class="icon-reorder"></i>基础信息</div>

                                    </div>

                                    <form class="form-horizontal" id="form_sample_2" action="/product/editdetail" novalidate="novalidate" method="post">

                                        <div class="alert alert-error hide">

                                            <button data-dismiss="alert" class="close"></button>

                                            字段填写错误,请检查相关错误.

                                        </div>

                                        <div class="alert alert-success hide">

                                            <button data-dismiss="alert" class="close"></button>

                                            Your form validation is successful!

                                        </div>

                                        <div class="control-group">

                                            <label class="control-label">商品名:</label>
                                            <div class="controls">

                                                <input type="text" disabled="" placeholder="<?=$product['lm_name']?>" class="m-wrap large">

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
                                                <input type="text" class="m-wrap large" name="sale_name" placeholder="" value="<?=$product['lm_sale_name']?>" >
                                            </div>

                                        </div>

                                        <div class="control-group">

                                            <label class="control-label">副标题:</label>

                                            <div class="controls">

                                                <input type="text" name="sale_title" class="m-wrap large" placeholder="" value="<?=$product['lm_sale_title']?>">

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
                                            <div class="controls">
                                                <div class="btn blue">分类一</div>
                                                <div class="btn blue">分类二</div>
                                                <div class="btn blue">分类三</div>
                                                <a class="btn" href="#"><i class="icon-plus"></i></a>

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
                                        <div class="form-actions">
                                            <button class="btn green" type="submit">保存</button>
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
                                                            <strong>产品亮点</strong>
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

                                                            行程安排

                                                        </a>

                                                    </div>

                                                    <div id="collapse_2" class="accordion-body collapse">

                                                        <div class="accordion-inner">
                                                            行程安排


                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="accordion-group">

                                                    <div class="accordion-heading">

                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3">

                                                            商品详细

                                                        </a>

                                                    </div>

                                                    <div id="collapse_3" class="accordion-body collapse">

                                                        <div class="accordion-inner">

                                                            商品详细

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="accordion-group">

                                                    <div class="accordion-heading">

                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_4">

                                                            费用说明

                                                        </a>

                                                    </div>

                                                    <div id="collapse_4" class="accordion-body collapse">

                                                        <div class="accordion-inner">

                                                            费用说明

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="accordion-group">

                                                    <div class="accordion-heading">

                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_5">

                                                            购买流程

                                                        </a>

                                                    </div>

                                                    <div id="collapse_5" class="accordion-body collapse">

                                                        <div class="accordion-inner">

                                                            购买流程

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="accordion-group">

                                                    <div class="accordion-heading">

                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_6">

                                                            使用方法

                                                        </a>

                                                    </div>

                                                    <div id="collapse_6" class="accordion-body collapse">

                                                        <div class="accordion-inner">

                                                            使用方法

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                            </div>
                        </div>


                        <div class="tab-pane row-fluid profile-account" id="tab_1_3">
                            <div class="portlet-title">
                                <div class="caption"><i class="icon-reorder"></i>WEB商品轮播图</div>
                            </div>
                                <span id="webButton"></span>
                                <div class="alert alert-error">
                                   请上传尺寸为 <strong>1890*1260</strong>的图片，格式为<strong>png</strong>
                                </div>
                                <div id="webProgressContainer"></div>
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <tbody id="pic_list">
                                    <?php if(!empty($pic[1])):?>
                                        <?php foreach ($pic[1] as $webpicK => $webpicRow):?>
                                            <tr>
                                                <td><a title='<?=$webpicRow['img_title']?>' href='<?=base_url()?><?=$webpicRow['img_url']?>'><img src='<?=base_url()?><?=$webpicRow['img_url']?>' style='width:100px;height:60px;'></a></td>
                                                <td><span><?=$webpicRow['img_title']?></span></td>
                                                <td><span class='size'><?=byteFormat($webpicRow['img_size'],'KB',2)?></span></td>
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
                            <span id="appButton"></span>
                            <div class="alert alert-error">
                                请上传尺寸为 <strong>1065*507</strong>的图片，格式为<strong>png</strong>
                            </div>
                            <div id="appProgressContainer"></div>
                            <table class="table table-striped table-bordered table-advance table-hover">
                                <tbody id="apppic_list">
                                <?php if(!empty($pic[2])):?>
                                    <?php foreach ($pic[2] as $apppicK => $apppicRow):?>
                                        <tr>
                                            <td><a title='<?=$apppicRow['img_title']?>' href='<?=base_url()?><?=$apppicRow['img_url']?>'><img src='<?=base_url()?><?=$apppicRow['img_url']?>' style='width:100px;height:60px;'></a></td>
                                            <td><span><?=$apppicRow['img_title']?></span></td>
                                            <td><span class='size'><?=byteFormat($apppicRow['img_size'],'KB',2)?></span></td>
                                            <td>
                                                <?php if($apppicRow['is_first']==1):?>
                                                    <a href='#' class='btn blue'>设为首页</a>
                                                <?php else:?>
                                                    <a href='/product/onindex/<?=$apppicRow['id']?>?tyep=2' class='btn'>设为首页</a>
                                                <?php endif;?>
                                                <a href='/product/delpic/<?=$apppicRow['id']?>' class='btn'>删除</a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                                </tbody>
                            </table>

                            <div class="portlet-title">
                                <div class="caption"><i class="icon-reorder"></i>APP商品列表页小图</div>
                            </div>
                            <span id="appSmallButton"></span>
                            <div class="alert alert-error">
                                请上传尺寸为 <strong>405*405</strong>的图片，格式为<strong>png</strong>
                            </div>
                            <div id="appSmallProgressContainer"></div>
                            <table class="table table-striped table-bordered table-advance table-hover">
                                <tbody id="appsmallpic_list">
                                <?php if(!empty($pic[3])):?>
                                    <?php foreach ($pic[3] as $webspicK => $webspicRow):?>
                                        <tr>
                                            <td><a title='<?=$webspicRow['img_title']?>' href='<?=base_url()?><?=$webspicRow['img_url']?>'><img src='<?=base_url()?><?=$webspicRow['img_url']?>' style='width:100px;height:60px;'></a></td>
                                            <td><span><?=$webspicRow['img_title']?></span></td>
                                            <td><span class='size'><?=byteFormat($webspicRow['img_size'],'KB',2)?></span></td>
                                            <td>
                                                <?php if($webspicRow['is_first']==1):?>
                                                    <a href='#' class='btn blue'>设为首页</a>
                                                <?php else:?>
                                                    <a href='/product/onindex/<?=$webspicRow['id']?>?tyep=3' class='btn'>设为首页</a>
                                                <?php endif;?>
                                                <a href='/product/delpic/<?=$webspicRow['id']?>' class='btn'>删除</a>
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
                            <button type="button" class="btn btn-primary" id="saveBtn" data-dismiss="modal">保存</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--模态框结束-->

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

<!-- 图片上传 -->
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/swfupload/swfupload.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/swfupload/handlers.js"></script>


<script type="text/javascript">
    jQuery(document).ready(function() {
        //数据验证
        var form2 = $('#form_sample_2');
        var error2 = $('.alert-error', form2);
        var success2 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-inline', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                sale_name: {
                    required: true
                },
            },

            messages: {
                service: {
                    required: "Please select  at least 2 types of Service",
                    minlength: jQuery.format("Please select  at least {0} types of Service")
                }
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                if (element.attr("name") == "education") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter("#form_2_education_chzn");
                } else if (element.attr("name") == "membership") { // for uniform radio buttons, insert the after the given container
                    error.addClass("no-left-padding").insertAfter("#form_2_membership_error");
                } else if (element.attr("name") == "service") { // for uniform checkboxes, insert the after the given container
                    error.addClass("no-left-padding").insertAfter("#form_2_service_error");
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavoir
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                success2.hide();
                error2.show();
                App.scrollTo(error2, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.help-inline').removeClass('ok'); // display OK icon
                $(element)
                    .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change dony by hightlight
                $(element)
                    .closest('.control-group').removeClass('error'); // set error class to the control group
            },

            success: function (label) {
                if (label.attr("for") == "service" || label.attr("for") == "membership") { // for checkboxes and radip buttons, no need to show OK icon
                    label
                        .closest('.control-group').removeClass('error').addClass('success');
                    label.remove(); // remove error label here
                } else { // display success icon for other inputs
                    label
                        .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                        .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
                }
            },

            submitHandler: function (form) {
                success2.show();
                error2.hide();
                form2.submit();
            }
        });
    });

    //标签
    $("#saveBtn").click(function(){
        var lab = new Array();
        var obj = $("#lab");
        $("input[name^='lab']").each(function(){
            lab.push($(this).val());
        });
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

    /**
     *@bind  country
     *@desc 异步获取城市信息,绘制城市信息
     */
    $("#countryId").change(function(e){
        var temp = $(this).val().split("|");
        $.get(base_url + '/Product/ajaxCity/' + temp[0],{},function(data){
            if(data == null || data.length == 0){
                alert('选择的国家没有关联的城市！');
            }else{
                var html = '<option value="-1">选择城市</option>';
                $.each(data,function(i,n){
                    html += '<option value="' + n.id+ '">'+ n.city_name+' </option>';
                });
                $("#cityId").html('');
                $("#cityId").html(html);
            }
        },'json');
    });
</script>

<script type="text/javascript">
    var swfweb;
    var swfapp;
    var swfappsmall;
    var file_queue_limit = 100;//队列1，每次只能上传1个,若是1个以上，上传后的样式是叠加图片
    window.onload = function() {
        swfweb = new SWFUpload({
            upload_url: "/Product/upload/<?=$id?>?type=1",
            post_params: {
                "PHPSESSID": "<?php echo session_id(); ?>",
            },
            file_size_limit: "2 MB", //最大2M
            file_types: "*.png", //设置选择文件的类型
            file_types_description: "JPG Images", //描述文件类型
            file_upload_limit: "0", //0代表不受上传个数的限制
            file_queue_limit:file_queue_limit,
            file_queue_error_handler: fileQueueError,
            file_dialog_complete_handler: fileDialogComplete, //当关闭选择框后,做触发的事件
            upload_progress_handler: uploadProgress, //处理上传进度
            upload_error_handler: uploadError, //错误处理事件
            upload_success_handler: uploadSuccess, //上传成功够,所处理的时间
            upload_complete_handler: uploadComplete, //上传结束后,处理的事件
            button_image_url: "<?=STATIC_FILE_HOST?>assets/plugin/swfupload/upload.png",
            button_placeholder_id: "webButton",
            button_width: 113,
            button_height: 33,
            button_text: '',
            button_text_style: '.spanButtonPlaceholder { font-family: Helvetica, Arial, sans-serif; font-size: 14pt;} ',
            button_text_top_padding: 0,
            button_text_left_padding: 0,
            button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
            button_cursor: SWFUpload.CURSOR.HAND,
            flash_url: "<?=STATIC_FILE_HOST?>assets/plugin/swfupload/swfupload.swf",
            custom_settings: {
                upload_target: "webProgressContainer"
            },
            debug: false //是否开启日志
        });

        swfapp = new SWFUpload({
            upload_url: "/Product/upload/<?=$id?>?type=2",
            post_params: {
                "PHPSESSID": "<?php echo session_id(); ?>"
            },
            file_size_limit: "2 MB", //最大2M
            file_types: "*.png", //设置选择文件的类型
            file_types_description: "JPG Images", //描述文件类型
            file_upload_limit: "0", //0代表不受上传个数的限制
            file_queue_limit:file_queue_limit,
            file_queue_error_handler: fileQueueError,
            file_dialog_complete_handler: fileDialogComplete, //当关闭选择框后,做触发的事件
            upload_progress_handler: uploadProgress, //处理上传进度
            upload_error_handler: uploadError, //错误处理事件
            upload_success_handler: uploadSuccess, //上传成功够,所处理的时间
            upload_complete_handler: uploadComplete, //上传结束后,处理的事件
            button_image_url: "<?=STATIC_FILE_HOST?>assets/plugin/swfupload/upload.png",
            button_placeholder_id: "appButton",
            button_width: 113,
            button_height: 33,
            button_text: '',
            button_text_style: '.spanButtonPlaceholder { font-family: Helvetica, Arial, sans-serif; font-size: 14pt;} ',
            button_text_top_padding: 0,
            button_text_left_padding: 0,
            button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
            button_cursor: SWFUpload.CURSOR.HAND,
            flash_url: "<?=STATIC_FILE_HOST?>assets/plugin/swfupload/swfupload.swf",
            custom_settings: {
                upload_target: "appProgressContainer"
            },
            debug: false //是否开启日志
        });

        swfappsmall = new SWFUpload({
            upload_url: "/Product/upload/<?=$id?>?type=3",
            post_params: {
                "PHPSESSID": "<?php echo session_id(); ?>"
            },
            file_size_limit: "2 MB", //最大2M
            file_types: "*.png", //设置选择文件的类型
            file_types_description: "JPG Images", //描述文件类型
            file_upload_limit: "0", //0代表不受上传个数的限制
            file_queue_limit:file_queue_limit,
            file_queue_error_handler: fileQueueError,
            file_dialog_complete_handler: fileDialogComplete, //当关闭选择框后,做触发的事件
            upload_progress_handler: uploadProgress, //处理上传进度
            upload_error_handler: uploadError, //错误处理事件
            upload_success_handler: uploadSuccess, //上传成功够,所处理的时间
            upload_complete_handler: uploadComplete, //上传结束后,处理的事件
            button_image_url: "<?=STATIC_FILE_HOST?>assets/plugin/swfupload/upload.png",
            button_placeholder_id: "appSmallButton",
            button_width: 113,
            button_height: 33,
            button_text: '',
            button_text_style: '.spanButtonPlaceholder { font-family: Helvetica, Arial, sans-serif; font-size: 14pt;} ',
            button_text_top_padding: 0,
            button_text_left_padding: 0,
            button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
            button_cursor: SWFUpload.CURSOR.HAND,
            flash_url: "<?=STATIC_FILE_HOST?>assets/plugin/swfupload/swfupload.swf",
            custom_settings: {
                upload_target: "appSmallProgressContainer"
            },
            debug: false //是否开启日志
        });
    };
</script>


