<?php
include_once('../frame.php');
		$db = get_db();
		$user = User::current_user();
		if($user != ''){
			$friend_id=$_POST['add_friend'];
			if($user->id != $friend_id){
			$db->query("select id from `eachbb_member`.friend where u_id = {$user->id} and f_id ={$friend_id}");
				if($db->record_count > 0){
					alert("请不要重复添加该好友！");
					redirect("/yard/home.php?id=$friend_id");
				}elseif($user->add_friend($friend_id)){
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