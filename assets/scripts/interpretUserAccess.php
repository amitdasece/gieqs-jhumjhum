<?php
//session_start();

/* $can_i_write = is_writable("/home/u8l2e829uoi9/scripts/session");
echo 'session directory writable is ';
var_dump($can_i_write); */


//user access variables

//$openaccess = 1 allows the page to be viewed without login and skips the rest of the script
//$requiredUserLevel corresponds to database users access level; if not set the page simply requires login
//$paid allows setting of pages which require subscription and login

//define token from url
//echo 'hello';

//error_reporting(E_ALL);

//echo 'Apologies.  GIEQs.com has a problem.  We will be back shortly.';


require(BASE_URI . '/assets/scripts/classes/assetManager.class.php');

    



spl_autoload_unregister ('class_loader');

$assetManager = new assetManager;


spl_autoload_register ('class_loader');

$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
$url_requested = $url_components['path'];


if (isset($url_requested)){

    $use_url = true;

    //print_r($url_requested);

   // exit();

   if (strpos($url_requested, '/pages/authentication/login.php')){

        $location =  null;

        //echo 'here contains';

    }else{
        $url_requested = urlencode($url_requested);

         $location = BASE_URL . '/pages/authentication/login.php?destination=' . $url_requested;

         //echo 'here';

    }

    //print_r($location);

}else{

    $use_url = false;
}

//exit();


//define the request
$debugUserAccess = false;

if (!isset($debugUserAccess)){
$debugUserAccess = FALSE;
}
//$debug = FALSE;

$info = [];

$info[] = 'the redirect location is set as ' . $location;

if (count($_GET) > 0){

    if (isset($_GET['token'])){

        $token = $_GET['token'];

        if ($token){

            $info[] = 'token detected';
            
        }

    }else{

        $info[] = 'no token detected';

    }

}else{


    $info[] = 'no GET parameters detected';

}



if ($debugUserAccess){
echo 'in interpretuserAccess';
echo '<br>DB data is <br>';
echo 'DB : ' . print_r(DB);
echo '<br>DB_HOST : ' . print_r(DB_HOST);
echo '<br>DB_USER : ' . print_r(DB_USER);
echo '<br>DB_HOST : ' . print_r(DB_HOST);
echo '<br>DB_NAME : ' . print_r(DB_NAME);

print_r($_SESSION);
}




