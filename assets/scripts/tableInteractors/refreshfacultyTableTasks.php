<?php


            /* File to generate a table JSON at top of page faculty */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $programmeReports = new programmeReports;

                
                $response =  $programmeReports->Load_records_faculty_tasks_limit_json_datatables(4000);

                echo $response;


                $programmeReports->endprogrammeReports();

            