<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 18-11-2021
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


Class gpat_score {

	private $id; //int(11)
	private $user_gpat_id; //varchar(11)
	private $tip_control; //varchar(255)
	private $extent; //varchar(255)
	private $positioning; //varchar(255)
	private $appropriate_technique; //varchar(255)
	private $injection_plane; //varchar(255)
	private $injection_dynamic; //varchar(255)
	private $injection_access; //varchar(255)
	private $snare_size; //varchar(255)
	private $snare_position; //varchar(255)
	private $snare_visualised; //varchar(255)
	private $residual; //varchar(255)
	private $independent_movement; //varchar(255)
	private $lift_movement; //varchar(255)
	private $mucosa; //varchar(255)
	private $thermal_ablation; //varchar(255)
	private $submucosa; //varchar(255)
	private $muscularis; //varchar(255)
	private $clip_placement; //varchar(255)
	private $retrieval_device; //varchar(255)
	private $coag_grasper; //varchar(255)
	private $size; //varchar(255)
	private $morphology; //varchar(255)
	private $site; //varchar(255)
	private $access; //varchar(255)
	private $size_40_smsaplus; //varchar(255)
	private $nongranular_smsaplus; //varchar(255)
	private $non_lifting; //varchar(255)
	private $location_difficult; //varchar(255)
	private $user_id; //int(11)
	private $created; //timestamp
	private $updated; //timestamp
	private $numeratorSum; //varchar(255)
	private $denominatorSum; //varchar(255)
	private $fraction; //varchar(255)
	private $SMSA_total; //varchar(255)
	private $SMSA_group; //varchar(255)
	private $numeratorSMSAplus; //varchar(255)
	private $denominatorSMSAplus; //varchar(255)
	private $snare_capture; //varchar(255)
	private $edit; //varchar(255)
	private $date_procedure; //date
	private $weighted_fraction; //varchar(255)
	private $global_numerator; //varchar(255)
	private $injection_numerator; //varchar(255)
	private $snare_numerator; //varchar(255)
	private $safety_numerator; //varchar(255)
	private $defect_numerator; //varchar(255)
	private $accessory_numerator; //varchar(255)
	private $global_denominator; //varchar(255)
	private $injection_denominator; //varchar(255)
	private $snare_denominator; //varchar(255)
	private $safety_denominator; //varchar(255)
	private $defect_denominator; //varchar(255)
	private $accessory_denominator; //varchar(255)
	private $type_polypectomy; //varchar(255)
	private $complete; //varchar(255)
	private $connection;

	public function __construct(){
            require_once 'DatabaseMyssqlPDOLearning.class.php';

		$this->connection = new DataBaseMysqlPDOLearning();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_gpat_score($user_gpat_id,$tip_control,$extent,$positioning,$appropriate_technique,$injection_plane,$injection_dynamic,$injection_access,$snare_size,$snare_position,$snare_visualised,$residual,$independent_movement,$lift_movement,$mucosa,$thermal_ablation,$submucosa,$muscularis,$clip_placement,$retrieval_device,$coag_grasper,$size,$morphology,$site,$access,$size_40_smsaplus,$nongranular_smsaplus,$non_lifting,$location_difficult,$user_id,$created,$updated,$numeratorSum,$denominatorSum,$fraction,$SMSA_total,$SMSA_group,$numeratorSMSAplus,$denominatorSMSAplus,$snare_capture,$edit,$date_procedure,$weighted_fraction,$global_numerator,$injection_numerator,$snare_numerator,$safety_numerator,$defect_numerator,$accessory_numerator,$global_denominator,$injection_denominator,$snare_denominator,$safety_denominator,$defect_denominator,$accessory_denominator,$type_polypectomy,$complete){
		$this->user_gpat_id = $user_gpat_id;
		$this->tip_control = $tip_control;
		$this->extent = $extent;
		$this->positioning = $positioning;
		$this->appropriate_technique = $appropriate_technique;
		$this->injection_plane = $injection_plane;
		$this->injection_dynamic = $injection_dynamic;
		$this->injection_access = $injection_access;
		$this->snare_size = $snare_size;
		$this->snare_position = $snare_position;
		$this->snare_visualised = $snare_visualised;
		$this->residual = $residual;
		$this->independent_movement = $independent_movement;
		$this->lift_movement = $lift_movement;
		$this->mucosa = $mucosa;
		$this->thermal_ablation = $thermal_ablation;
		$this->submucosa = $submucosa;
		$this->muscularis = $muscularis;
		$this->clip_placement = $clip_placement;
		$this->retrieval_device = $retrieval_device;
		$this->coag_grasper = $coag_grasper;
		$this->size = $size;
		$this->morphology = $morphology;
		$this->site = $site;
		$this->access = $access;
		$this->size_40_smsaplus = $size_40_smsaplus;
		$this->nongranular_smsaplus = $nongranular_smsaplus;
		$this->non_lifting = $non_lifting;
		$this->location_difficult = $location_difficult;
		$this->user_id = $user_id;
		$this->created = $created;
		$this->updated = $updated;
		$this->numeratorSum = $numeratorSum;
		$this->denominatorSum = $denominatorSum;
		$this->fraction = $fraction;
		$this->SMSA_total = $SMSA_total;
		$this->SMSA_group = $SMSA_group;
		$this->numeratorSMSAplus = $numeratorSMSAplus;
		$this->denominatorSMSAplus = $denominatorSMSAplus;
		$this->snare_capture = $snare_capture;
		$this->edit = $edit;
		$this->date_procedure = $date_procedure;
		$this->weighted_fraction = $weighted_fraction;
		$this->global_numerator = $global_numerator;
		$this->injection_numerator = $injection_numerator;
		$this->snare_numerator = $snare_numerator;
		$this->safety_numerator = $safety_numerator;
		$this->defect_numerator = $defect_numerator;
		$this->accessory_numerator = $accessory_numerator;
		$this->global_denominator = $global_denominator;
		$this->injection_denominator = $injection_denominator;
		$this->snare_denominator = $snare_denominator;
		$this->safety_denominator = $safety_denominator;
		$this->defect_denominator = $defect_denominator;
		$this->accessory_denominator = $accessory_denominator;
		$this->type_polypectomy = $type_polypectomy;
		$this->complete = $complete;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from gpat_score where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->user_gpat_id = $row["user_gpat_id"];
			$this->tip_control = $row["tip_control"];
			$this->extent = $row["extent"];
			$this->positioning = $row["positioning"];
			$this->appropriate_technique = $row["appropriate_technique"];
			$this->injection_plane = $row["injection_plane"];
			$this->injection_dynamic = $row["injection_dynamic"];
			$this->injection_access = $row["injection_access"];
			$this->snare_size = $row["snare_size"];
			$this->snare_position = $row["snare_position"];
			$this->snare_visualised = $row["snare_visualised"];
			$this->residual = $row["residual"];
			$this->independent_movement = $row["independent_movement"];
			$this->lift_movement = $row["lift_movement"];
			$this->mucosa = $row["mucosa"];
			$this->thermal_ablation = $row["thermal_ablation"];
			$this->submucosa = $row["submucosa"];
			$this->muscularis = $row["muscularis"];
			$this->clip_placement = $row["clip_placement"];
			$this->retrieval_device = $row["retrieval_device"];
			$this->coag_grasper = $row["coag_grasper"];
			$this->size = $row["size"];
			$this->morphology = $row["morphology"];
			$this->site = $row["site"];
			$this->access = $row["access"];
			$this->size_40_smsaplus = $row["size_40_smsaplus"];
			$this->nongranular_smsaplus = $row["nongranular_smsaplus"];
			$this->non_lifting = $row["non_lifting"];
			$this->location_difficult = $row["location_difficult"];
			$this->user_id = $row["user_id"];
			$this->created = $row["created"];
			$this->updated = $row["updated"];
			$this->numeratorSum = $row["numeratorSum"];
			$this->denominatorSum = $row["denominatorSum"];
			$this->fraction = $row["fraction"];
			$this->SMSA_total = $row["SMSA_total"];
			$this->SMSA_group = $row["SMSA_group"];
			$this->numeratorSMSAplus = $row["numeratorSMSAplus"];
			$this->denominatorSMSAplus = $row["denominatorSMSAplus"];
			$this->snare_capture = $row["snare_capture"];
			$this->edit = $row["edit"];
			$this->date_procedure = $row["date_procedure"];
			$this->weighted_fraction = $row["weighted_fraction"];
			$this->global_numerator = $row["global_numerator"];
			$this->injection_numerator = $row["injection_numerator"];
			$this->snare_numerator = $row["snare_numerator"];
			$this->safety_numerator = $row["safety_numerator"];
			$this->defect_numerator = $row["defect_numerator"];
			$this->accessory_numerator = $row["accessory_numerator"];
			$this->global_denominator = $row["global_denominator"];
			$this->injection_denominator = $row["injection_denominator"];
			$this->snare_denominator = $row["snare_denominator"];
			$this->safety_denominator = $row["safety_denominator"];
			$this->defect_denominator = $row["defect_denominator"];
			$this->accessory_denominator = $row["accessory_denominator"];
			$this->type_polypectomy = $row["type_polypectomy"];
			$this->complete = $row["complete"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `gpat_score` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["user_gpat_id"] = $row["user_gpat_id"];
			$rowReturn[$x]["tip_control"] = $row["tip_control"];
			$rowReturn[$x]["extent"] = $row["extent"];
			$rowReturn[$x]["positioning"] = $row["positioning"];
			$rowReturn[$x]["appropriate_technique"] = $row["appropriate_technique"];
			$rowReturn[$x]["injection_plane"] = $row["injection_plane"];
			$rowReturn[$x]["injection_dynamic"] = $row["injection_dynamic"];
			$rowReturn[$x]["injection_access"] = $row["injection_access"];
			$rowReturn[$x]["snare_size"] = $row["snare_size"];
			$rowReturn[$x]["snare_position"] = $row["snare_position"];
			$rowReturn[$x]["snare_visualised"] = $row["snare_visualised"];
			$rowReturn[$x]["residual"] = $row["residual"];
			$rowReturn[$x]["independent_movement"] = $row["independent_movement"];
			$rowReturn[$x]["lift_movement"] = $row["lift_movement"];
			$rowReturn[$x]["mucosa"] = $row["mucosa"];
			$rowReturn[$x]["thermal_ablation"] = $row["thermal_ablation"];
			$rowReturn[$x]["submucosa"] = $row["submucosa"];
			$rowReturn[$x]["muscularis"] = $row["muscularis"];
			$rowReturn[$x]["clip_placement"] = $row["clip_placement"];
			$rowReturn[$x]["retrieval_device"] = $row["retrieval_device"];
			$rowReturn[$x]["coag_grasper"] = $row["coag_grasper"];
			$rowReturn[$x]["size"] = $row["size"];
			$rowReturn[$x]["morphology"] = $row["morphology"];
			$rowReturn[$x]["site"] = $row["site"];
			$rowReturn[$x]["access"] = $row["access"];
			$rowReturn[$x]["size_40_smsaplus"] = $row["size_40_smsaplus"];
			$rowReturn[$x]["nongranular_smsaplus"] = $row["nongranular_smsaplus"];
			$rowReturn[$x]["non_lifting"] = $row["non_lifting"];
			$rowReturn[$x]["location_difficult"] = $row["location_difficult"];
			$rowReturn[$x]["user_id"] = $row["user_id"];
			$rowReturn[$x]["created"] = $row["created"];
			$rowReturn[$x]["updated"] = $row["updated"];
			$rowReturn[$x]["numeratorSum"] = $row["numeratorSum"];
			$rowReturn[$x]["denominatorSum"] = $row["denominatorSum"];
			$rowReturn[$x]["fraction"] = $row["fraction"];
			$rowReturn[$x]["SMSA_total"] = $row["SMSA_total"];
			$rowReturn[$x]["SMSA_group"] = $row["SMSA_group"];
			$rowReturn[$x]["numeratorSMSAplus"] = $row["numeratorSMSAplus"];
			$rowReturn[$x]["denominatorSMSAplus"] = $row["denominatorSMSAplus"];
			$rowReturn[$x]["snare_capture"] = $row["snare_capture"];
			$rowReturn[$x]["edit"] = $row["edit"];
			$rowReturn[$x]["date_procedure"] = $row["date_procedure"];
			$rowReturn[$x]["weighted_fraction"] = $row["weighted_fraction"];
			$rowReturn[$x]["global_numerator"] = $row["global_numerator"];
			$rowReturn[$x]["injection_numerator"] = $row["injection_numerator"];
			$rowReturn[$x]["snare_numerator"] = $row["snare_numerator"];
			$rowReturn[$x]["safety_numerator"] = $row["safety_numerator"];
			$rowReturn[$x]["defect_numerator"] = $row["defect_numerator"];
			$rowReturn[$x]["accessory_numerator"] = $row["accessory_numerator"];
			$rowReturn[$x]["global_denominator"] = $row["global_denominator"];
			$rowReturn[$x]["injection_denominator"] = $row["injection_denominator"];
			$rowReturn[$x]["snare_denominator"] = $row["snare_denominator"];
			$rowReturn[$x]["safety_denominator"] = $row["safety_denominator"];
			$rowReturn[$x]["defect_denominator"] = $row["defect_denominator"];
			$rowReturn[$x]["accessory_denominator"] = $row["accessory_denominator"];
			$rowReturn[$x]["type_polypectomy"] = $row["type_polypectomy"];
			$rowReturn[$x]["complete"] = $row["complete"];
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
$q = "Select * from `gpat_score` WHERE `id` = $key";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["user_gpat_id"] = $row["user_gpat_id"];
			$rowReturn[$x]["tip_control"] = $row["tip_control"];
			$rowReturn[$x]["extent"] = $row["extent"];
			$rowReturn[$x]["positioning"] = $row["positioning"];
			$rowReturn[$x]["appropriate_technique"] = $row["appropriate_technique"];
			$rowReturn[$x]["injection_plane"] = $row["injection_plane"];
			$rowReturn[$x]["injection_dynamic"] = $row["injection_dynamic"];
			$rowReturn[$x]["injection_access"] = $row["injection_access"];
			$rowReturn[$x]["snare_size"] = $row["snare_size"];
			$rowReturn[$x]["snare_position"] = $row["snare_position"];
			$rowReturn[$x]["snare_visualised"] = $row["snare_visualised"];
			$rowReturn[$x]["residual"] = $row["residual"];
			$rowReturn[$x]["independent_movement"] = $row["independent_movement"];
			$rowReturn[$x]["lift_movement"] = $row["lift_movement"];
			$rowReturn[$x]["mucosa"] = $row["mucosa"];
			$rowReturn[$x]["thermal_ablation"] = $row["thermal_ablation"];
			$rowReturn[$x]["submucosa"] = $row["submucosa"];
			$rowReturn[$x]["muscularis"] = $row["muscularis"];
			$rowReturn[$x]["clip_placement"] = $row["clip_placement"];
			$rowReturn[$x]["retrieval_device"] = $row["retrieval_device"];
			$rowReturn[$x]["coag_grasper"] = $row["coag_grasper"];
			$rowReturn[$x]["size"] = $row["size"];
			$rowReturn[$x]["morphology"] = $row["morphology"];
			$rowReturn[$x]["site"] = $row["site"];
			$rowReturn[$x]["access"] = $row["access"];
			$rowReturn[$x]["size_40_smsaplus"] = $row["size_40_smsaplus"];
			$rowReturn[$x]["nongranular_smsaplus"] = $row["nongranular_smsaplus"];
			$rowReturn[$x]["non_lifting"] = $row["non_lifting"];
			$rowReturn[$x]["location_difficult"] = $row["location_difficult"];
			$rowReturn[$x]["user_id"] = $row["user_id"];
			$rowReturn[$x]["created"] = $row["created"];
			$rowReturn[$x]["updated"] = $row["updated"];
			$rowReturn[$x]["numeratorSum"] = $row["numeratorSum"];
			$rowReturn[$x]["denominatorSum"] = $row["denominatorSum"];
			$rowReturn[$x]["fraction"] = $row["fraction"];
			$rowReturn[$x]["SMSA_total"] = $row["SMSA_total"];
			$rowReturn[$x]["SMSA_group"] = $row["SMSA_group"];
			$rowReturn[$x]["numeratorSMSAplus"] = $row["numeratorSMSAplus"];
			$rowReturn[$x]["denominatorSMSAplus"] = $row["denominatorSMSAplus"];
			$rowReturn[$x]["snare_capture"] = $row["snare_capture"];
			$rowReturn[$x]["edit"] = $row["edit"];
			$rowReturn[$x]["date_procedure"] = $row["date_procedure"];
			$rowReturn[$x]["weighted_fraction"] = $row["weighted_fraction"];
			$rowReturn[$x]["global_numerator"] = $row["global_numerator"];
			$rowReturn[$x]["injection_numerator"] = $row["injection_numerator"];
			$rowReturn[$x]["snare_numerator"] = $row["snare_numerator"];
			$rowReturn[$x]["safety_numerator"] = $row["safety_numerator"];
			$rowReturn[$x]["defect_numerator"] = $row["defect_numerator"];
			$rowReturn[$x]["accessory_numerator"] = $row["accessory_numerator"];
			$rowReturn[$x]["global_denominator"] = $row["global_denominator"];
			$rowReturn[$x]["injection_denominator"] = $row["injection_denominator"];
			$rowReturn[$x]["snare_denominator"] = $row["snare_denominator"];
			$rowReturn[$x]["safety_denominator"] = $row["safety_denominator"];
			$rowReturn[$x]["defect_denominator"] = $row["defect_denominator"];
			$rowReturn[$x]["accessory_denominator"] = $row["accessory_denominator"];
			$rowReturn[$x]["type_polypectomy"] = $row["type_polypectomy"];
			$rowReturn[$x]["complete"] = $row["complete"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `gpat_score` LIMIT $x, $y";
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
		$result = $this->connection->RunQuery("Select * from `gpat_score` where `id` = '$key_row' ");
		$nRows = $result->rowCount();
			if ($nRows == 1){
				return TRUE;
			}else{
				return FALSE;
			}
	}

    /**
		* Return the number of rows
		*/
	public function numberOfRows(){
		return $this->connection->TotalOfRows('gpat_score');
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
$q = "INSERT INTO `gpat_score` ($keys) VALUES ($keys2)";
		
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
$q = "UPDATE `gpat_score` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$result = $this->connection->RunQuery("DELETE FROM `gpat_score` WHERE `id` = $key_row");
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
		$result = $this->connection->RunQuery("SELECT id from gpat_score order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["id"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return id - int(11)
	 */
	public function getid(){
		return $this->id;
	}

	/**
	 * @return user_gpat_id - varchar(11)
	 */
	public function getuser_gpat_id(){
		return $this->user_gpat_id;
	}

	/**
	 * @return tip_control - varchar(255)
	 */
	public function gettip_control(){
		return $this->tip_control;
	}

	/**
	 * @return extent - varchar(255)
	 */
	public function getextent(){
		return $this->extent;
	}

	/**
	 * @return positioning - varchar(255)
	 */
	public function getpositioning(){
		return $this->positioning;
	}

	/**
	 * @return appropriate_technique - varchar(255)
	 */
	public function getappropriate_technique(){
		return $this->appropriate_technique;
	}

	/**
	 * @return injection_plane - varchar(255)
	 */
	public function getinjection_plane(){
		return $this->injection_plane;
	}

	/**
	 * @return injection_dynamic - varchar(255)
	 */
	public function getinjection_dynamic(){
		return $this->injection_dynamic;
	}

	/**
	 * @return injection_access - varchar(255)
	 */
	public function getinjection_access(){
		return $this->injection_access;
	}

	/**
	 * @return snare_size - varchar(255)
	 */
	public function getsnare_size(){
		return $this->snare_size;
	}

	/**
	 * @return snare_position - varchar(255)
	 */
	public function getsnare_position(){
		return $this->snare_position;
	}

	/**
	 * @return snare_visualised - varchar(255)
	 */
	public function getsnare_visualised(){
		return $this->snare_visualised;
	}

	/**
	 * @return residual - varchar(255)
	 */
	public function getresidual(){
		return $this->residual;
	}

	/**
	 * @return independent_movement - varchar(255)
	 */
	public function getindependent_movement(){
		return $this->independent_movement;
	}

	/**
	 * @return lift_movement - varchar(255)
	 */
	public function getlift_movement(){
		return $this->lift_movement;
	}

	/**
	 * @return mucosa - varchar(255)
	 */
	public function getmucosa(){
		return $this->mucosa;
	}

	/**
	 * @return thermal_ablation - varchar(255)
	 */
	public function getthermal_ablation(){
		return $this->thermal_ablation;
	}

	/**
	 * @return submucosa - varchar(255)
	 */
	public function getsubmucosa(){
		return $this->submucosa;
	}

	/**
	 * @return muscularis - varchar(255)
	 */
	public function getmuscularis(){
		return $this->muscularis;
	}

	/**
	 * @return clip_placement - varchar(255)
	 */
	public function getclip_placement(){
		return $this->clip_placement;
	}

	/**
	 * @return retrieval_device - varchar(255)
	 */
	public function getretrieval_device(){
		return $this->retrieval_device;
	}

	/**
	 * @return coag_grasper - varchar(255)
	 */
	public function getcoag_grasper(){
		return $this->coag_grasper;
	}

	/**
	 * @return size - varchar(255)
	 */
	public function getsize(){
		return $this->size;
	}

	/**
	 * @return morphology - varchar(255)
	 */
	public function getmorphology(){
		return $this->morphology;
	}

	/**
	 * @return site - varchar(255)
	 */
	public function getsite(){
		return $this->site;
	}

	/**
	 * @return access - varchar(255)
	 */
	public function getaccess(){
		return $this->access;
	}

	/**
	 * @return size_40_smsaplus - varchar(255)
	 */
	public function getsize_40_smsaplus(){
		return $this->size_40_smsaplus;
	}

	/**
	 * @return nongranular_smsaplus - varchar(255)
	 */
	public function getnongranular_smsaplus(){
		return $this->nongranular_smsaplus;
	}

	/**
	 * @return non_lifting - varchar(255)
	 */
	public function getnon_lifting(){
		return $this->non_lifting;
	}

	/**
	 * @return location_difficult - varchar(255)
	 */
	public function getlocation_difficult(){
		return $this->location_difficult;
	}

	/**
	 * @return user_id - int(11)
	 */
	public function getuser_id(){
		return $this->user_id;
	}

	/**
	 * @return created - timestamp
	 */
	public function getcreated(){
		return $this->created;
	}

	/**
	 * @return updated - timestamp
	 */
	public function getupdated(){
		return $this->updated;
	}

	/**
	 * @return numeratorSum - varchar(255)
	 */
	public function getnumeratorSum(){
		return $this->numeratorSum;
	}

	/**
	 * @return denominatorSum - varchar(255)
	 */
	public function getdenominatorSum(){
		return $this->denominatorSum;
	}

	/**
	 * @return fraction - varchar(255)
	 */
	public function getfraction(){
		return $this->fraction;
	}

	/**
	 * @return SMSA_total - varchar(255)
	 */
	public function getSMSA_total(){
		return $this->SMSA_total;
	}

	/**
	 * @return SMSA_group - varchar(255)
	 */
	public function getSMSA_group(){
		return $this->SMSA_group;
	}

	/**
	 * @return numeratorSMSAplus - varchar(255)
	 */
	public function getnumeratorSMSAplus(){
		return $this->numeratorSMSAplus;
	}

	/**
	 * @return denominatorSMSAplus - varchar(255)
	 */
	public function getdenominatorSMSAplus(){
		return $this->denominatorSMSAplus;
	}

	/**
	 * @return snare_capture - varchar(255)
	 */
	public function getsnare_capture(){
		return $this->snare_capture;
	}

	/**
	 * @return edit - varchar(255)
	 */
	public function getedit(){
		return $this->edit;
	}

	/**
	 * @return date_procedure - date
	 */
	public function getdate_procedure(){
		return $this->date_procedure;
	}

	/**
	 * @return weighted_fraction - varchar(255)
	 */
	public function getweighted_fraction(){
		return $this->weighted_fraction;
	}

	/**
	 * @return global_numerator - varchar(255)
	 */
	public function getglobal_numerator(){
		return $this->global_numerator;
	}

	/**
	 * @return injection_numerator - varchar(255)
	 */
	public function getinjection_numerator(){
		return $this->injection_numerator;
	}

	/**
	 * @return snare_numerator - varchar(255)
	 */
	public function getsnare_numerator(){
		return $this->snare_numerator;
	}

	/**
	 * @return safety_numerator - varchar(255)
	 */
	public function getsafety_numerator(){
		return $this->safety_numerator;
	}

	/**
	 * @return defect_numerator - varchar(255)
	 */
	public function getdefect_numerator(){
		return $this->defect_numerator;
	}

	/**
	 * @return accessory_numerator - varchar(255)
	 */
	public function getaccessory_numerator(){
		return $this->accessory_numerator;
	}

	/**
	 * @return global_denominator - varchar(255)
	 */
	public function getglobal_denominator(){
		return $this->global_denominator;
	}

	/**
	 * @return injection_denominator - varchar(255)
	 */
	public function getinjection_denominator(){
		return $this->injection_denominator;
	}

	/**
	 * @return snare_denominator - varchar(255)
	 */
	public function getsnare_denominator(){
		return $this->snare_denominator;
	}

	/**
	 * @return safety_denominator - varchar(255)
	 */
	public function getsafety_denominator(){
		return $this->safety_denominator;
	}

	/**
	 * @return defect_denominator - varchar(255)
	 */
	public function getdefect_denominator(){
		return $this->defect_denominator;
	}

	/**
	 * @return accessory_denominator - varchar(255)
	 */
	public function getaccessory_denominator(){
		return $this->accessory_denominator;
	}

	/**
	 * @return type_polypectomy - varchar(255)
	 */
	public function gettype_polypectomy(){
		return $this->type_polypectomy;
	}

	/**
	 * @return complete - varchar(255)
	 */
	public function getcomplete(){
		return $this->complete;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setuser_gpat_id($user_gpat_id){
		$this->user_gpat_id = $user_gpat_id;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function settip_control($tip_control){
		$this->tip_control = $tip_control;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setextent($extent){
		$this->extent = $extent;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setpositioning($positioning){
		$this->positioning = $positioning;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setappropriate_technique($appropriate_technique){
		$this->appropriate_technique = $appropriate_technique;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setinjection_plane($injection_plane){
		$this->injection_plane = $injection_plane;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setinjection_dynamic($injection_dynamic){
		$this->injection_dynamic = $injection_dynamic;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setinjection_access($injection_access){
		$this->injection_access = $injection_access;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setsnare_size($snare_size){
		$this->snare_size = $snare_size;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setsnare_position($snare_position){
		$this->snare_position = $snare_position;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setsnare_visualised($snare_visualised){
		$this->snare_visualised = $snare_visualised;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setresidual($residual){
		$this->residual = $residual;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setindependent_movement($independent_movement){
		$this->independent_movement = $independent_movement;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setlift_movement($lift_movement){
		$this->lift_movement = $lift_movement;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setmucosa($mucosa){
		$this->mucosa = $mucosa;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setthermal_ablation($thermal_ablation){
		$this->thermal_ablation = $thermal_ablation;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setsubmucosa($submucosa){
		$this->submucosa = $submucosa;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setmuscularis($muscularis){
		$this->muscularis = $muscularis;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setclip_placement($clip_placement){
		$this->clip_placement = $clip_placement;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setretrieval_device($retrieval_device){
		$this->retrieval_device = $retrieval_device;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setcoag_grasper($coag_grasper){
		$this->coag_grasper = $coag_grasper;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setsize($size){
		$this->size = $size;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setmorphology($morphology){
		$this->morphology = $morphology;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setsite($site){
		$this->site = $site;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setaccess($access){
		$this->access = $access;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setsize_40_smsaplus($size_40_smsaplus){
		$this->size_40_smsaplus = $size_40_smsaplus;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setnongranular_smsaplus($nongranular_smsaplus){
		$this->nongranular_smsaplus = $nongranular_smsaplus;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setnon_lifting($non_lifting){
		$this->non_lifting = $non_lifting;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setlocation_difficult($location_difficult){
		$this->location_difficult = $location_difficult;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setuser_id($user_id){
		$this->user_id = $user_id;
	}

	/**
	 * @param Type: timestamp
	 */
	public function setcreated($created){
		$this->created = $created;
	}

	/**
	 * @param Type: timestamp
	 */
	public function setupdated($updated){
		$this->updated = $updated;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setnumeratorSum($numeratorSum){
		$this->numeratorSum = $numeratorSum;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setdenominatorSum($denominatorSum){
		$this->denominatorSum = $denominatorSum;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setfraction($fraction){
		$this->fraction = $fraction;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setSMSA_total($SMSA_total){
		$this->SMSA_total = $SMSA_total;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setSMSA_group($SMSA_group){
		$this->SMSA_group = $SMSA_group;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setnumeratorSMSAplus($numeratorSMSAplus){
		$this->numeratorSMSAplus = $numeratorSMSAplus;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setdenominatorSMSAplus($denominatorSMSAplus){
		$this->denominatorSMSAplus = $denominatorSMSAplus;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setsnare_capture($snare_capture){
		$this->snare_capture = $snare_capture;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setedit($edit){
		$this->edit = $edit;
	}

	/**
	 * @param Type: date
	 */
	public function setdate_procedure($date_procedure){
		$this->date_procedure = $date_procedure;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setweighted_fraction($weighted_fraction){
		$this->weighted_fraction = $weighted_fraction;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setglobal_numerator($global_numerator){
		$this->global_numerator = $global_numerator;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setinjection_numerator($injection_numerator){
		$this->injection_numerator = $injection_numerator;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setsnare_numerator($snare_numerator){
		$this->snare_numerator = $snare_numerator;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setsafety_numerator($safety_numerator){
		$this->safety_numerator = $safety_numerator;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setdefect_numerator($defect_numerator){
		$this->defect_numerator = $defect_numerator;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setaccessory_numerator($accessory_numerator){
		$this->accessory_numerator = $accessory_numerator;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setglobal_denominator($global_denominator){
		$this->global_denominator = $global_denominator;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setinjection_denominator($injection_denominator){
		$this->injection_denominator = $injection_denominator;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setsnare_denominator($snare_denominator){
		$this->snare_denominator = $snare_denominator;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setsafety_denominator($safety_denominator){
		$this->safety_denominator = $safety_denominator;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setdefect_denominator($defect_denominator){
		$this->defect_denominator = $defect_denominator;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setaccessory_denominator($accessory_denominator){
		$this->accessory_denominator = $accessory_denominator;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function settype_polypectomy($type_polypectomy){
		$this->type_polypectomy = $type_polypectomy;
	}

	/**
	 * @param Type: varchar(255)
	 */
	public function setcomplete($complete){
		$this->complete = $complete;
	}

    /**
     * Close mysql connection
     */
	public function endgpat_score(){
		$this->connection->CloseMysql();
	}

}