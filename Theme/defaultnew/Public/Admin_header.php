<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{$title}</title>
	<script src="<?php echo mc_theme_url(); ?>/js/jquery.min.js"></script>
    <link href="<?php echo mc_theme_url(); ?>/css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
  <!--顶部导航 -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{:U('Index/Index')}">FanHe.饭盒.后台系统</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
         
          <ul class="nav navbar-nav navbar-right">
              
              <li><a href="{:U('UCenter/index')}">个人中心</a></li>
              <li><a href="{:U('Index/logout')}">退出</a></li>
              </if>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

     <!-- 主页面 -->
    <div class="container">
      <div class="bread" >
      <!--面包屑导航条-->
            <ol class="breadcrumb">
                <li><a href="{:U('Index/Index')}">首页</a></li>
                 <li class="active">{$stitle}</li>
            </ol>
      </div>  