<?php mc_template_part('header'); ?>
<!-- <div id="home-download" class="text-center pr" style="background-image: url(<?php echo mc_theme_url(); ?>/img/549085.jpg); background-position: center top; background-repeat: no-repeat; background-attachment: fixed; width: 100%; margin:-20px 0 20px; padding:150px 0;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
		<div style="position: relative; z-index:30;">
		
		<h1 style="color:#fff;margin-bottom:20px;">Fanheo 饭盒哦</h1>
		<p style="color:#fff;margin:0 auto 30px; font-size:18px; max-width:720px;">想吃神马？饭盒都有</p>
		</div>
		<div class="single-head-img shi2" style="z-index:10;"></div>

	</div> -->

	<div class="container">

		<div class="row mb-20 hidden-xs" id="home-top">
			<div class="col-md-12 col">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active">
						</li>
						<?php if(mc_option('homehdimg2')) : ?>
						<li data-target="#carousel-example-generic" data-slide-to="1">
						</li>
						<?php endif; ?>
						<?php if(mc_option('homehdimg3')) : ?>
						<li data-target="#carousel-example-generic" data-slide-to="2">
						</li>
						<?php endif; ?>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<a class="img-div" href="<?php echo mc_option('homehdlnk1'); ?>"><img src="<?php echo mc_option('homehdimg1'); ?>"></a>
						</div>
						<div class="item">
							<a class="img-div" href="<?php echo mc_option('homehdlnk2'); ?>"><img src="<?php echo mc_option('homehdimg2'); ?>"></a>
						</div>
						<?php if(mc_option('homehdimg3')) : ?>
						<div class="item">
							<a class="img-div" href="<?php echo mc_option('homehdlnk3'); ?>"><img src="<?php echo mc_option('homehdimg3'); ?>"></a>
						</div>
						<?php endif; ?>
					</div>
					<?php if(mc_option('homehdimg2')) : ?>
					<!-- Controls -->
					
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php if(mc_option('pro_close')!=1) : ?>
		
		<?php $newpro = M('page')->where('type="pro"')->order('id desc')->page(1,8)->select(); if($newpro) : ?>
		<div id="home-main-1" class="home-main">
			<div class="row">
				<div class="col-md-8 col-lg-9">
				<?php if(mc_user_id()) :?>
					<?php 
						if($id=mc_user_id())
						$args_id = M('action')->where("user_id='$id' AND action_key='perform' AND action_value='shoucang'")->getField('page_id',true);
			        	$condition['id']  = array('in',$args_id);
			        	$condition['type']  = array('in','pro');
			        	$shoucang = M('page')->where($condition)->page(1,4)->order('id desc')->select();
			        	?>
			        	<?php if($shoucang) :?>
					<h4  class="title">
						<i class="icon-inbox"></i> 我的收藏
						<a target="_blank" class="pull-right" href="<?php echo U('user/index/shoucang?id='.mc_user_id().''); ?>"><i class="icon-angle-right"></i></a>
					</h4>
					<div class="row mb-20" id="pro-list">
					<?php foreach($shoucang as $val) : ?>
					<?php $num_newproa++; ?>
						<div class="col-sm-6 col-md-4 col-lg-3 col <?php if($num_newproa==3 || $num_newproa==4) echo 'hidden-md'; ?>">
							<div class="thumbnail">
								<?php $fmimg_args = mc_get_meta($val['id'],'fmimg',false); ?>
								<a class="img-div" href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><img src="<?php echo $fmimg_args[0]; ?>" alt="<?php echo mc_get_page_field($val['id'],'title'); ?>"></a>
								<div class="caption">
									<h4>
										<a target="_blank" href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><?php echo mc_get_page_field($val['id'],'title'); ?></a>
									</h4>
									<p class="price pull-left">
										<span><?php echo mc_get_meta($val['id'],'price'); ?></span> <small>元</small>
									</p>
									<a href="<?php echo U('home/perform/add_cart','id='.$val['id'].'&number=1'); ?>" class="btn btn-warning btn-xs pull-right">
										<i class="glyphicon glyphicon-plus"></i> 加入饭盒
									</a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					</div>
				<?php else :?>

				<h4 class="title">
						<i class="icon-th-large"></i> 我的收藏
						<a target="_blank" class="pull-right" href="<?php echo U('user/index/shoucang?id='.mc_user_id().''); ?>"><i class="icon-angle-right"></i></a>
					</h4>
					<div class="row " id="">
						<div class="panel-body text-center">您还没有收藏任何东东哦！快去<a href="<?php echo U('pro/index/index'); ?>">看看吧</a></div>
						<br/>
					</div>

					<?php endif; ?>
					<?php endif; ?>
					
					<!-- 怡膳园A最近更新 -->
					<div id="step4">
					<h4  class="title">
						<i class="icon-th-large"></i> 怡膳园A
						<a target="_blank" class="pull-right" href="<?php echo U('store/index/index'); ?>"><i class="icon-angle-right"></i></a>
					</h4>
					<div class="row mb-20" id="pro-list">
					<?php 
					
					$lid='35';
    				$condition['type'] = 'pro';
		        	$args_id = M('meta')->where("meta_key='local' AND meta_value='$lid' AND type='basic'")->getField('page_id',true);
		        	$condition['id']  = array('in',$args_id);
			    	$pagey = M('page')->where($condition)->order('date desc')->page(0,4)->select();
			    	
					?>
					<?php foreach($pagey as $val) : ?>
					<?php $num_newproa++; ?>
						<div class="col-sm-6 col-md-4 col-lg-3 col <?php if($num_newproa==4) echo 'hidden-md'; ?>">
							<div class="thumbnail">
								<?php $fmimg_args = mc_get_meta($val['id'],'fmimg',false); ?>
								<a target="_blank" class="img-div" href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><img src="<?php echo $fmimg_args[0]; ?>" alt="<?php echo mc_get_page_field($val['id'],'title'); ?>"></a>
								<div class="caption">
									<h4>
										<a href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><?php echo mc_get_page_field($val['id'],'title'); ?></a>
									</h4>
									<p class="price pull-left">
										<span><?php echo mc_get_meta($val['id'],'price'); ?></span> <small>元</small>
									</p>
									<a href="<?php echo U('home/perform/add_cart','id='.$val['id'].'&number=1'); ?>" class="btn btn-warning btn-xs pull-right">
										<i class="glyphicon glyphicon-plus"></i> 加入饭盒
									</a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					</div>
					</div>
					<!-- 怡膳园B最近更新 -->
					<h4 class="title">
						<i class="icon-th-large"></i> 怡膳园B
						<a target="_blank" class="pull-right" href="<?php echo U('store/index/index'); ?>"><i class="icon-angle-right"></i></a>
					</h4>
					<div class="row mb-20" id="pro-list">
					<?php 
					
					$lid='34';
    				$condition['type'] = 'pro';
		        	$args_id = M('meta')->where("meta_key='local' AND meta_value='$lid' AND type='basic'")->getField('page_id',true);
		        	$condition['id']  = array('in',$args_id);
			    	$pageb = M('page')->where($condition)->order('date desc')->page(0,4)->select();
			    	
					?>
					<?php foreach($pageb as $val) : ?>
					<?php $num_newproa++; ?>
						<div class="col-sm-6 col-md-4 col-lg-3 col <?php if($num_newproa==4) echo 'hidden-md'; ?>">
							<div class="thumbnail">
								<?php $fmimg_args = mc_get_meta($val['id'],'fmimg',false); ?>
								<a target="_blank" class="img-div" href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><img src="<?php echo $fmimg_args[0]; ?>" alt="<?php echo mc_get_page_field($val['id'],'title'); ?>"></a>
								<div class="caption">
									<h4>
										<a href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><?php echo mc_get_page_field($val['id'],'title'); ?></a>
									</h4>
									<p class="price pull-left">
										<span><?php echo mc_get_meta($val['id'],'price'); ?></span> <small>元</small>
									</p>
									<a href="<?php echo U('home/perform/add_cart','id='.$val['id'].'&number=1'); ?>" class="btn btn-warning btn-xs pull-right">
										<i class="glyphicon glyphicon-plus"></i> 加入饭盒
									</a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					</div>
					<!-- 谷园B最近更新 -->
					<h4  class="title">
						<i class="icon-th-large"></i> 谷园B
						<a target="_blank" class="pull-right" href="<?php echo U('store/index/index'); ?>"><i class="icon-angle-right"></i></a>
					</h4>
					<div class="row mb-20" id="pro-list">
					<?php 
					
					$lid='54';
    				$condition['type'] = 'pro';
		        	$args_id = M('meta')->where("meta_key='local' AND meta_value='$lid' AND type='basic'")->getField('page_id',true);
		        	$condition['id']  = array('in',$args_id);
			    	$pageg = M('page')->where($condition)->order('date desc')->page(0,4)->select();
			    	
					?>
					<?php foreach($pageg as $val) : ?>
					<?php $num_newproa++; ?>
						<div class="col-sm-6 col-md-4 col-lg-3 col <?php if($num_newproa==4) echo 'hidden-md'; ?>">
							<div class="thumbnail">
								<?php $fmimg_args = mc_get_meta($val['id'],'fmimg',false); ?>
								<a target="_blank" class="img-div" href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><img src="<?php echo $fmimg_args[0]; ?>" alt="<?php echo mc_get_page_field($val['id'],'title'); ?>"></a>
								<div class="caption">
									<h4>
										<a href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><?php echo mc_get_page_field($val['id'],'title'); ?></a>
									</h4>
									<p class="price pull-left">
										<span><?php echo mc_get_meta($val['id'],'price'); ?></span> <small>元</small>
									</p>
									<a href="<?php echo U('home/perform/add_cart','id='.$val['id'].'&number=1'); ?>" class="btn btn-warning btn-xs pull-right">
										<i class="glyphicon glyphicon-plus"></i> 加入饭盒
									</a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					</div>
					<!-- 谷园A最近更新 -->
					<h4  class="title">
						<i class="icon-th-large"></i> 谷园A
						<a target="_blank" class="pull-right" href="<?php echo U('store/index/index'); ?>"><i class="icon-angle-right"></i></a>
					</h4>
					<div class="row mb-20" id="pro-list">
					<?php 
					
					$lid='36';
    				$condition['type'] = 'pro';
		        	$args_id = M('meta')->where("meta_key='local' AND meta_value='$lid' AND type='basic'")->getField('page_id',true);
		        	$condition['id']  = array('in',$args_id);
			    	$pagea = M('page')->where($condition)->order('date desc')->page(0,4)->select();
			    	
					?>
					<?php foreach($pagea as $val) : ?>
					<?php $num_newproa++; ?>
						<div class="col-sm-6 col-md-4 col-lg-3 col <?php if($num_newproa==4) echo 'hidden-md'; ?>">
							<div class="thumbnail">
								<?php $fmimg_args = mc_get_meta($val['id'],'fmimg',false); ?>
								<a target="_blank" class="img-div" href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><img src="<?php echo $fmimg_args[0]; ?>" alt="<?php echo mc_get_page_field($val['id'],'title'); ?>"></a>
								<div class="caption">
									<h4>
										<a href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><?php echo mc_get_page_field($val['id'],'title'); ?></a>
									</h4>
									<p class="price pull-left">
										<span><?php echo mc_get_meta($val['id'],'price'); ?></span> <small>元</small>
									</p>
									<a href="<?php echo U('home/perform/add_cart','id='.$val['id'].'&number=1'); ?>" class="btn btn-warning btn-xs pull-right">
										<i class="glyphicon glyphicon-plus"></i> 加入饭盒
									</a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					</div>
					<!-- 小木屋最近更新 -->
					<h4  class="title">
						<i class="icon-th-large"></i> 小木屋
						<a target="_blank" class="pull-right" href="<?php echo U('store/index/index'); ?>"><i class="icon-angle-right"></i></a>
					</h4>
					<div class="row mb-20" id="pro-list">
					<?php 
					
					$lid='33';
    				$condition['type'] = 'pro';
		        	$args_id = M('meta')->where("meta_key='local' AND meta_value='$lid' AND type='basic'")->getField('page_id',true);
		        	$condition['id']  = array('in',$args_id);
			    	$pagex = M('page')->where($condition)->order('date desc')->page(0,4)->select();
			    	
					?>
					<?php foreach($pagex as $val) : ?>
					<?php $num_newproa++; ?>
						<div class="col-sm-6 col-md-4 col-lg-3 col <?php if($num_newproa==4) echo 'hidden-md'; ?>">
							<div class="thumbnail">
								<?php $fmimg_args = mc_get_meta($val['id'],'fmimg',false); ?>
								<a target="_blank" class="img-div" href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><img src="<?php echo $fmimg_args[0]; ?>" alt="<?php echo mc_get_page_field($val['id'],'title'); ?>"></a>
								<div class="caption">
									<h4>
										<a href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><?php echo mc_get_page_field($val['id'],'title'); ?></a>
									</h4>
									<p class="price pull-left">
										<span><?php echo mc_get_meta($val['id'],'price'); ?></span> <small>元</small>
									</p>
									<a href="<?php echo U('home/perform/add_cart','id='.$val['id'].'&number=1'); ?>" class="btn btn-warning btn-xs pull-right">
										<i class="glyphicon glyphicon-plus"></i> 加入饭盒
									</a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					</div>
					
				</div>
				<div class="col-md-4 col-lg-3 hidden-xs hidden-sm home-side">
					<div id="step5" class="panel panel-default">
						<div class="panel-heading">
							<i class="icon-th-list"></i> 热门商品
						</div>
						<ul class="list-group">
							<?php 
							$Model = new \Think\Model();
							$newprob = $Model->query("select page_id from __PREFIX__meta where meta_key='views' and page_id in (select id from __PREFIX__page where type='pro') order by meta_value desc limit 0,4");
							?>
							<?php foreach($newprob as $val) : ?>
							<li class="list-group-item">
								<div class="media">
									<a target="_blank" class="pull-left img-div" href="<?php echo U('pro/index/single?id='.$val['page_id']); ?>">
										<?php $fmimg_args = mc_get_meta($val['page_id'],'fmimg',false); ?>
										<img class="media-object" src="<?php echo $fmimg_args[0]; ?>" alt="<?php echo mc_get_page_field($val['page_id'],'title'); ?>">
									</a>
									<div class="media-body">
										<h4 class="media-heading">
											<a target="_blank" href="<?php echo U('pro/index/single?id='.$val['page_id']); ?>"><?php echo mc_get_page_field($val['page_id'],'title'); ?></a>
										</h4>
										<p><span><?php echo mc_get_meta($val['page_id'],'price'); ?></span> <small>元</small></p>
										<a href="<?php echo U('home/perform/add_cart','id='.$val['page_id'].'&number=1'); ?>" class="btn btn-warning btn-xs">
											<i class="glyphicon glyphicon-plus"></i> 加入饭盒
										</a>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="icon-th-list"></i> 最新文章
							<a class="pull-right" href="<?php echo U('article/index/index'); ?>"><i class="icon-angle-right"></i></a>
						</div>
						<?php $newarticle = M('page')->where("type='article'")->order('id desc')->page(1,4)->select(); if($newarticle) : ?>
						<div class="list-group">
							<?php foreach($newarticle as $val) : ?>
							<a href="<?php echo U('article/index/single?id='.$val['id']); ?>" class="list-group-item">
								<?php echo $val['title']; ?>
							</a>
							<?php endforeach; ?>
						</div>
						<?php else : ?>
						<div class="panel-body">
							暂时没有任何文章，现在就去
							<br>
							<a href="<?php echo U('article/index/index'); ?>">写下网站的第一篇文章!</a>
						</div>

						<?php endif; ?>
					</div>

					<div class="panel panel-default">
						<h4 class="title">
							<i class="icon-bullhorn"></i> fanheo公告
						</h4>
						<div class="panel panel-default">
						<div class="panel-body">
						<?php echo mc_option('gonggao'); ?>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php else : ?>
		<div id="nothing">
			暂时没有任何商品，去<a href="<?php echo U('pro/index/index'); ?>">添加更多商品</a>吧！
		</div>
		<?php endif; endif; ?>
		<?php if(mc_option('baobei_close')!=1) : ?>
		<?php 
			$condition['type'] = 'baobei';
	    	$date = strtotime("now");
        	$args_id1 = M('meta')->where("meta_key='stime' AND meta_value<'$date' AND type='basic'")->getField('page_id',true);
        	$args_id2 = M('meta')->where("meta_key='etime' AND (meta_value>'$date' OR meta_value='') AND type='basic'")->getField('page_id',true);
        	$args_id = array_intersect($args_id1,$args_id2);
        	$condition['id']  = array('in',$args_id);
			$newbaobei = M('page')->where($condition)->order('id desc')->page(1,8)->select();
			if($newbaobei) :
		?>
		<div id="home-main-2" class="home-main">
			<div class="row">
				<div class="col-md-8 col-lg-9">
					<h4 class="title">
						<i class="icon-share-alt"></i> 最新分享
						<a class="pull-right" href="<?php echo U('baobei/index/index'); ?>"><i class="icon-angle-right"></i></a>
					</h4>
					<div class="row mb-20" id="pro-list">
					<?php foreach($newbaobei as $val) : ?>
					<?php $num_newbaobeia++; ?>
						<div class="col-sm-6 col-md-4 col-lg-3 col <?php if($num_newbaobeia==7 || $num_newbaobeia==8) echo 'hidden-md'; ?>">
							<div class="thumbnail">
								<a class="img-div" href="<?php echo U('baobei/index/single?id='.$val['id']); ?>"><img src="<?php echo mc_fmimg($val['id']); ?>" alt="<?php echo mc_get_page_field($val['id'],'title'); ?>"></a>
								<div class="caption">
									<h4>
										<a href="<?php echo U('baobei/index/single?id='.$val['id']); ?>"><?php echo mc_get_page_field($val['id'],'title'); ?></a>
									</h4>
									<a target="_blank" rel="nofollow" href="<?php echo mc_get_meta($val['id'],'link'); ?>" class="btn btn-warning btn-xs">
										<i class="glyphicon glyphicon-plus"></i> 立即购买
									</a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					</div>
				</div>
				<div class="col-md-4 col-lg-3 hidden-xs hidden-sm home-side">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="icon-group"></i> 活跃用户
						</div>
						<ul class="list-group">
							<?php 
								$condition_b['type'] = 'baobei';
						    	$date = strtotime("now");
					        	$args_id_b_1 = M('meta')->where("meta_key='stime' AND meta_value<'$date' AND type='basic'")->getField('page_id',true);
					        	$args_id_b_2 = M('meta')->where("meta_key='etime' AND (meta_value>'$date' OR meta_value='') AND type='basic'")->getField('page_id',true);
					        	$args_id_b = array_intersect($args_id_b_1,$args_id_b_2);
					        	$condition_b['id']  = array('in',$args_id_b);
								$args_id_b_3 = M('page')->where($condition_b)->getField('id',true);
								$condition_c['page_id']  = array('in',$args_id_b_3);
								$condition_c['meta_key'] = 'author';
								$new_baobei_author = M('meta')->where($condition_c)->group('meta_value')->getField('meta_value',true);
								if($new_baobei_author) :
							?>
							<?php foreach($new_baobei_author as $author) : ?>
							<li class="list-group-item">
								<div class="media">
									<a class="pull-left img-div" href="<?php echo U('user/index/index?id='.$author); ?>">
										<img class="media-object" src="<?php echo mc_user_avatar($author); ?>" alt="<?php echo mc_user_display_name($author); ?>">
									</a>
									<div class="media-body">
										<h4 class="media-heading">
											<a href="<?php echo U('user/index/index?id='.$author); ?>"><?php echo mc_user_display_name($author); ?></a>
										</h4>
										<p><?php echo mc_get_page_field($author,'content'); ?></p>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
							<?php else : ?>
							<div class="panel-body">
								暂时没有任何分享！
							</div>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php else : ?>
		<div id="nothing">
			暂时没有任何分享，去<a href="<?php echo U('baobei/index/index'); ?>">分享更多宝贝</a>吧！
		</div>
		<?php endif; endif; ?>
		<?php if(mc_option('group_close')!=1) : ?>
		<div class="home-main" id="home-main-3">
			<div class="row">
				<div class="col-sm-6 col-md-4 col col-1">
					<h4 class="title">
						<i class="icon-comments-alt"></i> 最新话题
					</h4>
					<?php if($page) : ?>
					<div class="row">
						<div class="col-sm-12" id="post-list-default">
							<ul class="list-group">
							<?php foreach($page as $val) : $postnum++; ?>
							<li class="list-group-item <?php if($postnum==7) echo 'hidden-md'; ?>" id="mc-page-<?php echo $val['id']; ?>">
								<div class="row">
									<div class="col-sm-12">
										<div class="media">
											<?php $author = mc_get_meta($val['id'],'author',true); ?>
											<a class="pull-left img-div" href="<?php echo U('user/index/index?id='.$author); ?>">
												<img width="40" class="media-object" src="<?php echo mc_user_avatar($author); ?>" alt="<?php echo mc_user_display_name($author); ?>">
											</a>
											<div class="media-body">
												<h4 class="media-heading">
													<a href="<?php echo U('post/index/index?id='.$val['id']); ?>"><?php echo $val['title']; ?></a>
												</h4>
												<p class="post-info hidden-xs">
													<i class="glyphicon glyphicon-user"></i><a href="<?php echo U('user/index/index?id='.$author); ?>"><?php echo mc_user_display_name($author); ?></a>
													<i class="glyphicon glyphicon-home"></i><a href="<?php echo U('post/group/single?id='.mc_get_meta($val['id'],'group')); ?>"><?php echo mc_get_page_field(mc_get_meta($val['id'],'group'),'title'); ?></a>
													<span class="hidden-md"><i class="glyphicon glyphicon-time"></i><?php echo date('m月d日',mc_get_meta($val['id'],'time')); ?></span>
												</p>
											</div>
										</div>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<?php else : ?>
					<div id="nothing">
						暂无任何话题，没关系，加油！
					</div>
					<?php endif; ?>
				</div>
				<div class="col-sm-6 col-md-5 col col-2">
					<h4 class="title">
						<i class="icon-home"></i> 最新群组
						<a class="pull-right" href="<?php echo U('post/group/index'); ?>"><i class="icon-angle-right"></i></a>
					</h4>
					<?php $group = M('page')->where('type="group"')->order('date desc')->page(1,4)->select(); if($group) : ?>
					<div class="row mb-20" id="group-list">
						<?php foreach($group as $val) : ?>
						<div class="col-sm-6 col">
							<div class="panel panel-default">
								<a href="<?php echo U('post/group/single?id='.$val['id']); ?>" class="img-div hidden-xs">
									<img src="<?php echo mc_fmimg($val['id']); ?>">
								</a>
								<a href="<?php echo U('post/group/single?id='.$val['id']); ?>" class="panel-heading">
									<?php echo $val['title']; ?>
								</a>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<?php else : ?>
					<div id="nothing">
						暂时没有任何群组，去<a href="<?php echo U('publish/index/add_group'); ?>">建立第一个群组</a>吧！
					</div>
					<?php endif; ?>
				</div>
				
			</div>
		</div>
		
		<?php endif; ?>
	</div>
