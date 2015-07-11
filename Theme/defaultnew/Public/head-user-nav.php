<ul id="user-nav" class="nav nav-pills nav-justified mb-20">
<?php if(!mc_is_admin() && mc_user_id()==$_GET['id'] && mc_option('pro_close')!=1) : ?>
	<li <?php if(ACTION_NAME=='pro2') echo 'class="active"'; ?>>
		<a href="<?php echo U('user/index/pro2?id='.$_GET['id']); ?>">
			<i class="glyphicon glyphicon-shopping-cart"></i> <?php echo mc_user_display_name($_GET['id']); ?>的饭盒
		</a>
	</li>
	<?php endif; ?>
	<li <?php if(ACTION_NAME=='index') echo 'class="active"'; ?>>
		<a href="<?php echo U('user/index/index?id='.$_GET['id']); ?>">
			<i class="glyphicon glyphicon-list"></i> 动态
		</a>
	</li>
	<li <?php if(ACTION_NAME=='shoucang') echo 'class="active"'; ?>>
		<a href="<?php echo U('user/index/shoucang?id='.$_GET['id']); ?>">
			<i class="glyphicon glyphicon-star"></i> 收藏
		</a>
	</li>
	<li <?php if(ACTION_NAME=='guanzhu') echo 'class="active"'; ?>>
		<a href="<?php echo U('user/index/guanzhu?id='.$_GET['id']); ?>">
			<i class="glyphicon glyphicon-ok-circle"></i> 关注
		</a>
	</li>
	<li <?php if(ACTION_NAME=='fans') echo 'class="active"'; ?>>
		<a href="<?php echo U('user/index/fans?id='.$_GET['id']); ?>">
			<i class="glyphicon glyphicon-ok-circle"></i> 粉丝
		</a>
	</li>
	<?php if(mc_user_id()==$_GET['id']) : ?>
	<li <?php if(ACTION_NAME=='edit') echo 'class="active"'; ?>>
		<a href="<?php echo U('user/index/edit?id='.$_GET['id']); ?>">
			<i class="glyphicon glyphicon-cog"></i> 资料
		</a>
	</li>
	<?php endif; ?>
	<?php if(mc_is_admin() && mc_user_id()==$_GET['id']) : ?>
	<li <?php if(ACTION_NAME=='control') echo 'class="active"'; ?>>
		<a href="<?php echo U('user/index/control?id='.$_GET['id']); ?>">
			<i class="glyphicon glyphicon-wrench"></i> 设置
		</a>
	</li>
	<li <?php if(ACTION_NAME=='manage') echo 'class="active"'; ?>>
		<a href="<?php echo U('user/index/manage?id='.$_GET['id']); ?>">
			<i class="glyphicon glyphicon-user"></i> 用户
		</a>
	</li>
	<li <?php if(ACTION_NAME=='pro_all') echo 'class="active"'; ?>>
		<a href="<?php echo U('user/index/pro_all2?id='.$_GET['id']); ?>">
			<i class="glyphicon glyphicon-shopping-cart"></i> 订单
		</a>
	</li>
	<?php endif; ?>
	
</ul>