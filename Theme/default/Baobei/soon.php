<?php mc_template_part('header'); ?>
	<div class="container">
		<div class="row mb-20 mt-20">
			<div class="col-sm-6">
				<ol class="breadcrumb" id="baobei-term-breadcrumb">
					<li>
						<a href="<?php echo U('home/index/index'); ?>">
							首页
						</a>
					</li>
					<li>
						<a href="<?php echo U('baobei/index/index'); ?>">
							宝贝
						</a>
					</li>
					<li class="active">
						即将开始
					</li>
				</ol>
			</div>
			<div class="col-sm-6 text-right">
				<a href="<?php echo U('baobei/index/soon'); ?>" class="btn btn-sm btn-info active">即将开始</a>
				<a href="<?php echo U('baobei/index/done'); ?>" class="btn btn-sm btn-info">往期活动</a>
				<?php if(mc_is_admin()) : ?>
				<a href="<?php echo U('baobei/index/pending'); ?>" class="btn btn-sm btn-info">等待审核</a>
				<?php endif; ?>
				<a href="<?php echo U('publish/index/add_baobei'); ?>" class="btn btn-sm btn-warning">分享宝贝</a>
			</div>
		</div>
		<ul id="user-nav" class="nav nav-pills nav-justified mb-20">
			<li>
				<a href="<?php echo U('baobei/index/index'); ?>">
					全部
				</a>
			</li>
			<?php $terms = M('page')->where('type="term_baobei"')->order('id desc')->select(); ?>
			<?php foreach($terms as $val) : ?>
			<li <?php if($id==$val['id']) echo 'class="active"'; ?>>
				<a href="<?php echo U('baobei/index/term?id='.$val['id']); ?>">
					<?php echo $val['title']; ?>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
		<div class="row mb-20" id="pro-list">
			<?php foreach($page as $val) : ?>
			<div class="col-sm-6 col-md-4 col-lg-3 col">
				<div class="thumbnail">
					<a class="img-div" href="<?php echo U('baobei/index/single?id='.$val['id']); ?>"><img src="<?php echo mc_fmimg($val['id']); ?>" alt="<?php echo mc_get_page_field($val['id'],'title'); ?>"></a>
					<div class="caption">
						<h4>
							<a href="<?php echo U('baobei/index/single?id='.$val['id']); ?>"><?php echo mc_get_page_field($val['id'],'title'); ?></a>
						</h4>
						<p class="price pull-left">
							<span><?php echo mc_get_meta($val['id'],'price'); ?></span> <small>元</small>
						</p>
						<a rel="nofollow" href="javascript:;" class="btn btn-default btn-xs pull-right">
							<i class="glyphicon glyphicon-plus"></i> 即将开始
						</a>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php echo mc_pagenavi($count,$page_now); ?>
	</div>
<?php mc_template_part('footer'); ?>