ALTER TABLE `eachbb`.`eb_member` ADD COLUMN `baby_status` integer  NOT NULL DEFAULT 0 COMMENT '是否怀孕，1是已经怀孕，2是未怀孕，3是怀孕中' AFTER `cache_name`,
 ADD COLUMN `baby_birthday` DATETIME  COMMENT '宝宝生日' AFTER `baby_status`,
 ADD COLUMN `birthday` DATETIME  COMMENT '注册人生日' AFTER `baby_birthday`,
 ADD COLUMN `zip` varchar(50)  COMMENT '邮编' AFTER `birthday`,
 ADD COLUMN `phone` varchar(50)  COMMENT '联系电话' AFTER `zip`;
