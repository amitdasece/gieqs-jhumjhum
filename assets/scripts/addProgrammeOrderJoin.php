<?php

$openaccess =1;
			//$requiredUserLevel = 4;
			require ('../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            $general = new general;
            $programme = new programme;
            $session = new session;
            
            $sessionItem = new sessionItem;
            $queries = new queries;
            $sessionView = new sessionView;
           
            $sessionOrder = new sessionOrder;
            $programmeOrder = new programmeOrder;


            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            //print_r($data);

            $sessionid = $data['sessionid'];
            $programmeid = $data['programmeid'];

            //check this combination does not already exist

            if (($sessionView->checkCombinationProgrammeOrder($sessionid, $programmeid)) === false){

                //if above false
                //insert a new link
                //echo 'false';
                
                

                $programmeOrder->setsessionid($sessionid);
                $programmeOrder->setprogrammeid($programmeid);

                

                echo $programmeOrder->prepareStatementPDO();

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