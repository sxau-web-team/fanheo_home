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
					<form id="searchform" role="form" method="get" action="<?php echo mc_option('site_url'); ?>">
						<div class="form-group">
							<div class="input-group">
								<input name="keyword" type="text" class="form-control input-lg" placeholder="搜索你喜欢的话题～～">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-search"></i>
								</span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
			<div id="chat">
				<?php foreach($page as $val) : ?>
				<?php if(mc_comment_count($val['id'])) : ?>
				<h3 class="title">全部留言（<?php echo mc_comment_count($val['id']); ?>）</h3>
				<hr>
				<?php echo W("Comment/index",array($val['id'])); ?>
				<hr>
				<?php endif; ?>
				<?php if(mc_user_id()) : ?>
				<form role="form" method="post" action="<?php echo U('home/perform/comment'); ?>">
					<div class="form-group">
						<label for="exampleInputEmail1">
							留言内容
						</label>
						<textarea name="content" class="form-control" rows="3" placeholder="请输入留言内容"></textarea>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-block btn-warning">
							<i class="glyphicon glyphicon-ok"></i> 提交
						</button>
					</div>
					<input type="hidden" name="id" value="<?php echo $val['id']; ?>">
				</form>
				<?php else : ?>
				<div id="nothing">
					请<a href="<?php echo U('user/login/index'); ?>">登陆</a>或<a href="<?php echo U('user/register/index'); ?>">注册</a>后进行评论！
				</div>
				<?php endif; ?>
				<?php endforeach; ?>
			</div>
			</div>
			<div class="col-sm-4" id="group-side">
				<ul class="nav nav-pills nav-stacked text-center mb-20">
					<li><a href="<?php echo U('post/group/single?id='.$_GET['id']); ?>">主题</a></li>
					<li><a href="<?php echo U('publish/index/add_post?group='.$_GET['id']); ?>">新建主题</a></li>
					<li class="active"><a href="<?php echo U('post/group/chat?id='.$_GET['id']); ?>">留言</a></li>
					<li><a href="<?php echo U('publish/index/add_group'); ?>">新建群组</a></li>
				</ul>
				<?php mc_template_part('sidebar'); ?>
			</div>
		</div>
	</div>
<?php mc_template_part('footer'); ?>