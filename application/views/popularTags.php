<div class="sidebar">
	<h3>Popular Tags</h3>
	<div class="sidebar_item">
			<ul class="tag-list center">
						<?php if(!empty($popularTags))foreach ($popularTags as $tag):?>
						<li class="tags-label center"><a href="<?php echo site_url("question/showByTagId/".$tag->id);?>" rel="tag" class="tag-link" title=<?php echo $tag->question_count; ?>><?php echo $tag->tag;?></a>
						</li>
						<?php endforeach;?>
					</ul>
	</div>
	<div class="sidebar_base"></div>
</div>
