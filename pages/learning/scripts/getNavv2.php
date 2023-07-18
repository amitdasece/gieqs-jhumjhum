<?php

            $openaccess = 0;

			$requiredUserLevel = 6;

            $debug = false;
            $_SESSION['debug'] = false;
			
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

            $active = $data['active'];
            $videoset = $data['videoset'];

$assetid = $data['assetid'];


            $debug = false;


            if ($debug){
            print_r($tagsToMatch);
            print_r($data);
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


      //define user access level

      
      ?>


        <?php

        $requiredTagCategories = $data['requiredTagCategories'];


        //$requiredTagCategories = ['39', '40', '41', '42'];

        

        ?>
       
        <?php

        $tags = [];
        $x=0;

        //gets all videos in the required tag categories that match the selected tags

        $data2 = $navigator->generateNavigationSingleDisabledQuery($requiredTagCategories, $tagsToMatch, $debug, $active);

        //use this to obtain the tags which match the video[s] still displayed so the user cannot unfilter all videos

        if ($debug){

            print_r($data2);
    
           }

        
        //if a videoset

if (isset($videoset)){

    if ($videoset == 1){

        $emptyText = 'There are no videos matching your filters.';

        //push out of the data2 array videos that are not part of the asset $assetid

        $videosAsset = $assetManager->returnVideosAsset($assetid);

        foreach ($data2 as $key=>$value){


            $array_key = $key;

            $access = null;

            $access = (in_array($value, $videosAsset)) ? true : false;
        
            if (!$access){


                unset($data2[$key]);

                if ($debug){
    
                    echo 'video id ' . $value . ' was not found in the video asset array';
    
               }
    
            }else{

                if ($debug){

                echo 'video id ' . $value . ' was found in the video asset array';
                
            }


            }
        

        }

        


    }
    if ($videoset == 2){



        //push out of the data2 array videos that are not part of the asset $assetid
        $videosForSessions = array();

            //get programme / session info

            $programmes = $assetManager->returnCombinationAssetProgramme($assetid);
            
            if ($debug){

                //var_dump($programmes);
            }

            foreach ($programmes as $key=>$value){


            $sessions = $programmeView->getSessions($value['programme_id']);

                if ($debug){

                    //var_dump($sessions);
                }

                //get programmeid for asset
                foreach ($sessions as $key2=>$value2){

                    if ($value2['sessionid'] != ''){

                        $videosForSessions[] = $programmeView->getVideoURL($value2['sessionid']);

                    }

                }

             }

             //if debug show the videos

             if ($debug){

                echo "<br/><br/>Session Videos to Match with array";
                var_dump($videosForSessions);

             }

        $videosAsset = $videosForSessions;

        foreach ($data2 as $key=>$value){


            $array_key = $key;

            $access = null;

            $access = (in_array($value, $videosAsset)) ? true : false;
        
            if (!$access){


                unset($data2[$key]);

                if ($debug){
    
                    echo 'video id ' . $value . ' was not found in the video asset array';
    
               }
    
            }else{

                if ($debug){

                echo 'video id ' . $value . ' was found in the video asset array';
                
            }


            }
        

        }

        


    }


if ($videoset == 3){



    //push out of the data2 array videos that are not part of the asset $assetid
    $videosForSessions = array();

        //get programme / session info

        $videosForSessions = array();
                    $x = 0;

                    $programmes = $assetManager->returnCombinationAssetProgramme($assetid);
            
                    if ($debug){
        
                        var_dump($programmes);
                    }

                    $videosForSessions = array();
                    $x = 0;


            foreach ($programmes as $key=>$value){


            $sessions = $programmeView->getSessions($value['programme_id']);

                if ($debug){

                    //var_dump($sessions);
                }

                //get programmeid for asset
                //now shows all session items

                    
                    foreach ($sessions as $key2=>$value2){

                        if ($value2['sessionid'] != ''){

                            $videosForSessions2data = array();
                            $videosForSessions2data = $programmeView->getVideoURLAll($value2['sessionid']);

                            foreach ($videosForSessions2data as $key3=>$value3){

                                if ($value3 != ''){
                                $videosForSessions[$x] = $value3;
                                $x++;

                            }

                            }

                            
                        }

                    }

             }

         //if debug show the videos

         if ($debug){

            echo "<br/><br/>Session Videos to Match with array";
            var_dump($videosForSessions);

         }

    $videosAsset = $videosForSessions;

    foreach ($data2 as $key=>$value){


        $array_key = $key;

        $access = null;

        $access = (in_array($value, $videosAsset)) ? true : false;
    
        if (!$access){


            unset($data2[$key]);

            if ($debug){

                echo 'video id ' . $value . ' was not found in the video asset array';

           }

        }else{

            if ($debug){

            echo 'video id ' . $value . ' was found in the video asset array';
            
        }


        }
    

    }

    


}


}else{

    //normal page

    $data2 = $assetManager->determineVideoAccessNonAsset($data2, $isSuperuser, $userid, true);




    //work data 2 to remove those without a subscription

        //unless is superuser

       
       
        /* if ($isSuperuser == '0'){

            //GO THROUGH THE VIDEOS AND REMOVE ANY THAT THE USER HAS NO ACCESS TO
            
            foreach ($data2 as $key=>$value){
            
            
                //does it require subscription?
            
                $array_key = $key;
            
                //check there is no access via a programme
            
                $access3 = $assetManager->checkVideoProgrammeAspect($value['id'], $userid, false);
            
                if ($access3 === false){ //contained within a programme and no access to this programme
            
            
                    if ($debug){
            
                        echo 'user id ' . $userid . ' has no access to video id ' . $value['id'] . ' via a programme';
                        echo 'now checking access via videoset';
            
                   }
            
                   $access = $assetManager->video_requires_subscription($value['id'], false);
            
                    if ($access){ //requires subscription via videoset (is in a videoset)
            
            
                        $access2 = $assetManager->video_owned_by_user($value['id'], $userid, false);
            
                        if ($access2 === false){ //in videoset, not owned by user
            
                            //remove this video from the array
                            unset($videos[$key]);
                            if ($debug){
            
                                echo 'user id ' . $userid . ' has no access to video id ' . $value['id'];
            
                            }
            
            
                        }else{
            
                            if ($debug){
            
                                echo 'user id ' . $userid . ' has access to video id ' . $value['id'];
            
                            }
            
                            
                            //user has access to this video via videoset.  despite no access via programme grant
                        }
            
                    }else{ //is not in a videoset (but is contained within a programme)
            
                        if ($debug){
            
                            echo 'video id ' . $value['id'] . ' requires a programme subscription and is not covered by a videoset';
                            echo 'video id ' . $value['id'] . ' removed from array';
            
                        }
            
                        unset($videos[$key]);
            
            
                    }
            
            
            
                }elseif ($access3 === true) {
            
                    if ($debug){
            
                        echo 'user id ' . $userid . ' has access to video id ' . $value['id'] . ' via a programme';
                        echo 'access granted';
            
                   }
            
                   
            
                }else{
            
                    //not contained within a programme
                    //check if contained within a videoset
                    $access = $assetManager->video_requires_subscription($value['id'], false);
            
                    if ($access){ //requires subscription via videoset (is in a videoset)
            
            
                        $access2 = $assetManager->video_owned_by_user($value['id'], $userid, false);
            
                        if ($access2 === false){ //in videoset, not owned by user
            
                            //remove this video from the array
                            unset($videos[$key]);
                            if ($debug){
            
                                echo 'user id ' . $userid . ' has no access to video id ' . $value['id'];
            
                            }
            
            
                        }else{
            
                            if ($debug){
            
                                echo 'user id ' . $userid . ' has access to video id ' . $value['id'];
            
                            }
            
                            
                            //user has access to this video via videoset.  despite no access via programme grant
                        }
            
                    }else{
            
                        //not in programme or videoset
                        
            
                        if ($debug){
            
                            echo 'video ' . $value['id'] . ' is freely available';
            
                            echo 'user id ' . $userid . ' has access to video id ' . $value['id'];
            
                        }
            
                    }
            
                } 
            
            
                
            
                //test user access
            
            
            
                
            
            }
            }else{
            
                if ($debug){
            
                    echo 'all videos available as superuser';
                }
            }
            */
    



}

if ($debug){

    print_r($data2);
    echo json_encode($data2);

}

//setcookie('browsing_array', json_encode($data2), time() + (365 * 24 * 60 * 60), '/');


        $data3 = $navigator->getVideoTagsBasedOnVideosShown($data2, $debug);
      

       if ($debug){

        print_r($data3);

       }

        echo json_encode($data3);

            ?>
                   

                <?php

            

            

        
       

        ?>
            