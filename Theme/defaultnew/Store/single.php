<?php mc_template_part('header'); ?>
	<?php foreach($page as $val) : ?>
	<div class="container">
		<ol class="breadcrumb" id="baobei-breadcrumb">
			<li>
				<a href="<?php echo U('home/index/index'); ?>">
					首页
				</a>
			</li>
			<li>
				<a href="<?php echo U('store/index/index'); ?>">
					店铺
				</a>
			</li>
			
			<li class="active">
				<?php echo $val['title']; ?>
			</li>
		</ol>

	</div>
	<div id="single-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-6" id="pro-index-tl">
					<div id="pro-index-tlin">
					<?php $fmimg_args = mc_get_meta($val['id'],'fmimg',false); $fmimg_args = array_reverse($fmimg_args); ?>
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<?php foreach($fmimg_args as $fmimg) : ?>
							<?php $fmimg_num++; ?>
							<li data-target="#carousel-example-generic" data-slide-to="<?php echo $fmimg_num-1; ?>" class="<?php if($fmimg_num==1) echo 'active'; ?>"></li>
							<?php endforeach; ?>
						</ol>
						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<?php $fmimg_num=0; ?>
							<?php foreach($fmimg_args as $fmimg) : ?>
							<?php $fmimg_num++; ?>
							<div class="item <?php if($fmimg_num==1) echo 'active'; ?>">
								<div class="imgshow"><img src="<?php echo $fmimg; ?>" alt="<?php echo $val['title']; ?>"></div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					</div>
				</div>
				<div class="col-sm-6" id="pro-index-tr">
					<div id="pro-index-trin">
					<h1>
						<?php echo $val['title']; ?>
					</h1>
					
					<p><h3>“<?php echo mc_get_meta($val['id'],'public'); ?>”</h3></p>
					<h4 class="pro-par-list-title">店长</h4>
						
									<p style=""><h5><?php echo mc_get_meta($val['id'],'header'); ?></h5></p>
						
						<h4 class="pro-par-list-title">厨师</h4>
						
									<p><?php echo mc_get_meta($val['id'],'cook'); ?></p>
						
						<h4 class="pro-par-list-title">电话</h4>
						<ul class="list-inline pro-par-list">
							<li>
								<label>
									<p><?php echo mc_get_meta($val['id'],'phone'); ?></p>
								</label>
							</li>
							
							
						</ul>

					</div>
					<br/>
					<div id="pro-index-trin">
					<hr>
						<div class="text-center">
							<?php echo mc_xihuan_btn($val['id']); ?>
							<?php echo mc_shoucang_btn($val['id']); ?>
							<?php if(mc_is_admin()) { ?>
							<a href="<?php echo U('publish/index/edit?id='.$val['id']); ?>" class="btn btn-info">
								<i class="glyphicon glyphicon-edit"></i> 编辑
							</a>
							<button class="btn btn-default" data-toggle="modal" data-target="#myModal">
								<i class="glyphicon glyphicon-trash"></i> 删除
							</button>
							<?php } ?>
						</div>
					<hr>
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
	<div class="container" id="pro-single">
		<div class="row">
			<div class="col-sm-12" id="single">
			<div class="row mb-20" id="pro-list">
				<?php 
					
					$lid=$val['id'];
    				$condition['type'] = 'pro';
		        	$args_id = M('meta')->where("meta_key='local' AND meta_value='$lid' AND type='basic'")->getField('page_id',true);
		        	$condition['id']  = array('in',$args_id);
			    	$pagey = M('page')->where($condition)->order('date desc')->select();
			    	
					?>
					<?php foreach($pagey as $val) : ?>
					<?php $num_newproa++; ?>
						<div class="col-sm-6 col-md-4 col-lg-3 ">
							<div class="thumbnail">
								<?php $fmimg_args = mc_get_meta($val['id'],'fmimg',false); ?>
								<a target="_blank" class="img-div" href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><img src="<?php echo $fmimg_args[0]; ?>" alt="<?php echo mc_get_page_field($val['id'],'title'); ?>"></a>
								<div class="caption">
									<h4>
										<a href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><?php echo mc_get_page_field($val['id'],'title'); ?></a>
									</h4>
									<p class="price pull-left">
										<span><?php echo mc_get_meta($val['id'],'price'); ?></span> <small>元</small>
									</p>
									<a href="<?php echo U('home/perform/add_cart','id='.$val['id'].'&number=1'); ?>" class="btn btn-warning btn-xs pull-right">
										<i class="glyphicon glyphicon-plus"></i> 加入饭盒
									</a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					</div>
				<hr>
				<?php if(mc_comment_count($val['id'])) : ?>
				<h3>全部评论（<?php echo mc_comment_count($val['id']); ?>）</h3>
				<hr>
				<?php echo W("Comment/index",array($val['id'])); ?>
				<hr>
				<?php endif; ?>
				<?php if(mc_user_id()) { ?>
				<form role="form" method="post" action="<?php echo U('home/perform/comment'); ?>">
					<div class="form-group">
						<label for="exampleInputEmail1">
							评论内容
						</label>
						<textarea name="content" class="form-control" rows="3" placeholder="请输入评论内容"></textarea>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-block btn-warning">
							<i class="glyphicon glyphicon-ok"></i> 提交
						</button>
					</div>
					<input type="hidden" name="id" value="<?php echo $val['id']; ?>">
				</form>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php if(mc_is_admin()) : ?>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title" id="myModalLabel">
						
					</h4>
				</div>
				<div class="modal-body text-center">
					确认要删除这篇文章吗？
				</div>
				<div class="modal-footer" style="text-align:center;">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						<i class="glyphicon glyphicon-remove"></i> 取消
					</button>
					<a class="btn btn-danger" href="<?php echo U('home/perform/delete?id='.$val['id']); ?>">
						<i class="glyphicon glyphicon-ok"></i> 确定
					</a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<?php endif; ?>
	<?php endforeach; ?>
<?php mc_template_part('footer'); ?>