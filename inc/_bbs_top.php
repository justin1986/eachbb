<?php
	$news_list=array();
	$db = get_db();
	$category = $db->query("SELECT * FROM bbs_forums b where type='forum' order by threads desc limit 6");
	foreach ($category as $cat){
		$key = '/bbs/forumdisplay.php?fid=' .$cat->fid;
		$news_list[$key] = $cat->name;
	}
	include_once(dirname(__FILE__) .'/../inc/_public_top.php');
?> 
<script type="text/javascript">
	var flashvar = {defaultIndex:'6'};
	var flashparam = {wmode:'Transparent'};
	swfobject.embedSWF("/flash/menu.swf","tl_r_c","702","103","8",false,flashvar,flashparam);
</script>