<?php


            /* File to generate a table JSON at top of page programmeOrder */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $programmeOrder = new programmeOrder;

                
                $response =  $programmeOrder->Load_records_limit_json_datatables(200);

                echo $response;


                $programmeOrder->endprogrammeOrder();

            