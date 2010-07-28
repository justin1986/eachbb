ALTER TABLE `eachbb`.`eb_assistant` MODIFY COLUMN `forbbide_copy` INTEGER DEFAULT NULL COMMENT '禁止复制',
ADD COLUMN `publisher` VARCHAR(45) COMMENT '发布者' AFTER `forbbide_copy`;
ALTER TABLE `eachbb`.`eb_assistant` ADD COLUMN `news_type` VARCHAR(45) COMMENT '新闻类型' AFTER `forbbide_copy`;
ALTER TABLE `eachbb`.`eb_assistant` ADD COLUMN `photo_src` VARCHAR(45) COMMENT '图片地址' AFTER `forbbide_copy`;
ADD COLUMN `video_photo_src` VARCHAR(255) COMMENT '视频地址' AFTER `forbbide_copy`;
ALTER TABLE `eachbb`.`eb_assistant` ADD COLUMN `block_endtime` VARCHAR(545) COMMENT '从自动更新列表排除结束时间，如果不排除，则插入null' AFTER `forbbide_copy`,
ADD COLUMN `copy_from` INTEGER COMMENT '复制新闻ID' AFTER `block_endtime`,
ADD COLUMN `top_info` TEXT COMMENT '头信息' AFTER `copy_from`,
ADD COLUMN `set_up` INTEGER UNSIGNED DEFAULT 0 COMMENT '是否置顶' AFTER `top_info`,
ADD COLUMN `video_src` VARCHAR(545) COMMENT '视频地址' AFTER `set_up`,
ADD COLUMN `video_flag` INTEGER UNSIGNED DEFAULT 0 COMMENT '是否是视频新闻' AFTER `video_src`,
ADD COLUMN `image_flag` INTEGER UNSIGNED DEFAULT 0 COMMENT '是否是图片新闻' AFTER `video_flag`,
ADD COLUMN `video_photo_src` VARCHAR(245) COMMENT '视频图片地址' AFTER `image_flag`,
ADD COLUMN `target_url` VARCHAR(245) COMMENT '链接新闻的链接地址' AFTER `video_photo_src`,
ADD COLUMN `photo_src` VARCHAR(100)) COMMENT '图片地址' AFTER `target_url`;
 