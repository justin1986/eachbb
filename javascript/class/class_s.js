$(function(){
	var image_tab_index = 0;
	var image_tab_count = 4;
	var iamge_tab_interval = 5000;
	var result= 0;
	function image_interval(){
		 image_tab_index++;
		 if(image_tab_index >= image_tab_count) image_tab_index = 0;
		 refresh_image_tab();
	}
	function refresh_image_tab(){
		$('.num').css('background','#000000');
		$('.banner').hide();
		$("#middle_image_"+image_tab_index+"_"+result).show();
		$("#middle_image_"+image_tab_index+"_"+result).parent().parent().find('.num:eq(' + image_tab_index +')').css('background','red');
	}
	$('#crr_zz_0').show();
	var  interval =setInterval(image_interval,iamge_tab_interval);
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
		image_tab_index=0;
		result=selected;
		refresh_image_tab();
		$(this).attr('style','color:#ffffff;');
		$('.crc_pg').hide();
		$('#crr_zz_'+selected).show();
	},function(){});
	$('.num').click(function(e){
		e.preventDefault();
		var container = $(this).parent().find('.num');
		$(this).parent().find('.num').css('background','#000000');
		var selected=container.index($(this));
		clearInterval(interval);
		 image_tab_index = selected;
		 refresh_image_tab();
		 interval =setInterval(image_interval,iamge_tab_interval);
		$(this).css('background','#CE0609');
		$(this).parent().parent().find('.banner').hide();
		//alert($(this).parent().parent().find('.banner').length);
		$(this).parent().parent().find('.banner:eq(' + selected +')').show();
	},function(){});
});
