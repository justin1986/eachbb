<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard','member','diary','diary_list');
		js_include_tag('yard/yard','member','../ckeditor/ckeditor.js','yard/diary');
		$db = get_db();
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！");?>
			<script>window.location.href="/login/";</script>
			<?php 
		}
		$id=$user->id;
		$member = new table_class('eachbb_member.member');
		$member->find($id);
		$db = get_db();
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
		<div id="menu_a" class="menu_pic" style="background:url(../images/yard/m_a.jpg) no-repeat;"></div>
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
				<div id="cc_pg">
					<div class=r_title id="r_log"><span><?php echo $member->true_name;?></span>的日志管理</div>
					<div id="r_log_hr">
						<div>日志列表 </div>
					</div>
					<?php 	
						$diary_list=$db->query("SELECT d.id,d.created_at,d.last_edit_time,d.title,d.content,d.category_id,s.name FROM eachbb_member.daily d left join eachbb_member.daily_category as s on d.category_id=s.id where d.u_id={$user->id} order by last_edit_time desc limit 4;");
						if(!$diary_list){
								echo '<div style="width:768px; height:500px; margin-left:10px; text-align:center; line-height:200px; float:left; display:inline;"><a href="/yard/diary.php" style="font-size:26px; font-weight:bold; color:#8A9F9A;">您日志列表为空,马上发表日志吧！</a></div>';
						}else{
						foreach ($diary_list as $diary){
					?>
					<div class="diary_banner">
						<div class="diary_title_banner">
							<div class="diary_title_pg">
								<div class="diary_title"><a href="/yard/diary.php?edit=<?php echo $diary->id;?>"><?php echo htmlspecialchars_decode($diary->title);?></a></div>
								<div class="diary">
								<div class="diary_delete"><a href="/yard/_diary_delete_post.php?edit=<?php echo $diary->id;?>">删除</a></div>
								<div class="diary_edit"><a href="/yard/diary.php?edit=<?php echo $diary->id;?>">编辑</a></div>
								</div>
							</div>
							<div class="diary_created_at">
								<?php echo $diary->last_edit_time;?>
								&nbsp;（分类：<font><?php if($diary->name) echo $diary->name; else echo "暂无分类！";?></font>）
							</div>
						</div>
						<div class="diary_content">
						<?php echo htmlspecialchars_decode($diary->content);?>
						</div>
					</div>
					<?php $i++; }}?>
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
