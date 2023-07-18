<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 5-07-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */

 //error_reporting(E_ALL);
/*  var_dump($_SERVER["DOCUMENT_ROOT"]."/myFolder/*");
 var_dump(BASE_URI);
require_once 'DataBaseMysqlPDO.class.php'; */

Class usersSocial {

	
	private $connection;

	public function __construct(){
		require_once 'DataBaseMysqlPDO.class.php';
		$this->connection = new DataBaseMysqlPDOLearning();
    }
    
    public function getComments($video_id){

        $q = "SELECT `user_id`, `comment`, `created` FROM `usersCommentsVideo` WHERE `video_id` = '$video_id' ORDER BY `created` ASC";
        
        $result = $this->connection->RunQuery($q);
        
        $returnArray = [];
        $x=0;
        
        $nRows = $result->rowCount();
        if ($nRows > 0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $returnArray[$x]['comment'] = $row['comment'];
                $returnArray[$x]['user_id'] = $row['user_id'];
                $returnArray[$x]['created'] = $row['created'];
                $x++;
            }
            return $returnArray;
        }else{
        
            return null;
        }
        
        
        
        
        }
    
    public function countViews($video_id){

        $q = "SELECT DISTINCT count(`user_id`) AS `count` FROM `usersViewsVideo` WHERE `video_id` = '$video_id'";

        $result = $this->connection->RunQuery($q);

        if ($result){
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$count = $row['count'];
        }
        return $count;
        }else{

            return 0;
        }




    }

    public function countFavourites($video_id){

        $q = "SELECT DISTINCT count(`user_id`) AS `count` FROM `usersFavouriteVideo` WHERE `video_id` = '$video_id'";

        $result = $this->connection->RunQuery($q);

        $nRows = $result->rowCount();
		if ($nRows > 0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $count = $row['count'];
            }
            return $count;
        }else{
    
            return '0';
        }




	}
	
	public function getAllFavourites($user_id){

        $q = "SELECT `video_id` FROM `usersFavouriteVideo` WHERE `user_id` = '$user_id' ORDER BY `id` DESC";

        $result = $this->connection->RunQuery($q);

		$y = 0;
		$videosRequired = [];
		$nRows = $result->rowCount();
		
		if ($nRows > 0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
				$videosRequired[] = $row['video_id'];
				$y++;
            }
            return $videosRequired;
        }else{
    
            return null;
        }




    }

    public function countLikes($video_id){

        $q = "SELECT DISTINCT count(`user_id`) AS `count` FROM `usersLikeVideo` WHERE `video_id` = '$video_id'";

        $result = $this->connection->RunQuery($q);
		$nRows = $result->rowCount();
		if ($nRows > 0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $count = $row['count'];
            }
            return $count;
        }else{
    
            return '0';
        }
    
	}
	
	public function checkLessFiveComments($user_id, $video_id){
		$result = $this->connection->RunQuery("Select `id` from `usersCommentsVideo` where `user_id` = '$user_id' AND `video_id` = '$video_id' ");
		$nRows = $result->rowCount();
			if ($nRows > 5){
				return FALSE;
			}else{
				return TRUE;
			}
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_usersFavouriteVideo($user_id,$video_id){
		$this->user_id = $user_id;
		$this->video_id = $video_id;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from usersFavouriteVideo where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->user_id = $row["user_id"];
			$this->video_id = $row["video_id"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `usersFavouriteVideo` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["user_id"] = $row["user_id"];
			$rowReturn[$x]["video_id"] = $row["video_id"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Return_row($key){
$q = "Select * from `usersFavouriteVideo` WHERE `id` = $key";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["user_id"] = $row["user_id"];
			$rowReturn[$x]["video_id"] = $row["video_id"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `usersFavouriteVideo` LIMIT $x, $y";
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

    /**
     * Checks if the specified record exists
     *
     * @param key_table_type $key_row
     *
     */
	public function matchRecord($key_row){
		$result = $this->connection->RunQuery("Select * from `usersFavouriteVideo` where `id` = '$key_row' ");
		$nRows = $result->rowCount();
			if ($nRows == 1){
				return TRUE;
			}else{
				return FALSE;
			}
    }
    
    public function matchRecord2way($user_id, $video_id){
		$result = $this->connection->RunQuery("Select * from `usersFavouriteVideo` where `user_id` = '$user_id' AND `video_id` = '$video_id' ");
		$nRows = $result->rowCount();
			if ($nRows > 0){
				return TRUE;
			}else{
				return FALSE;
			}
	}

    /**
		* Return the number of rows
		*/
	public function numberOfRows(){
		return $this->connection->TotalOfRows('usersFavouriteVideo');
	}

    /**
		* Insert statement using PDO
		*/
 public function prepareStatementPDO (){ 
 //need to only update those which are set 
 $ov = get_object_vars($this); 
if ($ov['connection'] != ''){
			unset($ov['connection']);
		} 
if ($ov['id'] != ''){
			unset($ov['id']);
		} 
$ovMod = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '`' . $key . '`';

				$ovMod[$key] = $value;
			}

			}
$ovMod2 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '' . $key . '';

				$ovMod2[$key] = $value;
			}

		} 
$ovMod3 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = ':' . $key;

				$ovMod3[$key] = $value;
			}

		} 
foreach ($ovMod as $key => $value) {

            $value = addslashes($value);
			$value = "'$value'";
			$updates[] = "$value";

		} 
$implodeArray = implode(', ', $updates); 
//get number of terms in update
					//need only the keys first

					$keys = implode(", ", array_keys($ovMod));
					$keys2 = implode(", ", array_keys($ovMod3));
			
//get number of keys

				$numberOfTerms = count($ovMod);
		
//echo $numberOfTerms;

		$termsToInsert = ''; 
$x=0;

		foreach ($ovMod as $key=>$value){

			$termsToInsert .= ( $x !== ($numberOfTerms -1) ) ? "? ," : " ?";

			$x++;

		} 
$q = "INSERT INTO `usersFavouriteVideo` ($keys) VALUES ($keys2)";
		
 $stmt = $this->connection->prepare($q); 
$stmt->execute($ovMod3); 
return $this->connection->conn->lastInsertId(); 
	}

    /**
		* Update statement using PDO
		*/
 public function prepareStatementPDOUpdate (){ 
 //need to only update those which are set 
 $ov = get_object_vars($this); 
if ($ov['connection'] != ''){
			unset($ov['connection']);
		} 
if ($ov['id'] != ''){
			unset($ov['id']);
		} 
if ($ov['updated'] != ''){
			unset($ov['updated']);
		} 
$ovMod = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '`' . $key . '`';

				$ovMod[$key] = $value;
			}

			}
