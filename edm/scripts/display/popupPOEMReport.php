       
<?php 

            $openaccess = 0;
			$requiredUserLevel = 2;
			
			require ('../../includes/config.inc.php');		
			
			//require (BASE_URI1.'/scripts/headerCreatorV2.php');
		
			//(1);
			//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');
		
			
			$general = new general;
			
            $POEM = new POEM;
            
            $data = json_decode(file_get_contents('php://input'), true);

            $key = $data['key'];



$POEM->Load_from_key($key); //load the correct patient record?>

<div class="modal fade docs-example-modal-lg" id="modal-POEM-ENG" tabindex="-1" role="dialog" aria-labelledby="modal-change-username"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">

                    <div class="modal-content mc1 bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
                        <div class="modal-header">
                            <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
                                <div>
                                    <div class="bg-dark mr-3">
                                    <img src="<?php echo BASE_URL1;?>/assets/logo/edm.png" id="navbar-logo" style="height: 50px;">

                                    </div>
                                </div>
                                <div class="text-left align-self-center">
                                    <h5 class="mb-0">Per Oral Endoscopic Myotomy (POEM) report</h5>
                                    <span class="mb-0"></span>
                                </div>

                            </div>
                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="text-white" aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        

                        <div class="modal-body">

                            <div class="faculty-body">

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-left">

                                    <?php

                                    $procedureDate = new DateTime($POEM->getProcedureDate());

                                    ?>
                                    
                                    <p class="text-white">Procedure Date : <?php echo $procedureDate->format('l d M Y');?></p>

                                
                                    <p class="text-white">Clinician : </p>
                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-left">
                                    
                                    <p class="text-white">Indication : <?php echo $general->getValueText('diagnosis', $POEM->getdiagnosis(), 'valuesPOEM')?></p>
                                    
                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-left">
                                    
                                    <p class="text-white">Protocol</p>
                                    
                                        <!-- if there are any of entered then print 
                                    
                                    
                                    -->
                                    <?php
                                    $achalasiaFeatures = [];

                                    if ($POEM->getgastroscopy_prevdilated() == 1){
                                        $achalasiaFeatures['gastroscopy_prevdilated'] = 'a dilated oesophagus';
                                    }

                                    if ($POEM->getgastroscopy_prevresistance() == 1){
                                        $achalasiaFeatures['gastroscopy_prevresistance'] = 'resistance to GOJ passage with the endoscope';
                                    }

                                    if ($POEM->getgastroscopy_prevopenCOJ() == 1){
                                        $achalasiaFeatures['gastroscopy_prevopenCOJ'] = 'a completely open GOJ';
                                    }

                                    

                                    if ($POEM->getgastroscopy_prevspasm() == 1){
                                        $achalasiaFeatures['gastroscopy_prevspasm'] = 'spasm of the oesophageal body';
                                    }

                                    if(!empty($achalasiaFeatures)){

                                        ?><p class="">The following features were present on inspection: <?php

                                        echo implode($achalasiaFeatures, ', ');

                                    }

                                     

                                    echo "</p>";?>

                                    <?php  
                                    
                                    $myotomy_length = $POEM->getmyotomy_bottom() - $POEM->getmyotomy_top();
                                    
                                    
                                    ?>

                                    <p class="">The gastro-oesophageal junction was located at <?php echo $POEM->getPOEM_incision_distance();?> cm from the incisors </p>
                                    <p class="">A submucosal tunnel was created in the <?php echo $POEM->getPOEM_incision_position();?> o'clock orientation at <?php echo $POEM->getPOEM_incision_distance();?> cm using submucosal injection and the  <?php echo $general->getValueText('knife', $POEM->getPOEM_knife(), 'valuesPOEM');?> knife</p>
                                    <p class="">Submucosal tunneling was performed to <?php echo $POEM->getsubmucosal_tunnel_bottom();?>  cm </p>
                                    <p class="">A <?php echo $myotomy_length?> cm myotomy was perfomed from <?php echo $POEM->getmyotomy_top();?> cm (full thickness for the distal <?php echo $POEM->getmyotomy_full_thickness_length_distal();?> cm)</p>
                                    <?php if ($POEM->getPOEM_complication() == 0){?>
                                    <p class="">There were no immediate adverse events</p>
                                    <?}else{

                                        echo '<p>';
                                        
                                        if ($POEM->getPOEM_IPB() == 1){

                                            $treatment = $general->getValueText('IPB_solution', $POEM->getIPB_solution(), 'valuesPOEM');

                                            echo "Intraprocedural bleeding was treated with " .  strtolower($treatment) . '.  ';

                                        }
                                        
                                        if ($POEM->getIPSubcutEmphysema() == 1){

                                            $treatment = $general->getValueText('IPEmphysema', $POEM->getIPSubcutEmphysemaMx(), 'valuesPOEM');

                                            echo "A capnoperitoneum occurred which was treated with " .  strtolower($treatment) . '.  ';

                                        }
                                        
                                        if ($POEM->gettunnel_exit() == 1){

                                            $treatment = $general->getValueText('tunnel_exit_solution', $POEM->gettunnel_exit_solution(), 'valuesPOEM');

                                            echo "A tunnel perforation occurred which was treated with " .  strtolower($treatment) . '.  ';

                                        }
                                        
                                        
                                        
                                        
                                        
                                        
                                    }?>
                                    <p class="">The tunnel was closed with <?php echo $POEM->getPOEM_number_clips();?> endoscopic clips</p>
                                    <p class="">The procedure duration was <?php echo $POEM->getPOEM_duration_total();?> minutes</p>

                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-left">
                                    
                                    <p class="text-white">Conclusion</p>
                                    <?php if ($POEM->getPOEM_complication() == 0){?>
                                        <p class="">Per-oral endoscopic myotomy performed without immediate complication</p>
                                    <?}else{

                                            echo "<p>Per-oral endoscopic myotomy performed with the above described adverse event(s).<p> ";

                                            
                                            




                                    }





                                    
                                    
                                    
                                    ?>
                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-left">
                                    
                                    <p class="text-white">Post-procedure advice</p>
                                    <p class="">
                                        <ul>
                                            
                                        <li>Nil by mouth</li>
                                        <li>Contrast swallow tomorrow am</li>
                                        <li>Strictly no oral intake until contrast swallow result reviewed by consultant</li>
                                        <li>IV antibiotics (e.g. augmentin 1g qds and continue orally 625mg tds for 5 days on discharge)</li>
                                        <li>IV PPI (pantoprazole 40mg bd and continue orally on discharge)</li>
                                        <li>Follow up consultation 4-6 weeks</li>
                                        
                                    
                                    
                                    </ul>
                                    </p>

                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                                   
                                </div>
                            </div>
                            <div class="modal-footer">
                            <p class="text-muted text-sm">Computers are not doctors.  Check this report manually.</p>
                                <button type="button" class="btn btn-sm btn-danger"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
            </div>

