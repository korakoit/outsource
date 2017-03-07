<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>
<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.css">
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

                        <li><a href="/product/editFour/<?=$id?>">价格管理</a></li>

                        <li ><a href="/product/editFive/<?=$id?>">评价管理</a></li>

                        <li class="active"><a href="#tab_1_6" data-toggle="tab">上下架管理</a></li>
                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane row-fluid" id="tab_1_1">

                        </div>


                        <div class="tab-pane profile-classic row-fluid" id="tab_1_2">

                        </div>

                        <div class="tab-pane row-fluid profile-account" id="tab_1_3">

                        </div>


                        <div class="tab-pane" id="tab_1_4">


                        </div>


                        <div class="tab-pane row-fluid" id="tab_1_5">

                         </div>

                        <div class="tab-pane row-fluid active" id="tab_1_6">

                            <div class="row-fluid">
                                <form class="form-horizontal" id="submit_form" action="/product/skuonshelf" novalidate="novalidate" method="post">
                                    <textarea style="display:none" id="statu_list" name="statu_list"></textarea>
                                    <table class="table table-striped table-bordered table-hover" id="">
                                        <thead>
                                        <tr>
                                            <th>SKU名称</th>
                                            <th>上架</th>
                                            <th>下架</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($list)):?>
                                                <?php foreach($list as $skuKey => $skuRow):?>
                                                    <?php if($skuRow['supplier_status']!=0):?>
                                                        <tr>
                                                            <td class="span6">
                                                                <?php if(!empty($skuRow['sku_name_remark'])){echo $skuRow['sku_name_remark'];}else{echo $skuRow['sku_name'];}?>
                                                            </td>
                                                            <td class="span3">
                                                                <input class="sku_lst" type="radio" value="1" <?php if($product['lm_status']==2 || $skuRow['is_complete']==0 || empty($skuRow['format_val_id'])){ echo "disabled='' title='SKU未完善或商品已下架'";}?> <?php if($skuRow['status']==1){ echo "checked";}?> data="<?=$skuRow['sku_sale_id']?>" name="<?=$skuRow['sku_sale_id']?>">
                                                            </td>
                                                            <td class="span3">
                                                                <input class="sku_lst" type="radio" value="2" <?php if($product['lm_status']==2 || $skuRow['is_complete']==0 || empty($skuRow['format_val_id'])){ echo "disabled='' title='SKU未完善或商品已下架'";}?> <?php if($skuRow['status']==2){ echo "checked";}?> data="<?=$skuRow['sku_sale_id']?>" name="<?=$skuRow['sku_sale_id']?>">
                                                            </td>
                                                        </tr>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            <?php endif;?>
                                        </tbody>
                                    </table>
                                </form>
                                <div class="form-actions">
                                    <button class="btn blue" onclick="submitForm()"><i class="icon-ok"></i>保存</button>
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
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function  submitForm(){
        var sku_list = new Array();
        $('.sku_lst:checked').each(function(){
            sku_list.push({
               sku_sale_id :$(this).attr('data'),
               status:$(this).val()
            });
        });
       $("#statu_list").text(JSON.stringify(sku_list));
       $('#submit_form').submit();
    }
</script>
