<?php
		include_once('../frame.php');
		$db = get_db();
		$content = $_POST['b_words'];
		$length= trim($content);
		
		if(strlen($length)<=0){
			alert("请输入有效信息！");
			redirect("/yard/usercenter2.php/");}
		else{
			alert("OK！");
		}
		?>