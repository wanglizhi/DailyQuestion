<div id="site_content">
	<div id="sidebar_container"></div>

	<div class="content">
		<h1>Register</h1>
		<div class="content_item">
			<form action="<?php echo site_url('user/register');?>" method="post">
				<div class="form_settings">
					<p>
						<span><b>Username</b>
						</span><input type="text" name="name" value="" />
					</p>
					<p>
						<span><b>Password</b>
						</span><input type="password" name="password"></input>
					</p>
					<p>
						<span><b>Password again</b>
						</span><input type="password" name="password"></input>
					</p>
					<p style="padding-top: 15px">
						<span>&nbsp;</span><input class="submit" type="submit" name="register"
							value="Register" />
					</p>
				</div>
			</form>
		</div>
	</div>
</div>
