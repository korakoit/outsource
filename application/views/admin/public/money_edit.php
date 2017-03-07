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
               <form  class="form-horizontal" method="post" action="<?=base_url('public_money/update')?>" id="edit-form">
                       
                       <div class="control-group">
                           <label  class="control-label">货币名称<span class="required" style="color:red;">*</span></label>
                               <div class="controls">
                            	<input type="hidden" name="id" value="<?=$id?>" id="id">
                            	<input type="text"   class="form-control" id="money_name" name="money_name" value="<?=$money['money_name']?>">
                            	<label  id="msg" class="help-inline" ></label>
                               </div>
                       </div>
                       <div class="control-group">
                            <label  class="control-label">货币代码<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="text" class="form-control" name="money_code"  id="money_code" value="<?=$money['money_code']?>">
                            	<label  id="msg1" class="help-inline" ></label>
                            	</div>
                       </div>    	
                       <div class="control-group">
                            <label  class="control-label">货币符号<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="text"   class="form-control" name="coin_sign" id="coin_sign" value="<?=$money['coin_sign']?>">
                            	<label  id="msg2" class="help-inline" ></label>
                            	</div>
                       </div>
                       <div class="control-group">
                            <label  class="control-label">汇率<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="text"  class="form-control" name="e_rate"  id="e_rate" value="<?=$money['e_rate']?>" maxlength="6">
                            	</div>
                       </div>
                       <div class="form-actions">
                        	<input type="submit" class="btn btn blue" value="提交">
                            <a class="btn btn blue"  onclick="history.back()"> 取消</a>
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
		country_id  : {
				required : true
					},
			 money_name : {
				required : true,
				remote : {
					url 	: base_url + "public_money/ajaxMoney",
					type 	: "get",
					dataType : "json",
					data :{
						money_name : function(){ 
							return $("#money_name").val();
						},
						id     : function(){
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
			
			 money_code : {
				required : true,
				regex    : true,
				remote : {
					url 	: base_url + "public_money/ajaxCode",
					type 	: "get",
					dataType : "json",
					data :{
					money_code : function(){ 
							return $("#money_code").val();
						},
						id     : function(){
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
			 coin_sign : {
				required : true,
				remote : {
					url 	: base_url + "public_money/ajaxCoin",
					type 	: "get",
					dataType : "json",
					data :{
					coin_sign : function(){ 
							return $("#coin_sign").val();
						},
						id     : function(){
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
			 e_rate : {
				required : true
			}
			
 		},
		 messages: {  //对应上面的错误信息
 			money_name: {required : "必填",
 			             remote : "已添加"
 	 			        },
  	 		money_code: {required : "必填",
                        remote : "已添加",
                        regex  : "请填写英文"
			 			},
			coin_sign: {required : "必填",
                 		remote : "已添加"
					    },
			 e_rate :  {
					   required : "必填"
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