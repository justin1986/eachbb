<?php
	session_start();
	include_once('../../frame.php');
	judge_role();	
	$type = $_REQUEST['type'];
	$type = empty($type) ? "news" : $type; 
	$id = $_REQUEST['id'];
	$conditions = null;
	if($type)$conditions[] = 'resource_type="'.$type.'"';
	if($id)$conditions[] = 'resource_id='.$id;
	if($_GET['s_text']){ $conditions[]='nick_name  like "%'.trim($_REQUEST['s_text']).'%"' ." or comment like '%{$_GET['s_text']}%'";}
	if($conditions!=null){
		$conditions = implode(' and ',$conditions);
		$conditions = array("conditions" => $conditions, "order" => "created_at desc");
	}else{
		$conditions = array("order" => "priority asc,created_at desc");
	}
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>网趣宝贝</title>
	<?php
		css_include_tag('admin','colorbox');
		use_jquery();
		js_include_tag('admin_pub','jquery.colorbox-min');
	?>
	<style type="text/css">
	</style>
</head>
<body>
	<div id=icaption>
	    <div id=title>评论管理</div>
	</div>
	<div id=isearch>
		<input id="s_text" type="text" value="<?php echo $_GET['s_text']?>" />
		<input type="button" value="搜索" id="search_button">
	</div>
	<div id="itable">
	<?php 
			include '_comment.php';
	?>
		<input type="hidden" id="db_table" value="eb_comment">
		<input type="hidden" id="id" value="<?php echo $record[0]->id;?>">
		<input type="hidden" id="r_id" value="<?php echo $id;?>">
	</div>
</body>
</html>
<script>
function send_search(){
	window.location.href="?s_text=" + encodeURI($('#s_text').val())+"&id="+$("#r_id").val();;
}
$(function(){
	$("#search_button").click(function(){
		send_search();
	});
	
	$("#s_text").keypress(function(event){
			if(event.keyCode==13){
				send_search();
			}
	});
	
	$('.colorbox').click(function(e){
		e.preventDefault();
		parent.$.fn.colorbox({
			html:'<div style="width:600px;height:400px;padding:5px;">' +$(this).next().val() + '</div>'
		});
	});
	
	$('.unapprove').click(function(){
		$.post('comment.post.php',{'post_type':'unapprove','id':$(this).attr('name')},function(){
			location.reload();
		});
	});
	$('.approve').click(function(){
		$.post('comment.post.php',{'post_type':'approve','id':$(this).attr('name')},function(){
			location.reload();
		});
	});
	$(".del_comment").click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else
		{
			$.post("comment.post.php",{'comment_id':$(this).attr('name'),'news_id':$("#r_id").val(),'post_type':'del'},function(data){
				$("#"+data).remove();
			});
		}
	});
});
</script>