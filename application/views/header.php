<!DOCTYPE html>
<html>
<head>
<title><?php echo $pageTitle?></title>
<base href="<?php echo base_url();?>"/>
<meta name="description" content="website description" />
<meta name="keywords" content="website keywords, website keywords" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.config.js"></script>  
<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.all.js"></script>  
<script src="js/returnTop.js"></script>
<link href="css/returnTop.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="ueditor/themes/iframe.css"/>
<link rel="shortcut icon" href="images/question.ico" /> 
</head>
<body>
		<header>
			<div id="returnTop">

			</div>
			<div id="logo">
				<div id="logo_text">
					<h1>
						<a href="<?php echo site_url("question/index");?>">Daily<span class="logo_colour">Question</span></a>
					</h1>
					<h2>好好学习，天天问答</h2>
				</div>
				<form method="post" action="<?php echo site_url("question/search");?>" id="search">
					<input class="search" type="search" name="search_field"
						value="search....."
						onclick="javascript: document.forms['search'].search_field.value=''" />
					<input name="search" type="image"
						style="float: right; border: 0; margin: 20px 0 0 0;"
						src="images/search.png" alt="search" title="search" />
				</form>
			</div>
			<nav>
				<ul class="sf-menu" id="nav">
					<li><a href="<?php echo site_url("question/index");?>">Questions</a></li>
					<li><a href="<?php echo site_url("question/unanswered");?>">Unanswered</a></li>
					<li><a href="<?php echo site_url("tag/index");?>">Tags</a></li>
					<li><a href="<?php echo site_url("user/index");?>">Users</a></li>
					<li><a href="<?php echo site_url("question/askQuestionPage");?>">Ask a Question</a></li>
				</ul>
			</nav>
		</header>