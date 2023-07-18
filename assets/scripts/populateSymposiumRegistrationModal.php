<?php
error_reporting(E_ALL);
//;
$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require '../../assets/includes/config.inc.php';
//echo 'hello2';
require BASE_URI . '/assets/scripts/headerScript.php';

//echo 'hello3';sss
$general = new general;
$users = new users;


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
      $assetManager = new assetManager;

      require_once(BASE_URI . '/assets/scripts/classes/symposium.class.php');
      $symposium = new symposium;

      require_once(BASE_URI . '/assets/scripts/classes/userFunctions.class.php');
      $userFunctions = new userFunctions;
//echo 'hello4';

function ne($v)
{
    return $v != '';
}

$debug = false;
//$_SESSION['debug'] = true;
$explicit = true;
//echo 'hello';



function get_include_contents($filename, $variablesToMakeLocal)
{
    extract($variablesToMakeLocal);
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}

$data = json_decode(file_get_contents('php://input'), true);

if ($debug) {

    print_r($data);

}

$assetid = $data['assetid'];

//check count of get variables


//if logged in 

//echo 'hello';

//echo $userid;

//todo write started symposium registration

/**Symposium
 * 
 * id
 * user_id
 * asset_id
 * partial_registration
 * early_bird
 * group_registration
 * registrationType
 * includeGIEQsPro
 * longTermProMemberDiscount
 * full_registration_date
 * title
 * interestReason
 * professionalMemberDiscount
 * professionalMemberNumber
 * informedHow
 * 
 * 
 * 
 * 
 * 
 * professional discount is 20%
 * cannot be combined with other discount
 * 
 * get 20% discount if professional, or if pro member, not on the cost of gieqs online
 * 
 * **/


if ($userid){

    $array = [];


    //load user from database

    $users->Load_from_key($userid);

    $array = json_decode($users->Return_row($userid));

    

    if ($debug){

        print_r($array);
    }

    //get symposium data
    $symposium_id = $userFunctions->getSymposiumidUseridSpecificSymposium($userid, $assetid, $debug);

        if ($debug){

            echo '<br/>';
            echo '<br/>';
            echo ' symposium_id  was ' . $symposium_id;
            

        }

        if (!($symposium_id)){//no id exists, ie no existing record

            echo json_encode($array);


        }else{

            $symposium->Load_from_key($symposium_id);

            $symposiumOverall = json_decode($symposium->Return_row($symposium_id));

            if ($debug){

                print_r($symposiumOverall);
            }

            foreach ($symposiumOverall as $key=>$value){

                ///echo $key;
                //print_r($value);

                foreach ($value as $key2=>$value2){
                    
                   // echo $key2;
                   // echo $value2;
                    eval('$array[0]->$key2 = $value2;');

                }

                //$array[0]->$key = $value;

            }

            if ($debug){

                print_r($array);
            }

            echo json_encode($array);

            

        }


}