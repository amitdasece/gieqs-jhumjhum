<?php
/*
 * Author: David Tate  - www.endoscopy.wiki
 *
 * Create Date: 26-01-2020
 *
 * DJT 2020
 *
 * License: LGPL
 *
 * session view creator
 * 
 */


if ($_SESSION['debug'] == true){

error_reporting(E_ALL);

}

require_once 'DataBaseMysqlPDO.class.php';

class sessionView
{

    

    public function __construct()
    {
        $this->connection = new DataBaseMysqlPDO();
     
        
    }

    
    /**
     * 
     * further queries below here
     * 
     */

     /**
      * generate the session View

      */

//TODO get day of week from date

      public function generateViewJSON($sessionid)
            {
            
            $q = "Select 
            
            a.`id` as `programmeid`, a.`date`,
            c.`id` as `sessionid`, c.`timeFrom`, c.`timeTo`, c.`title` as `sessionTitle`, c.`subtitle` as `sessionSubtitle`, c.`description` as `sessionDescription`,
            e.`id` as `sessionItemid`, e.`title` as `sessionItemTitle`, e.`description` as `sessionItemDescription`, e.`faculty`, e.`live`
            from `programme` as a
            INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
            INNER JOIN `session` as c on b.`sessionid` = c.`id`
            INNER JOIN `sessionOrder` as d on c.`id` = d.`sessionid`
            INNER JOIN `sessionItem` as e on d.`sessionItemid` = e.`id`
            INNER JOIN `sessionModerator` as f on c.`id` = f. `sessionid`

            WHERE c.`id` = '$sessionid'
            ";



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn['data'][] = array_map('utf8_encode', $row);
                }
            
                return json_encode($rowReturn);

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn['data'] = [];
                
