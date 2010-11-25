CREATE TABLE  `eachbb`.`eb_test_result1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) NOT NULL DEFAULT '游客',
  `u_id` int(11) NOT NULL DEFAULT '0',
  `test_type` int(11) NOT NULL,
  `pro_type` int(11) NOT NULL,
  `temp` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='特色测评';
