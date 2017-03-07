<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>

<div class="page-content">
 	<div class="container-fluid">
     	<div class="row-fluid">
            <div class="span12">
            
            </div>
        </div>
 <div class="row-fluid">
  	<div class="span12 booking-search">
  	   <div class="clearfix margin-bottom-20">
                    	<form  class="form-horizontal" method="post" action="<?=base_url('public_product/update')?>" id="edit-form">
                        	<div class="control-group">
                            	<label  class="control-label">一级分类<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<label class="text-inline"><?=$p_category[$product['parent_category']]."[".$product['parent_category']."]"?></label>
                            	</div>
                            </div>
                        	<div class="control-group">
                            	<label  class="control-label">商品分类<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="hidden" name="product_id" value="<?=$id?>" id="id">
                            	<input type="text"   class="form-control" name="product_name"  id="product_name" maxlength="10" value="<?=$product['name']?>">
                            	<label class="text-inline" ><?=$product['child_id']?></label>
                            	</div>
                            </div>
                            <div class="control-group">
                            	<label  class="control-label col-sm-3 ">商品分类英文名称<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="text"  class="form-control" name="product_engname" id="product_engname" value="<?=$product['engname']?>">
                            	<label  id="msg2" class="help-inline" ></label>
                            	</div>
                            </div>
                            <div class="control-group">
                            <label  class="control-label col-sm-3">商品分类简称<span class="required" style="color:red;">*</span></label>
                            <div class="controls">
                            	<label class="help-inline"><?=$product['category_code']?></label>
                            	<label  id="msg1" class="help-inline" ></label>
                            	</div>
                            </div>
                            <div class="control-group">
                            	<label  class="control-label">日期属性<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<select class="m-wrap medium" name="dateattr" id="dateattr">
                            	<?php foreach($date as $val):?>
                            	<?php if($val['f_type']=="calender"||$val['f_type']=="calendertime"):?>
                            	<option value="<?=$val['id']?>" <?php if($product['dateattr'] == $val['id']){echo "selected";}?>><?=$val['ch_name']?></option>
                            	<?php endif;?>
                            	<?php endforeach;?>
                            	</select>
                            	</div>
                            </div>
                            <div class="control-group">
                            	<label  class="control-label">确认函模板<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<select class="m-wrap medium" name="confirm" id="confirm">
                            	<option value="0"></option>
                            	<option value="1" <?php if(!empty($product['confirm_temp'])&&$product['confirm_temp']==1){echo "selected";}?>>一日游</option>
                            	<option value="2" <?php if(!empty($product['confirm_temp'])&&$product['confirm_temp']==2){echo "selected";}?>>包车</option>
                            	<option value="3" <?php if(!empty($product['confirm_temp'])&&$product['confirm_temp']==3){echo "selected";}?>>接机</option>
                            	<option value="4" <?php if(!empty($product['confirm_temp'])&&$product['confirm_temp']==4){echo "selected";}?>>租凭</option>
                            	<option value="5" <?php if(!empty($product['confirm_temp'])&&$product['confirm_temp']==5){echo "selected";}?>>租车</option>
                            	</select>
                            	</div>
                            </div>
                            <div class="form-actions">
                        	<input type="submit" class="btn btn blue" value="提交">
                            <a class="btn btn blue" id="cansel" onclick="history.back()"> 取消</a>
                       		</div>
                         </form>    
           </div>
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
			product_name : {
				required : true
				
			},
			
			product_category : {
				required : true,
				remote : {
					url 	: base_url + "public_product/ajaxCode",
					type 	: "get",
					dataType : "json",
					data :{
					product_category : function(){ 
							return $("#product_category").val();
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

			product_engname : {
					regex : true
				}
			
			
		
 		},
		 messages: {  //对应上面的错误信息
 			product_name: {required : "必填"
 			            
 	 			        },
  	 		product_category: {required : "必填",
                        remote : "已添加该商品分类简称"
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
