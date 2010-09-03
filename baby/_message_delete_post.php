	<?php 
		include_once('../frame.php');
		$user = User::current_user();
		$db = get_db();
		$id=$_POST["result_id"];
		if(!$id)die('非法操作！');
		$id=intval($id);
		if($db->execute("delete from eachbb_member.message where id=$id"))
			echo '删除成功！';
		else
			echo '删除失败！';
	?>
	