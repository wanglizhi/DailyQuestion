<form action="<?php echo site_url("tag/searchTag");?>"
			method="post" enctype="multipart/form-data" onsubmit="return checkTitle()">
<input type="text" id="userSearch" placeholder="tag"
			onblur="checkPassword(this)" name="tagSearch">  
			<input class="submit button" type="submit" name="name"
						value="搜索Tag" />
</form>
<div class="content">
	<h1>All the Tags</h1>
	<div class="content_item" style="margin-left: 50px">
		<ul class="tag-list center">
		<?php if(!empty($tagList))foreach ($tagList as $tag):?>
						<li class="tags-label"><a href="<?php echo site_url("question/showByTagId/".$tag->id);?>" rel="tag" class="tag-link"><?php echo $tag->tag."&nbsp;&times;".$tag->question_count;?></a>
						</li>
						<?php endforeach;?>
					</ul>
	</div>
</div>