//script for detection of page related variables in header
if ((isset($openaccess)) && $openaccess == 1){

    $info[] = 'page is open access';

    

        //unset($userid);
    
        if ($openaccess == 1){
    
            //set user id
    
            if (isset($_SESSION['user_id'])) {
    
                $userid = $_SESSION['user_id'];
    
                $info[] = 'page was open access but a user id was found in the session so was assigned (' . $userid . ')';
            }
    
            //set user access level
    
            if (isset($_SESSION['access_level'])) {

                $info[] = 'page was open access but a user access level was found in the session so was assigned (' . $_SESSION['access_level'] . ')';
    
                    $currentUserLevel = $_SESSION['access_level'];
    
                    //require(DB);
                    $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
                    $sql = "SELECT `user_id`, `access_level` 
                    FROM `users` WHERE `user_id` = $userid";

                    $info[] = 'the sql query is ' . $sql;
                    $result = mysqli_query ($dbc, $sql);
                    //$info[] = 'the result is ' . var_dump($result);
                    //var_dump($result);
                    
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_array($result)) {
                            $databaseUserAccessLevel = $row['access_level'];
                        }
    
                        if ($databaseUserAccessLevel != $currentUserLevel){
    
                            if (!$debugUserAccess){
                            redirect_login($location);
                        }
    
                        }
                    }else{
    
                        $databaseUserAccessLevel = NULL;
        
                     }

                     $info[] = 'the database user access level is ' . $databaseUserAccessLevel . 'after comparing to the session access level of ' . $currentUserLevel;
    
                    mysqli_free_result($result);
                    mysqli_close($dbc);
    
            }
            else if (isset($userid)) 
            {
    
                //$currentUserLevel = $_SESSION['access_level'];

                //require(DB);
                $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
                $sql = "SELECT `user_id`, `access_level` 
                FROM `users` WHERE `user_id` = $userid";
                $result = mysqli_query ($dbc, $sql);
                
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result)) {
                        $databaseUserAccessLevel = $row['access_level'];
                    }

                }else{

                    $databaseUserAccessLevel = NULL;
    
                 }

                mysqli_free_result($result);
                mysqli_close($dbc);

            }

            //set superuser status
        
            if ($databaseUserAccessLevel == '1'){
    
                $isSuperuser = 1;
        
            }else{
        
                $isSuperuser = 0;
            }
        
        
        if (isset($onlySuperuser) && ($onlySuperuser == true)){
    
            $info[] = 'only super user can access the site set in config.inc.php';
    
            if ($isSuperuser != 1){
    
                if (!$debugUserAccess){
                    redirect_login($location);
                }
    
            }
    
        }
        
    
        $currentTime = new DateTime('now', $serverTimeZone);  //CHANGE FOR LIVE
        //$currentTime = new DateTime('2020-10-09 15:45:20', $serverTimeZone);
    
        
        }
    
       
        
    
        
    
    
    //dothings where open access allowed
    

}else{

    //if a token is present allowing access to the page then allow
    //else reject
    if ((isset($tokenaccess)) && $tokenaccess == 1){
        if (isset($token)){

            //echo 'token set is' . $token;

            //why does this require login

            $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
            //print_r($dbc);
            $sql = "SELECT `user_id`, `access_level`, `firstname`, `surname` FROM `users` WHERE `key` = '$token'";
            //echo $sql;
            $result = mysqli_query ($dbc, $sql);
            //print_r($result);
            if(mysqli_num_rows($result) > 0){

                while($row = mysqli_fetch_array($result)) {
                    $userid = $row['user_id'];
                    //do login?
                    /* $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['surname'] = $row['surname'];
                    $_SESSION['access_level'] = $row['access_level'];
                    $_SESSION['siteKey'] = 'TxsvAb6KDYpmdNk'; */


                    $info[] = 'token access allowed for user id ' . $row['user_id'];
                    
                }

                //echo $userid;
                goto c;
    
            }else{
                    echo 'token did not match any userid';
                    unset($token);
                    $info[] = 'token access checked and denied';
                    goto a;
                    
    
            }

             

            

            mysqli_free_result($result);
            mysqli_close($dbc);

            //allow access if token valid from database

            //if so goto c:

            
            //get user id from token
            //reset token once used

        }
    }


    a:{
//echo 'made it to a';

if ($debugUserAccess){

print_r($_SESSION);
print_r($info);
}

if (!isset($_SESSION['user_id']) || !isset($_SESSION['access_level'])) {
    $info[] = 'ONE OF user_id and access_level are NOT set in the session.  ACCESS DENIED';
    
    if (!$debugUserAccess){
                        redirect_login($location);
                    }
}else{

    $info[] = 'user_id and access_level are both set in the session';
}

$userid = $_SESSION['user_id'];

if ($userid){
$info[] = 'user_id set as ' . $userid;
}


//IF USER LEVEL REQUIRED NOT SET ASSUME 2

if (!isset($requiredUserLevel)){

    $requiredUserLevel = 2;
    $info[] = 'requiredUserLevel was not set so was set at default of 2 since the user is logged in';

}else{

    $info[] = 'requiredUserLevel was set on the page as ' . $requiredUserLevel;

}

//print_r($info);

if (isset($requiredUserLevel)){

    //if the requiredUserLevel variable is present on the referring page
    
    $currentUserLevel = $_SESSION['access_level'];
    //echo $currentUserLevel;

    //check the access level in the session matches the userid in the database

    //require(DB);
    $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
            $sql = "SELECT `user_id`, `access_level` 
            FROM `users` WHERE `user_id` = $userid";
            $result = mysqli_query ($dbc, $sql);
            
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)) {
                    $databaseUserAccessLevel = $row['access_level'];
                    
                }

                if ($databaseUserAccessLevel != $currentUserLevel){

                    if (!$debugUserAccess){
                        redirect_login($location);
;
                    }

                }else{

                    $info[] = 'access level for this user as set in the session (' . $currentUserLevel . ') was checked against the database ('. $databaseUserAccessLevel .') and is the same)';
                }
            }

            mysqli_free_result($result);
            mysqli_close($dbc);

    //reject an inactive user with level 9


    
    if ($currentUserLevel == 9){

       
        if (!$debugUserAccess){
                        redirect_login($location);
;
                    }

    }
    
            //reject any user that does not have access higher or equal to that specified

    $info[] = 'current user has following rights (current user level is ' . $currentUserLevel . ') versus (required user level is '. $requiredUserLevel .')';
    
    //FOR FREE TRIAL AFTER GIEQS FOR THOSE LOGGED IN

        //FROM 1 WEEK PRIOR TO 1 MONTH AFTER ALL HAVE LEVEL 4 ACCESS

        //1/10 TO 9/11

        $startGlobalAccessDate = new DateTime('2020-10-01 00:00:01', new DateTimeZone('UTC'));

        $endGlobalAccessDate = new DateTime('2020-11-09 00:00:01', new DateTimeZone('UTC'));
        $endGlobalAccessDate = new DateTime('2020-10-09 00:00:01', new DateTimeZone('UTC')); //COMMENT HERE


        $currentTime = new DateTime('now', $serverTimeZone);


        if ($currentTime > $startGlobalAccessDate && $currentTime < $endGlobalAccessDate){

            if ($currentUserLevel == '6'){

                $currentUserLevel = '4';

            }else if($currentUserLevel == '5'){

                $currentUserLevel = '4';

            }


        }


    if ($currentUserLevel > $requiredUserLevel){

       
        if (!$debugUserAccess){
                        redirect_login($location);
                    }

    }

    //CHECK THE SUPERUSER STATUS, variable $isSuperuser

    if ($databaseUserAccessLevel == '1'){

        $isSuperuser = 1;

        $info[] = 'user is a superuser';


    }else{

        $isSuperuser = 0;

        $info[] = 'user is not a superuser';
    }

    //determine subscription to all videos and/or images, variables $subscriptionVideo, $subscriptionImage
    //not relevant to these databases

    

    



    /*
    $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $sql = "SELECT `subscriptionVideo`, `subscriptionImage`
            FROM `subscriptionUser` WHERE `user_id` = $userid";
            //echo $sql;
            $result = mysqli_query ($dbc, $sql);
            
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)) {
                    if ($row['subscriptionVideo'] == '1'){

                        $subscriptionVideo = 1;

                    }else{

                        $subscriptionVideo = 0;
                    }

                    if ($row['subscriptionImage'] == '1'){

                        $subscriptionImage = 1;

                    }else{

                        $subscriptionImage = 0;
                    }
                }

             }else{

                $subscriptionVideo = 0;
                $subscriptionImage = 0;
            }

            mysqli_free_result($result);
            mysqli_close($dbc);





*/
}
//identify with the variables in the top of the original file
//$userLevel
//$paid, not yet implemented

}




