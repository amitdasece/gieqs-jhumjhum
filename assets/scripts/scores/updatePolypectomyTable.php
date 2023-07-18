<?php

            $openaccess = 0;
			$requiredUserLevel = 1;
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            //$general = new general;
            //$programme = new programme;
          
            $userFunctions = new userFunctions();
            $assetManager = new assetManager();
            
            //error_reporting(E_ALL);
            $debug = true;

            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            
            if ($debug){
            print_r($data);
            }



            //use the class



            //if this is false, create the column

            foreach ($data as $key=>$value){

            $access = $assetManager->checkStructure('gpat_score', $key);

            var_dump($access);

            if (!$access){

                //echo 'false';
                $assetManager->updateDatabase('gpat_score', $key);



            }

            }

            $access2 = $assetManager->checkStructure('gpat_score', 'user_id');

            var_dump($access2);

            if (!$access2){

                //echo 'false';
                $assetManager->addStandardDBFields('gpat_score');



            }

            //if exists do nothing

            //if does not exist add

            





            
           

            
             
//$general->endgeneral();
//$programme->endprogramme();
//$userRegistrations->enduserRegistrations();
