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

            $edit = $data['edit'];

            unset($data['edit']);


            if ($edit == 1){
            $id = $data['id'];


            unset($data['id']);

            }

            
            if ($debug){
            print_r($data);
             error_reporting(E_ALL);
            }

            if ($debug){
                echo 'edit is ' . $edit;
                echo 'user id is ' . $userid;
                }

            if ($users->matchRecord($userid) === TRUE){

                $gpat_score->setuser_id($userid);


            }else{

                echo 'User not matched or not logged in, aborting';
                die();
            }

            $utcTimezone = new DateTimeZone('UTC');


            $currentDate = new DateTime('now', $utcTimezone);


            $sqlDate = $currentDate->format('Y-m-d H:i:s');

            $gpat_score->setupdated($sqlDate);

            if (($edit == 1)){

                if ($gpat_score->matchRecord($id) === TRUE){
                    $gpat_score->Load_from_key($id);
                }else{

                    echo 'an id was not provided to update';
                    die();
                }

            }


            //for all the set data update the gpat_score

            foreach ($data as $key=>$value){

                $statement = null;
                if (isset($value)){
                $statement = '$gpat_score->set'.$key.'(\''.$value.'\');';
                if ($debug){
                echo $statement;
                }

                eval($statement);
            }

            }

            //also determine which score this is for the user , and write it to the database, in field gpat_id

            

            if ($debug){
            var_dump($gpat_score);
            }

            if (isset($edit)){

                if ($edit == 1){

                    //do update
                    $updated = $gpat_score->prepareStatementPDOUpdate();

                    if ($updated == 1){

                        //updated performed
                        $returnArray = ['updated'=>1];

                    }else{

                        //no update performed
                        $returnArray = ['updated'=>0];

                    }


                }elseif ($edit == 0){

                    //do new

                    $newId = $gpat_score->prepareStatementPDO();

                    //set the user specific gpat id
                    $user_gpat_score_id = $gpat_glue->determineReportCardNumber($newId, $userid);

                    if ($debug){

                        echo 'User GPAT id is ' . $user_gpat_score_id;

                    }


                    if ($debug){
                        var_dump($gpat_score);
                        }

                    $gpat_score->Load_from_key($newId);
                    $gpat_score->setuser_gpat_id($user_gpat_score_id);
                    $gpat_score->prepareStatementPDOUpdate();

                    $returnArray = ['newid'=>$newId, 'user_report_card_id'=>$gpat_glue->determineReportCardNumber($newId, $userid), 'denominator'=>$gpat_glue->determineNumberofReportCards($userid)];

                    


                }





            }else{

                echo 'Edit not set';
                die();
            }

            echo json_encode($returnArray);

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
