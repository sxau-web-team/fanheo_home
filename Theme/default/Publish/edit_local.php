<?php mc_template_part('header'); ?>
	<link rel="stylesheet" href="<?php echo mc_site_url(); ?>/Kindeditor/themes/default/default.css" />
	<div class="container">
		<div class="row">
			<form role="form" method="post" action="<?php echo U('home/perform/edit'); ?>">
			<div class="col-sm-9">
				<div class="form-group">
					<label>
						店铺名称
					</label>
					<input name="title" type="text" class="form-control" placeholder="" value="<?php echo mc_get_page_field($_GET['id'],'title'); ?>" >
				</div>
				<div class="form-group">
						<label>
							选择店铺分类
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
				<div class="form-group">
					<label>
						店铺签名
					</label>
					<input name="public" type="text" class="form-control" placeholder="" value="<?php echo mc_get_meta($_GET['id'],'public'); ?>">
				</div>
				<div class="form-group">
					<label>
						店长
					</label>
					<input name="header" type="text" class="form-control" placeholder="" value="<?php echo mc_get_meta($_GET['id'],'header'); ?>">
				</div>
				<div class="form-group">
					<label>
						联系方式
					</label>
					<input name="phone" type="text" class="form-control" placeholder="" value="<?php echo mc_get_meta($_GET['id'],'phone'); ?>">
				</div>
				<div class="form-group">
					<label>
						店铺厨师
					</label>
					<input name="cook" type="text" class="form-control" placeholder="" value="<?php echo mc_get_meta($_GET['id'],'cook'); ?>">
				</div>
				<div class="form-group">
					<label>
						店铺介绍
					</label>
					<textarea name="content" class="form-control" rows="3" ><?php echo mc_get_page_field($_GET['id'],'content'); ?></textarea>
				</div>
				<button type="submit" class="btn btn-warning btn-block">
					<i class="glyphicon glyphicon-ok"></i> 提交
				</button>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>
							店铺图片
					</label>
					<div id="pub-imgadd">
						<img class="default-img" src="<?php echo mc_theme_url(); ?>/img/upload.jpg">
						<input type="hidden" name="fmimg" value="">
					</div>
				</div>
			</div>
			<input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
			</form>
		</div>
	</div>
	<script charset="utf-8" src="<?php echo mc_site_url(); ?>/Kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="<?php echo mc_site_url(); ?>/Kindeditor/lang/zh_CN.js"></script>
	<script>
		var editor;
		KindEditor.ready(function(K) {
			editor = K.create('textarea[name="content"]', {
				resizeType : 1,
				allowPreviewEmoticons : false,
				allowImageUpload : true,
				height : 400,
				uploadJson : '<?php echo U('Publish/index/upload'); ?>',
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
						K('.default-img').click(function() {
							editor.loadPlugin('image', function() {
								editor.plugin.imageDialog({
									showRemote : false,
									clickFn : function(url, title, width, height, border, align) {
										$('.default-img').attr('src',url);
										$('#pub-imgadd input').val(url);
										editor.hideDialog();
									}
								});
							});
						});
					});
				</script>
<?php mc_template_part('footer'); ?>