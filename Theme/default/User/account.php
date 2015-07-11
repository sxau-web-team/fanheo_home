<?php mc_template_part('head-user'); ?>
<?php if(mc_user_id()==$_GET['id']) { $who = '我'; } else { $who = 'TA'; }; ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<ul id="user-nav" class="nav nav-pills nav-justified mb-20">
					<li>
						<a href="<?php echo U('user/index/index?id='.$_GET['id']); ?>">
							<i class="glyphicon glyphicon-list"></i> <?php echo $who; ?>的文章
						</a>
					</li>
					<li>
						<a href="<?php echo U('user/index/shoucang?id='.$_GET['id']); ?>">
							<i class="glyphicon glyphicon-star"></i> <?php echo $who; ?>的收藏
						</a>
					</li>
					<li class="active">
						<a href="<?php echo U('user/index/edit?id='.$_GET['id']); ?>">
							<i class="glyphicon glyphicon-picture"></i> <?php echo $who; ?>的资料
						</a>
					</li>
					<?php if(mc_is_admin() && mc_user_id()==$_GET['id']) : ?>
					<li>
						<a href="<?php echo U('user/index/control?id='.$_GET['id']); ?>">
							<i class="glyphicon glyphicon-play-circle"></i> 网站管理
						</a>
					</li>
					<?php endif; ?>
					<?php if(!mc_is_admin() && mc_user_id()==$_GET['id'] && mc_option('pro_close')!=1) : ?>
					<li>
						<a href="<?php echo U('user/index/pro?id='.$_GET['id']); ?>">
							<i class="glyphicon glyphicon-shopping-cart"></i> <?php echo $who; ?>的商品
						</a>
					</li>
					<?php endif; ?>
				</ul>
				<form role="form">
				    <div class="form-group">
				        <label>
				            用户名
				        </label>
				        <p class="help-block">
				            <?php echo mc_get_meta($_GET['id'],'user_name',true,'user'); ?>
				        </p>
				    </div>
				    <div class="form-group">
				        <label>
				            昵称
				        </label>
				        <p class="help-block">
				            <?php echo mc_user_display_name($_GET['id']); ?>
				        </p>
				    </div>
				    <div class="form-group">
				        <label>
				            邮箱
				        </label>
				        <p class="help-block">
				            <?php echo mc_get_meta($_GET['id'],'user_email',true,'user'); ?>
				        </p>
				    </div>
				    <div class="form-group">
				        <label>
				            头像
				        </label>
				        <div class="row" id="pub-imgadd">
				            <div class="col-sm-2" id="pub-imgadd-btn">
				                <img src="<?php echo mc_user_avatar($_GET['id']); ?>">
				            </div>
				        </div>
				    </div>
				    <div class="form-group">
				        <label>
				            签名
				        </label>
				        <p class="help-block">
				            <?php echo mc_get_page_field($_GET['id'],'content'); ?>
				        </p>
				    </div>
				</form>
			</div>
		</div>
	</div>
<?php mc_template_part('footer'); ?>