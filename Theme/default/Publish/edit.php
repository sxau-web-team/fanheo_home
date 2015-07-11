<?php mc_template_part('header'); ?>
	<link rel="stylesheet" href="<?php echo mc_site_url(); ?>/Kindeditor/themes/default/default.css" />
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<form role="form" method="post" action="<?php echo U('Home/perform/edit'); ?>">
					<div class="form-group">
						<label>
							标题
						</label>
						<input name="title" type="text" class="form-control" placeholder="" value="<?php echo mc_get_page_field($_GET['id'],'title'); ?>">
					</div>
					<div class="form-group">
						<label>
							主题内容
						</label>
						<textarea name="content" class="form-control" rows="3"><?php echo mc_get_page_field($_GET['id'],'content'); ?></textarea>
					</div>
					<input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
					<button type="submit" class="btn btn-warning btn-block">
						保存
					</button>
				</form>
			</div>
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
										$('<img src="'+url+'" class="default-img mb-10"><input type="hidden" name="fmimg[]" value="'+url+'">').prependTo('#pub-imgadd');
										editor.hideDialog();
									}
								});
							});
						});
					});
				</script>
		<script>
		function mc_fmimg_delete(id) {
			$.ajax({
				url: '<?php echo U('home/perform/fmimg_delete'); ?>&id=' + id,
				type: 'GET',
				dataType: 'html',
				timeout: 9000,
				error: function() {
					alert('提交失败！');
				},
				success: function(html) {
					$('#fmimg_'+id).remove();
				}
			});
		};
		</script>
<?php mc_template_part('footer'); ?>