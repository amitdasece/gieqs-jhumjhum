BEGIN;
insert into `learningToolv1`.`video` (`name`, `description`)
select `title`, `description`
from `gieqs`.`sessionItem`
WHERE `id` > 41;
insert into `gieqs`.`sessionItem` (`url_video`)
VALUES (LAST_INSERT_ID())
WHERE `id` = `gieqs`.`sessionItem`
COMMIT;