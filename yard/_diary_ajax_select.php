<?php 
	include_once('../frame.php');
?>
日志分类：
<select>
	<option value="0">请选择分类</option>
	<?php 
	$db=get_db();
	$daily_cate=$db->query("SELECT id,name FROM eachbb_member.daily_category order by created_at desc;");
	foreach ($daily_cate as $variable) {
		echo "<option value={$variable->id}>{$variable->name}</option>";
	}
	?>
</select>
<input type="text" id="category_name"/>
<input type="button" id="category_button" value="提交"/>
