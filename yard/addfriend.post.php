<?php
include_once('../frame.php');
		$db = get_db();
		$user = User::current_user();
		$friend_id=$_POST['friend_id'];
		$friend_name=$_POST['friend_name'];
		if($user != ''){
			if($user->id != $friend_id){
			$db->query("select id from `eachbb_member`.friend where u_id = {$user->id} and f_id ={$friend_id}");
				if($db->record_count > 0){
					alert("请不要重复添加该好友！");
					redirect("/yard/home.php?id=$friend_id");
				}elseif($user->add_friend($friend_id)){
					$sql="insert into `eachbb_member`.lastest_news (resource_id,resource_type,u_id,created_at,u_name,u_avatar,form)values(98,'addfriend','{$user->id}',now(),'{$user->name}','{$user->avatar}','与<a href=/yard/home.php?id={$friend_id}>{$friend_name}</a>成为好友')";
					if($db->execute($sql))
					$db->execute("insert into eachbb_member.message(created_at,content,avatar,status,last_edit_at,send_id,message_type,recieve_id)values(now(),'您成功添加了{$friend_name}为好友！','{$user->avatar}',0,now(),{$user->id},0,{$user->id})");
					alert("添加成功！");
					redirect("/yard/home.php?id=$friend_id");
				}else{
					alert("添加失败！");
					redirect("/");
				}
			}else{
				alert("您不能添加自己为好友！");
				redirect("/yard/home.php?id=$friend_id");
			};
		}else{
			alert("请先登录！");
			redirect("/login/");
		}
	?>