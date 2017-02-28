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
              <div class="pull-left" style="margin-right:20px;">
                 <div class="clearfix margin-bottom-20">
                       <div class="control-group pull-left" style="margin-top:5px;">
                       <label class="label-control">国家名称：</label>
                       </div>
                       <div class="control-group pull-left " >
                       <input type="text" class="m-wrap medium" name="country_name" value="<?php if(isset($search['country_name'])) echo $search['country_name'];?>">
                       </div>
                       <div class="control-group pull-left " >
                       <label  class="control-label col-sm-1">城市名称：</label>
                       </div>
                       <div class="control-group pull-left " >     
                       <input type="text"   class="m-wrap medium" name="city_name" value="<?php if(isset($search['city_name'])) echo $search['city_name'];?>">
                       </div>
                       <div class="control-group pull-left " >
                       <label  class="control-label col-sm-1">区域名称：</label>
                       </div>
                       <div class="control-group pull-left " >
                       <input type="text"   class="m-wrap medium" name="area_name" value="<?php if(isset($search['area_name'])) echo $search['area_name'];?>">
                       </div>
                       <div class="control-group pull-left" style="margin-left:20px;" >
                       <input type="submit"  value="搜索"  class="btn btn blue">
                       <a href="<?=base_url('public_area/addView')?>" class="btn btn blue" name="add">新增</a>
                       </div>
                       <div class="control-group pull-left" style="margin-left:5px;"><a class="btn btn blue" name="btnExport" id="btnExport">导出Excel</a></div>
                       <div class="control-group pull-left" style="margin-left:5px;" >
                        <a id='upload' class="btn btn blue">导入Excel</a>
                        </div>
                       <div class="control-group pull-left" style="margin-left:5px;"><a href="<?=base_url('public_area/index');?>" class="btn btn blue" name="reset" id="reset">重置搜索条件</a></div>
                  </div>
                  </div>
			  </form>
			</div>
		</div>
                	<table class="table table-striped table-bordered table-hover">
                    	<thead>
                            	<tr>
                                	<th>序号</th>
                                    <th>国家</th>
                                    <th>城市</th>
                                    <th>区域名称</th>
                                    <th>区域英文名称</th>
                                    <th>最后更新时间</th>
                                    <th>操作</th>
                            	</tr>
                        </thead><?php if(!empty($area)):?>
                       	<?php foreach($area as $key=>$areaRow):
                       	    $edit = base_url('public_area/edit/'.$areaRow['id']);
                       	    $delete = base_url('public_area/delete/'.$areaRow['id']); 
                       	?>
                       	<tbody>
                       		<tr>
                       		       <td><?=$key+1?></td>
                       		       <td><?=$areaRow['country_name']?></td>                      		      
                       		       <td><?=$areaRow['city_name']?></td>
                       		       <td><?=$areaRow['area_name']?></td>
                       		       <td><?=$areaRow['area_engname']?></td>
                       			   <td><?=date("Y-m-d",$areaRow['update_time']); ?></td>
                       			   <td><a class="btn green" href="<?=$edit?>">编辑</a>&nbsp;&nbsp;&nbsp;
                       			       <?php if($areaRow['area_status']==2):?><a class="btn red" href="<?=base_url('public_area/start/'.$areaRow['id'])?>">停用</a>
                       			       <?php elseif($areaRow['area_status']==1):?><a class="btn green" href="<?=base_url('public_area/stop/'.$areaRow['id'])?>">正常</a>
                       			       <?php endif;?>
                       			   	  <!--;&nbsp;&nbsp;<a class="btn red" href="<?=$delete?>" name="delete">删除</a>-->
                       			   </td>
                       		</tr>
                       		</tbody>
                          <?php endforeach;?>
                          <?php else:?>
                          <tbody>
                          <tr><td colspan="8">没有数据!</td></tr>
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
		<div class="modal hide" tabindex="-1"id="uploadAlert" style="width:400px;margin-top:250px;">
</div>	
<div id="deleteAlert" class="modal hide" tabindex="-1" style="margin-top:250px;">
         <div class="modal-header">
         <button data-dismiss="modal" class="close" type="button"></button>
         <span class="icon"><i class="icon-info-sign"></i>删除操作</span>
         </div>
         <div class="modal-body">
         <p>确定要删除该区域？</p>
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
	$("a[name= 'delete']").click(function(e){
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
			layer.msg('请先选择要导入的区域列表Excel文件');
		}else{
			$.ajaxFileUpload({  
				url: '<?=HTTP_HOST_FRIST.'/public_area/uolpadExcel'?>',
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
            content:  '确认导出列表！',
            yes:function(index){
                layer.msg('正在导出，请耐心等待！');
        		layer.close(index);
        		str=parseParamSearch(searchJson);
        		location.href='<?=base_url("public_area/indexExport")?>?'+str;
                //把图片替换  
                layer.closeAll('loading');
            }
       	});
		return;
	}); 
	
	
});


</script>
                       