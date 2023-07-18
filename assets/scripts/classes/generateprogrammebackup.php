foreach ($programmes as $key=>$value){

                            $programmeDate = new DateTime($value['date']);

                            if ($x<2){

                            //get session items for programme id [1-2]
                            $sessions = $programmeView->getSessions($value['programmeid']);

                            //print_r($sessions);

                             
                        ?>

        <div class="col-1 p-1 pb-3 pt-3 border-right">
            <span class="tiny"
                style="color: rgb(238, 194, 120);"><?php echo $sessions[0]['timeFrom'] . ' - ' . $sessions[0]['timeTo']?></span>
        </div>


        <?php
                            
                                foreach ($sessions as $key=>$value){  //TODO first 1
                                    ?>

                                    <div class="col-4 p-1 pb-3 pt-3 border-right">
                                    <span class="sessionTitle h5"><?php echo $value['sessionTitle']?></span><br>
                                    <span class="sessionSubtitle"><?php echo $value['sessionSubtitle']?></span>
                                    </div>
                        
                               
                                    


                               <?php     

                                    //if timeFrom not the same insert a blank column


                                }  // close sessions loop

                            }//close if

                            $x++;
                        
                        } //close foreach programme loop

                    ?>





       

        



    </div>

    <div class="row text-center border-left border-right border-bottom bg-dark">

        <div class="col-1 p-1 pb-3 pt-3 border-right">
            <span class="tiny" style="color: rgb(238, 194, 120);">0900-1000</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="sessionTitle h5">Optimal Colonoscopy Technique</span><br>
            <span class="sessionSubtitle">Intubation, withdrawal and diminutive polyps</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="h5"></span><br>
            <span></span>
        </div>

        <div class="col-3 p-1 pb-3 pt-3">
            <span class="h5"></span><br>
            <span></span>
        </div>



    </div>

    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

        <div class="col-1 p-1 pb-3 pt-3 border-right">
            <span class="tiny" style="color: rgb(238, 194, 120);">1000-1045</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="h5"></span><br>
            <span></span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="sessionTitle h5">Live ERCP technique</span><br>
            <span class="sessionSubtitle">Papillary morphology versus technique</span>
        </div>

        <div class="col-3 p-1 pb-3 pt-3">
            <span class="sessionTitle h5">Live Colonoscopy technique</span><br>
            <span class="sessionSubtitle">Quicker, painless intubation</span>
        </div>



    </div>

    <div class="row text-center align-middle border-left border-right border-bottom">

        <div class="col-12 p-2 pb-3 pt-3">
            <span class="h5" style="color: rgb(238, 194, 120);">Morning Tea</span>
        </div>




    </div>

    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

        <div class="col-1 p-1 pb-3 pt-3 border-right">
            <span class="tiny" style="color: rgb(238, 194, 120);">1100-1200</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="sessionTitle h5">GI bleeding symposium</span><br>
            <span class="sessionSubtitle">Techniques for effective hemostasis</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="sessionTitle h5">Basic ERCP symposium</span><br>
            <span class="sessionSubtitle">Stones, stents and strictures</span>
        </div>

        <div class="col-3 p-1 pb-3 pt-3">
            <span class="sessionTitle h5">Live GIB / ERCP</span><br>
            <span class="sessionSubtitle">Best practice techniques</span>
        </div>



    </div>
    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

        <div class="col-1 p-1 pb-3 pt-3 border-right">
            <span class="tiny" style="color: rgb(238, 194, 120);">1200-1245</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="sessionTitle h5">Difficult GI bleeding</span><br>
            <span class="sessionSubtitle">Use of new techniques as first line</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="sessionTitle h5">Difficult Cannulation</span><br>
            <span class="sessionSubtitle">Prediction, preparation and when to refer</span>
        </div>

        <div class="col-3 p-1 pb-3 pt-3">
            <span class="h5"></span><br>
            <span></span>
        </div>



    </div>

    <div class="row text-center align-middle border-left border-right border-bottom">

        <div class="col-12 p-2 pb-3 pt-3">
            <span class="h5" style="color: rgb(238, 194, 120);">Lunch</span>
        </div>




    </div>

    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

        <div class="col-1 p-1 pb-3 pt-3 border-right">
            <span class="tiny" style="color: rgb(238, 194, 120);">1345-1415</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="sessionTitle h5">Principles of Endoscopic Imaging<br> in the GI
                tract</span><br>
            <span class="sessionSubtitle">The 'Demarcated area' - a predictor of invasion</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">

        </div>

        <div class="col-3 p-1 pb-3 pt-3">
            <span class="h5"></span><br>
            <span></span>
        </div>



    </div>

    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

        <div class="col-1 p-1 pb-3 pt-3 border-right">
            <span class="tiny" style="color: rgb(238, 194, 120);">1415-1515</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="sessionTitle h5">Principles of Endoscopy Unit Design<br> and
                management</span><br>
            <span class="sessionSubtitle">The Global Rating Scale and exportability</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="sessionTitle h5">Management of adverse events <br> at ERCP</span><br>
            <span class="sessionSubtitle">Pancreatitis, bleeding and perforation</span>
        </div>

        <div class="col-3 p-1 pb-3 pt-3">
            <span class="h5"></span><br>
            <span></span>
        </div>



    </div>

    <div class="row text-center align-middle border-left border-right border-bottom">

        <div class="col-12 p-2 pb-3 pt-3">
            <span class="h5" style="color: rgb(238, 194, 120);">Afternoon Tea</span>
        </div>




    </div>

    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

        <div class="col-1 p-1 pb-3 pt-3 border-right">
            <span class="tiny" style="color: rgb(238, 194, 120);">1530-1630</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="sessionTitle h5">IBD in Endoscopy Symposium</span><br>
            <span class="sessionSubtitle">Comprehensive endoscopic assessment of activity</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="sessionTitle h5">Basic EUS</span><br>
            <span class="sessionSubtitle">Quality standardised examination</span>
        </div>

        <div class="col-3 p-1 pb-3 pt-3">
            <span class="sessionTitle h5">Live IBD / EUS</span><br>
            <span class="sessionSubtitle">Chromoendoscopy and technique</span>
        </div>



    </div>

    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

        <div class="col-1 p-1 pb-3 pt-3 border-right">
            <span class="tiny" style="color: rgb(238, 194, 120);">1630-1700</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="sessionTitle h5">Endoscopic Management of strictures <br>in IBD</span><br>
            <span class="sessionSubtitle">Balloon, incision or surgery</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="sessionTitle h5">Unit setup for EUS / ERCP</span><br>
            <span class="sessionSubtitle">Equipment, settings and personnel</span>
        </div>

        <div class="col-3 p-1 pb-3 pt-3">
            <span class="h5"></span><br>
            <span></span>
        </div>



    </div>

    <div class="row text-center align-middle border-left border-right border-bottom">

        <div class="col-12 p-2 pb-3 pt-3">
            <span class="h5" style="color: rgb(238, 194, 120);">Break</span>
        </div>




    </div>

    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

        <div class="col-1 p-1 pb-3 pt-3 border-right">
            <span class="tiny" style="color: rgb(238, 194, 120);">1715-1800</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="sessionTitle h5">Artificial Intelligence in Endoscopy</span><br>
            <span class="sessionSubtitle">Implications, Ethics and Future Directions</span>
        </div>

        <div class="col-4 p-1 pb-3 pt-3 border-right">
            <span class="sessionTitle h5">Interventional EUS symposium</span><br>
            <span class="sessionSubtitle">Role in everyday practice, referral criteria</span>
        </div>

        <div class="col-3 p-1 pb-3 pt-3">
            <span class="sessionTitle h5">AI Live</span><br>
            <span class="sessionSubtitle">current state of the tech</span>
        </div>



    </div>

    <div class="row text-center align-middle border-left border-right border-bottom">

        <div class="col-12 p-2 pb-3 pt-3">
            <span class="h5" style="color: rgb(238, 194, 120);">1930 - Conference Dinner</span>
        </div>




    </div>

    <div class="row text-left">

        <div class="col-12 p-2 pb-3 pt-3">
            <span class="text-sm">Programme contents subject to change without notice.</span>
        </div>




    </div>

