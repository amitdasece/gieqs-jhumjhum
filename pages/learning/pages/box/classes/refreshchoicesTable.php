<?php


            /* File to generate a table JSON at top of page choices */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $choices = new choices;

                
                $response =  $choices->Load_records_limit_json_datatables(200);

                echo $response;


                $choices->endchoices();

            