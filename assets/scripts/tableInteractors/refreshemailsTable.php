<?php


            /* File to generate a table JSON at top of page emails */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $emails = new emails;

                
                $response =  $emails->Load_records_limit_json_datatables(20000);

                echo $response;


                $emails->endemails();

            