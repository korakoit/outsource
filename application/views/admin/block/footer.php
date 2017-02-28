</div>

<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->

	<div class="footer">

		<div class="footer-inner">

			2015 &copy; Metronic by keenthemes.Collect from <a href="#" title="懒猫后台管理" target="_blank">懒猫旅行</a> - More Templates <a href="#" target="_blank" title="懒猫旅游">懒猫旅游</a>

		</div>

		<div class="footer-tools">

			<span class="go-top">

			<i class="icon-angle-up"></i>

			</span>

		</div>

	</div>

	<!-- END FOOTER -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<!-- BEGIN CORE PLUGINS -->

	<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/jquery-1.10.1.min.js"></script>

	<script src="<?=STATIC_FILE_HOST?>assets/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

	<script src="<?=STATIC_FILE_HOST?>assets/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

	<script src="<?=STATIC_FILE_HOST?>assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--[if lt IE 9]>

	<script src="<?=STATIC_FILE_HOST?>assets/js/excanvas.min.js"></script>

	<script src="<?=STATIC_FILE_HOST?>assets/js/respond.min.js"></script>

	<![endif]-->

	<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.slimscroll.min.js" type="text/javascript"></script>

	<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.blockui.min.js" type="text/javascript"></script>

	<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.cookie.min.js" type="text/javascript"></script>


	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->


	<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.flot.js" type="text/javascript"></script>

	<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.flot.resize.js" type="text/javascript"></script>

	<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.pulsate.min.js" type="text/javascript"></script>

	<script src="<?=STATIC_FILE_HOST?>assets/js/date.js" type="text/javascript"></script>

	<script src="<?=STATIC_FILE_HOST?>assets/js/daterangepicker.js" type="text/javascript"></script>

	<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.gritter.js" type="text/javascript"></script>

	<script src="<?=STATIC_FILE_HOST?>assets/js/fullcalendar.min.js" type="text/javascript"></script>

	<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.easy-pie-chart.js" type="text/javascript"></script>

	<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.sparkline.min.js" type="text/javascript"></script>
	<script src="<?=STATIC_FILE_HOST?>assets/js/Uploadify.js" type="text/javascript"></script>
    <script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="<?=STATIC_FILE_HOST?>assets/js/app.js" type="text/javascript"></script>

	<script src="<?=STATIC_FILE_HOST?>assets/js/index.js" type="text/javascript"></script>

	<!-- END PAGE LEVEL SCRIPTS -->

	<script>

		jQuery(document).ready(function() {

		   App.init(); // initlayout and core plugins

		   Index.init();

		   Index.initCalendar(); // init index page's custom scripts

		   Index.initCharts(); // init index page's custom scripts

		   Index.initChat();

		   Index.initMiniCharts();

		   Index.initDashboardDaterange();

		  // Index.initIntro();
		   //验证金额输入框
	        $('.power_insert_price .mianzhi .yuanman').keyup(function(evt){
	        	  if(!this.value.match(/^\d*?\.?\d*?$/)){
	                    this.value=this.t_value;
	                }else{
	                    this.t_value=this.value;
	                }
	                if(this.value.match(/^(?:\d+(?:\.\d+)?)?$/)){
	                    this.o_value=this.value;
	                    return;
	                }
	                if(this.t_value=='undefined'){
	                    this.t_value='';
	                }
	                if(this.o_value=='undefined'){
	                    this.o_value='';
	                }
	                if(this.value=='undefined'){
	                    this.value='';
	                }
	        });
	        //验证数字输入框
	        $('.power_insert_number').keyup(function(evt){
	        	this.value=this.value.replace(/\D/g,'');
	        });

		});
		<?php 
			//设置选中状态
			$directory 	= substr($this->router->fetch_directory(),0,-1);
			if(isset($active_menu) && !empty($active_menu)){
				$active = $active_menu;
			}else{
				$controller = $this->router->fetch_class();
				$function 	= $this->router->fetch_method();
				$active 	= "";
				if(!empty($directory)){
					$active .= $directory . "-";
				}
				$active .= $controller ."-" . $function;
			}
		?>
			$(function(){
				var str_url = "<?=$active?>";
				var active = $("#" + str_url);
				var level 	= $(active).attr("level");
				if(level == 2){
					active.addClass("active");
					active.parent().parent().addClass("active").find(".arrow").addClass("open").parent().append('<span class="selected"></span>');
				}else if(level == 3){
					active.addClass("active");
					active.parent().parent().addClass("open active");
					active.parent().parent().parent().parent().addClass("active").find(".arrow").addClass("open").parent().append('<span class="selected"></span>');
				}

			});

		//将json转换成name=1&number=2格式字符串
        function parseParamSearch(param, key){
    	    var paramStr="";
    	    if(param instanceof String||param instanceof Number||param instanceof Boolean){
    	        paramStr+="&"+key+"="+encodeURIComponent(param);
    	    }else{
    	        $.each(param,function(i){
    	            var k=key==null?i:key+(param instanceof Array?"["+i+"]":"."+i);
    	            paramStr+='&'+parseParamSearch(this, k);
    	        });
    	    }
    	    return paramStr.substr(1);
    	};

	</script>

	<!-- END JAVASCRIPTS -->

