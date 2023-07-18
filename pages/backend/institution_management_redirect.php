<?php 

require ('../../assets/includes/config.inc.php');	
$openaccess = 0;
$requiredUserLevel = 6;

require_once (BASE_URI . '/assets/scripts/login_functions.php');
require(BASE_URI . '/assets/scripts/interpretUserAccess.php');
require_once(BASE_URI . '/assets/scripts/classes/institutional_manager.class.php');
$institutional_manager = new institutional_manager;

//if a superuser direct to management page
///Applications/XAMPP/xamppfiles/htdocs/dashboard/gieqs/pages/backend/institutional_new.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//echo BASE_URI . '/pages/backend/institutional_new.php';


if (isset($userid)){//logged in

    if ($isSuperuser == 1){

        header("location: " . BASE_URL . "/pages/backend/institutional_new.php");
        exit();

    }elseif ($institutional_manager->getInstitutionUser($userid, false) != false){

        $institution_id = $institutional_manager->getInstitutionUser($userid, false)[0]; //only supports the first user

        //echo 'location text is '. BASE_URL . "/pages/backend/institution_landing.php?institution_id=" . $institution_id;
        //exit();
        
        header("location: " . BASE_URL . "/pages/backend/institution_landing.php?institution_id=" . $institution_id);
        exit();

    }elseif ($institutional_manager->getInstitutionUser($userid, false) === false){

        ?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php 
    echo '<div class="container">';
    echo '<p class="mt-4">You are not registered with an institution.</p>';
    echo '<p>Please <a href="mailto:admin@gieqs.com">contact us</a> to link your account if you think this is an error.</p>';
    echo '<p>You can return to GIEQs.com <a href="' . BASE_URL . '">here</a>.</p>';

    exit();

    

    }


}else{

    ?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php 

    echo '<div class="container">';
    echo '<p class="mt-4">You must be logged in to access this page</p>';
    echo '<p>Please <a href="' . BASE_URL . '/login">login</a> with a user able to administrate or view the institution management console</p>';
    exit();

    

}




exit();?>