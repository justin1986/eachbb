CREATE TABLE  `eachbb`.`eb_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `comment` text COMMENT '备注',
  `nick_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `new_index` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8
