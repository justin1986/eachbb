CREATE TABLE  `eachbb`.`eb_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `description` text COMMENT '简介',
  `url` varchar(255) DEFAULT NULL COMMENT '地址',
  `category_id` int(10) unsigned DEFAULT NULL COMMENT '类别ID',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `tags` varchar(255) DEFAULT NULL COMMENT '标签',
  `publisher` varchar(45) DEFAULT NULL COMMENT '发布者',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `click_count` int(10) unsigned DEFAULT '0' COMMENT '点击量',
  `is_adopt` tinyint(1) unsigned DEFAULT '0' COMMENT '是否发布',
  `priority` int(10) unsigned DEFAULT '100' COMMENT '优先级',
  `src` varchar(255) DEFAULT NULL COMMENT '图片地址',
  `thumb_name` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `src2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Index_2` (`category_id`,`is_adopt`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8
