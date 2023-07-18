<?php

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

$debug = false;

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

$users = new users;

$usersViewsVideo = new usersViewsVideo;
$usersLikeVideo = new usersLikeVideo;
$usersFavouriteVideo = new usersFavouriteVideo;
$usersMetricsManager = new usersMetricsManager;
$usersSocial = new usersSocial;
$video_PDO = new video_PDO;





require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');

$programmeView = new programmeView;


$data = json_decode(file_get_contents('php://input'), true);

?>




<?php

$debug = false;

//data definition

$lastViewedVideos = $usersMetricsManager->getLastViewedVideosCompletion($userid, false);

if ($debug){

print_r($lastViewedVideos);

}



?>


<div class="card-deck flex-column flex-lg-row mb-5">

    <?php 
                          $a = count($lastViewedVideos);
                          if ($debug){

                            echo 'count is is ' .$a;
                          }

    foreach ($lastViewedVideos as $key=>$value){
  $video_PDO->Load_from_key($value);
  $key = $usersMetricsManager->getKeyUserViewsVideoMatch($userid, $value);
  if ($debug){

    echo $key;
  }
  $usersViewsVideo->Load_from_key($key);
  if ($debug){

    echo 'recent view is ' . $usersViewsVideo->getrecentView();
  }
  
  ?>



    <div class="card">
        <div class="card-header" style="height:120px;">
            <small
                class="ml-auto text-right gieqsGold"><?php echo $assetManager->getSuperCategoryName($assetManager->getVideoSuperCategory($value));?></small>

            <div class="d-flex align-items-center">
                <!-- <span class="avatar bg-primary text-white rounded-circle avatar-lg">TC</span> -->
                <div class="avatar-content ml-3">
                    <h6 class="mb-0"><a
                            href="<?php echo BASE_URL . '/videos/' . $value; ?>"><?php echo $video_PDO->getname();?></a>
                    </h6>
                    <small class="d-block text-muted font-weight-bold"><a
                            href="<?php echo BASE_URL;?>/pages/learning/pages/account/public-profile.php?id=<?php echo $video_PDO->getauthor();?>"><?php echo $users->getUserName($video_PDO->getauthor()); ?></a></small>
                    <small class="text-muted"><i
                            class="fas fa-clock mr-2"></i><?php echo time_elapsed_string($usersViewsVideo->getrecentView());?></small>


                </div>
            </div>
        </div>

        <?php 

        $completion = $usersMetricsManager->userCompletionVideo($userid, $value, false);
        $completion = floor($completion);

        ?>

        <div class="progress-wrapper pt-3 pb-1 px-2">
            <div class="progress progress-xs mt-2">
                <div class="progress-bar bg-gieqsGold" role="progressbar" aria-valuenow="20"
                    aria-valuemin="0" aria-valuemax="100"
                    style="width: <?php echo $completion;?>%;"></div>
            </div>
            <small class="progress-percentage p-1 mr-4"><?php echo $completion;?>% <small
                    class="font-weight-bold">complete</small></small>

        </div>

        <a href="<?php echo BASE_URL . '/videos/' . $value; ?>">
            <img alt="video image" src="<?php echo $video_PDO->getthumbnail(); ?>"
                class="img-fluid mt-2">
        </a>
        <div class="card-body">


            <small class="h6 text-sm font-weight-bold">Description:</small>
            <p class="text-sm lh-160 mb-0"><?php echo $video_PDO->getdescription();?></p>
        </div>
    </div>

    <?php }
    
    if ($a == 1){

      echo '<div class="card"></div>
    <div class="card"></div>';

    }elseif ($a == 2){

      echo '<div class="card"></div>';

    }elseif ($a == 0){

      echo '<div class="card"></div>
    <div class="card"></div><div class="card"></div>';

    }
    
    ?>





</div> <!-- end new material div-->