<div class="content">
	<h1>Ask a question</h1>
	<div class="content_item">
		<form action="<?php echo site_url("question/askQuestion");?>"
			method="post" enctype="multipart/form-data" onsubmit="return checkTitle()">
			<div class="form_settings">
					<h4>标题:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input id="questionTitle" type="text" name="title" value="" /></h4>
				<script type="text/javascript">
    			var editor = new UE.ui.Editor();
    			editor.render("myEditor");
				</script>
					<textarea name="myEditor" id="myEditor" name="ueditor"></textarea>
					
				<div>
					<ul class="tag-list center" id="questionTags">
					</ul>
					<h4>Tags:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="tags"
						placeholder="Tag用空格确定输入(最多5个)" onkeypress="checkTag(event)" id="tagInput"/></h4> 
				</div>
				
				<ul class="tag-list center" id="tagRec">
				</ul>
				
				<p style="padding-top: 15px">
					<span>&nbsp;</span><input class="submit" type="submit" name="name"
						value="Ask the Question" />
				</p>
			</div>
		</form>
	</div>
</div>
