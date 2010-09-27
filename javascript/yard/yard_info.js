$(function(){
	$('#set_avatar').click(function(){
		var sel=$('.avatar_container.selected');
		if(sel.length > 0){
			var id = sel.attr('id');
			var src = sel.find('img').attr('src');
			if(id == "default_avatar"){
				alert("操作有误！");
			}else{
				var name=$('#set_avatar').attr('name');
				alert(name);
				$.post('/yard/_yard_info_ajax_post.php',{'id':id,'type':'change'},function(data){
					if(data){
						alert(data);
						window.location.href=name ? name : "/yard/info.php";
					}else{
						$('#pic_left').attr('src',src);
					}
				});
			}
		}else{
			alert('请选择一张头像！');
		}
	});
	
	$("#del_avatar").click(function(){
		var sel=$('.avatar_container.selected');
		if(sel.length > 0){
			var id = sel.attr('id');
			var src = sel.find('img').attr('src');
			if(id == "default_avatar"){
				alert("操作有误！");
			}else{
				$.post('/yard/_yard_info_ajax_post.php',{'id':id,'type':'del'},function(data){
					if(data=='used'){
						alert("不能删除正在使用的头像");
					}else if(data=='done'){
						alert("删除成功");
						window.location.href="/yard/info.php";
					}
				});
			}
		}else{
			alert('请选择一张头像！');
		}
	});
	
	$('.avatar_container').click(function(){
		$('.avatar_container').css('background','url(/images/yard_info_img/pg.jpg) no-repeat');
		$('.avatar_container').removeClass('selected');
		$(this).css('background','url(/images/yard_info_img/pg2.jpg) no-repeat')
		$(this).addClass('selected');
	});
});
