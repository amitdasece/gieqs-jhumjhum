 <?php

            $openaccess = 1;

			//$requiredUserLevel = 4;
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            $general = new general;
            $programme = new programme;
            $session = new session;
            $faculty = new faculty;
            $sessionItem = new sessionItem;
            $queries = new queries;
            $sessionView = new sessionView;
            $programmeView = new programmeView;

            //set the variables

            //system to use as a reference
            
            
            //$currentTime = new DateTime();  //need to check Belgium time
            //now requires liveNav.php to generate the next 3 lines
            
            //$serverTimeZone = new DateTimeZone('Europe/Brussels');
            
            
            //$currentTime = new DateTime('now', $serverTimeZone);
            
            //print_r($currentTime); */ // comment !forLive

            //comment for live the below line !forLive

            //$currentTime = new DateTime('2020-10-08 09:30:20', $serverTimeZone);

            $serverTimeZone = new DateTimeZone('Europe/Brussels');


            $currentTime = new DateTime('now', $serverTimeZone);

            //$print_r()

            /* if ($liveTest){

            //print_r($currentTime); // comment !forLive
            echo 'test ' . date_format($currentTime,"d/m/Y H:i") . ' is current test time'; // comment !forLive

            } */

            $data = json_decode(file_get_contents('php://input'), true);

            //print_r($data);

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

            //$sessionid = $data['sessionid'];

            //$edit ability; display icons next to editable segments.

            if (isset($currentUserLevel) < 2){

                $edit = TRUE;

            }else{

                $edit = FALSE;
            }
            
            $edit = FALSE;

            $debug = FALSE;
            
            if ($debug){
                echo '<br/><br/>Data Array contains </br></br>';
                print_r($data);

            }
            


            ?>

<?php

                //get all programmes [first 4]

                



    

//EDIT variable programmes to get MAX 2

                    if ($data){

                        $programme1 = $data['programmeid'];
                        
                        if (isset($data['programme2']) && ($data['programme2'] != null)){

                            $programme2 = $data['programme2'];
                            $widthData = 5;
                            $widthTime = 2;
                            $programmes2 = $programmeView->getProgrammes($programme2);

                        }else{

                            $programme2 = false;
                            $widthData = 9;
                            $widthTime = 3;
                        }
                        
                        
                    }else{

                        $programme1 = null;

                    }
                        //$programme1 = 32;
                        //$programme2 = 25;


                        $x=0;
                        $y=0;

                        //per day (2 programmes)

                        //echo the title first

                        $programmes = $programmeView->getProgrammes($programme1);
                        $programme->Load_from_key($programme1);
                        if ($debug){

                            echo '<br/><br/>programmes Array contains </br></br>';
                             print_r($programmes);

                        }
                        $programmeDate = new DateTime($programmes[0]['date']);
                        ?>
