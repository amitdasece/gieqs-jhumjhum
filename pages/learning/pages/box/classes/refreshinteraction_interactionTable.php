<?php


            /* File to generate a table JSON at top of page interaction_interaction */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $interaction_interaction = new interaction_interaction;

                
                $response =  $interaction_interaction->Load_records_limit_json_datatables(200);

                echo $response;


                $interaction_interaction->endinteraction_interaction();

            