<?php mc_template_part('Admin2_header'); ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="row">
<div class="col-lg-6">
                  <h2 class="sub-header">用户留言</h2>
                </div>
                <div class="col-lg-6">
                <br/>
			  <form id="searchform" role="form" method="get" action="<?php echo U('Admin2/User/search'); ?>">
			    <div class="input-group">
			      
			    </div><!-- /input-group -->
				</form>
			  </div><!-- /.col-lg-6 -->
				</div>
          <div class="table-responsive">
<table class="table table-hover">
				<thead>
					<tr>
						<th>
							分类
						</th>
						<th>
							用户名
						</th>
						<th>
							内容
						</th>
						<th>
							手机号
						</th>
						<th>
							邮箱
						</th>
						<th>
							日期
						</th>
						<th>
							操作
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($page as $val) : ?>
						
						<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFF5EE';">
          
							<td><?php echo $val['type'];?></td>
          
							<td><?php echo mc_user_display_name($val['user_id']); ?></td>
							<td><?php echo $val['content'];?></td>
							<td><?php echo mc_get_meta($val['user_id'],'buyer_phone',true,'user'); ?></td>
          					<td><?php echo mc_get_meta($val['user_id'],'user_email',true,'user'); ?></td>
							<td><?php echo mdate($val['date']);?></td>
							<td><a class="btn btn-warning btn-sm" href="mailto:<?php echo mc_get_meta($val['user_id'],'user_email',true,'user'); ?>">回复</a></td>
						</tr>
						
					<?php endforeach; ?>
				</tbody>
			</table>
				<?php echo mc_pagenavi($count,$page_now); ?>

			   </div>
        </div>
 <?php mc_template_part('Admin2_footer'); ?>
