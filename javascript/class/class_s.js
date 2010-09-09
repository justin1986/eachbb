$(function(){
	$('.beiju').click(function(e){
		e.preventDefault();
		var selected = $('.beiju').index($(this));
		$.fn.colorbox({href:'/inc/_public_result_ajax_post_view.php?page=course_index&result=middle_headline_'+selected});
	});
	$('.f_d_btn').click(function(e){
		e.preventDefault();
		$('.flash_discription').hide();
	});
	$('.cr_a').click(function(e){
		e.preventDefault();
		var selected = $('.cr_a').index($(this));
		for(var i = 0 ; i < 4 ; i++){
			if(i == selected){
				continue;
			}
			$('.cr_a').attr('style','color:#1A908A;');
		}
		$(this).attr('style','color:#ffffff;');
		$('.crc_pg').hide();
		$('#crr_zz_'+selected).show();
	},function(){});
	$('.num').click(function(e){
		e.preventDefault();
		var selected=$('.num').index($(this));
		var selected = selected % 4;
		for(var i = 0; i < 4; i++){
			if(i == selected)
			{
				continue;
			}
			$('.num').attr('style','background:#000000;');
		}
		$(this).attr('style','background:#CE0609;');
		$('.banner').hide();
		alert('.banner_'+selected);
		$('.banner_'+selected).show();
	},function(){});
});
