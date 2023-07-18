<?php


            /* File to generate a table JSON at top of page sub_asset_paid */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $sub_asset_paid = new sub_asset_paid;

                
                $response =  $sub_asset_paid->Load_records_limit_json_datatables(200);

                echo $response;


                $sub_asset_paid->endsub_asset_paid();

            