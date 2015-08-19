<h2>Answers to Question</h2>
<div class="content">
	<h1>
		<?php echo $question->title;?>
	</h1>
	<div class="content_item">
		<div class="answer-vote left">
			<div class="answer">
				<span class="answer-count"><?php echo $question->answer;?> </span> <span
					class="answer-lable">answers</span>
			</div>
			<a class="vote" href="#" onclick="return checkVote(this,<?php echo $question->id;?>)">
			<span class="vote-count"><?php echo $question->vote;?>
			</span> <span class="vote-lable">votes</span> </a>
		</div>
<!-- 		<span class="left"><img class="questionImage" 
			alt="" src="<?php echo "upload/question/".$question->image;?>" /> </span>-->
		<p>
			<?php echo $question->content;?>
		</p>
		<br /> <span class="right"> asked by <a
			href="<?php echo site_url("user/home/".$question->user_id);?>"> <?php echo $question->user_name;?>
		</a> <?php echo $question->created;?>
		</span>
		<ul class="tag-list right">
		<?php if(!empty($tagList)) foreach ($tagList as $tag):?>
			<li class="tag-item">
			<a href="<?php echo site_url("question/showByTagId/".$tag->tag_id);?>" rel="tag" class="tag-link"><?php echo $tag->tag;?></a>
			</li>
		<?php endforeach;?>
		</ul>
	</div>
</div>
<div class="content">
	<?php if(!empty($answerList)) foreach ($answerList as $item):?>
	<div class="content">
		<h1>Answer</h1>
		<div class="content_item">
			<div class="answer-vote left">
				<a class="vote" href="#" onclick="return checkVote2(this,<?php echo $item->id;?>)"><span class="vote-count"><?php echo $item->vote;?>
				</span> <span class="vote-lable">votes</span> </a>
			</div>
			<p>
				<?php echo $item->content;?>
			</p>
			<span class="right"> answered by <a href="<?php echo site_url("user/home/".$item->user_id);?>"><?php echo $item->user_name;?>
			</a> <?php echo $item->created;?>
			</span>
		</div>
	</div>
	<?php endforeach;?>
</div>
<div class="content">


	<h1>Your answer</h1>
	<div class="content_item">
		<form action="<?php echo site_url("question/answerQuestion/".$question->id);?>"
			method="post" enctype="multipart/form-data">
			<div class="form_settings">
				<script type="text/javascript">
    			var editor = new UE.ui.Editor();
    			editor.render("myEditor");
				</script>
					<textarea name="myEditor" id="myEditor" name="ueditor"></textarea>
				<p style="padding-top: 15px">
					<span>&nbsp;</span><input class="submit" type="submit" name="name"
						value="Answer" />
				</p>
			</div>
		</form>
	</div>

</div>
<div id="pageAction">
	<a href="#">First</a> <span class="current">1</span> <a href="#">2</a>
	<a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> ... <a href="#">28</a>
	<a href="#">Last</a>
</div>
