<?php mc_template_part('header'); ?>
	<div class="container">
		<div class="panel panel-default" id="checkout">
			<!-- Default panel contents -->
			<div class="panel-heading">
				<i class="glyphicon glyphicon-map-marker"></i> 填写收货信息
			</div>
			<script>
			    function ailipay(){
			    document.form1.action="<?php echo U('pro/alipay/alipay2'); ?>";
			    document.form1.submit();
			    }
			    
			    function post(){
			    document.form1.action="<?php echo U('pro/cart/check'); ?>";
			    document.form1.submit();
			    }
		    </script> 
			<form role="form" name="form1" method="post" action="">
			<div class="panel-body">
				<div class="form-group">
					<div class="row">
						<div class="col-sm-4">
							<input type="text" name="buyer_name" class="form-control" placeholder="收货人姓名" value="<?php echo mc_get_meta(mc_user_id(),'buyer_name',true,'user'); ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-4">
							<input type="text" name="buyer_sushe" class="form-control" placeholder="宿舍号" value="<?php echo mc_get_meta(mc_user_id(),'buyer_name',true,'user'); ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<?php if(mc_get_meta(mc_user_id(),'buyer_province',true,'user') && mc_get_meta(mc_user_id(),'buyer_city',true,'user')) : ?>
					<div class="row" id="repcbox">
						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" class="form-control" name="address" value="<?php echo mc_get_meta(mc_user_id(),'buyer_province',true,'user').' '.mc_get_meta(mc_user_id(),'buyer_city',true,'user'); ?>" >
								<span class="input-group-addon" id="repc">
									<i class="glyphicon glyphicon-refresh"></i>
								</span>
							</div>
						</div>
					</div>
					<script>
						$('#repc').click(function(){
							$('#repcbox').html('<div class="col-sm-2"><select class="form-control" id="province" tabindex="4" runat="server" onchange="selectprovince(this);" name="buyer_province" datatype="*" errormsg="必须选择您所在的地区"></select></div><div class="col-sm-2"><select class="form-control" id="city" tabindex="4" disabled="disabled" runat="server" name="buyer_city"></select></div>');
							jQuery.getScript("<?php echo mc_theme_url(); ?>/js/address.js");
						});
					</script>
					<?php else : ?>
					<div class="row">
						<div class="col-sm-2">
							<select class="form-control" id="province" tabindex="4" runat="server" onchange="selectprovince(this);" name="buyer_province" datatype="*" errormsg="必须选择您所在的地区"></select>
						</div>
						<div class="col-sm-2">
							<select class="form-control" id="city" tabindex="4" disabled="disabled" runat="server" name="buyer_city"></select>
						</div>
					</div>
					
					<?php endif; ?>
				</div>
				<script src="<?php echo mc_theme_url(); ?>/js/address.js"></script>
				<div class="form-group">
					<textarea class="form-control" name="buyer_address" rows="3" placeholder="区县、街道、门牌号"><?php echo mc_get_meta(mc_user_id(),'buyer_address',true,'user'); ?></textarea>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-4">
							<input type="text" class="form-control" name="buyer_phone" placeholder="联系电话，非常重要" value="<?php echo mc_get_meta(mc_user_id(),'buyer_phone',true,'user'); ?>">
							
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-4">
							<textarea name="note" class="form-control" rows="3">在这里添加关于商品的备注</textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<a href="<?php echo U('pro/cart/index'); ?>" class="btn btn-info" >
					<i class="glyphicon glyphicon-circle-arrow-left"></i> 上一步
				</a>
				<button type="submit" class="btn btn-warning pull-right" onClick="ailipay()">
					<i class="glyphicon glyphicon-usd"></i> 在线支付
				</button>
				<button type="submit" class="btn btn-warning pull-right" onClick="post()" >
					<i class="glyphicon glyphicon-usd"></i> 货到付款
				</button>
			</div>
			 
			</form>
		</div>
	</div>
<?php mc_template_part('footer'); ?>