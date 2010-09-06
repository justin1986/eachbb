ALTER TABLE `eachbb`.`eb_problem` ADD COLUMN `problem_type` int  NOT NULL DEFAULT 1 COMMENT '测评类型，1：宝宝测评，2：父母测评' AFTER `description`;
