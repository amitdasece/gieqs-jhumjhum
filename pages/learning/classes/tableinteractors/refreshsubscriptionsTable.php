<?php


            /* File to generate a table JSON at top of page subscriptions */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $subscriptions = new subscriptions;

                
                $response =  $subscriptions->Load_records_limit_json_datatables(200);

                echo $response;


                $subscriptions->endsubscriptions();

            