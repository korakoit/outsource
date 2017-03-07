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
                    	<form  class="form-horizontal" method="post"  id="add-form" action="<?=base_url('public_field/addView')?>">
                            <div class="control-group" id="field_id">
                        		<label  class="control-label col-sm-3">字段ID<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="text" name="field_id" id="field_id" class="form-control" value="<?=$id+1?>" readonly>
                            	</div>
                        	</div>
                           <div class="control-group">
                        		<label  class="control-label col-sm-3">字段名称<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="text" name="ch_name" id="ch_name" class="form-control">
                            	</div>
                        	</div>
                        	<div class="control-group">
                        	<label  class="control-label col-sm-3">字段英文名称<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                                <input type="text" name="en_name" id="en_name" class="form-control">
                            	</div> 
                        	</div>
                        	<div class="control-group">
                            	<label  class="control-label col-sm-3">字段提示</label>
                            	<div class="controls">
                            	<input type="text" name="tip" class="form-control">
                            	</div> 
                            </div>
                           <div class="control-group">
                            	<label  class="control-label">字段类型<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<select name="f_type" class="span2 m-wrap" id="type">
                            	<option value=""><<----请选择---->></option>
                            	<option value="textread">文本(只读)</option>
                        		<option value="text">文本</option>
		                        <option value="calender">日历</option>
		                        <option value="radio">单选</option>
		                        <option value="upload">上传附件</option>
		                        <option value="calendertime">日历时间</option>
		                        <option value="search">搜索</option>
		                        <option value="hotel">酒店</option>
		                        <option value="express">快递</option>
		                        <option value="number">号段</option>                          	     
                        		</select>
                            	</div> 
                        </div>
                        <div class="control-group" id="group2">
                        </div>
                        <div class="control-group" id="group">
                        </div>
                        <div class="control-group" id="group1">
                        </div>
                        <div class="control-group" id="f-class" style='display:block;'>
                            	<label  class="control-label">字段归类<span class="required" style="color:red;">*</span></label>
                            	<div class="controls" id="f-class-group">
                            	&nbsp;&nbsp;&nbsp;&nbsp;
                            	<label class="checkbox">
                            	<input type="checkbox" value="order_info" name="f_class[]">下单信息
                            	</label>&nbsp;&nbsp;
                            	<label class="checkbox">
                            	<input type="checkbox" value="hotel_info" name="f_class[]">酒店信息
                            	</label>&nbsp;&nbsp;
                            	<label class="checkbox">
                            	<input type="checkbox" value="contact_info" name="f_class[]">联系人信息
                            	</label>&nbsp;&nbsp;
                            	<label class="checkbox">
                            	<input type="checkbox" value="travel_info" 	name="f_class[]">出行人信息
                            	</label>&nbsp;&nbsp;
                            	<label class="checkbox">
                            	<input type="checkbox" value="driver_info" 	name="f_class[]">司机信息
                            	</label>&nbsp;&nbsp;
                            	<label class="checkbox">
                            	<input type="checkbox" value="passenger_info" 	name="f_class[]">乘客信息
                            	</label>
                            	</div>
                         </div>
                         <div class="control-group" id="f-class1" style="display:none;">
                         </div>
                         <div class="control-group" id ="validate-method">
                            	<label  class="control-label">校验方法<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<select name="test" class="span2 m-wrap" id="test">
		                        <option value="无">无</option>
		                        <option value="必填">必填</option>
		                        <option value="必填/字母">必填/字母</option>
		                        <option value="必填/数字">必填/数字</option>
		                        <option value="必填/数字加字母">必填/数字加字母</option>
		                        <option value="必填/身份证验证">必填/身份证验证</option>
		                        <option value="必填/邮箱验证">必填/邮箱验证</option>
		                        <option value="必填/日历">必填/日历</option>                           	     
                        		</select>
                            	</div>
                          </div>
                          <div class="control-group" id="supplier-view">
                            	<label  class="control-label">供应商可见<span class="required" style="color:red;">*</span></label>
                          		<div class="controls pull-left">
                            	<label class="radio line">
                            	<input type="radio" value="可见" name="s_apper" class="radio-inline" checked>是
                            	</label>
                            	</div>
                             	<div class="controls pull-left">	
                            	<label class="radio line">
                            	<input type="radio" value="不可见" name="s_apper" class="radio-inline">否
                            	</label>
                          </div>
                          </div>
                         
                           <div class="control-group" id="supplier-edit">
                            	<label  class="control-label col-sm-3">供应商可编辑<span class="required" style="color:red;">*</span></label>
                            	<div class="controls pull-left">
                            	<label class="radio line">
                            	<input type="radio" value="可编辑" name="s_edit" class="radio-inline">是
                            	
                            	</label>
                            	</div>
                             <div class="controls pull-left">	
                            	<label class="radio line">
                            	<input type="radio" value="不可编辑" name="s_edit" class="radio-inline" checked>否
                            	</label>
                             </div>
                            </div>
                            
                             <div class="control-group" id='lm-edit'>
                            	<label  class="control-label col-sm-3">懒猫可编辑<span class="required" style="color:red;">*</span></label>
                            	<div class="controls pull-left">
                            	<label class="radio line">
                            	<input type="radio" value="可编辑" name="lm_edit" class="radio-inline" checked>是
                            	</label>
                            	</div>
                             <div class="controls pull-left">	
                            	<label class="radio line">
                            	<input type="radio" value="不可编辑" name="lm_edit" class="radio-inline" >否
                            	</label>
                             </div>
                            </div>
                            
                            <div class="form-actions" style="margin-left:20px;">
                        	<button class="btn btn blue" id="sub" onclick="dosubmit()">提交</button>
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
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/jquery.form.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script type="text/javascript">

