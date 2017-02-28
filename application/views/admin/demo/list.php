<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>

<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>assets/css/select2_metro.css" />

<link>
<!-- BEGIN PAGE -->
<style type="text/css">
    .table th, .table td {
        border-top: 1px solid #ddd;
        line-height: 20px;
        padding: 8px;
        text-align: center;
        vertical-align:middle;
    }
</style>
<div class="page-content">

    <!-- BEGIN PAGE CONTAINER-->

    <div class="container-fluid">

        <!-- BEGIN PAGE HEADER-->

        <div class="row-fluid">

            
        </div>

        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->

        <div class="row-fluid">

            <div class="span12 booking-search">

                    <form action="" method="get" class="form-horizontal">
                        <div class="clearfix margin_left_90">

                            <div class="control-group pull-left margin-right-20" style="margin-right:20px;">

                                <label class="control-label">所属国家:</label>

                                <div class="controls">
                                    <select name="countryId" id="countryId" class="medium m-wrap" >
                                        <option value="-1">选择国家</option>
                                            <?php if(isset($country)):?>
                                                <?php foreach ($country as $counRow):?>
                                                    <option value="<?=$counRow['id']?>" <?php if(isset($search['countryId']) && $search['countryId'] ==$counRow['id']) echo 'selected';?> ><?=$counRow['country_name']?></option>
                                                <?php endforeach;?>
                                            <?php endif;?>
                                    </select>
                                </div>

                            </div>
							
                            <div class="control-group pull-left margin-right-20" style="margin-right:20px;">

                                <label class="control-label">所属城市:</label>

                                <div class="controls">

                                    <select class="medium m-wrap" name="cityId" id="cityId" tabindex="1">
                                        <option value="-1">选择城市</option>
                                            <?php if(isset($selectCity) && !empty($selectCity)):?>
                                                <?php foreach ($selectCity as $cityRow):?>
                                                    <option value="<?=$cityRow['id']?>" <?php if(isset($search['cityId']) && $search['cityId'] ==$cityRow['id']) echo 'selected';?> ><?=$cityRow['city_name']?></option>
                                                <?php endforeach;?>
                                            <?php endif;?>
                                    </select>

                                </div>

                            </div>

                            <div class="control-group pull-left margin-right-20" style="margin-right:20px;">

                                <label class="control-label">所属分类:</label>

                                <div class="controls">

                                    <select class="medium m-wrap" name="categoryId" id="categoryId">
                                        <option value="-1">选择分类</option>
                                            <?php if(isset($category)):?>
                                                <?php foreach ($category as $cateRow):?>
                                                    <option  value="<?=$cateRow['id']?>" <?php if(isset($search['categoryId']) && $search['categoryId'] == $cateRow['id']) echo 'selected';?> ><?=$cateRow['name']?></option>
                                                <?php endforeach;?>
                                            <?php endif;?>
                                    </select>

                                </div>

                            </div>

                            <div class="control-group pull-left margin-right-20" style="margin-right:20px;">

                                <label class="control-label">商品状态:</label>

                                <div class="controls">

                                    <select class="medium m-wrap" name="productStatus" id="productStatus">
                                        <option value="-1">选择状态</option>
                                        <?php if(isset($status)):?>
                                            <?php foreach ($status as $statusKey => $statusRow):?>
                                                <option  value="<?=$statusKey?>" <?php if(isset($search['productStatus']) && $search['productStatus'] == $statusKey) echo 'selected';?> ><?=$statusRow?></option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                        <option  value="-2" <?php if(isset($search['productStatus']) && $search['productStatus'] == -2) echo 'selected';?> >未完善</option>
                                    </select>

                                </div>

                            </div>

                            <div class="control-group pull-left margin-right-20" style="margin-right:20px;">

                                <label class="control-label">供应商:</label>

                                <div class="controls">

                                    <select class="medium m-wrap" name="supplierId" id="supplierId">
                                        <option value="-1">选择供应商</option>
                                        <?php if(isset($supplier)):?>
                                            <?php foreach ($supplier as $suppRow):?>
                                                <option  value="<?=$suppRow['id']?>" <?php if(isset($search['supplierId']) && $search['supplierId'] == $suppRow['id']) echo 'selected';?> ><?=$suppRow['supplier_name']?></option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>

                                </div>

                            </div>

  

                            <div class="control-group  pull-left margin-right-20" style="margin-right:20px;">

                                <label class="control-label">商品编号:</label>

                                <div class="controls">

                                    <input type="text" name="productNum" class="medium m-wrap" placeholder="键入商品编号" value="<?php if(isset($search['productNum'])) echo $search['productNum'];?>" >

                                </div>

                            </div>

                            <div class="control-group pull-left margin-right-20"  style="margin-left:-20px;">

                                <label class="control-label">商品关键字:</label>

                                <div class="controls">

                                    <input type="text" name="productKeyword" class="medium m-wrap" placeholder="键入商品关键字" value="<?php if(isset($search['productKeyword'])) echo $search['productKeyword'];?>">

                                </div>

                            </div>

                            <div class="control-group pull-left margin-right-20" style="margin-left:22px;">

                                <label class="control-label">排序方式:</label>

                                <div class="controls">

                                    <select class="medium m-wrap" name="productSort" id="productSort">
                                        <option value="-1">选择排序方式</option>
                                        <?php if(isset($sort)):?>
                                            <?php foreach ($sort as $sortKey => $sortRow):?>
                                                <option  value="<?=$sortKey?>" <?php if(isset($search['productSort']) && $search['productSort'] == $sortKey) echo 'selected';?> ><?=$sortRow['name']?></option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>

                                </div>

                            </div>

                        </div>


                        <div class="clearfix margin-bottom-10">

                            <div class="pull-left margin-right-20" style="margin-right:20px;">

                                    <button class="btn blue" type="submit">开始搜索</button>


                            </div>

                            <div class="pull-left margin-left-20" style="margin-right:20px;">

                                <a class="btn blue" href="/product/">清空条件</a>

                            </div>
                            <?php if(isset($search['productStatus'])):?>
                                <?php if($search['productStatus']==2 ):?>
                                    <div class="pull-left margin-left-20" style="margin-right:20px;">
                                        <button class="btn blue" type="button" id="batch-on-shelf">批量上架</button>
                                    </div>
                                <?php endif;?>

                                <?php if($search['productStatus']==1):?>
                                    <div class="pull-left margin-left-20" style="margin-right:20px;">
                                        <button class="btn blue" type="button" id="batch-down-shelf">批量下架</button>
                                    </div>
                                <?php endif;?>
                            <?php endif;?>

                        </div>

                    </form>
            </div>

            <!-- 开始分割线-->
            <ul class="nav nav-list">

                <li class="divider"></li>

            </ul>
            <!-- 结束分割线-->
            <form id="batch-form" name="batch-form" method="post" >
            <table class="table table-striped table-bordered table-hover" id="sample_1">

                <thead>

                <tr>

                    <th>序号</th>

                    <th class="hidden-480">商品编号</th>

                    <th class="hidden-480">商品名称</th>

                    <th class="hidden-480">规格</th>

                    <th class="hidden-480">SKU数量</th>

                    <th class="hidden-480">所属国家</th>

                    <th class="hidden-480">所属城市</th>

                    <th class="hidden-480">所属分类</th>

                    <th class="hidden-480">供应商</th>

                    <th class="hidden-480">添加时间</th>

                    <th class="hidden-480">最后修改时间</th>

                    <th class="hidden-480">完善状态</th>

                    <th class="hidden-480">商品状态</th>

                    <th class="hidden-480">上/下架</th>
                    <?php if(isset($search['productStatus'])):?>
                    <th class="hidden-480"><input type="checkbox" onclick="selectAll(this);">全/反选</th>
                    <?php endif;?>
                </tr>

                </thead>

                <tbody>

                <?php if(!empty($result)):?>
                    <?php foreach($result as $k=>$row): ?>
                        <?php
                            $skunum = isset($row['sku']) ? count($row['sku']) : 0;
                        ?>
                        <tr class="odd gradeX">

                            <td><?=$k+1?></td>

                            <td><?=$row['lm_number']?></td>

                            <td class="hidden-480">
                                <?php if(empty($row['supplier_remark'])):?>
                                    <a href="/product/editfirst/<?=$row['sale_id']?>"><?=$row['lm_name']?></a>
                                <?php else:?>
                                    <a href="/product/editfirst/<?=$row['sale_id']?>"><?=$row['supplier_remark']?></a>
                                <?php endif;?>
                                <br>
                                <a href="/sku/index?productId=<?=$row['sale_id']?>">查看SKU</a>
                            </td>

                            <td class="hidden-480">
                                <?php
                                    if(!empty($row['format'])){
                                        foreach($row['format'] as $val){
                                            echo $val['name_1st'].';';
                                        }
                                    }
                                ?>
                            </td>

                            <td class="center hidden-480"><?=$skunum?></td>

                            <td ><?=@$country_index[$row['country_id']]['cn']?></td>

                            <td >
                                <?php
                                $tmp = explode(",",$row['city_id']);
                                if(!empty($tmp)){
                                    foreach ($tmp as $v) {
                                        echo $city_index[$v]['cn'] . ";";
                                    }
                                }
                                ?>
                            </td>

                            <td ><?=@$category_index[$row['category_id']]['cn']?></td>

                            <td ><?=$row['lm_supplier_code']?></td>

                            <td ><?=@date("Y-m-d H:i",$row['lm_create_time'])?></td>

                            <td ><?=@date("Y-m-d H:i",$row['lm_update_time'])?></td>

                            <?php if($row['lm_is_complete']==1):?>
                            <td >已完善</td>
                            <?php else: ?>
                            <td >未完善</td>
                            <?php endif ?>

                                <td <?php if($row['lm_status']==2){echo 'class="text-error"';}?>><?=$status[$row['lm_status']]?></td>
                                <?php if($row['lm_is_complete']==1):?>
                                <?php if($row['lm_status']==1 && $row['supplier_status']==1):?>
                                    <td ><a class="btn blue" onclick="downshelf(<?=$row['sale_id']?>);" href="javascript:void(0);">下架</a></td>
                                    <?php if(isset($search['productStatus'])):?>
                                        <td >
                                            <input type="checkbox" name="selectProduct[]" value="<?=$row['sale_id']?>">
                                        </td>
                                    <?php endif;?>
                                <?php elseif($row['lm_status']==1 && $row['supplier_status']==3):?>
                                    <td ><a class="btn blue" onclick="downshelf(<?=$row['sale_id']?>);" href="javascript:void(0);">下架(供应商申请)</a></td>
                                    <?php if(isset($search['productStatus'])):?>
                                        <td ></td>
                                    <?php endif;?>
                                <?php elseif($row['lm_status']==2 && $row['supplier_status']==1):?>
                                    <td ><a class="btn green" onclick="onshelf(<?=$row['sale_id']?>)" href="javascript:void(0);">上架</a></td>
                                    <?php if(isset($search['productStatus'])):?>
                                        <td >
                                            <input type="checkbox" name="selectProduct[]" value="<?=$row['sale_id']?>">
                                        </td>
                                    <?php endif;?>
                                <?php elseif($row['lm_status']==2 && $row['supplier_status']==2):?>
                                    <td></td>
                                    <?php if(isset($search['productStatus'])):?>
                                        <td ></td>
                                    <?php endif;?>
                                <?php elseif($row['lm_status']==2 && $row['supplier_status']==3):?>
                                    <td ><a class="btn blue" onclick="downshelf(<?=$row['sale_id']?>);" href="javascript:void(0);">下架(供应商申请)</a></td>
                                    <?php if(isset($search['productStatus'])):?>
                                        <td ></td>
                                    <?php endif;?>
                                <?php else:?>
                                    <td></td>
									<?php if(isset($search['productStatus'])):?>
                                        <td ></td>
                                    <?php endif;?>
                                <?php endif;?>
                            <?php else:?>
                                <?php if($row['supplier_status']==3):?>
                                    <td ><a class="btn blue" onclick="suppdownshelf(<?=$row['sale_id']?>);" href="javascript:void(0);">下架(供应商申请)</a></td>
                                <?php else:?>
                                    <td></td>
                                <?php endif;?>
                                <?php if(isset($search['productStatus'])):?>
                                    <td ></td>
                                <?php endif;?>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach;?>
                <?php else:?>
                    <tr>
                        <td colspan="15">没有数据！</td>
                    </tr>
                <?php endif;?>

                </tbody>

            </table>
            </form>

            <?php if(isset($pagination)):?>
                <tfoot>
                <tr>
                    <td colspan="13" >
                        <div class="pagination pagination-centered" >
                            <?=$pagination?>
                        </div>
                    </td>
                </tr>
                </tfoot>
            <?php endif;?>

         </div>

    </div>

    <!-- END PAGE CONTAINER-->

