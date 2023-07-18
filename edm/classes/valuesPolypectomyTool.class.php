<?php
/*
 * Author: David Tate  - www.endoscopy.wiki 
 * 
 * Create Date: 30-10-2019
 * 
 * DJT 2019
 * 
 * License: LGPL 
 * 
 */
require_once 'DataBaseMysqlPDO.class.php';

Class valuesPolypectomyTool {

	private $id; //int(11)
	private $Access; //int(1)
	private $Access_t; //varchar(25)
	private $Access_weight; //int(1)
	private $Access_denominator; //int(1)
	private $Antispasmodics; //int(1)
	private $Antispasmodics_t; //varchar(58)
	private $Antispasmodics_weight; //int(1)
	private $Antispasmodics_denominator; //int(1)
	private $Anorectal junction; //int(1)
	private $Anorectal junction_t; //varchar(192)
	private $Anorectal junction_weight; //int(1)
	private $Anorectal junction_denominator; //int(1)
	private $APCTechnique; //int(1)
	private $APCTechnique_t; //varchar(134)
	private $APCTechnique_weight; //int(1)
	private $APCTechnique_denominator; //int(1)
	private $AppendicealOrfice; //int(1)
	private $AppendicealOrfice_t; //varchar(316)
	private $AppendicealOrfice_weight; //int(1)
	private $AppendicealOrfice_denominator; //int(1)
	private $AttemptBeyondCapabilities; //int(1)
	private $AttemptBeyondCapabilities_t; //varchar(48)
	private $AttemptBeyondCapabilities_weight; //int(1)
	private $AttemptBeyondCapabilities_denominator; //int(1)
	private $CauseOfBleedingIdentified; //int(1)
	private $CauseOfBleedingIdentified_t; //varchar(129)
	private $CauseOfBleedingIdentified_weight; //int(1)
	private $CauseOfBleedingIdentified_denominator; //int(1)
	private $ClipUses; //int(1)
	private $ClipUses_t; //varchar(133)
	private $ClipUses_weight; //int(1)
	private $ClipUses_denominator; //int(1)
	private $CoagForceps; //int(1)
	private $CoagForceps_t; //varchar(133)
	private $CoagForceps_weight; //int(1)
	private $CoagForceps_denominator; //int(1)
	private $ColdSnare; //int(1)
	private $ColdSnare_t; //varchar(87)
	private $ColdSnare_weight; //int(1)
	private $ColdSnare_denominator; //int(1)
	private $ColonCleanliness; //int(1)
	private $ColonCleanliness_t; //varchar(8)
	private $GoodResection_EnBloc; //int(1)
	private $GoodResection_EnBloc_t; //varchar(88)
	private $GoodResection_EnBloc_weight; //int(1)
	private $GoodResection_EnBloc_denominator; //int(1)
	private $GoodResection_Piecemeal; //int(1)
	private $GoodResection_Piecemeal_t; //varchar(21)
	private $GoodResection_Piecemeal_weight; //int(1)
	private $GoodResection_Piecemeal_denominator; //int(1)
	private $DiathermyApplication; //int(1)
	private $DiathermyApplication_t; //varchar(50)
	private $DiathermyApplication_weight; //int(1)
	private $DiathermyApplication_denominator; //int(1)
	private $Grade; //int(1)
	private $Grade_t; //varchar(21)
	private $HighestKudo; //int(1)
	private $HighestKudo_t; //varchar(3)
	private $HighestNICE; //int(1)
	private $HighestNICE_t; //varchar(3)
	private $ICV; //int(1)
	private $ICV_t; //varchar(192)
	private $ICV_weight; //int(1)
	private $ICV_denominator; //int(1)
	private $InjectionThroughMalignant; //int(1)
	private $InjectionThroughMalignant_t; //varchar(33)
	private $InjectionThroughMalignant_weight; //int(1)
	private $InjectionThroughMalignant_denominator; //int(1)
	private $IntramucosalBlebs; //int(1)
	private $IntramucosalBlebs_t; //varchar(49)
	private $IntramucosalBlebs_weight; //int(1)
	private $IntramucosalBlebs_denominator; //int(1)
	private $LesionPosition; //int(1)
	private $LesionPosition_t; //varchar(54)
	private $LesionPosition_weight; //int(1)
	private $LesionPosition_denominator; //int(1)
	private $LifetimeProcedures; //int(1)
	private $LifetimeProcedures_t; //varchar(7)
	private $Location; //int(2)
	private $Location_t; //varchar(36)
	private $Location_weight; //int(1)
	private $Location_denominator; //int(1)
	private $MarginTreatment; //int(1)
	private $MarginTreatment_t; //varchar(128)
	private $MarginTreatment_weight; //int(1)
	private $MarginTreatment_denominator; //int(1)
	private $MetalImplant; //int(1)
	private $MetalImplant_t; //varchar(11)
	private $MetalImplant_weight; //int(1)
	private $MetalImplant_denominator; //int(1)
	private $MildBleeding; //int(1)
	private $MildBleeding_t; //varchar(66)
	private $MildBleeding_weight; //int(1)
	private $MildBleeding_denominator; //int(1)
	private $MobilityChecks; //int(1)
	private $MobilityChecks_t; //varchar(49)
	private $MobilityChecks_weight; //int(1)
	private $MobilityChecks_denominator; //int(1)
	private $Morphology; //int(1)
	private $Morphology_t; //varchar(35)
	private $NLATreatment; //int(1)
	private $NLATreatment_t; //varchar(111)
	private $NLATreatment_weight; //int(1)
	private $NLATreatment_denominator; //int(1)
	private $No_yes; //int(1)
	private $No_yes_t; //varchar(3)
	private $No_yes_weight; //int(1)
	private $No_yes_denominator; //int(1)
	private $No_yes_notEncountered; //int(1)
	private $No_yes_notEncountered_t; //varchar(25)
	private $No_yes_notEncountered_weight; //int(1)
	private $No_yes_notEncountered_denominator; //int(1)
	private $NotControlledBleeding; //int(1)
	private $NotControlledBleeding_t; //varchar(51)
	private $NotControlledBleeding_weight; //int(1)
	private $NotControlledBleeding_denominator; //int(1)
	private $NotControlledBleeding_1; //int(1)
	private $NotControlledBleeding_1_t; //varchar(97)
	private $NotControlledBleeding_1_weight; //int(1)
	private $NotControlledBleeding_1_denominator; //int(1)
	private $OTSCTechnique; //int(1)
	private $OTSCTechnique_t; //varchar(188)
	private $OTSCTechnique_weight; //int(1)
	private $OTSCTechnique_denominator; //int(1)
	private $Paris; //int(1)
	private $Paris_t; //varchar(12)
	private $PatientPosition; //int(1)
	private $PatientPosition_t; //varchar(100)
	private $PatientPosition_weight; //int(1)
	private $PatientPosition_denominator; //int(1)
	private $Position; //int(1)
	private $Position_t; //varchar(61)
	private $Position_weight; //int(1)
	private $Position_denominator; //int(1)
	private $PriorClosure; //int(1)
	private $PriorClosure_t; //varchar(64)
	private $PriorClosure_weight; //int(1)
	private $PriorClosure_denominator; //int(1)
	private $Q11; //int(1)
	private $Q11_t; //varchar(76)
	private $Q11_weight; //int(1)
	private $Q11_denominator; //int(1)
	private $Q14; //int(1)
	private $Q14_t; //varchar(17)
	private $Q14_weight; //int(1)
	private $Q14_denominator; //int(1)
	private $Q44; //int(1)
	private $Q44_t; //varchar(48)
	private $Q44_weight; //int(1)
	private $Q44_denominator; //int(1)
	private $Q77; //int(1)
	private $Q77_t; //varchar(46)
	private $Q77_weight; //int(1)
	private $Q77_denominator; //int(1)
	private $Retroflextion; //int(1)
	private $Retroflextion_t; //varchar(79)
	private $Retroflextion_weight; //int(1)
	private $Retroflextion_denominator; //int(1)
	private $RiskOfSMIC; //int(1)
	private $RiskOfSMIC_t; //varchar(29)
	private $SecondLine; //int(1)
	private $SecondLine_t; //varchar(89)
	private $SecondLine_weight; //int(1)
	private $SecondLine_denominator; //int(1)
	private $ScopeChanged; //int(1)
	private $ScopeChanged_t; //varchar(82)
	private $ScopeChanged_weight; //int(1)
	private $ScopeChanged_denominator; //int(1)
	private $ScopeUsed; //int(1)
	private $ScopeUsed_t; //varchar(42)
	private $ScopeUsed_weight; //int(1)
	private $ScopeUsed_denominator; //int(1)
	private $SevereBleeding; //int(1)
	private $SevereBleeding_t; //varchar(66)
	private $SevereBleeding_weight; //int(1)
	private $SevereBleeding_denominator; //int(1)
	private $SubjectiveScore; //int(1)
	private $SubjectiveScore_t; //varchar(13)
	private $SydneyDMIScore; //int(1)
	private $SydneyDMIScore_t; //varchar(133)
	private $SydneyDMIScore_weight; //int(1)
	private $SydneyDMIScore_denominator; //int(1)
	private $SMSAAccess; //int(1)
	private $SMSAAccess_t; //varchar(9)
	private $SMSAAccess_weight; //int(1)
	private $SMSAAccess_denominator; //int(1)
	private $SMSAMorphology; //int(1)
	private $SMSAMorphology_t; //varchar(12)
	private $SMSAMorphology_weight; //int(1)
	private $SMSAMorphology_denominator; //int(1)
	private $SMSASite; //int(1)
	private $SMSASite_t; //varchar(5)
	private $SMSASite_weight; //int(1)
	private $SMSASite_denominator; //int(1)
	private $SMSASize; //int(1)
	private $SMSASize_t; //varchar(8)
	private $SMSASize_weight; //int(1)
	private $SMSASize_denominator; //int(1)
	private $SnareClosure; //int(1)
	private $SnareClosure_t; //varchar(53)
	private $SnareClosure_weight; //int(1)
	private $SnareClosure_denominator; //int(1)
	private $StopInjection; //int(1)
	private $StopInjection_t; //varchar(61)
	private $StopInjection_weight; //int(1)
	private $StopInjection_denominator; //int(1)
	private $STSC; //int(1)
	private $STSC_t; //varchar(83)
	private $STSC_weight; //int(1)
	private $STSC_denominator; //int(1)
	private $STSCTechnique; //int(1)
	private $STSCTechnique_t; //varchar(132)
	private $STSCTechnique_weight; //int(1)
	private $STSCTechnique_denominator; //int(1)
	private $TactileFeedback; //int(1)
	private $TactileFeedback_t; //varchar(113)
	private $TactileFeedback_weight; //int(1)
	private $TactileFeedback_denominator; //int(1)
	private $TTSNotUsed; //int(1)
	private $TTSNotUsed_t; //varchar(145)
	private $TTSNotUsed_weight; //int(1)
	private $TTSNotUsed_denominator; //int(1)
	private $TTSTechnique; //int(1)
	private $TTSTechnique_t; //varchar(102)
	private $TTSTechnique_weight; //int(1)
	private $TTSTechnique_denominator; //int(1)
	private $Uncertainty; //int(1)
	private $Uncertainty_t; //varchar(104)
	private $Uncertainty_weight; //int(1)
	private $Uncertainty_denominator; //int(1)
	private $Yes_no_notReq; //int(1)
	private $Yes_no_notReq_t; //varchar(12)
	private $Yes_no_notReq_weight; //int(1)
	private $Yes_no_notReq_denominator; //int(1)
	private $Yes_no; //int(1)
	private $Yes_no_t; //varchar(3)
	private $Yes_no_weight; //int(1)
	private $Yes_no_denominator; //int(1)
	private $Yes_no_required; //int(1)
	private $Yes_no_required_t; //varchar(21)
	private $Yes_no_required_weight; //int(1)
	private $Yes_no_required_denominator; //int(1)
	private $Yes_no_notOccur; //int(1)
	private $Yes_no_notOccur_t; //varchar(45)
	private $Yes_no_notOccur_weight; //int(1)
	private $Yes_no_notOccur_denominator; //int(1)
	private $Yes_no_addweight; //int(1)
	private $Yes_no_addweight_t; //varchar(3)
	private $Yes_no_addweight_weight; //int(1)
	private $Yes_no_addweight_denominator; //int(1)
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysqlPDOEDM();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_valuesPolypectomyTool($Access,$Access_t,$Access_weight,$Access_denominator,$Antispasmodics,$Antispasmodics_t,$Antispasmodics_weight,$Antispasmodics_denominator,$Anorectal junction,$Anorectal junction_t,$Anorectal junction_weight,$Anorectal junction_denominator,$APCTechnique,$APCTechnique_t,$APCTechnique_weight,$APCTechnique_denominator,$AppendicealOrfice,$AppendicealOrfice_t,$AppendicealOrfice_weight,$AppendicealOrfice_denominator,$AttemptBeyondCapabilities,$AttemptBeyondCapabilities_t,$AttemptBeyondCapabilities_weight,$AttemptBeyondCapabilities_denominator,$CauseOfBleedingIdentified,$CauseOfBleedingIdentified_t,$CauseOfBleedingIdentified_weight,$CauseOfBleedingIdentified_denominator,$ClipUses,$ClipUses_t,$ClipUses_weight,$ClipUses_denominator,$CoagForceps,$CoagForceps_t,$CoagForceps_weight,$CoagForceps_denominator,$ColdSnare,$ColdSnare_t,$ColdSnare_weight,$ColdSnare_denominator,$ColonCleanliness,$ColonCleanliness_t,$GoodResection_EnBloc,$GoodResection_EnBloc_t,$GoodResection_EnBloc_weight,$GoodResection_EnBloc_denominator,$GoodResection_Piecemeal,$GoodResection_Piecemeal_t,$GoodResection_Piecemeal_weight,$GoodResection_Piecemeal_denominator,$DiathermyApplication,$DiathermyApplication_t,$DiathermyApplication_weight,$DiathermyApplication_denominator,$Grade,$Grade_t,$HighestKudo,$HighestKudo_t,$HighestNICE,$HighestNICE_t,$ICV,$ICV_t,$ICV_weight,$ICV_denominator,$InjectionThroughMalignant,$InjectionThroughMalignant_t,$InjectionThroughMalignant_weight,$InjectionThroughMalignant_denominator,$IntramucosalBlebs,$IntramucosalBlebs_t,$IntramucosalBlebs_weight,$IntramucosalBlebs_denominator,$LesionPosition,$LesionPosition_t,$LesionPosition_weight,$LesionPosition_denominator,$LifetimeProcedures,$LifetimeProcedures_t,$Location,$Location_t,$Location_weight,$Location_denominator,$MarginTreatment,$MarginTreatment_t,$MarginTreatment_weight,$MarginTreatment_denominator,$MetalImplant,$MetalImplant_t,$MetalImplant_weight,$MetalImplant_denominator,$MildBleeding,$MildBleeding_t,$MildBleeding_weight,$MildBleeding_denominator,$MobilityChecks,$MobilityChecks_t,$MobilityChecks_weight,$MobilityChecks_denominator,$Morphology,$Morphology_t,$NLATreatment,$NLATreatment_t,$NLATreatment_weight,$NLATreatment_denominator,$No_yes,$No_yes_t,$No_yes_weight,$No_yes_denominator,$No_yes_notEncountered,$No_yes_notEncountered_t,$No_yes_notEncountered_weight,$No_yes_notEncountered_denominator,$NotControlledBleeding,$NotControlledBleeding_t,$NotControlledBleeding_weight,$NotControlledBleeding_denominator,$NotControlledBleeding_1,$NotControlledBleeding_1_t,$NotControlledBleeding_1_weight,$NotControlledBleeding_1_denominator,$OTSCTechnique,$OTSCTechnique_t,$OTSCTechnique_weight,$OTSCTechnique_denominator,$Paris,$Paris_t,$PatientPosition,$PatientPosition_t,$PatientPosition_weight,$PatientPosition_denominator,$Position,$Position_t,$Position_weight,$Position_denominator,$PriorClosure,$PriorClosure_t,$PriorClosure_weight,$PriorClosure_denominator,$Q11,$Q11_t,$Q11_weight,$Q11_denominator,$Q14,$Q14_t,$Q14_weight,$Q14_denominator,$Q44,$Q44_t,$Q44_weight,$Q44_denominator,$Q77,$Q77_t,$Q77_weight,$Q77_denominator,$Retroflextion,$Retroflextion_t,$Retroflextion_weight,$Retroflextion_denominator,$RiskOfSMIC,$RiskOfSMIC_t,$SecondLine,$SecondLine_t,$SecondLine_weight,$SecondLine_denominator,$ScopeChanged,$ScopeChanged_t,$ScopeChanged_weight,$ScopeChanged_denominator,$ScopeUsed,$ScopeUsed_t,$ScopeUsed_weight,$ScopeUsed_denominator,$SevereBleeding,$SevereBleeding_t,$SevereBleeding_weight,$SevereBleeding_denominator,$SubjectiveScore,$SubjectiveScore_t,$SydneyDMIScore,$SydneyDMIScore_t,$SydneyDMIScore_weight,$SydneyDMIScore_denominator,$SMSAAccess,$SMSAAccess_t,$SMSAAccess_weight,$SMSAAccess_denominator,$SMSAMorphology,$SMSAMorphology_t,$SMSAMorphology_weight,$SMSAMorphology_denominator,$SMSASite,$SMSASite_t,$SMSASite_weight,$SMSASite_denominator,$SMSASize,$SMSASize_t,$SMSASize_weight,$SMSASize_denominator,$SnareClosure,$SnareClosure_t,$SnareClosure_weight,$SnareClosure_denominator,$StopInjection,$StopInjection_t,$StopInjection_weight,$StopInjection_denominator,$STSC,$STSC_t,$STSC_weight,$STSC_denominator,$STSCTechnique,$STSCTechnique_t,$STSCTechnique_weight,$STSCTechnique_denominator,$TactileFeedback,$TactileFeedback_t,$TactileFeedback_weight,$TactileFeedback_denominator,$TTSNotUsed,$TTSNotUsed_t,$TTSNotUsed_weight,$TTSNotUsed_denominator,$TTSTechnique,$TTSTechnique_t,$TTSTechnique_weight,$TTSTechnique_denominator,$Uncertainty,$Uncertainty_t,$Uncertainty_weight,$Uncertainty_denominator,$Yes_no_notReq,$Yes_no_notReq_t,$Yes_no_notReq_weight,$Yes_no_notReq_denominator,$Yes_no,$Yes_no_t,$Yes_no_weight,$Yes_no_denominator,$Yes_no_required,$Yes_no_required_t,$Yes_no_required_weight,$Yes_no_required_denominator,$Yes_no_notOccur,$Yes_no_notOccur_t,$Yes_no_notOccur_weight,$Yes_no_notOccur_denominator,$Yes_no_addweight,$Yes_no_addweight_t,$Yes_no_addweight_weight,$Yes_no_addweight_denominator){
		$this->Access = $Access;
		$this->Access_t = $Access_t;
		$this->Access_weight = $Access_weight;
		$this->Access_denominator = $Access_denominator;
		$this->Antispasmodics = $Antispasmodics;
		$this->Antispasmodics_t = $Antispasmodics_t;
		$this->Antispasmodics_weight = $Antispasmodics_weight;
		$this->Antispasmodics_denominator = $Antispasmodics_denominator;
		$this->Anorectal junction = $Anorectal junction;
		$this->Anorectal junction_t = $Anorectal junction_t;
		$this->Anorectal junction_weight = $Anorectal junction_weight;
		$this->Anorectal junction_denominator = $Anorectal junction_denominator;
		$this->APCTechnique = $APCTechnique;
		$this->APCTechnique_t = $APCTechnique_t;
		$this->APCTechnique_weight = $APCTechnique_weight;
		$this->APCTechnique_denominator = $APCTechnique_denominator;
		$this->AppendicealOrfice = $AppendicealOrfice;
		$this->AppendicealOrfice_t = $AppendicealOrfice_t;
		$this->AppendicealOrfice_weight = $AppendicealOrfice_weight;
		$this->AppendicealOrfice_denominator = $AppendicealOrfice_denominator;
		$this->AttemptBeyondCapabilities = $AttemptBeyondCapabilities;
		$this->AttemptBeyondCapabilities_t = $AttemptBeyondCapabilities_t;
		$this->AttemptBeyondCapabilities_weight = $AttemptBeyondCapabilities_weight;
		$this->AttemptBeyondCapabilities_denominator = $AttemptBeyondCapabilities_denominator;
		$this->CauseOfBleedingIdentified = $CauseOfBleedingIdentified;
		$this->CauseOfBleedingIdentified_t = $CauseOfBleedingIdentified_t;
		$this->CauseOfBleedingIdentified_weight = $CauseOfBleedingIdentified_weight;
		$this->CauseOfBleedingIdentified_denominator = $CauseOfBleedingIdentified_denominator;
		$this->ClipUses = $ClipUses;
		$this->ClipUses_t = $ClipUses_t;
		$this->ClipUses_weight = $ClipUses_weight;
		$this->ClipUses_denominator = $ClipUses_denominator;
		$this->CoagForceps = $CoagForceps;
		$this->CoagForceps_t = $CoagForceps_t;
		$this->CoagForceps_weight = $CoagForceps_weight;
		$this->CoagForceps_denominator = $CoagForceps_denominator;
		$this->ColdSnare = $ColdSnare;
		$this->ColdSnare_t = $ColdSnare_t;
		$this->ColdSnare_weight = $ColdSnare_weight;
		$this->ColdSnare_denominator = $ColdSnare_denominator;
		$this->ColonCleanliness = $ColonCleanliness;
		$this->ColonCleanliness_t = $ColonCleanliness_t;
		$this->GoodResection_EnBloc = $GoodResection_EnBloc;
		$this->GoodResection_EnBloc_t = $GoodResection_EnBloc_t;
		$this->GoodResection_EnBloc_weight = $GoodResection_EnBloc_weight;
		$this->GoodResection_EnBloc_denominator = $GoodResection_EnBloc_denominator;
		$this->GoodResection_Piecemeal = $GoodResection_Piecemeal;
		$this->GoodResection_Piecemeal_t = $GoodResection_Piecemeal_t;
		$this->GoodResection_Piecemeal_weight = $GoodResection_Piecemeal_weight;
		$this->GoodResection_Piecemeal_denominator = $GoodResection_Piecemeal_denominator;
		$this->DiathermyApplication = $DiathermyApplication;
		$this->DiathermyApplication_t = $DiathermyApplication_t;
		$this->DiathermyApplication_weight = $DiathermyApplication_weight;
		$this->DiathermyApplication_denominator = $DiathermyApplication_denominator;
		$this->Grade = $Grade;
		$this->Grade_t = $Grade_t;
		$this->HighestKudo = $HighestKudo;
		$this->HighestKudo_t = $HighestKudo_t;
		$this->HighestNICE = $HighestNICE;
		$this->HighestNICE_t = $HighestNICE_t;
		$this->ICV = $ICV;
		$this->ICV_t = $ICV_t;
		$this->ICV_weight = $ICV_weight;
		$this->ICV_denominator = $ICV_denominator;
		$this->InjectionThroughMalignant = $InjectionThroughMalignant;
		$this->InjectionThroughMalignant_t = $InjectionThroughMalignant_t;
		$this->InjectionThroughMalignant_weight = $InjectionThroughMalignant_weight;
		$this->InjectionThroughMalignant_denominator = $InjectionThroughMalignant_denominator;
		$this->IntramucosalBlebs = $IntramucosalBlebs;
		$this->IntramucosalBlebs_t = $IntramucosalBlebs_t;
		$this->IntramucosalBlebs_weight = $IntramucosalBlebs_weight;
		$this->IntramucosalBlebs_denominator = $IntramucosalBlebs_denominator;
		$this->LesionPosition = $LesionPosition;
		$this->LesionPosition_t = $LesionPosition_t;
		$this->LesionPosition_weight = $LesionPosition_weight;
		$this->LesionPosition_denominator = $LesionPosition_denominator;
		$this->LifetimeProcedures = $LifetimeProcedures;
		$this->LifetimeProcedures_t = $LifetimeProcedures_t;
		$this->Location = $Location;
		$this->Location_t = $Location_t;
		$this->Location_weight = $Location_weight;
		$this->Location_denominator = $Location_denominator;
		$this->MarginTreatment = $MarginTreatment;
		$this->MarginTreatment_t = $MarginTreatment_t;
		$this->MarginTreatment_weight = $MarginTreatment_weight;
		$this->MarginTreatment_denominator = $MarginTreatment_denominator;
		$this->MetalImplant = $MetalImplant;
		$this->MetalImplant_t = $MetalImplant_t;
		$this->MetalImplant_weight = $MetalImplant_weight;
		$this->MetalImplant_denominator = $MetalImplant_denominator;
		$this->MildBleeding = $MildBleeding;
		$this->MildBleeding_t = $MildBleeding_t;
		$this->MildBleeding_weight = $MildBleeding_weight;
		$this->MildBleeding_denominator = $MildBleeding_denominator;
		$this->MobilityChecks = $MobilityChecks;
		$this->MobilityChecks_t = $MobilityChecks_t;
		$this->MobilityChecks_weight = $MobilityChecks_weight;
		$this->MobilityChecks_denominator = $MobilityChecks_denominator;
		$this->Morphology = $Morphology;
		$this->Morphology_t = $Morphology_t;
		$this->NLATreatment = $NLATreatment;
		$this->NLATreatment_t = $NLATreatment_t;
		$this->NLATreatment_weight = $NLATreatment_weight;
		$this->NLATreatment_denominator = $NLATreatment_denominator;
		$this->No_yes = $No_yes;
		$this->No_yes_t = $No_yes_t;
		$this->No_yes_weight = $No_yes_weight;
		$this->No_yes_denominator = $No_yes_denominator;
		$this->No_yes_notEncountered = $No_yes_notEncountered;
		$this->No_yes_notEncountered_t = $No_yes_notEncountered_t;
		$this->No_yes_notEncountered_weight = $No_yes_notEncountered_weight;
		$this->No_yes_notEncountered_denominator = $No_yes_notEncountered_denominator;
		$this->NotControlledBleeding = $NotControlledBleeding;
		$this->NotControlledBleeding_t = $NotControlledBleeding_t;
		$this->NotControlledBleeding_weight = $NotControlledBleeding_weight;
		$this->NotControlledBleeding_denominator = $NotControlledBleeding_denominator;
		$this->NotControlledBleeding_1 = $NotControlledBleeding_1;
		$this->NotControlledBleeding_1_t = $NotControlledBleeding_1_t;
		$this->NotControlledBleeding_1_weight = $NotControlledBleeding_1_weight;
		$this->NotControlledBleeding_1_denominator = $NotControlledBleeding_1_denominator;
		$this->OTSCTechnique = $OTSCTechnique;
		$this->OTSCTechnique_t = $OTSCTechnique_t;
		$this->OTSCTechnique_weight = $OTSCTechnique_weight;
		$this->OTSCTechnique_denominator = $OTSCTechnique_denominator;
		$this->Paris = $Paris;
		$this->Paris_t = $Paris_t;
		$this->PatientPosition = $PatientPosition;
		$this->PatientPosition_t = $PatientPosition_t;
		$this->PatientPosition_weight = $PatientPosition_weight;
		$this->PatientPosition_denominator = $PatientPosition_denominator;
		$this->Position = $Position;
		$this->Position_t = $Position_t;
		$this->Position_weight = $Position_weight;
		$this->Position_denominator = $Position_denominator;
		$this->PriorClosure = $PriorClosure;
		$this->PriorClosure_t = $PriorClosure_t;
		$this->PriorClosure_weight = $PriorClosure_weight;
		$this->PriorClosure_denominator = $PriorClosure_denominator;
		$this->Q11 = $Q11;
		$this->Q11_t = $Q11_t;
		$this->Q11_weight = $Q11_weight;
		$this->Q11_denominator = $Q11_denominator;
		$this->Q14 = $Q14;
		$this->Q14_t = $Q14_t;
		$this->Q14_weight = $Q14_weight;
		$this->Q14_denominator = $Q14_denominator;
		$this->Q44 = $Q44;
		$this->Q44_t = $Q44_t;
		$this->Q44_weight = $Q44_weight;
		$this->Q44_denominator = $Q44_denominator;
		$this->Q77 = $Q77;
		$this->Q77_t = $Q77_t;
		$this->Q77_weight = $Q77_weight;
		$this->Q77_denominator = $Q77_denominator;
		$this->Retroflextion = $Retroflextion;
		$this->Retroflextion_t = $Retroflextion_t;
		$this->Retroflextion_weight = $Retroflextion_weight;
		$this->Retroflextion_denominator = $Retroflextion_denominator;
		$this->RiskOfSMIC = $RiskOfSMIC;
		$this->RiskOfSMIC_t = $RiskOfSMIC_t;
		$this->SecondLine = $SecondLine;
		$this->SecondLine_t = $SecondLine_t;
		$this->SecondLine_weight = $SecondLine_weight;
		$this->SecondLine_denominator = $SecondLine_denominator;
		$this->ScopeChanged = $ScopeChanged;
		$this->ScopeChanged_t = $ScopeChanged_t;
		$this->ScopeChanged_weight = $ScopeChanged_weight;
		$this->ScopeChanged_denominator = $ScopeChanged_denominator;
		$this->ScopeUsed = $ScopeUsed;
		$this->ScopeUsed_t = $ScopeUsed_t;
		$this->ScopeUsed_weight = $ScopeUsed_weight;
		$this->ScopeUsed_denominator = $ScopeUsed_denominator;
		$this->SevereBleeding = $SevereBleeding;
		$this->SevereBleeding_t = $SevereBleeding_t;
		$this->SevereBleeding_weight = $SevereBleeding_weight;
		$this->SevereBleeding_denominator = $SevereBleeding_denominator;
		$this->SubjectiveScore = $SubjectiveScore;
		$this->SubjectiveScore_t = $SubjectiveScore_t;
		$this->SydneyDMIScore = $SydneyDMIScore;
		$this->SydneyDMIScore_t = $SydneyDMIScore_t;
		$this->SydneyDMIScore_weight = $SydneyDMIScore_weight;
		$this->SydneyDMIScore_denominator = $SydneyDMIScore_denominator;
		$this->SMSAAccess = $SMSAAccess;
		$this->SMSAAccess_t = $SMSAAccess_t;
		$this->SMSAAccess_weight = $SMSAAccess_weight;
		$this->SMSAAccess_denominator = $SMSAAccess_denominator;
		$this->SMSAMorphology = $SMSAMorphology;
		$this->SMSAMorphology_t = $SMSAMorphology_t;
		$this->SMSAMorphology_weight = $SMSAMorphology_weight;
		$this->SMSAMorphology_denominator = $SMSAMorphology_denominator;
		$this->SMSASite = $SMSASite;
		$this->SMSASite_t = $SMSASite_t;
		$this->SMSASite_weight = $SMSASite_weight;
		$this->SMSASite_denominator = $SMSASite_denominator;
		$this->SMSASize = $SMSASize;
		$this->SMSASize_t = $SMSASize_t;
		$this->SMSASize_weight = $SMSASize_weight;
		$this->SMSASize_denominator = $SMSASize_denominator;
		$this->SnareClosure = $SnareClosure;
		$this->SnareClosure_t = $SnareClosure_t;
		$this->SnareClosure_weight = $SnareClosure_weight;
		$this->SnareClosure_denominator = $SnareClosure_denominator;
		$this->StopInjection = $StopInjection;
		$this->StopInjection_t = $StopInjection_t;
		$this->StopInjection_weight = $StopInjection_weight;
		$this->StopInjection_denominator = $StopInjection_denominator;
		$this->STSC = $STSC;
		$this->STSC_t = $STSC_t;
		$this->STSC_weight = $STSC_weight;
		$this->STSC_denominator = $STSC_denominator;
		$this->STSCTechnique = $STSCTechnique;
		$this->STSCTechnique_t = $STSCTechnique_t;
		$this->STSCTechnique_weight = $STSCTechnique_weight;
		$this->STSCTechnique_denominator = $STSCTechnique_denominator;
		$this->TactileFeedback = $TactileFeedback;
		$this->TactileFeedback_t = $TactileFeedback_t;
		$this->TactileFeedback_weight = $TactileFeedback_weight;
		$this->TactileFeedback_denominator = $TactileFeedback_denominator;
		$this->TTSNotUsed = $TTSNotUsed;
		$this->TTSNotUsed_t = $TTSNotUsed_t;
		$this->TTSNotUsed_weight = $TTSNotUsed_weight;
		$this->TTSNotUsed_denominator = $TTSNotUsed_denominator;
		$this->TTSTechnique = $TTSTechnique;
		$this->TTSTechnique_t = $TTSTechnique_t;
		$this->TTSTechnique_weight = $TTSTechnique_weight;
		$this->TTSTechnique_denominator = $TTSTechnique_denominator;
		$this->Uncertainty = $Uncertainty;
		$this->Uncertainty_t = $Uncertainty_t;
		$this->Uncertainty_weight = $Uncertainty_weight;
		$this->Uncertainty_denominator = $Uncertainty_denominator;
		$this->Yes_no_notReq = $Yes_no_notReq;
		$this->Yes_no_notReq_t = $Yes_no_notReq_t;
		$this->Yes_no_notReq_weight = $Yes_no_notReq_weight;
		$this->Yes_no_notReq_denominator = $Yes_no_notReq_denominator;
		$this->Yes_no = $Yes_no;
		$this->Yes_no_t = $Yes_no_t;
		$this->Yes_no_weight = $Yes_no_weight;
		$this->Yes_no_denominator = $Yes_no_denominator;
		$this->Yes_no_required = $Yes_no_required;
		$this->Yes_no_required_t = $Yes_no_required_t;
		$this->Yes_no_required_weight = $Yes_no_required_weight;
		$this->Yes_no_required_denominator = $Yes_no_required_denominator;
		$this->Yes_no_notOccur = $Yes_no_notOccur;
		$this->Yes_no_notOccur_t = $Yes_no_notOccur_t;
		$this->Yes_no_notOccur_weight = $Yes_no_notOccur_weight;
		$this->Yes_no_notOccur_denominator = $Yes_no_notOccur_denominator;
		$this->Yes_no_addweight = $Yes_no_addweight;
		$this->Yes_no_addweight_t = $Yes_no_addweight_t;
		$this->Yes_no_addweight_weight = $Yes_no_addweight_weight;
		$this->Yes_no_addweight_denominator = $Yes_no_addweight_denominator;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from valuesPolypectomyTool where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->Access = $row["Access"];
			$this->Access_t = $row["Access_t"];
			$this->Access_weight = $row["Access_weight"];
			$this->Access_denominator = $row["Access_denominator"];
			$this->Antispasmodics = $row["Antispasmodics"];
			$this->Antispasmodics_t = $row["Antispasmodics_t"];
			$this->Antispasmodics_weight = $row["Antispasmodics_weight"];
			$this->Antispasmodics_denominator = $row["Antispasmodics_denominator"];
			$this->Anorectal junction = $row["Anorectal junction"];
			$this->Anorectal junction_t = $row["Anorectal junction_t"];
			$this->Anorectal junction_weight = $row["Anorectal junction_weight"];
			$this->Anorectal junction_denominator = $row["Anorectal junction_denominator"];
			$this->APCTechnique = $row["APCTechnique"];
			$this->APCTechnique_t = $row["APCTechnique_t"];
			$this->APCTechnique_weight = $row["APCTechnique_weight"];
			$this->APCTechnique_denominator = $row["APCTechnique_denominator"];
			$this->AppendicealOrfice = $row["AppendicealOrfice"];
			$this->AppendicealOrfice_t = $row["AppendicealOrfice_t"];
			$this->AppendicealOrfice_weight = $row["AppendicealOrfice_weight"];
			$this->AppendicealOrfice_denominator = $row["AppendicealOrfice_denominator"];
			$this->AttemptBeyondCapabilities = $row["AttemptBeyondCapabilities"];
			$this->AttemptBeyondCapabilities_t = $row["AttemptBeyondCapabilities_t"];
			$this->AttemptBeyondCapabilities_weight = $row["AttemptBeyondCapabilities_weight"];
			$this->AttemptBeyondCapabilities_denominator = $row["AttemptBeyondCapabilities_denominator"];
			$this->CauseOfBleedingIdentified = $row["CauseOfBleedingIdentified"];
			$this->CauseOfBleedingIdentified_t = $row["CauseOfBleedingIdentified_t"];
			$this->CauseOfBleedingIdentified_weight = $row["CauseOfBleedingIdentified_weight"];
			$this->CauseOfBleedingIdentified_denominator = $row["CauseOfBleedingIdentified_denominator"];
			$this->ClipUses = $row["ClipUses"];
			$this->ClipUses_t = $row["ClipUses_t"];
			$this->ClipUses_weight = $row["ClipUses_weight"];
			$this->ClipUses_denominator = $row["ClipUses_denominator"];
			$this->CoagForceps = $row["CoagForceps"];
			$this->CoagForceps_t = $row["CoagForceps_t"];
			$this->CoagForceps_weight = $row["CoagForceps_weight"];
			$this->CoagForceps_denominator = $row["CoagForceps_denominator"];
			$this->ColdSnare = $row["ColdSnare"];
			$this->ColdSnare_t = $row["ColdSnare_t"];
			$this->ColdSnare_weight = $row["ColdSnare_weight"];
			$this->ColdSnare_denominator = $row["ColdSnare_denominator"];
			$this->ColonCleanliness = $row["ColonCleanliness"];
			$this->ColonCleanliness_t = $row["ColonCleanliness_t"];
			$this->GoodResection_EnBloc = $row["GoodResection_EnBloc"];
			$this->GoodResection_EnBloc_t = $row["GoodResection_EnBloc_t"];
			$this->GoodResection_EnBloc_weight = $row["GoodResection_EnBloc_weight"];
			$this->GoodResection_EnBloc_denominator = $row["GoodResection_EnBloc_denominator"];
			$this->GoodResection_Piecemeal = $row["GoodResection_Piecemeal"];
			$this->GoodResection_Piecemeal_t = $row["GoodResection_Piecemeal_t"];
			$this->GoodResection_Piecemeal_weight = $row["GoodResection_Piecemeal_weight"];
			$this->GoodResection_Piecemeal_denominator = $row["GoodResection_Piecemeal_denominator"];
			$this->DiathermyApplication = $row["DiathermyApplication"];
			$this->DiathermyApplication_t = $row["DiathermyApplication_t"];
			$this->DiathermyApplication_weight = $row["DiathermyApplication_weight"];
			$this->DiathermyApplication_denominator = $row["DiathermyApplication_denominator"];
			$this->Grade = $row["Grade"];
			$this->Grade_t = $row["Grade_t"];
			$this->HighestKudo = $row["HighestKudo"];
			$this->HighestKudo_t = $row["HighestKudo_t"];
			$this->HighestNICE = $row["HighestNICE"];
			$this->HighestNICE_t = $row["HighestNICE_t"];
			$this->ICV = $row["ICV"];
			$this->ICV_t = $row["ICV_t"];
			$this->ICV_weight = $row["ICV_weight"];
			$this->ICV_denominator = $row["ICV_denominator"];
			$this->InjectionThroughMalignant = $row["InjectionThroughMalignant"];
			$this->InjectionThroughMalignant_t = $row["InjectionThroughMalignant_t"];
			$this->InjectionThroughMalignant_weight = $row["InjectionThroughMalignant_weight"];
			$this->InjectionThroughMalignant_denominator = $row["InjectionThroughMalignant_denominator"];
			$this->IntramucosalBlebs = $row["IntramucosalBlebs"];
			$this->IntramucosalBlebs_t = $row["IntramucosalBlebs_t"];
			$this->IntramucosalBlebs_weight = $row["IntramucosalBlebs_weight"];
			$this->IntramucosalBlebs_denominator = $row["IntramucosalBlebs_denominator"];
			$this->LesionPosition = $row["LesionPosition"];
			$this->LesionPosition_t = $row["LesionPosition_t"];
			$this->LesionPosition_weight = $row["LesionPosition_weight"];
			$this->LesionPosition_denominator = $row["LesionPosition_denominator"];
			$this->LifetimeProcedures = $row["LifetimeProcedures"];
			$this->LifetimeProcedures_t = $row["LifetimeProcedures_t"];
			$this->Location = $row["Location"];
			$this->Location_t = $row["Location_t"];
			$this->Location_weight = $row["Location_weight"];
			$this->Location_denominator = $row["Location_denominator"];
			$this->MarginTreatment = $row["MarginTreatment"];
			$this->MarginTreatment_t = $row["MarginTreatment_t"];
			$this->MarginTreatment_weight = $row["MarginTreatment_weight"];
			$this->MarginTreatment_denominator = $row["MarginTreatment_denominator"];
			$this->MetalImplant = $row["MetalImplant"];
			$this->MetalImplant_t = $row["MetalImplant_t"];
			$this->MetalImplant_weight = $row["MetalImplant_weight"];
			$this->MetalImplant_denominator = $row["MetalImplant_denominator"];
			$this->MildBleeding = $row["MildBleeding"];
			$this->MildBleeding_t = $row["MildBleeding_t"];
			$this->MildBleeding_weight = $row["MildBleeding_weight"];
			$this->MildBleeding_denominator = $row["MildBleeding_denominator"];
			$this->MobilityChecks = $row["MobilityChecks"];
			$this->MobilityChecks_t = $row["MobilityChecks_t"];
			$this->MobilityChecks_weight = $row["MobilityChecks_weight"];
			$this->MobilityChecks_denominator = $row["MobilityChecks_denominator"];
			$this->Morphology = $row["Morphology"];
			$this->Morphology_t = $row["Morphology_t"];
			$this->NLATreatment = $row["NLATreatment"];
			$this->NLATreatment_t = $row["NLATreatment_t"];
			$this->NLATreatment_weight = $row["NLATreatment_weight"];
			$this->NLATreatment_denominator = $row["NLATreatment_denominator"];
			$this->No_yes = $row["No_yes"];
			$this->No_yes_t = $row["No_yes_t"];
			$this->No_yes_weight = $row["No_yes_weight"];
			$this->No_yes_denominator = $row["No_yes_denominator"];
			$this->No_yes_notEncountered = $row["No_yes_notEncountered"];
			$this->No_yes_notEncountered_t = $row["No_yes_notEncountered_t"];
			$this->No_yes_notEncountered_weight = $row["No_yes_notEncountered_weight"];
			$this->No_yes_notEncountered_denominator = $row["No_yes_notEncountered_denominator"];
			$this->NotControlledBleeding = $row["NotControlledBleeding"];
			$this->NotControlledBleeding_t = $row["NotControlledBleeding_t"];
			$this->NotControlledBleeding_weight = $row["NotControlledBleeding_weight"];
			$this->NotControlledBleeding_denominator = $row["NotControlledBleeding_denominator"];
			$this->NotControlledBleeding_1 = $row["NotControlledBleeding_1"];
			$this->NotControlledBleeding_1_t = $row["NotControlledBleeding_1_t"];
			$this->NotControlledBleeding_1_weight = $row["NotControlledBleeding_1_weight"];
			$this->NotControlledBleeding_1_denominator = $row["NotControlledBleeding_1_denominator"];
			$this->OTSCTechnique = $row["OTSCTechnique"];
			$this->OTSCTechnique_t = $row["OTSCTechnique_t"];
			$this->OTSCTechnique_weight = $row["OTSCTechnique_weight"];
			$this->OTSCTechnique_denominator = $row["OTSCTechnique_denominator"];
			$this->Paris = $row["Paris"];
			$this->Paris_t = $row["Paris_t"];
			$this->PatientPosition = $row["PatientPosition"];
			$this->PatientPosition_t = $row["PatientPosition_t"];
			$this->PatientPosition_weight = $row["PatientPosition_weight"];
			$this->PatientPosition_denominator = $row["PatientPosition_denominator"];
			$this->Position = $row["Position"];
			$this->Position_t = $row["Position_t"];
			$this->Position_weight = $row["Position_weight"];
			$this->Position_denominator = $row["Position_denominator"];
			$this->PriorClosure = $row["PriorClosure"];
			$this->PriorClosure_t = $row["PriorClosure_t"];
			$this->PriorClosure_weight = $row["PriorClosure_weight"];
			$this->PriorClosure_denominator = $row["PriorClosure_denominator"];
			$this->Q11 = $row["Q11"];
			$this->Q11_t = $row["Q11_t"];
			$this->Q11_weight = $row["Q11_weight"];
			$this->Q11_denominator = $row["Q11_denominator"];
			$this->Q14 = $row["Q14"];
			$this->Q14_t = $row["Q14_t"];
			$this->Q14_weight = $row["Q14_weight"];
			$this->Q14_denominator = $row["Q14_denominator"];
			$this->Q44 = $row["Q44"];
			$this->Q44_t = $row["Q44_t"];
			$this->Q44_weight = $row["Q44_weight"];
			$this->Q44_denominator = $row["Q44_denominator"];
			$this->Q77 = $row["Q77"];
			$this->Q77_t = $row["Q77_t"];
			$this->Q77_weight = $row["Q77_weight"];
			$this->Q77_denominator = $row["Q77_denominator"];
			$this->Retroflextion = $row["Retroflextion"];
			$this->Retroflextion_t = $row["Retroflextion_t"];
			$this->Retroflextion_weight = $row["Retroflextion_weight"];
			$this->Retroflextion_denominator = $row["Retroflextion_denominator"];
			$this->RiskOfSMIC = $row["RiskOfSMIC"];
			$this->RiskOfSMIC_t = $row["RiskOfSMIC_t"];
			$this->SecondLine = $row["SecondLine"];
			$this->SecondLine_t = $row["SecondLine_t"];
			$this->SecondLine_weight = $row["SecondLine_weight"];
			$this->SecondLine_denominator = $row["SecondLine_denominator"];
			$this->ScopeChanged = $row["ScopeChanged"];
			$this->ScopeChanged_t = $row["ScopeChanged_t"];
			$this->ScopeChanged_weight = $row["ScopeChanged_weight"];
			$this->ScopeChanged_denominator = $row["ScopeChanged_denominator"];
			$this->ScopeUsed = $row["ScopeUsed"];
			$this->ScopeUsed_t = $row["ScopeUsed_t"];
			$this->ScopeUsed_weight = $row["ScopeUsed_weight"];
			$this->ScopeUsed_denominator = $row["ScopeUsed_denominator"];
			$this->SevereBleeding = $row["SevereBleeding"];
			$this->SevereBleeding_t = $row["SevereBleeding_t"];
			$this->SevereBleeding_weight = $row["SevereBleeding_weight"];
			$this->SevereBleeding_denominator = $row["SevereBleeding_denominator"];
			$this->SubjectiveScore = $row["SubjectiveScore"];
			$this->SubjectiveScore_t = $row["SubjectiveScore_t"];
			$this->SydneyDMIScore = $row["SydneyDMIScore"];
			$this->SydneyDMIScore_t = $row["SydneyDMIScore_t"];
			$this->SydneyDMIScore_weight = $row["SydneyDMIScore_weight"];
			$this->SydneyDMIScore_denominator = $row["SydneyDMIScore_denominator"];
			$this->SMSAAccess = $row["SMSAAccess"];
			$this->SMSAAccess_t = $row["SMSAAccess_t"];
			$this->SMSAAccess_weight = $row["SMSAAccess_weight"];
			$this->SMSAAccess_denominator = $row["SMSAAccess_denominator"];
			$this->SMSAMorphology = $row["SMSAMorphology"];
			$this->SMSAMorphology_t = $row["SMSAMorphology_t"];
			$this->SMSAMorphology_weight = $row["SMSAMorphology_weight"];
			$this->SMSAMorphology_denominator = $row["SMSAMorphology_denominator"];
			$this->SMSASite = $row["SMSASite"];
			$this->SMSASite_t = $row["SMSASite_t"];
			$this->SMSASite_weight = $row["SMSASite_weight"];
			$this->SMSASite_denominator = $row["SMSASite_denominator"];
			$this->SMSASize = $row["SMSASize"];
			$this->SMSASize_t = $row["SMSASize_t"];
			$this->SMSASize_weight = $row["SMSASize_weight"];
			$this->SMSASize_denominator = $row["SMSASize_denominator"];
			$this->SnareClosure = $row["SnareClosure"];
			$this->SnareClosure_t = $row["SnareClosure_t"];
			$this->SnareClosure_weight = $row["SnareClosure_weight"];
			$this->SnareClosure_denominator = $row["SnareClosure_denominator"];
			$this->StopInjection = $row["StopInjection"];
			$this->StopInjection_t = $row["StopInjection_t"];
			$this->StopInjection_weight = $row["StopInjection_weight"];
			$this->StopInjection_denominator = $row["StopInjection_denominator"];
			$this->STSC = $row["STSC"];
			$this->STSC_t = $row["STSC_t"];
			$this->STSC_weight = $row["STSC_weight"];
			$this->STSC_denominator = $row["STSC_denominator"];
			$this->STSCTechnique = $row["STSCTechnique"];
			$this->STSCTechnique_t = $row["STSCTechnique_t"];
			$this->STSCTechnique_weight = $row["STSCTechnique_weight"];
			$this->STSCTechnique_denominator = $row["STSCTechnique_denominator"];
			$this->TactileFeedback = $row["TactileFeedback"];
			$this->TactileFeedback_t = $row["TactileFeedback_t"];
			$this->TactileFeedback_weight = $row["TactileFeedback_weight"];
			$this->TactileFeedback_denominator = $row["TactileFeedback_denominator"];
			$this->TTSNotUsed = $row["TTSNotUsed"];
			$this->TTSNotUsed_t = $row["TTSNotUsed_t"];
			$this->TTSNotUsed_weight = $row["TTSNotUsed_weight"];
			$this->TTSNotUsed_denominator = $row["TTSNotUsed_denominator"];
			$this->TTSTechnique = $row["TTSTechnique"];
			$this->TTSTechnique_t = $row["TTSTechnique_t"];
			$this->TTSTechnique_weight = $row["TTSTechnique_weight"];
			$this->TTSTechnique_denominator = $row["TTSTechnique_denominator"];
			$this->Uncertainty = $row["Uncertainty"];
			$this->Uncertainty_t = $row["Uncertainty_t"];
			$this->Uncertainty_weight = $row["Uncertainty_weight"];
			$this->Uncertainty_denominator = $row["Uncertainty_denominator"];
			$this->Yes_no_notReq = $row["Yes_no_notReq"];
			$this->Yes_no_notReq_t = $row["Yes_no_notReq_t"];
			$this->Yes_no_notReq_weight = $row["Yes_no_notReq_weight"];
			$this->Yes_no_notReq_denominator = $row["Yes_no_notReq_denominator"];
			$this->Yes_no = $row["Yes_no"];
			$this->Yes_no_t = $row["Yes_no_t"];
			$this->Yes_no_weight = $row["Yes_no_weight"];
			$this->Yes_no_denominator = $row["Yes_no_denominator"];
			$this->Yes_no_required = $row["Yes_no_required"];
			$this->Yes_no_required_t = $row["Yes_no_required_t"];
			$this->Yes_no_required_weight = $row["Yes_no_required_weight"];
			$this->Yes_no_required_denominator = $row["Yes_no_required_denominator"];
			$this->Yes_no_notOccur = $row["Yes_no_notOccur"];
			$this->Yes_no_notOccur_t = $row["Yes_no_notOccur_t"];
			$this->Yes_no_notOccur_weight = $row["Yes_no_notOccur_weight"];
			$this->Yes_no_notOccur_denominator = $row["Yes_no_notOccur_denominator"];
			$this->Yes_no_addweight = $row["Yes_no_addweight"];
			$this->Yes_no_addweight_t = $row["Yes_no_addweight_t"];
			$this->Yes_no_addweight_weight = $row["Yes_no_addweight_weight"];
			$this->Yes_no_addweight_denominator = $row["Yes_no_addweight_denominator"];
		}
	}

    /**
     * Checks if the specified record exists
     *
     * @param key_table_type $key_row
     *
     */
	public function matchRecord($key_row){
		$result = $this->connection->RunQuery("Select * from valuesPolypectomyTool where id = \'$key_row\' ");
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
		return $this->connection->TotalOfRows('valuesPolypectomyTool');
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
$q = "INSERT INTO `valuesPolypectomyTool` ($keys) VALUES ($keys2)";
		
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
$q = "UPDATE `valuesPolypectomyTool` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$this->connection->RunQuery("DELETE FROM valuesPolypectomyTool WHERE id = $key_row");
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
		$result = $this->connection->RunQuery("SELECT id from valuesPolypectomyTool order by $column $order");
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
	 * @return Access - int(1)
	 */
	public function getAccess(){
		return $this->Access;
	}

	/**
	 * @return Access_t - varchar(25)
	 */
	public function getAccess_t(){
		return $this->Access_t;
	}

	/**
	 * @return Access_weight - int(1)
	 */
	public function getAccess_weight(){
		return $this->Access_weight;
	}

	/**
	 * @return Access_denominator - int(1)
	 */
	public function getAccess_denominator(){
		return $this->Access_denominator;
	}

	/**
	 * @return Antispasmodics - int(1)
	 */
	public function getAntispasmodics(){
		return $this->Antispasmodics;
	}

	/**
	 * @return Antispasmodics_t - varchar(58)
	 */
	public function getAntispasmodics_t(){
		return $this->Antispasmodics_t;
	}

	/**
	 * @return Antispasmodics_weight - int(1)
	 */
	public function getAntispasmodics_weight(){
		return $this->Antispasmodics_weight;
	}

	/**
	 * @return Antispasmodics_denominator - int(1)
	 */
	public function getAntispasmodics_denominator(){
		return $this->Antispasmodics_denominator;
	}

	/**
	 * @return Anorectal junction - int(1)
	 */
	public function getAnorectal junction(){
		return $this->Anorectal junction;
	}

	/**
	 * @return Anorectal junction_t - varchar(192)
	 */
	public function getAnorectal junction_t(){
		return $this->Anorectal junction_t;
	}

	/**
	 * @return Anorectal junction_weight - int(1)
	 */
	public function getAnorectal junction_weight(){
		return $this->Anorectal junction_weight;
	}

	/**
	 * @return Anorectal junction_denominator - int(1)
	 */
	public function getAnorectal junction_denominator(){
		return $this->Anorectal junction_denominator;
	}

	/**
	 * @return APCTechnique - int(1)
	 */
	public function getAPCTechnique(){
		return $this->APCTechnique;
	}

	/**
	 * @return APCTechnique_t - varchar(134)
	 */
	public function getAPCTechnique_t(){
		return $this->APCTechnique_t;
	}

	/**
	 * @return APCTechnique_weight - int(1)
	 */
	public function getAPCTechnique_weight(){
		return $this->APCTechnique_weight;
	}

	/**
	 * @return APCTechnique_denominator - int(1)
	 */
	public function getAPCTechnique_denominator(){
		return $this->APCTechnique_denominator;
	}

	/**
	 * @return AppendicealOrfice - int(1)
	 */
	public function getAppendicealOrfice(){
		return $this->AppendicealOrfice;
	}

	/**
	 * @return AppendicealOrfice_t - varchar(316)
	 */
	public function getAppendicealOrfice_t(){
		return $this->AppendicealOrfice_t;
	}

	/**
	 * @return AppendicealOrfice_weight - int(1)
	 */
	public function getAppendicealOrfice_weight(){
		return $this->AppendicealOrfice_weight;
	}

	/**
	 * @return AppendicealOrfice_denominator - int(1)
	 */
	public function getAppendicealOrfice_denominator(){
		return $this->AppendicealOrfice_denominator;
	}

	/**
	 * @return AttemptBeyondCapabilities - int(1)
	 */
	public function getAttemptBeyondCapabilities(){
		return $this->AttemptBeyondCapabilities;
	}

	/**
	 * @return AttemptBeyondCapabilities_t - varchar(48)
	 */
	public function getAttemptBeyondCapabilities_t(){
		return $this->AttemptBeyondCapabilities_t;
	}

	/**
	 * @return AttemptBeyondCapabilities_weight - int(1)
	 */
	public function getAttemptBeyondCapabilities_weight(){
		return $this->AttemptBeyondCapabilities_weight;
	}

	/**
	 * @return AttemptBeyondCapabilities_denominator - int(1)
	 */
	public function getAttemptBeyondCapabilities_denominator(){
		return $this->AttemptBeyondCapabilities_denominator;
	}

	/**
	 * @return CauseOfBleedingIdentified - int(1)
	 */
	public function getCauseOfBleedingIdentified(){
		return $this->CauseOfBleedingIdentified;
	}

	/**
	 * @return CauseOfBleedingIdentified_t - varchar(129)
	 */
	public function getCauseOfBleedingIdentified_t(){
		return $this->CauseOfBleedingIdentified_t;
	}

	/**
	 * @return CauseOfBleedingIdentified_weight - int(1)
	 */
	public function getCauseOfBleedingIdentified_weight(){
		return $this->CauseOfBleedingIdentified_weight;
	}

	/**
	 * @return CauseOfBleedingIdentified_denominator - int(1)
	 */
	public function getCauseOfBleedingIdentified_denominator(){
		return $this->CauseOfBleedingIdentified_denominator;
	}

	/**
	 * @return ClipUses - int(1)
	 */
	public function getClipUses(){
		return $this->ClipUses;
	}

	/**
	 * @return ClipUses_t - varchar(133)
	 */
	public function getClipUses_t(){
		return $this->ClipUses_t;
	}

	/**
	 * @return ClipUses_weight - int(1)
	 */
	public function getClipUses_weight(){
		return $this->ClipUses_weight;
	}

	/**
	 * @return ClipUses_denominator - int(1)
	 */
	public function getClipUses_denominator(){
		return $this->ClipUses_denominator;
	}

	/**
	 * @return CoagForceps - int(1)
	 */
	public function getCoagForceps(){
		return $this->CoagForceps;
	}

	/**
	 * @return CoagForceps_t - varchar(133)
	 */
	public function getCoagForceps_t(){
		return $this->CoagForceps_t;
	}

	/**
	 * @return CoagForceps_weight - int(1)
	 */
	public function getCoagForceps_weight(){
		return $this->CoagForceps_weight;
	}

	/**
	 * @return CoagForceps_denominator - int(1)
	 */
	public function getCoagForceps_denominator(){
		return $this->CoagForceps_denominator;
	}

	/**
	 * @return ColdSnare - int(1)
	 */
	public function getColdSnare(){
		return $this->ColdSnare;
	}

	/**
	 * @return ColdSnare_t - varchar(87)
	 */
	public function getColdSnare_t(){
		return $this->ColdSnare_t;
	}

	/**
	 * @return ColdSnare_weight - int(1)
	 */
	public function getColdSnare_weight(){
		return $this->ColdSnare_weight;
	}

	/**
	 * @return ColdSnare_denominator - int(1)
	 */
	public function getColdSnare_denominator(){
		return $this->ColdSnare_denominator;
	}

	/**
	 * @return ColonCleanliness - int(1)
	 */
	public function getColonCleanliness(){
		return $this->ColonCleanliness;
	}

	/**
	 * @return ColonCleanliness_t - varchar(8)
	 */
	public function getColonCleanliness_t(){
		return $this->ColonCleanliness_t;
	}

	/**
	 * @return GoodResection_EnBloc - int(1)
	 */
	public function getGoodResection_EnBloc(){
		return $this->GoodResection_EnBloc;
	}

	/**
	 * @return GoodResection_EnBloc_t - varchar(88)
	 */
	public function getGoodResection_EnBloc_t(){
		return $this->GoodResection_EnBloc_t;
	}

	/**
	 * @return GoodResection_EnBloc_weight - int(1)
	 */
	public function getGoodResection_EnBloc_weight(){
		return $this->GoodResection_EnBloc_weight;
	}

	/**
	 * @return GoodResection_EnBloc_denominator - int(1)
	 */
	public function getGoodResection_EnBloc_denominator(){
		return $this->GoodResection_EnBloc_denominator;
	}

	/**
	 * @return GoodResection_Piecemeal - int(1)
	 */
	public function getGoodResection_Piecemeal(){
		return $this->GoodResection_Piecemeal;
	}

	/**
	 * @return GoodResection_Piecemeal_t - varchar(21)
	 */
	public function getGoodResection_Piecemeal_t(){
		return $this->GoodResection_Piecemeal_t;
	}

	/**
	 * @return GoodResection_Piecemeal_weight - int(1)
	 */
	public function getGoodResection_Piecemeal_weight(){
		return $this->GoodResection_Piecemeal_weight;
	}

	/**
	 * @return GoodResection_Piecemeal_denominator - int(1)
	 */
	public function getGoodResection_Piecemeal_denominator(){
		return $this->GoodResection_Piecemeal_denominator;
	}

	/**
	 * @return DiathermyApplication - int(1)
	 */
	public function getDiathermyApplication(){
		return $this->DiathermyApplication;
	}

	/**
	 * @return DiathermyApplication_t - varchar(50)
	 */
	public function getDiathermyApplication_t(){
		return $this->DiathermyApplication_t;
	}

	/**
	 * @return DiathermyApplication_weight - int(1)
	 */
	public function getDiathermyApplication_weight(){
		return $this->DiathermyApplication_weight;
	}

	/**
	 * @return DiathermyApplication_denominator - int(1)
	 */
	public function getDiathermyApplication_denominator(){
		return $this->DiathermyApplication_denominator;
	}

	/**
	 * @return Grade - int(1)
	 */
	public function getGrade(){
		return $this->Grade;
	}

	/**
	 * @return Grade_t - varchar(21)
	 */
	public function getGrade_t(){
		return $this->Grade_t;
	}

	/**
	 * @return HighestKudo - int(1)
	 */
	public function getHighestKudo(){
		return $this->HighestKudo;
	}

	/**
	 * @return HighestKudo_t - varchar(3)
	 */
	public function getHighestKudo_t(){
		return $this->HighestKudo_t;
	}

	/**
	 * @return HighestNICE - int(1)
	 */
	public function getHighestNICE(){
		return $this->HighestNICE;
	}

	/**
	 * @return HighestNICE_t - varchar(3)
	 */
	public function getHighestNICE_t(){
		return $this->HighestNICE_t;
	}

	/**
	 * @return ICV - int(1)
	 */
	public function getICV(){
		return $this->ICV;
	}

	/**
	 * @return ICV_t - varchar(192)
	 */
	public function getICV_t(){
		return $this->ICV_t;
	}

	/**
	 * @return ICV_weight - int(1)
	 */
	public function getICV_weight(){
		return $this->ICV_weight;
	}

	/**
	 * @return ICV_denominator - int(1)
	 */
	public function getICV_denominator(){
		return $this->ICV_denominator;
	}

	/**
	 * @return InjectionThroughMalignant - int(1)
	 */
	public function getInjectionThroughMalignant(){
		return $this->InjectionThroughMalignant;
	}

	/**
	 * @return InjectionThroughMalignant_t - varchar(33)
	 */
	public function getInjectionThroughMalignant_t(){
		return $this->InjectionThroughMalignant_t;
	}

	/**
	 * @return InjectionThroughMalignant_weight - int(1)
	 */
	public function getInjectionThroughMalignant_weight(){
		return $this->InjectionThroughMalignant_weight;
	}

	/**
	 * @return InjectionThroughMalignant_denominator - int(1)
	 */
	public function getInjectionThroughMalignant_denominator(){
		return $this->InjectionThroughMalignant_denominator;
	}

	/**
	 * @return IntramucosalBlebs - int(1)
	 */
	public function getIntramucosalBlebs(){
		return $this->IntramucosalBlebs;
	}

	/**
	 * @return IntramucosalBlebs_t - varchar(49)
	 */
	public function getIntramucosalBlebs_t(){
		return $this->IntramucosalBlebs_t;
	}

	/**
	 * @return IntramucosalBlebs_weight - int(1)
	 */
	public function getIntramucosalBlebs_weight(){
		return $this->IntramucosalBlebs_weight;
	}

	/**
	 * @return IntramucosalBlebs_denominator - int(1)
	 */
	public function getIntramucosalBlebs_denominator(){
		return $this->IntramucosalBlebs_denominator;
	}

	/**
	 * @return LesionPosition - int(1)
	 */
	public function getLesionPosition(){
		return $this->LesionPosition;
	}

	/**
	 * @return LesionPosition_t - varchar(54)
	 */
	public function getLesionPosition_t(){
		return $this->LesionPosition_t;
	}

	/**
	 * @return LesionPosition_weight - int(1)
	 */
	public function getLesionPosition_weight(){
		return $this->LesionPosition_weight;
	}

	/**
	 * @return LesionPosition_denominator - int(1)
	 */
	public function getLesionPosition_denominator(){
		return $this->LesionPosition_denominator;
	}

	/**
	 * @return LifetimeProcedures - int(1)
	 */
	public function getLifetimeProcedures(){
		return $this->LifetimeProcedures;
	}

	/**
	 * @return LifetimeProcedures_t - varchar(7)
	 */
	public function getLifetimeProcedures_t(){
		return $this->LifetimeProcedures_t;
	}

	/**
	 * @return Location - int(2)
	 */
	public function getLocation(){
		return $this->Location;
	}

	/**
	 * @return Location_t - varchar(36)
	 */
	public function getLocation_t(){
		return $this->Location_t;
	}

	/**
	 * @return Location_weight - int(1)
	 */
	public function getLocation_weight(){
		return $this->Location_weight;
	}

	/**
	 * @return Location_denominator - int(1)
	 */
	public function getLocation_denominator(){
		return $this->Location_denominator;
	}

	/**
	 * @return MarginTreatment - int(1)
	 */
	public function getMarginTreatment(){
		return $this->MarginTreatment;
	}

	/**
	 * @return MarginTreatment_t - varchar(128)
	 */
	public function getMarginTreatment_t(){
		return $this->MarginTreatment_t;
	}

	/**
	 * @return MarginTreatment_weight - int(1)
	 */
	public function getMarginTreatment_weight(){
		return $this->MarginTreatment_weight;
	}

	/**
	 * @return MarginTreatment_denominator - int(1)
	 */
	public function getMarginTreatment_denominator(){
		return $this->MarginTreatment_denominator;
	}

	/**
	 * @return MetalImplant - int(1)
	 */
	public function getMetalImplant(){
		return $this->MetalImplant;
	}

	/**
	 * @return MetalImplant_t - varchar(11)
	 */
	public function getMetalImplant_t(){
		return $this->MetalImplant_t;
	}

	/**
	 * @return MetalImplant_weight - int(1)
	 */
	public function getMetalImplant_weight(){
		return $this->MetalImplant_weight;
	}

	/**
	 * @return MetalImplant_denominator - int(1)
	 */
	public function getMetalImplant_denominator(){
		return $this->MetalImplant_denominator;
	}

	/**
	 * @return MildBleeding - int(1)
	 */
	public function getMildBleeding(){
		return $this->MildBleeding;
	}

	/**
	 * @return MildBleeding_t - varchar(66)
	 */
	public function getMildBleeding_t(){
		return $this->MildBleeding_t;
	}

	/**
	 * @return MildBleeding_weight - int(1)
	 */
	public function getMildBleeding_weight(){
		return $this->MildBleeding_weight;
	}

	/**
	 * @return MildBleeding_denominator - int(1)
	 */
	public function getMildBleeding_denominator(){
		return $this->MildBleeding_denominator;
	}

	/**
	 * @return MobilityChecks - int(1)
	 */
	public function getMobilityChecks(){
		return $this->MobilityChecks;
	}

	/**
	 * @return MobilityChecks_t - varchar(49)
	 */
	public function getMobilityChecks_t(){
		return $this->MobilityChecks_t;
	}

	/**
	 * @return MobilityChecks_weight - int(1)
	 */
	public function getMobilityChecks_weight(){
		return $this->MobilityChecks_weight;
	}

	/**
	 * @return MobilityChecks_denominator - int(1)
	 */
	public function getMobilityChecks_denominator(){
		return $this->MobilityChecks_denominator;
	}

	/**
	 * @return Morphology - int(1)
	 */
	public function getMorphology(){
		return $this->Morphology;
	}

	/**
	 * @return Morphology_t - varchar(35)
	 */
	public function getMorphology_t(){
		return $this->Morphology_t;
	}

	/**
	 * @return NLATreatment - int(1)
	 */
	public function getNLATreatment(){
		return $this->NLATreatment;
	}

	/**
	 * @return NLATreatment_t - varchar(111)
	 */
	public function getNLATreatment_t(){
		return $this->NLATreatment_t;
	}

	/**
	 * @return NLATreatment_weight - int(1)
	 */
	public function getNLATreatment_weight(){
		return $this->NLATreatment_weight;
	}

	/**
	 * @return NLATreatment_denominator - int(1)
	 */
	public function getNLATreatment_denominator(){
		return $this->NLATreatment_denominator;
	}

	/**
	 * @return No_yes - int(1)
	 */
	public function getNo_yes(){
		return $this->No_yes;
	}

	/**
	 * @return No_yes_t - varchar(3)
	 */
	public function getNo_yes_t(){
		return $this->No_yes_t;
	}

	/**
	 * @return No_yes_weight - int(1)
	 */
	public function getNo_yes_weight(){
		return $this->No_yes_weight;
	}

	/**
	 * @return No_yes_denominator - int(1)
	 */
	public function getNo_yes_denominator(){
		return $this->No_yes_denominator;
	}

	/**
	 * @return No_yes_notEncountered - int(1)
	 */
	public function getNo_yes_notEncountered(){
		return $this->No_yes_notEncountered;
	}

	/**
	 * @return No_yes_notEncountered_t - varchar(25)
	 */
	public function getNo_yes_notEncountered_t(){
		return $this->No_yes_notEncountered_t;
	}

	/**
	 * @return No_yes_notEncountered_weight - int(1)
	 */
	public function getNo_yes_notEncountered_weight(){
		return $this->No_yes_notEncountered_weight;
	}

	/**
	 * @return No_yes_notEncountered_denominator - int(1)
	 */
	public function getNo_yes_notEncountered_denominator(){
		return $this->No_yes_notEncountered_denominator;
	}

	/**
	 * @return NotControlledBleeding - int(1)
	 */
	public function getNotControlledBleeding(){
		return $this->NotControlledBleeding;
	}

	/**
	 * @return NotControlledBleeding_t - varchar(51)
	 */
	public function getNotControlledBleeding_t(){
		return $this->NotControlledBleeding_t;
	}

	/**
	 * @return NotControlledBleeding_weight - int(1)
	 */
	public function getNotControlledBleeding_weight(){
		return $this->NotControlledBleeding_weight;
	}

	/**
	 * @return NotControlledBleeding_denominator - int(1)
	 */
	public function getNotControlledBleeding_denominator(){
		return $this->NotControlledBleeding_denominator;
	}

	/**
	 * @return NotControlledBleeding_1 - int(1)
	 */
	public function getNotControlledBleeding_1(){
		return $this->NotControlledBleeding_1;
	}

	/**
	 * @return NotControlledBleeding_1_t - varchar(97)
	 */
	public function getNotControlledBleeding_1_t(){
		return $this->NotControlledBleeding_1_t;
	}

	/**
	 * @return NotControlledBleeding_1_weight - int(1)
	 */
	public function getNotControlledBleeding_1_weight(){
		return $this->NotControlledBleeding_1_weight;
	}

	/**
	 * @return NotControlledBleeding_1_denominator - int(1)
	 */
	public function getNotControlledBleeding_1_denominator(){
		return $this->NotControlledBleeding_1_denominator;
	}

	/**
	 * @return OTSCTechnique - int(1)
	 */
	public function getOTSCTechnique(){
		return $this->OTSCTechnique;
	}

	/**
	 * @return OTSCTechnique_t - varchar(188)
	 */
	public function getOTSCTechnique_t(){
		return $this->OTSCTechnique_t;
	}

	/**
	 * @return OTSCTechnique_weight - int(1)
	 */
	public function getOTSCTechnique_weight(){
		return $this->OTSCTechnique_weight;
	}

	/**
	 * @return OTSCTechnique_denominator - int(1)
	 */
	public function getOTSCTechnique_denominator(){
		return $this->OTSCTechnique_denominator;
	}

	/**
	 * @return Paris - int(1)
	 */
	public function getParis(){
		return $this->Paris;
	}

	/**
	 * @return Paris_t - varchar(12)
	 */
	public function getParis_t(){
		return $this->Paris_t;
	}

	/**
	 * @return PatientPosition - int(1)
	 */
	public function getPatientPosition(){
		return $this->PatientPosition;
	}

	/**
	 * @return PatientPosition_t - varchar(100)
	 */
	public function getPatientPosition_t(){
		return $this->PatientPosition_t;
	}

	/**
	 * @return PatientPosition_weight - int(1)
	 */
	public function getPatientPosition_weight(){
		return $this->PatientPosition_weight;
	}

	/**
	 * @return PatientPosition_denominator - int(1)
	 */
	public function getPatientPosition_denominator(){
		return $this->PatientPosition_denominator;
	}

	/**
	 * @return Position - int(1)
	 */
	public function getPosition(){
		return $this->Position;
	}

	/**
	 * @return Position_t - varchar(61)
	 */
	public function getPosition_t(){
		return $this->Position_t;
	}

	/**
	 * @return Position_weight - int(1)
	 */
	public function getPosition_weight(){
		return $this->Position_weight;
	}

	/**
	 * @return Position_denominator - int(1)
	 */
	public function getPosition_denominator(){
		return $this->Position_denominator;
	}

	/**
	 * @return PriorClosure - int(1)
	 */
	public function getPriorClosure(){
		return $this->PriorClosure;
	}

	/**
	 * @return PriorClosure_t - varchar(64)
	 */
	public function getPriorClosure_t(){
		return $this->PriorClosure_t;
	}

	/**
	 * @return PriorClosure_weight - int(1)
	 */
	public function getPriorClosure_weight(){
		return $this->PriorClosure_weight;
	}

	/**
	 * @return PriorClosure_denominator - int(1)
	 */
	public function getPriorClosure_denominator(){
		return $this->PriorClosure_denominator;
	}

	/**
	 * @return Q11 - int(1)
	 */
	public function getQ11(){
		return $this->Q11;
	}

	/**
	 * @return Q11_t - varchar(76)
	 */
	public function getQ11_t(){
		return $this->Q11_t;
	}

	/**
	 * @return Q11_weight - int(1)
	 */
	public function getQ11_weight(){
		return $this->Q11_weight;
	}

	/**
	 * @return Q11_denominator - int(1)
	 */
	public function getQ11_denominator(){
		return $this->Q11_denominator;
	}

	/**
	 * @return Q14 - int(1)
	 */
	public function getQ14(){
		return $this->Q14;
	}

	/**
	 * @return Q14_t - varchar(17)
	 */
	public function getQ14_t(){
		return $this->Q14_t;
	}

	/**
	 * @return Q14_weight - int(1)
	 */
	public function getQ14_weight(){
		return $this->Q14_weight;
	}

	/**
	 * @return Q14_denominator - int(1)
	 */
	public function getQ14_denominator(){
		return $this->Q14_denominator;
	}

	/**
	 * @return Q44 - int(1)
	 */
	public function getQ44(){
		return $this->Q44;
	}

	/**
	 * @return Q44_t - varchar(48)
	 */
	public function getQ44_t(){
		return $this->Q44_t;
	}

	/**
	 * @return Q44_weight - int(1)
	 */
	public function getQ44_weight(){
		return $this->Q44_weight;
	}

	/**
	 * @return Q44_denominator - int(1)
	 */
	public function getQ44_denominator(){
		return $this->Q44_denominator;
	}

	/**
	 * @return Q77 - int(1)
	 */
	public function getQ77(){
		return $this->Q77;
	}

	/**
	 * @return Q77_t - varchar(46)
	 */
	public function getQ77_t(){
		return $this->Q77_t;
	}

	/**
	 * @return Q77_weight - int(1)
	 */
	public function getQ77_weight(){
		return $this->Q77_weight;
	}

	/**
	 * @return Q77_denominator - int(1)
	 */
	public function getQ77_denominator(){
		return $this->Q77_denominator;
	}

	/**
	 * @return Retroflextion - int(1)
	 */
	public function getRetroflextion(){
		return $this->Retroflextion;
	}

	/**
	 * @return Retroflextion_t - varchar(79)
	 */
	public function getRetroflextion_t(){
		return $this->Retroflextion_t;
	}

	/**
	 * @return Retroflextion_weight - int(1)
	 */
	public function getRetroflextion_weight(){
		return $this->Retroflextion_weight;
	}

	/**
	 * @return Retroflextion_denominator - int(1)
	 */
	public function getRetroflextion_denominator(){
		return $this->Retroflextion_denominator;
	}

	/**
	 * @return RiskOfSMIC - int(1)
	 */
	public function getRiskOfSMIC(){
		return $this->RiskOfSMIC;
	}

	/**
	 * @return RiskOfSMIC_t - varchar(29)
	 */
	public function getRiskOfSMIC_t(){
		return $this->RiskOfSMIC_t;
	}

	/**
	 * @return SecondLine - int(1)
	 */
	public function getSecondLine(){
		return $this->SecondLine;
	}

	/**
	 * @return SecondLine_t - varchar(89)
	 */
	public function getSecondLine_t(){
		return $this->SecondLine_t;
	}

	/**
	 * @return SecondLine_weight - int(1)
	 */
	public function getSecondLine_weight(){
		return $this->SecondLine_weight;
	}

	/**
	 * @return SecondLine_denominator - int(1)
	 */
	public function getSecondLine_denominator(){
		return $this->SecondLine_denominator;
	}

	/**
	 * @return ScopeChanged - int(1)
	 */
	public function getScopeChanged(){
		return $this->ScopeChanged;
	}

	/**
	 * @return ScopeChanged_t - varchar(82)
	 */
	public function getScopeChanged_t(){
		return $this->ScopeChanged_t;
	}

	/**
	 * @return ScopeChanged_weight - int(1)
	 */
	public function getScopeChanged_weight(){
		return $this->ScopeChanged_weight;
	}

	/**
	 * @return ScopeChanged_denominator - int(1)
	 */
	public function getScopeChanged_denominator(){
		return $this->ScopeChanged_denominator;
	}

	/**
	 * @return ScopeUsed - int(1)
	 */
	public function getScopeUsed(){
		return $this->ScopeUsed;
	}

	/**
	 * @return ScopeUsed_t - varchar(42)
	 */
	public function getScopeUsed_t(){
		return $this->ScopeUsed_t;
	}

	/**
	 * @return ScopeUsed_weight - int(1)
	 */
	public function getScopeUsed_weight(){
		return $this->ScopeUsed_weight;
	}

	/**
	 * @return ScopeUsed_denominator - int(1)
	 */
	public function getScopeUsed_denominator(){
		return $this->ScopeUsed_denominator;
	}

	/**
	 * @return SevereBleeding - int(1)
	 */
	public function getSevereBleeding(){
		return $this->SevereBleeding;
	}

	/**
	 * @return SevereBleeding_t - varchar(66)
	 */
	public function getSevereBleeding_t(){
		return $this->SevereBleeding_t;
	}

	/**
	 * @return SevereBleeding_weight - int(1)
	 */
	public function getSevereBleeding_weight(){
		return $this->SevereBleeding_weight;
	}

	/**
	 * @return SevereBleeding_denominator - int(1)
	 */
	public function getSevereBleeding_denominator(){
		return $this->SevereBleeding_denominator;
	}

	/**
	 * @return SubjectiveScore - int(1)
	 */
	public function getSubjectiveScore(){
		return $this->SubjectiveScore;
	}

	/**
	 * @return SubjectiveScore_t - varchar(13)
	 */
	public function getSubjectiveScore_t(){
		return $this->SubjectiveScore_t;
	}

	/**
	 * @return SydneyDMIScore - int(1)
	 */
	public function getSydneyDMIScore(){
		return $this->SydneyDMIScore;
	}

	/**
	 * @return SydneyDMIScore_t - varchar(133)
	 */
	public function getSydneyDMIScore_t(){
		return $this->SydneyDMIScore_t;
	}

	/**
	 * @return SydneyDMIScore_weight - int(1)
	 */
	public function getSydneyDMIScore_weight(){
		return $this->SydneyDMIScore_weight;
	}

	/**
	 * @return SydneyDMIScore_denominator - int(1)
	 */
	public function getSydneyDMIScore_denominator(){
		return $this->SydneyDMIScore_denominator;
	}

	/**
	 * @return SMSAAccess - int(1)
	 */
	public function getSMSAAccess(){
		return $this->SMSAAccess;
	}

	/**
	 * @return SMSAAccess_t - varchar(9)
	 */
	public function getSMSAAccess_t(){
		return $this->SMSAAccess_t;
	}

	/**
	 * @return SMSAAccess_weight - int(1)
	 */
	public function getSMSAAccess_weight(){
		return $this->SMSAAccess_weight;
	}

	/**
	 * @return SMSAAccess_denominator - int(1)
	 */
	public function getSMSAAccess_denominator(){
		return $this->SMSAAccess_denominator;
	}

	/**
	 * @return SMSAMorphology - int(1)
	 */
	public function getSMSAMorphology(){
		return $this->SMSAMorphology;
	}

	/**
	 * @return SMSAMorphology_t - varchar(12)
	 */
	public function getSMSAMorphology_t(){
		return $this->SMSAMorphology_t;
	}

	/**
	 * @return SMSAMorphology_weight - int(1)
	 */
	public function getSMSAMorphology_weight(){
		return $this->SMSAMorphology_weight;
	}

	/**
	 * @return SMSAMorphology_denominator - int(1)
	 */
	public function getSMSAMorphology_denominator(){
		return $this->SMSAMorphology_denominator;
	}

	/**
	 * @return SMSASite - int(1)
	 */
	public function getSMSASite(){
		return $this->SMSASite;
	}

	/**
	 * @return SMSASite_t - varchar(5)
	 */
	public function getSMSASite_t(){
		return $this->SMSASite_t;
	}

	/**
	 * @return SMSASite_weight - int(1)
	 */
	public function getSMSASite_weight(){
		return $this->SMSASite_weight;
	}

	/**
	 * @return SMSASite_denominator - int(1)
	 */
	public function getSMSASite_denominator(){
		return $this->SMSASite_denominator;
	}

	/**
	 * @return SMSASize - int(1)
	 */
	public function getSMSASize(){
		return $this->SMSASize;
	}

	/**
	 * @return SMSASize_t - varchar(8)
	 */
	public function getSMSASize_t(){
		return $this->SMSASize_t;
	}

	/**
	 * @return SMSASize_weight - int(1)
	 */
	public function getSMSASize_weight(){
		return $this->SMSASize_weight;
	}

	/**
	 * @return SMSASize_denominator - int(1)
	 */
	public function getSMSASize_denominator(){
		return $this->SMSASize_denominator;
	}

	/**
	 * @return SnareClosure - int(1)
	 */
	public function getSnareClosure(){
		return $this->SnareClosure;
	}

	/**
	 * @return SnareClosure_t - varchar(53)
	 */
	public function getSnareClosure_t(){
		return $this->SnareClosure_t;
	}

	/**
	 * @return SnareClosure_weight - int(1)
	 */
	public function getSnareClosure_weight(){
		return $this->SnareClosure_weight;
	}

	/**
	 * @return SnareClosure_denominator - int(1)
	 */
	public function getSnareClosure_denominator(){
		return $this->SnareClosure_denominator;
	}

	/**
	 * @return StopInjection - int(1)
	 */
	public function getStopInjection(){
		return $this->StopInjection;
	}

	/**
	 * @return StopInjection_t - varchar(61)
	 */
	public function getStopInjection_t(){
		return $this->StopInjection_t;
	}

	/**
	 * @return StopInjection_weight - int(1)
	 */
	public function getStopInjection_weight(){
		return $this->StopInjection_weight;
	}

	/**
	 * @return StopInjection_denominator - int(1)
	 */
	public function getStopInjection_denominator(){
		return $this->StopInjection_denominator;
	}

	/**
	 * @return STSC - int(1)
	 */
	public function getSTSC(){
		return $this->STSC;
	}

	/**
	 * @return STSC_t - varchar(83)
	 */
	public function getSTSC_t(){
		return $this->STSC_t;
	}

	/**
	 * @return STSC_weight - int(1)
	 */
	public function getSTSC_weight(){
		return $this->STSC_weight;
	}

	/**
	 * @return STSC_denominator - int(1)
	 */
	public function getSTSC_denominator(){
		return $this->STSC_denominator;
	}

	/**
	 * @return STSCTechnique - int(1)
	 */
	public function getSTSCTechnique(){
		return $this->STSCTechnique;
	}

	/**
	 * @return STSCTechnique_t - varchar(132)
	 */
	public function getSTSCTechnique_t(){
		return $this->STSCTechnique_t;
	}

	/**
	 * @return STSCTechnique_weight - int(1)
	 */
	public function getSTSCTechnique_weight(){
		return $this->STSCTechnique_weight;
	}

	/**
	 * @return STSCTechnique_denominator - int(1)
	 */
	public function getSTSCTechnique_denominator(){
		return $this->STSCTechnique_denominator;
	}

	/**
	 * @return TactileFeedback - int(1)
	 */
	public function getTactileFeedback(){
		return $this->TactileFeedback;
	}

	/**
	 * @return TactileFeedback_t - varchar(113)
	 */
	public function getTactileFeedback_t(){
		return $this->TactileFeedback_t;
	}

	/**
	 * @return TactileFeedback_weight - int(1)
	 */
	public function getTactileFeedback_weight(){
		return $this->TactileFeedback_weight;
	}

	/**
	 * @return TactileFeedback_denominator - int(1)
	 */
	public function getTactileFeedback_denominator(){
		return $this->TactileFeedback_denominator;
	}

	/**
	 * @return TTSNotUsed - int(1)
	 */
	public function getTTSNotUsed(){
		return $this->TTSNotUsed;
	}

	/**
	 * @return TTSNotUsed_t - varchar(145)
	 */
	public function getTTSNotUsed_t(){
		return $this->TTSNotUsed_t;
	}

	/**
	 * @return TTSNotUsed_weight - int(1)
	 */
	public function getTTSNotUsed_weight(){
		return $this->TTSNotUsed_weight;
	}

	/**
	 * @return TTSNotUsed_denominator - int(1)
	 */
	public function getTTSNotUsed_denominator(){
		return $this->TTSNotUsed_denominator;
	}

	/**
	 * @return TTSTechnique - int(1)
	 */
	public function getTTSTechnique(){
		return $this->TTSTechnique;
	}

	/**
	 * @return TTSTechnique_t - varchar(102)
	 */
	public function getTTSTechnique_t(){
		return $this->TTSTechnique_t;
	}

	/**
	 * @return TTSTechnique_weight - int(1)
	 */
	public function getTTSTechnique_weight(){
		return $this->TTSTechnique_weight;
	}

	/**
	 * @return TTSTechnique_denominator - int(1)
	 */
	public function getTTSTechnique_denominator(){
		return $this->TTSTechnique_denominator;
	}

	/**
	 * @return Uncertainty - int(1)
	 */
	public function getUncertainty(){
		return $this->Uncertainty;
	}

	/**
	 * @return Uncertainty_t - varchar(104)
	 */
	public function getUncertainty_t(){
		return $this->Uncertainty_t;
	}

	/**
	 * @return Uncertainty_weight - int(1)
	 */
	public function getUncertainty_weight(){
		return $this->Uncertainty_weight;
	}

	/**
	 * @return Uncertainty_denominator - int(1)
	 */
	public function getUncertainty_denominator(){
		return $this->Uncertainty_denominator;
	}

	/**
	 * @return Yes_no_notReq - int(1)
	 */
	public function getYes_no_notReq(){
		return $this->Yes_no_notReq;
	}

	/**
	 * @return Yes_no_notReq_t - varchar(12)
	 */
	public function getYes_no_notReq_t(){
		return $this->Yes_no_notReq_t;
	}

	/**
	 * @return Yes_no_notReq_weight - int(1)
	 */
	public function getYes_no_notReq_weight(){
		return $this->Yes_no_notReq_weight;
	}

	/**
	 * @return Yes_no_notReq_denominator - int(1)
	 */
	public function getYes_no_notReq_denominator(){
		return $this->Yes_no_notReq_denominator;
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
	 * @return Yes_no_weight - int(1)
	 */
	public function getYes_no_weight(){
		return $this->Yes_no_weight;
	}

	/**
	 * @return Yes_no_denominator - int(1)
	 */
	public function getYes_no_denominator(){
		return $this->Yes_no_denominator;
	}

	/**
	 * @return Yes_no_required - int(1)
	 */
	public function getYes_no_required(){
		return $this->Yes_no_required;
	}

	/**
	 * @return Yes_no_required_t - varchar(21)
	 */
	public function getYes_no_required_t(){
		return $this->Yes_no_required_t;
	}

	/**
	 * @return Yes_no_required_weight - int(1)
	 */
	public function getYes_no_required_weight(){
		return $this->Yes_no_required_weight;
	}

	/**
	 * @return Yes_no_required_denominator - int(1)
	 */
	public function getYes_no_required_denominator(){
		return $this->Yes_no_required_denominator;
	}

	/**
	 * @return Yes_no_notOccur - int(1)
	 */
	public function getYes_no_notOccur(){
		return $this->Yes_no_notOccur;
	}

	/**
	 * @return Yes_no_notOccur_t - varchar(45)
	 */
	public function getYes_no_notOccur_t(){
		return $this->Yes_no_notOccur_t;
	}

	/**
	 * @return Yes_no_notOccur_weight - int(1)
	 */
	public function getYes_no_notOccur_weight(){
		return $this->Yes_no_notOccur_weight;
	}

	/**
	 * @return Yes_no_notOccur_denominator - int(1)
	 */
	public function getYes_no_notOccur_denominator(){
		return $this->Yes_no_notOccur_denominator;
	}

	/**
	 * @return Yes_no_addweight - int(1)
	 */
	public function getYes_no_addweight(){
		return $this->Yes_no_addweight;
	}

	/**
	 * @return Yes_no_addweight_t - varchar(3)
	 */
	public function getYes_no_addweight_t(){
		return $this->Yes_no_addweight_t;
	}

	/**
	 * @return Yes_no_addweight_weight - int(1)
	 */
	public function getYes_no_addweight_weight(){
		return $this->Yes_no_addweight_weight;
	}

	/**
	 * @return Yes_no_addweight_denominator - int(1)
	 */
	public function getYes_no_addweight_denominator(){
		return $this->Yes_no_addweight_denominator;
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
	public function setAccess($Access){
		$this->Access = $Access;
	}

	/**
	 * @param Type: varchar(25)
	 */
	public function setAccess_t($Access_t){
		$this->Access_t = $Access_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAccess_weight($Access_weight){
		$this->Access_weight = $Access_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAccess_denominator($Access_denominator){
		$this->Access_denominator = $Access_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAntispasmodics($Antispasmodics){
		$this->Antispasmodics = $Antispasmodics;
	}

	/**
	 * @param Type: varchar(58)
	 */
	public function setAntispasmodics_t($Antispasmodics_t){
		$this->Antispasmodics_t = $Antispasmodics_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAntispasmodics_weight($Antispasmodics_weight){
		$this->Antispasmodics_weight = $Antispasmodics_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAntispasmodics_denominator($Antispasmodics_denominator){
		$this->Antispasmodics_denominator = $Antispasmodics_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAnorectal junction($Anorectal junction){
		$this->Anorectal junction = $Anorectal junction;
	}

	/**
	 * @param Type: varchar(192)
	 */
	public function setAnorectal junction_t($Anorectal junction_t){
		$this->Anorectal junction_t = $Anorectal junction_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAnorectal junction_weight($Anorectal junction_weight){
		$this->Anorectal junction_weight = $Anorectal junction_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAnorectal junction_denominator($Anorectal junction_denominator){
		$this->Anorectal junction_denominator = $Anorectal junction_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAPCTechnique($APCTechnique){
		$this->APCTechnique = $APCTechnique;
	}

	/**
	 * @param Type: varchar(134)
	 */
	public function setAPCTechnique_t($APCTechnique_t){
		$this->APCTechnique_t = $APCTechnique_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAPCTechnique_weight($APCTechnique_weight){
		$this->APCTechnique_weight = $APCTechnique_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAPCTechnique_denominator($APCTechnique_denominator){
		$this->APCTechnique_denominator = $APCTechnique_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAppendicealOrfice($AppendicealOrfice){
		$this->AppendicealOrfice = $AppendicealOrfice;
	}

	/**
	 * @param Type: varchar(316)
	 */
	public function setAppendicealOrfice_t($AppendicealOrfice_t){
		$this->AppendicealOrfice_t = $AppendicealOrfice_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAppendicealOrfice_weight($AppendicealOrfice_weight){
		$this->AppendicealOrfice_weight = $AppendicealOrfice_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAppendicealOrfice_denominator($AppendicealOrfice_denominator){
		$this->AppendicealOrfice_denominator = $AppendicealOrfice_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAttemptBeyondCapabilities($AttemptBeyondCapabilities){
		$this->AttemptBeyondCapabilities = $AttemptBeyondCapabilities;
	}

	/**
	 * @param Type: varchar(48)
	 */
	public function setAttemptBeyondCapabilities_t($AttemptBeyondCapabilities_t){
		$this->AttemptBeyondCapabilities_t = $AttemptBeyondCapabilities_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAttemptBeyondCapabilities_weight($AttemptBeyondCapabilities_weight){
		$this->AttemptBeyondCapabilities_weight = $AttemptBeyondCapabilities_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAttemptBeyondCapabilities_denominator($AttemptBeyondCapabilities_denominator){
		$this->AttemptBeyondCapabilities_denominator = $AttemptBeyondCapabilities_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setCauseOfBleedingIdentified($CauseOfBleedingIdentified){
		$this->CauseOfBleedingIdentified = $CauseOfBleedingIdentified;
	}

	/**
	 * @param Type: varchar(129)
	 */
	public function setCauseOfBleedingIdentified_t($CauseOfBleedingIdentified_t){
		$this->CauseOfBleedingIdentified_t = $CauseOfBleedingIdentified_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setCauseOfBleedingIdentified_weight($CauseOfBleedingIdentified_weight){
		$this->CauseOfBleedingIdentified_weight = $CauseOfBleedingIdentified_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setCauseOfBleedingIdentified_denominator($CauseOfBleedingIdentified_denominator){
		$this->CauseOfBleedingIdentified_denominator = $CauseOfBleedingIdentified_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setClipUses($ClipUses){
		$this->ClipUses = $ClipUses;
	}

	/**
	 * @param Type: varchar(133)
	 */
	public function setClipUses_t($ClipUses_t){
		$this->ClipUses_t = $ClipUses_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setClipUses_weight($ClipUses_weight){
		$this->ClipUses_weight = $ClipUses_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setClipUses_denominator($ClipUses_denominator){
		$this->ClipUses_denominator = $ClipUses_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setCoagForceps($CoagForceps){
		$this->CoagForceps = $CoagForceps;
	}

	/**
	 * @param Type: varchar(133)
	 */
	public function setCoagForceps_t($CoagForceps_t){
		$this->CoagForceps_t = $CoagForceps_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setCoagForceps_weight($CoagForceps_weight){
		$this->CoagForceps_weight = $CoagForceps_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setCoagForceps_denominator($CoagForceps_denominator){
		$this->CoagForceps_denominator = $CoagForceps_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setColdSnare($ColdSnare){
		$this->ColdSnare = $ColdSnare;
	}

	/**
	 * @param Type: varchar(87)
	 */
	public function setColdSnare_t($ColdSnare_t){
		$this->ColdSnare_t = $ColdSnare_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setColdSnare_weight($ColdSnare_weight){
		$this->ColdSnare_weight = $ColdSnare_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setColdSnare_denominator($ColdSnare_denominator){
		$this->ColdSnare_denominator = $ColdSnare_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setColonCleanliness($ColonCleanliness){
		$this->ColonCleanliness = $ColonCleanliness;
	}

	/**
	 * @param Type: varchar(8)
	 */
	public function setColonCleanliness_t($ColonCleanliness_t){
		$this->ColonCleanliness_t = $ColonCleanliness_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setGoodResection_EnBloc($GoodResection_EnBloc){
		$this->GoodResection_EnBloc = $GoodResection_EnBloc;
	}

	/**
	 * @param Type: varchar(88)
	 */
	public function setGoodResection_EnBloc_t($GoodResection_EnBloc_t){
		$this->GoodResection_EnBloc_t = $GoodResection_EnBloc_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setGoodResection_EnBloc_weight($GoodResection_EnBloc_weight){
		$this->GoodResection_EnBloc_weight = $GoodResection_EnBloc_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setGoodResection_EnBloc_denominator($GoodResection_EnBloc_denominator){
		$this->GoodResection_EnBloc_denominator = $GoodResection_EnBloc_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setGoodResection_Piecemeal($GoodResection_Piecemeal){
		$this->GoodResection_Piecemeal = $GoodResection_Piecemeal;
	}

	/**
	 * @param Type: varchar(21)
	 */
	public function setGoodResection_Piecemeal_t($GoodResection_Piecemeal_t){
		$this->GoodResection_Piecemeal_t = $GoodResection_Piecemeal_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setGoodResection_Piecemeal_weight($GoodResection_Piecemeal_weight){
		$this->GoodResection_Piecemeal_weight = $GoodResection_Piecemeal_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setGoodResection_Piecemeal_denominator($GoodResection_Piecemeal_denominator){
		$this->GoodResection_Piecemeal_denominator = $GoodResection_Piecemeal_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setDiathermyApplication($DiathermyApplication){
		$this->DiathermyApplication = $DiathermyApplication;
	}

	/**
	 * @param Type: varchar(50)
	 */
	public function setDiathermyApplication_t($DiathermyApplication_t){
		$this->DiathermyApplication_t = $DiathermyApplication_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setDiathermyApplication_weight($DiathermyApplication_weight){
		$this->DiathermyApplication_weight = $DiathermyApplication_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setDiathermyApplication_denominator($DiathermyApplication_denominator){
		$this->DiathermyApplication_denominator = $DiathermyApplication_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setGrade($Grade){
		$this->Grade = $Grade;
	}

	/**
	 * @param Type: varchar(21)
	 */
	public function setGrade_t($Grade_t){
		$this->Grade_t = $Grade_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setHighestKudo($HighestKudo){
		$this->HighestKudo = $HighestKudo;
	}

	/**
	 * @param Type: varchar(3)
	 */
	public function setHighestKudo_t($HighestKudo_t){
		$this->HighestKudo_t = $HighestKudo_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setHighestNICE($HighestNICE){
		$this->HighestNICE = $HighestNICE;
	}

	/**
	 * @param Type: varchar(3)
	 */
	public function setHighestNICE_t($HighestNICE_t){
		$this->HighestNICE_t = $HighestNICE_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setICV($ICV){
		$this->ICV = $ICV;
	}

	/**
	 * @param Type: varchar(192)
	 */
	public function setICV_t($ICV_t){
		$this->ICV_t = $ICV_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setICV_weight($ICV_weight){
		$this->ICV_weight = $ICV_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setICV_denominator($ICV_denominator){
		$this->ICV_denominator = $ICV_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setInjectionThroughMalignant($InjectionThroughMalignant){
		$this->InjectionThroughMalignant = $InjectionThroughMalignant;
	}

	/**
	 * @param Type: varchar(33)
	 */
	public function setInjectionThroughMalignant_t($InjectionThroughMalignant_t){
		$this->InjectionThroughMalignant_t = $InjectionThroughMalignant_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setInjectionThroughMalignant_weight($InjectionThroughMalignant_weight){
		$this->InjectionThroughMalignant_weight = $InjectionThroughMalignant_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setInjectionThroughMalignant_denominator($InjectionThroughMalignant_denominator){
		$this->InjectionThroughMalignant_denominator = $InjectionThroughMalignant_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setIntramucosalBlebs($IntramucosalBlebs){
		$this->IntramucosalBlebs = $IntramucosalBlebs;
	}

	/**
	 * @param Type: varchar(49)
	 */
	public function setIntramucosalBlebs_t($IntramucosalBlebs_t){
		$this->IntramucosalBlebs_t = $IntramucosalBlebs_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setIntramucosalBlebs_weight($IntramucosalBlebs_weight){
		$this->IntramucosalBlebs_weight = $IntramucosalBlebs_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setIntramucosalBlebs_denominator($IntramucosalBlebs_denominator){
		$this->IntramucosalBlebs_denominator = $IntramucosalBlebs_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setLesionPosition($LesionPosition){
		$this->LesionPosition = $LesionPosition;
	}

	/**
	 * @param Type: varchar(54)
	 */
	public function setLesionPosition_t($LesionPosition_t){
		$this->LesionPosition_t = $LesionPosition_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setLesionPosition_weight($LesionPosition_weight){
		$this->LesionPosition_weight = $LesionPosition_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setLesionPosition_denominator($LesionPosition_denominator){
		$this->LesionPosition_denominator = $LesionPosition_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setLifetimeProcedures($LifetimeProcedures){
		$this->LifetimeProcedures = $LifetimeProcedures;
	}

	/**
	 * @param Type: varchar(7)
	 */
	public function setLifetimeProcedures_t($LifetimeProcedures_t){
		$this->LifetimeProcedures_t = $LifetimeProcedures_t;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setLocation($Location){
		$this->Location = $Location;
	}

	/**
	 * @param Type: varchar(36)
	 */
	public function setLocation_t($Location_t){
		$this->Location_t = $Location_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setLocation_weight($Location_weight){
		$this->Location_weight = $Location_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setLocation_denominator($Location_denominator){
		$this->Location_denominator = $Location_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setMarginTreatment($MarginTreatment){
		$this->MarginTreatment = $MarginTreatment;
	}

	/**
	 * @param Type: varchar(128)
	 */
	public function setMarginTreatment_t($MarginTreatment_t){
		$this->MarginTreatment_t = $MarginTreatment_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setMarginTreatment_weight($MarginTreatment_weight){
		$this->MarginTreatment_weight = $MarginTreatment_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setMarginTreatment_denominator($MarginTreatment_denominator){
		$this->MarginTreatment_denominator = $MarginTreatment_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setMetalImplant($MetalImplant){
		$this->MetalImplant = $MetalImplant;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setMetalImplant_t($MetalImplant_t){
		$this->MetalImplant_t = $MetalImplant_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setMetalImplant_weight($MetalImplant_weight){
		$this->MetalImplant_weight = $MetalImplant_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setMetalImplant_denominator($MetalImplant_denominator){
		$this->MetalImplant_denominator = $MetalImplant_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setMildBleeding($MildBleeding){
		$this->MildBleeding = $MildBleeding;
	}

	/**
	 * @param Type: varchar(66)
	 */
	public function setMildBleeding_t($MildBleeding_t){
		$this->MildBleeding_t = $MildBleeding_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setMildBleeding_weight($MildBleeding_weight){
		$this->MildBleeding_weight = $MildBleeding_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setMildBleeding_denominator($MildBleeding_denominator){
		$this->MildBleeding_denominator = $MildBleeding_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setMobilityChecks($MobilityChecks){
		$this->MobilityChecks = $MobilityChecks;
	}

	/**
	 * @param Type: varchar(49)
	 */
	public function setMobilityChecks_t($MobilityChecks_t){
		$this->MobilityChecks_t = $MobilityChecks_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setMobilityChecks_weight($MobilityChecks_weight){
		$this->MobilityChecks_weight = $MobilityChecks_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setMobilityChecks_denominator($MobilityChecks_denominator){
		$this->MobilityChecks_denominator = $MobilityChecks_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setMorphology($Morphology){
		$this->Morphology = $Morphology;
	}

	/**
	 * @param Type: varchar(35)
	 */
	public function setMorphology_t($Morphology_t){
		$this->Morphology_t = $Morphology_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setNLATreatment($NLATreatment){
		$this->NLATreatment = $NLATreatment;
	}

	/**
	 * @param Type: varchar(111)
	 */
	public function setNLATreatment_t($NLATreatment_t){
		$this->NLATreatment_t = $NLATreatment_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setNLATreatment_weight($NLATreatment_weight){
		$this->NLATreatment_weight = $NLATreatment_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setNLATreatment_denominator($NLATreatment_denominator){
		$this->NLATreatment_denominator = $NLATreatment_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setNo_yes($No_yes){
		$this->No_yes = $No_yes;
	}

	/**
	 * @param Type: varchar(3)
	 */
	public function setNo_yes_t($No_yes_t){
		$this->No_yes_t = $No_yes_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setNo_yes_weight($No_yes_weight){
		$this->No_yes_weight = $No_yes_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setNo_yes_denominator($No_yes_denominator){
		$this->No_yes_denominator = $No_yes_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setNo_yes_notEncountered($No_yes_notEncountered){
		$this->No_yes_notEncountered = $No_yes_notEncountered;
	}

	/**
	 * @param Type: varchar(25)
	 */
	public function setNo_yes_notEncountered_t($No_yes_notEncountered_t){
		$this->No_yes_notEncountered_t = $No_yes_notEncountered_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setNo_yes_notEncountered_weight($No_yes_notEncountered_weight){
		$this->No_yes_notEncountered_weight = $No_yes_notEncountered_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setNo_yes_notEncountered_denominator($No_yes_notEncountered_denominator){
		$this->No_yes_notEncountered_denominator = $No_yes_notEncountered_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setNotControlledBleeding($NotControlledBleeding){
		$this->NotControlledBleeding = $NotControlledBleeding;
	}

	/**
	 * @param Type: varchar(51)
	 */
	public function setNotControlledBleeding_t($NotControlledBleeding_t){
		$this->NotControlledBleeding_t = $NotControlledBleeding_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setNotControlledBleeding_weight($NotControlledBleeding_weight){
		$this->NotControlledBleeding_weight = $NotControlledBleeding_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setNotControlledBleeding_denominator($NotControlledBleeding_denominator){
		$this->NotControlledBleeding_denominator = $NotControlledBleeding_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setNotControlledBleeding_1($NotControlledBleeding_1){
		$this->NotControlledBleeding_1 = $NotControlledBleeding_1;
	}

	/**
	 * @param Type: varchar(97)
	 */
	public function setNotControlledBleeding_1_t($NotControlledBleeding_1_t){
		$this->NotControlledBleeding_1_t = $NotControlledBleeding_1_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setNotControlledBleeding_1_weight($NotControlledBleeding_1_weight){
		$this->NotControlledBleeding_1_weight = $NotControlledBleeding_1_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setNotControlledBleeding_1_denominator($NotControlledBleeding_1_denominator){
		$this->NotControlledBleeding_1_denominator = $NotControlledBleeding_1_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setOTSCTechnique($OTSCTechnique){
		$this->OTSCTechnique = $OTSCTechnique;
	}

	/**
	 * @param Type: varchar(188)
	 */
	public function setOTSCTechnique_t($OTSCTechnique_t){
		$this->OTSCTechnique_t = $OTSCTechnique_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setOTSCTechnique_weight($OTSCTechnique_weight){
		$this->OTSCTechnique_weight = $OTSCTechnique_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setOTSCTechnique_denominator($OTSCTechnique_denominator){
		$this->OTSCTechnique_denominator = $OTSCTechnique_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setParis($Paris){
		$this->Paris = $Paris;
	}

	/**
	 * @param Type: varchar(12)
	 */
	public function setParis_t($Paris_t){
		$this->Paris_t = $Paris_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPatientPosition($PatientPosition){
		$this->PatientPosition = $PatientPosition;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setPatientPosition_t($PatientPosition_t){
		$this->PatientPosition_t = $PatientPosition_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPatientPosition_weight($PatientPosition_weight){
		$this->PatientPosition_weight = $PatientPosition_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPatientPosition_denominator($PatientPosition_denominator){
		$this->PatientPosition_denominator = $PatientPosition_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPosition($Position){
		$this->Position = $Position;
	}

	/**
	 * @param Type: varchar(61)
	 */
	public function setPosition_t($Position_t){
		$this->Position_t = $Position_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPosition_weight($Position_weight){
		$this->Position_weight = $Position_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPosition_denominator($Position_denominator){
		$this->Position_denominator = $Position_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPriorClosure($PriorClosure){
		$this->PriorClosure = $PriorClosure;
	}

	/**
	 * @param Type: varchar(64)
	 */
	public function setPriorClosure_t($PriorClosure_t){
		$this->PriorClosure_t = $PriorClosure_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPriorClosure_weight($PriorClosure_weight){
		$this->PriorClosure_weight = $PriorClosure_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPriorClosure_denominator($PriorClosure_denominator){
		$this->PriorClosure_denominator = $PriorClosure_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setQ11($Q11){
		$this->Q11 = $Q11;
	}

	/**
	 * @param Type: varchar(76)
	 */
	public function setQ11_t($Q11_t){
		$this->Q11_t = $Q11_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setQ11_weight($Q11_weight){
		$this->Q11_weight = $Q11_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setQ11_denominator($Q11_denominator){
		$this->Q11_denominator = $Q11_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setQ14($Q14){
		$this->Q14 = $Q14;
	}

	/**
	 * @param Type: varchar(17)
	 */
	public function setQ14_t($Q14_t){
		$this->Q14_t = $Q14_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setQ14_weight($Q14_weight){
		$this->Q14_weight = $Q14_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setQ14_denominator($Q14_denominator){
		$this->Q14_denominator = $Q14_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setQ44($Q44){
		$this->Q44 = $Q44;
	}

	/**
	 * @param Type: varchar(48)
	 */
	public function setQ44_t($Q44_t){
		$this->Q44_t = $Q44_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setQ44_weight($Q44_weight){
		$this->Q44_weight = $Q44_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setQ44_denominator($Q44_denominator){
		$this->Q44_denominator = $Q44_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setQ77($Q77){
		$this->Q77 = $Q77;
	}

	/**
	 * @param Type: varchar(46)
	 */
	public function setQ77_t($Q77_t){
		$this->Q77_t = $Q77_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setQ77_weight($Q77_weight){
		$this->Q77_weight = $Q77_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setQ77_denominator($Q77_denominator){
		$this->Q77_denominator = $Q77_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setRetroflextion($Retroflextion){
		$this->Retroflextion = $Retroflextion;
	}

	/**
	 * @param Type: varchar(79)
	 */
	public function setRetroflextion_t($Retroflextion_t){
		$this->Retroflextion_t = $Retroflextion_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setRetroflextion_weight($Retroflextion_weight){
		$this->Retroflextion_weight = $Retroflextion_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setRetroflextion_denominator($Retroflextion_denominator){
		$this->Retroflextion_denominator = $Retroflextion_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setRiskOfSMIC($RiskOfSMIC){
		$this->RiskOfSMIC = $RiskOfSMIC;
	}

	/**
	 * @param Type: varchar(29)
	 */
	public function setRiskOfSMIC_t($RiskOfSMIC_t){
		$this->RiskOfSMIC_t = $RiskOfSMIC_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSecondLine($SecondLine){
		$this->SecondLine = $SecondLine;
	}

	/**
	 * @param Type: varchar(89)
	 */
	public function setSecondLine_t($SecondLine_t){
		$this->SecondLine_t = $SecondLine_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSecondLine_weight($SecondLine_weight){
		$this->SecondLine_weight = $SecondLine_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSecondLine_denominator($SecondLine_denominator){
		$this->SecondLine_denominator = $SecondLine_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setScopeChanged($ScopeChanged){
		$this->ScopeChanged = $ScopeChanged;
	}

	/**
	 * @param Type: varchar(82)
	 */
	public function setScopeChanged_t($ScopeChanged_t){
		$this->ScopeChanged_t = $ScopeChanged_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setScopeChanged_weight($ScopeChanged_weight){
		$this->ScopeChanged_weight = $ScopeChanged_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setScopeChanged_denominator($ScopeChanged_denominator){
		$this->ScopeChanged_denominator = $ScopeChanged_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setScopeUsed($ScopeUsed){
		$this->ScopeUsed = $ScopeUsed;
	}

	/**
	 * @param Type: varchar(42)
	 */
	public function setScopeUsed_t($ScopeUsed_t){
		$this->ScopeUsed_t = $ScopeUsed_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setScopeUsed_weight($ScopeUsed_weight){
		$this->ScopeUsed_weight = $ScopeUsed_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setScopeUsed_denominator($ScopeUsed_denominator){
		$this->ScopeUsed_denominator = $ScopeUsed_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSevereBleeding($SevereBleeding){
		$this->SevereBleeding = $SevereBleeding;
	}

	/**
	 * @param Type: varchar(66)
	 */
	public function setSevereBleeding_t($SevereBleeding_t){
		$this->SevereBleeding_t = $SevereBleeding_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSevereBleeding_weight($SevereBleeding_weight){
		$this->SevereBleeding_weight = $SevereBleeding_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSevereBleeding_denominator($SevereBleeding_denominator){
		$this->SevereBleeding_denominator = $SevereBleeding_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSubjectiveScore($SubjectiveScore){
		$this->SubjectiveScore = $SubjectiveScore;
	}

	/**
	 * @param Type: varchar(13)
	 */
	public function setSubjectiveScore_t($SubjectiveScore_t){
		$this->SubjectiveScore_t = $SubjectiveScore_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSydneyDMIScore($SydneyDMIScore){
		$this->SydneyDMIScore = $SydneyDMIScore;
	}

	/**
	 * @param Type: varchar(133)
	 */
	public function setSydneyDMIScore_t($SydneyDMIScore_t){
		$this->SydneyDMIScore_t = $SydneyDMIScore_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSydneyDMIScore_weight($SydneyDMIScore_weight){
		$this->SydneyDMIScore_weight = $SydneyDMIScore_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSydneyDMIScore_denominator($SydneyDMIScore_denominator){
		$this->SydneyDMIScore_denominator = $SydneyDMIScore_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSMSAAccess($SMSAAccess){
		$this->SMSAAccess = $SMSAAccess;
	}

	/**
	 * @param Type: varchar(9)
	 */
	public function setSMSAAccess_t($SMSAAccess_t){
		$this->SMSAAccess_t = $SMSAAccess_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSMSAAccess_weight($SMSAAccess_weight){
		$this->SMSAAccess_weight = $SMSAAccess_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSMSAAccess_denominator($SMSAAccess_denominator){
		$this->SMSAAccess_denominator = $SMSAAccess_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSMSAMorphology($SMSAMorphology){
		$this->SMSAMorphology = $SMSAMorphology;
	}

	/**
	 * @param Type: varchar(12)
	 */
	public function setSMSAMorphology_t($SMSAMorphology_t){
		$this->SMSAMorphology_t = $SMSAMorphology_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSMSAMorphology_weight($SMSAMorphology_weight){
		$this->SMSAMorphology_weight = $SMSAMorphology_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSMSAMorphology_denominator($SMSAMorphology_denominator){
		$this->SMSAMorphology_denominator = $SMSAMorphology_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSMSASite($SMSASite){
		$this->SMSASite = $SMSASite;
	}

	/**
	 * @param Type: varchar(5)
	 */
	public function setSMSASite_t($SMSASite_t){
		$this->SMSASite_t = $SMSASite_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSMSASite_weight($SMSASite_weight){
		$this->SMSASite_weight = $SMSASite_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSMSASite_denominator($SMSASite_denominator){
		$this->SMSASite_denominator = $SMSASite_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSMSASize($SMSASize){
		$this->SMSASize = $SMSASize;
	}

	/**
	 * @param Type: varchar(8)
	 */
	public function setSMSASize_t($SMSASize_t){
		$this->SMSASize_t = $SMSASize_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSMSASize_weight($SMSASize_weight){
		$this->SMSASize_weight = $SMSASize_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSMSASize_denominator($SMSASize_denominator){
		$this->SMSASize_denominator = $SMSASize_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSnareClosure($SnareClosure){
		$this->SnareClosure = $SnareClosure;
	}

	/**
	 * @param Type: varchar(53)
	 */
	public function setSnareClosure_t($SnareClosure_t){
		$this->SnareClosure_t = $SnareClosure_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSnareClosure_weight($SnareClosure_weight){
		$this->SnareClosure_weight = $SnareClosure_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSnareClosure_denominator($SnareClosure_denominator){
		$this->SnareClosure_denominator = $SnareClosure_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setStopInjection($StopInjection){
		$this->StopInjection = $StopInjection;
	}

	/**
	 * @param Type: varchar(61)
	 */
	public function setStopInjection_t($StopInjection_t){
		$this->StopInjection_t = $StopInjection_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setStopInjection_weight($StopInjection_weight){
		$this->StopInjection_weight = $StopInjection_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setStopInjection_denominator($StopInjection_denominator){
		$this->StopInjection_denominator = $StopInjection_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSTSC($STSC){
		$this->STSC = $STSC;
	}

	/**
	 * @param Type: varchar(83)
	 */
	public function setSTSC_t($STSC_t){
		$this->STSC_t = $STSC_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSTSC_weight($STSC_weight){
		$this->STSC_weight = $STSC_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSTSC_denominator($STSC_denominator){
		$this->STSC_denominator = $STSC_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSTSCTechnique($STSCTechnique){
		$this->STSCTechnique = $STSCTechnique;
	}

	/**
	 * @param Type: varchar(132)
	 */
	public function setSTSCTechnique_t($STSCTechnique_t){
		$this->STSCTechnique_t = $STSCTechnique_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSTSCTechnique_weight($STSCTechnique_weight){
		$this->STSCTechnique_weight = $STSCTechnique_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSTSCTechnique_denominator($STSCTechnique_denominator){
		$this->STSCTechnique_denominator = $STSCTechnique_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setTactileFeedback($TactileFeedback){
		$this->TactileFeedback = $TactileFeedback;
	}

	/**
	 * @param Type: varchar(113)
	 */
	public function setTactileFeedback_t($TactileFeedback_t){
		$this->TactileFeedback_t = $TactileFeedback_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setTactileFeedback_weight($TactileFeedback_weight){
		$this->TactileFeedback_weight = $TactileFeedback_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setTactileFeedback_denominator($TactileFeedback_denominator){
		$this->TactileFeedback_denominator = $TactileFeedback_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setTTSNotUsed($TTSNotUsed){
		$this->TTSNotUsed = $TTSNotUsed;
	}

	/**
	 * @param Type: varchar(145)
	 */
	public function setTTSNotUsed_t($TTSNotUsed_t){
		$this->TTSNotUsed_t = $TTSNotUsed_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setTTSNotUsed_weight($TTSNotUsed_weight){
		$this->TTSNotUsed_weight = $TTSNotUsed_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setTTSNotUsed_denominator($TTSNotUsed_denominator){
		$this->TTSNotUsed_denominator = $TTSNotUsed_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setTTSTechnique($TTSTechnique){
		$this->TTSTechnique = $TTSTechnique;
	}

	/**
	 * @param Type: varchar(102)
	 */
	public function setTTSTechnique_t($TTSTechnique_t){
		$this->TTSTechnique_t = $TTSTechnique_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setTTSTechnique_weight($TTSTechnique_weight){
		$this->TTSTechnique_weight = $TTSTechnique_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setTTSTechnique_denominator($TTSTechnique_denominator){
		$this->TTSTechnique_denominator = $TTSTechnique_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setUncertainty($Uncertainty){
		$this->Uncertainty = $Uncertainty;
	}

	/**
	 * @param Type: varchar(104)
	 */
	public function setUncertainty_t($Uncertainty_t){
		$this->Uncertainty_t = $Uncertainty_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setUncertainty_weight($Uncertainty_weight){
		$this->Uncertainty_weight = $Uncertainty_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setUncertainty_denominator($Uncertainty_denominator){
		$this->Uncertainty_denominator = $Uncertainty_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setYes_no_notReq($Yes_no_notReq){
		$this->Yes_no_notReq = $Yes_no_notReq;
	}

	/**
	 * @param Type: varchar(12)
	 */
	public function setYes_no_notReq_t($Yes_no_notReq_t){
		$this->Yes_no_notReq_t = $Yes_no_notReq_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setYes_no_notReq_weight($Yes_no_notReq_weight){
		$this->Yes_no_notReq_weight = $Yes_no_notReq_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setYes_no_notReq_denominator($Yes_no_notReq_denominator){
		$this->Yes_no_notReq_denominator = $Yes_no_notReq_denominator;
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
	 * @param Type: int(1)
	 */
	public function setYes_no_weight($Yes_no_weight){
		$this->Yes_no_weight = $Yes_no_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setYes_no_denominator($Yes_no_denominator){
		$this->Yes_no_denominator = $Yes_no_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setYes_no_required($Yes_no_required){
		$this->Yes_no_required = $Yes_no_required;
	}

	/**
	 * @param Type: varchar(21)
	 */
	public function setYes_no_required_t($Yes_no_required_t){
		$this->Yes_no_required_t = $Yes_no_required_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setYes_no_required_weight($Yes_no_required_weight){
		$this->Yes_no_required_weight = $Yes_no_required_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setYes_no_required_denominator($Yes_no_required_denominator){
		$this->Yes_no_required_denominator = $Yes_no_required_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setYes_no_notOccur($Yes_no_notOccur){
		$this->Yes_no_notOccur = $Yes_no_notOccur;
	}

	/**
	 * @param Type: varchar(45)
	 */
	public function setYes_no_notOccur_t($Yes_no_notOccur_t){
		$this->Yes_no_notOccur_t = $Yes_no_notOccur_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setYes_no_notOccur_weight($Yes_no_notOccur_weight){
		$this->Yes_no_notOccur_weight = $Yes_no_notOccur_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setYes_no_notOccur_denominator($Yes_no_notOccur_denominator){
		$this->Yes_no_notOccur_denominator = $Yes_no_notOccur_denominator;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setYes_no_addweight($Yes_no_addweight){
		$this->Yes_no_addweight = $Yes_no_addweight;
	}

	/**
	 * @param Type: varchar(3)
	 */
	public function setYes_no_addweight_t($Yes_no_addweight_t){
		$this->Yes_no_addweight_t = $Yes_no_addweight_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setYes_no_addweight_weight($Yes_no_addweight_weight){
		$this->Yes_no_addweight_weight = $Yes_no_addweight_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setYes_no_addweight_denominator($Yes_no_addweight_denominator){
		$this->Yes_no_addweight_denominator = $Yes_no_addweight_denominator;
	}

    /**
     * Close mysql connection
     */
	public function endvaluesPolypectomyTool(){
		$this->connection->CloseMysql();
	}

}