CREATE DATABASE IF NOT EXISTS eachbb_member;
CREATE TABLE `eachbb_member`.`visit_history` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `create_at` DATETIME  NOT NULL,
  `u_id` integer  NOT NULL,
  `f_id` integer  NOT NULL,
  `f_name` varchar(64)  NOT NULL,
  `f_avatar` varchar(128) ,
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM 
CHARACTER SET utf8 COLLATE utf8_general_ci 
COMMENT = '访问历史';
