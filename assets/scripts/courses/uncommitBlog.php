<?php

            $openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            //$general = new general;
            //$programme = new programme;
            $blogLink = new blogLink;
            //$emailContent = new emailContent;           
            $blogs = new blogs;

        
            //error_reporting(E_ALL);
            $debug = FALSE;

            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            
            if ($debug){
            print_r($data);
            }

            $emailid = $data['blogid'];
            //$audience = $data['audience'];
            

            if ($blogs->Return_row($emailid)){

                $blogs->Load_from_key($emailid);
                $blogs->setactive('0');
                //$blogs->setaudience($audience);
                echo $blogs->prepareStatementPDOUpdate();

            }else{

                if ($debug){
                echo 'blog not found';
                }
            }
            



            ?>





<?php
        

            
           

            
             
//$general->endgeneral();
//$programme->endprogramme();
//$userRegistrations->enduserRegistrations();
?>