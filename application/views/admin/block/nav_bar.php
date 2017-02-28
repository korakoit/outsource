<!-- BEGIN CONTAINER -->
<div class="page-container">
		<!-- BEGIN SIDEBAR -->

		<div class="page-sidebar nav-collapse collapse">

			<!-- BEGIN SIDEBAR MENU -->

			<ul class="page-sidebar-menu">

				<li>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

					<div class="sidebar-toggler hidden-phone"></div>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

				</li>

				<li>

					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->

					<form class="sidebar-search">

						<div class="input-box">

							<a href="javascript:;" class="remove"></a>

							<input type="text" placeholder="搜索..." />

							<input type="button" class="submit" value=" " />

						</div>

					</form>

					<!-- END RESPONSIVE QUICK SEARCH FORM -->

				</li>

				
			<!-- 动态菜单 -->
			<?php if(!empty($this->user['role_id'])):?>
			<?php 
				$menu = '';
				if($this->session->has_userdata('MENU')){
					
					$i = 0;
					foreach($this->get_menu as  $mn){
						if(@$mn['shown']){
							$i++;
							if($mn["self"]["uri"]=="/"){
								$menu .= '<li level="1" class="' .(($i==1) ? 'start' : '') .  '">';
								$menu .= '<a href="javascript:void(0)"><i class="' .(($i==1) ? 'icon-home' : 'icon-folder-open') . '"></i><span class="title">' .$mn["self"]["title"]. '</span><span class="arrow"></span></a>';
							}else{
								$tmpUri = @explode("/",$mn["self"]["uri"]);
								$num  	= count($tmpUri);
								$combin = '';
								for($x = 2;$x<$num;$x++){
									$combin .= $tmpUri[$x]."/";
								}
								$combin		 =	substr($combin,0,-1);
								$section     =  str_replace("/","-",$combin);
								$menu .= '<li level="1" class="' .(($i==1) ? 'start' : '') .  '" id="' .$tmpUri[1] .'-'. $section. '">';
								if($tmpUri[0] === 'NULL'){
									$menu .= '<a href="' .  base_url($tmpUri[1] . "/" .$combin ). '"><i class="' .(($i==1) ? 'icon-home' : 'icon-folder-open') . '"></i><span class="title">' .$mn["self"]["title"]. '</span></a>';
								}else{
									$menu .= '<a href="' .  base_url($mn["self"]["uri"]) . '"><i class="' .(($i==1) ? 'icon-home' : 'icon-folder-open') . '"></i><span class="title">' .$mn["self"]["title"]. '</span><span class="arrow"></span></a>';
								}
							unset($tmpUri);
							unset($combin);
							unset($section);
							}
						}
						
						if(isset($mn['child'])){
							$menu .= '<ul class="sub-menu">';
							foreach($mn['child'] as $cmn){
								if(@$cmn["shown"]){
									if($cmn["self"]["uri"]=="/"){
										$menu .= '<li  level="2" class=""><a href="javascript:void(0)"><i class="icon icon-folder-open"></i><span class="title">' .$cmn["self"]["title"]. '</span></a>';
										if(!empty($cmn['child'])){
										$menu .= '<ul class="sub-menu">';
										foreach($cmn['child'] as $ccmn){
											if(@$ccmn['shown']){
												if($ccmn["self"]["uri"]=="/"){
													$menu .= '<li level="3" class=""><a href="javascript:void(0)"><i class="icon icon-th-list"></i><span class="title">' .$ccmn["self"]["title"]. '</span></a></li>';
													}else{
													$tmpUri = @explode("/",$ccmn["self"]["uri"]);
													$num  	= count($tmpUri);
													$combin = '';
													for($a = 2;$a<$num;$a++){
														$combin .= $tmpUri[$a]."/";
														$section .= $tmpUri[$a] . "-";
													}
													$combin		 =	substr($combin,0,-1);
													$section = str_replace("/", "-", $combin);
													if($tmpUri[0] === 'NULL'){
														$menu .= '<li class="" level="3" id="' .$tmpUri[1] .'-'. $section. '"><a href="' .  base_url($tmpUri[1] . "/" .$combin) . '"><i class="icon icon-th-list"></i><span>' .$ccmn["self"]["title"]. '</span></a></li>';
													}else{
														$menu .= '<li class="" level="3" id="' .$tmpUri[0] .'-'. $tmpUri[1]. '-'. $tmpUri[2] .'"><a href="' .  base_url($ccmn["self"]["uri"]) . '"><i class="icon icon-th-list"></i><span>' .$ccmn["self"]["title"]. '</span></a></li>';
														 }
													unset($tmpUri);
													unset($combin);
													unset($section);
													}
											}
										}
										$menu .="</ul>";
									}	
										$menu .= '</li>';
									}else{
										$tmpUri = @explode("/",$cmn["self"]["uri"]);
										$num  	= count($tmpUri);
										$combin = '';
										for($b = 2;$b<$num;$b++){
											$combin .= $tmpUri[$b]."/";
											$section .= $tmpUri[$b] . "-";
										}
										$combin		 =	substr($combin,0,-1);
										$section = str_replace("/", "-", $combin);
										if($tmpUri[0] === 'NULL'){
											if($tmpUri[1] == "order" && $section == "neworder"){
												$menu .= '<li class="" level="2" id="' .$tmpUri[1] .'-'. $section. '"><a href="' .  base_url($tmpUri[1] . "/" .$combin) . '" target="_blank"><i class="icon icon-th-list"></i><span>' .$cmn["self"]["title"]. '</span></a></li>';
											}else{
												$menu .= '<li class="" level="2" id="' .$tmpUri[1] .'-'. $section. '"><a href="' .  base_url($tmpUri[1] . "/" .$combin) . '"><i class="icon icon-th-list"></i><span>' .$cmn["self"]["title"]. '</span></a></li>';
											}
										}else{
											$menu .= '<li class="" level="2" id="' .$tmpUri[0] .'-'. $tmpUri[1]. '-'. $tmpUri[2] .'"><a href="' .  base_url($cmn["self"]["uri"]) . '"><i class="icon icon-th-list"></i><span>' .$cmn["self"]["title"]. '</span></a></li>';
											 }
										unset($tmpUri);
										unset($combin);
										unset($section);
										}
									
								}
							}
							$menu .= "</ul>";
						}
						if(@$mn['shown']){
							$menu .= "</li>";
						}
					}
				}
			echo $menu;
			?>
<?php endif;?>
			
			
			
			
			</ul>
			
			<!-- END SIDEBAR MENU -->

		</div>

		<!-- END SIDEBAR -->
		
<script type="text/javascript">
 /**
function deleMenuTop(paret_id){
	 var session_user_id='<?=empty($_SESSION["user"]['user_number'])?0:$_SESSION["user"]['user_number'];?>';
	menulist=$.cookie('MENUTOPLIST'+session_user_id); 
	if(menulist==null){
		return;
	}
	menulist=JSON.parse(menulist);
	newmenulist=[];
	for (var i = 0; i < menulist.length; i++) { 
		if(menulist[i].id!=paret_id){
			newmenulist.push(menulist[i]);
		}
	}
	menuliststr=JSON.stringify(newmenulist); 
	$.cookie('MENUTOPLIST'+session_user_id,menuliststr,{ expires:3600*3,path: '/'}); 
}
$(function(){   
	//删除菜单加载表头
	$('.nav-top-del').live("click",function(){
		var paret_id=$(this).parent().parent().attr('id');
		deleMenuTop(paret_id);
		$(this).parent().remove()
		return false;
	}); 
});
	**/		
</script>

