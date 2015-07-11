<?php mc_template_part('Admin2_header'); ?>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main ">
	<div class="container-fluid home-main">
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
                  <h2 class="sub-header">搜索结果</h2>
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
                </div>
          </div>
		<div class="row">
			<div class="col-sm-12" id="post-list-default">
				<?php if($page) : ?>
				<table class="table hovertable  table-bordered table-condensed">
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
					   <button data-original-title="Popover title" type="button" class="btn btn-sm btn-danger bs-docs-popover" data-toggle="popover" data-html="true">打印</button>
                    </div>          
                  </td>
						</tr>
						
				<?php endforeach; ?>
				</tbody>
				</table>
				<?php echo mc_pagenavi($count,$page_now); ?>
				<?php else : ?>
				<ul class="list-group">
				<div id="nothing">没有搜索到任何东东！</div></ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
	</div>
<?php mc_template_part('Admin2_footer'); ?>