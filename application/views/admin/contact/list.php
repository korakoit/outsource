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

                <form action="<?=base_url('admin/contact/index')?>" method="get" class="form-horizontal">
                    <div class="clearfix margin_left_90">


                        <div class="control-group pull-left margin-right-20"  style="margin-left:-20px;">

                            <label class="control-label">Name:</label>

                            <div class="controls">

                                <input type="text" name="name" class="medium m-wrap" placeholder="Input Name"value="<?=isset($search['name'])?$search['name']:''?>">

                            </div>

                        </div>

                        <div class="control-group pull-left margin-right-20"  style="margin-left:-20px;">

                            <label class="control-label">Email:</label>

                            <div class="controls">

                                <input type="text" name="email" class="medium m-wrap" placeholder="Input Email" value="<?=isset($search['email'])?$search['email']:''?>">

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
            <form id="batch-form" name="batch-form" method="post" >
                <table class="table table-striped table-bordered table-hover" id="sample_1">

                    <thead>

                    <tr>
                        <th class="hidden-480">Number</th>

                        <th class="hidden-480">Name</th>

                        <th class="hidden-480">Email</th>

                        <th class="hidden-480">Subject</th>

                        <th class="hidden-480">Note</th>

                        <th class="hidden-480">Ctime</th>

                        <th class="hidden-480">Operation</th>

                    </tr>

                    </thead>

                    <tbody>
                    <?php if (isset($result)):?>
                        <?php foreach ($result as $key=>$value):?>
                            <tr>
                                <td class="hidden-480"><?=($key+1)?></td>
                                <td class="hidden-480"><?=$value['name']?></td>
                                <td class="hidden-480"><?=$value['email']?></td>
                                <td class="hidden-480"><?=$value['subject']?></td>
                                <td class="hidden-480"><?=$value['note']?></td>
                                <td class="hidden-480"><?=$value['ctime']?></td>
                                <td class="hidden-480">
                                    <a class="btn red" >Delete</a>
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



</script>