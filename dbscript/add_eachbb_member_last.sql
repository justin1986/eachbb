ALTER TABLE `eachbb_member`.`lastest_news` CHANGE COLUMN `type_name` `resource_type` VARCHAR(45) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL COMMENT 'type "日记  diary 一句话 oneword 添加好友 addfriend 移除好友 removefriend 回复 ',
 CHANGE COLUMN `type_id` `resource_id` VARCHAR(45) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL,
 ADD COLUMN `content` VARCHAR(500) AFTER `created_at`,
 ADD COLUMN `u_name` VARCHAR(45) AFTER `content`,
 ADD COLUMN `u_avatar` VARCHAR(45) AFTER `u_name`;
