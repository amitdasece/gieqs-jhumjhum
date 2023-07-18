<?php


            /* File to generate a table JSON at top of page commands */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $commands = new commands;

                
                $response =  $commands->Load_records_limit_json_datatables(200);

                echo $response;


                $commands->endcommands();

            