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
 * programme reports joiner
 * 
 */
require_once 'DataBaseMysqlPDO.class.php';

class programmeReports
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

      public function generateReportJSON($facultyid)
            {
            
            $q = "Select a.`id` as `programmeid`, a.`date`, 
            c.`id` as `sessionid`, c.`timeFrom`, c.`timeTo`, c.`title` as `sessionTitle`, c.`subtitle` as `sessionSubtitle`, c.`description` as `sessionDescription`, 
            e.`id` as `sessionItemid`, e.`title` as `sessionItemTitle`, e.`description` as `sessionItemDescription`, e.`faculty`, e.`live` 
            from `programme` as a 
            INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
            INNER JOIN `session` as c on b.`sessionid` = c.`id` 
            INNER JOIN `sessionOrder` as d on c.`id` = d.`sessionid` 
            INNER JOIN `sessionItem` as e on d.`sessionItemid` = e.`id` 
            INNER JOIN `sessionModerator` as f on c.`id` = f. `sessionid` 
            WHERE e.`faculty` = $facultyid 
            GROUP BY c.`id` 
            ORDER BY a.`date` ASC, c.`timeFrom` ASC
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

        public function returnLectures ($facultyid){

            $q = "c.`timeFrom`, c.`timeTo`, c.`title` as `sessionTitle`,
                e.`title` as `sessionItemTitle`, e.`description` as `sessionItemDescription`, e.`timeFrom` as `sessiontimeFrom`, e.`timeTo` as `sessiontimeTo`, e.`live`
                `session` as c
                INNER JOIN `sessionOrder` as d on c.`id` = d.`sessionid` 
                INNER JOIN `sessionItem` as e on d.`sessionItemid` = e.`id` 
                WHERE (e.`faculty` = $facultyid) AND (e.`live` = 0)
                GROUP BY c.`id` 
                ORDER BY a.`date` ASC, c.`timeFrom` ASC";

        }

        public function returnModeration ($facultyid, $programmeids)
        {
            $programmestring = implode("' OR g.`programmeid` = '", $programmeids);



            $q = "SELECT
            h.`id` AS `programmeid`,
            h.`date`,
            c.`id`,
            c.`timeFrom`,
            c.`timeTo`,
            c.`title` AS `sessionTitle`,
            c.`description` AS `sessionDescription`,
            e.`facultyid`
        FROM
            `session` AS c
        INNER JOIN `sessionModerator` AS e
        ON
            c.`id` = e.`sessionid`
        INNER JOIN `programmeOrder` AS g
        ON
            c.`id` = g.`sessionid`
        INNER JOIN `programme` AS h
        ON
            g.`programmeid` = h.`id`
        WHERE
            (e.`facultyid` = '$facultyid') AND
                (g.`programmeid` = '$programmestring') 
            
        ORDER BY
            h.`date` ASC,
            c.`timeFrom` ASC";

            //echo $q;

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

        public function generateReport($facultyid)
            {
            
                //report card per faculty
                /* $q = "Select a.`id` as `programmeid`, a.`date`, 
                c.`timeFrom`, c.`timeTo`, c.`title` as `sessionTitle`, c.`description` as `sessionDescription`,
                e.`title` as `sessionItemTitle`, e.`description` as `sessionItemDescription`, e.`timeFrom` as `sessiontimeFrom`, e.`timeTo` as `sessiontimeTo`, e.`live`, f.`facultyid` 
                from `programme` as a 
                INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
                INNER JOIN `session` as c on b.`sessionid` = c.`id` 
                INNER JOIN `sessionOrder` as d on c.`id` = d.`sessionid` 
                INNER JOIN `sessionItem` as e on d.`sessionItemid` = e.`id` 
                INNER JOIN `sessionModerator` as f on c.`id` = f.`sessionid` 
                WHERE ((e.`faculty` = $facultyid) OR (f.`facultyid` = $facultyid))
                GROUP BY c.`id` 
                ORDER BY a.`date` ASC, c.`timeFrom` ASC";
 */

$q = "Select h.`id` as `programmeid`, h.`date`, c.`timeFrom`, c.`timeTo`, c.`title` as `sessionTitle`, c.`description`
as `sessionDescription`, e.`title` as `sessionItemTitle`, e.`description` as `sessionItemDescription`, e.`timeFrom` as
`sessiontimeFrom`, e.`timeTo` as `sessiontimeTo`, e.`live`, e.`faculty` FROM `session` as c INNER JOIN `sessionOrder` as
d on c.`id` = d.`sessionid` INNER JOIN `sessionItem` as e on d.`sessionItemid` = e.`id` INNER JOIN `programmeOrder` as g
on c.`id` = g.`sessionid` INNER JOIN `programme` as h on g.`programmeid` = h.`id` WHERE (e.`faculty` = $facultyid) AND
(g.`programmeid` = '47' OR g.`programmeid` = '48' OR g.`programmeid` = '49' OR g.`programmeid` = '50') ORDER BY h.`date`
ASC, c.`timeFrom` ASC";



/* $q = "Select h.`id` as `programmeid`, h.`date`, 
                c.`timeFrom`, c.`timeTo`, c.`title` as `sessionTitle`, c.`description` as `sessionDescription`,
                e.`title` as `sessionItemTitle`, e.`description` as `sessionItemDescription`, e.`timeFrom` as `sessiontimeFrom`, e.`timeTo` as `sessiontimeTo`, e.`live`, f.`facultyid` 
                FROM `session` as c 
                INNER JOIN `sessionOrder` as d on c.`id` = d.`sessionid` 
                INNER JOIN `sessionItem` as e on d.`sessionItemid` = e.`id` 
                INNER JOIN `sessionModerator` as f on c.`id` = f.`sessionid` 
                INNER JOIN `programmeOrder` as g on c.`id` = g.`programmeid`
                INNER JOIN `programme` as h on g.`programmeid` = h.`id`
                WHERE ((e.`faculty` = $facultyid) OR (f.`facultyid` = $facultyid))
                AND (g.`programmeid` = '47' OR g.`programmeid` = '48' OR g.`programmeid` = '49' OR g.`programmeid` = '50')
                GROUP BY f.`id` 
                ORDER BY h.`date` ASC, c.`timeFrom` ASC"; */

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

        public function generateReportv2($facultyid, $programmeids)
        {
        
            $programmestring = implode("' OR g.`programmeid` = '", $programmeids);

            //report card per faculty

            $q = "Select h.`id` as `programmeid`, h.`date`, c.`timeFrom`, c.`timeTo`, c.`title` as `sessionTitle`, c.`description`
            as `sessionDescription`, e.`title` as `sessionItemTitle`, e.`description` as `sessionItemDescription`, e.`timeFrom` as
            `sessiontimeFrom`, e.`timeTo` as `sessiontimeTo`, e.`live`, e.`faculty` FROM `session` as c INNER JOIN `sessionOrder` as
            d on c.`id` = d.`sessionid` INNER JOIN `sessionItem` as e on d.`sessionItemid` = e.`id` INNER JOIN `programmeOrder` as g
            on c.`id` = g.`sessionid` INNER JOIN `programme` as h on g.`programmeid` = h.`id` WHERE (e.`faculty` = $facultyid) AND
            (g.`programmeid` = '$programmestring') ORDER BY h.`date`
            ASC, c.`timeFrom` ASC";

            /* $q = "Select a.`id` as `programmeid`, a.`date`, 
            c.`id` as `sessionid`, c.`timeFrom`, c.`timeTo`, c.`title` as `sessionTitle`, c.`description` as `sessionDescription`,
            e.`id` as `sessionitemid`, e.`title` as `sessionItemTitle`, e.`description` as `sessionItemDescription`, e.`timeFrom` as `sessiontimeFrom`, e.`timeTo` as `sessiontimeTo`, e.`live`, f.`facultyid` 
            from `programme` as a 
            INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
            INNER JOIN `session` as c on b.`sessionid` = c.`id` 
            INNER JOIN `sessionOrder` as d on c.`id` = d.`sessionid` 
            INNER JOIN `sessionItem` as e on d.`sessionItemid` = e.`id` 
            INNER JOIN `sessionModerator` as f on c.`id` = f.`sessionid` 
            WHERE 
            (a.`id` = '$programmestring')
            AND ((e.`faculty` = $facultyid) OR (f.`facultyid` = $facultyid))
            GROUP BY e.`id`
            ORDER BY a.`date` ASC, e.`timeFrom` ASC";
 */
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

    public function generateReportv3($programmeids)
    {
    
        $programmestring = implode("' OR a.`id` = '", $programmeids);

        //report card per faculty
        $q = "Select a.`id` as `programmeid`, a.`date`, 
        c.`id` as `sessionid`, c.`timeFrom`, c.`timeTo`, c.`title` as `sessionTitle`, c.`description` as `sessionDescription`,
        e.`id` as `sessionitemid`, e.`title` as `sessionItemTitle`, e.`description` as `sessionItemDescription`, e.`timeFrom` as `sessiontimeFrom`, e.`timeTo` as `sessiontimeTo`, e.`live`, f.`facultyid` 
        from `programme` as a 
        INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
        INNER JOIN `session` as c on b.`sessionid` = c.`id` 
        INNER JOIN `sessionOrder` as d on c.`id` = d.`sessionid` 
        INNER JOIN `sessionItem` as e on d.`sessionItemid` = e.`id` 
        INNER JOIN `sessionModerator` as f on c.`id` = f.`sessionid` 
        WHERE 
        (a.`id` = '$programmestring')
        ORDER BY a.`date` ASC, e.`timeFrom` ASC";

    echo $q . '<br><br>';



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

        public function generateModeratorsForSession($sessionid)
            {
            
                
                $q = "Select c.`title`, c.`firstname`, c.`surname`
            from `session` as a 
            INNER JOIN `sessionModerator` as b on a.`id` = b.`sessionid` 
            INNER JOIN `faculty` as c on b.`facultyid` = c.`id`
            WHERE a.`id` = $sessionid 
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

        public function generateSpeakersForSessionAll($sessionid)
            {
            
                
                $q = "Select d.`title`, d.`firstname`, d.`surname`
                from `session` as a 
                INNER JOIN `sessionOrder` as b on a.`id` = b.`sessionid` 
                INNER JOIN `sessionItem` as c on b.`sessionItemid` = c.`id` 
                INNER JOIN `faculty` as d on c.`faculty` = d.`id`
                WHERE a.`id` = $sessionid
                ORDER BY d.`surname` ASC
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

        public function generateSpeakersForSessionLive($sessionid)
            {
            
                
                $q = "Select d.`title`, d.`firstname`, d.`surname`
                from `session` as a 
                INNER JOIN `sessionOrder` as b on a.`id` = b.`sessionid` 
                INNER JOIN `sessionItem` as c on b.`sessionItemid` = c.`id` 
                INNER JOIN `faculty` as d on c.`faculty` = d.`id`
                WHERE a.`id` = $sessionid AND c.`live` = 1
                ORDER BY d.`surname` ASC
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

        public function generateSpeakersForSession($sessionid)
            {
            
                
                $q = "Select d.`title`, d.`firstname`, d.`surname`
                from `session` as a 
                INNER JOIN `sessionOrder` as b on a.`id` = b.`sessionid` 
                INNER JOIN `sessionItem` as c on b.`sessionItemid` = c.`id` 
                INNER JOIN `faculty` as d on c.`faculty` = d.`id`
                WHERE a.`id` = $sessionid AND c.`live` <> 1
                ORDER BY d.`surname` ASC
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
        public function generateLectureCount($facultyid)
            {
            
                
                $q = "Select COUNT(c.`id`) as lectureCount
                from `session` as a 
                INNER JOIN `sessionOrder` as b on a.`id` = b.`sessionid` 
                INNER JOIN `sessionItem` as c on b.`sessionItemid` = c.`id` 
                INNER JOIN `faculty` as d on c.`faculty` = d.`id`
                INNER JOIN `programmeOrder` as e on a.`id` = e.`sessionid`
                WHERE d.`id` = $facultyid AND c.`live` <> 1 AND (e.`programmeid` = '47' OR e.`programmeid` = '48' OR e.`programmeid` = '49' OR e.`programmeid` = '50')
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $count = $row['lectureCount'];
                }
            
                return $count;

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn = [];
                
                return $rowReturn;
            }

        }

        public function generateLiveCount($facultyid)
            {
            
                
                $q = "Select COUNT(c.`id`) as lectureCount
                from `session` as a 
                INNER JOIN `sessionOrder` as b on a.`id` = b.`sessionid` 
                INNER JOIN `sessionItem` as c on b.`sessionItemid` = c.`id` 
                INNER JOIN `faculty` as d on c.`faculty` = d.`id`
                INNER JOIN `programmeOrder` as e on a.`id` = e.`sessionid`
                WHERE d.`id` = $facultyid AND c.`live` = 1 AND (e.`programmeid` = '47' OR e.`programmeid` = '48' OR e.`programmeid` = '49' OR e.`programmeid` = '50')
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $count = $row['lectureCount'];
                }
            
                return $count;

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn = [];
                
                return $rowReturn;
            }

        }

        public function generateModeratorCount($facultyid)
            {
            
                
                $q = "Select COUNT(a.`id`) as ModeratorCount
            from `session` as a 
            INNER JOIN `sessionModerator` as b on a.`id` = b.`sessionid` 
            INNER JOIN `faculty` as c on b.`facultyid` = c.`id`
            INNER JOIN `programmeOrder` as d on a.`id` = d.`sessionid`
            WHERE c.`id` = $facultyid AND (d.`programmeid` = '47' OR d.`programmeid` = '48' OR d.`programmeid` = '49' OR d.`programmeid` = '50')
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $count = $row['ModeratorCount'];
                }
            
                return $count;

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn = [];
                
                return $rowReturn;
            }

        }

        public function Load_records_faculty_tasks_limit_json_datatables($y, $x = 0)
            {

                //execute the three queries

            $q = "Select * from `faculty` LIMIT $x, $y";
            $result = $this->connection->RunQuery($q);
            $rowReturn = array();

            $x = 0;
            $nRows = $result->rowCount();
            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $start = array_map('utf8_encode', $row);
                    $start['countModerator'] = $this->generateModeratorCount($row['id']);
                    $start['countLive'] = $this->generateLiveCount($row['id']);
                    $start['countLecture'] = $this->generateLectureCount($row['id']);

                    $rowReturn['data'][] = $start;
                }
            
                return json_encode($rowReturn);

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn['data'] = [];
                
                return json_encode($rowReturn);
            }

        }

        public function LoadAllFaculty(){
            $q = "Select * from `faculty` ORDER BY `surname` ASC";
            //echo $q;
                    $result = $this->connection->RunQuery($q);
                                        $rowReturn = array();
                                    $x = 0;
                                    $nRows = $result->rowCount();
                                    if ($nRows > 0){
            
                                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        $rowReturn[$x] = $row["id"];
                        
                    $x++;		}return $rowReturn;}
            
                        else{return FALSE;
                        }
                        
                }

                public function getVimeoURLProgramme($programmeid)
            {
            
                
                $q = "Select `url_vimeo` 
            from `programme`
            WHERE `id` = '$programmeid' 
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $url = $row['url_vimeo'];
                }
            
                return $url;

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn = [];
                
                return $rowReturn;
            }

        }


        public function getSessionsProgramme($programmeid)
            {
            

                
                $q = "Select c.`id` 
                from `programme` as a 
                INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
                INNER JOIN `session` as c on b.`sessionid` = c.`id` 
                WHERE a.`id` = '$programmeid' 
                ORDER BY c.`timeFrom` ASC
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn[] = $row['id'];
                }
            
                return $rowReturn;

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn = [];
                
                return $rowReturn;
            }

        }
        
        
        

        


    /**
     * Close mysql connection
     */
    public function endprogrammeReports()
    {
        $this->connection->CloseMysql();
    }

}