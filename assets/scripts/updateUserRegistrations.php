<?php

$openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            $general = new general;
            $programme = new programme;
            $userRegistrations = new userRegistrations;
            $userFunctions = new userFunctions;
            
            
            $debug = false;

            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            //print_r($data);

            $userid = $data['userid'];
            $programmeid = $data['programmeid'];
            $options = $data['options'];

            //new methods for options, get from database
            //here put your denominator !!EDIT

            $options = $userFunctions->returnProgrammeDenominatorSelect2(); //current userProgrammes


            if ($debug){
                print_r($programmeid);
                }
         

            //if in options but not in programme [delete]
            //if in options and present nothing
            //if in options and not present in db add

            //define an array of existing connections for this user

            
            if ($debug){
                print_r($options);
                }
           

            $currentConnections = $userFunctions->returnCombinationUserProgramme($userid); //current userProgrammes
            if ($debug){
                print_r($currentConnections);
                }

            //go through the current submission, add those needed, remove those needed

            //if any current connections

            //for each in the total select box options
            //if in selected array and not present in db ADD
            //if not in selected array and present in db DELETE

            //TODO make an array here of the actions

            if ($options){

                if ($debug){
                print_r('Options array present');
                }

                foreach ($options as $key=>$value){

                    if (in_array($value, $programmeid)){

                        //select element is selected
                        if ($debug){
                            print_r('Select element ' . $value . ' is selected' . PHP_EOL);
                            }

                        //check if present in db

                        if (($userFunctions->checkCombinationUserProgramme($userid, $value)) === false){ //there is no match, does not exist in db

                            //add the connection

                            if ($debug){
                                print_r('Select element ' . $value . ' is not present in the connections db' . PHP_EOL);
                                }

                            $userRegistrations->setuser_id($userid);
                            $userRegistrations->setprogramme_id($value);
            
                            
            
                            echo $userRegistrations->prepareStatementPDO();
                            continue;


                        }else{ //there is a match

                            if ($debug){
                                print_r('Select element ' . $value . ' is already present in the connections db' . PHP_EOL);
                                }
                            //do nothing, does not require addition
                            continue;


                        }



                    }else{ //select element is not selected

                        if ($debug){
                            print_r('Select element ' . $value . ' is not selected' . PHP_EOL);
                            }

                        if (($userFunctions->checkCombinationUserProgramme($userid, $value)) === true){ //there is a match, does exist in db

                            if ($debug){
                                print_r('Select element ' . $value . ' exists in the connections db and needs to be deleted' . PHP_EOL);
                                }
                            //we need to delete this connection
                            
                            //load the required connection

                            if ($debug){
                                print_r('The required ID in the connections database is ' . $userFunctions->returnCombinationIDUserProgram($userid, $value) . PHP_EOL);
                                }

                            $userRegistrations->Load_from_key($userFunctions->returnCombinationIDUserProgram($userid, $value)); //required?

                            //delete the connection
                            if ($userRegistrations->Delete_row_from_key($userFunctions->returnCombinationIDUserProgram($userid, $value))){

                                if ($debug){
                                    print_r('The required ID in the connections database ' . $userFunctions->returnCombinationIDUserProgram($userid, $value) .  ' was deleted' . PHP_EOL);
                                    }

                            };



                        }


                    }



                }


            }else{

                echo 'No data provided'; 
                exit();
            }
        

            
           

            
             
$general->endgeneral();
$programme->endprogramme();
$userRegistrations->enduserRegistrations();
?>