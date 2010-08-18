ALTER TABLE `eachbb_member`.`lastest_news` MODIFY COLUMN `content` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci,
 MODIFY COLUMN `u_avatar` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_general_ci,
 CHANGE COLUMN `retention` `form` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL;