<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>
<style 	type="text/css"> 
.table td {border:1px solid white;width:300px;} 


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
              
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <div class="span12">
            	<div class="tabbable tabbable-custom">
                     <ul class="nav nav-tabs" id="list">
                        <?php foreach($category as $key=>$cateRow):?> 
                        <?php if($cateRow['status']==1):?>
                        <li class="<?php if($category_id==$cateRow['id']) echo "active";?>">
                        <a id="travel"  href="<?=base_url('public_template/show/'.$cateRow['id']).'/'.$type.'/'.'#a'?>"><?=$cateRow['name']?></a>
                        </li>
                        <?php endif;?>
                        <?php endforeach;?> 
                      </ul>
                        <div class="tab-content" >
                        <div class="tab-pane  active" id="a">
                        <?php if($status==3):?>
                        <div class="portlet-body form">
                        <form class="form-horizontal" id="template_content_form" method="post" action="<?=base_url('public_template/update/'.$id.'/'.$type)?>" novalidate="novalidate">
                       	<div class="control-group">
                       	<input type="hidden" value="<?=$category_id?>" name="category_id">
                       	<input type="hidden" value="<?=$type?>" name="type">
                       	<h3>下单信息</h3>
                       	<div class="controls">
                        <ul class="unstyled inline sidebar-tags" id="sort">
                       	<?php foreach($exist_field as $key => $orderRow):?>
                       	<?php if($orderRow['f_class'] == "order_info"):?>
                       	<li style="margin-top:5px">
                       	<input type="hidden" class="id" name="order_id[]" value="<?=$orderRow['id']?>"/>
                        <input type="hidden" class="f_class" value="<?=$orderRow['f_class']?>"/>
                        <input type="hidden" name="order_info1[]" class="ch_name" value="<?=$orderRow['ch_name']?>"/>
                        <input type="hidden" class="en_name" value="<?=$orderRow['en_name']?>"/>
                       	<a href="javascript:void(0)" onclick="return false;" onmouseover="$(this).find('i').show();" onmouseout="$(this).find('i').hide();">
                       	<?=$orderRow['ch_name']?>
                       	<i style="display:none" class="icon-remove" onclick="delete_field(this)"></i>
                       	</a>
                       	</li>
                       	<?php endif;?>
                       	<?php endforeach;?>
                       	<li style="margin-top:5px" onclick="$('#template_dialog').modal('show');" class='order_info'>
                        <a href="javascript:void(0)">
                        <i class="icon-add">+</i>
                        </a>
                        </li>
                       
                       	</ul>
                       	</div>
                       	</div>
                       	<div class="control-group">
                       	<h3>酒店信息</h3>
                       	<div class="controls">
                        <ul class="unstyled inline sidebar-tags" id="sort1">
                       	<?php foreach($exist_field as $key => $hotelRow):?>
                       	<?php if($hotelRow['f_class'] == "hotel_info"):?>
                       	<li style="margin-top:5px">
                       	<input type="hidden" class="id" name="hotel_id[]" value="<?=$hotelRow['id']?>"/>
                        <input type="hidden" class="f_class" value="<?=$hotelRow['f_class']?>"/>
                        <input type="hidden" class="ch_name" name="hotel_info1[]" value="<?=$hotelRow['ch_name']?>"/>
                        <input type="hidden" class="en_name" value="<?=$hotelRow['en_name']?>"/>
                       	<a  onclick="return false;" onclick="return false;" onmouseover="$(this).find('i').show();" onmouseout="$(this).find('i').hide();">
                       	<?=$hotelRow['ch_name']?>
                       	<i style="display:none" class="icon-remove" onclick="delete_field(this)"></i>
                       	</a>
                       	</li>
                       	<?php endif;?>
                       	<?php endforeach;?>
                       	<li style="margin-top:5px" onclick="$('#template_dialog').modal('show');" class='hotel_info'>
                        <a href="javascript:void(0)">
                        <i class="icon-add">+</i>
                        </a>
                        </li>
                       	</ul>
                       	</div>
                       	</div>
                       	<div class="control-group">
                       	<h3>联系人信息</h3>
                       	<div class="controls">
                        <ul class="unstyled inline sidebar-tags" id="sort2">
                       	<?php foreach($exist_field as $key => $contactRow):?>
                       	<?php if($contactRow['f_class'] == "contact_info"):?>
                       	<li style="margin-top:5px">
                       	<input type="hidden" class="id" name="contact_id[]" value="<?=$contactRow['id']?>"/>
                        <input type="hidden" class="f_class" value="<?=$contactRow['f_class']?>"/>
                        <input type="hidden" name="contact_info1[]" class="ch_name" value="<?=$contactRow['ch_name']?>"/>
                        <input type="hidden" class="en_name" value="<?=$contactRow['en_name']?>"/>
                       	<a href="javascript:void(0)" onclick="return false;" onmouseover="$(this).find('i').show();" onmouseout="$(this).find('i').hide();">
                       	<?=$contactRow['ch_name']?>
                       	<i style="display:none" class="icon-remove" onclick="delete_field(this)"></i>
                       	</a>
                       	</li>
                       	<?php endif;?>
                       	<?php endforeach;?>
                       	<li style="margin-top:5px" onclick="$('#template_dialog').modal('show');" class='contact_info'>
                        <a href="javascript:void(0)">
                        <i class="icon-add">+</i>
                        </a>
                        </li>
                       	</ul>
                       	</div>
                       	</div>
                       	<div class="control-group">
                       	<h3>出行人信息</h3>
                       	<div class="controls">
                        <ul class="unstyled inline sidebar-tags" id="sort3">
                       	<?php foreach($exist_field as $key => $travelRow):?>
                       	<?php if($travelRow['f_class'] == "travel_info"):?>
                       	<li style="margin-top:5px">
                       	<input type="hidden" class="id" name="travel_id[]" value="<?=$travelRow['id']?>"/>
                        <input type="hidden" class="f_class" value="<?=$travelRow['f_class']?>"/>
                        <input type="hidden" name="travel_info1[]" class="ch_name" value="<?=$travelRow['ch_name']?>"/>
                        <input type="hidden" class="en_name" value="<?=$travelRow['en_name']?>"/>
                       	<a href="javascript:void(0)"  onclick="return false;" onmouseover="$(this).find('i').show();" onmouseout="$(this).find('i').hide();">
                       	<?=$travelRow['ch_name']?>
                       	<i style="display:none" class="icon-remove" onclick="delete_field(this)"></i>
                       	</a>
                       	</li>
                       	<?php endif;?>
                       	<?php endforeach;?>
                       	<li style="margin-top:5px" onclick="$('#template_dialog').modal('show');" class='travel_info'>
                        <a href="javascript:void(0)">
                        <i class="icon-add">+</i>
                        </a>
                        </li>
                       	</ul>
                       	</div>
                       	</div>
                       	<div class="control-group">
                       	<h3>司机信息</h3>
                       	<div class="controls">
                        <ul class="unstyled inline sidebar-tags" id="sort4">
                       	<?php foreach($exist_field as $key => $driverRow):?>
                       	<?php if($driverRow['f_class'] == "driver_info"):?>
                       	<li style="margin-top:5px">
                       	<input type="hidden" class="id" name="driver_id[]" value="<?=$driverRow['id']?>"/>
                        <input type="hidden" class="f_class" value="<?=$driverRow['f_class']?>"/>
                        <input type="hidden" name="driver_info1[]" class="ch_name" value="<?=$driverRow['ch_name']?>"/>
                        <input type="hidden" class="en_name" value="<?=$driverRow['en_name']?>"/>
                       	<a href="javascript:void(0)" onclick="return false;" onmouseover="$(this).find('i').show();" onmouseout="$(this).find('i').hide();">
                       	<?=$driverRow['ch_name']?>
                       	<i style="display:none" class="icon-remove" onclick="delete_field(this)"></i>
                       	</a>
                       	</li>
                       	<?php endif;?>
                       	<?php endforeach;?>
                       	<li style="margin-top:5px" onclick="$('#template_dialog').modal('show');" class='driver_info'>
                        <a href="javascript:void(0)">
                        <i class="icon-add">+</i>
                        </a>
                        </li>
                       	</ul>
                       	</div>
                       	</div>
                       	<div class="control-group">
                       	<h3>乘客信息</h3>
                       	<div class="controls">
                        <ul class="unstyled inline sidebar-tags" id="sort5">
                       	<?php foreach($exist_field as $key => $passengerRow):?>
                       	<?php if($passengerRow['f_class'] == "passenger_info"):?>
                       	<li style="margin-top:5px">
                       	<input type="hidden" class="id" name="passenger_id[]" value="<?=$passengerRow['id']?>"/>
                        <input type="hidden" class="f_class" value="<?=$passengerRow['f_class']?>"/>
                        <input type="hidden" class="ch_name" name="passenger_info1[]" value="<?=$passengerRow['ch_name']?>"/>
                        <input type="hidden" class="en_name" value="<?=$passengerRow['en_name']?>"/>
                       	<a href="javascript:void(0)" onclick="return false;" onmouseover="$(this).find('i').show();" onmouseout="$(this).find('i').hide();">
                       	<?=$passengerRow['ch_name']?>
                       	<i style="display:none" class="icon-remove" onclick="delete_field(this)"></i>
                       	</a>
                       	</li>
                       	<?php endif;?>
                       	<?php endforeach;?>
                       	<li style="margin-top:5px" onclick="$('#template_dialog').modal('show');" class='passenger_info'>
                        <a href="javascript:void(0)">
                        <i class="icon-add">+</i>
                        </a>
                        </li>
                       	</ul>
                       	</div>
                       	</div>
                       	<div class="form-actions">
                       	<div class="form-actions">
                        <input class="btn green" type="submit" value="提交">
                        </div>
                       	</div>
                       	</form>
                       	</div>
                       	<?php elseif($status==2):?>
                       	<div class="portlet-body form">
                        <form class="form-horizontal" id="template_content_form" method="post" action="<?=base_url('public_template/save')?>" novalidate="novalidate">
                       	<input type="hidden" value="<?=$category_id?>" name="category_id">
                       	<input type="hidden" value="<?=$type?>"  name="type">
                       	<div class="control-group">
                       	<h3>下单信息</h3>
                       	<div class="controls">
                        <ul class="unstyled inline sidebar-tags">
                       	<li style="margin-top:5px">
                       	</li>
                       	<li style="margin-top:5px" onclick="$('#template_dialog').modal('show');" class='order_info'>
                        <a href="javascript:void(0)">
                        <i class="icon-add">+</i>
                        </a>
                        </li>
                       	</ul>
                       	</div>
                       	</div>
                       	<div class="control-group">
                       	<h3>酒店信息</h3>
                       	<div class="controls">
                        <ul class="unstyled inline sidebar-tags">
                       	<li style="margin-top:5px">
                       	</li>
                       	<li style="margin-top:5px" onclick="$('#template_dialog').modal('show');" class='hotel_info'>
                        <a href="javascript:void(0)">
                        <i class="icon-add">+</i>
                        </a>
                        </li>
                       	</ul>
                       	</div>
                       	</div>
                       	<div class="control-group">
                       	<h3>联系人信息</h3>
                       	<div class="controls">
                        <ul class="unstyled inline sidebar-tags">
                       	<li style="margin-top:5px">
                       	</li>
                       	<li style="margin-top:5px" onclick="$('#template_dialog').modal('show');" class='contact_info'>
                        <a href="javascript:void(0)">
                        <i class="icon-add">+</i>
                        </a>
                        </li>
                       	</ul>
                       	</div>
                       	</div>
                       	<div class="control-group">
                       	<h3>出行人信息</h3>
                       	<div class="controls">
                        <ul class="unstyled inline sidebar-tags">
                       	<li style="margin-top:5px">
                       	</li>
                       	<li style="margin-top:5px" onclick="$('#template_dialog').modal('show');" class='travel_info'>
                        <a href="javascript:void(0)">
                        <i class="icon-add">+</i>
                        </a>
                        </li>
                       	</ul>
                       	</div>
                       	</div>
                       	<div class="control-group">
                       	<h3>司机信息</h3>
                       	<div class="controls">
                        <ul class="unstyled inline sidebar-tags">
                       	<li style="margin-top:5px">
                       	</li>
                       	<li style="margin-top:5px" onclick="$('#template_dialog').modal('show');" class='driver_info'>
                        <a href="javascript:void(0)">
                        <i class="icon-add">+</i>
                        </a>
                        </li>
                       	</ul>
                       	</div>
                       	</div>
                       	<div class="control-group">
                       	<h3>乘客信息</h3>
                       	<div class="controls">
                        <ul class="unstyled inline sidebar-tags">
                       	<li style="margin-top:5px">
                       	</li>
                       	<li style="margin-top:5px" onclick="$('#template_dialog').modal('show');" class='passenger_info'>
                        <a href="javascript:void(0)">
                        <i class="icon-add">+</i>
                        </a>
                        </li>
                       	</ul>
                       	</div>
                       	</div>
                       	<div class="form-actions">
                       	<div class="form-actions">
                        <input class="btn green" type="submit" value="提交">
                        </div>
                       	</div>
                       	</form>
                       	</div>
                       	<?php elseif($status=="1"):?>
                       	懒猫订单详情模板尚未填写
                       	<?php endif;?>
                        </div>
                    </div>
                  </div>
               </div>
    		</div>
    	</div>
 </div>
 <div class="modal fade" id="template_dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            </button>
            <h4 class="modal-title" id="myModalLabel">
               温馨提示
            </h4>
         </div>
         <div class="modal-body">
              <form class="form-horizontal" id="form_sample_2" action="#" novalidate="novalidate">
                        <div class="control-group">
                           <label class="control-label">下单信息<span class="required" style="color:red;">*</span></label>
                              <div class="controls">
                                 <ul class="unstyled inline sidebar-tags selectorder_info" id="order">
                                 <?php if(!empty($order_list)):?>
                                 <?php foreach ($order_list as $v):?>
                                 <?php if($v['f_class']=="order_info"&&$v['status']==1&&$v['s_right']!=="不可见/不可编辑"):?>
                                        <li onclick="selecte_field(this)" style="margin-top:5px">
                                            <input type="hidden"  class="id" name="order_id[]" value="<?=$v['id']?>"/>
                                            <input type="hidden"  class="f_class" value="<?=$v['f_class']?>"/>
                                            <input type="hidden"  name="order_info[]" class="ch_name" value="<?=$v['ch_name']?>"/>
                                            <input type="hidden"  class="en_name" value="<?=$v['en_name']?>"/>
                                            <a href="javascript:void(0)">
                                               <?=$v['ch_name']?>
                                            <i style="display:none" class="icon-ok" ></i>
                                            </a>
                                        </li>
                                  <?php endif;?>
                                  <?php endforeach;?>
                                  <?php endif;?>
                                </ul>
                            </div>
                       </div>
                        <div class="control-group">
                           <label class="control-label">酒店信息<span class="required" style="color:red;">*</span></label>
                              <div class="controls">
                                 <ul class="unstyled inline sidebar-tags selecthotel_info" id="hotel">
                                 <?php if(!empty($order_list)):?>
                                 <?php foreach ($order_list as $v):?>
                                 <?php if($v['f_class']=="hotel_info"&&$v['status']==1&&$v['s_right']!=="不可见/不可编辑"):?>
                                        <li onclick="selecte_field(this)" style="margin-top:5px" >
                                            <input type="hidden"  class="id" name="hotel_id[]" value="<?=$v['id']?>"/>
                                            <input type="hidden"  class="f_class" value="<?=$v['f_class']?>"/>
                                            <input type="hidden" name="hotel_info[]" class="ch_name" value="<?=$v['ch_name']?>"/>
                                            <input type="hidden"  class="en_name" value="<?=$v['en_name']?>"/>
                                            <a href="javascript:void(0)">
                                               <?=$v['ch_name']?>
                                            <i style="display:none" class="icon-ok" ></i>
                                            </a>
                                       </li>
                                  <?php endif;?>
                                  <?php endforeach;?>
                                  <?php endif;?>
                                </ul>
                            </div>
                       </div>
                        <div class="control-group">
                           <label class="control-label">联系人信息<span class="required" style="color:red;">*</span></label>
                              <div class="controls">
                                 <ul class="unstyled inline sidebar-tags selectcontact_info" id="contact">
                                 <?php if(!empty($order_list)):?>
                                 <?php foreach ($order_list as $v):?>
                                  <?php if($v['f_class']=="contact_info"&&$v['status']==1&&$v['s_right']!=="不可见/不可编辑"):?>
                                        <li onclick="selecte_field(this)" style="margin-top:5px">
                                            <input type="hidden"  class="id" name="contact_id[]" value="<?=$v['id']?>"/>
                                            <input type="hidden"  class="f_class" value="<?=$v['f_class']?>"/>
                                            <input type="hidden" name="contact_info[]" class="ch_name" value="<?=$v['ch_name']?>"/>
                                            <input type="hidden"  class="en_name" value="<?=$v['en_name']?>"/>
                                            <a href="javascript:void(0)">
                                                <?=$v['ch_name']?>
                                            <i style="display:none" class="icon-ok" ></i>
                                            </a>
                                       </li>
                                  <?php endif;?>
                                  <?php endforeach;?>
                                  <?php endif;?>
                                </ul>
                            </div>
                       </div>
                        <div class="control-group">
                           <label class="control-label">出行人信息<span class="required" style="color:red;">*</span></label>
                              <div class="controls">
                                 <ul class="unstyled inline sidebar-tags selecttravel_info" id="travel">
                                 <?php if(!empty($order_list)):?>
                                 <?php foreach ($order_list as $v):?>
                                  <?php if($v['f_class']=="travel_info"&&$v['status']==1&&$v['s_right']!=="不可见/不可编辑"):?>
                                        <li onclick="selecte_field(this)" style="margin-top:5px">
                                            <input type="hidden"  class="id" name="travel_id[]" value="<?=$v['id']?>"/>
                                            <input type="hidden"  class="f_class" value="<?=$v['f_class']?>"/>
                                            <input type="hidden" name="travel_info[]" class="ch_name" value="<?=$v['ch_name']?>"/>
                                            <input type="hidden"  class="en_name" value="<?=$v['en_name']?>"/>
                                            <a href="javascript:void(0)">
                                                <?=$v['ch_name']?>
                                            <i style="display:none" class="icon-ok" ></i>
                                            </a>
                                       </li>
                                  <?php endif;?>
                                  <?php endforeach;?>
                                  <?php endif;?>
                                </ul>
                            </div>
                       </div>
                        <div class="control-group">
                           <label class="control-label">司机信息<span class="required" style="color:red;">*</span></label>
                              <div class="controls">
                                 <ul class="unstyled inline sidebar-tags selectdriver_info" id="driver">
                                <?php if(!empty($order_list)):?>
                                <?php foreach ($order_list as $v):?>
                                <?php if($v['f_class']=="driver_info"&&$v['status']==1&&$v['s_right']!=="不可见/不可编辑"):?>
                                        <li onclick="selecte_field(this)" style="margin-top:5px">
                                            <input type="hidden"  class="id" name="driver_id[]" value="<?=$v['id']?>"/>
                                            <input type="hidden"  class="f_class" value="<?=$v['f_class']?>"/>
                                            <input type="hidden" name="driver_info[]" class="ch_name" value="<?=$v['ch_name']?>"/>
                                            <input type="hidden"  class="en_name" value="<?=$v['en_name']?>"/>
                                            <a href="javascript:void(0)">
                                                <?=$v['ch_name']?>
                                            <i style="display:none" class="icon-ok" ></i>
                                            </a>
                                       </li>
                                  <?php endif;?>
                                  <?php endforeach;?>
                                  <?php endif;?>
                                </ul>
                            </div>
                       </div>
                        <div class="control-group">
                           <label class="control-label">乘客信息<span class="required" style="color:red;">*</span></label>
                              <div class="controls">
                                 <ul class="unstyled inline sidebar-tags selectpassenger_info" id="passenger">
                                <?php if(!empty($order_list)):?>
                                <?php foreach ($order_list as $v):?>
                                <?php if($v['f_class']=="passenger_info"&&$v['status']==1&&$v['s_right']!=="不可见/不可编辑"):?>
                                        <li onclick="selecte_field(this)" style="margin-top:5px">
                                            <input type="hidden"  class="id" name="passenger_id[]" value="<?=$v['id']?>"/>
                                            <input type="hidden"  class="f_class" value="<?=$v['f_class']?>"/>
                                            <input type="hidden" name="passenger_info[]" class="ch_name" value="<?=$v['ch_name']?>"/>
                                            <input type="hidden"  class="en_name" value="<?=$v['en_name']?>"/>
                                            <a href="javascript:void(0)">
                                                <?=$v['ch_name']?>
                                            <i style="display:none" class="icon-ok" ></i>
                                            </a>
                                       </li>
                                  <?php endif;?>
                                  <?php endforeach;?>
                                  <?php endif;?>
                                </ul>
                            </div>
                       </div>
                      
                </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="save_selected_field()">保存</button>
            <button type="button" class="btn btn-default"  data-dismiss="modal">关闭</button>
         </div>
      </div><!-- /.modal-content -->
    </div>
