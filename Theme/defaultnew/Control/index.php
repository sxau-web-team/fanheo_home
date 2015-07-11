<?php mc_template_part('header'); ?>
	<div class="container">
		<?php mc_template_part('head-control-nav'); ?>
		<div class="row">
			<div class="col-lg-12" id="app-center">
				<div id="single">
					<div class="row">
						<div class="col-sm-3 col-md-3 col-lg-2">
							<div class="thumbnail text-center">
								<a class="img-div" href="<?php echo U('control/index/set'); ?>">
									<img src="<?php echo mc_theme_url(); ?>/img/iconfont-shezhi.png" alt="...">
								</a>
								<div class="caption">
									<h5>
										<a href="<?php echo U('control/index/set'); ?>">网站设置</a>
									</h5>
								</div>
							</div>
						</div>
						<div class="col-sm-3 col-md-3 col-lg-2">
							<div class="thumbnail text-center">
								<a class="img-div" href="<?php echo U('control/index/pro_all'); ?>">
									<img src="<?php echo mc_theme_url(); ?>/img/iconfont-gouwuche.png" alt="...">
								</a>
								<div class="caption">
									<h5>
										<a href="<?php echo U('control/index/set'); ?>">订单管理</a>
									</h5>
								</div>
							</div>
						</div>
						<div class="col-sm-3 col-md-3 col-lg-2">
							<div class="thumbnail text-center">
								<a class="img-div" href="<?php echo U('control/weixin/index'); ?>">
									<img src="<?php echo mc_theme_url(); ?>/img/iconfont-weixin.png" alt="...">
								</a>
								<div class="caption">
									<h5>
										<a href="<?php echo U('control/weixin/index'); ?>">微信连接</a>
									</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php mc_template_part('footer'); ?>