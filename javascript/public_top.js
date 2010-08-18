$(function(){
	$.post('/login/ajax.post_top.php?op=load_login_status_box',function(data){
		if(data){
			$('#test_result').val(data);
		}
		$('#test_result').load('/login/ajax.post_top.php?op=load_login_status_box&rd=' + Math.random());
	});
	$('.exit').live('click',function(e){
		e.preventDefault();
		$.post('/login/ajax.post.php?op=logout',function(data){
			if(data){
				$('#test_result').val(data);
			}
			$('#test_result').load('/login/ajax.post_top.php?op=load_login_status_box&rd=' + Math.random());
		});
	});
	$('#me_btn').live('click',function(e){
		e.preventDefault();
		var text = encodeURI($('#me_in').val());
		if(text == '') {
			alert('请输入搜索内容！');
			$('#me_in').focus();
			return false;
		}
		window.location.href = "/news/search.php?key=" + text;
	});
});