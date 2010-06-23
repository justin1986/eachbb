CREATE TABLE `eachbb`.`eb_position` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `source_id` integer  NOT NULL COMMENT '内容ID',
  `source_type` varchar(256)  NOT NULL DEFAULT 'news' COMMENT '内容类型，默认是新闻',
  `priority` integer  NOT NULL DEFAULT 100 COMMENT '内容在该位置的优先级',
  `pos_name` varchar(256)  NOT NULL COMMENT '位置名',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM COMMENT = '位置内容管理';
