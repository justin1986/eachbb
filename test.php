<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title></title>
		<?php
			include "frame.php";
			use_jquery();
			js_include_tag('test');		
			class friend extends ActiveRecord{
				static $s_database = 'eachbb_member';
				static $s_primary_key = "id";
				static $s_belongs_to = array();
				static $s_fields_info;
				static $s_has_many = array();
				static $s_virtual_fields = array();
			}
			class member extends ActiveRecord{
				static $s_database = 'eachbb_member';
				static $s_primary_key = "id";
				static $s_belongs_to = array();
				static $s_fields_info;
				static $s_virtual_fields = array();
				static $s_has_many = array(
								"friend" => array('class_name' => 'friend' , "bind_field" => "u_id")//friends 访问的名称，class_name关联的class，bind_field关联的字段
							);
			}	
			
			$member = member::find(1);
			$myfriends = $member->friend->find(array("limit" => 2));
			var_dump($myfriends);
		?>
	</head>
	<body>

		
	</body>
</html>
