<?php
	if(mc_is_admin()) :
		if(MODULE_NAME=='Home' && CONTROLLER_NAME=='Index' && ACTION_NAME=='index') :
			if($_GET['keyword']=='') :
?>
<a id="site-control" href="#" data-toggle="modal" data-target="#controlModal"><i class="glyphicon glyphicon-cog"></i></a>
<div class="modal fade" id="controlModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="<?php echo U('user/index/site_control'); ?>">
					<div class="form-group">
						<input type="text" name="home_title" class="form-control" placeholder="首页标题" value="<?php echo mc_option('home_title'); ?>">
					</div>
					<div class="form-group">
						<input type="text" name="home_keywords" class="form-control" placeholder="首页关键词,英文半角逗号隔开" value="<?php echo mc_option('home_keywords'); ?>">
					</div>
					<div class="form-group">
						<input type="text" name="home_description" class="form-control" placeholder="首页描述" value="<?php echo mc_option('home_description'); ?>">
					</div>
					<div class="form-group">
						<select class="form-control" name="pro_close">
							<option value="0" <?php if(mc_option('pro_close')!=1) echo 'selected'; ?>>
								开启商品模块
							</option>
							<option value="1" <?php if(mc_option('pro_close')==1) echo 'selected'; ?>>
								关闭商品模块
							</option>
						</select>
					</div>
					<div class="form-group">
						<select class="form-control" name="baobei_close">
							<option value="0" <?php if(mc_option('pbaobei_close')!=1) echo 'selected'; ?>>
								开启分享模块
							</option>
							<option value="1" <?php if(mc_option('baobei_close')==1) echo 'selected'; ?>>
								关闭分享模块
							</option>
						</select>
					</div>
					<div class="form-group">
						<select class="form-control" name="group_close">
							<option value="0" <?php if(mc_option('group_close')!=1) echo 'selected'; ?>>
								开启群组模块
							</option>
							<option value="1" <?php if(mc_option('group_close')==1) echo 'selected'; ?>>
								关闭群组模块
							</option>
						</select>
					</div>
					<div class="form-group">
						<select class="form-control" name="article_close">
							<option value="0" <?php if(mc_option('article_close')!=1) echo 'selected'; ?>>
								开启文章模块
							</option>
							<option value="1" <?php if(mc_option('article_close')==1) echo 'selected'; ?>>
								关闭文章模块
							</option>
						</select>
					</div>
					<input name="home_control" type="hidden" value="ok">
					<button type="submit" class="btn btn-warning btn-block">
						<i class="glyphicon glyphicon-ok-circle"></i> 保存
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
			endif;//$_GET['keyword']==''
		elseif(MODULE_NAME=='Pro' && CONTROLLER_NAME=='Index' && ACTION_NAME=='index') :
?>
<a id="site-control" href="#" data-toggle="modal" data-target="#controlModal"><i class="glyphicon glyphicon-cog"></i></a>
<div class="modal fade" id="controlModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="<?php echo U('user/index/site_control'); ?>">
					<div class="form-group">
						<input type="text" name="pro_title" class="form-control" placeholder="页面标题" value="<?php echo mc_option('pro_title'); ?>">
					</div>
					<div class="form-group">
						<input type="text" name="pro_keywords" class="form-control" placeholder="页面关键词,英文半角逗号隔开" value="<?php echo mc_option('pro_keywords'); ?>">
					</div>
					<div class="form-group">
						<input type="text" name="pro_description" class="form-control" placeholder="页面描述" value="<?php echo mc_option('pro_description'); ?>">
					</div>
					<input name="pro_control" type="hidden" value="ok">
					<button type="submit" class="btn btn-warning btn-block">
						<i class="glyphicon glyphicon-ok-circle"></i> 保存
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
		elseif(MODULE_NAME=='Baobei' && CONTROLLER_NAME=='Index' && ACTION_NAME=='index') :
?>
<a id="site-control" href="#" data-toggle="modal" data-target="#controlModal"><i class="glyphicon glyphicon-cog"></i></a>
<div class="modal fade" id="controlModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="<?php echo U('user/index/site_control'); ?>">
					<div class="form-group">
						<input type="text" name="baobei_title" class="form-control" placeholder="页面标题" value="<?php echo mc_option('baobei_title'); ?>">
					</div>
					<div class="form-group">
						<input type="text" name="baobei_keywords" class="form-control" placeholder="页面关键词,英文半角逗号隔开" value="<?php echo mc_option('baobei_keywords'); ?>">
					</div>
					<div class="form-group">
						<input type="text" name="baobei_description" class="form-control" placeholder="页面描述" value="<?php echo mc_option('baobei_description'); ?>">
					</div>
					<input name="baobei_control" type="hidden" value="ok">
					<button type="submit" class="btn btn-warning btn-block">
						<i class="glyphicon glyphicon-ok-circle"></i> 保存
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
		elseif(MODULE_NAME=='Post' && CONTROLLER_NAME=='Group' && ACTION_NAME=='index') :
?>
<a id="site-control" href="#" data-toggle="modal" data-target="#controlModal"><i class="glyphicon glyphicon-cog"></i></a>
<div class="modal fade" id="controlModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="<?php echo U('user/index/site_control'); ?>">
					<div class="form-group">
						<input type="text" name="group_title" class="form-control" placeholder="页面标题" value="<?php echo mc_option('group_title'); ?>">
					</div>
					<div class="form-group">
						<input type="text" name="group_keywords" class="form-control" placeholder="页面关键词,英文半角逗号隔开" value="<?php echo mc_option('group_keywords'); ?>">
					</div>
					<div class="form-group">
						<input type="text" name="group_description" class="form-control" placeholder="页面描述" value="<?php echo mc_option('group_description'); ?>">
					</div>
					<input name="group_control" type="hidden" value="ok">
					<button type="submit" class="btn btn-warning btn-block">
						<i class="glyphicon glyphicon-ok-circle"></i> 保存
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
		elseif(MODULE_NAME=='Article' && CONTROLLER_NAME=='Index' && ACTION_NAME=='index') :
?>
<a id="site-control" href="#" data-toggle="modal" data-target="#controlModal"><i class="glyphicon glyphicon-cog"></i></a>
<div class="modal fade" id="controlModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="<?php echo U('user/index/site_control'); ?>">
					<div class="form-group">
						<input type="text" name="article_title" class="form-control" placeholder="页面标题" value="<?php echo mc_option('article_title'); ?>">
					</div>
					<div class="form-group">
						<input type="text" name="article_keywords" class="form-control" placeholder="页面关键词,英文半角逗号隔开" value="<?php echo mc_option('article_keywords'); ?>">
					</div>
					<div class="form-group">
						<input type="text" name="article_description" class="form-control" placeholder="页面描述" value="<?php echo mc_option('article_description'); ?>">
					</div>
					<input name="article_control" type="hidden" value="ok">
					<button type="submit" class="btn btn-warning btn-block">
						<i class="glyphicon glyphicon-ok-circle"></i> 保存
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
		endif;
	endif;//is_admin
?>