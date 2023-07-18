<?php

            $openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            //$general = new general;
            //$programme = new programme;
            $emailLink = new emailLink;
            $emailContent = new emailContent;
            
            //error_reporting(E_ALL);
            $debug = TRUE;

            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            
            if ($debug){
            print_r($data);
            }

            $emailid = $data['emailid'];
            $databaseName = $data['databaseName'];
            
            $nextDisplay = $emailLink->getNextDisplayOrder($emailid);


            $emailContent->New_emailContent($emailid, null, null, null, $nextDisplay);
            echo $emailContent->prepareStatementPDO();



            ?>





<?php
        

            
           

            
             
//$general->endgeneral();
//$programme->endprogramme();
//$userRegistrations->enduserRegistrations();
?>