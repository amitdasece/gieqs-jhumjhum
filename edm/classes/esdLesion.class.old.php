<?php
/*
 * Author: David Tate  - www.endoscopy.wiki 
 * 
 * Create Date: 26-10-2019
 * 
 * DJT 2019
 * 
 * License: LGPL 
 * 
 */

;
require_once 'DataBaseMysqlPDO.class.php';

Class esdLesion {

	private $_k_lesion; //int(11)
	private $_k_procedure; //varchar(10)
	private $AGE; //varchar(4)
	private $Ethnicity; //varchar(10)
	private $Dateofprocedure; //datetime
	private $Duplicate; //int(1)
	private $Gender; //int(1)
	private $IndicationforESD; //int(1)
	private $Preresectionbiopsydone; //int(1)
	private $PreresectionHistology; //int(1)
	private $Scopetype; //int(1)
	private $Knifetype; //int(1)
	private $Injectate; //int(1)
	private $Length_min; //int(3)
	private $ASAscore; //int(1)
	private $GAvssedation; //int(1)
	private $Admitted; //int(1)
	private $Complications; //int(1)
	private $comp_IPB; //int(1)
	private $Prophylaxis_bleed; //int(1)
	private $comp_perf; //int(1)
	private $comp_DB; //int(1)
	private $Mortality; //int(1)
	private $lesionlocation; //int(1)
	private $lesionlocationdetail; //varchar(200)
	private $lesion_Paris; //int(1)
	private $ulceration; //int(1)
	private $lesionsize_mm; //int(2)
	private $En_bloc; //int(1)
	private $Historemarks; //varchar(10)
	private $Numberofresectionspecimens; //int(1)
	private $Completeendoscopicresectionachieved; //int(1)
	private $Histology; //varchar(100)
	private $HistologyHGD; //varchar(100)
	private $Completepathologicalresection_R0; //varchar(100)
	private $MarginVerticalPos; //varchar(10)
	private $MarginHorizPos; //varchar(10)
	private $ClinicalCriteria; //varchar(10)
	private $SurgicalRefBasedonHisto; //varchar(10)
	private $SurgDueToFail; //varchar(10)
	private $UnderwentSurgeryatIndex; //varchar(10)
	private $SurgeryDuringSurveillance; //varchar(10)
	private $NoSurgerySoSurveillance; //varchar(10)
	private $DeclinedSurgery; //varchar(10)
	private $AwaitingSurgOutcome; //varchar(10)
	private $WhyDeclinedSurgery; //varchar(10)
	private $SurgResidual; //varchar(10)
	private $SurgLN; //varchar(10)
	private $SurgTStage; //varchar(10)
	private $SurgM; //varchar(10)
	private $SurgNotes; //varchar(10)
	private $SMI; //varchar(10)
	private $SMDepth; //varchar(10)
	private $Differentiation; //varchar(10)
	private $LVI; //varchar(10)
	private $WhyNoSC1; //varchar(10)
	private $CompletedSE1; //varchar(10)
	private $SE_1date; //varchar(10)
	private $SE_time_new; //varchar(10)
	private $SE_1endo_Rec_Res; //varchar(10)
	private $SE_1HISTO_Rec_Res; //varchar(10)
	private $SE_1Treatment; //varchar(10)
	private $CompletedSE2; //varchar(10)
	private $WhyNoSC2; //varchar(200)
	private $DueSC2; //varchar(10)
	private $ExplainSC2; //varchar(10)
	private $SE_2date; //varchar(10)
	private $SE_2endo_Rec_Res; //varchar(10)
	private $SE_2HISTO_Rec_Res; //varchar(10)
	private $SE_2Treatment; //varchar(10)
	private $MonthsToSEMostRecent; //varchar(10)
	private $SE_MostRecentdate; //varchar(10)
	private $SE_MostRecentendo_Rec_Res; //varchar(10)
	private $SE_MostRecentHISTO_Rec_Res; //varchar(10)
	private $SE_MostRecentTreatment; //varchar(10)
	private $clearofdiseaseonlatestSE; //varchar(10)
	private $Numberoffollow_upscopes; //varchar(10)
	private $Monthsindextolastscope; //varchar(10)
	private $Ultimateoutcome; //varchar(10)
	private $FullThicknessPerf; //varchar(10)
	private $Historemarks2; //varchar(10)
	private $HistologyCriteriaLGDNew; //varchar(10)
	private $AdjuvantTreatment; //varchar(10)
	private $created; //timestamp
	private $updated; //timestamp
	private $connection;

	public function esdLesion(){
		$this->connection = new DataBaseMysqlPDOEDM();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_esdLesion($_k_procedure,$AGE,$Ethnicity,$Dateofprocedure,$Duplicate,$Gender,$IndicationforESD,$Preresectionbiopsydone,$PreresectionHistology,$Scopetype,$Knifetype,$Injectate,$Length_min,$ASAscore,$GAvssedation,$Admitted,$Complications,$comp_IPB,$Prophylaxis_bleed,$comp_perf,$comp_DB,$Mortality,$lesionlocation,$lesionlocationdetail,$lesion_Paris,$ulceration,$lesionsize_mm,$En_bloc,$Historemarks,$Numberofresectionspecimens,$Completeendoscopicresectionachieved,$Histology,$HistologyHGD,$Completepathologicalresection_R0,$MarginVerticalPos,$MarginHorizPos,$ClinicalCriteria,$SurgicalRefBasedonHisto,$SurgDueToFail,$UnderwentSurgeryatIndex,$SurgeryDuringSurveillance,$NoSurgerySoSurveillance,$DeclinedSurgery,$AwaitingSurgOutcome,$WhyDeclinedSurgery,$SurgResidual,$SurgLN,$SurgTStage,$SurgM,$SurgNotes,$SMI,$SMDepth,$Differentiation,$LVI,$WhyNoSC1,$CompletedSE1,$SE_1date,$SE_time_new,$SE_1endo_Rec_Res,$SE_1HISTO_Rec_Res,$SE_1Treatment,$CompletedSE2,$WhyNoSC2,$DueSC2,$ExplainSC2,$SE_2date,$SE_2endo_Rec_Res,$SE_2HISTO_Rec_Res,$SE_2Treatment,$MonthsToSEMostRecent,$SE_MostRecentdate,$SE_MostRecentendo_Rec_Res,$SE_MostRecentHISTO_Rec_Res,$SE_MostRecentTreatment,$clearofdiseaseonlatestSE,$Numberoffollow_upscopes,$Monthsindextolastscope,$Ultimateoutcome,$FullThicknessPerf,$Historemarks2,$HistologyCriteriaLGDNew,$AdjuvantTreatment,$created,$updated){
		$this->_k_procedure = $_k_procedure;
		$this->AGE = $AGE;
		$this->Ethnicity = $Ethnicity;
		$this->Dateofprocedure = $Dateofprocedure;
		$this->Duplicate = $Duplicate;
		$this->Gender = $Gender;
		$this->IndicationforESD = $IndicationforESD;
		$this->Preresectionbiopsydone = $Preresectionbiopsydone;
		$this->PreresectionHistology = $PreresectionHistology;
		$this->Scopetype = $Scopetype;
		$this->Knifetype = $Knifetype;
		$this->Injectate = $Injectate;
		$this->Length_min = $Length_min;
		$this->ASAscore = $ASAscore;
		$this->GAvssedation = $GAvssedation;
		$this->Admitted = $Admitted;
		$this->Complications = $Complications;
		$this->comp_IPB = $comp_IPB;
		$this->Prophylaxis_bleed = $Prophylaxis_bleed;
		$this->comp_perf = $comp_perf;
		$this->comp_DB = $comp_DB;
		$this->Mortality = $Mortality;
		$this->lesionlocation = $lesionlocation;
		$this->lesionlocationdetail = $lesionlocationdetail;
		$this->lesion_Paris = $lesion_Paris;
		$this->ulceration = $ulceration;
		$this->lesionsize_mm = $lesionsize_mm;
		$this->En_bloc = $En_bloc;
		$this->Historemarks = $Historemarks;
		$this->Numberofresectionspecimens = $Numberofresectionspecimens;
		$this->Completeendoscopicresectionachieved = $Completeendoscopicresectionachieved;
		$this->Histology = $Histology;
		$this->HistologyHGD = $HistologyHGD;
		$this->Completepathologicalresection_R0 = $Completepathologicalresection_R0;
		$this->MarginVerticalPos = $MarginVerticalPos;
		$this->MarginHorizPos = $MarginHorizPos;
		$this->ClinicalCriteria = $ClinicalCriteria;
		$this->SurgicalRefBasedonHisto = $SurgicalRefBasedonHisto;
		$this->SurgDueToFail = $SurgDueToFail;
		$this->UnderwentSurgeryatIndex = $UnderwentSurgeryatIndex;
		$this->SurgeryDuringSurveillance = $SurgeryDuringSurveillance;
		$this->NoSurgerySoSurveillance = $NoSurgerySoSurveillance;
		$this->DeclinedSurgery = $DeclinedSurgery;
		$this->AwaitingSurgOutcome = $AwaitingSurgOutcome;
		$this->WhyDeclinedSurgery = $WhyDeclinedSurgery;
		$this->SurgResidual = $SurgResidual;
		$this->SurgLN = $SurgLN;
		$this->SurgTStage = $SurgTStage;
		$this->SurgM = $SurgM;
		$this->SurgNotes = $SurgNotes;
		$this->SMI = $SMI;
		$this->SMDepth = $SMDepth;
		$this->Differentiation = $Differentiation;
		$this->LVI = $LVI;
		$this->WhyNoSC1 = $WhyNoSC1;
		$this->CompletedSE1 = $CompletedSE1;
		$this->SE_1date = $SE_1date;
		$this->SE_time_new = $SE_time_new;
		$this->SE_1endo_Rec_Res = $SE_1endo_Rec_Res;
		$this->SE_1HISTO_Rec_Res = $SE_1HISTO_Rec_Res;
		$this->SE_1Treatment = $SE_1Treatment;
		$this->CompletedSE2 = $CompletedSE2;
		$this->WhyNoSC2 = $WhyNoSC2;
		$this->DueSC2 = $DueSC2;
		$this->ExplainSC2 = $ExplainSC2;
		$this->SE_2date = $SE_2date;
		$this->SE_2endo_Rec_Res = $SE_2endo_Rec_Res;
		$this->SE_2HISTO_Rec_Res = $SE_2HISTO_Rec_Res;
		$this->SE_2Treatment = $SE_2Treatment;
		$this->MonthsToSEMostRecent = $MonthsToSEMostRecent;
		$this->SE_MostRecentdate = $SE_MostRecentdate;
		$this->SE_MostRecentendo_Rec_Res = $SE_MostRecentendo_Rec_Res;
		$this->SE_MostRecentHISTO_Rec_Res = $SE_MostRecentHISTO_Rec_Res;
		$this->SE_MostRecentTreatment = $SE_MostRecentTreatment;
		$this->clearofdiseaseonlatestSE = $clearofdiseaseonlatestSE;
		$this->Numberoffollow_upscopes = $Numberoffollow_upscopes;
		$this->Monthsindextolastscope = $Monthsindextolastscope;
		$this->Ultimateoutcome = $Ultimateoutcome;
		$this->FullThicknessPerf = $FullThicknessPerf;
		$this->Historemarks2 = $Historemarks2;
		$this->HistologyCriteriaLGDNew = $HistologyCriteriaLGDNew;
		$this->AdjuvantTreatment = $AdjuvantTreatment;
		$this->created = $created;
		$this->updated = $updated;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key_old($key_row){
		$result = $this->connection->RunQuery("Select * from esdLesion where _k_lesion = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->_k_lesion = $row["_k_lesion"];
			$this->_k_procedure = $row["_k_procedure"];
			$this->AGE = $row["AGE"];
			$this->Ethnicity = $row["Ethnicity"];
			$this->Dateofprocedure = $row["Dateofprocedure"];
			$this->Duplicate = $row["Duplicate"];
			$this->Gender = $row["Gender"];
			$this->IndicationforESD = $row["IndicationforESD"];
			$this->Preresectionbiopsydone = $row["Preresectionbiopsydone"];
			$this->PreresectionHistology = $row["PreresectionHistology"];
			$this->Scopetype = $row["Scopetype"];
			$this->Knifetype = $row["Knifetype"];
			$this->Injectate = $row["Injectate"];
			$this->Length_min = $row["Length_min"];
			$this->ASAscore = $row["ASAscore"];
			$this->GAvssedation = $row["GAvssedation"];
			$this->Admitted = $row["Admitted"];
			$this->Complications = $row["Complications"];
			$this->comp_IPB = $row["comp_IPB"];
			$this->Prophylaxis_bleed = $row["Prophylaxis_bleed"];
			$this->comp_perf = $row["comp_perf"];
			$this->comp_DB = $row["comp_DB"];
			$this->Mortality = $row["Mortality"];
			$this->lesionlocation = $row["lesionlocation"];
			$this->lesionlocationdetail = $row["lesionlocationdetail"];
			$this->lesion_Paris = $row["lesion_Paris"];
			$this->ulceration = $row["ulceration"];
			$this->lesionsize_mm = $row["lesionsize_mm"];
			$this->En_bloc = $row["En_bloc"];
			$this->Historemarks = $row["Historemarks"];
			$this->Numberofresectionspecimens = $row["Numberofresectionspecimens"];
			$this->Completeendoscopicresectionachieved = $row["Completeendoscopicresectionachieved"];
			$this->Histology = $row["Histology"];
			$this->HistologyHGD = $row["HistologyHGD"];
			$this->Completepathologicalresection_R0 = $row["Completepathologicalresection_R0"];
			$this->MarginVerticalPos = $row["MarginVerticalPos"];
			$this->MarginHorizPos = $row["MarginHorizPos"];
			$this->ClinicalCriteria = $row["ClinicalCriteria"];
			$this->SurgicalRefBasedonHisto = $row["SurgicalRefBasedonHisto"];
			$this->SurgDueToFail = $row["SurgDueToFail"];
			$this->UnderwentSurgeryatIndex = $row["UnderwentSurgeryatIndex"];
			$this->SurgeryDuringSurveillance = $row["SurgeryDuringSurveillance"];
			$this->NoSurgerySoSurveillance = $row["NoSurgerySoSurveillance"];
			$this->DeclinedSurgery = $row["DeclinedSurgery"];
			$this->AwaitingSurgOutcome = $row["AwaitingSurgOutcome"];
			$this->WhyDeclinedSurgery = $row["WhyDeclinedSurgery"];
			$this->SurgResidual = $row["SurgResidual"];
			$this->SurgLN = $row["SurgLN"];
			$this->SurgTStage = $row["SurgTStage"];
			$this->SurgM = $row["SurgM"];
			$this->SurgNotes = $row["SurgNotes"];
			$this->SMI = $row["SMI"];
			$this->SMDepth = $row["SMDepth"];
			$this->Differentiation = $row["Differentiation"];
			$this->LVI = $row["LVI"];
			$this->WhyNoSC1 = $row["WhyNoSC1"];
			$this->CompletedSE1 = $row["CompletedSE1"];
			$this->SE_1date = $row["SE_1date"];
			$this->SE_time_new = $row["SE_time_new"];
			$this->SE_1endo_Rec_Res = $row["SE_1endo_Rec_Res"];
			$this->SE_1HISTO_Rec_Res = $row["SE_1HISTO_Rec_Res"];
			$this->SE_1Treatment = $row["SE_1Treatment"];
			$this->CompletedSE2 = $row["CompletedSE2"];
			$this->WhyNoSC2 = $row["WhyNoSC2"];
			$this->DueSC2 = $row["DueSC2"];
			$this->ExplainSC2 = $row["ExplainSC2"];
			$this->SE_2date = $row["SE_2date"];
			$this->SE_2endo_Rec_Res = $row["SE_2endo_Rec_Res"];
			$this->SE_2HISTO_Rec_Res = $row["SE_2HISTO_Rec_Res"];
			$this->SE_2Treatment = $row["SE_2Treatment"];
			$this->MonthsToSEMostRecent = $row["MonthsToSEMostRecent"];
			$this->SE_MostRecentdate = $row["SE_MostRecentdate"];
			$this->SE_MostRecentendo_Rec_Res = $row["SE_MostRecentendo_Rec_Res"];
			$this->SE_MostRecentHISTO_Rec_Res = $row["SE_MostRecentHISTO_Rec_Res"];
			$this->SE_MostRecentTreatment = $row["SE_MostRecentTreatment"];
			$this->clearofdiseaseonlatestSE = $row["clearofdiseaseonlatestSE"];
			$this->Numberoffollow_upscopes = $row["Numberoffollow_upscopes"];
			$this->Monthsindextolastscope = $row["Monthsindextolastscope"];
			$this->Ultimateoutcome = $row["Ultimateoutcome"];
			$this->FullThicknessPerf = $row["FullThicknessPerf"];
			$this->Historemarks2 = $row["Historemarks2"];
			$this->HistologyCriteriaLGDNew = $row["HistologyCriteriaLGDNew"];
			$this->AdjuvantTreatment = $row["AdjuvantTreatment"];
			$this->created = $row["created"];
			$this->updated = $row["updated"];
		}
	}

	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from esdLesion where _k_lesion = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->_k_lesion = $row["_k_lesion"];
			$this->_k_procedure = $row["_k_procedure"];
			$this->AGE = $row["AGE"];
			$this->Ethnicity = $row["Ethnicity"];
			$this->Dateofprocedure = $row["Dateofprocedure"];
			$this->Duplicate = $row["Duplicate"];
			$this->Gender = $row["Gender"];
			$this->IndicationforESD = $row["IndicationforESD"];
			$this->Preresectionbiopsydone = $row["Preresectionbiopsydone"];
			$this->PreresectionHistology = $row["PreresectionHistology"];
			$this->Scopetype = $row["Scopetype"];
			$this->Knifetype = $row["Knifetype"];
			$this->Injectate = $row["Injectate"];
			$this->Length_min = $row["Length_min"];
			$this->ASAscore = $row["ASAscore"];
			$this->GAvssedation = $row["GAvssedation"];
			$this->Admitted = $row["Admitted"];
			$this->Complications = $row["Complications"];
			$this->comp_IPB = $row["comp_IPB"];
			$this->Prophylaxis_bleed = $row["Prophylaxis_bleed"];
			$this->comp_perf = $row["comp_perf"];
			$this->comp_DB = $row["comp_DB"];
			$this->Mortality = $row["Mortality"];
			$this->lesionlocation = $row["lesionlocation"];
			$this->lesionlocationdetail = $row["lesionlocationdetail"];
			$this->lesion_Paris = $row["lesion_Paris"];
			$this->ulceration = $row["ulceration"];
			$this->lesionsize_mm = $row["lesionsize_mm"];
			$this->En_bloc = $row["En_bloc"];
			$this->Historemarks = $row["Historemarks"];
			$this->Numberofresectionspecimens = $row["Numberofresectionspecimens"];
			$this->Completeendoscopicresectionachieved = $row["Completeendoscopicresectionachieved"];
			$this->Histology = $row["Histology"];
			$this->HistologyHGD = $row["HistologyHGD"];
			$this->Completepathologicalresection_R0 = $row["Completepathologicalresection_R0"];
			$this->MarginVerticalPos = $row["MarginVerticalPos"];
			$this->MarginHorizPos = $row["MarginHorizPos"];
			$this->ClinicalCriteria = $row["ClinicalCriteria"];
			$this->SurgicalRefBasedonHisto = $row["SurgicalRefBasedonHisto"];
			$this->SurgDueToFail = $row["SurgDueToFail"];
			$this->UnderwentSurgeryatIndex = $row["UnderwentSurgeryatIndex"];
			$this->SurgeryDuringSurveillance = $row["SurgeryDuringSurveillance"];
			$this->NoSurgerySoSurveillance = $row["NoSurgerySoSurveillance"];
			$this->DeclinedSurgery = $row["DeclinedSurgery"];
			$this->AwaitingSurgOutcome = $row["AwaitingSurgOutcome"];
			$this->WhyDeclinedSurgery = $row["WhyDeclinedSurgery"];
			$this->SurgResidual = $row["SurgResidual"];
			$this->SurgLN = $row["SurgLN"];
			$this->SurgTStage = $row["SurgTStage"];
			$this->SurgM = $row["SurgM"];
			$this->SurgNotes = $row["SurgNotes"];
			$this->SMI = $row["SMI"];
			$this->SMDepth = $row["SMDepth"];
			$this->Differentiation = $row["Differentiation"];
			$this->LVI = $row["LVI"];
			$this->WhyNoSC1 = $row["WhyNoSC1"];
			$this->CompletedSE1 = $row["CompletedSE1"];
			$this->SE_1date = $row["SE_1date"];
			$this->SE_time_new = $row["SE_time_new"];
			$this->SE_1endo_Rec_Res = $row["SE_1endo_Rec_Res"];
			$this->SE_1HISTO_Rec_Res = $row["SE_1HISTO_Rec_Res"];
			$this->SE_1Treatment = $row["SE_1Treatment"];
			$this->CompletedSE2 = $row["CompletedSE2"];
			$this->WhyNoSC2 = $row["WhyNoSC2"];
			$this->DueSC2 = $row["DueSC2"];
			$this->ExplainSC2 = $row["ExplainSC2"];
			$this->SE_2date = $row["SE_2date"];
			$this->SE_2endo_Rec_Res = $row["SE_2endo_Rec_Res"];
			$this->SE_2HISTO_Rec_Res = $row["SE_2HISTO_Rec_Res"];
			$this->SE_2Treatment = $row["SE_2Treatment"];
			$this->MonthsToSEMostRecent = $row["MonthsToSEMostRecent"];
			$this->SE_MostRecentdate = $row["SE_MostRecentdate"];
			$this->SE_MostRecentendo_Rec_Res = $row["SE_MostRecentendo_Rec_Res"];
			$this->SE_MostRecentHISTO_Rec_Res = $row["SE_MostRecentHISTO_Rec_Res"];
			$this->SE_MostRecentTreatment = $row["SE_MostRecentTreatment"];
			$this->clearofdiseaseonlatestSE = $row["clearofdiseaseonlatestSE"];
			$this->Numberoffollow_upscopes = $row["Numberoffollow_upscopes"];
			$this->Monthsindextolastscope = $row["Monthsindextolastscope"];
			$this->Ultimateoutcome = $row["Ultimateoutcome"];
			$this->FullThicknessPerf = $row["FullThicknessPerf"];
			$this->Historemarks2 = $row["Historemarks2"];
			$this->HistologyCriteriaLGDNew = $row["HistologyCriteriaLGDNew"];
			$this->AdjuvantTreatment = $row["AdjuvantTreatment"];
			$this->created = $row["created"];
			$this->updated = $row["updated"];
		}
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM esdLesion WHERE _k_lesion = $key_row");
	}

    /**
     * Update the active row table on table
     */


	 //needs get those with no value
	 //those set as null
	 //rest update
	 //use prepared statements
	
	 public function Save_Active_Row(){

		//need to only update those which are set

		$ov = get_object_vars($this);
		//print_r($ov);

		if ($ov['connection'] != ''){
			unset($ov['connection']);
		}
		if ($ov['_k_lesion'] != ''){
			unset($ov['_k_lesion']);
		}

		//print_r($ov);

		if (array_key_exists('_k_lesion', $ov) === TRUE){


			if ($ov['lesionid'] != ''){
				unset($ov['lesionid']);
			}

		}

		//print_r($ov);
		$ovMod = array();
		foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '`' . $key . '`';

				$ovMod[$key] = $value;
			}

		}

		foreach ($ovMod as $key => $value) {

			$value = "'$value'";
			$updates[] = "$key = $value";

		}

		$implodeArray = implode(', ', $updates);

		//print_r($implodeArray);

		$q = "UPDATE `esdLesion` SET $implodeArray WHERE _k_lesion = \"$this->_k_lesion\"";

		//print_r($ovMod);
		print_r($q);

		//$q = "UPDATE guests set firstname = \"$this->firstname\", surname = \"$this->surname\", otherhalf = \"$this->otherhalf\", firstround = \"$this->firstround\", language = \"$this->language\", firstroundprob = \"$this->firstroundprob\", secondround = \"$this->secondround\", addressedTo = \"$this->addressedTo\", email = \"$this->email\", number = \"$this->number\", Party = \"$this->Party\", townHall = \"$this->townHall\", dietary = \"$this->dietary\", kids = \"$this->kids\", stayLocation = \"$this->stayLocation\", stayHotel = \"$this->stayHotel\", arrivalDate = \"$this->arrivalDate\", over40 = \"$this->over40\", mailAddress1 = \"$this->mailAddress1\", mailAddress2 = \"$this->mailAddress2\", mailAddressTown = \"$this->mailAddressTown\", mailAddressCountry = \"$this->mailAddressCountry\", mailAddressCounty = \"$this->mailAddressCounty\", mailAddressPostcode = \"$this->mailAddressPostcode\", gift = \"$this->gift\", giftAmount = \"$this->giftAmount\", replySaveTheDate = \"$this->replySaveTheDate\", replyInvitation = \"$this->replyInvitation\", random = \"$this->random\" where guestid = \"$this->guestid\"";
		//print_r($q);
		$result = $this->connection->RunQuery($q);
		//echo $result;
		return $result;

	}

	public function numberOfRows() {

		return $this->connection->TotalOfRows('esdLesion');

	}

	public function prepareStatement (){

		//need to only update those which are set

		$ov = get_object_vars($this);
		//print_r($ov);

		if ($ov['connection'] != ''){
			unset($ov['connection']);
		}
		if ($ov['_k_lesion'] != ''){
			unset($ov['_k_lesion']);
		}

		//print_r($ov);

		if (array_key_exists('_k_lesion', $ov) === TRUE){


			if ($ov['lesionid'] != ''){
				unset($ov['lesionid']);
			}

		}

		//print_r($ov);
		$ovMod = array();
		foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '`' . $key . '`';

				$ovMod[$key] = $value;
			}

		}

		//print_r($ovMod);

		foreach ($ovMod as $key => $value) {

			$value = "'$value'";
			$updates[] = "$value";

		}

		$implodeArray = implode(', ', $updates);

		//get number of terms in update
		//need only the keys first		

		$keys = implode(", ", array_keys($ovMod));

		//get number of keys

		$numberOfTerms = count($ovMod);

		echo $numberOfTerms;

		$termsToInsert = '';
		
		$x=0;
		
		foreach ($ovMod as $key=>$value){

			$termsToInsert .= ( $x !== ($numberOfTerms -1) ) ? "? ," : " ?";

			$x++;

		}

		$q = "INSERT INTO `esdLesion` ($keys) VALUES ($termsToInsert)";

		echo $q;

		$stmt = $this->connection->prepare($q);

		//var_dump($stmt);

		//tell all string

		$typesToInsert = '';

		foreach ($ovMod as $key=>$value){

			$typesToInsert .= ( $x !== ($numberOfTerms -1) ) ? "s" : "s";

			$x++;

		}

		$data = "'$typesToInsert' , $implodeArray";

		echo "data is $data";

		$stmt->bind_param($data);
		//var_dump($stmt);
		$stmt->execute();
		var_dump($stmt);

	}

	public function prepareStatementPDO (){ //inserts new object to the database

		//need to only update those which are set

		$ov = get_object_vars($this);
		//print_r($ov);

		if ($ov['connection'] != ''){
			unset($ov['connection']);
		}
		if ($ov['_k_lesion'] != ''){
			unset($ov['_k_lesion']);
		}

		//print_r($ov);

		if (array_key_exists('_k_lesion', $ov) === TRUE){


			if ($ov['lesionid'] != ''){
				unset($ov['lesionid']);
			}

		}

		//print_r($ov);
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

		//print_r($ovMod);

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

		$q = "INSERT INTO `esdLesion` ($keys) VALUES ($keys2)";

		//echo $q;

		$stmt = $this->connection->prepare($q);

		var_dump($stmt);

		var_dump($ovMod3);

		$stmt->execute($ovMod3);

		echo $stmt->rowCount();


	}


	
	
	 public function Save_Active_Row_old(){
		$this->connection->RunQuery("UPDATE esdLesion set _k_procedure = \"$this->_k_procedure\", AGE = \"$this->AGE\", Ethnicity = \"$this->Ethnicity\", Dateofprocedure = \"$this->Dateofprocedure\", Duplicate = \"$this->Duplicate\", Gender = \"$this->Gender\", IndicationforESD = \"$this->IndicationforESD\", Preresectionbiopsydone = \"$this->Preresectionbiopsydone\", PreresectionHistology = \"$this->PreresectionHistology\", Scopetype = \"$this->Scopetype\", Knifetype = \"$this->Knifetype\", Injectate = \"$this->Injectate\", Length_min = \"$this->Length_min\", ASAscore = \"$this->ASAscore\", GAvssedation = \"$this->GAvssedation\", Admitted = \"$this->Admitted\", Complications = \"$this->Complications\", comp_IPB = \"$this->comp_IPB\", Prophylaxis_bleed = \"$this->Prophylaxis_bleed\", comp_perf = \"$this->comp_perf\", comp_DB = \"$this->comp_DB\", Mortality = \"$this->Mortality\", lesionlocation = \"$this->lesionlocation\", lesionlocationdetail = \"$this->lesionlocationdetail\", lesion_Paris = \"$this->lesion_Paris\", ulceration = \"$this->ulceration\", lesionsize_mm = \"$this->lesionsize_mm\", En_bloc = \"$this->En_bloc\", Historemarks = \"$this->Historemarks\", Numberofresectionspecimens = \"$this->Numberofresectionspecimens\", Completeendoscopicresectionachieved = \"$this->Completeendoscopicresectionachieved\", Histology = \"$this->Histology\", HistologyHGD = \"$this->HistologyHGD\", Completepathologicalresection_R0 = \"$this->Completepathologicalresection_R0\", MarginVerticalPos = \"$this->MarginVerticalPos\", MarginHorizPos = \"$this->MarginHorizPos\", ClinicalCriteria = \"$this->ClinicalCriteria\", SurgicalRefBasedonHisto = \"$this->SurgicalRefBasedonHisto\", SurgDueToFail = \"$this->SurgDueToFail\", UnderwentSurgeryatIndex = \"$this->UnderwentSurgeryatIndex\", SurgeryDuringSurveillance = \"$this->SurgeryDuringSurveillance\", NoSurgerySoSurveillance = \"$this->NoSurgerySoSurveillance\", DeclinedSurgery = \"$this->DeclinedSurgery\", AwaitingSurgOutcome = \"$this->AwaitingSurgOutcome\", WhyDeclinedSurgery = \"$this->WhyDeclinedSurgery\", SurgResidual = \"$this->SurgResidual\", SurgLN = \"$this->SurgLN\", SurgTStage = \"$this->SurgTStage\", SurgM = \"$this->SurgM\", SurgNotes = \"$this->SurgNotes\", SMI = \"$this->SMI\", SMDepth = \"$this->SMDepth\", Differentiation = \"$this->Differentiation\", LVI = \"$this->LVI\", WhyNoSC1 = \"$this->WhyNoSC1\", CompletedSE1 = \"$this->CompletedSE1\", SE_1date = \"$this->SE_1date\", SE_time_new = \"$this->SE_time_new\", SE_1endo_Rec_Res = \"$this->SE_1endo_Rec_Res\", SE_1HISTO_Rec_Res = \"$this->SE_1HISTO_Rec_Res\", SE_1Treatment = \"$this->SE_1Treatment\", CompletedSE2 = \"$this->CompletedSE2\", WhyNoSC2 = \"$this->WhyNoSC2\", DueSC2 = \"$this->DueSC2\", ExplainSC2 = \"$this->ExplainSC2\", SE_2date = \"$this->SE_2date\", SE_2endo_Rec_Res = \"$this->SE_2endo_Rec_Res\", SE_2HISTO_Rec_Res = \"$this->SE_2HISTO_Rec_Res\", SE_2Treatment = \"$this->SE_2Treatment\", MonthsToSEMostRecent = \"$this->MonthsToSEMostRecent\", SE_MostRecentdate = \"$this->SE_MostRecentdate\", SE_MostRecentendo_Rec_Res = \"$this->SE_MostRecentendo_Rec_Res\", SE_MostRecentHISTO_Rec_Res = \"$this->SE_MostRecentHISTO_Rec_Res\", SE_MostRecentTreatment = \"$this->SE_MostRecentTreatment\", clearofdiseaseonlatestSE = \"$this->clearofdiseaseonlatestSE\", Numberoffollow_upscopes = \"$this->Numberoffollow_upscopes\", Monthsindextolastscope = \"$this->Monthsindextolastscope\", Ultimateoutcome = \"$this->Ultimateoutcome\", FullThicknessPerf = \"$this->FullThicknessPerf\", Historemarks2 = \"$this->Historemarks2\", HistologyCriteriaLGDNew = \"$this->HistologyCriteriaLGDNew\", AdjuvantTreatment = \"$this->AdjuvantTreatment\", created = \"$this->created\", updated = \"$this->updated\" where _k_lesion = \"$this->_k_lesion\"");
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New(){
		$this->connection->RunQuery("Insert into esdLesion (_k_procedure, AGE, Ethnicity, Dateofprocedure, Duplicate, Gender, IndicationforESD, Preresectionbiopsydone, PreresectionHistology, Scopetype, Knifetype, Injectate, Length_min, ASAscore, GAvssedation, Admitted, Complications, comp_IPB, Prophylaxis_bleed, comp_perf, comp_DB, Mortality, lesionlocation, lesionlocationdetail, lesion_Paris, ulceration, lesionsize_mm, En_bloc, Historemarks, Numberofresectionspecimens, Completeendoscopicresectionachieved, Histology, HistologyHGD, Completepathologicalresection_R0, MarginVerticalPos, MarginHorizPos, ClinicalCriteria, SurgicalRefBasedonHisto, SurgDueToFail, UnderwentSurgeryatIndex, SurgeryDuringSurveillance, NoSurgerySoSurveillance, DeclinedSurgery, AwaitingSurgOutcome, WhyDeclinedSurgery, SurgResidual, SurgLN, SurgTStage, SurgM, SurgNotes, SMI, SMDepth, Differentiation, LVI, WhyNoSC1, CompletedSE1, SE_1date, SE_time_new, SE_1endo_Rec_Res, SE_1HISTO_Rec_Res, SE_1Treatment, CompletedSE2, WhyNoSC2, DueSC2, ExplainSC2, SE_2date, SE_2endo_Rec_Res, SE_2HISTO_Rec_Res, SE_2Treatment, MonthsToSEMostRecent, SE_MostRecentdate, SE_MostRecentendo_Rec_Res, SE_MostRecentHISTO_Rec_Res, SE_MostRecentTreatment, clearofdiseaseonlatestSE, Numberoffollow_upscopes, Monthsindextolastscope, Ultimateoutcome, FullThicknessPerf, Historemarks2, HistologyCriteriaLGDNew, AdjuvantTreatment, created, updated) values (\"$this->_k_procedure\", \"$this->AGE\", \"$this->Ethnicity\", \"$this->Dateofprocedure\", \"$this->Duplicate\", \"$this->Gender\", \"$this->IndicationforESD\", \"$this->Preresectionbiopsydone\", \"$this->PreresectionHistology\", \"$this->Scopetype\", \"$this->Knifetype\", \"$this->Injectate\", \"$this->Length_min\", \"$this->ASAscore\", \"$this->GAvssedation\", \"$this->Admitted\", \"$this->Complications\", \"$this->comp_IPB\", \"$this->Prophylaxis_bleed\", \"$this->comp_perf\", \"$this->comp_DB\", \"$this->Mortality\", \"$this->lesionlocation\", \"$this->lesionlocationdetail\", \"$this->lesion_Paris\", \"$this->ulceration\", \"$this->lesionsize_mm\", \"$this->En_bloc\", \"$this->Historemarks\", \"$this->Numberofresectionspecimens\", \"$this->Completeendoscopicresectionachieved\", \"$this->Histology\", \"$this->HistologyHGD\", \"$this->Completepathologicalresection_R0\", \"$this->MarginVerticalPos\", \"$this->MarginHorizPos\", \"$this->ClinicalCriteria\", \"$this->SurgicalRefBasedonHisto\", \"$this->SurgDueToFail\", \"$this->UnderwentSurgeryatIndex\", \"$this->SurgeryDuringSurveillance\", \"$this->NoSurgerySoSurveillance\", \"$this->DeclinedSurgery\", \"$this->AwaitingSurgOutcome\", \"$this->WhyDeclinedSurgery\", \"$this->SurgResidual\", \"$this->SurgLN\", \"$this->SurgTStage\", \"$this->SurgM\", \"$this->SurgNotes\", \"$this->SMI\", \"$this->SMDepth\", \"$this->Differentiation\", \"$this->LVI\", \"$this->WhyNoSC1\", \"$this->CompletedSE1\", \"$this->SE_1date\", \"$this->SE_time_new\", \"$this->SE_1endo_Rec_Res\", \"$this->SE_1HISTO_Rec_Res\", \"$this->SE_1Treatment\", \"$this->CompletedSE2\", \"$this->WhyNoSC2\", \"$this->DueSC2\", \"$this->ExplainSC2\", \"$this->SE_2date\", \"$this->SE_2endo_Rec_Res\", \"$this->SE_2HISTO_Rec_Res\", \"$this->SE_2Treatment\", \"$this->MonthsToSEMostRecent\", \"$this->SE_MostRecentdate\", \"$this->SE_MostRecentendo_Rec_Res\", \"$this->SE_MostRecentHISTO_Rec_Res\", \"$this->SE_MostRecentTreatment\", \"$this->clearofdiseaseonlatestSE\", \"$this->Numberoffollow_upscopes\", \"$this->Monthsindextolastscope\", \"$this->Ultimateoutcome\", \"$this->FullThicknessPerf\", \"$this->Historemarks2\", \"$this->HistologyCriteriaLGDNew\", \"$this->AdjuvantTreatment\", \"$this->created\", \"$this->updated\")");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT _k_lesion from esdLesion order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["_k_lesion"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return _k_lesion - int(11)
	 */
	public function get_k_lesion(){
		return $this->_k_lesion;
	}

	/**
	 * @return _k_procedure - varchar(10)
	 */
	public function get_k_procedure(){
		return $this->_k_procedure;
	}

	/**
	 * @return AGE - varchar(4)
	 */
	public function getAGE(){
		return $this->AGE;
	}

	/**
	 * @return Ethnicity - varchar(10)
	 */
	public function getEthnicity(){
		return $this->Ethnicity;
	}

	/**
	 * @return Dateofprocedure - datetime
	 */
	public function getDateofprocedure(){
		return $this->Dateofprocedure;
	}

	/**
	 * @return Duplicate - int(1)
	 */
	public function getDuplicate(){
		return $this->Duplicate;
	}

	/**
	 * @return Gender - int(1)
	 */
	public function getGender(){
		return $this->Gender;
	}

	/**
	 * @return IndicationforESD - int(1)
	 */
	public function getIndicationforESD(){
		return $this->IndicationforESD;
	}

	/**
	 * @return Preresectionbiopsydone - int(1)
	 */
	public function getPreresectionbiopsydone(){
		return $this->Preresectionbiopsydone;
	}

	/**
	 * @return PreresectionHistology - int(1)
	 */
	public function getPreresectionHistology(){
		return $this->PreresectionHistology;
	}

	/**
	 * @return Scopetype - int(1)
	 */
	public function getScopetype(){
		return $this->Scopetype;
	}

	/**
	 * @return Knifetype - int(1)
	 */
	public function getKnifetype(){
		return $this->Knifetype;
	}

	/**
	 * @return Injectate - int(1)
	 */
	public function getInjectate(){
		return $this->Injectate;
	}

	/**
	 * @return Length_min - int(3)
	 */
	public function getLength_min(){
		return $this->Length_min;
	}

	/**
	 * @return ASAscore - int(1)
	 */
	public function getASAscore(){
		return $this->ASAscore;
	}

	/**
	 * @return GAvssedation - int(1)
	 */
	public function getGAvssedation(){
		return $this->GAvssedation;
	}

	/**
	 * @return Admitted - int(1)
	 */
	public function getAdmitted(){
		return $this->Admitted;
	}

	/**
	 * @return Complications - int(1)
	 */
	public function getComplications(){
		return $this->Complications;
	}

	/**
	 * @return comp_IPB - int(1)
	 */
	public function getcomp_IPB(){
		return $this->comp_IPB;
	}

	/**
	 * @return Prophylaxis_bleed - int(1)
	 */
	public function getProphylaxis_bleed(){
		return $this->Prophylaxis_bleed;
	}

	/**
	 * @return comp_perf - int(1)
	 */
	public function getcomp_perf(){
		return $this->comp_perf;
	}

	/**
	 * @return comp_DB - int(1)
	 */
	public function getcomp_DB(){
		return $this->comp_DB;
	}

	/**
	 * @return Mortality - int(1)
	 */
	public function getMortality(){
		return $this->Mortality;
	}

	/**
	 * @return lesionlocation - int(1)
	 */
	public function getlesionlocation(){
		return $this->lesionlocation;
	}

	/**
	 * @return lesionlocationdetail - varchar(200)
	 */
	public function getlesionlocationdetail(){
		return $this->lesionlocationdetail;
	}

	/**
	 * @return lesion_Paris - int(1)
	 */
	public function getlesion_Paris(){
		return $this->lesion_Paris;
	}

	/**
	 * @return ulceration - int(1)
	 */
	public function getulceration(){
		return $this->ulceration;
	}

	/**
	 * @return lesionsize_mm - int(2)
	 */
	public function getlesionsize_mm(){
		return $this->lesionsize_mm;
	}

	/**
	 * @return En_bloc - int(1)
	 */
	public function getEn_bloc(){
		return $this->En_bloc;
	}

	/**
	 * @return Historemarks - varchar(10)
	 */
	public function getHistoremarks(){
		return $this->Historemarks;
	}

	/**
	 * @return Numberofresectionspecimens - int(1)
	 */
	public function getNumberofresectionspecimens(){
		return $this->Numberofresectionspecimens;
	}

	/**
	 * @return Completeendoscopicresectionachieved - int(1)
	 */
	public function getCompleteendoscopicresectionachieved(){
		return $this->Completeendoscopicresectionachieved;
	}

	/**
	 * @return Histology - varchar(100)
	 */
	public function getHistology(){
		return $this->Histology;
	}

	/**
	 * @return HistologyHGD - varchar(100)
	 */
	public function getHistologyHGD(){
		return $this->HistologyHGD;
	}

	/**
	 * @return Completepathologicalresection_R0 - varchar(100)
	 */
	public function getCompletepathologicalresection_R0(){
		return $this->Completepathologicalresection_R0;
	}

	/**
	 * @return MarginVerticalPos - varchar(10)
	 */
	public function getMarginVerticalPos(){
		return $this->MarginVerticalPos;
	}

	/**
	 * @return MarginHorizPos - varchar(10)
	 */
	public function getMarginHorizPos(){
		return $this->MarginHorizPos;
	}

	/**
	 * @return ClinicalCriteria - varchar(10)
	 */
	public function getClinicalCriteria(){
		return $this->ClinicalCriteria;
	}

	/**
	 * @return SurgicalRefBasedonHisto - varchar(10)
	 */
	public function getSurgicalRefBasedonHisto(){
		return $this->SurgicalRefBasedonHisto;
	}

	/**
	 * @return SurgDueToFail - varchar(10)
	 */
	public function getSurgDueToFail(){
		return $this->SurgDueToFail;
	}

	/**
	 * @return UnderwentSurgeryatIndex - varchar(10)
	 */
	public function getUnderwentSurgeryatIndex(){
		return $this->UnderwentSurgeryatIndex;
	}

	/**
	 * @return SurgeryDuringSurveillance - varchar(10)
	 */
	public function getSurgeryDuringSurveillance(){
		return $this->SurgeryDuringSurveillance;
	}

	/**
	 * @return NoSurgerySoSurveillance - varchar(10)
	 */
	public function getNoSurgerySoSurveillance(){
		return $this->NoSurgerySoSurveillance;
	}

	/**
	 * @return DeclinedSurgery - varchar(10)
	 */
	public function getDeclinedSurgery(){
		return $this->DeclinedSurgery;
	}

	/**
	 * @return AwaitingSurgOutcome - varchar(10)
	 */
	public function getAwaitingSurgOutcome(){
		return $this->AwaitingSurgOutcome;
	}

	/**
	 * @return WhyDeclinedSurgery - varchar(10)
	 */
	public function getWhyDeclinedSurgery(){
		return $this->WhyDeclinedSurgery;
	}

	/**
	 * @return SurgResidual - varchar(10)
	 */
	public function getSurgResidual(){
		return $this->SurgResidual;
	}

	/**
	 * @return SurgLN - varchar(10)
	 */
	public function getSurgLN(){
		return $this->SurgLN;
	}

	/**
	 * @return SurgTStage - varchar(10)
	 */
	public function getSurgTStage(){
		return $this->SurgTStage;
	}

	/**
	 * @return SurgM - varchar(10)
	 */
	public function getSurgM(){
		return $this->SurgM;
	}

	/**
	 * @return SurgNotes - varchar(10)
	 */
	public function getSurgNotes(){
		return $this->SurgNotes;
	}

	/**
	 * @return SMI - varchar(10)
	 */
	public function getSMI(){
		return $this->SMI;
	}

	/**
	 * @return SMDepth - varchar(10)
	 */
	public function getSMDepth(){
		return $this->SMDepth;
	}

	/**
	 * @return Differentiation - varchar(10)
	 */
	public function getDifferentiation(){
		return $this->Differentiation;
	}

	/**
	 * @return LVI - varchar(10)
	 */
	public function getLVI(){
		return $this->LVI;
	}

	/**
	 * @return WhyNoSC1 - varchar(10)
	 */
	public function getWhyNoSC1(){
		return $this->WhyNoSC1;
	}

	/**
	 * @return CompletedSE1 - varchar(10)
	 */
	public function getCompletedSE1(){
		return $this->CompletedSE1;
	}

	/**
	 * @return SE_1date - varchar(10)
	 */
	public function getSE_1date(){
		return $this->SE_1date;
	}

	/**
	 * @return SE_time_new - varchar(10)
	 */
	public function getSE_time_new(){
		return $this->SE_time_new;
	}

	/**
	 * @return SE_1endo_Rec_Res - varchar(10)
	 */
	public function getSE_1endo_Rec_Res(){
		return $this->SE_1endo_Rec_Res;
	}

	/**
	 * @return SE_1HISTO_Rec_Res - varchar(10)
	 */
	public function getSE_1HISTO_Rec_Res(){
		return $this->SE_1HISTO_Rec_Res;
	}

	/**
	 * @return SE_1Treatment - varchar(10)
	 */
	public function getSE_1Treatment(){
		return $this->SE_1Treatment;
	}

	/**
	 * @return CompletedSE2 - varchar(10)
	 */
	public function getCompletedSE2(){
		return $this->CompletedSE2;
	}

	/**
	 * @return WhyNoSC2 - varchar(200)
	 */
	public function getWhyNoSC2(){
		return $this->WhyNoSC2;
	}

	/**
	 * @return DueSC2 - varchar(10)
	 */
	public function getDueSC2(){
		return $this->DueSC2;
	}

	/**
	 * @return ExplainSC2 - varchar(10)
	 */
	public function getExplainSC2(){
		return $this->ExplainSC2;
	}

	/**
	 * @return SE_2date - varchar(10)
	 */
	public function getSE_2date(){
		return $this->SE_2date;
	}

	/**
	 * @return SE_2endo_Rec_Res - varchar(10)
	 */
	public function getSE_2endo_Rec_Res(){
		return $this->SE_2endo_Rec_Res;
	}

	/**
	 * @return SE_2HISTO_Rec_Res - varchar(10)
	 */
	public function getSE_2HISTO_Rec_Res(){
		return $this->SE_2HISTO_Rec_Res;
	}

	/**
	 * @return SE_2Treatment - varchar(10)
	 */
	public function getSE_2Treatment(){
		return $this->SE_2Treatment;
	}

	/**
	 * @return MonthsToSEMostRecent - varchar(10)
	 */
	public function getMonthsToSEMostRecent(){
		return $this->MonthsToSEMostRecent;
	}

	/**
	 * @return SE_MostRecentdate - varchar(10)
	 */
	public function getSE_MostRecentdate(){
		return $this->SE_MostRecentdate;
	}

	/**
	 * @return SE_MostRecentendo_Rec_Res - varchar(10)
	 */
	public function getSE_MostRecentendo_Rec_Res(){
		return $this->SE_MostRecentendo_Rec_Res;
	}

	/**
	 * @return SE_MostRecentHISTO_Rec_Res - varchar(10)
	 */
	public function getSE_MostRecentHISTO_Rec_Res(){
		return $this->SE_MostRecentHISTO_Rec_Res;
	}

	/**
	 * @return SE_MostRecentTreatment - varchar(10)
	 */
	public function getSE_MostRecentTreatment(){
		return $this->SE_MostRecentTreatment;
	}

	/**
	 * @return clearofdiseaseonlatestSE - varchar(10)
	 */
	public function getclearofdiseaseonlatestSE(){
		return $this->clearofdiseaseonlatestSE;
	}

	/**
	 * @return Numberoffollow_upscopes - varchar(10)
	 */
	public function getNumberoffollow_upscopes(){
		return $this->Numberoffollow_upscopes;
	}

	/**
	 * @return Monthsindextolastscope - varchar(10)
	 */
	public function getMonthsindextolastscope(){
		return $this->Monthsindextolastscope;
	}

	/**
	 * @return Ultimateoutcome - varchar(10)
	 */
	public function getUltimateoutcome(){
		return $this->Ultimateoutcome;
	}

	/**
	 * @return FullThicknessPerf - varchar(10)
	 */
	public function getFullThicknessPerf(){
		return $this->FullThicknessPerf;
	}

	/**
	 * @return Historemarks2 - varchar(10)
	 */
	public function getHistoremarks2(){
		return $this->Historemarks2;
	}

	/**
	 * @return HistologyCriteriaLGDNew - varchar(10)
	 */
	public function getHistologyCriteriaLGDNew(){
		return $this->HistologyCriteriaLGDNew;
	}

	/**
	 * @return AdjuvantTreatment - varchar(10)
	 */
	public function getAdjuvantTreatment(){
		return $this->AdjuvantTreatment;
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
	 * @param Type: int(11)
	 */
	public function set_k_lesion($_k_lesion){
		$this->_k_lesion = $_k_lesion;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function set_k_procedure($_k_procedure){
		$this->_k_procedure = $_k_procedure;
	}

	/**
	 * @param Type: varchar(4)
	 */
	public function setAGE($AGE){
		$this->AGE = $AGE;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setEthnicity($Ethnicity){
		$this->Ethnicity = $Ethnicity;
	}

	/**
	 * @param Type: datetime
	 */
	public function setDateofprocedure($Dateofprocedure){
		$this->Dateofprocedure = $Dateofprocedure;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setDuplicate($Duplicate){
		$this->Duplicate = $Duplicate;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setGender($Gender){
		$this->Gender = $Gender;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setIndicationforESD($IndicationforESD){
		$this->IndicationforESD = $IndicationforESD;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPreresectionbiopsydone($Preresectionbiopsydone){
		$this->Preresectionbiopsydone = $Preresectionbiopsydone;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPreresectionHistology($PreresectionHistology){
		$this->PreresectionHistology = $PreresectionHistology;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setScopetype($Scopetype){
		$this->Scopetype = $Scopetype;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setKnifetype($Knifetype){
		$this->Knifetype = $Knifetype;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setInjectate($Injectate){
		$this->Injectate = $Injectate;
	}

	/**
	 * @param Type: int(3)
	 */
	public function setLength_min($Length_min){
		$this->Length_min = $Length_min;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setASAscore($ASAscore){
		$this->ASAscore = $ASAscore;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setGAvssedation($GAvssedation){
		$this->GAvssedation = $GAvssedation;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAdmitted($Admitted){
		$this->Admitted = $Admitted;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setComplications($Complications){
		$this->Complications = $Complications;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setcomp_IPB($comp_IPB){
		$this->comp_IPB = $comp_IPB;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setProphylaxis_bleed($Prophylaxis_bleed){
		$this->Prophylaxis_bleed = $Prophylaxis_bleed;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setcomp_perf($comp_perf){
		$this->comp_perf = $comp_perf;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setcomp_DB($comp_DB){
		$this->comp_DB = $comp_DB;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setMortality($Mortality){
		$this->Mortality = $Mortality;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setlesionlocation($lesionlocation){
		$this->lesionlocation = $lesionlocation;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setlesionlocationdetail($lesionlocationdetail){
		$this->lesionlocationdetail = $lesionlocationdetail;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setlesion_Paris($lesion_Paris){
		$this->lesion_Paris = $lesion_Paris;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setulceration($ulceration){
		$this->ulceration = $ulceration;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setlesionsize_mm($lesionsize_mm){
		$this->lesionsize_mm = $lesionsize_mm;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setEn_bloc($En_bloc){
		$this->En_bloc = $En_bloc;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setHistoremarks($Historemarks){
		$this->Historemarks = $Historemarks;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setNumberofresectionspecimens($Numberofresectionspecimens){
		$this->Numberofresectionspecimens = $Numberofresectionspecimens;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setCompleteendoscopicresectionachieved($Completeendoscopicresectionachieved){
		$this->Completeendoscopicresectionachieved = $Completeendoscopicresectionachieved;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setHistology($Histology){
		$this->Histology = $Histology;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setHistologyHGD($HistologyHGD){
		$this->HistologyHGD = $HistologyHGD;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setCompletepathologicalresection_R0($Completepathologicalresection_R0){
		$this->Completepathologicalresection_R0 = $Completepathologicalresection_R0;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setMarginVerticalPos($MarginVerticalPos){
		$this->MarginVerticalPos = $MarginVerticalPos;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setMarginHorizPos($MarginHorizPos){
		$this->MarginHorizPos = $MarginHorizPos;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setClinicalCriteria($ClinicalCriteria){
		$this->ClinicalCriteria = $ClinicalCriteria;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSurgicalRefBasedonHisto($SurgicalRefBasedonHisto){
		$this->SurgicalRefBasedonHisto = $SurgicalRefBasedonHisto;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSurgDueToFail($SurgDueToFail){
		$this->SurgDueToFail = $SurgDueToFail;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setUnderwentSurgeryatIndex($UnderwentSurgeryatIndex){
		$this->UnderwentSurgeryatIndex = $UnderwentSurgeryatIndex;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSurgeryDuringSurveillance($SurgeryDuringSurveillance){
		$this->SurgeryDuringSurveillance = $SurgeryDuringSurveillance;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setNoSurgerySoSurveillance($NoSurgerySoSurveillance){
		$this->NoSurgerySoSurveillance = $NoSurgerySoSurveillance;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setDeclinedSurgery($DeclinedSurgery){
		$this->DeclinedSurgery = $DeclinedSurgery;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setAwaitingSurgOutcome($AwaitingSurgOutcome){
		$this->AwaitingSurgOutcome = $AwaitingSurgOutcome;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setWhyDeclinedSurgery($WhyDeclinedSurgery){
		$this->WhyDeclinedSurgery = $WhyDeclinedSurgery;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSurgResidual($SurgResidual){
		$this->SurgResidual = $SurgResidual;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSurgLN($SurgLN){
		$this->SurgLN = $SurgLN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSurgTStage($SurgTStage){
		$this->SurgTStage = $SurgTStage;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSurgM($SurgM){
		$this->SurgM = $SurgM;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSurgNotes($SurgNotes){
		$this->SurgNotes = $SurgNotes;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSMI($SMI){
		$this->SMI = $SMI;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSMDepth($SMDepth){
		$this->SMDepth = $SMDepth;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setDifferentiation($Differentiation){
		$this->Differentiation = $Differentiation;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLVI($LVI){
		$this->LVI = $LVI;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setWhyNoSC1($WhyNoSC1){
		$this->WhyNoSC1 = $WhyNoSC1;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setCompletedSE1($CompletedSE1){
		$this->CompletedSE1 = $CompletedSE1;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSE_1date($SE_1date){
		$this->SE_1date = $SE_1date;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSE_time_new($SE_time_new){
		$this->SE_time_new = $SE_time_new;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSE_1endo_Rec_Res($SE_1endo_Rec_Res){
		$this->SE_1endo_Rec_Res = $SE_1endo_Rec_Res;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSE_1HISTO_Rec_Res($SE_1HISTO_Rec_Res){
		$this->SE_1HISTO_Rec_Res = $SE_1HISTO_Rec_Res;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSE_1Treatment($SE_1Treatment){
		$this->SE_1Treatment = $SE_1Treatment;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setCompletedSE2($CompletedSE2){
		$this->CompletedSE2 = $CompletedSE2;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setWhyNoSC2($WhyNoSC2){
		$this->WhyNoSC2 = $WhyNoSC2;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setDueSC2($DueSC2){
		$this->DueSC2 = $DueSC2;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setExplainSC2($ExplainSC2){
		$this->ExplainSC2 = $ExplainSC2;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSE_2date($SE_2date){
		$this->SE_2date = $SE_2date;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSE_2endo_Rec_Res($SE_2endo_Rec_Res){
		$this->SE_2endo_Rec_Res = $SE_2endo_Rec_Res;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSE_2HISTO_Rec_Res($SE_2HISTO_Rec_Res){
		$this->SE_2HISTO_Rec_Res = $SE_2HISTO_Rec_Res;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSE_2Treatment($SE_2Treatment){
		$this->SE_2Treatment = $SE_2Treatment;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setMonthsToSEMostRecent($MonthsToSEMostRecent){
		$this->MonthsToSEMostRecent = $MonthsToSEMostRecent;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSE_MostRecentdate($SE_MostRecentdate){
		$this->SE_MostRecentdate = $SE_MostRecentdate;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSE_MostRecentendo_Rec_Res($SE_MostRecentendo_Rec_Res){
		$this->SE_MostRecentendo_Rec_Res = $SE_MostRecentendo_Rec_Res;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSE_MostRecentHISTO_Rec_Res($SE_MostRecentHISTO_Rec_Res){
		$this->SE_MostRecentHISTO_Rec_Res = $SE_MostRecentHISTO_Rec_Res;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSE_MostRecentTreatment($SE_MostRecentTreatment){
		$this->SE_MostRecentTreatment = $SE_MostRecentTreatment;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setclearofdiseaseonlatestSE($clearofdiseaseonlatestSE){
		$this->clearofdiseaseonlatestSE = $clearofdiseaseonlatestSE;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setNumberoffollow_upscopes($Numberoffollow_upscopes){
		$this->Numberoffollow_upscopes = $Numberoffollow_upscopes;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setMonthsindextolastscope($Monthsindextolastscope){
		$this->Monthsindextolastscope = $Monthsindextolastscope;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setUltimateoutcome($Ultimateoutcome){
		$this->Ultimateoutcome = $Ultimateoutcome;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setFullThicknessPerf($FullThicknessPerf){
		$this->FullThicknessPerf = $FullThicknessPerf;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setHistoremarks2($Historemarks2){
		$this->Historemarks2 = $Historemarks2;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setHistologyCriteriaLGDNew($HistologyCriteriaLGDNew){
		$this->HistologyCriteriaLGDNew = $HistologyCriteriaLGDNew;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setAdjuvantTreatment($AdjuvantTreatment){
		$this->AdjuvantTreatment = $AdjuvantTreatment;
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
     * Close mysql connection
     */
	public function endesdLesion(){
		$this->connection->CloseMysql();
	}

}