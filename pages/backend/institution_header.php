<?php


/**
                 * Header for institution script which accepts a token id as ?id=[sessionid] in the url
                 * 
                 * function to generate a list of users that have registered with that token
                 * 
                 * called from a list of tokens or the tokens table
                 * 
                 * */
                
                 //if user has no login to gieqs.com redirect
            $openaccess = 0;
			$requiredUserLevel = 6;

			require (BASE_URI.'/assets/scripts/headerScript.php');



           
            




           /*  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
            ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.core.js"></script>

<script src="<?php echo BASE_URL;?>/assets/js/generaljs.js"></script>
        <script src="../../assets/js/purpose.js"></script>
        <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>

<style>

p {

margin-bottom: 0 !important;

}

    </style>

    <script>

        $(document).ready(function() {


            $(document).on('click', '.give-feedback', function(){


                window.location.href = "mailto:admin@gieqs.com?subject=Feedback%20on%20Institution%20Management%20Console%2C%20gieqs.com";


            })

            $(document).on('click', '.to-dashboard', function(){

                var institutionid = $(document).find('#institutionid').text();

              window.location.href = siteRoot + "pages/backend/institution_landing.php?institution_id=" + institutionid;


            })

            $(document).on('click', '.help', function(){

                window.open(siteRoot + "page-viewer/562");


            })

        })

        

</script>

<?php

            $general = new general;
            $programme = new programme;
            $session = new session;
            //$faculty = new faculty;
            $sessionItem = new sessionItem;
            $queries = new queries;
            $sessionView = new sessionView;
            $programmeReports = new programmeReports;
            $institutional_manager = new institutional_manager;
            $users = new users;
            $token = new token;
            $subscription = new subscriptions;
            require_once(BASE_URI . '/pages/learning/classes/usersMetricsManager.class.php');
            $usersMetricsManager = new usersMetricsManager;
            $assets_paid = new assets_paid;
            $institutional = new institutional;




            $debug = false;
            if ( ! function_exists( 'array_key_last' ) ) {
                /**
                 * Polyfill for array_key_last() function added in PHP 7.3.
                 *
                 * Get the last key of the given array without affecting
                 * the internal array pointer.
                 *
                 * @param array $array An array
                 *
                 * @return mixed The last key of array if the array is not empty; NULL otherwise.
                 */
                function array_key_last( $array ) {
                    $key = NULL;
            
                    if ( is_array( $array ) ) {
            
                        end( $array );
                        $key = key( $array );
                    }
            
                    return $key;
                }
            }

            function multi_array_key_exists($key, array $array): bool
{
    if (array_key_exists($key, $array)) {
        return true;
    } else {
        foreach ($array as $nested) {
            if (is_array($nested) && multi_array_key_exists($key, $nested))
                return true;
        }
    }
    return false;
}

if (isset($_GET["institution_id"]) && is_numeric($_GET["institution_id"])){
	$institution_id = $_GET["institution_id"];
    $institution_id_set = true;

}else{

	$institution_id = null;
    $institution_id_set = false;
    echo '<div class="container">';
    echo '<p>Please set the institution id in the url, e.g. ?institution_id=[institution]</p>';
    echo '</div>';
    exit();

}

            //then do required institution access

            //check the currently logged in user can access this institution


            //get an array of the users licensed to manage this institution; if the user is a superuser or in this array then allow

            $licensed_users = $institutional_manager->getUsersInstitution($institution_id);

            $currently_logged_in_user = $userid;

            if ($isSuperuser == 0){

            if (in_array($currently_logged_in_user, $licensed_users)){

                //allow access

            }else{

                echo '<div class="container">';
                echo '<p class="mt-4">Currently logged in user does not have access to manage or view this institution</p>';
                echo '<p>Please <a href="' . BASE_URL . '/login">login</a> with a user able to administrate or view this institution</p>';
                echo '<p>If you believe this is an error please <a href="mailto:admin@gieqs.com">contact us</a> with the following information:</p>';
                echo "<p class='ms-3'>User id $userid trying to login to manage/view institution $institution_id with failed login</p>";
                echo '</div>';
                exit();

            }

          }else{

            //allow superuser access without link to institution

          }






//also check the user is linked to the institution
//add a database user_institution
//add types, superuser, viewer
//don't modify user table




            //error_reporting(E_ALL);
            //$print_r()

            //$data = json_decode(file_get_contents('php://input'), true);

            //print_r($data);

            //get all faculty

            $debug = false;

            if ($institution_id_set){


               /*  $response = $sessionView->generateView($id);
                if ($debug){
                print_r($response);
                } */

                if ($institutional->Return_row($institution_id)){


                    $institutional->Load_from_key($institution_id);
                    if ($debug){
                        
                        print_r($institutional);

                    }

                }else{

                    echo '<div class="container">';
                    echo '<p class="mt-4">Institution ' .$institution_id . ' not found</p>';
                    exit();

                }  




            }else{

                echo 'Need to set id in url for institution';

                exit();

            }
            echo '<div id="institutionid" class="d-none">' . $institution_id . '</div>';

            echo '<div class="container mt-5">';

            echo '<div class="d-flex justify-content-between align-items-center">';
            echo '<h2>GIEQs Institutional/Group Access</h2>';
            $users->Load_from_key($userid);
            echo '<p>User : ' . $users->getfirstname() . ' ' .  $users->getsurname() . ' </p>';
            echo '<div>';
            echo '<button class="btn btn-sm bg-secondary text-white to-dashboard ms-3">Dashboard</button>';
            echo '<button class="btn btn-sm bg-secondary text-white give-feedback ms-3">Feedback</button>';
            echo '<button class="btn btn-sm bg-secondary text-white help ms-3">Help</button>';
            echo '</div>';


            echo '</div>';

           
            echo '<p>Institution/Group : ' . $institutional->getlong_name() . '</p>';
            echo '<p>Active Users: , Average User % completion</p>';

 

