<?php
	require_once "../../frame.php";
	if("del"==$_POST['post_type'])
	{
		$id = $_POST['del_id'];
		$db = get_db();
		$db->execute("delete from fb_vote_item where vote_id=$id");
		$db->execute("delete from fb_vote where id=$id");
	}else{
		
		$vote = new table_class('fb_vote');
		if($_POST['vote_id']!=''){
			$vote->find($_POST['vote_id']);
		}else{
			$vote->created_at = now();
		}
		if($_FILES['image']['name']!=null){
			$upload = new upload_file_class();
			$upload->save_dir = '/upload/images/';
			$img = $upload->handle('image','filter_pic');
			if($img === false){
					alert('上传文件失败 !');				
					redirect($_SERVER['HTTP_REFERER']);
					die();
			}
			$vote->photo_url = "/upload/images/" .$img;
		}//如果投票上传图片，做处理
		$files = array();
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/vote/';
		if($_FILES['old_fils']){
			$result = $upload->handle('old_fils');
		}
		if($result){
			foreach($result as $k => $v){
				if($v["result"]){
					array_push($files,'/upload/vote/'.$v["name"]);
				}else{
					if($v["reason"]==1){
						alert('上传文件太大，请重新上传！');
						redirect($_SERVER['HTTP_REFERER']);
						die();
					}elseif($v["reason"]==4){
						array_push($files,$_POST['old_fils_info'][$k]);
					}
				}
			}
		}
		
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/vote/';
		$result = $upload->handle('vote_fils');
		foreach($result as $k => $v){
			if($v["result"]){
				array_push($files,'/upload/vote/'.$v["name"]);
			}else{
				if($v["reason"]==1){
					alert('上传文件太大，请重新上传！');
					redirect($_SERVER['HTTP_REFERER']);
					die();
				}
			}
		}
		if($files){
			$files = implode(',',$files);
			$vote->file_url = $files;
		}else{
			$vote->file_url = '';
		}
		
		
		
		$vote->update_attributes($_POST['vote'],false);
		if($_POST['started_at']){
			$vote->started_at = $_POST['started_at'];
		}else{
			$vote->started_at = null;
		}
		if($_POST['ended_at']){
			$vote->ended_at = $_POST['ended_at'];
		}else{
			$vote->ended_at = null;
		}
		$vote->save();
		
		
		$count = count($_POST['vote_item']['title']);
		$old_count = count($_POST['old_item']['title']);
		$vote_count = count($_POST['vote_vote']['title']);
		$old_vote_count = count($_POST['old_vote_vote']['title']);
		
		$item = new table_class("fb_vote_item");
		if($_POST['vote']['vote_type']=='image_vote'){
			$upload = new upload_file_class();
			$upload->save_dir = '/upload/images/';
			$img = $upload->handle('vote_item','filter_pic');
			$old_img = $upload->handle('old_item','filter_pic');
		}
		for($i=0;$i<$count;$i++){
			$item->id=0;
			$item->vote_id = $vote->id;
			if($_POST['vote']['vote_type']=='image_vote'){
				if($img[$i]['result']){
					$item->photo_url = "/upload/images/" .$img[$i]['name'];
				}else{
					$item->photo_url = "";
				}//投票项目图片处理
			}
			if($_POST['vote_item']['title'][$i]!=''){
				$item->title = $_POST['vote_item']['title'][$i];
				$item -> save();
			}
		}
		for($i=0;$i<$old_count;$i++){
			$item->find($_POST['old_item']['id'][$i]);
			if($_POST['vote']['vote_type']=='image_vote'){
				if($old_img[$i]['result']){
					$item->photo_url = "/upload/images/" .$old_img[$i]['name'];
				}else{
					$item->photo_url = $item->photo_url;
				}//投票项目图片处理
			}
			if($_POST['old_item']['title'][$i]!=''){
				$item->title = $_POST['old_item']['title'][$i];
				$item->save();
			}
		}
		for($i=0;$i<$vote_count;$i++){
			$item->id=0;
			$item->vote_id = $vote->id;
			$item->title = $_POST['vote_vote']['title'][$i];
			$item->sub_vote_id = $_POST['vote_vote']['id'][$i];
			$item->save();
		}
		for($i=0;$i<$old_vote_count;$i++){
			$item->find($_POST['old_vote_vote']['id'][$i]);
			$item->title = $_POST['old_vote_vote']['title'][$i];
			echo $_POST['old_vote_vote']['title'][$i];
			$item->save();
		}
		redirect('index.php');
	}
?>