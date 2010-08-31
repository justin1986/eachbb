<?php
/*
 * 展示1级分类
 */
if(!defined('FRAME_VERSION')){
	die('invalid request');
	exit;
}
/*
 * get the data
 */
$filter_age = array(-2,-1,1,2,3);
?>
<div class="result_list">
	<?php 
		echo $current_cate->name;
	?>
</div>
<?php 
	foreach ($filter_age as $f_age){
		$sql = "select * from eb_assistant where is_adopt=1 and category_id = {$current_cate->id} and age = $f_age order by priority asc,created_at desc limit 10";
		$assistants = $db->query($sql);
		if(empty($assistants)) continue;
?>
<div class="result_banner">
	<div class="result_pg_top">
		<div class="gengduo_d">
		<?php echo convert_age($f_age); ?>
		</div>
		<div class="gengduo">
			<a href="list.php?category_id=<?php echo $current_cate->id?>&age=<?php echo $f_age;?>">更多&gt;&gt;</a>
		</div>
	</div>
	<div class="result_pg_content">
		<?php
		foreach($assistants as $assistant){
		?>
		<div class="result_container2" style="<?php if($i == 0) echo "margin-top:5px;"; ?>">
			<div class="result_title2"><a  target="_blank" href="/assistant/assistant.php?id=<?php echo $assistant->id;?>"><?php echo $assistant->title;?></a></div>
			<div class="result_value"><?php echo mb_substr(strip_tags($assistant->description),0,45,'utf-8');?>…<a href="/assistant/assistant.php?id=<?php echo $assistant->id;?>" target="_blank">[查看全文]</a></div>
		</div>
		<?php }?>
	</div>
	<div class="result_pg_bottom"></div>
</div>
<?php }?>