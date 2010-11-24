CREATE DATABASE IF NOT EXISTS eachbb_member;
CREATE TABLE `eachbb_member`.`daily` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `u_id` integer  NOT NULL,
  `created_at` DATETIME  NOT NULL,
  `last_edit_time` DATETIME  NOT NULL,
  `title` varchar(256)  NOT NULL,
  `content` text  NOT NULL,
  `visit_count` integer  NOT NULL DEFAULT 0,
  `comment_count` integer  NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM 
CHARACTER SET utf8 COLLATE utf8_general_ci 
COMMENT = '日志';
