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
           
            $debug = true;

            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true); //not necessary here

            $id = $data['id'];

            if (!isset($id)){


                if ($debug){

                    echo 'id not set';
                }
                die();
            }

            
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

            //does the user own the GPAT they wish to delete unless they are a superuser


            if ($isSuperuser != 1){

                if ($debug){

                    echo 'superuser is not equal to 1';
                    echo 'userid is ' . $userid;
                }

                 if (!$gpat_glue->checkUserOwnsGPAT($userid, $id, $debug)){

                    echo 'This GPAT does not belong to the logged in user.  Return to your Logbook <a href="' . BASE_URL . '/pages/learning/pages/scores/logbook-gpat.php">here</a>';
                    die();

                 }else{


                 }

            }

            if ($gpat_score->matchRecord($id)){


                $gpat_score->Load_from_key($id);
                $rows = $gpat_score->Delete_row_from_key($id);

                echo $rows;


            }else{


                if ($debug){

                    echo 'Can\'t find that GPAT record';
                }

            }








            
           

            
 