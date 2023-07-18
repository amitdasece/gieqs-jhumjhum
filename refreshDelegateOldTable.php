<?php


            /* File to generate a table JSON at top of page DelegateOld */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $DelegateOld = new DelegateOld;

                
                $response =  $DelegateOld->Load_records_limit_json_datatables(200);

                echo $response;


                $DelegateOld->endDelegateOld();

            