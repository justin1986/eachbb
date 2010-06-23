<?php
include "../../frame.php";
$db = get_db();
$user = $db->query("select name,email from eb_yh where authenticated = 1");
$len = count($user);
for($i=0;$i<$len;$i++){
	$str .= "{$user[$i]->name},{$user[$i]->email}\n";
}

Header("Content-type: application/octet-stream"); 

Header("Accept-Ranges: bytes"); 

Header("Accept-Length: ".strlen($str)); 

Header("Content-Disposition: attachment; filename=email.csv"); 
echo $str;