var format = new Array();
var num    =  0;
var index = true;
var test = true;
$(function(){
	var origin_id = <?=$id+1?>;
    $("#type").change(function(e){
         var value = $("#type").attr("value"); 
          if(value== "radio"){
           var html2 = '<label  class="control-label">文本长度<span class="required" style="color:white;">*</span></label>';
          	   html2 +='<select class="span2 m-wrap" name="length" id="length" style="margin-left:20px;">';
          	   html2 +='<option value="40">40px</option>';
          	   html2 +='<option value="45">45px</option>';
          	   html2 +='<option value="93">93px</option>';
          	   html2 +='<option value="150">150px</option>';
          	   html2 +='<option value="230">230px</option>';
          	   html2 +='<option value="492">492px</option>';
          	   html2 +='</select>';
             var html =' <label  class="control-label col-sm-3">值集<span class="required" style="color:red;">*</span></label>';
                 html +='<div class="controls" id="add_tag">';
                 html +='<input type="text" class="form-control" name="value" id="value">';
                 html +='<button class="btn green" type="button" id="add-format" style="margin-left:10px;">';
                 html +='添加';
                 html +='</button>';
                 html +='</div>';
              	 
                 $("#group2").html(html2);
                 $("#group").html(html);
                 $("#group1").html('');
                 $("#add-format").click(function(e){
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
        	  var html = '<label  class="control-label">文本长度<span class="required" style="color:white;">*</span></label>';
        	   html +='<select class="span2 m-wrap" name="length" id="length" style="margin-left:20px;">';
        	   html +='<option value="40">40px</option>';
        	   html +='<option value="45">45px</option>';
        	   html +='<option value="93">93px</option>';
        	   html +='<option value="150">150px</option>';
        	   html +='<option value="230">230px</option>';
        	   html +='<option value="492">492px</option>';
        	   html +='</select>';

        	  var html1 ='<label  class="control-label">字段默认值<span class="required" style="color:white;">*</span></label>';
               html1 +='<div class="controls">';
               html1 +='<input type="text" class="form-control" name="d_value" >';
               html1 +='</div>';
               $("#group").html(html);
               $("#group1").html(html1);
               $("#group2").html('');
               }
          else if( value == "textread"||value == "calender"||value == "calendertime" || value == "search" || value == "upload" || value == "express" || value == "number"){
        	  var html = '<label  class="control-label">文本长度<span class="required" style="color:white;">*</span></label>';
          	   html +='<select class="span2 m-wrap" name="length" id="length" style="margin-left:20px;">';
          	   html +='<option value="40">40px</option>';
          	   html +='<option value="45">45px</option>';
          	   html +='<option value="93">93px</option>';
          	   html +='<option value="150">150px</option>';
          	   html +='<option value="230">230px</option>';
          	   html +='<option value="492">492px</option>';
          	   html +='</select>';
            	 $("#group").html(html);
            	 $("#group1").html('');
            	 $("#group2").html('');
              }
          else if(value == "hotel"){
                $("input[name='field_id']").attr("value",origin_id);
              	$("#f-class").css("display","none");
				var html1 ='<label  class="control-label">关联字段<span class="required" style="color:red;">*</span></label><div class="controls">&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="hotel_info[]" value="hotel_engname">酒店英文名称</label>' +
					'&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="hotel_info[]" value="tel">电话</label>'+
					'&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="hotel_info[]" value="backup_tel">备用电话</label>'+
					'&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="hotel_info[]" value="address">地址</label>' +
					'&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="hotel_info[]" value="remark">备注</label></div>';
				 $("#group").html(html1);
				 $("#f-class1").html('<label  class="control-label">字段归类<span class="required" style="color:red;">*</span></label><label class="control-label" style="margin-left:-80px;">酒店信息</label>&nbsp;&nbsp;');
				 		var vlid_html = '<label  class="control-label">校验方法<span class="required" style="color:red;">*</span></label>'+
	                 	'<div class="controls">'+
	                 	'<label class="control-label" style="margin-left:-120px;">必填</label>' +
	             		'</div>';
            	 $("#validate-method").html(vlid_html);
            	 		var view_html = '<label  class="control-label" >供应商可见<span class="required" style="color:red;">*</span></label>'+
                     	'<div class="controls pull-left">' +
              		 	'<label class="control-label" style="margin-left:-280px;">可见 </label>' +
            			'</div>';
            	 $("#supplier-view").html(view_html);
	            	 	var edit_html ='<label  class="control-label">供应商编辑<span class="required" style="color:red;">*</span></label>'+
	                 	'<div class="controls pull-left">' +
	          		 	'<label class="control-label" style="margin-left:-260px;">不可编辑</label>' +
	        		 	'</div>';
            	 $("#supplier-edit").html(edit_html);
            	 		var lm_edit_html = '<label  class="control-label">懒猫可编辑<span class="required" style="color:red;">*</span></label>'+
                 		'<div class="controls pull-left">' +
          		 		'<label class="control-label" style="margin-left:-270px;">可编辑</label>' +
        				'</div>';
            	 $("#lm-edit").html(lm_edit_html);
            	 var length_html = '<label  class="control-label">文本长度<span class="required" style="color:white;">*</span></label>'+
				            	   '<select class="span2 m-wrap" name="length" id="length" style="margin-left:20px;">'+
				            	   '<option value="40">40px</option>'+
				            	   '<option value="45">45px</option>'+
				            	   '<option value="93">93px</option>'+
				            	   '<option value="150">150px</option>'+
				            	   '<option value="230">230px</option>'+
				            	   '<option value="492">492px</option>'+
				            	   '</select>';
				 $("#group1").html(length_html);
          }
          if(value == "textread"||value == "calender"||value == "calendertime" || value == "search" || value == "upload" || value == "text" || value == "radio"|| value == "express" || value == "number"){
						        	  
						var validate_html =  '<label  class="control-label">校验方法<span class="required" style="color:red;">*</span></label>'+
						 				  '<div class="controls">'+
											  '<select name="test" class="span2 m-wrap" id="test">'+
						 				  '<option value="无">无</option>'+
						 				  '<option value="必填">必填</option>'+
						 				  '<option value="必填/字母">必填/字母</option>'+
						 				  '<option value="必填/数字">必填/数字</option>'+
						 				  '<option value="必填/数字加字母">必填/数字加字母</option>'+
						 				  '<option value="必填/身份证验证">必填/身份证验证</option>'+
						 				  '<option value="必填/邮箱验证">必填/邮箱验证</option>'+
						 				  '<option value="必填/日历">必填/日历</option>'+                           	     
											  '</select>'+
											  '</div>';
						
						var supplier_view_html =  '<label  class="control-label">供应商可见<span class="required" style="color:red;">*</span></label>'+
												   '<div class="controls pull-left">'+
												   '<label class="radio line">'+
												   '<input type="radio" value="可见" name="s_apper" class="radio-inline" checked>是'+
												   '</label>'+
												   '</div>'+
												   '<div class="controls pull-left">'+	
												   '<label class="radio line">'+
												   '<input type="radio" value="不可见" name="s_apper" class="radio-inline">否'+
												   '</label>'+
												   '</div>';
						
						var supplier_edit_html =     '<label  class="control-label">供应商可编辑<span class="required" style="color:red;">*</span></label>'+
												   '<div class="controls pull-left">'+
												   '<label class="radio line">'+
												   '<input type="radio" value="可编辑" name="s_edit" class="radio-inline" checked>是'+
												   '</label>'+
												   '</div>'+
												   '<div class="controls pull-left">'+	
												   '<label class="radio line">'+
												   '<input type="radio" value="不可编辑" name="s_edit" class="radio-inline">否'+
												   '</label>'+
												   '</div>';
						
						var lm_edit_html =     '<label  class="control-label">懒猫可编辑<span class="required" style="color:red;">*</span></label>'+
												   '<div class="controls pull-left">'+
												   '<label class="radio line">'+
												   '<input type="radio" value="可编辑" name="lm_edit" class="radio-inline" checked>是'+
												   '</label>'+
												   '</div>'+
												   '<div class="controls pull-left">'+	
												   '<label class="radio line">'+
												   '<input type="radio" value="不可编辑" name="lm_edit" class="radio-inline">否'+
												   '</label>'+
												   '</div>';
						
						$("#f-class").css("display","block");
						$("input[name='f_class[]']:checked").removeAttr("checked");
						$("input[name='field_id']").attr("value",origin_id);
						$("#validate-method").html(validate_html);
						$("#supplier-view").html(supplier_view_html);
						$("#supplier-edit").html(supplier_edit_html);
						$("#lm-edit").html(lm_edit_html);
						


              }
        });  

    $("input[name='s_apper']:radio").change(function(){ 
               if ($(this).attr("checked")) { 
            	  if($(this).attr("value")=="不可见"){
            		  $("#supplier-edit").hide(); 
                	  }
            	  else{
            		  $("#supplier-edit").show(); 
                	  }
            	   } 
                  	  
        });

    $("input[name='f_class[]']:checkbox").click(function(){
    	var x =parseInt($("input[name='field_id']").attr("value"));
		var a = x+1;
		var b = a+1;
		var c = b+1;
		var d = c+1;
		var e = d+1;
    	if($("input[name='f_class[]']:checked").length>1){
				if($("input[name='f_class[]']:checked").length == 2){
					$("input[name='field_id']").attr("value","");
					$("input[name='field_id']").attr("value",x+'/'+a);
				}
				if($("input[name='f_class[]']:checked").length == 3){
					$("input[name='field_id']").attr("value","");
					$("input[name='field_id']").attr("value",x+'/'+a+'/'+b);
				}
				if($("input[name='f_class[]']:checked").length == 4){
					$("input[name='field_id']").attr("value",x+"/"+a+"/"+b+"/"+c);
				}
				if($("input[name='f_class[]']:checked").length == 5){
					$("input[name='field_id']").attr("value",x+"/"+a+"/"+b+"/"+c+"/"+d);
				}
				if($("input[name='f_class[]']:checked").length == 6){
					$("input[name='field_id']").attr("value",x+"/"+a+"/"+b+"/"+c+"/"+d+"/"+e);
				}
        	}else{
        		if($("input[name='f_class[]']:checked").length == 1){
					$("input[name='field_id']").attr("value","");
					$("input[name='field_id']").attr("value",x);
				}
            }

    });
        	
});


</script>



<script type="text/javascript">
function validateForm(){
	jQuery.validator.addMethod("regex", function(value, element) {
    	var regex = /^([a-zA-Z ().@%#]+)$/;
    	return this.optional(element) || (regex.test(value));
    	}, "只能输入英文字母");
	return $("#add-form").validate({
		rules :{
			field_id : {
				required : true
			},
	  		ch_name : {
			required : true
			},
	  		en_name : {
			regex	: true
			},
	  		f_type  : {
			required : true
			},
	  		test : {
			required : true
			}
		},
 		messages: {  //对应上面的错误信息
		  field_id : {
				 required:"必填"
 			 }
		}
		}).form();

}

function dosubmit(){
	if(validateForm()){
		 $("#add-form").ajaxForm({
	        	beforeSubmit : function(){
	        	},
	        	success : function(data){
	        		if(data.code == 1){
	        			window.location.href = base_url + 'public_field/index';
	        		}else if(data.code == 2){
	        			alert(data.msg);
	        		}else if(data.code == 3){
						alert(data.msg);
		        	}else if(data.code == 4){
						alert(data.msg);
			        }else if(data.code == 6){
						alert(data.msg);
				    }else if(data.code == 7){
						alert(data.msg);
				    }else if(data.code == 8){
						alert(data.msg);
				    }
	        		return;
	        	}
	        });

		}
}

</script>
