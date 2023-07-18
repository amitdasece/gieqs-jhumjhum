<?php

            $openaccess = 1;
            
			//$requiredUserLevel = 4;
			require ('../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            $general = new general;
            $programme = new programme;
            $session = new session;
            $faculty = new faculty;
            $sessionItem = new sessionItem;
            $queries = new queries;
            $sessionView = new sessionView;
            $sessionModerator = new sessionModerator;


            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            //print_r($data);

            $sessionid = $data['sessionid'];
            $moderatorid = $data['moderatorid'];

            //check this combination does not already exist

            if (($sessionView->checkCombination($sessionid, $moderatorid)) === false){

                //echo 'into here';
                //if above false
                $sessionModerator->setsessionid($sessionid);
                $sessionModerator->setfacultyid($moderatorid);
                echo $sessionModerator->prepareStatementPDO();

            }else{

                echo '4';
            }

            
             
$general->endgeneral;
$programme->endprogramme;
$session->endsession;
$faculty->endfaculty;
$sessionItem->endsessionItem;
$queries->endqueries;
$sessionView>endsessionView;?>