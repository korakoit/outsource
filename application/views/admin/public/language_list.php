<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>

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

    <!-- BEGIN PAGE CONTAINER--
>
    <div class="container-fluid">

        <!-- BEGIN PAGE HEADER-->

        <div class="row-fluid">

            <div class="span12">


            </div>

        </div>

        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box blue">
                    <div class="portlet-title">
                    <div class="caption"><i class="icon-reorder"></i>翻译</div>
                    </div>

                    <div class="portlet-body ">

                        <form id="search_form" action="<?=base_url('Language/languageList')?>" method="get">

                            <div class="clearfix margin-bottom-20">
                               <div class="pull-left margin-right-20" style="margin-right:20px;">
                                    <label >中文字段:</label>
                                    <div>
                                        <input class="form-control" type="text" name="field" value="<?=(isset($field))?$field:''?>"/>
                                    </div> 
                               </div>
                            </div>
                             

                            <div class="clearfix margin-bottom-10">

                                <div class="pull-left margin-right-20" style="margin-right:20px;">

                                    <div class="input-icon left">
                                        <button class="btn blue" type="button" onclick="$('#search_form').submit()">搜索</button>
                                    </div>

                                </div>

                                <div class="pull-left margin-right-20" style="margin-right:20px;">

                                    <div class="input-icon left">
                                        <button class="btn blue" type="button" onclick="saveTranslation()">保存</button>
                                    </div>

                                </div>

                                 <div class="pull-left margin-right-20">

                                    <div class="input-icon left">
                                        <button class="btn blue" type="button" onclick="$('#add_field_dialog').modal('show');$('#add_field_form')[0].reset();">添加</button>
                                    </div>

                                </div>

                            </div>

                        </form>
                   
            <table class="table table-striped table-hover table-bordered" id="sample_1">

                <thead>

                <tr>
                    <th class="hidden-480">中文</th>
                    <?php foreach ($this->language_type_list as $key => $value):?>
                        <th class="hidden-480"><?=$value?></th>
                    <?php endforeach;?>
                </tr>

                </thead>

                <tbody>

                <?php if(!empty($result)):?>
                <?php foreach($result as $key=>$row):?>
                    <tr class="odd gradeX">
                        <td><?=$row['field']?></td>
                        <?php foreach ($this->language_type_list as $k=> $v):?>
                            <?php if(isset($translation_list[$row['id'].$v])):?>
                                <td><input class='update_field m-wrap small' data="<?=$translation_list[$row['id'].$v]['id']?>" value="<?=$translation_list[$row['id'].$v]['t_value']?>"/></td>
                            <?php else:?>
                                <td><input class='add_field m-wrap small' data="<?=$row['id'].';'.$v?>"/></td>
                            <?php endif;?>
                        <?php endforeach;?>
                    </tr>
                <?php endforeach;?>
                </tbody>
                <?php endif;?>
            </table>

            <?php if(isset($pagination)):?>
            <div class="pagination pagination-right">
             <?=$pagination?>
            </div>
            <?php endif;?>
            </div>

            </div>

         </div>

        </div>

    <!-- END PAGE CONTAINER-->

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
         <div class="modal-body" id="tip">
            
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">关闭
            </button>
            <button type="button" class="btn btn-primary">
              提交更改
            </button>
         </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!-- END DIALOG -->

<!-- BEGIN DIALOG -->
 <!-- 模态框（Modal） -->
<div class="modal fade" id="add_field_dialog" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
            </button>
            <h4 class="modal-title" id="myModalLabel">
               添加新字段
            </h4>
         </div>
         <div class="modal-body" id="tip">
             <div id="add_field_form_alert" class="alert alert-error" style="display:none">
                        <button class="close" onclick="$('#add_field_form_alert').hide()"></button>
                        <strong id="add_field_form_alert"></strong>
                    </div>         
    
             <form class="form-horizontal" method="post"
              id="add_field_form" action="<?=base_url('Language/addPlaceholder')?>">
                <div class="control-group">
                    <label class="control-label">中文
                        <span class="required">*</span>
                    </label>
                    <div class="controls">
                         <input name="field2" />       
                    </div>
                </div>
                <?php foreach ($this->language_type_list as $key => $value):?>
                    <div class="control-group">
                        <label class="control-label"><?=$value?>
                            <span class="required">*</span>
                        </label>
                        <div class="controls">
                             <input name="$value"/>       
                        </div>
                    </div>
                <?php endforeach;?>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">关闭
            </button>
            <button type="button" class="btn btn-primary" onclick="add_field()">
               保存
            </button>
         </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!-- END DIALOG -->


<?php $this->load->view('block/footer.php')?>
<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.form.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/json.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/custom-validate.js" type="text/javascript" ></script>

<script type="text/javascript">

    $(document).ready(function(){
        $('#add_field_form').ajaxForm(function(data){
            if(data.error_code==0){
                $('#add_field_dialog').modal('hide');
            }else{
                 $('#add_field_form_alert').text(data.error_msg);
                 $('#add_field_form_alert').show();
            }
        });
    });

    function saveTranslation(){
        var update_list = new Array();
        var add_list = new Array();

        $('.add_field').each(function(){
            var tmp = $(this).attr('data').split(';');
            add_list.push({
                placeholder_id : tmp[0],
                language_type : tmp[1],
                t_value : $(this).val()
            });
        });

        $('.update_field').each(function(){
            var tmp = $(this).attr('data');
            update_list.push({
                id : tmp,
                t_value : $(this).val() 
            });
        });
        var data = {
            add_list : add_list,
            update_list : update_list
        };

        $.post('<?=base_url('Language/saveTranslation')?>',{'data':JSON.stringify(data)},function(data){
            if(data.error_code==0){
                $('#tip').text('保存成功');
                $('#myModal').modal('show');
                setTimeout("$('#myModal').modal('hide');$('#search_form').submit();",2000);
            }else{
                $('#tip').text('保存失败');
                $('#myModal').modal('hide');
            }
        });
    }

    function add_field(){
        var field = $('input[name="field2"]');
        if(!valid_required(field.val())){
            $('#add_field_form_alert').text("请完善信息");
            $('#add_field_form_alert').show();
            show_error_css(field);
            return false;
        } 
         $('#add_field_form_alert').hide();
        $('#add_field_form').submit();    
    }
</script>

<script type="text/javascript">
    
    function show_error_css(element){
        element.css('border','1px solid #b94a48');

        element.click(function(){
            $(this).css('border','1px solid #e5e5e5');
        });

        element.focus(function(){
            $(this).css('border','1px solid #e5e5e5');
        });

        element.change(function(){
            $(this).css('border','1px solid #e5e5e5');
        });
    }

</script>
