<form action="<?php echo site_url("user/searchUser");?>"
			method="post" enctype="multipart/form-data" onsubmit="return checkTitle()">
<input type="text" id="userSearch" placeholder="用户名"
			onblur="checkPassword(this)" name="userName">  
			<input class="submit button" type="submit" name="name"
						value="搜索用户" />
</form>

<div class="content">
	<h1>All the Users</h1>
	<?php if(!empty($userList))foreach ($userList as $user):?>
	<div class="content_item" style="margin-left: 50px">
		<div class="left" ><a href="<?php echo site_url('user/home/'.$user->id);?>"><img class="headImage" src="<?php echo "upload/head/".$user->head;?>"
			alt="example graphic" /></a>
		</div>
		<br>
		<br>
		<br>
		<div>
			<h3><a href="<?php echo site_url('user/home/'.$user->id);?>">
			<?php echo $user->id.':'.$user->name;?></a></h3>
			<h3>积分：<span><?php echo $user->score;?>
			</span></h3>
		</div>
	</div>
	<h1></h1>
	<?php endforeach;?>
</div>