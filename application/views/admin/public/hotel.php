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
                        <label  class="label-control">国家名称：</label>
                        </div>
                        <div class="control-group pull-left" >
                        <input type="text"   class="m-wrap span6" name="country_name" value="<?php if(!empty($search['country_name'])) echo $search['country_name'];?>">
                        </div>
                        <div class="control-group pull-left" style="margin-top:5px;margin-left:-60px;">
                        <label  class="label-control" >城市名称：</label>
                        </div>
                        <div class="control-group pull-left" >
                        <input type="text"  class="m-wrap span6" name="city_name" value="<?php if(!empty($search['city_name'])) echo $search['city_name'];?>">
                        </div>
                        <div class="control-group pull-left" style="margin-top:5px;margin-left:-60px;">
                        <label  class="label-control" style="margin-top:5px;">区域名称：</label>
                        </div>
                        <div class="control-group pull-left" >
                        <input type="text"   class="m-wrap span6" name="area_name" value="<?php if(!empty($search['area_name'])) echo $search['area_name'];?>">
                        </div>
                        <div class="control-group pull-left" style="margin-top:5px;margin-left:-60px;">
                        <label  class="label-control" style="margin-top:5px;">酒店名称：</label>
                        </div>
                        <div class="control-group pull-left" >
                        <input type="text"   class="m-wrap span6" name="hotel_name" value="<?php if(!empty($search['hotel_name'])) echo $search['hotel_name'];?>">
                        </div>
                        <div class="control-group pull-left" style="margin-top:5px;margin-left:-40px;">
                        <label  class="span 1" style="margin-top:5px;">状态：</label>
                        </div>
                        <div class="control-group pull-left">
                        <select name="status" class="span12 m-wrap">
                        <option value="4">不限</option>
                        <option value="1" <?php if(isset($search['status'])&&($search['status']=="1")) echo "selected";?>>正常</option>
                        <option value="0" <?php if(isset($search['status'])&&($search['status']=="0")) echo "selected";?>>停用</option>
                        <option value="2" <?php if(isset($search['status'])&&($search['status']=="2")) echo "selected";?>>待处理</option>
                        </select>
                        </div>
                        <div class="control-group pull-left"  style="margin-left:15px;">
                        <input type="submit"  value="搜索"  class="btn btn blue">
                        <a name="add"  href="<?=site_url('public_hotel/addView');?>"  class="btn btn blue">新增酒店</a>
                        </div>
                        <div class="control-group pull-left" style="margin-left:5px;">
        		          <input type="button" value="导出Excel" class="btn blue" id="btnExport"></div>
                        <div class="control-group pull-left"  style="margin-left:5px;">
        		          <input type="button" value="导入Excel" class="btn blue" id='upload'>
        		      </div>
                        <div class="control-group pull-left" style="margin-left:5px;"><a href="<?=base_url('public_hotel/index');?>" class="btn btn blue" name="reset" id="reset">重置搜索条件</a></div>
                    </div>
                </div>
			</form>
		</div>
     </div>		
                <table class="table table-striped table-bordered table-hover" >
                    	<thead>
                            	<tr>
                                	<th>序号</th>
                                    <th>国家</th>
                                    <th>城市</th>
                                    <th>区域</th>
                                    <th>酒店英文名称</th>
                                    <th>酒店中文名称</th>
                                    <th>电话</th>
                                    <th>备用电话</th>
                                    <th>地址</th>
                                    <th>备注</th>
                                    <th>状态</th>
                                    <th>最后更新时间</th>
                                    <th>操作</th>
                            	</tr>
                        </thead>
                        <?php if(!empty($hotel)):?> 
                       	<?php foreach($hotel as $key=>$hotelRow):
                       	    $edit = base_url('public_hotel/editView/'.$hotelRow['hotelid']);
                       	    $delete = base_url('public_hotel/delete/'.$hotelRow['hotelid']);
                       	?>
                       	<tbody>
                       		<tr>
                       		       <td><?= $key+1?></td>
                       		       <td><?= $hotelRow['country_name']?></td>                      		      
                       		       <td><?= $hotelRow['city_name']?></td>
                       		       <td><?= $hotelRow['area_name']?></td>
                       		       <td><?= $hotelRow['hotel_engname']?></td>
                       		       <td><?= $hotelRow['hotel_chname']?></td>
                       		       <td><?= $hotelRow['tel']?></td>
                       		       <td><?= $hotelRow['backup_tel']?></td>
                       		       <td><?= $hotelRow['address']?></td>
                       		       <td><?= $hotelRow['remark']?></td>
                       		       <td style="width:100px;"><?php if($hotelRow['h_status'] == 2):?>
                       		           <select name ="c_status" class="span12" id="<?=$hotelRow['hotelid']?>">
                       		           <option value='0'>停用</option>
                       		           <option value='1'>正常</option>
                       		           <option value='2' selected>待处理</option>
                       		           </select>
                       		       <?php else:?>
                       		       <?php     
                       		       			if($hotelRow['h_status']==1){echo "正常";}
                       		                if($hotelRow['h_status']==0){echo "停用";}
                       		                if($hotelRow['h_status']==2){echo "待处理";}
                       		       ?>
                       		       <?php endif;?>
                       		       </td>
                       			<td><?=date("Y-m-d",$hotelRow['update_time']);?></td>
                       		<td><a class="btn green" href="<?=$edit?>">编辑</a><!--
                       		<?php if($hotelRow['h_status']== 2):?>
                       		&nbsp;<a  class="btn green deleteAlert" href="<?=$delete?>" name="delete">删除</a>
                       		<?php else:?>
                       		<a  class="btn red deleteAlert" href="<?=$delete?>" name="delete">删除</a>
                       		<?php endif;?>-->
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
         <p>确定要删除该酒店？</p>
         </div>
         <div class="modal-footer"> 
         <a id="deleteConfirm"  class="btn blue" href="#">确定</a> 
         <a data-dismiss="modal" class="btn" href="#">取消</a> 
         </div>
