<div id="site_content">
	<div id="sidebar_container">
	<div class="sidebar" id="loginPart">
		<?php echo $login;?>
		</div>
		<?php echo $famousUsers;?>
		<?php echo $popularTags;?>
	</div>
	<?php echo $content;?>
</div>
<?php $this->load->view("ajax");?>