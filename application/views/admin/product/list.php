<?php $this->load->view('admin/block/header.php');?>

<?php $this->load->view('admin/block/nav_top.php');?>

<?php $this->load->view('admin/block/nav_bar.php');?>

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

                <form action="<?=base_url('admin/product/index')?>" method="get" class="form-horizontal">
                    <div class="clearfix margin_left_90">

                        <div class="control-group pull-left margin-right-20" style="margin-left:20px;">
                            <label class="control-label">Main Category:</label>
                            <div class="controls">
                                <select name="main_category" id="main_category" onchange="changeMainCategory()" class="medium m-wrap" >
                                    <option value="">Select</option>
                                    <?php foreach ($main_list as $key=>$value):?>
                                        <option value="<?=$key?>"
                                            <?=isset($search['main_category'])&&$search['main_category']==$key?" selected":""?>
                                        ><?=$value?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group pull-left margin-right-20" style="margin-left:20px;">
                            <label class="control-label">Sub Category:</label>
                            <div class="controls">
                                <select name="sub_category" class="medium m-wrap" id="sub_category">
                                    <option value="">Select</option>
                                    <?php foreach ($sub_list as $key=>$value):?>
                                        <option value="<?=$key?>"
                                            <?=isset($search['sub_category'])&&$search['sub_category']==$key?" selected":""?>
                                        ><?=$value?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group pull-left margin-right-20"  style="margin-left:20px;">

                            <label class="control-label">Name:</label>

                            <div class="controls">

                                <input type="text" name="name" class="medium m-wrap" placeholder="Input Name"value="<?=isset($search['name'])?$search['name']:''?>">

                            </div>

                        </div>

                        <div class="control-group pull-left margin-right-20"  style="margin-left:20px;">

                            <label class="control-label">Code:</label>

                            <div class="controls">

                                <input type="text" name="pcode" class="medium m-wrap" placeholder="Input Code" value="<?=isset($search['pcode'])?$search['pcode']:''?>">

                            </div>

                        </div>



                    </div>


                    <div class="clearfix margin-bottom-10">

                        <div class="pull-left margin-right-20" style="margin-right:20px;">

                            <button class="btn blue" type="submit">Search</button>

                            <a href="<?=base_url('admin/product/beforeAdd')?>" class="btn blue" type="submit">Add</a>

                        </div>

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
                            <th class="hidden-480">Number</th>

                            <th class="hidden-480">Image</th>

                            <th class="hidden-480">Name</th>

                            <th class="hidden-480">Code</th>

                            <th class="hidden-480">Status</th>

                            <th class="hidden-480">Storage</th>

                            <th class="hidden-480">Operation</th>

                        </tr>

                    </thead>

                    <tbody>
                    <?php if (isset($result)):?>
                    <?php foreach ($result as $key=>$value):?>
                            <tr>
                                <td class="hidden-480"><?=($key+1)?></td>
                                <td class="hidden-480"><img src="<?=$value['image']?>" style="width:30px;height: 30px"/></td>
                                <td class="hidden-480"><?=$value['name']?></td>
                                <td class="hidden-480"><?=$value['pcode']?></td>
                                <td class="hidden-480"><?=$value['status']==1?'On Shelf':'Down Shelf'?></td>
                                <td class="hidden-480"><?=$value['storage']?></td>
                                <td class="hidden-480">
                                    <a class="btn blue" href="<?=base_url('admin/product/detail?product_id='.$value['id'])?>">Edit</a>
                                    <?php if($value['status']==Product::STATUS_ON_SHELF):?>
                                        <a class="btn blue" onclick="downShelf('<?=$value['id']?>')">Down</a>
                                    <?php else:?>
                                        <a class="btn green" onclick="onShelf('<?=$value['id']?>')">On</a>
                                    <?php endif;?>
                                    <?php if($value['is_home']==0):?>
                                        <a class="btn green" onclick="setHomeStatus('<?=$value['id']?>',1)">Home</a>
                                    <?php endif;?>
                                    <a class="btn red" onclick="del('<?=$value['id']?>')">Delete</a>
                                </td>
                            </tr>
                    <?php endforeach;?>
                    <?php else:?>
                        <tr><td colspan="15">No Data</td></tr>
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

<?php $this->load->view('admin/block/footer.php')?>
<!-- 弹窗相关 -->
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/select2.min.js"></script>
<script type="text/javascript">

    function onShelf(id){
        layer.confirm('Sure On Shelf？', {
            btn: ['Yes','No']
        }, function(){
           $.post('<?=base_url('admin/product/onShelf')?>',{id:id},function(data){
               if(data.err_code=='0000'){
                   layer.msg('Save Success');
                   location.reload();
               }else{
                   layer.msg(data.err_msg);
               }
           });
        }, function(){

        });
    }

    function downShelf(id){
        layer.confirm('Sure Down Shelf？', {
            btn: ['Yes','No']
        }, function(){
            $.post('<?=base_url('admin/product/downShelf')?>',{id:id},function(data){
                if(data.err_code=='0000'){
                    layer.msg('Save Success');
                    location.reload();
                }else{
                    layer.msg(data.err_msg);
                }
            });
        }, function(){

        });
    }

    function del(id){
        layer.confirm('Sure Delete？', {
            btn: ['Yes','No']
        }, function(){
            $.post('<?=base_url('admin/product/delete')?>',{id:id},function(data){
                if(data.err_code=='0000'){
                    layer.msg('Delete Success');
                    location.reload();
                }else{
                    layer.msg(data.err_msg);
                }
            });
        }, function(){

        });
    }

    function changeMainCategory() {
        var pid = $('#main_category').val();
        $('#sub_category').empty();
        if (pid!=undefined||pid!=''){
            $.post("<?=base_url('admin/product/ajaxGetSubCategory')?>",{pid:pid},function (data) {

                $('#sub_category').append("<option value=''>Select</option>");
                $.each(data,function(index,value){
                    $('#sub_category').append("<option value='"+index+"'>"+value+"</option>");
                });
            });
        }

    }

    function setHomeStatus(product_id,is_home) {
        layer.confirm('Sure Set Home？', {
            btn: ['Yes','No']
        }, function(){
            $.post('<?=base_url('admin/product/setHomeStatus')?>',{product_id:product_id,is_home:is_home},function(data){
                if(data.err_code=='0000'){
                    layer.msg('Delete Success');
                    location.reload();
                }else{
                    layer.msg(data.err_msg);
                }
            });
        }, function(){

        });
    }

</script>