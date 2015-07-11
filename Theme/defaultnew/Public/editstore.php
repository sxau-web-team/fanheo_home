<a id="jianyi-model" href="#" data-toggle="modal" data-target="#jianyi"><i class="glyphicon glyphicon-edit"></i></a>
<div class="modal fade" id="jianyi" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
			</div>
			<div class="modal-body">
			<form role="form" method="post" action="<?php echo U('home/perform/edit'); ?>">
				<div class="control-group">

						<label class="control-label">* 店铺名称：</label>

							<div class="controls">

								<input type="text" value="<?php echo mc_get_page_field($val['id'],'title'); ?>" class="m-wrap large" name="title"/>

								<span class="help-inline"></span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 店铺签名：</label>

							<div class="controls">

								<input type="text" value="<?php echo mc_get_meta($val['id'],'public'); ?>" class="m-wrap medium" name="public"/>

								<span class="help-inline"></span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 选择分类：</label>

							<div class="controls">

								<select class="form-control" name="local">
							<?php $terms = M('page')->where('type="term_local"')->order('id desc')->select(); ?>
							<?php foreach($terms as $val) : ?>
							<option value="<?php echo $val['id']; ?>">
								<?php echo $val['title']; ?>
							</option>
							<?php endforeach; ?>
						</select>

								<span class="help-inline"></span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 店长：</label>

							<div class="controls">

								<input type="text" value="<?php echo mc_option('pro_keywords'); ?>" class="m-wrap medium" name="header"/>

								<span class="help-inline"></span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 联系方式：</label>

							<div class="controls">

								<input type="text" value="" class="m-wrap medium" name="phone"/>

								<span class="help-inline"></span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 店铺厨师：</label>

							<div class="controls">

								<input type="text" value="" class="m-wrap medium" name="cook"/>

								<span class="help-inline"></span>

							</div>

					</div>
					<input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
					<div class="control-group">

						<label class="control-label"></label>

							<div class="controls">
<button type="submit" class="btn btn-warning btn-block">
						<i class="glyphicon glyphicon-ok-circle"></i> 保存
					</button>
								

							</div>

					</div>
					
					</form>
			</div>
		</div>
	</div>
</div>