<?php


            /* File to generate a table JSON at top of page emailList */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $emailList = new emailList;

                
                $response =  $emailList->Load_records_limit_json_datatables(200);

                echo $response;


                $emailList->endemailList();

            