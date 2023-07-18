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
            e.`id` as `sessionItemid`, e.`timeFrom` as `sessionItemTimeFrom`, e.`timeTo` as `sessionItemTimeTo`, e.`title` as `sessionItemTitle`, e.`description` as `sessionItemDescription`, e.`faculty`, e.`live`
            from `programme` as a
            INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
            INNER JOIN `session` as c on b.`sessionid` = c.`id`
            LEFT OUTER JOIN `sessionOrder` as d on c.`id` = d.`sessionid`
            LEFT OUTER JOIN `sessionItem` as e on d.`sessionItemid` = e.`id`
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

        


    /**
     * Close mysql connection
     */
    public function endsessionView()
    {
        $this->connection->CloseMysql();
    }

}
