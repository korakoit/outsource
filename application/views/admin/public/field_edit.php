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
                    	<form  class="form-horizontal" method="post" action="<?=site_url('public_field/updates')?>" id="edit-form">
                            <div class="control-group">
                        		<label  class="control-label col-sm-3">字段id<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<label type="text-inline" style="margin-top:7px;"><?=$field['id']?></label>
                            	<input type="hidden" name="id"  id="id" value="<?=$field['id']?>" style="margin-top:4px;">
                            	</div>
                        	</div>
                           <div class="control-group">
                        		<label  class="control-label col-sm-3">字段名称<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="text" name="ch_name" id="ch_name" value="<?=$field['ch_name']?>" style="margin-top:4px;" <?php if($field['f_type'] == "number"){echo "readonly";}?> >
                            	</div>
                        	</div>
                        	<div class="control-group">
                        	<label  class="control-label col-sm-3">字段英文名称<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                                <input type="text" name="en_name" class="form-control" value="<?=$field['en_name']?>">
                            	</div> 
                        	</div>
                        	<div class="control-group">
                            	<label  class="control-label col-sm-3">字段提示</label>
                            	<div class="controls">
                            	<input type="text" name="tip" class="form-control" value="<?=$field['tips']?>">
                            	</div> 
                            </div>
                           <div class="control-group">
                            	<label  class="control-label">字段类型<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<?php if($field['f_type'] == "number"):?>
                            	<label type="text-inline" style="margin-top:7px;">号段</label>
                            	<span class="help-inline"></span>
                            	<input type="hidden" value="<?=$field['f_type']?>" name="f_type">
                            	<?php else:?>
                            	<select name="f_type" class="span2 m-wrap" id="type" style="margin-top:2px;">
                            	<option><<----请选择---->></option>
                            	<option value="textread" <?php if($field['f_type']=="textread") echo "selected"?>>文本(只读)</option>
                        		<option value="text" <?php if($field['f_type']=="text") echo "selected"?>>文本</option>
		                        <option value="calender" <?php if($field['f_type']=="calender") echo "selected"?>>日历</option>
		                        <option value="radio" <?php if($field['f_type']=="radio") echo "selected"?>>单选</option>
		                        <option value="upload" <?php if($field['f_type']=="upload") echo "selected"?>>上传附件</option>
		                        <option value="calendertime" <?php if($field['f_type']=="calendertime") echo "selected"?>>日历时间</option>
		                        <option value="search" <?php if($field['f_type']=="search") echo "selected"?>>搜索</option>
		                        <option value="hotel" <?php if($field['f_type']=="hotel") echo "selected"?>>酒店</option>
		                        <option value="express" <?php if($field['f_type']=="express") echo "selected"?>>快递</option>
		                        <option value="number" <?php if($field['f_type']=="number") echo "selected"?>>号段</option>                          	     
                        		</select>
                        		<?php endif;?>
                            	</div> 
                           </div>
                           <div class="control-group" id="group" style="display:none;">
                           </div>
                           <div class="control-group" id="group1" style="display:none;">
                           </div>
                           <div class="control-group" id="group2" style="display:none;">
                           </div>
                          <div class="control-group" id="show-view">
                          <?php if($field['f_type']=="text"):?>
                          <div class="control-group" id="a">
                            	<label  class="control-label">字段默认值<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="text" name="d_value" class="form-control" value="<?=$field['d_value']?>">
                            	</div>
                           </div>
                           <?php elseif($field['f_type']=="radio"):?>
                           <div class="control-group" id="c">
                            	<label  class="control-label">值集<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="text" value="<?=$field['value']?>" name="value" class="form-control">
                            	</div>
                           </div>
                           <?php elseif($field['f_type'] == "hotel"):?>
	                       <div class="control-group">
	                       <label  class="control-label">关联字段<span class="required" style="color:red;">*</span></label>
	                       <div class="controls">&nbsp;&nbsp; &nbsp;&nbsp;
	                       <label class="checkbox"><input type="checkbox" name="hotel_info[]" value="hotel_engname" <?php if(in_array("hotel_engname",json_decode($field['related_field']))){echo "checked";}?>>酒店英文名称</label> &nbsp;&nbsp;
						   <label class="checkbox"><input type="checkbox" name="hotel_info[]" value="tel" <?php if(in_array("tel",json_decode($field['related_field']))){echo "checked";}?>>电话</label> &nbsp;&nbsp;
						   <label class="checkbox"><input type="checkbox" name="hotel_info[]" value="backup_tel" <?php if(in_array("backup_tel",json_decode($field['related_field']))){echo "checked";}?>>备用电话</label> &nbsp;&nbsp;
						   <label class="checkbox"><input type="checkbox" name="hotel_info[]" value="address" <?php if(in_array("address",json_decode($field['related_field']))){echo "checked";}?>>地址</label> &nbsp;&nbsp;
						   <label class="checkbox"><input type="checkbox" name="hotel_info[]" value="remark" <?php if(in_array("remark",json_decode($field['related_field']))){echo "checked";}?>>备注</label>
						   </div>
	                       </div>
	                       <?php endif;?>
                           </div>
                           
                        <div class="control-group" >
                        <label  class="control-label">字段长度<span class="required" style="color:red;">*</span></label>
                        <div class="controls">
                        <select class="span2 m-wrap" name="lengths" id="length" >
						          	  <option value="40" <?php if($field['length']== "40")echo "selected";?>>40px</option>
						          	  <option value="45" <?php if($field['length']== "45")echo "selected";?>>45px</option>
						          	  <option value="93" <?php if($field['length']== "93")echo "selected";?>>93px</option>
						          	  <option value="150" <?php if($field['length']== "150")echo "selected";?>>150px</option>
						          	  <option value="230" <?php if($field['length']== "230")echo "selected";?>>230px</option>
						          	  <option value="492" <?php if($field['length']== "492")echo "selected";?>>492px</option>
						          	  </select>
						</div>
						</div>
						<div class="control-group" id="validate-method" style="display:<?php if($field['f_type'] !== "hotel"){echo "block";}else {echo "none";}?>">
                            	<label  class="control-label">校验方法<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<select name="test" class="span2 m-wrap" id="test">
		                        <option value="无" <?php if($field['test'] == "无")echo "selected";?>>无</option>
		                        <option value="必填" <?php if($field['test'] == "必填")echo "selected";?>>必填</option>
		                        <option value="必填/字母" <?php if($field['test'] == "必填/字母")echo "selected";?>>必填/字母</option>
		                        <option value="必填/数字" <?php if($field['test'] == "必填/数字")echo "selected";?>>必填/数字</option>
		                        <option value="必填/数字加字母" <?php if($field['test'] == "必填/数字加字母")echo "selected";?>>必填/数字加字母</option>
		                        <option value="必填/身份证验证" <?php if($field['test'] == "必填/身份证验证")echo "selected";?>>必填/身份证验证</option>
		                        <option value="必填/邮箱验证" <?php if($field['test'] == "必填/邮箱验证")echo "selected";?>>必填/邮箱验证</option>
		                        <option value="必填/日历" 	<?php if($field['test'] == "必填/日历")echo "selected";?>>必填/日历</option>                           	     
                        		</select>
                            	</div>
                        </div>
                        <?php if($field['f_type'] == "hotel"):?>
                        <div id="hotel_view">
                        <div class="control-group">
                            	<label  class="control-label">校验方法<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<label  class="help-inline" ><?=$field['test']?></label>
                            	</div>
                        </div>
                        <div class="control-group">
                        <label  class="control-label" >供应商可见<span class="required" style="color:red;">*</span></label>
                     	<div class="controls pull-left">
              		 	<label class="control-label" style="margin-left:-292px;">可见 </label>
            			</div>
                        </div>
                        <div class="control-group">
                        <label  class="control-label" >供应商可编辑<span class="required" style="color:red;">*</span></label>
                     	<div class="controls pull-left">
              		 	<label class="control-label" style="margin-left:-265px;">不可编辑 </label>
            			</div>
                        </div>
                        <div class="control-group">
                        <label  class="control-label" >懒猫可编辑<span class="required" style="color:red;">*</span></label>
                     	<div class="controls pull-left">
              		 	<label class="control-label" style="margin-left:-280px;">可编辑 </label>
            			</div>
                        </div>
                        </div>
                        <?php endif;?>
                        <div  id="else-view">
                        <div class="control-group" id="vis2" style="display:<?php if($field['f_type'] !== "hotel"){echo "block";}else{echo "none";} ?>;">
                            	<label  class="control-label">字段归类<span class="required" style="color:red;">*</span></label>
                            		  <div class="controls">
                            		  <?php if($field['f_type']!=="number"):?>
									  <select name="f_class" class="span2 m-wrap" id="test">
					 				  <option value="order_info" <?php if($field['f_class'] == "order_info")echo "selected";?>>下单信息</option>
					 				  <option value="hotel_info" <?php if($field['f_class'] == "hotel_info")echo "selected";?>>酒店信息</option>
					 				  <option value="contact_info" <?php if($field['f_class'] == "contact_info")echo "selected";?>>联系人信息</option>
					 				  <option value="travel_info" <?php if($field['f_class'] == "travel_info")echo "selected";?>>出行人信息</option>
					 				  <option value="driver_info" <?php if($field['f_class'] == "driver_info")echo "selected";?>>司机信息</option>
					 				  <option value="passenger_info" <?php if($field['f_class'] == "passenger_info")echo "selected";?>>乘客信息</option>
									  </select>
									  <?php else:?>
									  <label type="text-inline" style="margin-top:7px;"><?=$f_class[$field['f_class']]?></label>
									  <input type="hidden" value="<?=$field['f_class']?>" name="f_class">
									  <?php endif;?>
									  </div>
                        </div>
                        
                        <div class="control-group" id="vis4" style="display:<?php if($field['f_type'] !== "hotel"){echo "block";}else{echo "none";} ?>;">
                            	<label  class="control-label">供应商可见<span class="required" style="color:red;">*</span></label>
                        <div class="controls pull-left">
                            	<label class="radio line">
                            	<input type="radio" value="可见" name="s_apper" class="radio-inline" <?php if($field['s_right']=="可见/不可编辑"||$field['s_right']=="可见/可编辑") echo "checked=checked";?>)>是
                            	</label>
                            	</div>
                        <div class="controls pull-left">	
                            	<label class="radio line">
                            	<input type="radio" value="不可见" name="s_apper" class="radio-inline" <?php if($field['s_right']=="不可见/不可编辑"||$field['s_right'] =="不可见") echo "checked=checked";?>>否
                            	</label>
                        </div>
                        </div>
                           <div class="control-group" id="supplier-edit" style="display:<?php if($field['f_type'] !== "hotel"&&$field['s_right'] !=="不可见/不可编辑"){echo "block";} else{echo "none";}?>;">
                            	<label  class="control-label col-sm-3">供应商可编辑<span class="required" style="color:red;">*</span></label>
                            	<div class="controls pull-left">
                            	<label class="radio line">
                            	<input type="radio" value="可编辑" name="s_edit" class="radio-inline" <?php if($field['s_right']=="可见/可编辑") echo "checked=checked";?>>是
                            	</label>
                            	</div>
                            <div class="controls pull-left">	
                            	<label class="radio line">
                            	<input type="radio" value="不可编辑" name="s_edit" class="radio-inline" <?php if($field['s_right']=="可见/不可编辑") echo "checked=checked";?>>否
                            	</label>
                            </div>
                            </div>
                             <div class="control-group" id="vis5" style="display:<?php if($field['f_type'] !== "hotel"){echo "block";}else{echo "none";} ?>;">
                            	<label  class="control-label col-sm-3">懒猫可编辑<span class="required" style="color:red;">*</span></label>
                            	<div class="controls pull-left">
                            	<label class="radio line">
                            	<input type="radio" value="可编辑" name="lm_edit" class="radio-inline" <?php if($field['lm_right']=="可编辑") echo "checked=checked";?>>是
                            	</label>
                            	</div>
                             <div class="controls pull-left">	
                            	<label class="radio line">
                            	<input type="radio" value="不可编辑" name="lm_edit" class="radio-inline" <?php if($field['lm_right']=="不可编辑") echo "checked=checked";?>>否
                            	</label>
                             </div>
                            </div>
                            </div>
                            <div class="control-group" style="display:none;" id="group3"></div>
                            <div class="control-group" style="display:none;" id="group4"></div>
                            <div class="control-group" style="display:none;" id="group5"></div>
                            <div class="control-group" style="display:none;" id="group6"></div>
                            <div class="control-group" style="display:none;" id="group7"></div>
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
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/jquery.form.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script type="text/javascript">

