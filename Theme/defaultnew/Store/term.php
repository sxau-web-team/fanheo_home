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
						<a href="<?php echo U('store/index/index'); ?>">
							商家
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
				<a href="<?php echo U('publish/index/add_local'); ?>" class="btn btn-sm btn-warning">添加店铺</a>
				<a href="<?php echo U('publish/index/index'); ?>" class="btn btn-sm btn-warning">发布商品</a>
				<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#edittermModal">编辑分类</a>
				<a href="#" class="btn btn-sm btn-default" data-toggle="modal" data-target="#deltermModal">删除分类</a>
				<?php endif; ?>
			</div>
		</div>

		<ul id="user-nav" class="nav nav-pills nav-justified mb-20">
			<li class="active">
				<a href="<?php echo U('store/index/index'); ?>">
					全部店铺
				</a>
			</li>
			<?php $terms = M('page')->where('type="term_local"')->order('id desc')->select(); ?>
			<?php foreach($terms as $val) : ?>
			<li>
				<a href="<?php echo U('store/index/term?id='.$val['id']); ?>">
					<?php echo $val['title']; ?>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
		<div class="row" id="pro-list">
			<?php foreach($page as $val) : ?>
			<div class="col-sm-6 col-md-4 col-lg-3 col">
				<div class="thumbnail">
					<?php $fmimg_args = mc_get_meta($val['id'],'fmimg',false); ?>
					<a class="img-div" href="<?php echo U('store/index/single?id='.$val['id']); ?>"><img src="<?php echo $fmimg_args[0]; ?>" alt="<?php echo $val['title']; ?>"></a>
					<div class="caption">
						<h4>
							<a href="<?php echo U('store/index/single?id='.$val['id']); ?>"><?php echo mc_get_page_field(mc_get_meta($val['id'],'local'),'title'); ?>-<?php echo $val['title']; ?></a>
						</h4>
						<p class="price pull-left">
							<span><?php echo mc_get_meta($val['id'],'public'); ?></span> 
						</p>
						
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
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
							<option value="pro" selected>
								商品
							</option>
							<option value="baobei">
								宝贝
							</option>
							<option value="local">
								店铺
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
					注意：当前分类下的所有店铺都会被删除！
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