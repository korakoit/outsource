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
  	<div class="span12 booking-search">
  	   <div class="clearfix margin-bottom-20">
			<form  class="form-horizontal" method="get" >
				<div class="pull-left margin-right-20">
                    <div class="clearfix margin-bottom-20">
                        <div class="control-group pull-left" style="margin-top:5px;">
                        <label class="label-control">国家名称：</label>
                        </div>
                        <div class="control-group pull-left " >
                        <input type="text"  class="m-wrap large" name="country_name" value="<?php if(!empty($search['country_name'])) echo $search['country_name'];?>">
                        </div>
                        <label class="control-label" >城市名称：</label>
                        <div class="control-group pull-left " >
                        <input type="text"   class="m-wrap large" name="city_name" value="<?php if(!empty($search['city_name'])) echo $search['city_name'];?>">
                        </div>
                        <div class="control-group pull-left"  style="margin-left:15px;">
                        <input type="submit" name="submit" value="搜索"  class="btn btn blue">
                        <a name="submit"  href="<?=base_url('public_city/addView');?>"  class="btn btn blue">新增城市</a>
                        </div>
                        <div class="control-group pull-left" style="margin-left:5px;"><a class="btn btn blue" name="implode" id="btnExport">导出Excel</a></div>
                        <div class="control-group pull-left"  style="margin-left:5px;">
                        <a id='upload' class="btn btn blue">导入Excel</a>
                        </div>
                        <div class="control-group pull-left" style="margin-left:5px;"><a href="<?=base_url('public_city/index');?>" class="btn btn blue" name="reset" id="reset">重置搜索条件</a></div>
                    </div>
                 </div>
			</form>
		</div>
	</div>	
</div>	
                	<table class="table table-striped table-bordered table-hover">
                    <thead>
                            	<tr>
                                	<th>序号</th>
                                    <th>国家名称</th>
                                    <th>城市名称</th>
									<th>城市拼音名称</th>
                                    <th>城市英文名称</th>
                                    <th>城市简称</th>
                                    <th>最后更新时间</th>
                                    <th>操作</th>
                            	</tr>
                    </thead> 
                        <?php if(!empty($city)):?>
                       	<?php foreach($city as $key=>$cityRow):
                       	    $edit =base_url('public_city/edit/'.$cityRow['id']);
                       	    $delete =base_url('public_city/delete/'.$cityRow['id']); 
                       	?>
                       	<tbody>
                       		<tr class="odd gradeX">
                       		       <td><?=$key+1?></td>
                       		       <td><?=$cityRow['country_name']?></td>
                       		       <td><?=$cityRow['city_name']?></td>
									<td><?=$cityRow['city_py']?></td>
                       		       <td><?=$cityRow['city_engname']?></td>
                       		       <td><?=$cityRow['city_code']?></td>
                       			<td><?php echo date("Y-m-d",$cityRow['update_time']);?></td>
                       			<td style="text-align:center;"><a class="btn green"   href="<?=$edit?>">编辑</a>&nbsp;&nbsp;&nbsp;
                       			       <?php if($cityRow['city_status']==2):?><a class="btn red"  name="status" href="<?=base_url('public_city/start/'.$cityRow['id'])?>">停用</a>
                       			       <?php elseif($cityRow['city_status']==1):?><a class="btn green"  name="status" href="<?=base_url('public_city/stop/'.$cityRow['id'])?>">正常</a>
                       			       <?php endif;?>
                       				<!--&nbsp;&nbsp;&nbsp;<a class="btn red" name="delete" href="<?=base_url('public_city/delete/'.$cityRow['id'])?>">删除</a>-->
                       			</td>
                       		</tr>
                       		</tbody>
                          <?php endforeach;?>
                     	<?php else:?>
                     		<tbody>
                     		<tr><td colspan="10">没有数据</td></tr>
                     		</tbody>
                     	<?php endif;?>
                     	</table>        
                     	<?php if(isset($pagination)):?>
                           <div class="pagination pagination-right">
                           <?=$pagination?>
                          </div>
                        <?php endif;?>
                </div>
			</div>
	<div class="modal hide" tabindex="-1"id="uploadAlert" style="width:400px;margin-top:250px;">
</div>		
	<div id="deleteAlert" class="modal hide" tabindex="-1" style="margin-top:250px;">
         <div class="modal-header">
         <button data-dismiss="modal" class="close" type="button"></button>
         <span class="icon"><i class="icon-info-sign"></i>删除操作</span>
         </div>
         <div class="modal-body">
         <p>确定要删除该城市？</p>
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
<div class="popupfruit" id="uploadAlert1">
	<div class="fruitshell" style="height: 1222px;"></div>
	<div class="fruitflesh"
		style="margin-left: -336px; margin-top: -253px;width:380px;">
		<form action="<?=base_url("public_city/uolpadExcel")?>" id='from_file'
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
							value="lm_public.city" name="table">
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
	src="<?=STATIC_FILE_HOST?>assets/js/ajaxfileupload.js">
</script>
<script src="<?=STATIC_FILE_HOST?>assets/js/popfruit.js"
	type="text/javascript"></script>

<script type="text/javascript">
$(function(){
	var total = <?=!empty($total) ? $total : 0?>;
	var searchJson = <?=!empty($searchJson) ? $searchJson : '{}'?>;
	$("a[name = 'delete']").click(function(e){
		e.preventDefault();
		var url = $(this).attr("href");
		$("#deleteConfirm").attr("href",url);
		$("#deleteAlert").modal({
            keyboard: true
        });
	});
	
	$("#upload").click(function(e){
		popfruit('uploadAlert1'); 
	});
	$('#from_file').submit(function(){
		if($('#inputExcel').val()==''){
			layer.msg('请先选择要导入的国家列表Excel文件');
		}else{
			$.ajaxFileUpload({  
				url: '<?=HTTP_HOST_FRIST.'/public_country/uolpadExcel'?>',
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
		layer.open({
			btn:['export'],
            title: '提示框',
            shade: [0.8,'#393D49'],
            content:  '确认导出城市列表！',
            yes:function(index){
                layer.msg('正在导出，请耐心等待！');
        		layer.close(index);
        		str=parseParamSearch(searchJson);
        		location.href='<?=base_url("public_city/indexExport")?>?'+str;
                //把图片替换  
                layer.closeAll('loading');
            }
       	});
		return;
	}); 
	
});


</script>
                 