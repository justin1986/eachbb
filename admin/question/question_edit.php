<?php
	session_start();
	require_once('../../frame.php');
	judge_role();
	$pid = intval($_GET['pid']);
	$id = intval($_GET['id']);
	$question = new table_class('eb_question');
	$question->find($id);
	if(empty($pid)){
		$pid = $question->problem_id;
	}
	$problem = new table_class('eb_problem');
	$problem->find($pid);
	$question_item = new table_class('eb_question_item');
	$records = $question_item->find('all',array('conditions' => 'question_id='.$id));
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php
		css_include_tag('admin');
		use_jquery();
		validate_form("question_add");
	?>
</head>
<body>
<div id=icaption>
	<div id=title>编辑题目</div>
	  <a href="question_list.php?id=<?php echo $pid;?>" id=btn_back></a>
</div>
<form id="question_add"  action="question.post.php" method="post"> 
<div id=itable>
 	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td align="center" width="15%">标题</td>
			<td width="85%" align="left"><input type="text" name="question[title]" value="<?php echo $question->title;?>" class="required"></td>
		</tr>
		<?php foreach($records as $item){?>
		<tr class="tr4" >
			<td align="center">选项-分值</td>
			<td align="left">
			<input type="text" name="old_item[]" value="<?php echo $item->name;?>">
			<input type="text" name="old_value[]" value="<?php echo $item->attribute;?>">
			<input type="hidden" name="item_id[]" value="<?php echo $item->id;?>">
			<a class="old_item" name="<?php echo $item->id;?>" style="cursor:pointer;">删除</a>
		　	</td>
		</tr>
		<?php }?>
		<tr class="tr4" >
			<td align="center">选项-分值</td>
			<td align="left">
			<input type="text" name="item[]">
			<input type="text" name="value[]">
			<button type="button"  id="add_item">继续添加</button>
		　	</td>
		</tr>
		<tr class=btools>
			<td colspan="2">
				<input id="submit" type="submit" value="发布题目">
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<input type="hidden" name="pid" value="<?php echo $pid;?>">
			</td>
		</tr>	
	</table>
</div>
</form>
</body>
</html>

<script>
	$(function(){
		var flag = false;
		
		$("#add_item").click(function(){
			$(".btools").before('<tr class="tr4" ><td align="center">选项-分值</td><td><input type="text" name="item[]"><input type="text" name="value[]"><a class="del_item" style="cursor:pointer;">删除</a></td></tr>');
		});

		$(".del_item").live('click',function(){
			$(this).parent().parent().remove();
		});
		
		
		$(".old_item").click(function(){
			$.post("question.post.php",{'del_id':$(this).attr('name'),'post_type':'del_item'})
			$(this).parent().parent().remove();
		});
	});	
</script>