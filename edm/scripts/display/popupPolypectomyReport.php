       
<?php 

            $openaccess = 0;
			$requiredUserLevel = 2;
			
			require ('../../includes/config.inc.php');		
			
			//require (BASE_URI1.'/scripts/headerCreatorV2.php');
		
			//(1);
			//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');
		
			
			$general = new general;
			
            $PolypectomyAssessmentTool = new PolypectomyAssessmentTool;
            
            $data = json_decode(file_get_contents('php://input'), true);

            $key = $data['key'];



$PolypectomyAssessmentTool->Load_from_key($key); //load the correct patient record?>

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
                                    <h5 class="mb-0">Polypectomy Report Card</h5>
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

                                    //$procedureDate = new DateTime($POEM->getProcedureDate());

                                    ?>
                                    
                                    <p class="text-white">Procedure Date : <?php //echo $procedureDate->format('l d M Y');?></p>

                                
                                    <p class="text-white">Clinician : </p>
                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-left">
                                    
                                    <p class="text-white">Indication : <?php //echo $general->getValueText('diagnosis', $POEM->getdiagnosis(), 'valuesPOEM')?></p>
                                    
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
                                    <h5 class="mb-0">Polypectomy Report Card</h5>
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

                                    //$procedureDate = new DateTime($POEM->getProcedureDate());

                                    ?>
                                    
                                    <p class="text-white">Procedure Date : <?php //echo $procedureDate->format('l d M Y');?></p>
                                    <p class="text-white">Endoscopist : </p>
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