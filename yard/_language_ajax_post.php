<?php
	include_once('../frame.php');
	css_include_tag('diary_list');
	$user = User::current_user();
	if(!$user){
	alert("请您先登录！");?>
	<script>window.location.href="/login/";</script>
	<?php 
	}
?>
<div class=r_title id="r_log"><a href="/yard/home.php?id=<?php echo $user->id;?>"><?php echo $user->name;?></a>的动态列表</div>
<div id="r_log_hr">
	<div>动态列表</div>
	<button id="r_log_hr_button" style="padding-left:10px; padding-right:10px; float:right;">发表</button>
</div>
<div class="diary_banner">
		<div class="diary_title_banner">
			<div class="diary_title_pg">
				<div class="diary_title"><a href="/yard/diary_show.php?edit=<?php echo $diary->id; if($id)echo "&id=$id";?>"><?php echo htmlspecialchars_decode($diary->title);?></a></div>
				<div class="diary">
				<?php if(!$id){?>
				<div class="diary_delete"><a href="/yard/_diary_delete_post.php?edit=<?php echo $diary->id;?>">删除</a></div>
				<div class="diary_edit"><a href="/yard/diary.php?edit=<?php echo $diary->id;?>">编辑</a></div>
				<?php }?>
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