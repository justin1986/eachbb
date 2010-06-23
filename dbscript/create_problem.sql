CREATE TABLE  `eachbb`.`eb_problem` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255),
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `limit_time` int(11) DEFAULT NULL,
  `point` int(11) DEFAULT '10',
  `type` varchar(45) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `is_adopt` int(10) unsigned DEFAULT '0',
  `category_id` int(10) unsigned DEFAULT NULL,
  `click_count` int(10) unsigned DEFAULT '0',
  `photo_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8
