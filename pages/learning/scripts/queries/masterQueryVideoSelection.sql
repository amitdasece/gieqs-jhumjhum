SELECT DISTINCT
    a.*,
    d.`id` AS `tagid`,
    e.`id` AS `tagCategories_id`
FROM
    `video` AS a
INNER JOIN `chapter` AS b
ON
    a.`id` = b.`video_id`
INNER JOIN `chapterTag` AS c
ON
    b.`id` = c.`chapter_id`
INNER JOIN `tags` AS d
ON
    d.`id` = c.`tags_id`
INNER JOIN `tagCategories` AS e
ON
    d.`tagCategories_id` = e.`id`
WHERE
    (e.`id` > '45' AND e.`id` < '56') 
    
    AND
    
    d.`id` IN (SELECT )
    (d.`id` = '227' OR d.`id` = '228')



SELECT DISTINCT a.*, d.`id` AS `tagid`, e.`id` AS `tagCategories_id` FROM `video` AS a INNER JOIN `chapter` AS b ON a.`id` = b.`video_id` INNER JOIN `chapterTag` AS c ON b.`id` = c.`chapter_id` INNER JOIN `tags` AS d ON d.`id` = c.`tags_id` INNER JOIN `tagCategories` AS e ON d.`tagCategories_id` = e.`id` GROUP BY d.`id` HAVING (e.`id` > '45' AND e.`id` < '56') AND (d.`id` = '241')


getVideos query

SELECT DISTINCT a.* FROM `video` as a 
INNER JOIN `chapter` as b ON a.`id` = b.`video_id` 
INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` 
INNER JOIN `tags` as d ON d.`id` = c.`tags_id` 
INNER JOIN `tagCategories` as e ON d.`tagCategories_id` = e.`id` 
WHERE e.`id` = '47' ORDER BY a.`created` DESC

all added together for individual e.`id`

for multiple

SELECT DISTINCT a.* FROM `video` as a 
INNER JOIN `chapter` as b ON a.`id` = b.`video_id` 
INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` 
INNER JOIN `tags` as d ON d.`id` = c.`tags_id` 
INNER JOIN `tagCategories` as e ON d.`tagCategories_id` = e.`id` 
WHERE (e.`id` = '47' AND d.`id` = '228')

SELECT DISTINCT a.* FROM `video` as a 
INNER JOIN `chapter` as b ON a.`id` = b.`video_id` 
INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` 
INNER JOIN `tags` as d ON d.`id` = c.`tags_id` 
INNER JOIN `tagCategories` as e ON d.`tagCategories_id` = e.`id` 
WHERE (e.`id` = '51' AND d.`id` = '228') ORDER BY a.`created` DESC

SELECT DISTINCT a.* FROM `video` as a 
INNER JOIN `chapter` as b ON a.`id` = b.`video_id` 
INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` 
INNER JOIN `tags` as d ON d.`id` = c.`tags_id` 
INNER JOIN `tagCategories` as e ON d.`tagCategories_id` = e.`id` 
WHERE (e.`id` = '54' AND d.`id` = '228') 
OR (e.`id` = '54' AND d.`id` = '241') 
ORDER BY a.`created` DESC



SELECT DISTINCT
    a.*,
    d.`id` AS `tagid`,
    e.`id` AS `tagCategories_id`
FROM
    `video` AS a
INNER JOIN `chapter` AS b
ON
    a.`id` = b.`video_id`
INNER JOIN `chapterTag` AS c
ON
    b.`id` = c.`chapter_id`
INNER JOIN `tags` AS d
ON
    d.`id` = c.`tags_id`
INNER JOIN `tagCategories` AS e
ON
    d.`tagCategories_id` = e.`id`
WHERE
    (e.`id` > '45' AND e.`id` < '56') AND (d.`id` = '227' OR d.`id` = '228')
GROUP BY
    a.`id`
HAVING
    COUNT(DISTINCT d.`id`) = 2




need to know how many in array

if 1 omit last two 

