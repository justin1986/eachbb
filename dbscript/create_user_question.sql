CREATE TABLE `eachbb`.`eb_user_question` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INTEGER UNSIGNED NOT NULL,
  `question` VARCHAR(1000) NOT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB;