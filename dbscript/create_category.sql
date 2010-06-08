CREATE TABLE  `eachbb`.`eb_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_type` varchar(255) DEFAULT NULL COMMENT '类别类型',
  `name` varchar(255) DEFAULT NULL COMMENT '名字',
  `description` varchar(255) DEFAULT NULL COMMENT '简介',
  `parent_id` int(10) DEFAULT NULL COMMENT '父类别',
  `priority` int(10) unsigned DEFAULT '100' COMMENT '优先级',
  `sort_id` int(11) NOT NULL DEFAULT '0' COMMENT '归类ID',
  `level` int(10) unsigned DEFAULT NULL COMMENT '级别',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=utf8
