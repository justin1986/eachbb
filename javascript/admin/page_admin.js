$(function(){
	$('*[pos]').each(function(){
		var relative = false;
		$(this).parents().add($(this)).each(function(){
			if($(this).css('position')=='relative'){
				relative = true;
			}
		});
		$(this).hover(function(){
			if($(this).find('#admin_edit_div').length > 0) return;
			var top =  parseInt($(this).offset().top);
			var right =  $(this).offset().left;
			if(relative){
				top = 0;
				right = 0;
			}
			$('#admin_edit_div').remove();
			var str = "<div id='admin_edit_div' page='"+$(this).attr('page')+"' pos_tag='" + $(this).attr('pos_tag') + "' pos_name='" + $(this).attr('pos') +"' style='z-index: 100; position: absolute;left:" +right +"px;top:" +top+"px;' title='编辑位置内容'><img style='cursor: pointer;width:16px;height:16px;' width=16 height=16 src='/images/admin/btn_edit.png' ></div>";
			$(this).append(str);
		},function(){});
	});
	
	$('#admin_edit_div img').live('click',function(e){
		e.preventDefault();
		var $this = $(this);
		parent.$.fn.colorbox({
			href: '/admin/page_pos/edit.php?page='+$($this).parent().attr('page') +'&pos_name=' + $($this).parent().attr('pos_name') + '&name=' + $(this).parent().attr('pos_tag'),
			width:'800px',
			height: '630px',
			iframe: true
		});
	});
	
});