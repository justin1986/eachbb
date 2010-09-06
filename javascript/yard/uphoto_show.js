$(function(){
	var result = $('#result_id').val();
	var album_id = $('#album_id').val();
	if(result.length <= 0){
		alert("操作有误！");
		window.location.href = "/yard";
	}else{
		var number=0;
		$.post("_photo_show_ajax_post.php",{"id":result,'number':number,'album_id':album_id},function(data){
			$("#pic_log").html(data);
		});
	}
	$('#btn_b_save').live('click',function(e){
		e.preventDefault();
		var title=$('#upload_title').val().trim();
		var id=$('#id').val();
		var content=$('#upload_description').val().trim();
		var album_id = $('#_id').val();
		var photo = $('#photo').val();
		if(!title){
			alert("请输入图片名称！");
		}else if(title.length >= 30){
			alert("图片名称必须小于30字！");
		}else if(!content){
			alert("请输入图片表述！");
		}else if(content.length >=500){
			alert("输入的图片描述必须小于500字！");
		}else{
			$.post("_photo_update_ajax_post.php",{"id":id,'title':title,'content':content,'album_id':album_id,'photo':photo},function(data){
				alert(data);
				$.post("_photo_show_ajax_post.php",{"id":result,'number':number},function(data){
					$("#pic_log").html(data);
				});
			});
		}
	});
	$('#btn_b_res').live('click',function(e){
		e.preventDefault();
		$.post("_photo_show_ajax_post.php",{"id":result,'number':number},function(data){
			$("#pic_log").html(data);
		});
	});
	$('#update_img').live('click',function(e){
		e.preventDefault();
		var result=$('#resos_id').val();
		$.post("_photo_update.ajax.post.php",{"id":result},function(data){
			$("#pic_log").html(data);
		});
	});
	$('#btn_update').live('click',function(e){
		e.preventDefault();
		var result=$('#select_id select').attr("value");
		var resos_id=$('#resos_id').val();
		var photo=$('#photo').val();
		$.post("_diary_photo_update_ajax_post.php",{"result":result,'resos_id':resos_id,'photo':photo},function(data){
			alert(data);
			window.location.href='/yard/photo_show.php?id='+result;
		});
	});
	$('#yidong').live('click',function(e){
		e.preventDefault();
		$('#select_id').css('display','inline');
		$('#yidong').css('display','none');
	});
	$('#e_delete').live('click',function(e){
		e.preventDefault();
		var resos_id=$('#resos_id').val();
		if(confirm("请确定要删除吗？")){
			$.post('_photo_show_delete_ajax_post.php',{'resos_id':resos_id},function(data){
				alert(data);
				$.post("_photo_show_ajax_post.php",{"id":result,'number':number},function(data){
					$("#pic_log").html(data);
				});
			});
		}
	});
	
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
		if(confirm("您确认要删除吗？")){
			$.post("_diary_show_delete_ajax.post.php",{"resoured":resultt},function(data){
				alert(data);
				$.post("_photo_show_ajax_post.php",{"id":result,'number':number},function(data){
					$("#pic_log").html(data);
				});
			});
		}
	});
	$('#subb').live("click",function(){
		var resource_id = $('#resos_id').val();
		var show_result = $('#show_result').val();
		var number = $('#number').val();
		var photo = $('#photo').val();
		if(show_result.length <=0){
			alert("请输入评论内容！");
		}else if(show_result.length >= 500){
			alert("输入的评论内容不能超过500字！");
		}else{ 
			$('#subb').attr('disabled',true);
			$.post("_photo_show_add_comment_post.php",{"resource_id":resource_id,"show_result":show_result,"photo":photo},function(data){
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
