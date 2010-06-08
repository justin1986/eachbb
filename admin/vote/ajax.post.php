<?php
	require_once "../../frame.php";
	use_jquery();
	$vote = new table_class('fb_vote');
	if($_POST['vote_id']!=''){
		$vote->find($_POST['vote_id']);
		$type = edit_sub;
	}
	if($_FILES['image']['name']!=null){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/images/';
		$img = $upload->handle('image','filter_pic');
		if($img === false){
				alert('上传文件失败 !');
				?>
				<script>
					parent.remove_tb2();
				</script>
				<?php
				die();
		}
		$vote->photo_url = "/upload/images/" .$img;
	}//如果投票上传图片，做处理
	
	$vote->update_attributes($_POST['vote'],false);
	$vote->save();
	
	$count = count($_POST['vote_item']['title']);
	$old_count = count($_POST['old_item']['title']);
	
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
			$item -> save();
		}
	}
?>

<script>
	
	if("<?php echo $type;?>"=="edit_sub"){
		parent.remove_tb2(<?php echo $vote->id;?>,'<?php echo $vote->name;?>');
	}else{
		window.parent.remove_tb(<?php echo $vote->id;?>,'<?php echo $vote->name;?>');
	}
	
</script>