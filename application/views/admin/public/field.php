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
		   <form  class="form-horizontal" method="get">
               <div class="pull-left margin-right-20">
                    <div class="clearfix margin-bottom-20">
                        <div class="control-group pull-left" style="margin-top:5px;">
                        <label  class="label-control">字段名称：</label>
                        </div>
                        <div class="control-group pull-left" >
                        <input type="text"   class="m-wrap span8" name="name" value="<?php if(!empty($search['name'])) echo $search['name'];?>">
                        </div>
                        <div class="control-group pull-left" style="margin-top:5px;">
                        <label  class="label-control" style="margin-left:10px;">字段类型：</label>
                        </div>
                        <div class="control-group pull-left" >
                        <select name="f_type" class="span12 m-wrap">
                        <option value="不限" 	 <?php if(isset($search['f_type'])&&($search['f_type']=="不限")) echo "selected";?>>不限</option> 
                        <option value="textread"     <?php if(isset($search['f_type'])&&($search['f_type']=="textread")) echo "selected";?>>文本(只读)</option>
                        <option value="text"     <?php if(isset($search['f_type'])&&($search['f_type']=="text")) echo "selected";?>>文本</option>
                        <option value="calender"   <?php if(isset($search['f_type'])&&($search['f_type']=="calender")) echo "selected";?>>日历</option>
                        <option value="radio"    <?php if(isset($search['f_type'])&&($search['f_type']=="radio")) echo "selected";?>>单选</option>
                        <option value="upload"   <?php if(isset($search['f_type'])&&($search['f_type']=="upload")) echo "selected";?>>上传附件</option>
                        <option value="calendertime" <?php if(isset($search['f_type'])&&($search['f_type']=="calendertime")) echo "selected";?>>日历时间</option>
                        <option value="search"   <?php if(isset($search['f_type'])&&($search['f_type']=="search")) echo "selected";?>>搜索</option>
                        <option value="express"   <?php if(isset($search['f_type'])&&($search['f_type']=="express")) echo "selected";?>>快递</option>
                        <option value="number"   <?php if(isset($search['f_type'])&&($search['f_type']=="number")) echo "selected";?>>号段</option>  
                        </select>
                        </div>
                        <div class="control-group pull-left" style="margin-top:5px;margin-left:15px;">
                        <label  class="span 1" style="margin-top:4px;">字段归类：</label>
                        </div>
                        <div class="control-group pull-left" >
                        <select name="f_class" class="span12 m-wrap">
                        <option value="不限" 	 		<?php if(isset($search['f_class'])&&($search['f_class']=="不限")) echo "selected";?>>不限</option>
                        <option value="order_info"   	<?php if(isset($search['f_class'])&&($search['f_class']=="order_info")) echo "selected";?>>下单信息</option>
                        <option value="hotel_info" 	    <?php if(isset($search['f_class'])&&($search['f_class']=="hotel_info")) echo "selected";?>>酒店信息</option>
                        <option value="contact_info" 	<?php if(isset($search['f_class'])&&($search['f_class']=="contact_info")) echo "selected";?>>联系人信息</option>
                        <option value="travel_info"   	<?php if(isset($search['f_class'])&&($search['f_class']=="travel_info")) echo "selected";?>>出行信息</option>
                        <option value="driver_info"   	<?php if(isset($search['f_class'])&&($search['f_class']=="driver_info")) echo "selected";?>>司机信息</option>
                        <option value="passenger_info"  <?php if(isset($search['f_class'])&&($search['f_class']=="passenger_info")) echo "selected";?>>乘客信息</option>
                        </select>
                        </div>
                        <div class="control-group pull-left" style="margin-top:5px;margin-left:15px;">
                        <label  class="span 1" style="margin-top:4px;">供应商字段权限：</label>
                        </div>    	
                        <div class="control-group pull-left" >
                        <select name="s_right" class="span12 m-wrap">
                        <option value="不限" <?php if(isset($search['s_right'])&&($search['s_right']=="不限")) echo "selected";?>>不限</option>
                        <option value="可见/可编辑" <?php if(isset($search['s_right'])&&($search['s_right']=="可见/可编辑")) echo "selected";?>>可见/可编辑</option>
                        <option value="可见/不可编辑" <?php if(isset($search['s_right'])&&($search['s_right']=="可见/不可编辑")) echo "selected";?>>可见/不可编辑</option>
                        <option value="不可见" <?php if(isset($search['s_right'])&&($search['s_right']=="不可见/不可编辑")) echo "selected";?>>不可见/不可编辑</option>
                        </select>
                        </div>
                        <div class="control-group pull-left" style="margin-top:5px;margin-left:15px;">
                        <label  class="span 1" style="margin-top:4px;">懒猫字段权限：</label>
                        </div>    	
                        <div class="control-group pull-left" >
                        <select name="lm_right" class="span12 m-wrap">
                        <option value="不限" 	<?php if(isset($search['lm_right'])&&($search['lm_right']=="不限")) echo "selected";?>>不限</option>
                        <option value="不可编辑" 		<?php if(isset($search['lm_right'])&&($search['lm_right']=="不可编辑")) echo "selected";?>>不可编辑</option>
                        <option value="可编辑" 	<?php if(isset($search['lm_right'])&&($search['lm_right']=="可编辑")) echo "selected";?>>可编辑</option>
                        </select>
                        </div>
                        <div class="control-group pull-left"  style="margin-left:15px;">
                        <input type="submit" name="submit" value="搜索"  class="btn btn blue">
                        <a name="add"  href="<?=site_url('public_field/addView');?>"  class="btn btn blue">新增</a>
                        </div>
                        <div class="control-group pull-left" style="margin-left:5px;">
		                <input type="button" value="导出Excel" class="btn blue" id="btnExport"></div>
                        <div class="control-group pull-left"  style="margin-left:5px;">
		                <input type="button" value="导入Excel" class="btn blue" id='upload'>
		                </div>
		                <div class="control-group pull-left" style="margin-left:5px;"><a href="<?=base_url('public_field/index');?>" class="btn btn blue" name="reset" id="reset">重置搜索条件</a></div>
                    </div>
                </div>
			</form>
		</div>
     </div>		
                <table class="table table-striped table-bordered table-hover" >
                    	<thead>
                            	<tr>
                                	<th>序号</th>
                                    <th>字段名称</th>
                                    <th>字段英文名字</th>
                                    <th>字段提示</th>
                                    <th>字段类型</th>
                                    <th>字段归类</th>
                                    <th>值集</th>
                                    <th>文本长度</th>
                                    <th>校验方法</th>
                                    <th>供应商字段权限</th>
                                    <th>懒猫字段权限</th>
                                    <th>最后更新时间</th>
                                    <th>操作</th>
                            	</tr>
                        </thead>
                        <?php if(!empty($field)):?> 
                       	<?php foreach($field as $key=>$fieldRow):
                       	    $edit = base_url('public_field/editView/'.$fieldRow['id']);
                       	    $delete = base_url('public_field/delete/'.$fieldRow['id']);
                       	?>
                       	<tbody>
                       		<tr>
                       		       <td><?= $key+1?></td>
                       		       <td><?= $fieldRow['ch_name']?></td>                      		      
                       		       <td><?= $fieldRow['en_name']?></td>
                       		       <td><?= $fieldRow['tips']?></td>
                       		       <td><?php echo empty($f_type[$fieldRow['f_type']])?'':$f_type[$fieldRow['f_type']];?></td>
                       		       <td><?php echo empty($f_class[$fieldRow['f_class']])?'':$f_class[$fieldRow['f_class']];?></td>
                       		       <td width="10%"><?php if($fieldRow['f_type'] =="radio"){echo $fieldRow['value'];}else if($fieldRow['f_type'] == "text"){echo $fieldRow['d_value'];}else if($fieldRow['f_type'] == "hotel"){foreach (json_decode($fieldRow['related_field']) as $k=>$v){echo $related_field[$v].";";}}?></td>
                       		       <td><?=$fieldRow['length']?></td>
                       		       <td><?= $fieldRow['test']?></td>
                       		       <td><?= $fieldRow['s_right']?></td>
                       		       <td><?= $fieldRow['lm_right']?></td>
                       			   <td><?=date("Y-m-d",$fieldRow['update_time']);?>
                       			   </td>
                       			   <td><a href="<?=$edit?>" class="btn blue">编辑</a>&nbsp;&nbsp;
									   <?php if($fieldRow['f_type'] == 'number'):?><a class="btn blue" href="<?=base_url('public_field/confirm_num/'.$fieldRow['id'])?>">号段列表</a><?php endif;?>
									   <?php if($fieldRow['status']==2):?><a class="btn red" href="<?=base_url('public_field/start/'.$fieldRow['id'])?>">停用</a>
                       			       <?php elseif($fieldRow['status']==1):?><a class="btn green" href="<?=base_url('public_field/stop/'.$fieldRow['id'])?>">正常</a>
                       			       <?php endif;?>
                       			     <!-- &nbsp;&nbsp; <a href="<?=$delete?>" name="delete" id="delete" class="btn red">删除</a>-->
                       			   </td>
                       		</tr>
                        </tbody>
                          <?php endforeach;?>
                          <?php else:?>
                          	<tbody>
                       		<tr>
                       		<td colspan="15">没有数据!</td>
                       		</tr>
                       		</tbody>
                          <?php endif;?>
                          </table>   
                     	<?php if(isset($pagination)):?>
                                            <div class="pagination pagination-right" >
                                                 <?=$pagination?>
                                            </div>
                        <?php endif;?>
                </div>
			</div>
		</div>

