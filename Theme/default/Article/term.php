<?php mc_template_part('header'); ?>
	<div class="container">
		<div class="row mb-20 mt-20">
			<div class="col-sm-6">
				<ol class="breadcrumb" id="baobei-term-breadcrumb">
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
					<li class="active">
						<?php echo mc_get_page_field($id,'title'); ?>
					</li>
				</ol>
			</div>
			<div class="col-sm-6 text-right">
				<?php if(mc_is_admin()) : ?>
				<a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#addtermModal">添加分类</a>
				<a href="<?php echo U('publish/index/add_article'); ?>" class="btn btn-sm btn-warning">写文章</a>
				<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#edittermModal">编辑分类</a>
				<a href="#" class="btn btn-sm btn-default" data-toggle="modal" data-target="#deltermModal">删除分类</a>
				<?php endif; ?>
			</div>
		</div>
		<ul id="user-nav" class="nav nav-pills nav-justified mb-20">
			<li>
				<a href="<?php echo U('article/index/index'); ?>">
					全部
				</a>
			</li>
			<?php $terms = M('page')->where('type="term_article"')->order('id desc')->select(); ?>
			<?php foreach($terms as $val) : ?>
			<li <?php if($id==$val['id']) echo 'class="active"'; ?>>
				<a href="<?php echo U('article/index/term?id='.$val['id']); ?>">
					<?php echo $val['title']; ?>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
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
					<div class="form-group">
						<label>
							分类类型
						</label>
						<select class="form-control" name="type">
							<option value="pro">
								商品
							</option>
							<option value="baobei">
								宝贝
							</option>
							<option value="article" selected>
								文章
							</option>
						</select>
					</div>
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