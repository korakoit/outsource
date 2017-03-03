<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

    <meta charset="utf-8" />

    <title>CLEAD | Login Page</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <meta content="" name="description" />

    <meta content="" name="author" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->

    <link href="<?=STATIC_FILE_HOST?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <link href="<?=STATIC_FILE_HOST?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

    <link href="<?=STATIC_FILE_HOST?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    <link href="<?=STATIC_FILE_HOST?>assets/css/style-metro.css" rel="stylesheet" type="text/css"/>

    <link href="<?=STATIC_FILE_HOST?>assets/css/style.css" rel="stylesheet" type="text/css"/>

    <link href="<?=STATIC_FILE_HOST?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>

    <link href="<?=STATIC_FILE_HOST?>assets/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

    <link href="<?=STATIC_FILE_HOST?>assets/css/uniform.default.css" rel="stylesheet" type="text/css"/>

    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->

    <link href="<?=STATIC_FILE_HOST?>assets/css/login.css" rel="stylesheet" type="text/css"/>

    <!-- END PAGE LEVEL STYLES -->

    <link rel="shortcut icon" href="<?=STATIC_FILE_HOST?>assets/image/favicon.ico" />

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="login">

<!-- BEGIN LOGO -->

<div class="logo">

    <img src="<?=STATIC_FILE_HOST?>assets/image/logo-big.png" alt="" />

</div>

<!-- END LOGO -->

<!-- BEGIN LOGIN -->

<div class="content">

    <!-- BEGIN LOGIN FORM -->

    <form class="form-vertical login-form" method="post" action="<?=base_url('admin/admin/login')?>">

        <h3 class="form-title">Login to your account</h3>

        <div class="alert alert-error hide" id="alert">

            <button class="close" data-dismiss="alert"></button>

            <span id="spanalert"></span>

        </div>

        <div class="control-group">

            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

            <label class="control-label visible-ie8 visible-ie9">Username</label>

            <div class="controls">

                <div class="input-icon left">

                    <i class="icon-user"></i>

                    <input class="m-wrap placeholder-no-fix" type="text" placeholder="Username" />

                </div>

            </div>

        </div>

        <div class="control-group">

            <label class="control-label visible-ie8 visible-ie9">Password</label>

            <div class="controls">

                <div class="input-icon left">

                    <i class="icon-lock"></i>

                    <input class="m-wrap placeholder-no-fix" type="password" placeholder="Password" name="password"/>

                </div>

            </div>

        </div>

        <div class="form-actions">

            <label class="checkbox">

                <input type="checkbox" name="remember" value="1"/> Remember me

            </label>

            <button type="submit" class="btn green pull-right">

                Login <i class="m-icon-swapright m-icon-white"></i>

            </button>

        </div>



    </form>

    <!-- END LOGIN FORM -->


</div>

<!-- END LOGIN -->

<!-- BEGIN COPYRIGHT -->

<div class="copyright">

    2017 &copy; CLEAD. Admin Dashboard .

</div>

<!-- END COPYRIGHT -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

<!-- BEGIN CORE PLUGINS -->

<script src="<?=STATIC_FILE_HOST?>assets/js/jquery-1.10.1.min.js" type="text/javascript"></script>

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

<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.uniform.min.js" type="text/javascript" ></script>

<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.validate.min.js" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="<?=STATIC_FILE_HOST?>assets/js/app.js" type="text/javascript"></script>

<script src="<?=STATIC_FILE_HOST?>assets/js/login.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->

<script>

    jQuery(document).ready(function() {

        App.init();

        Login.init();


    });

</script>

<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->

</html>

