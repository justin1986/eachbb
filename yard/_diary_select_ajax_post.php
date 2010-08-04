<?php 
include_once('../frame.php');
?>
日志分类：
<select>
	<option value="0">请选择分类</option>
	<?php 
	$db=get_db();
	$daily_cate=$db->query("SELECT id,name FROM eachbb_member.daily_category d;");
	foreach ($daily_cate as $variable) {
		echo "<option value={$variable->id}>{$variable->name}</option>";
	}
	?>
</select>
<img src="/images/admin/btn_add.png"/>
