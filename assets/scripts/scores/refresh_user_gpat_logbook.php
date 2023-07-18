<?php

            $openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            //$general = new general;
            //$programme = new programme;
          
            $userFunctions = new userFunctions();
            $users = new users;
            $assetManager = new assetManager();
            $gpat_score = new gpat_score();
            require_once(BASE_URI . '/assets/scripts/classes/gpat_glue.class.php'); 
            $gpat_glue = new gpat_glue();

            error_reporting(-1);
           
            $debug = false;

            //$print_r()

            //$data = json_decode(file_get_contents('php://input'), true); //not necessary here



            
            if ($debug){
           
             error_reporting(E_ALL);
            }

            if ($debug){
                echo 'user id is ' . $userid;
                }

            if ($users->matchRecord($userid) === TRUE){

                //$gpat_score->setuser_id($userid);
                //do nothing and continue


            }else{

                echo 'User not matched or not logged in, aborting';
                die();
            }

            $utcTimezone = new DateTimeZone('UTC');
            $currentDate = new DateTime('now', $utcTimezone);
            $sqlDate = $currentDate->format('Y-m-d H:i:s');

            
            //now use userid to get all records for this user

            $userGPATarray = $gpat_glue->getUserLogbook($userid, false);

            //perform transformations

            
            if ($debug){

                var_dump($userGPATarray);

            }          

            if ($userGPATarray){

            foreach ($userGPATarray as $key=>$value){


                //transform the id to the user id for GPAT
                //$userGPATarray[$key]['gpat_id'] = $gpat_glue->determineReportCardNumber($value['id'], $userid); //old method

                $userGPATarray[$key]['gpat_id'] = $value['user_gpat_id'];


                $dateReportCard = null;
                $sqlDateFunction = null;
                try {

                    if ($value['date_procedure'] != ''){
                    $dateReportCard = new DateTime($value['date_procedure'], $utcTimezone);
                    $sqlDateFunction = $dateReportCard->format('d-m-Y');
                    }else{

                        $sqlDateFunction = null;

                    }

                } catch (\Throwable $th) {
                    $sqlDateFunction = null;
                }

                $userGPATarray[$key]['date_procedure'] = $sqlDateFunction;

                $SMSA = null;

                if ($value['numeratorSMSAplus'] > 0){

                    $SMSA = '+';
                    
                }else{

                    if ($value['SMSA_group'] == 2){

                        $SMSA = '2';



                    }

                    if ($value['SMSA_group'] == 3){

                        $SMSA = '3';

                        
                    }

                    if ($value['SMSA_group'] == 4){

                        $SMSA = '4';

                        
                    }

                 }

                 unset($userGPATarray[$key]['numeratorSMSAplus']);
                 unset($userGPATarray[$key]['SMSA_group']);

                 $userGPATarray[$key]['SMSA'] = $SMSA;


                 if ($value['complete'] == 1){

                    $userGPATarray[$key]['complete'] = 'Complete';

                    
                }else{

                    $userGPATarray[$key]['complete'] = 'Incomplete';

                }




                

                //echo $value['complete'];

            }

            if ($debug){

                var_dump($userGPATarray);

            }          

            $returnArray = [];

            $returnArray['data'] = $userGPATarray;



            echo json_encode($returnArray);

        }else{

            $returnArray = [];

            $returnArray['data'] = [];

            echo json_encode($returnArray);



        }

            




            
           

            
 