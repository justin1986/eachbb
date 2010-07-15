<div id="hotspot">育儿热点<a href="#">更多&gt;&gt;</a></div>
<div id="hotspot_container">
	<div class="kong" style="height:10px;"></div>
	<?php for($i = 0 ; $i < 12 ; $i++){ ?>
	<div class="hotspot_pg">
		<div></div>
		<a href="#"><font>[知识榜单]</font>&nbsp;sadfasdfa asf</a>
	</div>
	<?php } ?>
	<div class="kong" style="height:10px;"></div>
</div>
<!-- 
<div id="question">
	<div id="que_left"></div>
	<div id="que_right">
		<div id="que_container">
			<div>我要提问：</div>
			<input id="que_text" type="text"/>
			<input id="btn_button" type="button" value="提 交"/>
		</div>
		<div id="que_menu">热门问题:
			<a href="#" style="margin-left:1px;">宝宝长牙</a>
			<a href="#">喂食</a>
			<a href="#">夜晚不睡觉</a>
			<a href="#">尿布选择</a>
		</div>
	</div>
</div> -->
<input type="hidden" value="<?php echo $category_id;?>" id="newsid">
<div id="question_btn_text">
<!-- 
	<a href="#" style="margin-left:140px;">上一时间段</a>
	<a href="#" style="margin-left:40px;">下一时间段</a> -->
	<div id="btn_print" type="button">打印</div>
	<div id="a_collect">收藏</div>
	<div id="a_public">分享</div>
</div>