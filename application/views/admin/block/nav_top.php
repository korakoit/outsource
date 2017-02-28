<body class="page-header-fixed">
	<!-- BEGIN HEADER -->
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner" style="color:white;">
			
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="#">
				<img src="<?=STATIC_FILE_HOST?>assets/image/lanmao.png" alt="" />
				</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->

				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

				<img src="<?=STATIC_FILE_HOST?>assets/image/menu-toggler.png" alt="" />

				</a>          

                        <div class="navbar hor-menu hidden-phone hidden-tablet">
        					<div class="navbar-inner" style="max-width:1098px;margin-left:auto; margin-right:auto; overflow:hidden; position:relative;">
        						<ul class="nav nav-top-list sub-menu">
        							<li>
        								<a href="/" style='font-size:14px'>首页<span class="selected"></span><i class="icon-remove"></i></a>
        							</li> 
                                    <?php if(!empty($this->user['role_id']) && !empty($this->get_top_menu)):
                                        foreach ($this->get_top_menu as $one):
                                    ?>
        							<li class="<?= $one['active']==1? 'active':'' ;?>" id="<?=$one['id'];?>">
        							 <a href="<?=$one['href'];?>"><?=$one['name']?><span class="selected"></span><i class="icon-remove nav-top-del"></i></a>
        							</li> 
        							<?php endforeach;?>
        							<?php endif;?>
        						</ul>
        					</div>
        				</div>
				<!-- END RESPONSIVE MENU TOGGLER -->            

				<!-- BEGIN TOP NAVIGATION MENU -->              

				<ul class="nav pull-right">

					<!-- BEGIN USER LOGIN DROPDOWN -->

					<li class="dropdown user">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<!--<img alt="" src="<?=STATIC_FILE_HOST?>assets/image/avatar1_small.jpg" /> -->

						<span class="username"><?=$this->user['username']?></span>

						<i class="icon-angle-down"></i>

						</a>
						<ul class="dropdown-menu">
							<!--
							<li><a href="extra_profile.html"><i class="icon-user"></i> My Profile</a></li>

							<li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>

							<li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>

							<li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>

							<li class="divider"></li>

							-->
							<li><a href="<?=base_url("user_manage/editPwd/".$this->user['id'])?>"><i class="icon-lock"></i>修改密码</a></li>
							<li><a href="<?=base_url("/user/logout")?>"><i class="icon-key"></i>登出</a></li>
						</ul>

					</li>

					<!-- END USER LOGIN DROPDOWN -->

				</ul>

				<!-- END TOP NAVIGATION MENU --> 

			</div>

		</div>

		<!-- END TOP NAVIGATION BAR -->

	</div> 
	
		<!-- END HEADER -->
