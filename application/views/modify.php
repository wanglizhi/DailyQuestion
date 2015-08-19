<div id="site_content">
	<div id="sidebar_container"></div>

	<div class="content">
		<h1>Register</h1>
		<div class="content_item">
			<form action="<?php echo site_url('user/modify');?>" method="post" enctype="multipart/form-data">
				<div class="form_settings">
					<p>
						<span><b>原始密码（必填）：</b> </span><input type="password" name="prePassword"
							value="" />
					</p>
					<p>
						<span><b>新密码（可以不填）：</b> </span><input type="password"
							name="password1"></input>
					</p>
					<p>
						<span><b>重复新密码：</b> </span><input type="password" name="password2"></input>
					</p>
					<p>
						<span><b>上传头像：</b> </span><input class="files-upload" type="file"
							multiple="multiple" name="head" value="" />
					</p>
					<p style="padding-top: 15px">
						<span>&nbsp;</span><input class="submit" type="submit"
							name="register" value="確定修改" />
					</p>
				</div>
			</form>
		</div>
	</div>
</div>
