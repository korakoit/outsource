<?php $this->load->view('block/header.php');?>
<?php $this->load->view('block/nav_bar.php');?>
<?php $this->load->view('block/side_bar')?>
<?php $this->load->view('block/title.php');?>
<?php $this->load->view('block/bread_crumb.php')?>

<div class="content-wrap">
	<div class="row">
		<div class="col-sm-12">
        	<div class="nest" id="tagInputClose">
        		
				<div class="title-alt">
					<h6>区域管理</h6>
				</div>
				<div class="title-alt">
				<form  class="form-horizontal" method="post" action="<?=site_url('public_city/search')?>">
                        	<div class="form-group">
                            	<label  class="control-label col-sm-1">国家名称：</label>
                            	<div class="col-sm-1">
                            	    <input type="text" placeholder="Enter Country"  class="form-control" name="country_name">
                            	</div>
                            	<label  class="control-label col-sm-1">城市名称：</label>
                            	<div class="col-sm-1">
                            	    <input type="text" placeholder="Enter City"  class="form-control" name="city_name">
                            	</div>
                            	<label  class="control-label col-sm-1">区域名称：</label>
                            	<div class="col-sm-1">
                            	    <input type="text" placeholder="Enter Area"  class="form-control" name="area_name">
                            	</div>
                            	<div class="col-sm-1"><input type="submit" name="submit" value="搜索" onclick="location.href='<?=site_url('public_area/search');?>'" class="btn btn-success"></div>
                                &nbsp; <div class="col-sm-1"><button type="button" name="submit" onclick="location.href='<?=site_url('public_area/add');?>'"  class="btn btn-success">新增</button></div>
                            </div>
			</form></div>
				<div class="body-nest" id="tagInput">
                	<table class="table-striped footable-res footable metro-blue">
                    	<thead>
                            	<tr>
                                	<th>序号</th>
                                    <th>国家</th>
                                    <th>城市</th>
                                    <th>区域</th>
                                    <th>最后更新时间</th>
                                    <th>操作</th>
                            	</tr>
                        </thead> 
                       	<?php foreach($info->result() as $v){
                       	    $edit = site_url('public_area/edit/'.$v->id);
                       	    $delete = site_url('public_area/delete/'.$v->id); 
                       	?>
                       	<tbody>
                       		<tr>
                       		       <td><?= $v->id?></td>
                       		       <td><?= $v->country_name?></td>                      		      
                       		       <td><?= $v->city_name?></td>
                       		       <td><?= $v->area_name?></td>
                       			<td><?= date("Y-m-d h-i-s",$v->update_time);?></td>
                       		<td><input class="btn" type=submit name="edit" onclick="location.href='<?=$edit?>'" value="编辑">
							<!--&nbsp;&nbsp;&nbsp;<input type="submit" class="btn" name="delete" onclick="location.href='<?=$delete?>'" value="删除"></td>-->
                       		</tr>
                          <?php }?>
                     	</tbody>
                     	<tfoot>
                                        <tr>
                                            <td colspan="5">
                                                <div class="pagination pagination-centered"><?=$this->pagination->create_links();?></div>
                                            </td>
                                        </tr>
                                    </tfoot>
                	</table>        
                </div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('block/right_slide_content.php')?>
<?php $this->load->view('block/footer.php')?>