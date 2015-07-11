<?php mc_template_part('header'); ?>
	<?php foreach($page as $val) : ?>
	<?php $author = mc_author_id($val['id']); ?>
	<div class="container">
		<ol class="breadcrumb mt-20" id="baobei-term-breadcrumb">
			<li>
				<a href="<?php echo U('home/index/index'); ?>">
					首页
				</a>
			</li>
			<li>
				<a href="<?php echo U('baobei/index/index'); ?>">
					分享
				</a>
			</li>
			<li>
				<a href="<?php echo U('baobei/index/term?id='.mc_get_meta($val['id'],'term')); ?>">
					<?php echo mc_get_page_field(mc_get_meta($val['id'],'term'),'title'); ?>
				</a>
			</li>
			<li class="active">
				<?php echo $val['title']; ?>
			</li>
			<div class="pull-right">
				<a href="<?php echo U('publish/index/add_baobei'); ?>" class="publish">分享宝贝</a>
			</div>
		</ol>
	</div>
	<div id="single-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-6" id="pro-index-tl">
					<div id="pro-index-tlin">
					<div class="imgshow"><img src="<?php echo mc_fmimg($val['id']); ?>" alt="<?php echo $val['title']; ?>"></div>
					</div>
				</div>
				<div class="col-sm-6" id="pro-index-tr">
					<div id="pro-index-trin">
					<div class="media">
						<div class="pull-left">
							<a href="<?php echo U('user/index/index?id='.$author); ?>"><img class="img-circle media-object" src="<?php echo mc_user_avatar($author); ?>" alt="<?php echo mc_user_display_name($author); ?>" width="60"></a>
						</div>
						<div class="media-body">
							<h4 class="media-heading mb-10">
								由 <a href="<?php echo U('user/index/index?id='.$author); ?>"><?php echo mc_user_display_name($author); ?></a> 分享到 <a href="<?php echo U('baobei/index/term?id='.mc_get_meta($val['id'],'term')); ?>"><?php echo mc_get_page_field(mc_get_meta($val['id'],'term'),'title'); ?></a>
							</h4>
							<?php echo mc_get_page_field($author,'content'); ?>
						</div>
					</div>
					<hr>
					<h1>
						<?php echo $val['title']; ?>
					</h1>
					<h3><?php echo mc_get_meta($val['id'],'price'); ?> 元</h3>
					<?php if(mc_get_meta($val['id'],'link')) : ?>
					<?php if(mc_get_meta($val['id'],'stime') && strtotime("now")<mc_get_meta($val['id'],'stime')) : ?>
					<a href="javascript:;" class="btn btn-default mb-20">
						<i class="glyphicon glyphicon-plus"></i> 即将开始
					</a>
					<?php elseif(mc_get_meta($val['id'],'etime') && strtotime("now")>mc_get_meta($val['id'],'etime')) : ?>
					<a href="javascript:;" class="btn btn-default mb-20">
						<i class="glyphicon glyphicon-plus"></i> 活动结束
					</a>
					<?php else : ?>
					<a target="_blank" rel="nofollow" href="<?php echo mc_get_meta($val['id'],'link'); ?>" class="btn btn-warning mb-20">
						<i class="glyphicon glyphicon-plus"></i> 立即购买
					</a>
					<?php endif; ?>
					<?php endif; ?>
					<?php if(mc_get_meta($val['id'],'stime')) : ?>
					<p>开始时间：<?php echo date('Y-m-d H:i:s',mc_get_meta($val['id'],'stime')); ?></p>
					<?php endif; ?>
					<?php if(mc_get_meta($val['id'],'etime')) : ?>
					<p>结束时间：<?php echo date('Y-m-d H:i:s',mc_get_meta($val['id'],'etime')); ?></p>
					<?php endif; ?>
					<?php if($val['type']=='baobei_pending' && mc_is_admin()) : ?>
					<p>
						<a href="<?php echo U('home/perform/review?id='.$val['id']); ?>" class="btn btn-info">
							<i class="glyphicon glyphicon-ok-circle"></i> 通过审核
						</a>
					</p>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
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
					确认要删除这个宝贝吗？
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