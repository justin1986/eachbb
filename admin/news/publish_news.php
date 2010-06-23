<?php
	session_start();
	include_once('../../frame.php');
	if($_SERVER["REMOTE_ADDR"]!='127.0.0.1'){
		judge_role();
	}
	
	$db = get_db();
	$news = $db->query("select t2.id,t2.created_at,t2.content,t1.id as pid from eb_publish_schedule t1 join eb_news t2 on t1.resource_id=t2.id where t1.status=0 and t1.publish_date<=now() order by t1.publish_date asc");
	$count = $db->record_count;
	
	$pid = array();
	$nid = array();
	$error_id = array();
	for($i=0;$i<$count;$i++){
		$db->execute("update eb_news set created_at = '". now() ."' where id={$news[$i]->id}");
		$news[$i]->created_at = now();
		$result = static_news($news[$i],'page');
		if($result){
			array_push($pid,$news[$i]->pid);
			array_push($nid,$news[$i]->id);
		}else{
			array_push($error_id,$news[$i]->id);
		}
	}
	$pid = implode(',',$pid);
	$nid = implode(',',$nid);
	if($pid){
		$db->execute("delete from eb_publish_schedule where id in ($pid)");
		$db->execute("update eb_news set is_adopt=1 where id in ($nid)");
	}
	close_db();
?>