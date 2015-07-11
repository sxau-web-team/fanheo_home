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
                      全部商品<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <?php $terms = M('page')->where('type="term_pro"')->order('id desc')->select(); ?>
			<?php foreach($terms as $val) : ?>
			<li>
				<a href="<?php echo U('Admin2/Good/term?id='.$val['id']); ?>">
					<?php echo $val['title']; ?>
				</a>
			</li>
			<?php endforeach; ?>
                    </ul>
                  </div>
				  <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      餐厅 <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
								<?php $terms = M('page')->where('type="local"')->order('id desc')->select(); ?>
			<?php foreach($terms as $val) : ?>
			<li>
				<a href="<?php echo U('Admin2/Good/term?lid='.$val['id']); ?>">
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
							商品
						</th>
						<th>
							所属分类
						</th>
						<th>
							所属商家
						</th>
						<th>
							单价
						</th>
						<th>
							缩略图
						</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($page as $val) : ?>
						
						<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFF5EE';">
						
							<?php $fmimg_args = mc_get_meta($val['id'],'fmimg',false); ?>
          
							<td><?php echo $val['id'];?></td>
          
							<td><a class="img-div" href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><?php echo $val['title']; ?></a></td>

							<td><?php echo mc_get_page_field(mc_get_meta($val['id'],'term'),'title'); ?></td>
          
							<td><?php echo mc_get_page_field(mc_get_meta($val['id'],'store'),'title'); ?><span><?php echo mc_get_meta($val['id'],'price'); ?></span> <small>元</small></td>
							
							<td><?php echo mc_get_page_field(mc_get_meta($val['id'],'store'),'title'); ?><span><?php echo mc_get_meta($val['id'],'price'); ?></span> <small>元</small></td>

							<td><img src="<?php echo $fmimg_args[0]; ?>" style="height:50px;width:75px;" alt="<?php echo $val['title']; ?>"></td>
							
						</tr>
						
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php echo mc_pagenavi($count,$page_now); ?>
			   </div>
        </div>
        </div>
 <?php mc_template_part('Admin2_footer'); ?>