<div id="deleteAlert" class="modal hide" tabindex="-1" style="margin-top:250px;">
         <div class="modal-header">
         <button data-dismiss="modal" class="close" type="button"></button>
         <span class="icon"><i class="icon-info-sign"></i>删除操作</span>
         </div>
         <div class="modal-body">
         <p>确定要删除该字段？</p>
         </div>
         <div class="modal-footer"> 
         <a id="deleteConfirm"  class="btn blue" href="#">确定</a> 
         <a data-dismiss="modal" class="btn" href="#">取消</a> 
         </div>
</div>
<div id="implodeAlert" class="modal hide" tabindex="-1" style="margin-top:250px;">
         <div class="modal-header">
         <button data-dismiss="modal" class="close" type="button"></button>
         <span class="icon"><i class="icon-info-sign"></i>导入操作</span>
         </div>
         <div class="modal-body">
         <p>您将要导出的列表超过10000条，是否确认导出？</p>
         </div>
         <div class="modal-footer"> 
         <a id="yes"  class="btn blue" data-dismiss="modal">确定</a> 
          <a data-dismiss="modal" class="btn" href="#">取消</a>
         </div>
</div>

<div class="popupfruit" id="uploadAlert">
	<div class="fruitshell" style="height: 1222px;"></div>
	<div class="fruitflesh"
		style="margin-left: -336px; margin-top: -253px;width:380px;">
		<form action="<?=base_url("table_explode/reload")?>" id='from_file'
			enctype="multipart/form-data" method="post">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody>
					<tr>
						<th style="background-color: #ddd">导入数据</th>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td align="left">导入资源： <input type="file" size="20"
							name="inputExcel" id="inputExcel"> <input type="hidden"
							value="lm_public.country" name="table">
						</td>
					</tr>
					<tr>
						<td align="right"><input type='submit' value='upload' class="btn btn blue"> 
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</div>
<?php $this->load->view('block/footer.php')?>
<script type="text/javascript"
	src="<?=STATIC_FILE_HOST?>assets/js/ajaxfileupload.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/popfruit.js"
	type="text/javascript"></script>


