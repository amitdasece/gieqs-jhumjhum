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
             $programmeid = $data['programmeid'];
             $update = $data['update'];

             unset($data['update']);
                unset($data['programmeid']);
                unset($data['sessionid']);

             

            function rempty ($var)
            {
                return !($var == "" || $var == null);
            }

            if ($update == 0){

                //new form

                

                $data = array_filter($data, 'rempty');

                $values = implode('\', \'', $data);
                $keys = array_keys($data);

                $log = array();

                foreach ($data as $key=>$value){

                    $targetStatement = '$esdLesion->set' . $key . '("' . $value . '");';
                    //echo $targetStatement;
                    
                    try {
                    
                        eval($targetStatement);
                    
                    }
                    catch(Exception $e){

                        $log[] = $e . 'could not be evaluated';

                    }
                    

                }

                $updatedSession = $esdLesion->prepareStatementPDO();

                //also insert the programme id, other data on the form not session

                $programmeOrder->setsessionid($sessionid);
                $programmeOrder->setprogrammeid($programmeid);
                $updatedProgramme = $programmeOrder->prepareStatementPDO();

                $returnArray = array();

                $returnArray['updatedProgramme'] = $updatedProgramme;
                $returnArray['updatedSession'] = $updatedSession;

                echo json_encode($returnArray);





                

            }else{

                //update

                //check the record exists

                $targetStatement = '$esdLesion->Load_from_key("' . $sessionid . '");';
                    //echo $targetStatement;
                    
                    try {
                    
                        eval($targetStatement);
                    
                    }
                    catch(Exception $e){

                        $log[] = $e . 'could not load the required key';

                    }
                

                $data = array_filter($data, 'rempty');

                $values = implode('\', \'', $data);
                $keys = array_keys($data);

                $log = array();

                foreach ($data as $key=>$value){

                    $targetStatement = '$esdLesion->set' . $key . '("' . $value . '");';
                    //echo $targetStatement;
                    
                    try {
                    
                        eval($targetStatement);
                    
                    }
                    catch(Exception $e){

                        $log[] = $e . 'could not be evaluated';

                    }
                    

                }

                //print_r($log);

                $updatedSession = $esdLesion->prepareStatementPDOUpdate();

                //also insert the programme id, other data on the form not session

                $programmeOrder->setsessionid($sessionid);
                $programmeOrder->setprogrammeid($programmeid);
                $updatedProgramme = $programmeOrder->prepareStatementPDOUpdate();

                $returnArray = array();

                $returnArray['updatedProgramme'] = $updatedProgramme;
                
                $returnArray['updatedSession'] = $updatedSession;

                echo json_encode($returnArray);


                



            }
          


           


            

            

            
             
$general->endgeneral;
$programme->endprogramme;
$session->endsession;
$faculty->endfaculty;
$sessionItem->endsessionItem;
$queries->endqueries;
$sessionView>endsessionView;?>