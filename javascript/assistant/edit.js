function generat_copy_tr(index){
	var result = '<tr class="tr4 copy_tr"><td class="td1">复制到分类</td>';
	result = result + '<td><span id="span_category_'+index + '"></span></td></tr>';
	return result;
}
$(function(){
	$('#a_copy').click(function(e){
		e.preventDefault();
		var index = 1;
		$('#tr_category').after(generat_copy_tr(index));
		category.display_select('category_copy',$('#span_category_'+index),<?php echo $category_id;?>,'');
	});
});
