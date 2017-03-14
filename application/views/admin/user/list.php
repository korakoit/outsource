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

                <form action="<?=base_url('admin/user/index')?>" method="get" class="form-horizontal">
                    <div class="clearfix margin_left_90">

                        <div class="control-group pull-left margin-right-20"  style="margin-left:20px;">

                            <label class="control-label">First Name:</label>

                            <div class="controls">
                                <input type="text" name="first_name" class="medium m-wrap" placeholder="Input Frist Name"value="<?=isset($search['first_name'])?$search['first_name']:''?>">
                            </div>

                        </div>

                        <div class="control-group pull-left margin-right-20"  style="margin-left:20px;">

                            <label class="control-label">Last Name:</label>

                            <div class="controls">
                                <input type="text" name="last_name" class="medium m-wrap" placeholder="Input Last Name"value="<?=isset($search['last_name'])?$search['last_name']:''?>">
                            </div>

                        </div>

                        <div class="control-group pull-left margin-right-20"  style="margin-left:20px;">

                            <label class="control-label">Email Address:</label>

                            <div class="controls">

                                <input type="text" name="email_address" class="medium m-wrap" placeholder="Input Email Address" value="<?=isset($search['email_address'])?$search['email_address']:''?>">

                            </div>

                        </div>

                        <div class="control-group pull-left margin-right-20"  style="margin-left:20px;">

                            <label class="control-label">Status:</label>

                            <div class="controls">

                                <select name="status">
                                    <option value="">Select</option>
                                    <option value="1" <?php if (isset($search['status'])&&$search['status']==1) echo 'selected';?>>Wait Check</option>
                                    <option value="2" <?php if (isset($search['status'])&&$search['status']==2) echo 'selected';?>>Pass</option>
                                    <option value="3" <?php if (isset($search['status'])&&$search['status']==3) echo 'selected';?>>Un Pass</option>
                                </select>
                            </div>

                        </div>


                    </div>


                    <div class="clearfix margin-bottom-10">

                        <div class="pull-left margin-right-20" style="margin-right:20px;">

                            <button class="btn blue" type="submit">Search</button>

                        </div>

                    </div>

                </form>
            </div>

            <!-- 开始分割线-->
            <ul class="nav nav-list">

                <li class="divider"></li>

            </ul>
            <!-- 结束分割线-->
            <form id="batch-form" name="batch-form" method="get"  action="<?=base_url('admin/user/index')?>">
                <table class="table table-striped table-bordered table-hover" id="sample_1">

                    <thead>

                    <tr>
                        <th class="hidden-480">Name</th>

                        <th class="hidden-480">Email Address</th>

                        <th class="hidden-480">Company Name</th>

                        <th class="hidden-480">Location</th>

                        <th class="hidden-480">Company Website</th>

                        <th class="hidden-480">Business Phone</th>

                        <th class="hidden-480">Status</th>

                        <th class="hidden-480">Ctime</th>

                        <th class="hidden-480">Operation</th>

                    </tr>

                    </thead>

                    <tbody>
                    <?php if (isset($result)):?>
                        <?php foreach ($result as $key=>$value):?>
                            <tr>
                                <td class="hidden-480"><?=$value['first_name'].' '.$value['last_name']?></td>
                                <td class="hidden-480"><?=$value['email_address']?></td>
                                <td class="hidden-480"><?=$value['company_name']?></td>
                                <td class="hidden-480"><?=$value['location']?></td>
                                <td class="hidden-480"><?=$value['company_website']?></td>
                                <td class="hidden-480"><?=$value['business_phone']?></td>
                                <td class="hidden-480"><?=$value['ctime']?></td>
                                <td class="hidden-480">
                                    <?php if ($value['status']==1):?>
                                        Wait Check
                                    <?php elseif($value['status']==2):?>
                                        Pass
                                    <?php else:?>
                                        UnPass
                                    <?php endif;?>
                                </td>
                                <td class="hidden-480">
                                    <a  class="btn green" href="<?=base_url('admin/user/beforeEdit?'.'id='.$value['id'])?>">Edit</a>
                                    <a class="btn red" onclick="deleteUser(<?=$value['id']?>)">Delete</a>
                                    <?php if (in_array($value['status'],[1,3])):?>
                                        <a class="btn green" onclick="passUser('<?=$value['id']?>')" >Pass</a>
                                    <?php endif;?>
                                    <?php if (in_array($value['status'],[1,2])):?>
                                        <a class="btn red" onclick="unpassUser('<?=$value['id']?>')" >UnPass</a>
                                    <?php endif;?>
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


    function unpassUser(id){
        layer.confirm('Confirm Un Pass？', {
            btn: ['Yes','No']
        }, function(index){
            $.post("<?=base_url('admin/User/setUserStatus')?>",{id:id,status:3},function(data){
                if (data.err_code=='0000'){
                    layer.msg('Save Success');
                    window.location.reload();
                }else{
                    layer.msg(data.err_msg);
                }

            });
            layer.close(index);
        }, function(){

        });
    }

    function passUser(id){
        layer.confirm('Confirm Pass？', {
            btn: ['Yes','No']
        }, function(index){
            $.post("<?=base_url('admin/User/setUserStatus')?>",{id:id,status:2},function(data){
                if (data.err_code=='0000'){
                    layer.msg('Save Success');
                    window.location.reload();
                }else{
                    layer.msg(data.err_msg);
                }

            });
            layer.close(index);
        }, function(){

        });
    }

    function deleteUser(id){
        layer.confirm('Confirm Delete？', {
            btn: ['Yes','No']
        }, function(index){
            $.post("<?=base_url('admin/User/delete')?>",{id:id},function(data){
                if (data.err_code=='0000'){
                    layer.msg('Delete Success');
                    window.location.reload();
                }else{
                    layer.msg(data.err_msg);
                }

            });
            layer.close(index);
        }, function(){

        });
    }

</script>