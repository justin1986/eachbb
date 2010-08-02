$(function(){
	$('.c_ch_w').click(function(){
		var selected=$('.c_ch_w').index($(this));
		$('.c_ch_w').attr('style','background:none;');
		$(this).attr('style','border:0px solid red; background:url(/images/yard/m_pg.jpg) no-repeat;');
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
		$('#xxx').submit();
	});
});
