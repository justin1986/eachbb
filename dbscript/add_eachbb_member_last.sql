ALTER TABLE `eachbb_member`.`lastest_news` CHANGE COLUMN `type_name` `resource_type` VARCHAR(45) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL COMMENT 'type "�ռ�  diary һ�仰 oneword ��Ӻ��� addfriend �Ƴ����� removefriend �ظ� ',
 CHANGE COLUMN `type_id` `resource_id` VARCHAR(45) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL,
 ADD COLUMN `content` VARCHAR(500) AFTER `created_at`,
 ADD COLUMN `u_name` VARCHAR(45) AFTER `content`,
 ADD COLUMN `u_avatar` VARCHAR(45) AFTER `u_name`;