</div>

<div class="modal fade docs-example-modal-lg" id="modal-POEM-DUTCH" tabindex="-1" role="dialog" aria-labelledby="modal-change-username"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">

                    <div class="modal-content mc1 bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
                        <div class="modal-header">
                            <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
                                <div>
                                    <div class="bg-dark mr-3">
                                    <img src="<?php echo BASE_URL1;?>/assets/logo/erm.png" id="navbar-logo" style="height: 50px;">

                                    </div>
                                </div>
                                <div class="text-left align-self-center">
                                    <h5 class="mb-0">Per Oral Endoscopic Myotomy (POEM) report</h5>
                                    <span class="mb-0"></span>
                                </div>

                            </div>
                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="text-white" aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        

                        <div class="modal-body">

                            <div class="faculty-body">

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-left">
                                    <?php

                                    $procedureDate = new DateTime($POEM->getProcedureDate());

                                    ?>
                                    
                                    <p class="text-white">Procedure Datum : <?php echo $procedureDate->format('l d M Y');?></p>
                                    <p class="text-white">Endoscopist : </p>
                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-left">
                                    
                                    <p class="text-white">Indicatie : <?php echo $general->getValueText('diagnosis', $POEM->getdiagnosis(), 'valuesPOEM')?></p>
                                    
                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-left">
                                    
                                    <p class="text-white">Protocol</p>
                                    
                                        <!-- if there are any of entered then print 
                                    
                                    
                                    -->
                                    <?php
                                    $achalasiaFeatures = [];

                                    if ($POEM->getgastroscopy_prevdilated() == 1){
                                        $achalasiaFeatures['gastroscopy_prevdilated'] = 'a dilated oesophagus';
                                    }

                                    if ($POEM->getgastroscopy_prevresistance() == 1){
                                        $achalasiaFeatures['gastroscopy_prevresistance'] = 'resistance to GOJ passage with the endoscope';
                                    }

                                    if ($POEM->getgastroscopy_prevopenCOJ() == 1){
                                        $achalasiaFeatures['gastroscopy_prevopenCOJ'] = 'een volledig openstaande gastro-oesofagale junctie';
                                    }

                                    

                                    if ($POEM->getgastroscopy_prevspasm() == 1){
                                        $achalasiaFeatures['gastroscopy_prevspasm'] = 'spasm of the oesophageal body';
                                    }

                                    if(!empty($achalasiaFeatures)){

                                        ?><p class="">De volgende kenmerken waren aanwezig: <?php

                                        echo implode($achalasiaFeatures, ', ');

                                    }

                                     

                                    echo "</p>";?>

                                    <?php  
                                    
                                    $myotomy_length = $POEM->getmyotomy_bottom() - $POEM->getmyotomy_top();
                                    
                                    
                                    ?>

                                    <p class="">De gastro-oesofagale junctie bevindt zich op <?php echo $POEM->getPOEM_incision_distance();?>  cm van de tandenrij. </p>
                                    <p class="">A submucosal tunnel was created in the <?php echo $POEM->getPOEM_incision_position();?> o'clock orientation at <?php echo $POEM->getPOEM_incision_distance();?> cm using submucosal injection and the (xx) knife</p>
                                    <p class="">Submucosal tunneling was performed to <?php echo $POEM->getsubmucosal_tunnel_bottom();?>  cm </p>
                                    <p class="">A <?php echo $myotomy_length?> cm myotomy was perfomed from <?php echo $POEM->getmyotomy_top();?> cm (full thickness for the distal <?php echo $POEM->getmyotomy_full_thickness_length_distal();?> cm)</p>
                                    <?php if ($POEM->getPOEM_complication() == 0){?>
                                    <p class="">There were no immediate adverse events</p>
                                    <?}else{

                                        echo '<p>';
                                        
                                        if ($POEM->getPOEM_IPB() == 1){

                                            $treatment = $general->getValueText('IPB_solution', $POEM->getIPB_solution(), 'valuesPOEM');

                                            echo "Intraprocedural bleeding was treated with " .  strtolower($treatment) . '.  ';

                                        }
                                        
                                        if ($POEM->getIPSubcutEmphysema() == 1){

                                            $treatment = $general->getValueText('IPEmphysema', $POEM->getIPSubcutEmphysemaMx(), 'valuesPOEM');

                                            echo "A capnoperitoneum occurred which was treated with " .  strtolower($treatment) . '.  ';

                                        }
                                        
                                        if ($POEM->gettunnel_exit() == 1){

                                            $treatment = $general->getValueText('tunnel_exit_solution', $POEM->gettunnel_exit_solution(), 'valuesPOEM');

                                            echo "A tunnel perforation occurred which was treated with " .  strtolower($treatment) . '.  ';

                                        }
                                        
                                        
                                        
                                        
                                        
                                        
                                    }?>
                                    <p class="">The tunnel was closed with <?php echo $POEM->getPOEM_number_clips();?> endoscopic clips</p>
                                    <p class="">The procedure duration was <?php echo $POEM->getPOEM_duration_total();?> minutes</p>

                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-left">
                                    
                                    <p class="text-white">Conclusion</p>
                                    <?php if ($POEM->getPOEM_complication() == 0){?>
                                        <p class="">Per-oral endoscopic myotomy performed without immediate complication</p>
                                    <?}else{

                                            echo "<p>Per-oral endoscopic myotomy performed with the above described adverse event(s).<p> ";

                                            
                                            




                                    }





                                    
                                    
                                    
                                    ?>
                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-left">
                                    
                                    <p class="text-white">Post-procedure advice</p>
                                    <p class="">
                                        <ul>
                                            
                                        <li>Nil by mouth</li>
                                        <li>Contrast swallow tomorrow am</li>
                                        <li>Strictly no oral intake until contrast swallow result reviewed by consultant</li>
                                        <li>IV antibiotics (e.g. augmentin 1g qds and continue orally 625mg tds for 5 days on discharge)</li>
                                        <li>IV PPI (pantoprazole 40mg bd and continue orally on discharge)</li>
                                        <li>Follow up consultation 4-6 weeks</li>
                                        
                                    
                                    
                                    </ul>
                                    </p>

                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                                   
                                </div>
                            </div>
                            <div class="modal-footer">
                            <p class="text-muted text-sm">Computers are not doctors.  Check this report manually.</p>
                                <button type="button" class="btn btn-sm btn-danger"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
            </div>

</div>