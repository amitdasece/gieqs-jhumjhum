<?php


            /* File to generate a table JSON at top of page sessionOrder */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $sessionOrder = new sessionOrder;

                
                $response =  $sessionOrder->Load_records_limit_json_datatables(200);

                echo $response;


                $sessionOrder->endsessionOrder();

            