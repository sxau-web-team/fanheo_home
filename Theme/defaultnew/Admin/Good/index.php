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

		<div class="page-content" >

			<!-- BEGIN PAGE CONTAINER-->        

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

				<div class="row-fluid">

					<div class="span12">

						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						
						<h3 class="page-title">

							商品列表 <small>今日任务：统计在售商户商品的库存</small>

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

							<li><a href="<?php echo mc_page_url();?>">商品列表</a></li>
							
							<li style="float:right;padding-right:20px;">
								<a href="#" data-toggle="modal" data-target="#searchModal">
									<i class="glyphicon  icon-search"></i>
								</a>
							</li>
							
							<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											
										</div>
										<div class="modal-body">
											<form id="searchform" role="form" method="get" action="<?php echo U('Admin/Good/index'); ?>">
												<div class="form-group">
													<div class="input-group">
														<input name="shopkeyword" type="text" class="form-control input-lg" placeholder="搜索你喜欢的东东～～">
														<span class="input-group-addon">
															<i class="glyphicon  icon-search"></i>
														</span>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							
							<li style="float:right;padding-right:20px;"><a href="#" class="" data-toggle="modal" data-target="#addtermModal">添加分类</a></li>

							<li style="float:right;padding-right:20px;"><a href="<?php echo U('Admin/Good/addGood'); ?>">添加商品</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>

				</div>

				<!-- END PAGE HEADER-->
				
				<!-- BEGIN PAGE CONTENT-->

				<ul id="user-nav" class="nav nav-pills nav-justified mb-20">
				
					<li class="active">
					
						<a href="<?php echo U('Admin/Good/categorylist'); ?>">
						
							全部分类
						
						</a>
					
					</li>
					
					<?php $terms = M('page')->where('type="term_pro"')->order('id desc')->select(); ?>
					
					<?php foreach($terms as $val) : ?>
					
					<li>
					
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
					
					<th>评价管理</th>

					<th>缩略图</th>
					
					<th>库存</th>
					
					<th>操作</th>
					
					<?php foreach($page as $val) : ?>
						
						<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFF5EE';">
						
							<?php $fmimg_args = mc_get_meta($val['id'],'fmimg',false); ?>
          
							<td><?php echo $val['id'];?></td>
          
							<td><a class="img-div" href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><?php echo $val['title']; ?></a></td>

							<td><span><?php echo mc_get_meta($val['id'],'price'); ?></span> <small>元</small></td>
          
							<td><?php echo mc_xihuan_count($val['id']);?>人喜欢 <?php echo mc_shoucang_count($val['id']);?>人收藏</td>

							<td><img src="<?php echo $fmimg_args[0]; ?>" style="height:50px;width:75px;" alt="<?php echo $val['title']; ?>"></td>
							
							<td></td>
          
							<td>
								
								<a href="<?php echo U('Admin/Good/editgood?id='.$val['id']); ?>">修改</a>
								
								<a  data-toggle="modal" data-target="#myModal">删除</a>
							
							</td>
							
						</tr>
						
					<?php endforeach; ?>
				
				</tr> 

				</table>
				
				<?php echo mc_pagenavi($count,$page_now); ?>
				
			</div>
				
		</div>

		

		<script type="text/javascript">

			document.getElementById('good').className = 'start active '; 
			
		</script>
		
		<script type="text/javascript">

			document.getElementById('goodlist').className = 'active '; 
			
		</script>
		
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
							确认要删除这个商品吗？
						</div>
						<div class="modal-footer" style="text-align:center;">
							<button type="button" class="btn btn-default" data-dismiss="modal">
								<i class="glyphicon glyphicon-remove"></i> 取消
							</button>
							<a class="btn btn-danger" href="<?php echo U('Admin/Good/delgood?id='.$val['id']); ?>">
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
			
			<?php if(mc_is_admin()) : ?>
	<!-- Modal -->
	<div class="modal fade" id="addtermModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					
				</div>
				<form role="form" method="post" action="<?php echo U('Admin/Good/publish_term'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label>
							分类名称
						</label>
						<input name="title" type="text" class="form-control" placeholder="">
					</div>
					<div class="form-group">
						<label>
							分类类型
						</label>
						<select class="form-control" name="type">
							<option value="pro" selected>
								商品
							</option>
							<option value="baobei">
								宝贝
							</option>
							<option value="local">
								店铺
							</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-warning btn-block">
						<i class="glyphicon glyphicon-ok"></i> 保存
					</button>
				</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<?php endif; ?>
		
		<?php mc_template_part('Admin_footer'); ?>