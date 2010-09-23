CREATE TABLE `eachbb`.`eb_page_pos` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `page` varchar(256)  NOT NULL,
  `name` varchar(256)  NOT NULL,
  `title` varchar(1000) ,
  `description` text ,
  `href` varchar(256) ,
  `static_href` varchar(256) ,
  `image1` varchar(256) ,
  `image2` varchar(256) ,
  `reserve1` varchar(1000) ,
  `reserve2` text ,
  PRIMARY KEY (`id`),
  INDEX `new_index`(`page`)
)
COMMENT = '页面位置管理';
