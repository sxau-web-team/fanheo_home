<?php mc_template_part('header'); ?>
<div id="single-head-img" class="pr">
	<div class="single-head-img shi1" style="background-image: url(<?php if(mc_fmimg($_GET['id'])) : echo mc_fmimg($_GET['id']); else : echo mc_theme_url().'/img/user_bg.jpg'; endif; ?>);"></div>
	<div class="single-head-img shi2"></div>
	<div class="single-head-img shi3">
		<h1><?php echo mc_user_display_name($_GET['id']); ?></h1>
		<h4><?php echo mc_cut_str(strip_tags(mc_get_page_field($_GET['id'],'content')), 80); ?></h4>
	</div>
</div>
	<?php foreach($page as $val) : ?>
	<div class="container">
		<ol class="breadcrumb" id="baobei-breadcrumb">
			<li>
				<a href="<?php echo U('home/index/index'); ?>">
					首页
				</a>
			</li>
			<li>
				<a href="<?php echo U('article/index/index'); ?>">
					文章
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
	<div class="container" id="pro-single">
		<div class="row">
			<div class="col-sm-12" id="single">
				<div id="entry">
				<?php echo $val['content']; ?>
				</div>
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