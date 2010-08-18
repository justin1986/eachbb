ALTER TABLE `eachbb_member`.`member_status` ADD COLUMN `visit_count` integer  NOT NULL DEFAULT 0 COMMENT '被访问的次数' AFTER `unread_msg_count`;
