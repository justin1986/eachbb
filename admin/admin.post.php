<?php
include('../frame.php');
$db=get_db();
if ($_POST["type"]=="tgcan")
{
	$StrSql='update fb_tg set isadopt=0 where id='.$_POST['id']; 
	$Record = $db->execute($StrSql);
	echo "OK";
}
if ($_POST["type"]=="tgpub")
{

	$StrSql='update fb_tg set isadopt=1 where id='.$_POST['id']; 
	$Record = $db->execute($StrSql);
	echo "OK";

}
if ($_POST["type"]=="tgdel")
{
	$StrSql='delete from fb_tg where id='.$_POST['id'];
	$Record = $db->execute($StrSql);
	echo "OK";
}
if ($_POST["type"]=="deltg")
{

	$strsql='delete from fb_tg_signup where id='.$_POST['id']; 
	$Record = $db->execute($strsql);
	echo "OK";
}
if ($_POST["type"]=="shopdel")
{
	$StrSql='delete from fb_shop where id='.$_POST["id"];
	$Record = $db->execute($StrSql);
	$StrSql='delete from fb_shop_signup where tg_id='.$_POST["id"]; 
	$Record = $db->execute($StrSql);
	$StrSql='delete from fb_comment where resource_id='.$_POST["id"].' and resource_type="shop"'; 
	$Record = $db->execute($StrSql);
	echo "OK";
}

if ($_POST["type"]=="shopcan")
{
	$StrSql='update fb_shop set isadopt=0 where id='.$_POST['id']; 
	$Record = $db->execute($StrSql);
	echo "OK";
}
if ($_POST["type"]=="shoppub")
{

	$StrSql='update fb_shop set isadopt=1 where id='.$_POST['id']; 
	$Record = $db->execute($StrSql);
	echo "OK";

}
if($_POST["type"]=="addleaderuser")
{
	$userid=$db->query('select id from fb_user_real where loginname="'.$_POST['userid'].'"');
	$StrSql='insert into fb_leader_role(user_id,rights,createtime) value ('.$userid[0]->id.',"'.$_POST['right'].'",now())'; 
	$Record = $db->execute($StrSql);
	echo "OK";
}
if($_POST["type"]=="delleaderuser")
{
	$StrSql='delete from fb_leader_role where id='.$_POST['id']; 
	$Record = $db->execute($StrSql);
	echo "OK";
}
if($_POST['type']=='del_new'){
	
}
?>
