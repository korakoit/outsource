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
            
            </div>
        </div>
         <div class="row-fluid">
         	<div class="span12">
                <form  class="form-horizontal" method="post" id="edit-form" action="<?=base_url('public_area/update')?>">
                        	<div class="control-group">
                            	<label  class="control-label">国家名称<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<label class="help-inline"><?=$country_name?></label>
                            </div>
                            </div>
                        	<div class="control-group">
                            	<label  class="control-label">城市名称<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<label class="help-inline"><?=$city_name?></label>
                            </div>
                            </div>
                        	<div class="control-group">
                            	<label  class="control-label">区域名称<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="hidden" name="id" value="<?=$id?>" id="id"> 
                            	<input type="text"   class="span2 m-wrap" id="area_name" name="area_name" value="<?=$area_name?>">
                            </div>
                            </div>
                           <div class="control-group">
                            	<label  class="control-label col-sm-3">区域英文名称<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	    <input type="text"  class="span2 m-wrap" id="area_engname" name="area_engname" value="<?=$area_engname?>">
                            	</div>
                            </div>
                           <div class="form-actions">
                        	<input type="submit" class="btn btn blue" value="提交">
                            <a class="btn btn blue" id="cansel" onclick="history.back()"> 取消</a>
                            </div>
					   </form>
					<div>
                </div>
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
	jQuery.validator.addMethod("regex", function(value, element) {
    	var regex = /^([a-zA-Z ().@%#]+)$/;
    	return this.optional(element) || (regex.test(value));
    	}, "只能输入英文字母");
	var validator = $("#edit-form").validate({
 		errorElement: 'span',
 		errorClass: 'help-inline', // default input error message class
        focusInvalid: true, // do not focus the last invalid input
        onfocus: true,
        onkeyup: false,
        ignore: "",
 		rules :{
			area_name : {
				required : true,
				remote : {
					url 	: base_url + "public_area/ajaxArea",
					type 	: "get",
					dataType : "json",
					data :{
						area_name : function(){ 
							return $("#area_name").val();
						},
						 id   : function(){ 
							return $("#id").val();
						}
					},
					dataFilter: function(data,type){
						if(data == 0)
							return true;
						else
							return false;
					}
				}
			},
			area_engname : {
					reqex : true
				}
			
			
 		},
		 messages: {  //对应上面的错误信息
			   country: {
			           required : "必填"
	 			        },
	 		      city: {
	 			  	 	required : "必填"
			 			},
			 area_name: {
						required : "必填",
           		remote : "已添加"
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
