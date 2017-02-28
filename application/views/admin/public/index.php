<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>

<link href="<?=STATIC_FILE_HOST?>assets/css/dropzone.css" rel="stylesheet"/>
<script src="<?=STATIC_FILE_HOST?>assets/js/dropzone.js"></script>

<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>assets/css/select2_metro.css" />
<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>assets/css/chosen.css" />
<!-- BEGIN PAGE -->

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

                <?php $this->load->view('block/style_bar.php');?>

                <!-- BEGIN PAGE TITLE & BREADCRUMB-->

                <h3 class="page-title">

                    仪表盘 <small>首页</small>

                </h3>

                <ul class="breadcrumb">

                    <li>

                        <i class="icon-home"></i>

                        <a href="#">首页</a>

                        <i class="icon-angle-right"></i>

                    </li>

                    <li>

                        <a href="#">仪表盘</a>

                        <i class="icon-angle-right"></i>

                    </li>

                    <li><a href="#">首页</a></li>

                </ul>
                <!-- END PAGE TITLE & BREADCRUMB -->

            </div>

        </div>

        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->

        <div class="row-fluid">

            <div class="span12">

                <form id="my-awesome-dropzone" class="dropzone dz-clickable" action="assets/plugins/dropzone/upload.php">

                    <div data-dz-message="" class="dz-default dz-message">

                        <span>Drop files here to upload</span>

                    </div>

                </form>

            </div>

            <div class="span12">
                <form class="form-horizontal" id="form_sample_2" action="#" novalidate="novalidate">

                        <div class="alert alert-error hide">

                            <button data-dismiss="alert" class="close"></button>

                            You have some form errors. Please check below.

                        </div>

                        <div class="alert alert-success hide">

                            <button data-dismiss="alert" class="close"></button>

                            Your form validation is successful!

                        </div>

                        <div class="control-group">

                            <label class="control-label">Name<span class="required">*</span></label>

                            <div class="controls">

                                <input type="text" class="span6 m-wrap" data-required="1" name="name">

                            </div>

                        </div>

                        <div class="control-group">

                            <label class="control-label">Email<span class="required">*</span></label>

                            <div class="controls">

                                <input type="text" class="span6 m-wrap" name="email">

                            </div>

                        </div>

                        <div class="control-group">

                            <label class="control-label">Occupation&nbsp;&nbsp;</label>

                            <div class="controls">

                                <input type="text" class="span6 m-wrap" name="occupation">

                            </div>

                        </div>

                        <div class="control-group">

                            <label class="control-label">Category<span class="required">*</span></label>

                            <div class="controls">

                                <select name="category" class="span6 m-wrap">

                                    <option value="">Select...</option>

                                    <option value="Category 1">Category 1</option>

                                    <option value="Category 2">Category 2</option>

                                    <option value="Category 3">Category 5</option>

                                    <option value="Category 4">Category 4</option>

                                </select>

                            </div>

                        </div>


                        <div class="control-group">

                            <label class="control-label">Membership<span class="required">*</span></label>

                            <div class="controls">

                                <label class="radio line">

                                    <input type="radio" value="1" name="membership">
                                    Fee
                                </label>

                                <label class="radio line">

                                   <input type="radio" value="2" name="membership">

                                    Professional

                                </label>

                                <div id="form_2_membership_error"></div>

                            </div>

                        </div>

                        <div class="control-group">

                            <label class="control-label">Services<span class="required">*</span></label>

                            <div class="controls">

                                <label class="checkbox line">

                                   <input type="checkbox" name="service" value="1"> Service 1

                                </label>

                                <label class="checkbox line">

                                   <input type="checkbox" name="service" value="2"> Service 2

                                </label>

                                <label class="checkbox line">

                                   <input type="checkbox" name="service" value="3"> Service 3

                                </label>

                                <span class="help-block">(select at least two)</span>

                                <div id="form_2_service_error"></div>

                            </div>

                        </div>

                        <div class="form-actions">

                            <button class="btn green" type="submit">Validate</button>

                            <button class="btn" type="button">Cancel</button>

                        </div>

                    </form>
            </div>

        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="tabbable" id="tabs-909169">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="#panel-498772" data-toggle="tab">第一部分</a>
                        </li>
                        <li class="active">
                            <a href="#panel-417973" data-toggle="tab">第二部分</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="panel-498772">
                            <p>
                                第一部分内容.
                            </p>
                        </div>
                        <div class="tab-pane active" id="panel-417973">
                            <p>
                                第二部分内容.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">

            <div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">

                <!-- BEGIN EXAMPLE TABLE PORTLET-->

                <div class="portlet box grey">

                    <div class="portlet-title">

                        <div class="caption"><i class="icon-user"></i>Table</div>

                        <div class="actions">

                            <a href="#" class="btn blue"><i class="icon-pencil"></i> Add</a>

                            <div class="btn-group">

                                <a class="btn green" href="#" data-toggle="dropdown">

                                    <i class="icon-cogs"></i> Tools

                                    <i class="icon-angle-down"></i>

                                </a>

                                <ul class="dropdown-menu pull-right">

                                    <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>

                                    <li><a href="#"><i class="icon-trash"></i> Delete</a></li>

                                    <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>

                                    <li class="divider"></li>

                                    <li><a href="#"><i class="i"></i> Make admin</a></li>

                                </ul>

                            </div>

                        </div>

                    </div>

                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" id="sample_2">

                            <thead>

                            <tr>

                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" /></th>

                                <th>Username</th>

                                <th class="hidden-480">Email</th>

                                <th class="hidden-480">Status</th>

                            </tr>

                            </thead>

                            <tbody>

                            <tr class="odd gradeX">

                                <td><input type="checkbox" class="checkboxes" value="1" /></td>

                                <td>吃111</td>

                                <td class="hidden-480"><a href="mailto:shuxer@gmail.com">shuxer@gmail.com</a></td>

                                <td><span class="label label-success">Approved</span></td>

                            </tr>

                            <tr class="odd gradeX">

                                <td><input type="checkbox" class="checkboxes" value="1" /></td>

                                <td>looper</td>

                                <td class="hidden-480"><a href="mailto:looper90@gmail.com">looper90@gmail.com</a></td>

                                <td><span class="label label-warning">Suspended</span></td>

                            </tr>

                            <tr class="odd gradeX">

                                <td><input type="checkbox" class="checkboxes" value="1" /></td>

                                <td>userwow</td>

                                <td class="hidden-480"><a href="mailto:userwow@yahoo.com">userwow@yahoo.com</a></td>

                                <td><span class="label label-success">Approved</span></td>

                            </tr>

                            <tr class="odd gradeX">

                                <td><input type="checkbox" class="checkboxes" value="1" /></td>

                                <td>user1wow</td>

                                <td class="hidden-480"><a href="mailto:userwow@gmail.com">userwow@gmail.com</a></td>

                                <td><span class="label label-inverse">Blocked</span></td>

                            </tr>

                            <tr class="odd gradeX">

                                <td><input type="checkbox" class="checkboxes" value="1" /></td>

                                <td>restest</td>

                                <td class="hidden-480"><a href="mailto:userwow@gmail.com">test@gmail.com</a></td>

                                <td><span class="label label-success">Approved</span></td>

                            </tr>

                            <tr class="odd gradeX">

                                <td><input type="checkbox" class="checkboxes" value="1" /></td>

                                <td>foopl</td>

                                <td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>

                                <td><span class="label label-success">Approved</span></td>

                            </tr>

                            <tr class="odd gradeX">

                                <td><input type="checkbox" class="checkboxes" value="1" /></td>

                                <td>weep</td>

                                <td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>

                                <td><span class="label label-success">Approved</span></td>

                            </tr>

                            <tr class="odd gradeX">

                                <td><input type="checkbox" class="checkboxes" value="1" /></td>

                                <td>coop</td>

                                <td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>

                                <td><span class="label label-success">Approved</span></td>

                            </tr>

                            <tr class="odd gradeX">

                                <td><input type="checkbox" class="checkboxes" value="1" /></td>

                                <td>pppol</td>

                                <td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>

                                <td><span class="label label-success">Approved</span></td>

                            </tr>

                            <tr class="odd gradeX">

                                <td><input type="checkbox" class="checkboxes" value="1" /></td>

                                <td>test</td>

                                <td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>

                                <td><span class="label label-success">Approved</span></td>

                            </tr>

                            <tr class="odd gradeX">

                                <td><input type="checkbox" class="checkboxes" value="1" /></td>

                                <td>userwow</td>

                                <td class="hidden-480"><a href="mailto:userwow@gmail.com">userwow@gmail.com</a></td>

                                <td><span class="label label-inverse">Blocked</span></td>

                            </tr>

                            <tr class="odd gradeX">

                                <td><input type="checkbox" class="checkboxes" value="1" /></td>

                                <td>test</td>

                                <td class="hidden-480"><a href="mailto:userwow@gmail.com">test@gmail.com</a></td>

                                <td><span class="label label-success">Approved</span></td>

                            </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

                <!-- END EXAMPLE TABLE PORTLET-->

            </div>

        </div>

        <div class="row-fluid">

          <div class="tab-pane active" id="tab_1">

            <div class="portlet box blue">

                <div class="portlet-body form">

                    <!-- BEGIN FORM-->

                    <form action="#" class="horizontal-form">

                        <div class="row-fluid">

                            <div class="span6 ">

                                <div class="control-group">

                                    <label class="control-label" >分类选择</label>

                                    <div class="controls">

                                        <select class="span12 select2_category" data-placeholder="选择分类" tabindex="1">

                                            <option value=""></option>

                                            <option value="Category 1">分类 1</option>

                                            <option value="Category 2">分类 2</option>

                                            <option value="Category 3">分类 5</option>

                                            <option value="Category 4">分类 4</option>

                                        </select>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </form>

                    <!-- END FORM-->

                </div>

            </div>

        </div>
        </div>

    <!-- END PAGE CONTENT-->

     </div>

    <!-- END PAGE CONTAINER-->

</div>

<!-- END PAGE -->

<?php $this->load->view('block/footer.php')?>

<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/chosen.jquery.min.js"></script>

<!-- 弹窗相关 -->
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>

<!-- 数据验证相关 -->
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/jquery.validate.min.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/form-validation.js"></script>

<!-- 表格相关 -->
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/DT_bootstrap.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/table-managed.js"></script>

<!-- select2相关 -->
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/select2.min.js"></script>

<script>

    jQuery(document).ready(function() {

        //数据验证
        FormValidation.init();

        //表格
        TableManaged.init();

        //selsect2 用法
        $('.select2_category').select2({
            placeholder: "Select an option",
            allowClear: true
        });
    });


</script>