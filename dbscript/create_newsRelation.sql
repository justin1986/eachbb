CREATE TABLE  `eachbb`.`eb_news_relationship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chinese_news_id` int(11) NOT NULL COMMENT '新闻ID',
  `english_news_id` int(11) NOT NULL COMMENT '新闻英文版ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='新闻英文关联'
