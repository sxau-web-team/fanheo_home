<?php mc_template_part('header'); ?>
<?php mc_template_part('head-user'); ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12" id="pro-all-list">
				<?php mc_template_part('head-user-nav'); ?>
				<?php foreach($page as $val) : ?>
				<div class="panel panel-default">
				<div class="panel-heading">
					<a href="<?php echo U('user/index/index?id='.$val['user_id']); ?>"><?php echo mc_user_display_name($val['user_id']); ?></a> <?php echo mdate($val['creat_time']); ?>
					订单号：<?php echo $val['number'];?>
					<?php //echo date('Y-m-d H:i:s',$val['date']); ?>
				</div>
				<ul class="list-group" id="cart">
			
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
							<span class="btn btn-warning btn-sm">单价：<?php echo mc_get_meta($val['pro_id'],'price'); ?> 元</span>
							<span class="btn btn-warning btn-sm">数量：<?php echo $val['count']; ?></span>
							
						</div>
					</div>
					<div class="cart-status <?php echo $val['status']; ?>">
						<?php if($val['status']=='1') : ?>
						<span class="btn btn-warning btn-sm">等待配送</span>
						<?php elseif($val['status']=='2') : ?>
						<span class="btn btn-warning btn-sm">厨房正在制作中</span>
						<?php elseif($val['status']=='3') : ?>
					<form type="hidden" name="form1" method="post" action="<?php echo U('user/index/affirm'); ?>">
				
						<input type="hidden" value="<?php echo $val['number'];?>" name="number">
						<input type="hidden" value="<?php echo $val['user_id'];?>" name="user_id">
						<button type="submit" class="btn btn-warning btn-sm">已配送<br/>点击确认收货</button>
						
					</form>
						
						<?php elseif($val['status']=='4') : ?>
						<span class="btn btn-warning btn-sm">交易完成</span>
						
					<?php elseif($val['status']=='5') : ?>
						<span class="btn btn-warning btn-sm">订单已删除</span>
						<?php endif; ?>
					</div>
				</li>
				
				</ul>
				<div class="panel-footer">
					收货地址：
					<?php
						echo M('order')->where("number='".$val['number']."'")->getField('address');
					?>
				</div>
				</div>
				<?php endforeach; ?>
				<?php echo mc_pagenavi($count,$page_now); ?>
			</div>
		</div>
	</div>
<?php mc_template_part('footer'); ?>