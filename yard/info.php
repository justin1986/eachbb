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
		$db = get_db();
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！");?>
			<script>window.location.href="/login/";</script>
			<?php 
		}
		$id=$user->id;
		$member=$db->query("SELECT id,photo FROM eachbb_member.member_avatar m where status=0 and photo<>'".$user->avatar."' and u_id=".$user->uid);
		$img_count=$db->query("SELECT count(id) FROM eachbb_member.member_avatar m where u_id=".$user->uid);
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
					<form>
						<div id="pic_log">
							<img id="pic_left" src="<?php echo $user->avatar; ?>"/>
							<div id="pic_right">
								<div class="rig_title">上传新头像</div>
								<div class="rig_title" style="font-weight:normal; margin-top:0px; color:#333333; font-size:12px;">支持JPG、JPEG、GIF和PNG文件，最大2M。</div>
								<div class="rig_title"><input type="file" id="file_name" size="40"/> </div>
								<!-- <div class="rig_title" id="rig_sub"><a href=""><img src="/images/member/save.jpg"/></a></div> -->
							</div>
							<div id="pic_hr_title">
								<div id="pichr_title">我的图库（<font><?php echo $img_count;?></font>张）</div>
								<div class="pichr_menu">[上传头像]</div>
								<div class="pichr_menu">[选择头像]</div>
							</div>
							<div id="pic_hr_b"></div>
							<div id="pic_hr_pg">
							<?php 
								$i=0;
								for( ; $i < 5 ; $i++){?>
								<div style="<?php if($i == 0){ echo 'margin-left:0px;'; }?>">
									<img src="<?php if($member[$i]->photo != null) echo $member[$i]->photo; else echo '/images/yard_info_img/1.jpg';?>"/>
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
</html>
