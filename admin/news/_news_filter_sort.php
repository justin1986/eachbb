<?php 		
	session_start();
	include_once('../../frame.php');
	judge_role();
	$selected_news = ($_REQUEST['selected_news']);
	$selected_news_a = explode(',',$selected_news);
	if(!$selected_news){
		$selected_news = 0;
	}
	$category = new category_class('news');
	?>
	<style type="text/css">
		.items{line-height:28px;height:28px;float:left;background:#ffffff;width:100%;border:1px solid #666666}
		.item1{width:40%;float:left;overflow: hidden;}
		.item2{width:30%;float:left;overflow: hidden;}
		.item3{width:29%;float:left;overflow: hidden;}
	</style>
	<div id=itable>
	<table id="list" style="boder:1px solid">
		<tr class="tr2">
			<td colspan="4" align="left">
				<span style="color:blue">请直接拖动，调整新闻排序</span>
			</td>
		</tr>
		<tr class="tr2">
			<td colspan="4">
				<div>
					<span class="items">
						<span class="item1">短标题</span>
						<span class="item2">发表时间</span>
						<span class="item3">所属类别</span>
					</span>
				</div>
			</td>
		</tr>		
		<tr >
			<td colspan="4">
				<div id="sortable">
					<?php
						$db = get_db();
						$items = $db->query("select * from eb_news where id in ({$selected_news}) order by find_in_set(id,'{$selected_news}')");
						$count_record = count($items);			
						//--------------------		
						for($i=0;$i<$count_record;$i++)	{
							
					?>
							<div class="items" id='<?php echo $items[$i]->id;?>' >
								<div class="item1"><?php echo strip_tags($items[$i]->short_title);?></div>
								<div class="item2"><?php echo strip_tags($items[$i]->created_at);?></div>					
								<div class="item3"><?php echo $category->find($items[$i]->category_id)->name; ?></div>
							</div>
					<?php
						}
						//--------------------
					?>				
				</div>
			</td>
		</tr>
		<tr class=tr3>
				<td colspan="4"><?php paginate(null,'result_box');?></td>
		</tr>
		<tr class=tr3>
				<td colspan="4">
					<input type="hidden" id="selected_news" value="<?php echo $selected_news?>"></input>
					<input type="hidden" id="save_function" value="<?php echo $_REQUEST['save_function'];?>"></input>
					<button id="button_ok" style="width:150px">确定</button>
					<button id="button_back" style="width:150px">返回</button>
				</td>
		</tr>		
	</table>
	</div>
	<script type="text/javascript">
		$(function(){
			$('#button_back').click(function(){
				$('#result_box').load('_news_filter.php');
			});
			$('#button_ok').click(function(){
				selected_news.length =0;
				$('div.items').each(function(){
					selected_news.push($(this).attr('id'));
				});
				$('#result_box').load('_news_filter.php');
			});
			$('#sortable').sortable();
		});
</script>
