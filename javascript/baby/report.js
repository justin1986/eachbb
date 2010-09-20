$(function(){
	var type = $('#type_test').val();
	if(type =="test"){
		$.post('_baby_view_ajax_post.php',function(data){
			$('#haha').html(data);
		});
	}
	$('.user_me_t').click(function(e){
		e.preventDefault();
		var selected = $('.user_me_t').index($(this));
		if(selected === 1){
			$.post('info.php',function(data){
				$('#haha').html(data);
			});
		}else if(selected === 2){
			location.href="index.php";
		}else if(selected ===  3){
			$.post('reset_password.php',function(data){
				$('#haha').html(data);
			});
		}else if(selected ===  8){
			$.post('_baby_ajax.post.php',function(data){
				$('#haha').html(data);
			});
		}else if(selected === 9){
			$.post('_baby_view_ajax_post.php',function(data){
				$('#haha').html(data);
			});
		}else if(selected === 10){
			$.post('_baby_view_ajax_post.php',function(data){
				$('#haha').html(data);
			});
//			$.post('_baby_record_ajax.post.php',function(data){
//				$('#haha').html(data);
//			});
		}else if(selected === 11){
			$.post('_baby_ajax.post.php',function(data){
				$('#haha').html(data);
			});
		}else if(selected === 13){
			$.post('_baby_teach_ajax.post.php',{'type':"ojisd"},function(data){
				$('#haha').html(data);
			});
		}else if(selected === 16){
			$.post('_baby_teach_ajax.post.php',function(data){
				$('#haha').html(data);
			});
		}
	});
	$('.crb_cc').click(function(e){
		e.preventDefault();
		var selected=$('.crb_cc').index($(this));
		for(var i = 0; i <  5; i++){
			if(i==selected){
				continue;
			}
			$('.crb_cc').attr('style','width:79px;');
		}
		$('#tab_shehuihuodong').attr('style','width:149px;');
		if(selected==4){
			$('#tab_shehuihuodong').attr('style','width:149px; color:#43A0D6; border-bottom:1px solid #ffffff;');
		}else{
			$(this).attr('style','width:79px; color:#43A0D6; border-bottom:1px solid #ffffff;');
		}
		$('.crb_c').hide();
		$('#crbc_'+selected).show();
	},function(){});
//	$('.problem_bannerr').live('hover',function(){
//	$(this).addClass("hover");
//		        $(this).removeClass("hover");
//
//		$(this).css('background',"#E6E5E8");
//	});
});
