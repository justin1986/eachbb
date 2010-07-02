ALTER TABLE `eachbb`.`eb_member` ADD COLUMN `gender` integer  NOT NULL DEFAULT 0 COMMENT '性别，1是男性，2是女性' AFTER `address`;
