<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>扫描条形码确认订单</title>

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

  <body onload="textInput.focus()">
	<div class="row">
	  <div class="col-lg-4">

	  </div><!-- /.col-lg-6 -->
	  <div class="col-lg-4">
    <br/><br/><br/><br/>
    <h1 style="text-align: center;">扫描条形码确认订单</h1>
	  <form id="form" method="get" action="<?php echo U('Admin2/Order/saoma'); ?>">
	    <div class="input-group">
	    	
			      <input type="text" id="saoma" name="id" class="form-control">
            <input type="hidden" name="status" value="4">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="submit">Go!</button>
			      </span>
	      	
	    </div><!-- /input-group -->
	    </form>
	  </div><!-- /.col-lg-6 -->
	  <div class="col-lg-4">
	    
	  </div><!-- /.col-lg-6 -->
	</div>
	
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo mc_theme_url(); ?>/media2/js/jquery.js"></script>
    <script src="<?php echo mc_theme_url(); ?>/media2/js/bootstrap.min.js"></script>
    <script type="javascript">

      window.onload = function(){
        var oInput = document.getElementById("saoma");
        oInput.focus();
        
        }
    </script>
  </body>
  </html>