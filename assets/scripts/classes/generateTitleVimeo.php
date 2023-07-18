<?php

            $openaccess = 1;

			//$requiredUserLevel = 4;
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            $general = new general;
            $programme = new programme;
            $session = new session;
            $faculty = new faculty;
            $sessionItem = new sessionItem;
            $queries = new queries;
            $sessionView = new sessionView;
            $programmeView = new programmeView;

                    require_once BASE_URI . '/assets/scripts/classes/courseManager.class.php';
        $courseManager = new courseManager;

        require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
        $sessionView = new sessionView;

        require_once BASE_URI . '/assets/scripts/classes/assetManager.class.php';
        $assetManager = new assetManager;

        require_once BASE_URI . '/pages/learning/classes/chapter.class.php';
        $chapter = new chapter;

        require_once BASE_URI . '/pages/learning/classes/video_PDO2.class.php';
        $video = new video;



            //set the variables

            //system to use as a reference
            
            
            //$currentTime = new DateTime();  //need to check Belgium time
            //now requires liveNav.php to generate the next 3 lines
            
            //$serverTimeZone = new DateTimeZone('Europe/Brussels');
            
            
            //$currentTime = new DateTime('now', $serverTimeZone);
            
            //print_r($currentTime); */ // comment !forLive

            //comment for live the below line !forLive

            //$currentTime = new DateTime('2020-10-08 09:30:20', $serverTimeZone);

            //$serverTimeZone = new DateTimeZone('Europe/Brussels');


            //$currentTime = new DateTime('now', $serverTimeZone);

            //$print_r()

            /* if ($liveTest){

            //print_r($currentTime); // comment !forLive
            echo 'test ' . date_format($currentTime,"d/m/Y H:i") . ' is current test time'; // comment !forLive

            } */

            $data = json_decode(file_get_contents('php://input'), true);

            print_r($data);

            $videoid = $data['videoid'];

            $y = 0;


            $video->Load_from_key($videoid);

            $video->setname($data['title']);
            
            $video->setdescription($data['description']);

            $video->prepareStatementPDOUpdate();



            //foreach 

            //new chapter

           // $chapter->New_chapter($index, $, $startTime, $timeTo, $videoid);



            


            
$general->endgeneral;
$programme->endprogramme;
$session->endsession;
$faculty->endfaculty;
$sessionItem->endsessionItem;
$queries->endqueries;
$sessionView>endsessionView;?>