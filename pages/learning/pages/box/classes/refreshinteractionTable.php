<?php


            /* File to generate a table JSON at top of page interaction */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $interaction = new interaction;

                
                $response =  $interaction->Load_records_limit_json_datatables(200);

                echo $response;


                $interaction->endinteraction();

            