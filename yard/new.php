<?php
include("../frame.php");
$db = get_db();
$b = $db->query("select a.*,b.name FROM eachbb_member.daily a left join eachbb_member.member b on a.u_id = b.id order by last_edit_time desc");
echo $b[0]->title;
?>