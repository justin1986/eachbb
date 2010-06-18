<?php
	$del_class = $result ? "del_exists" : "del_new";
	if(!function_exists('rand_str')){
		include_once dirname(__FILE__) .'/../../lib/pubfun.php';
	} 
	$rand_name = rand_str(20);
?>
<tr class="tr4 tr_result">
	<td align="center" width="100">测试结果</td>
	<td align="left">
		<b>分值</b>：<input type="text" name="result[min][]" value="<?php echo $result->min_score?>" style="float:none;width:50px;"/> 
			- 
			<input type="text" name="result[max][]" value="<?php echo $result->max_score?>" style="float:none;width:50px;"/>
			<img src="/images/admin/btn_delete.png" class="<?php echo $del_class;?>" style="cursor:pointer;" /><br/>
			<textarea rows="3" name="result[description][]" style="float:none;width:500px;"><?php echo $result->description;?></textarea><br/>
			<b>妈妈助手推荐</b>: <img src="/images/admin/btn_add.png" style="cursor:pointer;" id="add_assister" />
			<ul>
				<li><?php include '_recommand.php'?></li>
				<li>2</li>
				<li>3</li>
			</ul>
			<b>课程推荐</b>: <img src="/images/admin/btn_add.png" style="cursor:pointer;" id="add_course" />
			<ul>
				<li>1</li>
				<li>2</li>
				<li>3</li>
			</ul>
			<input type="hidden" name="result[rand_name][] value="<?php echo $rand_name;?>" />
			<input type="hidden" name="result[changed][]" class="hidden_changed" value="0" />
			<input type="hidden" name="result[id][]" value="<?php echo $result->id?>"/>	
	</td>
</tr>