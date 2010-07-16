CREATE TABLE `eachbb_member`.`friend` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `u_id` integer  NOT NULL COMMENT '用户ID',
  `f_id` integer  NOT NULL COMMENT '好友ID',
  `created_at` DATETIME  NOT NULL COMMENT '创建时间',
  `f_name` varchar(64)  NOT NULL COMMENT '好友昵称',
  `f_avatar` varchar(128)  COMMENT '好友头像',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM 
CHARACTER SET utf8 COLLATE utf8_general_ci 
COMMENT = '好友关系';
