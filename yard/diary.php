<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard','member','diary');
		js_include_tag('yard/yard','member','../ckeditor/ckeditor.js','yard/diary');
		$db = get_db();
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！"); ?>
			<script>window.location.href="/login/";</script>
			<?php 
		}
		$db = get_db();
		$edit_id=trim($_GET['edit']);
		if($edit_id){
			if(!is_numeric($edit_id)) die('invlid request!');
			$diary=$db->query("SELECT d.id,d.title,d.content,s.name,d.category_id FROM eachbb_member.daily d left join eachbb_member.daily_category as s on d.category_id=s.id where d.id=$edit_id limit 4"); 
		}
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
		<div id="menu_b" class="menu_pic" style="background:url(../images/yard/m_b.jpg) no-repeat;"></div>
		<div id="menu_c" class="menu_pic" style="background:url(../images/yard/m_2.jpg) no-repeat;"></div>
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
			<form>
			<div id="cc_t"></div>
			<div id="cc_c" >
				<div id="cc_pg" style="height:640px;">
					<div class=r_title id="r_log"><span><?php echo $user->true_name;?></span>的日志管理</div>
					<div id="r_log_hr">
						<div><?php if($edit_id){echo "编辑";}else{echo "发表新";}?>日志 </div>
					</div>
					<div id="c_menu_pg_p">标题：
						<input name="text" id="diary_title" value="<?php echo htmlspecialchars_decode($diary[0]->title); ?>"/>
					</div>
					<div class="c_menu_con_title">内容：</div>
					<div id="c_menu_pg_con">
						<?php show_fckeditor('news[content]','Front',true,"215", htmlspecialchars_decode($diary[0]->content));?>
						<input type="hidden" id="category_id" value="<?php echo $diary[0]->category_id;?>"/>
						<input id="edit_id" type="hidden" value="<?php echo $edit_id;?>"/>
					</div>
					<div class="c_menu_con_title" id="diary_content" style="height:30px; margin-top:20px; line-height:26px; font-size:12px;">
					</div>
					<div class="c_menu_con_title" style="margin-top:20px;">
						<input type="button" id="sub" value="发布"/>
						<input type="reset" id="no_sub" value="取消发布" />
					</div>
				</div>
			</div>
			<div id="cc_b"></div>
			</form>
		</div>
		<?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
	</div>
</div>
</body>
</html>
