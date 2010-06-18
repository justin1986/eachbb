$(function(){
	$('#' + $('#hidden_type').val()).addClass('selected');
	
	$('#btn_add').click(function(){
		$.post('_problem_result.php',function(data){
			if($('.tr_result').length >0 ){
				$('.tr_result:last').after(data);
			}else{
				$('tr.btools').before(data);
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
		var project_id = $('#project_id').val();
		$.post('problem.ajax.post.php',{'project_id':project_id,'result_id':id,'op':'delete'},function(data){
			if(data){
				alert(data);
				return;
			}
			$(this).parent().parent().remove();
		});
		$(this).parent().parent().remove();
	});
	
	$('.tr_result input,.tr_result textarea').live('change',function(){
		$(this).parent().find('input.hidden_changed').val(1);
	});
	
	$('#submit').click(function(){
		$.post('/admin/question/problem.ajax.post.php?'+ $('form').serialize(),{'op':'edit_result'},function(data){
			if(data){
				alert(data);
				return false;
			}else{
				location.reload();
			}
		});
		return false;
	});
});
