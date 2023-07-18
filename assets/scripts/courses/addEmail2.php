<?php
header('Access-Control-Allow-Origin: *');
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
            $databaseName = $data['databaseName'];
            


            $emails->New_emails(null, 'new mail', null, null, null, null);
            echo $emails->prepareStatementPDO();



            ?>





<?php
        

            
           

            
             
//$general->endgeneral();
//$programme->endprogramme();
//$userRegistrations->enduserRegistrations();
?>