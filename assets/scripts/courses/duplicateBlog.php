<?php

            $openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');
            $_SESSION['debug'] = true;

            //$general = new general;
            //$programme = new programme;
            $blogLink = new blogLink;
            //$emailContent = new emailContent;           
            $blogs = new blogs;
            $userFunctions = new userFunctions;

        
            //error_reporting(E_ALL);
            $debug = true;

            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            
            if ($debug){
            print_r($data);
            }

            $emailid = $data['blogid'];
            //$audience = $data['audience'];
            

            if ($blogs->Return_row($emailid)){

                //make the email inactive

                $blogs->Load_from_key($emailid);
                //$blogs->setactive('0');

                $newEmail = $blogLink->duplicateMail($emailid, true);

                if ($debug){

                    echo 'new blog id is '. $newEmail;
                }

                $blogLink->copyRecords($emailid, $newEmail, $debug=false);


                //inactivate the newly copied email
                $blogs->Load_from_key($newEmail);
                $blogs->setactive('0');
                $blogs->prepareStatementPDOUpdate();
                

                //blogLink duplicate the email

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