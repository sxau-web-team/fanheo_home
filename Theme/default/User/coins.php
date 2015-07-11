<?php mc_template_part('header'); ?>
<?php mc_template_part('head-user'); ?>
	<div class="container">
		<div class="mb-20">
			<h4 class="row">
				<div class="col-sm-6">共有<?php echo mc_coins(mc_user_id()); ?>积分</div>
				<div class="col-sm-6 text-right">
					<a href="<?php echo U('pro/index/index'); ?>" class="btn btn-warning btn-xs">兑换礼品</a>
				</div>
			</h4>
			<div class="panel panel-default">
				<ul class="list-group">
					<?php foreach($page as $val) : ?>
					<li class="list-group-item">
						<?php echo date('Y-m-d H:i:s',$val['date']); ?> 通过 <?php echo mc_get_page_field($val['page_id'],'title'); ?> 获取 <?php echo $val['action_value']; ?> 积分
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
<?php mc_template_part('footer'); ?>