<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard','member','photo_show','diary_show');
		js_include_tag('yard/yard','member','yard/uphoto_show');
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！");
			redirect('/login/');
			exit();
		}
		$id=trim($_GET['id']);
		if(!is_numeric($id)) die('invlid request!');
		$db = get_db();
		$photo=$db->query("SELECT id,u_id,u_name,photo,width,height,created_at,description FROM eachbb_member.photo p where album_id=$id order by created_at desc;");
		$number=$db->record_count;
	?>
</head>
<body>
<div id="ibody" style=" position:relative; z-index: 0;">
	<?php include_once(dirname(__FILE__).'/../inc/_yard_top.php'); ?>
	<input  type="hidden" id="result_id" value="<?php echo $id; ?>"/>
	<div id="menu">
	<form  enctype="multipart/form-data" action="/yard/upload_photo_image.post.php" method="post">
		<div id="yard_day">
			<div id="yard_day_time"><?php echo date('Y年m月d日'); ?></div>
			<div id="yard_day_ct"><?php echo get_week_day(); ?></div>
		</div>
		<div id="menu_a" class="menu_pic" style="background:url(../images/yard/m_a.jpg) no-repeat;"></div>
		<div id="menu_b" class="menu_pic"></div>
		<div id="menu_c" class="menu_pic" ></div>
		<div id="menu_d" class="menu_pic" style="background:url(../images/yard/m_3.jpg) no-repeat;"></div>
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
					<div class=r_title id="r_log"><a><?php if($member->true_name) echo $member->true_name.'的相册'; else echo '暂无信息';?></a></div>
					<div id="r_log_hr">
						<div>相册</div>
					</div>
					<div id="pic_log" style="text-align: center;"></div>
				</div>
			</div>
			<div id="cc_b">
			</div>
		</div>
		<?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
	</div>
	</form>
</div>
</body>
</html>
