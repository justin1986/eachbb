$(function(){
<<<<<<< HEAD:javascript/front/test.js
	initial_btn();
	alert();
=======
	var step = $('#hidden_step').val();
>>>>>>> 6b1b085e2bd879b5822696a44f316ab39fd408fe:javascript/front/test.js
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
<<<<<<< HEAD:javascript/front/test.js
		var selected = $('.radio_chice').index($(this));
		alert(selected);
		$('#hidden_step').val($('#hidden_step').val() - 2);
		$('form').submit();
=======
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
>>>>>>> 6b1b085e2bd879b5822696a44f316ab39fd408fe:javascript/front/test.js
	});
	$('li input:radio').click(function(){
		$('#btn_next').attr('disabled',false);
		$('#question_description').show();
	});
});