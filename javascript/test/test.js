$(function(){
	$('.cr_num').hover(function(e){
		e.preventDefault();
		var selected = $('.cr_num').index($(this));
		alert(comment_id);
		for(var i = 0 ; $i < 4 ; $i++){
			if(i==selected){
				continue;
			}
			
		}
		$(this).attr('style','color:#71CAE4; background:url(/images/test/r_nb.jpg) no-repeat;');
		$(this)
	},function(){});
});
