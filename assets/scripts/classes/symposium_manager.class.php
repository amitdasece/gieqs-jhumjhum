<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 6-06-2022
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




Class symposium_manager {


	private $connection;

	public function __construct(){
        require_once 'DataBaseMysqlPDO.class.php';

		$this->connection = new DataBaseMysqlPDO();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	


    public function calculateCost($earlyBird, $registrationType, $groupRegistration, $includeGIEQsPRO, $debug=false){


            $cost = 0;
            $normalCostGIEQsOnline = null;
            $saving = null;
            $group = null;
            $symposiumcost = null;
        
        if ($earlyBird === true){
        
            //early bird rates
        
            if ($registrationType == 1){ // doctor
        
                $symposiumcost = 125;
                $cost += 125;
        
                if ($groupRegistration == 1){ //return a marker
        
                    $group = true;
        
                }
        
                if ($includeGIEQsPRO == 1){
        
                    $normalCostGIEQsOnline = 180;
                    $saving = 80;
                    
                    $cost+=($normalCostGIEQsOnline-$saving);
                    
        
        
                }
        
                return [
                    
                    'cost' => $cost,
                    'normalCostGIEQsOnline' => $normalCostGIEQsOnline,
                    'saving' => $saving,
                    'group' => $group,
                    'earlyBird' => $earlyBird,
                    'registrationType' => $registrationType,
                    'includeGIEQsPro' => $includeGIEQsPRO,
                    'symposiumcost' => $symposiumcost,
        
        
        
                ];
        
            }else if ($registrationType == 2 || $registrationType == 3){
        
        
                $symposiumcost = 75;
        
                $cost += 75;
        
                if ($groupRegistration == 1){ //return a marker
        
                    $group = true;
        
                }
        
                if ($includeGIEQsPRO == 1){
        
                    $normalCostGIEQsOnline = 120;
                    $saving = 30;
                    
                    $cost+=($normalCostGIEQsOnline-$saving);
        
        
                }
        
                
                return [
                    
                    'cost' => $cost,
                    'normalCostGIEQsOnline' => $normalCostGIEQsOnline,
                    'saving' => $saving,
                    'group' => $group,
                    'earlyBird' => $earlyBird,
                    'registrationType' => $registrationType,
                    'includeGIEQsPro' => $includeGIEQsPRO,
                    'symposiumcost' => $symposiumcost,
        
        
        
                ];
        
            }else if ($registrationType == 4 || $registrationType == 5){
        
        
                $symposiumcost = 55;
        
                $cost += 55;
        
                if ($groupRegistration == 1){ //return a marker
        
                    $group = true;
        
                }
        
                if ($includeGIEQsPRO == 1){
        
                    $normalCostGIEQsOnline = 60;
                    $saving = 10;
                    
                    $cost+=($normalCostGIEQsOnline-$saving);
        
        
        
                }
        
                return [
                    
                    'cost' => $cost,
                    'normalCostGIEQsOnline' => $normalCostGIEQsOnline,
                    'saving' => $saving,
                    'group' => $group,
                    'earlyBird' => $earlyBird,
                    'registrationType' => $registrationType,
                    'includeGIEQsPro' => $includeGIEQsPRO,
                    'symposiumcost' => $symposiumcost,
        
        
        
                ];
        
            }
        
        
        }else{
        
            //non-early bird rates
           
        
            if ($registrationType == 1){ // doctor
        
                $symposiumcost = 175;
        
                $cost += 175;
        
                if ($$groupRegistration == 1){ //return a marker
        
                        $group = true;
        
                }
        
                if ($includeGIEQsPRO == 1){
        
                    $normalCostGIEQsOnline = 180;
                    $saving = 80;
                    
                    $cost+=($normalCostGIEQsOnline-$saving);
        
        
        
                }
        
                return [
                    
                    'cost' => $cost,
                    'normalCostGIEQsOnline' => $normalCostGIEQsOnline,
                    'saving' => $saving,
                    'group' => $group,
                    'earlyBird' => $earlyBird,
                    'registrationType' => $registrationType,
                    'includeGIEQsPro' => $includeGIEQsPRO,
                    'symposiumcost' => $symposiumcost,
        
        
        
                ];
        
            }else if ($registrationType == 2 || $registrationType == 3){
        
        
                $symposiumcost = 100;
        
                $cost += 100;
        
                if ($groupRegistration == 1){ //return a marker
        
                    $group = true;
                }
        
                if ($includeGIEQsPRO == 1){
        
                    $normalCostGIEQsOnline = 120;
                    $saving = 30;
                    
                    $cost+=($normalCostGIEQsOnline-$saving);
        
        
        
        
        
                }
        
               
                return [
                    
                    'cost' => $cost,
                    'normalCostGIEQsOnline' => $normalCostGIEQsOnline,
                    'saving' => $saving,
                    'group' => $group,
                    'earlyBird' => $earlyBird,
                    'registrationType' => $registrationType,
                    'includeGIEQsPro' => $includeGIEQsPRO,
                    'symposiumcost' => $symposiumcost,
        
        
        
                ];
        
            }else if ($registrationType == 4 || $registrationType == 5){
        
        
                $symposiumcost = 70;
        
                $cost += 70;
        
                if ($groupRegistration == 1){ //return a marker
        
                    $group = true;
        
                }
        
                if ($includeGIEQsPRO == 1){
        
                    $normalCostGIEQsOnline = 60;
                    $saving = 10;
                    
                    $cost+=($normalCostGIEQsOnline-$saving);
        
        
                }
        
                return [
                    
                    'cost' => $cost,
                    'normalCostGIEQsOnline' => $normalCostGIEQsOnline,
                    'saving' => $saving,
                    'group' => $group,
                    'earlyBird' => $earlyBird,
                    'registrationType' => $registrationType,
                    'includeGIEQsPro' => $includeGIEQsPRO,
                    'symposiumcost' => $symposiumcost,
        
        
        
                ];
            }
        
        
        }
        
        
        
        

    }




    public function count_all_registrations(){

        $q = "SELECT COUNT(`id`) as `count` FROM `symposium` WHERE `partial_registration` = '0'";

        //echo $q;

        $result = $this->connection->RunQuery($q);


        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $count = $row['count'];

    
    
        }

        return $count;


    }    

    public function count_all_registrations_early_bird(){

        $q = "SELECT COUNT(`id`) as `count` FROM `symposium` WHERE `partial_registration` = '0' AND `early_bird` = '1'";

        //echo $q;

        $result = $this->connection->RunQuery($q);


        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $count = $row['count'];

    
    
        }

        return $count;


    }  

    public function count_all_registrations_non_early_bird(){

        $q = "SELECT COUNT(`id`) as `count` FROM `symposium` WHERE `partial_registration` = '0' AND `early_bird` IS NULL";

        //echo $q;

        $result = $this->connection->RunQuery($q);


        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $count = $row['count'];

    
    
        }

        return $count;


    }  

    public function count_all_incomplete_registrations(){

        $q = "SELECT COUNT(`id`) as `count` FROM `symposium` WHERE `partial_registration` = '1'";

        //echo $q;

        $result = $this->connection->RunQuery($q);


        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $count = $row['count'];

    
    
        }

        return $count;


    }    
    
    public function count_specific_registrations($registration_type){

        $q = "SELECT COUNT(`id`) as `count` FROM `symposium` WHERE `partial_registration` = '0' AND `registrationType` = '$registration_type'";

        //echo $q;

        $result = $this->connection->RunQuery($q);


        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $count = $row['count'];

    
    
        }

        return $count;


    }  

    public function count_specific_registrations_withonline($registration_type){

        $q = "SELECT COUNT(`id`) as `count` FROM `symposium` WHERE `partial_registration` = '0' AND `registrationType` = '$registration_type' AND `includeGIEQsPro` = '1'";

        //echo $q;

        $result = $this->connection->RunQuery($q);


        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $count = $row['count'];

    
    
        }

        return $count;


    }  

    public function count_specific_registrations_with_longservice_discount($registration_type){

        $q = "SELECT COUNT(`id`) as `count` FROM `symposium` WHERE `partial_registration` = '0' AND `registrationType` = '$registration_type' AND `longTermProMemberDiscount` = '1'";

        //echo $q;

        $result = $this->connection->RunQuery($q);


        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $count = $row['count'];

    
    
        }

        return $count;


    } 

    public function count_specific_registrations_with_professional_discount($registration_type){

        $q = "SELECT COUNT(`id`) as `count` FROM `symposium` WHERE `partial_registration` = '0' AND `registrationType` = '$registration_type' AND (`professionalMember` = '1' OR `professionalMember` = '2' OR `professionalMember` = '3' OR `professionalMember` = '4')";

        //echo $q;

        $result = $this->connection->RunQuery($q);


        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $count = $row['count'];

    
    
        }

        return $count;


    } 

    public function countries_users(){

        $q = "SELECT b.`centreCountry` 
        FROM `symposium` as a
        INNER JOIN `users` AS b on a.`user_id` = b.`user_id` 
        WHERE a.`partial_registration` = '0'";

        //echo $q;

        $result = $this->connection->RunQuery($q);

        $returnArray = [];

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $returnArray[] = $row['centreCountry'];

    
    
        }

        return $returnArray;


    }
    
    public function get_faculty_symposium($edition, $type){

        $q = "SELECT * FROM `faculty` WHERE `edition` = '$edition' AND `type` = '$type' ORDER BY `surname` ASC";

        //echo $q;

        $result = $this->connection->RunQuery($q);

        $returnArray = [];

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $returnArray[] = $row;

    
    
        }

        return $returnArray;


    }


    


    /**
     * Close mysql connection
     */
	public function endsymposium_manager(){
		$this->connection->CloseMysql();
	}

}