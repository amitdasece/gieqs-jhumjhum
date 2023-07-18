<?php


            /* File to generate a table JSON at top of page sessionItemFaculty */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $sessionItemFaculty = new sessionItemFaculty;

                
                $response =  $sessionItemFaculty->Load_records_limit_json_datatables(200);

                echo $response;


                $sessionItemFaculty->endsessionItemFaculty();

            