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
                 <form  class="form-horizontal" method="post" action="<?=base_url('public_hotel/update/'.$hotel_id)?>" id="edit-form">
                      <div class="control-group">
                       <label  class="control-label">国家名称<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="hidden" name="id" value="<?=$hotel_id?>" id="id">
                            	<select class="span2" name="country" id="country" >
                            			<?php if(!empty($country)):?>
                            			<?php foreach($country as  $countryRow):?>
                            			<?php if($countryRow['status']==1):?>
                            			<option value="<?=$countryRow['id']?>" <?php if(isset($country_id)&&($country_id==$countryRow['id'])||isset($default_country_id)&&($default_country_id==$countryRow['id'])) echo "selected";?>><?=$countryRow['country_name']?></option>
                            			<?php endif;?>
                            			<?php endforeach;?>
                            			<?php endif;?>
                            	</select>
                             </div>
                       </div>
                       <div class="control-group">
                        	<label  class="control-label">城市名称<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	   <select class="form-control span2" name="city" id="city" >
	                            	   	<?php if(!empty($city)):?>
	                            		<?php foreach($city as $cityRow):?>
	                            		<?php if($cityRow['status']==1):?>
	                            		<option   value="<?=$cityRow['id']?>" <?php if(isset($city_id)&&($city_id==$cityRow['id'])) echo "selected";?>><?=$cityRow['city_name']?></option>
	                            		<?php endif;?>
	                            		<?php endforeach;?>
	                            		<?php endif;?>
                            	   </select>
                            	</div>
                        </div>
                        <div class="control-group">
                            	<label  class="control-label">区域名称<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	   <select class="form-control span2" name="area" id="area" >
	                                   <?php if(!empty($area)):?>
	                            	   <?php foreach($area as $areaRow):?>
	                            	   <?php if($areaRow['status']==1):?>
	                            	   <option   value="<?=$areaRow['id']?>" <?php if(isset($area_id)&&($area_id==$areaRow['id'])) echo "selected";?>><?=$areaRow['area_name']?></option>
	                            	   <?php endif;?>
	                            	   <?php endforeach;?>
	                            	   <?php endif;?>
                            	   </select>
                            	</div>
                        </div>
                        <div class="control-group">
                            	<label  class="control-label">酒店英文名称<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="text" class="form-control" name="hotel_engname" value="<?=$hotel['hotel_engname']?>" id="hotel_engname">
                            	<label  id="msg" class="help-inline" ></label>
                            	</div> 
                        </div>
                        <div class="control-group">
                            	<label  class="control-label col-sm-3">酒店中文名称<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="text"   class="form-control" name="hotel_chname" value="<?=$hotel['hotel_chname']?>" id="hotel_chname">
                            	<label  id="msg1" class="help-inline" ></label>
                            	</div>
                        </div>
                        <div class="control-group">
                            	<label  class="control-label col-sm-3">电话<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="text"   class="form-control" name="tel" value="<?=$hotel['tel']?>" id="tel">
                            	<label  id="msg2" class="help-inline" ></label>
                            	</div> 
                         </div>
                         <div class="control-group">
                            	<label  class="control-label">备用电话<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="text" class="form-control" name="backup_phone" value="<?=$hotel['backup_tel']?>" id="backup_phone">
                            	<label  id="msg3" class="help-inline" ></label> 
                            	</div>
                            </div>
                         <div class="control-group">
                            	<label  class="control-label">地址<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="text"   class="form-control" name="address" value="<?=$hotel['address']?>">
                            	</div>
                          </div>
                            <div class="control-group">
                            	<label  class="control-label col-sm-3">状态<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<select name="status" class="form-control span2">
                            	<option value="1" <?php if($hotel['status']==1){echo "selected";}?>>正常</option>
                            	<option value="0" <?php if($hotel['status']==0){echo "selected";}?>>停用</option>
                            	</select>
                            	</div>
                            </div>
                             <div class="control-group">
                            	<label  class="control-label col-sm-3">备注<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<textarea name="backup" cols="100" rows="3"> <?=$hotel['remark']?></textarea>
                            	</div>
                            </div>
                            <div class="form-actions" style="margin-left:20px;">
                        	<button class="btn btn blue" id="sub">提交</button>
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
	$("#country").change(function(e){
					var country = $("#country").val();
				       $.get(base_url + 'admin.php/public_hotel/ajaxCity/',{country_id:country},function(data){
						if(data == null || data.length == 0){
							alert("该国家还没有添加城市"); 
							}else{
								var html = '';
								 html += '<option><label><---请选择城市---></label></option>';
							  $.each(data,function(i,n){
								html += '<option name="city[]"  value="' + n.id +  '"><label>'+n.city_name+'</label></option>';
							});
							$("#city").html('');
							$("#city").html(html);
						}
								
					
					},'json');
	            });
    $("#city").change(function(e){
                var city = $("#city").val();
                $.get(base_url +'admin.php/public_hotel/ajaxArea/',{city_id:city},function(data){
                      if(data == null || data.length == 0){
                             alert("该城市还没有添加区域");
                          }
                      else{
							var html = '';
							html += '<option><label><---请选择区域---></label></option>';
						  $.each(data,function(i,n){
							  
							html += '<option name="area[]"  value="' + n.id +  '"><label>'+n.area_name+'</label></option>';
						});
						$("#area").html('');
						$("#area").html(html);
					}
							
				
				},'json');


                    });

    jQuery.validator.addMethod("regex", function(value, element) {
    	var regex = /^([a-zA-Z+&@#--$%.!*()+_=`~'";:<>,^ ]+)$/;
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
 			country : {
				required : true
		},
			city : {
				required : true
						},
			area : {
				required : true
						},
		   hotel_engname : {
				required : true,
				remote : {
					url 	: base_url + "public_hotel/ajaxEngname",
					type 	: "get",
					dataType : "json",
					data :{
    					hotel_engname : function(){ 
							return $("#hotel_engname").val();
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
			
			hotel_chname : {
				required : true,
				remote : {
					url 	: base_url + "public_hotel/ajaxChname",
					type 	: "get",
					dataType : "json",
					data :{
					hotel_chname : function(){ 
							return $("#hotel_chname").val();
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
			tel : {
               required : true
              
				},
			address : {
				required : true
				},
			status :  {
				required : true
					}	
			
 		},
		 messages: {  //对应上面的错误信息
 			hotel_engname: {required:"必填",
                           remote:"已添加"
                        	
 	 			 },
  	 		hotel_chname: {required:"必填",
                     		remote:"已添加"
			 },
  	 			tel: {required:"必填"},
  	 			address: {required:"必填"}
           
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