c:{
//echo 'made it to c';
//do things for token access

}




}

if (isset($userid)){

    //live
    
    //$info[] = '\$livetestingusers contains (' . $liveTestingUsers . ')';
    
    if (in_array($userid, $liveTestingUsers)) {
        $live = 1;
        $liveTest = 1;
        $info[] = 'Live testing activated for (' . $userid . ')';
    
    }
    
    if ($liveTest){
        $currentTime = new DateTime('2020-10-08 12:45:20', $serverTimeZone);
        }
    
    $currentTime = new DateTime('now', $serverTimeZone); //ADD in for Live  CHANGE FOR LIVE
    
    //$currentTime = new DateTime('2020-10-09 12:45:20', $serverTimeZone);
    
    
    //further info re live
    
    //generates array of the live sessions that a user has access to
    
    spl_autoload_unregister ('class_loader');
    
    require(BASE_URI .'/assets/scripts/classes/userFunctions.class.php');
    
    $userFunctions = new userFunctions;
    
    spl_autoload_register ('class_loader');
    
    //$userFunctions = new userFunctions;
    
    $liveAccess = $userFunctions->enrolmentPatternLive($userid);
    
    $info[] = 'page determines live access to the following live events for (' . $userid . ')';
    $info[] = $liveAccess;
    //print_r($liveAccess);
    
    
    
    
    
     # ******************** #
        # ***** USER TRACKING ***** #
    
        //ensure users activity logged
    
        spl_autoload_unregister ('class_loader');
    
        require(BASE_URI .'/assets/scripts/classes/userActivity.class.php');
    
        $userActivity = new userActivity;
    
        spl_autoload_register ('class_loader');
    
        if ($userid){
    
            //getcurrent UTC time
            $date = new DateTime('now', new DateTimeZone('UTC'));
            $sqltimestamp = date_format($date, 'Y-m-d H:i:s');
            
            //add a user activity event to the database
            
            //TODO add which page they visited
    
            //TODO Cron clean up userActivity
    
            $userActivity->New_userActivity($userid, null, null, $sqltimestamp);
            
            $userActivity->prepareStatementPDO();
    
            
        }  
    
    
        # ******************** #
        # ***** USER ACCESS SUBSCRIPTIONS ***** #
    
    
    
        
        //site wide access
    
       //comment here
    
    if ($assetManager->getSiteWideSubscription($userid, $debug)){
    
      //there is a site wide subscription
      if ($debugUserAccess){
        echo 'there is a site wide subscription';
        }
      
      
      //check if active 
    
      $datetime_utc = new DateTime('now', new DateTimeZone('UTC'));
    
      if ($assetManager->isSubscriptionActive($assetManager->getSiteWideSubscription($userid, $debugUserAccess), $datetime_utc, $debugUserAccess)){
    
        //is active
        if ($debugUserAccess){
          echo 'it is active';
          }
    
          $siteWide = true;
          $siteWideSubscriptionid = $assetManager->getSiteWideSubscription($userid, $debugUserAccess);
    
          if ($debugUserAccess){
            echo 'SUBSCRIPTION ID IS ' . $siteWideSubscriptionid;
            }
    
          //find out which asset
    
          $assetid_subscription = $assetManager->getAssetid($siteWideSubscriptionid);
    
          if ($debugUserAccess){
            echo 'ASSET ID IS ' . $assetid_subscription;
            }
    
          //allocate umber based on 6 FREE, 5 STANDARD, 4 PRO
    
          $sitewide_status = $assetManager->getMembershipStatusAssetid($assetid_subscription);
    
          if ($debugUserAccess){
            echo 'SITE WIDE STATUS IS ' . $sitewide_status;
            }
          //which asset?
    
          //standard or pro?
    
            if ($currentUserLevel > 3){
    
          if ($sitewide_status == 1){
    
            $currentUserLevel = 4;        
    
          }elseif ($sitewide_status == 2){
    
            $currentUserLevel = 4;        
    
          }
    
        }
    
    
          
    
        //check if expiring Soon
    
        if ($assetManager->subscription_expires_soon($assetManager->getSiteWideSubscription($userid, $debugUserAccess), $debugUserAccess)){
    
          //expiring soon
    
          if ($debugUserAccess){
            echo 'it is expiring soon';
            }
    
            $siteWideExpiring = true;
    
    
        }else{
    
          //not expiring soon
    
          if ($debugUserAccess){
            echo 'it is not expiring soon';
            }
    
            $siteWideExpiring = false;
        }
    
    
      }else{
    
        //subscription inactive
        if ($debugUserAccess){
          echo 'the subscription is inactive';
          }
    
          if ($currentUserLevel < 4){
    
            //allow GIEQs Pro
            if ($debugUserAccess){
              echo 'allow gieqs pro due to user level';
              }
    
              $sitewide_status = 2;
              
        
          }
    
      }
    
    }else{
    
      //there is no site wide subscription
    
      if ($debugUserAccess){
        echo 'there is no site-wide subscription';
        }
    
        
    
      //go by currentUserLevel
      // if < 4 then ok and permanent
    
      if ($currentUserLevel < 4){
    
        //allow GIEQs Pro
        if ($debugUserAccess){
          echo 'allow gieqs pro due to user level';
          }
    
          $sitewide_status = 2;
    
    
          $siteWide = false;  //unless it starts a subscription if not found this should be false
    
      }else{
    
        //no subscription and no user level access
        //therefore no access
        if ($debugUserAccess){
          echo 'no subscription and no user level access
          therefore no access';
          }
    
          $siteWide = false;
          $sitewide_status = 99;
    
    
    
      }
    
      
    
    }  //comment here
    
    //end if userid
    
    }

if ($debugUserAccess){
print_r($info);

//also optionally debug cookies
echo '<br/>';
print_r($_COOKIE);
echo '<br/>';
echo '<div id="localStorageDebug"></div>';

}