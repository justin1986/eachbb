<?php
	require_once('../../frame.php');
	$project_id = $_REQUEST['id'];
	$project_type = $_REQUEST['type'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>SMG</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		validate_form("question_add");
	?>
</head>
<body style="background:#E1F0F7">
	<form id="question_add"  action="question.post.php" method="post"> 
	<table width="795" border="0" style="font-size:12px;">
		<tr class="tr2">
			<td colspan="2" width="795">　　添加题目</td>
		</tr>
		<tr class="tr3">
			<td width="100">题　目</td>
			<td align="left"><input type="text" name="question[title]" class="required"></td>
		</tr>
		<?php if($project_type=='judge'){?>
		<tr class="tr3">
			<td>是非题选择</td>
			<td align="left">
				　<select name="item[attribute]">
					<option value="1">对</option>
					<option value="0">错</option> 
				</select>
			</td>
		</tr>
		<tr class="tr3">
			<td>说明(选填)</td>
			<td align="left"><input type="text" name="item[name]">正确的说法是
			</td>
		</tr>
		<input type="hidden" name="item_num" value="1">
		<?php 
			}else{	
				for($i=1;$i<=2;$i++){
		?>
		<tr class="tr3" >
			<td>答案选项</td>
			<td align="left">
			<input type="text" name="item<?php echo $i;?>[name]" class="required"><input class="checkbox" type="checkbox" name="check<?php echo $i;?>">
			<?php if($i==1){?>
			<button type="button"  id="add_item">继续添加</button>
			<?php }?>
		　	</td>
		</tr>
		<?php
				}
		?>
		<input type="hidden" name="item_num" id="num" value="2">
		<?php
			}
		?>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><button type="button" id="sub">发布题目</button></td>
		</tr>	
		<input type="hidden" name="question[problem_id]" value="<?php echo $project_id;?>">
		<input type="hidden" name="question[create_time]" value="<?php echo date("y-m-d");?>">
	</table>
	</form>
</body>
</html>

<script>
	$(function(){
		var flag = false;
		var num = 2;
		$("#add_item").click(function(){
			num++;
			$(this).parent().parent().next().after('<tr class="tr3" ><td>答案选项</td><td align="left"><input type="text" name="item'+num+'[name]" class="required"><input type="checkbox" class="check" name="check'+num+'"><a class="del_item" id='+num+' style="cursor:pointer;">删除</a></td></tr>');
			$("#num").attr('value',num);
			$(".del_item").click(function(){
				$(this).parent().parent().remove();
				num--;
				$("#num").attr('value',num);
			});
		});
		
		$("#sub").click(function(){
			$("input[type=checkbox]").each(function(){
				if($(this).attr('checked'))flag=$(this).attr('checked');
			});
			
			if(!flag){
				alert('请至少选择一个正确答案！');
				return false;
			}
			$("#question_add").submit();
		});
	});	
</script>