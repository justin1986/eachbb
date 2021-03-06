<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard','member','diary','diary_list','diary_show');
		js_include_tag('yard/yard','member','../ckeditor/ckeditor.js','yard/diary_show');
		$id=trim($_GET["id"]);
		$edit_id=trim($_GET['edit']);
		$db = get_db();
		if($edit_id){
			if(!is_numeric($edit_id)) die('invlid request!');
		}
		if($id){
			if(!is_numeric($id))
				die('invlid request!');
			else{
				$user = new table_class('eachbb_member.member');
				$user->find($id);
				if(!$user){
					alert("非法操作！");
					alert("请您先登录！");?>
				<script>window.location.href="/login/";</script>
				<?php 
				}
			}
		}else{
			$user = User::current_user();
			if(!$user){
				alert("请您先登录！"); ?>
				<script>window.location.href="/login/";</script>
				<?php 
			}
		}
		$diary=$db->query("SELECT d.id,d.title,d.content,d.last_edit_time,s.name,d.category_id FROM eachbb_member.daily d left join eachbb_member.daily_category as s on d.category_id=s.id where d.id=$edit_id");
		if(!$diary){
				alert("非法操作！");
				alert("请您先登录！");?>
			<script>window.location.href="/login/";</script>
			<?php 
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
		<div id="menu_a" class="menu_pic" style="background:url(../images/yard/m_0_sel.jpg) no-repeat;"></div>
		<div id="menu_b" class="menu_pic"></div>
		<div id="menu_c" class="menu_pic"></div>
		<div id="menu_d" class="menu_pic" style="background:url(../images/yard/m_3.jpg) no-repeat;"></div>
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
					<div class=r_title id="r_log"><a href="/yard/home.php?id=<?php echo $user->id;?>"><?php echo $user->true_name;?></a>的日志评论</div>
					<div id="r_log_hr">
						<div><?php if($edit_id){echo "评论";}else{echo "发表新";}?>日志 </div>
					</div>
					<div class="diary_title_banner" id="diary_title_banner">
						<div class="diary_title_pg">
							<div class="diary_title"><?php echo htmlspecialchars_decode($diary[0]->title);?></div>
							<div class="diary">
							<?php if(!$id){?>
							<div class="diary_delete"><a href="/yard/_diary_delete_post.php?edit=<?php echo $diary[0]->id;?>">删除</a></div>
							<div class="diary_edit"><a href="/yard/diary.php?edit=<?php echo $diary[0]->id;?>">编辑</a></div>
							<?php }?>
							</div>
						</div>
						<div class="diary_created_at">
							<?php echo $diary[0]->last_edit_time;?>
							&nbsp;（分类：<font><?php if($diary[0]->name) echo $diary[0]->name; else echo "暂无分类！";?></font>）
						</div>
					</div>
					<div class="c_menu_con_title" style="margin-top:20px;">内容：</div>
					<div id="c_menu_pg_con">
						<?php echo  htmlspecialchars_decode($diary[0]->content);?>
						<input type="hidden" id="category_id" value="<?php echo $diary[0]->category_id;?>"/>
						<input type="hidden" id="ry_id" value="<?php echo $id;?>"/>
						<input id="edit_id" type="hidden" value="<?php echo $edit_id;?>"/>
					</div>
					<div id="show_title"></div>
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
