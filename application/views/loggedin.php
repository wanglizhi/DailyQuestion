	<h3>Welcome</h3>
	<div class="sidebar_item">
		<span><img class="headImage" src="<?php echo "upload/head/".$head;?>" alt="example graphic" />
		</span>
		<div>
		<h4>
			<a href="<?php echo site_url("user/home/".$id);?>"><?php echo $name;?></a>
		</h4>
			<h4>score:<span><?php echo $score;?></span></h4>
		</div>
		<a href="javascript:;" class="left button" onclick="logout()">Logout</a>
	</div>
	<div class="sidebar_base"></div>
