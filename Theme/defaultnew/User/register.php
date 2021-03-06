<!DOCTYPE html>
<html>
<head>
<title><?php echo mc_title(); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo mc_theme_url(); ?>/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo mc_theme_url(); ?>/style.css" type="text/css" media="screen" />
<link href="<?php echo mc_theme_url(); ?>/css/media.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="<?php echo mc_theme_url(); ?>/js/html5shiv.min.js"></script>
<script src="<?php echo mc_theme_url(); ?>/js/respond.min.js"></script>
<![endif]-->
<style>
	body {background-color: #fff;}
</style>
</head>
<body>
<div class="container" id="login">
	<div class="text-center login-head">
		<a href="<?php echo mc_site_url(); ?>"><img src="<?php echo mc_theme_url(); ?>/img/logo.png"></a>
		<h1>fanheo.com 给你不一样的精彩！</h1>
		<p><?php echo mc_option('site_name'); ?></p>
	</div>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<form role="form" method="post" action="<?php echo U('user/register/submit'); ?>">
				<div class="form-group">
				<div class="form-group">
					<input type="text" name="user_name" class="form-control input-lg" placeholder="用户名">
				</div>
				<div class="form-group">
					<input type="text" name="user_phone" class="form-control bb-0 input-lg" placeholder="手机号">
				
					<input type="email" name="user_email" class="form-control  input-lg" placeholder="邮箱">
				</div>
				<div class="form-group">
					<input type="password" name="user_pass" class="form-control bb-0 input-lg" placeholder="密码">
					<input type="password" name="user_pass2" class="form-control input-lg" placeholder="重复密码">
				</div>
					<input type="text" name="code" class="form-control input-lg" placeholder="验证码">
				</div>
		
				<div class="form-group">
					<img src="<?php echo U('user/register/verify'); ?>"  onclick="javascript:this.src='<?php echo U('user/register/verify'); ?>?tm='+Math.random()" id="code"/> <a >点击图片换一换</a>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-warning btn-block btn-lg">
						立即注册
					</button>
				</div>
				<div class="form-group">
					<p class="help-block">
						已有账号<a href="<?php echo U('user/login/index'); ?>">请此登陆</a>
					</p>
				</div>
				</form>
			</form>
		</div>
	</div>
	<div class="text-center login-foot">
		<p>Copyright <?php echo date('Y'); ?> <?php echo mc_option('site_name'); ?></p>
		</p>
	</div>
</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo mc_theme_url(); ?>/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo mc_theme_url(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo mc_theme_url(); ?>/js/placeholder.js"></script>
<script type="text/javascript">
	$(function() {
		$('input, textarea').placeholder();
	});
</script>
<script src="<?php echo mc_theme_url(); ?>/js/cat.js"></script>
</html>