                return json_encode($rowReturn);
            }

        }

        public function generateView($sessionid)
            {
            
                //EDITED TODO CHECK LEFT OUTER JOIN
            $q = "Select 
            
            a.`id` as `programmeid`, a.`date`,
            c.`id` as `sessionid`, c.`timeFrom`, c.`timeTo`, c.`title` as `sessionTitle`, c.`subtitle` as `sessionSubtitle`, c.`description` as `sessionDescription`,
            e.`id` as `sessionItemid`, e.`timeFrom` as `sessionItemTimeFrom`, e.`timeTo` as `sessionItemTimeTo`, e.`title` as `sessionItemTitle`, e.`description` as `sessionItemDescription`, e.`faculty`, e.`live`, e.`url_video`,
            g.`id` as `assetId`, g.`type`, g.`location`, g.`href`, g.`endoscopy_wiki_id`
            from `programme` as a
            INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
            INNER JOIN `session` as c on b.`sessionid` = c.`id`
            LEFT OUTER JOIN `sessionOrder` as d on c.`id` = d.`sessionid`
            LEFT OUTER JOIN `sessionItem` as e on d.`sessionItemid` = e.`id`
            LEFT OUTER JOIN `sessionItemAsset` as f on f.`sessionItemid` = e.`id`
            LEFT OUTER JOIN `assets` as g on f.`assetId` = g.`id`
            WHERE c.`id` = '$sessionid'
            ORDER BY e.`timeFrom` ASC
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn[] = array_map('utf8_encode', $row);
                }
            
                return $rowReturn;

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn = [];
                
                return $rowReturn;
            }

        }

        public function Load_records_session_programme_limit_json_datatables($y, $x = 0)
            {
            $q = "SELECT a.`id` as `programmeid`, a.`date`,
            c.`id`, c.`timeFrom`, c.`timeTo`, c.`title`, c.`subtitle`, c.`description`, c.`break`
            from `programme` as a
            INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
            INNER JOIN `session` as c on b.`sessionid` = c.`id`
            LIMIT $x, $y";
            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();
            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn['data'][] = array_map('utf8_encode', $row);
                }
            
                return json_encode($rowReturn);

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn['data'] = [];
                
                return json_encode($rowReturn);
            }

        }
        
        
        public function getModerators($sessionid)
            {
            

            $q = "Select 
            
            a.`id` as `sessionid`,
            b.`facultyid` as `facultyid`,
            c.`title`, c.`firstname`, c.`surname`
            FROM `session` as a
            INNER JOIN `sessionModerator` as b on a.`id` = b.`sessionid`
            INNER JOIN `faculty` as c on b.`facultyid` = c.`id`
            WHERE a.`id` = '$sessionid'
            ORDER BY b.`id` ASC
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn[] = array_map('utf8_encode', $row);
                }
            
                return $rowReturn;

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn = [];
                
                return $rowReturn;
            }

        }

        public function getAssets($sessonItemID)
            {
            

            $q = "Select 
            g.`id` as `assetId`, g.`type`, g.`location`, g.`href`, g.`endoscopy_wiki_id`
            from `programme` as a
            INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
            INNER JOIN `session` as c on b.`sessionid` = c.`id`
            LEFT OUTER JOIN `sessionOrder` as d on c.`id` = d.`sessionid`
            LEFT OUTER JOIN `sessionItem` as e on d.`sessionItemid` = e.`id`
            LEFT OUTER JOIN `sessionItemAsset` as f on f.`sessionItemid` = e.`id`
            LEFT OUTER JOIN `assets` as g on f.`assetId` = g.`id`
            WHERE e.`id` = '$sessonItemID'
            ORDER BY e.`timeFrom` ASC
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn[] = array_map('utf8_encode', $row);
                }
            
                return $rowReturn;

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn = [];
                
                return $rowReturn;
            }

        }

        public function getFacultyName($facultyid)
            {
            

            $q = "Select `title`, `firstname`, `surname`
            FROM `faculty` 
            WHERE `id` = '$facultyid'
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn = array_map('utf8_encode', $row);
                }
            
                return $rowReturn;

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn = [];
                
                return $rowReturn;
            }

        }

        public function getFacultyNamePrint($facultyid)
            {
            

            $q = "Select `title`, `firstname`, `surname`
            FROM `faculty` 
            WHERE `id` = '$facultyid'
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            //$rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn = $row['title'] . ' ' . $row['firstname'] . ' ' . $row['surname'];
                }
            
                return $rowReturn;

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn = [];
                
                return $rowReturn;
            }

        }

        public function checkCombination($sessionid, $moderatorid)
            {
            

            $q = "Select a.`id`
            FROM `sessionModerator` as a
            WHERE `sessionid` = '$sessionid' AND `facultyid` = '$moderatorid'
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                return true;

            } else {
                

                return false;
            }

        }

        public function checkCombinationSessionSessionItem($sessionid, $sessionItemid)
            {
            

            $q = "Select `id`
            FROM `sessionOrder`
            WHERE `sessionid` = '$sessionid' AND `sessionItemid` = '$sessionItemid'
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                return true;

            } else {
                

                return false;
            }

        }

        public function checkCombinationProgrammeOrder($sessionid, $programmeOrder)
            {
            

            $q = "Select `id`
            FROM `programmeOrder`
            WHERE `sessionid` = '$sessionid' AND `programmeid` = '$programmeOrder'
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                return true;

            } else {
                

                return false;
            }

        }

        public function checkCombinationSessionOrderReturn($sessionid, $sessionItemID)
            {
            

            $q = "Select `id`
            FROM `sessionOrder`
            WHERE `sessionid` = '$sessionid' AND `sessionItemid` = '$sessionItemID'
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    return $row['id'];
                }

            } else {
                

                return false;
            }

        }

        public function checkSessionModeratorid($sessionid, $moderatorid)
            {
            

            $q = "Select a.`id`
            FROM `sessionModerator` as a
            WHERE `sessionid` = '$sessionid' AND `facultyid` = '$moderatorid'
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    return $row['id'];
                }

            } else {
                

                return false;
            }

        }
        
        public function getSessionProgramme($sessionid)
            {
            

                $q = "Select 
            
                a.`id` as `programmeid`, a.`date`,
                c.`id` as `sessionid` 
                from `programme` as a
                INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
                INNER JOIN `session` as c on b.`sessionid` = c.`id`
                WHERE c.`id` = '$sessionid'
                ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    return $row['programmeid'];
                }

            } else {
                

                return false;
            }

        }


        public function programmesActiveToday($date, $debug=false){

            
            
         
            $currentTime = $date;
            


            $currentTimeCET = $currentTime->format('Y-m-d');

            

            $q = "Select 
                a.`id`, a.`date`
                from `programme` as a
                WHERE a.`date` = '$currentTimeCET'
                ";

            if ($debug){

                echo $q;
            }

            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn[]['id'] = $row['id'];
                }

                return $rowReturn;

            } else {
                

                return false;
            }

        }

        public function getStartAndEndProgrammes($programmes, $debug=false){

            $rowReturn = array();


            foreach ($programmes as $key=>$value){

                $programmeid = null;
                $programmeid = $value['id'];

                if ($debug){

                    echo 'programme id is ' . $programmeid;
                }

                $q = "Select 
                a.`date`, a.`id`,
                c.`id` as `sessionid`, c.`timeFrom`, c.`timeTo` 
                from `programme` as a
                INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
                INNER JOIN `session` as c on b.`sessionid` = c.`id`
                WHERE a.`id` = '{$programmeid}'
                ORDER BY c.`timeFrom` ASC
                ";

                if ($debug){
                    echo $q . '<br><br>';

                }




                $result = $this->connection->RunQuery($q);
                
                $x = 0;
                $y = 0;
                $nRows = $result->rowCount();

                if ($nRows > 0) {

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    

                        //$id = $row['id'];

                        $rowReturn[$programmeid][$x]['timeFrom'] = $row['timeFrom'];
                        $rowReturn[$programmeid][$x]['timeTo'] = $row['timeTo'];
                        $x++;
                    }

                }


            }

            return $rowReturn;


        }

        public function getProgrammeTimes($programmes, $debug=false){

            $rowReturn = array();


            foreach ($programmes as $key=>$value){

                $programmeid = null;
                $programmeid = $value['id'];

                if ($debug){

                    echo 'programme id is ' . $programmeid;
                }

                $q = "Select 
                a.`date`, a.`id`,
                c.`id` as `sessionid`, c.`timeFrom`, c.`timeTo`, c.`break` 
                from `programme` as a
                INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
                INNER JOIN `session` as c on b.`sessionid` = c.`id`
                WHERE a.`id` = '{$programmeid}'
                ORDER BY c.`timeFrom` ASC
                ";

                if ($debug){
                    echo $q . '<br><br>';

                }




                $result = $this->connection->RunQuery($q);
                
                $x = 0;
                $y = 0;
                $nRows = $result->rowCount();

                if ($nRows > 0) {

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    

                        //$id = $row['id'];

                        $rowReturn[$programmeid][$x]['timeFrom'] = $row['timeFrom'];
                        $rowReturn[$programmeid][$x]['timeTo'] = $row['timeTo'];
                        $rowReturn[$programmeid][$x]['break'] = $row['break'];

                        $x++;
                    }

                }


            }

            return $rowReturn;


        }

        public function getProgrammeBreaks($programmes, $debug=false){

            $rowReturn = array();


            foreach ($programmes as $key=>$value){

                $programmeid = null;
                $programmeid = $value['id'];

                if ($debug){

                    echo 'programme id is ' . $programmeid;
                }

                $q = "Select 
                a.`date`, a.`id`,
                c.`id` as `sessionid`, c.`timeFrom`, c.`timeTo`, c.`break`, c.`title` 
                from `programme` as a
                INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
                INNER JOIN `session` as c on b.`sessionid` = c.`id`
                WHERE a.`id` = '{$programmeid}' AND (c.`break` = '1')
                ORDER BY c.`timeFrom` ASC
                ";

                if ($debug){
                    echo $q . '<br><br>';

                }




                $result = $this->connection->RunQuery($q);
                
                $x = 0;
                $y = 0;
                $nRows = $result->rowCount();

                if ($nRows > 0) {

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    

                        //$id = $row['id'];

                        $rowReturn[$programmeid][$x]['title'] = $row['title'];

                        $rowReturn[$programmeid][$x]['timeFrom'] = $row['timeFrom'];
                        $rowReturn[$programmeid][$x]['timeTo'] = $row['timeTo'];
                        $rowReturn[$programmeid][$x]['break'] = $row['break'];

                        $x++;
                    }

                }


            }

            return $rowReturn;


        }

        public function convertProgrammeTimes($programmes, $debug=false){

            $rowReturn = array();

            foreach ($programmes as $key=>$value){

                foreach ($value as $key2=>$value2){

                    //print_r($value2);
                    $rowReturn[] = $value2['timeFrom'];

                }

            }

            return $rowReturn;


        }

        public function convertProgrammeTimesBreaks($breaks, $debug=false){

            $rowReturn = array();

            foreach ($breaks as $key=>$value){

                foreach ($value as $key2=>$value2){

                    //print_r($value2);
                    $rowReturn[] = ['title' => $value2['title'], 'timeFrom'=>$value2['timeFrom']];

                }

            }

            return $rowReturn;


        }

        public function getStartEndProgrammes ($programmes, $debug){

            //takes input from getStartAndEndProgrammes

            $items = count($programmes);

            $itemsArrayKey = $items - 1;

            $rowReturn = array();

            foreach ($programmes as $key=>$value){

                $items = null;
                $itemsArrayKey = null;

                $items = count($value);

                $itemsArrayKey = $items - 1;
    

                $programmeid = null;
                $startTime = null;
                $endTime = null;

                $programmeid = $key;

                $startTime = $value[0]['timeFrom'];

                $endTime = $value[$itemsArrayKey]['timeTo'];

                $rowReturn[] = ['programmeid'=>$programmeid, 'startTime'=>$startTime, 'endTime'=>$endTime,];


            }

            return $rowReturn;


        }

        public function showLiveProgrammes(){

            $currentTime = new DateTime('now', 'UTC');

            $q = "Select 
            
                a.`date`,
                c.`id` as `sessionid`, c.`timeFrom`, c.`timeTo` 
                from `programme` as a
                INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
                INNER JOIN `session` as c on b.`sessionid` = c.`id`
                WHERE c.`id` = '$sessionid'
                ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    return $row['programmeid'];
                }

            } else {
                

                return false;
            }






        }


        public function liveAttendance($userid, $sqlStart, $sqlEnd, $debug=false){

            $q = "SELECT b.`user_id`, a.`activity_time` 
            FROM `userActivity` as a 
            INNER JOIN `users` as b on a.`user_id` = b.`user_id` 
            WHERE (`activity_time` > '$sqlStart' AND `activity_time` < '$sqlEnd') AND b.`user_id` = '$userid'";
    
          
        
                if ($debug){
                     echo $q;
                }
    
            //echo $q;
    
            $result = $this->connection->RunQuery($q);
           
            $nRows = $result->rowCount();

            if ($debug){
                echo '<br><br>';
                echo 'liveAttendance returned ' . $nRows . ' rows';
            }
                if ($nRows > 0){
    
                    return TRUE;
                }else{
                    return FALSE;
                } 

               
    

        }

        public function liveAttendancev2($userid, $assetid, $debug=false){

            $q = "SELECT `id`, `session_id` FROM `userActivity` WHERE `user_id` = '$userid' AND `session_id` LIKE 'LIVE_ASSET_VIEW {$assetid}%%%' ORDER BY `activity_time` DESC LIMIT 1";

            if ($debug){
                echo $q;
            }

            
            //echo $q;
    
            $result = $this->connection->RunQuery($q);

            
           
            $nRows = $result->rowCount();

            if ($debug){
                echo '<br><br>';
                echo 'liveAttendancev2 returned ' . $nRows . ' rows';
            }
                if ($nRows > 0){
    
                    return TRUE;
                }else{
                    return FALSE;
                } 
    

        }

        public function returnLiveProgrammesArray($currentTime, $debug=false){

        
            if ($access = $this->programmesActiveToday($currentTime, $debug) == true){
    
    
                $access = $this->programmesActiveToday($currentTime, $debug);
            
            if ($debug){
    
                var_dump($access);
            
            }
    
            
    
            
            if ($debug){
                echo '<br/><br/>now get the start and end times<br/><br/>';
    
            }
            
            $access1 = null;
            
            $access1 = $this->getStartAndEndProgrammes($access, $debug);
            
            if ($debug){
                var_dump($access1);
                echo '<br/><br/>now get the start and end times in a single array<br/><br/>';
    
    
            }
            
            
            $access2 = null;
            
            $access2 = $this->getStartEndProgrammes($access1, $debug);
            
            if ($debug){
            
                var_dump($access2);
    
                echo '<br/><br/>does user have access to the programme<br/><br/>';
        
            }
            
            
            return $access2;
            
            }else{
            
                if ($debug){
                echo '<br/><br/>No programmes active<br/><br/>';
                }
            
                return false;
            
            
            }
    
    
    
    
        }

        


    /**
     * Close mysql connection
     */
    public function endsessionView()
    {
        $this->connection->CloseMysql();
    }

}
