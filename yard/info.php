<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard','member','yard_info');
		js_include_tag('yard/yard','member','yard/yard_info');
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！");
			redirect('/login/');
			exit();
		}
		$db = get_db();
		$avatars =$db->query("SELECT id,photo,status FROM eachbb_member.member_avatar where u_id=".$user->id.' order by create_at desc limit 6');
		$avatar_count = $db->record_count;
	?>
</head>
<body>
<div id="ibody">
	<?php include_once(dirname(__FILE__).'/../inc/_yard_top.php'); ?>
	<div id="menu">
		<div id="yard_day">
			<div id="yard_day_time"><?php echo date('Y年m月d日'); ?></div>
			<div id="yard_day_ct"><?php echo get_week_day(); ?></div>
		</div>
		<div id="menu_a" class="menu_pic"style="background:url(../images/yard/m_a.jpg) no-repeat;"></div>
		<div id="menu_b" class="menu_pic" style="background:url(../images/yard/m_1.jpg) no-repeat;"></div>
		<div id="menu_c" class="menu_pic"></div>
		<div id="menu_d" class="menu_pic"></div>
		<div id="menu_e" class="menu_pic"></div>
		<div id="menu_f" class="menu_pic"></div>
	</div>
	<div id="content">
		<div id="c_l">
			<?php include(dirname(__FILE__).'/../yard/_yard_left.php');?>
		</div>
		<div id="c_ll">
			<div id="cl_t"></div>
			<div id="cl_c"></div>
			<div id="cl_r"></div>
		</div>
		<div id="c_c">
			<div id="cc_t"></div>
			<div id="cc_c" >
				<div id="cc_pg">
					<div class=r_title id="r_log"><span><?php echo $member->true_name;?></span>的账户管理</div>
					<div id="r_log_hr">
						<div>个人资料</div>
					</div>
					<div class="c_menu_pg">
						<div style="margin-left:0px;"><a href="/yard/member.php">基本资料</a></div>
						<div id="c_menu_selected"><a href="/yard/info.php"><a href="">修改头像</a></div>
						<div><a href=""><a href="">修改密码</a></div>
					</div>
					<div class="c_menu_pg_p" ></div>
					<form  enctype="multipart/form-data" action="/yard/yard_image.post.php" method="post">
						<div id="pic_log">
							<img id="pic_left" src="<?php echo $user->avatar; ?>"/>
							<div id="pic_right">
								<div class="rig_title">上传新头像</div>
								<div class="rig_title" style="font-weight:normal; margin-top:0px; color:#333333; font-size:12px;">支持JPG、JPEG、GIF和PNG文件，最大2M。</div>
								<div class="rig_title"><input type="file" name="src" id="upfile" size="40"/> </div>
								<div class="rig_title" id="rig_sub"><input id="ssubmit" type="submit" value=""/></div> 
							</div>
							<div id="pic_hr_title">
								<div id="pichr_title">我的图库（<font><?php echo $avatar_count;?></font>张）</div>
								<div class="pichr_menu">[上传头像]</div>
								<div class="pichr_menu" id="set_avatar">[选择头像]</div>
							</div>
							<div id="pic_hr_b"></div>
							<div id="pic_hr_pg">
							<?php 
							if($avatars){
								for($i=0 ; $i < $avatar_count; $i++){
									if($avatars[$i]->status == 1){
										$current_avatar_index = $i;
									}
								}
							}
								for( $i=0; $i < 5 ; $i++){
									if($i < $avatar_count){
										$avatar_id = $avatars[$i]->id;
									}else{
										$avatar_id = "default_avatar";
									}
								?>
								<div class="avatar_container" id="<?php echo $avatar_id;?>" <?php if($i == 0){  if($current_avatar_index == $i){echo 'style="margin-left:0px; background:url(/images/yard_info_img/pg2.jpg) no-repeat;"';}else{?>style='margin-left:0px;' <?php }}?><?php if($current_avatar_index == $i){echo 'style="background:url(/images/yard_info_img/pg2.jpg) no-repeat;"';}?>>
									<img src="<?php echo  $avatars[$i]->photo ? $avatars[$i]->photo : '/images/yard_info_img/1.jpg';?>"/>
								</div>
								<?php }?>
							</div>
						</div>
						<input type="hidden" name="id" value=<?php echo $id;?>>
					</form>
				</div>
			</div>
			<div id="cc_b"></div>
		</div>
		<?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
	</div>
</div>
</body>
<script>
	$(function(){
		$('#ssubmit').click(function(){
			if($("#upfile").val()!=''){
				var upfile1 = $("#upfile").val();
				var upload_file_extension=upfile1.substring(upfile1.length-4,upfile1.length);
				if(upload_file_extension.toLowerCase()!=".png"&&upload_file_extension.toLowerCase()!=".jpg"&&upload_file_extension.toLowerCase()!=".gif"){
					alert("上传图片类型错误");
					return false;
				}
			}else{
				alert("请上传一个图片!");
				return false;
			}
		});
	});
</script>
</html>
