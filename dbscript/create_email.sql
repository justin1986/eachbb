CREATE TABLE  `eachbb_email`.`eb_email` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email_to` varchar(256) DEFAULT NULL,
  `email_from` varchar(256) DEFAULT NULL,
  `email_subject` varchar(256) DEFAULT NULL,
  `email_content` text,
  `email_status` int(10) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

CREATE TABLE  `eachbb_email`.`eb_email_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email_to` varchar(256) DEFAULT NULL,
  `email_from` varchar(256) DEFAULT NULL,
  `email_subject` varchar(256) DEFAULT NULL,
  `email_content` text,
  `email_status` varchar(50) DEFAULT 'success',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;
