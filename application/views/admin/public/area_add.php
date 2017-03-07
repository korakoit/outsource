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
                    	<form  class="form-horizontal" method="post" id="add-form">
                        	<div class="control-group">
                        		<label  class="control-label">国家名称<span class="required" style="color:red;">*</span></label>
                            		<div class="controls">
                            	 		<select class="span2" name="country" id="country">
                            	 		<option><<---请选择国家--->></option>
                            			<?php if(!empty($country)):?>
                            			<?php foreach($country as  $countryRow):?>
                            			<?php if($countryRow['status']==1):?>
                            			<option value="<?=$countryRow['id']?>"><?=$countryRow['country_name']?></option>
                            			<?php endif;?>
                            			<?php endforeach;?>
                            			<?php endif;?>
                            			</select>
                            		</div>
                        	</div>
                        	<div class="control-group">
                        		<label  class="control-label">城市名称<span class="required" style="color:red;">*</span></label>
                            		<div class="controls">
	                            	  	<select id="city" name="city" class="span2">
	                            	  	<option><<---请选择城市--->></option>
	                            		<?php if(!empty($city)):?>
	                            		<?php foreach($city as $cityRow):?>
	                            		<?php if($cityRow['status']==1):?>
	                            		<option value="<?=$cityRow['id']?>"  name="city[]"><?=$cityRow['city_name']?></option>
	                            		<?php endif;?>
	                            		<?php endforeach;?>
	                            		<?php endif;?>
	                            	    </select>
                            		</div>
                           	</div>
                        	<div class="control-group">
                            	<label  class="control-label">区域名称<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="text"   class="form-control" name="area_name" id="area_name">
                            	<label  id="msg" class="help-inline" ></label>
                            	</div>
	                        </div>
	                        <div class="control-group">
                            	<label  class="control-label col-sm-3">区域英文名称<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="text"   class="form-control" name="area_engname" id="area_engname">
                            	<label  id="msg2" class="help-inline" ></label>
                            	</div>
	                        </div>
	                        <div class="form-actions" style="margin-left:25px;">
                        	<input type="submit" class="btn btn blue" value="提交">
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
/**
 *@bind  country
 *@desc 异步获取城市信息,绘制城市信息
 */
$(function() {
	
		$("#country").change(function(e){
			var country = $("#country").val();
		       $.get(base_url + 'admin.php/public_area/ajaxCity/',{country_id:country},function(data){
				if(data == null || data.length == 0){
					alert("该国家还没有添加城市"); 
					}else{
						var html = '';
					  $.each(data,function(i,n){
						html += '<option name="city[]"  value="' + n.id +  '"><label>'+n.city_name+'</label></option>';
					});
					$("#city").html('');
					$("#city").html(html);
				}
			},'json');
        });
		jQuery.validator.addMethod("regex", function(value, element) {
	    	var regex = /^([a-zA-Z ().@%#]+)$/;
	    	return this.optional(element) || (regex.test(value));
	    	}, "只能输入英文字母");
		var validator = $("#add-form").validate({
	 		errorElement: 'span',
	 		errorClass: 'help-inline', // default input error message class
	        focusInvalid: true, // do not focus the last invalid input
	        onfocus: true,
	        onkeyup: false,
	        ignore: "",
	 		rules :{
			    country : { 
		     		required:true 
		     		},
		     		city : { 
			     		required:true 
			     		},
				area_name : {
					required : true,
					remote : {
						url 	: base_url + "public_area/ajaxAdd",
						type 	: "get",
						dataType : "json",
						data :{
							area_name : function(){ 
								return $("#area_name").val();
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
						regex : true
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
