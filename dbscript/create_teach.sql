CREATE TABLE  `eachbb`.`eb_teach` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL COMMENT '标题',
  `img_url` varchar(256) DEFAULT NULL COMMENT '封面图片',
  `description` text COMMENT '介绍',
  `content` varchar(256) DEFAULT NULL COMMENT '内容',
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '类型，1是flash，2是文章',
  `age` int(11) NOT NULL DEFAULT '1' COMMENT '年龄段，1是0～1岁，2是1～2岁，3是2～3岁',
  `category` int(11) DEFAULT '0' COMMENT '类别，保留字段',
  `priority` int(11) NOT NULL DEFAULT '100' COMMENT '显示优先级',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `is_adopt` int(11) NOT NULL DEFAULT '0' COMMENT '发布状态，0是未发布，1是已发布',
  `click_count` int(11) NOT NULL DEFAULT '0' COMMENT '点击次数',
  `del_flag` int(11) NOT NULL DEFAULT '0' COMMENT '删除标识，1是已删除，0是未删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='早教课程'
