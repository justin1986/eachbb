$(function(){
	$('#set_avatar').click(function(){
		var sel=$('.def img');
		
		if(sel.length > 0){
			$.getScript('/yard/_yard_info_ajax_post.php?photo=' + sel,function(result){
				$("#pic_left").attr('src',result);
			});
		}else{
			alert('请选择一张图片！');
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
