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
		$sql = "select * from eb_assistant where is_adopt=1 and category_id = {$current_cate->id} and age = $age order by priority asc,created_at desc";
		$assistants = $db->paginate($sql,20);
		$assistants || $assistants = array();
?>
<div class="result_banner">
	<div class="result_pg_top">
		<?php 
			echo convert_age($age);
		?>
	</div>
	<div class="result_pg_content">
		<?php
		foreach($assistants as $assistant){
		?>
		<div class="result_container2" style="<?php if($i == 0) echo "margin-top:5px;"; ?>">
			<div class="result_title2"><a href="/assistant/assistant.php?id=<?php echo $assistant->id;?>" target="_blank"><?php echo $assistant->title;?></a></div>
			<div class="result_value"><?php echo mb_substr(strip_tags($assistant->content),0,62,'utf-8');?>……<a href="/assistant/assistant.php?id=<?php echo $assistant->id;?>" target="_blank">[查看全文]</a></div>
		</div>
		<?php }?>
		<div id="paginage"><?php paginate();?></div>
	</div>
	<div class="result_pg_bottom"></div>
</div>