var format = new Array();
var num    =  0;
var index = true;
var test = true;
$(function(){
    $("#type").change(function(e){
         var value = $("#type").attr("value"); 
          if(value== "radio"){
          $("#show-view").css("display","none");    
          $("#hotel_view").css("display","none");        
          $("#group").css("display","block");
          $("#group1").css("display","block");
          $("#group1").html('');
          $("#else-view").css("display","block");
          $("#group3").css("display","none");
			 $("#group4").css("display","none");
			 $("#group5").css("display","none");
			 $("#group6").css("display","none");
			 $("#group7").css("display","none");
				  $("#validate-method").css("display","block");
		  		  $("#vis2").css("display","block");	
				  $("#vis4").css("display","block");
				  $("#vis5").css("display","block");
				  $("#supplier-edit").css("display","block");
				 
           var html =' <label  class="control-label col-sm-3">值集<span class="required" style="color:white;">*</span></label>';
               html +='<div class="controls" id="add_tag">';
               html +='<input type="text" class="form-control" name="value" id="value">';
               html +='<button class="btn green xl" type="button" id="add-format" style="margin-left:10px;">';
               html +='添加';
               html +='</button>';
               html +='</div>';
                 $("#group").html(html);
                 $(".xl").click(function(e){
                     var value = $("input[name='value']").val();
                     if(value==''){
                        alert('值集不能为空');
                        return;
                         } 
                     else{
                     document.getElementById("add-format").style.visibility="hidden";
                	 var html  = '<div  class="form-control" id="format">';
                     html += '<input type="text" placeholder=""  class="form-control" name="value_name" style="margin-left:180px;">';
                     html +='<button class="btn green" type="button" id="save-format" style="margin-left:10px;">';
                     html +='保存';
                     html +='</button>';
                     html += '</div>';
                     $("#group1").html(html);
                     $("#save-format").click(function(){
                           	var zhi 	= $("input[name='value_name']").val();
                           	var liang 	= $("input[name='value']").val();
                           	if(zhi==''){
								alert('副值集不能为空');
                               	}
                           	else{
  							$("input[name='value']").val(liang+"/"+zhi);
  							$("input[name='value_name']").remove();
 							 document.getElementById("add-format").style.visibility="";
  							 document.getElementById("save-format").style.visibility="hidden";
                           	}
                         });
                     }
                 });
               }
          	else if(value =="text"){
         		 $("#else-view").css("display","block");
         	  $("#show-view").css("display","none");  
          	  $("#hotel_view").css("display","none");
           	 $("#validate-method").css("display","block");
	  		  $("#vis2").css("display","block");	
			  $("#vis4").css("display","block");
			  $("#vis5").css("display","block");
			  $("#supplier-edit").css("display","block");
        	  var html1 ='<label  class="control-label">字段默认值<span class="required" style="color:white;">*</span></label>';
               html1 +='<div class="controls">';
               html1 +='<input type="text" class="form-control" name="d_value" >';
               html1 +='</div>';
               $("#group1").html(html1);
           	   $("#group1").css("display","block");
              	$("#group").css("display","none");
              	$("#group3").css("display","none");
				 $("#group4").css("display","none");
				 $("#group5").css("display","none");
				 $("#group6").css("display","none");
				 $("#group7").css("display","none");
               }
         
          else if(value == "hotel"){
        	  $("#hotel_view").css("display","none");
        	  $("#else-view").css("display","none");
        	  $("#validate-method").css("display","none");
        	  $("#a").css("display","none");
        	  $("#c").css("display","none");
				var html1 ='<label  class="control-label">关联字段<span class="required" style="color:red;">*</span></label><div class="controls">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="hotel_info[]" value="hotel_engname">酒店英文名称</label>' +
					'&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="hotel_info[]" value="tel">电话</label>'+
					'&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="hotel_info[]" value="backup_tel">备用电话</label>'+
					'&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="hotel_info[]" value="address">地址</label>' +
					'&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="hotel_info[]" value="remark">备注</label></div>';
				 $("#group").html(html1);
				 $("#group3").html('<label  class="control-label">字段归类<span class="required" style="color:red;">*</span></label><label class="control-label" style="margin-left:-80px;">酒店信息</label>&nbsp;&nbsp;');
				 		var vlid_html = '<label  class="control-label">校验方法<span class="required" style="color:red;">*</span></label>'+
	                 	'<div class="controls">'+
	                 	'<label class="control-label" style="margin-left:-120px;">必填</label>' +
	             		'</div>';
            	 $("#group4").html(vlid_html);
            	 		var view_html = '<label  class="control-label" >供应商可见<span class="required" style="color:red;">*</span></label>'+
                     	'<div class="controls pull-left">' +
              		 	'<label class="control-label" style="margin-left:-280px;">可见 </label>' +
            			'</div>';
            	 $("#group5").html(view_html);
	            	 	var edit_html ='<label  class="control-label">供应商编辑<span class="required" style="color:red;">*</span></label>'+
	                 	'<div class="controls pull-left">' +
	          		 	'<label class="control-label" style="margin-left:-260px;">不可编辑</label>' +
	        		 	'</div>';
            	 $("#group6").html(edit_html);
            	 		var lm_edit_html = '<label  class="control-label">懒猫可编辑<span class="required" style="color:red;">*</span></label>'+
                 		'<div class="controls pull-left">' +
          		 		'<label class="control-label" style="margin-left:-270px;">可编辑</label>' +
        				'</div>';
            	 $("#group7").html(lm_edit_html);
				 $("#group").css("display","block");
				 $("#group1").css("display","none");
				 $("#group3").css("display","block");
				 $("#group4").css("display","block");
				 $("#group5").css("display","block");
				 $("#group6").css("display","block");
				 $("#group7").css("display","block");
				 $("#vis1").css("display","none");
				 $("#vis2").css("display","none");
				 $("#vis3").css("display","none");
				 $("#vis4").css("display","none");
				 $("#vis5").css("display","none");
 		   }
          if(value == "textread"||value == "calender"||value == "calendertime" || value == "search" || value == "upload" || value == "express" || value == "number"){
        	  $("#show-view").css("display","none");
          	  $("#hotel_view").css("display","none");
              $("#else-view").css("display","block");
              $("#group3").css("display","none");
				 $("#group4").css("display","none");
				 $("#group5").css("display","none");
				 $("#group6").css("display","none");
				 $("#group7").css("display","none");
              $("#validate-method").css("display","block");
	  		  $("#vis2").css("display","block");	
			  $("#vis4").css("display","block");
			  $("#vis5").css("display","block");
			  $("#supplier-edit").css("display","block");
						$("#group1").css("display","none");
						$("#group").css("display","none");
              }
        });  

    $("input[name='s_apper']:radio").change(function(){ 
               if ($(this).attr("checked")) { 
            	  if($(this).attr("value")=="不可见"){
            		  $("#supplier-edit").hide(); 
            		  $("#group6").css("display","none");
            		  
                  }
            	  else{
            		  $("#supplier-edit").show(); 
            		  if($("input[name='s_edit']:radio").val() == "可编辑"){
            			  $("input[name=s_edit]:eq(1)").attr("checked",'checked'); 
            	  }
                	  }
            	   } 
                  	  
        });
        	
});


</script>



<script type="text/javascript">
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
	   ch_name : { 
     		required:true,
     		remote : {
				url 	: base_url + "public_field/ajaxName",
				type 	: "get",
				dataType : "json",
				data :{
					ch_name : function(){ 
						return $("#ch_name").val();
					},
					id      : function(){
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
        f_type : { 
	     		required:true 
	     		},
		lengths : {
			required : true
			
		}
		
		
		},
		 messages: {   ch_name : { remote : "字段名称已存在"}//对应上面的错误信息
    
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
</script>