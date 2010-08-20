CREATE TABLE `eachbb_member`.`daily_category` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `u_id` INTEGER NOT NULL,
  `created_at` DATETIME,
  PRIMARY KEY (`id`)
)