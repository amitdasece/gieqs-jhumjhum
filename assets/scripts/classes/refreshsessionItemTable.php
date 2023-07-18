<?php


            /* File to generate a table JSON at top of page sessionItem */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $sessionItem = new sessionItem;

                
                $response =  $sessionItem->Load_records_limit_json_datatables(200);

                echo $response;


                $sessionItem->endsessionItem();

            