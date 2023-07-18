<?php


            /* File to generate a table JSON at top of page assets_paid */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $assets_paid = new assets_paid;

                
                $response =  $assets_paid->Load_records_limit_json_datatables(20000);

                echo $response;


                $assets_paid->endassets_paid();

            