<?php $this->load->view('admin/block/header.php'); ?>

<?php $this->load->view('admin/block/nav_top.php'); ?>

<?php $this->load->view('admin/block/nav_bar.php'); ?>

<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>assets/css/select2_metro.css"/>

<script type="text/javascript" charset="utf-8" src="<?=STATIC_FILE_HOST?>ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?=STATIC_FILE_HOST?>ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="<?=STATIC_FILE_HOST?>ueditor/lang/en/en.js"></script>


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
                                <a href="<?= base_url("news/index") ?>">news Info</a>
                                <i class="icon-angle-right"></i>
                            </li>
                        </ul>
                        <!-- END BREADCRUMB -->
                    </div>
                </div>
                <form class="form-horizontal" method="post" id="news_form" action="<?=$action?>">
                    <h3 class="form-section">news Info</h3>
                    <div class="row-fluid">
                        <div class="span12">

                            <?php if (isset($news)):?>
                                <input type="hidden" name="id" value="<?=$news['id']?>"/>
                            <?php endif;?>

                            <div class="control-group">
                                <label class="control-label">Title:<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" placeholder="Input Title" name="title" value="<?=isset($news)?$news['title']:''?>">
                                    <span class="help-inline" for="title"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Content:<span class="required">*</span></label>
                                <div class="controls">
                                    <script id="editor" type="text/plain" style="width:90%;height:500px;"><?=isset($news)?$news['content']:''?></script>
                                    <span class="help-inline" for="title"></span>
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

    var ue = UE.getEditor('editor');

    $(document).ready(function(){

        $('#news_form').ajaxForm(function(data){
            if (data.err_code=='0000'){
                layer.msg('Save Success');
            }
        });
        
    });
</script>
