<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>
<div class="page-content">
	<div class="container-fluid">
		<div class="row-fluid">
  			<div class="span12 booking-search">
  	   			<div class="clearfix margin-bottom-20">
           			<form  class="form-horizontal" method="get" id="add-form" action="<?=base_url('public_template/save')?>">
            			<div class="control-group">
            				<label class="label-control">商品信息</label>
            					<div class="control-group">
            					<div class="controls">
								<label class="checkbox">
            					<input type="checkbox" name="product[]" value="去程出发酒店名称">去程出发酒店名称
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="product[]" value="去程出发酒店电话">去程出发酒店电话
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="product[]" value="去程出发酒店地址">去程出发酒店地址
            					</label>&nbsp;&nbsp;&nbsp;
            					</div>
            					</div>
            			</div>
            			<div class="control-group">
            				<label class="label-control">下单信息</label>
            					<div class="control-group">
            					<div class="controls">
								<label class="checkbox">
            					<input type="checkbox" name="order[]" value="图片">图片
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="order[]" value="座位号">座位号
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="order[]" value="接人集合时间">接人集合时间
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="order[]" value="押金">押金
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="order[]" value="归还方式">归还方式
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="order[]" value="领取方式">领取方式
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="order[]" value="使用天数">使用天数
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="order[]" value="驾照(原文件)">驾照(原文件)
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="order[]" value="驾照(翻译文件)">驾照(翻译文件)
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="order[]" value="联系人">联系人
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="order[]" value="联系电话">联系电话
            					</label>&nbsp;&nbsp;&nbsp;
            					</div>
            					</div>
            			</div>
            			<div class="control-group">
            				<label class="label-control">出行人信息</label>
            					<div class="control-group">
            					<div class="controls">
								<label class="checkbox">
            					<input type="checkbox" name="travel[]" value="身份证号码">身份证号码
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="travel[]" value="衣服尺码">衣服尺码
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="travel[]" value="近视度数">近视度数
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="travel[]" value="鞋码">鞋码
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="travel[]" value="体重">体重
            					</label>&nbsp;&nbsp;&nbsp;
            					</div>
            					</div>
            			</div>
            			<div class="control-group">
            				<label class="label-control">联系人信息</label>
            					<div class="control-group">
            					<div class="controls">
								<label class="checkbox">
            					<input type="checkbox" name="contact[]" value="QQ">QQ
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="contact[]" value="邮箱地址">邮箱地址
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="contact[]" value="国外电话">国外电话
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="contact[]" value="国内电话备用">国内电话备用
            					</label>&nbsp;&nbsp;&nbsp;
            					</div>
            					</div>
            			</div>
            			<div class="control-group">
            				<label class="label-control">酒店信息</label>
            					<div class="control-group">
            					<div class="controls">
								<label class="checkbox">
            					<input type="checkbox" name="hotel[]" value="VIP酒店名称">VIP酒店名称
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="hotel[]" value="VIP酒店电话">VIP酒店电话
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="hotel[]" value="VIP酒店地址">VIP酒店地址
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="hotel[]" value="四星酒店名称">四星酒店名称
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="hotel[]" value="四星酒店电话">四星酒店电话
            					</label>&nbsp;&nbsp;&nbsp;
            					<label class="checkbox">
            					<input type="checkbox" name="hotel[]" value="四星酒店地址">四星酒店地址
            					</label>&nbsp;&nbsp;&nbsp;
            					</div>
            					</div>
            			</div>
            			<div class="control-group">
            				<label class="label-control">酒店信息</label>
            					<div class="control-group">
            					<div class="controls">
								<label class="checkbox">
            					<input type="checkbox" name="boat[]" value="船票号">船票号
            					</label>&nbsp;&nbsp;&nbsp;
            					</div>
            					</div>
            			</div>
            			<div class="form-actions pagination-centered" style="margin-right:150px;">
                        <button class="btn btn blue" id="sub" onclick="javascript:window.opener=null;window.open('','_self');window.close();">提交</button>
                        <a class="btn btn blue" id="cansel" href="javascript:window.opener=null;window.open('','_self');window.close();">取消</a>
                       	</div>
           			 </form>  
        		</div>
     		</div>
		</div>
	</div>
</div>
<?php $this->load->view('block/footer.php')?>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>static/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>static/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>static/js/select2.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>static/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>static/plugin/layer/layer.js"></script>
<script type="text/javascript">

</script>