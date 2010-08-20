<?php
		include_once('../frame.php');
		$db = get_db();
		$checkbox=$_POST['checkbox'];
		if($checkbox != 1){
			$checkbox =0;
		}
		$f_id=$_POST['id'];
		$content = $_POST['b_words'];
		$length= trim($content);
		$user = User::current_user();
		if($user){
			$visitor = $user->name;
		}else{
			$visitor = 'guest';
		}
		
		if(mb_strlen($length,'utf-8')<=0){
			alert("请输入有效信息！");
			redirect("/yard/home.php?id=".$f_id);}
		elseif(mb_strlen($content,'utf-8')>500){
			alert("你的留言太长了！");
			redirect("/yard/home.php?id=".$f_id);
		}
		else{
			$sql = "insert into eachbb_member.comment (comment,user_id,resource_type,resource_id,nick_name,created_at,whispered) values ('$content','$f_id','visitorsbook',1099,'$visitor',now(),'$checkbox');" ;
			if($db->execute($sql)){
				alert("发布成功！");
			}else{
				alert("发布失败！");
			}
		}
		redirect("/yard/home.php?id=".$f_id);
		?>