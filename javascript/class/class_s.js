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
		$(this).parent().parent().find('.banner .crc_pg .banner:eq(0)').show();
		$('#banner_')
	},function(){});
	$('.num').click(function(e){
		e.preventDefault();
		var container = $(this).parent().find('.num');
		$(this).parent().find('.num').css('background','#000000');
		var selected=container.index($(this));
		$(this).css('background','#CE0609');
		$(this).parent().parent().find('.banner').hide();
		//alert($(this).parent().parent().find('.banner').length);
		$(this).parent().parent().find('.banner:eq(' + selected +')').show();
	},function(){});
});
