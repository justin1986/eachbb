$(function(){
	var result = $('#result_id').val();
	if(result.length <= 0){
		alert("操作有误！");
		window.location.href = "/yard";
	}else{
		var number=0;
		$.post("_photo_show_ajax_post.php",{"id":result,'number':number},function(data){
			$("#pic_log").html(data);
		});
	}
	$('#prev').live("click",function(e){
		e.preventDefault();
		var number = $('#number').val();
		var nb = $('#nb').val();
		if(number <= 0){
			alert("对不起已经是第一张！");
		}else{
			$.post("_photo_show_ajax_post.php",{"id":result,'number':--number},function(data){
				$("#pic_log").html(data);
			});
		}
	});
	$('#next').live("click",function(e){
		e.preventDefault();
		var number = $('#number').val();
		var nb = $('#nb').val();
		if(number >= (nb-1)){
			alert("对不起已经是最后一张！");
		}else{
			$.post("_photo_show_ajax_post.php",{"id":result,'number':++number},function(data){
				$("#pic_log").html(data);
			});
		}
	});
	$('.show_result_banner a img').live("hover",function(){
		
		if($(this).attr('src') == '/images/yetrb/xx.jpg')
			$(this).attr('src','/images/yetrb/x.jpg');
		else
			$(this).attr('src','/images/yetrb/xx.jpg');
	});
	$('.show_result_banner a img').live("click",function(e){
		e.preventDefault();
		var resource_id = $('#resos_id').val();
		var select = $('.show_result_banner a img').index($(this));
		var number = $('#number').val();
		var resultt = $("#comment_"+select).attr("value");
		$.post("_diary_show_delete_ajax.post.php",{"resoured":resultt},function(data){
			alert(data);
			$.post("_photo_show_ajax_post.php",{"id":result,'number':number},function(data){
				$("#pic_log").html(data);
			});
		});
	});
	$('#subb').live("click",function(){
		var resource_id = $('#resos_id').val();
		var show_result = $('#show_result').val();
		var number = $('#number').val();
		if(show_result.length <=0){
			alert("请输入评论内容！");
		}else if(show_result.length >= 500){
			alert("输入的评论内容不能超过500字！");
		}else{ 
			$('#subb').attr('disabled',true);
			$.post("_photo_show_add_comment_post.php",{"resource_id":resource_id,"show_result":show_result},function(data){
				alert(data);
				$.post("_photo_show_ajax_post.php",{"id":result,'number':number},function(data){
					$("#pic_log").html(data);
				});
				$('#subb').attr('disabled',false);
			});
		}
	});
	$('#no_subb').live("click",function(){
		window.back();
	});
});