CREATE TABLE `lawsive`.`member_photo` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `member_id` INTEGER  NOT NULL,
  `member_name` VARCHAR(50)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` VARCHAR(120)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '图片名称',
  `category_id` INTEGER  NOT NULL COMMENT 'album_id',
  `width` INTEGER ,
  `height` INTEGER ,
  `created_at` DATETIME  NOT NULL,
  `description` VARCHAR(500)  CHARACTER SET utf8 COLLATE utf8_general_ci,
  `visit_count` INTEGER  NOT NULL DEFAULT 0 COMMENT '访问次数',
  `ip` VARCHAR(60) ,
  `last_edit_time` DATETIME  NOT NULL,
  PRIMARY KEY (`id`)
)
 ENGINE = MyISAM
 CHARACTER SET utf8 COLLATE utf8_general_ci
 COMMENT = '用户相册照片';

