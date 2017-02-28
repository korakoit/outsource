<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>

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

                        <li class="active"><a href="#tab_1_1" data-toggle="tab">基础信息</a></li>

                        <li><a href="/product/editSecond/<?=$id?>">商品详情</a></li>

                        <li><a href="/product/editThird/<?=$id?>">图片管理</a></li>

                        <li><a href="/product/editFour/<?=$id?>">价格管理</a></li>

                        <li><a href="/product/editFive/<?=$id?>">评价管理</a></li>

                        <li><a href="/product/editSix/<?=$id?>">上下架管理</a></li>
                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane row-fluid active" id="tab_1_1">
                            <div class="row-fluid">
                                <div class="span12">

                                    <div class="portlet-title">

                                        <div class="caption"><i class="icon-reorder"></i>基础信息</div>

                                    </div>

                                    <form action="/product/editbase" id="submit_form" class="form-horizontal" method="post">

                                        <div class="control-group">

                                            <label class="control-label">商品名称:</label>

                                            <div class="controls">
                                                <?php if(empty($product['supplier_remark'])):?>
                                                    <input type="text" disabled="" placeholder="<?=$product['name']?>" class="m-wrap span6">
                                                <?php else:?>
                                                    <input type="text" disabled="" placeholder="<?=$product['supplier_remark']?>" class="m-wrap span6">
                                                <?php endif;?>    

                                            </div>

                                        </div>

                                        <div class="control-group">

                                            <label class="control-label">商品名称(备注):</label>

                                            <div class="controls">

                                                <input type="text" placeholder="商品备注名称" name="product_remark" value="<?=$product['lm_name_remark']?>" class="m-wrap span6" />
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
                                                <div class="portlet box green">
                                                    <div class="portlet-title">

                                                        <div class="caption"><i class="icon-reorder"></i>规格设置</div>

                                                    </div>

                                             <div class="portlet-body">
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
                                                                             <?=$value['name_1st']?><input style="margin-left:15px" class="format m-wrap small" data="<?=$value['id']?>" value="<?=$value['name_2nd']?>"/>     
                                                                        </td>
                                                                        <td>
                                                                           <?=$v['name_1st']?><input style="margin-left:15px" class="format_val m-wrap small" data="<?=$v['id']?>" value="<?=$v['name_2nd']?>"/> 
                                                                        </td>
                                                                    <?php else:?>
                                                                         <td>
                                                                           <?=$v['name_1st']?><input style="margin-left:15px" class="format_val m-wrap small" data="<?=$v['id']?>" value="<?=$v['name_2nd']?>"/> 
                                                                        </td>
                                                                    <?php endif;?>
    
                                                                </tr>
                                                            <?php endforeach;?>
                                                        <?php endforeach;?>
                                                        
                                                    </tbody>

                                                </table>

                                                </div>
                                                 <textarea style="display:none" id="format_list" name="format_list"></textarea>
                                                <textarea style="display:none" id="format_val_list" name="format_val_list"></textarea>
                                                </div>
                                                <div class="form-actions">
                                                    <a class="btn blue" onclick="submitForm();"><i class="icon-ok"></i>保存</a>
                                                    <a class="btn blue" type="button" href="/product/">取消</a>
                                                </div>
                                             </div>
                                    </form>
                                </div>

                            </div>

                        </div>


                        <div class="tab-pane profile-classic row-fluid" id="tab_1_2">

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


<!-- END PAGE -->
<?php $this->load->view('block/footer.php')?>
<script src="<?=STATIC_FILE_HOST?>assets/js/json.js" type="text/javascript"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.form.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/form-validation.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/custom-popover.js" type="text/javascript" ></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/custom-validate.js" type="text/javascript" ></script>

<script type="text/javascript">
    function  submitForm(){
        if(format_validate()){
            $('#submit_form').submit();
        }
    }

    function format_validate(){
        var format_list = new Array();
        var format_val_list = new Array();
        var flag = true;
        $('.format').each(function(){
            if(!valid_required($(this).val())){
                flag = false;
                show_error_css($(this));
            }
            format_list.push({
                id : $(this).attr('data'),
                name_2nd : $(this).val()
            });
        });
        $('.format_val').each(function(){
            if(!valid_required($(this).val())){
                flag = false;
                show_error_css($(this));
            }
            format_val_list.push({
                id : $(this).attr('data'),
                name_2nd : $(this).val()
            });
        });

        $("#format_list").text(JSON.stringify(format_list));
        $("#format_val_list").text(JSON.stringify(format_val_list));

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





