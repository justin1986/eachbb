CREATE TABLE  `eachbb`.`eb_collection` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resource_type` varchar(55) DEFAULT NULL COMMENT '类型',
  `resource_id` int(10) unsigned DEFAULT NULL COMMENT '收藏品id',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `user_id` int(10) unsigned DEFAULT NULL COMMENT '用户id',
  PRIMARY KEY (`id`)
)
