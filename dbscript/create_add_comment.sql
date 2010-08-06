CREATE TABLE `eachbb_member`.`comment` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `resource_id` INTEGER UNSIGNED NOT NULL,
  `nick_name` VARCHAR(45),
  `comment` VARCHAR(500) NOT NULL,
  `user_id` INTEGER UNSIGNED NOT NULL,
  `created_at` DATETIME NOT NULL,
  `resource_type` VARCHAR(45) NOT NULL,
  `ip` VARCHAR(45),
  `reserve` VARCHAR(505),
  `comment_count` INTEGER UNSIGNED,
  `visit_count` INTEGER UNSIGNED,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB;
