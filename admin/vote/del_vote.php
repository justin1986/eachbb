<?php
   require_once "../../frame.php";
   
   $id = intval($_POST['id']);
   
   $db = get_db();
   $db->execute("delete from fb_vote where id=$id");
   $db->execute("delete from fb_vote_item where vote_id=$id");
?>