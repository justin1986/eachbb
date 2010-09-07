<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php
	include_once '../frame.php';
	$result = $_GET['result'];
	$page= $_GET['page'];
	if(!$page){
		die("非法操作！");
	}
	$db=get_db();
	$list = $db->query("select title,description from eb_page_pos where page='$page' and name='$result'");
	?>
</head>
<body>
<div style="width:800px;padding:10px; background:#f1fcfe;">
<?php if($list){?>
	<div style="margin-top:10px; height:34px; line-height:34px; margin-bottom:10px; width:800px; background:#c1d4da;font-size:14px; font-weight:bold;">标题：<?php echo $list[0]->title;?></div>
	<div style="width:800px; font-size:13px; line-height:20px;"><font style="font-size:14px; font-weight:bold;">内容：</font><br><?php echo  $list[0]->description ; ?></div>
	<?php }else{?>
	<div style="width:800px; height:100px; line-height:100px; font-size:30px; font-weight:bold; text-align:center;">内容为空！</div>
	<?php }?>
</div>
</body>
</html>