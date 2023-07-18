<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 1-12-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */

if (session_status() == PHP_SESSION_NONE) { //if there's no session_start yet...
  session_start(); //do this
}

if ($_SESSION['debug'] == true){

error_reporting(E_ALL);

}else{

error_reporting(0);

}
//error_reporting(E_ALL);


//require_once 'DataBaseMysqlPDO.class.php';

Class emailLink {


	private $connection;

	public function __construct(){
        require_once 'DatabaseMyssqlPDOLearning.class.php';
            $this->connection = new DataBaseMysqlPDOLearning();
    
           
    
            //$this->connection = new DataBaseMysqlPDO();
        }

    public function getEmailContents($email_id, $debug=false){

       
            

            $q = "Select b.`id`, b.`text`, b.`img`, b.`video`, b.`display_order`
            FROM `emails` as a
            INNER JOIN `emailContent` as b ON a.`id` = b.`email_id`
            WHERE a.`id` = '$email_id'
            ORDER BY CAST(b.`display_order` AS SIGNED) ASC
            ";

            if ($debug){

            
            echo $q . '<br><br>';


            }


            $result = $this->connection->RunQuery($q);
            
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn[] = $row;


				}

				return $rowReturn;

            } else {
                

                return false;
            }

        


    }

    public function getNextDisplayOrder($email_id, $debug=false){

       
            

        $q = "Select b.`display_order`
        FROM `emails` as a
        INNER JOIN `emailContent` as b ON a.`id` = b.`email_id`
        WHERE a.`id` = '$email_id'
        ORDER BY CAST(b.`display_order` AS SIGNED) DESC
        LIMIT 1
        ";

        if ($debug){

        
        echo $q . '<br><br>';


        }


        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows == 1) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $latest = $row['display_order'];


            }

            return intval($latest) + 1;

        } else {
            

            return false;
        }

    


}

public function getActiveEmails($debug=false){

       
            

    $q = "Select a.`id`
    FROM `emails` as a
    WHERE a.`active` = 1
    ";

    if ($debug){

    
    echo $q . '<br><br>';


    }


    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();

    if ($nRows > 0) {

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $rowReturn[] = $row;


        }

        return $rowReturn;

    } else {
        

        return false;
    }




}

public function getAudienceEmail($emailid, $debug=false){

    $q = "Select a.`audience`
    FROM `emails` as a
    WHERE a.`id` = '$emailid'
    ";

    if ($debug){

    
    echo $q . '<br><br>';


    }


    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();

    if ($nRows == 1) {

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $rowReturn = $row['audience'];


        }

        return $rowReturn;

    } else {
        

        return false;
    }



}

public function getEmailidEmail($emailid, $debug=false){

    $q = "Select a.`email_id`
    FROM `emails` as a
    WHERE a.`id` = '$emailid'
    ";

    if ($debug){

    
    echo $q . '<br><br>';


    }


    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();

    if ($nRows == 1) {

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $rowReturn = $row['email_id'];


        }

        return $rowReturn;

    } else {
        

        return false;
    }



}



public function hasEmailBeenSent($emailid, $debug=false){

       
    //$audience = $this->getAudienceEmail($emailid);    

    $q = "Select a.`id`
    FROM `emails` as a
    WHERE a.`active` = 1
    ";

    if ($debug){

    
    echo $q . '<br><br>';


    }


    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();

    if ($nRows > 0) {

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $rowReturn[] = $row;


        }

        return $rowReturn;

    } else {
        

        return false;
    }




}

public function archiveTableRowGeneric ($table, $id){

	$q1 = "CREATE TABLE IF NOT EXISTS {$table}archive like $table";

	$result1 = $this->connection->RunQuery($q1);

	if ($result1){

	$q2 = "INSERT INTO {$table}archive
		   SELECT *
	FROM {$table}
	WHERE `id` = '$id'";

	//echo $q2;

	   $result2 = $this->connection->RunQuery($q2);
	   
	   if ($result2){

		   return 1;
	   }else{

		   return 0;
	   }
	   //return $returnArray;


   }else{

	   return 0;
   }


    }

    


public function duplicateMail($emailid, $debug=false){

       
    //$audience = $this->getAudienceEmail($emailid); 
    
    /* $q2 = "CREATE TEMPORARY TABLE tmptable_1 SELECT * FROM `emails` WHERE `id` = '$emailid';
    ALTER TABLE tmptable_1 MODIFY `id` INT NULL;
    UPDATE tmptable_1 SET `id` = NULL;";

insert into your_table (c1, c2, ...)
select c1, c2, ...
from your_table
where id = 1 */

    $q2 = "INSERT INTO `emails` (`email_id`, `name`, `subject`, `preheader`, `active`, `audience`)
		   SELECT `email_id`, `name`, `subject`, `preheader`, `active`, `audience`
	FROM `emails`
	WHERE `id` = '$emailid'";

    if ($debug){

    
    echo $q2 . '<br><br>';


    }


    $result = $this->connection->RunQuery($q2);
    
    $x = 0;
    $nRows = $result->rowCount();

    print_r($this->connection->conn->lastInsertId());

    if ($result) {

        


            return $this->connection->conn->lastInsertId(); 



        


        //return $this->connection->conn->lastInsertId(); 


    } else {
        

        return false;
    }




}

public function copyRecords($emailid, $newEmail, $debug=false){

    //$audience = $this->getAudienceEmail($emailid);   
    
    $q1 = "Select b.*
    FROM `emails` as a
    INNER JOIN `emailContent` as b ON a.`id` = b.`email_id`
    WHERE a.`id` = '$emailid'";

    $result = $this->connection->RunQuery($q1);

    $x = 0;
    $nRows = $result->rowCount();

    if ($nRows > 0) {

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            // prepare and bind
            $stmt = $this->connection->prepare("INSERT INTO `emailContent`
            (`email_id`, `text`, `img`, `video`, `display_order`) 
            VALUES (:email_id, :text_txt, :img, :video, :display_order)");

$text = $row['text'];
$img = $row['img'];
$video = $row['video'];
$display_order = $row['display_order'];

            //$stmt->bind_param("sssss", $emailid, $text, $img, $video, $display_order);
            $stmt->bindParam(':email_id', $newEmail);
            $stmt->bindParam(':text_txt', $text);
            $stmt->bindParam(':img', $img);
            $stmt->bindParam(':video', $video);
            $stmt->bindParam(':display_order', $display_order);
            



/* // set parameters and execute
$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";
$stmt->execute();

            $q2 = "INSERT INTO `emailContent`
            (`email_id`, `text`, `img`, `video`, `display_order`) 
            VALUES ('$newEmail', {$row['text']} , {$row['img']}, {$row['video']}, {$row['display_order']})";

            $result = $this->connection->RunQuery($q2);

            $x = 0; */
            $result2 = $stmt->execute();
            
            if ($debug){
            
            echo $row['id'] . ' copied to row ' . $this->connection->conn->lastInsertId();

            }
            


        }


    }else{


        if ($debug){

            echo 'No content for this mail';
        }
    }

    /* $q2 = "INSERT INTO `emails`
    SELECT *
    FROM `emails`
    WHERE `id` = '$emailid'";

    if ($debug){


    echo $q . '<br><br>';


    }


    $result = $this->connection->RunQuery($q);

    $x = 0;
    $nRows = $result->rowCount();

    if ($nRows > 0) {

    return $this->connection->conn->lastInsertId(); 


    } else {


    return false;
    } */


}

    
    /**
     * Close mysql connection
     */
	public function endemailLink(){
		$this->connection->CloseMysql();
	}

}