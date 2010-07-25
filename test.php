<?php 
	phpinfo();
	include 'frame.php';
	class eb_news extends ActiveRecord{
		static $s_virtual_fields = array(
											array(
												"table"=>"eb_category",
												"from_field" => "category_id",
												"fields"=>array(
																array("name"=>"name","alias" => "category_name")
														       )
												)
										);
	}
	
	class test extends ActiveRecord{
		
	}
	
	$tests = test::paginate(array("per_page" => 3,"order" => "id desc","page_var"=>"test_page"));
	var_dump($tests);
	/*
	$news = new eb_news();
	#var_dump(eb_news::find(array('include'=>false,'limit'=>"2")))
	#$news->find(array('include'=>false,'limit'=>"2"));
	$news->load(959);
	var_dump($news);
	*/
?>
