<div class="content">
	<h1><?php echo $user->name;?></h1>
	<div class="content_item">
		<div class="left"><img class="headImage" src="<?php echo "upload/head/".$user->head;?>"
			alt="example graphic" />
		</div>
		<br>
		<br>
		<div>
			<h4>积分：<span><?php echo $user->score;?>
			</span></h4>
			<h4>回答：<span><?php echo count($answerList);?> 
			</span></h4>
			<h4>提问：<span><?php echo count($questionList);?>
			</span></h4>
			<?php if(!empty($currentUser)&&$currentUser==$user->id)
				echo "<h4><a href=".site_url("user/modifyPage").">修改用户信息</a></h4>";
				?>
		</div>
	</div>
</div>
<div class="content">
	<h2>
		<span><?php echo $user->name?> </span>的回答
	</h2>
	<a href="#">总共：<span><?php echo count($answerList);?> </span>
	</a>
</div>

<?php foreach ($answerList as $item):?>
<div class="content">
	<h1>
		<a href="<?php echo site_url("question/questionPage/".$item->id);?>"><?php echo $item->title;?>
		</a>
	</h1>
	<div class="content_item">
		<div class="answer-vote left">
			<div class="answer">
				<span class="answer-count"><?php echo $item->answer;?> </span> <span
					class="answer-lable">answers</span>
			</div>
			<a class="vote" href="#"><span class="vote-count"><?php echo $item->vote;?>
			</span> <span class="vote-lable">votes</span> </a>
		</div>
		<p>
			<?php echo $item->content;?>
		</p>
		<span class="right"> asked by <a
			href="<?php echo "user/home/".$item->user_id;?>"> <?php echo $item->user_name;?>
		</a> <?php echo $item->created;?>
		</span>
		<ul class="tag-list right">
						<?php if(!empty($item->tags)){
							$tagList=explode("_",$item->tags);
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

<div class="content">
	<h2>
		<span><?php echo $user->name;?> </span>的提问
	</h2>
	<a href="#">总共：<span><?php echo count($questionList);?> </span>
	</a>
</div>

<?php foreach ($questionList as $question):?>
<div class="content">
	<h1>
		<a
			href="<?php echo site_url("question/questionPage/".$question->id);?>"><?php echo $question->title;?>
		</a>
	</h1>
	<div class="content_item">
		<div class="answer-vote left">
			<div class="answer">
				<span class="answer-count"><?php echo $question->answer;?> </span> <span
					class="answer-lable">answers</span>
			</div>
			<a class="vote" href="#"><span class="vote-count"><?php echo $question->vote;?>
			</span> <span class="vote-lable">votes</span> </a>
		</div>
		<p>
			<?php echo $question->content;?>
		</p>
		<span class="right"> asked by <a
			href="<?php echo "user/home/".$question->user_id;?>"> <?php echo $question->user_name;?>
		</a> <?php echo $question->created;?>
		</span>
		<ul class="tag-list right">
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
<div class="content">
	<h2>Messages</h2>
</div>
<?php // foreach ($questionList as $question):?>
<div class="content">
	<div class="content_item">
		<a href="#">User1</a> <span class="left"><img src="images/graphic.jpg"
			alt="example graphic" /> </span>
		<p>最近可好，想死你了</p>
	</div>
</div>
<?php // endforeach;?>