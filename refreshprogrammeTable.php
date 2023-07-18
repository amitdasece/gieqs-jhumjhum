<?php


            /* File to generate a table JSON at top of page programme */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $programme = new programme;

                
                $response =  $programme->Load_records_limit_json_datatables(200);

                echo $response;


                $programme->endprogramme();

            