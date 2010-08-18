CREATE DATABASE IF NOT EXISTS eachbb_member;
CREATE TABLE `eachbb_member`.`member_status` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `uid` integer  NOT NULL COMMENT '用户id',
  `created_at` DATETIME  NOT NULL COMMENT '创建时间',
  `last_login` DATETIME  NOT NULL COMMENT '最后登录时间',
  `score` integer  NOT NULL DEFAULT 0 COMMENT '金币，分数',
  `level` integer  NOT NULL DEFAULT 0 COMMENT '等级',
  `friend_count` integer  NOT NULL DEFAULT 0 COMMENT '朋友个数',
  `unread_msg_count` integer  NOT NULL DEFAULT 0 COMMENT '未读消息数',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM 
CHARACTER SET utf8 COLLATE utf8_general_ci 
COMMENT = ' 用户状态表';
