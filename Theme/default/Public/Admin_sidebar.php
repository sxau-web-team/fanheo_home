	<!-- BEGIN CONTAINER -->

	<div class="page-container">

		<!-- BEGIN SIDEBAR -->

		<div class="page-sidebar nav-collapse collapse">

			<!-- BEGIN SIDEBAR MENU -->        

			<ul class="page-sidebar-menu">

				<li>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

					<div class="sidebar-toggler hidden-phone"></div>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

				</li>

				<li>

					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->

					<form class="sidebar-search">

						<div class="input-box">

							<a href="javascript:;" class="remove"></a>

							<input type="text" placeholder="Search..." />

							<input type="button" class="submit" value=" " />

						</div>

					</form>

					<!-- END RESPONSIVE QUICK SEARCH FORM -->

				</li>

				<li class="" id="index">

					<a href="<?php echo U('admin/index/index'); ?>">

					<i class="icon-home"></i> 

					<span class="title">仪表盘</span>

					<span class="selected"></span>

					</a>

				</li>

				<li class="" id="good">

					<a href="javascript:;">

					<i class="icon-briefcase"></i> 

					<span class="title">商品管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li id="goodlist">

							<a href="<?php echo U('Admin/Good/index'); ?>">

							商品列表</a>

						</li>

						<li id="addgood">

							<a href="<?php echo U('Admin/Good/addGood'); ?>">

							添加商品</a>

						</li>

						<li >

							<a href="<?php echo U('admin/goods/index'); ?>">

							库存管理</a>

						</li>

						<li id="taocan">

							<a href="<?php echo U('Admin/Good/taocan'); ?>">

							套餐管理</a>

						</li>

					</ul>

				</li>
					<li class="" id="brand">

					<a href="javascript:;">

					<i class="icon-file-text"></i> 

					<span class="title">店铺管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">
					
					<li id="brandlist">

							<a href="<?php echo U('Admin/Store/index'); ?>">

							店铺列表</a>

						</li>

						<li id="addbrand">

							<a href="<?php echo U('Admin/Store/addstore'); ?>">

							添加店铺</a>

						</li>

					</ul>

				</li>

				<li class="" id="order">

					<a href="javascript:;">

					<i class="icon-file-text"></i> 

					<span class="title">订单管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="<?php echo U('admin/order/apay'); ?>">

							已付款订单</a>

						</li>

						<li >

							<a href="<?php echo U('admin/order/asend'); ?>">

							已发货订单</a>

						</li>

						<li >

							<a href="<?php echo U('admin/order/usend'); ?>">

							未发货订单</a>

						</li>

						<li >

							<a href="<?php echo U('admin/order/upay'); ?>">

							未付款订单</a>

						</li>

						<li >

							<a href="<?php echo U('admin/order/quit'); ?>">

							退货订单</a>

						</li>

						<li id="allorder">

							<a href="<?php echo U('Admin/Order/index'); ?>">

							所有订单</a>

						</li>

						<li >

							<a href="<?php echo U('admin/order/stat'); ?>">

							订单统计</a>

						</li>

					</ul>

				</li>
				
				<li class="" id="user">

					<a href="javascript:;">

					<i class="icon-user"></i> 

					<span class="title">用户管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li id='userslist'>

							<a href="<?php echo U('admin/user/index'); ?>">

							用户列表</a>

						</li>

						<li id='userlist'>

							<a href="<?php echo U('admin/rbac/index'); ?>">

							管理组用户列表</a>

						</li>
						
						<li id='addUser'>

							<a href="<?php echo U('admin/rbac/addUser'); ?>">

							添加管理组用户</a>

						</li>
						
						<li id='addRole'>

							<a href="<?php echo U('admin/rbac/addRole'); ?>">

							添加角色</a>

						</li>
						
						<li id='role'>

							<a href="<?php echo U('admin/rbac/Role'); ?>">

							角色列表</a>

						</li>

						<li id='node'>

							<a href="<?php echo U('admin/rbac/Role'); ?>">

							用户权限管理</a>

						</li>

						<li id='addnode'>

							<a href="<?php echo U('admin/rbac/addNode'); ?>">

							添加节点</a>

						</li>

					</ul>

				</li>

				<li class="" id="sqlmanage">

					<a href="javascript:;">

					<i class="icon-th"></i> 

					<span class="title">数据库管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li id="tablist">

							<a href="<?php echo U('Admin/Backupsql/tablist'); ?>">

							数据库表段列表</a>

						</li>

						<li id="sqlbackup">

							<a href="<?php echo U('Admin/Backupsql/backupsql'); ?>">

							备份数据库</a>

						</li>

					</ul>

				</li>

				<li class="" id="setting">

					<a href="javascript:;">

					<i class="icon-cogs"></i>

					<span class="title">系统设置</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li id="systemsetting">

							<a href="<?php echo U('Admin/Setting/index');?>">

							系统设置</a>

						</li>

						<li id="email">

							<a href="<?php echo U('Admin/Setting/email');?>">

							邮箱设置</a>

						</li>

						<li id="serverinfo">

							<a href="<?php echo U('Admin/Setting/server'); ?>">

							服务器信息</a>

						</li>

						<li id="operation">

							<a href="<?php echo U('admin/setting/operation'); ?>">

							管理员操作记录</a>

						</li>

						<li id="userlog">

							<a href="<?php echo U('admin/setting/userlog'); ?>">

							用户操作记录</a>

						</li>

						<li >

							<a href="<?php echo U('admin/setting/score'); ?>">

							积分记录</a>

						</li>

						<li id="links">

							<a href="<?php echo U('admin/setting/links'); ?>">

							友情链接管理</a>

						</li>

						<li id="addlink">

							<a href="<?php echo U('admin/setting/addlink'); ?>">

							添加友情链接</a>

						</li>

					</ul>

				</li>

				<li class="">

					<a href="javascript:;">

					<i class="icon-table"></i> 

					<span class="title">Form Stuff</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="form_layout.html">

							Form Layouts</a>

						</li>

						<li >

							<a href="form_samples.html">

							Advance Form Samples</a>

						</li>

						<li >

							<a href="form_component.html">

							Form Components</a>

						</li>

						<li >

							<a href="form_wizard.html">

							Form Wizard</a>

						</li>

						<li >

							<a href="form_validation.html">

							Form Validation</a>

						</li>

						<li >

							<a href="form_fileupload.html">

							Multiple File Upload</a>

						</li>

						<li >

							<a href="form_dropzone.html">

							Dropzone File Upload</a>

						</li>

					</ul>

				</li>

				<li class="">

					<a href="javascript:;">

					<i class="icon-briefcase"></i> 

					<span class="title">Pages</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="page_timeline.html">

							<i class="icon-time"></i>

							Timeline</a>

						</li>

						<li >

							<a href="page_coming_soon.html">

							<i class="icon-cogs"></i>

							Coming Soon</a>

						</li>

						<li >

							<a href="page_blog.html">

							<i class="icon-comments"></i>

							Blog</a>

						</li>

						<li >

							<a href="page_blog_item.html">

							<i class="icon-font"></i>

							Blog Post</a>

						</li>

						<li >

							<a href="page_news.html">

							<i class="icon-coffee"></i>

							News</a>

						</li>

						<li >

							<a href="page_news_item.html">

							<i class="icon-bell"></i>

							News View</a>

						</li>

						<li >

							<a href="page_about.html">

							<i class="icon-group"></i>

							About Us</a>

						</li>

						<li >

							<a href="page_contact.html">

							<i class="icon-envelope-alt"></i>

							Contact Us</a>

						</li>

						<li >

							<a href="page_calendar.html">

							<i class="icon-calendar"></i>

							Calendar</a>

						</li>

					</ul>

				</li>

				<li class="">

					<a href="javascript:;">

					<i class="icon-gift"></i> 

					<span class="title">Extra</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="extra_profile.html">

							User Profile</a>

						</li>

						<li >

							<a href="extra_lock.html">

							Lock Screen</a>

						</li>

						<li >

							<a href="extra_faq.html">

							FAQ</a>

						</li>

						<li >

							<a href="inbox.html">

							Inbox</a>

						</li>

						<li >

							<a href="extra_search.html">

							Search Results</a>

						</li>

						<li >

							<a href="extra_invoice.html">

							Invoice</a>

						</li>

						<li >

							<a href="extra_pricing_table.html">

							Pricing Tables</a>

						</li>

						<li >

							<a href="extra_image_manager.html">

							Image Manager</a>

						</li>

						<li >

							<a href="extra_404_option1.html">

							404 Page Option 1</a>

						</li>

						<li >

							<a href="extra_404_option2.html">

							404 Page Option 2</a>

						</li>

						<li >

							<a href="extra_404_option3.html">

							404 Page Option 3</a>

						</li>

						<li >

							<a href="extra_500_option1.html">

							500 Page Option 1</a>

						</li>

						<li >

							<a href="extra_500_option2.html">

							500 Page Option 2</a>

						</li>

					</ul>

				</li>

				<li>

					<a class="active" href="javascript:;">

					<i class="icon-sitemap"></i> 

					<span class="title">3 Level Menu</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li>

							<a href="javascript:;">

							Item 1

							<span class="arrow"></span>

							</a>

							<ul class="sub-menu">

								<li><a href="#">Sample Link 1</a></li>

								<li><a href="#">Sample Link 2</a></li>

								<li><a href="#">Sample Link 3</a></li>

							</ul>

						</li>

						<li>

							<a href="javascript:;">

							Item 1

							<span class="arrow"></span>

							</a>

							<ul class="sub-menu">

								<li><a href="#">Sample Link 1</a></li>

								<li><a href="#">Sample Link 1</a></li>

								<li><a href="#">Sample Link 1</a></li>

							</ul>

						</li>

						<li>

							<a href="#">

							Item 3

							</a>

						</li>

					</ul>

				</li>

				<li>

					<a href="javascript:;">

					<i class="icon-folder-open"></i> 

					<span class="title">4 Level Menu</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li>

							<a href="javascript:;">

							<i class="icon-cogs"></i> 

							Item 1

							<span class="arrow"></span>

							</a>

							<ul class="sub-menu">

								<li>

									<a href="javascript:;">

									<i class="icon-user"></i>

									Sample Link 1

									<span class="arrow"></span>

									</a>

									<ul class="sub-menu">

										<li><a href="#"><i class="icon-remove"></i> Sample Link 1</a></li>

										<li><a href="#"><i class="icon-pencil"></i> Sample Link 1</a></li>

										<li><a href="#"><i class="icon-edit"></i> Sample Link 1</a></li>

									</ul>

								</li>

								<li><a href="#"><i class="icon-user"></i>  Sample Link 1</a></li>

								<li><a href="#"><i class="icon-external-link"></i>  Sample Link 2</a></li>

								<li><a href="#"><i class="icon-bell"></i>  Sample Link 3</a></li>

							</ul>

						</li>

						<li>

							<a href="javascript:;">

							<i class="icon-globe"></i> 

							Item 2

							<span class="arrow"></span>

							</a>

							<ul class="sub-menu">

								<li><a href="#"><i class="icon-user"></i>  Sample Link 1</a></li>

								<li><a href="#"><i class="icon-external-link"></i>  Sample Link 1</a></li>

								<li><a href="#"><i class="icon-bell"></i>  Sample Link 1</a></li>

							</ul>

						</li>

						<li>

							<a href="#">

							<i class="icon-folder-open"></i>

							Item 3

							</a>

						</li>

					</ul>

				</li>

				<li class="">

					<a href="javascript:;">

					<i class="icon-map-marker"></i> 

					<span class="title">Maps</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="maps_google.html">

							Google Maps</a>

						</li>

						<li >

							<a href="maps_vector.html">

							Vector Maps</a>

						</li>

					</ul>

				</li>

				<li class="last ">

					<a href="charts.html">

					<i class="icon-bar-chart"></i> 

					<span class="title">Visual Charts</span>

					</a>

				</li>

			</ul>

			<!-- END SIDEBAR MENU -->

		</div>

		<!-- END SIDEBAR -->