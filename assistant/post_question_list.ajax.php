<?php
		include_once('./../frame.php');
		include_once '../inc/user.class.php';
		$user = User::current_user();
		$value = htmlspecialchars_decode($_POST['value']);
		if(!$user){
			echo "no_login";
		}else{
			$db = get_db();
			$question = new table_class('eb_user_question');
			$question->user_id=$user->id;
			$question->question=$value;
			$question->created_at=now();
			$question->save();
		}
?>