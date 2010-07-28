$(function(){
	var image_tab_index = 0;
	var image_tab_count = 5;
	var iamge_tab_interval = 5000;
	function image_interval(){
		 image_tab_index++;
		 if(image_tab_index >= image_tab_count) image_tab_index = 0;
		 refresh_image_tab();
	}
	function refresh_image_tab(){
	 	$('.fr_img').hide();
	 	$('#img_tab_'+image_tab_index).show();
	 	$('.num').attr('style','background:#234c2a');
		$('#num'+image_tab_index).attr('style','background:#FF6600');
	}
	$('.fr_number .num').click(function(){
		 $('#fr_number .num').attr('style','background:#234c2a');
		 $(this).attr('style','background:#FF6600');
		 clearInterval(interval);
		 var num = $(this).html();
		 image_tab_index = num -1;
		 refresh_image_tab();
		 interval =setInterval(image_interval,iamge_tab_interval);
	});
	var  interval =setInterval(image_interval,iamge_tab_interval);

});