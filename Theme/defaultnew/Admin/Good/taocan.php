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

	<title>{$title}</title>

	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

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

	<link rel="shortcut icon" href="<?php echo mc_theme_url(); ?>/media/image/favicon.ico" />

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

							套餐列表 <small>今日任务：统计在售商户商品的库存</small>

						</h3>
						
						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="<?php echo U('Admin/index/index');?>">首页</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li>

								<a href="<?php echo mc_page_url();?>">商品管理</a>

								<i class="icon-angle-right"></i>

							</li>

							<li><a href="<?php echo mc_page_url();?>">套餐列表</a></li>
							
							<li style="float:right;padding-right:20px;"><a href="#" class="" data-toggle="modal" data-target="#addtermModal">添加分类</a></li>

							<li style="float:right;padding-right:20px;"><a href="{:U('Admin/Good/addGood')}">添加商品</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>

				</div>

				<!-- END PAGE HEADER-->
				
				<!-- BEGIN PAGE CONTENT-->
				
				<div class="container-fiuld">

				<ul id="user-nav" class="nav nav-pills nav-justified mb-20">
				
					<li class="">
					
						<a href="<?php echo U('pro/index/index'); ?>">
						
							全部分类
						
						</a>
					
					</li>
					
					<?php $terms = M('page')->where('type="term_pro"')->order('id desc')->select(); ?>
					
					<?php foreach($terms as $val) : ?>
					
					<li <?php if($id==$val['id']) echo 'class="active"'; ?>>
					
						<a href="<?php echo U('Admin/Good/term?id='.$val['id']); ?>">
						
							<?php echo $val['title']; ?>
						
						</a>
					
					</li>
					
					<?php endforeach; ?>
				
				</ul>
				
				<ul id="user-nav" class="nav nav-pills nav-justified mb-20">
				
					<li class="active">
						
						<a href="<?php echo U('pro/index/index'); ?>">
						
						全部店铺
						
						</a>
					
					</li>
					
					<?php $terms = M('page')->where('type="term_local"')->order('id desc')->select(); ?>
					
					<?php foreach($terms as $val) : ?>
					
					<li>
					
						<a href="<?php echo U('pro/index/term?id='.$val['id']); ?>">

							<?php echo $val['title']; ?>
							
						</a>
						
					</li>
					
					<?php endforeach; ?>
					
				</ul>
				
				<table class="table hovertable  table-bordered table-condensed">
				
				<tr>
					<th>id</th>
					
					<th>商品名称</th>
					
					<th>价格</th>
					
					<th>状态</th>
					
					<th>评价管理</th>

					<th>缩略图</th>

					<th>库存</th>
					
					<th>操作</th>
					
					<?php foreach($page as $val) : ?>
						
						<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFF5EE';">
						
							<?php $fmimg_args = mc_get_meta($val['id'],'fmimg',false); ?>
          
							<td><?php echo $val['id'];?></td>
          
							<td><?php echo $val['title']; ?></td>

							<td><span><?php echo mc_get_meta($val['id'],'price'); ?></span> <small>元</small></td>
							
							<td><a href="#">测试</a></td>
          
							<td>人喜欢 人收藏</td>

							<td><img src="<?php echo $fmimg_args[0]; ?>" style="height:100px;width:150px;" alt="<?php echo $val['title']; ?>"></td>

							<td>{$v.amount}</td>
          
							<td>
								
								<a href="#">修改</a>
								
								<a href="{:U('Admin/Good/delgood',array('id' => $v['id']))}">删除</a>
							
							</td>
							
						</tr>
						
					<?php endforeach; ?>
				
				</tr> 

				</table>
				
				<?php echo mc_pagenavi($count,$page_now); ?>
				
				</div>
			
		</div>

		</div>

		<script type="text/javascript">

			document.getElementById('good').className = 'start active '; 
			
		</script>
					
		<script type="text/javascript">

			document.getElementById('taocan').className = 'active '; 
			
		</script>
		
		<?php mc_template_part('Admin_footer'); ?>