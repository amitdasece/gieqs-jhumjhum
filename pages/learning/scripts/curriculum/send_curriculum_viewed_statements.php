<?php

$openaccess = 0;

$requiredUserLevel = 6;

require_once ('../../includes/config.inc.php');	

require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');


     ini_set('display_errors', 1);
     ini_set('display_startup_errors', 1);
     error_reporting(E_ALL);

$debug = false;

if ($debug == true){
error_reporting(E_ALL);
}else{

error_reporting(0);
}

$general = new general;
$users = new users;
$users->Load_from_key($userid);


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once BASE_URI . '/assets/scripts/classes/curriculum_manager.class.php';
$curriculum_manager = new curriculum_manager;

$data = json_decode(file_get_contents('php://input'), true);

$viewed_statements = $data;

//data is an array of viewed curriculum_sections

if ($userid){

    if ($debug){
    echo 'logged in';
    }

echo $curriculum_manager->recordRecentCurriculumView($viewed_statements, $userid);

}else{

    if ($debug){
    echo 'not logged in';
    }
}



exit();






//echo $selectedTag;


$returnArray = [];


$videosTaggedAll = $assetManager->getVideosTag($selectedTag);

if ($videosTaggedAll){

    
    $returnArray['videos'] = 1;
    $returnArray['first_video'] = $videosTaggedAll[0];



}else{

    //no videos currently contain this tag

    $returnArray['videos'] = 0;

}

echo json_encode($returnArray);

exit();
















