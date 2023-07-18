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


$data = json_decode(file_get_contents('php://input'), true);

$profile = $data['profile'];

if ($debug){
print_r($profile);
echo '$userid is ' . $userid;
}

if ($profile != '2379'){

    exit();

}


if ($users->matchRecord($userid)){

    $users->Load_from_key($userid); //this is checking securely against the db for the logged in user

    //if the user is basic

    if ($users->getaccess_level() == 6){

        $users->setaccess_level(5);
        $result = $users->prepareStatementPDOUpdate();
        if ($result == 1){

            echo 'User profile updated';
        
        }else{

            //error
        }

    }else{

        echo 'User not eligible for upgrade';
    }
    
    

}else{
    if ($debug){
        echo 'Unknown user';
       }
    
    exit();
}

$users->endusers();
