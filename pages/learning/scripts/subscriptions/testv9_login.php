<?php

$openaccess = 1;
//$requiredUserLevel = 3;

error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';
require (BASE_URI.'/assets/scripts/headerScript.php');

$location = BASE_URL . '/index.php';


$debug = false;
$_SESSION['debug'] == false;

$users = new users;
$general = new general;

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


require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

?>

<style>
 th, td {
  padding: 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>
                    


<?php

//registration manager

//->countAllRegistrations

//->countTraineeReg , Nurse Reg, Doctor Reg, NE Reg

//->countincomplete reg
//error_reporting(E_ALL);


//echo $general->getCountryArray();


$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
print_r($url_components);
$hello = $url_components['path'];
error_reporting(E_ALL);


//require_once (BASE_URI . '/assets/scripts/login_functions.php');

$location = BASE_URL . '/pages/authentication/login.php';

 
function hello ($location, $url=null, $debug=null) {

    if ($url != null){

        $url = '?destination=' . $url;

    }

    echo $location;
    echo $url;
    var_dump($debug);




}

echo 'hello';

hello($location, urlencode('/pages/program/program.php'), true);




echo "<h2>Personal Program Links, GIEQs III</h2>";

$facultyMembers = $programmeReports->LoadAllFaculty();

foreach ($facultyMembers as $key3=>$value3){

    $facultyid = $value3;

    $faculty = $sessionView->getFacultyName($facultyid);


                //get session data    

                $response =  $programmeReports->generateReportv2($facultyid, [0=>47, 1=>48, 2=>49, 3=>50]);
                $response2 = $programmeReports->returnModeration($facultyid, [0=>47, 1=>48, 2=>49, 3=>50]);
                $response3 = array_merge($response, $response2);
                //usort($response3, function ($a, $b) {     return strcmp($a["date"], $b["date"]); });

                array_multisort(array_column($response3, 'date'),  SORT_ASC,
                array_column($response3, 'timeFrom'), SORT_ASC,
                $response3);
                
                //TODO this gets only the sessionItems

                if (empty($response3)){

                    continue;

                }





    echo $faculty['title'] . ' ' . $faculty['firstname'] . ' ' . $faculty['surname'];

    echo "<br/>";

    echo "<a href='<?php echo BASE_URL;?>/pages/backend/printProgramAllv2.php?id=$facultyid'> Link to Personal Program for " . $faculty['title'] . " " . $faculty['firstname'] . " " . $faculty['surname'] . "</a>";

    echo "<br/><br/>";

}






echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';