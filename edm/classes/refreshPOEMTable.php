<?php


            /* File to generate a table JSON at top of page POEM */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $POEM = new POEM;

                
                $response =  $POEM->Load_records_limit_json_datatables(200);

                echo $response;


                $POEM->endPOEM();

            