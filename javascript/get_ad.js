$(function(){
	var parttern = /\/([^\/]*)\/?\s*/;
	var channel =  parttern.exec(location.pathname);
	if(channel){
		channel = channel[1];
	}else{
		channel = "index";
	}
	if(channel=='')channel='index';
	var ads = $('div.ad_banner');
	ads.each(function(){
		$(this).load('/ajax/load_ad.php?channel='+channel+ '&banner='+$(this).attr('id'),{url:location.pathname});
	});
	$('div.ad_banner').live('click',function(e){
		$.post('/ajax/add_click_ad.php',{'code':$(this).find('input:first').val(),url:location.pathname});
	});
	
});