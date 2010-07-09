<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>网趣宝贝-妈妈助手</title>
	<?php
		include_once('./../frame.php');
		css_include_tag('assistant_list','assistant_content','assistant_question','right_inc/assistant_right','top_inc/assistant_top','left_inc/assistant_left','bottom'); 
		use_jquery();
		js_include_tag('assistant/assistant');
		$category_id = intval($_GET['category_id']);
		if(!$category_id) die('invalid param');
		$category = new category_class('assistant');
		$parent = $category->find($category_id);
		$childs = $category->find_sub_category($category_id);
		$db = get_db();
	?>
</head>
<body>
<div id="ibody">
	<?php include_once('./_assistant_top.php'); ?>
	<div id="fbody">
		<?php include_once('./_assistant_left.php'); ?>
		<div id="result">
			<div id="result_top_btn">
				<input type="button" value="按年龄查看"/>
				<input type="button" value="按主题查看"/>
				<input type="button" value="全部专题"/>
			</div>
			<div id="container">
				<div id="container_result">
					<div id="result_list"><?php echo $parent->name;?></div>
					<?php foreach($childs as $child){ ?>
					<div class="result_banner">
						<div class="result_pg_top"><?php echo $child->name;?></div>
						<div class="result_pg_content">
							<?php 
							$sql = "select * from eb_assistant where category_id = {$child->id} limit 4";
							$assistants = $db->query($sql);
							$len = count($assistants);
							for($i = 0; $i < $len; $i++){ ?>
							<div class="result_container" style="<?php if($i == 0) echo "margin-top:10px;"; ?>">
								<img src="/images/assistant_list/pho.jpg"/>
								<div class="result_title"><a href="/assistant/assistant.php?id=<?php echo $assistants[$i]->id;?>"><?php echo $assistants[$i]->title;?></a></div>
								<div class="result_value"><?php echo $assistants[$i]->description;?><a href="/assistant/assistant.php?id=<?php echo $assistants[$i]->id;?>">[查看全文]</a></div>
							</div>
							<?php } ?>
							<div class="kong"></div>
						</div>
						<div class="result_pg_bottom"></div>
					</div>
					<?php } ?>
					<?php include_once('./_assistant_content.php'); ?>
				</div>
				<?php include_once('./_assistant_right.php'); ?>
			</div>
			<?php include_once('./_assistant_question.php'); ?>
		</div>
		<?php include_once('../inc/bottom.php'); ?>
	</div>
</div>
</body>
</html>
