<?php
header('Access-Control-Allow-Origin: *');
$openaccess = 1;
//$requiredUserLevel = 4;

require '../includes/config.inc.php';


require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');


//require (BASE_URI.'/scripts/headerCreatorV2.php');

//(1);
//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');

function array_not_unique($a = array())
{
    return array_diff_key($a, array_unique($a));
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

$general = new general;

$navigator = new navigator;

$user = new users;

$usersLikeVideo = new usersLikeVideo;
$usersFavouriteVideo = new usersFavouriteVideo;


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');

$programmeView = new programmeView;


$data = json_decode(file_get_contents('php://input'), true);

$tagsToMatch = $data['requiredTags'];

//$loaded = $data['loaded'];

$loadedRequired = $data['loadedRequired'];

//$active = $data['active'];

//set by referring page
$videoset = $data['videoset'];

$assetid = $data['assetid'];

$color = $data['color'];

if (isset($data['partner'])){

    $partner = $data['partner'];

}


$gieqsDigitalv1 = $data['gieqsDigital'];

$debug = false;
$_SESSION['debug'] = false;


$loadedRequiredProduct = 10 * $loadedRequired;

if ($debug) {
    
    print_r($tagsToMatch);
}

$numberOfTagsToMatch = count($tagsToMatch);

if ($numberOfTagsToMatch < 1) {

    $tagsToMatch = null;

}

if ($debug) {
    print_r('number of tags to match' . $numberOfTagsToMatch);
}


?>


<?php

        //CHANGE ME FOR NEW PAGES

$requiredTagCategories = $data['requiredTagCategories'];

//$requiredTagCategories = ['39', '40', '41', '42'];

$requiredVideos = $data['requiredVideos'];



?>

<?php

$videos = [];
$x = 0;


//v2 in same format as getNav
//$data2 = $navigator->getVideoDatav2($requiredTagCategories, $tagsToMatch, $debug, $active, $gieqsDigitalv1);

if (is_array($requiredVideos)){

    $data2 = $navigator->getVideoDataSimple($requiredVideos, $debug, $active);



}else{


//$data2 = $navigator->getVideoData($requiredTagCategories, $tagsToMatch, $debug, $active, $gieqsDigitalv1);
$data2 = $navigator->getTagVideoData($tagsToMatch, $debug, $active, $gieqsDigitalv1);

}

$videos = $data2;

// echo "<pre>";
// print_r($videos);
// var_dump($videos);
// exit;

if ($debug) {
    echo PHP_EOL . 'html build array contains:::' . PHP_EOL;
    print_r($videos);

    echo json_encode($videos);
}




//if a videoset

/*

1 - videoset
2 - course, show by session one only
3 - course, show by session all items


*/

//determining access

//options 1, reusable code from here in a class
//options 2, save this array to localstorage so does not require determining twice
//option 3 , option 2 on this page, option 1 for other pages [speed up this page, make generalisable]
//for option 3 critical to change / delete every time page loads


/* //determine video access

    dependencies
    assetManager
    programmeView

    so could be in assetManager with programmeView as a dependency

    function determineVideoAccess($videoset, $videoArray, $superuser, $userid)

*/

if (isset($videoset))
{

    if ($videoset == 1){

        $emptyText = 'There are no videos matching your filters.';


        //push out of the data2 array videos that are not part of the asset $assetid

        $videosAsset = $assetManager->returnVideosAsset($assetid);

        foreach ($videos as $key=>$value){


            $array_key = $key;

            $access = null;

            $access = (in_array($value['id'], $videosAsset)) ? true : false;
        
            if (!$access){


                unset($videos[$key]);

                if ($debug){
    
                    echo 'video id ' . $value['id'] . ' was not found in the video asset array';
    
               }
    
            }else{

                if ($debug){

                echo 'video id ' . $value['id'] . ' was found in the video asset array';
                
            }


            }
        

        }

        


    }

    if ($videoset == 2){

        $emptyText = 'There are no videos yet matching these criteria for this course.';


        //push out of the data2 array videos that are not part of the asset $assetid
        $videosForSessions = array();

            //get programme / session info

            $programmes = $assetManager->returnCombinationAssetProgramme($assetid);
            
            if ($debug){

                //var_dump($programmes);
            }

            foreach ($programmes as $key=>$value){


            $sessions = $programmeView->getSessions($value['programme_id']);

                if ($debug){

                    //var_dump($sessions);
                }

                //get programmeid for asset
                foreach ($sessions as $key2=>$value2){

                    if ($value2['sessionid'] != ''){

                        $videosForSessions[] = $programmeView->getVideoURL($value2['sessionid']);

                    }

                }

             }

             //if debug show the videos

             if ($debug){

                var_dump($videosForSessions);

             }

        $videosAsset = $videosForSessions;

        foreach ($videos as $key=>$value){


            $array_key = $key;

            $access = null;

            $access = (in_array($value['id'], $videosAsset)) ? true : false;
        
            if (!$access){


                unset($videos[$key]);

                if ($debug){
    
                    echo 'video id ' . $value['id'] . ' was not found in the video asset array';
    
               }
    
            }else{

                if ($debug){

                echo 'video id ' . $value['id'] . ' was found in the video asset array';
                
            }


            }
        

        }

        


    }

    if ($videoset == 3){

        $emptyText = 'There are no videos yet matching these criteria for this course.';


        //push out of the data2 array videos that are not part of the asset $assetid
        $videosForSessions = array();

            //get programme / session info

            $programmes = $assetManager->returnCombinationAssetProgramme($assetid);
            
            if ($debug){

                //var_dump($programmes);
            }

            $videosForSessions = array();
                    $x = 0;

            foreach ($programmes as $key=>$value){


            $sessions = $programmeView->getSessions($value['programme_id']);

                if ($debug){

                    //var_dump($sessions);
                }

                //get programmeid for asset
                //now shows all session items

                    
                    foreach ($sessions as $key2=>$value2){

                        if ($value2['sessionid'] != ''){

                            $videosForSessions2data = array();
                            $videosForSessions2data = $programmeView->getVideoURLAll($value2['sessionid']);

                            foreach ($videosForSessions2data as $key3=>$value3){

                                if ($value3 != ''){

                                $videosForSessions[$x] = $value3;
                                $x++;

                                }

                            }

                            
                        }

                    }

             }

             //if debug show the videos

             if ($debug){

                var_dump($videosForSessions);

             }

        $videosAsset = $videosForSessions;

        foreach ($videos as $key=>$value){


            $array_key = $key;

            $access = null;

            $access = (in_array($value['id'], $videosAsset)) ? true : false;
        
            if (!$access){


                unset($videos[$key]);

                if ($debug){
    
                    echo 'video id ' . $value['id'] . ' was not found in the video asset array';
    
               }
    
            }else{

                if ($debug){

                echo 'video id ' . $value['id'] . ' was found in the video asset array';
                
            }


            }
        

        }

        


    }


}else{

    //normal page
    
    //$videos = $assetManager->determineVideoAccessNonAsset($data2, $isSuperuser, $userid, true);
   

    $emptyText = 'No videos match your criteria. Please reset your filters above.';

}


?>


<?php

                //new script

                //using data2

                $a = 1;

                $b = count($videos);

                if ($b == 0){

                    ?>

<div class="d-flex flex-row flex-wrap justify-content-center mt-1 pt-0 px-0 text-white">
    <span class=" mt-3 mb-6 h6"><?php echo $emptyText;?></span>
</div>
<?php
                }

                

                foreach ($videos as $key=>$value){

                    

                    //make the html for the cards (in groups of +10)

                    if ($a == 1){

                        ?>

<div class="card-deck flex-column flex-lg-row mb-5">
    <?php }
                    if ($a < $loadedRequiredProduct){

                    
                    
?>

    <div class="card mr-md-4 individualVideo flex-even">
        <div class="card-header" style="height:127px;">
            <div class="row align-items-right my-0">
                <div class="col-12 my-0 pr-0">
                    <div class="actions text-right">
                        <!-- <a class="action-item action-favorite" data-toggle="tooltip"
                            data-original-title="Mark as favorite" data="<?php echo $value['id'];?>">
                            <i
                                class="fas fa-heart <?php if ($usersFavouriteVideo->matchRecord2way($userid, $value['id']) === true){echo 'gieqsGold';}else{echo 'text-muted';}?>"></i>
                        </a>


                        <a class="action-item action-like active" data-toggle="tooltip" data-original-title="Like"
                            data="<?php echo $value['id'];?>">
                            <i
                                class="fas fa-thumbs-up <?php if ($usersLikeVideo->matchRecord2way($userid, $value['id']) === true){echo 'gieqsGold';}else{echo 'text-muted';}?>"></i>
                        </a> -->
                    </div>
                </div>
            </div>
            <div class="row align-items-center text-break">
                <div class="col-12 text-break">
                    <?php 
                        $turl_video = BASE_URL . '/videos/' . $value['id'] ;
                    ?>
                    <h5 class="card-title title mb-0 w-100"><?php echo $value['name']; ?></h5>
                    <p class="text-muted text-sm mt-1 mb-0 align-self-baseline">Author : <a class="author text-muted"
                            data-author="<?php echo $value['author'];?>" target="_blank"
                            href="<?php echo BASE_URL;?>/pages/learning/pages/account/public-profile.php?id=<?php echo $value['author'];?>"><?php echo $user->getUserName($value['author']); ?></a>
                    </p>
                    <div class="d-flex flex-row-reverse">
                        <span class="badge text-dark p-1 type"
                            data-type="<?php echo $navigator->getVideoTypeid($value['id']);?>"
                            style="color:rgb(238, 194, 120) !important;"><?php echo $navigator->getVideoTypeidv2($value['id']);?></span>
                    </div>

                </div>
            </div>

        </div>

        <?php

        if (isset($partner)){

            if ($partner == 'sies'){

                $url_video = BASE_URL . '/pages/learning/viewer_sies.php?id=' . $value['id'] . '&referid=' . $data['referringUrl'];

            }elseif ($partner == 'esge'){
                
                                $url_video = BASE_URL . '/pages/learning/viewer_esge.php?id=' . $value['id'] . '&referid=' . $data['referringUrl'];

                
            }else{

                $url_video = BASE_URL . '/videos/' . $value['id'] . '&referid=' . $data['referringUrl'];
            }

        }else{

            $url_video = BASE_URL . '/videos/' . $value['id'] . '&referid=' . $data['referringUrl'];


        }

        ?>

        <a
            href="<?php echo $url_video; ?>">
            <img alt="video image" src="<?php echo $value['thumbnail']; ?>" class="img-fluid mt-2">
        </a>

        <div class="card-body">
            <p class="card-text"><?php echo $value['description']; ?></p>
        </div>
        <div class="card-footer">
            <div class="row align-items-center">

                <?php 
                        
                        $videoIsGIEQsDigital = false;
                        $videoIsGIEQsDigital = ($navigator->videoIsGIEQsDigitalv1($value['id']) ? true : false);

                        
                        
                        if (!$videoIsGIEQsDigital){?>
                <div class="col-6">
                    <a href="<?php echo BASE_URL . '/videos/' . $value['id'] . '&referid=' . $data['referringUrl']; ?>"
                        class="btn btn-sm text-dark gieqsGoldBackground">View</a>
                </div>
                <div class="col-6 text-right">
                    <span class="text-muted created text-sm"
                        data-created="<?php echo $value['created'];?>"><?php echo time_elapsed_string($value['created']);?></span>
                </div>
                <?php }else if ($videoIsGIEQsDigital) {?>
                <div class="col-4">
                    <a href="<?php echo BASE_URL . '/videos/' . $value['id'] . '&referid=' . $data['referringUrl']; ?>"
                        class="btn btn-sm text-dark gieqsGoldBackground">View</a>
                </div>
                <div class="col-3">
                    <img class="img-responsive" width="140%"
                        src="<?php echo BASE_URL . '/assets/img/brand/gieqs_digital.png';?>">
                </div>
                <div class="col-5 text-right">
                    <span class="text-muted created text-sm"
                        data-created="<?php echo $value['created'];?>"><?php echo time_elapsed_string($value['created']);?></span>
                </div>


                <?php }else {?>


                <?php }?>

            </div>
        </div>
    </div>







    <?php
                    }

                    if ($a % 3 == 0){
                        ?>
</div>
<div class="d-flex flex-row flex-wrap justify-content-center mt-1 pt-0 px-0 text-white">

    <?php
                    }

                    $a++;

                }

                if ($b > $loadedRequiredProduct - 1){

                    ?>

</div>
<div class="d-flex flex-row-reverse flex-wrap mt-1 pb-6 pt-0 px-0 text-white">

    <button class="align-self-end btn btn-sm text-dark gieqsGoldBackground" id="loadMore">Load more videos..</button>


    <?php

                }

                if ($b == 1){

                    ?>
    <div class="d-flex flex-row flex-wrap card-placeholder justify-content-center mt-1 pt-0 px-0 text-white">
    </div>
    <div class="d-flex flex-row flex-wrap card-placeholder justify-content-center mt-1 pt-0 px-0 text-white">
    </div>
    <?php

                }

                if ($b == 2){

                    ?>
    <div class="d-flex flex-row flex-wrap card-placeholder justify-content-center mt-1 pt-0 px-0 text-white">
    </div>
    <?php

                }

?>