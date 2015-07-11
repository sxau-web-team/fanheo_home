<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>客服后台查询系统</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo mc_theme_url(); ?>/media2/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo mc_theme_url(); ?>/media2/css/dashboard.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo mc_theme_url(); ?>/media2/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style type="text/css" id="holderjs-style"></style></head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">fanheo</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">fanheo客服后台查询系统</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-th"></span>  主面板</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-file"></span>  订单</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-comment"></span>  用户留言</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-off"></span>  退出</a></li>
          </ul>
          
        </div>
      </div>
    </div>

    <div class="container-fluid">
      
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">主面板</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-file"></span>  订单管理</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-comment"></span>  用户留言</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>  用户列表</a></li>
          </ul>
          
          <ul class="nav nav-sidebar">
            <li><a href=""><span class="glyphicon glyphicon-barcode"></span>  商品列表</a></li>
            <li><a href=""><span class="glyphicon glyphicon-home"></span>  商家列表</a></li>
            <li><a href=""><span class="glyphicon glyphicon-user"></span>  厨师信息</a></li>
          </ul>
        </div>