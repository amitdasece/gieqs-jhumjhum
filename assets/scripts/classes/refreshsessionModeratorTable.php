<?php


            /* File to generate a table JSON at top of page sessionModerator */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $sessionModerator = new sessionModerator;

                
                $response =  $sessionModerator->Load_records_limit_json_datatables(200);

                echo $response;


                $sessionModerator->endsessionModerator();

            