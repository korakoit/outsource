<?php $this->load->view('block/header.php');?>
<?php $this->load->view('block/nav_top.php');?>
<?php $this->load->view('block/nav_bar.php');?> 
<style type="text/css">
    .uploadify-queue {height: 0px;}
</style>
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
                 <form  class="form-horizontal" method="post" enctype="multipart/form-data" id="edit-form" action="<?=base_url('public_city/update')?>">
                        	<div class="control-group">
                            	<label  class="control-label">国家名称<span class="required" style="color:white;">*</span></label>
                            	<div class="controls"> 
                            	<label class="help-inline"><?=$country_name?></label>
                            	</div>
                            </div>
                        	<div class="control-group">
                            	<label  class="control-label">城市名称<span class="required" style="color:red;">*</span></label>
                            	<input type="hidden" name="id" value="<?=$id?>" id="id">
                            	<div class="controls"> 
                            	<input type="text" id="city_name"  class="form-control" name="city_name" value="<?=$city['city_name']?>">
                            	<label  id="msg" class="help-inline" ></label>
                            	</div>
                            </div>
						 <div class="control-group">
							 <label  class="control-label">城市拼音名称<span class="required" style="color:red;">*</span></label>
							 <div class="controls">
								 <input type="text"   class="form-control" name="city_py" id="city_py" value="<?=$city['city_py']?>">
								 <span class="help-inline" id="msg" ></span>
								 (用于网址SEO优化)
							 </div>
						 </div>
                            <div class="control-group">
                            	<label  class="control-label col-sm-3">城市英文名称<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="text"   class="form-control" name="city_engname" id="city_engname" value="<?=$city['city_engname']?>">
                            	<label  id="msg2" class="help-inline" ></label>
                            	</div>
                            </div>
                           <div class="control-group">
                            	<label  class="control-label">城市简称<span class="required" style="color:red;">*</span></label>
                            	<div class="controls"> 
                            	<label class="help-inline"><?=$city['city_code']?></label>
                            	<label  id="msg1" class="help-inline" ></label>
                            </div>
                            </div>
                            <div class="control-group">
                            	<label  class="control-label col-sm-3">机场示意图<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="file"  class="form-control" name="airport" id="airport" >
                            	<a id="airShow" href="<?php if(!empty($city['map_url'])){echo IMAGE_FILE_HOST.substr($city['map_url'],0,2)."/".$city['map_url'];}else echo "";?>" class="btn green" target="_blank" style="display:none;">预览</a>
                            	</div>
                   			</div>
                   			
                            <div class="form-actions">
                             <input class="btn btn blue" value="提交" type="submit" id="sub">
                             <a class="btn btn blue" id="cansel" onclick="history.back()"> 取消</a>
                            </div> 
					</form>
					</div>
					</div>
					<div>
					<div>
                </div>
			</div>
		</div>
	</div>

<?php $this->load->view('block/footer.php')?>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(function() {
	var obj = $("#airShow").attr("href");
	if(obj){
	$("#airShow").show();
	}
	jQuery.validator.addMethod("regex", function(value, element) {
    	var regex = /^([a-zA-Z ().@%#]+)$/;
    	return this.optional(element) || (regex.test(value));
    	}, "只能输入英文字母");
    jQuery.validator.addMethod("chinese", function(value, element) {
    	var chinese = /^[\u4e00-\u9fa5]+$/;
    	return this.optional(element) || (chinese.test(value));
    	}, "只能输入中文");
	var validator = $("#edit-form").validate({
 		errorElement: 'span',
 		errorClass: 'help-inline', // default input error message class
        focusInvalid: true, // do not focus the last invalid input
        onfocus: true,
        onkeyup: false,
        ignore: "",
 		rules :{
			 country_id: {  
		        required : true
    					},
			 city_name : {
				required : true,
				chinese  : true,
				remote : {
					url 	:  "<?=base_url('public_city/ajaxCity');?>",
					type 	: "get",
					dataType : "json",
					data :{
						city_name : function(){ 
							return $("#city_name").val();
						},
						id  : function(){ 
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
			city_py : {
				required: true,
			},
			city_engname:{
				regex :true
				}
			 
 		},
		 messages: {  //对应上面的错误信息
 			country_id: {required : "必填"
 	 			        },
  	 		city_name: {required : "必填",
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

<script>
 

</script>

