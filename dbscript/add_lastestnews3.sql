ALTER TABLE `eachbb_member`.`lastest_news` ADD COLUMN `photo` VARCHAR(128) AFTER `form`,
 ADD COLUMN `f_id` INTEGER(11) UNSIGNED AFTER `photo`
, ROW_FORMAT = DYNAMIC;
