<?php 
	#$news_list=array("育儿早班车","邻家育儿","海外传真 ","潮爸潮妈","网趣动态");
	$news_list = array();
	$db = get_db();
	$category = $db->query("select id,name from eb_category where parent_id = 0 and category_type='news'");
	foreach ($category as $cat){
		$key = '/news/news_list.php?category_id=' .$cat->id;
		$news_list[$key] = $cat->name;
	}
	include_once(dirname(__FILE__) .'/../inc/_public_top.php');
?>
<script type="text/javascript">
	var flashvar = {defaultIndex:'7'};
	var flashparam = {wmode:'Transparent'};
	swfobject.embedSWF("/flash/menu.swf","tl_r_c","702","103","8",false,flashvar,flashparam);
</script>