$(function(){
	$('.cr_num').hover(function(e){
		e.preventDefault();
		var selected = $('.cr_num').index($(this));
		for(var i = 0 ; i < 4 ; i++){
			if(i==selected){
				continue;
			}
			$('.cr_num').attr('style','background:url(/images/test/r_nb.jpg) no-repeat;');
		}
		$(this).attr('style',' background:url(/images/test/r_na.jpg) no-repeat;');
		$('.crf_c').hide();
		$('#cr_'+selected).show();
	},function(){});
	$('.crb_cc').hover(function(e){
		e.preventDefault();
		var selected=$('.crb_cc').index($(this));
		for(var i = 0; i <  5; i++){
			if(i==selected){
				continue;
			}
			$('.crb_cc').attr('style','width:79px;');
		}
		$('#crb_5').attr('style','width:149px;');
		if(selected==4){
			$('#crb_5').attr('style','width:149px; color:#43A0D6; border-bottom:1px solid #ffffff;');
		}else{
			$(this).attr('style','width:79px; color:#43A0D6; border-bottom:1px solid #ffffff;');
		}
		$('.crb_c').hide();
		$('#crbc_'+selected).show();
	},function(){});
	
});
