<?php
	session_start();
  include_once('../../frame.php');
	judge_role();
	$id=$_SESSION['admin_user_id'];
	$user1 = new table_class($tb_user);
	if($id)	{
		$user = $user1->find($id);
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin/user/modify_user_info','../ckeditor/ckeditor.js');
	?>
</head>
<body>
<div id=icaption>
    <div id=title>个人信息</div>
</div>
<div id=itable>
	<table cellspacing="1"  align="center">
	 <form id="user_form" enctype="multipart/form-data"  method="post" action="modify_user_info.post.php">
		<tr class=tr4>
			<td class=td1 width="15%">头像</td>
			<td width="85%">
			<?php if($user->image_src){?>
			<img width="90" height="90" src="<?php echo $user->image_src;?>">
			<?php }?>
			<input type="file" name="image_src"></input>(请上传90×90大小的图片)
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1 width="15%">大头像</td>
			<td width="85%">
			<?php if($user->image_src2){?>
			<img width="136" height="136" src="<?php echo $user->image_src2;?>">
			<?php }?>
			<input type="file" name="image_src2"></input>(请上传136×136大小的图片)
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1 width="15%">小头像</td>
			<td width="85%">
			<?php if($user->image_src3){?>
			<img width="62" height="62" src="<?php echo $user->image_src3;?>">
			<?php }?>
			<input type="file" name="image_src3"></input>(请上传62×62大小的图片)
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>用户名：</td>
			<td ><?php echo $user->name;?></td>
		</tr>
		<tr class=tr4>
			<td class=td1>昵称：</td>
			<td ><?php echo $user->nick_name;?></td>
		</tr>
		<tr class=tr4>
			<td class=td1>专栏名：</td>
			<td><input type="text" value="<?php echo $user->column_name;?>" name="column_name"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>密码：</td>
			<td><input type="password" name="old_password"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>新密码：</td>
			<td ><input type="password" name="new_password" id="new_password"></input></td>
		</tr>
		<tr class=tr4>
			<td class=td1>确认新密码：</td>
			<td ><input type="password" id="re_new_password"></input></td>
		</tr>
		<tr class=tr4>
			<td class=td1>个人简介：</td>
			<td><?php show_fckeditor('description','Admin',false,"215",$user->description);?></td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button id="btn_submit" type="submit">提 交</button></td>
		</tr>
	</form>
	</table>
</div>	
</body>
</html>
