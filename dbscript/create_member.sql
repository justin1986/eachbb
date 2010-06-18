CREATE TABLE `eachbb`.`eb_member` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `uid` int DEFAULT 0,
  `name` varchar(50)  NOT NULL,
  `password` varchar(20)  NOT NULL,
  `email` varchar(50) ,
  `authenticated` integer  NOT NULL DEFAULT 0,
  `authenticate_string` char(20)  DEFAULT '',
  `created_at` datetime  NOT NULL,
  `last_login` datetime  NOT NULL,
  `authenticated_at` datetime  NOT NULL,
  `avatar` varchar(256)  NOT NULL,
  PRIMARY KEY (`id`)
);
