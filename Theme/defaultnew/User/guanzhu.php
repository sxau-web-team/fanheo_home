<?php mc_template_part('header'); ?>
<?php mc_template_part('head-user'); ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12" id="user-userlist">
				<?php mc_template_part('head-user-nav'); ?>
				<ul class="media-list">
				<?php foreach($page as $val) : ?>
				<li class="media">
					<a class="pull-left img-div" href="<?php echo U('user/index/index?id='.$val['id']); ?>">
						<img class="media-object" src="<?php echo mc_user_avatar($val['id']); ?>" alt="<?php echo mc_user_display_name($val['id']); ?>">
					</a>
					<div class="media-body">
						<h4 class="media-heading">
							<a href="<?php echo U('user/index/index?id='.$val['id']); ?>"><?php echo mc_user_display_name($val['id']); ?></a>
						</h4>
						<?php echo mc_cut_str(strip_tags(mc_get_page_field($val['id'],'content')), 80); ?>
					</div>
				</li>
				<?php endforeach; ?>
				</ul>
				<?php echo mc_pagenavi($count,$page_now); ?>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title" id="myModalLabel">
						删除用户
					</h4>
				</div>
				<div class="modal-body">
					确认要删除这个用户吗？
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						<i class="glyphicon glyphicon-remove"></i> 取消
					</button>
					<a class="btn btn-danger" id="user-delete" href="javascript:;">
						<i class="glyphicon glyphicon-ok"></i> 确定
					</a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<script>
		$('.user-delete').click(function(){
			var duser = $(this).attr('user-data');
			$('#user-delete').attr('href',duser);
		});
	</script>
<?php mc_template_part('footer'); ?>