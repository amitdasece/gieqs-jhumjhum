<?php


            /* File to generate a table JSON at top of page sponsors */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $sponsors = new sponsors;

                
                $response =  $sponsors->Load_records_limit_json_datatables(200);

                echo $response;


                $sponsors->endsponsors();

            