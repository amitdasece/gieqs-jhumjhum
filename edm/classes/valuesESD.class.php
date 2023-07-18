<?php
/*
 * Author: David Tate  - www.endoscopy.wiki 
 * 
 * Create Date: 29-10-2019
 * 
 * DJT 2019
 * 
 * License: LGPL 
 * 
 */
require_once 'DataBaseMysqlPDO.class.php';

Class valuesESD {

	private $id; //int(11)
	private $Admit_reason; //int(1)
	private $Admit_reason_t; //varchar(12)
	private $AdjuvantTreatment; //int(1)
	private $AdjuvantTreatment_t; //varchar(12)
	private $Antiplatelet; //int(1)
	private $Antiplatelet_t; //varchar(11)
	private $Bleeding_severity; //int(1)
	private $Bleeding_severity_t; //varchar(59)
	private $Comp_other; //int(1)
	private $Comp_other_t; //varchar(32)
	private $Comp_perf; //int(1)
	private $Comp_perf_t; //varchar(26)
	private $Complications; //int(1)
	private $Complications_t; //varchar(3)
	private $ClinicalCriteria; //int(1)
	private $ClinicalCriteria_t; //varchar(8)
	private $Differentiation; //int(1)
	private $Differentiation_t; //varchar(6)
	private $Ethnicity; //int(1)
	private $Ethnicity_t; //varchar(15)
	private $Fellow; //int(1)
	private $Fellow_t; //varchar(4)
	private $GA; //int(1)
	private $GA_t; //varchar(8)
	private $Hemostatic_method_DB; //int(1)
	private $Hemostatic_method_DB_t; //varchar(18)
	private $Histology; //int(1)
	private $Histology_t; //varchar(11)
	private $Indication; //int(1)
	private $Indication_t; //varchar(28)
	private $Injectate; //int(1)
	private $Injectate_t; //varchar(10)
	private $IPB_tx; //int(1)
	private $IPB_tx_t; //varchar(10)
	private $Knife; //int(1)
	private $Knife_t; //varchar(6)
	private $location; //int(2)
	private $location_t; //varchar(19)
	private $Paris; //int(1)
	private $Paris_t; //varchar(6)
	private $Perf_tx; //int(1)
	private $Perf_tx_t; //varchar(9)
	private $pre_resect_histo; //int(1)
	private $pre_resect_histo_t; //varchar(14)
	private $Prophylaxis_bleed; //int(1)
	private $Prophylaxis_bleed_t; //varchar(8)
	private $R0; //int(1)
	private $R0_t; //varchar(37)
	private $ScopeType; //int(1)
	private $ScopeType_t; //varchar(9)
	private $SE_Rx; //int(1)
	private $SE_Rx_t; //varchar(16)
	private $SE_HISTO_Rec_Res; //int(1)
	private $SE_HISTO_Rec_Res_t; //varchar(11)
	private $Sex; //int(1)
	private $Sex_t; //varchar(6)
	private $SMIDepth; //int(1)
	private $SMIDepth_t; //varchar(3)
	private $SurgTStage; //int(1)
	private $SurgTStage_t; //varchar(11)
	private $SurgLN; //int(1)
	private $SurgLN_t; //varchar(100)
	private $SurgM; //int(1)
	private $SurgM_t; //varchar(100)
	private $SurgicalRefBasedonHisto; //int(1)
	private $SurgicalRefBasedonHisto_t; //varchar(50)
	private $UltimateOutcome; //int(1)
	private $UltimateOutcome_t; //varchar(9)
	private $Yes_no; //int(1)
	private $Yes_no_t; //varchar(3)
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysqlPDOEDM();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_valuesESD($Admit_reason,$Admit_reason_t,$AdjuvantTreatment,$AdjuvantTreatment_t,$Antiplatelet,$Antiplatelet_t,$Bleeding_severity,$Bleeding_severity_t,$Comp_other,$Comp_other_t,$Comp_perf,$Comp_perf_t,$Complications,$Complications_t,$ClinicalCriteria,$ClinicalCriteria_t,$Differentiation,$Differentiation_t,$Ethnicity,$Ethnicity_t,$Fellow,$Fellow_t,$GA,$GA_t,$Hemostatic_method_DB,$Hemostatic_method_DB_t,$Histology,$Histology_t,$Indication,$Indication_t,$Injectate,$Injectate_t,$IPB_tx,$IPB_tx_t,$Knife,$Knife_t,$location,$location_t,$Paris,$Paris_t,$Perf_tx,$Perf_tx_t,$pre_resect_histo,$pre_resect_histo_t,$Prophylaxis_bleed,$Prophylaxis_bleed_t,$R0,$R0_t,$ScopeType,$ScopeType_t,$SE_Rx,$SE_Rx_t,$SE_HISTO_Rec_Res,$SE_HISTO_Rec_Res_t,$Sex,$Sex_t,$SMIDepth,$SMIDepth_t,$SurgTStage,$SurgTStage_t,$SurgLN,$SurgLN_t,$SurgM,$SurgM_t,$SurgicalRefBasedonHisto,$SurgicalRefBasedonHisto_t,$UltimateOutcome,$UltimateOutcome_t,$Yes_no,$Yes_no_t){
		$this->Admit_reason = $Admit_reason;
		$this->Admit_reason_t = $Admit_reason_t;
		$this->AdjuvantTreatment = $AdjuvantTreatment;
		$this->AdjuvantTreatment_t = $AdjuvantTreatment_t;
		$this->Antiplatelet = $Antiplatelet;
		$this->Antiplatelet_t = $Antiplatelet_t;
		$this->Bleeding_severity = $Bleeding_severity;
		$this->Bleeding_severity_t = $Bleeding_severity_t;
		$this->Comp_other = $Comp_other;
		$this->Comp_other_t = $Comp_other_t;
		$this->Comp_perf = $Comp_perf;
		$this->Comp_perf_t = $Comp_perf_t;
		$this->Complications = $Complications;
		$this->Complications_t = $Complications_t;
		$this->ClinicalCriteria = $ClinicalCriteria;
		$this->ClinicalCriteria_t = $ClinicalCriteria_t;
		$this->Differentiation = $Differentiation;
		$this->Differentiation_t = $Differentiation_t;
		$this->Ethnicity = $Ethnicity;
		$this->Ethnicity_t = $Ethnicity_t;
		$this->Fellow = $Fellow;
		$this->Fellow_t = $Fellow_t;
		$this->GA = $GA;
		$this->GA_t = $GA_t;
		$this->Hemostatic_method_DB = $Hemostatic_method_DB;
		$this->Hemostatic_method_DB_t = $Hemostatic_method_DB_t;
		$this->Histology = $Histology;
		$this->Histology_t = $Histology_t;
		$this->Indication = $Indication;
		$this->Indication_t = $Indication_t;
		$this->Injectate = $Injectate;
		$this->Injectate_t = $Injectate_t;
		$this->IPB_tx = $IPB_tx;
		$this->IPB_tx_t = $IPB_tx_t;
		$this->Knife = $Knife;
		$this->Knife_t = $Knife_t;
		$this->location = $location;
		$this->location_t = $location_t;
		$this->Paris = $Paris;
		$this->Paris_t = $Paris_t;
		$this->Perf_tx = $Perf_tx;
		$this->Perf_tx_t = $Perf_tx_t;
		$this->pre_resect_histo = $pre_resect_histo;
		$this->pre_resect_histo_t = $pre_resect_histo_t;
		$this->Prophylaxis_bleed = $Prophylaxis_bleed;
		$this->Prophylaxis_bleed_t = $Prophylaxis_bleed_t;
		$this->R0 = $R0;
		$this->R0_t = $R0_t;
		$this->ScopeType = $ScopeType;
		$this->ScopeType_t = $ScopeType_t;
		$this->SE_Rx = $SE_Rx;
		$this->SE_Rx_t = $SE_Rx_t;
		$this->SE_HISTO_Rec_Res = $SE_HISTO_Rec_Res;
		$this->SE_HISTO_Rec_Res_t = $SE_HISTO_Rec_Res_t;
		$this->Sex = $Sex;
		$this->Sex_t = $Sex_t;
		$this->SMIDepth = $SMIDepth;
		$this->SMIDepth_t = $SMIDepth_t;
		$this->SurgTStage = $SurgTStage;
		$this->SurgTStage_t = $SurgTStage_t;
		$this->SurgLN = $SurgLN;
		$this->SurgLN_t = $SurgLN_t;
		$this->SurgM = $SurgM;
		$this->SurgM_t = $SurgM_t;
		$this->SurgicalRefBasedonHisto = $SurgicalRefBasedonHisto;
		$this->SurgicalRefBasedonHisto_t = $SurgicalRefBasedonHisto_t;
		$this->UltimateOutcome = $UltimateOutcome;
		$this->UltimateOutcome_t = $UltimateOutcome_t;
		$this->Yes_no = $Yes_no;
		$this->Yes_no_t = $Yes_no_t;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from valuesESD where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->Admit_reason = $row["Admit_reason"];
			$this->Admit_reason_t = $row["Admit_reason_t"];
			$this->AdjuvantTreatment = $row["AdjuvantTreatment"];
			$this->AdjuvantTreatment_t = $row["AdjuvantTreatment_t"];
			$this->Antiplatelet = $row["Antiplatelet"];
			$this->Antiplatelet_t = $row["Antiplatelet_t"];
			$this->Bleeding_severity = $row["Bleeding_severity"];
			$this->Bleeding_severity_t = $row["Bleeding_severity_t"];
			$this->Comp_other = $row["Comp_other"];
			$this->Comp_other_t = $row["Comp_other_t"];
			$this->Comp_perf = $row["Comp_perf"];
			$this->Comp_perf_t = $row["Comp_perf_t"];
			$this->Complications = $row["Complications"];
			$this->Complications_t = $row["Complications_t"];
			$this->ClinicalCriteria = $row["ClinicalCriteria"];
			$this->ClinicalCriteria_t = $row["ClinicalCriteria_t"];
			$this->Differentiation = $row["Differentiation"];
			$this->Differentiation_t = $row["Differentiation_t"];
			$this->Ethnicity = $row["Ethnicity"];
			$this->Ethnicity_t = $row["Ethnicity_t"];
			$this->Fellow = $row["Fellow"];
			$this->Fellow_t = $row["Fellow_t"];
			$this->GA = $row["GA"];
			$this->GA_t = $row["GA_t"];
			$this->Hemostatic_method_DB = $row["Hemostatic_method_DB"];
			$this->Hemostatic_method_DB_t = $row["Hemostatic_method_DB_t"];
			$this->Histology = $row["Histology"];
			$this->Histology_t = $row["Histology_t"];
			$this->Indication = $row["Indication"];
			$this->Indication_t = $row["Indication_t"];
			$this->Injectate = $row["Injectate"];
			$this->Injectate_t = $row["Injectate_t"];
			$this->IPB_tx = $row["IPB_tx"];
			$this->IPB_tx_t = $row["IPB_tx_t"];
			$this->Knife = $row["Knife"];
			$this->Knife_t = $row["Knife_t"];
			$this->location = $row["location"];
			$this->location_t = $row["location_t"];
			$this->Paris = $row["Paris"];
			$this->Paris_t = $row["Paris_t"];
			$this->Perf_tx = $row["Perf_tx"];
			$this->Perf_tx_t = $row["Perf_tx_t"];
			$this->pre_resect_histo = $row["pre_resect_histo"];
			$this->pre_resect_histo_t = $row["pre_resect_histo_t"];
			$this->Prophylaxis_bleed = $row["Prophylaxis_bleed"];
			$this->Prophylaxis_bleed_t = $row["Prophylaxis_bleed_t"];
			$this->R0 = $row["R0"];
			$this->R0_t = $row["R0_t"];
			$this->ScopeType = $row["ScopeType"];
			$this->ScopeType_t = $row["ScopeType_t"];
			$this->SE_Rx = $row["SE_Rx"];
			$this->SE_Rx_t = $row["SE_Rx_t"];
			$this->SE_HISTO_Rec_Res = $row["SE_HISTO_Rec_Res"];
			$this->SE_HISTO_Rec_Res_t = $row["SE_HISTO_Rec_Res_t"];
			$this->Sex = $row["Sex"];
			$this->Sex_t = $row["Sex_t"];
			$this->SMIDepth = $row["SMIDepth"];
			$this->SMIDepth_t = $row["SMIDepth_t"];
			$this->SurgTStage = $row["SurgTStage"];
			$this->SurgTStage_t = $row["SurgTStage_t"];
			$this->SurgLN = $row["SurgLN"];
			$this->SurgLN_t = $row["SurgLN_t"];
			$this->SurgM = $row["SurgM"];
			$this->SurgM_t = $row["SurgM_t"];
			$this->SurgicalRefBasedonHisto = $row["SurgicalRefBasedonHisto"];
			$this->SurgicalRefBasedonHisto_t = $row["SurgicalRefBasedonHisto_t"];
			$this->UltimateOutcome = $row["UltimateOutcome"];
			$this->UltimateOutcome_t = $row["UltimateOutcome_t"];
			$this->Yes_no = $row["Yes_no"];
			$this->Yes_no_t = $row["Yes_no_t"];
		}
	}

    /**
     * Checks if the specified record exists
     *
     * @param key_table_type $key_row
     *
     */
	public function matchRecord($key_row){
		$result = $this->connection->RunQuery("Select * from valuesESD where id = \'$key_row\' ");
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
		return $this->connection->TotalOfRows('valuesESD');
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
$q = "INSERT INTO `valuesESD` ($keys) VALUES ($keys2)";
		
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
$q = "UPDATE `valuesESD` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$this->connection->RunQuery("DELETE FROM valuesESD WHERE id = $key_row");
		$result->rowCount();
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT id from valuesESD order by $column $order");
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
	 * @return Admit_reason - int(1)
	 */
	public function getAdmit_reason(){
		return $this->Admit_reason;
	}

	/**
	 * @return Admit_reason_t - varchar(12)
	 */
	public function getAdmit_reason_t(){
		return $this->Admit_reason_t;
	}

	/**
	 * @return AdjuvantTreatment - int(1)
	 */
	public function getAdjuvantTreatment(){
		return $this->AdjuvantTreatment;
	}

	/**
	 * @return AdjuvantTreatment_t - varchar(12)
	 */
	public function getAdjuvantTreatment_t(){
		return $this->AdjuvantTreatment_t;
	}

	/**
	 * @return Antiplatelet - int(1)
	 */
	public function getAntiplatelet(){
		return $this->Antiplatelet;
	}

	/**
	 * @return Antiplatelet_t - varchar(11)
	 */
	public function getAntiplatelet_t(){
		return $this->Antiplatelet_t;
	}

	/**
	 * @return Bleeding_severity - int(1)
	 */
	public function getBleeding_severity(){
		return $this->Bleeding_severity;
	}

	/**
	 * @return Bleeding_severity_t - varchar(59)
	 */
	public function getBleeding_severity_t(){
		return $this->Bleeding_severity_t;
	}

	/**
	 * @return Comp_other - int(1)
	 */
	public function getComp_other(){
		return $this->Comp_other;
	}

	/**
	 * @return Comp_other_t - varchar(32)
	 */
	public function getComp_other_t(){
		return $this->Comp_other_t;
	}

	/**
	 * @return Comp_perf - int(1)
	 */
	public function getComp_perf(){
		return $this->Comp_perf;
	}

	/**
	 * @return Comp_perf_t - varchar(26)
	 */
	public function getComp_perf_t(){
		return $this->Comp_perf_t;
	}

	/**
	 * @return Complications - int(1)
	 */
	public function getComplications(){
		return $this->Complications;
	}

	/**
	 * @return Complications_t - varchar(3)
	 */
	public function getComplications_t(){
		return $this->Complications_t;
	}

	/**
	 * @return ClinicalCriteria - int(1)
	 */
	public function getClinicalCriteria(){
		return $this->ClinicalCriteria;
	}

	/**
	 * @return ClinicalCriteria_t - varchar(8)
	 */
	public function getClinicalCriteria_t(){
		return $this->ClinicalCriteria_t;
	}

	/**
	 * @return Differentiation - int(1)
	 */
	public function getDifferentiation(){
		return $this->Differentiation;
	}

	/**
	 * @return Differentiation_t - varchar(6)
	 */
	public function getDifferentiation_t(){
		return $this->Differentiation_t;
	}

	/**
	 * @return Ethnicity - int(1)
	 */
	public function getEthnicity(){
		return $this->Ethnicity;
	}

	/**
	 * @return Ethnicity_t - varchar(15)
	 */
	public function getEthnicity_t(){
		return $this->Ethnicity_t;
	}

	/**
	 * @return Fellow - int(1)
	 */
	public function getFellow(){
		return $this->Fellow;
	}

	/**
	 * @return Fellow_t - varchar(4)
	 */
	public function getFellow_t(){
		return $this->Fellow_t;
	}

	/**
	 * @return GA - int(1)
	 */
	public function getGA(){
		return $this->GA;
	}

	/**
	 * @return GA_t - varchar(8)
	 */
	public function getGA_t(){
		return $this->GA_t;
	}

	/**
	 * @return Hemostatic_method_DB - int(1)
	 */
	public function getHemostatic_method_DB(){
		return $this->Hemostatic_method_DB;
	}

	/**
	 * @return Hemostatic_method_DB_t - varchar(18)
	 */
	public function getHemostatic_method_DB_t(){
		return $this->Hemostatic_method_DB_t;
	}

	/**
	 * @return Histology - int(1)
	 */
	public function getHistology(){
		return $this->Histology;
	}

	/**
	 * @return Histology_t - varchar(11)
	 */
	public function getHistology_t(){
		return $this->Histology_t;
	}

	/**
	 * @return Indication - int(1)
	 */
	public function getIndication(){
		return $this->Indication;
	}

	/**
	 * @return Indication_t - varchar(28)
	 */
	public function getIndication_t(){
		return $this->Indication_t;
	}

	/**
	 * @return Injectate - int(1)
	 */
	public function getInjectate(){
		return $this->Injectate;
	}

	/**
	 * @return Injectate_t - varchar(10)
	 */
	public function getInjectate_t(){
		return $this->Injectate_t;
	}

	/**
	 * @return IPB_tx - int(1)
	 */
	public function getIPB_tx(){
		return $this->IPB_tx;
	}

	/**
	 * @return IPB_tx_t - varchar(10)
	 */
	public function getIPB_tx_t(){
		return $this->IPB_tx_t;
	}

	/**
	 * @return Knife - int(1)
	 */
	public function getKnife(){
		return $this->Knife;
	}

	/**
	 * @return Knife_t - varchar(6)
	 */
	public function getKnife_t(){
		return $this->Knife_t;
	}

	/**
	 * @return location - int(2)
	 */
	public function getlocation(){
		return $this->location;
	}

	/**
	 * @return location_t - varchar(19)
	 */
	public function getlocation_t(){
		return $this->location_t;
	}

	/**
	 * @return Paris - int(1)
	 */
	public function getParis(){
		return $this->Paris;
	}

	/**
	 * @return Paris_t - varchar(6)
	 */
	public function getParis_t(){
		return $this->Paris_t;
	}

	/**
	 * @return Perf_tx - int(1)
	 */
	public function getPerf_tx(){
		return $this->Perf_tx;
	}

	/**
	 * @return Perf_tx_t - varchar(9)
	 */
	public function getPerf_tx_t(){
		return $this->Perf_tx_t;
	}

	/**
	 * @return pre_resect_histo - int(1)
	 */
	public function getpre_resect_histo(){
		return $this->pre_resect_histo;
	}

	/**
	 * @return pre_resect_histo_t - varchar(14)
	 */
	public function getpre_resect_histo_t(){
		return $this->pre_resect_histo_t;
	}

	/**
	 * @return Prophylaxis_bleed - int(1)
	 */
	public function getProphylaxis_bleed(){
		return $this->Prophylaxis_bleed;
	}

	/**
	 * @return Prophylaxis_bleed_t - varchar(8)
	 */
	public function getProphylaxis_bleed_t(){
		return $this->Prophylaxis_bleed_t;
	}

	/**
	 * @return R0 - int(1)
	 */
	public function getR0(){
		return $this->R0;
	}

	/**
	 * @return R0_t - varchar(37)
	 */
	public function getR0_t(){
		return $this->R0_t;
	}

	/**
	 * @return ScopeType - int(1)
	 */
	public function getScopeType(){
		return $this->ScopeType;
	}

	/**
	 * @return ScopeType_t - varchar(9)
	 */
	public function getScopeType_t(){
		return $this->ScopeType_t;
	}

	/**
	 * @return SE_Rx - int(1)
	 */
	public function getSE_Rx(){
		return $this->SE_Rx;
	}

	/**
	 * @return SE_Rx_t - varchar(16)
	 */
	public function getSE_Rx_t(){
		return $this->SE_Rx_t;
	}

	/**
	 * @return SE_HISTO_Rec_Res - int(1)
	 */
	public function getSE_HISTO_Rec_Res(){
		return $this->SE_HISTO_Rec_Res;
	}

	/**
	 * @return SE_HISTO_Rec_Res_t - varchar(11)
	 */
	public function getSE_HISTO_Rec_Res_t(){
		return $this->SE_HISTO_Rec_Res_t;
	}

	/**
	 * @return Sex - int(1)
	 */
	public function getSex(){
		return $this->Sex;
	}

	/**
	 * @return Sex_t - varchar(6)
	 */
	public function getSex_t(){
		return $this->Sex_t;
	}

	/**
	 * @return SMIDepth - int(1)
	 */
	public function getSMIDepth(){
		return $this->SMIDepth;
	}

	/**
	 * @return SMIDepth_t - varchar(3)
	 */
	public function getSMIDepth_t(){
		return $this->SMIDepth_t;
	}

	/**
	 * @return SurgTStage - int(1)
	 */
	public function getSurgTStage(){
		return $this->SurgTStage;
	}

	/**
	 * @return SurgTStage_t - varchar(11)
	 */
	public function getSurgTStage_t(){
		return $this->SurgTStage_t;
	}

	/**
	 * @return SurgLN - int(1)
	 */
	public function getSurgLN(){
		return $this->SurgLN;
	}

	/**
	 * @return SurgLN_t - varchar(100)
	 */
	public function getSurgLN_t(){
		return $this->SurgLN_t;
	}

	/**
	 * @return SurgM - int(1)
	 */
	public function getSurgM(){
		return $this->SurgM;
	}

	/**
	 * @return SurgM_t - varchar(100)
	 */
	public function getSurgM_t(){
		return $this->SurgM_t;
	}

	/**
	 * @return SurgicalRefBasedonHisto - int(1)
	 */
	public function getSurgicalRefBasedonHisto(){
		return $this->SurgicalRefBasedonHisto;
	}

	/**
	 * @return SurgicalRefBasedonHisto_t - varchar(50)
	 */
	public function getSurgicalRefBasedonHisto_t(){
		return $this->SurgicalRefBasedonHisto_t;
	}

	/**
	 * @return UltimateOutcome - int(1)
	 */
	public function getUltimateOutcome(){
		return $this->UltimateOutcome;
	}

	/**
	 * @return UltimateOutcome_t - varchar(9)
	 */
	public function getUltimateOutcome_t(){
		return $this->UltimateOutcome_t;
	}

	/**
	 * @return Yes_no - int(1)
	 */
	public function getYes_no(){
		return $this->Yes_no;
	}

	/**
	 * @return Yes_no_t - varchar(3)
	 */
	public function getYes_no_t(){
		return $this->Yes_no_t;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAdmit_reason($Admit_reason){
		$this->Admit_reason = $Admit_reason;
	}

	/**
	 * @param Type: varchar(12)
	 */
	public function setAdmit_reason_t($Admit_reason_t){
		$this->Admit_reason_t = $Admit_reason_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAdjuvantTreatment($AdjuvantTreatment){
		$this->AdjuvantTreatment = $AdjuvantTreatment;
	}

	/**
	 * @param Type: varchar(12)
	 */
	public function setAdjuvantTreatment_t($AdjuvantTreatment_t){
		$this->AdjuvantTreatment_t = $AdjuvantTreatment_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAntiplatelet($Antiplatelet){
		$this->Antiplatelet = $Antiplatelet;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setAntiplatelet_t($Antiplatelet_t){
		$this->Antiplatelet_t = $Antiplatelet_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setBleeding_severity($Bleeding_severity){
		$this->Bleeding_severity = $Bleeding_severity;
	}

	/**
	 * @param Type: varchar(59)
	 */
	public function setBleeding_severity_t($Bleeding_severity_t){
		$this->Bleeding_severity_t = $Bleeding_severity_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setComp_other($Comp_other){
		$this->Comp_other = $Comp_other;
	}

	/**
	 * @param Type: varchar(32)
	 */
	public function setComp_other_t($Comp_other_t){
		$this->Comp_other_t = $Comp_other_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setComp_perf($Comp_perf){
		$this->Comp_perf = $Comp_perf;
	}

	/**
	 * @param Type: varchar(26)
	 */
	public function setComp_perf_t($Comp_perf_t){
		$this->Comp_perf_t = $Comp_perf_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setComplications($Complications){
		$this->Complications = $Complications;
	}

	/**
	 * @param Type: varchar(3)
	 */
	public function setComplications_t($Complications_t){
		$this->Complications_t = $Complications_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setClinicalCriteria($ClinicalCriteria){
		$this->ClinicalCriteria = $ClinicalCriteria;
	}

	/**
	 * @param Type: varchar(8)
	 */
	public function setClinicalCriteria_t($ClinicalCriteria_t){
		$this->ClinicalCriteria_t = $ClinicalCriteria_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setDifferentiation($Differentiation){
		$this->Differentiation = $Differentiation;
	}

	/**
	 * @param Type: varchar(6)
	 */
	public function setDifferentiation_t($Differentiation_t){
		$this->Differentiation_t = $Differentiation_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setEthnicity($Ethnicity){
		$this->Ethnicity = $Ethnicity;
	}

	/**
	 * @param Type: varchar(15)
	 */
	public function setEthnicity_t($Ethnicity_t){
		$this->Ethnicity_t = $Ethnicity_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setFellow($Fellow){
		$this->Fellow = $Fellow;
	}

	/**
	 * @param Type: varchar(4)
	 */
	public function setFellow_t($Fellow_t){
		$this->Fellow_t = $Fellow_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setGA($GA){
		$this->GA = $GA;
	}

	/**
	 * @param Type: varchar(8)
	 */
	public function setGA_t($GA_t){
		$this->GA_t = $GA_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setHemostatic_method_DB($Hemostatic_method_DB){
		$this->Hemostatic_method_DB = $Hemostatic_method_DB;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setHemostatic_method_DB_t($Hemostatic_method_DB_t){
		$this->Hemostatic_method_DB_t = $Hemostatic_method_DB_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setHistology($Histology){
		$this->Histology = $Histology;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setHistology_t($Histology_t){
		$this->Histology_t = $Histology_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setIndication($Indication){
		$this->Indication = $Indication;
	}

	/**
	 * @param Type: varchar(28)
	 */
	public function setIndication_t($Indication_t){
		$this->Indication_t = $Indication_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setInjectate($Injectate){
		$this->Injectate = $Injectate;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setInjectate_t($Injectate_t){
		$this->Injectate_t = $Injectate_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setIPB_tx($IPB_tx){
		$this->IPB_tx = $IPB_tx;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setIPB_tx_t($IPB_tx_t){
		$this->IPB_tx_t = $IPB_tx_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setKnife($Knife){
		$this->Knife = $Knife;
	}

	/**
	 * @param Type: varchar(6)
	 */
	public function setKnife_t($Knife_t){
		$this->Knife_t = $Knife_t;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setlocation($location){
		$this->location = $location;
	}

	/**
	 * @param Type: varchar(19)
	 */
	public function setlocation_t($location_t){
		$this->location_t = $location_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setParis($Paris){
		$this->Paris = $Paris;
	}

	/**
	 * @param Type: varchar(6)
	 */
	public function setParis_t($Paris_t){
		$this->Paris_t = $Paris_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPerf_tx($Perf_tx){
		$this->Perf_tx = $Perf_tx;
	}

	/**
	 * @param Type: varchar(9)
	 */
	public function setPerf_tx_t($Perf_tx_t){
		$this->Perf_tx_t = $Perf_tx_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setpre_resect_histo($pre_resect_histo){
		$this->pre_resect_histo = $pre_resect_histo;
	}

	/**
	 * @param Type: varchar(14)
	 */
	public function setpre_resect_histo_t($pre_resect_histo_t){
		$this->pre_resect_histo_t = $pre_resect_histo_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setProphylaxis_bleed($Prophylaxis_bleed){
		$this->Prophylaxis_bleed = $Prophylaxis_bleed;
	}

	/**
	 * @param Type: varchar(8)
	 */
	public function setProphylaxis_bleed_t($Prophylaxis_bleed_t){
		$this->Prophylaxis_bleed_t = $Prophylaxis_bleed_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setR0($R0){
		$this->R0 = $R0;
	}

	/**
	 * @param Type: varchar(37)
	 */
	public function setR0_t($R0_t){
		$this->R0_t = $R0_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setScopeType($ScopeType){
		$this->ScopeType = $ScopeType;
	}

	/**
	 * @param Type: varchar(9)
	 */
	public function setScopeType_t($ScopeType_t){
		$this->ScopeType_t = $ScopeType_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSE_Rx($SE_Rx){
		$this->SE_Rx = $SE_Rx;
	}

	/**
	 * @param Type: varchar(16)
	 */
	public function setSE_Rx_t($SE_Rx_t){
		$this->SE_Rx_t = $SE_Rx_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSE_HISTO_Rec_Res($SE_HISTO_Rec_Res){
		$this->SE_HISTO_Rec_Res = $SE_HISTO_Rec_Res;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setSE_HISTO_Rec_Res_t($SE_HISTO_Rec_Res_t){
		$this->SE_HISTO_Rec_Res_t = $SE_HISTO_Rec_Res_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSex($Sex){
		$this->Sex = $Sex;
	}

	/**
	 * @param Type: varchar(6)
	 */
	public function setSex_t($Sex_t){
		$this->Sex_t = $Sex_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSMIDepth($SMIDepth){
		$this->SMIDepth = $SMIDepth;
	}

	/**
	 * @param Type: varchar(3)
	 */
	public function setSMIDepth_t($SMIDepth_t){
		$this->SMIDepth_t = $SMIDepth_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSurgTStage($SurgTStage){
		$this->SurgTStage = $SurgTStage;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setSurgTStage_t($SurgTStage_t){
		$this->SurgTStage_t = $SurgTStage_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSurgLN($SurgLN){
		$this->SurgLN = $SurgLN;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setSurgLN_t($SurgLN_t){
		$this->SurgLN_t = $SurgLN_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSurgM($SurgM){
		$this->SurgM = $SurgM;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setSurgM_t($SurgM_t){
		$this->SurgM_t = $SurgM_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSurgicalRefBasedonHisto($SurgicalRefBasedonHisto){
		$this->SurgicalRefBasedonHisto = $SurgicalRefBasedonHisto;
	}

	/**
	 * @param Type: varchar(50)
	 */
	public function setSurgicalRefBasedonHisto_t($SurgicalRefBasedonHisto_t){
		$this->SurgicalRefBasedonHisto_t = $SurgicalRefBasedonHisto_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setUltimateOutcome($UltimateOutcome){
		$this->UltimateOutcome = $UltimateOutcome;
	}

	/**
	 * @param Type: varchar(9)
	 */
	public function setUltimateOutcome_t($UltimateOutcome_t){
		$this->UltimateOutcome_t = $UltimateOutcome_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setYes_no($Yes_no){
		$this->Yes_no = $Yes_no;
	}

	/**
	 * @param Type: varchar(3)
	 */
	public function setYes_no_t($Yes_no_t){
		$this->Yes_no_t = $Yes_no_t;
	}

	

    /**
     * Close mysql connection
     */
	public function endvaluesESD(){
		$this->connection->CloseMysql();
	}

}