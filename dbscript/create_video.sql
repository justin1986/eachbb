CREATE TABLE  `eachbb`.`eb_video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `is_adopt` int(10) unsigned DEFAULT '0' COMMENT '是否发布',
  `photo_url` varchar(254) DEFAULT NULL COMMENT '视频图片链接',
  `video_url` varchar(254) DEFAULT NULL COMMENT '视频链接',
  `click_count` int(10) unsigned DEFAULT '0' COMMENT '点击量',
  `priority` int(10) unsigned DEFAULT '100' COMMENT '优先级',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `category_id` int(10) unsigned DEFAULT NULL COMMENT '类别ID',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `description` longtext COMMENT '简介',
  `online_url` varchar(255) DEFAULT NULL COMMENT '在线视频地址',
  `publisher` varchar(45) DEFAULT NULL COMMENT '发布者',
  `tags` varchar(255) DEFAULT NULL COMMENT '标签',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`category_id`,`is_adopt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8
