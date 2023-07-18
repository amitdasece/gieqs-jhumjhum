<?php

$openaccess =1;
			//$requiredUserLevel = 4;
			require ('../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            $general = new general;
            $programme = new programme;
            $userRegistrations = new userRegistrations;
            $userFunctions = new userFunctions;
            
            


            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            //print_r($data);

            $userid = $data['userid'];
            $programmeid = $data['programmeid'];
            $options = $data['options'];

            print_r($programmeid);

            //if in options but not in programme [delete]
            //if in options and present nothing
            //if in options and not present in db add

            //define an array of existing connections for this user

            $currentConnections = $userFunctions->returnCombinationUserProgramme($userid); //current userProgrammes

            print_r($currentConnections);

            //go through the current submission, add those needed, remove those needed

            //if any current connections

            //for each in the total select box options
            //if in selected array and not present in db ADD
            //if not in selected array and present in db DELETE

            if ($options){

                foreach ($options as $key=>$value){

                    if (in_array($value, $programmeid)){

                        //select element is selected

                        //check if present in db

                        if (($userFunctions->checkCombinationUserProgramme($userid, $value)) === false){ //there is no match, does not exist in db

                            //add the connection

                            $userRegistrations->setuser_id($userid);
                            $userRegistrations->setprogramme_id($value);
            
                            
            
                            echo $userRegistrations->prepareStatementPDO();
                            continue;


                        }else{ //there is a match

                            //do nothing, does not require addition
                            continue;


                        }



                    }else{ //select element is not selected

                        if (($userFunctions->checkCombinationUserProgramme($userid, $value)) === true){ //there is a match, does exist in db


                            //we need to delete this connection
                            
                            //load the required connection
                            $userRegistrations->Load_from_key($userFunctions->returnCombinationIDUserProgram($userid, $value)); //required?

                            //delete the connection
                            $userRegistrations->Delete_row_from_key($userFunctions->returnCombinationIDUserProgram($userid, $value));



                        }


                    }



                }


            }else{

                echo 'No data provided'; 
                exit();
            }
        

            if ($currentConnections){
            
                foreach ($currentConnections as $key1=>$value1){ //split current programmes and look through

                    //$id = $value1['id'];
                    //$programmeid = $value1['programme_id'];

                    //is this in the current set

                    foreach ($value1['programme_id'] as $key=>$value){ //check all of the submitted

                        //check this combination does not already exist
            
                        //for each of the current
                        //check if exists, if no check if was present then delete
                        //if not 
            
                        if (($userFunctions->checkCombinationUserProgramme($userid, $value)) === false){ //there is no match, does not exist in db
            
                            //if above false
                            //insert a new link
                            
                            
                            //add a new one
                            $userRegistrations->setuser_id($userid);
                            $userRegistrations->setprogramme_id($value);
            
                            
            
                            echo $userRegistrations->prepareStatementPDO();

                            continue;
            
                            //echo 'false';
            
                       
            
                        }else{ //there is a match, exists in db
            
                            //suggest the link already exists
            
                            echo '4';

                            continue;
                        }

                        //now no match found and no addition
            
                      }


                    }
             }else{

                //all new connections;

             }

           

            
             
$general->endgeneral();
$programme->endprogramme();
$userRegistrations->enduserRegistrations();
?>