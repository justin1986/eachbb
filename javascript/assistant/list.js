$(function(){
	$("#btn_button").click(function(){
		var value=$('#que_text').val();
		if(value.length<=0){
			alert('输入有误！');
		}else{
			$.post('/assistant/post_question_list.ajax.php',{"value":value},function(login){
				if('no_login'==login){
					window.location="../login/_logined.php";
				}
			});
		}
	});
});