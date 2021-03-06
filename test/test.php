<?php
session_start();
include_once '../frame.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<title>特色测评</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php 
	$method = strtolower($_SERVER['REQUEST_METHOD']);
	$db = get_db();
	if($method == 'get'){
		$test_id = intval($_GET['id']);
		$test = new table_class('eb_problem');
		$test->find($test_id);
		$_SESSION['doing_test'] = $test->id;
		if(!$test->id){
			die_not_found();
		}
		$_SESSION['problem_type'] = $test->problem_type;
		$step = 0;
		$questions = $db->query("select id,question_type from eb_question where problem_id={$test->id}");
		$questions_tmp['dadongzuo'] = array();
		$questions_tmp['jingxidongzuo'] = array();
		$questions_tmp['yuyan'] = array();
		$questions_tmp['renshi'] = array();
		$questions_tmp['shehuihuodong'] = array();;
		!$questions && $questions = array();
		foreach($questions as $question){
			$questions_tmp[$question->question_type][] = array('id'=> $question->id,'question_type'=>$question->question_type,'score'=> 0,'choice'=>0);
		} 
		$question_queue = @array_merge($questions_tmp['dadongzuo'],$questions_tmp['jingxidongzuo'],$questions_tmp['yuyan'],$questions_tmp['renshi'],$questions_tmp['shehuihuodong']);
		$_SESSION['question_queue'] = $question_queue;
		$_SESSION['doing_test_name'] = $test->name;
	}else{
		$question_queue = $_SESSION['question_queue'];
		$step = $_POST['step'];
		//post提交，记录用户选择的积分
		if($choice_id = $_POST['choice']){
			$db->query("select attribute from eb_question_item where id={$choice_id}");
			if($db->record_count ==1){
				$question_queue[$step-1]['choice'] = $choice_id;
				$question_queue[$step-1]['score'] = $db->field_by_name('attribute');
				$_SESSION['question_queue'] = $question_queue;				
			}
		}
	}
	$question_len = count($question_queue);
	if($step <0 ) die_not_found();
	if($step >= $question_len) redirect('save_test_result.php','header');
	$question = new table_class('eb_question');
	$question->find($question_queue[$step]['id']);
	if(!$question->id) die_not_found();
	$table = new table_class("eb_question_item");
	$question_items = $table->find('all',array("conditions"=>"question_id={$question->id}"));
	css_include_tag('top_inc/test_top','test_begin','top_inc/test_left','test_left_inc');
	use_jquery();
	js_include_tag('front/test'); 
?>
</head>
<body>
<div id="ibody">
	<div id="fbody">
		<?php include_once(dirname(__FILE__).'/../inc/_test_top.php'); ?>
		<div id="content">
			<?php include_once(dirname(__FILE__).'/../test/left_inc.php'); ?>
			<div id="c_r">
				<?php if($_SESSION['problem_type'] == 1){?>
				<div id="crb_t"> 
					<div class="crb_value">
						<div class="crb_tt"></div>
						<div class="crb_cc" id="tab_dadongzuo" ><a href="#">大动作</a></div>
					</div>
					<div class="crb_hh"></div>
					<div class="crb_value">
						<div class="crb_tt"></div>
						<div class="crb_cc"  id="tab_jingxidongzuo"><a href="#">精细动作</a></div>
					</div>
					<div class="crb_hh"></div>
					<div class="crb_value">
						<div class="crb_tt"  ></div>
						<div class="crb_cc"  id="tab_yuyan"><a href="#">语言</a></div>
					</div>
					<div class="crb_hh" ></div>
					<div class="crb_value">
						<div class="crb_tt"></div>
						<div class="crb_cc" id="tab_renshi"><a href="#">认识</a></div>
					</div>
					<div class="crb_hh"></div>
					<div class="crb_vv">
						<div class="crb_ttt"></div>
						<div class="crb_ccc"  id="tab_shehuihuodong" ><a href="#">情感及适应性</a></div>
					</div>
					<div id="cr_hr"></div>
					<script type="text/javascript">
						$('#tab_<?php echo $question->question_type?>').addClass('selected');
					</script>
				</div>
				<?php }?>
				<!-- test begin -->
				<div id="cr_b">
					<div id="crb_l"></div>
					<div id="crbc_c">
						<div id="crbc_l"><a href="#"><?php echo $_SESSION['doing_test_name'];?><font>测评开始</font></a></div>

					<!-- <div id="crbc_la" style="margin-top:10px;"><a href="#">当前第<font><?php echo $step + 1;?></font>题</a></div>
						<div id="crbc_lb" style="margin-top:10px;"><a href="#">共<font><?php echo $question_len?></font>题</a></div>
 -->	
						<div id="crbc_lb"><a href="#">共<font><?php echo $question_len?></font>题</a></div>
						<div id="crbc_la"><a href="#">当前第<font><?php echo $step + 1;?></font>题</a></div>

					</div>
					<div id="crb_r"></div>
				</div>
				<div id="cr_c">
					<div id="crc">
						<form id="question_form" action="test.php?id=<?php echo $test_id;?>" method="post">
							<div id="crc_tit"><?php echo $question->title;?></div>
							<div id="crc_cc">
								<ul>
									<?php foreach ($question_items as $question_item) {?>
									<li><input type="radio" name="choice" class="radio_chice" value="<?php echo $question_item->id;?>" /><?php echo $question_item->name;?></li>
									<?php }?>
								</ul>
							</div>
							<div id="question_description" style="display:none;">
								<?php echo $question->description;?>
							</div>
							<div id="crc_bb">
								<input id="btn_prev" class="btn_submit" type="button" value="上一题"> 
								<input id="btn_next" class="btn_submit" type="button" value="<?php echo $step >= $question_len-1 ? "查看结果" : "下一题";?>">
							</div>
							
							<input type="hidden" id="hidden_step" name="step" value="<?php echo $step + 1;?>" />
						</form>
					</div>
				</div>
				
				<!-- test end -->
				<div id="cr_d">
					<div id="crd_d">育儿热点</div>
					<div id="geng"><a href="/assistant" target="_blank">更多&gt;&gt;</a></div>
				</div>
				<div id="cr_e">
					<?php
					$list=$db->query("SELECT id,category_id,title,created_at FROM eb_assistant where is_adopt=1  order by created_at,last_edited_at,click_count desc limit 200");
					for($x=0;$x<3;$x++){?>
						<div class="cre_z">
							<?php for($i=0;$i<4;$i++){
							$numid = rand(0, 200);
								if(!$numid){
									continue;
									$i--;
								}
								$type = $db->query("select name from eb_category  where category_type='assistant' and id=".$list[$numid]->category_id);
								?>
							<div class="crez_z">
								<div class="crez_d"></div>
								<div class="crez_v"><a href="/assistant/assistant.php?id=<?php echo $list[$numid]->id;?>"  target="_blank"><font>[<?php echo $type[0]->name;?>]</font>&nbsp;<?php echo $list[$numid]->title?></a></div>
							</div>
							<?php
							}
							?>
						</div>
						<?php
						}
						?>
				</div>
			</div>
		</div>
		<?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
	</div>
</div>
</body>
</html>