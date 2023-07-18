<?php 

$openaccess = 1;

//$requiredUserLevel = 4;

require ('../../assets/includes/config.inc.php');	

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
$emailList = new emailList;
$userFunctions = new userFunctions;

$info = [];

//$data = json_decode(file_get_contents('php://input'), true);

if (count($_GET) > 0){

    

    if (isset($_GET['email'])){

        $data = $_GET['email'];

        
    }else{

        $info[] = 'no GET email detected';
        exit();

    }

}else{


    $info[] = 'no GET parameters detected';
    print_r($info);
    exit();

}

$data = $general->sanitiseInput($data);

$info[] = 'GET contains ' . $data; 





if ($emailList->matchRecord($data)){

    $id = $userFunctions->getEmailListKey($data);

    $info[] = 'id contains ' . $id; 

    $emailList->Load_from_key($id);

    

        $emailList->setoptOut('1');
        $result = $emailList->prepareStatementPDOUpdate();
        
        if ($result == 1){

            echo 'You were removed from the mailing list';

        }else if ($result == 0){

            echo 'You have already been removed from the mailing list';
        }
        
        
    

}else{
    $info[] = 'Unknown User';
    print_r($info);
    
    exit();
}

$emailList->endemailList();