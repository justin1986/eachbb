<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php
	include_once '../frame.php';
	include_once '../inc/User.class.php';
	use_jquery_ui();
	css_include_tag('top_inc/test_top','colorbox','index');
	js_include_tag('jquery.colorbox-min');
	$result = $_GET['result'];
	$page= $_GET['page'];
	if(!$page){
		die("非法操作！");
	}
	?>
</head>
<body>
<?php
$db=get_db();
$list = $db->query("select title,description from eb_page_pos where page='$page' and name='$result'");
?>
<div class="test_context" style="width:600px;">
<?php if($list){?>
	<div class="context_title" style="margin-top:10px; width:600px; ">标题：<?php echo $list[0]->title;?></div>
	<div class="context_content" style="width:600px;">内容：<br><?php echo  $list[0]->description ; ?></div>
	<?php }else{?>
	<div style="width:600px; height:100px; line-height:100px; font-size:30px; font-weight:bold; text-align:center;">内容为空！</div>
	<?php }?>
</div>
</div>
</body>
<script type="text/javascript">
	
</script>
</html>