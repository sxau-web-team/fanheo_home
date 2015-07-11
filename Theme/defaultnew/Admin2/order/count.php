<?php mc_template_part('Admin2_header'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="row">
			  <div class="col-lg-6">
			  <form id="searchform" role="form" method="get" action="<?php echo U('Admin2/Index/search'); ?>">
			    <div class="input-group">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="submit">姓名查询</button>
			      </span>
			      <input name="name" type="text" class="form-control">
			    </div><!-- /input-group -->
				</form>
			  </div><!-- /.col-lg-6 -->
			  <div class="col-lg-6">
			   <form id="searchform" role="form" method="get" action="<?php echo U('Admin2/Index/search'); ?>">
			    <div class="input-group">
			      <input type="text" name="ordernumber" class="form-control">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="submit">订单号查询</button>
			      </span>
			    </div><!-- /input-group -->
				</form>
			  </div><!-- /.col-lg-6 -->
			</div><!-- /.row -->

 
          <div class="row">
                <div class="col-lg-6">
                  <h2 class="sub-header">订单列表</h2>
                </div>
                <div class="col-lg-6">
                <br/>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      全部订单 <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">确认中订单</a></li>
                      <li><a href="#">已配送订单</a></li>
                      <li><a href="#">已完成订单</a></li>
                      <li><a href="#">已取消订单</a></li>
                    </ul>
                  </div>
				  <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      餐厅 <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                     <?php $terms = M('page')->where('type="term_local"')->order('id desc')->select(); ?>
			<?php foreach($terms as $val) : ?>
			<li>
				<a href="<?php echo U('pro/index/term?id='.$val['id']); ?>">
					<?php echo $val['title']; ?>
				</a>
			</li>
			<?php endforeach; ?>
                    </ul>
                  </div>
                </div>
                  
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>订单号</th>
                  <th>姓名</th>
                  <th>商品</th>
                  <th>数量</th>
                  <th>价格</th>
                  <th>处理时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
					<?php foreach($page as $val) : ?>
						
						<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFF5EE';">
          
							<td><?php echo $val['number'];?></td>
							<td><?php echo $val['user_name'];?></td>
          					<td><?php echo $val['pro_id'];?></td>
          					<td><?php echo $val['count'];?></td>
          					<td><?php echo $val['price'];?></td>
          					<td><?php echo $val['creat_time'];?></td>
							<td>
                    <div >
                      <button data-original-title="Popover title" type="button" class="btn btn-sm btn-danger bs-docs-popover" data-toggle="popover" data-html="true" data-placement="left" title="订单详情" data-content="订单号：<?php echo $val['number'];?><br/>姓名：<?php echo $val['user_name'];?><br/>配送地址：<?php echo $val['address'];?><br/>手机：<?php echo $val['phone'];?><br/>备注：<?php echo $val['note'];?>">详情</button>
					   <a href="<?php echo U('Admin2/Order/print_single?id='.$val['number']); ?>"  type="button"  class="btn btn-sm btn-danger " >打印</a>
                    </div>          
                  </td>
						</tr>
						
					<?php endforeach; ?>
              </tbody>
            </table>
			<?php echo mc_pagenavi2($count,$page_now); ?>
          </div>
        </div>
		

 <?php mc_template_part('Admin2_footer'); ?>