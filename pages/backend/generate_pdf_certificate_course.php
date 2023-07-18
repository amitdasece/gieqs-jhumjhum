<?php
//$openaccess = 1;

$requiredUserLevel = 3;

require_once '../../assets/includes/config.inc.php';
require (BASE_URI.'/assets/scripts/headerScript.php');

$location = BASE_URL . '/index.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



$debug = false;
$_SESSION['debug'] == false;

$general = new general;
$users = new users;

//$users->Load_from_key($userid);

error_reporting(E_ALL);

require_once(BASE_URI . '/assets/scripts/classes/courseManager.class.php');
$courseManager = new courseManager;

require_once BASE_URI . '/assets/scripts/classes/programme.class.php';
$programme = new programme;

require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
$sessionView = new sessionView;

require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
$sessionView = new sessionView;

require_once BASE_URI . '/assets/scripts/classes/assetManager.class.php';
$assetManager = new assetManager;

require_once BASE_URI . '/assets/scripts/classes/assets_paid.class.php';
$assets_paid = new assets_paid;

require_once BASE_URI . '/assets/scripts/classes/subscriptions.class.php';
$subscription = new subscriptions;

require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;
//error_reporting(E_ALL);

require_once BASE_URI . '/pages/learning/classes/navigator.class.php';
$navigator = new navigator;

require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;

require_once BASE_URI . '/assets/scripts/classes/programmeView.class.php';
$programmeView = new programmeView;


require_once BASE_URI . '/pages/learning/classes/usersMetricsManager.class.php';
$usersMetricsManager = new usersMetricsManager;


require_once BASE_URI . '/assets/scripts/classes/curriculae.class.php';
$curriculae = new curriculae;

require_once BASE_URI . '/assets/scripts/classes/curriculum_items.class.php';
$curriculum_items = new curriculum_items;

require_once BASE_URI . '/assets/scripts/classes/curriculum_references.class.php';
$curriculum_references = new curriculum_references;

require_once BASE_URI . '/assets/scripts/classes/curriculum_sections.class.php';
$curriculum_sections = new curriculum_sections;

require_once BASE_URI . '/assets/scripts/classes/curriculum_tags.class.php';
$curriculum_tags = new curriculum_tags;

require_once BASE_URI . '/assets/scripts/classes/curriculum_manager.class.php';
$curriculum_manager = new curriculum_manager;

require_once BASE_URI . '/assets/scripts/classes/symposium_manager.class.php';
$symposium_manager = new symposium_manager;

require_once BASE_URI . '/assets/scripts/classes/symposium.class.php';
$symposium = new symposium;

$sessionView = new sessionView;
$programmeReports = new programmeReports;
$sessionItem = new sessionItem;


//error_reporting(E_ALL);

//$_SESSION['debug'] == true;

//echo 'hello';

// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
spl_autoload_unregister ('class_loader');

//

require_once BASE_URI . "/vendor/autoload.php";

use setasign\Fpdi\Fpdi;

$data = json_decode(file_get_contents('php://input'), true);


$assetid = $data['assetid'];
$userid_set = $data['userid'];

//var_dump($data);
//exit();

if (!(isset($assetid))){

    echo 'Error - asset id not set';
    exit();

}

if (!(isset($userid_set))){

    echo 'Error - user id not set';
    exit();

}



$assets_paid->Load_from_key($assetid);
$users->Load_from_key($userid_set);

$completion_threshold == 80;



$completion = $usersMetricsManager->userCompletionAsset($userid_set, $assetid);

//echo $completion;

//exit();

//CHECK THE DETAILS AND THAT THE USER ACTUALLY HAS THIS 100%

if ($completion >= $completion_threshold){


    if ($usersMetricsManager->checkCertificateUserAsset($userid_set, $assetid, false) == false){


         $certificate_id = $usersMetricsManager->createCertificate($userid_set, $assetid, false);

        //echo $certificate_id;
        //exit();
    
    }else{ //this means there is a certificate existing

        //no error here, regenerate the original certificate

        $certificate_id = $usersMetricsManager->checkCertificateUserAsset($userid_set, $assetid, false);

       
    }

}else{


    echo 'Error 2 - Issue with creating certificate, '; //error 2 is that completion not 100%
    exit();

}

if ($certificate_id != false){



$pdf = new Fpdi();
$pdf->AddPage('L');
$pdf->setSourceFile(BASE_URI . "/pages/backend/course_certificate_php.pdf");
$tplId = $pdf->importPage(1);
$mid_x = 148.5; 
// use the imported page and place it at point 5,5 with your preferred width in mm
$pdf->useTemplate($tplId, 0, 0, 297);
$pdf->SetFont('Arial','',48); // Font Name, Font Style (eg. 'B' for Bold), Font Size
$pdf->SetTextColor(255,255,255); // RGB

$text = $users->getfirstname() . ' ' . $users->getsurname();

$pdf->Text($mid_x - ($pdf->GetStringWidth($text) / 2), 65, $text);

$pdf->SetFont('Arial','',20); // Font Name, Font Style (eg. 'B' for Bold), Font Size
$text_course = "GIEQs Course #$assetid : " . $assets_paid->getname();
$pdf->Text($mid_x - ($pdf->GetStringWidth($text_course) / 2), 100, $text_course);

$pdf->SetXY(7, 13); // X start, Y start in mm

$pdf->SetFont('Arial','',10); // Font Name, Font Style (eg. 'B' for Bold), Font Size
$text_course3 = "Certificate # " . $certificate_id;
//$pdf->Text($text_course2);
$pdf->Write(0, $text_course3);


$pdf->SetXY(7, 23); // X start, Y start in mm


$pdf->SetFont('Arial','U',10); // Font Name, Font Style (eg. 'B' for Bold), Font Size
/* $link = $pdf->addLink();
$pdf->SetLink($link); */
$link = 'https://www.gieqs.com/pages/backend/certificate_valid.php?certificate_id=' . $certificate_id;

$text_course2 = "Click to verify certificate on gieqs.com";
//$pdf->Text($text_course2);



$pdf->Write(0, $text_course2, $link);
ob_start();

$pdf->Output();

$content = ob_get_contents();
ob_end_clean(); //here, output is cleaned. You may want to flush it with ob_end_flush()
//var_dump($content);


$is_writable = is_writable(BASE_URI . '/pages/backend');
//var_dump($is_writable);


if ($is_writable){

    file_put_contents(BASE_URI . '/pages/backend/temp-certificate.pdf', $content);

    
}else{

    echo 'Error 4 - Certificate Could not be Created'; //error 4 no creation of the file as not writable

    
}


}else{

    echo 'Error 3 - Certificate Could not be Created'; //error 3 no creation of the database entry

}
?>
