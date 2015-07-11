<?php mc_template_part('header'); ?>
	<div class="container">
			<div class="panel panel-default" id="cart">
			<!-- Default panel contents -->
			<div class="panel-heading">
				<i class="glyphicon glyphicon-search"></i>搜索结果
			</div>
				<?php if($page) : ?>
			<ul class="list-group">
			<?php foreach($page as $val) : ?>
			<li class="list-group-item pr">
				<div class="media">
					<a class="pull-left img-div" href="<?php echo U('pro/index/single?id='.$val['id']); ?>">
						<?php $fmimg_args = mc_get_meta($val['id'],'fmimg',false); ?>
						<img class="media-object" src="<?php echo $fmimg_args[0]; ?>" alt="<?php echo mc_get_page_field($val['id'],'title'); ?>">
					</a>
					<div class="media-body">
						<h4 class="media-heading">
							<a href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><?php echo mc_get_page_field($val['id'],'title'); ?></a>
						</h4>
						
						
					<div class="form-group">
						<div class="btn-group">
							<div class="btn-group">
								<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
									单价：<span id="buy-num"><?php echo mc_get_meta($val['id'],'price'); ?> 元</span>
									
								</button>
								<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
									商家：<span id="buy-num"><?php echo mc_get_meta($val['id'],'local'); ?></span>
									
								</button>
								
							</div>
				
						</div>
					</div>
					<input id="buy-num-input" type="hidden" name="number" value="1">
					<input type="hidden" value="<?php echo $val['id']; ?>" name="id">
					
					</div>
				</div>
				<a href="<?php echo U('home/perform/add_cart','id='.$val['id'].'&number=1'); ?>" class="delete-cart">加入购物车</a> 
				
			</li>
			<?php endforeach; ?>
			</ul>
				<?php else : ?>
				<div id="nothing">没有搜索到任何东东！</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php mc_template_part('footer'); ?>