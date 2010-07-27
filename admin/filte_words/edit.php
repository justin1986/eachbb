<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
	$id=intval($_REQUEST['id']);
	$table = new table_class('eb_filte_words');
	if($id)	{
		$table = $table->find($id);
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网-敏感词管理</title>
	<?
		css_include_tag('admin');
	?>
</head>
<?php
	validate_form("user_form");
?>
<body>
	<div id=icaption>
    <div id=title><?php if($id){echo "修改";}else{echo "添加";}?>敏感词</div>
	  <a href="list.php" id=btn_back></a>
	</div>
<div id=itable>
	<form id="user_form" method="post" action="post.php">
		<table cellspacing="1"  align="center">
		
			<tr class=tr4>
				<td class=td1 width=25%>敏感词(多个词之间可以用|分割)</td>
				<td width=75%><input type="text" name="post[text]" value="<?php echo $table->text;?>" class="required"></td>
			</tr>
			<tr class=btools>
				<td colspan="10"><input type="submit" value="提交"><input type="hidden" name="id" value="<?php echo $id;?>" /></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>
