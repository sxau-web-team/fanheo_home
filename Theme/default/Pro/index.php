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
					<li class="active">
						商品
					</li>
				</ol>
			</div>
			<div class="col-sm-6 text-right">
				<?php if(mc_is_admin()) : ?>
				<a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#parameterModal">商品参数</a>
				<a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#addtermModal">添加分类</a>
				<a href="<?php echo U('publish/index/add_local'); ?>" class="btn btn-sm btn-warning">添加店铺</a>
				<a href="<?php echo U('publish/index/index'); ?>" class="btn btn-sm btn-warning">发布商品</a>
				<?php endif; ?>
			</div>
		</div>
		<ul id="user-nav" class="nav nav-pills nav-justified mb-20">
			<li class="active">
				<a href="<?php echo U('pro/index/index'); ?>">
					全部分类
				</a>
			</li>
			<?php $terms = M('page')->where('type="term_pro"')->order('id desc')->select(); ?>
			<?php foreach($terms as $val) : ?>
			<li>
				<a href="<?php echo U('pro/index/term?id='.$val['id']); ?>">
					<?php echo $val['title']; ?>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
		<ul id="user-nav" class="nav nav-pills nav-justified mb-20">
			<li class="active">
				<a href="<?php echo U('pro/index/index'); ?>">
					全部店铺
				</a>
			</li>
			<?php $terms = M('page')->where('type="term_local"')->order('id desc')->select(); ?>
			<?php foreach($terms as $val) : ?>
			<li>
				<a href="<?php echo U('pro/index/term?id='.$val['id']); ?>">
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
					<a class="img-div" href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><img src="<?php echo $fmimg_args[0]; ?>" alt="<?php echo $val['title']; ?>"></a>
					<div class="caption">
						<h4>
							<a href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><?php echo $val['title']; ?></a>
						</h4>
						<p class="price pull-left">
							<span><?php echo mc_get_meta($val['id'],'price'); ?></span> <small>元</small>
						</p>
						<a href="<?php echo U('home/perform/add_cart','id='.$val['id'].'&number=1'); ?>" class="btn btn-warning btn-xs pull-right">
							<i class="glyphicon glyphicon-plus"></i> 加入购物车
						</a>
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
					<!--<input type="hidden" name="type" value="pro">-->
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
	<div class="modal fade" id="parameterModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					
				</div>
				<?php $parameter = M('option')->where("meta_key='parameter' AND type='pro'")->select(); if($parameter) : ?>
				<form role="form" method="post" action="<?php echo U('home/perform/pro_parameter_edit'); ?>">
				<div class="modal-body">
				
					<div class="form-group">
						<label>
							参数列表
						</label>
						<?php foreach($parameter as $par) : ?>
						<div class="input-group">
							<input type="text" class="form-control" value="<?php echo $par['meta_value']; ?>" name="parameter[<?php echo $par['id']; ?>]">
							<span class="input-group-addon" data-dismiss="modal" data-toggle="modal" data-target="#delparameterModal" data-par-id="<?php echo $par['id']; ?>">
								<i class="icon-remove"></i>
							</span>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-warning btn-block">
						<i class="glyphicon glyphicon-ok"></i> 保存
					</button>
				</div>
				</form>
				<?php endif; ?>
				<form role="form" method="post" action="<?php echo U('home/perform/pro_parameter'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label>
							参数名称
						</label>
						<input name="parameter" type="text" class="form-control" placeholder="">
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
	<div class="modal fade" id="delparameterModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					
				</div>
				<div class="modal-body">
					删除操作无法撤销，请务必谨慎！
				</div>
				<div class="modal-footer">
					<a class="btn btn-warning btn-block">
						<i class="glyphicon glyphicon-ok"></i> 确认删除
					</a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<script>
		$('#parameterModal').on('show.bs.modal', function (e) {
			$('#parameterModal .input-group-addon').click(function(){
				var id = $(this).attr('data-par-id');
				<?php if(C('URL_MODEL')==0) :
					$url = U('home/perform/pro_parameter_del?id=');
				else :
				 	$url = U('home/perform/pro_parameter_del').'?id=';
				 endif; ?>
				$('#delparameterModal a.btn').attr('href','<?php echo $url; ?>'+id);
			});
		})
	</script>
	<?php endif; ?>
<?php mc_template_part('footer'); ?>