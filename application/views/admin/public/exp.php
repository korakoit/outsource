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
            	<div class="tabbable tabbable-custom">
                     <ul class="nav nav-tabs" id="list">
                        <?php foreach($category as $key=>$cateRow):?> 
                        <li class="<?php if($category_id==$cateRow['id']) echo "active";?>">
                        <a id="travel"  href="<?=base_url('public_template/show/'.$cateRow['id']).'/'.'travel'.'/'.'#a'?>"><?=$cateRow['name']?></a>
                        </li>
                        <?php endforeach;?> 
                      </ul>
                        <div class="tab-content" >
                        <div class="tab-pane  active" id="a">
                        <?php if($status==3):?>
                       	<h3>商品信息</h3>
                       	<table>
                       	<tr>
                       	<?php foreach($product_info as $key => $productRow):?>
                       	<td><span style="font-size:medium;"><?=$key+1?><?=$productRow['ch_name']?></span></td>
                       	<?php endforeach;?>
                       	</tr>
                       	</table>
                       	<h3>联系人信息</h3>
                       	<table>
                       	<tr>
                       	<?php foreach($contact_info as $key => $contactRow):?>
                       	<td><span style="font-size:medium;"><?=$key+1?><?=$contactRow['ch_name']?></span></td>
                       	<?php endforeach;?>
                       	</tr>
                       	</table>
                       	<h3>出行人信息</h3>
                       	<table>
                       	<tr>
                       	<?php foreach($travel_info as $key => $travelRow):?>
                       	<td><span style="font-size:medium;"><?=$key+1?><?=$travelRow['ch_name']?></span></td>
                       	<?php endforeach;?>
                       	</tr>
                       	</table>
                       	<h3>下单信息</h3>
                       	<table>
                       	<tr>
                       	<?php foreach($order_info as $key => $orderRow):?>
                       	<td><span style="font-size:medium;"><?=$key+1?><?=$orderRow['ch_name']?></span></td>
                       	<?php endforeach;?>
                       	</tr>
                       	</table>
                       	<h3>酒店信息</h3>
                       	<table>
                       	<tr>
                       	<?php foreach($hotel_info as $key => $hotelRow):?>
                        <td><span style="font-size:medium;"><?=$key+1?><?=$hotelRow['ch_name']?></span></td>
                       	<?php endforeach;?>
                       	</tr>
                       	</table>
                       	<h3>船票信息</h3>
                       	<table>
                       	<tr>
                       	<?php foreach($ticket_info as $key => $ticketRow):?>
                        <td><span style="font-size:medium;"><?=$key+1?><?=$ticketRow['ch_name']?></span></td>
                       	<?php endforeach;?>
                       	</tr>
                       	</table>
                       	<div class="form-actions">
                       	<a href="<?=base_url('public_template/edit/'.$id)?>" class="btn green">修改</a>
                       	</div>
                        <?php elseif($status==2):?>
                       	<form method="post" action="<?=base_url('public_template/save')?>" class="tb">
                       	<input type="hidden" name="typea" value="travel">
                       	<input type="hidden" name="category" value="<?=$this->uri->segment(3)?>">
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
                        	<?php if($fieldRow['f_class']=="product_info" && $fieldRow['s_right']!=="" &&$fieldRow['status']==1):?>
                        	<?php  $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="product[]" ><?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php if($i==8) echo '</tr><tr>';?>
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
                        	<?php if($fieldRow['f_class']=="contact_info"&&$fieldRow['s_right']!=="" &&$fieldRow['status']==1 ):?>
                        	<?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="contact[]" ><?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php endif;?>
							<?php if($i == 8) echo '</tr><tr>';?>
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
                            <?php if($fieldRow['f_class']=="travel_info"&&$fieldRow['s_right']!=="" &&$fieldRow['status']==1):?>
                            <?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="travel[]"><?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php endif;?>
							<?php if($i == 8) echo '</tr><tr>';?>
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
                            <?php if($fieldRow['f_class']=="order_info"&&$fieldRow['s_right']!=="" &&$fieldRow['status']==1):?>
                            <?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="order[]" ><?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php endif;?>
							<?php if($i == 8) echo '</tr><tr>';?>
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
                       	   	<?php if($fieldRow['f_class']=="hotel_info"&&$fieldRow['s_right']!=="" &&$fieldRow['status']==1):?>
                       	   	<?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="hotel[]" ><?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php endif;?>
							<?php if($i == 8) echo '</tr><tr>';?>
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
							<?php if($fieldRow['f_class']=="ticket_info"&&$fieldRow['s_right']!=="" &&$fieldRow['status']==1):?>
							<?php $i++;?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$fieldRow['ch_name']?>'" name="boat[]" ><?=$fieldRow['ch_name']?>
							</label>
							</td>
							<?php endif;?>
							<?php if($i == 8) echo '</tr><tr>';?>
							<?php endforeach;?>
	                        </tr>
	                        </table>
                         <div class="form-actions">
                         <input class="btn green" type="submit" value="提交">
                         <input class="btn green" type="reset"  value="重置">
                         </div>
                        </form>
                       	<?php endif;?>
                        </div>
                        </div>
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

