<?php
		include_once('./../frame.php');
		include_once '../inc/user.class.php';
		$user = User::current_user();
		$value = $_POST['value'];
		if(!$user){
			echo "no_login";
		}else{
			$db = get_db();
			$question=$db->query("SELECT id,user_id,question,created_at FROM eb_user_question e where id=.$user->id.;");
			$question = new table_class('eb_user_question');
			$question->user_id=$user->id;
			$question->question->$value;
			$question->now();
			$question->save();
		}
?>