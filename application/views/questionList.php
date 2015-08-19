<h2>Recent questions and answers</h2>
<?php if(!empty($questionList))foreach ($questionList as $question):?>
<div class="content">
		<h1>
			<a href="<?php echo site_url("question/questionPage/".$question->id);?>"><?php echo $question->title;?></a>
		</h1>
		<div class="content_item">
			<div class="answer-vote left">
				<div class="answer">
					<span class="answer-count"><?php echo $question->answer;?></span> <span class="answer-lable">answers</span>
				</div>
				<a class="vote" href="#" onclick="return checkVote(this,<?php echo $question->id;?>)">
				<span class="vote-count"><?php echo $question->vote;?></span> <span
					class="vote-lable">votes</span>
				</a>
			</div>
			<!-- <span class="left"><img class="questionImage" src="<?php echo "upload/question/".$question->image;?>"
				alt=""/>
			</span> -->
			<p><?php echo $question->content;?></p>
			<br>
			<br>
			<br>
			<span class="right"> asked by <a href="<?php echo site_url("user/home/".$question->user_id);?>">
			<?php echo $question->user_name;?></a> <?php echo $question->created;?>
			</span>
			<ul class="tag-list center">
						<?php if(!empty($question->tags)){
							$tagList=explode("_",$question->tags);
							unset($tagList[0]);
							foreach ($tagList as $tag):
						?>
							<li class="tag-item">
								<a href="<?php echo site_url("question/showByTagName/".$tag);?>" rel="tag" class="tag-link"><?php echo $tag;?></a>
							</li>
						<?php endforeach;}?>
			</ul>
		</div>
	</div>
<?php endforeach;?>
<div id="pageAction">
		<a href="#">First</a> <span class="current">1</span> <a href="#">2</a>
		<a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> ... <a href="#">28</a>
		<a href="#">Last</a>
</div>