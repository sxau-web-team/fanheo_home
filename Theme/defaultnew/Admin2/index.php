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
                  <h2 class="sub-header"><span class="glyphicon glyphicon-file"></span> 订单列表
                    <h4><?php echo $_GET['date'];?>-<?php echo mc_get_page_field(mc_get_meta($_GET['store'],'local'),title);?>-数量<span style="color: rgb(255, 0, 0);"><strong><span style="font-family: 黑体,SimHei; font-size: 20px;"><?php echo $count;?></span></strong><strong><span style="font-family: 黑体,SimHei; font-size: 20px;"></span></strong></span></h4>
                  </h2>
                </div>
                <div class="col-lg-6">
                <br/>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      全部订单 <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="<?php U('admin2/index/index'); ?>?<?php if($_GET['store']) echo "store=".$_GET['store']."&";?>status=1<?php if($_GET['date']) echo "&date=".$_GET['date'];?>">未配送订单</a></li>
                      <li><a href="<?php U('admin2/index/index'); ?>?<?php if($_GET['store']) echo "store=".$_GET['store']."&";?>status=2<?php if($_GET['date']) echo "&date=".$_GET['date'];?>">制作中订单</a></li>
                      <li><a href="<?php U('admin2/index/index'); ?>?<?php if($_GET['store']) echo "store=".$_GET['store']."&";?>status=3<?php if($_GET['date']) echo "&date=".$_GET['date'];?>">配送中订单</a></li>
                      <li><a href="<?php U('admin2/index/index'); ?>?<?php if($_GET['store']) echo "store=".$_GET['store']."&";?>status=4<?php if($_GET['date']) echo "&date=".$_GET['date'];?>">已完成订单</a></li>
                      <li><a href="<?php U('admin2/index/index'); ?>?<?php if($_GET['store']) echo "store=".$_GET['store']."&";?>status=5<?php if($_GET['date']) echo "&date=".$_GET['date'];?>">已删除订单</a></li>
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
                        	<a href="<?php U('admin2/index/index'); ?>?store=<?php echo $val['id'];?><?php if($_GET['status']) echo "&status=".$_GET['status'];?><?php if($_GET['date']) echo "&date=".$_GET['date'];?>">
                        			<?php echo $val['title']; ?>
                        	</a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                  </div>
                  
                  <div class="btn-group">
                  <br/>
                        <div class="input-group date form_date " data-date="" data-date-format="yyyy-m-d" data-link-field="dtp_input2" data-link-format="y-m-d">
                            <form action="" method="get" name="date">
                            <input class="form-control" onchange="javascript:submit()"  size="16" type="text" value="" name="date">
                            </form>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input2" value="" /><br/>
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
                  <th>状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
					<?php foreach($page as $val) : ?>
						
						<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFF5EE';">
          
							<td><?php echo $val['number'];?></td>
							<td><?php echo $val['user_name'];?></td>
          					<td>【<?php echo mc_get_page_field(mc_get_meta($val['pro_id'],'local'),title); ?>】【<?php echo mc_get_page_field($val['pro_id'],title); ?> x <?php echo $val['count'];?>】</td>
          					<td><?php echo $val['count'];?></td>
          					<td><?php echo $val['price'];?></td>

          					<td><?php echo mdate($val['creat_time']);?></td>
                    <td>
                      <?php if($val['status']=='1') : ?>
                      <span class="btn btn-warning btn-sm">新订单</span>
                      <?php elseif($val['status']=='2') : ?>
                        <span class="btn btn-warning btn-sm">制作中</span>
                      <?php elseif($val['status']=='3') : ?>
                    <form type="hidden" name="form1" method="post" action="<?php echo U('user/index/affirm'); ?>">
                  
                      <input type="hidden" value="<?php echo $val['number'];?>" name="number">
                      <input type="hidden" value="<?php echo $val['user_id'];?>" name="user_id">
                      <button type="submit" class="btn btn-warning btn-sm">已配送</button>
                      
                    </form>
                      <?php elseif($val['status']=='4') : ?>
                      <span class="btn btn-success btn-sm">交易完成</span>
                    <?php elseif($val['status']=='5') : ?>
                      <span class="btn btn-danger btn-sm">已删除</span>
                      <?php endif; ?>
                    </td>
							     <td>
                    <div >
                      <button data-original-title="Popover title" type="button" class="btn btn-sm  bs-docs-popover" data-toggle="popover" data-html="true" data-placement="left" title="订单详情" data-content="订单号：<?php echo $val['number'];?><br/>姓名：<?php echo $val['user_name'];?><br/>配送地址：<?php echo $val['address'];?><br/>手机：<?php echo $val['phone'];?><br/>备注：<?php echo $val['note'];?>">详情</button>
                       <?php if($val['status']=='1') : ?>
                        <a href="<?php echo U('Admin2/Order/zhizuo?number='.$val['number'].'&store='.$val['store']);  ?>"  type="button"  class="btn btn-sm btn-danger " >制作</a>
                       <?php elseif($val['status']=='2') : ?>
                        <a href="<?php echo U('Admin2/Order/peisong?number='.$val['number'].'&store='.$val['store']);  ?>"  type="button"  class="btn btn-sm btn-danger " >配送</a>
                       <?php elseif($val['status']=='3') : ?>
                        <a href="<?php echo U('Admin2/Order/wancheng?number='.$val['number'].'&store='.$val['store']);  ?>"  type="button"  class="btn btn-sm btn-danger " >完成</a>
                       <?php endif; ?>
                      <a href="<?php echo U('Admin2/Order/delete?number='.$val['number'].'&store='.$val['store']);  ?>"  type="button"  class="btn btn-sm btn-danger " >删除</a>
					            <a href="<?php echo U('Admin2/Order/print_single?id='.$val['number']); ?>"  type="button"  class="btn btn-sm btn-warning " >打印</a>
                    </div>          
                  </td>
						</tr>
						
					<?php endforeach; ?>
              </tbody>
            </table>
           
			
          </div>
        </div>


<script type="text/javascript" src="<?php echo mc_theme_url(); ?>/media2/js/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo mc_theme_url(); ?>/media2/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo mc_theme_url(); ?>/media2/js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript">

  $('.form_date').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });

</script>		

 <?php mc_template_part('Admin2_footer'); ?>