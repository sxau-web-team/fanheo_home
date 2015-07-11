<?php mc_template_part('header'); ?>
	<div class="container">
	<div class="panel panel-default" id="cart">
			<!-- Default panel contents -->
			<div class="panel-heading">
				<i class="glyphicon glyphicon-file"></i> 订单确认
			</div>
			<script>
			   
			    
			    function post(){
			    document.form1.action="<?php echo U('pro/post/post'); ?>";
			    document.form1.submit();
			    }
		    </script> 
			<?php if($page) : ?>
			<ul class="list-group">
			<?php foreach($page as $val) : ?>
			<li class="list-group-item pr">
				<div class="media">
					<a class="pull-left img-div" href="<?php echo U('pro/index/single?id='.$val['page_id']); ?>">
						<?php $fmimg_args = mc_get_meta($val['page_id'],'fmimg',false); ?>
						<img class="media-object" src="<?php echo $fmimg_args[0]; ?>" alt="<?php echo mc_get_page_field($val['page_id'],'title'); ?>">
					</a>
					<div class="media-body">
						<h4 class="media-heading">
							<a href="<?php echo U('pro/index/single?id='.$val['page_id']); ?>"><?php echo mc_get_page_field($val['page_id'],'title'); ?></a>
						</h4>
						<span class="btn btn-warning btn-sm">单价：<?php echo mc_get_meta($val['page_id'],'price'); ?> 元</span>
						<span class="btn btn-warning btn-sm">数量：<?php echo $val['action_value']; ?></span>
						<?php $parameter = M('action')->where("page_id='".$val['id']."' AND user_id='".mc_user_id()."'")->order('id asc')->getField('action_value',true); if($parameter) : ?>
						<ul class="list-inline mt-10">
						<?php foreach($parameter as $par) : list($par_name,$par_value) = explode('|',$par); ?>
						<li><span class="btn btn-warning btn-sm"><?php echo $par_name; ?>：<?php echo $par_value; ?></span></li>
						<?php endforeach; ?>
						</ul>

						<?php else : ?>


											
							<h3><a id="" href="#" data-toggle="modal" data-target="#category">请选择送餐时间!</a></h3>
										<script>
										    function add_sendtime<?php echo $val[id];?>(){
										    document.form<?php echo $val[id];?>.action="<?php echo U('home/perform/add_sendtime','id='.$val['page_id']); ?>";
										    document.form<?php echo $val[id];?>.submit();
										    }
									    </script> 
							<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										
										<div class="modal-body">
											<div class="row">
												<div class="col-sm-4">
												<form method="post" name="form<?php echo $val[id];?>" action="">
												<?php $parameter = M('option')->where("meta_key='parameter' AND type='pro'")->select(); if($parameter) : foreach($parameter as $par) : ?>
												<?php $pro_parameter = mc_get_meta($val['page_id'],$par['id'],false,'parameter'); if($pro_parameter) : ?>
												<h4 class="pro-par-list-title"><?php echo $par['meta_value']; ?></h4>
												<ul class="list-inline pro-par-list" id="par-list-<?php echo $par['id']; ?>">
												<?php $num=0; ?>
												<?php foreach($pro_parameter as $pro_par) : $num++; ?>
													<li>
														<label <?php if($num==1) echo 'class="active"'; ?>>
															<span><?php echo $pro_par; ?></span>
															<input type="radio" name="parameter[<?php echo $par['id']; ?>]" value="<?php echo $pro_par; ?>"  <?php if($num==1) echo 'checked'; ?>>
														</label>
													</li>
												<?php endforeach; ?>
												<script>
													$('#par-list-<?php echo $par['id']; ?> label').click(function(){
														$('#par-list-<?php echo $par['id']; ?> label').removeClass('active');
														$(this).addClass('active');
													});
												</script>
												</ul>
												<?php endif; ?>
												<?php endforeach; endif; ?>
												<h4>  </h4>
												<button type="submit" onClick="add_sendtime<?php echo $val[id];?>()" class="btn btn-warning ">
												确认
												</button>
											</form>
											</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						<?php endif; ?>
					</div>
				</div>
				
			</li>
			<?php endforeach; ?>
			</ul>
			<div class="panel-footer">
				<div class="row">
					<div class="col-sm-6">
						<div class="btn btn-link" id="total">商品总价：<span><?php echo mc_total(); ?></span> 元</div>
					</div>
					
				</div>
			</div>
			<?php else : ?>
			<div class="panel-body text-center">饭盒里没有任何商品</div>
			<?php endif; ?>
		</div>
		<div class="panel panel-default" id="checkout">
			<!-- Default panel contents -->
			<div class="panel-heading">
				<i class="glyphicon glyphicon-map-marker"></i> 收货信息
			</div>
			
			<div class="panel-body">
			<div class="alert alert-warning" role="alert"><?php echo '<h5>'.'【'.$_POST['buyer_province'].'】【'.$_POST['buyer_city'].'】【'.$_POST['buyer_address'].'】    【'.$_POST['buyer_name'].'】    手机：'.$_POST['buyer_phone'].'</h5><br/>【备注】'.$_POST['note'];?></div>
			</div>
			<div class="panel-footer">
				<a href="<?php echo U('pro/cart/checkout'); ?>" class="btn btn-warning">
					<i class="glyphicon glyphicon-circle-arrow-left"></i> 上一步
				</a>
				<button type="submit" onClick="post()" class="btn btn-warning pull-right">
					<i class="glyphicon glyphicon-usd"></i> 确认订单
				</button>
			<form type="hidden" name="form1" method="post" action="">
				
				<input type="hidden" value="<?php echo $_POST['buyer_province'].$_POST['buyer_city'].$_POST['buyer_address']; ?>" name="address">
				<input type="hidden" value="<?php echo $_POST['buyer_name']; ?>" name="user_name">
				<input type="hidden" value="<?php echo $_POST['buyer_phone']; ?>" name="phone">
				<input type="hidden" value="<?php echo $_POST['note']; ?>" name="note">
				
			</form>
			</div>
			
		</div>
	</div>
<?php mc_template_part('footer'); ?>