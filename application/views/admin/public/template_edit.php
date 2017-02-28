<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>
<style 	type="text/css"> 
.tb td {border:1px solid white;width:300px;} 


</style> 



<div class="page-content">

    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

    <div id="portlet-config" class="modal hide">

        <div class="modal-header">

            <button data-dismiss="modal" class="close" type="button"></button>

            <h3>portlet Settings</h3>

        </div>

        <div class="modal-body">

            <p>Here will be a configuration form</p>

        </div>

    </div>

    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

    <!-- BEGIN PAGE CONTAINER-->

    <div class="container-fluid">

        <!-- BEGIN PAGE HEADER-->

        <div class="row-fluid">

            <div class="span12">

                <?php $this->load->view('block/style_bar.php');?>

                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <?php $this->load->view('block/bread_crumb.php');?>
               <!-- END PAGE TITLE & BREADCRUMB -->

            </div>

        </div>

        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->

        <div class="row-fluid">
            <div class="span12">
                <?php if($style=="supplier_order"):?>
            	<form method="post" action="<?=base_url('public_template/update/'.$id.'/'.$style)?>" class="tb">
                       	<input type="hidden" name="type" value="<?=$style?>">
                       	<div class="control-group">
                        <div class="controls">
                        <span class="help-inline">
                       	<h3>商品信息:</h3>
						</span>
						<label class="help-inline">
						<input type="checkbox"  onclick="Allproduct()"/>
						</label>
						<label class="help-inline" style="margin-top:12px;">全选</label>
						</div>
						</div>
                        <table  class="table table-hover" style="border:none;margin-left:80px;">
                        <tr>
                        	<?php foreach($product_info as $key => $productRow):?>
                        	<?php if($productRow['s_right']!==""):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$productRow['ch_name']?>'" name="product[]" 
							<?php if(!empty($product)){if($productRow['s_right']=="可见/可编辑"){
								 			if(in_array($productRow['ch_name'],$product)){
								 			echo checked;
								 			}
								 			else{echo '';}
										}if($productRow['s_right']=="可见"){ 
											echo " disabled";}}?>/>
							<?=$productRow['ch_name']?>
							</label>
							</td>
							<?php if($key == 7) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
						</tr>
						</table>
                        	<div class="control-group">
                        	<div class="controls">
                        	<span class="help-inline">
                       		<h3>联系人信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Allcontact()"/>
							</label>
							<label class="help-inline" style="margin-top:12px;">全选</label>
							</div>
							</div>
						 	<table  class="table table-hover" style="border:none;margin-left:80px;">
                        	<tr>
                        	<?php foreach($contact_info as $key => $contactRow):?>
                        	<?php if($contactRow['s_right']!==""):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$contactRow['ch_name']?>'" name="contact[]" 
							<?php if(!empty($contact)){if($contactRow['s_right']=="可见/可编辑"){
								 			if(in_array($contactRow['ch_name'],$contact)){
								 			echo checked;
								 			}
								 			else{echo '';}
										}if($contactRow['s_right']=="可见"){ 
											echo " disabled";}}?>/>
							<?=$contactRow['ch_name']?>
							</label>
							</td>
							<?php if($key == 7) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
                        	</tr>
                        	</table>
                        	
                            <div class="control-group">
	                        <div class="controls">
	                        <span class="help-inline">
	                       	<h3>出行人信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Alltravel()"/>
							</label>
							<label class="help-inline" style="margin-top:12px;">全选</label>
							</div>
							</div>
							<table  class="table table-hover" style="border:none;margin-left:80px;">
                            <tr>
                           	<?php foreach($travel_info as $key => $travelRow):?>
                           	<?php if($travelRow['s_right']!==""):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$travelRow['ch_name']?>'" name="travel[]" 
							<?php if(!empty($travel)){if($travelRow['s_right']=="可见/可编辑"){
								 			if(in_array($travelRow['ch_name'],$travel)){
								 			echo checked;
								 			}
								 			else{echo '';}
										}if($travelRow['s_right']=="可见"){ 
											echo " disabled";}}?>/>
							<?=$travelRow['ch_name']?>
							</label>
							</td>
							<?php if($key == 7) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
                            </tr>
                            </table>
                            <div class="control-group">
	                        <div class="controls">
	                        <span class="help-inline">
	                       	<h3>下单信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Allorder()"/>
							</label>
							<label class="help-inline" style="margin-top:8px;">全选</label>
							</div>
							</div>
                           	<table  class="table table-hover" style="border:none;margin-left:80px;">
                            <tr>
                            <?php foreach($order_info as $key => $orderRow):?>
                            <?php if($orderRow['s_right']!==""):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$orderRow['ch_name']?>'" name="order[]" 
							<?php if(!empty($order)){if($orderRow['s_right']=="可见/可编辑"){
								 			if(in_array($orderRow['ch_name'],$order)){
								 			echo checked;
								 			}
								 			else{echo '';}
										}if($orderRow['s_right']=="可见"){ 
											echo " disabled";}}?>/>
							<?=$orderRow['ch_name']?>
							</label>
							</td>
							<?php if($key == 7) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
                            </tr>
                            </table>
                       	   <div class="control-group">
	                        <div class="controls">
	                        <span class="help-inline">
	                       	<h3>酒店信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Allhotel()"/>
							</label>
							<label class="help-inline" style="margin-top:12px;">全选</label>
							</div>
							</div>
							<table  class="table table-hover" style="border:none;margin-left:80px;">
                       	   	<tr>
                       	   	<?php foreach($hotel_info as $key => $hotelRow):?>
                       	   	<?php if($orderRow['s_right']!==""):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$hotelRow['ch_name']?>'" name="hotel[]" 
							<?php if(!empty($hotel)){if($travelRow['s_right']=="可见/可编辑"){
								 			if(in_array($hotelRow['ch_name'],$hotel)){
								 			echo checked;
								 			}
								 			else{echo '';}
										}if($hotelRow['s_right']=="可见"){ 
											echo " disabled";}}?>/>
							<?=$hotelRow['ch_name']?>
							</label>
							</td>
							<?php if($key == 7) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
                       	   </tr>
                       	   </table>
                        	<div class="control-group">
	                        <div class="controls">
	                        <span class="help-inline">
	                       	<h3>船票信息:</h3>
							</span>
							</div>
							</div>
							<table  class="table table-hover" style="border:none;margin-left:80px;">
							<tr>
							<?php foreach($ticket_info as $key => $ticketRow):?>
							<?php if($ticketRow['s_right']!==""):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$ticketRow['ch_name']?>'" name="boat[]" 
							<?php if(!empty($ticket)){if($ticketRow['s_right']=="可见/可编辑"){
								 		if(in_array($ticketRow['ch_name'],$ticket)){
								 			echo checked;
								 			}
								 			else{echo '';}
										}if($ticketRow['s_right']=="可见"){ 
											echo " disabled";}}?>/>
							<?=$ticketRow['ch_name']?>
							</label>
							</td>
							<?php if($key == 7) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
                         </tr>
                         </table>
                         <div class="form-actions">
                         <input class="btn green" type="submit" value="提交">
                         <a class="btn green"   onclick="history.back()">取消</a>
                         </div>
                        </form>	
                        <?php elseif($style=="order_detail"):?>
                        <form method="post" action="<?=base_url('public_template/update/'.$id.'/'.$style)?>" class="tb">
                       	<input type="hidden" name="type" value="<?=$style?>">
                       	<div class="control-group">
                        <div class="controls">
                        <span class="help-inline">
                       	<h3>商品信息:</h3>
						</span>
						<label class="help-inline">
						<input type="checkbox"  onclick="Allproduct()"/>
						</label>
						<label class="help-inline" style="margin-top:12px;">全选</label>
						</div>
						</div>
                        <table  class="table table-hover" style="border:none;margin-left:80px;">
                        <tr>
                        	<?php $i=0;?>
                        	<?php foreach($field as $key => $fieldRow):?>
                        	<?php if($fieldRow['f_class']=="product_info"&&$fieldRow['status']==1):?>
                        	<?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="product[]" 
							<?php if(!empty($product)){if(in_array($fieldRow['ch_name'],$product)){
								 			echo checked;
								 			}
										if($fieldRow['lm_right']==""){ 
											echo "disabled";}}?>/>
							<?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php if($i == 8) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
						</tr>
						</table>
                        	<div class="control-group">
                        	<div class="controls">
                        	<span class="help-inline">
                       		<h3>联系人信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Allcontact()"/>
							</label>
							<label class="help-inline" style="margin-top:12px;">全选</label>
							</div>
							</div>
						 	<table  class="table table-hover" style="border:none;margin-left:80px;">
                        	<tr>
                        	<?php unset($i);$i = 0;?>
                        	<?php foreach($field as $key => $fieldRow):?>
                        	<?php if($fieldRow['f_class']=="contact_info"&&$fieldRow['status']==1):?>
                        	<?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="contact[]" 
							<?php if(!empty($contact)){if(in_array($fieldRow['ch_name'],$contact)){
								 			echo checked;
								 			}
										if($fieldRow['lm_right']==""){ 
											echo "disabled";}}?>/>
							<?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php if($i == 8) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
                        	</tr>
                        	</table>
                        	
                            <div class="control-group">
	                        <div class="controls">
	                        <span class="help-inline">
	                       	<h3>出行人信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Alltravel()"/>
							</label>
							<label class="help-inline" style="margin-top:12px;">全选</label>
							</div>
							</div>
							<table  class="table table-hover" style="border:none;margin-left:80px;">
                            <tr>
                            <?php unset($i);$i = 0;?>
                        	<?php foreach($field as $key => $fieldRow):?>
                        	<?php if($fieldRow['f_class']=="travel_info"&&$fieldRow['status']==1):?>
                        	<?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="travel[]" 
							<?php if(!empty($travel)){if(in_array($fieldRow['ch_name'],$travel)){
								 			echo checked;
								 			}
										if($fieldRow['lm_right']==""){ 
											echo "disabled";}}?>/>
							<?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php if($i == 8) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
                            </tr>
                            </table>
                            <div class="control-group">
	                        <div class="controls">
	                        <span class="help-inline">
	                       	<h3>下单信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Allorder()"/>
							</label>
							<label class="help-inline" style="margin-top:8px;">全选</label>
							</div>
							</div>
                           	<table  class="table table-hover" style="border:none;margin-left:80px;">
                            <tr>
                            <?php unset($i);$i = 0;?>
                        	<?php foreach($field as $key => $fieldRow):?>
                        	<?php if($fieldRow['f_class']=="order_info"&&$fieldRow['status']==1):?>
                        	<?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="order[]" 
							<?php if(!empty($order)){if(in_array($fieldRow['ch_name'],$order)){
								 			echo checked;
								 			}
										if($fieldRow['lm_right']==""){ 
											echo "disabled";}}?>/>
							<?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php if($i == 8) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
                            </tr>
                            </table>
                       	   <div class="control-group">
	                        <div class="controls">
	                        <span class="help-inline">
	                       	<h3>酒店信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Allhotel()"/>
							</label>
							<label class="help-inline" style="margin-top:12px;">全选</label>
							</div>
							</div>
							<table  class="table table-hover" style="border:none;margin-left:80px;">
                       	    <tr>
                       	  	<?php unset($i);$i = 0;?>
                        	<?php foreach($field as $key => $fieldRow):?>
                        	<?php if($fieldRow['f_class']=="hotel_info"&&$fieldRow['status']==1):?>
                        	<?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="hotel[]" 
							<?php if(!empty($hotel)){if(in_array($fieldRow['ch_name'],$hotel)){
								 			echo checked;
								 			}
										if($fieldRow['lm_right']==""){ 
											echo "disabled";}}?>/>
							<?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php if($i == 8) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
                       	   </tr>
                       	   </table>
                        	<div class="control-group">
	                        <div class="controls">
	                        <span class="help-inline">
	                       	<h3>船票信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Allticket()"/>
							</label>
							<label class="help-inline" style="margin-top:12px;">全选</label>
							</div>
							</div>
						<table  class="table table-hover" style="border:none;margin-left:80px;">
						<tr>
							<?php unset($i);$i = 0;?>
                        	<?php foreach($field as $key => $fieldRow):?>
                        	<?php if($fieldRow['f_class']=="ticket_info"&&$fieldRow['status']==1):?>
                        	<?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="boat[]" 
							<?php if(!empty($ticket)){if(in_array($fieldRow['ch_name'],$ticket)){
								 			echo checked;}
										if($fieldRow['lm_right']!=="可编辑"){ 
											echo " disabled";}}?>/>
							<?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php if($i == 8) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
                         </tr>
                         </table>
                         <div class="form-actions">
                         <input class="btn green" type="submit" value="提交">
                         <a class="btn green"   onclick="history.back()">取消</a>
                         </div>
                        </form>	
                        <?php elseif($style=="travel"):?>
                        <form method="post" action="<?=base_url('public_template/update/'.$id.'/'.$style)?>" class="tb">
                       	<input type="hidden" name="type" value="<?=$style?>">
                       	<div class="control-group">
                        <div class="controls">
                        <span class="help-inline">
                       	<h3>商品信息:</h3>
						</span>
						<label class="help-inline">
						<input type="checkbox"  onclick="Allproduct()"/>
						</label>
						<label class="help-inline" style="margin-top:12px;">全选</label>
						</div>
						</div>
                        <table  class="table table-hover" style="border:none;margin-left:80px;">
                        <tr>
                        	<?php unset($i);$i = 0;?>
                        	<?php foreach($field as $key => $fieldRow):?>
                        	<?php if($fieldRow['f_class']=="product_info"&&$fieldRow['s_right']!==""&&$fieldRow['status']==1):?>
                        	<?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="product[]" 
							<?php if(!empty($product)){if(in_array($fieldRow['ch_name'],$product)){echo checked;}}?>/>
							<?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php if($i == 8) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
						</tr>
						</table>
                        	<div class="control-group">
                        	<div class="controls">
                        	<span class="help-inline">
                       		<h3>联系人信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Allcontact()"/>
							</label>
							<label class="help-inline" style="margin-top:12px;">全选</label>
							</div>
							</div>
						 	<table  class="table table-hover" style="border:none;margin-left:80px;">
                        	<tr>
                        	<?php unset($i);$i = 0;?>
                        	<?php foreach($field as $key => $fieldRow):?>
                        	<?php if($fieldRow['f_class']=="contact_info"&&$fieldRow['s_right']!==""&&$fieldRow['status']==1):?>
                        	<?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="contact[]" 
							<?php if(!empty($contact)){if(in_array($fieldRow['ch_name'],$contact)){echo checked;}}?>/>
							<?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php if($i == 8) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
                        	</tr>
                        	</table>
                            <div class="control-group">
	                        <div class="controls">
	                        <span class="help-inline">
	                       	<h3>出行人信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Alltravel()"/>
							</label>
							<label class="help-inline" style="margin-top:12px;">全选</label>
							</div>
							</div>
							<table  class="table table-hover" style="border:none;margin-left:80px;">
                            <tr>
                            <?php unset($i);$i = 0;?>
                            <?php foreach($field as $key => $fieldRow):?>
                            <?php if($fieldRow['f_class']=="travel_info"&&$fieldRow['s_right']!==""&&$fieldRow['status']==1):?>
                        	<?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="travel[]" 
							<?php if(!empty($travel)){if(in_array($fieldRow['ch_name'],$travel)){echo checked;}}?>/>
							<?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php if($i == 8) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
                            </tr>
                            </table>
                            <div class="control-group">
	                        <div class="controls">
	                        <span class="help-inline">
	                       	<h3>下单信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Allorder()"/>
							</label>
							<label class="help-inline" style="margin-top:8px;">全选</label>
							</div>
							</div>
                           	<table  class="table table-hover" style="border:none;margin-left:80px;">
                            <tr>
                            <?php unset($i);$i = 0;?>
                            <?php foreach($field as $key => $fieldRow):?>
                            <?php if($fieldRow['f_class']=="order_info"&&$fieldRow['s_right']!==""&&$fieldRow['status']==1):?>
                        	<?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="order[]" 
							<?php if(!empty($order)){if(in_array($fieldRow['ch_name'],$order)){echo checked;}}?>/>
							<?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php if($i == 8) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
                            </tr>
                            </table>
                       	   <div class="control-group">
	                        <div class="controls">
	                        <span class="help-inline">
	                       	<h3>酒店信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Allhotel()"/>
							</label>
							<label class="help-inline" style="margin-top:12px;">全选</label>
							</div>
							</div>
							<table  class="table table-hover" style="border:none;margin-left:80px;">
                       	   	<tr>
                       	  	<?php unset($i);$i = 0;?>
                            <?php foreach($field as $key => $fieldRow):?>
                            <?php if($fieldRow['f_class']=="hotel_info"&&$fieldRow['s_right']!==""&&$fieldRow['status']==1):?>
                        	<?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="hotel[]" 
							<?php if(!empty($hotel)){if(in_array($fieldRow['ch_name'],$hotel)){echo checked;}}?>/>
							<?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php if($i == 8) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
                       	   </tr>
                       	   </table>
                        	<div class="control-group">
	                        <div class="controls">
	                        <span class="help-inline">
	                       	<h3>船票信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Allticket()"/>
							</label>
							<label class="help-inline" style="margin-top:12px;">全选</label>
							</div>
							</div>
						<table  class="table table-hover" style="border:none;margin-left:80px;">
						<tr>
							<?php unset($i);$i = 0;?>
                            <?php foreach($field as $key => $fieldRow):?>
                            <?php if($fieldRow['f_class']=="ticket_info"&&$fieldRow['s_right']!==""&&$fieldRow['status']==1):?>
                        	<?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="boat[]" 
							<?php if(!empty($ticket)){if(in_array($fieldRow['ch_name'],$ticket)){echo checked;}}?>/>
							<?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php if($i == 8) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
                         </tr>
                         </table>
                         <div class="form-actions">
                         <input class="btn green" type="submit" value="提交">
                         <a class="btn green"   onclick="history.back()">取消</a>
                         </div>
                        </form>
                        <?php elseif($style=="export"||$style=="user"||$style=="confirm"):?>
                        <form method="post" action="<?=base_url('public_template/update/'.$id.'/'.$style)?>" class="tb">
                       	<input type="hidden" name="type" value="<?=$style?>">
                       	<div class="control-group">
                        <div class="controls">
                        <span class="help-inline">
                       	<h3>商品信息:</h3>
						</span>
						<label class="help-inline">
						<input type="checkbox"  onclick="Allproduct()"/>
						</label>
						<label class="help-inline" style="margin-top:12px;">全选</label>
						</div>
						</div>
                        <table  class="table table-hover" style="border:none;margin-left:80px;">
                        <tr>
                        	<?php foreach($product_info as $key => $productRow):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$productRow['ch_name']?>'" name="product[]" 
							<?php if(!empty($product)){if(in_array($productRow['ch_name'],$product)){echo checked;}}?>/>
							<?=$productRow['ch_name']?>
							</label>
							</td>
							<?php if($key == 7) echo '</tr><tr>';?>
							<?php endforeach;?>
						</tr>
						</table>
                        	<div class="control-group">
                        	<div class="controls">
                        	<span class="help-inline">
                       		<h3>联系人信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Allcontact()"/>
							</label>
							<label class="help-inline" style="margin-top:12px;">全选</label>
							</div>
							</div>
						 	<table  class="table table-hover" style="border:none;margin-left:80px;">
                        	<tr>
                        	<?php foreach($contact_info as $key => $contactRow):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$contactRow['ch_name']?>'" name="contact[]" 
							<?php if(!empty($contact)){if(in_array($contactRow['ch_name'],$contact)){echo checked;}}?>/>
							<?=$contactRow['ch_name']?>
							</label>
							</td>
							<?php if($key == 7) echo '</tr><tr>';?>
							<?php endforeach;?>
                        	</tr>
                        	</table>
                        	
                            <div class="control-group">
	                        <div class="controls">
	                        <span class="help-inline">
	                       	<h3>出行人信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Alltravel()"/>
							</label>
							<label class="help-inline" style="margin-top:12px;">全选</label>
							</div>
							</div>
							<table  class="table table-hover" style="border:none;margin-left:80px;">
                            <tr>
                            <?php foreach($travel_info as $key => $travelRow):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$travelRow['ch_name']?>'" name="travel[]" 
							<?php if(!empty($travel)){if(in_array($travelRow['ch_name'],$travel)){echo checked;}}?>/>
							<?=$travelRow['ch_name']?>
							</label>
							</td>
							<?php if($key == 7) echo '</tr><tr>';?>
							<?php endforeach;?>
                            </tr>
                            </table>
                            <div class="control-group">
	                        <div class="controls">
	                        <span class="help-inline">
	                       	<h3>下单信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Allorder()"/>
							</label>
							<label class="help-inline" style="margin-top:8px;">全选</label>
							</div>
							</div>
                           	<table  class="table table-hover" style="border:none;margin-left:80px;">
                            <tr>
                            <?php foreach($order_info as $key => $orderRow):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$orderRow['ch_name']?>'" name="order[]" 
							<?php if(!empty($order)){if(in_array($orderRow['ch_name'],$order)){echo checked;}}?>/>
							<?=$orderRow['ch_name']?>
							</label>
							</td>
							<?php if($key == 7) echo '</tr><tr>';?>
							<?php endforeach;?>
                            </tr>
                            </table>
                       	   <div class="control-group">
	                        <div class="controls">
	                        <span class="help-inline">
	                       	<h3>酒店信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Allhotel()"/>
							</label>
							<label class="help-inline" style="margin-top:12px;">全选</label>
							</div>
							</div>
							<table  class="table table-hover" style="border:none;margin-left:80px;">
                       	   <tr>
                       	  	<?php foreach($hotel_info as $key => $hotelRow):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$hotelRow['ch_name']?>'" name="hotel[]" 
							<?php if(!empty($hotel)){if(in_array($hotelRow['ch_name'],$hotel)){echo checked;}}?>/>
							<?=$hotelRow['ch_name']?>
							</label>
							</td>
							<?php if($key == 7) echo '</tr><tr>';?>
							<?php endforeach;?>
                       	   </tr>
                       	   </table>
                        	<div class="control-group">
	                        <div class="controls">
	                        <span class="help-inline">
	                       	<h3>船票信息:</h3>
							</span>
							<label class="help-inline">
							<input type="checkbox"  onclick="Allticket()"/>
							</label>
							<label class="help-inline" style="margin-top:12px;">全选</label>
							</div>
							</div>
						<table  class="table table-hover" style="border:none;margin-left:80px;">
						<tr>
						
							<?php foreach($ticket_info as $key => $ticketRow):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$ticketRow['ch_name']?>'" name="boat[]" 
							<?php if(!empty($ticket)){if(in_array($ticketRow['ch_name'],$ticket)){echo checked;}}?>/>
							<?=$ticketRow['ch_name']?>
							</label>
							</td>
							<?php if($key == 7) echo '</tr><tr>';?>
							<?php endforeach;?>
                         </tr>
                         </table>
                         <div class="form-actions">
                         <input class="btn green" type="submit" value="提交">
                         <a class="btn green"   onclick="history.back()">取消</a>
                         </div>
                        </form>
                         
                        <?php endif;?>
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

