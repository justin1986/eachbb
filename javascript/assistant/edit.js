function add_keyword(keyword){
	if(keyword == ''){
		alert('请输入关键字!');
		$('#auto_keywords').focus();
		return;
	}
	var can_add = true;
	$('#sel_keywords').find('option').each(function(){
		if($(this).val() == keyword){
			alert('请不要重复添加!');
			can_add = false;
			return;
		}
	});
	if(can_add)
		$('#sel_keywords').append('<option value="' + keyword + '">' + keyword + '</option>');
}
function delete_keyword(){
	var items = $('#sel_keywords option:selected');
	if(items.length <= 0){
		alert('请选择需要删除的关键字');
		return false;
	}
	if(false === confirm('您确定要删除选中的关键字吗？')) return;
	items.each(function(){
		$(this).remove();
	});
}
function generat_copy_tr(index){
	var result = '<tr class="tr4 copy_tr"><td class="td1">复制到分类</td>';
	result = result + '<td><span id="span_category_'+index + '"></span><a class="del_copy" href="#">删除</a></td></tr>';
	return result;
}
$(function(){
	$('#a_copy').click(function(e){
		e.preventDefault();
		var index = 1;
		$('#tr_category').after(generat_copy_tr(index));
		category.display_select('category_copy',$('#span_category_'+index),-1,'');
	});
	$('#add_keyword').click(function(){
		var	keyword = $('#auto_keywords').val();
		add_keyword(keyword);
	});
	$('#delete_keyword').click(function(){
		delete_keyword();
	});
	
});