function Allproduct(){
     var product = document.getElementsByName("product[]");
     for(var i=0;i < product.length;i++){
                   if(product[i].type=="checkbox"){
					product[i].checked = event.srcElement.checked ;
                   }
         }
}


function Alltravel(){
    var product = document.getElementsByName("travel[]");
    for(var i=0;i < product.length;i++){
                  if(product[i].type=="checkbox"){
					product[i].checked = event.srcElement.checked ;
                  }
        }
}


function Allorder(){
    var product = document.getElementsByName("order[]");
    for(var i=0;i < product.length;i++){
                  if(product[i].type=="checkbox"){
					product[i].checked = event.srcElement.checked ;
                  }
        }
}


function Allhotel(){
    var product = document.getElementsByName("hotel[]");
    for(var i=0;i < product.length;i++){
                  if(product[i].type=="checkbox"){
					product[i].checked = event.srcElement.checked ;
                  }
        }
}
function Allticket(){
    var product = document.getElementsByName("boat[]");
    for(var i=0;i < product.length;i++){
                  if(product[i].type=="checkbox"){
					product[i].checked = event.srcElement.checked ;
                  }
        }
}


function Allcontact(){
    var product = document.getElementsByName("contact[]");
    for(var i=0;i < product.length;i++){
                  if(product[i].type=="checkbox"){
					product[i].checked = event.srcElement.checked ;
                  }
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

	


</script>





















<?php 
 class Public_template extends MY_Controller{
 	
 	public function __construct(){
 		parent::__construct();
 		$this->load->database();
 		$this->load->helper(array('form','url'));
 	    $this->load->library(array('table','pagination'));
        $this->lang->load(array('product_lang')); 	
        $this->load->model('public/Country_model','country');
     
 	}
 	/**
 	 * 公共模板首页
 	 * @param $type 传递一个类型到首页判断显示哪个模块
 	 */
 	public function index($type){
 		$category_id = $this->country->db->select('id')->get('product_category')->row()->id;
 		switch ($type) {
 			//出行模板
 			case "travel":
 			$this->show($category_id,$type);	
 			break;
 			//懒猫订单详情模板
 			case "lanmao":
 			$type = "order_detail";
 			$this->show($category_id,$type);	
 			break;
 			//供应商订单模板
 			case "supplier":
 			$type = "supplier_order";
 			$this->show($category_id,$type);	
 			break;
 			//用户填写信息模板
 			case "user":
 			$this->show($category_id,$type);	
 			break;
 			//导出订单模板
 			case "export":
 			$this->show($category_id,$type);	
 			break;
 			//确认函模板
 			case "confirm":
 			$this->show($category_id,$type);	
 			break;
 			//默认模板为出行模板
 			default:
 			$this->show($category_id,travel);
 			break;
 		}
 		
 	}
 	
 	/**
 	 * 显示模板对应信息
 	 * @param unknown_type $id  商品分类id
 	 * @param unknown_type $type  模块类型
 	 */
 	public function show($id,$type){
 		if($id>0){
 		//根据商品分类id,模块类型从公共模板取数据
 		$result = $this->country->db->select('*')->where('category_id',$id)
 										      	->where('template_type',$type)
 											  	->get('basic_template')
 										 	  	->result_array();
 		//计算记录数
 		$num  = count($result);
 		$data['category']  	 = $this->country->db->get('product_category')->result_array();
 		$data['category_id'] = $id;
 		$data['type']   	 = $type;
 		//当获取数据数大于0
 		if($num>0){
 		//公共模块id
 		$data['id'] = $this->country->db->select('id')->where('category_id',$id)->where('template_type',$type)->get('basic_template')->row()->id;
 				foreach($result as $v){	
 			    	//获取模板内容
 					$double = json_decode($v['template_content'],true);
 			           foreach($double as $key=>$value){
 			              if($key == "travel_info"){
 			              			$data['travel_info'] = $value;
 			              }elseif($key == "product_info"){
 			              	 	 	$data['product_info'] = $value;	
 			              }elseif($key == "contact_info"){
 			              		 	$data['contact_info'] = $value;
 			              }elseif($key == "contact_info"){
 			              		 	$data['contact_info'] = $value;
 			              }elseif($key == "order_info"){
 			              		 	$data['order_info'] = $value;
 			              }elseif($key == "hotel_info"){
 			              		 	$data['hotel_info'] = $value;
 			              }else{
 			              			$data['ticket_info'] = $value;
 			              	}
 			           }
 			 	}
 		 //获取到数据的状态为3
 		 $data['status'] = 3;   
 		 switch ($type) {
 				case "travel":
 				$this->load->view('public/template',$data);
 				break;
 				case "order_detail":
 				$this->load->view('public/lanmao_template',$data);
 				break;
 				case "export":
 				$this->load->view('public/export_template',$data);
 				break;
 				case "confirm":
 				$this->load->view('public/confirm_template',$data);
 				break;
 				case "user":
 				$this->load->view('public/user_template',$data);
 				break;
 				case "supplier_order":
 				$this->load->view('public/supplier_template',$data);
 				break;
 			}
 		}
 		//没有获取到记录数
 		else{	
 				//商品分类id
 				$data['id'] = $id;
 				//获取懒猫订单详情模板
 				$order_detail = $this->country->db->where('category_id',$id)->where('template_type',"order_detail")->get('basic_template')->result_array();
 				foreach($order_detail as $v){	
 			    	//获取模板内容
 					$double = json_decode($v['template_content'],true);
 			           foreach($double as $key=>$value){
 			              if($key == "travel_info"){
 			              			$data['travel_info'] = $value;
 			              }elseif($key == "product_info"){
 			              	 	 	$data['product_info'] = $value;	
 			              }elseif($key == "contact_info"){
 			              		 	$data['contact_info'] = $value;
 			              }elseif($key == "contact_info"){
 			              		 	$data['contact_info'] = $value;
 			              }elseif($key == "order_info"){
 			              		 	$data['order_info'] = $value;
 			              }elseif($key == "hotel_info"){
 			              		 	$data['hotel_info'] = $value;
 			              }else{
 			              			$data['ticket_info'] = $value;
 			              	}
 			           }
 			 	}
 				$num = count($order_detail);
 				$data['field'] 	= $this->country->db->get('field')->result_array();
 				//没有获取到数据的状态为2
 				$data['status'] = 2;
 		switch ($type) {
 				case "travel":
 				$this->load->view('public/template',$data);
 				break;
 				case "order_detail":
 				$this->load->view('public/lanmao_template',$data);
 				break;
 				case "export":
 				if($num>0){
 				$this->load->view('public/export_template',$data);
 				}else{
 				$data['status']  =  1;
 				$this->load->view('public/export_template',$data);	
 				}
 				break;
 				case "confirm":
 				if($num>0){
 				$this->load->view('public/confirm_template',$data);
 				}else{
 				$data['status']  =  1;
 				$this->load->view('public/confirm_template',$data);	
 				}
 				break;
 				case "user":
 				if($num>0){
 				$this->load->view('public/user_template',$data);
 				}else{
 				$data['status']  =  1;
 				$this->load->view('public/user_template',$data);
 				}
 				break;
 				case "supplier_order":
 				if($num>0){
 				$this->load->view('public/supplier_template',$data);
 				}else{
 				$data['status']  =  1;
 				$this->load->view('public/supplier_template',$data);
 				}
 				break;
 			}
 			
 		}
 			
 		}
 		
 		
 		
 		else{
 			
 			
 		}
 		
 	}
 	
 	/**
 	 * 添加模板信息
 	 */
 	public function save(){
 		$data    = array();
 		$arr 	 = array();
 		$product = array();
 		$contact = array();
 		$travel  = array();
 		$order   = array();
 		$hotel   = array();
 		$boat    = array();
 		if($_POST){
 			$type     =		$this->input->post('typea');
 			$category = 	$this->input->post('category');
 			$post = $this->input->post();
 			if(!empty($post['product'])){
 			$product = $post['product'];
 			}
 			if(!empty($post['contact'])){
 			$contact = $post['contact'];
 			}
 			if(!empty($post['travel'])){
 			$travel  = $post['travel'];
 			}
 			if(!empty($post['order'])){
 			$order  = $post['order'];
 			}
 			if(!empty($post['hotel'])){
 			$hotel  = $post['hotel'];
 			}
 			if(!empty($post['boat'])){
 			$boat  	= $post['boat'];
 			}
 			$arr = array_merge($product,$contact,$travel,$order,$hotel,$boat);
 			$sql2 = implode(",",$arr);
 			$sql = "select * from field where  ch_name in ($sql2)";
 			$result = $this->country->db->query($sql)->result_array();
 			$num = count($result);
 			$travel_info = array();
 			$product_info = array();
 			$contact_info = array();
 			$order_info   = array();
 			$hotel_info   = array();
 			$ticket_info  = array();
 			foreach($result as $row){
 				 if($row['f_class']=="travel_info"){
 				 	$travel_info[] = $row;
 				 }elseif($row['f_class']=="product_info"){
 				 	$product_info[] = $row;
 				 }
 				 elseif($row['f_class']=="contact_info"){
 				 	$contact_info[] = $row;
 				 }
 				 elseif($row['f_class']=="order_info"){
 				 	$order_info[] = $row;
 				 }
 				 elseif($row['f_class']=="hotel_info"){
 				 	$hotel_info[] = $row;
 				 }
 				 else{
 				 	$ticket_info[] = $row;
 				 }
 			}
 			$data['travel_info'] = $travel_info;
 			$data['product_info'] = $product_info;
 			$data['contact_info'] = $contact_info;
 			$data['order_info']   = $order_info;
 			$data['hotel_info']   = $hotel_info;
 			$data['ticket_info']  = $ticket_info;
 			$template_content = json_encode($data);
 		    $data1 = array(
 		    'template_type' => $type,
 		    'category_id'   => $category,
 		    'template_content' => $template_content
 		    );
 		    $this->country->db->insert('basic_template',$data1);
 			redirect(base_url('public_template/show/'.$category.'/'.$type));
 		}
 		
 		
 	}
 	
 	
 	/**
 	 * 修改相对应的商品分类的模板信息的页面
 	 * @param unknown_type $id  商品分类id
 	 */
 	public function edit($id){
 		/**
 		 * 当传参获取到$id
 		 */
 		if($id>0){
 		$arr = array();
 		//通过id获取一条记录
 		$type = $this->country->db->select('template_type')->where('id',$id)->get('basic_template')->row()->template_type;
 		$category_id = $this->country->db->select('category_id')->where('id',$id)->get('basic_template')->row()->category_id;
 		$data['result'] 	= 	$this->country->db->where('id',$id)->get('basic_template')->result_array();
 		$data['id'] 		= 	$id;
 		$data['style'] 		=	$type;
 		$data['field'] 		=   $this->country->db->get('field')->result_array();
 		//根据id获取模板的template_content
 		foreach($data['result'] as $v){
 			        //template_content解码	
 			    	$double = json_decode($v['template_content'],true);
 			           foreach($double as $key=>$value){
 			           	//获取出行人信息
 			              if($key == "travel_info"){
 			              			$data['travel_info'] = $value;
 			              			foreach($data['travel_info'] as $key=>$x){
 			              				$data['travel'][]=$x['ch_name'];	
 			              			}
 			              //获取商品信息		
 			              }elseif($key == "product_info"){
 			              	 	 	$data['product_info'] = $value;	
 			              			foreach($data['product_info'] as $key=>$x){
 			              				$data['product'][]=$x['ch_name'];	
 			              			}
 			              //获取联系人信息
 			              }elseif($key == "contact_info"){
 			              		 	$data['contact_info'] = $value;
 			              			foreach($data['contact_info'] as $key=>$x){
 			              				$data['contact'][]=$x['ch_name'];	
 			              			}
 			              //获取订单信息 		 	
 			              }elseif($key == "order_info"){
 			              		 	$data['order_info'] = $value;
 			              			foreach($data['order_info'] as $key=>$x){
 			              				$data['order'][]=$x['ch_name'];	
 			              			}
 			              //获取酒店信息
 			              }elseif($key == "hotel_info"){
 			              		 	$data['hotel_info'] = $value;
 			              			foreach($data['hotel_info'] as $key=>$x){
 			              				$data['hotel'][]=$x['ch_name'];	
 			              				
 			              			}
 			              //获取船票信息
 			              }else{
 			              			$data['ticeket_info'] = $value;
 			              			foreach($data['ticeket_info'] as $key=>$x){
 			              				$data['ticket'][]=$x['ch_name'];	
 			              			}
 			              	}
 			           }
 			           
 			 }
 		$order_detail = $this->country->db->where('category_id',$category_id)->where('template_type',"order_detail")->get('basic_template')->result_array();
 				foreach($order_detail as $v){	
 			    	//获取模板内容
 					$double = json_decode($v['template_content'],true);
 			           foreach($double as $key=>$value){
 			              if($key == "travel_info"){
 			              			$data['travel_info'] = $value;
 			              }elseif($key == "product_info"){
 			              	 	 	$data['product_info'] = $value;	
 			              }elseif($key == "contact_info"){
 			              		 	$data['contact_info'] = $value;
 			              }elseif($key == "contact_info"){
 			              		 	$data['contact_info'] = $value;
 			              }elseif($key == "order_info"){
 			              		 	$data['order_info'] = $value;
 			              }elseif($key == "hotel_info"){
 			              		 	$data['hotel_info'] = $value;
 			              }else{
 			              			$data['ticket_info'] = $value;
 			              	}
 			           }
 			 	}
 		switch ($type) {
 			case "travel":
 			$this->load->view('public/template_edit',$data);
 			break;
 			case "order_detail":
 			$this->load->view('public/template_edit',$data);
 			break;
 			case "export":
 			$this->load->view('public/template_edit',$data);
 			break;
 			case "confirm":
 			$this->load->view('public/template_edit',$data);
 			break;
 			case "user":
 			$this->load->view('public/template_edit',$data);
 			break;
 			case "supplier_order":
 			$this->load->view('public/template_edit',$data);
 			break;
 		}
 		}
 		
 		
 		else{
 			
 		}
 	}
 	
 	/**
 	 * 对应商品分类的模板信息的修改
 	 * @param $id 商品分类id
 	 */
 	
 	public function update($id,$style){
 		$category_id = $this->country->db->select('category_id')->where('id',$id)->get('basic_template')->row()->category_id;
 		$where = 'id='.$id;
 		$product = array();
 		$contact = array();
 		$order   = array();
 		$hotel   = array();
 		$travel  = array();
 		$boat  = array();
 		if($_POST){
 			$type     =		$this->input->post('type');
 			$category = 	$this->input->post('category');
 			$post = $this->input->post();
 			if(!empty($post['product'])){
 			$product = $post['product'];
 			}
 			if(!empty($post['contact'])){
 			$contact = $post['contact'];
 			}
 			if(!empty($post['travel'])){
 			$travel  = $post['travel'];
 			}
 			if(!empty($post['order'])){
 			$order  = $post['order'];
 			}
 			if(!empty($post['hotel'])){
 			$hotel  = $post['hotel'];
 			}
 			if(!empty($post['boat'])){
 			$boat  	= $post['boat'];
 			}
 			$arr = array_merge($product,$contact,$travel,$order,$hotel,$boat);
 			$sql2 = implode(",",$arr);
 			$sql = "select * from field where  ch_name in ($sql2)";
 			$result = $this->country->db->query($sql)->result_array();
 			$num = count($result);
 			$travel_info = array();
 			$product_info = array();
 			$contact_info = array();
 			$order_info   = array();
 			$hotel_info   = array();
 			$ticket_info  = array();
 			foreach($result as $row){
 				 if($row['f_class']=="travel_info"){
 				 	$travel_info[] = $row;
 				 }elseif($row['f_class']=="product_info"){
 				 	$product_info[] = $row;
 				 }
 				 elseif($row['f_class']=="contact_info"){
 				 	$contact_info[] = $row;
 				 }
 				 elseif($row['f_class']=="order_info"){
 				 	$order_info[] = $row;
 				 }
 				 elseif($row['f_class']=="hotel_info"){
 				 	$hotel_info[] = $row;
 				 }
 				 elseif($row['f_class']=="ticket_info"){
 				 	$ticket_info[] = $row;
 				 }
 			}
 			
 			$data['travel_info'] = $travel_info;
 			$data['product_info'] = $product_info;
 			$data['contact_info'] = $contact_info;
 			$data['order_info']   = $order_info;
 			$data['hotel_info']   = $hotel_info;
 			$data['ticket_info']  = $ticket_info;
 			$template_content = json_encode($data);
 		    $data1 = array(
 		    'template_content' => $template_content
 		    );
 		    $this->country->db->update('basic_template',$data1,$where);
 		    redirect(base_url('public_template/show/'.$category_id.'/'.$style));
 			
 		}
 		else{
 			//error
 		}
 		
 		
 		
 		
 		
 	}
 }
?>



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
            	<div class="tabbable tabbable-custom">
                     <ul class="nav nav-tabs" id="list">
                        <?php foreach($category as $key=>$cateRow):?> 
                        <li class="<?php if($category_id==$cateRow['id']) echo "active";?>">
                        <a id="travel"  href="<?=base_url('public_template/show/'.$cateRow['id']).'/'.$type.'/'.'#a'?>"><?=$cateRow['name']?></a>
                        </li>
                        <?php endforeach;?> 
                      </ul>
                        <div class="tab-content" >
                       	<div class="tab-pane active" id="a">
                       	<?php if($status==3):?>
                       	<h3>商品信息</h3>
                       	<table>
                       	<tr>
                       	<?php foreach($product_info as $key => $productRow):?>
                       	<td><span style="font-size:medium;"><?=$key+1?><?=$productRow['ch_name']?></span></td>
                       	<?php endforeach;?>
                       	</tr>
                       	</table>
                       	<h3>联系人信息</h3>
                       	<table>
                       	<tr>
                       	<?php foreach($contact_info as $key => $contactRow):?>
                       	<td><span style="font-size:medium;"><?=$key+1?><?=$contactRow['ch_name']?></span></td>
                       	<?php endforeach;?>
                       	</tr>
                       	</table>
                       	<h3>出行人信息</h3>
                       	<table>
                       	<tr>
                       	<?php foreach($travel_info as $key => $travelRow):?>
                       	<td><span style="font-size:medium;"><?=$key+1?><?=$travelRow['ch_name']?></span></td>
                       	<?php endforeach;?>
                       	</tr>
                       	</table>
                       	<h3>下单信息</h3>
                       	<table>
                       	<tr>
                       	<?php foreach($order_info as $key => $orderRow):?>
                       	<td><span style="font-size:medium;"><?=$key+1?><?=$orderRow['ch_name']?></span></td>
                       	<?php endforeach;?>
                       	</tr>
                       	</table>
                       	<h3>酒店信息</h3>
                       	<table>
                       	<tr>
                       	<?php foreach($hotel_info as $key => $hotelRow):?>
                        <td><span style="font-size:medium;"><?=$key+1?><?=$hotelRow['ch_name']?></span></td>
                       	<?php endforeach;?>
                       	</tr>
                       	</table>
                       	<h3>船票信息</h3>
                       	<table>
                       	<tr>
                       	<?php foreach($ticket_info as $key => $ticketRow):?>
                        <td><span style="font-size:medium;"><?=$key+1?><?=$ticketRow['ch_name']?></span></td>
                       	<?php endforeach;?>
                       	</tr>
                       	</table>
                       	<div class="form-actions">
                       	<a href="<?=base_url('public_template/edit/'.$id)?>" class="btn green">修改</a>
                       	</div>
                        <?php elseif($status==2):?>
                       	<form method="post" action="<?=base_url('public_template/save')?>" class="tb">
                       	<input type="hidden" name="typea" value="<?=$type?>">
                       	<input type="hidden" name="category" value="<?=$category_id?>">
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
                        	<?php if($productRow['s_right']!==""&&$productRow['status']==1):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$productRow['ch_name']?>'" name="product[]" <?php if($productRow['s_right']=="可见/可编辑"){echo "";}else{ echo "disabled";}?>/><?=$productRow['ch_name']?>
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
                        	<?php if($contactRow['s_right']!==""&&$contactRow['status']==1):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$contactRow['ch_name']?>'" name="contact[]" <?php if($contactRow['s_right']=="可见/可编辑"){echo "";}else{ echo "disabled";}?>/><?=$contactRow['ch_name']?>
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
                            <?php if($travelRow['s_right']!==""&&$travelRow['status']==1):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$travelRow['ch_name']?>'" name="travel[]" <?php if($travelRow['s_right']=="可见/可编辑"){echo "";}else{ echo "disabled";}?>/><?=$travelRow['ch_name']?>
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
                            <?php if($orderRow['s_right']!==""&&$orderRow['status']==1):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$orderRow['ch_name']?>'" name="order[]" <?php if($orderRow['s_right']=="可见/可编辑"){echo "";}else{ echo "disabled";}?>/><?=$orderRow['ch_name']?>
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
                       	    <?php if($hotelRow['s_right']!==""&&$hotelRow['status']==1):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$hotelRow['ch_name']?>'" name="hotel[]" <?php if($hotelRow['s_right']=="可见/可编辑"){echo "";}else{ echo "disabled";}?>/><?=$hotelRow['ch_name']?>
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
							<label class="help-inline">
							<input type="checkbox"  onclick="Allticket()"/>
							</label>
							<label class="help-inline" style="margin-top:12px;">全选</label>
							</div>
							</div>
						<table  class="table table-hover" style="border:none;margin-left:80px;">
						<tr>
						<?php foreach($ticket_info as $key => $ticketRow):?>
						<?php if($ticketRow['s_right']!==""&&$ticketRow['status']==1):?>
                        	<td>
                            <label class="checkbox">
							<input type="checkbox" value="'<?=$ticketRow['ch_name']?>'" name="boat[]" <?php if($ticketRow['s_right']=="可见/可编辑"){echo "";}else{ echo "disabled";}?>/><?=$ticketRow['ch_name']?>
							</label>
							</td>
							<?php if($key == 7) echo '</tr><tr>';?>
							<?php endif;?>
							<?php endforeach;?>
                         </tr>
                         </table>
                         <div class="form-actions">
                         <input class="btn green" type="submit" value="提交">
                         <input class="btn green" type="reset"  value="重置">
                         </div>
                        </form>
                        <?php elseif($status==1):?>
                        <label class="help-inline">还未填写懒猫订单详情模板</label>
                       	<?php endif;?>
                        </div>
                        </div>
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

	


</script>