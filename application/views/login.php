	<h3>Welcome</h3>
	<div class="sidebar_item">
		<h4>User Login</h4>
			<input type="text" id="userName" name="name"
				placeholder="Email or Username" onblur="checkUserName(this)"> 
				<input type="password" id="password" name="password" placeholder="Password"
				onblur="checkPassword(this)"> 
				<input type="submit" value="Login" id="login" name="login" onclick="checkLogin()">
				<br>
		<a href="<?php echo site_url("user/registerPage");?>" class="">Register</a>
	</div>
	<div class="sidebar_base"></div>
