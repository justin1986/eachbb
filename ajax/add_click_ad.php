<?php
include_once "../frame.php";
if(!is_ajax()) die();
$db= get_db();
$ad = $db->query("select * from forbes_ad.fb_ad where code = '{$_POST['code']}'");
if(empty($ad)) die();
insert_ad_record($ad[0],'click');