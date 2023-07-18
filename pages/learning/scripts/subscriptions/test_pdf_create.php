<?php
//$openaccess = 1;

$requiredUserLevel = 3;

error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';
require (BASE_URI.'/assets/scripts/headerScript.php');

$location = BASE_URL . '/index.php';





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

$pdf = new Fpdi();
$pdf->AddPage('L');
$pdf->setSourceFile("course_certificate_php.pdf");
$tplId = $pdf->importPage(1);
$mid_x = 148.5; 
// use the imported page and place it at point 5,5 with your preferred width in mm
$pdf->useTemplate($tplId, 0, 0, 297);
$pdf->SetFont('Arial','',48); // Font Name, Font Style (eg. 'B' for Bold), Font Size
$pdf->SetTextColor(255,255,255); // RGB
$pdf->SetXY(65, 30); // X start, Y start in mm
$text = "User Name";

$pdf->Text($mid_x - ($pdf->GetStringWidth($text) / 2), 65, $text);
$pdf->SetFont('Arial','',20); // Font Name, Font Style (eg. 'B' for Bold), Font Size

$text_course = "Course xx : ESGE Imaging of Colorectal Polyps";
$pdf->Text($mid_x - ($pdf->GetStringWidth($text_course) / 2), 100, $text_course);

//$pdf->Write(0, $text);
$pdf->Output();
?>

<!-- 

Queries

//REGISTRATIONS
SELECT COUNT(`id`) FROM `symposium` WHERE `partial_registration` = '0';

//REGISTRATIONS PER CATEGORY
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '1');
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '2');
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '3');
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '4');
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '5');


//REDUCE SYMPOSIUM INCOME BY 20% FOR THIS NUMBER WHO HAVE PROFESSIONAL REGISTRATIONS
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '1' AND `professionalMember` = '1');  //DOCTORS WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '2' AND `professionalMember` = '1');  //TRAINEES WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '3' AND `professionalMember` = '1');  //NENDO WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '4' AND `professionalMember` = '1');  //N WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '5' AND `professionalMember` = '1');  //M STUDENTS WITH REDUCTION

//REDUCE SYMPOSIUM INCOME BY 20% FOR LONG TERM GIEQS PRO MEMBERS
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '1' AND `longTermProMemberDiscount` = '1'); //DOCTORS WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '2' AND `longTermProMemberDiscount` = '1'); //TRAINEES WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '3' AND `longTermProMemberDiscount` = '1'); //NENDO WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '4' AND `longTermProMemberDiscount` = '1'); //N WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '5' AND `longTermProMemberDiscount` = '1'); //M STUDENTS WITH REDUCTION

//ALSO FOR GIEQS PRO
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '1' AND `includeGIEQsPro` = '1'); // DOCTORS WITH GIEQS PRO TOO
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '2' AND `includeGIEQsPro` = '1'); // TRAINEES WITH GIEQS PRO TOO
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '3' AND `includeGIEQsPro` = '1'); // NENDO WITH GIEQS PRO TOO
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '4' AND `includeGIEQsPro` = '1'); // N WITH GIEQS PRO TOO
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '5' AND `includeGIEQsPro` = '1'); // M STUDENTS WITH GIEQS PRO TOO

SELECT COUNT(`id`) FROM `symposium` WHERE `partial_registration` = '1'; // INCOMPLETE REGISTRATIONS





 -->
<style>
 th, td {
  padding: 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>
                    


<?php


/* 

get sections
$curriculum_manager->getsectionscurriculum($id);

for each section
    echo each block dependent on whether text or
    table is a table

    depending on what 'type' is

    <option value="1" selected="">text</option>
<option value="2">table</option>
<option value="3">figure</option>
<option value="4">video</option>
<option value="5">gieqs online asset</option>

    video is vimeo link like blog link_to_content

    photo is photo like blog [this is ok, now there is link_to_content]  image_url

    [add image upload field]

    gieqs ref is id number link_to_content

*/






//var_dump($assets3);


//do they occur in the past? that is type 2 and 3 only

//then create a new subscription for the user for them with the tag PRO_ASSET

//GET AN ARRAY OF PRO USERS



//WHERE (`gateway_transactionId` LIKE '%TOKEN_ID=PRO_SUBSCRIPTION%



echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';