</div>
     
<?php $this->load->view('block/footer.php')?>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/jquery.form.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/Sortable.js"></script>


<script type="text/javascript">
        function delete_field(object){
            var li = $(object).parent().parent();
            $('.select'+li.find('.f_class').val()).append(
                    '<li onclick="selecte_field(this)" style="margin-top:5px">'+
                    '<input type="hidden" class="id" name="'+li.find('.id').attr("name")+'" value="'+li.find('.id').val()+'"/>'+
                    '<input type="hidden" class="f_class" value="'+li.find('.f_class').val()+'"/>'+
                    '<input type="hidden" class="ch_name" value="'+li.find('.ch_name').val()+'"/>'+
                    '<input type="hidden" class="en_name" value="'+li.find('.en_name').val()+'"/>'+
                    '<a href="javascript:void(0)" >'+li.find('.ch_name').val()+
                    '<i style="display:none" class="icon-ok"></i>'+
                    '</a></li>'
            );
            li.remove();
        }
        
        function selecte_field(object){
            if($(object).hasClass('selected_field')){
                $(object).find('i').hide();
                $(object).removeClass('selected_field');
            }else{
                $(object).find('i').show();
                $(object).addClass('selected_field');
            }
        }

        function save_selected_field(){
            $('.selected_field').each(function(){
            	var a = $(this).find('.ch_name').val();
            	var name = $(this).find('.id').attr("name");
                $('.'+$(this).find('.f_class').val()).before(
                    '<li style="margin-top:5px">'+
                    '<input type="hidden" class="id" name="'+name+'" value="'+$(this).find('.id').val()+'"/>'+
                    '<input type="hidden" class="f_class" value="'+$(this).find('.f_class').val()+'"/>'+
                    '<input type="hidden" class="ch_name" name="'+$(this).find('.f_class').val()+1+'[]'+'" value="'+a+'"/>'+
                    '<input type="hidden" class="en_name" value="'+$(this).find('.en_name').val()+'"/>'+
                    '<a href="javascript:void(0)" onmouseover="$(this).find(\'i\').show();" onmouseout="$(this).find(\'i\').hide();">'+$(this).find('.ch_name').val()+
                    '<i style="display:none" class="icon-remove" onclick="delete_field(this)"></i>'+
                    '</a></li>'
                    
                );
                $(this).remove();
            });
            $('#template_dialog').modal('hide');
        }

        $("#template_content_form").ajaxForm({
			beforeSubmit : function(){
				
			},
			success : function(info){
				if(info.code == 1){
					alert(info.msg);
				}else if(info.code == 2){
					alert(info.msg);
				}else if(info.code == 3){
					alert(info.msg);
				}else if(info.code == 4){
					alert(info.msg);
				}
				return;
			}
		});


        var list  =  document.getElementById("sort");
        var list1 =  document.getElementById("sort1");
        var list2 =  document.getElementById("sort2");
        var list3 =  document.getElementById("sort3");
        var list4 =  document.getElementById("sort4");
        var list5 =  document.getElementById("sort5");
       
        new Sortable(list);
        new Sortable(list1);
        new Sortable(list2);
        new Sortable(list3);
        new Sortable(list4);
        new Sortable(list5);
 </script> 