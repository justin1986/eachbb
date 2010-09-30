<style>
#bg_hr{width:958px; height:4px; margin-top:25px; margin-left:10px; background:url(/images/class/b_hr.jpg) repeat-x; float:left; display:inline;}
#bottom{width:970px; margin-top:15px; text-align:center; font-size:12px; color:#666666;  float:left; display:inline;}
#bottom_b{width:970px; margin-top:10px; margin-bottom:50px; text-align:center; float:left; font-size:12px; color:#666666; display:inline;}
.bottom_a{font-size:12px; color:#666666; position:relative;  text-decoration: none;}
</style>
	<?php 
		$db = get_db();
	?>
<div id="bg_hr"></div>
<div id="bottom">
	<?php for($i=0 ; $i< 6 ; $i++){
		$list = $db->query("SELECT * FROM eb_page_pos where page='index' and name like 'bottom_link_$i' limit 7");
		?>
	<a class="bottom_a" <?php $pos="bottom_link_".$i;show_page_pos($pos,'link');?> href="<?php echo $list[0]->href;?>" target="_blank">
		<?php
		echo $list[0]->title; 
		if($i != 5){
		?> -<?php }?></a>
	 <?php }?>
</div>
<script src="/javascript/get_ad.js">
</script>
<div id="bottom_b">沪ICP备10204500号  <script src="http://s17.cnzz.com/stat.php?id=2415758&web_id=2415758&show=pic1" language="JavaScript"></script></div>
