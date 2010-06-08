CREATE TABLE  `eachbb`.`eb_publish_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publish_date` datetime DEFAULT NULL COMMENT '定时发布时间',
  `resource_id` int(11) DEFAULT NULL,
  `resource_type` varchar(20) DEFAULT NULL COMMENT 'news',
  `status` int(11) DEFAULT '0' COMMENT '状态：0未执行，1已执行',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='定时发布'
