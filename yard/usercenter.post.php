<?php
		include_once('../frame.php');
		$db = get_db();
		$f_id=$_POST['id'];
		$content = $_POST['b_words'];
		$length= trim($content);
		$user = User::current_user();

		if($user){
			$visitor = $user->name;
		}else{
			$visitor = 'guest';
		}
		
		if(strlen($length)<=0){
			alert("请输入有效信息！");
			redirect("/yard/usercenter2.php");}
		else{
			$sql = "insert into eachbb_member.comment (comment,user_id,resource_type,resource_id,nick_name,created_at) values ('$content','$f_id','visitorsbook',1099,'$visitor',now());" ;
			if($db->execute($sql)){
				alert("发布成功！");
			}else{
				alert("发布失败！");
			}
		}
		redirect("/yard/usercenter2.php?id=".$f_id);
		?>