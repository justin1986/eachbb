ALTER TABLE `eachbb_member`.`lastest_news` CHANGE COLUMN `type_name` `resource_type` VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
 CHANGE COLUMN `type_id` `resource_id` VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
 MODIFY COLUMN `u_id` INT(11) UNSIGNED NOT NULL,
 ADD COLUMN `content` VARCHAR(500) NOT NULL AFTER `created_at`,
 ADD COLUMN `u_name` VARCHAR(64) NOT NULL AFTER `content`,
 ADD COLUMN `u_avatar` VARCHAR(128) NOT NULL AFTER `u_name`,
 ADD COLUMN `retention` VARCHAR(0) NOT NULL AFTER `u_avatar`
, ROW_FORMAT = DYNAMIC;
