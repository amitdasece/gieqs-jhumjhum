<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 1-06-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */



if ($_SESSION['debug'] == true){

error_reporting(E_ALL);

}else{

error_reporting(0);
	
}

//require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');


Class courseManager {

	
    private $connection;
    private $sessionView;

	public function __construct(){
        require_once 'DatabaseMyssqlPDOLearning.class.php';
        $this->connection = new DataBaseMysqlPDOLearning();

       


            require_once(BASE_URI . '/assets/scripts/classes/sessionView.class.php');
            $this->sessionView = new sessionView();
            require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');
            $this->programmeView = new programmeView;


       

    }
    
    public function returnAllCourses($type, $debug=false){

        $q = "Select 
      `id`, `name`, `description`, `cost`, `linked_blog`
      FROM `assets_paid`
      WHERE (`asset_type` = '$type')
      AND (`advertise_for_purchase` IS NULL OR `advertise_for_purchase` = '1')
      ORDER BY `id` DESC";

      if ($debug){
      echo $q;
      }

      $result = $this->connection->RunQuery($q);
      $rowReturn = array();
      $x = 0;
      $nRows = $result->rowCount();
      if ($nRows > 0) {

          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $rowReturn[] = $row;

            //$rowReturn['results'][] = array('id' => $row['id'], 'text' => $row['video']);
              //print_r($row);
          }
      
          return $rowReturn;

      } else {
          

          //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
          $rowReturn = [];
          
          return $rowReturn;
      }


    }

    public function returnAllCoursesThumbnails( $debug=false){

      $q = "Select 
    `linked_blog`
    FROM `assets_paid`
    WHERE (`advertise_for_purchase` IS NULL OR `advertise_for_purchase` = '1')
    ORDER BY `id` DESC";

    if ($debug){
    echo $q;
    }

    $result = $this->connection->RunQuery($q);
    $rowReturn = array();
    $x = 0;
    $nRows = $result->rowCount();
    if ($nRows > 0) {

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

          $rowReturn[$x] = $row['linked_blog'];

          //$rowReturn['results'][] = array('id' => $row['id'], 'text' => $row['video']);
            //print_r($row);
            $x++;
        }
    
        return $rowReturn;

    } else {
        

        //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
        $rowReturn = [];
        
        return $rowReturn;
    }


  }


    //add a column to assets_paid for course_category
    //use superCategory from values table
    //generate the html for the navigation box based on these and some other selected elements


    public function get_emails_course_assetid($assetid, $debug=false){

        $q = "Select 
      `id`, `name`, `description`, `path`, `send_date`, `time_send`
      FROM `assets_course`
      WHERE `assetid` = '$assetid ' AND`asset_type` = '1'";

    if ($debug){
        echo $q;

    }

      $result = $this->connection->RunQuery($q);
      $rowReturn = array();
      $x = 0;
      $nRows = $result->rowCount();
      if ($nRows > 0) {

          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $rowReturn[] = $row;

            //$rowReturn['results'][] = array('id' => $row['id'], 'text' => $row['video']);
              //print_r($row);
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
	public function endcourseManager (){
		$this->connection->CloseMysql();
	}

}