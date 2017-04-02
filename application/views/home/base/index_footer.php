<!--底部footer  begin -->
<footer class="index_footer">
	<section class="top">
		<ul class="center">
			<li class="li0">
				<div class="third">
                    <a class="" href="javascript:window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(document.location.href)+'&title='+encodeURIComponent(document.title),'_blank','toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=600, height=450,top=100,left=350');void(0)" ></a>
                    <a href="#" class="a1"></a>
                    <a class="a2" href="javascript:window.open('http://twitter.com/home?status='+encodeURIComponent(document.location.href)+' '+encodeURIComponent(document.title),'_blank','toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=600, height=450,top=100,left=350');void(0)" ></a>
					<a href="#" class="a3"></a>
					<a href="#" class="a4"></a>
                    <a class="a5" href="javascript:window.open('http://www.google.com/bookmarks/mark?op=add&bkmk='+encodeURIComponent(document.location.href)+'&title='+encodeURIComponent(document.title),'_blank','toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=600, height=450,top=100,left=350');void(0)" ></a>
                </div>
				<div class="about">
					<ul>
						<li>
							<h4>EMAIL US</h4>
							<p><?=$seller['email_address']?></p>
						</li>
						<li>
							<h4>REACH US</h4>
							<p><?=$seller['business_phone']?></p>
						</li>
						<li>
							<h4>VISIT US</h4>
							<p><?=$seller['location']?></p>
						</li>
					</ul>
				</div>
				<div class="hr"></div>
			</li>
			<li class="li1">
				<div class="img"></div>
				<div class="join">
					<h3>Join our Mailing List  </h3>
					<p>Get exclusive daily deals sent  straight to your inbox.</p>
					<input type="text" id="email_val">
					<input type="button" value="JOIN" id="join">
				</div>
			</li>
		</ul>
	</section>
	<section class="footer">
		<div class="center">
			<div class="adiv">
				<a href="" target="_blank">Track Order</a>
				<a href="/about" target="_blank">About Us </a>
				<a href="" target="_blank">Policies</a>
				<a href="/about/contactus" target="_blank">Contact</a>
				<a class="last" href="/about/contactus" target="_blank">Chat Online</a>
			</div>
			<div class="idiv">
                <?php if(!empty($link)):?>
                    <?php foreach($link as $k => $v):?>
                        <a href="<?=$v['link']?>"><i style="background-image:url(<?=$v['logo']?>)"></i></a>
						<a href="<?=$v['link']?>"><i style="background-image:url(<?=$v['logo']?>)"></i></a>
						<a href="<?=$v['link']?>"><i style="background-image:url(<?=$v['logo']?>)"></i></a>
                    <?php endforeach; ?>
                <?php endif;?>
			</div>
			<p>© 2003-2016 Glead Kitchen Equipment (Guangzhou) Company — All Rights Reserved</p>
		</div>
		
	</section>
</footer>
<!-- 底部footer  end -->