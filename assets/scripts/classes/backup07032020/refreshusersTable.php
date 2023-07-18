<?php


            /* File to generate a table JSON at top of page users */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $users = new users;

                
                $response =  $users->Load_records_limit_json_datatables(200);

                echo $response;


                $users->endusers();

            