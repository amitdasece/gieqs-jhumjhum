<?php

$openaccess =1;
			//$requiredUserLevel = 4;
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            $general = new general;
            $programme = new programme;
            $session = new session;
            $faculty = new faculty;
            $sessionItem = new sessionItem;
            $queries = new queries;
            $assets_course = new assets_course;
            $sessionView = new sessionView;


            $debug = false;

$courseManager = new courseManager;

$assetManager = new assetManager;


$assets_paid = new assets_paid;

if ($debug){

error_reporting(E_ALL);

}

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


            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            //print_r($data);

            $sessionid = $data['sessionid'];

            //$edit ability; display icons next to editable segments.

            $edit = 1;
            
            


                //get session data    

                //$response =  $sessionView->generateView($sessionid); old method

                if ($assets_paid->Return_row($sessionid)){

                    $assets_paid->Load_from_key($sessionid);

                    if ($debug){
                    
                        echo 'Asset Loaded Successfully';

                    }


                }else{

                    if ($debug){
                    
                        echo 'No asset with that asset id passed to the page';

                    }


                }



                //print_r($response);

                //get moderators

                $moderators = $sessionView->getModerators($sessionid);

                //print_r($moderators);

                
                

                //for the first iteration of the array will contain the static programme and session details

                //work on the date

                //get programme id

                $programmeid = $assetManager->getProgrammeidAsset($sessionid);

                if ($programme->Return_row($programmeid[0])){

                    $programme->Load_from_key($programmeid[0]);

                    if ($debug){
                    
                        echo 'programme Loaded Successfully';
                        echo $programme->getdate();

                    }


                }else{

                    if ($debug){
                    
                        echo 'No programme with that asset id passed to the page';

                    }


                }


                $programmeDate = new DateTime($programme->getdate());

                //echo $programmeDate->format('D d M Y');

                //further iterations the same with the sessionItem data

                //generate the HTML



                ?>


