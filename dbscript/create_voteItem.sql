CREATE TABLE  `eachbb`.`eb_vote_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vote_id` int(10) unsigned DEFAULT '0',
  `vote_count` int(10) unsigned NOT NULL DEFAULT '0',
  `title` text,
  `photo_url` varchar(255) DEFAULT NULL,
  `sub_vote_id` int(10) unsigned DEFAULT NULL,
  `base_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`,`vote_count`) USING BTREE,
  KEY `Index_2` (`vote_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8