<div id="<?php echo $programmeDate->format('l');?>Programme" class="<?php echo $programmeDate->format('l');?>">
    <!--container-->

    <!-- REENABLE ZOOM LINK-->
    <!-- <div class="row text-left">
        <div class="d-flex col-lg-12 p-1 pb-3 pt-3">
            <a class="btn btn-sm text-dark gieqsGoldBackground" role="button" href="<?php //echo $programme->geturl_zoom();?>" target="_blank">LIVE - Access Zoom Meeting</a>

            
        </div>
    </div> -->


    <div class="row text-left">
        <div class="d-flex col-lg-12 p-1 pb-3 pt-3">
            <span class="h5 mr-auto"><?php echo $programmeDate->format('l d M Y');?></span>

            <span class="ml-3 align-self-baseline" style="font-size:0.75em">click on a program item to see session
                details</span>

        </div>
    </div>

    <div class="row text-center border">

        <div class="col-<?php echo $widthTime; ?> p-1 pb-3 pt-3 border-right">

        </div>

        <?php if (!($programme2)){?>
        <div class="col-<?php echo $widthData; ?> p-1 pb-3 pt-3 border-right">
            <span class="h4"><?php echo $programmes[0]['programmeTitle'];?></span>
        </div>
        <?php }else{ ?>
        <div class="col-<?php echo $widthData; ?> p-1 pb-3 pt-3 border-right">
            <span class="h4"><?php echo $programmes[0]['programmeTitle'];?></span>
        </div>
        <div class="col-<?php echo $widthData; ?> p-1 pb-3 pt-3 border-right">
            <span class="h4"><?php echo $programmes2[0]['programmeTitle'];?></span>
        </div>

        <?php } ?>

    </div>

    <?php


                        //rigid time structure

                        //get times array from the programme

                        $programmeTimes = $sessionView->getProgrammeTimes([0=>['id'=>$programme1],], $debug);

                        //for one program
                        $programmeTimes2 = $sessionView->convertProgrammeTimes($programmeTimes, $debug);

                        $breaks = $sessionView->getProgrammeBreaks([0=>['id'=>$programme1],], $debug);

                        $breaks2 = $sessionView->convertProgrammeTimesBreaks($breaks, $debug);


                        $times = $programmeTimes2;
                        //$times = array(1=>'07:30:00', 2=>'07:35:00', 3=>'08:20:00', 4=>'09:30:00', 5=>'10:30:00', 6=>'11:15:00', 7=>'11:45:00', 8=>'12:50:00', 9=>'13:55:00', 10=>'15:00:00', 11=>'15:15:00', 12=>'16:30:00', );
                        if ($debug){
                            echo '<br/><br/>times Array contains </br></br>';
                            print_r($times);}

                        //get array of sessions for first programme

                        /* $sessions1 = $programmeView->getSessions('23');
                        //get array of sessions for second programme
                        if ($debug){
                            echo '<br/><br/>sessions1 Array contains </br></br>';
                            print_r($sessions1);}


                        $sessions2 = $programmeView->getSessions('25');
                        if ($debug){
                            echo '<br/><br/>sessions2 Array contains </br></br>';
                            print_r($sessions2);}
 */
                        //track which ones used in variables

                        foreach ($times as $timeKey=>$timeValue){

                            //query the database for each programme for the details matching that time

                            //get first and second session data //EDIT CHANGE HERE FOR DIFFERENT PROGRAMMES
                            
                            $session1data = $programmeView->getSessionTimeSpecific($programme1, $timeValue);
                            $session2data = $programmeView->getSessionTimeSpecific($programme2, $timeValue);

                            

                            if ($debug){

                                print_r($session1data);
                                print_r($session2data);

                            }

                            //display the time anyway

                            //$currentTime = new DateTime();
                            //$currentTime = new DateTime('2020-10-07 13:30:00'); //moved higher

                            if ($debug){

                                print_r($currentTime); 
                                
                            }
                            
                            $sessionTimeFrom = new DateTime($session1data[0]['date'] . ' ' . $timeValue , $serverTimeZone);

                            if ($debug){

                                print_r($sessionTimeFrom); 
                                
                            }

                            if ($session1data){
                            $sessionTimeTo = new DateTime($session1data[0]['date'] . ' ' . $session1data[0]['timeTo'], $serverTimeZone);
                            }elseif ($session2data){

                             $sessionTimeTo = new DateTime($session2data[0]['date'] . ' ' . $session2data[0]['timeTo'], $serverTimeZone);
                            }

                            if ($debug){

                                print_r($sessionTimeTo); 
                                
                            }

                                    $now = $currentTime;
                                    $startdate = $sessionTimeFrom;
                                    $enddate = $sessionTimeTo;

                                    if ($debug){

                                        echo 'comparing start date ';
                                        print_r($startdate);
                                        echo 'and end  date ';
                                        print_r($enddate);
                                        echo 'with current time';
                                        print_r($currentTime);
                                    }

                                    $current = false;
                                    $past = false;

                                    if($startdate <= $now && $now <= $enddate) {
                                        $current = true;
                                        
                                    }else{
                                        $current = false;
                                    }

                                    if($startdate <= $now && $current === false) {
                                        $past = true;
                                        
                                    }else{
                                        $past = false;
                                    }

                                    if ($debug){

                                        echo 'SESSION is ';
                                        if ($past == true){

                                            echo 'past';
                                        }

                                        if ($past == false){

                                            echo 'not past';
                                        }

                                        if ($current == false){

                                            echo 'not current';
                                        }

                                        if ($current == true){

                                            echo 'current';
                                        }

                                        echo PHP_EOL;
                                    }

                                    if ($current){

                                        $highlight = 'bg-gieqsGold text-dark';

                                    }elseif ($past){

                                        $highlight = 'text-muted';
                                        
                                    }else{

                                        $highlight = null;

                                    }


                            //IF A BREAK MODIFY EDIT BREAKS HERE

                            $ab = 0;

                            foreach ($breaks2 as $key=>$value){

                                if ($timeValue == $value['timeFrom']){
                                    ?>
    <div class="row text-center align-middle border-left border-right border-bottom">

        <div class="col-12 p-2 pb-3 pt-3">

            <span class="h5" style="color: rgb(238, 194, 120);"><?php echo $value['title'];?></span>
        </div>

    </div>
    <?php

                                    $ab++;
                                    continue;

                                    
                                }

                                


                            }

                            if ($ab > 0){

                                continue;
                            }

                            /* if ($timeValue == '11:15:00'){
                                ?>
    <div class="row text-center align-middle border-left border-right border-bottom">

        <div class="col-12 p-2 pb-3 pt-3">
            <span class="h5" style="color: rgb(238, 194, 120);">Lunch Break | 30 minutes</span>
        </div>

    </div>
    <?php
                                continue;
                            }

                            
                            if ($timeValue == '15:15:00'){
                                ?>
    <div class="row text-center align-middle border-left border-right border-bottom">


        <div class="col-12 p-2 pb-3 pt-3">
            <span class="h5" style="color: rgb(238, 194, 120);">Afternoon Tea Break | 30 minutes</span>
        </div>

    </div>
    <?php
                                continue;
                            } */
                            /* if ($timeValue == '17:00:00'){
                                ?>
    <div class="row text-center align-middle border-left border-right border-bottom">


        <div class="col-12 p-2 pb-3 pt-3">
            <span class="h5" style="color: rgb(238, 194, 120);">Break | 15 minutes</span>
        </div>

    </div>
    <?php
                                continue;
                            } */
                            /* if ($timeValue == '19:30:00'){
                                ?>
    <div class="row text-center align-middle border-left border-right border-bottom">


        <div class="col-12 p-2 pb-3 pt-3">
            <span class="h5" style="color: rgb(238, 194, 120);">1930 - Conference Dinner
                <!-- | Monasterium Poortackere, Ghent -->
            </span>
        </div>

    </div>
    <?php
                                continue;
                            } */


                            //start row
                            echo '<div class="row text-center align-middle border-left border-right border-bottom bg-dark">';
                            
                            echo ' <div class="col-' . $widthTime . ' p-1 pb-3 pt-3 border-right ' . $highlight . '">
                            <span class="tiny text-gieqsGold ' . $highlight . '">' . $sessionTimeFrom->format('H:i'). ' - ' . $sessionTimeTo->format('H:i') . '</span>';
                            if ($current){echo '<br><span>LIVE</span>';}
                            echo '</div>';

                            

                            if ($debug){
                                echo '<br/><br/>session1data Array contains </br></br>';
                                print_r($session1data);
                            
                            }


                                if ($session1data){
                                    //only display data if there is a session in the required programme matching that time
                                    //if not go to else
                
                                    //GET DATA

                                    $response =  $sessionView->generateView($session1data[0]['sessionid']);

                                    if ($debug){
                                        echo '<br/><br/>response Array contains </br></br>';
                                        print_r($response);

                                    }

                                    $moderators = $sessionView->getModerators($session1data[0]['sessionid']);

                                    if ($debug){
                                        echo '<br/><br/>moderators Array contains </br></br>';
                                        print_r($moderators);

                                    }

                                    $programmeDate = new DateTime($response[0]['date']);

                                    if ($debug){

                                        print_r($programmeDate); 
                                        
                                    }

                                    //if this date is 7 8 oct
                                    //and $currentTimeandDate is between $sessionTimeFrom and $sessionTimeTo

                                    

                                    echo '<div class="col-' . $widthData . ' p-1 pb-3 pt-3 border-right ' . $highlight . '" "  data-target="#modal-' . $programmeDate->format('l') . '-' . $session1data[0]['programmeid'] . '-' . $sessionTimeFrom->format('Hi') . '">
                                    <span class="sessionTitle h5 ' . $highlight . '">' . $session1data[0]['sessionTitle'] . '</span><br>
                                    <span class="sessionSubtitle">' . $session1data[0]['sessionSubtitle'] . '</span>';
                                    if ($edit){ echo ' <i class="fas fa-edit editSessionFromPlan" data="' . $session1data[0]['sessionid'] . '"></i>';}
                                    echo '</div>';

                                    //echo the modal for the session

                                    

                                

                                   echo '
                            <div class="modal " id="modal-' . $programmeDate->format('l') . '-' . $session1data[0]['programmeid'] . '-' . $sessionTimeFrom->format('Hi') . '" tabindex="-1" role="dialog" aria-labelledby="modal-change-username" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <form>';
                                    ?>
    <div class="modal-content bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
        <div class="modal-header">

            <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
                <div>
                    <div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                        <img src="<?php echo BASE_URL;?>/assets/img/icons/gieqsicon.png">
                    </div>
                </div>
                <div class="text-left">
                    <span class="h5 mb-0"><?php echo $response[0]['sessionTitle']?></span>
                    <?php
                                                                                //$edit=1;
                                                                                    if ($edit == TRUE){
                                                                                        echo '<span class="ml-3 editSession" data="' . $response[0]['sessionid'] . '"><i class="fas fa-edit"></i></span>';
                                                                
                                                                                    }
                                                                                
                                                                                ?>
                    <p class="mb-0"><?php echo $programmeDate->format('D d M Y');?>

                        <?php 
                                                            
                                                            $sessionItemTimeFrom = new DateTime($response[0]['timeFrom'], $serverTimeZone);
                                                            $sessionItemTimeTo = new DateTime($response[array_key_last($response)]['timeTo'], $serverTimeZone);
                                                            
                                                            
                                                            ?>

                        <?php echo ' ' . $sessionItemTimeFrom->format('H:i')?> -
                        <?php echo $sessionItemTimeTo->format('H:i')?></p>
                    <p class="mb-0 h6"><?php echo $response[0]['sessionSubtitle']?></p>
                    <p class="mb-0 ml-1"></i><?php echo $response[0]['sessionDescription']?></p>
                </div>

            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span="text-white" aria-hidden="true">&times;</span>
            </button>

        </div>
        <div class="modal-subheader px-3 mt-2 mb-2 border-bottom">
            <div class="row">
                <div class="col-sm-12 text-left">
                    <div>
                        <span class="h6 mb-0">Moderators</span>
                        <?php
                                                                                    if ($edit == TRUE){
                                                                                        
                                                                                        echo '<span class="ml-1 addModerators"><i class="fas fa-plus"></i></span>';
                                                                
                                                                                    }
                                                                                
                                                                                    
                                                                                ?>
                        <br />

                        <?php
                                                                
                                                                                    foreach ($moderators as $key=>$value){
                                                                                        echo '<span class="faculty mb-0 mr-1" data="' . $value['facultyid'] . '">';
                                                                                        echo $value['title'] . ' ' . $value['firstname'] . ' ' . $value['surname'];
                                                                                        echo '</span><br/>';
                                                                                        
                                                                                    if ($edit == TRUE){
                                                                                        
                                                                                        echo '<span class="ml-1 mr-3 removeModerators"><i class="fas fa-minus"></i></span>';
                                                                
                                                                                    }
                                                                                
                                                                            
                                                                
                                                                                    }
                                                                                    
                                                                                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-body">

            <div class="programme-body">
                <?php foreach ($response as $key=>$value){
                                                                                        ?>


                <div class="sessionItem row d-flex align-items-left text-left align-middle">
                    <span class="sessionItemid" style="display:none;"><?php echo $value['sessionItemid'];?></span>
                    <div class="pl-2 pr-1 pb-0 pt-1 time">
                        <?php 
                                                            
                                                            $sessionItemTimeFrom = new DateTime($value['sessionItemTimeFrom'], $serverTimeZone);
                                                            $sessionItemTimeTo = new DateTime($value['sessionItemTimeTo'], $serverTimeZone);
                                                            
                                                            
                                                            ?>



                        <span class="timeFrom"><?php echo $sessionItemTimeFrom->format('H:i');?></span> - <span
                            class="timeTo"><?php echo $sessionItemTimeTo->format('H:i');?></span>
                        : </span>


                        <span class="h6 sessionTitle"><?php echo $value['sessionItemTitle'];?></span>

                        <!--if live stream-->
                        <!--if sessionItem.live == 1-->
                        <?php if ($value['live'] == 1){?>
                        <span class="badge text-white ml-3" style="background-color:rgb(238, 194, 120) !important;">Live
                        </span>

                        <?php }
                                                                
                                                                                    if ($edit == TRUE){
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
                    </div>
                </div>
                <hr class="m-2">

                <?php }?>

            </div>

            <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                <p class="text-muted text-sm">Programme subject to variation and change without notice.</p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Back to programme &nbsp;
                &nbsp;<i class="fas fa-arrow-right"></i></button>
        </div>
    </div>

    </form>
</div>
</div>


<?php

                                }else{

                                    echo '<div class="col-' . $widthData . ' p-1 pb-3 pt-3 border-right">
                                    <span class="sessionTitle h5"></span><br>
                                    <span class="sessionSubtitle"></span>
                                    </div>';

                                }

                                if ($session2data){
                                    //only display data if there is a session in the required programme matching that time
                                    //if not go to else
                
                                    //GET DATA

                                    $response =  $sessionView->generateView($session2data[0]['sessionid']);

                                    if ($debug){
                                        echo '<br/><br/>response Array contains </br></br>';
                                        print_r($response);

                                    }

                                    $moderators = $sessionView->getModerators($session2data[0]['sessionid']);

                                    if ($debug){
                                        echo '<br/><br/>moderators Array contains </br></br>';
                                        print_r($moderators);

                                    }

                                    $programmeDate = new DateTime($response[0]['date']);

                                    if ($debug){

                                        print_r($programmeDate); 
                                        
                                    }

                                    //if this date is 7 8 oct
                                    //and $currentTimeandDate is between $sessionTimeFrom and $sessionTimeTo

                                    

                                    echo '<div class="col-' . $widthData . ' p-1 pb-3 pt-3 border-right ' . $highlight . '" "  data-target="#modal-' . $programmeDate->format('l') . '-' . $session2data[0]['programmeid'] . '-' . $sessionTimeFrom->format('Hi') . '">
                                    <span class="sessionTitle h5 ' . $highlight . '">' . $session2data[0]['sessionTitle'] . '</span><br>
                                    <span class="sessionSubtitle">' . $session2data[0]['sessionSubtitle'] . '</span>';
                                    if ($edit){ echo ' <i class="fas fa-edit editSessionFromPlan" data="' . $session1data[0]['sessionid'] . '"></i>';}

                                    echo '</div>';

                                    //echo the modal for the session

                                    

                                

                                   echo '
                            <div class="modal " id="modal-' . $programmeDate->format('l') . '-' . $session2data[0]['programmeid'] . '-' . $sessionTimeFrom->format('Hi') . '" tabindex="-1" role="dialog" aria-labelledby="modal-change-username" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <form>';
                                    ?>
<div class="modal-content bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
    <div class="modal-header">

        <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
            <div>
                <div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                    <img src="<?php echo BASE_URL;?>/assets/img/icons/gieqsicon.png">
                </div>
            </div>
            <div class="text-left">
                <span class="h5 mb-0"><?php echo $response[0]['sessionTitle']?></span>
                <?php
                                                                                //$edit=1;
                                                                                    if ($edit == TRUE){
                                                                                        echo '<span class="ml-3 editSession" data="' . $response[0]['sessionid'] . '"><i class="fas fa-edit"></i></span>';
                                                                
                                                                                    }
                                                                                
                                                                                ?>
                <p class="mb-0"><?php echo $programmeDate->format('D d M Y');?>

                    <?php 
                                                            
                                                            $sessionItemTimeFrom = new DateTime($response[0]['timeFrom'], $serverTimeZone);
                                                            $sessionItemTimeTo = new DateTime($response[array_key_last($response)]['timeTo'], $serverTimeZone);
                                                            
                                                            
                                                            ?>

                    <?php echo ' ' . $sessionItemTimeFrom->format('H:i')?> -
                    <?php echo $sessionItemTimeTo->format('H:i')?></p>
                <p class="mb-0 h6"><?php echo $response[0]['sessionSubtitle']?></p>
                <p class="mb-0 ml-1"></i><?php echo $response[0]['sessionDescription']?></p>
            </div>

        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span="text-white" aria-hidden="true">&times;</span>
        </button>

    </div>
    <div class="modal-subheader px-3 mt-2 mb-2 border-bottom">
        <div class="row">
            <div class="col-sm-12 text-left">
                <div>
                    <span class="h6 mb-0">Moderators</span>
                    <?php
                                                                                    if ($edit == TRUE){
                                                                                        
                                                                                        echo '<span class="ml-1 addModerators"><i class="fas fa-plus"></i></span>';
                                                                
                                                                                    }
                                                                                
                                                                                    
                                                                                ?>
                    <br />

                    <?php
                                                                
                                                                                    foreach ($moderators as $key=>$value){
                                                                                        echo '<span class="faculty mb-0 mr-1" data="' . $value['facultyid'] . '">';
                                                                                        echo $value['title'] . ' ' . $value['firstname'] . ' ' . $value['surname'];
                                                                                        echo '</span><br/>';
                                                                                        
                                                                                    if ($edit == TRUE){
                                                                                        
                                                                                        echo '<span class="ml-1 mr-3 removeModerators"><i class="fas fa-minus"></i></span>';
                                                                
                                                                                    }
                                                                                
                                                                            
                                                                
                                                                                    }
                                                                                    
                                                                                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-body">

        <div class="programme-body">
            <?php foreach ($response as $key=>$value){
                                                                                        ?>


            <div class="sessionItem row d-flex align-items-left text-left align-middle">
                <span class="sessionItemid" style="display:none;"><?php echo $value['sessionItemid'];?></span>
                <div class="pl-2 pr-1 pb-0 pt-1 time">
                    <?php 
                                                            
                                                            $sessionItemTimeFrom = new DateTime($value['sessionItemTimeFrom'], $serverTimeZone);
                                                            $sessionItemTimeTo = new DateTime($value['sessionItemTimeTo'], $serverTimeZone);
                                                            
                                                            
                                                            ?>



                    <span class="timeFrom"><?php echo $sessionItemTimeFrom->format('H:i');?></span> - <span
                        class="timeTo"><?php echo $sessionItemTimeTo->format('H:i');?></span>
                    : </span>


                    <span class="h6 sessionTitle"><?php echo $value['sessionItemTitle'];?></span>

                    <!--if live stream-->
                    <!--if sessionItem.live == 1-->
                    <?php if ($value['live'] == 1){?>
                    <span class="badge text-white ml-3" style="background-color:rgb(238, 194, 120) !important;">Live
                    </span>

                    <?php }
                                                                
                                                                                    if ($edit == TRUE){
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
                </div>
            </div>
            <hr class="m-2">

            <?php }?>

        </div>

        <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
            <p class="text-muted text-sm">Programme subject to variation and change without notice.</p>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Back to programme &nbsp;
            &nbsp;<i class="fas fa-arrow-right"></i></button>
    </div>
</div>

</form>
</div>
</div>


<?php

                                }else{

                                    if ($programme2){

                                    echo '<div class="col-5 p-1 pb-3 pt-3 border-right">
                                    <span class="sessionTitle h5"></span><br>
                                    <span class="sessionSubtitle"></span>
                                    </div>';

                                    }

                                }

                                //check the second session

                            

                            
                            //end row
                            echo '</div>';

                        } //close times foreach

                        

                        //for [0] get first, then check [matches] if not do not add to counter and insert blank column
                        //if yes add another column

                        ?>

<div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
    <p class="text-muted text-sm">Programme subject to change without notice.</p>
</div>

</div>
<!--CLOSE CONTAINER DIV-->


<!--CLOSE CONTAINER DIV-->



<?php               
$general->endgeneral;
$programme->endprogramme;
$session->endsession;
$faculty->endfaculty;
$sessionItem->endsessionItem;
$queries->endqueries;
$sessionView->endsessionView;?>