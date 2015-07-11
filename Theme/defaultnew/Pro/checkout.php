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
			<form role="form" class="form-horizontal" name="form1" method="post" action="">
			<div class="panel-body">
				<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
						<div class="col-sm-4">
							<input type="text" name="buyer_name" class="form-control" placeholder="" value="<?php echo mc_get_meta(mc_user_id(),'buyer_name',true,'user'); ?>">
						</div>
				</div>
				<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">学校</label>
						<div class="col-sm-4">
								<input name="buyer_province" type="text" class="form-control" value="山西农业大学" placeholder="学校" readonly>
				    			<p class="help-block">
						           暂只支持山西农业大学内部及周边订餐
						        </p>
						</div>
				</div>
				<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">楼区</label>
						<div class="col-sm-4">
						    <input name="buyer_city" type="text" class="form-control" value="<?php echo mc_get_meta(mc_user_id(),'buyer_city',true,'user'); ?>" placeholder="宿舍楼/办公楼/家属区/其他">
						</div>
				</div>
				<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">详细地址</label>
						<div class="col-sm-4">
							<textarea class="form-control" name="buyer_address" rows="3" placeholder="作为饭盒粉的你，在哪个角落呢？"><?php echo mc_get_meta(mc_user_id(),'buyer_address',true,'user'); ?></textarea>
						</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">联系电话</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="buyer_phone" placeholder="非常重要哦" value="<?php echo mc_get_meta(mc_user_id(),'buyer_phone',true,'user'); ?>">
						</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">备注</label>
						<div class="col-sm-4">
							<textarea name="note" class="form-control" rows="3"></textarea>
						</div>
				</div>
			</div>
			<div class="panel-footer">
				<a href="<?php echo U('pro/cart/index'); ?>" class="btn btn-warning">
					<i class="glyphicon glyphicon-circle-arrow-left"></i> 上一步
				</a>
				
				<button type="submit" class="btn btn-warning pull-right" onClick="post()" >
					<i class="glyphicon glyphicon-circle-arrow-right"></i> 下一步
				</button>
			</div>
			</form>
		</div>
	</div>
<?php mc_template_part('footer'); ?>