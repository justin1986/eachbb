CREATE TABLE  `eachbb`.`eb_comment_dig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) NOT NULL,
  `up` int(11) DEFAULT '0',
  `down` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `new_index` (`comment_id`)
)
