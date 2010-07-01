ALTER TABLE `eachbb`.`eb_problem` CHANGE COLUMN `start_time` `start_month` int  DEFAULT NULL COMMENT '宝宝月份开始',
 CHANGE COLUMN `end_time` `end_month` int  DEFAULT NULL COMMENT '宝宝月份结束';
