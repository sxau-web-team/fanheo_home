<div class="container mb-20">
	<div class="row">
		<div class="col-lg-12">
			<div id="user-header" class="media" style="background-image: url(<?php if(mc_fmimg($_GET['id'])) : echo mc_fmimg($_GET['id']); else : echo mc_theme_url().'/img/user_bg.jpg'; endif; ?>);">
				<a class="pull-left img-div" href="<?php echo U('user/index/index?id='.$_GET['id']); ?>">
					<img class="media-object" src="<?php echo mc_user_avatar($_GET['id']); ?>" alt="<?php echo mc_user_display_name($_GET['id']); ?>">
				</a>
				<div class="media-body">
					<h4 class="media-heading">
						<?php echo mc_user_display_name($_GET['id']); ?> 
						<?php echo mc_guanzhu_btn($_GET['id']); ?>
					</h4>
					<?php echo mc_cut_str(strip_tags(mc_get_page_field($_GET['id'],'content')), 65); ?>
				</div>
				<div id="user-header-cover"></div>
			</div>
		</div>
	</div>
</div>