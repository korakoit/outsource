</div>

<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->

	<div class="footer">

		<div class="footer-inner">

			2017 &copy;  from <a href="#" title="shop后台管理" target="_blank">CLEAD</a> - More Templates <a href="#" target="_blank" title="CLEAD">CLEAD</a>

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

	<script type="application/javascript">

			jQuery(document).ready(function() {

				<?php
					$url = str_replace('/','-',trim($_SERVER['REQUEST_URI'],'/'));
					$urls = explode('?',$url);
				?>

				var str_url = "<?=isset($active)?$active:$urls[0]?>";
				var active = $("#" + str_url);
				var level 	= $(active).attr("level");
				if(level == 2){
					active.parent().parent().addClass("active");
				}
				active.addClass("active");

				App.init(); // initlayout and core plugins
				Index.init();
				Index.initCalendar(); // init index page's custom scripts
				Index.initCharts(); // init index page's custom scripts
				Index.initChat();
				Index.initMiniCharts();
				Index.initDashboardDaterange();
				// Index.initIntro();
			});

	</script>

	<!-- END JAVASCRIPTS -->