<hr/>
	<div id="home-download" class="text-center pr" style="background-image: url(<?php echo mc_theme_url(); ?>/img/549085.jpg); background-position: center top; background-repeat: no-repeat; background-attachment: fixed; width: 100%; margin:-20px 0 0px; padding:150px 0;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
		<div style="position: relative; z-index:0;">
		<h1 style="color:#fff;margin-bottom:20px;">fanheo.com</h1>
		<p style="color:#fff;margin:0 auto 30px; font-size:18px; max-width:720px;">
			</div>
			<div style="position: relative; z-index:10;">
			<ul class="list-inline">
					<li><a href="#">我要入驻</a></li>
					|<li><a href="#">支付方式</a></li>
					|<li><a href="#">常见问题</a></li>
					|<li><a href="#">服务条款</a></li>
					
					|<li><a href="#">关于我们</a></li>
					|<li><a href="#">加入我们</a></li>
					|<li><a href="#">联系我们</a></li>
					|<li><a href="#">官方微博</a></li>
					|<li><a href="#">官方微信</a></li>
			</ul>
			<p class="text-center">© 2009-2014 fanheo.com 版权所有 ICP证：xxxxxxxxx1 </p>
		</p>
		
		</div>
		<div class="single-head-img shi2" style="z-index:9;"></div>
	</div>



