function initial_btn(){
	var step = $('#hidden_step').val();
	if(step <=1){
		$('#btn_prev').attr('disabled',true);
	}else{
		$('#btn_prev').attr('disabled',false);
	}
}
$(function(){
	initial_btn();
	alert();
	$('#btn_next').click(function(){
		$('form').submit();
	});
	$('#btn_prev').click(function(){
		var selected = $('.radio_chice').index($(this));
		alert(selected);
		$('#hidden_step').val($('#hidden_step').val() - 2);
		$('form').submit();
	});
	$('li input:radio').click(function(){
		$('#btn_next').attr('disabled',false);
		$('#question_description').show();
	});
});