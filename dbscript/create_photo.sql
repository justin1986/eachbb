CREATE DATABASE IF NOT EXISTS eachbb_member;
CREATE TABLE `eachbb_member`.`photo` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `u_id` integer  NOT NULL,
  `u_name` varchar(64)  NOT NULL,
  `photo` varchar(256)  NOT NULL,
  `album_id` integer  NOT NULL,
  `comment_count` integer  NOT NULL DEFAULT 0,
  `visit_count` integer  NOT NULL DEFAULT 0,
  `ip` varchar(128)  NOT NULL,
  `width` integer ,
  `height` integer  NOT NULL,
  `title` varchar(256)  NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM 
CHARACTER SET utf8 COLLATE utf8_general_ci 
COMMENT = '上传图片';
