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

class programmeView
{

    

    public function __construct()
    {
        $this->connection = new DataBaseMysqlPDO();
    }  
        
        
    public function getProgrammes($programmeid){

        //EDITED TODO CHECK LEFT OUTER JOIN
        $q = "Select 
        a.`id` as `programmeid`, a.`date`, a.`title` as `programmeTitle`
        from `programme` as a
        WHERE a.`id` = $programmeid
        ORDER BY a.`id` ASC
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

    public function getSessions($programmeid){

       
        $q = "Select 
        a.`id` as `programmeid`, a.`date`, a.`title` as `programmeTitle`,
        c.`id` as `sessionid`, c.`timeFrom`, c.`timeTo`, c.`title` as `sessionTitle`, c.`subtitle` as `sessionSubtitle`, c.`description` as `sessionDescription`
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

                $rowReturn[] = array_map('utf8_encode', $row);
            }
        
            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            $rowReturn = [];
            
            return $rowReturn;
        }


    }

    public function getSessionTimeSpecific($programmeid, $timeFrom){

       
        $q = "Select 
        a.`id` as `programmeid`, a.`date`, a.`title` as `programmeTitle`,
        c.`id` as `sessionid`, c.`timeFrom`, c.`timeTo`, c.`title` as `sessionTitle`, c.`subtitle` as `sessionSubtitle`, c.`description` as `sessionDescription`
        from `programme` as a
        INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
        INNER JOIN `session` as c on b.`sessionid` = c.`id`
        WHERE a.`id` = '$programmeid'
        AND c.`timeFrom` = '$timeFrom'
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
            $rowReturn = false;
            
            return $rowReturn;
        }


    }

        public function generateViewGIEQSmedical()
            {
            
                //EDITED TODO CHECK LEFT OUTER JOIN
            $q = "Select 
            
            a.`id` as `programmeid`, a.`date`, a.`title` as `programmeTitle`,
            c.`id` as `sessionid`, c.`timeFrom`, c.`timeTo`, c.`title` as `sessionTitle`, c.`subtitle` as `sessionSubtitle`, c.`description` as `sessionDescription`
            from `programme` as a
            INNER JOIN `programmeOrder` as b on a.`id` = b.`programmeid` 
            INNER JOIN `session` as c on b.`sessionid` = c.`id`
            ORDER BY b.`programmeid`, c.`timeFrom` ASC
            
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

/**
     * Close mysql connection
     */
    public function endprogrammeView()
    {
        $this->connection->CloseMysql();
    }

}