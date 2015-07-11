<?php mc_template_part('Admin2_header'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="row">
			  <div class="col-lg-6">
			    <div class="input-group">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button">姓名查询</button>
			      </span>
			      <input type="text" class="form-control">
			    </div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->
			  <div class="col-lg-6">
			    <div class="input-group">
			      <input type="text" class="form-control">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button">订单号查询</button>
			      </span>
			    </div><!-- /input-group -->
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
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                  <td>sit</td>
                  <td>
                    <div >
                      <button data-original-title="Popover title" type="button" class="btn btn-sm btn-danger bs-docs-popover" data-toggle="popover" data-html="true" data-placement="left" title="订单详情" data-content="订单号：000000<br/>姓名：郭栋<br/>配送地址：18号楼122宿舍<br/>手机：152362352352">详情</button>
                    </div>          
                  </td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                  <td>sit</td>
                  <td>
                    <div >
                      <button data-original-title="Popover title" type="button" class="btn btn-sm btn-danger bs-docs-popover" data-toggle="popover" data-html="true" data-placement="left" title="订单详情" data-content="订单号：000000<br/>姓名：郭栋<br/>配送地址：18号楼122宿舍<br/>手机：152362352352">详情</button>
                    </div>          
                  </td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                  <td>sit</td>
                  <td>
                    <div >
                      <button data-original-title="Popover title" type="button" class="btn btn-sm btn-danger bs-docs-popover" data-toggle="popover" data-html="true" data-placement="left" title="订单详情" data-content="订单号：000000<br/>姓名：郭栋<br/>配送地址：18号楼122宿舍<br/>手机：152362352352">详情</button>
                    </div>          
                  </td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>libero</td>
                  <td>Sed</td>
                  <td>cursus</td>
                  <td>ante</td>
                  <td>sit</td>
                  <td>
                    <div >
                      <button data-original-title="Popover title" type="button" class="btn btn-sm btn-danger bs-docs-popover" data-toggle="popover" data-html="true" data-placement="left" title="订单详情" data-content="订单号：000000<br/>姓名：郭栋<br/>配送地址：18号楼122宿舍<br/>手机：152362352352">详情</button>
                    </div>          
                  </td>
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>dapibus</td>
                  <td>diam</td>
                  <td>Sed</td>
                  <td>nisi</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>Nulla</td>
                  <td>quis</td>
                  <td>sem</td>
                  <td>at</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,007</td>
                  <td>sagittis</td>
                  <td>ipsum</td>
                  <td>Praesent</td>
                  <td>mauris</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,008</td>
                  <td>Fusce</td>
                  <td>nec</td>
                  <td>tellus</td>
                  <td>sed</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,009</td>
                  <td>augue</td>
                  <td>semper</td>
                  <td>porta</td>
                  <td>Mauris</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,010</td>
                  <td>massa</td>
                  <td>Vestibulum</td>
                  <td>lacinia</td>
                  <td>arcu</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,011</td>
                  <td>eget</td>
                  <td>nulla</td>
                  <td>Class</td>
                  <td>aptent</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,012</td>
                  <td>taciti</td>
                  <td>sociosqu</td>
                  <td>ad</td>
                  <td>litora</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,013</td>
                  <td>torquent</td>
                  <td>per</td>
                  <td>conubia</td>
                  <td>nostra</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,014</td>
                  <td>per</td>
                  <td>inceptos</td>
                  <td>himenaeos</td>
                  <td>Curabitur</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,015</td>
                  <td>sodales</td>
                  <td>ligula</td>
                  <td>in</td>
                  <td>libero</td>
                  <td>sit</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

 <?php mc_template_part('Admin2_footer'); ?>