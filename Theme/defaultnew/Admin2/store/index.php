<?php mc_template_part('Admin2_header'); ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="row">
		  <div class="col-lg-6">
			  <form id="searchform" role="form" method="get" action="<?php echo U('Admin2/Good/index'); ?>">
			    <div class="input-group">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="submit">商品查询</button>
			      </span>
			      <input name="keyword" type="text" class="form-control">
			    </div><!-- /input-group -->
				</form>
			  </div><!-- /.col-lg-6 -->
			</div><!-- /.row -->
			 <div class="row">
          <div class="col-lg-6">
                  <h2 class="sub-header">商品列表</h2>
                </div>

		                  <div class="col-lg-6">
                <br/>
                
				  <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      餐厅 <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
								<?php $terms = M('page')->where('type="term_local"')->order('id desc')->select(); ?>
			<?php foreach($terms as $val) : ?>
			<li>
				<a href="<?php echo U('Admin2/Good/term?id='.$val['id']); ?>">
					<?php echo $val['title']; ?>
				</a>
			</li>
			<?php endforeach; ?>
                    </ul>
                  </div>
                </div>
				</div>
          <div class="table-responsive">
<table class="table table-hover">
				<thead>
					<tr>
						<th>
							编号
						</th>
						<th>
							名称
						</th>
						<th>店铺分类</th>
					
					<th>店长</th>
					
					<th>联系方式</th>

					<th>厨师</th>
					
					<th>缩略图</th>
					
						<th>店铺介绍</th>
						
						<th>操作</th>
						
					</tr>
				</thead>
				<tbody>
					<?php foreach($page as $val) : ?>
						
						<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFF5EE';">
						
							<?php $fmimg_args = mc_get_meta($val['id'],'fmimg',false); ?>
          
							<td><?php echo $val['id'];?></td>
          
							<td><a class="img-div" href="<?php echo U('store/index/single?id='.$val['id']); ?>"><?php echo $val['title']; ?></a></td>

							<td><?php echo mc_get_meta($val['id'],'local'); ?></td>
          
							<td><?php echo mc_get_meta($val['id'],'header'); ?></td>
							
							<td><?php echo mc_get_meta($val['id'],'phone'); ?></td>
							
							<td><?php echo mc_get_meta($val['id'],'cook'); ?></td>

							<td><img src="<?php echo $fmimg_args[0]; ?>" style="height:50px;width:75px;" alt="<?php echo $val['title']; ?>"></td>
							
							<td><?php echo $val['content']; ?></td>
          
							<td>
								
							<a id="jianyi-model" href="#" data-toggle="modal" data-target="#<?php echo $val['id'];?>"><i class="glyphicon glyphicon-edit"></i></a>
<div class="modal fade" id="<?php echo $val['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
			</div>
			<div class="modal-body">
			<form role="form" method="post" action="<?php echo U('Admin2/Store/editstore'); ?>">
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

						<label class="control-label">* 店长：</label>

							<div class="controls">

								<input type="text" value="<?php echo mc_get_meta($val['id'],'header'); ?>" class="m-wrap medium" name="header"/>

								<span class="help-inline"></span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 联系方式：</label>

							<div class="controls">

								<input type="text" value="<?php echo mc_get_meta($val['id'],'phone'); ?>" class="m-wrap medium" name="phone"/>

								<span class="help-inline"></span>

							</div>

					</div>
					
					<div class="control-group">

						<label class="control-label">* 店铺厨师：</label>

							<div class="controls">

								<input type="text" value="<?php echo mc_get_meta($val['id'],'cook'); ?>" class="m-wrap medium" name="cook"/>

								<span class="help-inline"></span>

							</div>

					</div>
					
					<input name="id" type="hidden" value="<?php echo $val['id']; ?>">
					<div class="control-group">

						<label class="control-label">* 选择分类：</label>

							<div class="controls">

								<select class="form-control" name="local">
							<?php $terms = M('page')->where('type="term_local"')->order('id desc')->select(); ?>
							<?php foreach($terms as $val2) : ?>
							<option value="<?php echo $val2['id']; ?>">
								<?php echo $val2['title']; ?>
							</option>
							<?php endforeach; ?>
						</select>

								<span class="help-inline"></span>

							</div>

					</div>
					
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
							
							</td>
							
						</tr>
						
					<?php endforeach; ?>

				</tbody>
			</table>
			   </div>
        </div>
        </div>
 <?php mc_template_part('Admin2_footer'); ?>
