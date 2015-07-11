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
				<a href="<?php echo U('pro/index/index'); ?>">
					外卖
				</a>
			</li>
			<li>
				<a href="<?php echo U('pro/index/term?id='.mc_get_meta($val['id'],'term')); ?>">
					<?php echo mc_get_page_field(mc_get_meta($val['id'],'term'),'title'); ?>
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
					<h3><?php echo mc_get_meta($val['id'],'price'); ?> 元</h3>
					<h4 class="pro-par-list-title">店铺</h4>
						<ul class="list-inline pro-par-list">
							
							<li>
								<label>
									<span><?php echo mc_get_page_field(mc_get_meta($val['id'],'local'),title); ?></span>
								</label>
							</li>
							
						</ul>
					<form method="post" action="<?php echo U('home/perform/add_cart'); ?>">
					<?php $parameter = M('option')->where("meta_key='parameter' AND type='pro'")->select(); if($parameter) : foreach($parameter as $par) : ?>
					<?php $pro_parameter = mc_get_meta($val['id'],$par['id'],false,'parameter'); if($pro_parameter) : ?>
					<h4 class="pro-par-list-title"><?php echo $par['meta_value']; ?></h4>
					<ul class="list-inline pro-par-list" id="par-list-<?php echo $par['id']; ?>">
					<?php $num=0; ?>
					<?php foreach($pro_parameter as $pro_par) : $num++; ?>
						<li>
							<label <?php if($num==1) echo 'class="active"'; ?>>
								<span><?php echo $pro_par; ?></span>
								<input type="radio" name="parameter[<?php echo $par['id']; ?>]" value="<?php echo $pro_par; ?>"  <?php if($num==1) echo 'checked'; ?>>
							</label>
						</li>
					<?php endforeach; ?>
					<script>
						$('#par-list-<?php echo $par['id']; ?> label').click(function(){
							$('#par-list-<?php echo $par['id']; ?> label').removeClass('active');
							$(this).addClass('active');
						});
					</script>
					</ul>
					<?php endif; ?>
					<?php endforeach; endif; ?>
					<div class="form-group">
						<div class="btn-group">
							<div class="btn-group">
								<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
									购买数量：<span id="buy-num">1</span>
									<span class="caret">
									</span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<?php do { $i++; ?>
									<li>
										<a href="javascript:;">
											<?php echo $i; ?>
										</a>
									</li>
									<?php } while ($i < 10); ?>
								</ul>
							</div>
							<button type="submit" class="btn btn-warning add-cart">
								<i class="glyphicon glyphicon-plus"></i> 加入饭盒
							</button>
						</div>
					</div>
					<input id="buy-num-input" type="hidden" name="number" value="1">
					<input type="hidden" value="<?php echo $val['id']; ?>" name="id">
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php mc_template('Public/kefu'); ?>

<?php mc_template('Public/jianyi'); ?>
	<div class="container">
	<div id="pro-single">
		<div class="row">
			<div class="col-sm-12" id="single">
				
				<hr>
				<div class="text-center">
					<?php echo mc_xihuan_btn($val['id']); ?>
					<?php echo mc_shoucang_btn($val['id']); ?>
					<?php if(mc_is_admin()) { ?>
					<a href="<?php echo U('publish/index/edit?id='.$val['id']); ?>" class="btn btn-warning">
						<i class="glyphicon glyphicon-edit"></i> 编辑
					</a>
					<button class="btn btn-default" data-toggle="modal" data-target="#myModal">
						<i class="glyphicon glyphicon-trash"></i> 删除
					</button>
					<?php } ?>
				</div>
				<hr>
				<div id="entry">
				<?php echo $val['content']; ?>
				</div>
				<hr>
				<?php if(mc_user_id()) : ?>
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
				<?php else : ?>
				<form role="form">
					<div class="form-group">
						<label>
							评论内容
						</label>
						<textarea name="content" class="form-control" rows="3" placeholder="请输入评论内容" disabled></textarea>
						<p class="help-block">您必须在<a href="<?php echo U('user/login/index'); ?>">登陆</a>或<a href="<?php echo U('user/register/index'); ?>">注册</a>后，才可以发表评论！</p>
					</div>
				</form>
				<?php endif; ?>
				<?php if(mc_comment_count($val['id'])) : ?>
				<hr>
				<h3>全部评论（<?php echo mc_comment_count($val['id']); ?>）</h3>
				<hr>
				<?php echo W("Comment/index",array($val['id'])); ?>
				<?php endif; ?>
			</div>
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