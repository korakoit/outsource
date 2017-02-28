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
                  <form  class="form-horizontal" method="post"  id="edit-form" action="<?=base_url('public_country/update');?>">
                        	<div class="control-group">
                            	<label  class="control-label">国家中文名称<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
	                            	<input type="hidden" name="id" value="<?=$id?>" id="id">
	                            	<input type="text"  id="country_name" class="span4 m-wrap" name="country_name" value="<?=$country['country_name']?>">
	                            	<span class="help-inline" id="msg" ></span>
                            	</div>
                            </div>
						  <div class="control-group">
							  <label  class="control-label" for="country_py">国家拼音名称<span class="required" style="color:red;">*</span></label>
							  <div class="controls">
								  <input type="text"  class="span4 m-wrap"   name='country_py' id="country_py"  value="<?=$country['country_py']?>">(用于网址SEO优化)
							  </div>
						  </div>
                            <div class="control-group">
                            	<label  class="control-label">国家英文名称<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            		<input type="text" id="country_engname" class="span4 m-wrap" name="country_engname" value="<?=$country['country_engname']?>">
                            		<span class="help-inline" id="msg2" ></span>
                            	</div> 
                            </div>
                            <div class="control-group">
                            	<label  class="control-label">国家简称<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
	                            	<label class="help-inline"><?=$country['country_code']?></label>
	                            	<span class="help-inline" id="msg1" ></span>
                            	</div>
                            </div>
                            <div class="control-group">
                            	<label  class="control-label" for="continent">所属洲<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<select  class="span2 m-wrap" name='continent' id="continent" >
                            	<?php foreach($this->continent as $k =>$row):?>
                            		<option value="<?=$row['id']?>" <?php if(isset($country['continent']) && $country['continent']==$row['id']){echo "selected";} ?> ><?=$row['name'] . "(" .$row['en'] .")"?></option>
                            	<?php endforeach;?>
                            	</select>
                            	</div>
                            </div> 
                            <div class="control-group">
                            	<label  class="control-label">时差<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
	                            <input type="text" name="diff" id="diff" clss="span4 m-wrap" maxlength="3" value="<?=$country['diff']?>">
                            	</div>
                            </div>
                             <div class="form-actions">
	                           	<input class="btn btn blue" id="sub" type="submit" value="提交">
	                            <a class="btn btn blue" id="cansel" onclick="history.back()"> 取消</a>
	                         </div>
	                        
                  </form> 
				</div>
			</div>  
		<div>
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
	jQuery.validator.addMethod("checkdiff", function(value, element) {
    	var number =   /^[+-]?\d{1,3}$/; 
    	return this.optional(element) || (number.test(value));
    	}, "只能输两位正负整数");
	jQuery.validator.addMethod("checknum", function(value, element) {
    	var number =   /^(\-|\+?)\d+(\.\d+)?$/;
    	return this.optional(element) || (number.test(value));
    	}, "只能输正负数字和小数点");
	jQuery.validator.addMethod("chinese", function(value, element) {
    	var chinese = /^[\u4e00-\u9fa5]+$/;
    	return this.optional(element) || (chinese.test(value));
    	}, "只能输入中文");
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
			country_name : {
				required : true,
				chinese  : true,
				remote : {
					url 	: base_url + "public_country/ajaxHome",
					type 	: "get",
					dataType : "json",
					data :{
						country_name : function(){ 
							return $("#country_name").val();
						},
								  id : function(){ 
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
			country_py : {
				required: true,
			},
			diff : {
				required : true,
				checkdiff: true
				
				},
			country_engname : {
				regex : true


			}
			
 		},
	  messages: {  //对应上面的错误信息
 			country_name: {required: "必填",
                           remote: "已添加"
 	 			 },
  	 		country_engname : {
						regex:"请输入英文"
	 	 	 		},
  	 		country_code: {required:"必填",
                     		remote:"已添加"
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
