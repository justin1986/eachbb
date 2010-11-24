CREATE TABLE  `eachbb`.`eb_assistant` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL COMMENT '类别ID',
  `priority` int(11) DEFAULT '100' COMMENT '优先级',
  `click_count` int(11) DEFAULT '0' COMMENT '点击次数',
  `is_adopt` int(11) DEFAULT '0' COMMENT '是否发布',
  `title` text COMMENT '标题',
  `short_title` text COMMENT '短标题',
  `description` longtext COMMENT '简介',
  `content` longtext COMMENT '内容',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `last_edited_at` datetime DEFAULT NULL COMMENT '最后编辑时间',
  `age` int(10) unsigned DEFAULT '0' COMMENT '年龄',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`created_at`),
  KEY `Index_3` (`category_id`,`is_adopt`),
  KEY `Index_6` (`is_adopt`)
) ENGINE=MyISAM AUTO_INCREMENT=1011 DEFAULT CHARSET=utf8
