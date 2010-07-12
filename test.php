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
for($i='a';$i<'z';$i++){
	echo $i;
}
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

<div class="test" <?php show_page_pos('abc')?>>1</div>
<div class="test">2</div>
<div class="test">3</div>
<input type="file" id="file" />
<script>
	$(function(){
		$('.test').click(function(){
			alert($('#file').val()+$('#file').attr('DIR'));
		});
	});
</script>