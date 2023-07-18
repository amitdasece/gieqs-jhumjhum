<?php

//script takes all the pretest questions for an asset and duplcates them as posttest

            $openaccess = 1;

			//$requiredUserLevel = 4;
			
            require ('../includes/config.inc.php');		
            
			
			require (BASE_URI.'/assets/scripts/headerScript.php');
		
			//(1);
			//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');
        
            function array_not_unique( $a = array() )
            {
            return array_diff_key( $a , array_unique( $a ) );
            }
			
			$general = new general;
			
            $navigator = new navigator;

            require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
            $assetManager = new assetManager;

            require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');
            $programmeView = new programmeView;


            require_once(BASE_URI . '/assets/scripts/classes/question_manager.class.php');

            $question_manager = new question_manager;

            require_once BASE_URI . '/assets/scripts/classes/responses.class.php';
            $responses = new responses;


            
            $data = json_decode(file_get_contents('php://input'), true);

            $data = [

                'assetid' => '22',

            ];

            var_dump($data);

            if (isset($data)){

                //get $data['assetid]


                $assetid = $data['assetid'];

            //print_r($data);

                $date = new DateTime('now', new DateTimeZone('UTC'));

                $sqltimestamp_useractivity = date_format($date, 'Y-m-d H:i:s');

                //get all pretest question ids for asset

                $pretestarray = $question_manager->get_asset_pre_test_questions($assetid);

                foreach ($pretestarray as $key=>$value){

                    //duplicate as posttest

                    //INSERT STATEMENT FOR SAME 

                    $question_manager->duplicatePreTestQuestion($value);


                    //sql copy statements TODO




                }

                echo '1';

            }else{

                echo '0';

            }


            exit();
            


            $debug = false;


            if ($debug){
            print_r($tagsToMatch);
            }

            $numberOfTagsToMatch = count($tagsToMatch);

            if ($numberOfTagsToMatch < 1){

                $tagsToMatch = null;

            }

            if ($debug){
                print_r('number of tags to match' . $numberOfTagsToMatch);
                }

            //$key = $data['key'];

    

//error_reporting(E_ALL);


//get tagcategoriesetcbased on tags

      //define user access level

      
      ?>


        <?php


        $data3 = $general->generateTagStructureBasedOnTags($tagsToMatch);
      

       if ($debug){

        print_r($data3);

       }

        echo json_encode($data3);

            ?>
                   

                <?php

            

            

        
       

        ?>
            