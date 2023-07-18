<?php

            $openaccess = 1;

			//$requiredUserLevel = 4;
			
            require ('../includes/config.inc.php');		
            
			
			//require (BASE_URI.'/scripts/headerCreatorV2.php');
		
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
            
            $data = json_decode(file_get_contents('php://input'), true);

            $tagsToMatch = $data['tags'];

            


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
            