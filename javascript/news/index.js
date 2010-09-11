$(function(){
	var image_tab_index = 1;
	var image_tab_count = 6;
	var iamge_tab_interval = 5000;
	function image_interval(){
		 image_tab_index++;
		 if(image_tab_index >= image_tab_count) image_tab_index = 1;
		 refresh_image_tab();
	}
	function refresh_image_tab(){
		$('.num').css('background','#4E3431');
		$('#nn_'+image_tab_index).css('background','#FF6600');
	 	$('.pic_img').hide();
	 	$('#img_tab_'+image_tab_index).show();
	}
	$('.num').click(function(){
		$('.num').css('background','#4E3431');
		 $(this).css('background','#FF6600');
		 clearInterval(interval);
		 var num = $(this).html();
		 image_tab_index = num;
		 refresh_image_tab();
		 interval =setInterval(image_interval,iamge_tab_interval);
	});
	var  interval =setInterval(image_interval,iamge_tab_interval);
	$('.dict_tab').click(function(){
		var selected = $('.dict_tab').index($(this));
		for(var i = 0 ; i < 5; i++){
			if(i == selected){
				continue;
			}
			if(i == 0 || i == 1){
				$('.dict_tab.long').attr('style','width:136px; height:24px; background:url(/images/news/r_hui_long.gif) no-repeat; color:#000000;');
			}else{
				$('.dict_tab.short').attr('style','width:91px; height:24px; background:url(/images/news/r_f.gif) no-repeat; color:#000000;');
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
	$('img.student_tab').click(function(e){
		var selected = $('img.student_tab').index($(this));
		if(selected === 0){
			window.location.href="/course";
		}else if(selected === 1){
			window.location.href="/test";
		}else if(selected === 2){
			window.location.href='/bbs';
		}
	});
	
});
