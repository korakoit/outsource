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
            <form  class="form-horizontal" method="post" id="add-form">
            				<div class="control-group">
                            	<label  class="control-label">一级分类<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<select name="parent_category" id="parent_category">
                            	<option value=""><---请选择---></option>
                            	<option value="01">旅游线路</option>
                            	<option value="02">交通服务</option>
                            	<option value="03">票务服务</option>
                            	<option value="04">住宿服务</option>
                            	<option value="05">旅游用品</option>
                            	<option value="06">境外服务</option>
                            	<option value="07">签证保险</option>
                            	</select>
                            	</div>
                            </div>
                            <div class="control-group" style="display:none;" id="child">
                            	<label  class="control-label">子级ID<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="text"   class="m-wrap medium" name="child_id" id="child_id" maxlength="4"  readonly="readonly">
                            	</div>
                            </div>
                        	<div class="control-group">
                            	<label  class="control-label">商品分类<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="text"   class="m-wrap medium" name="product_name" id="product_name" maxlength="10">
                            	</div>
                            </div>
                            <div class="control-group">
                            	<label  class="control-label">商品分类英文名称<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="text"   class="m-wrap medium" name="product_engname" id="product_engname">
                            	</div>
                            </div>
                            <div class="control-group">
                            	<label  class="control-label">商品分类简称<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="text"   class="m-wrap medium" maxlength="2" name="product_category" id="product_category" >
                            	</div>
                            </div>
                            <div class="control-group">
                            	<label  class="control-label">日期属性<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<select class="m-wrap medium" name="dateattr" id="dateattr">
                            	<?php foreach($date as $val):?>
                            	<?php if($val['f_type']=="calender"||$val['f_type']=="calendertime"):?>
                            	<option value="<?=$val['id']?>"><?=$val['ch_name']?></option>
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
                            	<option value="1">一日游</option>
                            	<option value="2">包车</option>
                            	<option value="3">接机</option>
                            	<option value="4">租凭</option>
                            	<option value="5">租车</option>
                            	</select>
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
</div>
<?php $this->load->view('block/footer.php')?>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>

<script type="text/javascript">

$(function() {
	$("#parent_category").change(function(e){
			var category = $(this).val();
			$.get(base_url+"public_product/ajaxGetChildId",{parent_category:category},function(data){
				if(data !== null||data.length !==0){
					$("#child").css("display","block");
					$("#child_id").attr("value",data.child);
				}
			},'json'); 
		});

	
	jQuery.validator.addMethod("regex", function(value, element) {
    	var regex = /^([a-zA-Z ().@%#]+)$/;
    	return this.optional(element) || (regex.test(value));
    	}, "只能输入英文字母");
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
			product_name : {
				required : true
			},
			dateattr :{
				required : true

				},
				parent_category:{
					required : true
					},
			product_category : {
				required : true,
				regex 	 : true,
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
 			product_name: {
 			           required : "必填"
 			          
 	 			        },
  	 		product_category: {required : "必填",
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