$(function(){
	$('#login_l').click(function(e){
		e.preventDefault();
		$.post('/login/ajax.post.php?op=login&name='+ encodeURI($('#login_name').val()) + '&password=' +encodeURI($('#login_password').val()),function(data){
			$('#test_right').load('/login/ajax.post.php?op=load_login_status_box');
		});
	});
});