<?php mc_template_part('header'); ?>
	<?php foreach($page as $val) : ?>
	<?php $author = mc_author_id($val['id']); ?>
	<header id="group-head">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h1>
						<a id="logo" class="pull-left img-div" href="<?php echo U('post/group/single?id='.mc_get_meta($val['id'],'group')); ?>"><img src="<?php echo mc_fmimg(mc_get_meta($val['id'],'group')); ?>"></a>
						<a href="<?php echo U('post/group/single?id='.mc_get_meta($val['id'],'group')); ?>" class="pull-left title"><?php echo mc_get_page_field(mc_get_meta($val['id'],'group'),'title'); ?></a>
					</h1>
				</div>
				<div class="col-sm-4">
					
				</div>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<ol class="breadcrumb">
					<li>
						<a href="<?php echo U('home/index/index'); ?>">
							首页
						</a>
					</li>
					<li>
						<a href="<?php echo U('post/group/single?id='.mc_get_meta($val['id'],'group')); ?>">
							<?php echo mc_get_page_field(mc_get_meta($val['id'],'group'),'title'); ?>
						</a>
					</li>
					<li class="active">
						<?php echo $val['title']; ?>
					</li>
				</ol>
			</div>
			<div class="col-sm-3 text-right">
				<i class="glyphicon glyphicon-time"></i> <?php echo date('Y-m-d H:i:s',mc_get_meta($val['id'],'time')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12" id="single">
				<h1 class="title"><?php echo $val['title']; ?></h1>
				<div id="entry">
				<?php echo $val['content']; ?>
				</div>
				<hr>
				<div class="text-center">
					<?php echo mc_xihuan_btn($val['id']); ?>
					<?php echo mc_shoucang_btn($val['id']); ?>
					<?php if(mc_is_admin() || mc_is_group_admin(mc_get_meta($val['id'],'group'))) : ?>
					<a href="<?php echo U('publish/index/edit?id='.$val['id']); ?>" class="btn btn-info">
						<i class="glyphicon glyphicon-edit"></i> 编辑
					</a>
					<?php endif; ?>
					<?php if(mc_is_admin() || mc_is_group_admin(mc_get_meta($val['id'],'group'))) : ?>
					<button class="btn btn-default" data-toggle="modal" data-target="#myModal">
						<i class="glyphicon glyphicon-trash"></i> 删除
					</button>
					<?php endif; ?>
				</div>
				<hr>
				<div class="media">
					<div class="pull-left">
						<a href="<?php echo U('user/index/index?id='.$author); ?>"><img class="img-circle media-object" src="<?php echo mc_user_avatar($author); ?>" alt="<?php echo mc_user_display_name($author); ?>" width="60" height="60"></a>
					</div>
					<div class="media-body">
						<h4 class="media-heading mb-10">
							<a href="<?php echo U('user/index/index?id='.$author); ?>"><?php echo mc_user_display_name($author); ?></a>
							<span class="label label-default">作者</span>
						</h4>
						<?php echo mc_get_page_field($author,'content'); ?>
						<a href="http://user.qzone.qq.com/871379151" target="_blank"><img src="http://r.qzone.qq.com/cgi-bin/cgi_get_user_pic?openid=000000000000000000000000077AFEDF&pic=5.jpg&key=47ec4195982ed86dac66baa1749ac8ea"></a>
					</div>
					<script type="text/javascript">
(function(){
var p = {
url:location.href,
showcount:'1',/*是否显示分享总数,显示：'1'，不显示：'0' */
desc:'',/*默认分享理由(可选)*/
summary:'',/*分享摘要(可选)*/
title:'',/*分享标题(可选)*/
site:'',/*分享来源 如：腾讯网(可选)*/
pics:'', /*分享图片的路径(可选)*/
style:'201',
width:113,
height:39
};
var s = [];
for(var i in p){
s.push(i + '=' + encodeURIComponent(p[i]||''));
}
document.write(['<a version="1.0" class="" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?',s.join('&'),'" target="_blank">分享</a>'].join(''));
})();
</script>
<script src="http://qzonestyle.gtimg.cn/qzone/app/qzlike/qzopensl.js#jsdate=20111201" charset="utf-8"></script>
<script src="http://qzonestyle.gtimg.cn/qzone/app/qzlike/qzopensl.js#jsdate=20111201" charset="utf-8"></script>
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
	<?php if(mc_is_admin() || mc_is_group_admin(mc_get_meta($val['id'],'group'))) : ?>
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