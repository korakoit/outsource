<?php $this->load->view('admin/block/header.php'); ?>

<?php $this->load->view('admin/block/nav_top.php'); ?>

<?php $this->load->view('admin/block/nav_bar.php'); ?>

<link rel="stylesheet" type="text/css" href="<?= STATIC_FILE_HOST ?>assets/css/select2_metro.css"/>

<link>
<!-- BEGIN PAGE -->
<style type="text/css">
    .table th, .table td {
        border-top: 1px solid #ddd;
        line-height: 20px;
        padding: 8px;
        text-align: center;
        vertical-align: middle;
    }
</style>

<div class="page-content">

    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

    <div id="portlet-config" class="modal hide">

        <div class="modal-header">

            <button data-dismiss="modal" class="close" type="button"></button>

            <h3>portlet Settings</h3>

        </div>

        <div class="modal-body">

            <p>Here will be a configuration form</p>

        </div>

    </div>

    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

    <!-- BEGIN PAGE CONTAINER-->

    <div class="container-fluid">

        <!-- BEGIN PAGE HEADER-->

        <div class="row-fluid">

            <div class="span12">

                <!--                --><?php //$this->load->view('block/style_bar.php'); ?>

                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <!--                --><?php //$this->load->view('block/bread_crumb.php'); ?>
                <!-- END PAGE TITLE & BREADCRUMB -->

            </div>

        </div>

        <!-- END PAGE HEADER-->

        <div class="page-content" id="content">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN BREADCRUMB-->
                        <ul class="breadcrumb" style="margin-top:10px;">
                            <li>
                                <a href="<?= base_url("product/index") ?>">Seller Info</a>
                                <i class="icon-angle-right"></i>
                            </li>
                        </ul>
                        <!-- END BREADCRUMB -->
                    </div>
                </div>
                <form class="form-horizontal" method="post" name="product-form" id="product-form" action="">
                    <h3 class="form-section">Seller Info</h3>
                    <div class="row-fluid">
                        <div class="span12">

                            <div class="control-group">
                                <label class="control-label"><?= T('商品名称') ?>：<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" placeholder="<?= T('输入商品名称') ?>" class="" name="name">
                                    <span class="help-inline" for="name"></span>
                                </div>
                            </div>




                        </div>
                    </div>

            </div>
        </div>
        </form>
    </div>
</div>

</div>

</div>

<!-- END PAGE -->

<!-- BEGIN DIALOG -->
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
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

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal"><?= T('关闭') ?>
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>


<?php $this->load->view('admin/block/footer.php') ?>

<script type="text/javascript">

</script>
