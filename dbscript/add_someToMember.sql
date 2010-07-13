ALTER TABLE `eachbb`.`eb_member` ADD COLUMN `fix_phone` varchar(50)  COMMENT '固定电话' AFTER `ip`,
 ADD COLUMN `id_num` integer  COMMENT '身份证号' AFTER `fix_phone`,
 ADD COLUMN `education` varchar(50)  COMMENT '教育程度' AFTER `id_num`,
 ADD COLUMN `industry` varchar(100)  COMMENT '行业' AFTER `education`,
 ADD COLUMN `income` varchar(50)  COMMENT '家庭月收入' AFTER `industry`,
 ADD COLUMN `register_phone` varchar(50)  COMMENT '注册手机' AFTER `income`,
 ADD COLUMN `true_name` varchar(50)  COMMENT '真实姓名' AFTER `register_phone`,
 ADD COLUMN `baby_name` varchar(256)  COMMENT '宝宝姓名' AFTER `address`,
 ADD COLUMN `baby_gender` integer  COMMENT '宝宝性别，1是男孩，2是女孩' AFTER `baby_name`;
