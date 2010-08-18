CREATE DATABASE IF NOT EXISTS eachbb_member;
CREATE TABLE `eachbb_member`.`member_avatar` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `u_id` integer  NOT NULL,
  `photo` varchar(128)  NOT NULL,
  `create_at` DATETIME  NOT NULL,
  `width` integer ,
  `height` integer ,
  `status` integer  NOT NULL DEFAULT 1 COMMENT '是否正在使用，1是正在使用，0是未使用',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM 
CHARACTER SET utf8 COLLATE utf8_general_ci 
COMMENT = '用户头像';
