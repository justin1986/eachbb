CREATE TABLE  `eachbb`.`eb_question_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `attribute` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Index_2` (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2693 DEFAULT CHARSET=utf8
