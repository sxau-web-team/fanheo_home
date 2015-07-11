
<a id="jianyi-model" href="#" data-toggle="modal" data-target="#jianyi"><i class="glyphicon glyphicon-edit"></i></a>
<div class="modal fade" id="jianyi" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				用户反馈
			</div>
			<div class="modal-body">
				<?php if(mc_user_id()) : ?>
				<form role="form" method="post" action="<?php echo U('home/perform/jianyi'); ?>">
					<div class="form-group">
					<div class="radio">
					  <label class="radio-inline">
					    <input type="radio" name="type" id="optionsRadios1" value="网站改进" checked>
					    网站改进
					  </label>
					
					  <label class="radio-inline">
					    <input type="radio" name="type" id="optionsRadios2" value="怡膳园A">
					    怡膳园A
					  </label>
					
					  <label class="radio-inline">
					    <input type="radio" name="type" id="optionsRadios3" value="怡膳园B" >
					    怡膳园B
					  </label>
					
					  <label class="radio-inline">
					    <input type="radio" name="type" id="optionsRadios3" value="谷园B" >
					    谷园B
					  </label>
					
					  <label class="radio-inline">
					    <input type="radio" name="type" id="optionsRadios3" value="谷园A" >
					    谷园A
					  </label>
					
					  <label class="radio-inline">
					    <input type="radio" name="type" id="optionsRadios3" value="木屋快餐" >
					    木屋快餐
					  </label>
					</div>
						
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">
							建议内容
						</label>
						<textarea name="content" class="form-control" rows="3" placeholder="请输入您的建议，我们会及时处理"></textarea>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-block btn-warning">
							<i class="glyphicon glyphicon-ok"></i> 提交
						</button>
					</div>
					<input type="hidden" name="id" value="<?php echo $val['id']; ?>">
				</form>
				<?php else : ?>
				<div id="nothing">
					请<a href="<?php echo U('user/login/index'); ?>">登陆</a>或<a href="<?php echo U('user/register/index'); ?>">注册</a>后进行评论！
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>