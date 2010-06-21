<?php
include_once '../../frame.php';
#use_jquery();
$recommand = new table_class('eb_recommand');
if($_POST['item']['id']){
	$recommand->find($_POST['item']['id']);
}
$recommand->update_file_attributes('item');
$recommand->update_attributes($_POST['item']);
?>
<script type="text/javascript">
	parent.$.fn.colorbox.close();
	parent.window.frames["admin_iframe"].location.reload();
</script>