<?php
include "../../frame.php";
$db = get_db();
$items = $db->query("select a.id,a.author, a.publisher,b.id as uid,b.nick_name  from eb_news a left join eb_user b on a.author = b.nick_name");
$len = count($items);
for($i=$len-1;$i>=0; $i--){
	if ($items[$i]->uid && $items[$i]->publisher != $items[$i]->uid){
		$db->execute("update eb_news set publisher = {$items[$i]->uid} where id={$items[$i]->id}");
	}elseif(!$items[$i]->author && $items[$i]->nick_name){
		$db->execute("update eb_news set author = {$items[$i]->nick_name} where id={$items[$i]->id}");
	}
	
}?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
</head>
<body>
	执行完成
</body>
</html>	