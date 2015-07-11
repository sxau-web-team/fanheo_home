<?php mc_template_part('header'); ?>
	<header id="group-head">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h1>
						<a id="logo" class="pull-left img-div" href="<?php echo U('post/group/single?id='.$_GET['id']); ?>"><img src="<?php echo mc_fmimg($_GET['id']); ?>"></a>
						<a href="<?php echo U('post/group/single?id='.$_GET['id']); ?>" class="pull-left title"><?php echo mc_get_page_field($_GET['id'],'title'); ?></a>
					</h1>
				</div>
				<div class="col-sm-4">
					
				</div>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-sm-8" id="group">
				<div class="panel panel-default">
					<div class="panel-body">
						<?php echo mc_get_page_field($_GET['id'],'content'); ?>
					</div>
				</div>
				<?php if($page) : ?>
				<div id="post-list-default">
					<h4>最新话题</h4>
					<ul class="list-group">
					<?php foreach($page as $val) : ?>
					<li class="list-group-item" id="mc-page-<?php echo $val['id']; ?>">
						<div class="row">
							<div class="col-sm-6 col-md-7 col-lg-8">
								<div class="media">
									<?php $author = mc_get_meta($val['id'],'author',true); ?>
									<a class="pull-left img-div" href="<?php echo U('user/index/index?id='.$author); ?>">
										<img width="40" class="media-object" src="<?php echo mc_user_avatar($author); ?>" alt="<?php echo mc_user_display_name($author); ?>">
									</a>
									<div class="media-body">
										<h4 class="media-heading">
											<a href="<?php echo U('post/index/index?id='.$val['id']); ?>"><?php echo $val['title']; ?></a>
										</h4>
										<p class="post-info">
											<i class="glyphicon glyphicon-user"></i><a href="<?php echo U('user/index/index?id='.$author); ?>"><?php echo mc_user_display_name($author); ?></a>
											<i class="glyphicon glyphicon-time"></i><?php echo mdate($val['date']); ?>
										</p>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-5 col-lg-4 text-right">
								<ul class="list-inline">
								<?php if(mc_last_comment_user($val['id'])) : ?>
								<li>最后：<?php echo mc_user_display_name(mc_last_comment_user($val['id'])); ?></li>
								<?php endif; ?>
								<li>点击：<?php echo mc_views_count($val['id']); ?></li>
								</ul>
							</div>
						</div>
					</li>
					<?php endforeach; ?>
					</ul>
					<?php echo mc_pagenavi($count,$page_now); ?>
				</div>
				<?php else : ?>
				<div id="post-list-default">
					<ul class="list-group">
						<li class="list-group-item text-center" style="padding:120px 0;">
							暂无任何话题！
						</li>
					</ul>
				</div>
				<?php endif; ?>
				<div class="text-center">
					<?php echo mc_xihuan_btn($_GET['id']); ?>
					<script type="text/javascript">
						(function(){
						var p = {
							url:location.href,
							showcount:'1',/*是否显示分享总数,显示：'1'，不显示：'0' */
							desc:'我在饭盒网，快来看看吧',/*默认分享理由(可选)*/
							summary:'<?php echo $val['content']; ?>',/*分享摘要(可选)*/
							title:'<?php echo $val['title']; ?>',/*分享标题(可选)*/
							site:'饭盒哦',/*分享来源 如：腾讯网(可选)*/
							pics:'', /*分享图片的路径(可选)*/
							style:'201',
							width:113,
							height:39
						};
						var s = [];
						for(var i in p){
							s.push(i + '=' + encodeURIComponent(p[i]||''));
						}
						document.write(['<a version="1.0" class="btn btn-warning" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?',s.join('&'),'" target="_blank"><i class="glyphicon glyphicon-share"></i> 分享</a>'].join(''));
						})();
					</script>
					<?php if(mc_is_admin() || mc_is_group_admin($_GET['id'])) { ?>
					<a href="<?php echo U('publish/index/edit?id='.$_GET['id']); ?>" class="btn btn-info">
						<i class="glyphicon glyphicon-edit"></i> 编辑
					</a>
					<button class="btn btn-default" data-toggle="modal" data-target="#myModal">
						<i class="glyphicon glyphicon-trash"></i> 删除
					</button>
					<?php } ?>
				</div>
				<link rel="stylesheet" href="<?php echo mc_site_url(); ?>/Kindeditor/themes/default/default.css" />
				<form role="form" method="post" action="<?php echo U('home/perform/publish'); ?>">
					<div class="form-group">
						<label>
							标题
						</label>
						<input name="title" type="text" class="form-control" placeholder="">
					</div>
					<div class="form-group">
						<label>
							主题内容
						</label>
						<textarea name="content" class="form-control" rows="3"></textarea>
					</div>
					<button type="submit" class="btn btn-warning btn-block">
						<i class="glyphicon glyphicon-ok"></i> 提交
					</button>
					<input type="hidden" name="group" value="<?php echo $id; ?>">
				</form>
				<script charset="utf-8" src="<?php echo mc_site_url(); ?>/Kindeditor/kindeditor-min.js"></script>
				<script charset="utf-8" src="<?php echo mc_site_url(); ?>/Kindeditor/lang/zh_CN.js"></script>
				<script>
					var editor;
					KindEditor.ready(function(K) {
						editor = K.create('textarea[name="content"]', {
							resizeType : 1,
							allowPreviewEmoticons : false,
							allowImageUpload : true,
							height : 300,
							uploadJson : '<?php echo U('Publish/index/upload'); ?>',
							items : ['source', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'clearhtml', 'quickformat', 'selectall', '|', 
					'formatblock', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
					'italic', 'underline', 'strikethrough', 'removeformat', '|', 'image', 'multiimage', 'table', 'hr', 'emoticons', 'baidumap', 'link', 'unlink'],
							afterChange : function() {
								K(this).html(this.count('text'));
							}
						});
					});
				</script>
			</div>
			<div class="col-sm-4" id="group-side">
				<ul class="nav nav-pills nav-stacked text-center mb-20">
					<li class="active"><a href="<?php echo U('post/group/single?id='.$_GET['id']); ?>">全部主题</a></li>
					<li><a href="<?php echo U('publish/index/add_post?group='.$_GET['id']); ?>">新建主题</a></li>
					<li><a href="<?php echo U('post/group/chat?id='.$_GET['id']); ?>">留言</a></li>
					<li><a href="<?php echo U('publish/index/add_group'); ?>">新建群组</a></li>
				</ul>
				<?php mc_template_part('sidebar'); ?>
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
					<p>确认要删除此群组吗？</p>
					注意：当前群组下的所有主题都会被删除！
				</div>
				<div class="modal-footer" style="text-align:center;">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						<i class="glyphicon glyphicon-remove"></i> 取消
					</button>
					<a class="btn btn-danger" href="<?php echo U('home/perform/delete?id='.$_GET['id']); ?>">
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