ALTER TABLE `eachbb_member`.`member_status` MODIFY COLUMN `created_at` DATETIME COMMENT '����ʱ��',
 MODIFY COLUMN `last_login` DATETIME COMMENT '����¼ʱ��',
 MODIFY COLUMN `score` INTEGER DEFAULT 0 COMMENT '��ң�����',
 MODIFY COLUMN `level` INTEGER DEFAULT 0 COMMENT '�ȼ�',
 MODIFY COLUMN `friend_count` INTEGER DEFAULT 0 COMMENT '���Ѹ���',
 MODIFY COLUMN `unread_msg_count` INTEGER DEFAULT 0 COMMENT 'δ����Ϣ��';