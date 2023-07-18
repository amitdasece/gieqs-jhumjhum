<?php

$openaccess =1;
			//$requiredUserLevel = 4;
			require ('../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            $general = new general;
            $programme = new programme;
            $session = new session;
            //$faculty = new faculty;
            $sessionItem = new sessionItem;
            $queries = new queries;
            $sessionView = new sessionView;
            $programmeReports = new programmeReports;


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

if (isset($_GET["id"]) && is_numeric($_GET["id"])){
	$id = $_GET["id"];
    $id_set = true;

}else{

	$id = null;
    $id_set = false;

}




            //error_reporting(E_ALL);
            //$print_r()

            //$data = json_decode(file_get_contents('php://input'), true);

            //print_r($data);

            //get all faculty

            if ($id_set){

            $facultyMembers = array(0=>$id);

            }else{

                $facultyMembers = $programmeReports->LoadAllFaculty();
            }

            //print_r($facultyMembers);

    foreach ($facultyMembers as $key3=>$value3){

            $facultyid = $value3;

            //$edit ability; display icons next to editable segments.

            $edit = 1;
            
            //testing
            //$facultyid = 1;


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
                //print_r($response3);

                //print_r($response2);
                //TODO get moderator roles too and list amongst

                if ($debug){

                ?><pre><?php print_r($response3); ?></pre><?php

                }

                $programmeDate = new DateTime($response3[0]['date']);

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
                <h2><span class="h5 mb-0">GIEQs III Conference plan for <?php echo $sessionView->getFacultyNamePrint($facultyid)?></span></h2>
                <?php
                    if ($edit == 1){
                        echo '<span class="ml-3 editSession" data="' . $response3[0]['sessionid'] . '"><i class="fas fa-edit"></i></span>';

                    }

                    $checkDate = '';
                
                ?>
    
            </div>

        </div>
        

    </div>
    
    <div class="modal-body">

        <div class="programme-body">
            <?php 
            $x = 0;
            
            foreach ($response3 as $key=>$value){
                
                if ($debug){
                echo $key;
                echo $x . '<br/>';     
                }

                //print_r($value);
                $moderation_item = null;
                $moderation_item = multi_array_key_exists('sessionItemDescription', $value);


                //do dates

                $timefrom = $value['timeFrom'];
                $timeto = $value['timeTo'];

                //echo date ('H:i',strtotime($date));


                //var_dump($moderation_item);
                //echo '<br/><br/>';
                //continue;
                        //$last
                      
                            
                      /*   $lastsessionid = $response[$key-1]['sessionid'];
                        
                        if ($debug){
                                                echo $lastsessionid .' is lastsession id <br/>';
                        echo $value['sessionid'] . 'is session id this time';
                        echo $value['facultyid'] . 'is value faculty id';
                        echo $facultyid . 'is the value of $facultyid';
                        }

                        if (($lastsessionid == $value['sessionid']) && ($value['facultyid'] == $facultyid)){

                            //stop printing loads of moderation lines

                            $x++;

                            continue;
                        } */

                       
                        
                        ?>

<hr>
            <div class="sessionItem row d-flex align-items-left text-left align-middle">
                <span class="sessionItemid" style="display:none;"><?php echo $value['sessionItemid'];?></span>
                <div class="pl-2 pr-1 pb-0 pt-1 time">

                <?php if ($checkDate != $value['date']){?>

                    

                    <h2><p><?php $checkDate = $value['date']; $programmeDate = new DateTime($value['date']);?>
                    <span><?php echo $programmeDate->format('D d M Y');?></span>
                    </p></h2>

                <?php }?>
                    <p style="font-size:1.1rem; padding-left:2rem;"><span><span><?php echo date ('H:i',strtotime($timefrom)) . ' - ' . date ('H:i',strtotime($timeto)); ?></span></span><span style="font-weight:bold;"> : <?php echo $value['sessionTitle'];?></span> 
                    <span><br/><?php echo $value['sessionDescription'];?></span></span>
                    
                
                </p>
                    <p class="" style="padding-left:3rem;">Role : <span style="font-weight: bold;"><?php if ($moderation_item === FALSE){echo 'Moderator '; continue;} elseif($value['live'] == 1){echo 'Live Case';}else{echo 'Lecture   ';}?></span></p>
                    <p style="padding-left:3rem;"><span class="timeFrom"><?php echo $value['sessiontimeFrom'];?></span> - <span class="timeTo"><?php echo $value['sessiontimeTo'];?></span>
                    : <span style="font-weight: bold;" class="h6 sessionTitle"> <?php echo $value['sessionItemTitle'];?></span></p>

                </div>
                

            </div>
            <div class="row d-flex align-items-left text-left align-middle">
                <div class="pl-3 pr-1 pb-0 pt-0 time">
                    <p style="padding-left:3rem;"><span class="sessionDescription"><?php echo $value['sessionItemDescription'];?></span></p>

                    <p style="padding-left:3rem;" class="pt-2 h6 faculty"><?php 
                    
                    $faculty = $sessionView->getFacultyName($value['faculty']);

                    echo $faculty['title'] . ' ' . $faculty['firstname'] . ' ' . $faculty['surname'];
                    
                    
                    ?></p>

                    <?php  $assets = $sessionView->getAssets($value['sessionItemid']);

                    //print_r($assets); 
                    
                    if ($assets){
                    
                    ?>

                    <p class="pt-3 pl-6 assets"><span class="h6">Session Assets</span>


                        
                        <?php

                        foreach ($assets as $key=>$value){



                            if ($edit == 1){
                                echo '<span class="ml-3 editAsset"><i class="fas fa-edit"></i></span>';
                                echo '<span class="ml-3 deleteAsset"><i class="fas fa-times"></i></span>';

                            }

                        }
                        
                        
                        if ($edit == 1){
                            //because we only want one plus button
                        echo '<span class="ml-3 addAsset"><i class="fas fa-plus"></i></span>';
                        }

                    }

                    

                    ?>
                    </p>
                </div>
            </div>
            

            <?php 
           $x++;
        
        }?>

        </div>
        <hr>
        <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
            <p class="text-muted text-sm">Programme subject to change without notice.  Please direct any questions to gieqs@seauton-international.com</p>
        </div>
    </div>
    <div class="modal-footer">
       
    </div>
</div>
<br/><br/><br/><br/><br/><br/>


<?php 

                }

$general->endgeneral;
$programme->endprogramme;
$session->endsession;
$faculty->endfaculty;
$sessionItem->endsessionItem;
$queries->endqueries;
$sessionView>endsessionView;?>