$(function(){
	var id = $('#id').val();
	$.post('lastest_news.post.php',{'type':'all',"id":id},function(data){
		$('#test').html(data);
	});
	$('.c_ch_w').click(function(){
		var selected=$('.c_ch_w').index($(this));
		$('.c_ch_w').attr('style','background:none;');
		$(this).attr('style','border:0px solid red; background:url(/images/yard/m_pg.jpg) no-repeat;');
		$('#test').html("<div style='width:540px; text-align:center; margin-top:20px;'><img src='/images/yard/loading.gif' /></div>");
		var id = $('#id').val();
		if(selected === 0)
		{	
			$.post('lastest_news.post.php',{'type':'all',"id":id},function(data){
				$('#test').html(data);
			});
		}
		else if(selected === 1)
		{
			$.post('lastest_news.post.php',{'type':'oneword',"id":id},function(data){
				$('#test').html(data);
			});
		}
		else if(selected === 2)
		{
			$.post('_lastest_image_post.php',{'type':'image',"id":id},function(data){
				$('#test').html(data);
			});
		}
		else if(selected === 3)
		{
			$.post('_lastest_news.post.php',{'type':'diary',"id":id},function(data){
				$('#test').html(data);
			});
		}else if(selected === 4)
		{
			$.post('_lastest_comment.post.php',{"id":id},function(data){
				$('#test').html(data);
			});
		}else if(selected === 5)
		{
			$.post('lastest_news.post.php',{'type':'suibian',"id":id},function(data){
				$('#test').html(data);
			});
		}
	});
	
	$('.menu_pic').click(function(){
		var selected=$('.menu_pic').index($(this));
		if(selected === 0){
			window.location.href="/yard";
		}else if(selected === 1){
			window.location.href="/yard/member.php";
		}else if(selected === 2){
			window.location.href="/yard/language_list.php";
		}else if(selected === 3){
			window.location.href="/yard/diary_list.php";
		}else if(selected === 4){
			window.location.href="/yard/album_list.php";
		}
	});
	$('.cll_zz').click(function(){
		var selected=$('.cll_zz').index($(this));
		$('.cll_zz').attr('style','background:none;');
		$(this).attr('style','background:#ffffff;');
	});
	$('#c_moblie').click(function(e){
		e.preventDefault();
		var pho_r=$('#pho_r').val();
		if(pho_r != "你正在作什么?")
		{
			if(pho_r.length >=500){
				alert("你的内容太多了！");
			}else{
			$('#xxx').submit();
			}
		}else{
			alert("请输入内容！");
		}
		
	});
	$('.friend').click(function(){
		var selected = $('.friend').index(this);
		if(selected != 0){selected2 = 0;}else{selected2 = 1;}
		$('#friend_l'+selected).find('img').attr('src','/images/yard/friend_l1.jpg');
		$('#friend_r'+selected).find('img').attr('src','/images/yard/friend_r1.jpg');
		$('#friend_l'+selected2).find('img').attr('src','/images/yard/friend_l0.jpg');
		$('#friend_r'+selected2).find('img').attr('src','/images/yard/friend_r0.jpg');
		$('#friend_word'+selected2).css({'background':'#BFDEC1','color':'#6ebd71'});
		$('#friend_word'+selected).css({'background':'url("/images/yard/friend_bj.jpg") repeat-x','color':'#4e714f'});
		$('#pic_'+selected).show();
		$('#pic_'+selected2).hide();
	});
	
	$('#pho_r').focus(function(){
		$(this).val('');
		$(this).unbind('focus');
	});
});
