$(function(){
	$('#' + $('#hidden_question_type').val()).addClass('selected');
	$('.a_edit_question').live('click',function(e){
		e.preventDefault();
		parent.$.fn.colorbox({
			href:$(this).attr('href')
		});
	});
	$('#btn_add').click(function(e){
		e.preventDefault();
		var url = "/admin/question/_question_edit.php?problem_id=" + $('#hidden_project_id').val() + "&question_id=0&question_type=" + $('#hidden_question_type').val();
		parent.$.fn.colorbox({
			href:url
		});
	});
	
});