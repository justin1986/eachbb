$(function(){
	$('.cr_a a').hover(function(e){
		e.preventDefault();
		var selected = $('.cr_a a').index($(this));
		for(var i = 0 ; i < 4 ; i++){
			if(i == selected){
				continue;
			}
			$('.cr_a a').attr('style','color:#1A908A;');
		}
		$(this).attr('style','color:#ffffff;');
		$('.crr_z').hide();
		$('#crr_z_'+selected).show();
	},function(){});
	$('.num').hover(function(e){
		e.preventDefault();
		var selected=$('.num').index($(this));
		for(var i = 0; i < 4; i++){
			if(i == selected)
			{
				continue;
			}
			$('.num').attr('style','background:#000000;');
		}
		$(this).attr('style','background:#CE0609;');
		$('.banner').hide();
		$('#banner_'+selected).show();
	},function(){});
});
