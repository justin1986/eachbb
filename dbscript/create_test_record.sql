CREATE TABLE `eachbb`.`eb_test_record` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `user_id` int  NOT NULL,
  `problem_id` int  NOT NULL,
  `question_id` int  NOT NULL,
  `choice_id` int  NOT NULL,
  `score` int  NOT NULL DEFAULT 0,
  `question_type` varchar(50)  NOT NULL,
  `created_at` datetime  NOT NULL,
  PRIMARY KEY (`id`)
)
COMMENT = '用户评测记录表';
