<?php


            /* File to generate a table JSON at top of page subscriptions */

                //TODO set access level here

                //$debug = true;

                require ('../../../assets/includes/config.inc.php');		


                //$subscriptions = new subscriptions;

                require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
                $subscriptions = new subscriptions;


                require_once(BASE_URI . '/assets/scripts/classes/userFunctions.class.php');
                $userFunctions = new userFunctions;

                require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
                $assetManager = new assetManager;


                
                $response = $assetManager->Load_records_limit_json_datatables(400000);


                //print_r($response);
                /* $x=0;
                foreach ($response as $key=>$value){

                    //print_r($value);
                    $x=0;

                    foreach ($value as $key1=>$value1){

                        //print_r($value[$x]['user_id']);

                        if ($value[$x]['user_id'] != ''){

                            //print_r($value[$x]['user_id']);

                            $username = null;
                            $username = $userFunctions->getUserName($value[$x]['user_id']);
                            //echo $username;
                            $response['data'][$x]['user_name'] = $username;
                            
                        }else{

                            $response['data'][$x]['user_name'] = '';

                        };

                        $x++;


                    }

                    

                } */

                echo json_encode($response);


                $subscriptions->endsubscriptions();

            