<?php 
		include_once('../frame.php');
		$db = get_db();
		$user = User::current_user();
		$content = $_POST['pho_r'];
		$length= trim($content);
		if(!$user){
			alert("请您先登录！");
			redirect("/login/");
			exit;
		}elseif(strlen($length)<=0){
			alert("内容不能为空！");
			redirect("/yard/");}
		elseif(strlen($content)>500){
			alert("非法信息！");
		}
		else{
			$sql = "insert into eachbb_member.mood (content,u_id,u_name,created_at,comment_count)values('$content','{$user->id}','{$user->name}',now(),0);" ;
			$db->execute("insert into `eachbb_member`.lastest_news (resource_id,resource_type,u_id,created_at,u_name,u_avatar,form,content)values(1,'oneword','{$user->id}',now(),'{$user->name}','{$user->avatar}','说了一句话：','$content')");
			if($db->execute($sql)){
				alert("发布成功！");
			}else{
				alert("发布失败！");
			}
			redirect("/yard/");
		}
?>