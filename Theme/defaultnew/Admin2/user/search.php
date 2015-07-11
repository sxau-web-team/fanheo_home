<?php mc_template_part('Admin2_header'); ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="row">
<div class="col-lg-6">
                  <h2 class="sub-header">用户列表</h2>
                </div>
                <div class="col-lg-6">
                <br/>
			  <form id="searchform" role="form" method="get" action="<?php echo U('Admin2/User/search'); ?>">
			    <div class="input-group">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="submit">用户查询</button>
			      </span>
			      <input name="name" type="text" class="form-control">
			    </div><!-- /input-group -->
				</form>
			  </div><!-- /.col-lg-6 -->
				</div>
          <div class="table-responsive">
<table class="table table-hover">
				<thead>
					<tr>
						<th>
							编号
						</th>
						<th>
							用户名
						</th>
						<th>
							积分
						</th>
						<th>
							手机号
						</th>
						<th>
							详细地址
						</th>
					<th>头像</th>
					
					<th>邮箱</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($page as $val) : ?>
						
						<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFF5EE';">
          
							<td><?php echo $val['id'];?></td>
          
							<td><?php echo mc_user_display_name($val['id']); ?></td>

							<td><?php echo mc_get_meta($val['id'],'coins',true,'user'); ?></td>
							
							<td><?php echo mc_get_meta($val['id'],'buyer_phone',true,'user'); ?></td>
          
							<td><?php echo mc_get_meta($val['id'],'buyer_province',true,'user').mc_get_meta($val['id'],'buyer_city',true,'user').mc_get_meta($val['id'],'buyer_address',true,'user').mc_get_meta($val['id'],'buyer_name',true,'user'); ?></td>
							
							<td><img width="50" class="media-object" src="<?php echo mc_user_avatar($val['id']); ?>" alt="<?php echo mc_user_display_name($val['id']); ?>"></td>
          
							<td><?php echo mc_get_meta($val['id'],'user_email',true,'user'); ?></td>
							
						</tr>
						
					<?php endforeach; ?>
				</tbody>
			</table>
				<?php echo mc_pagenavi($count,$page_now); ?>

			   </div>
        </div>
        </div>
 <?php mc_template_part('Admin2_footer'); ?>
