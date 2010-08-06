ALTER TABLE `eachbb_member`.`comment` CHANGE COLUMN `u_id` `user_id` INTEGER NOT NULL,
 MODIFY COLUMN `title` VARCHAR(255),
 CHANGE COLUMN `daily_id` `resource_id` INTEGER NOT NULL,
 ADD COLUMN `nick_name` VARCHAR(245) AFTER `title`,
 ADD COLUMN `resource_type` VARCHAR NOT NULL DEFAULT diary AFTER `nick_name`,
 ADD COLUMN `ip` VARCHAR(45) AFTER `resource_type`,
 ADD COLUMN `reserve` VARCHAR(1000) AFTER `ip`
, ROW_FORMAT = DYNAMIC;
