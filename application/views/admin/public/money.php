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
			<form  class="form-horizontal" method="get">
                 <div class="pull-left margin-right-20">
                    <div class="clearfix margin-bottom-20">
                        <div class="control-group pull-left" style="margin-top:5px;">
                        <label class="label-control">国家名称：</label>
                        </div>
                        <div class="control-group pull-left " >
                        <input type="text"  class="m-wrap span12" name="country_name" value="<?php if(!empty($search['country_name'])) echo $search['country_name'];?>">
                        </div>
                        <div class="control-group pull-left " style="margin-left:20px;">
                        <input type="submit" name="submit" value="搜索" class="btn btn blue">
                        <a  name="add" href="<?=site_url('public_money/add');?>"  class="btn btn blue">新增</a>
                        </div>
                        <div class="control-group pull-left" style="margin-left:5px;">
        		          <input type="button" value="导出Excel" class="btn blue" id="btnExport"></div>
                        <div class="control-group pull-left"  style="margin-left:5px;">
        		          <input type="button" value="导入Excel" class="btn blue" id='upload'>
        		      </div>
                        <div class="control-group pull-left" style="margin-left:5px;"><a href="<?=base_url('public_money/index');?>" class="btn btn blue" name="reset" id="reset">重置搜索条件</a></div>
                   </div>
                   </div>
			</form>
		</div>
	</div>
</div>
                	<table  class="table table-striped table-bordered table-hover" >
                    	<thead>
                            	<tr>
                                	<th>序号</th>
                                	<th>国家</th>
                                	<th>货币</th>
                                	<th>货币代码</th>
                                    <th>货币符号</th>  
                                    <th>固定汇率(对人民币)</th>
                                    <th>最后更新时间</th>
                                    <th>操作</th>
                            	</tr>
                        </thead> 
                        <?php if(!empty($money)):?>
                       	<?php foreach($money as $key => $moneyRow):
                       	    $edit = base_url('public_money/edit/'.$moneyRow['id']);
                       	    $delete = base_url('public_money/delete/'.$moneyRow['id']); 
                       	?>
                       	<tbody>
                       		<tr>
                       		       <td><?=$key+1?></td>
                       		       <td><?=$moneyRow['country_name']?></td>
                       		       <td><?=$moneyRow['money_name']?></td>
                       		       <td><?=$moneyRow['money_code']?></td>
                       		       <td><?=$moneyRow['coin_sign']?></td>
                       		       <td><?=$moneyRow['e_rate']?></td>
                       		       <td><?=date("Y-m-d",$moneyRow['update_time']);  ?></td>
                       			   <td><a class="btn green"  onclick="location.href='<?=$edit?>'">编辑</a>&nbsp;&nbsp;&nbsp;
                       			       <?php if($moneyRow['status']==2):?><a class="btn red"  name="status" href="<?=base_url('public_money/start/'.$moneyRow['id'])?>">停用</a>
                       			       <?php elseif($moneyRow['status']==1):?><a class="btn green"  name="status" href="<?=base_url('public_money/stop/'.$moneyRow['id'])?>">正常</a>
                       			       <?php endif;?>
                       			   	   <!--&nbsp;&nbsp;&nbsp;<a class="btn red" id="delete" href="<?=$delete?>">删除</a>-->
                       			   </td>
                       		</tr>
                       		</tbody>
                          <?php endforeach;?>
                          <?php else:?>
                         <tbody>
                         <tr>
                         <td colspan="10">没有数据!</td>
                         </tr>
                         </tbody>
                         <?php endif;?>
                         </table> 
                     	<?php if(isset($pagination)):?>
                                            <div class="pagination pagination-right" >
                                                 <?=$pagination?>
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
         <p>确定要删除该货币？</p>
         </div>
         <div class="modal-footer"> 
         <a id="deleteConfirm"  class="btn blue" href="#">确定</a> 
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
	$("#delete").click(function(e){
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
			layer.msg('请先选择要导入的列表Excel文件');
		}else{
			$.ajaxFileUpload({  
				url: '<?=HTTP_HOST_FRIST.'/public_money/uolpadExcel'?>',
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
	                		location.href='<?=base_url("public_money/indexExport")?>?'+str;
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
	                		location.href='<?=base_url("public_money/indexExport")?>?'+str;
	                        //把图片替换  
	                        layer.closeAll('loading');
	                    }
			       	});
				}
			return;
		});
	
});


</script>