function Allproduct(){
     var product = document.getElementsByName("product[]");
     for(var i=0;i < product.length;i++){
                   if(product[i].type=="checkbox"){
                       if(product[i].disabled==false){
					product[i].checked = event.srcElement.checked ;
                   }
                   }
         }
}


function Alltravel(){
    var product = document.getElementsByName("travel[]");
    for(var i=0;i < product.length;i++){
                  if(product[i].type=="checkbox"){
                	  if(product[i].disabled==false){
					product[i].checked = event.srcElement.checked ;
                  }
                  }
        }
}


function Allorder(){
    var product = document.getElementsByName("order[]");
    for(var i=0;i < product.length;i++){
                  if(product[i].type=="checkbox"){
                	  if(product[i].disabled==false){
					product[i].checked = event.srcElement.checked ;
                  }
                  }
        }
}


function Allhotel(){
    var product = document.getElementsByName("hotel[]");
    for(var i=0;i < product.length;i++){
                  if(product[i].type=="checkbox"){
                	  if(product[i].disabled==false){
					product[i].checked = event.srcElement.checked ;
                  }
                  }
        }
}


function Allcontact(){
    var product = document.getElementsByName("contact[]");
    for(var i=0;i < product.length;i++){
                  if(product[i].type=="checkbox"){
                	  if(product[i].disabled==false){
					product[i].checked = event.srcElement.checked ;
                  }}
        }
}

function Allticket(){
    var product = document.getElementsByName("boat[]");
    for(var i=0;i < product.length;i++){
                  if(product[i].type=="checkbox"){
                	  if(product[i].disabled==false){
					product[i].checked = event.srcElement.checked ;
                  }}
        }
}
function inverse(){
	var inputs = document.getElementsByName("product[]");
	var checkboxLength = 0; // 所有复选框的数量
	var selectedCount = 0; // 所有被选中的复选框数量
	var checkType = false;
	    for(var i = 0; i < inputs.length; i++) {
	         if(inputs[i].type == "checkbox") {
	             inputs[i].checked = !inputs[i].checked;
	             checkType = inputs[i].checked;
	             checkboxLength++;
	             if(checkType) { selectedCount++; }
	         }
	    }
	     if((checkboxLength == selectedCount) || (!selectedCount)) {
	         setCheckType(checkType);
	     }
}
$(function(){
    $("#list li").click(function(){
               $(this).addClass("active");
        	   //var href = $(this).attr("href");
               
               //alert( $(".tab-pane").attr("id"));
         
		   //$("$tab_1_1").attr("id","tab_1_i");
                

        });

	
});

</script>