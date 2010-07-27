ALTER TABLE `eachbb`.`eb_assistant` ADD COLUMN `keywords` VARCHAR(1000) COMMENT '关键字' AFTER `image`;
ALTER TABLE `eachbb`.`eb_assistant` ADD COLUMN `forbbide_copy` INTEGER UNSIGNED COMMENT '禁止复制' AFTER `keywords`;

