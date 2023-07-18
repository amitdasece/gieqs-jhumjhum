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
            $sessionView = new sessionView;
            $programmeReports = new programmeReports;

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

            $facultyid = $data['facultyid'];

            //$edit ability; display icons next to editable segments.

            $edit = 1;
            
            //testing
            //$facultyid = 1;


                //get session data    

                $response =  $programmeReports->generateReport($facultyid);
                //TODO this gets only the sessionItems

                //TODO get moderator roles too and list amongst

                //print_r($response);

                

                $programmeDate = new DateTime($response[0]['date']);

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
                <span class="h5 mb-0">Conference plan for <?php echo $sessionView->getFacultyNamePrint($facultyid)?></span>
                <?php
                    if ($edit == 1){
                        echo '<span class="ml-3 editSession" data="' . $response[0]['sessionid'] . '"><i class="fas fa-edit"></i></span>';

                    }
                
                ?>
    
            </div>

        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span="text-white" aria-hidden="true">&times;</span>
        </button>

    </div>
    
    <div class="modal-body">

        <div class="programme-body">
            <?php foreach ($response as $key=>$value){
                        
                        
                       

                        
                        ?>

                    
            <div class="sessionItem row d-flex align-items-left text-left align-middle">
                <span class="sessionItemid" style="display:none;"><?php echo $value['sessionItemid'];?></span>
                <div class="pl-2 pr-1 pb-0 pt-1 time">
                
                    <p><span>Session : <?php echo $value['sessionTitle'];?></span> 
                    <?php $programmeDate = new DateTime($value['date']);?>
                    <span><?php echo $programmeDate->format('D d M Y');?></span>
                    <span><?php echo $value['timeFrom'] . ' - ' . $value['timeTo']; ?></span>
                
                </p>

                    <span class="timeFrom"><?php echo $value['sessiontimeFrom'];?></span> - <span class="timeTo"><?php echo $value['sessiontimeTo'];?></span>
                    : </span>

                </div>
                <div class="pr-2 pb-0 pt-1">
                    <span class="h6 sessionTitle"><?php if ($value['facultyid'] == $facultyid){echo 'Moderator : ';} elseif($value['live'] == 1){echo 'Live Case : ';}else{echo 'Lecture :  ';} echo $value['sessionItemTitle'];?></span>

                    <!--if live stream-->
                    <!--if sessionItem.live == 1-->
                    <?php if ($value['live'] == 1){?>
                    <span class="badge text-white ml-3" style="background-color:rgb(238, 194, 120) !important;">Live
                        Stream</span>

                    <?php }

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
            <hr>

            <?php }?>

        </div>

        <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
            <p class="text-muted text-sm">Programme subject to change without notice.</p>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary">Back to programme &nbsp; &nbsp;<i
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