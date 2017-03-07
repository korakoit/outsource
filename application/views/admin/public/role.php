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
<div class="page-content" id="content">
 	<div class="container-fluid">
     	<div class="row-fluid">
            <div class="span12">
            </div>
        </div>
 <div class="row-fluid">
  	<div class="span12 booking-search">
  		<div class="clearfix margin-bottom-20">
    	<form  class="form-horizontal" method="get" id="role" >
				<div class="pull-left margin-right-20" style="margin-right:20px;">
                    <div class="clearfix margin-bottom-20">
                       <div class="control-group pull-left" style="margin-top:5px;">
                        <label class="label-control">账号角色：</label>
                        </div>
                        <div class="control-group pull-left" style="margin-right:20px;">	
                       	<input type="text" class="form-control" name="role_name" value="<?php if(!empty($search['role_name'])){echo $search['role_name'];}?>">
                        </div>
                        <div class="control-group pull-left margin-right-20" style="margin-right:20px;"><input type="submit" class="btn btn blue" name="submit" id="search" value="搜索" ></div>
                    </div>
               </div>
		</form>
	<div class="control-group pull-left margin-right-20" style="margin-top:-20px;"><a href="<?=site_url('public_role/addView');?>" class="btn btn blue" name="add">新增</a></div></div>
	</div>
</div>
            <table class="table table-striped table-bordered table-hover" style="margin-top:-10px;">
                    			<thead>
                            	<tr>
                                	<th>序号</th>
                                    <th>权限名称</th>
                                    <th>权限类型</th>
                                    <th>最后更新时间</th>
                                    <th>状态</th>
                                    <th>操作</th>
                            	</tr>
                        		</thead> 
                        <?php if(!empty($role)):?>
                       	<?php foreach($role as $key => $roleRow):
                       	    $edit = base_url('public_role/edit/'.$roleRow['id']);
                       	    $delete = base_url('public_role/delete/'.$roleRow['id']); 
                       	?>
                       	<tbody>
                       		<tr class="odd gradeX">
                       		       <td><?=$key+1?></td>
                       		       <td><?=$roleRow['role_name']?></td>
                       		       <td><?=$roleRow['role_category']?></td>
                       			   <td><?=date("Y-m-d",$roleRow['update_time']);?>
                       			   </td>
                       			   <td>
                       			       <?php if($roleRow['status'] == 1):?>
                       			       <a name="status" class="btn btn blue" href="<?=base_url('public_role/change/'.$roleRow['id']);?>">正常</a>
                       			       <?php else:?>
                       			       <a name="status" class="btn btn red" href="<?=base_url('public_role/change/'.$roleRow['id']);?>">锁定</a>
                       			       <?php endif;?>    
                       			   </td>
                       		<td><input class="btn btn green" type=submit  onclick="location.href='<?=$edit?>'" value="编辑">
							<!--&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn green"  onclick="if(confirm('您确定删除这条记录？')){location.href='<?=$delete?>'};" value="删除"></td>-->
                       		</tr>
                       		</tbody>
                          <?php endforeach;?>
                          <?php else:?>
                          <tbody><tr><td colspan="10">没有数据</td></tr></tbody>
                          <?php endif;?>
                     	</table>
                     	<?php if(isset($pagination)):?>
                          <div class="pagination pagination-right">
                           <?=$pagination?>
                          </div>
                        <?php endif;?>
			</div>
		</div>

<?php $this->load->view('block/footer.php')?>
                        