<script type="text/javascript">
$(function(){
	var total = <?=!empty($total) ? $total : 0?>;
	var searchJson = <?=!empty($searchJson) ? $searchJson : '{}'?>;
	$("input[name='delete']").click(function(e){
		e.preventDefault();
		var url = $(this).attr("href");
		$("#deleteConfirm").attr("href",url);
		$("#deleteAlert").modal({
            keyboard: true
        });
	});

	$("#upload").click(function(e){
		popfruit('uploadAlert'); 
	});
	$('#from_file').submit(function(){
		if($('#inputExcel').val()==''){
			layer.msg('请先选择要导入的字段列表Excel文件');
		}else{
			$.ajaxFileUpload({  
				url: '<?=HTTP_HOST_FRIST.'/public_field/uolpadExcel'?>',
		        secureuri:false,  
		        fileElementId:'inputExcel',//file标签的id  
		        dataType: 'json',//返回数据的类型  
		        success: function (data, status) {  
			        if(data.error ==0){
						layer.msg("导入成功!");
					}else{
						layer.msg('导入失败!'+data.message);
					}
		       },  
		        error: function (data, status) {  
		       }  
		   });
		}
		$('.fruitshell').click();
		return false;
	});
	 $("#btnExport").click(function(){
				if(total <=0){
					layer.open({
	                    title: '提示框',
	                    shade: [0.8,'#393D49'],
	                    content:  '没有可导出的记录！'
			       	});
					return false;
				}else if(total > 1000 ){
					layer.open({
						btn:['export'],
	                    title: '提示框',
	                    shade: [0.8,'#393D49'],
	                    content:  '您将要导出的记录超过1000条，是否确认导出!',
	                    yes:function(index){
	                        layer.msg('正在导出，请耐心等待！');
	                		layer.close(index);
	                		
	                		str=parseParamSearch(searchJson);
	                		location.href='<?=base_url("public_field/indexExport")?>?'+str;
	                        //把图片替换  
	                        layer.closeAll('loading');
	                    }
			       	});
				}else{
					layer.open({
						btn:['export'],
	                    title: '提示框',
	                    shade: [0.8,'#393D49'],
	                    content:  '确认导出信息！',
	                    yes:function(index){
	                        layer.msg('正在导出，请耐心等待！');
	                		layer.close(index);
	                		
	                		str=parseParamSearch(searchJson);
	                		location.href='<?=base_url("public_field/indexExport")?>?'+str;
	                        //把图片替换  
	                        layer.closeAll('loading');
	                    }
			       	});
				}
			return;
		});
});


</script>
                