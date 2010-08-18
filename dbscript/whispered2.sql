ALTER TABLE `eachbb_member`.`comment` MODIFY COLUMN `user_id` INT(10) NOT NULL,
 MODIFY COLUMN `comment_count` INT(10) DEFAULT NULL,
 MODIFY COLUMN `whispered` INT(11) DEFAULT 0;
