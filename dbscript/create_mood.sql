CREATE DATABASE IF NOT EXISTS eachbb_member;
CREATE TABLE `eachbb_member`.`mood` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `u_id` integer  NOT NULL COMMENT '用户ID',
  `u_name` varchar(64)  NOT NULL COMMENT '用户昵称',
  `created_at` DATETIME  NOT NULL COMMENT '创建时间',
  `content` text  NOT NULL COMMENT '内容',
  `comment_count` integer  NOT NULL DEFAULT 0 COMMENT '评论数',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM 
CHARACTER SET utf8 COLLATE utf8_general_ci 
COMMENT = '一句话心情';
