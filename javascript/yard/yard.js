$(function(){
	$('.c_ch_w').click(function(){
		var selected=$('.c_ch_w').index($(this));
		$('.c_ch_w').attr('style','background:none;');
		$(this).attr('style','background:url(/images/yard/m_pg.jpg) no-repeat;');
	});
	$('.cll_zz').click(function(){
		var selected=$('.cll_zz').index($(this));
		$('.cll_zz').attr('style','background:none;');
		$(this).attr('style','background:#ffffff;');
	});
});
