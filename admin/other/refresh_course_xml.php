<?php
include '../../frame.php';
set_charset();
if(refresh_course_xml()){
	echo "更新缓存<span style='color:green'>成功</span>";
}else{
	echo "更新缓存<span style='color:color'>失败</span>";
}