<?php mc_template_part('header'); ?>
	<link rel="stylesheet" href="<?php echo mc_site_url(); ?>/Kindeditor/themes/default/default.css" />
	<form role="form" method="post" action="<?php echo U('Home/perform/edit'); ?>">
	<div id="single-top">
		<div class="container">
			<h1 id="publish-title"><i class="glyphicon glyphicon-open"></i> 编辑商品</h1>
			<hr>
			<div class="row">
				<div class="col-sm-6" id="pro-index-tl">
					<div id="pro-index-tlin">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators" id="publish-carousel-indicators"><?php $fmimg = mc_get_meta($_GET['id'],'fmimg',false); foreach($fmimg as $val) : $num0++; ?><li data-target="#carousel-example-generic" data-slide-to="<?php echo $num0-1; ?>" class="<?php if($num0==1) echo 'active'; ?>"></li><?php endforeach; ?><li data-target="#carousel-example-generic" data-slide-to="<?php echo $num0; ?>"></li></ol>
						<div class="carousel-inner" id="pub-imgadd">
							<?php $fmimg = mc_get_meta($_GET['id'],'fmimg',false); ?>
							<?php if($fmimg) : ?>
							<?php foreach($fmimg as $val) : ?>
							<?php $num++; ?>
							<div class="item <?php if($num==1) echo 'active'; ?>">
								<div class="imgshow"><img src="<?php echo $val; ?>"><input type="hidden" name="fmimg[]" value="<?php echo $val; ?>"></div>
								<i class="glyphicon glyphicon-remove-circle"></i>
							</div>
							<?php endforeach; ?>
							<div class="item">
								<div class="imgshow"><img src="<?php echo mc_theme_url(); ?>/img/upload.jpg"></div>
							</div>
							<?php else : ?>
							<div class="item active">
								<div class="imgshow"><img src="<?php echo mc_theme_url(); ?>/img/upload.jpg"></div>
							</div>
							<?php endif; ?>
						</div>
					</div>
					</div>
				</div>
				<div class="col-sm-6" id="pro-index-tr">
					<div id="pro-index-trin">
					<h1>
						<textarea name="title" class="form-control" placeholder="请填写商品标题"><?php echo mc_get_page_field($_GET['id'],'title'); ?></textarea>
					</h1>
					<h3><input name="price" type="text" class="form-control" placeholder="0.00" value="<?php echo mc_get_meta($_GET['id'],'price'); ?>"> 元</h3>
					<?php $parameter = M('option')->where("meta_key='parameter' AND type='pro'")->select(); if($parameter) : foreach($parameter as $par) : ?>
					<div class="form-group pro-parameter" id="pro-parameter-<?php echo $par['id']; ?>">
						<label><?php echo $par['meta_value']; ?></label>
						<?php $pro_parameter = mc_get_meta($_GET['id'],$par['id'],false,'parameter'); if($pro_parameter) : ?>
						<?php foreach($pro_parameter as $pro_par) : $num++; ?>
						<div class="input-group"><input name="pro-parameter[<?php echo $par['id']; ?>][]" type="text" class="form-control" value="<?php echo $pro_par; ?>"><span class="input-group-addon"><i class="icon-remove"></i></span></div>
						<?php endforeach; else : ?>
						<input name="pro-parameter[<?php echo $par['id']; ?>][]" type="text" class="form-control">
						<?php endif; ?>
					</div>
					<a id="pro-parameter-btn-<?php echo $par['id']; ?>" href="#" class="btn btn-block btn-default mb-10">+</a>
					<script>
						$('#pro-parameter-btn-<?php echo $par['id']; ?>').click(function(){
							$('<div class="input-group"><input name="pro-parameter[<?php echo $par['id']; ?>][]" type="text" class="form-control"><span class="input-group-addon"><i class="icon-remove"></i></span></div>').appendTo('#pro-parameter-<?php echo $par['id']; ?>');
							$('#pro-parameter-<?php echo $par['id']; ?> .input-group .input-group-addon').click(function(){
								$(this).parent().remove();
							});
							return false;
						});
						$('#pro-parameter-<?php echo $par['id']; ?> .input-group .input-group-addon').click(function(){
							$(this).parent().remove();
						});
					</script>
					<?php endforeach; endif; ?>
					<div class="form-group">
						<label>
							选择分类
						</label>
						<select class="form-control" name="term">
							<?php $terms = M('page')->where('type="term_pro"')->order('id desc')->select(); ?>
							<?php foreach($terms as $val) : ?>
							<option value="<?php echo $val['id']; ?>" <?php if(mc_get_meta($_GET['id'],'term')==$val['id']) echo 'selected'; ?>>
								<?php echo $val['title']; ?>
							</option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>
							选择店铺
						</label>
						<select class="form-control" name="local">
							<?php $terms = M('page')->where('type="term_local"')->order('id desc')->select(); ?>
							<?php foreach($terms as $val) : ?>
							<option value="<?php echo $val['id']; ?>">
								<?php echo $val['title']; ?>
							</option>
							<?php endforeach; ?>
						</select>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container" id="pro-single">
		<div class="row">
			<div class="col-sm-12" id="single">
				<div id="entry">
					<textarea name="content" class="form-control" rows="3"><?php echo mc_get_page_field($_GET['id'],'content'); ?></textarea>
				</div>
				<button type="submit" class="btn btn-warning btn-block">
					<i class="glyphicon glyphicon-ok"></i> 提交
				</button>
			</div>
		</div>
	</div>
	<input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
	</form>
	<script charset="utf-8" src="<?php echo mc_site_url(); ?>/Kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="<?php echo mc_site_url(); ?>/Kindeditor/lang/zh_CN.js"></script>
	<script>
		function mc_fmimg_delete() {
			$('.item i').click(function(){
				var index = $(this).parent(".item").index()*1+1;
				$('#pub-imgadd .item:eq('+index +')').addClass('active');
				$(this).parent(".item").remove();
				$('.carousel-indicators li').last().remove();
			});
		};
		var editor;
		KindEditor.ready(function(K) {
			editor = K.create('textarea[name="content"]', {
				resizeType : 1,
				allowPreviewEmoticons : false,
				allowImageUpload : true,
				height : 400,
				uploadJson : '<?php echo mc_site_url(); ?>/upload.php',
				items : ['source', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'clearhtml', 'quickformat', 'selectall', '|', 
		'formatblock', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
		'italic', 'underline', 'strikethrough', 'removeformat', '|', 'image', 'multiimage', 'table', 'hr', 'emoticons', 'baidumap', 'link', 'unlink'],
				afterChange : function() {
					K(this).html(this.count('text'));
				}
			});
		});
					KindEditor.ready(function(K) {
				    	var editor = K.editor({
							uploadJson : '<?php echo U('Publish/index/upload'); ?>',
							allowFileManager : true
						});
						K('.imgshow').click(function() {
							editor.loadPlugin('image', function() {
								editor.plugin.imageDialog({
									showRemote : false,
									clickFn : function(url, title, width, height, border, align) {
										$('.item').removeClass('active');
										$('<div class="item active"><div class="imgshow"><img src="'+url+'"></div><input type="hidden" name="fmimg[]" value="'+url+'"></div>').prependTo('#pub-imgadd');
										var index = $('.carousel-indicators li').last().index()*1+1;
										$('<li data-target="#carousel-example-generic" data-slide-to="'+index+'"></li>').appendTo('.carousel-indicators');
										mc_fmimg_delete();
										editor.hideDialog();
									}
								});
							});
						});
					});
		$(document).ready(function(){
			mc_fmimg_delete();
		});
		</script>
<?php mc_template_part('footer'); ?>