$ovMod2 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '' . $key . '';

				$ovMod2[$key] = $value;
			}

		} 
$ovMod3 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = ':' . $key;

				$ovMod3[$key] = $value;
			}

		} 
foreach ($ovMod as $key => $value) {

            $value = addslashes($value);
			$value = "'$value'";
			$updates[] = "$key=$value";

		} 
$implodeArray = implode(', ', $updates); 
//get number of terms in update
					//need only the keys first

					$keys = implode(", ", array_keys($ovMod));
					$keys2 = implode(", ", array_keys($ovMod3));
			
//get number of keys

				$numberOfTerms = count($ovMod);
		
//echo $numberOfTerms;

		$termsToInsert = ''; 
$x=0;

		foreach ($ovMod as $key=>$value){

			$termsToInsert .= ( $x !== ($numberOfTerms -1) ) ? "? ," : " ?";

			$x++;

		} 
$q = "UPDATE `usersFavouriteVideo` SET $implodeArray WHERE `id` = '$this->id'";

		
 $stmt = $this->connection->RunQuery($q); 
 return $stmt->rowCount(); 
	}


    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$result = $this->connection->RunQuery("DELETE FROM `usersFavouriteVideo` WHERE `id` = $key_row");
		return $result->rowCount();
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT id from usersFavouriteVideo order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["id"];
				$i++;
			}
	return $keys;
	}

	public function select2_video_match($search)
      {
      
      $q = "Select 
            
      `id`, `title`, `firstname`, `surname`
      FROM `faculty`
	  WHERE `id` = '$search'";
	  
	  echo $q;

      $result = $this->connection->RunQuery($q);
      $rowReturn = array();
      $x = 0;
      $nRows = $result->rowCount();
      if ($nRows > 0) {

          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            
                //note here returning an option only
              $rowReturn = array('id' => $row['id'], 'text' => $row['title'] . ' ' . $row['firstname']  . ' ' . $row['surname']);
              //print_r($row);
          }
      
          return json_encode($rowReturn);

      } else {
          

          //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
          $rowReturn['result'] = [];
          
          return json_encode($rowReturn);
      }

  }

	/**
	 * @return id - int(11)
	 */
	public function getid(){
		return $this->id;
	}

	/**
	 * @return user_id - int(11)
	 */
	public function getuser_id(){
		return $this->user_id;
	}

	/**
	 * @return video_id - int(11)
	 */
	public function getvideo_id(){
		return $this->video_id;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setuser_id($user_id){
		$this->user_id = $user_id;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setvideo_id($video_id){
		$this->video_id = $video_id;
	}

    /**
     * Close mysql connection
     */
	public function endusersSocial(){
		$this->connection->CloseMysql();
	}

}