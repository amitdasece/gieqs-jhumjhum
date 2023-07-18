<?php

/* File to generate a table JSON at top of page programmeEdit */

//$openaccess = 1;

require ('../../includes/config.inc.php');		
spl_autoload_unregister ('class_loader');

//require (BASE_URI.'/assets/scripts/headerScript.php');

error_reporting(E_ALL);

require_once(BASE_URI . '/pages/learning/classes/video_PDO.class.php');
$video_PDO = new video_PDO;
require_once(BASE_URI . '/pages/learning/classes/video_moderation.class.php');
$video_moderation = new video_moderation;

//echo 'could load video class';

$response =  $video_moderation->getModerationTable();

echo $response;

//echo ltrim($response);

//$video_PDO->endvideo_PDO();
//$video_moderation->endvideo_moderation();