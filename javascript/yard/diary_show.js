$(function(){
	var result=$('#edit_id').val();
	var ry_id=$("#ry_id").attr("value");
	$.post("_diary_show_post.php",{"edit_id":result,"ry_id":ry_id},function(data){
		$("#show_title").html(data);
	});
	$('.show_result_banner a img').live("hover",function(){
		
		if($(this).attr('src') == '/images/yetrb/xx.jpg')
			$(this).attr('src','/images/yetrb/x.jpg');
		else
			$(this).attr('src','/images/yetrb/xx.jpg');
	});
	$('.show_result_banner a img').live("click",function(e){
		e.preventDefault();
		var select=$('.show_result_banner a img').index($(this));
		var result=$("#comment_"+select).attr("value");
		$.post("_diary_show_delete_ajax.post.php",{"resoured":result},function(data){
			alert(data);
			var result=$('#edit_id').val();
			$.post("_diary_show_post.php",{"edit_id":result},function(data){
				$("#show_title").html(data);
			});
		});
	});
	$('#subb').live("click",function(){
		var resource_id=$('#resource_id').val();
		var show_result=$('#show_result').val();
		$.post("_diary_show_addcomment_ajax_post.php",{"resource_id":resource_id,"show_result":show_result},function(data){
			alert(data);
			$('#subb').attr('disabled',true);
			$.post("_diary_show_post.php",{"edit_id":result,"ry_id":ry_id},function(data){
				$("#show_title").html(data);
				$('#subb').attr('disabled',false);
			});
		});
	});
});
