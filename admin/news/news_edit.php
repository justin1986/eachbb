<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>发布新闻</title>
	<?php 

		css_include_tag('admin2','colorbox','jquery_ui');
		use_jquery_ui();
		validate_form("news_edit");
		js_include_tag('category_class.js', 'admin/news_pub', 'admin/news_edit','jquery.colorbox-min.js','../ckeditor/ckeditor.js','pubfun');
		$column_roles = array('column_editor','column_writer');
	?>
</head>
<?php 
//initialize the categroy;
	$category = new category_class('news');
	$category->echo_jsdata();
	if(role_name() == 'column_editor' || role_name()=='column_writer'){ ?>
	<script>
		var uncheck_keyword = true;
	</script>		
<?php
	}
?>
<body>
	<?php 
		$id = $_REQUEST['id'];
		$news = new table_class($tb_news);	
		if($id){
			$news->find($id);
		}
		if($_REQUEST['language_tag']){
			$news->language_tag = $_REQUEST['language_tag'];
		}
		if($news->language_tag == 1 || $_REQUEST['chinese_id']){
			include '_english_news_edit.php';
		}else{
			if(in_array(role_name(),$column_roles)){
				include "_column_news_edit.php";
			}else{
				include "_news_edit.php";	
			}
			
		}	
	?>
</body>
</html>
