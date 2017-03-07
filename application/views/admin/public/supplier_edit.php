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
  
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
             
            </div>
        </div>
         <div class="row-fluid">
         	<div class="span12">
                    	<form  class="form-horizontal" method="post" enctype="multipart/form-data" action="<?=base_url('public_supplier/update')?>" id="edit-form">
                              	<?php foreach($supplier as $supplierRow):?>
                              	<div class="control-group">
                            	<label  class="control-label">供应商名称<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="hidden" value="<?=$supplierRow['id']?>" name="id" id="id"></input>
                            	<input type="text" class="form-control span4"  name="supplier_name" value="<?=$supplierRow['supplier_name']?>" id="supplier_name">
                            	<span class="help-inline" id="msg" ></span>
                            	</div>
                            	</div>
                                <div class="control-group">
                            	<label  class="control-label">供应商简称<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<label class="help-inline"><?=$supplierRow['supplier_code']?></label>
                            	</div>
                            	</div>
                            	<div class="control-group">
                            	<label  class="control-label">所属国家<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<select name="country" class="form-control span4">
                            	<?php foreach($country as $countryRow):?>
                            	<option value="<?=$countryRow['id']?>" <?php if(isset($country_id)&&($country_id==$countryRow['id'])) echo "selected"?>><?=$countryRow['country_name']?></option>	
                            	<?php endforeach;?>
                            	</select>  
                            	</div>
                            	</div>
                            	<div class="control-group">
                            	<label  class="control-label col-sm-3">系统账号<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<label class="help-inline"><?=$supplierRow['user_name']?></label>
                            	</div>
                            	</div>
                            	<div class="control-group">
                            	<label  class="control-label">编辑密码</label>
                            	<div class="controls">
                            	<select name="edit_pwd" class="form-control span4">
                            	<option value="1">是</option>
                            	<option value="2" selected>否</option>
                            	</select>  
                            	</div>
                            	</div>
                            	<div class="control-group" id="change_pwd" style='display:none;'>
                            	<label  class="control-label col-sm-3">登录密码<span class="required" style="color:red;">*</span></label>
                            	<div class="controls">
                            	<input type="password"  class="form-control span4" name="password1" value="" id="password">
                            	<span class="help-inline" id="msg1" ></span>
                            	</div>
                            	</div>
                            	<div class="control-group">
                            	<label  class="control-label col-sm-3">供应商简介<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<textarea  name="introduce" class="form-control span4" rows="10" cols="40" ><?=$supplierRow['introduce']?></textarea>
                            	</div>
                            	</div>
                            	<div class="control-group">
                            	<label class="control-label">邮箱账号<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="text"  class="form-control span4" name="email_name" id="email_name" value="<?=$supplierRow['email_name']?>">
                            	</div>
                         		</div>
                         		<div class="control-group">
                            	<label class="control-label">邮箱密码<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="password"  class="form-control span4" name="email_pwd" id="email_pwd" value="<?=$supplierRow['email_pwd']?>">
                            	</div>
                         		</div>
                         		<div class="control-group">
                            	<label class="control-label">smtp邮箱服务器<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="text"  class="form-control span4" name="smtp" id="smtp" value="<?=$supplierRow['smtp']?>">
                            	</div>
                         		</div>
                         		<div class="control-group">
                            	<label class="control-label">pop邮箱服务器<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="text"  class="form-control span4" name="pop" id="pop" value="<?=$supplierRow['pop']?>">
                            	</div>
                            	</div>
                            	<div class="control-group">
                            	<label class="control-label">邮箱附加标题<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="text"  class="form-control span4" name="addtion_title" id="addtion_title" value="<?=$supplierRow['addtion_title']?>">
                            	</div>
                         		</div>
                         		<div class="control-group">
                            	<label class="control-label">邮件内容<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<textarea name="content"  rows="5" cols="80" class="span4"><?=$supplierRow['content']?></textarea>
                            	</div>
                         		</div>
                         		<div class="control-group">
                            	<label class="control-label">邮件端口号<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="text"  class="form-control span4" name="email_port" id="email_port" value="<?=$supplierRow['email_port']?>">
                            	</div>
                         		</div>
                         		<div class="control-group">
                            	<label class="control-label">邮件SSL<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="text"  class="form-control span4" name="email_ssl" id="email_ssl" value="<?=$supplierRow['email_ssl']?>">
                            	</div>
                         		</div>
                         		 <div class="control-group">
                            	<label  class="control-label col-sm-3">供应商印章<span class="required" style="color:white;">*</span></label>
                            	<div class="controls">
                            	<input type="file"  class="form-control" name="logo" id="logo" >
                            	<a id="airShow" href="<?php if(!empty($supplierRow['logo_url'])){echo IMAGE_FILE_HOST.substr($supplierRow['logo_url'],0,2)."/".$supplierRow['logo_url'];}else echo "";?>" target="_blank" class="btn green" style="display:none;">预览</a>
                            	<br>
                            	<span class="help-inline" for="logo">建议图片尺寸为590x355</span>
                            	</div>
                   			     </div>
                           	 	<?php endforeach;?>
                         		<hr>
					<div class="form-group">
					<label class="label-control" style="font-size:20px;font-weight:bold;">地接电话<span class="required" style="color:red;">*</span></label>
					<table  class="table table-striped table-bordered table-hover" >
                    	<thead>
                    			<tr>
                    				<th>一键输入</th>
                    				<th><input type="text" name="localtel1" class="span12" value=""></th>
                    				<th><input type="text" name="tel1" class="span12" value=""></th>
                    				<th><input type="text" name="foxnum1" class="span12" value=""></th>
                    			</tr>
                            	<tr>
                                	<th class="col-sm-1">商品分类</th>
                                    <th class="col-sm-4">地接电话</th>
                                    <th class="col-sm-2">电话</th>
                                    <th class="col-sm-2">传真</th>
                                    
                            	</tr>
                        </thead> 
					<tbody>
                       	<?php foreach($product as $productRow):?>
                       		<tr>
                       			   <td><?=$productRow['name']?></td>
                       		       <td><input type="text" class="localtel span12" name="localtel[<?=$productRow['id']?>]" value="<?php if(!empty($supplier_info['localtel'][$productRow['id']])){echo $supplier_info['localtel'][$productRow['id']];}?>"></td>
                       		       <td><input type="text" class="tel span12" name="tel[<?=$productRow['id']?>]" value="<?php if(!empty($supplier_info['tel'][$productRow['id']])) {echo $supplier_info['tel'][$productRow['id']];}?>"></td>
                       		       <td><input type="text" class="foxnum span12" name="foxnum[<?=$productRow['id']?>]" value="<?php if(!empty($supplier_info['foxnum'][$productRow['id']]))  { echo $supplier_info['foxnum'][$productRow['id']];}?>"></td>
                       		</tr>   
                       <?php endforeach;?>
                    </tbody>
                    </table>   
					 <div class="pagination pagination-centered" >
					 <button class="btn btn blue" name="submit" type="submit">提交</button>
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 <a class="btn btn blue" id="cansel" onclick="history.back()"> 取消</a>
					 </div>       
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
	var obj = $("#airShow").attr("href");
	if(obj){
	$("#airShow").show();
	}
	$("input[name='localtel1']").change(function(e){
		var x = $(this).attr("value");
		$(".localtel").val(x);
		
		});
	$("input[name='tel1']").change(function(e){
		var x = $(this).attr("value");
		$(".tel").val(x);
		
		});
	$("input[name='foxnum1']").change(function(e){
		var x = $(this).attr("value");
		$(".foxnum").val(x);
		
		});
	$("select[name='edit_pwd']").change(function(e){
		if($(this).val() == "1"){
			$("#change_pwd").css("display","block");
			$("input[name = 'password1']").attr("name","password");
		}else if($(this).val() == "2"){
			$("#change_pwd").css("display","none");
			$("input[name = 'password']").attr("name","password1");
		}


	});
	var validator = $("#edit-form").validate({
 		errorElement: 'span',
 		errorClass: 'help-inline', // default input error message class
        focusInvalid: true, // do not focus the last invalid input
        onfocus: true,
        onkeyup: false,
        ignore: "",
 		rules :{
			supplier_name : {
				required : true
							},
			
			password : {
				required : true
			}
 		}, 
 	messages : {
 	supplier_name : {
			required : "必填"
						},
		
		password : {
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