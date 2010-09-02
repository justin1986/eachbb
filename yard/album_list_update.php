<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard','album_list');
		js_include_tag('yard/album_list','yard/yard');
		$user = User::current_user();
		$db = get_db();
		$id =$_GET['album_id'];
		$id =intval($id);
		if(!$user){
			alert('请您先登录！');
			redirect("/login/");
		}
	?>
</head>
<body>
<div id="ibody">
	<div id="ii_body">
	<form  enctype="multipart/form-data" action="/yard/upload_photo_image.post.php" method="post">
		<div id="upload_banner">
			<div id="upload_box">
				<div id="upload_top"><font style="margin-left:10px">创建新相册</font></div>
				<div class="upload_bannerr">
					<div class="upload_size">相册名称:</div>
					<input type="text" name="upload_title" id="upload_title"/>
				</div>
				<div class="upload_bannerr">
					<div class="upload_size">相册描述:</div>
					<textarea id="upload_description" name="upload_description"></textarea>
				</div>
				<div class="upload_bannerr">
					<div class="upload_size">相册封面:</div>
					<input type="file" name="src2" id="ulee" size="40"/>
				</div>
				<div id="upload_line"></div>
				<div id="upload_btn_banner">
					<input type="submit" id="btn_b_save" value="保存" />
					<input type="button" id="btn_b_res" value="取消"/>
				</div>
			</div>
		</div>
		</form>	
	</div>
	<?php include_once(dirname(__FILE__).'/../inc/_yard_top.php'); ?>
	<div id="menu">
		<div id="yard_day">
			<div id="yard_day_time"><?php echo date('Y年m月d日'); ?></div>
			<div id="yard_day_ct"><?php echo get_week_day(); ?></div>
		</div>
		<div id="menu_a" class="menu_pic"style="background:url(../images/yard/m_0_sel.jpg) no-repeat;"></div>
		<div id="menu_b" class="menu_pic"></div>
		<div id="menu_c" class="menu_pic"></div>
		<div id="menu_d" class="menu_pic"></div>
		<div id="menu_f" class="menu_pic" style="background:url(../images/yard/m_4.jpg) no-repeat;"></div>
	</div>
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
		<div id="myalbum">
			<div id="log_t">
				<img src="/images/yard/log_t.jpg" />
			</div>
			<div id="al_p1">
			<div id="whosealbum">
			<a href="#" style="font-weight:bold; color:#416298;"><?php echo $user->name;?></a>的相册
			</div>
			<div id = "p1_buttonbox" style="<?php if($user->id != $id){echo 'display:none;';}?>">
						<div class="p1_but">
							<div class="but_nl"></div>
							<div class="but_name" id="post_photo">上传照片</div>
							<div class="but_nr"></div>
						</div>
						<div class="p1_but" id="add_album">
							<div class="but_nl"></div>
							<div class="but_name">新建相册</div>
							<div class="but_nr"></div>
						</div>
					</div>
			</div>
			<div id="al_p2">
				<div id="al_test"></div>
				<?php 
					$info = $db->query("select id,name,front_cover,description from eachbb_member.album where id=$id");
				?>
					<form  enctype="multipart/form-data" action="/yard/_upload_photo_image.post.php" method="post">
					<div id="upload_box" style="margin-left:50px; margin-top:50px; ">
						<div id="upload_top"><font style="margin-left:10px">编辑相册</font></div>
						<div class="upload_bannerr">
							<div class="upload_size">相册名称:</div>
							<input type="text" name="upload_title" value="<?php echo $info[0]->name; ?>" id="upload_title"/>
						</div>
						<div class="upload_bannerr">
							<div class="upload_size">相册描述:</div>
							<textarea id="upload_description" name="upload_description"><?php echo $info[0]->description; ?></textarea>
						</div>
						<div class="upload_bannerr">
							<div class="upload_size">相册封面:</div>
							<input type="hidden" name="album_id" id="album_id" value="<?php echo $info[0]->id?>"/>
							<input type="hidden" name="album_value" id="album_value" value="<?php echo $info[0]->front_cover?>"/>
							<input type="file" name="src2" id="ulee"  size="40"/>
						</div>
						<div class="upload_bannerr">
							<img src="<?php echo $info[0]->front_cover;?>" style="margin-left:170px; width:100px; height:100px;" />
						</div>
						<div id="upload_line"></div>
						<div id="upload_btn_banner">
							<input type="submit" id="btn_b_save" value="保存" />
							<input type="reset"  id="btn_b_res" value="取消"/>
						</div>
					</div>
					</form>
			</div>
			<div id="cc_bottom">
				<div id="copyright"></div>
			</div>
		</div>
	</div>
	<?php include_once(dirname(__FILE__).'./../inc/bottom.php');?>
	</body>
	</html>