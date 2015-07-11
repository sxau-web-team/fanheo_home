<div class="container mb-20">
	<div class="row">
		<div class="col-lg-12">
			<div id="user-header" class="media" style="background-image: url(<?php if(mc_fmimg($_GET['id'])) : echo mc_fmimg($_GET['id']); else : echo mc_theme_url().'/img/user_bg.jpg'; endif; ?>);">
				<a class="pull-left img-div" href="<?php echo U('user/index/index?id='.$_GET['id']); ?>">
					<img class="media-object" src="<?php echo mc_user_avatar($_GET['id']); ?>" alt="<?php echo mc_user_display_name($_GET['id']); ?>">
				</a>
				<div class="media-body">
					<h4 class="media-heading">
						<?php echo mc_user_display_name($_GET['id']); ?> 
						<?php echo mc_guanzhu_btn($_GET['id']); ?>
						<?php if(mc_is_admin() && !mc_is_admin($_GET['id'])) : ?>
						<button class="btn btn-default btn-sm user-delete" user-data="<?php echo U('home/perform/delete?id='.$val['id']); ?>" data-toggle="modal" data-target="#myModal">
							<i class="glyphicon glyphicon-trash"></i> 删除
						</button>
						<button class="btn btn-default btn-sm user-ip-false" user-data="<?php echo U('home/perform/ip_false?id='.$val['id']); ?>" data-toggle="modal" data-target="#myModal2">
							<i class="glyphicon glyphicon-trash"></i> 屏蔽IP并删除
						</button>
						<?php endif; ?>
					</h4>
					<?php echo mc_cut_str(strip_tags(mc_get_page_field($_GET['id'],'content')), 65); ?>
				</div>
				<div id="user-header-cover"></div>
			</div>
		</div>
	</div>
</div>
<?php if(mc_is_admin()) : ?>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title">
						
					</h4>
				</div>
				<div class="modal-body">
					确认要删除这个用户吗？注意：该用户的全部主题也会被一并删除！
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
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title">
						
					</h4>
				</div>
				<div class="modal-body">
					确认要永久屏蔽这个用户的全部IP并删除该用户吗？
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						<i class="glyphicon glyphicon-remove"></i> 取消
					</button>
					<a class="btn btn-danger" id="user-ip-false" href="javascript:;">
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
		$('.user-ip-false').click(function(){
			var duser = $(this).attr('user-data');
			$('#user-ip-false').attr('href',duser);
		});
	</script>
<?php endif; ?>