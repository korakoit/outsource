<?php $this->load->view('block/header.php');?>
<?php $this->load->view('block/nav_top.php');?>
<?php $this->load->view('block/nav_bar.php');?>
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
    <div id="portlet-config" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button"></button>
            <h3>portlet Settings</h3>
        </div>
        <div class="modal-body">
            <p>Here will be a configuration form</p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <?php $this->load->view('block/style_bar.php');?>
                <h3 class="page-title">
                </h3>
               <?php $this->load->view('block/bread_crumb.php');?>
            </div>
        </div>
         <div class="row-fluid">
         	<div class="span12">
						<form  class="form-horizontal" method="get"  id="add-form">
							<div class="control-group ">
                        		<label  class="control-label">权限名称<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="text" name="role_name" class="form-control" id="role">
                            	</div>
                        	</div>
                        	<div class="control-group">
                        		<label  class="control-label col-sm-3">权限类型<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<select name="role_category">
                            	<option value="index">主页</option>
                            	<option value="product">商品</option>
                            	<option value="order">订单</option>
                            	<option value="aftersale">售后</option>
                            	<option value="refund">退款</option>
                            	<option value="financial">财务</option>
                            	<option value="public">公共数据</option>
                            	<option value="system">系统设置</option>
                            	</select>
                            	</div>
                        	</div>
					        <div class="form-actions pagination-centered" style="margin-right:150px;">
                        	<button class="btn btn blue" id="sub">提交</button>
                            <a class="btn btn blue" id="cansel" onclick="history.back()"> 取消</a>
                       		</div>
						
						
						</form>
</div>
</div>
</div>
</div>
<?php $this->load->view('block/footer.php')?>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>

<script type="text/javascript">

$(function() {
	jQuery.validator.addMethod("chinese", function(value, element) {
    	var chinese = /^[\u4e00-\u9fa5]+$/;
    	return this.optional(element) || (chinese.test(value));
    	}, "只能输入中文");
	var validator = $("#add-form").validate({
 		errorElement: 'span',
 		errorClass: 'help-inline', // default input error message class
        focusInvalid: true, // do not focus the last invalid input
        onfocus: true,
        onkeyup: false,
        ignore: "",
 		rules :{
			  role : {
				required : true,
				chinese  : true,
				remote : {
					url 	: base_url + "public_role/ajaxRole",
					type 	: "get",
					dataType : "json",
					data :{
					role : function(){ 
							return $("#role").val();
						}
					},
					dataFilter: function(data,type){
						if(data == 0)
							return true;
						else
							return false;
					}
				}
			}
			
		
 		},
 		highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.help-inline').removeClass('ok'); // display OK icon
            $(element)
                .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change dony by hightlight
            $(element)
                .closest('.control-group').removeClass('error'); // set error class to the control group
        },
        success: function (label) {
            if (label.attr("for") == "service" || label.attr("for") == "membership") { // for checkboxes and radip buttons, no need to show OK icon
                label
                    .closest('.control-group').removeClass('error').addClass('success');
                label.remove(); // remove error label here
            } else { // display success icon for other inputs
                label
                    .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
            }
        },
        submitHandler: function (form) {
           form.submit();
        }
 		 
 	});
});	


</script>