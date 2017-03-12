<?php $this->load->view('admin/block/header.php'); ?>

<?php $this->load->view('admin/block/nav_top.php'); ?>

<?php $this->load->view('admin/block/nav_bar.php'); ?>

<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>assets/css/select2_metro.css"/>

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
                <form class="form-horizontal" method="post" name="product-form" id="user_form" action="<?=base_url('admin/user/edit')?>">
                    <h3 class="form-section">Seller Info</h3>
                    <div class="row-fluid">
                        <div class="span12">

                            <input type="hidden" name="id" value="<?=$id?>"/>

                            <div class="control-group">
                                <label class="control-label">First Name:<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" placeholder="Input First Name" name="first_name" value="<?=$first_name?>">
                                    <span class="help-inline" for="first_name"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Last Name:<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" placeholder="Input Last Name" name="last_name" value="<?=$last_name?>">
                                    <span class="help-inline" for="last_name"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Email Address:<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" placeholder="Input Email Address" name="email_address" value="<?=$email_address?>">
                                    <span class="help-inline" for="name"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Company Name:<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" placeholder="Input Company Name" name="company_name" value="<?=$company_name?>">
                                    <span class="help-inline" for="company_name"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Location:<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" placeholder="Input Location" name="location" value="<?=$location?>">
                                    <span class="help-inline" for="location"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Company Website:<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" placeholder="Input Company Website" name="company_website" value="<?=$company_website?>">
                                    <span class="help-inline" for="company_website"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Business Phone:<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" placeholder="Input Business Phone" name="business_phone" value="<?=$business_phone?>">
                                    <span class="help-inline" for="business_phone"></span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-actions">

                        <button class="btn green" type="submit">Save</button>

                    </div>
                </form>
            </div>

    </div>

</div>

<!-- END PAGE -->

<?php $this->load->view('admin/block/footer.php') ?>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.form.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $('#user_form').ajaxForm(function(data){
            if (data.err_code=='0000'){
                layer.msg('Save Success');
            }
        });

    });


</script>
