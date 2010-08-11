CREATE TABLE `eachbb_member`.`lastest_news` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_name` VARCHAR(45) NOT NULL,
  `type_id` VARCHAR(45) NOT NULL,
  `u_id` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB;