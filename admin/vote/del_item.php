<?php
    require_once "../../frame.php";
   
   	$id = intval($_POST['id']);
	$db = get_db();
	
	$db->execute("delete from eb_vote_item where id=$id");
?>