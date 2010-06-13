$(function(){
	$('.a_edit_question').live('click',function(e){
		e.preventDefault();
		parent.$.fn.colorbox({
			href:$(this).attr('href')
		});
	});
});