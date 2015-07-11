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

							备份数据库 <small>今日任务：统计在售商户商品的库存</small>

						</h3>
						
						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="<?php echo U('Admin/index/index');?>">首页</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li>

								<a href="<?php echo U('Admin/Backupsql/tablist');?>">数据库管理</a>

								<i class="icon-angle-right"></i>

							</li>

							<li><a href="#">备份数据库</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>

				</div>

				<!-- END PAGE HEADER-->
				
				<!-- BEGIN PAGE CONTENT-->
				<div class="tabbable tabbable-custom">

				<ul class="nav nav-tabs">

					<li class="active"><a href="#tab_1_1" data-toggle="tab">数据表备份</a></li>

					<li><a href="#tab_1_2" data-toggle="tab">数据库备份</a></li>

				</ul>
				
				<div class="tab-content">

					<div class="tab-pane active" id="tab_1_1">
					
					<h3>数据表:</h3>    
					
					<form id="upload" METHOD=POST action="<?php echo U('Admin/Backupsql/outputData');?>"  >

						<table class="nostyle">
  	
  							<tr>
	
							<td style="width:120px;">数据表:</td>
							
							<td><select NAME="tableName[]" id="tableName" class="medium" size="12" multiple >
							
							
							
							<?php foreach($tables as $table) : ?>
							
							<option value="<?php echo $table;?>" <in name="table|strtolower" value="<?php echo $Think.get.table;?>"><?php echo $table;?></option>
							
							<?php endforeach; ?>
							
							</select></td>
							
							</tr>
 							
 							 <tr>
							
							<td style="width:120px;">导出格式:</td>
							
							<td><select name="type" class="small" >

    						<option value="SQL" > SQL </option>
    
    						<option value="CSV" > CSV </option>
   							
   							</select></td>
							
							</tr>
							
							  <tr>
								
								<td style="width:120px;">是否zip压缩:</td>
								
								<td><select name="zip" class="small">
							    
							    <option value="0" >无压缩 </option>
							    
							    <option value="1" >压缩 </option>
							   
							   </select><span class="help-inline">   压缩需配置好ZipArchive</span></td>


							
							</tr>
							
							<tr>
							
									<td colspan="2" class="t-right">
							
									  <button type="submit" class="btn blue" ><i class="icon-ok"></i> 备份</button>

							
							        </td>
							
								</tr>
							
							            </table>
							
							            </form>
							            
							             </div>


					<div class="tab-pane" id="tab_1_2">

					<h3>数据库:</h3>

					<form id="upload" METHOD=POST action="<?php echo U('Admin/Backupsql/outputData');?>">

					<table class="nostyle">

					  <tr>
					
						<td style="width:120px;">导出格式:</td>
					
						<td><select name="type" class="small" >
					
					    <option value="SQL" > SQL </option>
					
					   </select></td>
					
					</tr>
					
					  <tr>
					
						<td style="width:120px;">是否zip压缩:</td>
					
						<td><select name="zip" class="small">
					    
					    <option value="0" >无压缩 </option>
					    
					    <option value="1" >压缩 </option>
					   
					   </select><span class="help-inline">   压缩需配置好ZipArchive</span></td>
					
					</tr>
					
					 <tr>
					
							<td colspan="2" class="t-right">
					
							 <button type="submit" class="btn blue" ><i class="icon-ok"></i> 备份</button>

					
					        </td>
					
						</tr>
					
					            </table>
					
					            </form>
					</div>

				</div>

			</div>

		</div>

	</div>
	
		<script type="text/javascript">

			document.getElementById('sqlmanage').className = 'start active '; 
			
		</script>
		
		<script type="text/javascript">

			document.getElementById('sqlbackup').className = 'active '; 
			
		</script>
			
		<?php mc_template_part('Admin_footer'); ?>