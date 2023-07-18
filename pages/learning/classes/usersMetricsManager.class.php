<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 5-07-2020
 *
 * DJT 2021 birth of DENTY
 *
 * License: LGPL
 *
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['debug'] == true) {

    error_reporting(E_ALL);

} else {

    error_reporting(0);

}

require_once 'DataBaseMysqlPDO.class.php';

class usersMetricsManager
{

    private $connection;

    public function __construct()
    {
        $this->connection = new DataBaseMysqlPDOLearning();
        require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
            $this->assetManager = new assetManager();
            require_once(BASE_URI . '/assets/scripts/classes/programme.class.php');
            $this->programme = new programme();
            require_once(BASE_URI . '/assets/scripts/classes/sessionView.class.php');
            $this->sessionView = new sessionView();
    }



    //views

    public function getLastViewedVideo($userid, $debug = false)
    {

        $q = "SELECT `video_id` FROM `usersViewsVideo`
            WHERE `user_id` = '$userid'
            ORDER BY `id` DESC
            LIMIT 1";

        if ($debug) {

            echo $q . '<br><br>';

        }

        //$rowReturn = [];

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn = $row['video_id'];

            }

            return $rowReturn;

        } else {

            return false;
        }

    }

    public function getLastViewedVideoAsset($userid, $asset_array, $debug = false)
    {

        //uses assetManager returnVideosAsset to provide the array

        if ($debug) {

            echo PHP_EOL;
            echo 'asset array was';
            print_r($asset_array);
        }

        $detected = false;

        foreach ($asset_array as $key => $value) {

            $video = null;
            $video = $this->getLastViewedVideo($userid);

            if ($value == $video) {

                $detected = $video;

            }

        }

        return $detected;

    }

    public function getLastVideoViewedInAsset($userid, $asset_array, $debug = false)
    {

        //uses assetManager returnVideosAsset to provide the array

        if ($debug) {

            echo PHP_EOL;
            echo 'asset array was';
            print_r($asset_array);
        }

        $detected = false;

        $videosArray = $this->getAllVideosWatchedUser($userid);

        if ($debug) {

            echo PHP_EOL;
            echo 'user has watched array ';
            print_r($videosArray);
        }

        foreach ($videosArray as $key => $value) {

            //if in asset array then return the first video id.

            
            if (in_array($value, $asset_array) === true) {

                $detected = $value;
                break;

            }

        }

        if ($debug){

            echo 'user last watched video id ' . $detected . 'from this asset group';
        }
        return $detected;

    }

    

    public function getLastViewedVideoPage($userid, $page_id)
    {

    }

    public function checkChapterUser($userid, $chapter_id)
    {

        //has user viewed this chapter before

        $q = "SELECT `id` FROM `usersVideoChapterProgress`
            WHERE `user_id` = '$userid' AND chapter_id = '$chapter_id'";

        /* if ($debug) {

            echo $q . '<br><br>';

        } */

        //$rowReturn = [];

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            return true;

        } else {

            return false;
        }

    }

    public function getVideoForChapter($chapter_id)
    {

        $q = "SELECT a.`id`
        FROM `video` as a
        INNER JOIN `chapter` as b ON a.`id` = b.`video_id`
        WHERE b.`id` = '$chapter_id'";

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows == 1) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $videoid = $row['id'];

            }

            return $videoid;

        } else {


            if ($debug){

                echo 'one exact video not matched';

            }

            return false;

            
        }

    }

    public function userCompletionVideos($userid, $debug = false)
    {

        //get all chapters for selected video

        $q = "SELECT a.`id`
        FROM `video` as a
        WHERE a.`active` = '1' OR a.`active` = '3'";

        if ($debug) {

            echo $q . '<br><br>';

        }

        $x = 0; // completed video counter
        $y = 0; // video total counter

        //thus completion = x / y x 100%

        //$rowReturn = [];

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                if ($debug) {

                    echo $this->userCompletionVideo($userid, $row['id']) . 'is completion for video ' . $row['id'] . '<br><br>';
        
                }

                if ($this->userCompletionVideo($userid, $row['id']) == 100) {

                    $x++;

                }

                $y++;

            }

            $completion = (intval($x) / intval($y)) * 100;

            return ['numerator' => $x, 'denominator' => $y, 'completion' => $completion];

        } else {

            return false;

            if ($debug) {

                echo 'no videos';
            }
        }

    }

    public function userCompletionVideo($userid, $videoid, $debug = false)
    {

        //get all chapters for selected video

        $q = "SELECT b.`id`
        FROM `video` as a
        INNER JOIN `chapter` as b ON a.`id` = b.`video_id`
        WHERE a.`id` = $videoid ORDER BY b.`number` ASC";

        if ($debug) {

            echo $q . '<br><br>';

        }

        $x = 0; // completed counter
        $y = 0; // chapter total counter

        //thus completion = x / y x 100%

        //$rowReturn = [];

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                if ($this->checkChapterUser($userid, $row['id']) === true) {

                    $x++;

                }

                $y++;

            }

            $completion = (intval($x) / intval($y)) * 100;

            return $completion;

        } else {

            return false;

            if ($debug) {

                echo 'Video has no chapters';
            }
        }

    }

    public function getAllAssets(){


        $q = "SELECT `id` FROM `assets_paid` 
        WHERE `advertise_for_purchase` = 1        
        ORDER BY `id` DESC";

        $x=0;
        $returnArray = [];
        $result = $this->connection->RunQuery($q);

        $nRows = $result->rowCount();


        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $returnArray[$x] = $row['id'];
                $x++;

            }

            return $returnArray;

        }else{

            return FALSE;
        }




    }


    public function userCompletionAsset($userid, $assetid, $debug = false)
    {

       $videos = $this->assetManager->getVideosAnyAsset($assetid);

       //var_dump($videos);

       if ($debug){
       echo 'Asset id is ' . $assetid . ' <br/><br/><br/>';
       }
        //var_dump($videos);
       
      if (count($videos) > 0){

        $videos_implode = implode(',', $videos);

        $q = "SELECT b.`id`
        FROM `video` as a
        INNER JOIN `chapter` as b ON a.`id` = b.`video_id`
        WHERE a.`id` IN ($videos_implode)
        ORDER BY b.`number` ASC";

        //echo $q;

        if ($debug) {

            echo $q . '<br><br>';

        }


      }else{

        return null;

      }
        
        

       






    //exit();

       

        $x = 0; // completed counter
        $y = 0; // chapter total counter

        //thus completion = x / y x 100%

        //$rowReturn = [];

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                if ($this->checkChapterUser($userid, $row['id']) === true) {

                    $x++;

                }

                $y++;

            }

            $completion = (intval($x) / intval($y)) * 100;

            return $completion;

        } else {

            return false;

            if ($debug) {

                echo 'Video has no chapters';
            }
        }

    }

    public function setSQLTimezoneUTC(){

        $q = "SET @@session.time_zone='+00:00'";

        $result = $this->connection->RunQuery($q);

    }

    public function getLastViewedVideosCompletion($userid, $debug=false)
    {

        $q = "SELECT `video_id` FROM `usersViewsVideo`
            WHERE `user_id` = '$userid'
            ORDER BY `recentView` DESC";

        if ($debug){

            echo $q;

        }

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $y=0;
        $rowReturn = array();
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['video_id'];
                $x++;

            }

            if ($debug){

                print_r($rowReturn);
    
            }

            $uncompletedLastThree = array();

            foreach ($rowReturn as $key=>$value){

                //check if this video was completed

                

                if ($debug){

                    echo $this->userCompletionVideo($userid, $value, false);
        
                }

                if ($this->userCompletionVideo($userid, $value, false) > 0 && $this->userCompletionVideo($userid, $value, false) < 100){

                
                    $uncompletedLastThree[$y] = $value;
                    $y++;


                }

                if ($y > 2){
                    
                    return $uncompletedLastThree;


                }


            }

            return $uncompletedLastThree;




        } else {


            if ($debug){

                echo 'no videos matched';

            }

            return false;

            
        }

    }

    public function getTopAssets($debug=false)
    {

        $q = "SELECT `asset_id` FROM `topAssets`
            WHERE `active` = 1
            ORDER BY CAST(`order` AS unsigned) ASC
            LIMIT 20";

        if ($debug){

            echo $q;

        }

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $y=0;
        $rowReturn = array();
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['asset_id'];
                $x++;

            }

            if ($debug){

                print_r($rowReturn);
    
            }

            //now rowReturn is an array of 10 newest videos



            //check access

            //make 3

            //return

            

            return $rowReturn;


        } else {


            if ($debug){

                echo 'no assets matched';

            }

            return false;

            
        }

    }

    public function getTopVideos($debug=false)
    {

        $q = "SELECT `video_id` FROM `topVideos`
            WHERE `active` = 1
            ORDER BY CAST(`order` AS unsigned) ASC
            LIMIT 20";

        if ($debug){

            echo $q;

        }

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $y=0;
        $rowReturn = array();
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['video_id'];
                $x++;

            }

            if ($debug){

                print_r($rowReturn);
    
            }

            //now rowReturn is an array of 10 newest videos



            //check access

            //make 3

            //return

            

            return $rowReturn;


        } else {


            if ($debug){

                echo 'no videos matched';

            }

            return false;

            
        }

    }

    public function getNewVideos($debug=false)
    {

        $q = "SELECT `id` FROM `video`
            WHERE `active` = 1 OR `active` = 3
            ORDER BY `created` DESC
            LIMIT 20";

        if ($debug){

            echo $q;

        }

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $y=0;
        $rowReturn = array();
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['id'];
                $x++;

            }

            if ($debug){

                print_r($rowReturn);
    
            }

            //now rowReturn is an array of 10 newest videos



            //check access

            //make 3

            //return

            

            return $rowReturn;


        } else {


            if ($debug){

                echo 'no videos matched';

            }

            return false;

            
        }

    }

    public function getAllVideosWatchedUser ($userid, $debug=false){


        $q = "SELECT DISTINCT `video_id` FROM `usersViewsVideo`
            WHERE `user_id` = '$userid'
            ORDER BY `recentView` DESC";

    if ($debug){

        echo $q;

    }

    $result = $this->connection->RunQuery($q);

    $x = 0;
    $y=0;
    $rowReturn = array();
    $nRows = $result->rowCount();

    if ($nRows > 0) {

        

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $rowReturn[$x] = $row['video_id'];
            $x++;

        }

        if ($debug){

            print_r($rowReturn);

        }

        //now rowReturn is an array of 10 newest videos



        //check access

        //make 3

        //return

        

        return $rowReturn;


    } else {


        if ($debug){

            echo 'no videos matched';

        }

        return false;

        
    }



    }

    public function getSuggestedVideos($debug=false)
    {

        $q = "SELECT `id` FROM `video`
            WHERE `active` = 1 OR `active` = 3
            ORDER BY `created` DESC
            LIMIT 20";

        if ($debug){

            echo $q;

        }

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $y=0;
        $rowReturn = array();
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['id'];
                $x++;

            }

            if ($debug){

                print_r($rowReturn);
    
            }

            //now rowReturn is an array of 10 newest videos



            //check access

            //make 3

            //return

            

            return $rowReturn;


        } else {


            if ($debug){

                echo 'no videos matched';

            }

            return false;

            
        }

    }

    public function getKeyUserViewsVideoMatch($userid, $video_id){
        
        $q="Select `id` from `usersViewsVideo` where `user_id` = '$userid' and `video_id` = '$video_id'";
        //echo $q;


        $result = $this->connection->RunQuery($q);
        
		$nRows = $result->rowCount();
			if ($nRows == 1){
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn = $row['id'];
                    //$x++;
    
                }

                return $rowReturn;
			}else{
				return FALSE;
			}
    }

    public function getKeyUserViewsChapterVideoMatch($userid, $chapter_id){
        
        $q="Select `id` from `usersVideoChapterProgress` where `user_id` = '$userid' and `chapter_id` = '$chapter_id'";
        //echo $q;


        $result = $this->connection->RunQuery($q);
        
		$nRows = $result->rowCount();
			if ($nRows == 1){
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn = $row['id'];
                    //$x++;
    
                }

                return $rowReturn;
			}else{
				return FALSE;
			}
    }

    public function getMostRecentPosition ($video_id, $userid, $debug=false){

        //returns most recent chapter use for video

        $q="Select `chapter_id` from `usersVideoChapterProgress` AS a
        INNER JOIN `chapter` as b on a.`chapter_id` = b.`id`
        where a.`user_id` = '$userid' and b.`video_id` = '$video_id'
        ORDER BY `recentView` DESC
        LIMIT 1";
        
        if ($debug){

            echo $q;


        }


        $result = $this->connection->RunQuery($q);
        
		$nRows = $result->rowCount();
			if ($nRows == 1){
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn = $row['chapter_id'];
                    //$x++;
    
                }

                return $rowReturn;
			}else{
				return FALSE;
			}
    }

    function getPopularVideos ($debug = false){


            $q = "SELECT `video_id`, count(*)
            FROM `usersViewsVideo` 
            GROUP BY `video_id`
            ORDER BY count(*) DESC 
            LIMIT 10";
    
            $result = $this->connection->RunQuery($q);

            $count = array();
            $x = 0;
    
            if ($result){
           
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
               
                    $count[$x] = $row['video_id'];
                    $x++;
            
                }
           
                return $count;
            
        }else{
    
                return false;
            }
    
    
    
    



    }


    function createCertificate ($userid, $assetid, $debug=false){

        $q = "INSERT INTO `certificates` (`user_id`, `asset_id`, `created`) VALUES ('$userid', '$assetid', current_timestamp())";

        //echo $q;

        $result = $this->connection->RunQuery($q);
        return $this->connection->conn->lastInsertId(); 





        //return certificate ids
    }

    function checkCertificate ($id) {

        $q = "SELECT `id`, `user_id`, `asset_id` FROM `certificates` WHERE `id` = '$id'";

        $result = $this->connection->RunQuery($q);
        
		$nRows = $result->rowCount();
			if ($nRows == 1){
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn['id'] = $row['id'];
                    $rowReturn['user_id'] = $row['user_id'];
                    $rowReturn['asset_id'] = $row['asset_id'];
                    //$x++;
    
                }

                return $rowReturn;
			}else{
				return FALSE;
			}

        //return user name and valid or not

    }

    function checkCertificateUserAsset ($userid, $assetid, $debug) {

        $q = "SELECT `id` FROM `certificates` WHERE `user_id` = '$userid' AND `asset_id` = '$assetid'";

        //return user name and valid or not

        $result = $this->connection->RunQuery($q);
        
		$nRows = $result->rowCount();
			if ($nRows == 1){
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn = $row['id'];
                    //$x++;
    
                }

                return $rowReturn;
			}else{
				return FALSE;
			}

    }

    function didUserAttendAssetLive ($userid, $assetid, $debug=false){

        //degree of tolerance in the start time is important

        //set at 1 hour

        $tolerance = 1;

        $tolerance_seconds = $tolerance * 60 * 60;

        //did they login or access a page during live asset

        //if not return false

        //later also look for the LIVE_ASSET_VIEW in show_subscription

        //get the programme id

        $programmeid = $this->assetManager->getProgrammeidAsset($assetid);

       

        if ($programmeid){

            //asset contains programmes

            //all programmes

            if ($debug){

                var_dump($programmeid);
            }
        
            //if the count of programme_id is > 1 then we have multiple programmes

            if (count($programmeid) > 1){

                //define multiple programmes

                if ($debug){

                    echo 'multiple programmes';
                }

                $programme_multiple = true;

                $overall_asset_programme_last_key = intval(count($programmeid)) - 1;

            }else{

                if ($debug){

                    echo 'single programme';

                }
                    
                    $programme_multiple = false;
            }

            //get the start and end times of the first programme and only if there is only one programme

            //first programme


        $specific_programme = $programmeid[0];


        if ($debug){

            echo 'programme id ' . $programmeid[0];

        }

        //echo $specific_programme;

        $access = [0=>['id'=>$specific_programme],];

        $access1 = null;

        
        $access1 = $this->sessionView->getStartAndEndProgrammes($access, $debug);

        if ($debug){
                
                echo '<br/>Access 1 is ';
    
                var_dump($access1);

                echo '<br/>';
    
        }

        $count_items_in_programme = intval(count($access1[$specific_programme]));

        $programme_last_key = $count_items_in_programme - 1;


        //var_dump($access1);

        //$access2 = $this->sessionView->getStartEndProgrammes($access1, $debug);

        $this->programme->Load_from_key($specific_programme);

        $serverTimeZone = new DateTimeZone('Europe/Brussels');

        $programmeDate = new DateTime($this->programme->getdate(), $serverTimeZone);

        $humanReadableProgrammeDate = date_format($programmeDate, "l jS F Y");

        //echo $humanReadableProgrammeDate;

        //echo '<br/>' . $this->programme->getdate() . ' ' . $access1[$specific_programme][0]['timeFrom'];

        $startTime = new DateTime($this->programme->getdate() . ' ' . $access1[$specific_programme][0]['timeFrom'], $serverTimeZone);

        $tosub = new DateInterval('PT1H');
        $startTime->sub($tosub);

        //$startTime = $startTime - $tolerance_seconds;

        $startTime = $startTime->format('Y-m-d H:i:s');

        if ($debug){

            echo '<br/>Start time is ' . $startTime;

        }

        //date($startTime, strtotime($startTime. ' -' . $tolerance . ' hours'));

        //var_dump($startTime);

        //$startTime = new DateTime($startTime, $serverTimeZone);
        
        $endTime = new DateTime($this->programme->getdate() . ' ' . $access1[$specific_programme][$programme_last_key]['timeTo'], $serverTimeZone);

        //echo $humanStartTime = date_format($startTime, "H:i");

        //echo $humanEndTime = date_format($endTime, "H:i T");

        $sqlStart = $startTime;
        $sqlEnd = $endTime->format('Y-m-d H:i:s');

        if ($debug){

            echo '<br/>';
            echo 'There were ' . $count_items_in_programme . ' items in this programme';
            echo '<br/>';
            echo $userid;
            echo '<br/>';
            echo $sqlStart;
            echo '<br/>';
            echo $sqlEnd;

        }

        //if only one programme is correct

        if (!$programme_multiple){

            if ($this->sessionView->liveAttendance($userid, $sqlStart, $sqlEnd, $debug) === true || $this->sessionView->liveAttendancev2($userid, $assetid, $debug) === true){

                if ($debug){
    
                    echo 'true as live attendance';
                    
    
                }
    
                return true;
    
            }else{
    
                if ($debug){
    
                    echo 'false as no live attendance';
    
                }
    
                return false;
            }


        }else{

            //we have multiple programmes so define the end of the last programme in the asset

            //sqlStart is still valid

            $sqlStart_overall = $sqlStart;

            $specific_programme = $programmeid[$overall_asset_programme_last_key];


            if ($debug){

                echo 'programme id ' . $specific_programme;

            }

            //echo $specific_programme;

            $access = [0=>['id'=>$specific_programme],];

            $access1 = null;

            
            $access1 = $this->sessionView->getStartAndEndProgrammes($access, $debug);

            if ($debug){
                    
                    echo '<br/>Access 1 is ';
        
                    var_dump($access1);

                    echo '<br/>';
        
            }

            $count_items_in_programme = intval(count($access1[$specific_programme]));

            $programme_last_key = $count_items_in_programme - 1;


            //var_dump($access1);

            //$access2 = $this->sessionView->getStartEndProgrammes($access1, $debug);

            $this->programme->Load_from_key($specific_programme);

            $serverTimeZone = new DateTimeZone('Europe/Brussels');

            $programmeDate = new DateTime($this->programme->getdate(), $serverTimeZone);

            $humanReadableProgrammeDate = date_format($programmeDate, "l jS F Y");

            //echo $humanReadableProgrammeDate;

            //echo '<br/>' . $this->programme->getdate() . ' ' . $access1[$specific_programme][0]['timeFrom'];

            $startTime = new DateTime($this->programme->getdate() . ' ' . $access1[$specific_programme][0]['timeFrom'], $serverTimeZone);

            $endTime = new DateTime($this->programme->getdate() . ' ' . $access1[$specific_programme][$programme_last_key]['timeTo'], $serverTimeZone);

            //echo $humanStartTime = date_format($startTime, "H:i");

            //echo $humanEndTime = date_format($endTime, "H:i T");

            //$sqlStart = $startTime->format('Y-m-d H:i:s');
            $sqlEnd = $endTime->format('Y-m-d H:i:s');

            if ($debug){

                echo '<br/>';
                echo 'There were ' . $count_items_in_programme . ' items in this programme';
                echo '<br/>';
                echo $userid;
                echo '<br/>';
                echo $sqlStart_overall;
                echo '<br/>';
                echo $sqlEnd;

            }

            if ($this->sessionView->liveAttendance($userid, $sqlStart_overall, $sqlEnd, $debug) === true || $this->sessionView->liveAttendancev2($userid, $assetid, $debug) === true){

                if ($debug){
    
                    echo 'true as live attendance';
                    
    
                }
    
                return true;
    
            }else{
    
                if ($debug){
    
                    echo 'false as no live attendance';
    
                }
    
                return false;
            }


        }


        



        }else{

            //no programmes contained in this asset

            if ($debug){

                echo 'no programmes contained in this asset';

            }



            return false;

        }
        


                //$date = new DateTime('now', $serverTimeZone);

     
/* later add or  OR (`activity_time` > "2022-09-30 05:30:00" AND `activity_time` < "2022-09-30 16:30:00")  */



    }


    


    

    /**
     * Close mysql connection
     */
    public function endusersMetricsManager()
    {
        $this->connection->CloseMysql();
    }

}
