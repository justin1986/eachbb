ALTER TABLE `eachbb_member`.`lastest_news` ADD COLUMN `form` varchar(50)  AFTER `u_avatar`,
 ADD COLUMN `href` varchar(50)  AFTER `form`,
 ADD COLUMN `photo` varchar(50)  AFTER `href`;
