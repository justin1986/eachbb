function send_login(){
		var expire = 0;
		if($('#login_check').val()){
			expire = 30;
		}
		$.post('/login/ajax.post.php?op=login&name='+ encodeURI($('#login_name').val()) + '&password=' +encodeURI($('#login_password').val()+'&expire='+expire),function(data){
			if(data){
				alert(data);
			}
			$('#test_right').load('/login/ajax.post.php?op=load_login_status_box&rd=' + Math.random());
			
		});
	};
$(function(){
	$('#login_l').live('click',function(e){
		e.preventDefault();
		send_login();
	});
	
	$('#login_password').live('keypress',function(e){
		if(e.keyCode==13){
			send_login();
		}
	});
	var image_tab_index = 0;
	var image_tab_count = 5;
	var iamge_tab_interval = 5000;
	function image_interval(){
		 image_tab_index++;
		 if(image_tab_index >= image_tab_count) image_tab_index = 0;
		 refresh_image_tab();
	}
	
	function refresh_image_tab(){
	 	$('.fr_img').hide();
	 	$('#img_tab_'+image_tab_index).show();
	 	$('.num').css({'background':'#234c2a','filter':'alpha(opacity=50)','-moz-opacity':'0.5','opacity':'0.5;'});
		$('#num'+image_tab_index).css({'background':'#FF6600','filter':'alpha(opacity=50)','-moz-opacity':'0.5','opacity':'0.5;'});
	}
	$('.num').click(function(){
		$('.num').css({'background':'#234c2a','filter':'alpha(opacity=50)','-moz-opacity':'0.5','opacity':'0.5;'});
		 $(this).css({'background':'#FF6600','filter':'alpha(opacity=50)','-moz-opacity':'0.5','opacity':'0.5;'});
		 clearInterval(interval);
		 var num = $(this).html();
		 image_tab_index = num -1;
		 refresh_image_tab();
		 interval =setInterval(image_interval,iamge_tab_interval);
	});
	var  interval =setInterval(image_interval,iamge_tab_interval);

});