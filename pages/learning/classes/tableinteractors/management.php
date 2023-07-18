<?php

/* File to generate a table JSON at top of page programmeEdit */

//$openaccess = 1;

require ('../../includes/config.inc.php');		

//require (BASE_URI.'/assets/scripts/headerScript.php');


$video_PDO = new video_PDO;
$video_moderation = new video_moderation;

//echo 'could load video class';

$response =  $video_moderation->getManagementTable();

echo $response;

//echo ltrim($response);

$video_PDO->endvideo_PDO();
$video_PDO->endvideo_moderation();