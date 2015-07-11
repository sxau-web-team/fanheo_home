<!DOCTYPE html>


<head runat="server">

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

							所有订单 <small>今日任务：统计在售商户商品的库存</small>

						</h3>
						
						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="<?php echo U('Admin/index/index');?>">首页</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li>

								<a href="<?php echo U('Admin/Order/index');?>">订单管理</a>

								<i class="icon-angle-right"></i>

							</li>

							<li><a href="<?php echo mc_page_url();?>">所有订单</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>

				</div>
				<div class="noprint">
        <input type="button" value="toPrinter " onclick="doPrint();" />
    </div>
    <script type="text/javascript">
        function doPrint() {
            viewToWord("房间：903\r\n栋号：6\r\n楼层：9\r\n户型\r\n时间：2011年9月16日");
        }
        var wdapp;
        var wddoc;
        function viewToWord(str) {
            try {
                //获取Word 过程
                //请设置IE的可信任站点
                wdapp = new ActiveXObject("Word.Application");
            }
            catch (e) {
                alert("无法调用Office对象，请确保您的机器已安装了Office并已将本系统的站点名加入到IE的信任站点列表中！");
                wdapp = null;
                return;
            }
            wdapp.Documents.Open("d:\PrinterTemplate.doc"); //打开本地(客户端)word模板
            wddoc = wdapp.ActiveDocument;
            wddoc.Bookmarks("Title").Range.Text = "要打印的标题";//找到Word中的Title标签，替换其内容
            wddoc.Bookmarks("Content").Range.Text = str;
            //wdapp.ActiveDocument.ActiveWindow.View.Type = 1;
            wdapp.visible = false; //word模板是否可见
            wddoc.saveAs("d:\PrinterTemp.doc"); //保存临时文件word
            wdapp.Application.Printout(); //调用自动打印功能

            wdapp.quit();
            wdapp = null;
            wddoc.quit();
            wddoc = null;
        }
    </script>

				<!-- END PAGE HEADER-->
				
				<!-- BEGIN PAGE CONTENT-->
				
				<div class="container-fluid">
				
				<table class="table hovertable  table-bordered table-condensed">
				
				<tr>					
					<th>订单编号</th>									
					<th>收货人姓名</th>
					<th>电话</th>		
					<th>地址</th>
					<th>商品</th>
					<th>数量</th>
					<th>金额</th>
					<th>备注</th>
					<th>创建时间</th>
					<th>发货时间</th>
					<th>状态</th>
					<th>操作</th>
				
					<?php foreach($page as $val) : ?>
						
						<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFF5EE';">
          
							<td><?php echo $val['number'];?></td>
							<td><?php echo $val['user_name'];?></td>
          					<td><?php echo $val['phone'];?></td>
          					<td><?php echo $val['address'];?></td>
          					<td><?php echo $val['pro_id'];?></td>
          					<td><?php echo $val['count'];?></td>
          					<td><?php echo $val['price'];?></td>
          					<td><?php echo $val['note'];?></td>
          					<td><?php echo $val['creat_time'];?></td>
          					<td><?php echo $val['send_time'];?></td>
							
          					<td><?php if ($val['status']==0) {
								echo "未发货";
							}elseif($val['status']==1){
								echo "已发货";
							}
							?></td>
							<td><?php echo mc_fahuo_btn($val['number']); ?></td>

							
							
						</tr>
						
					<?php endforeach; ?>
				
				</tr> 

				</table>
				
				<?php echo mc_pagenavi2($count,$page_now); ?>

			</div>
			
		</div>

		</div>

		<script type="text/javascript">

			document.getElementById('order').className = 'start active '; 
			
		</script>
		
		<script type="text/javascript">

			document.getElementById('order').className = 'active '; 
			
		</script>
		
		<?php mc_template_part('Admin_footer'); ?>