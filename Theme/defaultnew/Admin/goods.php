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

	<link href="__PUBLIC__/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<link href="__PUBLIC__/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

	<link href="__PUBLIC__/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

	<link href="__PUBLIC__/media/css/style-metro.css" rel="stylesheet" type="text/css"/>

	<link href="__PUBLIC__/media/css/style.css" rel="stylesheet" type="text/css"/>

	<link href="__PUBLIC__/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>

	<link href="__PUBLIC__/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

	<link href="__PUBLIC__/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>

	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES --> 

	<link href="__PUBLIC__/media/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>

	<link href="__PUBLIC__/media/css/daterangepicker.css" rel="stylesheet" type="text/css" />

	<link href="__PUBLIC__/media/css/fullcalendar.css" rel="stylesheet" type="text/css"/>

	<link href="__PUBLIC__/media/css/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/>

	<link href="__PUBLIC__/media/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>

	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/table.css">

	<!-- END PAGE LEVEL STYLES -->

	<link rel="shortcut icon" href="__PUBLIC__/media/image/favicon.ico" />

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed">

	<include file="Public/include/Adminheader.html"/>

	<include file="Public/include/Admin_sidebar.html"/>
	
		<!-- BEGIN PAGE -->

		<div class="page-content">

			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<div id="portlet-config" class="modal hide">

				<div class="modal-header">

					<button data-dismiss="modal" class="close" type="button"></button>

					<h3>portlet Settings</h3>

				</div>

				<div class="modal-body">

					<p>Here will be a configuration form</p>

				</div>

			</div>

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<!-- BEGIN PAGE CONTAINER-->        

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

				<div class="row-fluid">

					<div class="span12">

						<!-- BEGIN STYLE CUSTOMIZER -->

						<div class="color-panel hidden-phone">

							<div class="color-mode-icons icon-color"></div>

							<div class="color-mode-icons icon-color-close"></div>

							<div class="color-mode">

								<p>THEME COLOR</p>

								<ul class="inline">

									<li class="color-black current color-default" data-style="default"></li>

									<li class="color-blue" data-style="blue"></li>

									<li class="color-brown" data-style="brown"></li>

									<li class="color-purple" data-style="purple"></li>

									<li class="color-grey" data-style="grey"></li>

									<li class="color-white color-light" data-style="light"></li>

								</ul>

								<label>

									<span>Layout</span>

									<select class="layout-option m-wrap small">

										<option value="fluid" selected>Fluid</option>

										<option value="boxed">Boxed</option>

									</select>

								</label>

								<label>

									<span>Header</span>

									<select class="header-option m-wrap small">

										<option value="fixed" selected>Fixed</option>

										<option value="default">Default</option>

									</select>

								</label>

								<label>

									<span>Sidebar</span>

									<select class="sidebar-option m-wrap small">

										<option value="fixed">Fixed</option>

										<option value="default" selected>Default</option>

									</select>

								</label>

								<label>

									<span>Footer</span>

									<select class="footer-option m-wrap small">

										<option value="fixed">Fixed</option>

										<option value="default" selected>Default</option>

									</select>

								</label>

							</div>

						</div>

						<!-- END BEGIN STYLE CUSTOMIZER -->  

						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						
						<h3 class="page-title">

							商品列表 <small>今日任务：统计在售商户商品的库存</small>

						</h3>
						
						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="{:U('Admin/index/index')}">首页</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li>

								<a href="{:U('Admin/Good/index')}">商品管理</a>

								<i class="icon-angle-right"></i>

							</li>

							<li><a href="{:U('Admin/Good/index')}">商品列表</a></li>

							<li style="float:right;padding-right:20px;"><a href="{:U('Admin/Good/addGood')}">添加商品</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>

				</div>

				<!-- END PAGE HEADER-->
				
				<!-- BEGIN PAGE CONTENT-->
				
				<table class="table hovertable  table-bordered table-condensed">
				
				<tr>
					<th>
					
					id
					
					</th>
					
					<th>
					
					商品名称

					</th>
					
					<th>

						所属分类
					
					</th>

					<th>
						
						所属品牌

					</th>

					<th>
					
					价格
					
					</th>
					
					<th>
					
					状态
					
					</th>
					
					<th>
					
					评价管理
					
					</th>

					<th>
						
						缩略图

					</th>

					<th>库存</th>
					
					<th>
					
					操作
					
					</th>
					
					<foreach name='goods' item='v'>
						
						<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFF5EE';">
          
							<td>{$v.id}</td>
          
							<td>{$v.name}</td>

							<td>{$v.cid}</td>

							<td>{$v.goods_no}</td>
          
							<td>{$v.sell_price}</td>
							
							<td>{$v.status}</td>
          
							<td><a href="#">测试</a></td>

							<td>{$v.img}</td>

							<td>{$v.amount}</td>
          
							<td>
								
								<a href="#">修改</a>
								
								<a href="{:U('Admin/Good/delgood',array('id' => $v['id']))}">删除</a>
							
							</td>
							
						</tr>
						
					</foreach>
					
				</tr> 
				
				</table>
				
			<div class="pagination">

			{$page}
		
			</div>	
			
		</div>

		</div>

		<script type="text/javascript">

			document.getElementById('good').className = 'start active '; 
			
		</script>
		
		<script type="text/javascript">

			document.getElementById('goodlist').className = 'active '; 
			
		</script>
			
		<include file="Public/include/Admin_footer.html"/>