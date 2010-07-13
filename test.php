<?php
include "frame.php";
set_charset();
include 'lib/paginate.class.php';
use_jquery();
init_page_items('test');
#$page_page_count =3;
#paginate();
#set_charset('utf-8');
use_jquery();
#$news =  new table_class('eb_news');
#$news->find(1);
#$news->title;
#$news->content;
#$test = new Test();

#var_dump();
#include_once 'frame.php';
#include_once 'inc/user.class.php';
#$ret = User::register('sauger','sauger@163.com','auden');
#User::login('sauger','auden');
#User::login('sauger','auden');
/*
$user = User::current_user();
if($user){
	echo $user->name;
}else{
	echo "haven't login";
}
*/
?>
<div>
	<?php echo strip_tags($_POST['text']);?>
</div>
<form action="test.php" method="post">
	<input type="text" name="text" />
	<input type="submit" value="提交"/>
</form>