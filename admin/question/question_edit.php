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
		js_include_tag('admin/question/question_edit');
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
			<td width="85%" align="left">
				<input type="text" name="question[title]" value="<?php echo $question->title;?>" class="required">
				<img src="/images/admin/btn_add.png" style="cursor:pointer;" id="add_question_item" />
			</td>
		</tr>
		<?php 
		!$records && $records = array();
		foreach($records as $question_item){
			include '_question_item.php';
		}?>
		<tr class=btools>
			<td colspan="2">
				<input id="submit" type="submit" value="发布题目">
				<input type="hidden" id="hidden_questioin_id" name="id" value="<?php echo $id;?>">
				<input type="hidden" id="hidden_pid" name="pid" value="<?php echo $pid;?>">
			</td>
		</tr>	
	</table>
</div>
</form>
</body>
</html>
