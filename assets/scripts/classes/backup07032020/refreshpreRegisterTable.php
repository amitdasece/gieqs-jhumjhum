<?php


            /* File to generate a table JSON at top of page preRegister */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $preRegister = new preRegister;

                
                $response =  $preRegister->Load_records_limit_json_datatables(200);

                echo $response;


                $preRegister->endpreRegister();

            