<?php
include_once "../../frame.php";
use_jquery();
js_include_tag('jquery.colorbox-min');
$pos = new table_class('eb_page_pos');
$pos->find_by_name($_POST[pos][name]);
$pos->update_file_attributes('pos');
$pos->update_attributes($_POST['pos'], false);
$pos->save();
?>
<script>
	parent.$.fn.colorbox.close();
	parent.frames['admin_iframe'].location.reload();
</script>