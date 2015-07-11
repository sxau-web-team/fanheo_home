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
	
	<link rel="stylesheet" href="<?php echo mc_theme_url(); ?>/media/css/a.css" type="text/css" media="screen" />

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

							编辑商品 <small>今日任务：统计在售商户商品的库存</small>

						</h3>
						
						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="<?php echo U('Admin/index/index');?>">首页</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li>

								<a href="#">商品管理</a>

								<i class="icon-angle-right"></i>

							</li>

							<li><a href="#">编辑商品</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>

				</div>

				<!-- END PAGE HEADER-->
				
				<!-- BEGIN PAGE CONTENT-->
				<link rel="stylesheet" href="<?php echo mc_site_url(); ?>/Kindeditor/themes/default/default.css" />
				
				<form role="form" method="post" class="form-horizontal" action="<?php echo U('Home/perform/edit'); ?>">
				
				<div class="control-group">

						<label class="control-label">* 商品名称：</label>

							<div class="controls">

								<input type="text" value="<?php echo mc_get_page_field($_GET['id'],'title'); ?>" class="m-wrap large" name="title"/>

								<span class="help-inline">请填写商品标题</span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 商品价格：</label>

							<div class="controls">

								<input type="text" value="<?php echo mc_get_meta($_GET['id'],'price'); ?>" class="m-wrap medium" name="price"/>

								<span class="help-inline">请填写商品价格，单位元</span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 选择分类：</label>

							<div class="controls">

								<select class="form-control" name="term">
							<?php $terms = M('page')->where('type="term_pro"')->order('id desc')->select(); ?>
							<?php foreach($terms as $val) : ?>
							<option value="<?php echo $val['id']; ?>" <?php if(mc_get_meta($_GET['id'],'term')==$val['id']) echo 'selected'; ?>>
								<?php echo $val['title']; ?>
							</option>
							<?php endforeach; ?>
						</select>

								<span class="help-inline"></span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 选择店铺：</label>

							<div class="controls">

								<select class="form-control" name="local">
							<?php $terms = M('page')->where('type="term_local"')->order('id desc')->select(); ?>
							<?php foreach($terms as $v) : ?>
							<option value="<?php echo $v['id']; ?>" <?php if(mc_get_meta($_GET['id'],'local')==$val['id']) echo 'selected'; ?>>
								<?php echo $v['title']; ?>
							</option>
							<?php endforeach; ?>
						</select>

								<span class="help-inline"></span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 商品详细描述：</label>

							<div class="controls">

								<div id="entry">
									<textarea name="content" class="form-control" rows="3"><?php echo mc_get_page_field($_GET['id'],'content'); ?></textarea>
								</div>

								<span class="help-inline"></span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 商品缩略图上传：</label>

							<div class="controls" id="single-top">

								<div class="col-sm-6" id="pro-index-tl">
					<div id="pro-index-tlin">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators" id="publish-carousel-indicators"><?php $fmimg = mc_get_meta($_GET['id'],'fmimg',false); foreach($fmimg as $val) : $num0++; ?><li data-target="#carousel-example-generic" data-slide-to="<?php echo $num0-1; ?>" class="<?php if($num0==1) echo 'active'; ?>"></li><?php endforeach; ?><li data-target="#carousel-example-generic" data-slide-to="<?php echo $num0; ?>"></li></ol>
						<div class="carousel-inner" id="pub-imgadd">
							<?php $fmimg = mc_get_meta($_GET['id'],'fmimg',false); ?>
							<?php if($fmimg) : ?>
							<?php foreach($fmimg as $val) : ?>
							<?php $num++; ?>
							<div class="item <?php if($num==1) echo 'active'; ?>">
								<div class="imgshow"><img src="<?php echo $val; ?>"><input type="hidden" name="fmimg[]" value="<?php echo $val; ?>"></div>
								<i class="glyphicon glyphicon-remove-circle"></i>
							</div>
							<?php endforeach; ?>
							<div class="item">
								<div class="imgshow"><img src="<?php echo mc_theme_url(); ?>/img/upload.jpg"></div>
							</div>
							<?php else : ?>
							<div class="item active">
								<div class="imgshow"><img src="<?php echo mc_theme_url(); ?>/img/upload.jpg"></div>
							</div>
							<?php endif; ?>
						</div>
					</div>
					</div>
				</div>

								<span class="help-inline"></span>

							</div>
							
							<div class="form-actions" >
				
								<button type="submit" class="btn blue" ><i class="icon-ok"></i> 保存</button>
							
							</div>
							
					</div>
					
					<input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
	
	</form>
	</div>
	</div>
	<script charset="utf-8" src="<?php echo mc_site_url(); ?>/Kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="<?php echo mc_site_url(); ?>/Kindeditor/lang/zh_CN.js"></script>
	<script>
	function mc_fmimg_delete() {
			$('.item i').click(function(){
				var index = $(this).parent(".item").index()*1+1;
				$('#pub-imgadd .item:eq('+index +')').addClass('active');
				$(this).parent(".item").remove();
				$('.carousel-indicators li').last().remove();
			});
		};
		var editor;
		KindEditor.ready(function(K) {
			editor = K.create('textarea[name="content"]', {
				resizeType : 1,
				allowPreviewEmoticons : false,
				allowImageUpload : true,
				height : 400,
				uploadJson : '<?php echo U('Publish/index/upload'); ?>',
				items : ['source', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'clearhtml', 'quickformat', 'selectall', '|', 
		'formatblock', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
		'italic', 'underline', 'strikethrough', 'removeformat', '|', 'image', 'multiimage', 'table', 'hr', 'emoticons', 'baidumap', 'link', 'unlink'],
				afterChange : function() {
					K(this).html(this.count('text'));
				}
			});
		});
					KindEditor.ready(function(K) {
				    	var editor = K.editor({
							uploadJson : '<?php echo U('Publish/index/upload'); ?>',
							allowFileManager : true
						});
						K('#pub-imgadd').click(function() {
							editor.loadPlugin('image', function() {
								editor.plugin.imageDialog({
									showRemote : false,
									clickFn : function(url, title, width, height, border, align) {
										$('.item').removeClass('active');
										$('<div class="item active"><div class="imgshow"><img src="'+url+'"></div><input type="hidden" name="fmimg[]" value="'+url+'"></div>').prependTo('#pub-imgadd');
										var index = $('.carousel-indicators li').last().index()*1+1;
										$('<li data-target="#carousel-example-generic" data-slide-to="'+index+'"></li>').appendTo('.carousel-indicators');
										editor.hideDialog();
									}
								});
							});
						});
					});
				</script>
		<script type="text/javascript">

			document.getElementById('good').className = 'start active '; 
			
		</script>
		
		<script type="text/javascript">

			document.getElementById('addgood').className = 'active '; 
			
		</script>
		
		<?php mc_template_part('Admin_footer'); ?>