function search_news(){
	var text = encodeURI($('#input_search').val());
	if(text == '') {
		alert('请输入搜索内容！');
		$('#input_search').focus();
		return false;
	}
	window.location.href = "/news/search.php?key=" + text;
}
$(function(){
	$('#login_l').live('click',function(e){
		e.preventDefault();
		$.post('/login/ajax.post.php?op=login&name='+ encodeURI($('#login_name').val()) + '&password=' +encodeURI($('#login_password').val()),function(data){
			$('#test_right').load('/login/ajax.post.php?op=load_login_status_box');
		});
	});
	
	$('img.course_tab').hover(function(){
		var selected = $('img.course_tab').index($(this));
		for(var i = 0 ;i < 3; i++){
			if(i == selected){
				continue;
			}
			$('img.course_tab:eq('+i+')').attr('src','/images/index/course_tab_'+i+'.jpg');
		}
		$(this).attr('src','/images/index/course_tab_'+selected+'_sel.jpg');
		$('.course_list').hide();
		$('#course_list_' + selected).show();
	},function(){});
	
	$('img.student_tab').hover(function(){
		var selected = $('img.student_tab').index($(this));
		for(var i = 0 ; i < 3; i++){
			if(i == selected){
				continue;
			}
			$('img.student_tab:eq('+i+')').attr('src','/images/index/class_tab_'+i+'.jpg');
		}
		$(this).attr('src','/images/index/class_tab_'+selected+'_sel.jpg');
		$('.student_left').hide();
		$('#student_left_' + selected).show();
	},function(){});
	
	$('#dict_menu .dict_tab').hover(function(){
		var selected=$('.dict_tab').index($(this));
		for(var i = 0 ; i < 5; i++){
			if(i == selected){
				continue;
			}
			$('#dict_menu .dict_tab').attr('style','background:url(images/index/r_hui.png) no-repeat;');
		}
		$(this).attr('style','background:url(/images/index/r_pg_f.png) no-repeat;');
		$('.desc').hide();
		$('#desc_'+selected).show();
	},function(){});
	$('.q_m_p').hover(function(){
		var selected=$('.q_m_p').index($(this));
		for(var i = 0; i < 4; i++){
			if(i == selected){
				continue;
			}
			if(i == 3){
				$('.q_m_p').attr('style',' border-top:1px solid #8DD310;');	
			}else{
				$('.q_m_p').attr('style',' border-bottom:1px solid #ffffff; border-top:1px solid #8DD310;');
			}
			
		}
		if(selected == 3){
			$(this).attr('style','background:url(/images/index/w_pg_l.gif) no-repeat; border-top:1px solid #8DD310;');
		}else{
			$(this).attr('style','background:url(/images/index/w_pg_l.gif) no-repeat; border-bottom:1px solid #ffffff; border-top:1px solid #8DD310;');
		}
		$('.q_menu_r').hide();
		$('#q_' + selected).show();
	},function(){});
	
	$('#sousuo_c,#sousuo_d').click(function(){
		search_news();
	});
	$('#input_search').keypress(function(e){
		if(e.keyCode == 13){
			search_news();
		}
	});
});