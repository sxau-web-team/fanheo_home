<?php mc_template_part('header'); ?>
	<div class="container">
		<ol class="breadcrumb mb-20 mt-20" id="baobei-term-breadcrumb">
			<li>
				<a href="<?php echo U('home/index/index'); ?>">
					首页
				</a>
			</li>
			<li>
				<a href="<?php echo U('post/group/index'); ?>">
					群组
				</a>
			</li>
			<li class="active">
				群组
			</li>
			<div class="pull-right">
				<?php if(mc_is_admin()) : ?>
				<a href="<?php echo U('post/group/pending'); ?>" class="active">待审群组</a>
				<?php endif; ?>
				<a href="<?php echo U('publish/index/add_group'); ?>" class="publish">新建群组</a>
			</div>
		</ol>
		<div class="row mb-20" id="group-list">
			<?php foreach($page as $val) : ?>
			<div class="col-sm-3 col">
				<div class="panel panel-default pr">
					<a href="<?php echo U('post/group/single?id='.$val['id']); ?>" class="img-div">
						<img src="<?php echo mc_fmimg($val['id']); ?>">
					</a>
					<a href="<?php echo U('post/group/single?id='.$val['id']); ?>" class="panel-heading">
						<?php echo $val['title']; ?>
					</a>
					<div class="panel-body">
						<?php echo strip_tags($val['content']); ?>
						<?php if($val['type']=='group_pending' && mc_is_admin()) : ?>
						<a href="<?php echo U('home/perform/review?id='.$val['id']); ?>" class="btn btn-info btn-xs">
							<i class="glyphicon glyphicon-ok-circle"></i> 通过审核
						</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php echo mc_pagenavi($count,$page_now); ?>
	</div>
<?php mc_template_part('footer'); ?>