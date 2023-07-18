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

//require (BASE_URI.'/scripts/headerCreatorV2.php');

//(1);
//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');




spl_autoload_unregister ('class_loader');

//$users = new users; //must be users from GIEQs
require(BASE_URI .'/assets/scripts/classes/users.class.php');
$users = new users;

spl_autoload_register ('class_loader');

$general = new general;
$usersLikeVideo = new usersLikeVideo;


$data = json_decode(file_get_contents('php://input'), true);

$videoid = $data['videoid'];
$type = $data['type'];

if ($debug){
print_r($videoid);
print_r($type);
echo '$userid is ' . $userid;
}


if ($users->matchRecord($userid)){

    $users->Load_from_key($userid); //this is checking securely against the db for the logged in user

    if ($type == 1){

        //register like

        $usersLikeVideo->setuser_id($userid);
        $usersLikeVideo->setvideo_id($videoid);
        $result = $usersLikeVideo->prepareStatementPDO();
        if ($result > 1){

            echo 1;
        }
        
        if ($debug){
         print_r($result);
        }

    }else if ($type == 2){

        //remove like

        if ($debug){

            echo 'delete triggered';
        }

        //$q = "DELETE FROM `usersLikeVideo` WHERE `user_id` = '$userid'";
        $result = $usersLikeVideo->deleteLink($userid, $videoid);
        if ($result){
            
         echo '1';

        }



    }else if ($type == 3){

        
        


    }

    

}else{
    if ($debug){
        echo 'Unknown user';
       }
    
    exit();
}

$users->endusers();
$usersLikeVideo->endusersLikeVideo();