<?php


            /* File to generate a table JSON at top of page faculty */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $faculty = new faculty;

                
                $response =  $faculty->Load_records_limit_json_datatables(200);

                echo $response;


                $faculty->endfaculty();

            