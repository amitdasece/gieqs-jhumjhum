<?php
require ('../../assets/includes/config.inc.php');		
require(BASE_URI . '/pages/backend/institution_header.php');

if (isset($_GET["user_id"]) && is_numeric($_GET["user_id"])){
	$user_id = $_GET["user_id"];
    $user_id_set = true;

}else{

	$user_id = null;
    $user_id_set = false;
    echo '<div class="container">';
    echo '<p>Please set the user user_id in the url, e.g. ?user_id=[userid]</p>';
    echo '</div>';
    exit();

}




            //error_reporting(E_ALL);
            //$print_r()

            //$data = json_decode(file_get_contents('php://input'), true);

            //print_r($data);

            //get all faculty

            $debug = false;

            if ($user_id_set){


               /*  $response = $sessionView->generateView($id);
                if ($debug){
                print_r($response);
                } */

                $users->Load_from_key($user_id);

                if ($debug){
                    
                    print_r($users);

                }




            }else{

                exit();

            }

            echo '<div class="container mt-5">';

            echo '<h2>User Activity Report</h2>';
            echo '<p>Last active on xxx at yyy</p>';
            echo '<p>User name : ' . $users->getfirstname() . ' ' .  $users->getsurname() . ' </p>';
            echo '<p>User id : ' . $user_id;

            //$token->Load_from_key($id);

            

            if ($assetManager->getSiteWideSubscription($user_id, $debug)){
    
                //there is a site wide subscription
                if ($debug){
                  echo 'there is a site wide subscription';
                  }
                
                
                //check if active 
              
                $datetime_utc = new DateTime('now', new DateTimeZone('UTC'));
              
                if ($assetManager->isSubscriptionActive($assetManager->getSiteWideSubscription($user_id, $debug), $datetime_utc, $debug)){
              
                  //is active
                  if ($debug){
                    echo 'it is active';
                    }
              
                    $siteWideSubscriptionid = $assetManager->getSiteWideSubscription($user_id, $debug);

                    $subscription->Load_from_key($siteWideSubscriptionid);
              
                    if ($debug){
                      echo 'SUBSCRIPTION ID IS ' . $siteWideSubscriptionid;
                      }
              
                    //find out which asset

                    $subscription_name = $assetManager->getAssetName($siteWideSubscriptionid);
                            
                    if ($debug){
                      echo 'ASSET ID IS ' . $assetid_subscription;
                      }

                      $date=date_create($subscription->getexpiry_date()); 

                      echo '<p>Active Sitewide Subscription : ' . $subscription_name . '</p>';
                      echo '<p>Sitewide Subscription Expires : ' . date_format($date,"d/m/Y H:i:s") . '</p>';


               }else{

                echo '<p>Active Sitewide Subscription : None</p>';

               }

            }else{

                echo '<p>Active Sitewide Subscription : None</p>';

                if ($debug){


                }

           }

           echo 'Total Site Completion : ' . round($usersMetricsManager->userCompletionVideos($user_id, $debug)['completion'], 1) . '%';
           
           $allAssets = $usersMetricsManager->getAllAssets();

           $asset_completion_array = [];

           $asset_completion_counter = 0;

           foreach ($allAssets as $key=>$value){

                //return completion for each asset

                $asset_completion_array[$value] = $usersMetricsManager->userCompletionAsset($user_id, $value, $debug);
                $asset_completion_counter++;

           }

           /* echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Name</th>';
            echo '<th>Email</th>';
                        echo '<th>Subscription id</th>';

            echo '<th>Registered date</th>';
            echo '<th>Subscription Expiry Date</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
 */



           if ($debug){
            
            var_dump($asset_completion_array);

           }

           /* foreach ($asset_completion_array as $key=>$value){

             if ($value != false){

                echo '<p>Asset ' . 'asset name' . ' is ' . round($value, 1) . '% completed</p>';

             }else{

                echo '<p>Asset ' . 'asset name' . ' is not yet accessed by user</p>';


             }

           } */

           uasort($asset_completion_array, function($a, $b) { return $b > $a ;});


           //get all videos
           //return % completion

           //return courses completion per asset (that has been started)

           //return 'userscompletion'

           //approximate hours spent
           // exit();


            //echo '<p>Remaining : ' . $token->getinstitutional_id() . ' </p>';


            echo '<br/><br/>';

            ?>



<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Course Completion Status
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
       <?php

      echo '<h4>Course Completion Status</h4>';
            
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>id</th>';

            echo '<th>Course</th>';
            echo '<th>Completion</th>';
            echo '<th>Certificate</th>';

            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';



            

         

            foreach ($asset_completion_array as $key=>$value){

                $assets_paid->Load_from_key($key);

                $completion = null;

                $completion = round($value, 1);

                $statement = null;

                if($completion > 90){

                    $statement = "<button class='btn btn-sm bg-secondary text-white generate-certificate' asset-id='$key' user-id='$user_id'>Generate</button>";

                }



                echo '<tr>';

                echo '<td>' . $key . '</td>';

                echo '<td>'  . $assets_paid->getname() . '</td>';

                echo '<td>'  . $completion . '%</td>';

                echo '<td>'  . $statement . '</td>';


              

                echo '</tr>';


                //echo '<p>' . $users->getfirstname() . ' ' . $users->getsurname() . ' ' .  $users->getemail() . '</p>';

                //echo '<p></p>';

            }

            echo '</tbody>';
            echo '</table>';
            ?>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Total Video Completion
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        Under construction.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        User Reviewing Status
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      Under construction.
      </div>
    </div>
  </div>
</div>




<?php
            


            echo '</div>';



            ?>
            <script src="<?php echo BASE_URL;?>/assets/js/purpose.core.js"></script>

<script src="<?php echo BASE_URL;?>/assets/js/generaljs.js"></script>
        <script src="../../assets/js/purpose.js"></script>
        <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>

<script>

$(document).ready(function() {


    $(document).on('click', '.generate-certificate', function(){

        var assetid = $(this).attr('asset-id');
        var userid = $(this).attr('user-id');

        const dataToSend = {

            assetid : assetid,
            userid : userid,

        }

        const jsonString = JSON.stringify(dataToSend);
        console.log(jsonString);

        var request2 = $.ajax({
            url: siteRoot + 'pages/backend/generate_pdf_certificate_course.php',
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request2.done(function(data) {
            // alert( "success" );

            if (data.startsWith("Error")){

                alert(data);

            }else{

            
            window.open(siteRoot + 'pages/backend/temp-certificate.pdf');  
            }

            //$(document).find('.Thursday').hide();
        })




    })


})


</script>


<?php


                

$general->endgeneral;
$programme->endprogramme;
$session->endsession;
$faculty->endfaculty;
$sessionItem->endsessionItem;
$queries->endqueries;
$sessionView>endsessionView;?>