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

            <div class="row-fluid">

                <div class="span12 page-404">

                    <div class="number">

                        Welcome

                    </div>

                    <div class="details">

                        <h3>Friend, Welcome.</h3>

                        <p>

                            Welcome to use this website.<br />


                        </p>


                    </div>

                </div>

            </div>

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

</script>
