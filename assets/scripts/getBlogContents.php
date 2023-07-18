<?php

            $openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            //$general = new general;
            //$programme = new programme;
            //error_reporting(E_ALL);
            $debug = $gigs_debug;
           // $_SESSION['debug'] = FALSE;

            //$blogLink = new blogLink;
           
require_once BASE_URI . '/assets/scripts/classes/blogLink.class.php';
$blogLink = new blogLink;

            

            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            
            if ($debug){
            print_r($data);
            }

            $blogid = $data['blogid'];
            

            //new methods for options, get from database
            //here put your denominator !!EDIT

            echo json_encode($blogLink->getEmailContents($blogid, false));
        

            
           

            
             
//$general->endgeneral();
//$programme->endprogramme();
//$userRegistrations->enduserRegistrations();
?>