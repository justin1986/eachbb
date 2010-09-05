var test_tab_index = 0;
var test_tab_count = 5;
function refresh_test_tab(){
	if(test_tab_index < 0) test_tab_index = test_tab_count -1;
	if(test_tab_index >= test_tab_count) test_tab_index = 0;
	$('.test_tab').hide();
	$('#test_tab_'+test_tab_index).show();
} 

function search_news(){
	var text = encodeURI($('#input_search').val());
	if(text == '') {
		alert('请输入搜索内容！');
		$('#input_search').focus();
		return false;
	}
	window.location.href = "/news/search.php?key=" + text;
}

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
	$('.beijiu').click(function(e){
		e.preventDefault();
		var selected = $('.beijiu').index($(this));
		$('#flash_discription_'+selected).show();
	});
	$('.f_d_btn').click(function(){
		$('.flash_discription').hide();
	});
	$('#login_l').live('click',function(e){
		e.preventDefault();
		send_login();
	});
	
	$('#login_password').live('keypress',function(e){
		if(e.keyCode==13){
			send_login();
		}
	});
	
	$('#a_ajax_logout,#a_change_user').live('click',function(e){
		e.preventDefault();
		$.post('/login/ajax.post.php?op=logout',function(data){
			$('#test_right').load('/login/ajax.post.php?op=load_login_status_box');
		});
	});
	
	$('img.course_tab').hover(function(){
		var selected = $('img.course_tab').index($(this));
		for(var i = 0 ;i < 4; i++){
			if(i == selected){
				continue;
			}
			$('img.course_tab:eq('+i+')').attr('src','/images/index/course_tab_'+i+'.jpg');
		}
		$(this).attr('src','/images/index/course_tab_'+selected+'_sel.jpg');
		$('.course_list').hide();
		$('#course_list_' + selected).show();
	},function(){});
	$('img.student_tab').click(function(){
		var selected = $('img.student_tab').index($(this));
		if(selected == 0){
			window.location.href="/course";
		}else if(selected == 1){
			window.location.href="/assistant";
		}else if(selected == 2){
			window.location.href="bbs.php";
		}
	});
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
	
	$('#dict_menu .dict_tab').click(function(){
		var selected=$('.dict_tab').index($(this));
		for(var i = 0 ; i < 5; i++){
			if(i == selected){
				continue;
			}
			if(i == 0 || i == 1){
				$('#dict_menu .dict_tab.long').attr('style','width:125px; height:24px; background:url(images/index/r_hui_long.gif) no-repeat; color:#000000;');
			}else{
				$('#dict_menu .dict_tab.short').attr('style','width:83px; height:24px; background:url(images/index/r_f.gif) no-repeat; color:#000000;');
			}
		}
		if(selected == 0 || selected == 1){
			$(this).attr('style','background:url(/images/index/r_ffff.gif) no-repeat; color:#FF6600;');
		}else{
			$(this).attr('style','background:url(/images/index/r_ff.gif) no-repeat; color:#FF6600;');
		}
		$('.desc').hide();
		$('#desc_'+selected).show();
	});
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
		$('#q_m_p').attr('style','border-top:0px solid #8DD310;');
		if(selected == 3){
			$(this).attr('style','background:url(/images/index/w_pg_l.gif) no-repeat; border-top:1px solid #8DD310;');
		}else{
			if(selected == 0){
				$(this).attr('style','background:url(/images/index/w_pg_l.gif) no-repeat; border-bottom:1px solid #ffffff;');
			}else{
				$(this).attr('style','background:url(/images/index/w_pg_l.gif) no-repeat; border-bottom:1px solid #ffffff; border-top:1px solid #8DD310;');
			}
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
	
	$('#date_picker').datepicker({
		changeMonth: true,
		changeYear: true,
		monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dayNamesMin:["日","一","二","三","四","五","六"],
		dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dateFormat: 'yy-mm-dd',
		afterShow: function(i,e) {alert('oi');e.dpDiv.css('z-index', 2000);  }
	});
	
	//test tab
	$('#a_left_arrow').click(function(e){
		e.preventDefault();
		test_tab_index--;
		refresh_test_tab();
	});
	$('#a_right_arrow').click(function(e){
		e.preventDefault();
		test_tab_index++;
		refresh_test_tab();
	});
	
	$('#a_begin_test').click(function(e){
		e.preventDefault();
		var birth = new Date($('#date_picker').val());
		if(typeof(birth) == 'Invalid Date' || birth == "NaN"){
			alert('请输入有效的时间');
			return;
		}
		$.getScript('/test/ajax_get_test.php?birth='+$('#date_picker').val());	
	});
});