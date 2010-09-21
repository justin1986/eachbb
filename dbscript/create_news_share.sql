CREATE TABLE  `eb_news_share` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nick_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `news_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
)
