<?php 

$openaccess = 1;

//$requiredUserLevel = 4;

require ('../../includes/config.inc.php');	

require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$debug = false;

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

//require (BASE_URI.'/scripts/headerCreatorV2.php');

//(1);
//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');




/* spl_autoload_unregister ('class_loader');

//$users = new users; //must be users from GIEQs
require(BASE_URI .'/assets/scripts/classes/users.class.php'); */
$users = new users;

/* spl_autoload_register ('class_loader'); */

$general = new general;
$usersCommentsVideo = new usersCommentsVideo;
$usersSocial = new usersSocial;


$data = json_decode(file_get_contents('php://input'), true);

$videoid = $data['videoid'];


if ($debug){
print_r($videoid);
//print_r($comment);
echo '$userid is ' . $userid;
}

//load all comments from users for a specific videoid


$commentsArray = $usersSocial->getComments($videoid);

if ($commentsArray){

    //print_r($commentsArray);

    foreach ($commentsArray as $key=>$value){

      if ($users->matchRecord($value['user_id'])){

        $users->Load_from_key($value['user_id']);

      }
      $timestamp = date("Y-m-d H:i:s");

      if ($users->gettimezone()){


      
    $userTimezone = new DateTimeZone($users->gettimezone());
    $gmtTimezone = new DateTimeZone('GMT');
    $myDateTime = new DateTime($value['created'], $gmtTimezone);
    $offset = $userTimezone->getOffset($myDateTime);
    $myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
    $myDateTime->add($myInterval);
    $result = $myDateTime->format('Y-m-d H:i:s');

  }else{
    $result = $value['created'];
  }
        
        ?>

        <!-- <div class="mb-3"> -->
                  <div class="media media-comment">
                  <a class="avatar bg-gieqsGold text-dark avatar-md rounded-circle mr-3 p-1"><?php echo $users->getUserInitials($value['user_id']);?></a>
                    <div class="media-body">
                      <div class="media-comment-bubble left-top">
                        <h6 class="mt-0 mb-0"><?php echo $users->getfirstname() . ' ' . $users->getsurname();?></h6>
                        <span class="small text-muted"><?php echo time_elapsed_string($result);?></span>
                        <p class="text-sm lh-160"><?php echo $value['comment'];?></p>
                        <!-- <div class="icon-actions">
                          <a href="#" class="love active">
                            <i class="fas fa-heart"></i>
                            <span class="text-muted">10 likes</span>
                          </a>
                          <a href="#">
                            <i class="fas fa-comment"></i>
                            <span class="text-muted">1 reply</span>
                          </a>
                        </div> -->
                      </div>
                    </div>
                  </div>




<?php
    }

    //generate the structure

    

    

}else{
    if ($debug){
        echo 'Unknown user';
       }
    
    exit();
}

$users->endusers();
$usersCommentsVideo->endusersCommentsVideo();