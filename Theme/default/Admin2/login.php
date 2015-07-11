<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登录到饭盒网客服查询系统</title>

    <!-- Bootstrap -->
    <link href="<?php echo mc_theme_url(); ?>/media2/css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="row">
     <div class="col-xs-6 col-md-4"></div>
      <div class="col-xs-6 col-md-4">
      <h2>fanheo客服查询平台</h2>
	<form class="form-horizontal" role="form" method="post" action="<?php echo U('user/login/submit'); ?>">
  <div class="form-group">
    
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="user_name" placeholder="用户名">
    </div>
  </div>
  <div class="form-group">
    
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name="user_pass" placeholder="密码">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-10">
      <button type="submit" class="form-control btn btn-default">登录</button>
    </div>
  </div>
</form>
</div>
 <div class="col-xs-6 col-md-4"></div>
 </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>