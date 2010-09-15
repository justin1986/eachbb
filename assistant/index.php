<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>网趣宝贝-妈妈助手</title>
	<?php
		include_once dirname(__FILE__).'/../frame.php';
		css_include_tag('top_inc/assistant_top','assistant/index.css','left_inc/assistant_left'); 
		use_jquery();
		$db = get_db();
		js_include_tag('assistant/assistant');
		init_page_items('assistant_index');
	?>
</head>
<body>
<div id="ibody">
	<?php include_once(dirname(__FILE__)."/../inc/_assistant_top.php"); ?>
	<?php include_once dirname(__FILE__)."/_assistant_left.php"; ?>
	<div id="iframe_container">
		<?php
		if($_GET['category_id'] == "_knowledge.php"){
			?>
			<iframe id="iframe" name="iframe" src="/assistant/_knowledge.php" width="745px" height="2700px" frameborder="0" scrolling="no" ></iframe>
			<?php
		}else if($_GET['category_id']){?>
		<iframe id="iframe" name="iframe" src="/assistant/list.php?page_type=<?php echo $page_type;?>&age=<?php echo $_GET['age'];?>&category_id=<?php echo $_GET['category_id']?>" width="745px" height="2700px" frameborder="0" scrolling="no" ></iframe>
		<?php }else {?>
		<iframe id="iframe" name="iframe" src="/assistant/_index.php?page_type=<?php echo $page_type;?>&age=<?php echo $_GET['age'];?>" width="745px" height="1000px" frameborder="0" scrolling="no" ></iframe>
		<?php }?>
		
	</div>	
	<?php include_once(dirname(__FILE__).'/../inc/bottom.php'); ?>
</div>
</body>
</html>