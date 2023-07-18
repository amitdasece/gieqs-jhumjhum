<?php


            /* File to generate a table JSON at top of page session */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $session = new session;

                
                $response =  $session->Load_records_limit_json_datatables(200);

                echo $response;


                $session->endsession();

            