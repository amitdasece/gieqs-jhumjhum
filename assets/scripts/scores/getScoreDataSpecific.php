<?php

            $openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            //$general = new general;
            //$programme = new programme;
          
            $userFunctions = new userFunctions();
            $users = new users;
            $assetManager = new assetManager();
            $gpat_score = new gpat_score();
            require_once(BASE_URI . '/assets/scripts/classes/gpat_glue.class.php'); 
            $gpat_glue = new gpat_glue();

            error_reporting(-1);
           
            $debug = false;

            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            $id = $data['id'];

            

            if ($gpat_score->matchRecord($id) === TRUE){

                //$data_json = $gpat_score->Return_row($id);
                $data = json_decode($gpat_score->Return_row($id), true);
                $data_mod = [];
                foreach ($data[0] as $key=>$value){

                    if ($value == ''){

                        $data_mod[$key] = 'null';

                    }else{

                        $data_mod[$key] = $value;
                    }

                }
                
                //print_r($data_mod);
                //print_r($data);
                //push the id
                $user_gpat_score_id = $gpat_glue->determineReportCardNumber($id, $userid);
                $user_number_records = $gpat_glue->determineNumberofReportCards($userid);
                //get the user specific id with this
                //ADD TO ARRAY
                $data_mod['user_gpat_score_id'] = $data_mod['user_gpat_id'];
                $data_mod['user_number_records'] = $user_number_records;
                echo json_encode($data_mod);


            }else{

                echo 'Record could not be found, aborting';
                die();
            }

            
            //check the logged in user

            //use the class

            //use the class

            //if this is false, create the column

            //$q = 'SELECT column_name FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=[Database Name] AND TABLE_NAME=[Table Name];';

            //if exists do nothing

            //if does not exist add

            





            
           

            
             
//$general->endgeneral();
//$programme->endprogramme();
//$userRegistrations->enduserRegistrations();
