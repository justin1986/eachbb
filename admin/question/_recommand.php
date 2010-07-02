<li>
	<a href="<?php echo $recommand->href;?>" target="_blank">
		<?php if($recommand->image) {?>
		<img src="<?php echo $recommand->image?>" border="0" width="50" height="50" />
		<?php } else{
			echo $recommand->title;
		}?>
	</a>
	<a href="<?php echo $recommand->id;?>" class="edit_recommand">编辑</a>
	<a href="<?php echo $recommand->id;?>" class="delete_recommand">删除</a>
</li>