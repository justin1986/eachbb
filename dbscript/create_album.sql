CREATE TABLE `eachbb_member`.`album` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `u_id` integer  NOT NULL COMMENT '用户ID',
  `name` varchar(256)  NOT NULL COMMENT '相册名称',
  `front_cover` varchar(256)  COMMENT '封面图片',
  `description` text  COMMENT '相册描述',
  `created_at` DATETIME  NOT NULL COMMENT '创建时间',
  `last_update_time` DATETIME  NOT NULL COMMENT '最后编辑时间',
  `visit_count` integer  NOT NULL DEFAULT 0 COMMENT '相册访问总数',
  `comment_count` integer  NOT NULL DEFAULT 0 COMMENT '相册点击总数',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM 
CHARACTER SET utf8 COLLATE utf8_general_ci 
COMMENT = '相册';
