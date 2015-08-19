<div class="sidebar">
          <h3>Famous Users</h3>
           <?php if(!empty($famousUsers))foreach ($famousUsers as $user):?>
	<div class="sidebar_item left">
		<div class="left" ><img class="headImage" src="<?php echo "upload/head/".$user->head;?>"
			alt="example graphic" />
		</div>
		<div>
			<h4><a href="<?php echo site_url("user/home/".$user->id);?>">
			<?php echo $user->id.':'.$user->name;?></a></h4>
			<h4>积分：<span><?php echo $user->score;?>
			</span></h4>
		</div>
	</div>
	<h1></h1>
	<?php endforeach;?>
          <div class="sidebar_base"></div>
        </div>