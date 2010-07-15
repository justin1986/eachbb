$(function(){

	$('.dict_tab').hover(function(){
		var selected = $('.dict_tab').index($(this));
		var selected=$('.dict_tab').index($(this));
		for(var i = 0 ; i < 5; i++){
			if(i == selected){
				continue;
			}
			if(i == 0 || i == 1){
				$('.dict_tab.long').attr('style','width:135px; height:24px; background:url(/images/news/r_hui_long.gif) no-repeat; color:#000000;');
			}else{
				$('.dict_tab.short').attr('style','width:90px; height:24px; background:url(/images/news/r_f.gif) no-repeat; color:#000000;');
			}
		}
		if(selected == 0 || selected == 1){
			$(this).attr('style','background:url(/images/news/r_ffff.gif) no-repeat; color:#FF6600;');
		}else{
			$(this).attr('style','background:url(/images/news/r_ff.gif) no-repeat; color:#FF6600;');
		}
		$('.bct_number').attr('style','display:none;');
		$('#bn_'+selected).attr('style','display:inline;');
	},function(){});
	$('img.student_tab').hover(function(e){
		var selected=$('img.student_tab').index($(this));
		for(var i = 0; i < 3; i++){
			if(i == selected){
				continue;
			}
			$('img.student_tab:eq('+i+')').attr('src','/images/consult/'+i+'a.jpg');
		}
		$(this).attr('src','/images/consult/'+selected+'.jpg');
		$('.ba_c').attr('style','display:none;');
		$('#bac_'+selected).attr('style','display:inline;');
	},function(){});
});
