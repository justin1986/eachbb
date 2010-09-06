<?php 
include_once('../frame.php');
$category_id=intval($_POST["category_id"]);
?>
日志分类：
<select id="category_idd">
	<option value="0">请选择分类</option>
	<?php 
	$user = User::current_user();
	$db=get_db();
	$daily_cate=$db->query("SELECT id,name FROM eachbb_member.daily_category where u_id={$user->id} order by created_at desc;");
	foreach ($daily_cate as $variable) {
		if($variable->id == $category_id)
			echo "<option  selected=selected>{$variable->name}</option>";
		else
			echo "<option value={$variable->id}>{$variable->name}</option>";
	}
	?>
</select>
<img src="/images/admin/btn_add.png"/>
