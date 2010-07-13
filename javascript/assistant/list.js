$(function(){
	$("#btn_button").click(function(){
		var value=$('#que_text').val();
		if(value.length<=0){
			alert('输入有误！');
		}else{
			$.post('/assistant/post_question_list.ajax.php',{"value":value},function(login){
				if('no_login'==login){
					alert("对不起！请登陆后在提交问题！");
					window.location="../login/index.php";
				}
			});
		}
	});
});