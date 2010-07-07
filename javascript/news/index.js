$(function(){

	$('.bct_c').hover(function(){
		var selected = $('.bct_c').index($(this));
		for(var i = 0 ;i <= 4; i++){
			if(i == selected){
				continue;
			}
				$('#bc_'+i).attr('style','background:url(/images/consult/c_pttg.jpg);  color:#000000;');
				$('#bc_0').attr('style','width:74px; height:27px; margin-left:5px;  color:#000000; background:url(/images/consult/c_pttdg.jpg)');
		}
		if(selected == 0){
			$(this).attr('style','width:74px; height:24px; margin-left:5px; color:#FF6600; background:url(/images/consult/c_ptg.jpg)');
		}else{
			$(this).attr('style','background:url(/images/index/r_pg_f.png);  color:#FF6600;');
		}
		$('.bct_number').attr('style','display:none;');
		$('#bn_'+selected).attr('style','display:inline;');
	},function(){});
	$('img.student_tab').hover(function(e){
		var selected=$('img.student_tab').index($(this));
		for(var i = 0; i < 3; i++){
			if(i == selected){
				continue;
			}
			$('img.student_tab:eq('+i+')').attr('src','/images/consult/'+i+'a.jpg');
		}
		$(this).attr('src','/images/consult/'+selected+'.jpg');
		$('.ba_c').attr('style','display:none;');
		$('#bac_'+selected).attr('style','display:inline;');
	},function(){});
});
