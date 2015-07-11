<?php mc_template_part('header'); ?>
	<div class="container">
		<ol class="breadcrumb mb-20 mt-20" id="baobei-term-breadcrumb">
			<li>
				<a href="<?php echo U('home/index/index'); ?>">
					首页
				</a>
			</li>
			<li>
				<a href="<?php echo U('article/index/index'); ?>">
					发现
				</a>
			</li>
			<li class="active">
				<?php echo mc_get_page_field($id,'title'); ?>
			</li>
			<div class="pull-right">
				<?php if(mc_is_admin()) : ?>
				<a href="#" data-toggle="modal" data-target="#addtermModal">添加分类</a>
				<a href="#" data-toggle="modal" data-target="#edittermModal">编辑分类</a>
				<a href="#" data-toggle="modal" data-target="#deltermModal">删除分类</a>
				<a href="<?php echo U('publish/index/add_article'); ?>" class="publish">写发现</a>
				<?php endif; ?>
			</div>
		</ol>
		<div id="article-list">
			<div class="row">
				<?php foreach($page as $val) : ?>
				<div class="col-md-6">
					<div class="thumbnail">
						<a href="<?php echo U('article/index/single?id='.$val['id']); ?>" class="img-div"><img src="<?php echo mc_fmimg($val['id']); ?>" alt="<?php echo $val['title']; ?>"></a>
						<div class="caption">
							<h3>
								<a href="<?php echo U('article/index/single?id='.$val['id']); ?>"><?php echo $val['title']; ?></a>
							</h3>
							<p>
								<?php echo mc_cut_str(strip_tags($val['content']),200); ?>
							</p>
							<ul class="list-inline">
								<li><?php echo mc_xihuan_btn($val['id']); ?></li>
								<li><?php echo mc_shoucang_btn($val['id']); ?></li>
							</ul>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php echo mc_pagenavi($count,$page_now); ?>
	</div>
	<?php if(mc_is_admin()) : ?>
	<!-- Modal -->
	<div class="modal fade" id="addtermModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					
				</div>
				<form role="form" method="post" action="<?php echo U('home/perform/publish_term'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label>
							分类名称
						</label>
						<input name="title" type="text" class="form-control" placeholder="">
					</div>
					<input type="hidden" name="type" value="article">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-warning btn-block">
						<i class="glyphicon glyphicon-ok"></i> 保存
					</button>
				</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<div class="modal fade" id="edittermModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					
				</div>
				<form role="form" method="post" action="<?php echo U('home/perform/edit_term'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label>
							分类名称
						</label>
						<input name="title" type="text" class="form-control" value="<?php echo mc_get_page_field($id,'title'); ?>" placeholder="">
					</div>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-warning btn-block">
						<i class="glyphicon glyphicon-ok"></i> 保存
					</button>
				</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<div class="modal fade" id="deltermModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					
				</div>
				<div class="modal-body text-center">
					<p>确认要删除这个分类吗？</p>
					注意：当前分类下的所有商品都会被删除！
				</div>
				<div class="modal-footer" style="text-align:center;">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						<i class="glyphicon glyphicon-remove"></i> 取消
					</button>
					<a class="btn btn-danger" href="<?php echo U('home/perform/delete?id='.$id); ?>">
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
<?php mc_template_part('footer'); ?>