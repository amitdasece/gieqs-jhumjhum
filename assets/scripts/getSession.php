<?php

$openaccess =1;
			//$requiredUserLevel = 4;
			require ('../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            $general = new general;
            $programme = new programme;
            $programmeOrder = new programmeOrder;
            $session = new session;
            $queries = new queries;
            $sessionView = new sessionView;

             //$print_r()

             $table = 'session';

             eval('$esdLesion = new ' . $table . ';');

             $data = json_decode(file_get_contents('php://input'), true);

             //print_r($data);
 
             $sessionid = $data['sessionid'];
             

            //$sessionarray = $session->Load_records_limit_json(500);
            $sessionarray = $session->Return_row($sessionid);

             //decode the json

            
            $decode = json_decode($sessionarray, true);

             //push programmeid into the sessionarray

            //print_r($sessionarray);

            $programmeid = $sessionView->getSessionProgramme($sessionid);

             $decode[0]['programmeid'] = $programmeid;
             //print_r($decode);

             //recode the json

             //return sessionarray

             echo json_encode($decode);


             

            
             
$general->endgeneral;
$programme->endprogramme;
$session->endsession;
$queries->endqueries;
$sessionView>endsessionView;?>