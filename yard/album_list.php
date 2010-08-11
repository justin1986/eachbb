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
		$id =$_GET['id'];
		$id =intval($id);
		if($info = $db->query("select * from eachbb_member.member where id=$id")){
		}elseif($user){
				$id=$user->id;
			}else{
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
		<div id="menu_a" class="menu_pic"style="background:url(../images/yard/m_a.jpg) no-repeat;"></div>
		<div id="menu_b" class="menu_pic"></div>
		<div id="menu_c" class="menu_pic"></div>
		<div id="menu_d" class="menu_pic" style="background:url(../images/yard/m_3.jpg) no-repeat;"></div>
		<div id="menu_e" class="menu_pic"></div>
		<div id="menu_f" class="menu_pic"></div>
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
			<?php $member=$db->query("select name from `eachbb_member`.member where id = '$id'");?>
			<div id="al_p1">
			<div id="whosealbum">
			<a href="/yard/home.php?id=<?php echo $id;?>" style="font-weight:bold; color:#416298;"><?php echo $member[0]->name;?></a>的相册
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
	  <?php $master=$db->query("select id,name,front_cover,description,created_at from `eachbb_member`.album where u_id = '$id' order by created_at desc");
			$num = $db->record_count;
		?>
			<div id="al_p2">
				<div id="al_test"></div>
			<?php if($num == 0){ ?>
				<div class="album">
				<div class="al_box">
					<div class="al_name"><a href="/">网趣宝贝</a></div>
						<div class="al_face">
							<img src="/images/yard/noface.jpg" border=0 />
						</div>
				<div class="al_words">真遗憾！这里没有任何照片可供查阅。</div>
				<div class="al_num"><font style="color:#ff0000;">0</font>张</div>
				</div>
			<?php }?>
			<?php for($i=0;$i<$num;$i++){?>
				<div class="album">
					<div class="al_box">
						<div class="al_name"><a href="/yard/photo_show.php?id=<?php echo $master[$i]->id;?>"><?php echo $master[$i]->name;?></a></div>
						<div class="al_face">
							<a href="/yard/photo_show.php?id=<?php echo $master[$i]->id;?>"><img src="
							<?php 
								if($master[$i]->front_cover != null){
									echo $master[$i]->front_cover;
								}else{
									echo '/images/yard/noface.jpg';
								}
							?>
							" border=0/></a>
						</div>
						<div class="al_time">创建日期：<?php echo mb_substr($master[$i]->created_at,0,10)?></div>
						<div class="al_words"><?php echo $master[$i]->description;?></div>
				<?php 	
						$master_id= $master[$i]->id;
						$db->query("select id from `eachbb_member`.photo where album_id = '$master_id'");
						$n = $db->record_count;
				?>
						<div class="al_num"><font style="color:#ff0000;"><?php echo $n;?></font>张</div>
					</div>
				</div>
			<?php }?>
			</div>
			<div id="cc_bottom">
				<div id="copyright">版权</div>
			</div>
		</div>
	</div>
	</div>
	</body>
	</html>