<!DOCTYPE html>

<!-- 

Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 2.3.1

Version: 1.3

Author: KeenThemes

Website: http://www.keenthemes.com/preview/?theme=metronic

Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469

-->

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->

<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title><?php echo mc_title(); ?></title>

	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<?php echo mc_seo(); ?>

	<!-- BEGIN GLOBAL MANDATORY STYLES -->

	<link href="<?php echo mc_theme_url(); ?>/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo mc_theme_url(); ?>/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo mc_theme_url(); ?>/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo mc_theme_url(); ?>/media/css/style-metro.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo mc_theme_url(); ?>/media/css/style.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo mc_theme_url(); ?>/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo mc_theme_url(); ?>/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

	<link href="<?php echo mc_theme_url(); ?>/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>

	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES --> 

	<link href="<?php echo mc_theme_url(); ?>/media/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo mc_theme_url(); ?>/media/css/daterangepicker.css" rel="stylesheet" type="text/css" />

	<link href="<?php echo mc_theme_url(); ?>/media/css/fullcalendar.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo mc_theme_url(); ?>/media/css/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/>

	<link href="<?php echo mc_theme_url(); ?>/media/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>

	<link rel="stylesheet" type="text/css" href="<?php echo mc_theme_url(); ?>/css/table.css">

	<!-- END PAGE LEVEL STYLES -->

	<link rel="icon" href="<?php echo mc_site_url(); ?>/favicon.ico" mce_href="<?php echo mc_site_url(); ?>/favicon.ico" type="image/x-icon">

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed">

	<?php mc_template_part('Adminheader'); ?>
	
	<?php mc_template_part('Admin_sidebar'); ?>
	
		<!-- BEGIN PAGE -->

		<div class="page-content">

			<!-- BEGIN PAGE CONTAINER-->        

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

				<div class="row-fluid">

					<div class="span12">

						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						
						<h3 class="page-title">

							系统设置 <small>今日任务：统计在售商户商品的库存</small>

						</h3>
						
						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="<?php echo U('Admin/index/index');?>">首页</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li>

								<a href="<?php echo U('Admin/Setting/index');?>">系统设置</a>

								<i class="icon-angle-right"></i>

							</li>

							<li><a href="#">邮箱设置</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>

				</div>

				<!-- END PAGE HEADER-->
				
				<!-- BEGIN PAGE CONTENT-->
				
				
					
					<form role="form" method="post" action="<?php echo mc_page_url(); ?>" class="form-horizontal">
										
					<div class="control-group">

						<label class="control-label">* 邮件SMTP设置：</label>

							<div class="controls">
							
							<span class="help-inline">当设置smtp信息后，找回密码才可用。</span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 发送邮件账号：</label>

							<div class="controls">

								<input type="text" placeholder="" class="m-wrap medium" name="stmp_from" value="<?php echo mc_option('stmp_from'); ?>"/>

								<span class="help-inline"></span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 发送人名字：</label>

							<div class="controls">

								<input type="text" placeholder="" class="m-wrap medium" name="stmp_name" value="<?php echo mc_option('stmp_name'); ?>"/>

								<span class="help-inline"></span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* SMTP服务器：</label>

							<div class="controls">

								<input type="text" placeholder="" class="m-wrap medium" name="stmp_host" value="<?php echo mc_option('stmp_host'); ?>"/>

								<span class="help-inline"></span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* SMTP服务器端口：</label>

							<div class="controls">

								<input type="text" placeholder="" class="m-wrap medium" name="stmp_port" value="<?php echo mc_option('stmp_port'); ?>"/>

								<span class="help-inline"></span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* SMTP服务器用户名：</label>

							<div class="controls">

								<input type="text" placeholder="" class="m-wrap medium" name="stmp_username" value="<?php echo mc_option('stmp_username'); ?>"/>

								<span class="help-inline"></span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* SMTP服务器密码：</label>

							<div class="controls">

								<input type="password" placeholder="" class="m-wrap medium" name="stmp_password" value="<?php echo mc_option('stmp_password'); ?>"/>

								<span class="help-inline"></span>

							</div>

					</div>

					<div class="form-actions" >
				
						<button type="submit" class="btn blue" ><i class="icon-ok"></i> 保存</button>
					
					</div>
					
					</form>

			</div>

		</div>

		<script type="text/javascript">

			document.getElementById('setting').className = 'start active '; 
			
		</script>
		
		<script type="text/javascript">

			document.getElementById('email').className = 'active '; 
			
		</script>
			
		<?php mc_template_part('Admin_footer'); ?>