<?php

$openaccess =1;
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
            $sessionOrder = new sessionOrder;
            $sessionModerator = new sessionModerator;


            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            //print_r($data);

            $sessionid = $data['sessionid'];
            $sessionItemID = $data['sessionItemID'];

            //check this combination does not already exist

            if (($sessionView->checkCombinationSessionSessionItem($sessionid, $sessionItemID)) === true){

                //if above true
                //echo 'true';
                //get the id of sessionModerator

            
                    $sessionItem->Load_from_key($sessionItemID);
                    echo $sessionItem->Delete_row_from_key($sessionItemID);

                    //also delete the link

                    //get sessionOrder id

                    $sessionOrderID = $sessionView->checkCombinationSessionOrderReturn($sessionid, $sessionItemID);
                    $sessionOrder->Load_from_key($sessionOrderID);
                    $sessionOrder->Delete_row_from_key($sessionOrderID);




                

           

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