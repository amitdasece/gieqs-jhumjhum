<?php

            $openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            //$general = new general;
            //$programme = new programme;
            $emailLink = new emailLink;
            //$emailContent = new emailContent;           
            $emails = new emails;

        
            //error_reporting(E_ALL);
            $debug = FALSE;

            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            
            if ($debug){
            print_r($data);
            }

            $emailid = $data['emailid'];
            //$audience = $data['audience'];
            

            if ($emails->Return_row($emailid)){

                $emails->Load_from_key($emailid);
                $emails->setactive('0');
                //$emails->setaudience($audience);
                echo $emails->prepareStatementPDOUpdate();

            }else{

                if ($debug){
                echo 'email not found';
                }
            }
            



            ?>





<?php
        

            
           

            
             
//$general->endgeneral();
//$programme->endprogramme();
//$userRegistrations->enduserRegistrations();
?>