<?php 

$openaccess = 1;

//$requiredUserLevel = 4;

require ('../includes/config.inc.php');		

$debug = false;

//require (BASE_URI.'/scripts/headerCreatorV2.php');

//(1);
//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');


$general = new general;
$video = new video;

$data = json_decode(file_get_contents('php://input'), true);

$active = $data['active'];
$videoid = $data['videoid'];

if ($debug){
print_r($active);
print_r($videoid);
}

$video->Load_from_key($videoid);

if ($video->getid()){


    $video->setactive($active);
    $result = $video->Save_Active_Row();
    echo $result;
    
    if ($debug){
    print_r($result);
    }

}

$video->endvideo();