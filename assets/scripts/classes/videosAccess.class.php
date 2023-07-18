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

error_reporting(E_ALL);

Class videosAccess {

	
	private $connection;

	public function __construct(){
        require_once 'DatabaseMyssqlPDOLearning.class.php';
		$this->connection = new DataBaseMysqlPDOLearning();
	}

    /**
     * get a select2 box
     *
     */

    public function select2_video_match($search)
    {
    
    $q = "Select 
    `id`, `name`
    FROM `video`
    WHERE `id` = '$search'";

    $result = $this->connection->RunQuery($q);
    $rowReturn = array();
    $x = 0;
    $nRows = $result->rowCount();
    if ($nRows > 0) {

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

          
              //note here returning an option only
            $rowReturn = array('id' => $row['id'], 'text' => $row['name']);
            //print_r($row);
        }
    
        return json_encode($rowReturn);

    } else {
        

        //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
        $rowReturn['result'] = [];
        
        return json_encode($rowReturn);
    }

}

public function select2_video_programme($search)
      {
      
      $q = "Select 
      `id`, CONCAT(`id`, ' ', `name`) as `video`
      FROM `video`
      WHERE lower(CONCAT(`id`, ' ', `name`)) LIKE lower('%{$search}%')";

      //echo $q;

      $result = $this->connection->RunQuery($q);
      $rowReturn['results'] = array();
      $x = 0;
      $nRows = $result->rowCount();
      if ($nRows > 0) {

          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $rowReturn['results'][] = array('id' => $row['id'], 'text' => $row['video']);
              //print_r($row);
          }
      
          return json_encode($rowReturn);

      } else {
          

          //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
          $rowReturn['results'] = [];
          
          return json_encode($rowReturn);
      }

  }

public function sanitiseGET ($data) {

    $dataSanitised = array();

    foreach ($data as $key=>$value){

        $sanitisedValue = trim($value);
        //$sanitisedValue = addslashes($sanitisedValue);
        //$sanitisedValue = htmlspecialchars($sanitisedValue);
        //consider htmlentitydecode here, this converts back so &amp to &, special chars & to &amp 
        $dataSanitised[$key] = $sanitisedValue;

    }


    return $dataSanitised;


}

public function insert_copied_records_with_video_id($name, $description, $user_id){

    //q insert the row in video

    $q = "insert into `video` (`name`, `url`, `description`, `active`, `split`, `author`) VALUES ('$name', '123', '$description', '2', '1', '$user_id')";

      echo $q;

      $result = $this->connection->RunQuery($q);
      

      if ($result) {

        return $this->connection->conn->lastInsertId(); 

      } else {
          

          
          return null;
      }

}

public function insert_copied_records_with_video_id_v2($name, $description, $user_id, $supercategory){

    //q insert the row in video

    $q = "insert into `video` (`name`, `url`, `description`, `active`, `split`, `author`, `superCategory`, `editor`, `recorder`) VALUES ('$name', '123', '$description', '2', '1', '$user_id', '$supercategory', '1', '9')";

      echo $q;

      $result = $this->connection->RunQuery($q);
      

      if ($result) {

        return $this->connection->conn->lastInsertId(); 

      } else {
          

          
          return null;
      }

}

public function createChapter($videoid){

    //q insert the row in video

    $q = "INSERT INTO `chapter`(`number`, `name`, `timeFrom`, `timeTo`, `video_id`, `description`) 
    VALUES ('1','Introduction','0','20',$videoid, '')";

      echo $q;

      $result = $this->connection->RunQuery($q);
      

      if ($result) {

        return $this->connection->conn->lastInsertId(); 

      } else {
          

          
          return null;
      }

}

public function linkTags($chapterid, $tagGIEQsDigital){

    //q insert the row in video

    $q = "INSERT INTO `chapterTag`(`tags_id`, `chapter_id`) 
    VALUES ('$tagGIEQsDigital','$chapterid');";

      echo $q;

      $result = $this->connection->RunQuery($q);
      

      if ($result) {

       

        return $this->connection->conn->lastInsertId(); 

        

      } else {
          

          
          return null;
      }

}

public function checkVimeoidPresent($videoid, $past=null, $current=null){

    //q insert the row in video

    $q = "SELECT `url` FROM `video` WHERE `id` = '$videoid'";

      //echo $q;

      $result = $this->connection->RunQuery($q);
      

      $nRows = $result->rowCount();
      
      if ($nRows == 1) {

       

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $url_video = $row['url'];
              //print_r($row);
          }

        if ($url_video == '123'){

            return false;
        }else{

            return true;
        }


      } else {
          

          
          return false;
      }

}

public function checkVimeoidPresentPublic($videoid, $past=null, $current=null, $debug=false){

    //q insert the row in video

    $q = "SELECT `url` FROM `video` WHERE `id` = '$videoid'";

      //echo $q;

      $result = $this->connection->RunQuery($q);
      

      $nRows = $result->rowCount();
      
      if ($nRows == 1) {

       

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            //would show the url
            //now dependent on time

            

            

                $url_video = $row['url']; 


          
            
            
              //print_r($row);
          }

        if ($url_video == '123'){

            return false;

            if ($debug){

                echo 'video is default, not displaying';
            }
        }else{
            
            if ($current){

                $highlight = 1;

                if ($debug){

                    echo 'setting highlight to 1';
                }

            }elseif ($past){

                $highlight = 0;

                if ($debug){

                    echo 'setting highlight to 0';
                }
                
            }else{

                $highlight = 2;

                if ($debug){

                    echo 'setting highlight to 2';
                }

            }

            if ($highlight == 0){

                if ($debug){

                    echo 'highlight is 0, this should be sjowing a video';
                }

            return true;

             }
        }


      } else {
          

          
          return false;
      }

}

public function generateVideoRegistrationOptions()
            {
            

            $q = "Select a.`id`, a.`name`
            FROM `video` as a
            ";

            //echo $q . '<br><br>';

			$rowReturn = [];

            $result = $this->connection->RunQuery($q);
            
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn[] = $row;


				}

				foreach ($rowReturn as $key=>$value){

					echo "<option value='{$value['id']}'>{$value['id']} - {$value['name']}</option>";

				}

            } else {
                

                return false;
            }

		}
	
    /**
     * Close mysql connection
     */
	public function endvideosAccess(){
		$this->connection->CloseMysql();
	}

}