$(function(){
	$('.c_ch_w').click(function(){
		var selected=$('.c_ch_w').index($(this));
		$('.c_ch_w').attr('style','background:none;');
		$(this).attr('style','border:0px solid red; background:url(/images/yard/m_pg.jpg) no-repeat;');
//		if(selected == 3)
//		{
//			$.post('_diary_ajax.php',function(data){
//				$('#diary_list').html(data);
//			});
//		}
	});
	$('.menu_pic').click(function(){
		var selected=$('.menu_pic').index($(this));
		$('#menu_a').attr('style','background:url(../images/yard/m_a.jpg) no-repeat;');
		$('#menu_b').attr('style','background:url(../images/yard/m_b.jpg) no-repeat;');
		$('#menu_c').attr('style','background:url(../images/yard/m_c.jpg) no-repeat;');
		$('#menu_d').attr('style','background:url(../images/yard/m_d.jpg) no-repeat;');
		$('#menu_e').attr('style','background:url(../images/yard/m_e.jpg) no-repeat;');
		$('#menu_f').attr('style','background:url(../images/yard/m_f.jpg) no-repeat;');
		if(selected === 0){
			window.location.href="/yard";
		}else if(selected === 1){
			window.location.href="/yard/member.php";
		}else if(selected === 2){
			window.location.href="/yard/diary_list.php";
		}else if(selected === 3){
			window.location.href="/yard/album_list.php";
		}
		$(this).attr('style','background:url(../images/yard/m_'+selected+'.jpg) no-repeat;');
	});
	$('.cll_zz').click(function(){
		var selected=$('.cll_zz').index($(this));
		$('.cll_zz').attr('style','background:none;');
		$(this).attr('style','background:#ffffff;');
	});
	$('#c_moblie').click(function(e){
		e.preventDefault();
		var pho_r=$('#pho_r').val();
		if(pho_r.length >=500){
			alert("你的内容太多了！");
		}else{
		$('#xxx').submit();
		}
	});
	$('.friend').click(function(){
		var selected = $('.friend').index(this);
		if(selected != 0){selected2 = 0;}else{selected2 = 1;}
		$('#friend_l'+selected).find('img').attr('src','/images/yard/friend_l1.jpg');
		$('#friend_r'+selected).find('img').attr('src','/images/yard/friend_r1.jpg');
		$('#friend_l'+selected2).find('img').attr('src','/images/yard/friend_l0.jpg');
		$('#friend_r'+selected2).find('img').attr('src','/images/yard/friend_r0.jpg');
		$('#friend_word'+selected2).css({'background':'url("/images/yard/friend_bj.jpg") repeat-x','color':'#4e714f'});
		$('#friend_word'+selected).css({'background':'#BFDEC1','color':'#6ebd71'});
		$('#pic_'+selected).show();
		$('#pic_'+selected2).hide();
	});
	
});