</div>

















<div class="modal-content bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
    <div class="modal-header">

        <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
            <div>
                <div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                    <img src="../../assets/img/icons/gieqsicon.png">
                </div>
            </div>
            <div class="text-left">
                <span class="h5 mb-0"><?php echo $response[0]['sessionTitle']?></span>
                <?php
                    if ($edit == 1){
                        echo '<span class="ml-3 editSession" data="' . $response[0]['sessionid'] . '"><i class="fas fa-edit"></i></span>';

                    }
                
                ?>
                <p class="mb-0"><?php echo $programmeDate->format('D d M Y');?>
                    <?php echo ' ' . $response[0]['timeFrom']?> -
                    <?php echo $response[array_key_last($response)]['timeTo']?></p>
                <p class="mb-0"><?php echo $response[0]['sessionSubtitle']?></p>
                <p class="mb-0"><?php echo $response[0]['sessionDescription']?></p>
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
                    if ($edit == 1){
                        
                        echo '<span class="ml-1 addModerators"><i class="fas fa-plus"></i></span>';

                    }
                
                    
                ?>
                    <br />

                    <?php

                    foreach ($moderators as $key=>$value){
                        echo '<span class="faculty mb-0 mr-1" data="' . $value['facultyid'] . '">';
                        echo $value['title'] . ' ' . $value['firstname'] . ' ' . $value['surname'];
                        echo '</span>';
                        
                    if ($edit == 1){
                        
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
                    <span class="timeFrom"><?php echo $value['sessionItemTimeFrom'];?></span> - <span
                        class="timeTo"><?php echo $value['sessionItemTimeTo'];?></span>
                    : </span>

                </div>
                <div class="pr-2 pb-0 pt-1">
                    <span class="h6 sessionTitle"><?php echo $value['sessionItemTitle'];?></span>

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