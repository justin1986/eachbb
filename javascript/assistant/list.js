$(function(){
	$('#btn_print').click(function(e){
		e.preventDefault();
		window.print();
	});
	$('#a_collect').click(function(e){
		e.preventDefault();
		$.post('ajax.post.php',{'type':'collect','news_id': $('#newsid').val()},function(d){
			alert(d);
		});
	});
	$('#a_public').click(function(e){
		e.preventDefault();
		window.location="/assistant/share.php?news_id="+$('#newsid').val();
	});
	
	$("#btn_button").click(function(){
		var value=$('#que_text').val();
		if(value.length<=0){
			alert('输入有误！');
		}else{
			$("#btn_button").attr('disabled',true);
			$.post('/assistant/post_question_list.ajax.php',{"value":value},function(login){
				if('no_login'==login){
					alert("对不起！请登陆后在提交问题！");
					window.location="/login/index.php";
				}else{
					alert("提交成功！");
					$("#btn_button").attr('disabled',false);
					$('#que_text').val("");
				}
			});
		}
	});
	
});