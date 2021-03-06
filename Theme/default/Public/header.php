<!DOCTYPE html>
<html>
<head>
<title><?php echo mc_title(); ?></title>
<?php echo mc_seo(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="<?php echo mc_site_url(); ?>/favicon.ico" mce_href="<?php echo mc_site_url(); ?>/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="<?php echo mc_site_url(); ?>/favicon.ico" mce_href="<?php echo mc_site_url(); ?>/favicon.ico" type="image/x-icon">
<!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo mc_theme_url(); ?>/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo mc_theme_url(); ?>/style.css" type="text/css" media="screen" />
<link href="<?php echo mc_theme_url(); ?>/css/media.css" rel="stylesheet">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo mc_theme_url(); ?>/js/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="<?php echo mc_theme_url(); ?>/js/html5shiv.min.js"></script>
<script src="<?php echo mc_theme_url(); ?>/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<a id="site-top"></a>
<nav id="topnav" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-top-navbar-collapse">
				<span class="sr-only">
					Toggle navigation
				</span>
				<span class="icon-bar">
				</span>
				<span class="icon-bar">
				</span>
				<span class="icon-bar">
				</span>
			</button>
			<a class="navbar-brand" href="<?php echo mc_option('site_url'); ?>"></a>
		</div>
		<div class="collapse navbar-collapse" id="bs-top-navbar-collapse">
			<ul class="nav navbar-nav">
				<li>
					<a href="<?php echo U('home/index/index'); ?>">
						首页
					</a>
				</li>
				<?php if(mc_option('pro_close')!=1) : ?>
				<li>
					<a href="<?php echo U('pro/index/index'); ?>">
						外卖
					</a>
				</li>
				<li>
					<a href="<?php echo U('Store/index/index'); ?>">
						店铺
					</a>
				</li>
				<?php endif; ?>
				<?php if(mc_option('baobei_close')!=1) : ?>
				<li>
					<a href="<?php echo U('baobei/index/index'); ?>">
						宝贝
					</a>
				</li>
				<?php endif; ?>
				<?php if(mc_option('group_close')!=1) : ?>
				<li>
					<a href="<?php echo U('post/group/index'); ?>">
						群组
					</a>
				</li>
				<?php endif; ?>
				<?php if(mc_option('article_close')!=1) : ?>
				<li>
					<a href="<?php echo U('article/index/index'); ?>">
						文章
					</a>
				</li>
				<?php endif; ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#" data-toggle="modal" data-target="#searchModal">
						<i class="glyphicon glyphicon-search"></i>
					</a>
				</li>
				<?php if(mc_user_id()) { ?>
				<li>
					<a href="<?php echo U('user/index/index?id='.mc_user_id()); ?>">
						<i class="glyphicon glyphicon-user"></i>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" data-toggle="modal" data-target="#qiandaoModal">
						<i class="glyphicon glyphicon-usd"></i>
					</a>
				</li>
				<?php if(mc_option('pro_close')!=1) : ?>
				<li>
					<a href="<?php echo U('pro/cart/index'); ?>">
						<i class="glyphicon glyphicon-shopping-cart"></i>
						<span id="cart-count"><?php echo mc_cart_count(); ?></span>
					</a>
				</li>
				<?php endif; ?>
				<li>
					<a href="<?php echo U('user/login/logout'); ?>">
						<i class="glyphicon glyphicon-off"></i>
					</a>
				</li>
				<?php } else { ?>
				<li>
					<a href="<?php echo U('user/login/index'); ?>">
						登陆
					</a>
				</li>
				<li>
					<a href="<?php echo U('user/register/index'); ?>">
						注册
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
			</div>
			<div class="modal-body">
				<form id="searchform" role="form" method="get" action="<?php echo mc_option('site_url'); ?>">
					<div class="form-group">
						<div class="input-group">
							<input name="shopkeyword" type="text" class="form-control input-lg" placeholder="今天想吃啥呢～～">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-search"></i>
							</span>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="qiandaoModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				
			</div>
			<div class="modal-body">
				<div id="mycoins" class="text-center">
					<h4>我的积分：<span id="mycoinscount"><?php echo mc_coins(mc_user_id()); ?></span></h4>
					<p><a href="<?php echo U('user/index/coins?id='.mc_user_id()); ?>">查看积分记录</a></p>
					<p>每日签到最多可获得<span class="text-danger">3</span>积分！</p>
					<?php if(mc_is_qiandao()) : ?>
					<a href="javascript:;" id="qiandao" class="btn btn-warning mb-10">已签到</a>
					<?php else : ?>
					<a href="javascript:mc_qiandao();" id="qiandao" class="btn btn-warning mb-10">签到</a>
					<script>
					function mc_qiandao() {
						$.ajax({
							url: '<?php echo U('home/perform/qiandao'); ?>',
							type: 'GET',
							dataType: 'html',
							timeout: 9000,
							error: function() {
								alert('提交失败！');
							},
							success: function(html) {
								var count = $('#mycoinscount').text()*1+3;
								$('#mycoinscount').text(count);
								$('#qiandao').attr('href','javascript:;');
								$('#qiandao').text('已签到');
							}
						});
					};
					</script>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->