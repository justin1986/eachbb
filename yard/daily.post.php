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
		elseif(strlen($length)>500){
			alert("非法信息！");
		}
		else{
			$sql = "insert into eachbb_member.daily (title,content,u_id,created_at,last_edit_time,comment_count,visit_count)values('','$content','$user->id',now(),now(),0,0);" ;
			if($db->execute($sql)){
				alert("发布成功！");
			}else{
				alert("发布失败！");
			}
			redirect("/yard/");
		}
?>