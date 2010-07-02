<?php
	session_start();
	include_once('../../frame.php');
	$role = judge_role();
	
	$key = $_GET['key'];
	$db = get_db();
	$sql = "select * from eb_member where 1=1";
	if($key!=''){
		$sql .= " and (name like '%{$key}%' or email like '%{$key}%')";
	}
	$sql .= " order by id desc";
	$record = $db->paginate($sql,30);
	$count = count($record);
	
	function get_gender($gender){
		switch ($gender){
			case 1:echo '男';break;
			case 2:echo '女';break;
			default:echo '未知';
		}
	}
	
	function get_status($status){
		switch($status){
			case 1:echo '已生育';break;
			case 2:echo '未生育';break;
			case 3:echo '怀孕中';break;
			default:echo '未知';
		}
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
		js_include_tag('admin_pub');
	?>
</head>

<body>
<div id=icaption>
    <div id=title>会员管理</div>
</div>
<div id=isearch>
		<input id="key" type="text" value="<?php echo $key;?>">
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="10%">用户名</td><td width="20%">邮箱</td><td width="15%">注册时间</td><td width="10%">IP</td><td width="5%">性别</td><td width="15%">生日</td><td width="10%">是否生育</td><td width="15%">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->name;?></td>
					<td><?php echo $record[$i]->email;?></td>
					<td><?php echo $record[$i]->created_at;?></td>
					<td><?php echo $record[$i]->ip;?></td>
					<td><?php echo get_gender($record[$i]->gender);?></td>
					<td><?php echo substr($record[$i]->birthday,0,10);?></td>
					<td><?php echo get_status($record[$i]->baby_status);?></td>
					<td>
						<!--  
						<a href="edit_info.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer" title="查看用户个人信息"><img src="/images/admin/btn_edit.png" border="0"></a>
						<span style="cursor:pointer;color:#FF0000" class="del_yh" name="<?php echo $record[$i]->id;?>" title="删除"><img src="/images/admin/btn_delete.png" border="0"></span>
						-->　
					</td>
				</tr>
		<?php
			}
		?>
		<tr class="btools">
			<td colspan=10><?php paginate();?></td>
		</tr>
	</table>
	</div>
</body>
</html>
<script>
	$("#search_button").click(function(){
		search();
	});
	$("#key").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	function search(){
		window.location.href = "?key="+encodeURI($("#key").val());
	}
</script>