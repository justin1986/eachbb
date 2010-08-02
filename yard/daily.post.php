<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard','member');
		js_include_tag('yard/yard','member');
		$db = get_db();
		$user = User::current_user();
		$a = $_POST['pho_r'];
		if(!$user){
			alert("请您先登录！");
			redirect("/login/");
			exit;
		}elseif( $a == ''){
			alert("内容不能为空!");
			redirect("/yard/");}
			else{
			$sql = "insert into eachbb_member.daily (title,content,u_id,created_at,last_edit_time,comment_count,visit_count)values('','$a','$user->id',now(),now(),0,0);" ;
			if($db->execute($sql)){
				alert("发布成功！");
			}else{
				alert("发布失败！");
			}
			redirect("/yard/");
		}
?>