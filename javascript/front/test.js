$(function(){
	var step = $('#hidden_step').val();
	$('#btn_next').click(function(){
		j= $(":radio[name='choice']").length;
		var btn_type;
		for( i = 0 ; i <= j-1; i++){
			var selected= $(":radio[name='choice']")[i].checked;
			if(selected){
				btn_type="type_one";
			}
		}
		if(btn_type){
			$('form').submit();
		}else{
			alert("请选择答案！");
		}
	});
	$('#btn_prev').click(function(){
		if(step <=1){
			alert("当前已为第一题");
		}else{
			$('#hidden_step').val($('#hidden_step').val() - 2);
			$('form').submit();
		}
		//alert(step);
		//var result=$('#btn_prev').val;

//		$('#hidden_step').val($('#hidden_step').val() - 2);
//		$('form').submit();
	});
	$('li input:radio').click(function(){
		$('#btn_next').attr('disabled',false);
		$('#question_description').show();
	});
});