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

							服务器信息 <small>今日任务：统计在售商户商品的库存</small>

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

							<li><a href="#">服务器信息</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>

				</div>

				<!-- END PAGE HEADER-->
				
				<!-- BEGIN PAGE CONTENT-->
				
				<div class="portlet-body">

						<table class="table sliders table-striped">

							<tbody>

								<tr>

									<td style="width:15%">操作系统：</td>

									<td>

										<div class="slider-value">

											<?php echo $info['操作系统'];?>

											<span id="slider-snap-inc-amount"></span>

										</div>

									</td>

								</tr>

								<tr>

									<td>运行环境：</td>

									<td>

										<div id="slider-snap-inc" class="slider bg-green"></div>

										<div class="slider-value">

											<?php echo $info['运行环境'];?>
											
											<span id="slider-snap-inc-amount"></span>

										</div>

									</td>

								</tr>

								<tr>

									<td>PHP运行方式：</td>

									<td>

										<div id="slider-range" class="slider bg-blue"></div>

										<div class="slider-value">

											<?php echo $info['PHP运行方式：'];?>

											<span id="slider-range-amount"></span>

										</div>

									</td>

								</tr>

								<tr>

									<td>版本：</td>

									<td>

										<div id="slider-range-max" class="slider bg-purple"></div>

										<div class="slider-value">

											<?php echo $info['版本'];?>

											<span id="slider-range-max-amount"></span>

										</div>

									</td>

								</tr>

								<tr>

									<td>上传附件限制：</td>

									<td>

										<div id="slider-range-min" class="slider bg-yellow"></div>

										<div class="slider-value">

											<?php echo $info['上传附件限制'];?>

											<span class="slider-value" id="slider-range-min-amount"></span>

										</div>

									</td>

								</tr>

								<tr>

									<td>执行时间限制：</td>

									<td>

										<div id="slider-range-min" class="slider bg-yellow"></div>

										<div class="slider-value">

											<?php echo $info['执行时间限制'];?>

											<span class="slider-value" id="slider-range-min-amount"></span>

										</div>

									</td>

								</tr>

								<tr>

									<td>服务器时间：</td>

									<td>

										<div id="slider-range-min" class="slider bg-yellow"></div>

										<div class="slider-value">

											<?php echo $info['服务器时间'];?>

											<span class="slider-value" id="slider-range-min-amount"></span>

										</div>

									</td>

								</tr>

								<tr>

									<td>北京时间：</td>

									<td>

										<div id="slider-range-min" class="slider bg-yellow"></div>

										<div class="slider-value">

											<?php echo $info['北京时间'];?>

											<span class="slider-value" id="slider-range-min-amount"></span>

										</div>

									</td>

								</tr>

								<tr>

									<td>服务器域名/ip：</td>

									<td>

										<div id="slider-range-min" class="slider bg-yellow"></div>

										<div class="slider-value">

											<?php echo $info['服务器域名/ip'];?>

											<span class="slider-value" id="slider-range-min-amount"></span>

										</div>

									</td>

								</tr>

								<tr>

									<td>剩余空间：</td>

									<td>

										<div id="slider-range-min" class="slider bg-yellow"></div>

										<div class="slider-value">

											<?php echo $info['剩余空间'];?>

											<span class="slider-value" id="slider-range-min-amount"></span>

										</div>

									</td>

								</tr>

								<tr>

									<td>客户端IP：</td>

									<td>

										<div id="slider-range-min" class="slider bg-yellow"></div>

										<div class="slider-value">

											<?php echo $info['客户端IP'];?>

											<span class="slider-value" id="slider-range-min-amount"></span>

										</div>

									</td>

								</tr>

								<tr>

									<td>php版本：</td>

									<td>

										<div id="slider-range-min" class="slider bg-yellow"></div>

										<div class="slider-value">

											<?php echo $info['php版本'];?>

											<span class="slider-value" id="slider-range-min-amount"></span>

										</div>

									</td>

								</tr>

								<tr>

									<td>服务器cpu数量：</td>

									<td>

										<div id="slider-range-min" class="slider bg-yellow"></div>

										<div class="slider-value">

											<?php echo $info['服务器cpu数量'];?>

											<span class="slider-value" id="slider-range-min-amount"></span>

										</div>

									</td>

								</tr>

								<tr>

									<td>register_globals:</td>

									<td>

										<div id="slider-range-min" class="slider bg-yellow"></div>

										<div class="slider-value">

											<?php echo $info['register_globals'];?>

											<span class="slider-value" id="slider-range-min-amount"></span>

										</div>

									</td>

								</tr>

								<tr>

									<td>magic_quotes_gpc:</td>

									<td>

										<div id="slider-range-min" class="slider bg-yellow"></div>

										<div class="slider-value">

											<?php echo $info['magic_quotes_gpc'];?>

											<span class="slider-value" id="slider-range-min-amount"></span>

										</div>

									</td>

								</tr>

								<tr>

									<td>magic_quotes_runtime:</td>

									<td>

										<div id="slider-range-min" class="slider bg-yellow"></div>

										<div class="slider-value">

											<?php echo $info['magic_quotes_runtime'];?>
											
											<span class="slider-value" id="slider-range-min-amount"></span>

										</div>

									</td>

								</tr>

							</tbody>

						</table>

					</div>
			
			</div>

		</div>

		<script type="text/javascript">

			document.getElementById('setting').className = 'start active '; 
			
		</script>
		
		<script type="text/javascript">

			document.getElementById('serverinfo').className = 'active '; 
			
		</script>
			
		<?php mc_template_part('Admin_footer'); ?>