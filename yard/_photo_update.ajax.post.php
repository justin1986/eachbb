<?php
	include_once('../frame.php');
	$user = User::current_user();
	if(!$user){
		alert("请您先登录！");
		redirect('/login/');
		exit();
	}
	$id=trim($_POST['id']);
	if(!is_numeric($id)) die('invlid request!');
	$db = get_db();
	$photo=$db->query("SELECT id,u_name,photo,u_id,title,description FROM eachbb_member.photo p where id=$id;");
?>
<div id="upload_banner" style="width:700px; margin-top:50px; margin-left:50px;">
		<div class="upload_bannerr" style="width:630px; text-align: left;">
			<div class="upload_size">图片名称:</div>
			<input type="text" name="upload_title" value="<?php echo $photo[0]->u_name;?>" style="width:400px;" id="upload_title"/>
		</div>
		<input type="hidden" id="id" value="<?php echo $photo[0]->id;?>"/>
		<div class="upload_bannerr" style="width:630px;  margin-top:10px; text-align: left;">
			<div class="upload_size">图片描述:</div>
			<textarea id="upload_description" style="width:400px; font-size:12px; line-height:20px;"  name="upload_description"><?php echo $photo[0]->description;?></textarea>
		</div>
		<div class="upload_bannerr" style="width:630px; margin-top:10px; text-align: left;">
			<img style="width:150px; height:150px; margin-left:200px;" src="<?php echo $photo[0]->photo;?>"/>
			<input id="photo" value="<?php echo $photo[0]->photo;?>" type="hidden" />
		</div>
		<div id="upload_btn_banner"  style="width:630px; margin-top:30px; padding-bottom:100px; text-align: left;">
			<input type="submit" style="margin-left:200px;" id="btn_b_save" value="修改信息" />
			<input type="button" id="btn_b_res" value="取消修改"/>
		</div>
</div>