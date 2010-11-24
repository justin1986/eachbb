CREATE TABLE  `eachbb`.`eb_test_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) NOT NULL DEFAULT '游客',
  `u_id` int(11) NOT NULL DEFAULT '0',
  `test_result` int(11) NOT NULL,
  `test_type` varchar(20) NOT NULL,
  `temp_flag` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='特色测评';
