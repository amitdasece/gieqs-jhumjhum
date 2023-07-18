<?php

            $openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');
            $_SESSION['debug'] = true;

            //$general = new general;
            //$programme = new programme;
            $emailLink = new emailLink;
            //$emailContent = new emailContent;           
            $emails = new emails;
            $userFunctions = new userFunctions;

        
            //error_reporting(E_ALL);
            $debug = true;

            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            
            if ($debug){
            print_r($data);
            }

            $emailid = $data['emailid'];
            //$audience = $data['audience'];
            

            if ($emails->Return_row($emailid)){

                //make the email inactive

                $emails->Load_from_key($emailid);
                //$emails->setactive('0');

                $newEmail = $emailLink->duplicateMail($emailid, true);

                if ($debug){

                    echo 'new email id is '. $newEmail;
                }

                $emailLink->copyRecords($emailid, $newEmail, $debug=false);


                //inactivate the newly copied email
                $emails->Load_from_key($newEmail);
                $emails->setactive('0');
                $emails->prepareStatementPDOUpdate();
                

                //emaillink duplicate the email

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