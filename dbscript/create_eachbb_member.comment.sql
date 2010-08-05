CREATE TABLE `eachbb_member`.`comment` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `u_id` INTEGER NOT NULL,
  `created_at` DATETIME NOT NULL,
  `title` VARCHAR(245),
  `content` VARCHAR(545) NOT NULL,
  `visit_count` INTEGER DEFAULT 0,
  `comment_count` INTEGER DEFAULT 0,
  `daily_id` INTEGER NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB;
