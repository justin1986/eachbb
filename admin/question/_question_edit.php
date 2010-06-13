<style>
<!--
	#outter_container{width:802px; height:500px;text-align:center;}
	#content_container{width:800px; padding:5px 0px 5px 0px; margin-top:10px;}
	#headline{width:800px; border:1px dotted #cdcdcd; background:#FBFBFB; color:#0B55C4; font-size:23px;}
	#headline_2{width:800px; background:#FBFBFB; font-size:16px; margin-top:5px; margin-bottom:5px;}
	table {
		width: 800px;
		border: none;
		text-align: center;
		background: #e7e7e7;
	}
	tr{ background:#ffffff;}
	td{ font-size:14px; line-height: 20px;}
	td.title{width:30%}
	td.content{text-align: left;}
-->
</style>
<?php 
	include_once '../../frame.php';
	#js_include_tag('admin/question/question_edit');
	$problem_id = intval($_GET['problem_id']);
	$question_id = intval($_GET['question_id']);
	$item = new table_class('eb_question');
	if($question_id){
		$item->find($question_id);
		$table = new table_class('eb_question_item');
		$items = $table->find('all',array('condition'=>'question_id=' .$item->id));
	}else{
		$item->problem_id = $problem_id;
	}
	if(!$item->problem_id) die('invalid params');
	
?>
<div id="outter_container">
	<div id="headline">编辑题目</div>
	<div id="content_container">
		<table cellspacing="1">
			<tr>
				<td class="title">问题内容</td>
				<td class="content"><input type="text" name="item[title]" value="<?php echo $item->title;?>"/></td>
			</tr>
			<tr>
				<td class="title">所属版块</td>
				<td class="content">
					<select name="item[]">
						<option value='dadongzuo'>大动作</option>
						<option value='jingxidongzuo'>精细动作</option>
						<option value='yuyan'>语言</option>
						<option value='renshi'>认识</option>
						<option value='shehuihuodong'>社会活动和行为规范</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="title">问题说明</td>
				<td class="content"><textarea rows="3" cols="50"><?php echo $item->description;?></textarea> </td>
			</tr>
			<tr>
				<td colspan="2" style="font-weight: bold; text-align: left;">
					<span style="margin-left:5px;">问题选项</span><img src="/images/admin/btn_add.png" style="cursor:pointer;" id="add_question_item" />
				</td>
			</tr>	
			<?php 
				$items || $items = array();
				foreach ($items as $question_item){
					include '_question_item.php';
				}
			?>	
			<tr>
				<td colspan="2">
					<input type="hidden" name="hidden_question_id" value="<?php echo $item->id?>" />
				</td>
			</tr>
		</table>
	</div>
		
</div>
