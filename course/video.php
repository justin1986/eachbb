<?php include_once('../frame.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>课程</title>
	<style>
		div{margin:0 auto;text-align:center; color:#ffffff;}
	</style>
</head>
<body style="background-color:black">
<?php 
	$id = intval($_GET['id']);
	if(empty($id)){
		die('非法访问!');
	}
	$teach = new table_class('eb_teach');
	$teach->find($id);
	$content = $teach->content;
	if(empty($content)){
		die('非法访问!');
	}
?>
<div style="margin-top:50px;">
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="600px" height="450px">
	  <param name=movie value="<?php echo $content;?>">
	  <param name=quality value=high>
	  <param name="wmode" value="transparent">
	  <embed src="<?php echo $content;?>" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="600" height=450" wmode="transparent"></embed>
	</object>
</div>
<div><?php echo $teach->title;?></div>
</body>
</html>