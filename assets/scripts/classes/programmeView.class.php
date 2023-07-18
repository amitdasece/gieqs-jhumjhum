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

    public function getSessionsShort($programmeid){

       
        $q = "Select 
        c.`id` as `sessionid`
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


    public function getVideoURL($sessionid){

        $q = "SELECT a.`id` as `programmeid`, a.`date`,
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
        LIMIT 1";

        //echo $q;

        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows == 1) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $videoid = $row['url_video'];
            }

            return $videoid;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            $rowReturn = false;
            
            return $rowReturn;
        }



    }

    public function getVideoURLArray($sessionid){

        $q = "SELECT a.`id` as `programmeid`, a.`date`,
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
        GROUP BY e.`url_video`
        ORDER BY e.`timeFrom` ASC";

    //echo $q;

        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['url_video'];
                $x++;
            }

            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            $rowReturn = false;
            
            return $rowReturn;
        }



    }

    public function getProgrammeVideo($videoid){

        $q = "SELECT a.`id` as `programmeid`, a.`date`,
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
        WHERE e.`url_video` = '$videoid'
        GROUP BY a.`id`
        ORDER BY e.`timeFrom` ASC";

    //echo $q;

        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['programmeid'];
                $x++;
            }

            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            $rowReturn = false;
            
            return $rowReturn;
        }



    }


    //NEW VERSION OF ABOVE WITH NO LIMIT FOR SESSIONITEMS

    public function getVideoURLAll($sessionid){

        $q = "SELECT a.`id` as `programmeid`, a.`date`,
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
        ORDER BY e.`timeFrom` ASC";

        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[] = $row['url_video'];
            }

            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            $rowReturn = false;
            
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