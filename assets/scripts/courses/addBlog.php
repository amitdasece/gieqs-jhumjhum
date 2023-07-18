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
            $databaseName = $data['databaseName'];

            //$_SESSION['debug'] = true;
            

            $timestamp = date('Y-m-d H:i:s');
            $blogs->New_blogs(null, 'new blog', null, null, null, null, null, null, null, $timestamp, null);
            echo $blogs->prepareStatementPDO();



            ?>





<?php
        

            
           

            
             
//$general->endgeneral();
//$programme->endprogramme();
//$userRegistrations->enduserRegistrations();
?>