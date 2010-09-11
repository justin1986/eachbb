<?php
	session_start();
	include_once('../../frame.php');
	$db = get_db();
	judge_role();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>评论管理</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('category_class','admin/pub/search','admin/news/news_list');
		$title=$_REQUEST['title'];
		$adopt = $_REQUEST['adopt'];
		$c = array();
		if($title!= ''){
			array_push($c, "title like '%".trim($title)."%'  or comment like '%".trim($title)."%'  or nick_name like '%".trim($title)."%'");
		}
		if($adopt!=''){
		array_push($c, "resource_type='$adopt'");
	}
	?>
</head>
<body>
	<div id=icaption>
	    <div id=title>评论管理</div>
		  <a href="news_edit.php" id=btn_add></a>
	</div>
	<div id=isearch>
		<input class="sau_search" name="title" type="text" value="<? echo $_REQUEST['title']?>">
		<select id=adopt name="adopt" style="width:90px" class="sau_search">
				<option value="">评论类型</option>
				<option value="news" <? if($_REQUEST['adopt']=="news"){?>selected="selected"<? }?>>新闻</option>
				<option value="assistant" <? if($_REQUEST['adopt']=="assistant"){?>selected="selected"<? }?>>助手</option>
				<option value="feedback" <? if($_REQUEST['adopt']=="feedback"){?>selected="selected"<? }?>>反馈</option>
		</select>
		<input class="sau_search" id="search_category" name ="category" type="hidden"></input>
		<input type="button" value="搜索" id="search_button">
	</div>
<div id=itable>
<table cellspacing="1">
		<tr class="itable_title">
			<td width="8%">留言人</td><td width="10%">IP</td><td width="15%">标题</td><td width="%10">类别</td><td width="25%">留言内容</td><td width="12%">留言时间</td><td width="10%">操作</td>
		</tr>
		<?php
			$comment = new table_class("eb_comment");
			$record = $comment->paginate("all",array('conditions' => implode(' and ', $c) ,'order' => 'created_at desc'),30);
			$count_record = count($record);
			//--------------------
			for($i=0;$i<$count_record;$i++){
				if($record[$i]->resource_type == news){$result = $db->query("select short_title from eb_news where id={$record[$i]->resource_id}");}
				elseif($record[$i]->resource_type == assistant){$result = $db->query("select short_title from eb_assistant where id={$record[$i]->resource_id}");}
				$result = $result[0]->short_title;
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td>
						<?php echo $record[$i]->nick_name;?>
					</td>
					<td><?php echo $record[$i]->ip;?></td>
					<td><a href="/<?php if ($record[$i]->resource_type != 'feedback'){echo $record[$i]->resource_type."/".$record[$i]->resource_type.".php?id=".$record[$i]->resource_id;}else{echo "feedback.php";}?>" target="_blank"><?php echo $result;?></a></td>		
					<td><?php echo $record[$i]->resource_type;?></td>
					<td>
						<a href="#" class="colorbox" style="color:blue;"><?php echo mb_substr($record[$i]->comment,0,50,'utf-8');?></a>
						<input type="hidden" id="hidden_comment" value="<?php echo $record[$i]->comment;?>" />
					</td>
					<td><?php echo $record[$i]->created_at;?></td>
					<td>
						<?php
							if($record[$i]->is_approve=="1"){?>
						<span style="cursor:pointer" class="unapprove" name="<?php echo $record[$i]->id;?>" title="撤销"><img src="/images/admin/btn_apply.png" border="0"></span>
						<?php }?>
						<?php	if($record[$i]->is_approve=="0"){?>
						<span style="cursor:pointer" class="approve" name="<?php echo $record[$i]->id;?>" title="发布"><img src="/images/admin/btn_unapply.png" border="0"></span>
						<?php }?>				
						<span style="cursor:pointer" class="del" name="<?php echo $record[$i]->id;?>"  title="删除"><img src="/images/admin/btn_delete.png" border="0"></span>
					</td>
				</tr>
				<?php }?>
			<tr class="btools">
				<td colspan=10>
					<button id=clear_priority>清空优先级</button>
					<button id=edit_priority>编辑优先级</button>
					<?php paginate("",null,"page",true);?>
				</td>
			</tr>
	</table>
	</div>
</body>
<script>
	$(function(){
		$('.colorbox').click(function(e){
			e.preventDefault();
			parent.$.fn.colorbox({
				html:'<div style="width:600px;height:400px;padding:5px;">' +$(this).next().val() + '</div>'
			});
		});
		$(".del").click(function(){
			if(!window.confirm("确定要删除吗"))
			{
				return false;
			}
			else{
			$.post("comment.post.php",{'db_table':'eb_comment','post_type':'del','del_id':$(this).attr('name')},function(data){
				window.location.href="/admin/comment";
				});
			}
		});
	});
</script>
</html>