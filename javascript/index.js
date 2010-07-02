$(function(){
	$('#login_l').click(function(e){
		e.preventDefault();
		$.post('/login/ajax.post.php?op=login&name='+ encodeURI($('#login_name').val()) + '&password=' +encodeURI($('#login_password').val()),function(data){
			$('#test_right').load('/login/ajax.post.php?op=load_login_status_box');
		});
	});
	
	$('img.course_tab').hover(function(){
		var selected = $('img.course_tab').index($(this));
		for(var i=0;i<3;i++){
			if(i==selected){
				continue;
			}
			$('img.course_tab:eq('+i+')').attr('src','/images/index/course_tab_'+i+'.jpg');
		}
		$(this).attr('src','/images/index/course_tab_'+selected+'_sel.jpg');
		$('.course_list').hide();
		$('#course_list_' + selected).show();
	},function(){});
});