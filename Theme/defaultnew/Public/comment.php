<div id="comment">
	<?php foreach($comment as $val) : ?>
	<div class="media" id="comment-<?php echo $val['id']; ?>">
		<div class="pull-left">
			<a href="<?php echo U('user/index/index?id='.$val['user_id']); ?>"><img class="img-circle media-object" src="<?php echo mc_user_avatar($val['user_id']); ?>" alt="<?php echo mc_user_display_name($val['user_id']); ?>" width="60"></a>
		</div>
		<div class="media-body">
			<h4 class="media-heading">
				<a href="<?php echo U('user/index/index?id='.$val['user_id']); ?>"><?php echo mc_user_display_name($val['user_id']); ?></a>
				<?php if(mc_get_meta($val['user_id'],'user_level',true,'user')==10) : ?><span class="btn btn-danger btn-xs">管理员</span><?php elseif(mc_comment_group($val['id']) && mc_get_meta($val['user_id'],'group_admin',true,'user')==mc_comment_group($val['id'])) : ?><span class="btn btn-info btn-xs">群组管理员</span><?php endif; ?>
				<small class="pull-right"><?php echo mdate($val['date']); ?></small>
				<?php if(mc_is_admin()) : ?><a class="btn btn-danger btn-xs pull-right" href="<?php echo U('home/perform/comment_delete?id='.$val['id']); ?>">删除</a><?php elseif(mc_comment_group($val['id']) && mc_get_meta($val['user_id'],'group_admin',true,'user')==mc_comment_group($val['id'])) : ?><?php endif; ?>
			</h4>
			<?php echo $val['action_value']; ?>
		</div>
	</div>
	<?php endforeach; ?>
</div>