<table cellspacing="1">
		<tr class="itable_title">
			<td width="8%">留言人</td><td width="10%">IP</td><td width="15%">标题</td><td width="%10">新闻类别</td><td width="25%">留言内容</td><td width="12%">留言时间</td><td width="10%">操作</td>
		</tr>
		<?php
			$comment = new table_class("eb_comment");
			$record = $comment->paginate("all", $conditions ,30);
			$category = new category_class('news');
			$db = get_db();
			$count_record = count($record);
			//--------------------
			for($i=0;$i<$count_record;$i++){
				$db->query("select short_title,category_id from eb_news where id={$record[$i]->resource_id}");
				if($db->move_first()){
					$cat = implode('=>',$category->tree_map_name($db->field_by_name('category_id')));
					$title = $db->field_by_index(0);
				}
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td>
						<?php echo $record[$i]->nick_name;?>
					</td>
					<td><?php echo $record[$i]->ip;?></td>
					<td><a href="/news/news.php?id=<?php echo $record[$i]->resource_id;?>"><?php echo $title;?></a></td>		
					<td><?php echo $cat;?></td>
					<td>
						<a href="#" class="colorbox" style="color:blue;"><?php echo mb_substr($record[$i]->comment,0,50,'utf-8');?></a>
						<input type="hidden" id="hidden_comment" value="<?php echo $record[$i]->comment;?>" />
					</td>
					<td><?php echo $record[$i]->created_at;?></td>
					<td>
						<?php
							if($record[$i]->is_approve=="1"){?>
						<span style="cursor:pointer" class="unapprove" name="<?php echo $record[$i]->id;?>" title="撤销"><img src="/images/admin/btn_apply.png" border="0"></span>
						<?php }?>
						<?php	if($record[$i]->is_approve=="0"){?>
						<span style="cursor:pointer" class="approve" name="<?php echo $record[$i]->id;?>" title="发布"><img src="/images/admin/btn_unapply.png" border="0"></span>
						<?php }?>				
						<span style="cursor:pointer" class="del" name="<?php echo $record[$i]->id;?>"  title="删除"><img src="/images/admin/btn_delete.png" border="0"></span>
					</td>
				</tr>

			<?php }?>
			<tr class="btools">
				<td colspan=10>
					<button id=clear_priority>清空优先级</button>
					<button id=edit_priority>编辑优先级</button>
					<?php paginate("",null,"page",true);?>
				</td>
			</tr>
	</table>