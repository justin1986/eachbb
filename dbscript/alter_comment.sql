ALTER TABLE `eachbb_member`.`member` MODIFY COLUMN `last_login` DATETIME  DEFAULT NULL,
 MODIFY COLUMN `avatar` VARCHAR(256)  CHARACTER SET gbk COLLATE gbk_chinese_ci DEFAULT NULL,
 MODIFY COLUMN `address` VARCHAR(256)  CHARACTER SET gbk COLLATE gbk_chinese_ci DEFAULT NULL COMMENT '住址';

