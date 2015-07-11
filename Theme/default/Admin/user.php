<!DOCTYPE html>

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

			
						
						<h3 class="page-title">

							用户列表 <small>今日任务：统计在售商户商品的库存</small>

						</h3>
						
						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="{:U('Admin/index/index')}">首页</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li>

								<a href="{:U('Admin/User/index')}">用户管理</a>

								<i class="icon-angle-right"></i>

							</li>

							<li><a href="{:U('Admin/User/index')}">用户列表</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>

				</div>

				<!-- END PAGE HEADER-->
				
				<!-- BEGIN PAGE CONTENT-->
				
				<table class="table hovertable  table-bordered table-condensed">
				
				<tr>
					<th>id</th>
					
					<th>头像</th>
				
					<th>用户名称</th>
					
					<th>email</th>

					
					
					<foreach name='user' item='v'>
						
						<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFF5EE';">
          
							<td>{$v.id}</td>
							
							<td><img src="{$v.head_ico}" id="imgs" lang="en-us" alt="测试" style="height:50px;weight:50px;"></img></td>
          
							<td>{$v.username}</td>

							<td>{$v.email}</td>
							
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

			document.getElementById('user').className = 'start active '; 
			
		</script>
		
		<script type="text/javascript">

			document.getElementById('userslist').className = 'active '; 
			
		</script>
			
		<include file="Public/include/Admin_footer.html"/>