ALTER TABLE `eachbb`.`eb_teach` ADD COLUMN `keyword` varchar(500)  COMMENT '成长关键词' AFTER `toy`,
 ADD COLUMN `recommand_comment` text  COMMENT '妈妈反馈' AFTER `keyword`;
