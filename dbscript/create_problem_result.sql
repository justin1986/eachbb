CREATE TABLE `eachbb`.`eb_problem_result` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `problem_id` int  NOT NULL,
  `min_score` int  NOT NULL DEFAULT 0 COMMENT '最低分值',
  `max_score` int  NOT NULL DEFAULT -1 COMMENT '最 高分值，-1为不限制',
  `descriptioin` text  COMMENT '在该分值范围内的说明',
  PRIMARY KEY (`id`)
);
