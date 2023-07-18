<?php

            $openaccess =1;
			//$requiredUserLevel = 4;
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            $general = new general;
            $programme = new programme;
            
            $courseManager = new courseManager;

            $assetManager = new assetManager;

            $assets_paid = new assets_paid;

            $databaseName = assets_paid;


            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            print_r($data);

            $assetid = $data['assetid'];
            $assets_course_id = $data['assets_course_id'];

            //check this combination does not already exist

            if (($sessionView->checkCombinationSessionSessionItem($sessionid, $sessionItemid)) === false){

                //if above false
                //insert a new link
                
                

                $sessionOrder->setsessionid($sessionid);
                $sessionOrder->setsessionItemid($sessionItemid);

                

                echo $sessionOrder->prepareStatementPDO();

                //echo 'false';

           

            }else{

                //suggest the link already exists

                echo '4';
            }

            
             
$general->endgeneral;
$programme->endprogramme;
$session->endsession;
$faculty->endfaculty;
$sessionItem->endsessionItem;
$queries->endqueries;
$sessionView>endsessionView;?>