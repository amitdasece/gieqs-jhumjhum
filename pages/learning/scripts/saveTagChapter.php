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
$chapterTag = new chapterTag;

//echo 'working';

//die();

$data = json_decode(file_get_contents('php://input'), true);

$chapterid = $data['chapterid'];
$videoid = $data['videoid'];
$tagid = $data['tagid'];

if ($debug){
print_r($active);
print_r($videoid);
}

$video->Load_from_key($videoid);

if ($video->getid()){


    //insert the tag chapter connection

    if ($general->matchTagChapter($chapterid, $tagid)){ //there is no matching chapter tag combo

        $chapterTag->setchapter_id($chapterid);
        $chapterTag->settags_id($tagid);
        $chapterTagid = $chapterTag->prepareStatementPDO();
        $returnarray = ['success'=>true, 'chaptertagid'=>$chapterTagid];
        echo json_encode($returnarray);


    }else{

        $returnarray = ['success'=>false, 'error'=>'This combination of chapter and tag already exists'];
        echo json_encode($returnarray);

    }

    //die();



    //return array
    //['success'=>true/false, 'chaptertagid'=>];

}else{

    $returnarray = ['success'=>false, 'error'=>'This video does not exist'];
    echo json_encode($returnarray);


}

$video->endvideo();