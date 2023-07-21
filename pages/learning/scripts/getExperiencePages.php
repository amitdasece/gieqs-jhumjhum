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

// $general = new general;

// $navigator = new navigator;

// $users = new users;

// $usersViewsVideo = new usersViewsVideo;
// $usersLikeVideo = new usersLikeVideo;
// $usersFavouriteVideo = new usersFavouriteVideo;
// $usersMetricsManager = new usersMetricsManager;
// $usersSocial = new usersSocial;
// $video_PDO = new video_PDO;





require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

// require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');

// $programmeView = new programmeView;


$data = json_decode(file_get_contents('php://input'), true);

?>
<?php


              //data definition

              $experience_id = $_POST['experience_id'];
              $newPages = null;

              $newPages = $assetManager->getAllexperiencesPages($experience_id);

                         


?>
                    <option value="" selected disabled hidden>please select option</option>
                    <?php 
                        foreach($newPages as $value)
                        { ?>
                             <option value="<?php echo $value['id'] ?>"><?php echo $value['experience_title'] ?> </option>

                      <?php  }
                    
                    ?>

                    