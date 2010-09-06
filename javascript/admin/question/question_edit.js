$(function(){
	$('#add_question_item').live('click',function(){
		$.post('/admin/question/_question_item.php',{'qid':$('#hidden_question_id').val()},function(data){
			if($('.question_item').length >0 ){
				$('.question_item:last').after(data);
			}else{
				$('#add_question_item').parent().parent().after(data);
			}
		});
	});
	
	$('.del_new').live('click',function(){
		if(!confirm('删除后将无法恢复，您确认要删除么？')) return;
		$(this).parent().parent().remove();
	});
	
	$('.del_exists').live('click',function(){
		if(!confirm('删除后将无法恢复，您确认要删除么？')) return;
		var id= $(this).parent().find('input:last').val();
		var question_id = $(this).parent().find('.hidden_question_id').val();
		$.post('/admin/question/question_item.ajax.post.php',{'question_id':question_id,'question_item_id':id,'op':'delete'},function(data){
			if(data){
				alert(data);
				return;
			}
			$(this).parent().parent().remove();
		});
		$(this).parent().parent().remove();
	});
	
	$('.question_item input,.question_item textarea').live('change',function(){
		$(this).parent().find('input.hidden_changed').val(1);
	});
});