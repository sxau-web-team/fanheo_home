<?php mc_template_part('header'); ?>
<?php mc_template_part('head-user'); ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12" id="pro-all-list">
				<?php mc_template_part('head-user-nav'); ?>
				<?php foreach($page as $trade) : ?>
				<div class="panel panel-default">
				<div class="panel-heading">
					<a href="<?php echo U('user/index/index?id='.$trade['user_id']); ?>"><?php echo mc_user_display_name($trade['user_id']); ?></a> <?php echo $trade['creat_time']; ?>
					订单号：<?php echo $trade['number'];?>
					<?php //echo date('Y-m-d H:i:s',$trade['date']); ?>
				</div>
				<ul class="list-group" id="cart">
				<?php $cart = M('order')->where("number='".$trade['number']."' and creat_time='".$trade['creat_time']."'")->order('id desc')->select(); ?>
				<?php foreach($cart as $val) : ?>
				<li class="list-group-item pr">
					<div class="media">
						<a class="pull-left img-div" href="<?php echo U('pro/index/single?id='.$val['pro_id']); ?>">
							<?php $fmimg_args = mc_get_meta($val['pro_id'],'fmimg',false); ?>
							<img class="media-object" src="<?php echo $fmimg_args[0]; ?>" alt="<?php echo mc_get_page_field($val['pro_id'],'title'); ?>">
						</a>
						<div class="media-body">
							<h4 class="media-heading">
								<a href="<?php echo U('pro/index/single?id='.$val['pro_id']); ?>"><?php echo mc_get_page_field($val['pro_id'],'title'); ?></a>
							</h4>
							<span class="btn btn-danger btn-sm">单价：<?php echo mc_get_meta($val['pro_id'],'price'); ?> 元</span>
							<span class="btn btn-info btn-sm">数量：<?php echo $val['count']; ?></span>
							<?php //$parameter = M('action')->where("page_id='".$val['id']."' AND user_id='".mc_user_id()."'")->order('id asc')->getField('action_value',true); if($parameter) : ?>
							<!--<ul class="list-inline mt-10">
							<?php //foreach($parameter as $par) : list($par_name,$par_value) = explode('|',$par); ?>
							<li><span class="btn btn-success btn-sm"><?php //echo $par_name; ?>：<?php //echo $par_value; ?></span></li>
							<?php //endforeach; ?>
							</ul>-->
							<?php //endif; ?>
						</div>
					</div>
					<div class="cart-status <?php echo $val['status']; ?>">
						<?php if($val['status']=='0') : ?>
						<a >等待发货</a>
						<?php elseif($val['status']=='1') : ?>
						<a>已发货</a>
						<?php elseif($val['action_key']=='wait_finished') : ?>
						交易完成
						<?php endif; ?>
					</div>
				</li>
				<?php endforeach; ?>
				</ul>
				<div class="panel-footer">
					收货地址：
					<?php
						echo M('order')->where("number='".$trade['number']."'")->getField('address');
					?>
				</div>
				</div>
				<?php endforeach; ?>
				<?php echo mc_pagenavi($count,$page_now); ?>
			</div>
		</div>
	</div>
<?php mc_template_part('footer'); ?>