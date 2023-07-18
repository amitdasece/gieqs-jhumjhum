<?php

            $openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            //$general = new general;
            //$programme = new programme;
            $assetManager= new assetManager;
            
            //error_reporting(E_ALL);
            $debug = $gigs_debug;

            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            
            if ($debug){
            print_r($data);
            }

            $assetid = $data['assetid'];
            

            //new methods for options, get from database
            //here put your denominator !!EDIT

            echo json_encode($assetManager->returnProgrammesAsset($assetid));
        

            
           

            
             
//$general->endgeneral();
//$programme->endprogramme();
//$userRegistrations->enduserRegistrations();
?>