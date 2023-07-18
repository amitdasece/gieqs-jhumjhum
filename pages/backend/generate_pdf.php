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

$users->Load_from_key($userid);

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
$userid = $data['userid'];

$assets_paid->Load_from_key($assetid);
$users->Load_from_key($userid);

$pdf = new Fpdi();
$pdf->AddPage('L');
$pdf->setSourceFile(BASE_URI . "/pages/backend/course_certificate_php.pdf");
$tplId = $pdf->importPage(1);
$mid_x = 148.5; 
// use the imported page and place it at point 5,5 with your preferred width in mm
$pdf->useTemplate($tplId, 0, 0, 297);
$pdf->SetFont('Arial','',48); // Font Name, Font Style (eg. 'B' for Bold), Font Size
$pdf->SetTextColor(255,255,255); // RGB
$pdf->SetXY(65, 30); // X start, Y start in mm
$text = $users->getfirstname() . ' ' . $users->getsurname();

$pdf->Text($mid_x - ($pdf->GetStringWidth($text) / 2), 65, $text);
$pdf->SetFont('Arial','',20); // Font Name, Font Style (eg. 'B' for Bold), Font Size

$text_course = "GIEQs Course #$assetid : " . $assets_paid->getname();
$pdf->Text($mid_x - ($pdf->GetStringWidth($text_course) / 2), 100, $text_course);

//$pdf->Write(0, $text);
ob_start();

$pdf->Output();

$content = ob_get_contents();
ob_end_clean(); //here, output is cleaned. You may want to flush it with ob_end_flush()
file_put_contents('temp.pdf', $content, FILE_APPEND);
?>
