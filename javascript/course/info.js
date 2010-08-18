$(function(){
	$('.cr_title').hover(function(e){
		e.preventDefault();
		var selected=$('.cr_title').index($(this));
		for(var i = 0; i < 4; i++){
			if(i==selected){
				continue;
			}
			$('.cr_title').attr('class','cr_title');
		}
		$('.month_c').attr('style','display:none;');
		if(selected<=1){
			selected==0;
			$('#month_0').attr('style','display:inline;');
		}else if(selected==2){
			$('#month_1').attr('style','display:inline;');
		}else if(selected==3){
			$('#month_2').attr('style','display:inline;');
		}
		$('#age_val').attr('value',selected);
		$(this).attr('class','cr_title selected');
	},function(){});
	$('.month').click(function(e){
		e.preventDefault();
		var selected=$('.month').index($(this));
		var id=$('#age_val').val();
		window.location="/course/info.php?age="+id+"&month="+selected;
	});
	
});

