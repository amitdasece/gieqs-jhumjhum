<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 26-06-2023
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */if (session_status() == PHP_SESSION_NONE) { //if there's no session_start yet...
            session_start(); //do this
          }
          
          if ($_SESSION){
          
          if ($_SESSION['debug'] == true){
          
          error_reporting(E_ALL);
          
          }else{
          
          error_reporting(0);
          
          }
          }


Class box_code {

	private $id; //int(11)

	public function __construct(){
            require_once 'DataBaseMysqlPDO.class.php';

		$this->connection = new DataBaseMysqlPDOGIEQsBox();
	}





     public function get_all_responses() {

        $q = "Select 
        `id`, CONCAT(`id`, ' - ', `text`) as `name`
        FROM `responses`";

        //echo $q;

        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            
                //note here returning an option only
                $rowReturn[] = array('id' => $row['id'], 'text' => $row['name']);
                //print_r($row);
            }
        
            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            $rowReturn['result'] = [];
            
            return $rowReturn;
        }

        $this->connection->CloseMysql();

    }

    public function get_next_response_given_interaction_id_and_order($interaction_id, $order){

        $next_item = (intval($order)+1);

        $q= "Select `interaction_interaction`.`responses_id`
        FROM `interaction_interaction`
        INNER JOIN `interaction` ON `interaction`.`id` = `interaction_interaction`.`interaction_id` 
        WHERE `interaction_interaction`.`interaction_id` = $interaction_id AND `interaction_interaction`.`order` = $next_item";

        //echo $q;

        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            
                //note here returning an option only
                $rowReturn = array('responses_id' => $row['responses_id']);
                //print_r($row);
            }
        
            return $rowReturn;

        } else {
            

            
            return false;
        }

        $this->connection->CloseMysql();


    }

    public function get_specific_level_commands ($level) {

        $q= "Select `commands`.`id`, CONCAT(`commands`.`id`, ' - ', `commands`.`spoken_word`) as `name`
        FROM `interaction_interaction`
        INNER JOIN `interaction` ON `interaction`.`id` = `interaction_interaction`.`interaction_id`
        INNER JOIN `commands` ON `commands`.`id` = `interaction_interaction`.`commands_id` 
        WHERE `interaction_interaction`.`order` = '$level'";

        //echo $q;

        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            
                //note here returning an option only
                $rowReturn[] = array('id' => $row['id'], 'text' => $row['name']);
                //print_r($row);
            }
        
            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            
            
            return false;
        }

        $this->connection->CloseMysql();

    }

    public function get_first_level_commands () {

        $q= "Select `commands`.`id`, CONCAT(`commands`.`id`, ' - ', `commands`.`spoken_word`) as `name`
        FROM `interaction_interaction`
        INNER JOIN `interaction` ON `interaction`.`id` = `interaction_interaction`.`interaction_id`
        INNER JOIN `commands` ON `commands`.`id` = `interaction_interaction`.`commands_id` 
        WHERE `interaction_interaction`.`order` = '1'";

        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            
                //note here returning an option only
                $rowReturn[] = array('id' => $row['id'], 'text' => $row['name']);
                //print_r($row);
            }
        
            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            
            
            return false;
        }

        $this->connection->CloseMysql();

    }
 
    public function get_command_interaction_and_position($commands_id) {

        //knowing the commands_id
        //look for the next response in order of the interaction
        //return all which match for any interaction

        //find the interaction in which the command is located and its order
        //get the next response from that interaction
        //return response id and interaction id
        //return the next response in the interaction for all the available interactions

        $q= "Select `interaction`.`id`, `interaction_interaction`.`order` 
        FROM `interaction_interaction`
        INNER JOIN `interaction` ON `interaction`.`id` = `interaction_interaction`.`interaction_id` 
        WHERE `interaction_interaction`.`commands_id` = $commands_id";


        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            
                //note here returning an option only
                $rowReturn = array('id' => $row['id'], 'order' => $row['order']);
                //print_r($row);
            }
        
            return $rowReturn;

        } else {
            

            
            
            return false;
        }

        $this->connection->CloseMysql();

    }

    public function get_all_commands() {

        $q = "Select 
        `id`, CONCAT(`id`, ' - ', `spoken_word`) as `name`
        FROM `commands`";

        //echo $q;

        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            
                //note here returning an option only
                $rowReturn[] = array('id' => $row['id'], 'text' => $row['name']);
                //print_r($row);
            }
        
            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            $rowReturn['result'] = [];
            
            return $rowReturn;
        }

        $this->connection->CloseMysql();

    }

    
	public function endbox_code(){
		$this->connection->CloseMysql();
	}

}