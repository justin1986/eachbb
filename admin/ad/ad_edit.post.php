<?php session_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>迅傲信息</title>
	</head>
	<body>
<?php
	include_once('../../frame.php');
	#$role = judge_role();

	if(empty($_POST)){
		alert('提交失败，可能是上传文件过大或发生未知错误，请检查后再提交');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	
	$id = $_GET['id'];
	$ad = new table_class($g_ad_database_name.'.ad');
	if($id){
		$ad->find($id);
	}else{
		$ad->code = rand_str(20);
	}
	$ad->update_attributes($_POST['ad'],false);
	$ad->update_file_attributes('ad');
	$ad->save();
	redirect('ad_list.php');
	
?>
</body>
</html>