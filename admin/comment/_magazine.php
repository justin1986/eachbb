<table cellspacing="1">
		<tr class="itable_title">
			<td width="8%">留言人</td><td width="10%">IP</td><td width="15%">文章标题</td><td width="%10">杂志刊号</td><td width="25%">留言内容</td><td width="12%">留言时间</td><td width="10%">操作</td>
		</tr>
		<?php
			$comment = new table_class("fb_comment");
			$record = $comment->paginate("all", $conditions ,30);
			$db = get_db();
			$count_record = count($record);
			//--------------------
			for($i=0;$i<$count_record;$i++){
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td><?php echo $record[$i]->nick_name;?></td>
					<td><?php echo $record[$i]->ip;?></td>
					<td><?php echo $record[$i]->title;?></td>		
					<td><?php echo $record[$i]->magzine_number;?></td>
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
						<input type="text" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:25px;">
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