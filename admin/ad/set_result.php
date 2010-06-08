<?php
	if($_SERVER['REMOTE_ADDR']!='127.0.0.1')die();
	include_once('../../frame.php');
	
	set_time_limit(600);
	$db = get_db();
	$date = $_GET['date'];
	if($date == ''){
		$date = date("Y-m-d");
	}
	
	$record = $db->query("select count(id) as num,ad_id,ad_name from forbes_ad.fb_ad_show_list where substring(created_at,1,10)='$date' group by ad_id");
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		$id = $record[$i]->ad_id;
		$num = $record[$i]->num;
		$name = $record[$i]->ad_name;
		$sql = "insert into forbes_ad.fb_ad_result (source_id,type,date_time,count,ad_name) values ($id,'ad','$date',$num,'$name') ON DUPLICATE KEY update count=$num";
		$db->execute($sql);
	}
	$record = $db->query("select count(t1.id) as num,t1.channel_id,t2.name from forbes_ad.fb_ad_show_list t1 join forbes_ad.fb_channel t2 on t1.channel_id=t2.id where substring(t1.created_at,1,10)='$date' group by t1.channel_id");
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		$id = $record[$i]->channel_id;
		$num = $record[$i]->num;
		$name = $record[$i]->name;
		$sql = "insert into forbes_ad.fb_ad_result (source_id,type,date_time,count,ad_name) values ($id,'channel','$date',$num,'$name') ON DUPLICATE KEY update count=$num";
		$db->execute($sql);
	}
	$record = $db->query("select count(t1.id) as num,t1.banner_id,t2.name from forbes_ad.fb_ad_show_list t1 join forbes_ad.fb_banner t2 on t1.banner_id=t2.id where substring(t1.created_at,1,10)='$date' group by t1.banner_id");
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		$id = $record[$i]->banner_id;
		$num = $record[$i]->num;
		$name = $record[$i]->name;
		$sql = "insert into forbes_ad.fb_ad_result (source_id,type,date_time,count,ad_name) values ($id,'banner','$date',$num,'$name') ON DUPLICATE KEY update count=$num";
		$db->execute($sql);
	}
	$record = $db->query("select count(t1.id) as num,t3.id,t2.name as bname,t4.name as cname from forbes_ad.fb_ad_show_list t1 join forbes_ad.fb_channel_banner t3 on t1.banner_id=t3.banner_id and t1.channel_id=t3.channel_id join forbes_ad.fb_banner t2 on t1.banner_id=t2.id join forbes_ad.fb_channel t4 on t1.channel_id=t4.id where substring(t1.created_at,1,10)='$date' group by t3.id");
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		$id = $record[$i]->id;
		$num = $record[$i]->num;
		$name = $record[$i]->cname.'-'.$record[$i]->bname;
		$sql = "insert into forbes_ad.fb_ad_result (source_id,type,date_time,count,ad_name) values ($id,'channel_banner','$date',$num,'$name') ON DUPLICATE KEY update count=$num";
		$db->execute($sql);
	}
	$record = $db->query("select count(id) as num,ad_id,ad_name from forbes_ad.fb_ad_click_list where substring(created_at,1,10)='$date' group by ad_id");
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		$id = $record[$i]->ad_id;
		$num = $record[$i]->num;
		$name = $record[$i]->ad_name;
		$sql = "insert into forbes_ad.fb_ad_result (source_id,type,date_time,count,ad_name) values ($id,'ad_click','$date',$num,'$name') ON DUPLICATE KEY update count=$num";
		$db->execute($sql);
	}
	$record = $db->query("select count(t1.id) as num,t1.channel_id,t2.name from forbes_ad.fb_ad_click_list t1 join forbes_ad.fb_channel t2 on t1.channel_id=t2.id where substring(t1.created_at,1,10)='$date' group by t1.channel_id");
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		$id = $record[$i]->channel_id;
		$num = $record[$i]->num;
		$name = $record[$i]->name;
		$sql = "insert into forbes_ad.fb_ad_result (source_id,type,date_time,count,ad_name) values ($id,'channel_click','$date',$num,'$name') ON DUPLICATE KEY update count=$num";
		$db->execute($sql);
	}
	$record = $db->query("select count(t1.id) as num,t1.banner_id,t2.name from forbes_ad.fb_ad_click_list t1 join forbes_ad.fb_banner t2 on t1.banner_id=t2.id where substring(t1.created_at,1,10)='$date' group by t1.banner_id");
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		$id = $record[$i]->banner_id;
		$num = $record[$i]->num;
		$name = $record[$i]->name;
		$sql = "insert into forbes_ad.fb_ad_result (source_id,type,date_time,count,ad_name) values ($id,'banner_click','$date',$num,'$name') ON DUPLICATE KEY update count=$num";
		$db->execute($sql);
	}
	$record = $db->query("select count(t1.id) as num,t3.id,t2.name as bname,t4.name as cname from forbes_ad.fb_ad_click_list t1 join forbes_ad.fb_channel_banner t3 on t1.banner_id=t3.banner_id and t1.channel_id=t3.channel_id join forbes_ad.fb_banner t2 on t1.banner_id=t2.id join forbes_ad.fb_channel t4 on t1.channel_id=t4.id where substring(t1.created_at,1,10)='$date' group by t3.id");
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
		$id = $record[$i]->id;
		$num = $record[$i]->num;
		$name = $record[$i]->cname.'-'.$record[$i]->bname;
		$sql = "insert into forbes_ad.fb_ad_result (source_id,type,date_time,count,ad_name) values ($id,'channel_banner_click','$date',$num,'$name') ON DUPLICATE KEY update count=$num";
		$db->execute($sql);
	}
	
?>