</div>
<div id="changeAlert" class="modal hide" tabindex="-1" style="margin-top:250px;">
         <div class="modal-header">
         <button data-dismiss="modal" class="close" type="button"></button>
         <span class="icon"><i class="icon-info-sign"></i>修改操作</span>
         </div>
         <div class="modal-body">
         <p>确定要更改酒店状态？</p>
         </div>
         <div class="modal-footer"> 
         <a id="statusConfirm"  class="btn blue" href="#">确定</a> 
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
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>

<script type="text/javascript">
$(function(){

	var total = <?=!empty($total) ? $total : 0?>;
	var searchJson = <?=!empty($searchJson) ? $searchJson : '{}'?>;
	$(".deleteAlert").click(function(e){
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
	$("[name = 'c_status']").change(function(e){
		var val = $(this).find("option:selected").val();
		var id	= $(this).attr("id");
		$.get(base_url + 'admin.php/public_hotel/changeStatus/',{val : val, id : id},function(data){
			if(data == null || data.length == 0){
				alert("更改状态失败");
			}else{
				alert("成功");
				}
		},'json')

	});
	$('#from_file').submit(function(){
		if($('#inputExcel').val()==''){
			
			layer.msg('请先选择要导入的列表Excel文件');
		}else{
			$.ajaxFileUpload({  
				url: '<?=HTTP_HOST_FRIST.'/public_hotel/uolpadExcel'?>',
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
	                		location.href='<?=base_url("public_hotel/indexExport")?>?'+str;
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
	                		location.href='<?=base_url("public_hotel/indexExport")?>?'+str;
	                        //把图片替换  
	                        layer.closeAll('loading');
	                    }
			       	});
				}
			return;
		});

	
	
	
});


</script>