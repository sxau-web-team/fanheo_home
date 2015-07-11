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

								<a href="#">系统设置</a>

								<i class="icon-angle-right"></i>

							</li>

							<li><a href="#">系统设置</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>

				</div>

				<!-- END PAGE HEADER-->
				
				<!-- BEGIN PAGE CONTENT-->
				
				
					
					<form role="form" method="post" action="<?php echo mc_page_url(); ?>" class="form-horizontal">
					
					<div class="control-group">

						<label class="control-label">* 网站名称：</label>

							<div class="controls">

								<input type="text" value="<?php echo mc_option('site_name'); ?>" class="m-wrap medium" name="site_name"/>

								<span class="help-inline">网站的名字，会显示在title和主题的某些部分</span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 网站地址：</label>

							<div class="controls">

								<input type="url" value="<?php echo mc_option('site_url'); ?>" class="m-wrap medium" name="site_url"/>

								<span class="help-inline">访问网站的地址，请勿删除<code>http://</code>，最后请勿加<code>/</code></span>

							</div>

					</div>

					<div class="control-group">

						<label class="control-label">* 网站主题：</label>

							<div class="controls">

								<input type="text" value="<?php echo mc_option('theme'); ?>" class="m-wrap medium" name="theme" placeholder="" disabled/>

								<span class="help-inline">网站使用的主题，默认为<code>default</code></span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 每页文章数量：</label>

							<div class="controls">

								<input type="number" value="<?php echo mc_option('page_size'); ?>" placeholder="" min="1" class="m-wrap medium" name="page_size"/>

								<span class="help-inline">请设置大于1的整数</span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* Sidebar内容设置:</label>

							<div class="controls">
							
								<textarea name="sidebar" class="form-control" rows="3"><?php echo mc_option('sidebar'); ?></textarea>

								<span class="help-inline">支持HTML代码，下一版本会提供更多控制方式</span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 支付宝接口设置:</label>

							<div class="controls">

								<input type="text" value="<?php echo mc_option('alipay2_seller'); ?>" placeholder="支付宝卖家账户"  class="m-wrap medium" name="alipay2_seller"/>

							</div>
							
							</div>
							
							<div class="control-group">
							
								<label class="control-label"></label>
								
								<div class="controls">

								<input type="text" value="<?php echo mc_option('alipay2_partner'); ?>" placeholder="partner"  class="m-wrap medium" name="alipay2_partner"/>
								
								</div>

							</div>
							
							<div class="control-group">
							
								<label class="control-label"></label>
								
								<div class="controls">

								<input type="password" value="<?php echo mc_option('alipay2_key'); ?>" placeholder="Key"  class="m-wrap medium" name="alipay2_key"/>
								
								<span class="help-inline">目前版本仅支持支付宝双接口，其他接口无效。</span>
								
								</div>

							</div>
							
							<div class="control-group">
							
								<label class="control-label">默认用户背景图片:</label>
								
								<div class="controls">
								
									<div class="col-sm-6" id="pub-imgadd">
									
										<img style="width:500px;" class="default-img" src="<?php if(mc_option('fmimg')) : echo mc_option('fmimg'); else : ?><?php echo mc_theme_url(); ?>/img/user_bg.jpg<?php endif; ?>">
								
									</div>
								
								</div>

							</div>
							
							<div class="control-group">
							
								<label class="control-label">首页幻灯设置</label>
								
									<div class="controls">
								
									<div class="col-sm-4" id="pub-imgadd-1">
										
										<img style="width:500px;height:160px;" class="default-img mb-10" src="<?php if(mc_option('homehdimg1')) : echo mc_option('homehdimg1'); else : ?><?php echo mc_theme_url(); ?>/img/upload.jpg<?php endif; ?>">
										
										<input type="url" class="form-control" name="homehdlnk1" placeholder="幻灯图片链接-1" value="<?php echo mc_option('homehdlnk1'); ?>">
										
									</div>
									
									</div>
									
									</div>
									
									<div class="control-group">
								
									<div class="controls">
									
										<div class="col-sm-4" id="pub-imgadd-2">
										
											<img style="width:500px;height:160px;" class="default-img mb-10" src="<?php if(mc_option('homehdimg2')) : echo mc_option('homehdimg2'); else : ?><?php echo mc_theme_url(); ?>/img/upload.jpg<?php endif; ?>">
											
											<input type="url" class="form-control" name="homehdlnk2" placeholder="幻灯图片链接-2" value="<?php echo mc_option('homehdlnk2'); ?>">
											
										</div>
									
									</div>
									
									</div>
									
									<div class="control-group">
								
									<div class="controls">
									
										<div class="col-sm-4" id="pub-imgadd-3">
										
											<img style="width:500px;height:160px;" class="default-img mb-10" src="<?php if(mc_option('homehdimg3')) : echo mc_option('homehdimg3'); else : ?><?php echo mc_theme_url(); ?>/img/upload.jpg<?php endif; ?>">
											
											<input type="url" class="form-control" name="homehdlnk3" placeholder="幻灯图片链接-3" value="<?php echo mc_option('homehdlnk3'); ?>">
											
										</div>
									
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

			document.getElementById('systemsetting').className = 'active '; 
			
		</script>
		
		<script charset="utf-8" src="<?php echo mc_site_url(); ?>/Kindeditor/kindeditor-min.js"></script>
		
		<script charset="utf-8" src="<?php echo mc_site_url(); ?>/Kindeditor/lang/zh_CN.js"></script>
		
		<script>
								KindEditor.ready(function(K) {
							    	var editor = K.editor({
										uploadJson : '<?php echo U('publish/index/upload'); ?>',
										allowFileManager : true
									});
									K('#pub-imgadd .default-img').click(function() {
										editor.loadPlugin('image', function() {
											editor.plugin.imageDialog({
												showRemote : false,
												clickFn : function(url, title, width, height, border, align) {
													$('#pub-imgadd .default-img').remove();
													$('<img src="'+url+'"><input type="hidden" name="fmimg" value="'+url+'">').prependTo('#pub-imgadd');
													editor.hideDialog();
												}
											});
										});
									});
									K('#pub-imgadd-1 .default-img').click(function() {
										editor.loadPlugin('image', function() {
											editor.plugin.imageDialog({
												showRemote : false,
												clickFn : function(url, title, width, height, border, align) {
													$('#pub-imgadd-1 .default-img').remove();
													$('<img src="'+url+'" class="default-img mb-10"><input type="hidden" name="homehdimg1" value="'+url+'">').prependTo('#pub-imgadd-1');
													editor.hideDialog();
												}
											});
										});
									});
									K('#pub-imgadd-2 .default-img').click(function() {
										editor.loadPlugin('image', function() {
											editor.plugin.imageDialog({
												showRemote : false,
												clickFn : function(url, title, width, height, border, align) {
													$('#pub-imgadd-2 .default-img').remove();
													$('<img src="'+url+'" class="default-img mb-10"><input type="hidden" name="homehdimg2" value="'+url+'">').prependTo('#pub-imgadd-2');
													editor.hideDialog();
												}
											});
										});
									});
									K('#pub-imgadd-3 .default-img').click(function() {
										editor.loadPlugin('image', function() {
											editor.plugin.imageDialog({
												showRemote : false,
												clickFn : function(url, title, width, height, border, align) {
													$('#pub-imgadd-3 .default-img').remove();
													$('<img src="'+url+'" class="default-img mb-10"><input type="hidden" name="homehdimg3" value="'+url+'">').prependTo('#pub-imgadd-3');
													editor.hideDialog();
												}
											});
										});
									});
								});
		</script>
		
		<link rel="stylesheet" href="<?php echo mc_site_url(); ?>/Kindeditor/themes/default/default.css" />
			
		<?php mc_template_part('Admin_footer'); ?>