$(function(){
	$('.pichr_menu').click(function(){
		var selected=$('.pichr_menu').index($(this));
		if(selected === 1){
			var sel=$('.def img').attr('src');
			if($('.def img').attr('src') != ""){
				$.getScript('/yard/_yard_info_ajax_post.php?photo=' + sel,function(result){
					$("#pic_left").attr('src',result);
				});
			}else{
				alert('请选择一张图片！');
			}
		}
	});
	$('#pic_hr_pg div').click(function(){
		var selected=$('#pic_hr_pg div').index($(this));
		$('#pic_hr_pg div').attr("class","no");
		$('#pic_hr_pg div').attr("style","background:url(/images/yard_info_img/pg.jpg) no-repeat;");
		$('#pic_0').attr("style",'margin-left:0px;');
		if(selected === 0)
		$('#pic_'+selected).attr("style","margin-left:0px; background:url(/images/yard_info_img/pg2.jpg) no-repeat;");
		else
		$('#pic_'+selected).attr("style","background:url(/images/yard_info_img/pg2.jpg) no-repeat;");
		$(this).attr("class","def");
	});
});
