<?php mc_template_part('header'); ?>
<?php mc_template_part('head-user'); ?>
	<div class="container">
		<div class="home-main">
			<h4 class="title">
				<i class="glyphicon glyphicon-usd" style="top:2px;"></i> 共有<?php echo mc_coins(mc_user_id()); ?>积分
				<a class="pull-right" style="width:auto; padding:0 15px;" href="<?php echo U('pro/index/index'); ?>">兑换礼品</a>
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