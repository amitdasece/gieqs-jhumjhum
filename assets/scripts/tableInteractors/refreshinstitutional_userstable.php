<?php


            /* File to generate a table JSON at top of page emails */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		

                $debug = false;

                $tokenid = $_POST['tokenid'];
                $institution_id = $_POST['institutionalid'];

                if ($debug){

                    var_dump($_POST);

                }

                
                $institutional_manager = new institutional_manager;

                
                $response =  $institutional_manager->Load_records_limit_json_datatables(20000, 0, $tokenid, $institution_id);

                echo json_encode($response);


                $institutional_manager->endinstitutional_manager();

            