</div>

<!-- END PAGE -->

<?php $this->load->view('block/footer.php')?>
<!-- 弹窗相关 -->
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/select2.min.js"></script>
<script type="text/javascript">
$("#countryId").select2({allowClear: true});
$("#cityId").select2({allowClear: true});
$("#supplierId").select2({allowClear: true});
    /**
     *@bind  country
     *@desc 异步获取城市信息,绘制城市信息
     */
    $("#countryId").change(function(e){
       
        var temp = $(this).val().split("|");
        $.get(base_url + 'admin.php/Product/ajaxCity/' + temp[0],{},function(data){
            if(data == null || data.length == 0){
                $("#cityId").html('<option value="-1">选择城市</option>');
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


    /**
     *@desc　批量上架列表
     */
    $("#batch-on-shelf").click(function(e){
        layer.confirm('确定批量上架？', {
            btn: ['确定','取消']
        }, function(){
            var form = document.getElementById("batch-form");
            form.action = base_url + '/Product/onBatchShelf/';
            form.submit();
            return;
        }, function(){

        });
    });
    /**
     *@desc　批量下架列表
     */
    $("#batch-down-shelf").click(function(e){
        layer.confirm('确定批量下架？', {
            btn: ['确定','取消']
        }, function(){
            var form = document.getElementById("batch-form");
            form.action = base_url + '/Product/downBatchShelf/';
            form.submit();
            return;
        }, function(){

        });
    });

    /**
     * 选择全部
     */
    function selectAll(checkbox){
        $("[name='selectProduct[]']:checkbox").prop('checked', $(checkbox).prop('checked'));
    }

    //当商品完善时，下架操作
    function downshelf(pid){
        layer.confirm('确定下架？', {
            btn: ['确定','取消']
        }, function(){
            window.location.href = base_url+'product/downshelf/'+pid;
            return;
        }, function(){
        });
    }

    //当商品未完善时，只操作供应商字段
    function suppdownshelf(pid){
        layer.confirm('确定下架？', {
            btn: ['确定','取消']
        }, function(){
            window.location.href = base_url+'product/suppDownShelf/'+pid;
            return;
        }, function(){
        });
    }

    function onshelf(pid){
        layer.confirm('确定上架？', {
            btn: ['确定','取消']
        }, function(){
            window.location.href = base_url+'product/onshelf/'+pid;
            return;
        }, function(){
        });
    }
</script>