<div class="modal-content bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
    <div class="modal-header">
    
        <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
            <div>
                <div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                    <img src="../../assets/img/icons/gieqsicon.png">
                </div>
            </div>
            <div class="text-left">
                <span class="h5 mb-0"><?php echo $assets_paid->getname();?></span>
                <?php
                    if ($edit == 1){
                        echo '<span class="ml-3 editAsset" data="' . $assets_paid->getid() . '"><i class="fas fa-edit"></i></span>';

                    }
                
                ?>
                <p class="mb-0"><?php echo $programmeDate->format('D d M Y');?> <?php echo ' ' . $response[0]['timeFrom']?> - <?php echo $response[array_key_last($response)]['timeTo']?></p>
                <p class="mb-0 h6"><?php echo $response[0]['sessionSubtitle']?></p>
                <p class="mb-0 ml-1"><?php echo $response[0]['sessionDescription']?></p>
            </div>

        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span="text-white" aria-hidden="true">&times;</span>
        </button>

    </div>
    <div class="modal-subheader px-3 mt-2 mb-2 border-bottom">
        <div class="row">
            <div class="col-sm-12 text-left" data-assetid="<?php echo $assets_paid->getid();?>">
                <div>
                    <span class="h6 mb-0 mr-3">Status</span>
                    Advertising:<span class="m-1 px-1 py-0
                     text-white status-advertising"></span>
                     Purchasable:<span class="m-1 px-1 py-0
                     text-white status-purchasable"></span>
                     Testing:<span class="m-1 px-1 py-0
                     text-white status-testing"></span>
                     Live on Site:<span class="m-1 px-1 py-0
                     text-white status-live"></span>
                     Feedback Requested:<span class="m-1 px-1 py-0
                     text-white status-feedback"></span>
                     Videos Available:<span class="m-1 px-1 py-0
                     text-white status-available"></span>
                     Videos Tagged:<span class="m-1 px-1 py-0
                     text-white status-tagged"></span>
                    

                </div>
            </div>
        </div>
    </div>
    <div class="modal-subheader px-3 mt-2 mb-2 border-bottom">
        <div class="row">
            <div class="col-sm-12 text-left">
                <div>
                    <span class="h6 mb-0">Actions</span>

                    <span class="ml-2">Purchasable:</span>

                    <!-- vary class and text depending on function -->
                    <button class="btn btn-sm m-1 px-1 py-0
                     bg-success text-dark action-purchasable">Make Purchasable</button>

                     <span class="ml-2">Testing:</span>
                    <button class="btn btn-sm m-1 px-1 py-0
                     bg-success text-dark action-live">Activate Testing</button>
            
                     <span class="ml-2">Live:</span>
                    <button class="btn btn-sm m-1 px-1 py-0
                     bg-success text-dark action-live">Go Live </button>
                
                
                    

                </div>
            </div>
        </div>
    </div>
    <div class="modal-body">

        <div class="programme-body">
                        
            
            <!--Advertising
            
            emails
            teaser video
            thumbnail
            
             -->        
            <div class="sessionItem row d-flex align-items-left text-left align-middle">
                <div class="pl-2 pr-1 pb-0 pt-1 time">
                  

                </div>
                <div class="pr-2 pb-0 pt-1">
                    <span class="h6 sessionTitle">Advertising</span>

                  

                    <?php 

                    
                    ?>

                </div>

            </div>
            <div class="row d-flex align-items-left text-left align-middle">
                <div class="pl-3 pr-1 pb-0 pt-0 time">
                    <span class="h6">Email</span>
                    <?php
                    if ($edit == 1){
                        echo '<span class="ml-3 addEmail"><i class="fas fa-plus"></i></span>';

                    }?>
                </div>
            </div>
            <div class="row d-flex align-items-left text-left align-middle">
                
                <!--here iterate emails
                
                $emails = $courseManager->get_assets_course_id($sessionid);
                
                use the new class here


                -->
                <?php
                $emails = $courseManager->get_emails_course_assetid($sessionid, false);
                
                if ($debug){
                print_r($emails);

                }
                ?>
                
                <?php foreach ($emails as $key=>$value){?>
                <div class="pl-6 pr-1 pb-0 pt-0 time">
                    
                     <span class="id" data="<?php echo $value['id'];?>"><?php echo $value['id'];?></span>
                     <span class="name ml-2"><?php echo $value['name'];?></span>
                     <span class="path ml-2"><?php echo $value['path'];?></span>

                    <span class="ml-2">Sending : <span class="send_date ml-2"><?php echo $value['send_date'];?> days before</span>
                    <span class="time_send ml-2"><?php echo $value['time_send'];?> CET</span>

                   <?php
                    if ($edit == 1){
                        echo '<span class="ml-3 editSessionItem"><i class="fas fa-edit"></i></span>';
                        echo '<span class="ml-3 deleteSessionItem"><i class="fas fa-times"></i></span>';

                    }
                    ?>


                <?php }?>
                    
                   

                   
                </div>
            </div>
            <hr>

             <!--Course Page -->        
             <div class="sessionItem row d-flex align-items-left text-left align-middle">
                <div class="pl-2 pr-1 pb-0 pt-1 time">
                  

                </div>
                <div class="pr-2 pb-0 pt-1">
                    <span class="h6 sessionTitle">Course Page</span>

                  

                    <?php 

                    if ($edit == 1){
                        echo '<span class="ml-3 editSessionItem"><i class="fas fa-edit"></i></span>';
                        echo '<span class="ml-3 addSessionItem"><i class="fas fa-plus"></i></span>';
                        echo '<span class="ml-3 deleteSessionItem"><i class="fas fa-times"></i></span>';

                    }
                    ?>

                </div>

            </div>
            <div class="row d-flex align-items-left text-left align-middle">
                <div class="pl-3 pr-1 pb-0 pt-0 time">
                    <span class="sessionDescription"><?php echo $value['sessionItemDescription'];?></span>

                    <p class="pt-2 h6 faculty"><?php 
                    
                    $faculty = $sessionView->getFacultyName($value['faculty']);

                    echo $faculty['title'] . ' ' . $faculty['firstname'] . ' ' . $faculty['surname'];
                    
                    
                    ?></p>

                    <?php  $assets = $sessionView->getAssets($value['sessionItemid']);

                    //print_r($assets); 
                    
                    
                    
                    ?>
                    <!-- inset -->

                    <p class="pt-3 pl-6 assets"><span class="h6">Session Assets</span>


                        
                    </p>
                </div>
            </div>
            <hr>

             <!--Asset details -->        
             <div class="sessionItem row d-flex align-items-left text-left align-middle">
                <div class="pl-2 pr-1 pb-0 pt-1 time">
                  

                </div>
                <div class="pr-2 pb-0 pt-1">
                    <span class="h6 sessionTitle">Asset Details</span>

                  

                    <?php 

                    if ($edit == 1){
                        echo '<span class="ml-3 editSessionItem"><i class="fas fa-edit"></i></span>';
                        echo '<span class="ml-3 addSessionItem"><i class="fas fa-plus"></i></span>';
                        echo '<span class="ml-3 deleteSessionItem"><i class="fas fa-times"></i></span>';

                    }
                    ?>

                </div>

            </div>
            <div class="row d-flex align-items-left text-left align-middle">
                <div class="pl-3 pr-1 pb-0 pt-0 time">
                    <span class="sessionDescription"><?php echo $value['sessionItemDescription'];?></span>

                    <p class="pt-2 h6 faculty"><?php 
                    
                    $faculty = $sessionView->getFacultyName($value['faculty']);

                    echo $faculty['title'] . ' ' . $faculty['firstname'] . ' ' . $faculty['surname'];
                    
                    
                    ?></p>

                    <?php  $assets = $sessionView->getAssets($value['sessionItemid']);

                    //print_r($assets); 
                    
                    
                    
                    ?>
                    <!-- inset -->

                    <p class="pt-3 pl-6 assets"><span class="h6">Session Assets</span>


                        
                    </p>
                </div>
            </div>
            <hr>

             <!--Programme details -->        
             <div class="sessionItem row d-flex align-items-left text-left align-middle">
                <div class="pl-2 pr-1 pb-0 pt-1 time">
                  

                </div>
                <div class="pr-2 pb-0 pt-1">
                    <span class="h6 sessionTitle">Programme Details</span>

                  

                    <?php 

                    if ($edit == 1){
                        echo '<span class="ml-3 editSessionItem"><i class="fas fa-edit"></i></span>';
                        echo '<span class="ml-3 addSessionItem"><i class="fas fa-plus"></i></span>';
                        echo '<span class="ml-3 deleteSessionItem"><i class="fas fa-times"></i></span>';

                    }
                    ?>

                </div>

            </div>
            <div class="row d-flex align-items-left text-left align-middle">
                <div class="pl-3 pr-1 pb-0 pt-0 time">
                    <span class="sessionDescription"><?php echo $value['sessionItemDescription'];?></span>

                    <p class="pt-2 h6 faculty"><?php 
                    
                    $faculty = $sessionView->getFacultyName($value['faculty']);

                    echo $faculty['title'] . ' ' . $faculty['firstname'] . ' ' . $faculty['surname'];
                    
                    
                    ?></p>

                    <?php  $assets = $sessionView->getAssets($value['sessionItemid']);

                    //print_r($assets); 
                    
                    
                    
                    ?>
                    <!-- inset -->

                    <p class="pt-3 pl-6 assets"><span class="h6">Session Assets</span>


                        
                    </p>
                </div>
            </div>
            <hr>

             <!--Testing -->        
            <div class="sessionItem row d-flex align-items-left text-left align-middle">
                <div class="pl-2 pr-1 pb-0 pt-1 time">
                  

                </div>
                <div class="pr-2 pb-0 pt-1">
                    <span class="h6 sessionTitle">Testing</span>

                  

                    <?php 

                    if ($edit == 1){
                        echo '<span class="ml-3 editSessionItem"><i class="fas fa-edit"></i></span>';
                        echo '<span class="ml-3 addSessionItem"><i class="fas fa-plus"></i></span>';
                        echo '<span class="ml-3 deleteSessionItem"><i class="fas fa-times"></i></span>';

                    }
                    ?>

                </div>

            </div>
            <div class="row d-flex align-items-left text-left align-middle">
                <div class="pl-3 pr-1 pb-0 pt-0 time">
                    <span class="sessionDescription"><?php echo $value['sessionItemDescription'];?></span>

                    <p class="pt-2 h6 faculty"><?php 
                    
                    $faculty = $sessionView->getFacultyName($value['faculty']);

                    echo $faculty['title'] . ' ' . $faculty['firstname'] . ' ' . $faculty['surname'];
                    
                    
                    ?></p>

                    <?php  $assets = $sessionView->getAssets($value['sessionItemid']);

                    //print_r($assets); 
                    
                    
                    
                    ?>
                    <!-- inset -->

                    <p class="pt-3 pl-6 assets"><span class="h6">Session Assets</span>


                        
                    </p>
                </div>
            </div>
            <hr>

             <!--Advertising -->        
             <div class="sessionItem row d-flex align-items-left text-left align-middle">
                <div class="pl-2 pr-1 pb-0 pt-1 time">
                  

                </div>
                <div class="pr-2 pb-0 pt-1">
                    <span class="h6 sessionTitle">Feedback</span>

                  

                    <?php 

                    if ($edit == 1){
                        echo '<span class="ml-3 editSessionItem"><i class="fas fa-edit"></i></span>';
                        echo '<span class="ml-3 addSessionItem"><i class="fas fa-plus"></i></span>';
                        echo '<span class="ml-3 deleteSessionItem"><i class="fas fa-times"></i></span>';

                    }
                    ?>

                </div>

            </div>
            <div class="row d-flex align-items-left text-left align-middle">
                <div class="pl-3 pr-1 pb-0 pt-0 time">
                    <span class="sessionDescription"><?php echo $value['sessionItemDescription'];?></span>

                    <p class="pt-2 h6 faculty"><?php 
                    
                    $faculty = $sessionView->getFacultyName($value['faculty']);

                    echo $faculty['title'] . ' ' . $faculty['firstname'] . ' ' . $faculty['surname'];
                    
                    
                    ?></p>

                    <?php  $assets = $sessionView->getAssets($value['sessionItemid']);

                    //print_r($assets); 
                    
                    
                    
                    ?>
                    <!-- inset -->

                    <p class="pt-3 pl-6 assets"><span class="h6">Session Assets</span>


                        
                    </p>
                </div>
            </div>
            <hr>


        </div>

        <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
            <p class="text-muted text-sm">Course content subject to change without notice.</p>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary course-table">Back to course table &nbsp; &nbsp;<i
                class="fas fa-arrow-right"></i></button>
    </div>
</div>



<?php               
$general->endgeneral;
$programme->endprogramme;
$session->endsession;
$faculty->endfaculty;
$sessionItem->endsessionItem;
$queries->endqueries;
$sessionView>endsessionView;?>