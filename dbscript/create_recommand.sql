CREATE TABLE `eachbb`.`eb_recommand` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `result_id` int  NOT NULL,
  `title` varchar(256) ,
  `image` varchar(256)  COMMENT '图片链接',
  `href` varchar(256)  COMMENT '链接地址',
  `recommand_type` varchar(50)  COMMENT 'assister:妈妈助手，course:课程推荐',
  PRIMARY KEY (`id`),
  INDEX `new_index`(`result_id`)
);