if (isset($browsing) && isset($browsing_id) && isset($videoid)){

    if ($debug){

        echo 'All required parameter cookies set';

    }
    

    

    if ($browsing == '2' || $browsing == '3' || $browsing == '4'){

        //is an asset

        //load asset
        if ($assets_paid->Return_row($browsing_id)){

            $assets_paid->Load_from_key($browsing_id);

        }else{

            if ($debug){
                echo 'cannot load asset';
            }

            die();
        }

        //get all videos with this tag

            //determine the context videos

             //in context of asset this is already set as $browsing_array

        //isSuperuser = 1 or 0

        //determine which of the context videos can be accessed (also add to cookie?, then do it once)

        //determine the asset access ? assume since on page // no check for now

        //removed this line as access determined by player
        
        //$access = $assetManager->is_assetid_covered_by_user_subscription($browsing_id, $userid);

        $access=true;

        if ($access){


            //check which videos are tagged the same as this videos selected tag within this asset

            //filter the browsing array

            //to write $videosTag = $getVideosTag->($browsing_array); (needs to be a learning class which i guess asset manager is);

            //get all videos associated with this tag in thi

            $taggedVideoArray = $assetManager->getVideosTag($selectedTag);

            //IF THIS IS FALSE THE TAG IS NOT IN THE ARRAY AND SO THE USER IS OUTSIDE THE BROWSING RANGE

            


            /* if ($debug){

                print_r($taggedVideoArray);
                echo  'last viewed asset page was';
                echo $usersMetricsManager->getLastViewedVideoAsset($userid, $assetManager->returnVideosAsset($browsing_id), true);


            } */

            //then use array intersect to remove videos which are not tagged like this

            //return the tagged videos as json array with


            $videosToReturnv2 = array_intersect($browsing_array, $taggedVideoArray);

            if ($debug){

                print_r($videosToReturnv2);

            }

            $videosToReturn = array();
            $x = 1;
            foreach ($videosToReturnv2 as $key=>$value){

                $videosToReturn[$x] = $value;
                $x++;



            }

            $position = array_search($videoid, $videosToReturn);

            if ($debug){

                print_r($position);

            }
                //count of videos

                if ($position > -1){

                    //is id in the array browsingArray?
        
                    if ($debug){
            
                        echo 'id detected in the browsing array at position ' . $position;
                    }
        
                    
                    //get previous video and next video
        
                    $nextVideo = $videosToReturn[(intval($position) + 1)];
        
                    if (!isset($nextVideo)){
        
                        $lastVideo = true;
                    }else{
        
                        $lastVideo = false;
                    }
                    
        
                    $previousVideo = $videosToReturn[(intval($position) - 1)];
        
                    if (!isset($previousVideo)){
        
                        $firstVideo = true;
                    }else{
        
                        $firstVideo = false;
                    }
        
                    if ($debug){
            
                        echo "NEXT video is $nextVideo and PREVIOUS video is $previousVideo";
                        
                        if ($firstVideo == true){
                        
                            echo "this is the FIRST video ";
                            
                            }
                        
                        if ($lastVideo == true){
                        
                        echo "this is the LAST video ";
        
                        }
        
        
                    }
        
                    $numberOfVideos = count($videosToReturn);
                  
                    if ($debug){
            
                        echo "This video is number $position of $numberOfVideos";
                    }
        
                }else{
        
        
                    if ($debug){
            
                        echo 'id not deteced in the browsing array'; 
                    }
        
        
                }  
                //position of this video
                //next video
                //previous video


            //copied from above to modify

            $returnArray = [

                'postion' => $position,
                'numberOfVideos' => $numberOfVideos,
                'nextVideo' => $nextVideo,
                'previousVideo' => $previousVideo,
                'firstVideo' => $firstVideo,
                'lastVideo' => $lastVideo,


            ];

            echo json_encode($returnArray);

        





        }else{


            if ($debug){

                echo 'no user access to this asset';

            }
        }


        //filter these by tag

        //check what they are ordered by!





    //if all set, get array of videos associated with these parameters to which the user has access

    

    
    
}elseif ($browsing == '5'){

    //browsing the site separately

    if ($debug){

        echo 'browsing 5';
    }


    //actually get from the page

    //get tags required



    $taggedVideoArray = $assetManager->getVideosTag($selectedTag);

            if ($debug){

                echo 'videos tagged with ' . $selectedTag;
                print_r($taggedVideoArray);

            }

    //check browsing id

    if (isset($browsing_id)){

        //check it is valid

        if ($pages->Return_row($browsing_id)){

            $pages->Load_from_key($browsing_id);


          
        
           //IF COMPLEX USE THE TAG CATEGORIES

           if ($pages->getsimple() == '0'){

                //complex

                if ($debug){

                    echo 'page is complex';
                }


                $tagCategories = $assetManager->getTagsPage($browsing_id);

                if ($debug){

                    echo 'tag categories are';
                    print_r($tagCategories);
                }


                $videosPage = $navigator->getVideosTagCategories($tagCategories);
    
                if ($debug){

                    echo 'page videos are are';
                    print_r($videosPage);
                }

                $videosToReturnv2 = array_intersect($videosPage, $taggedVideoArray);

                    if ($debug){

                        echo 'result of intersecting page videos with those tagged in this way (' . $selectedTag . ')';
                        print_r($videosToReturnv2);

                    }

                    $videosToReturn = array();
                    $x = 1;
                    foreach ($videosToReturnv2 as $key=>$value){
        
                        $videosToReturn[$x] = $value;
                        $x++;
        
        
        
                    }

                    if ($debug){

                        echo 'videostoreturn (refactoring videostoreturnv2) (' . $selectedTag . ')';
                        print_r($videosToReturn);

                    }



            }elseif ($pages->getsimple() == '1'){

                if ($debug){

                    echo 'page is simple';
                }


                 $videosPage = $assetManager->getVideosPage($browsing_id, false);


                 if ($debug){

                    echo 'page videos are are';
                    print_r($videosPage);
                }

                $videosToReturnv2 = array_intersect($videosPage, $taggedVideoArray);

                    if ($debug){

                        echo 'videostoreturnv2 (result of intersecting page videos with those tagged in this way) (' . $selectedTag . ')';
                        print_r($videosToReturnv2);

                    }

                    $videosToReturn = array();
                    $x = 1;
                    foreach ($videosToReturnv2 as $key=>$value){
        
                        $videosToReturn[$x] = $value;
                        $x++;
        
        
        
                    }

                    if ($debug){

                        echo 'videostoreturn (refactoring videostoreturnv2) (' . $selectedTag . ')';
                        print_r($videosToReturn);

                    }



           }else{

            if ($debug){
        
                echo 'unable to determine pagetype';
        
                    
             }

           }
        
           // IF SIMPLE


        }else{

            if ($debug){

                echo 'Can\'t get browsing id';
                
            }
        }

    }

    //the page id






    //check video access

   //get all videos from current supercategory

   //get supercategory from video

   //$superCategory = $assetManager->getVideoSuperCategory($videoid, true);

   /* if ($debug){

        echo 'supercategory is ' . $superCategory;

            
   } */

   /* if (!$superCategory){

    //no supercategory specified for video
    //get all videos
    //best guess the supercategory

    $superCategory = 2;


   }

   //set supercategory



   $videosSuperCategory = $assetManager->getVideosSelectedTagSuperCategory($selectedTag, $superCategory, false);

   if ($debug){

   print_r($videosSuperCategory);

   error_reporting(E_ALL);

   } */

   //$debug = false;

    $accessibleVideos = $assetManager->determineVideoAccessNonAsset($videosToReturn, $isSuperuser, $userid, $debug=false);

    //consider part of a supercategory

    if ($debug){

        echo 'Accessible videos are';

        print_r($accessibleVideos);

    }

    $position = array_search($videoid, $accessibleVideos);

            if ($debug){

                print_r($position);

            }
                //count of videos

                if ($position > -1){

                    //is id in the array browsingArray?
        
                    if ($debug){
            
                        echo 'id detected in the browsing array at position ' . $position;
                    }
        
                    
                    //get previous video and next video
        
                    $nextVideo = $accessibleVideos[(intval($position) + 1)];
        
                    if (!isset($nextVideo)){
        
                        $lastVideo = true;
                    }else{
        
                        $lastVideo = false;
                    }
                    
        
                    $previousVideo = $accessibleVideos[(intval($position) - 1)];
        
                    if (!isset($previousVideo)){
        
                        $firstVideo = true;
                    }else{
        
                        $firstVideo = false;
                    }
        
                    if ($debug){
            
                        echo "NEXT video is $nextVideo and PREVIOUS video is $previousVideo";
                        
                        if ($firstVideo == true){
                        
                            echo "this is the FIRST video ";
                            
                            }
                        
                        if ($lastVideo == true){
                        
                        echo "this is the LAST video ";
        
                        }
        
        
                    }
        
                    $numberOfVideos = count($accessibleVideos);
                  
                    if ($debug){
            
                        echo "This video is number $position of $numberOfVideos";
                    }
        
                }else{
        
        
                    if ($debug){
            
                        echo 'id not detected in the browsing array'; 
                    }
        
        
                }  
                //position of this video
                //next video
                //previous video


            //copied from above to modify

            $returnArray = [

                'postion' => $position,
                'numberOfVideos' => $numberOfVideos,
                'nextVideo' => $nextVideo,
                'previousVideo' => $previousVideo,
                'firstVideo' => $firstVideo,
                'lastVideo' => $lastVideo,


            ];

            echo json_encode($returnArray);


}elseif ($browsing == '99' || $browsing == ''){

    //user opens up to all available videos


    if ($debug){

        echo 'browsing all videos (99)';
    }

    

   //get all videos tagged this way

   $videosTaggedAll = $assetManager->getVideosTag($selectedTag);

   if ($debug){

   print_r($videosTaggedAll);

   error_reporting(E_ALL);

   }

    $accessibleVideos = $assetManager->determineVideoAccessNonAsset($videosTaggedAll, $isSuperuser, $userid, $debug=false);

    //consider part of a supercategory

    if ($debug){

    print_r($accessibleVideos);

    }

  

    $position = array_search($videoid, $accessibleVideos);

            if ($debug){

                print_r($position);

            }

                //count of videos

                if ($position > -1){

                    //is id in the array browsingArray?
        
                    if ($debug){
            
                        echo 'id detected in the browsing array at position ' . $position;
                    }
        
                    
                    //get previous video and next video
        
                    $nextVideo = $accessibleVideos[(intval($position) + 1)];
        
                    if (!isset($nextVideo)){
        
                        $lastVideo = true;
                    }else{
        
                        $lastVideo = false;
                    }
                    
        
                    $previousVideo = $accessibleVideos[(intval($position) - 1)];
        
                    if (!isset($previousVideo)){
        
                        $firstVideo = true;
                    }else{
        
                        $firstVideo = false;
                    }
        
                    if ($debug){
            
                        echo "NEXT video is $nextVideo and PREVIOUS video is $previousVideo";
                        
                        if ($firstVideo == true){
                        
                            echo "this is the FIRST video ";
                            
                            }
                        
                        if ($lastVideo == true){
                        
                        echo "this is the LAST video ";
        
                        }
        
        
                    }
        
                    $numberOfVideos = count($accessibleVideos);
                  
                    if ($debug){
            
                        echo "This video is number $position of $numberOfVideos";
                    }

                    //check if video is in original browsing array, but here there is no browsing array so remove this following code and tell outside

                    $outside_asset = true;

                    /* $original_asset = array_search($videoid, $browsing_array);

                    if ($original_asset > -1){

                        //detected in original asset array

                        $outside_asset = false;

                    }else{

                        $outside_asset = true;

                    } */



        
                }else{
        
        
                    if ($debug){
            
                        echo 'id not detected in the browsing array'; 
                    }
        
        
                }  
                //position of this video
                //next video
                //previous video


            //copied from above to modify

            $returnArray = [

                'postion' => $position+1,
                'numberOfVideos' => $numberOfVideos,
                'nextVideo' => $nextVideo,
                'previousVideo' => $previousVideo,
                'firstVideo' => $firstVideo,
                'lastVideo' => $lastVideo,
                'outside_asset' => $outside_asset,


            ];

            echo json_encode($returnArray);

    

}

    
//echo 'All set';


}else{

    if ($debug){

        echo 'one of required parameters $browsing and / or $browsing_id not set in cookies';

    }

    //delete the others?
}











?>