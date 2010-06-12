<?php
	$del_class = $result ? "del_exists" : "del_new";
?>
<tr class="tr4 tr_result">
	<td align="center" width="100">测试结果</td>
	<td align="left">
		分值：<input type="text" name="result[min][]" value="<?php echo $result->min_score?>" style="float:none;width:50px;"/> 
			- 
			<input type="text" name="result[max][]" value="<?php echo $result->max_score?>" style="float:none;width:50px;"/>
			<img src="/images/admin/btn_delete.png" class="<?php echo $del_class;?>" style="cursor:pointer;" /><br/>
			<textarea rows="3" name="result[description][]" style="float:none;width:500px;"><?php echo $result->description;?></textarea>
			<input type="hidden" name="result[changed][]" class="hidden_changed" value="0" />
			<input type="hidden" name="result[id][]" value="<?php echo $result->id?>"/>	
	</td>
</tr>