CREATE TABLE  `eachbb`.`eb_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `nick_name` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `role_name` varchar(255) DEFAULT 'member',
  `role_level` int(10) unsigned DEFAULT '0',
  `image_src` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `Index_2` (`name`,`password`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8
