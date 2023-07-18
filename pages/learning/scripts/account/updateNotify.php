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


$general = new general;
$users = new users;

$data = json_decode(file_get_contents('php://input'), true);

$notification = $data['notification'];
$type = $data['type'];

if ($debug){
print_r($notification);
print_r($type);
echo '$userid is ' . $userid;
}






if ($users->matchRecord($userid)){

    $users->Load_from_key($userid);

    if ($type == 1){

        $users->setemailAccount($notification);
        $result = $users->prepareStatementPDOUpdate();
        echo $result;
        
        if ($debug){
         print_r($result);
        }

    }else if ($type == 2){

        $users->setemailServices($notification);
        $result = $users->prepareStatementPDOUpdate();
        echo $result;
        
        if ($debug){
         print_r($result);
        }


    }else if ($type == 3){

        $users->setemailPartners($notification);
        $result = $users->prepareStatementPDOUpdate();
        echo $result;
        
        if ($debug){
         print_r($result);
        }


    }

    

}else{
    if ($debug){
        echo 'Unknown user';
       }
    
    exit();
}

$users->endusers();