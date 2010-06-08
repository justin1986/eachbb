CREATE TABLE  `eachbb`.`eb_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text,
  `answer` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `problem_id` int(11) DEFAULT NULL,
  `is_adopt` int(10) unsigned DEFAULT '0',
  `description` text,
  PRIMARY KEY (`id`),
  KEY `Index_2` (`problem_id`)
) ENGINE=MyISAM AUTO_INCREMENT=711 DEFAULT CHARSET=utf8
