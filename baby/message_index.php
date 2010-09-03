<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Language" content="zh-cn">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>我的宝宝</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('baby','test_report','yard','baby_info','yard_reset_password','message');
		js_include_tag('yard/yard_info','baby/message');
		$user = User::current_user();
		$id=intval($_GET['id']);
		$result=$id;
		if(!$user){
			alert("请您先登录！");
			redirect('/login/');
			exit();
		}
		$db = get_db();
		if($id){
			$member=$db->query("SELECT name,avatar FROM eachbb_member.member where id=$id");
			if(!$member){
			die("非法操作！");
			}
		}
//		$avatars =$db->query("SELECT id,photo,status FROM eachbb_member.member_avatar where u_id=".$user->id.' order by create_at desc limit 3');
//		$avatar_count = $db->record_count;
//		$name =$user->name;
	?>
</head>
<body>
<div id="ibody">
	<?php include_once(dirname(__FILE__).'/../inc/_baby_top.php'); ?>
	<?php include_once(dirname(__FILE__).'/../baby/_inc_index_left.php'); ?>
	<div id="haha">
		<div id="right">
	     		<div ><img src="/images/avatar/point.png"></img><font size="2" style="margin-left:5px;"><b>留言</b></font><font size="2" color="red"><b>信息</b></font></div>
	     		<div class="line1" ><hr color="#A3C1CD" width=100%; size="2" /></div>
	    </div>
	    <input type="hidden" value="<?php echo $id;?>" name="message_id" id="message_id">
	    <?php if($id){?>
		<div id="message_container">
			<div class="message_stauts">
						<div class="message_title"><?php if($result) echo "给$name";?>发布留言</div></div>
						<div class="message_banner">
								<img class="message_img" style="width:50px; height:50px;" src="<?php echo $user->avatar;?>"/>
								<textarea class="message_result" style=" margin-left:20px; float:left;"></textarea>
						</div>
						<div class="message_bottom">
								<div class="message_btn">确&nbsp;&nbsp;认</div>
						</div>
			</div>
			<?php }else{
				$id=$user->id;
			}?>
			<?php 
				$list=$db->query("SELECT * FROM eachbb_member.message m where recieve_id=$id and status=0 order by created_at desc LIMIT 20");
				if($list){
				foreach ($list as $list){
				$member=$db->query("SELECT name,avatar FROM eachbb_member.member where id={$list->send_id}");
			?>
			<div class="message_stauts">
					<div class="message_title"><?php echo $member[0]->name;?>发给<?php
					if($id){
					$member=$db->query("SELECT name,avatar FROM eachbb_member.member where id={$list->recieve_id}");
						echo $member[0]->name;
					}else{					
						echo $user->name;
					}
				?> &nbsp;<font><?php echo $list->created_at;?></font>
							<?php if($id == $user->id){?>
							<div class="banner_del">
								<a href="message_delete.php?id=<?php echo $list->id;?>">删除</a>
							</div>
							<?php }?>
					</div>
					<div class="message_banner">
							<img class="message_img" src="<?php echo $list->avatar;?>"/>
							<div class="message_result"><?php echo $list->content;?></div>
					</div>
			</div>
			<?php }}else{
					echo 
					'<div class="message_banner" style="line-height:50px; font-size:20px; text-align:center;">
					对不起！留言本为空！
					</div>';
				}
				if(!$result)
				{
					$db->execute("update eachbb_member.message set status=1 where recieve_id={$user->id}");
				}
			?>
		</div>
	</div>
        <?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
</div>
</body>
</html>