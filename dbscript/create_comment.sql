CREATE TABLE  `eachbb`.`eb_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resource_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL COMMENT 'email',
  `mobile` varchar(20) DEFAULT NULL,
  `nick_name` varchar(255) DEFAULT NULL,
  `comment` text,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `resource_type` varchar(45) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `reserve` text COMMENT '保留字段',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`resource_type`,`resource_id`),
  KEY `Index_3` (`resource_id`)
)
