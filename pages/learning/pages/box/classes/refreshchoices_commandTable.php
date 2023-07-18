<?php


            /* File to generate a table JSON at top of page choices_command */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $choices_command = new choices_command;

                
                $response =  $choices_command->Load_records_limit_json_datatables(200);

                echo $response;


                $choices_command->endchoices_command();

            