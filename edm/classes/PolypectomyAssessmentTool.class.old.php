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

Class PolypectomyAssessmentTool {

	private $id; //int(11)
	private $AGE; //varchar(18)
	private $Sex; //varchar(18)
	private $OnlyLesion; //varchar(18)
	private $SMSASize; //varchar(18)
	private $SMSAMorphology; //varchar(18)
	private $SMSASite; //varchar(18)
	private $SMSAAccess; //varchar(18)
	private $Paris; //varchar(18)
	private $Location; //varchar(18)
	private $Morphology; //varchar(18)
	private $ColonCleanliness; //varchar(18)
	private $Dateofprocedure; //varchar(18)
	private $AssessorName; //varchar(18)
	private $AssessorGrade; //varchar(18)
	private $AssesseeName; //varchar(18)
	private $AssesseeGrade; //varchar(18)
	private $ExperienceAssessor; //varchar(18)
	private $ExperienceAssessee; //varchar(18)
	private $PatientConsentObtained; //varchar(18)
	private $PatientComorbidity; //varchar(18)
	private $Anticoagulant; //varchar(18)
	private $AnticoagulantTherapy; //varchar(18)
	private $Antibiotics; //varchar(18)
	private $ProphylacticAntibiotics; //varchar(18)
	private $PatientCorrectlyPositioned; //varchar(18)
	private $PlateOn; //varchar(18)
	private $MetalImplant; //varchar(18)
	private $AccurateSizeDetermination; //varchar(18)
	private $HighestKudoAssessor; //varchar(18)
	private $HighestKudoAssessee; //varchar(18)
	private $HighestNICEAssessor; //varchar(18)
	private $HighestNICEAssessee; //varchar(18)
	private $RiskSMICAssessor; //varchar(18)
	private $RiskSMICAssessee; //varchar(18)
	private $EnblocResection; //varchar(18)
	private $Enbloc; //varchar(18)
	private $AttemptBeyondCapabilities; //varchar(18)
	private $Piecemeal; //varchar(18)
	private $Access; //varchar(18)
	private $Pressure; //varchar(18)
	private $LesionPosition; //varchar(18)
	private $Retroflexion; //varchar(18)
	private $ScopeUsed; //varchar(18)
	private $Insufflation; //varchar(18)
	private $Cap; //varchar(18)
	private $Antispasmodics; //varchar(18)
	private $OptimisesAccess; //varchar(18)
	private $LiftAtOnce; //varchar(18)
	private $Sequential_Inj_Res; //varchar(18)
	private $ImproveAccess; //varchar(18)
	private $AirExpelled; //varchar(18)
	private $InjectionThroughMalignant; //varchar(18)
	private $NeedleTangential; //varchar(18)
	private $DynamicInjection; //varchar(18)
	private $IntramucosalBlebs; //varchar(18)
	private $IntramucosalBlebsTreatment; //varchar(18)
	private $Lifting; //varchar(18)
	private $StopInjection; //varchar(18)
	private $AppropriateLift; //varchar(18)
	private $NarrowSegment; //varchar(18)
	private $AppropriateSnare; //varchar(18)
	private $AppropriateSize; //varchar(18)
	private $StartsAtTheEdge; //varchar(18)
	private $LongAxis; //varchar(18)
	private $Aspiration; //varchar(18)
	private $TipVisualisation; //varchar(18)
	private $StopClosureSnare; //varchar(18)
	private $EndoscopistSnare; //varchar(18)
	private $SnareClosure; //varchar(18)
	private $TissueMobility; //varchar(18)
	private $TactileFeedback; //varchar(18)
	private $GoodResection_Piecemeal; //varchar(18)
	private $GoodResection_EnBloc; //varchar(18)
	private $SpeedOfClosure; //varchar(18)
	private $ColdSnare; //varchar(18)
	private $CorrectSettingsEnsured; //varchar(18)
	private $StablePosition; //varchar(18)
	private $CheckHaemostatics; //varchar(18)
	private $UsesDistension; //varchar(18)
	private $MobilityChecks; //varchar(18)
	private $DiathermyApplication; //varchar(18)
	private $StopsIfNoTransection; //varchar(18)
	private $StopDiathermy; //varchar(18)
	private $NLA; //varchar(18)
	private $NLATreatment; //varchar(18)
	private $SecondLine; //varchar(18)
	private $IPB; //varchar(18)
	private $CauseOfBleedingIdentified; //varchar(18)
	private $PatientPosition; //varchar(18)
	private $MildBleeding; //varchar(18)
	private $STSCNeeded; //varchar(18)
	private $STSC; //varchar(18)
	private $Coag; //varchar(18)
	private $CoagForceps; //varchar(18)
	private $SevereBleeding; //varchar(18)
	private $NotControlledBleeding; //varchar(18)
	private $NotControlledBleeding_1; //varchar(18)
	private $CompleteBleedingControl; //varchar(18)
	private $Perforation; //varchar(18)
	private $SydneyDMIScore; //varchar(18)
	private $ClosureRequired; //varchar(18)
	private $PriorClosure; //varchar(18)
	private $ClipUses; //varchar(18)
	private $TTSTechnique; //varchar(18)
	private $TTSNotUsed; //varchar(18)
	private $OTSCTechnique; //varchar(18)
	private $CompleteClosure; //varchar(18)
	private $AntibioticsPostPerf; //varchar(18)
	private $Ctscan; //varchar(18)
	private $SurgicalReview; //varchar(18)
	private $DifficultAccess; //varchar(18)
	private $Position; //varchar(18)
	private $ScopeChanged; //varchar(18)
	private $CapUsed; //varchar(18)
	private $AntispasmodicsUsed; //varchar(18)
	private $Retroflexionv2; //varchar(18)
	private $ExternalPressure; //varchar(18)
	private $HoldTheScope; //varchar(18)
	private $ICV; //varchar(18)
	private $AppendicealOrfice; //varchar(18)
	private $AnorectalJunction; //varchar(18)
	private $DefectInspection; //varchar(18)
	private $Chromoendoscopy; //varchar(18)
	private $Margin; //varchar(18)
	private $PolypTissueRemoved; //varchar(18)
	private $SubmucosaInspected; //varchar(18)
	private $Fibrosis; //varchar(18)
	private $MPInspection; //varchar(18)
	private $MPDescription; //varchar(18)
	private $NonStainedSM; //varchar(18)
	private $Uncertainty; //varchar(18)
	private $Photodocumentation; //varchar(18)
	private $MarginTreatment; //varchar(18)
	private $STSCTechnique; //varchar(18)
	private $APCTechnique; //varchar(18)
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysqlPDOEDM();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_PolypectomyAssessmentTool($AGE,$Sex,$OnlyLesion,$SMSASize,$SMSAMorphology,$SMSASite,$SMSAAccess,$Paris,$Location,$Morphology,$ColonCleanliness,$Dateofprocedure,$AssessorName,$AssessorGrade,$AssesseeName,$AssesseeGrade,$ExperienceAssessor,$ExperienceAssessee,$PatientConsentObtained,$PatientComorbidity,$Anticoagulant,$AnticoagulantTherapy,$Antibiotics,$ProphylacticAntibiotics,$PatientCorrectlyPositioned,$PlateOn,$MetalImplant,$AccurateSizeDetermination,$HighestKudoAssessor,$HighestKudoAssessee,$HighestNICEAssessor,$HighestNICEAssessee,$RiskSMICAssessor,$RiskSMICAssessee,$En-blocResection,$En-bloc,$AttemptBeyondCapabilities,$Piecemeal,$Access,$Pressure,$LesionPosition,$Retroflexion,$ScopeUsed,$Insufflation,$Cap,$Antispasmodics,$OptimisesAccess,$LiftAtOnce,$Sequential_Inj_Res,$ImproveAccess,$AirExpelled,$InjectionThroughMalignant,$NeedleTangential,$DynamicInjection,$IntramucosalBlebs,$IntramucosalBlebsTreatment,$Lifting,$StopInjection,$AppropriateLift,$NarrowSegment,$AppropriateSnare,$AppropriateSize,$StartsAtTheEdge,$LongAxis,$Aspiration,$TipVisualisation,$StopClosureSnare,$EndoscopistSnare,$SnareClosure,$TissueMobility,$TactileFeedback,$GoodResection_Piecemeal,$GoodResection_EnBloc,$SpeedOfClosure,$ColdSnare,$CorrectSettingsEnsured,$StablePosition,$CheckHaemostatics,$UsesDistension,$MobilityChecks,$DiathermyApplication,$StopsIfNoTransection,$StopDiathermy,$NLA,$NLATreatment,$SecondLine,$IPB,$CauseOfBleedingIdentified,$PatientPosition,$MildBleeding,$STSCNeeded,$STSC,$Coag,$CoagForceps,$SevereBleeding,$NotControlledBleeding,$NotControlledBleeding_1,$CompleteBleedingControl,$Perforation,$SydneyDMIScore,$ClosureRequired,$PriorClosure,$ClipUses,$TTSTechnique,$TTSNotUsed,$OTSCTechnique,$CompleteClosure,$AntibioticsPostPerf,$Ctscan,$SurgicalReview,$DifficultAccess,$Position,$ScopeChanged,$CapUsed,$AntispasmodicsUsed,$Retroflexionv2,$ExternalPressure,$HoldTheScope,$ICV,$AppendicealOrfice,$AnorectalJunction,$DefectInspection,$Chromoendoscopy,$Margin,$PolypTissueRemoved,$SubmucosaInspected,$Fibrosis,$MPInspection,$MPDescription,$NonStainedSM,$Uncertainty,$Photodocumentation,$MarginTreatment,$STSCTechnique,$APCTechnique){
		$this->AGE = $AGE;
		$this->Sex = $Sex;
		$this->OnlyLesion = $OnlyLesion;
		$this->SMSASize = $SMSASize;
		$this->SMSAMorphology = $SMSAMorphology;
		$this->SMSASite = $SMSASite;
		$this->SMSAAccess = $SMSAAccess;
		$this->Paris = $Paris;
		$this->Location = $Location;
		$this->Morphology = $Morphology;
		$this->ColonCleanliness = $ColonCleanliness;
		$this->Dateofprocedure = $Dateofprocedure;
		$this->AssessorName = $AssessorName;
		$this->AssessorGrade = $AssessorGrade;
		$this->AssesseeName = $AssesseeName;
		$this->AssesseeGrade = $AssesseeGrade;
		$this->ExperienceAssessor = $ExperienceAssessor;
		$this->ExperienceAssessee = $ExperienceAssessee;
		$this->PatientConsentObtained = $PatientConsentObtained;
		$this->PatientComorbidity = $PatientComorbidity;
		$this->Anticoagulant = $Anticoagulant;
		$this->AnticoagulantTherapy = $AnticoagulantTherapy;
		$this->Antibiotics = $Antibiotics;
		$this->ProphylacticAntibiotics = $ProphylacticAntibiotics;
		$this->PatientCorrectlyPositioned = $PatientCorrectlyPositioned;
		$this->PlateOn = $PlateOn;
		$this->MetalImplant = $MetalImplant;
		$this->AccurateSizeDetermination = $AccurateSizeDetermination;
		$this->HighestKudoAssessor = $HighestKudoAssessor;
		$this->HighestKudoAssessee = $HighestKudoAssessee;
		$this->HighestNICEAssessor = $HighestNICEAssessor;
		$this->HighestNICEAssessee = $HighestNICEAssessee;
		$this->RiskSMICAssessor = $RiskSMICAssessor;
		$this->RiskSMICAssessee = $RiskSMICAssessee;
		$this->En-blocResection = $En-blocResection;
		$this->En-bloc = $En-bloc;
		$this->AttemptBeyondCapabilities = $AttemptBeyondCapabilities;
		$this->Piecemeal = $Piecemeal;
		$this->Access = $Access;
		$this->Pressure = $Pressure;
		$this->LesionPosition = $LesionPosition;
		$this->Retroflexion = $Retroflexion;
		$this->ScopeUsed = $ScopeUsed;
		$this->Insufflation = $Insufflation;
		$this->Cap = $Cap;
		$this->Antispasmodics = $Antispasmodics;
		$this->OptimisesAccess = $OptimisesAccess;
		$this->LiftAtOnce = $LiftAtOnce;
		$this->Sequential_Inj_Res = $Sequential_Inj_Res;
		$this->ImproveAccess = $ImproveAccess;
		$this->AirExpelled = $AirExpelled;
		$this->InjectionThroughMalignant = $InjectionThroughMalignant;
		$this->NeedleTangential = $NeedleTangential;
		$this->DynamicInjection = $DynamicInjection;
		$this->IntramucosalBlebs = $IntramucosalBlebs;
		$this->IntramucosalBlebsTreatment = $IntramucosalBlebsTreatment;
		$this->Lifting = $Lifting;
		$this->StopInjection = $StopInjection;
		$this->AppropriateLift = $AppropriateLift;
		$this->NarrowSegment = $NarrowSegment;
		$this->AppropriateSnare = $AppropriateSnare;
		$this->AppropriateSize = $AppropriateSize;
		$this->StartsAtTheEdge = $StartsAtTheEdge;
		$this->LongAxis = $LongAxis;
		$this->Aspiration = $Aspiration;
		$this->TipVisualisation = $TipVisualisation;
		$this->StopClosureSnare = $StopClosureSnare;
		$this->EndoscopistSnare = $EndoscopistSnare;
		$this->SnareClosure = $SnareClosure;
		$this->TissueMobility = $TissueMobility;
		$this->TactileFeedback = $TactileFeedback;
		$this->GoodResection_Piecemeal = $GoodResection_Piecemeal;
		$this->GoodResection_EnBloc = $GoodResection_EnBloc;
		$this->SpeedOfClosure = $SpeedOfClosure;
		$this->ColdSnare = $ColdSnare;
		$this->CorrectSettingsEnsured = $CorrectSettingsEnsured;
		$this->StablePosition = $StablePosition;
		$this->CheckHaemostatics = $CheckHaemostatics;
		$this->UsesDistension = $UsesDistension;
		$this->MobilityChecks = $MobilityChecks;
		$this->DiathermyApplication = $DiathermyApplication;
		$this->StopsIfNoTransection = $StopsIfNoTransection;
		$this->StopDiathermy = $StopDiathermy;
		$this->NLA = $NLA;
		$this->NLATreatment = $NLATreatment;
		$this->SecondLine = $SecondLine;
		$this->IPB = $IPB;
		$this->CauseOfBleedingIdentified = $CauseOfBleedingIdentified;
		$this->PatientPosition = $PatientPosition;
		$this->MildBleeding = $MildBleeding;
		$this->STSCNeeded = $STSCNeeded;
		$this->STSC = $STSC;
		$this->Coag = $Coag;
		$this->CoagForceps = $CoagForceps;
		$this->SevereBleeding = $SevereBleeding;
		$this->NotControlledBleeding = $NotControlledBleeding;
		$this->NotControlledBleeding_1 = $NotControlledBleeding_1;
		$this->CompleteBleedingControl = $CompleteBleedingControl;
		$this->Perforation = $Perforation;
		$this->SydneyDMIScore = $SydneyDMIScore;
		$this->ClosureRequired = $ClosureRequired;
		$this->PriorClosure = $PriorClosure;
		$this->ClipUses = $ClipUses;
		$this->TTSTechnique = $TTSTechnique;
		$this->TTSNotUsed = $TTSNotUsed;
		$this->OTSCTechnique = $OTSCTechnique;
		$this->CompleteClosure = $CompleteClosure;
		$this->AntibioticsPostPerf = $AntibioticsPostPerf;
		$this->Ctscan = $Ctscan;
		$this->SurgicalReview = $SurgicalReview;
		$this->DifficultAccess = $DifficultAccess;
		$this->Position = $Position;
		$this->ScopeChanged = $ScopeChanged;
		$this->CapUsed = $CapUsed;
		$this->AntispasmodicsUsed = $AntispasmodicsUsed;
		$this->Retroflexionv2 = $Retroflexionv2;
		$this->ExternalPressure = $ExternalPressure;
		$this->HoldTheScope = $HoldTheScope;
		$this->ICV = $ICV;
		$this->AppendicealOrfice = $AppendicealOrfice;
		$this->AnorectalJunction = $AnorectalJunction;
		$this->DefectInspection = $DefectInspection;
		$this->Chromoendoscopy = $Chromoendoscopy;
		$this->Margin = $Margin;
		$this->PolypTissueRemoved = $PolypTissueRemoved;
		$this->SubmucosaInspected = $SubmucosaInspected;
		$this->Fibrosis = $Fibrosis;
		$this->MPInspection = $MPInspection;
		$this->MPDescription = $MPDescription;
		$this->NonStainedSM = $NonStainedSM;
		$this->Uncertainty = $Uncertainty;
		$this->Photodocumentation = $Photodocumentation;
		$this->MarginTreatment = $MarginTreatment;
		$this->STSCTechnique = $STSCTechnique;
		$this->APCTechnique = $APCTechnique;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from PolypectomyAssessmentTool where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->AGE = $row["AGE"];
			$this->Sex = $row["Sex"];
			$this->OnlyLesion = $row["OnlyLesion"];
			$this->SMSASize = $row["SMSASize"];
			$this->SMSAMorphology = $row["SMSAMorphology"];
			$this->SMSASite = $row["SMSASite"];
			$this->SMSAAccess = $row["SMSAAccess"];
			$this->Paris = $row["Paris"];
			$this->Location = $row["Location"];
			$this->Morphology = $row["Morphology"];
			$this->ColonCleanliness = $row["ColonCleanliness"];
			$this->Dateofprocedure = $row["Dateofprocedure"];
			$this->AssessorName = $row["AssessorName"];
			$this->AssessorGrade = $row["AssessorGrade"];
			$this->AssesseeName = $row["AssesseeName"];
			$this->AssesseeGrade = $row["AssesseeGrade"];
			$this->ExperienceAssessor = $row["ExperienceAssessor"];
			$this->ExperienceAssessee = $row["ExperienceAssessee"];
			$this->PatientConsentObtained = $row["PatientConsentObtained"];
			$this->PatientComorbidity = $row["PatientComorbidity"];
			$this->Anticoagulant = $row["Anticoagulant"];
			$this->AnticoagulantTherapy = $row["AnticoagulantTherapy"];
			$this->Antibiotics = $row["Antibiotics"];
			$this->ProphylacticAntibiotics = $row["ProphylacticAntibiotics"];
			$this->PatientCorrectlyPositioned = $row["PatientCorrectlyPositioned"];
			$this->PlateOn = $row["PlateOn"];
			$this->MetalImplant = $row["MetalImplant"];
			$this->AccurateSizeDetermination = $row["AccurateSizeDetermination"];
			$this->HighestKudoAssessor = $row["HighestKudoAssessor"];
			$this->HighestKudoAssessee = $row["HighestKudoAssessee"];
			$this->HighestNICEAssessor = $row["HighestNICEAssessor"];
			$this->HighestNICEAssessee = $row["HighestNICEAssessee"];
			$this->RiskSMICAssessor = $row["RiskSMICAssessor"];
			$this->RiskSMICAssessee = $row["RiskSMICAssessee"];
			$this->En-blocResection = $row["En-blocResection"];
			$this->En-bloc = $row["En-bloc"];
			$this->AttemptBeyondCapabilities = $row["AttemptBeyondCapabilities"];
			$this->Piecemeal = $row["Piecemeal"];
			$this->Access = $row["Access"];
			$this->Pressure = $row["Pressure"];
			$this->LesionPosition = $row["LesionPosition"];
			$this->Retroflexion = $row["Retroflexion"];
			$this->ScopeUsed = $row["ScopeUsed"];
			$this->Insufflation = $row["Insufflation"];
			$this->Cap = $row["Cap"];
			$this->Antispasmodics = $row["Antispasmodics"];
			$this->OptimisesAccess = $row["OptimisesAccess"];
			$this->LiftAtOnce = $row["LiftAtOnce"];
			$this->Sequential_Inj_Res = $row["Sequential_Inj_Res"];
			$this->ImproveAccess = $row["ImproveAccess"];
			$this->AirExpelled = $row["AirExpelled"];
			$this->InjectionThroughMalignant = $row["InjectionThroughMalignant"];
			$this->NeedleTangential = $row["NeedleTangential"];
			$this->DynamicInjection = $row["DynamicInjection"];
			$this->IntramucosalBlebs = $row["IntramucosalBlebs"];
			$this->IntramucosalBlebsTreatment = $row["IntramucosalBlebsTreatment"];
			$this->Lifting = $row["Lifting"];
			$this->StopInjection = $row["StopInjection"];
			$this->AppropriateLift = $row["AppropriateLift"];
			$this->NarrowSegment = $row["NarrowSegment"];
			$this->AppropriateSnare = $row["AppropriateSnare"];
			$this->AppropriateSize = $row["AppropriateSize"];
			$this->StartsAtTheEdge = $row["StartsAtTheEdge"];
			$this->LongAxis = $row["LongAxis"];
			$this->Aspiration = $row["Aspiration"];
			$this->TipVisualisation = $row["TipVisualisation"];
			$this->StopClosureSnare = $row["StopClosureSnare"];
			$this->EndoscopistSnare = $row["EndoscopistSnare"];
			$this->SnareClosure = $row["SnareClosure"];
			$this->TissueMobility = $row["TissueMobility"];
			$this->TactileFeedback = $row["TactileFeedback"];
			$this->GoodResection_Piecemeal = $row["GoodResection_Piecemeal"];
			$this->GoodResection_EnBloc = $row["GoodResection_EnBloc"];
			$this->SpeedOfClosure = $row["SpeedOfClosure"];
			$this->ColdSnare = $row["ColdSnare"];
			$this->CorrectSettingsEnsured = $row["CorrectSettingsEnsured"];
			$this->StablePosition = $row["StablePosition"];
			$this->CheckHaemostatics = $row["CheckHaemostatics"];
			$this->UsesDistension = $row["UsesDistension"];
			$this->MobilityChecks = $row["MobilityChecks"];
			$this->DiathermyApplication = $row["DiathermyApplication"];
			$this->StopsIfNoTransection = $row["StopsIfNoTransection"];
			$this->StopDiathermy = $row["StopDiathermy"];
			$this->NLA = $row["NLA"];
			$this->NLATreatment = $row["NLATreatment"];
			$this->SecondLine = $row["SecondLine"];
			$this->IPB = $row["IPB"];
			$this->CauseOfBleedingIdentified = $row["CauseOfBleedingIdentified"];
			$this->PatientPosition = $row["PatientPosition"];
			$this->MildBleeding = $row["MildBleeding"];
			$this->STSCNeeded = $row["STSCNeeded"];
			$this->STSC = $row["STSC"];
			$this->Coag = $row["Coag"];
			$this->CoagForceps = $row["CoagForceps"];
			$this->SevereBleeding = $row["SevereBleeding"];
			$this->NotControlledBleeding = $row["NotControlledBleeding"];
			$this->NotControlledBleeding_1 = $row["NotControlledBleeding_1"];
			$this->CompleteBleedingControl = $row["CompleteBleedingControl"];
			$this->Perforation = $row["Perforation"];
			$this->SydneyDMIScore = $row["SydneyDMIScore"];
			$this->ClosureRequired = $row["ClosureRequired"];
			$this->PriorClosure = $row["PriorClosure"];
			$this->ClipUses = $row["ClipUses"];
			$this->TTSTechnique = $row["TTSTechnique"];
			$this->TTSNotUsed = $row["TTSNotUsed"];
			$this->OTSCTechnique = $row["OTSCTechnique"];
			$this->CompleteClosure = $row["CompleteClosure"];
			$this->AntibioticsPostPerf = $row["AntibioticsPostPerf"];
			$this->Ctscan = $row["Ctscan"];
			$this->SurgicalReview = $row["SurgicalReview"];
			$this->DifficultAccess = $row["DifficultAccess"];
			$this->Position = $row["Position"];
			$this->ScopeChanged = $row["ScopeChanged"];
			$this->CapUsed = $row["CapUsed"];
			$this->AntispasmodicsUsed = $row["AntispasmodicsUsed"];
			$this->Retroflexionv2 = $row["Retroflexionv2"];
			$this->ExternalPressure = $row["ExternalPressure"];
			$this->HoldTheScope = $row["HoldTheScope"];
			$this->ICV = $row["ICV"];
			$this->AppendicealOrfice = $row["AppendicealOrfice"];
			$this->AnorectalJunction = $row["AnorectalJunction"];
			$this->DefectInspection = $row["DefectInspection"];
			$this->Chromoendoscopy = $row["Chromoendoscopy"];
			$this->Margin = $row["Margin"];
			$this->PolypTissueRemoved = $row["PolypTissueRemoved"];
			$this->SubmucosaInspected = $row["SubmucosaInspected"];
			$this->Fibrosis = $row["Fibrosis"];
			$this->MPInspection = $row["MPInspection"];
			$this->MPDescription = $row["MPDescription"];
			$this->NonStainedSM = $row["NonStainedSM"];
			$this->Uncertainty = $row["Uncertainty"];
			$this->Photodocumentation = $row["Photodocumentation"];
			$this->MarginTreatment = $row["MarginTreatment"];
			$this->STSCTechnique = $row["STSCTechnique"];
			$this->APCTechnique = $row["APCTechnique"];
		}
	}

    /**
     * Checks if the specified record exists
     *
     * @param key_table_type $key_row
     *
     */
	public function matchRecord($key_row){
		$result = $this->connection->RunQuery("Select * from PolypectomyAssessmentTool where id = \'$key_row\' ");
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
		return $this->connection->TotalOfRows('PolypectomyAssessmentTool');
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
$q = "INSERT INTO `PolypectomyAssessmentTool` ($keys) VALUES ($keys2)";
		
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
$q = "UPDATE `PolypectomyAssessmentTool` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$this->connection->RunQuery("DELETE FROM PolypectomyAssessmentTool WHERE id = $key_row");
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
		$result = $this->connection->RunQuery("SELECT id from PolypectomyAssessmentTool order by $column $order");
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
	 * @return AGE - varchar(18)
	 */
	public function getAGE(){
		return $this->AGE;
	}

	/**
	 * @return Sex - varchar(18)
	 */
	public function getSex(){
		return $this->Sex;
	}

	/**
	 * @return OnlyLesion - varchar(18)
	 */
	public function getOnlyLesion(){
		return $this->OnlyLesion;
	}

	/**
	 * @return SMSASize - varchar(18)
	 */
	public function getSMSASize(){
		return $this->SMSASize;
	}

	/**
	 * @return SMSAMorphology - varchar(18)
	 */
	public function getSMSAMorphology(){
		return $this->SMSAMorphology;
	}

	/**
	 * @return SMSASite - varchar(18)
	 */
	public function getSMSASite(){
		return $this->SMSASite;
	}

	/**
	 * @return SMSAAccess - varchar(18)
	 */
	public function getSMSAAccess(){
		return $this->SMSAAccess;
	}

	/**
	 * @return Paris - varchar(18)
	 */
	public function getParis(){
		return $this->Paris;
	}

	/**
	 * @return Location - varchar(18)
	 */
	public function getLocation(){
		return $this->Location;
	}

	/**
	 * @return Morphology - varchar(18)
	 */
	public function getMorphology(){
		return $this->Morphology;
	}

	/**
	 * @return ColonCleanliness - varchar(18)
	 */
	public function getColonCleanliness(){
		return $this->ColonCleanliness;
	}

	/**
	 * @return Dateofprocedure - varchar(18)
	 */
	public function getDateofprocedure(){
		return $this->Dateofprocedure;
	}

	/**
	 * @return AssessorName - varchar(18)
	 */
	public function getAssessorName(){
		return $this->AssessorName;
	}

	/**
	 * @return AssessorGrade - varchar(18)
	 */
	public function getAssessorGrade(){
		return $this->AssessorGrade;
	}

	/**
	 * @return AssesseeName - varchar(18)
	 */
	public function getAssesseeName(){
		return $this->AssesseeName;
	}

	/**
	 * @return AssesseeGrade - varchar(18)
	 */
	public function getAssesseeGrade(){
		return $this->AssesseeGrade;
	}

	/**
	 * @return ExperienceAssessor - varchar(18)
	 */
	public function getExperienceAssessor(){
		return $this->ExperienceAssessor;
	}

	/**
	 * @return ExperienceAssessee - varchar(18)
	 */
	public function getExperienceAssessee(){
		return $this->ExperienceAssessee;
	}

	/**
	 * @return PatientConsentObtained - varchar(18)
	 */
	public function getPatientConsentObtained(){
		return $this->PatientConsentObtained;
	}

	/**
	 * @return PatientComorbidity - varchar(18)
	 */
	public function getPatientComorbidity(){
		return $this->PatientComorbidity;
	}

	/**
	 * @return Anticoagulant - varchar(18)
	 */
	public function getAnticoagulant(){
		return $this->Anticoagulant;
	}

	/**
	 * @return AnticoagulantTherapy - varchar(18)
	 */
	public function getAnticoagulantTherapy(){
		return $this->AnticoagulantTherapy;
	}

	/**
	 * @return Antibiotics - varchar(18)
	 */
	public function getAntibiotics(){
		return $this->Antibiotics;
	}

	/**
	 * @return ProphylacticAntibiotics - varchar(18)
	 */
	public function getProphylacticAntibiotics(){
		return $this->ProphylacticAntibiotics;
	}

	/**
	 * @return PatientCorrectlyPositioned - varchar(18)
	 */
	public function getPatientCorrectlyPositioned(){
		return $this->PatientCorrectlyPositioned;
	}

	/**
	 * @return PlateOn - varchar(18)
	 */
	public function getPlateOn(){
		return $this->PlateOn;
	}

	/**
	 * @return MetalImplant - varchar(18)
	 */
	public function getMetalImplant(){
		return $this->MetalImplant;
	}

	/**
	 * @return AccurateSizeDetermination - varchar(18)
	 */
	public function getAccurateSizeDetermination(){
		return $this->AccurateSizeDetermination;
	}

	/**
	 * @return HighestKudoAssessor - varchar(18)
	 */
	public function getHighestKudoAssessor(){
		return $this->HighestKudoAssessor;
	}

	/**
	 * @return HighestKudoAssessee - varchar(18)
	 */
	public function getHighestKudoAssessee(){
		return $this->HighestKudoAssessee;
	}

	/**
	 * @return HighestNICEAssessor - varchar(18)
	 */
	public function getHighestNICEAssessor(){
		return $this->HighestNICEAssessor;
	}

	/**
	 * @return HighestNICEAssessee - varchar(18)
	 */
	public function getHighestNICEAssessee(){
		return $this->HighestNICEAssessee;
	}

	/**
	 * @return RiskSMICAssessor - varchar(18)
	 */
	public function getRiskSMICAssessor(){
		return $this->RiskSMICAssessor;
	}

	/**
	 * @return RiskSMICAssessee - varchar(18)
	 */
	public function getRiskSMICAssessee(){
		return $this->RiskSMICAssessee;
	}

	/**
	 * @return En-blocResection - varchar(18)
	 */
	public function getEn-blocResection(){
		return $this->En-blocResection;
	}

	/**
	 * @return En-bloc - varchar(18)
	 */
	public function getEn-bloc(){
		return $this->En-bloc;
	}

	/**
	 * @return AttemptBeyondCapabilities - varchar(18)
	 */
	public function getAttemptBeyondCapabilities(){
		return $this->AttemptBeyondCapabilities;
	}

	/**
	 * @return Piecemeal - varchar(18)
	 */
	public function getPiecemeal(){
		return $this->Piecemeal;
	}

	/**
	 * @return Access - varchar(18)
	 */
	public function getAccess(){
		return $this->Access;
	}

	/**
	 * @return Pressure - varchar(18)
	 */
	public function getPressure(){
		return $this->Pressure;
	}

	/**
	 * @return LesionPosition - varchar(18)
	 */
	public function getLesionPosition(){
		return $this->LesionPosition;
	}

	/**
	 * @return Retroflexion - varchar(18)
	 */
	public function getRetroflexion(){
		return $this->Retroflexion;
	}

	/**
	 * @return ScopeUsed - varchar(18)
	 */
	public function getScopeUsed(){
		return $this->ScopeUsed;
	}

	/**
	 * @return Insufflation - varchar(18)
	 */
	public function getInsufflation(){
		return $this->Insufflation;
	}

	/**
	 * @return Cap - varchar(18)
	 */
	public function getCap(){
		return $this->Cap;
	}

	/**
	 * @return Antispasmodics - varchar(18)
	 */
	public function getAntispasmodics(){
		return $this->Antispasmodics;
	}

	/**
	 * @return OptimisesAccess - varchar(18)
	 */
	public function getOptimisesAccess(){
		return $this->OptimisesAccess;
	}

	/**
	 * @return LiftAtOnce - varchar(18)
	 */
	public function getLiftAtOnce(){
		return $this->LiftAtOnce;
	}

	/**
	 * @return Sequential_Inj_Res - varchar(18)
	 */
	public function getSequential_Inj_Res(){
		return $this->Sequential_Inj_Res;
	}

	/**
	 * @return ImproveAccess - varchar(18)
	 */
	public function getImproveAccess(){
		return $this->ImproveAccess;
	}

	/**
	 * @return AirExpelled - varchar(18)
	 */
	public function getAirExpelled(){
		return $this->AirExpelled;
	}

	/**
	 * @return InjectionThroughMalignant - varchar(18)
	 */
	public function getInjectionThroughMalignant(){
		return $this->InjectionThroughMalignant;
	}

	/**
	 * @return NeedleTangential - varchar(18)
	 */
	public function getNeedleTangential(){
		return $this->NeedleTangential;
	}

	/**
	 * @return DynamicInjection - varchar(18)
	 */
	public function getDynamicInjection(){
		return $this->DynamicInjection;
	}

	/**
	 * @return IntramucosalBlebs - varchar(18)
	 */
	public function getIntramucosalBlebs(){
		return $this->IntramucosalBlebs;
	}

	/**
	 * @return IntramucosalBlebsTreatment - varchar(18)
	 */
	public function getIntramucosalBlebsTreatment(){
		return $this->IntramucosalBlebsTreatment;
	}

	/**
	 * @return Lifting - varchar(18)
	 */
	public function getLifting(){
		return $this->Lifting;
	}

	/**
	 * @return StopInjection - varchar(18)
	 */
	public function getStopInjection(){
		return $this->StopInjection;
	}

	/**
	 * @return AppropriateLift - varchar(18)
	 */
	public function getAppropriateLift(){
		return $this->AppropriateLift;
	}

	/**
	 * @return NarrowSegment - varchar(18)
	 */
	public function getNarrowSegment(){
		return $this->NarrowSegment;
	}

	/**
	 * @return AppropriateSnare - varchar(18)
	 */
	public function getAppropriateSnare(){
		return $this->AppropriateSnare;
	}

	/**
	 * @return AppropriateSize - varchar(18)
	 */
	public function getAppropriateSize(){
		return $this->AppropriateSize;
	}

	/**
	 * @return StartsAtTheEdge - varchar(18)
	 */
	public function getStartsAtTheEdge(){
		return $this->StartsAtTheEdge;
	}

	/**
	 * @return LongAxis - varchar(18)
	 */
	public function getLongAxis(){
		return $this->LongAxis;
	}

	/**
	 * @return Aspiration - varchar(18)
	 */
	public function getAspiration(){
		return $this->Aspiration;
	}

	/**
	 * @return TipVisualisation - varchar(18)
	 */
	public function getTipVisualisation(){
		return $this->TipVisualisation;
	}

	/**
	 * @return StopClosureSnare - varchar(18)
	 */
	public function getStopClosureSnare(){
		return $this->StopClosureSnare;
	}

	/**
	 * @return EndoscopistSnare - varchar(18)
	 */
	public function getEndoscopistSnare(){
		return $this->EndoscopistSnare;
	}

	/**
	 * @return SnareClosure - varchar(18)
	 */
	public function getSnareClosure(){
		return $this->SnareClosure;
	}

	/**
	 * @return TissueMobility - varchar(18)
	 */
	public function getTissueMobility(){
		return $this->TissueMobility;
	}

	/**
	 * @return TactileFeedback - varchar(18)
	 */
	public function getTactileFeedback(){
		return $this->TactileFeedback;
	}

	/**
	 * @return GoodResection_Piecemeal - varchar(18)
	 */
	public function getGoodResection_Piecemeal(){
		return $this->GoodResection_Piecemeal;
	}

	/**
	 * @return GoodResection_EnBloc - varchar(18)
	 */
	public function getGoodResection_EnBloc(){
		return $this->GoodResection_EnBloc;
	}

	/**
	 * @return SpeedOfClosure - varchar(18)
	 */
	public function getSpeedOfClosure(){
		return $this->SpeedOfClosure;
	}

	/**
	 * @return ColdSnare - varchar(18)
	 */
	public function getColdSnare(){
		return $this->ColdSnare;
	}

	/**
	 * @return CorrectSettingsEnsured - varchar(18)
	 */
	public function getCorrectSettingsEnsured(){
		return $this->CorrectSettingsEnsured;
	}

	/**
	 * @return StablePosition - varchar(18)
	 */
	public function getStablePosition(){
		return $this->StablePosition;
	}

	/**
	 * @return CheckHaemostatics - varchar(18)
	 */
	public function getCheckHaemostatics(){
		return $this->CheckHaemostatics;
	}

	/**
	 * @return UsesDistension - varchar(18)
	 */
	public function getUsesDistension(){
		return $this->UsesDistension;
	}

	/**
	 * @return MobilityChecks - varchar(18)
	 */
	public function getMobilityChecks(){
		return $this->MobilityChecks;
	}

	/**
	 * @return DiathermyApplication - varchar(18)
	 */
	public function getDiathermyApplication(){
		return $this->DiathermyApplication;
	}

	/**
	 * @return StopsIfNoTransection - varchar(18)
	 */
	public function getStopsIfNoTransection(){
		return $this->StopsIfNoTransection;
	}

	/**
	 * @return StopDiathermy - varchar(18)
	 */
	public function getStopDiathermy(){
		return $this->StopDiathermy;
	}

	/**
	 * @return NLA - varchar(18)
	 */
	public function getNLA(){
		return $this->NLA;
	}

	/**
	 * @return NLATreatment - varchar(18)
	 */
	public function getNLATreatment(){
		return $this->NLATreatment;
	}

	/**
	 * @return SecondLine - varchar(18)
	 */
	public function getSecondLine(){
		return $this->SecondLine;
	}

	/**
	 * @return IPB - varchar(18)
	 */
	public function getIPB(){
		return $this->IPB;
	}

	/**
	 * @return CauseOfBleedingIdentified - varchar(18)
	 */
	public function getCauseOfBleedingIdentified(){
		return $this->CauseOfBleedingIdentified;
	}

	/**
	 * @return PatientPosition - varchar(18)
	 */
	public function getPatientPosition(){
		return $this->PatientPosition;
	}

	/**
	 * @return MildBleeding - varchar(18)
	 */
	public function getMildBleeding(){
		return $this->MildBleeding;
	}

	/**
	 * @return STSCNeeded - varchar(18)
	 */
	public function getSTSCNeeded(){
		return $this->STSCNeeded;
	}

	/**
	 * @return STSC - varchar(18)
	 */
	public function getSTSC(){
		return $this->STSC;
	}

	/**
	 * @return Coag - varchar(18)
	 */
	public function getCoag(){
		return $this->Coag;
	}

	/**
	 * @return CoagForceps - varchar(18)
	 */
	public function getCoagForceps(){
		return $this->CoagForceps;
	}

	/**
	 * @return SevereBleeding - varchar(18)
	 */
	public function getSevereBleeding(){
		return $this->SevereBleeding;
	}

	/**
	 * @return NotControlledBleeding - varchar(18)
	 */
	public function getNotControlledBleeding(){
		return $this->NotControlledBleeding;
	}

	/**
	 * @return NotControlledBleeding_1 - varchar(18)
	 */
	public function getNotControlledBleeding_1(){
		return $this->NotControlledBleeding_1;
	}

	/**
	 * @return CompleteBleedingControl - varchar(18)
	 */
	public function getCompleteBleedingControl(){
		return $this->CompleteBleedingControl;
	}

	/**
	 * @return Perforation - varchar(18)
	 */
	public function getPerforation(){
		return $this->Perforation;
	}

	/**
	 * @return SydneyDMIScore - varchar(18)
	 */
	public function getSydneyDMIScore(){
		return $this->SydneyDMIScore;
	}

	/**
	 * @return ClosureRequired - varchar(18)
	 */
	public function getClosureRequired(){
		return $this->ClosureRequired;
	}

	/**
	 * @return PriorClosure - varchar(18)
	 */
	public function getPriorClosure(){
		return $this->PriorClosure;
	}

	/**
	 * @return ClipUses - varchar(18)
	 */
	public function getClipUses(){
		return $this->ClipUses;
	}

	/**
	 * @return TTSTechnique - varchar(18)
	 */
	public function getTTSTechnique(){
		return $this->TTSTechnique;
	}

	/**
	 * @return TTSNotUsed - varchar(18)
	 */
	public function getTTSNotUsed(){
		return $this->TTSNotUsed;
	}

	/**
	 * @return OTSCTechnique - varchar(18)
	 */
	public function getOTSCTechnique(){
		return $this->OTSCTechnique;
	}

	/**
	 * @return CompleteClosure - varchar(18)
	 */
	public function getCompleteClosure(){
		return $this->CompleteClosure;
	}

	/**
	 * @return AntibioticsPostPerf - varchar(18)
	 */
	public function getAntibioticsPostPerf(){
		return $this->AntibioticsPostPerf;
	}

	/**
	 * @return Ctscan - varchar(18)
	 */
	public function getCtscan(){
		return $this->Ctscan;
	}

	/**
	 * @return SurgicalReview - varchar(18)
	 */
	public function getSurgicalReview(){
		return $this->SurgicalReview;
	}

	/**
	 * @return DifficultAccess - varchar(18)
	 */
	public function getDifficultAccess(){
		return $this->DifficultAccess;
	}

	/**
	 * @return Position - varchar(18)
	 */
	public function getPosition(){
		return $this->Position;
	}

	/**
	 * @return ScopeChanged - varchar(18)
	 */
	public function getScopeChanged(){
		return $this->ScopeChanged;
	}

	/**
	 * @return CapUsed - varchar(18)
	 */
	public function getCapUsed(){
		return $this->CapUsed;
	}

	/**
	 * @return AntispasmodicsUsed - varchar(18)
	 */
	public function getAntispasmodicsUsed(){
		return $this->AntispasmodicsUsed;
	}

	/**
	 * @return Retroflexionv2 - varchar(18)
	 */
	public function getRetroflexionv2(){
		return $this->Retroflexionv2;
	}

	/**
	 * @return ExternalPressure - varchar(18)
	 */
	public function getExternalPressure(){
		return $this->ExternalPressure;
	}

	/**
	 * @return HoldTheScope - varchar(18)
	 */
	public function getHoldTheScope(){
		return $this->HoldTheScope;
	}

	/**
	 * @return ICV - varchar(18)
	 */
	public function getICV(){
		return $this->ICV;
	}

	/**
	 * @return AppendicealOrfice - varchar(18)
	 */
	public function getAppendicealOrfice(){
		return $this->AppendicealOrfice;
	}

	/**
	 * @return AnorectalJunction - varchar(18)
	 */
	public function getAnorectalJunction(){
		return $this->AnorectalJunction;
	}

	/**
	 * @return DefectInspection - varchar(18)
	 */
	public function getDefectInspection(){
		return $this->DefectInspection;
	}

	/**
	 * @return Chromoendoscopy - varchar(18)
	 */
	public function getChromoendoscopy(){
		return $this->Chromoendoscopy;
	}

	/**
	 * @return Margin - varchar(18)
	 */
	public function getMargin(){
		return $this->Margin;
	}

	/**
	 * @return PolypTissueRemoved - varchar(18)
	 */
	public function getPolypTissueRemoved(){
		return $this->PolypTissueRemoved;
	}

	/**
	 * @return SubmucosaInspected - varchar(18)
	 */
	public function getSubmucosaInspected(){
		return $this->SubmucosaInspected;
	}

	/**
	 * @return Fibrosis - varchar(18)
	 */
	public function getFibrosis(){
		return $this->Fibrosis;
	}

	/**
	 * @return MPInspection - varchar(18)
	 */
	public function getMPInspection(){
		return $this->MPInspection;
	}

	/**
	 * @return MPDescription - varchar(18)
	 */
	public function getMPDescription(){
		return $this->MPDescription;
	}

	/**
	 * @return NonStainedSM - varchar(18)
	 */
	public function getNonStainedSM(){
		return $this->NonStainedSM;
	}

	/**
	 * @return Uncertainty - varchar(18)
	 */
	public function getUncertainty(){
		return $this->Uncertainty;
	}

	/**
	 * @return Photodocumentation - varchar(18)
	 */
	public function getPhotodocumentation(){
		return $this->Photodocumentation;
	}

	/**
	 * @return MarginTreatment - varchar(18)
	 */
	public function getMarginTreatment(){
		return $this->MarginTreatment;
	}

	/**
	 * @return STSCTechnique - varchar(18)
	 */
	public function getSTSCTechnique(){
		return $this->STSCTechnique;
	}

	/**
	 * @return APCTechnique - varchar(18)
	 */
	public function getAPCTechnique(){
		return $this->APCTechnique;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAGE($AGE){
		$this->AGE = $AGE;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setSex($Sex){
		$this->Sex = $Sex;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setOnlyLesion($OnlyLesion){
		$this->OnlyLesion = $OnlyLesion;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setSMSASize($SMSASize){
		$this->SMSASize = $SMSASize;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setSMSAMorphology($SMSAMorphology){
		$this->SMSAMorphology = $SMSAMorphology;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setSMSASite($SMSASite){
		$this->SMSASite = $SMSASite;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setSMSAAccess($SMSAAccess){
		$this->SMSAAccess = $SMSAAccess;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setParis($Paris){
		$this->Paris = $Paris;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setLocation($Location){
		$this->Location = $Location;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setMorphology($Morphology){
		$this->Morphology = $Morphology;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setColonCleanliness($ColonCleanliness){
		$this->ColonCleanliness = $ColonCleanliness;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setDateofprocedure($Dateofprocedure){
		$this->Dateofprocedure = $Dateofprocedure;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAssessorName($AssessorName){
		$this->AssessorName = $AssessorName;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAssessorGrade($AssessorGrade){
		$this->AssessorGrade = $AssessorGrade;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAssesseeName($AssesseeName){
		$this->AssesseeName = $AssesseeName;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAssesseeGrade($AssesseeGrade){
		$this->AssesseeGrade = $AssesseeGrade;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setExperienceAssessor($ExperienceAssessor){
		$this->ExperienceAssessor = $ExperienceAssessor;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setExperienceAssessee($ExperienceAssessee){
		$this->ExperienceAssessee = $ExperienceAssessee;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setPatientConsentObtained($PatientConsentObtained){
		$this->PatientConsentObtained = $PatientConsentObtained;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setPatientComorbidity($PatientComorbidity){
		$this->PatientComorbidity = $PatientComorbidity;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAnticoagulant($Anticoagulant){
		$this->Anticoagulant = $Anticoagulant;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAnticoagulantTherapy($AnticoagulantTherapy){
		$this->AnticoagulantTherapy = $AnticoagulantTherapy;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAntibiotics($Antibiotics){
		$this->Antibiotics = $Antibiotics;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setProphylacticAntibiotics($ProphylacticAntibiotics){
		$this->ProphylacticAntibiotics = $ProphylacticAntibiotics;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setPatientCorrectlyPositioned($PatientCorrectlyPositioned){
		$this->PatientCorrectlyPositioned = $PatientCorrectlyPositioned;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setPlateOn($PlateOn){
		$this->PlateOn = $PlateOn;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setMetalImplant($MetalImplant){
		$this->MetalImplant = $MetalImplant;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAccurateSizeDetermination($AccurateSizeDetermination){
		$this->AccurateSizeDetermination = $AccurateSizeDetermination;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setHighestKudoAssessor($HighestKudoAssessor){
		$this->HighestKudoAssessor = $HighestKudoAssessor;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setHighestKudoAssessee($HighestKudoAssessee){
		$this->HighestKudoAssessee = $HighestKudoAssessee;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setHighestNICEAssessor($HighestNICEAssessor){
		$this->HighestNICEAssessor = $HighestNICEAssessor;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setHighestNICEAssessee($HighestNICEAssessee){
		$this->HighestNICEAssessee = $HighestNICEAssessee;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setRiskSMICAssessor($RiskSMICAssessor){
		$this->RiskSMICAssessor = $RiskSMICAssessor;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setRiskSMICAssessee($RiskSMICAssessee){
		$this->RiskSMICAssessee = $RiskSMICAssessee;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setEn-blocResection($En-blocResection){
		$this->En-blocResection = $En-blocResection;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setEn-bloc($En-bloc){
		$this->En-bloc = $En-bloc;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAttemptBeyondCapabilities($AttemptBeyondCapabilities){
		$this->AttemptBeyondCapabilities = $AttemptBeyondCapabilities;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setPiecemeal($Piecemeal){
		$this->Piecemeal = $Piecemeal;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAccess($Access){
		$this->Access = $Access;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setPressure($Pressure){
		$this->Pressure = $Pressure;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setLesionPosition($LesionPosition){
		$this->LesionPosition = $LesionPosition;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setRetroflexion($Retroflexion){
		$this->Retroflexion = $Retroflexion;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setScopeUsed($ScopeUsed){
		$this->ScopeUsed = $ScopeUsed;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setInsufflation($Insufflation){
		$this->Insufflation = $Insufflation;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setCap($Cap){
		$this->Cap = $Cap;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAntispasmodics($Antispasmodics){
		$this->Antispasmodics = $Antispasmodics;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setOptimisesAccess($OptimisesAccess){
		$this->OptimisesAccess = $OptimisesAccess;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setLiftAtOnce($LiftAtOnce){
		$this->LiftAtOnce = $LiftAtOnce;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setSequential_Inj_Res($Sequential_Inj_Res){
		$this->Sequential_Inj_Res = $Sequential_Inj_Res;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setImproveAccess($ImproveAccess){
		$this->ImproveAccess = $ImproveAccess;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAirExpelled($AirExpelled){
		$this->AirExpelled = $AirExpelled;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setInjectionThroughMalignant($InjectionThroughMalignant){
		$this->InjectionThroughMalignant = $InjectionThroughMalignant;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setNeedleTangential($NeedleTangential){
		$this->NeedleTangential = $NeedleTangential;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setDynamicInjection($DynamicInjection){
		$this->DynamicInjection = $DynamicInjection;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setIntramucosalBlebs($IntramucosalBlebs){
		$this->IntramucosalBlebs = $IntramucosalBlebs;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setIntramucosalBlebsTreatment($IntramucosalBlebsTreatment){
		$this->IntramucosalBlebsTreatment = $IntramucosalBlebsTreatment;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setLifting($Lifting){
		$this->Lifting = $Lifting;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setStopInjection($StopInjection){
		$this->StopInjection = $StopInjection;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAppropriateLift($AppropriateLift){
		$this->AppropriateLift = $AppropriateLift;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setNarrowSegment($NarrowSegment){
		$this->NarrowSegment = $NarrowSegment;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAppropriateSnare($AppropriateSnare){
		$this->AppropriateSnare = $AppropriateSnare;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAppropriateSize($AppropriateSize){
		$this->AppropriateSize = $AppropriateSize;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setStartsAtTheEdge($StartsAtTheEdge){
		$this->StartsAtTheEdge = $StartsAtTheEdge;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setLongAxis($LongAxis){
		$this->LongAxis = $LongAxis;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAspiration($Aspiration){
		$this->Aspiration = $Aspiration;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setTipVisualisation($TipVisualisation){
		$this->TipVisualisation = $TipVisualisation;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setStopClosureSnare($StopClosureSnare){
		$this->StopClosureSnare = $StopClosureSnare;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setEndoscopistSnare($EndoscopistSnare){
		$this->EndoscopistSnare = $EndoscopistSnare;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setSnareClosure($SnareClosure){
		$this->SnareClosure = $SnareClosure;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setTissueMobility($TissueMobility){
		$this->TissueMobility = $TissueMobility;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setTactileFeedback($TactileFeedback){
		$this->TactileFeedback = $TactileFeedback;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setGoodResection_Piecemeal($GoodResection_Piecemeal){
		$this->GoodResection_Piecemeal = $GoodResection_Piecemeal;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setGoodResection_EnBloc($GoodResection_EnBloc){
		$this->GoodResection_EnBloc = $GoodResection_EnBloc;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setSpeedOfClosure($SpeedOfClosure){
		$this->SpeedOfClosure = $SpeedOfClosure;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setColdSnare($ColdSnare){
		$this->ColdSnare = $ColdSnare;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setCorrectSettingsEnsured($CorrectSettingsEnsured){
		$this->CorrectSettingsEnsured = $CorrectSettingsEnsured;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setStablePosition($StablePosition){
		$this->StablePosition = $StablePosition;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setCheckHaemostatics($CheckHaemostatics){
		$this->CheckHaemostatics = $CheckHaemostatics;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setUsesDistension($UsesDistension){
		$this->UsesDistension = $UsesDistension;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setMobilityChecks($MobilityChecks){
		$this->MobilityChecks = $MobilityChecks;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setDiathermyApplication($DiathermyApplication){
		$this->DiathermyApplication = $DiathermyApplication;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setStopsIfNoTransection($StopsIfNoTransection){
		$this->StopsIfNoTransection = $StopsIfNoTransection;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setStopDiathermy($StopDiathermy){
		$this->StopDiathermy = $StopDiathermy;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setNLA($NLA){
		$this->NLA = $NLA;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setNLATreatment($NLATreatment){
		$this->NLATreatment = $NLATreatment;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setSecondLine($SecondLine){
		$this->SecondLine = $SecondLine;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setIPB($IPB){
		$this->IPB = $IPB;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setCauseOfBleedingIdentified($CauseOfBleedingIdentified){
		$this->CauseOfBleedingIdentified = $CauseOfBleedingIdentified;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setPatientPosition($PatientPosition){
		$this->PatientPosition = $PatientPosition;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setMildBleeding($MildBleeding){
		$this->MildBleeding = $MildBleeding;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setSTSCNeeded($STSCNeeded){
		$this->STSCNeeded = $STSCNeeded;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setSTSC($STSC){
		$this->STSC = $STSC;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setCoag($Coag){
		$this->Coag = $Coag;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setCoagForceps($CoagForceps){
		$this->CoagForceps = $CoagForceps;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setSevereBleeding($SevereBleeding){
		$this->SevereBleeding = $SevereBleeding;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setNotControlledBleeding($NotControlledBleeding){
		$this->NotControlledBleeding = $NotControlledBleeding;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setNotControlledBleeding_1($NotControlledBleeding_1){
		$this->NotControlledBleeding_1 = $NotControlledBleeding_1;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setCompleteBleedingControl($CompleteBleedingControl){
		$this->CompleteBleedingControl = $CompleteBleedingControl;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setPerforation($Perforation){
		$this->Perforation = $Perforation;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setSydneyDMIScore($SydneyDMIScore){
		$this->SydneyDMIScore = $SydneyDMIScore;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setClosureRequired($ClosureRequired){
		$this->ClosureRequired = $ClosureRequired;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setPriorClosure($PriorClosure){
		$this->PriorClosure = $PriorClosure;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setClipUses($ClipUses){
		$this->ClipUses = $ClipUses;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setTTSTechnique($TTSTechnique){
		$this->TTSTechnique = $TTSTechnique;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setTTSNotUsed($TTSNotUsed){
		$this->TTSNotUsed = $TTSNotUsed;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setOTSCTechnique($OTSCTechnique){
		$this->OTSCTechnique = $OTSCTechnique;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setCompleteClosure($CompleteClosure){
		$this->CompleteClosure = $CompleteClosure;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAntibioticsPostPerf($AntibioticsPostPerf){
		$this->AntibioticsPostPerf = $AntibioticsPostPerf;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setCtscan($Ctscan){
		$this->Ctscan = $Ctscan;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setSurgicalReview($SurgicalReview){
		$this->SurgicalReview = $SurgicalReview;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setDifficultAccess($DifficultAccess){
		$this->DifficultAccess = $DifficultAccess;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setPosition($Position){
		$this->Position = $Position;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setScopeChanged($ScopeChanged){
		$this->ScopeChanged = $ScopeChanged;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setCapUsed($CapUsed){
		$this->CapUsed = $CapUsed;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAntispasmodicsUsed($AntispasmodicsUsed){
		$this->AntispasmodicsUsed = $AntispasmodicsUsed;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setRetroflexionv2($Retroflexionv2){
		$this->Retroflexionv2 = $Retroflexionv2;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setExternalPressure($ExternalPressure){
		$this->ExternalPressure = $ExternalPressure;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setHoldTheScope($HoldTheScope){
		$this->HoldTheScope = $HoldTheScope;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setICV($ICV){
		$this->ICV = $ICV;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAppendicealOrfice($AppendicealOrfice){
		$this->AppendicealOrfice = $AppendicealOrfice;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAnorectalJunction($AnorectalJunction){
		$this->AnorectalJunction = $AnorectalJunction;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setDefectInspection($DefectInspection){
		$this->DefectInspection = $DefectInspection;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setChromoendoscopy($Chromoendoscopy){
		$this->Chromoendoscopy = $Chromoendoscopy;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setMargin($Margin){
		$this->Margin = $Margin;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setPolypTissueRemoved($PolypTissueRemoved){
		$this->PolypTissueRemoved = $PolypTissueRemoved;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setSubmucosaInspected($SubmucosaInspected){
		$this->SubmucosaInspected = $SubmucosaInspected;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setFibrosis($Fibrosis){
		$this->Fibrosis = $Fibrosis;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setMPInspection($MPInspection){
		$this->MPInspection = $MPInspection;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setMPDescription($MPDescription){
		$this->MPDescription = $MPDescription;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setNonStainedSM($NonStainedSM){
		$this->NonStainedSM = $NonStainedSM;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setUncertainty($Uncertainty){
		$this->Uncertainty = $Uncertainty;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setPhotodocumentation($Photodocumentation){
		$this->Photodocumentation = $Photodocumentation;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setMarginTreatment($MarginTreatment){
		$this->MarginTreatment = $MarginTreatment;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setSTSCTechnique($STSCTechnique){
		$this->STSCTechnique = $STSCTechnique;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setAPCTechnique($APCTechnique){
		$this->APCTechnique = $APCTechnique;
	}

    /**
     * Close mysql connection
     */
	public function endPolypectomyAssessmentTool(){
		$this->connection->CloseMysql();
	}

}