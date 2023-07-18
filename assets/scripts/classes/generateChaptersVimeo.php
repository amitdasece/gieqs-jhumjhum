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

            $chaptersStraight = array();

            foreach ($data['chapters'] as $key=>$value){

                $chaptersStraight[$y] = $value['startTime'];
                $y++;
            }

            print_r($chaptersStraight);

            $x=0;

            $countChapters = count($chaptersStraight);
            foreach ($data['chapters'] as $key=>$value){

                print_r($value);

                $index = null;
                $title = null;
                $startTime = null;
                $timeTo = null;

                $index = $value['index'];
                $title = $value['title'];
                $startTime = $value['startTime'];

                if ($index < $countChapters){

                $integerIndex = intval($index);
                $integerNextChapterEnd = intval($chaptersStraight[$integerIndex]);
                $timeTo = $integerNextChapterEnd - 0.01;

                }else{

                    $timeTo = null;

                }

                //$endTime = null;

                $chapter->New_chapter($index, $title, $startTime, $timeTo, $videoid, null);
                $chapter->prepareStatementPDO();
                $x++;


            }

            echo 'Chapters Created';


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