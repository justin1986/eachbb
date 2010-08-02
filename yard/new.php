<?php
include("../frame.php");
$a =1;
$db = get_db();
$change="update eachbb_member.daily set content='$a' where id=4";
$db->execute($change);
?>