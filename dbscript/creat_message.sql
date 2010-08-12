DROP TABLE IF EXISTS `eachbb_member`.`message`;
CREATE TABLE  `eachbb_member`.`message` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created_at` datetime NOT NULL,
  `content` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `status` int(10) unsigned NOT NULL default '0' COMMENT '0未读 1已读 2删除',
  `last_edit_at` datetime NOT NULL,
  `send_id` int(10) unsigned NOT NULL,
  `message_type` int(10) unsigned NOT NULL default '1' COMMENT '1：好友 2 系统',
  `recieve_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  USING BTREE (`id`)
)  DEFAULT CHARSET=utf8 COMMENT='留言';