$(function(){
	$('.ttc_a').hover(function(e){
	e.preventDefault();
	var selected=$('.ttc_a').index($(this));
	for(var i = 0; i < 5; i++){
		if(i==selected){
			continue;
		}
		$('.ttc_a').attr('style','background:#A9D780;');
	}
	$(this).attr('style','background:#95D171');
	
	},function(){});
})