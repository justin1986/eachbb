<?php
	$del_class = $question_item ? "del_exists" : "del_new";
	//ajax 添加一个
	$_POST['pid'] && $pid = $_POST['pid'];
?>
<tr class="tr4 question_item" >
	<td align="center">问题选项</td>
	<td align="left">
		选项：<input type="text" name="question_item[name][]" value="<?php echo $question_item->name?>" style="float:none;"/>
		分值：<input type="text" name="question_item[attribute][]" value="<?php echo $question_item->attribute;?>" style="float:none; width:50px;">
		<img src="/images/admin/btn_delete.png" class="<?php echo $del_class;?>" style="cursor:pointer;" /><br/>
		<textarea rows="3" name="question_item[display][]" style="float:none;width:500px;"><?php echo $question_item->display;?></textarea>
		<input type="hidden" name="question_item[changed][]" class="hidden_changed" value="0" />
		<input type="hidden" name="question_item[pid][]" value="<?php echo $pid?>"/>
		<input type="hidden" name="question_item[id][]" value="<?php echo $question_item->id?>"/>	
　	</td>
</tr>
