<?php 
	include_once(dirname(__FILE__).'/../frame.php');
	use_jquery();
	js_include_tag('left_inc');
	?>
<div id="c_l">
	<div id="l_pho"></div>
	<a href="/test"><div id="l_test"></div></a>
	<div id="l_look"></div>
	<div class="hlc_t"></div>
	<div class="hlc_b">
		<div class="hlcb_pg">
			<div class="hlct_t">热门课程排行榜</div>
			<img src="/images/helper/lb_hd.jpg"> </div>
		<?php for($i = 0 ; $i < 5 ; $i++){?>
		<div class="hlcb_z">
			<div class="hlcb_l">
				<div class="r" style="<?php if($i==4||$i==3){ echo 'background:#ABABAB; border:1px solid #A4A4A4;';}?>"><?php echo $i+1 ?></div>
			</div>
			<div class="hlcb_r">
				<div class="hlcb_t">按时法十分</div>
				<div class="hlcb_t">上传者：哈哈</div>
				<div class="hlcb_t"><font>下载次数：</font>1232</div>
			</div>
		</div>
		<?php }?>
	</div>
	<div class="hlc_bb"></div>
	<div id="l_f">
		<div id="lf_l">我的<font>好友</font></div>
		<div id="lf_c">（<font>345</font>）</div>
	</div>
	<div id="pic_r">
		<?php for($i = 0 ; $i < 6 ; $i ++){ ?>
		<div class="ppg">
			<div class="pic_pg">
				<div class="pic_img"><img src="/images/yard/pho.jpg"></div>
			</div>
			<div class="ppg_w">safsadfas</div>
		</div>
		<?php }?>
	</div>
	<div id="pg_a"></div>
</div>
<style>
#l_test{border:0px solid red;}
#l_look{border:0px solid red;}
</style>