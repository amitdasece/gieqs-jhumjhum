<?php


            /* File to generate a table JSON at top of page responses */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $responses = new responses;

                
                $response =  $responses->Load_records_limit_json_datatables(200);

                echo $response;


                $responses->endresponses();

            