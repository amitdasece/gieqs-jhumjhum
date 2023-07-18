<?php


            /* File to generate a table JSON at top of page emails */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $blogs = new blogs;

                
                $response =  $blogs->Load_records_limit_json_datatables(20000);

                echo $response;


                $blogs->endblogs();

            