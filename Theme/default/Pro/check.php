<?php mc_template_part('header'); ?>
	<div class="container">
	<div class="panel panel-default" id="cart">
			<!-- Default panel contents -->
			<div class="panel-heading">
				<i class="glyphicon glyphicon-file"></i> 订单确认
			</div>
			<?php if($page) : ?>
			<ul class="list-group">
			<?php foreach($page as $val) : ?>
			<li class="list-group-item pr">
				<div class="media">
					<a class="pull-left img-div" href="<?php echo U('pro/index/single?id='.$val['page_id']); ?>">
						<?php $fmimg_args = mc_get_meta($val['page_id'],'fmimg',false); ?>
						<img class="media-object" src="<?php echo $fmimg_args[0]; ?>" alt="<?php echo mc_get_page_field($val['page_id'],'title'); ?>">
					</a>
					<div class="media-body">
						<h4 class="media-heading">
							<a href="<?php echo U('pro/index/single?id='.$val['page_id']); ?>"><?php echo mc_get_page_field($val['page_id'],'title'); ?></a>
						</h4>
						<span class="btn btn-danger btn-sm">单价：<?php echo mc_get_meta($val['page_id'],'price'); ?> 元</span>
						<span class="btn btn-info btn-sm">数量：<?php echo $val['action_value']; ?></span>
					</div>
				</div>
				
			</li>
			<?php endforeach; ?>
			</ul>
			<div class="panel-footer">
				<div class="row">
					<div class="col-sm-6">
						<div class="btn btn-link" id="total">商品总价：<span><?php echo mc_total(); ?></span> 元</div>
					</div>
					
				</div>
			</div>
			<?php else : ?>
			<div class="panel-body text-center">购物车里没有任何商品</div>
			<?php endif; ?>
		</div>
		<div class="panel panel-default" id="checkout">
			<!-- Default panel contents -->
			<div class="panel-heading">
				<i class="glyphicon glyphicon-map-marker"></i> 收货信息
			</div>
			
			<div class="panel-body">
			<div class="alert alert-success" role="alert"><?php echo '<h5>'.$_POST['address'].$_POST['buyer_address'].'    '.$_POST['buyer_name'].'    手机：'.$_POST['buyer_phone'].'</h5>';?></div>
			</div>
			<div class="panel-footer">
				<a href="<?php echo U('pro/cart/index'); ?>" class="btn btn-info">
					<i class="glyphicon glyphicon-circle-arrow-left"></i> 上一步
				</a>
			<form type="hidden" method="post" action="<?php echo U('pro/post/post'); ?>">
				
				
				<button type="submit" class="btn btn-warning pull-right">
					<i class="glyphicon glyphicon-usd"></i> 确认订单
				</button>
				<input type="hidden" value="<?php echo $_POST['address'].$_POST['buyer_address']; ?>" name="address">
				<input type="hidden" value="<?php echo $_POST['buyer_name']; ?>" name="user_name">
				<input type="hidden" value="<?php echo $_POST['buyer_phone']; ?>" name="phone">
			</form>
			</div>
		
		</div>
	</div>
<?php mc_template_part('footer'); ?>