<a id="backtotop" class="goto" href="#site-top"><i class="glyphicon glyphicon-upload"></i></a>
<?php mc_template('Public/control'); ?>
<?php mc_template('Public/kefu'); ?>

<?php mc_template('Public/jianyi'); ?>

</body>
<script language="JavaScript" type="text/javascript">



</script> 

 <script type="text/javascript" src="<?php echo mc_theme_url(); ?>/js/intro.js"></script>
    <script type="text/javascript">
      function startIntro(){
        var intro = introJs();
          intro.setOptions({
            steps: [
              {
                element: '#step1',
                intro: "<h4>在<b>饭盒</b>网，你总可以找到你最喜欢吃的外卖.</h4>"
              },
              {
                element: '#step2',
                intro: "<h4>群组？！, <i>没错！</i> 这儿不仅有美食，还能和小伙伴们讨论有趣的话题哦！</h4>",
                position: 'right'
              },
              {
                element: '#step3',
                intro: '<h4>发现, 在这里，我们与您分享不一样的精彩！</h4>',
                position: 'left'
              },
              {
                element: '#step4',
                intro: "<h4><span style='font-family: Tahoma'>这里有每个店铺的外卖更新信息，可以直接点击进入哦！</span></h4>",
                position: 'up'
              },
              {
                element: '#step5',
                intro: '<h4>热门菜系，总有一样适合你的肚子！</h4>'

              }
            ]
          });

          intro.start();
      }
    function getCookie(name){
		var strCookie=document.cookie;
		var arrCookie=strCookie.split("; ");
		for(var i=0;i<arrCookie.length;i++){
			var arr=arrCookie[i].split("=");
			if(arr[0]==name)
				return true;
		}
		return false;
	}
	function isfirst(){
		
		if (getCookie('fanheofirst')==0) {
			startIntro();
			document.cookie="fanheofirst=1"; 
		}else{
			document.cookie="fanheofirst=1"; 
		}
	}
	//isfirst();
	
</script>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo mc_theme_url(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo mc_theme_url(); ?>/js/placeholder.js"></script>
<script type="text/javascript">
	$(function() {
		$('input, textarea').placeholder();
	});
</script>
<script src="<?php echo mc_theme_url(); ?>/js/cat.js"></script>
<?php echo mc_xihuan_js(); ?>
<?php echo mc_shoucang_js(); ?>
<?php echo mc_guanzhu_js(); ?>
</html>