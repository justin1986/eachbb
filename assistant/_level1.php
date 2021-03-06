<?php
session_start();
$_SESSION["cat"]=$_GET["category_id"];
/*
 * 展示1级分类
 */
if(!defined('FRAME_VERSION')){
	die('invalid request');
	exit;
}
class DisplayCategory {
	var $category_id;
	var $category_name;
	var $category_image;
	var $assistants = array();
}
/*
 * get the data
 */
$filter_age = $age ? array($age) : array(-2,-1,1,2,3);
?>
<div class="result_list"><?php echo $current_cate->name;?></div>
<?php 
	foreach ($filter_age as $f_age){
		$display_category = array();
		foreach ($sub_cates as $cate){
			$sql = "select * from eb_assistant where is_adopt=1 and category_id = {$cate->id} and age=$f_age order by priority asc,created_at desc limit 6";
			$items = $db->query($sql);
			if($items){
				$item = new DisplayCategory();
				$item->category_id = $cate->id;
				$item->category_name = $cate->name;
				$item->category_image = $cate->show_iamge ? $cate->show_iamge : '/images/assistant_list/pho.jpg';
				foreach ($items as $assistant){
					$item->assistants[] = array("id" => $assistant->id,"title" => $assistant->title);
				}
				$display_category[] = $item;
			}
		}
		if(empty($display_category)) continue;

?>
<div class="result_banner">
	<div class="result_pg_top">
		<?php 
			echo convert_age($f_age);
		?>
	</div>
	<div class="result_pg_content">
		<?php
		foreach($display_category as $display){
			$img = $db->query("SELECT show_image FROM eb_category e where id={$display->category_id}");
		?>
		<div class="result_container" style="padding-bottom:5px; border-bottom:1px solid #F0C09D;">
			<div class="resultt_banner">
				<a href="list.php?category_id=<?php echo $display->category_id; ?>&age=<?php echo $f_age;?>"><img src="<?php echo $img[0]->show_image;?>"/></a>
				<?php
				$i=0;
				 foreach($display->assistants as $j => $assistant){
				
				 	?>
				<div class="result_title" <?php if($j == 0 || $j ==1)echo 'style="margin-top:5px;"';?>><a href="/assistant/assistant.php?id=<?php echo $assistant[id];?>" title="<?php echo $assistant[title];?>" target="_blank"><?php echo mb_substr($assistant[title],0,12,'utf-8');?><?php  if(mb_strlen($assistant[title],'utf-8') > 12){ echo "<font style='font-size:10px;'>...</font>";}?></a></div>
				<?php $i++; }?>
			</div>
			<div class="cate_more"  style="float:right;"<?php if($k == 0) echo "style='margin-top:54px;'"; ?>><a href="list.php?category_id=<?php echo $display->category_id?>&age=<?php echo $f_age;?>">更多</a></div>
		</div>
		<?php }?>
	</div>
	<div class="result_pg_bottom"></div>
</div>
<?php }?>