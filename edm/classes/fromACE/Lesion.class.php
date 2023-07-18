<?php
/*
 * Author: David Tate
 *
 * Create Date: 8-03-2018
 *
 * Version of MYSQL_to_PHP: 1.1
 *
 *
 */
 
 (1);
 
require_once 'DataBaseMysql.class.php';

class Lesion {

	private $_k_lesion; //int(10)
	private $_k_procedure; //int(7)
	private $PreviousAttempt; //int(2)
	private $PreviousBiopsy; //int(2)
	private $PreviousSPOT; //int(2)
	private $IntendedProcedure; //int(10)
	private $ActualPredominantProcedure; //int(10)
	private $Size; //int(4)
	private $Location; //int(2)
	private $Paris; //int(2)
	private $Morphology; //int(2)
	private $HighestKudo; //int(2)
	private $HighestSano; //int(2)
	private $Predict_Cancer; //int(2)
	private $Predict_Histo; //tinyint(2)
	private $Predict_Histo_Confidence; //tinyint(2)
	private $Feat_Invasion; //int(2)
	private $EnBloc; //int(2)
	private $Access; //int(2)
	private $EMRAttempted; //int(2)
	private $SMInjection; //int(2)
	private $Constituent; //int(2)
	private $Constituent_other; //varchar(80)
	private $Adrenaline; //int(2)
	private $Dye; //int(2)
	private $No_Injection; //int(2)
	private $Lifting; //int(2)
	private $SnareType; //int(2)
	private $SnareSize; //int(2)
	private $EndoscopeCapUsed; //int(10)
	private $Current; //int(2)
	private $No_Pieces; //int(2)
	private $SnareExcision; //int(2)
	private $AddModality; //int(2)
	private $SuccessfulEMR; //int(2)
	private $STSC_Margin; //tinyint(2)
	private $SCAR_complete; //int(2)
	private $DefectTattoo; //int(10)
	private $BookTwoStage; //int(2)
	private $IPBleed; //int(2)
	private $IPBleed_Control; //int(2)
	private $SMF; //int(2)
	private $SMF_Fgrade; //int(10)
	private $SMF_Prediction; //int(10)
	private $SMF_Prediction_confidence; //int(10)
	private $CentralSMF; //varchar(10)
	private $FibrosisCancerRisk; //varchar(10)
	private $ProcedureStoppedCancer; //varchar(10)
	private $OverlyingFold; //varchar(10)
	private $FibrosisofSignificance; //varchar(250)
	private $DeepInjury; //tinyint(2)
	private $IPPerforation; //int(2)
	private $IPPerforation_Rx; //int(2)
	private $Defect_Clip_Closure; //tinyint(3)
	private $Defect_Clip_Closure_Number; //varchar(80)
	private $Duration; //int(5)
	private $DurationComplication; //varchar(100)
	private $HistoPathMajor; //int(2)
	private $Cancer; //int(2)
	private $Dysplasia; //int(2)
	private $SMInvasion; //int(2)
	private $Margins; //int(2)
	private $SpecimenSize; //varchar(80)
	private $DelayedBleed; //int(2)
	private $DelayedBleed_Admit; //int(2)
	private $DelayedBleed_Colon; //int(2)
	private $DelayedPerforation; //int(2)
	private $DelayedPerforation_Rx; //int(2)
	private $Disposition2Weeks; //int(2)
	private $FollowUp2Weeks; //int(2)
	private $SurgReferral; //int(2)
	private $FirstFU; //int(2)
	private $FirstFUMonths; //tinyint(4)
	private $FirstFUDate; //date
	private $FirstFURecurrence; //tinyint(4)
	private $FirstFUNoRecurScarBx; //tinyint(3)
	private $FirstFURecurrenceSites; //tinyint(4)
	private $FirstFURecurrenceLocation; //tinyint(4)
	private $FirstFURecurrenceLargest; //tinyint(4)
	private $FirstFURecurrenceRx; //tinyint(4)
	private $FirstFURecurrenceExcision; //tinyint(4)
	private $FirstFURecurrenceNotes; //varchar(80)
	private $FirstFURecurHisto; //int(2)
	private $FirstFURecurHistoDysplasia; //int(2)
	private $FirstFUNextColon_Mths; //varchar(80)
	private $FirstFUOutcome; //int(2)
	private $FirstFUDisposition; //int(2)
	private $FirstFUSurgery; //tinyint(3)
	private $FirstFUSurgeryMethod; //int(2)
	private $FirstFUSurgeryResidual; //int(2)
	private $FirstFUSurgeryType; //int(2)
	private $FirstFUSurgeryNotes; //varchar(80)
	private $SecondFU; //tinyint(3)
	private $SecondFUMonths; //int(3)
	private $SecondFUDate; //date
	private $SecondFURecurrence; //int(3)
	private $SecondFUNoRecurScarBx; //int(2)
	private $SecondFURecurrenceLargest; //int(2)
	private $SecondFURecurrenceLocation; //int(2)
	private $SecondFURecurrenceSites; //int(2)
	private $SecondFUDisposition; //int(2)
	private $SecondFURecurrenceRx; //tinyint(3)
	private $SecondFURecurrenceExcision; //tinyint(3)
	private $SecondFURecurrenceNotes; //varchar(80)
	private $SecondFURecurHistoDysplasia; //tinyint(3)
	private $SecondFUNextColon_Mths; //tinyint(3)
	private $SecondFUOutcome; //tinyint(3)
	private $SecondFUSurgery; //int(2)
	private $SecondFUSurgeryNotes; //varchar(80)
	private $SecondFURecurHisto; //int(2)
	private $SecondFUSurgeryMethod; //int(2)
	private $SecondFUSurgeryResidual; //int(2)
	private $SecondFUSurgeryType; //int(2)
	private $ThirdFU; //int(2)
	private $ThirdFUDate; //date
	private $ThirdFUMonths; //tinyint(3)
	private $ThirdFUDisposition; //int(2)
	private $ThirdFUNoRecurScarBx; //int(2)
	private $ThirdFUOutcome; //int(2)
	private $ThirdFUPostSurgery; //int(2)
	private $ThirdFURecurHisto; //int(2)
	private $ThirdFURecurrence; //int(2)
	private $ThirdFURecurrenceExcision; //int(2)
	private $ThirdFURecurrenceRx; //int(2)
	private $ThirdFURecurrenceSites; //int(2)
	private $ThirdFURecurrenceLocation; //tinyint(3)
	private $ThirdFURecurrenceLargest; //tinyint(3)
	private $ThirdFURecurrenceNotes; //varchar(80)
	private $ThirdFURecurHistoDysplasia; //tinyint(3)
	private $ThirdFUNextColon_Mths; //varchar(80)
	private $ThirdFUSurgeryNotes; //varchar(80)
	private $ThirdFUSurgeryMethod; //int(2)
	private $ThirdFUSurgeryResidual; //int(2)
	private $ThirdFUSurgeryType; //int(2)
	private $FourthFU; //int(2)
	private $FourthFUMonths; //tinyint(3)
	private $FourthFURecurrenceLocation; //tinyint(3)
	private $FourthFURecurrenceLargest; //tinyint(3)
	private $FourthFURecurrenceNotes; //varchar(80)
	private $FourthFURecurHistoDysplasia; //tinyint(3)
	private $FourthFUNextColon_Mnths; //varchar(80)
	private $FourthFUSurgeryResidual; //tinyint(3)
	private $FourthFUDate; //date
	private $FourthFUDisposition; //int(2)
	private $FourthFUNoRecurScarBx; //int(2)
	private $FourthFUOutcome; //int(2)
	private $FourthFUPostSurgery; //int(2)
	private $FourthFURecurHisto; //int(2)
	private $FourthFURecurrence; //int(2)
	private $FourthFURecurrenceExcision; //int(2)
	private $FourthFURecurrenceRx; //int(2)
	private $FourthFURecurrenceSites; //int(2)
	private $FourthFUSurgeryMethod; //int(2)
	private $FourthFUSurgeryNotes; //varchar(1000)
	private $FourthFUSurgeryType; //int(2)
	private $ClinSignificantBleedYN; //int(2)
	private $ClinSignificantPerfYN; //int(2)
	private $SSACharact_Dysplasia; //int(2)
	private $SSACharact_Dysplasia_Confidence; //tinyint(2)
	private $IPPerforation_Clips; //int(2)
	private $NICE_Overall; //int(2)
	private $FirstFURecurrenceClipArtifact; //int(2)
	private $SecondFURecurrenceClipArtifact; //int(2)
	private $ThirdFURecurrenceClipArtifact; //int(2)
	private $FourthFURecurrenceClipArtifact; //int(2)
	private $SERT_size; //int(2)
	private $SERT_ipb; //int(2)
	private $SERT_dysplasia; //int(2)
	private $created; //timestamp
	private $creating_user; //int(10)
	private $updated; //timestamp
	private $updating_user; //int(10)
	private $entrytype; //int(2)
	private $save; //int(10)
	private $consent_PROSPER; //int(2)
	private $inPROSPER; //int(2)
	private $SERT; //int(2)
	private $completeColon_PROSPER; //int(3)
	private $defectTattoo_PROSPER; //int(3)
	private $dateEnrolled_PROSPER; //date
	private $variation_PROSPER; //varchar(8000)
	private $PROSPERSCDue; //date
	private $CLIP_consent; //int(2)
	private $CLIP_preEMRexclusion; //varchar(100)
	private $CLIP_postEMRexclusion; //varchar(100)
	private $CLIP_randomisation; //int(2)
	private $CLIP_category; //int(2)
	private $CLIP_active_closure_complete; //int(2)
	private $CLIP_active_closure_number; //int(2)
	private $CLIP_no_closure_reason; //varchar(80)
	private $CLIP_doppler; //int(2)
	private $CLIP_doppler_signal; //int(2)
	private $CLIP_doppler_signal_location; //int(2)
	private $CLIP_doppler_signal_area_clipped; //int(2)
	private $CLIP_notes; //varchar(8000)
	private $SMSA; //int(3)
	private $ESDType; //int(10)
	private $ESDTraineeID; //int(10)
	private $ESDTrainingCase; //int(10)
	private $ESDTrainingCaseSelfCompleted; //int(10)
	private $ESDTrainingCaseStageTakeoverCompleted; //int(10)
	private $ESDTrainingCaseStageTakeoverReason; //int(10)
	private $ESDTrainingCaseStageTakeoverReasonText; //varchar(400)
	private $ESDhighDefScope; //int(10)
	private $ESDcutCurrent; //int(10)
	private $ESDcutCurrentWatts; //varchar(80)
	private $ESDcutCurrentEffect; //int(10)
	private $ESDcoagCurrent; //int(10)
	private $ESDcoagCurrentEffect; //int(10)
	private $ESDcoagCurrentWatts; //varchar(80)
	private $ESDIPBControl; //int(10)
	private $ESDIPBProphylacticCoag; //int(10)
	private $ESDPocket; //int(10)
	private $ESDaddSnareExcision; //int(10)
	private $ESDnoPieces; //int(10)
	private $ESDknifeType1; //int(10)
	private $ESDknifeType2; //int(10)
	private $ESDflushingPump; //int(10)
	private $ESDtractionTechnique; //int(10)
	private $ESDdurationTotal; //int(10)
	private $ESDdurationIncision; //int(10)
	private $ESDdurationDissection; //int(10)
	private $ESDdurationDefectAssess; //int(10)
	private $ESDlesionRemoved; //int(10)
	private $ESDenblocEndo; //int(10)
	private $ESDdefectMuscleInjury; //int(10)
	private $ESDHistoDimensionx; //int(10)
	private $ESDHistoDimensiony; //int(10)
	private $ESDHistoEnBloc; //int(10)
	private $ESDHistoR0; //int(10)
	private $ESDHistoVM; //int(10)
	private $ESDHistoHM; //int(10)
	private $ESDHistoType; //int(10)
	private $ESDHistoDysplasia; //int(10)
	private $ESDHistoInvasive; //int(10)
	private $ESDHistoSMICDepth; //int(10)
	private $ESDHistoSMICLVI; //int(10)
	private $ESDHistoSMICLVIconfidence; //int(10)
	private $ESDHistoSMICTB; //int(10)
	private $ESDHistoSMICDifferentiation; //int(10)
	private $ESDgeneralnotes; //varchar(400)
	private $ESDSurgeryNotes; //varchar(400)
	private $inCSPEMRRCT; //varchar(10)
	private $Descriptor; //varchar(10)
	private $CSPExcluded; //varchar(10)
	private $CSPExclusionReason;
	private $CSPRandomisation; //varchar(10)
	private $Locationcm; //varchar(10)
	private $LocationSpecific; //varchar(100)
	private $CSPSnare; //varchar(10)
	private $CSPprotrusion; //varchar(10)
	private $CSPMarginbiopsy; //varchar(10)
	private $trainingPercentperformed; //varchar(10)
	private $trainingtakenoverreason; //varchar(10)
	private $trainingtakenoverreason2; //varchar(10)
	private $traineeinjection; //varchar(10)
	private $traineeresection; //varchar(10)
	private $traineestsc; //varchar(10)
	private $traineedefectcheck; //varchar(10)
	private $traineeclip; //varchar(10)
	private $traineespecimenretrieve; //varchar(10)
	private $consultant_agrees_DMI; //varchar(10)
	private $consultantassistancetraining; //varchar(10)
	private $LANS_enrolled; //varchar(10)
	private $LANS_excluded; //varchar(10)
	private $LANS_excludedwhy; //varchar(100)
	private $LANS_indication; //varchar(10)
	private $LANS_prechromokudo_observer1; //varchar(10)
	private $LANS_prechromodemarcatedarea_observer1; //varchar(10)
	private $LANS_prechromosmi_observer1; //varchar(10)
	private $LANS_prechromosmiconfidence_observer1; //varchar(10)
	private $LANS_observer1; //varchar(10)
	private $LANS_observer2; //varchar(10)
	private $LANS_postchromokudo_observer1; //varchar(10)
	private $LANS_postchromosmi_observer1; //varchar(10)
	private $LANS_postchromosmiconfidence_observer1; //varchar(10)
	private $LANS_postchromodemarcatedarea_observer1; //varchar(10)
	private $LANS_prechromokudo_observer2; //varchar(10)
	private $LANS_prechromodemarcatedarea_observer2; //varchar(10)
	private $LANS_prechromosmi_observer2; //varchar(10)
	private $LANS_prechromosmiconfidence_observer2; //varchar(10)
	private $LANS_postchromokudo_observer2; //varchar(10)
	private $LANS_postchromodemarcatedarea_observer2; //varchar(10)
	private $LANS_postchromosmi_observer2; //varchar(10)
	private $LANS_postchromosmiconfidence_observer2; //varchar(10)
	private $LANS_comment; //varchar(300)
	private $IsNumberNodules; //varchar(10)
	private $IsSizeDominantNodule; //varchar(10)
	private $IsNumberNodulesLarger8mm; //varchar(10)
	private $IsLesionInclude; //varchar(10)
	private $LPexcision; //varchar(10)
	private $ICVFat; //varchar(10)
	private $StalkStudy; //varchar(10)
	private $StalkNumber; //varchar(10)
	private $StalkHisto1; //varchar(10)
	private $StalkHisto2; //varchar(10)
	private $Significant_pain_requiring_control_PAIN; //varchar(10)
	private $Consent_pain; //varchar(10)
	private $TempAtEntry_PAIN; //varchar(10)
	private $TempAtPain_PAIN; //varchar(10)
	private $TempAtExit_PAIN; //varchar(10)
	private $VASAtEntry_PAIN; //varchar(10)
	private $VasAtPain_PAIN; //varchar(10)
	private $VASAtExit_PAIN; //varchar(10)
	private $Length_of_pain_PAIN; //varchar(10)
	private $Time_to_pain_PAIN; //varchar(10)
	private $Intervention_Conservative_1_PAIN; //varchar(10)
	private $Intervention2_PAIN; //varchar(10)
	private $Intervention_Conservative_2_PAIN; //varchar(10)
	private $Intervention_Non_Conservative_1_PAIN; //varchar(10)
	private $Investigation_findings_PAIN; //varchar(400)
	private $Surgery_findings_PAIN; //varchar(400)
	private $Extended_recovery_PAIN; //varchar(10)
	private $Propofol_PAIN; //varchar(10)
	private $Fentanyl_PAIN; //varchar(10)
	private $Buscopan_PAIN; //varchar(10)
	private $Glucagon_PAIN; //varchar(10)
	private $Paracetemol_PAIN; //varchar(10)
	private $Intraprocedural_paracetemol_Number_PAIN; //varchar(10)
	private $Anaesthetic_PAIN; //varchar(10)
	private $Paracetemol_post_PAIN; //varchar(10)
	private $Fentanyl_post_PAIN; //varchar(10)
	private $Other_post_PAIN; //varchar(10)
	private $Opiod_painkiller; //varchar(100)
	private $TimeinRoomPAIN; //time
	private $TimeinRecoveryPAIN; //time
	private $TimeinProcedurePAIN; //time
	private $TimeinParacetemolPAIN; //time
	private $TimeinFentanylPAIN; //time
	private $TimeNoFurtherPainPAIN; //time
	private $Timein2ndStagePAIN; //time
	private $TimeinExitPAIN; //time
	private $ARJRopivPAINandLESION; //varchar(10)
	private $connection;

	public function Lesion(){
		$this->connection = new DataBaseMysql();
	}

	/**
	 * New object to the class. Don¥t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
	 *
	 */
	public function New_Lesion($_k_procedure,$PreviousAttempt,$PreviousBiopsy,$PreviousSPOT,$IntendedProcedure,$ActualPredominantProcedure,$Size,$Location,$Paris,$Morphology,$HighestKudo,$HighestSano,$Predict_Cancer,$Predict_Histo,$Predict_Histo_Confidence,$Feat_Invasion,$EnBloc,$Access,$EMRAttempted,$SMInjection,$Constituent,$Constituent_other,$Adrenaline,$Dye,$No_Injection,$Lifting,$SnareType,$SnareSize,$EndoscopeCapUsed,$Current,$No_Pieces,$SnareExcision,$AddModality,$SuccessfulEMR,$STSC_Margin,$SCAR_complete,$DefectTattoo,$BookTwoStage,$IPBleed,$IPBleed_Control,$SMF,$SMF_Fgrade,$SMF_Prediction,$SMF_Prediction_confidence,$CentralSMF,$FibrosisCancerRisk,$ProcedureStoppedCancer,$OverlyingFold,$FibrosisofSignificance,$DeepInjury,$IPPerforation,$IPPerforation_Rx,$Defect_Clip_Closure,$Defect_Clip_Closure_Number,$Duration,$DurationComplication,$HistoPathMajor,$Cancer,$Dysplasia,$SMInvasion,$Margins,$SpecimenSize,$DelayedBleed,$DelayedBleed_Admit,$DelayedBleed_Colon,$DelayedPerforation,$DelayedPerforation_Rx,$Disposition2Weeks,$FollowUp2Weeks,$SurgReferral,$FirstFU,$FirstFUMonths,$FirstFUDate,$FirstFURecurrence,$FirstFUNoRecurScarBx,$FirstFURecurrenceSites,$FirstFURecurrenceLocation,$FirstFURecurrenceLargest,$FirstFURecurrenceRx,$FirstFURecurrenceExcision,$FirstFURecurrenceNotes,$FirstFURecurHisto,$FirstFURecurHistoDysplasia,$FirstFUNextColon_Mths,$FirstFUOutcome,$FirstFUDisposition,$FirstFUSurgery,$FirstFUSurgeryMethod,$FirstFUSurgeryResidual,$FirstFUSurgeryType,$FirstFUSurgeryNotes,$SecondFU,$SecondFUMonths,$SecondFUDate,$SecondFURecurrence,$SecondFUNoRecurScarBx,$SecondFURecurrenceLargest,$SecondFURecurrenceLocation,$SecondFURecurrenceSites,$SecondFUDisposition,$SecondFURecurrenceRx,$SecondFURecurrenceExcision,$SecondFURecurrenceNotes,$SecondFURecurHistoDysplasia,$SecondFUNextColon_Mths,$SecondFUOutcome,$SecondFUSurgery,$SecondFUSurgeryNotes,$SecondFURecurHisto,$SecondFUSurgeryMethod,$SecondFUSurgeryResidual,$SecondFUSurgeryType,$ThirdFU,$ThirdFUDate,$ThirdFUMonths,$ThirdFUDisposition,$ThirdFUNoRecurScarBx,$ThirdFUOutcome,$ThirdFUPostSurgery,$ThirdFURecurHisto,$ThirdFURecurrence,$ThirdFURecurrenceExcision,$ThirdFURecurrenceRx,$ThirdFURecurrenceSites,$ThirdFURecurrenceLocation,$ThirdFURecurrenceLargest,$ThirdFURecurrenceNotes,$ThirdFURecurHistoDysplasia,$ThirdFUNextColon_Mths,$ThirdFUSurgeryNotes,$ThirdFUSurgeryMethod,$ThirdFUSurgeryResidual,$ThirdFUSurgeryType,$FourthFU,$FourthFUMonths,$FourthFURecurrenceLocation,$FourthFURecurrenceLargest,$FourthFURecurrenceNotes,$FourthFURecurHistoDysplasia,$FourthFUNextColon_Mnths,$FourthFUSurgeryResidual,$FourthFUDate,$FourthFUDisposition,$FourthFUNoRecurScarBx,$FourthFUOutcome,$FourthFUPostSurgery,$FourthFURecurHisto,$FourthFURecurrence,$FourthFURecurrenceExcision,$FourthFURecurrenceRx,$FourthFURecurrenceSites,$FourthFUSurgeryMethod,$FourthFUSurgeryNotes,$FourthFUSurgeryType,$ClinSignificantBleedYN,$ClinSignificantPerfYN,$SSACharact_Dysplasia,$SSACharact_Dysplasia_Confidence,$IPPerforation_Clips,$NICE_Overall,$FirstFURecurrenceClipArtifact,$SecondFURecurrenceClipArtifact,$ThirdFURecurrenceClipArtifact,$FourthFURecurrenceClipArtifact,$SERT_size,$SERT_ipb,$SERT_dysplasia,$created,$creating_user,$updated,$updating_user,$entrytype,$save,$consent_PROSPER,$inPROSPER,$SERT,$completeColon_PROSPER,$defectTattoo_PROSPER,$dateEnrolled_PROSPER,$variation_PROSPER,$PROSPERSCDue,$CLIP_consent,$CLIP_preEMRexclusion,$CLIP_postEMRexclusion,$CLIP_randomisation,$CLIP_category,$CLIP_active_closure_complete,$CLIP_active_closure_number,$CLIP_no_closure_reason,$CLIP_doppler,$CLIP_doppler_signal,$CLIP_doppler_signal_location,$CLIP_doppler_signal_area_clipped,$CLIP_notes,$SMSA,$ESDType,$ESDTraineeID,$ESDTrainingCase,$ESDTrainingCaseSelfCompleted,$ESDTrainingCaseStageTakeoverCompleted,$ESDTrainingCaseStageTakeoverReason,$ESDTrainingCaseStageTakeoverReasonText,$ESDhighDefScope,$ESDcutCurrent,$ESDcutCurrentWatts,$ESDcutCurrentEffect,$ESDcoagCurrent,$ESDcoagCurrentEffect,$ESDcoagCurrentWatts,$ESDIPBControl,$ESDIPBProphylacticCoag,$ESDPocket,$ESDaddSnareExcision,$ESDnoPieces,$ESDknifeType1,$ESDknifeType2,$ESDflushingPump,$ESDtractionTechnique,$ESDdurationTotal,$ESDdurationIncision,$ESDdurationDissection,$ESDdurationDefectAssess,$ESDlesionRemoved,$ESDenblocEndo,$ESDdefectMuscleInjury,$ESDHistoDimensionx,$ESDHistoDimensiony,$ESDHistoEnBloc,$ESDHistoR0,$ESDHistoVM,$ESDHistoHM,$ESDHistoType,$ESDHistoDysplasia,$ESDHistoInvasive,$ESDHistoSMICDepth,$ESDHistoSMICLVI,$ESDHistoSMICLVIconfidence,$ESDHistoSMICTB,$ESDHistoSMICDifferentiation,$ESDgeneralnotes,$ESDSurgeryNotes,$inCSPEMRRCT,$Descriptor,$CSPExcluded,$CSPExclusionReason, $CSPRandomisation,$Locationcm,$LocationSpecific,$CSPSnare,$CSPprotrusion,$CSPMarginbiopsy,$trainingPercentperformed,$trainingtakenoverreason,$trainingtakenoverreason2,$traineeinjection,$traineeresection,$traineestsc,$traineedefectcheck,$traineeclip,$traineespecimenretrieve,$consultant_agrees_DMI,$consultantassistancetraining,$LANS_enrolled,$LANS_excluded,$LANS_excludedwhy,$LANS_indication,$LANS_prechromokudo_observer1,$LANS_prechromodemarcatedarea_observer1,$LANS_prechromosmi_observer1,$LANS_prechromosmiconfidence_observer1,$LANS_observer1,$LANS_observer2,$LANS_postchromokudo_observer1,$LANS_postchromosmi_observer1,$LANS_postchromosmiconfidence_observer1,$LANS_postchromodemarcatedarea_observer1,$LANS_prechromokudo_observer2,$LANS_prechromodemarcatedarea_observer2,$LANS_prechromosmi_observer2,$LANS_prechromosmiconfidence_observer2,$LANS_postchromokudo_observer2,$LANS_postchromodemarcatedarea_observer2,$LANS_postchromosmi_observer2,$LANS_postchromosmiconfidence_observer2,$LANS_comment,$IsNumberNodules,$IsSizeDominantNodule,$IsNumberNodulesLarger8mm,$IsLesionInclude,$LPexcision,$ICVFat,$StalkStudy,$StalkNumber,$StalkHisto1,$StalkHisto2,$Significant_pain_requiring_control_PAIN,$Consent_pain,$TempAtEntry_PAIN,$TempAtPain_PAIN,$TempAtExit_PAIN,$VASAtEntry_PAIN,$VasAtPain_PAIN,$VASAtExit_PAIN,$Length_of_pain_PAIN,$Time_to_pain_PAIN,$Intervention_Conservative_1_PAIN,$Intervention2_PAIN,$Intervention_Conservative_2_PAIN,$Intervention_Non_Conservative_1_PAIN,$Investigation_findings_PAIN,$Surgery_findings_PAIN,$Extended_recovery_PAIN,$Propofol_PAIN,$Fentanyl_PAIN,$Buscopan_PAIN,$Glucagon_PAIN,$Paracetemol_PAIN,$Intraprocedural_paracetemol_Number_PAIN,$Anaesthetic_PAIN,$Paracetemol_post_PAIN,$Fentanyl_post_PAIN,$Other_post_PAIN,$Opiod_painkiller,$TimeinRoomPAIN,$TimeinRecoveryPAIN,$TimeinProcedurePAIN,$TimeinParacetemolPAIN,$TimeinFentanylPAIN,$TimeNoFurtherPainPAIN,$Timein2ndStagePAIN,$TimeinExitPAIN,$ARJRopivPAINandLESION){
		$this->_k_procedure = $_k_procedure;
		$this->PreviousAttempt = $PreviousAttempt;
		$this->PreviousBiopsy = $PreviousBiopsy;
		$this->PreviousSPOT = $PreviousSPOT;
		$this->IntendedProcedure = $IntendedProcedure;
		$this->ActualPredominantProcedure = $ActualPredominantProcedure;
		$this->Size = $Size;
		$this->Location = $Location;
		$this->Paris = $Paris;
		$this->Morphology = $Morphology;
		$this->HighestKudo = $HighestKudo;
		$this->HighestSano = $HighestSano;
		$this->Predict_Cancer = $Predict_Cancer;
		$this->Predict_Histo = $Predict_Histo;
		$this->Predict_Histo_Confidence = $Predict_Histo_Confidence;
		$this->Feat_Invasion = $Feat_Invasion;
		$this->EnBloc = $EnBloc;
		$this->Access = $Access;
		$this->EMRAttempted = $EMRAttempted;
		$this->SMInjection = $SMInjection;
		$this->Constituent = $Constituent;
		$this->Constituent_other = $Constituent_other;
		$this->Adrenaline = $Adrenaline;
		$this->Dye = $Dye;
		$this->No_Injection = $No_Injection;
		$this->Lifting = $Lifting;
		$this->SnareType = $SnareType;
		$this->SnareSize = $SnareSize;
		$this->EndoscopeCapUsed = $EndoscopeCapUsed;
		$this->Current = $Current;
		$this->No_Pieces = $No_Pieces;
		$this->SnareExcision = $SnareExcision;
		$this->AddModality = $AddModality;
		$this->SuccessfulEMR = $SuccessfulEMR;
		$this->STSC_Margin = $STSC_Margin;
		$this->SCAR_complete = $SCAR_complete;
		$this->DefectTattoo = $DefectTattoo;
		$this->BookTwoStage = $BookTwoStage;
		$this->IPBleed = $IPBleed;
		$this->IPBleed_Control = $IPBleed_Control;
		$this->SMF = $SMF;
		$this->SMF_Fgrade = $SMF_Fgrade;
		$this->SMF_Prediction = $SMF_Prediction;
		$this->SMF_Prediction_confidence = $SMF_Prediction_confidence;
		$this->CentralSMF = $CentralSMF;
		$this->FibrosisCancerRisk = $FibrosisCancerRisk;
		$this->ProcedureStoppedCancer = $ProcedureStoppedCancer;
		$this->OverlyingFold = $OverlyingFold;
		$this->FibrosisofSignificance = $FibrosisofSignificance;
		$this->DeepInjury = $DeepInjury;
		$this->IPPerforation = $IPPerforation;
		$this->IPPerforation_Rx = $IPPerforation_Rx;
		$this->Defect_Clip_Closure = $Defect_Clip_Closure;
		$this->Defect_Clip_Closure_Number = $Defect_Clip_Closure_Number;
		$this->Duration = $Duration;
		$this->DurationComplication = $DurationComplication;
		$this->HistoPathMajor = $HistoPathMajor;
		$this->Cancer = $Cancer;
		$this->Dysplasia = $Dysplasia;
		$this->SMInvasion = $SMInvasion;
		$this->Margins = $Margins;
		$this->SpecimenSize = $SpecimenSize;
		$this->DelayedBleed = $DelayedBleed;
		$this->DelayedBleed_Admit = $DelayedBleed_Admit;
		$this->DelayedBleed_Colon = $DelayedBleed_Colon;
		$this->DelayedPerforation = $DelayedPerforation;
		$this->DelayedPerforation_Rx = $DelayedPerforation_Rx;
		$this->Disposition2Weeks = $Disposition2Weeks;
		$this->FollowUp2Weeks = $FollowUp2Weeks;
		$this->SurgReferral = $SurgReferral;
		$this->FirstFU = $FirstFU;
		$this->FirstFUMonths = $FirstFUMonths;
		$this->FirstFUDate = $FirstFUDate;
		$this->FirstFURecurrence = $FirstFURecurrence;
		$this->FirstFUNoRecurScarBx = $FirstFUNoRecurScarBx;
		$this->FirstFURecurrenceSites = $FirstFURecurrenceSites;
		$this->FirstFURecurrenceLocation = $FirstFURecurrenceLocation;
		$this->FirstFURecurrenceLargest = $FirstFURecurrenceLargest;
		$this->FirstFURecurrenceRx = $FirstFURecurrenceRx;
		$this->FirstFURecurrenceExcision = $FirstFURecurrenceExcision;
		$this->FirstFURecurrenceNotes = $FirstFURecurrenceNotes;
		$this->FirstFURecurHisto = $FirstFURecurHisto;
		$this->FirstFURecurHistoDysplasia = $FirstFURecurHistoDysplasia;
		$this->FirstFUNextColon_Mths = $FirstFUNextColon_Mths;
		$this->FirstFUOutcome = $FirstFUOutcome;
		$this->FirstFUDisposition = $FirstFUDisposition;
		$this->FirstFUSurgery = $FirstFUSurgery;
		$this->FirstFUSurgeryMethod = $FirstFUSurgeryMethod;
		$this->FirstFUSurgeryResidual = $FirstFUSurgeryResidual;
		$this->FirstFUSurgeryType = $FirstFUSurgeryType;
		$this->FirstFUSurgeryNotes = $FirstFUSurgeryNotes;
		$this->SecondFU = $SecondFU;
		$this->SecondFUMonths = $SecondFUMonths;
		$this->SecondFUDate = $SecondFUDate;
		$this->SecondFURecurrence = $SecondFURecurrence;
		$this->SecondFUNoRecurScarBx = $SecondFUNoRecurScarBx;
		$this->SecondFURecurrenceLargest = $SecondFURecurrenceLargest;
		$this->SecondFURecurrenceLocation = $SecondFURecurrenceLocation;
		$this->SecondFURecurrenceSites = $SecondFURecurrenceSites;
		$this->SecondFUDisposition = $SecondFUDisposition;
		$this->SecondFURecurrenceRx = $SecondFURecurrenceRx;
		$this->SecondFURecurrenceExcision = $SecondFURecurrenceExcision;
		$this->SecondFURecurrenceNotes = $SecondFURecurrenceNotes;
		$this->SecondFURecurHistoDysplasia = $SecondFURecurHistoDysplasia;
		$this->SecondFUNextColon_Mths = $SecondFUNextColon_Mths;
		$this->SecondFUOutcome = $SecondFUOutcome;
		$this->SecondFUSurgery = $SecondFUSurgery;
		$this->SecondFUSurgeryNotes = $SecondFUSurgeryNotes;
		$this->SecondFURecurHisto = $SecondFURecurHisto;
		$this->SecondFUSurgeryMethod = $SecondFUSurgeryMethod;
		$this->SecondFUSurgeryResidual = $SecondFUSurgeryResidual;
		$this->SecondFUSurgeryType = $SecondFUSurgeryType;
		$this->ThirdFU = $ThirdFU;
		$this->ThirdFUDate = $ThirdFUDate;
		$this->ThirdFUMonths = $ThirdFUMonths;
		$this->ThirdFUDisposition = $ThirdFUDisposition;
		$this->ThirdFUNoRecurScarBx = $ThirdFUNoRecurScarBx;
		$this->ThirdFUOutcome = $ThirdFUOutcome;
		$this->ThirdFUPostSurgery = $ThirdFUPostSurgery;
		$this->ThirdFURecurHisto = $ThirdFURecurHisto;
		$this->ThirdFURecurrence = $ThirdFURecurrence;
		$this->ThirdFURecurrenceExcision = $ThirdFURecurrenceExcision;
		$this->ThirdFURecurrenceRx = $ThirdFURecurrenceRx;
		$this->ThirdFURecurrenceSites = $ThirdFURecurrenceSites;
		$this->ThirdFURecurrenceLocation = $ThirdFURecurrenceLocation;
		$this->ThirdFURecurrenceLargest = $ThirdFURecurrenceLargest;
		$this->ThirdFURecurrenceNotes = $ThirdFURecurrenceNotes;
		$this->ThirdFURecurHistoDysplasia = $ThirdFURecurHistoDysplasia;
		$this->ThirdFUNextColon_Mths = $ThirdFUNextColon_Mths;
		$this->ThirdFUSurgeryNotes = $ThirdFUSurgeryNotes;
		$this->ThirdFUSurgeryMethod = $ThirdFUSurgeryMethod;
		$this->ThirdFUSurgeryResidual = $ThirdFUSurgeryResidual;
		$this->ThirdFUSurgeryType = $ThirdFUSurgeryType;
		$this->FourthFU = $FourthFU;
		$this->FourthFUMonths = $FourthFUMonths;
		$this->FourthFURecurrenceLocation = $FourthFURecurrenceLocation;
		$this->FourthFURecurrenceLargest = $FourthFURecurrenceLargest;
		$this->FourthFURecurrenceNotes = $FourthFURecurrenceNotes;
		$this->FourthFURecurHistoDysplasia = $FourthFURecurHistoDysplasia;
		$this->FourthFUNextColon_Mnths = $FourthFUNextColon_Mnths;
		$this->FourthFUSurgeryResidual = $FourthFUSurgeryResidual;
		$this->FourthFUDate = $FourthFUDate;
		$this->FourthFUDisposition = $FourthFUDisposition;
		$this->FourthFUNoRecurScarBx = $FourthFUNoRecurScarBx;
		$this->FourthFUOutcome = $FourthFUOutcome;
		$this->FourthFUPostSurgery = $FourthFUPostSurgery;
		$this->FourthFURecurHisto = $FourthFURecurHisto;
		$this->FourthFURecurrence = $FourthFURecurrence;
		$this->FourthFURecurrenceExcision = $FourthFURecurrenceExcision;
		$this->FourthFURecurrenceRx = $FourthFURecurrenceRx;
		$this->FourthFURecurrenceSites = $FourthFURecurrenceSites;
		$this->FourthFUSurgeryMethod = $FourthFUSurgeryMethod;
		$this->FourthFUSurgeryNotes = $FourthFUSurgeryNotes;
		$this->FourthFUSurgeryType = $FourthFUSurgeryType;
		$this->ClinSignificantBleedYN = $ClinSignificantBleedYN;
		$this->ClinSignificantPerfYN = $ClinSignificantPerfYN;
		$this->SSACharact_Dysplasia = $SSACharact_Dysplasia;
		$this->SSACharact_Dysplasia_Confidence = $SSACharact_Dysplasia_Confidence;
		$this->IPPerforation_Clips = $IPPerforation_Clips;
		$this->NICE_Overall = $NICE_Overall;
		$this->FirstFURecurrenceClipArtifact = $FirstFURecurrenceClipArtifact;
		$this->SecondFURecurrenceClipArtifact = $SecondFURecurrenceClipArtifact;
		$this->ThirdFURecurrenceClipArtifact = $ThirdFURecurrenceClipArtifact;
		$this->FourthFURecurrenceClipArtifact = $FourthFURecurrenceClipArtifact;
		$this->SERT_size = $SERT_size;
		$this->SERT_ipb = $SERT_ipb;
		$this->SERT_dysplasia = $SERT_dysplasia;
		$this->created = $created;
		$this->creating_user = $creating_user;
		$this->updated = $updated;
		$this->updating_user = $updating_user;
		$this->entrytype = $entrytype;
		$this->save = $save;
		$this->consent_PROSPER = $consent_PROSPER;
		$this->inPROSPER = $inPROSPER;
		$this->SERT = $SERT;
		$this->completeColon_PROSPER = $completeColon_PROSPER;
		$this->defectTattoo_PROSPER = $defectTattoo_PROSPER;
		$this->dateEnrolled_PROSPER = $dateEnrolled_PROSPER;
		$this->variation_PROSPER = $variation_PROSPER;
		$this->PROSPERSCDue = $PROSPERSCDue;
		$this->CLIP_consent = $CLIP_consent;
		$this->CLIP_preEMRexclusion = $CLIP_preEMRexclusion;
		$this->CLIP_postEMRexclusion = $CLIP_postEMRexclusion;
		$this->CLIP_randomisation = $CLIP_randomisation;
		$this->CLIP_category = $CLIP_category;
		$this->CLIP_active_closure_complete = $CLIP_active_closure_complete;
		$this->CLIP_active_closure_number = $CLIP_active_closure_number;
		$this->CLIP_no_closure_reason = $CLIP_no_closure_reason;
		$this->CLIP_doppler = $CLIP_doppler;
		$this->CLIP_doppler_signal = $CLIP_doppler_signal;
		$this->CLIP_doppler_signal_location = $CLIP_doppler_signal_location;
		$this->CLIP_doppler_signal_area_clipped = $CLIP_doppler_signal_area_clipped;
		$this->CLIP_notes = $CLIP_notes;
		$this->SMSA = $SMSA;
		$this->ESDType = $ESDType;
		$this->ESDTraineeID = $ESDTraineeID;
		$this->ESDTrainingCase = $ESDTrainingCase;
		$this->ESDTrainingCaseSelfCompleted = $ESDTrainingCaseSelfCompleted;
		$this->ESDTrainingCaseStageTakeoverCompleted = $ESDTrainingCaseStageTakeoverCompleted;
		$this->ESDTrainingCaseStageTakeoverReason = $ESDTrainingCaseStageTakeoverReason;
		$this->ESDTrainingCaseStageTakeoverReasonText = $ESDTrainingCaseStageTakeoverReasonText;
		$this->ESDhighDefScope = $ESDhighDefScope;
		$this->ESDcutCurrent = $ESDcutCurrent;
		$this->ESDcutCurrentWatts = $ESDcutCurrentWatts;
		$this->ESDcutCurrentEffect = $ESDcutCurrentEffect;
		$this->ESDcoagCurrent = $ESDcoagCurrent;
		$this->ESDcoagCurrentEffect = $ESDcoagCurrentEffect;
		$this->ESDcoagCurrentWatts = $ESDcoagCurrentWatts;
		$this->ESDIPBControl = $ESDIPBControl;
		$this->ESDIPBProphylacticCoag = $ESDIPBProphylacticCoag;
		$this->ESDPocket = $ESDPocket;
		$this->ESDaddSnareExcision = $ESDaddSnareExcision;
		$this->ESDnoPieces = $ESDnoPieces;
		$this->ESDknifeType1 = $ESDknifeType1;
		$this->ESDknifeType2 = $ESDknifeType2;
		$this->ESDflushingPump = $ESDflushingPump;
		$this->ESDtractionTechnique = $ESDtractionTechnique;
		$this->ESDdurationTotal = $ESDdurationTotal;
		$this->ESDdurationIncision = $ESDdurationIncision;
		$this->ESDdurationDissection = $ESDdurationDissection;
		$this->ESDdurationDefectAssess = $ESDdurationDefectAssess;
		$this->ESDlesionRemoved = $ESDlesionRemoved;
		$this->ESDenblocEndo = $ESDenblocEndo;
		$this->ESDdefectMuscleInjury = $ESDdefectMuscleInjury;
		$this->ESDHistoDimensionx = $ESDHistoDimensionx;
		$this->ESDHistoDimensiony = $ESDHistoDimensiony;
		$this->ESDHistoEnBloc = $ESDHistoEnBloc;
		$this->ESDHistoR0 = $ESDHistoR0;
		$this->ESDHistoVM = $ESDHistoVM;
		$this->ESDHistoHM = $ESDHistoHM;
		$this->ESDHistoType = $ESDHistoType;
		$this->ESDHistoDysplasia = $ESDHistoDysplasia;
		$this->ESDHistoInvasive = $ESDHistoInvasive;
		$this->ESDHistoSMICDepth = $ESDHistoSMICDepth;
		$this->ESDHistoSMICLVI = $ESDHistoSMICLVI;
		$this->ESDHistoSMICLVIconfidence = $ESDHistoSMICLVIconfidence;
		$this->ESDHistoSMICTB = $ESDHistoSMICTB;
		$this->ESDHistoSMICDifferentiation = $ESDHistoSMICDifferentiation;
		$this->ESDgeneralnotes = $ESDgeneralnotes;
		$this->ESDSurgeryNotes = $ESDSurgeryNotes;
		$this->inCSPEMRRCT = $inCSPEMRRCT;
		$this->Descriptor = $Descriptor;
		$this->CSPExcluded = $CSPExcluded;
		$this->CSPExclusionReason = $CSPExclusionReason;
		$this->CSPRandomisation = $CSPRandomisation;
		$this->Locationcm = $Locationcm;
		$this->LocationSpecific = $LocationSpecific;
		$this->CSPSnare = $CSPSnare;
		$this->CSPprotrusion = $CSPprotrusion;
		$this->CSPMarginbiopsy = $CSPMarginbiopsy;
		$this->trainingPercentperformed = $trainingPercentperformed;
		$this->trainingtakenoverreason = $trainingtakenoverreason;
		$this->trainingtakenoverreason2 = $trainingtakenoverreason2;
		$this->traineeinjection = $traineeinjection;
		$this->traineeresection = $traineeresection;
		$this->traineestsc = $traineestsc;
		$this->traineedefectcheck = $traineedefectcheck;
		$this->traineeclip = $traineeclip;
		$this->traineespecimenretrieve = $traineespecimenretrieve;
		$this->consultant_agrees_DMI = $consultant_agrees_DMI;
		$this->consultantassistancetraining = $consultantassistancetraining;
		$this->LANS_enrolled = $LANS_enrolled;
		$this->LANS_excluded = $LANS_excluded;
		$this->LANS_excludedwhy = $LANS_excludedwhy;
		$this->LANS_indication = $LANS_indication;
		$this->LANS_prechromokudo_observer1 = $LANS_prechromokudo_observer1;
		$this->LANS_prechromodemarcatedarea_observer1 = $LANS_prechromodemarcatedarea_observer1;
		$this->LANS_prechromosmi_observer1 = $LANS_prechromosmi_observer1;
		$this->LANS_prechromosmiconfidence_observer1 = $LANS_prechromosmiconfidence_observer1;
		$this->LANS_observer1 = $LANS_observer1;
		$this->LANS_observer2 = $LANS_observer2;
		$this->LANS_postchromokudo_observer1 = $LANS_postchromokudo_observer1;
		$this->LANS_postchromosmi_observer1 = $LANS_postchromosmi_observer1;
		$this->LANS_postchromosmiconfidence_observer1 = $LANS_postchromosmiconfidence_observer1;
		$this->LANS_postchromodemarcatedarea_observer1 = $LANS_postchromodemarcatedarea_observer1;
		$this->LANS_prechromokudo_observer2 = $LANS_prechromokudo_observer2;
		$this->LANS_prechromodemarcatedarea_observer2 = $LANS_prechromodemarcatedarea_observer2;
		$this->LANS_prechromosmi_observer2 = $LANS_prechromosmi_observer2;
		$this->LANS_prechromosmiconfidence_observer2 = $LANS_prechromosmiconfidence_observer2;
		$this->LANS_postchromokudo_observer2 = $LANS_postchromokudo_observer2;
		$this->LANS_postchromodemarcatedarea_observer2 = $LANS_postchromodemarcatedarea_observer2;
		$this->LANS_postchromosmi_observer2 = $LANS_postchromosmi_observer2;
		$this->LANS_postchromosmiconfidence_observer2 = $LANS_postchromosmiconfidence_observer2;
		$this->LANS_comment = $LANS_comment;
		$this->IsNumberNodules = $IsNumberNodules;
		$this->IsSizeDominantNodule = $IsSizeDominantNodule;
		$this->IsNumberNodulesLarger8mm = $IsNumberNodulesLarger8mm;
		$this->IsLesionInclude = $IsLesionInclude;
		$this->LPexcision = $LPexcision;
		$this->ICVFat = $ICVFat;
		$this->StalkStudy = $StalkStudy;
		$this->StalkNumber = $StalkNumber;
		$this->StalkHisto1 = $StalkHisto1;
		$this->StalkHisto2 = $StalkHisto2;
		$this->Significant_pain_requiring_control_PAIN = $Significant_pain_requiring_control_PAIN;
		$this->Consent_pain = $Consent_pain;
		$this->TempAtEntry_PAIN = $TempAtEntry_PAIN;
		$this->TempAtPain_PAIN = $TempAtPain_PAIN;
		$this->TempAtExit_PAIN = $TempAtExit_PAIN;
		$this->VASAtEntry_PAIN = $VASAtEntry_PAIN;
		$this->VasAtPain_PAIN = $VasAtPain_PAIN;
		$this->VASAtExit_PAIN = $VASAtExit_PAIN;
		$this->Length_of_pain_PAIN = $Length_of_pain_PAIN;
		$this->Time_to_pain_PAIN = $Time_to_pain_PAIN;
		$this->Intervention_Conservative_1_PAIN = $Intervention_Conservative_1_PAIN;
		$this->Intervention2_PAIN = $Intervention2_PAIN;
		$this->Intervention_Conservative_2_PAIN = $Intervention_Conservative_2_PAIN;
		$this->Intervention_Non_Conservative_1_PAIN = $Intervention_Non_Conservative_1_PAIN;
		$this->Investigation_findings_PAIN = $Investigation_findings_PAIN;
		$this->Surgery_findings_PAIN = $Surgery_findings_PAIN;
		$this->Extended_recovery_PAIN = $Extended_recovery_PAIN;
		$this->Propofol_PAIN = $Propofol_PAIN;
		$this->Fentanyl_PAIN = $Fentanyl_PAIN;
		$this->Buscopan_PAIN = $Buscopan_PAIN;
		$this->Glucagon_PAIN = $Glucagon_PAIN;
		$this->Paracetemol_PAIN = $Paracetemol_PAIN;
		$this->Intraprocedural_paracetemol_Number_PAIN = $Intraprocedural_paracetemol_Number_PAIN;
		$this->Anaesthetic_PAIN = $Anaesthetic_PAIN;
		$this->Paracetemol_post_PAIN = $Paracetemol_post_PAIN;
		$this->Fentanyl_post_PAIN = $Fentanyl_post_PAIN;
		$this->Other_post_PAIN = $Other_post_PAIN;
		$this->Opiod_painkiller = $Opiod_painkiller;
		$this->TimeinRoomPAIN = $TimeinRoomPAIN;
		$this->TimeinRecoveryPAIN = $TimeinRecoveryPAIN;
		$this->TimeinProcedurePAIN = $TimeinProcedurePAIN;
		$this->TimeinParacetemolPAIN = $TimeinParacetemolPAIN;
		$this->TimeinFentanylPAIN = $TimeinFentanylPAIN;
		$this->TimeNoFurtherPainPAIN = $TimeNoFurtherPainPAIN;
		$this->Timein2ndStagePAIN = $Timein2ndStagePAIN;
		$this->TimeinExitPAIN = $TimeinExitPAIN;
		$this->ARJRopivPAINandLESION = $ARJRopivPAINandLESION;
	}

	/**
	 * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
	 *
	 * @param key_table_type $key_row
	 *
	 */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from Lesion where _k_lesion = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->_k_lesion = $row["_k_lesion"];
			$this->_k_procedure = $row["_k_procedure"];
			$this->PreviousAttempt = $row["PreviousAttempt"];
			$this->PreviousBiopsy = $row["PreviousBiopsy"];
			$this->PreviousSPOT = $row["PreviousSPOT"];
			$this->IntendedProcedure = $row["IntendedProcedure"];
			$this->ActualPredominantProcedure = $row["ActualPredominantProcedure"];
			$this->Size = $row["Size"];
			$this->Location = $row["Location"];
			$this->Paris = $row["Paris"];
			$this->Morphology = $row["Morphology"];
			$this->HighestKudo = $row["HighestKudo"];
			$this->HighestSano = $row["HighestSano"];
			$this->Predict_Cancer = $row["Predict_Cancer"];
			$this->Predict_Histo = $row["Predict_Histo"];
			$this->Predict_Histo_Confidence = $row["Predict_Histo_Confidence"];
			$this->Feat_Invasion = $row["Feat_Invasion"];
			$this->EnBloc = $row["EnBloc"];
			$this->Access = $row["Access"];
			$this->EMRAttempted = $row["EMRAttempted"];
			$this->SMInjection = $row["SMInjection"];
			$this->Constituent = $row["Constituent"];
			$this->Constituent_other = $row["Constituent_other"];
			$this->Adrenaline = $row["Adrenaline"];
			$this->Dye = $row["Dye"];
			$this->No_Injection = $row["No_Injection"];
			$this->Lifting = $row["Lifting"];
			$this->SnareType = $row["SnareType"];
			$this->SnareSize = $row["SnareSize"];
			$this->EndoscopeCapUsed = $row["EndoscopeCapUsed"];
			$this->Current = $row["Current"];
			$this->No_Pieces = $row["No_Pieces"];
			$this->SnareExcision = $row["SnareExcision"];
			$this->AddModality = $row["AddModality"];
			$this->SuccessfulEMR = $row["SuccessfulEMR"];
			$this->STSC_Margin = $row["STSC_Margin"];
			$this->SCAR_complete = $row["SCAR_complete"];
			$this->DefectTattoo = $row["DefectTattoo"];
			$this->BookTwoStage = $row["BookTwoStage"];
			$this->IPBleed = $row["IPBleed"];
			$this->IPBleed_Control = $row["IPBleed_Control"];
			$this->SMF = $row["SMF"];
			$this->SMF_Fgrade = $row["SMF_Fgrade"];
			$this->SMF_Prediction = $row["SMF_Prediction"];
			$this->SMF_Prediction_confidence = $row["SMF_Prediction_confidence"];
			$this->CentralSMF = $row["CentralSMF"];
			$this->FibrosisCancerRisk = $row["FibrosisCancerRisk"];
			$this->ProcedureStoppedCancer = $row["ProcedureStoppedCancer"];
			$this->OverlyingFold = $row["OverlyingFold"];
			$this->FibrosisofSignificance = $row["FibrosisofSignificance"];
			$this->DeepInjury = $row["DeepInjury"];
			$this->IPPerforation = $row["IPPerforation"];
			$this->IPPerforation_Rx = $row["IPPerforation_Rx"];
			$this->Defect_Clip_Closure = $row["Defect_Clip_Closure"];
			$this->Defect_Clip_Closure_Number = $row["Defect_Clip_Closure_Number"];
			$this->Duration = $row["Duration"];
			$this->DurationComplication = $row["DurationComplication"];
			$this->HistoPathMajor = $row["HistoPathMajor"];
			$this->Cancer = $row["Cancer"];
			$this->Dysplasia = $row["Dysplasia"];
			$this->SMInvasion = $row["SMInvasion"];
			$this->Margins = $row["Margins"];
			$this->SpecimenSize = $row["SpecimenSize"];
			$this->DelayedBleed = $row["DelayedBleed"];
			$this->DelayedBleed_Admit = $row["DelayedBleed_Admit"];
			$this->DelayedBleed_Colon = $row["DelayedBleed_Colon"];
			$this->DelayedPerforation = $row["DelayedPerforation"];
			$this->DelayedPerforation_Rx = $row["DelayedPerforation_Rx"];
			$this->Disposition2Weeks = $row["Disposition2Weeks"];
			$this->FollowUp2Weeks = $row["FollowUp2Weeks"];
			$this->SurgReferral = $row["SurgReferral"];
			$this->FirstFU = $row["FirstFU"];
			$this->FirstFUMonths = $row["FirstFUMonths"];
			$this->FirstFUDate = $row["FirstFUDate"];
			$this->FirstFURecurrence = $row["FirstFURecurrence"];
			$this->FirstFUNoRecurScarBx = $row["FirstFUNoRecurScarBx"];
			$this->FirstFURecurrenceSites = $row["FirstFURecurrenceSites"];
			$this->FirstFURecurrenceLocation = $row["FirstFURecurrenceLocation"];
			$this->FirstFURecurrenceLargest = $row["FirstFURecurrenceLargest"];
			$this->FirstFURecurrenceRx = $row["FirstFURecurrenceRx"];
			$this->FirstFURecurrenceExcision = $row["FirstFURecurrenceExcision"];
			$this->FirstFURecurrenceNotes = $row["FirstFURecurrenceNotes"];
			$this->FirstFURecurHisto = $row["FirstFURecurHisto"];
			$this->FirstFURecurHistoDysplasia = $row["FirstFURecurHistoDysplasia"];
			$this->FirstFUNextColon_Mths = $row["FirstFUNextColon_Mths"];
			$this->FirstFUOutcome = $row["FirstFUOutcome"];
			$this->FirstFUDisposition = $row["FirstFUDisposition"];
			$this->FirstFUSurgery = $row["FirstFUSurgery"];
			$this->FirstFUSurgeryMethod = $row["FirstFUSurgeryMethod"];
			$this->FirstFUSurgeryResidual = $row["FirstFUSurgeryResidual"];
			$this->FirstFUSurgeryType = $row["FirstFUSurgeryType"];
			$this->FirstFUSurgeryNotes = $row["FirstFUSurgeryNotes"];
			$this->SecondFU = $row["SecondFU"];
			$this->SecondFUMonths = $row["SecondFUMonths"];
			$this->SecondFUDate = $row["SecondFUDate"];
			$this->SecondFURecurrence = $row["SecondFURecurrence"];
			$this->SecondFUNoRecurScarBx = $row["SecondFUNoRecurScarBx"];
			$this->SecondFURecurrenceLargest = $row["SecondFURecurrenceLargest"];
			$this->SecondFURecurrenceLocation = $row["SecondFURecurrenceLocation"];
			$this->SecondFURecurrenceSites = $row["SecondFURecurrenceSites"];
			$this->SecondFUDisposition = $row["SecondFUDisposition"];
			$this->SecondFURecurrenceRx = $row["SecondFURecurrenceRx"];
			$this->SecondFURecurrenceExcision = $row["SecondFURecurrenceExcision"];
			$this->SecondFURecurrenceNotes = $row["SecondFURecurrenceNotes"];
			$this->SecondFURecurHistoDysplasia = $row["SecondFURecurHistoDysplasia"];
			$this->SecondFUNextColon_Mths = $row["SecondFUNextColon_Mths"];
			$this->SecondFUOutcome = $row["SecondFUOutcome"];
			$this->SecondFUSurgery = $row["SecondFUSurgery"];
			$this->SecondFUSurgeryNotes = $row["SecondFUSurgeryNotes"];
			$this->SecondFURecurHisto = $row["SecondFURecurHisto"];
			$this->SecondFUSurgeryMethod = $row["SecondFUSurgeryMethod"];
			$this->SecondFUSurgeryResidual = $row["SecondFUSurgeryResidual"];
			$this->SecondFUSurgeryType = $row["SecondFUSurgeryType"];
			$this->ThirdFU = $row["ThirdFU"];
			$this->ThirdFUDate = $row["ThirdFUDate"];
			$this->ThirdFUMonths = $row["ThirdFUMonths"];
			$this->ThirdFUDisposition = $row["ThirdFUDisposition"];
			$this->ThirdFUNoRecurScarBx = $row["ThirdFUNoRecurScarBx"];
			$this->ThirdFUOutcome = $row["ThirdFUOutcome"];
			$this->ThirdFUPostSurgery = $row["ThirdFUPostSurgery"];
			$this->ThirdFURecurHisto = $row["ThirdFURecurHisto"];
			$this->ThirdFURecurrence = $row["ThirdFURecurrence"];
			$this->ThirdFURecurrenceExcision = $row["ThirdFURecurrenceExcision"];
			$this->ThirdFURecurrenceRx = $row["ThirdFURecurrenceRx"];
			$this->ThirdFURecurrenceSites = $row["ThirdFURecurrenceSites"];
			$this->ThirdFURecurrenceLocation = $row["ThirdFURecurrenceLocation"];
			$this->ThirdFURecurrenceLargest = $row["ThirdFURecurrenceLargest"];
			$this->ThirdFURecurrenceNotes = $row["ThirdFURecurrenceNotes"];
			$this->ThirdFURecurHistoDysplasia = $row["ThirdFURecurHistoDysplasia"];
			$this->ThirdFUNextColon_Mths = $row["ThirdFUNextColon_Mths"];
			$this->ThirdFUSurgeryNotes = $row["ThirdFUSurgeryNotes"];
			$this->ThirdFUSurgeryMethod = $row["ThirdFUSurgeryMethod"];
			$this->ThirdFUSurgeryResidual = $row["ThirdFUSurgeryResidual"];
			$this->ThirdFUSurgeryType = $row["ThirdFUSurgeryType"];
			$this->FourthFU = $row["FourthFU"];
			$this->FourthFUMonths = $row["FourthFUMonths"];
			$this->FourthFURecurrenceLocation = $row["FourthFURecurrenceLocation"];
			$this->FourthFURecurrenceLargest = $row["FourthFURecurrenceLargest"];
			$this->FourthFURecurrenceNotes = $row["FourthFURecurrenceNotes"];
			$this->FourthFURecurHistoDysplasia = $row["FourthFURecurHistoDysplasia"];
			$this->FourthFUNextColon_Mnths = $row["FourthFUNextColon_Mnths"];
			$this->FourthFUSurgeryResidual = $row["FourthFUSurgeryResidual"];
			$this->FourthFUDate = $row["FourthFUDate"];
			$this->FourthFUDisposition = $row["FourthFUDisposition"];
			$this->FourthFUNoRecurScarBx = $row["FourthFUNoRecurScarBx"];
			$this->FourthFUOutcome = $row["FourthFUOutcome"];
			$this->FourthFUPostSurgery = $row["FourthFUPostSurgery"];
			$this->FourthFURecurHisto = $row["FourthFURecurHisto"];
			$this->FourthFURecurrence = $row["FourthFURecurrence"];
			$this->FourthFURecurrenceExcision = $row["FourthFURecurrenceExcision"];
			$this->FourthFURecurrenceRx = $row["FourthFURecurrenceRx"];
			$this->FourthFURecurrenceSites = $row["FourthFURecurrenceSites"];
			$this->FourthFUSurgeryMethod = $row["FourthFUSurgeryMethod"];
			$this->FourthFUSurgeryNotes = $row["FourthFUSurgeryNotes"];
			$this->FourthFUSurgeryType = $row["FourthFUSurgeryType"];
			$this->ClinSignificantBleedYN = $row["ClinSignificantBleedYN"];
			$this->ClinSignificantPerfYN = $row["ClinSignificantPerfYN"];
			$this->SSACharact_Dysplasia = $row["SSACharact_Dysplasia"];
			$this->SSACharact_Dysplasia_Confidence = $row["SSACharact_Dysplasia_Confidence"];
			$this->IPPerforation_Clips = $row["IPPerforation_Clips"];
			$this->NICE_Overall = $row["NICE_Overall"];
			$this->FirstFURecurrenceClipArtifact = $row["FirstFURecurrenceClipArtifact"];
			$this->SecondFURecurrenceClipArtifact = $row["SecondFURecurrenceClipArtifact"];
			$this->ThirdFURecurrenceClipArtifact = $row["ThirdFURecurrenceClipArtifact"];
			$this->FourthFURecurrenceClipArtifact = $row["FourthFURecurrenceClipArtifact"];
			$this->SERT_size = $row["SERT_size"];
			$this->SERT_ipb = $row["SERT_ipb"];
			$this->SERT_dysplasia = $row["SERT_dysplasia"];
			$this->created = $row["created"];
			$this->creating_user = $row["creating_user"];
			$this->updated = $row["updated"];
			$this->updating_user = $row["updating_user"];
			$this->entrytype = $row["entrytype"];
			$this->save = $row["save"];
			$this->consent_PROSPER = $row["consent_PROSPER"];
			$this->inPROSPER = $row["inPROSPER"];
			$this->SERT = $row["SERT"];
			$this->completeColon_PROSPER = $row["completeColon_PROSPER"];
			$this->defectTattoo_PROSPER = $row["defectTattoo_PROSPER"];
			$this->dateEnrolled_PROSPER = $row["dateEnrolled_PROSPER"];
			$this->variation_PROSPER = $row["variation_PROSPER"];
			$this->PROSPERSCDue = $row["PROSPERSCDue"];
			$this->CLIP_consent = $row["CLIP_consent"];
			$this->CLIP_preEMRexclusion = $row["CLIP_preEMRexclusion"];
			$this->CLIP_postEMRexclusion = $row["CLIP_postEMRexclusion"];
			$this->CLIP_randomisation = $row["CLIP_randomisation"];
			$this->CLIP_category = $row["CLIP_category"];
			$this->CLIP_active_closure_complete = $row["CLIP_active_closure_complete"];
			$this->CLIP_active_closure_number = $row["CLIP_active_closure_number"];
			$this->CLIP_no_closure_reason = $row["CLIP_no_closure_reason"];
			$this->CLIP_doppler = $row["CLIP_doppler"];
			$this->CLIP_doppler_signal = $row["CLIP_doppler_signal"];
			$this->CLIP_doppler_signal_location = $row["CLIP_doppler_signal_location"];
			$this->CLIP_doppler_signal_area_clipped = $row["CLIP_doppler_signal_area_clipped"];
			$this->CLIP_notes = $row["CLIP_notes"];
			$this->SMSA = $row["SMSA"];
			$this->ESDType = $row["ESDType"];
			$this->ESDTraineeID = $row["ESDTraineeID"];
			$this->ESDTrainingCase = $row["ESDTrainingCase"];
			$this->ESDTrainingCaseSelfCompleted = $row["ESDTrainingCaseSelfCompleted"];
			$this->ESDTrainingCaseStageTakeoverCompleted = $row["ESDTrainingCaseStageTakeoverCompleted"];
			$this->ESDTrainingCaseStageTakeoverReason = $row["ESDTrainingCaseStageTakeoverReason"];
			$this->ESDTrainingCaseStageTakeoverReasonText = $row["ESDTrainingCaseStageTakeoverReasonText"];
			$this->ESDhighDefScope = $row["ESDhighDefScope"];
			$this->ESDcutCurrent = $row["ESDcutCurrent"];
			$this->ESDcutCurrentWatts = $row["ESDcutCurrentWatts"];
			$this->ESDcutCurrentEffect = $row["ESDcutCurrentEffect"];
			$this->ESDcoagCurrent = $row["ESDcoagCurrent"];
			$this->ESDcoagCurrentEffect = $row["ESDcoagCurrentEffect"];
			$this->ESDcoagCurrentWatts = $row["ESDcoagCurrentWatts"];
			$this->ESDIPBControl = $row["ESDIPBControl"];
			$this->ESDIPBProphylacticCoag = $row["ESDIPBProphylacticCoag"];
			$this->ESDPocket = $row["ESDPocket"];
			$this->ESDaddSnareExcision = $row["ESDaddSnareExcision"];
			$this->ESDnoPieces = $row["ESDnoPieces"];
			$this->ESDknifeType1 = $row["ESDknifeType1"];
			$this->ESDknifeType2 = $row["ESDknifeType2"];
			$this->ESDflushingPump = $row["ESDflushingPump"];
			$this->ESDtractionTechnique = $row["ESDtractionTechnique"];
			$this->ESDdurationTotal = $row["ESDdurationTotal"];
			$this->ESDdurationIncision = $row["ESDdurationIncision"];
			$this->ESDdurationDissection = $row["ESDdurationDissection"];
			$this->ESDdurationDefectAssess = $row["ESDdurationDefectAssess"];
			$this->ESDlesionRemoved = $row["ESDlesionRemoved"];
			$this->ESDenblocEndo = $row["ESDenblocEndo"];
			$this->ESDdefectMuscleInjury = $row["ESDdefectMuscleInjury"];
			$this->ESDHistoDimensionx = $row["ESDHistoDimensionx"];
			$this->ESDHistoDimensiony = $row["ESDHistoDimensiony"];
			$this->ESDHistoEnBloc = $row["ESDHistoEnBloc"];
			$this->ESDHistoR0 = $row["ESDHistoR0"];
			$this->ESDHistoVM = $row["ESDHistoVM"];
			$this->ESDHistoHM = $row["ESDHistoHM"];
			$this->ESDHistoType = $row["ESDHistoType"];
			$this->ESDHistoDysplasia = $row["ESDHistoDysplasia"];
			$this->ESDHistoInvasive = $row["ESDHistoInvasive"];
			$this->ESDHistoSMICDepth = $row["ESDHistoSMICDepth"];
			$this->ESDHistoSMICLVI = $row["ESDHistoSMICLVI"];
			$this->ESDHistoSMICLVIconfidence = $row["ESDHistoSMICLVIconfidence"];
			$this->ESDHistoSMICTB = $row["ESDHistoSMICTB"];
			$this->ESDHistoSMICDifferentiation = $row["ESDHistoSMICDifferentiation"];
			$this->ESDgeneralnotes = $row["ESDgeneralnotes"];
			$this->ESDSurgeryNotes = $row["ESDSurgeryNotes"];
			$this->inCSPEMRRCT = $row["inCSPEMRRCT"];
			$this->Descriptor = $row["Descriptor"];
			$this->CSPExcluded = $row["CSPExcluded"];
			$this->CSPExclusionReason = $row["CSPExclusionReason"];
			$this->CSPRandomisation = $row["CSPRandomisation"];
			$this->Locationcm = $row["Locationcm"];
			$this->LocationSpecific = $row["LocationSpecific"];
			$this->CSPSnare = $row["CSPSnare"];
			$this->CSPprotrusion = $row["CSPprotrusion"];
			$this->CSPMarginbiopsy = $row["CSPMarginbiopsy"];
			$this->trainingPercentperformed = $row["trainingPercentperformed"];
			$this->trainingtakenoverreason = $row["trainingtakenoverreason"];
			$this->trainingtakenoverreason2 = $row["trainingtakenoverreason2"];
			$this->traineeinjection = $row["traineeinjection"];
			$this->traineeresection = $row["traineeresection"];
			$this->traineestsc = $row["traineestsc"];
			$this->traineedefectcheck = $row["traineedefectcheck"];
			$this->traineeclip = $row["traineeclip"];
			$this->traineespecimenretrieve = $row["traineespecimenretrieve"];
			$this->consultant_agrees_DMI = $row["consultant_agrees_DMI"];
			$this->consultantassistancetraining = $row["consultantassistancetraining"];
			$this->LANS_enrolled = $row["LANS_enrolled"];
			$this->LANS_excluded = $row["LANS_excluded"];
			$this->LANS_excludedwhy = $row["LANS_excludedwhy"];
			$this->LANS_indication = $row["LANS_indication"];
			$this->LANS_prechromokudo_observer1 = $row["LANS_prechromokudo_observer1"];
			$this->LANS_prechromodemarcatedarea_observer1 = $row["LANS_prechromodemarcatedarea_observer1"];
			$this->LANS_prechromosmi_observer1 = $row["LANS_prechromosmi_observer1"];
			$this->LANS_prechromosmiconfidence_observer1 = $row["LANS_prechromosmiconfidence_observer1"];
			$this->LANS_observer1 = $row["LANS_observer1"];
			$this->LANS_observer2 = $row["LANS_observer2"];
			$this->LANS_postchromokudo_observer1 = $row["LANS_postchromokudo_observer1"];
			$this->LANS_postchromosmi_observer1 = $row["LANS_postchromosmi_observer1"];
			$this->LANS_postchromosmiconfidence_observer1 = $row["LANS_postchromosmiconfidence_observer1"];
			$this->LANS_postchromodemarcatedarea_observer1 = $row["LANS_postchromodemarcatedarea_observer1"];
			$this->LANS_prechromokudo_observer2 = $row["LANS_prechromokudo_observer2"];
			$this->LANS_prechromodemarcatedarea_observer2 = $row["LANS_prechromodemarcatedarea_observer2"];
			$this->LANS_prechromosmi_observer2 = $row["LANS_prechromosmi_observer2"];
			$this->LANS_prechromosmiconfidence_observer2 = $row["LANS_prechromosmiconfidence_observer2"];
			$this->LANS_postchromokudo_observer2 = $row["LANS_postchromokudo_observer2"];
			$this->LANS_postchromodemarcatedarea_observer2 = $row["LANS_postchromodemarcatedarea_observer2"];
			$this->LANS_postchromosmi_observer2 = $row["LANS_postchromosmi_observer2"];
			$this->LANS_postchromosmiconfidence_observer2 = $row["LANS_postchromosmiconfidence_observer2"];
			$this->LANS_comment = $row["LANS_comment"];
			$this->IsNumberNodules = $row["IsNumberNodules"];
			$this->IsSizeDominantNodule = $row["IsSizeDominantNodule"];
			$this->IsNumberNodulesLarger8mm = $row["IsNumberNodulesLarger8mm"];
			$this->IsLesionInclude = $row["IsLesionInclude"];
			$this->LPexcision = $row["LPexcision"];
			$this->ICVFat = $row["ICVFat"];
			$this->StalkStudy = $row["StalkStudy"];
			$this->StalkNumber = $row["StalkNumber"];
			$this->StalkHisto1 = $row["StalkHisto1"];
			$this->StalkHisto2 = $row["StalkHisto2"];
			$this->Significant_pain_requiring_control_PAIN = $row["Significant_pain_requiring_control_PAIN"];
			$this->Consent_pain = $row["Consent_pain"];
			$this->TempAtEntry_PAIN = $row["TempAtEntry_PAIN"];
			$this->TempAtPain_PAIN = $row["TempAtPain_PAIN"];
			$this->TempAtExit_PAIN = $row["TempAtExit_PAIN"];
			$this->VASAtEntry_PAIN = $row["VASAtEntry_PAIN"];
			$this->VasAtPain_PAIN = $row["VasAtPain_PAIN"];
			$this->VASAtExit_PAIN = $row["VASAtExit_PAIN"];
			$this->Length_of_pain_PAIN = $row["Length_of_pain_PAIN"];
			$this->Time_to_pain_PAIN = $row["Time_to_pain_PAIN"];
			$this->Intervention_Conservative_1_PAIN = $row["Intervention_Conservative_1_PAIN"];
			$this->Intervention2_PAIN = $row["Intervention2_PAIN"];
			$this->Intervention_Conservative_2_PAIN = $row["Intervention_Conservative_2_PAIN"];
			$this->Intervention_Non_Conservative_1_PAIN = $row["Intervention_Non_Conservative_1_PAIN"];
			$this->Investigation_findings_PAIN = $row["Investigation_findings_PAIN"];
			$this->Surgery_findings_PAIN = $row["Surgery_findings_PAIN"];
			$this->Extended_recovery_PAIN = $row["Extended_recovery_PAIN"];
			$this->Propofol_PAIN = $row["Propofol_PAIN"];
			$this->Fentanyl_PAIN = $row["Fentanyl_PAIN"];
			$this->Buscopan_PAIN = $row["Buscopan_PAIN"];
			$this->Glucagon_PAIN = $row["Glucagon_PAIN"];
			$this->Paracetemol_PAIN = $row["Paracetemol_PAIN"];
			$this->Intraprocedural_paracetemol_Number_PAIN = $row["Intraprocedural_paracetemol_Number_PAIN"];
			$this->Anaesthetic_PAIN = $row["Anaesthetic_PAIN"];
			$this->Paracetemol_post_PAIN = $row["Paracetemol_post_PAIN"];
			$this->Fentanyl_post_PAIN = $row["Fentanyl_post_PAIN"];
			$this->Other_post_PAIN = $row["Other_post_PAIN"];
			$this->Opiod_painkiller = $row["Opiod_painkiller"];
			$this->TimeinRoomPAIN = $row["TimeinRoomPAIN"];
			$this->TimeinRecoveryPAIN = $row["TimeinRecoveryPAIN"];
			$this->TimeinProcedurePAIN = $row["TimeinProcedurePAIN"];
			$this->TimeinParacetemolPAIN = $row["TimeinParacetemolPAIN"];
			$this->TimeinFentanylPAIN = $row["TimeinFentanylPAIN"];
			$this->TimeNoFurtherPainPAIN = $row["TimeNoFurtherPainPAIN"];
			$this->Timein2ndStagePAIN = $row["Timein2ndStagePAIN"];
			$this->TimeinExitPAIN = $row["TimeinExitPAIN"];
			$this->ARJRopivPAINandLESION = $row["ARJRopivPAINandLESION"];
		}
		return $result;
	}

	/**
	 * Delete the row by using the key as arg
	 *
	 * @param key_table_type $key_row
	 *
	 */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM Lesion WHERE _k_lesion = $key_row");
	}

	/**
	 * Update the active row table on table
	 */
	public function echoQueryold() {
		$query = "UPDATE Lesion set _k_procedure = $this->_k_procedure, PreviousAttempt = $this->PreviousAttempt, PreviousBiopsy = $this->PreviousBiopsy, PreviousSPOT = $this->PreviousSPOT, IntendedProcedure = $this->IntendedProcedure, ActualPredominantProcedure = $this->ActualPredominantProcedure, Size = $this->Size, Location = $this->Location, Paris = $this->Paris, Morphology = $this->Morphology, HighestKudo = $this->HighestKudo, HighestSano = $this->HighestSano, Predict_Cancer = $this->Predict_Cancer, Predict_Histo = $this->Predict_Histo, Predict_Histo_Confidence = $this->Predict_Histo_Confidence, Feat_Invasion = $this->Feat_Invasion, EnBloc = $this->EnBloc, Access = $this->Access, EMRAttempted = $this->EMRAttempted, SMInjection = $this->SMInjection, Constituent = $this->Constituent, Constituent_other = $this->Constituent_other, Adrenaline = $this->Adrenaline, Dye = $this->Dye, No_Injection = $this->No_Injection, Lifting = $this->Lifting, SnareType = $this->SnareType, SnareSize = $this->SnareSize, EndoscopeCapUsed = $this->EndoscopeCapUsed, Current = $this->Current, No_Pieces = $this->No_Pieces, SnareExcision = $this->SnareExcision, AddModality = $this->AddModality, SuccessfulEMR = $this->SuccessfulEMR, STSC_Margin = $this->STSC_Margin, SCAR_complete = $this->SCAR_complete, DefectTattoo = $this->DefectTattoo, BookTwoStage = $this->BookTwoStage, IPBleed = $this->IPBleed, IPBleed_Control = $this->IPBleed_Control, SMF = $this->SMF, SMF_Fgrade = $this->SMF_Fgrade, SMF_Prediction = $this->SMF_Prediction, SMF_Prediction_confidence = $this->SMF_Prediction_confidence, CentralSMF = $this->CentralSMF, FibrosisCancerRisk = $this->FibrosisCancerRisk, ProcedureStoppedCancer = $this->ProcedureStoppedCancer, OverlyingFold = $this->OverlyingFold, FibrosisofSignificance = $this->FibrosisofSignificance, DeepInjury = $this->DeepInjury, IPPerforation = $this->IPPerforation, IPPerforation_Rx = $this->IPPerforation_Rx, Defect_Clip_Closure = $this->Defect_Clip_Closure, Defect_Clip_Closure_Number = $this->Defect_Clip_Closure_Number, Duration = $this->Duration, DurationComplication = $this->DurationComplication, HistoPathMajor = $this->HistoPathMajor, Cancer = $this->Cancer, Dysplasia = $this->Dysplasia, SMInvasion = $this->SMInvasion, Margins = $this->Margins, SpecimenSize = $this->SpecimenSize, DelayedBleed = $this->DelayedBleed, DelayedBleed_Admit = $this->DelayedBleed_Admit, DelayedBleed_Colon = $this->DelayedBleed_Colon, DelayedPerforation = $this->DelayedPerforation, DelayedPerforation_Rx = $this->DelayedPerforation_Rx, Disposition2Weeks = $this->Disposition2Weeks, FollowUp2Weeks = $this->FollowUp2Weeks, SurgReferral = $this->SurgReferral, FirstFU = $this->FirstFU, FirstFUMonths = $this->FirstFUMonths, FirstFUDate = $this->FirstFUDate, FirstFURecurrence = $this->FirstFURecurrence, FirstFUNoRecurScarBx = $this->FirstFUNoRecurScarBx, FirstFURecurrenceSites = $this->FirstFURecurrenceSites, FirstFURecurrenceLocation = $this->FirstFURecurrenceLocation, FirstFURecurrenceLargest = $this->FirstFURecurrenceLargest, FirstFURecurrenceRx = $this->FirstFURecurrenceRx, FirstFURecurrenceExcision = $this->FirstFURecurrenceExcision, FirstFURecurrenceNotes = $this->FirstFURecurrenceNotes, FirstFURecurHisto = $this->FirstFURecurHisto, FirstFURecurHistoDysplasia = $this->FirstFURecurHistoDysplasia, FirstFUNextColon_Mths = $this->FirstFUNextColon_Mths, FirstFUOutcome = $this->FirstFUOutcome, FirstFUDisposition = $this->FirstFUDisposition, FirstFUSurgery = $this->FirstFUSurgery, FirstFUSurgeryMethod = $this->FirstFUSurgeryMethod, FirstFUSurgeryResidual = $this->FirstFUSurgeryResidual, FirstFUSurgeryType = $this->FirstFUSurgeryType, FirstFUSurgeryNotes = $this->FirstFUSurgeryNotes, SecondFU = $this->SecondFU, SecondFUMonths = $this->SecondFUMonths, SecondFUDate = $this->SecondFUDate, SecondFURecurrence = $this->SecondFURecurrence, SecondFUNoRecurScarBx = $this->SecondFUNoRecurScarBx, SecondFURecurrenceLargest = $this->SecondFURecurrenceLargest, SecondFURecurrenceLocation = $this->SecondFURecurrenceLocation, SecondFURecurrenceSites = $this->SecondFURecurrenceSites, SecondFUDisposition = $this->SecondFUDisposition, SecondFURecurrenceRx = $this->SecondFURecurrenceRx, SecondFURecurrenceExcision = $this->SecondFURecurrenceExcision, SecondFURecurrenceNotes = $this->SecondFURecurrenceNotes, SecondFURecurHistoDysplasia = $this->SecondFURecurHistoDysplasia, SecondFUNextColon_Mths = $this->SecondFUNextColon_Mths, SecondFUOutcome = $this->SecondFUOutcome, SecondFUSurgery = $this->SecondFUSurgery, SecondFUSurgeryNotes = $this->SecondFUSurgeryNotes, SecondFURecurHisto = $this->SecondFURecurHisto, SecondFUSurgeryMethod = $this->SecondFUSurgeryMethod, SecondFUSurgeryResidual = $this->SecondFUSurgeryResidual, SecondFUSurgeryType = $this->SecondFUSurgeryType, ThirdFU = $this->ThirdFU, ThirdFUDate = $this->ThirdFUDate, ThirdFUMonths = $this->ThirdFUMonths, ThirdFUDisposition = $this->ThirdFUDisposition, ThirdFUNoRecurScarBx = $this->ThirdFUNoRecurScarBx, ThirdFUOutcome = $this->ThirdFUOutcome, ThirdFUPostSurgery = $this->ThirdFUPostSurgery, ThirdFURecurHisto = $this->ThirdFURecurHisto, ThirdFURecurrence = $this->ThirdFURecurrence, ThirdFURecurrenceExcision = $this->ThirdFURecurrenceExcision, ThirdFURecurrenceRx = $this->ThirdFURecurrenceRx, ThirdFURecurrenceSites = $this->ThirdFURecurrenceSites, ThirdFURecurrenceLocation = $this->ThirdFURecurrenceLocation, ThirdFURecurrenceLargest = $this->ThirdFURecurrenceLargest, ThirdFURecurrenceNotes = $this->ThirdFURecurrenceNotes, ThirdFURecurHistoDysplasia = $this->ThirdFURecurHistoDysplasia, ThirdFUNextColon_Mths = $this->ThirdFUNextColon_Mths, ThirdFUSurgeryNotes = $this->ThirdFUSurgeryNotes, ThirdFUSurgeryMethod = $this->ThirdFUSurgeryMethod, ThirdFUSurgeryResidual = $this->ThirdFUSurgeryResidual, ThirdFUSurgeryType = $this->ThirdFUSurgeryType, FourthFU = $this->FourthFU, FourthFUMonths = $this->FourthFUMonths, FourthFURecurrenceLocation = $this->FourthFURecurrenceLocation, FourthFURecurrenceLargest = $this->FourthFURecurrenceLargest, FourthFURecurrenceNotes = $this->FourthFURecurrenceNotes, FourthFURecurHistoDysplasia = $this->FourthFURecurHistoDysplasia, FourthFUNextColon_Mnths = $this->FourthFUNextColon_Mnths, FourthFUSurgeryResidual = $this->FourthFUSurgeryResidual, FourthFUDate = $this->FourthFUDate, FourthFUDisposition = $this->FourthFUDisposition, FourthFUNoRecurScarBx = $this->FourthFUNoRecurScarBx, FourthFUOutcome = $this->FourthFUOutcome, FourthFUPostSurgery = $this->FourthFUPostSurgery, FourthFURecurHisto = $this->FourthFURecurHisto, FourthFURecurrence = $this->FourthFURecurrence, FourthFURecurrenceExcision = $this->FourthFURecurrenceExcision, FourthFURecurrenceRx = $this->FourthFURecurrenceRx, FourthFURecurrenceSites = $this->FourthFURecurrenceSites, FourthFUSurgeryMethod = $this->FourthFUSurgeryMethod, FourthFUSurgeryNotes = $this->FourthFUSurgeryNotes, FourthFUSurgeryType = $this->FourthFUSurgeryType, ClinSignificantBleedYN = $this->ClinSignificantBleedYN, ClinSignificantPerfYN = $this->ClinSignificantPerfYN, SSACharact_Dysplasia = $this->SSACharact_Dysplasia, SSACharact_Dysplasia_Confidence = $this->SSACharact_Dysplasia_Confidence, IPPerforation_Clips = $this->IPPerforation_Clips, NICE_Overall = $this->NICE_Overall, FirstFURecurrenceClipArtifact = $this->FirstFURecurrenceClipArtifact, SecondFURecurrenceClipArtifact = $this->SecondFURecurrenceClipArtifact, ThirdFURecurrenceClipArtifact = $this->ThirdFURecurrenceClipArtifact, FourthFURecurrenceClipArtifact = $this->FourthFURecurrenceClipArtifact, SERT_size = $this->SERT_size, SERT_ipb = $this->SERT_ipb, SERT_dysplasia = $this->SERT_dysplasia, created = $this->created, creating_user = $this->creating_user, updated = $this->updated, updating_user = $this->updating_user, entrytype = $this->entrytype, save = $this->save, consent_PROSPER = $this->consent_PROSPER, inPROSPER = $this->inPROSPER, SERT = $this->SERT, completeColon_PROSPER = $this->completeColon_PROSPER, defectTattoo_PROSPER = $this->defectTattoo_PROSPER, dateEnrolled_PROSPER = $this->dateEnrolled_PROSPER, variation_PROSPER = $this->variation_PROSPER, PROSPERSCDue = $this->PROSPERSCDue, CLIP_consent = $this->CLIP_consent, CLIP_preEMRexclusion = $this->CLIP_preEMRexclusion, CLIP_postEMRexclusion = $this->CLIP_postEMRexclusion, CLIP_randomisation = $this->CLIP_randomisation, CLIP_category = $this->CLIP_category, CLIP_active_closure_complete = $this->CLIP_active_closure_complete, CLIP_active_closure_number = $this->CLIP_active_closure_number, CLIP_no_closure_reason = $this->CLIP_no_closure_reason, CLIP_doppler = $this->CLIP_doppler, CLIP_doppler_signal = $this->CLIP_doppler_signal, CLIP_doppler_signal_location = $this->CLIP_doppler_signal_location, CLIP_doppler_signal_area_clipped = $this->CLIP_doppler_signal_area_clipped, CLIP_notes = $this->CLIP_notes, SMSA = $this->SMSA, ESDType = $this->ESDType, ESDTraineeID = $this->ESDTraineeID, ESDTrainingCase = $this->ESDTrainingCase, ESDTrainingCaseSelfCompleted = $this->ESDTrainingCaseSelfCompleted, ESDTrainingCaseStageTakeoverCompleted = $this->ESDTrainingCaseStageTakeoverCompleted, ESDTrainingCaseStageTakeoverReason = $this->ESDTrainingCaseStageTakeoverReason, ESDTrainingCaseStageTakeoverReasonText = $this->ESDTrainingCaseStageTakeoverReasonText, ESDhighDefScope = $this->ESDhighDefScope, ESDcutCurrent = $this->ESDcutCurrent, ESDcutCurrentWatts = $this->ESDcutCurrentWatts, ESDcutCurrentEffect = $this->ESDcutCurrentEffect, ESDcoagCurrent = $this->ESDcoagCurrent, ESDcoagCurrentEffect = $this->ESDcoagCurrentEffect, ESDcoagCurrentWatts = $this->ESDcoagCurrentWatts, ESDIPBControl = $this->ESDIPBControl, ESDIPBProphylacticCoag = $this->ESDIPBProphylacticCoag, ESDPocket = $this->ESDPocket, ESDaddSnareExcision = $this->ESDaddSnareExcision, ESDnoPieces = $this->ESDnoPieces, ESDknifeType1 = $this->ESDknifeType1, ESDknifeType2 = $this->ESDknifeType2, ESDflushingPump = $this->ESDflushingPump, ESDtractionTechnique = $this->ESDtractionTechnique, ESDdurationTotal = $this->ESDdurationTotal, ESDdurationIncision = $this->ESDdurationIncision, ESDdurationDissection = $this->ESDdurationDissection, ESDdurationDefectAssess = $this->ESDdurationDefectAssess, ESDlesionRemoved = $this->ESDlesionRemoved, ESDenblocEndo = $this->ESDenblocEndo, ESDdefectMuscleInjury = $this->ESDdefectMuscleInjury, ESDHistoDimensionx = $this->ESDHistoDimensionx, ESDHistoDimensiony = $this->ESDHistoDimensiony, ESDHistoEnBloc = $this->ESDHistoEnBloc, ESDHistoR0 = $this->ESDHistoR0, ESDHistoVM = $this->ESDHistoVM, ESDHistoHM = $this->ESDHistoHM, ESDHistoType = $this->ESDHistoType, ESDHistoDysplasia = $this->ESDHistoDysplasia, ESDHistoInvasive = $this->ESDHistoInvasive, ESDHistoSMICDepth = $this->ESDHistoSMICDepth, ESDHistoSMICLVI = $this->ESDHistoSMICLVI, ESDHistoSMICLVIconfidence = $this->ESDHistoSMICLVIconfidence, ESDHistoSMICTB = $this->ESDHistoSMICTB, ESDHistoSMICDifferentiation = $this->ESDHistoSMICDifferentiation, ESDgeneralnotes = $this->ESDgeneralnotes, ESDSurgeryNotes = $this->ESDSurgeryNotes, inCSPEMRRCT = $this->inCSPEMRRCT, Descriptor = $this->Descriptor, CSPExcluded = $this->CSPExcluded, CSPExclusionReason = $this->CSPExclusionReason, CSPRandomisation = $this->CSPRandomisation, Locationcm = $this->Locationcm, LocationSpecific = $this->LocationSpecific, CSPSnare = $this->CSPSnare, CSPprotrusion = $this->CSPprotrusion, CSPMarginbiopsy = $this->CSPMarginbiopsy, trainingPercentperformed = $this->trainingPercentperformed, trainingtakenoverreason = $this->trainingtakenoverreason, trainingtakenoverreason2 = $this->trainingtakenoverreason2, traineeinjection = $this->traineeinjection, traineeresection = $this->traineeresection, traineestsc = $this->traineestsc, traineedefectcheck = $this->traineedefectcheck, traineeclip = $this->traineeclip, traineespecimenretrieve = $this->traineespecimenretrieve, consultant_agrees_DMI = $this->consultant_agrees_DMI, consultantassistancetraining = $this->consultantassistancetraining, LANS_enrolled = $this->LANS_enrolled, LANS_excluded = $this->LANS_excluded, LANS_excludedwhy = $this->LANS_excludedwhy, LANS_indication = $this->LANS_indication, LANS_prechromokudo_observer1 = $this->LANS_prechromokudo_observer1, LANS_prechromodemarcatedarea_observer1 = $this->LANS_prechromodemarcatedarea_observer1, LANS_prechromosmi_observer1 = $this->LANS_prechromosmi_observer1, LANS_prechromosmiconfidence_observer1 = $this->LANS_prechromosmiconfidence_observer1, LANS_observer1 = $this->LANS_observer1, LANS_observer2 = $this->LANS_observer2, LANS_postchromokudo_observer1 = $this->LANS_postchromokudo_observer1, LANS_postchromosmi_observer1 = $this->LANS_postchromosmi_observer1, LANS_postchromosmiconfidence_observer1 = $this->LANS_postchromosmiconfidence_observer1, LANS_postchromodemarcatedarea_observer1 = $this->LANS_postchromodemarcatedarea_observer1, LANS_prechromokudo_observer2 = $this->LANS_prechromokudo_observer2, LANS_prechromodemarcatedarea_observer2 = $this->LANS_prechromodemarcatedarea_observer2, LANS_prechromosmi_observer2 = $this->LANS_prechromosmi_observer2, LANS_prechromosmiconfidence_observer2 = $this->LANS_prechromosmiconfidence_observer2, LANS_postchromokudo_observer2 = $this->LANS_postchromokudo_observer2, LANS_postchromodemarcatedarea_observer2 = $this->LANS_postchromodemarcatedarea_observer2, LANS_postchromosmi_observer2 = $this->LANS_postchromosmi_observer2, LANS_postchromosmiconfidence_observer2 = $this->LANS_postchromosmiconfidence_observer2, LANS_comment = $this->LANS_comment, IsNumberNodules = $this->IsNumberNodules, IsSizeDominantNodule = $this->IsSizeDominantNodule, IsNumberNodulesLarger8mm = $this->IsNumberNodulesLarger8mm, IsLesionInclude = $this->IsLesionInclude, LPexcision = $this->LPexcision, ICVFat = $this->ICVFat, StalkStudy = $this->StalkStudy, StalkNumber = $this->StalkNumber, StalkHisto1 = $this->StalkHisto1, StalkHisto2 = $this->StalkHisto2, Significant_pain_requiring_control_PAIN = $this->Significant_pain_requiring_control_PAIN, Consent_pain = $this->Consent_pain, TempAtEntry_PAIN = $this->TempAtEntry_PAIN, TempAtPain_PAIN = $this->TempAtPain_PAIN, TempAtExit_PAIN = $this->TempAtExit_PAIN, VASAtEntry_PAIN = $this->VASAtEntry_PAIN, VasAtPain_PAIN = $this->VasAtPain_PAIN, VASAtExit_PAIN = $this->VASAtExit_PAIN, Length_of_pain_PAIN = $this->Length_of_pain_PAIN, Time_to_pain_PAIN = $this->Time_to_pain_PAIN, Intervention_Conservative_1_PAIN = $this->Intervention_Conservative_1_PAIN, Intervention2_PAIN = $this->Intervention2_PAIN, Intervention_Conservative_2_PAIN = $this->Intervention_Conservative_2_PAIN, Intervention_Non_Conservative_1_PAIN = $this->Intervention_Non_Conservative_1_PAIN, Investigation_findings_PAIN = $this->Investigation_findings_PAIN, Surgery_findings_PAIN = $this->Surgery_findings_PAIN, Extended_recovery_PAIN = $this->Extended_recovery_PAIN, Propofol_PAIN = $this->Propofol_PAIN, Fentanyl_PAIN = $this->Fentanyl_PAIN, Buscopan_PAIN = $this->Buscopan_PAIN, Glucagon_PAIN = $this->Glucagon_PAIN, Paracetemol_PAIN = $this->Paracetemol_PAIN, Intraprocedural_paracetemol_Number_PAIN = $this->Intraprocedural_paracetemol_Number_PAIN, Anaesthetic_PAIN = $this->Anaesthetic_PAIN, Paracetemol_post_PAIN = $this->Paracetemol_post_PAIN, Fentanyl_post_PAIN = $this->Fentanyl_post_PAIN, Other_post_PAIN = $this->Other_post_PAIN, Opiod_painkiller = $this->Opiod_painkiller, TimeinRoomPAIN = $this->TimeinRoomPAIN, TimeinRecoveryPAIN = $this->TimeinRecoveryPAIN, TimeinProcedurePAIN = $this->TimeinProcedurePAIN, TimeinParacetemolPAIN = $this->TimeinParacetemolPAIN, TimeinFentanylPAIN = $this->TimeinFentanylPAIN, TimeNoFurtherPainPAIN = $this->TimeNoFurtherPainPAIN, Timein2ndStagePAIN = $this->Timein2ndStagePAIN, TimeinExitPAIN = $this->TimeinExitPAIN, ARJRopivPAINandLESION = $this->ARJRopivPAINandLESION where _k_lesion = $this->_k_lesion";

		//echo $query;

		//$query = implode(" ", $query);
		$result = $this->connection->RunUpdateQuery($query);
		return $result;

	}


	public function echoQuery() {
		$query = "UPDATE Lesion set _k_procedure = \"$this->_k_procedure\", PreviousAttempt = \"$this->PreviousAttempt\", PreviousBiopsy = \"$this->PreviousBiopsy\", PreviousSPOT = \"$this->PreviousSPOT\", IntendedProcedure = \"$this->IntendedProcedure\", ActualPredominantProcedure = \"$this->ActualPredominantProcedure\", Size = \"$this->Size\", Location = \"$this->Location\", Paris = \"$this->Paris\", Morphology = \"$this->Morphology\", HighestKudo = \"$this->HighestKudo\", HighestSano = \"$this->HighestSano\", Predict_Cancer = \"$this->Predict_Cancer\", Predict_Histo = \"$this->Predict_Histo\", Predict_Histo_Confidence = \"$this->Predict_Histo_Confidence\", Feat_Invasion = \"$this->Feat_Invasion\", EnBloc = \"$this->EnBloc\", Access = \"$this->Access\", EMRAttempted = \"$this->EMRAttempted\", SMInjection = \"$this->SMInjection\", Constituent = \"$this->Constituent\", Constituent_other = \"$this->Constituent_other\", Adrenaline = \"$this->Adrenaline\", Dye = \"$this->Dye\", No_Injection = \"$this->No_Injection\", Lifting = \"$this->Lifting\", SnareType = \"$this->SnareType\", SnareSize = \"$this->SnareSize\", EndoscopeCapUsed = \"$this->EndoscopeCapUsed\", Current = \"$this->Current\", No_Pieces = \"$this->No_Pieces\", SnareExcision = \"$this->SnareExcision\", AddModality = \"$this->AddModality\", SuccessfulEMR = \"$this->SuccessfulEMR\", STSC_Margin = \"$this->STSC_Margin\", SCAR_complete = \"$this->SCAR_complete\", DefectTattoo = \"$this->DefectTattoo\", BookTwoStage = \"$this->BookTwoStage\", IPBleed = \"$this->IPBleed\", IPBleed_Control = \"$this->IPBleed_Control\", SMF = \"$this->SMF\", SMF_Fgrade = \"$this->SMF_Fgrade\", SMF_Prediction = \"$this->SMF_Prediction\", SMF_Prediction_confidence = \"$this->SMF_Prediction_confidence\", CentralSMF = \"$this->CentralSMF\", FibrosisCancerRisk = \"$this->FibrosisCancerRisk\", ProcedureStoppedCancer = \"$this->ProcedureStoppedCancer\", OverlyingFold = \"$this->OverlyingFold\", FibrosisofSignificance = \"$this->FibrosisofSignificance\", DeepInjury = \"$this->DeepInjury\", IPPerforation = \"$this->IPPerforation\", IPPerforation_Rx = \"$this->IPPerforation_Rx\", Defect_Clip_Closure = \"$this->Defect_Clip_Closure\", Defect_Clip_Closure_Number = \"$this->Defect_Clip_Closure_Number\", Duration = \"$this->Duration\", DurationComplication = \"$this->DurationComplication\", HistoPathMajor = \"$this->HistoPathMajor\", Cancer = \"$this->Cancer\", Dysplasia = \"$this->Dysplasia\", SMInvasion = \"$this->SMInvasion\", Margins = \"$this->Margins\", SpecimenSize = \"$this->SpecimenSize\", DelayedBleed = \"$this->DelayedBleed\", DelayedBleed_Admit = \"$this->DelayedBleed_Admit\", DelayedBleed_Colon = \"$this->DelayedBleed_Colon\", DelayedPerforation = \"$this->DelayedPerforation\", DelayedPerforation_Rx = \"$this->DelayedPerforation_Rx\", Disposition2Weeks = \"$this->Disposition2Weeks\", FollowUp2Weeks = \"$this->FollowUp2Weeks\", SurgReferral = \"$this->SurgReferral\", FirstFU = \"$this->FirstFU\", FirstFUMonths = \"$this->FirstFUMonths\", FirstFUDate = \"$this->FirstFUDate\", FirstFURecurrence = \"$this->FirstFURecurrence\", FirstFUNoRecurScarBx = \"$this->FirstFUNoRecurScarBx\", FirstFURecurrenceSites = \"$this->FirstFURecurrenceSites\", FirstFURecurrenceLocation = \"$this->FirstFURecurrenceLocation\", FirstFURecurrenceLargest = \"$this->FirstFURecurrenceLargest\", FirstFURecurrenceRx = \"$this->FirstFURecurrenceRx\", FirstFURecurrenceExcision = \"$this->FirstFURecurrenceExcision\", FirstFURecurrenceNotes = \"$this->FirstFURecurrenceNotes\", FirstFURecurHisto = \"$this->FirstFURecurHisto\", FirstFURecurHistoDysplasia = \"$this->FirstFURecurHistoDysplasia\", FirstFUNextColon_Mths = \"$this->FirstFUNextColon_Mths\", FirstFUOutcome = \"$this->FirstFUOutcome\", FirstFUDisposition = \"$this->FirstFUDisposition\", FirstFUSurgery = \"$this->FirstFUSurgery\", FirstFUSurgeryMethod = \"$this->FirstFUSurgeryMethod\", FirstFUSurgeryResidual = \"$this->FirstFUSurgeryResidual\", FirstFUSurgeryType = \"$this->FirstFUSurgeryType\", FirstFUSurgeryNotes = \"$this->FirstFUSurgeryNotes\", SecondFU = \"$this->SecondFU\", SecondFUMonths = \"$this->SecondFUMonths\", SecondFUDate = \"$this->SecondFUDate\", SecondFURecurrence = \"$this->SecondFURecurrence\", SecondFUNoRecurScarBx = \"$this->SecondFUNoRecurScarBx\", SecondFURecurrenceLargest = \"$this->SecondFURecurrenceLargest\", SecondFURecurrenceLocation = \"$this->SecondFURecurrenceLocation\", SecondFURecurrenceSites = \"$this->SecondFURecurrenceSites\", SecondFUDisposition = \"$this->SecondFUDisposition\", SecondFURecurrenceRx = \"$this->SecondFURecurrenceRx\", SecondFURecurrenceExcision = \"$this->SecondFURecurrenceExcision\", SecondFURecurrenceNotes = \"$this->SecondFURecurrenceNotes\", SecondFURecurHistoDysplasia = \"$this->SecondFURecurHistoDysplasia\", SecondFUNextColon_Mths = \"$this->SecondFUNextColon_Mths\", SecondFUOutcome = \"$this->SecondFUOutcome\", SecondFUSurgery = \"$this->SecondFUSurgery\", SecondFUSurgeryNotes = \"$this->SecondFUSurgeryNotes\", SecondFURecurHisto = \"$this->SecondFURecurHisto\", SecondFUSurgeryMethod = \"$this->SecondFUSurgeryMethod\", SecondFUSurgeryResidual = \"$this->SecondFUSurgeryResidual\", SecondFUSurgeryType = \"$this->SecondFUSurgeryType\", ThirdFU = \"$this->ThirdFU\", ThirdFUDate = \"$this->ThirdFUDate\", ThirdFUMonths = \"$this->ThirdFUMonths\", ThirdFUDisposition = \"$this->ThirdFUDisposition\", ThirdFUNoRecurScarBx = \"$this->ThirdFUNoRecurScarBx\", ThirdFUOutcome = \"$this->ThirdFUOutcome\", ThirdFUPostSurgery = \"$this->ThirdFUPostSurgery\", ThirdFURecurHisto = \"$this->ThirdFURecurHisto\", ThirdFURecurrence = \"$this->ThirdFURecurrence\", ThirdFURecurrenceExcision = \"$this->ThirdFURecurrenceExcision\", ThirdFURecurrenceRx = \"$this->ThirdFURecurrenceRx\", ThirdFURecurrenceSites = \"$this->ThirdFURecurrenceSites\", ThirdFURecurrenceLocation = \"$this->ThirdFURecurrenceLocation\", ThirdFURecurrenceLargest = \"$this->ThirdFURecurrenceLargest\", ThirdFURecurrenceNotes = \"$this->ThirdFURecurrenceNotes\", ThirdFURecurHistoDysplasia = \"$this->ThirdFURecurHistoDysplasia\", ThirdFUNextColon_Mths = \"$this->ThirdFUNextColon_Mths\", ThirdFUSurgeryNotes = \"$this->ThirdFUSurgeryNotes\", ThirdFUSurgeryMethod = \"$this->ThirdFUSurgeryMethod\", ThirdFUSurgeryResidual = \"$this->ThirdFUSurgeryResidual\", ThirdFUSurgeryType = \"$this->ThirdFUSurgeryType\", FourthFU = \"$this->FourthFU\", FourthFUMonths = \"$this->FourthFUMonths\", FourthFURecurrenceLocation = \"$this->FourthFURecurrenceLocation\", FourthFURecurrenceLargest = \"$this->FourthFURecurrenceLargest\", FourthFURecurrenceNotes = \"$this->FourthFURecurrenceNotes\", FourthFURecurHistoDysplasia = \"$this->FourthFURecurHistoDysplasia\", FourthFUNextColon_Mnths = \"$this->FourthFUNextColon_Mnths\", FourthFUSurgeryResidual = \"$this->FourthFUSurgeryResidual\", FourthFUDate = \"$this->FourthFUDate\", FourthFUDisposition = \"$this->FourthFUDisposition\", FourthFUNoRecurScarBx = \"$this->FourthFUNoRecurScarBx\", FourthFUOutcome = \"$this->FourthFUOutcome\", FourthFUPostSurgery = \"$this->FourthFUPostSurgery\", FourthFURecurHisto = \"$this->FourthFURecurHisto\", FourthFURecurrence = \"$this->FourthFURecurrence\", FourthFURecurrenceExcision = \"$this->FourthFURecurrenceExcision\", FourthFURecurrenceRx = \"$this->FourthFURecurrenceRx\", FourthFURecurrenceSites = \"$this->FourthFURecurrenceSites\", FourthFUSurgeryMethod = \"$this->FourthFUSurgeryMethod\", FourthFUSurgeryNotes = \"$this->FourthFUSurgeryNotes\", FourthFUSurgeryType = \"$this->FourthFUSurgeryType\", ClinSignificantBleedYN = \"$this->ClinSignificantBleedYN\", ClinSignificantPerfYN = \"$this->ClinSignificantPerfYN\", SSACharact_Dysplasia = \"$this->SSACharact_Dysplasia\", SSACharact_Dysplasia_Confidence = \"$this->SSACharact_Dysplasia_Confidence\", IPPerforation_Clips = \"$this->IPPerforation_Clips\", NICE_Overall = \"$this->NICE_Overall\", FirstFURecurrenceClipArtifact = \"$this->FirstFURecurrenceClipArtifact\", SecondFURecurrenceClipArtifact = \"$this->SecondFURecurrenceClipArtifact\", ThirdFURecurrenceClipArtifact = \"$this->ThirdFURecurrenceClipArtifact\", FourthFURecurrenceClipArtifact = \"$this->FourthFURecurrenceClipArtifact\", SERT_size = \"$this->SERT_size\", SERT_ipb = \"$this->SERT_ipb\", SERT_dysplasia = \"$this->SERT_dysplasia\", created = \"$this->created\", creating_user = \"$this->creating_user\", updated = \"$this->updated\", updating_user = \"$this->updating_user\", entrytype = \"$this->entrytype\", save = \"$this->save\", consent_PROSPER = \"$this->consent_PROSPER\", inPROSPER = \"$this->inPROSPER\", SERT = \"$this->SERT\", completeColon_PROSPER = \"$this->completeColon_PROSPER\", defectTattoo_PROSPER = \"$this->defectTattoo_PROSPER\", dateEnrolled_PROSPER = \"$this->dateEnrolled_PROSPER\", variation_PROSPER = \"$this->variation_PROSPER\", PROSPERSCDue = \"$this->PROSPERSCDue\", CLIP_consent = \"$this->CLIP_consent\", CLIP_preEMRexclusion = \"$this->CLIP_preEMRexclusion\", CLIP_postEMRexclusion = \"$this->CLIP_postEMRexclusion\", CLIP_randomisation = \"$this->CLIP_randomisation\", CLIP_category = \"$this->CLIP_category\", CLIP_active_closure_complete = \"$this->CLIP_active_closure_complete\", CLIP_active_closure_number = \"$this->CLIP_active_closure_number\", CLIP_no_closure_reason = \"$this->CLIP_no_closure_reason\", CLIP_doppler = \"$this->CLIP_doppler\", CLIP_doppler_signal = \"$this->CLIP_doppler_signal\", CLIP_doppler_signal_location = \"$this->CLIP_doppler_signal_location\", CLIP_doppler_signal_area_clipped = \"$this->CLIP_doppler_signal_area_clipped\", CLIP_notes = \"$this->CLIP_notes\", SMSA = \"$this->SMSA\", ESDType = \"$this->ESDType\", ESDTraineeID = \"$this->ESDTraineeID\", ESDTrainingCase = \"$this->ESDTrainingCase\", ESDTrainingCaseSelfCompleted = \"$this->ESDTrainingCaseSelfCompleted\", ESDTrainingCaseStageTakeoverCompleted = \"$this->ESDTrainingCaseStageTakeoverCompleted\", ESDTrainingCaseStageTakeoverReason = \"$this->ESDTrainingCaseStageTakeoverReason\", ESDTrainingCaseStageTakeoverReasonText = \"$this->ESDTrainingCaseStageTakeoverReasonText\", ESDhighDefScope = \"$this->ESDhighDefScope\", ESDcutCurrent = \"$this->ESDcutCurrent\", ESDcutCurrentWatts = \"$this->ESDcutCurrentWatts\", ESDcutCurrentEffect = \"$this->ESDcutCurrentEffect\", ESDcoagCurrent = \"$this->ESDcoagCurrent\", ESDcoagCurrentEffect = \"$this->ESDcoagCurrentEffect\", ESDcoagCurrentWatts = \"$this->ESDcoagCurrentWatts\", ESDIPBControl = \"$this->ESDIPBControl\", ESDIPBProphylacticCoag = \"$this->ESDIPBProphylacticCoag\", ESDPocket = \"$this->ESDPocket\", ESDaddSnareExcision = \"$this->ESDaddSnareExcision\", ESDnoPieces = \"$this->ESDnoPieces\", ESDknifeType1 = \"$this->ESDknifeType1\", ESDknifeType2 = \"$this->ESDknifeType2\", ESDflushingPump = \"$this->ESDflushingPump\", ESDtractionTechnique = \"$this->ESDtractionTechnique\", ESDdurationTotal = \"$this->ESDdurationTotal\", ESDdurationIncision = \"$this->ESDdurationIncision\", ESDdurationDissection = \"$this->ESDdurationDissection\", ESDdurationDefectAssess = \"$this->ESDdurationDefectAssess\", ESDlesionRemoved = \"$this->ESDlesionRemoved\", ESDenblocEndo = \"$this->ESDenblocEndo\", ESDdefectMuscleInjury = \"$this->ESDdefectMuscleInjury\", ESDHistoDimensionx = \"$this->ESDHistoDimensionx\", ESDHistoDimensiony = \"$this->ESDHistoDimensiony\", ESDHistoEnBloc = \"$this->ESDHistoEnBloc\", ESDHistoR0 = \"$this->ESDHistoR0\", ESDHistoVM = \"$this->ESDHistoVM\", ESDHistoHM = \"$this->ESDHistoHM\", ESDHistoType = \"$this->ESDHistoType\", ESDHistoDysplasia = \"$this->ESDHistoDysplasia\", ESDHistoInvasive = \"$this->ESDHistoInvasive\", ESDHistoSMICDepth = \"$this->ESDHistoSMICDepth\", ESDHistoSMICLVI = \"$this->ESDHistoSMICLVI\", ESDHistoSMICLVIconfidence = \"$this->ESDHistoSMICLVIconfidence\", ESDHistoSMICTB = \"$this->ESDHistoSMICTB\", ESDHistoSMICDifferentiation = \"$this->ESDHistoSMICDifferentiation\", ESDgeneralnotes = \"$this->ESDgeneralnotes\", ESDSurgeryNotes = \"$this->ESDSurgeryNotes\", inCSPEMRRCT = \"$this->inCSPEMRRCT\", Descriptor = \"$this->Descriptor\", CSPExcluded = \"$this->CSPExcluded\", CSPExclusionReason = \"$this->CSPExclusionReason\", CSPRandomisation = \"$this->CSPRandomisation\", Locationcm = \"$this->Locationcm\", LocationSpecific = \"$this->LocationSpecific\", CSPSnare = \"$this->CSPSnare\", CSPprotrusion = \"$this->CSPprotrusion\", CSPMarginbiopsy = \"$this->CSPMarginbiopsy\", trainingPercentperformed = \"$this->trainingPercentperformed\", trainingtakenoverreason = \"$this->trainingtakenoverreason\", trainingtakenoverreason2 = \"$this->trainingtakenoverreason2\", traineeinjection = \"$this->traineeinjection\", traineeresection = \"$this->traineeresection\", traineestsc = \"$this->traineestsc\", traineedefectcheck = \"$this->traineedefectcheck\", traineeclip = \"$this->traineeclip\", traineespecimenretrieve = \"$this->traineespecimenretrieve\", consultant_agrees_DMI = \"$this->consultant_agrees_DMI\", consultantassistancetraining = \"$this->consultantassistancetraining\", LANS_enrolled = \"$this->LANS_enrolled\", LANS_excluded = \"$this->LANS_excluded\", LANS_excludedwhy = \"$this->LANS_excludedwhy\", LANS_indication = \"$this->LANS_indication\", LANS_prechromokudo_observer1 = \"$this->LANS_prechromokudo_observer1\", LANS_prechromodemarcatedarea_observer1 = \"$this->LANS_prechromodemarcatedarea_observer1\", LANS_prechromosmi_observer1 = \"$this->LANS_prechromosmi_observer1\", LANS_prechromosmiconfidence_observer1 = \"$this->LANS_prechromosmiconfidence_observer1\", LANS_observer1 = \"$this->LANS_observer1\", LANS_observer2 = \"$this->LANS_observer2\", LANS_postchromokudo_observer1 = \"$this->LANS_postchromokudo_observer1\", LANS_postchromosmi_observer1 = \"$this->LANS_postchromosmi_observer1\", LANS_postchromosmiconfidence_observer1 = \"$this->LANS_postchromosmiconfidence_observer1\", LANS_postchromodemarcatedarea_observer1 = \"$this->LANS_postchromodemarcatedarea_observer1\", LANS_prechromokudo_observer2 = \"$this->LANS_prechromokudo_observer2\", LANS_prechromodemarcatedarea_observer2 = \"$this->LANS_prechromodemarcatedarea_observer2\", LANS_prechromosmi_observer2 = \"$this->LANS_prechromosmi_observer2\", LANS_prechromosmiconfidence_observer2 = \"$this->LANS_prechromosmiconfidence_observer2\", LANS_postchromokudo_observer2 = \"$this->LANS_postchromokudo_observer2\", LANS_postchromodemarcatedarea_observer2 = \"$this->LANS_postchromodemarcatedarea_observer2\", LANS_postchromosmi_observer2 = \"$this->LANS_postchromosmi_observer2\", LANS_postchromosmiconfidence_observer2 = \"$this->LANS_postchromosmiconfidence_observer2\", LANS_comment = \"$this->LANS_comment\", IsNumberNodules = \"$this->IsNumberNodules\", IsSizeDominantNodule = \"$this->IsSizeDominantNodule\", IsNumberNodulesLarger8mm = \"$this->IsNumberNodulesLarger8mm\", IsLesionInclude = \"$this->IsLesionInclude\", LPexcision = \"$this->LPexcision\", ICVFat = \"$this->ICVFat\", StalkStudy = \"$this->StalkStudy\", StalkNumber = \"$this->StalkNumber\", StalkHisto1 = \"$this->StalkHisto1\", StalkHisto2 = \"$this->StalkHisto2\", Significant_pain_requiring_control_PAIN = \"$this->Significant_pain_requiring_control_PAIN\", Consent_pain = \"$this->Consent_pain\", TempAtEntry_PAIN = \"$this->TempAtEntry_PAIN\", TempAtPain_PAIN = \"$this->TempAtPain_PAIN\", TempAtExit_PAIN = \"$this->TempAtExit_PAIN\", VASAtEntry_PAIN = \"$this->VASAtEntry_PAIN\", VasAtPain_PAIN = \"$this->VasAtPain_PAIN\", VASAtExit_PAIN = \"$this->VASAtExit_PAIN\", Length_of_pain_PAIN = \"$this->Length_of_pain_PAIN\", Time_to_pain_PAIN = \"$this->Time_to_pain_PAIN\", Intervention_Conservative_1_PAIN = \"$this->Intervention_Conservative_1_PAIN\", Intervention2_PAIN = \"$this->Intervention2_PAIN\", Intervention_Conservative_2_PAIN = \"$this->Intervention_Conservative_2_PAIN\", Intervention_Non_Conservative_1_PAIN = \"$this->Intervention_Non_Conservative_1_PAIN\", Investigation_findings_PAIN = \"$this->Investigation_findings_PAIN\", Surgery_findings_PAIN = \"$this->Surgery_findings_PAIN\", Extended_recovery_PAIN = \"$this->Extended_recovery_PAIN\", Propofol_PAIN = \"$this->Propofol_PAIN\", Fentanyl_PAIN = \"$this->Fentanyl_PAIN\", Buscopan_PAIN = \"$this->Buscopan_PAIN\", Glucagon_PAIN = \"$this->Glucagon_PAIN\", Paracetemol_PAIN = \"$this->Paracetemol_PAIN\", Intraprocedural_paracetemol_Number_PAIN = \"$this->Intraprocedural_paracetemol_Number_PAIN\", Anaesthetic_PAIN = \"$this->Anaesthetic_PAIN\", Paracetemol_post_PAIN = \"$this->Paracetemol_post_PAIN\", Fentanyl_post_PAIN = \"$this->Fentanyl_post_PAIN\", Other_post_PAIN = \"$this->Other_post_PAIN\", Opiod_painkiller = \"$this->Opiod_painkiller\", TimeinRoomPAIN = \"$this->TimeinRoomPAIN\", TimeinRecoveryPAIN = \"$this->TimeinRecoveryPAIN\", TimeinProcedurePAIN = \"$this->TimeinProcedurePAIN\", TimeinParacetemolPAIN = \"$this->TimeinParacetemolPAIN\", TimeinFentanylPAIN = \"$this->TimeinFentanylPAIN\", TimeNoFurtherPainPAIN = \"$this->TimeNoFurtherPainPAIN\", Timein2ndStagePAIN = \"$this->Timein2ndStagePAIN\", TimeinExitPAIN = \"$this->TimeinExitPAIN\", ARJRopivPAINandLESION = \"$this->ARJRopivPAINandLESION\" where _k_lesion = \"$this->_k_lesion\"";

		//echo $query;

		//$query = implode(" ", $query);
		$result = $this->connection->RunUpdateQuery($query);
		return $result;

	}
	
	//!Query generators

	public function generate_query_LANS() {

		//set from GET enters values into the class

		//use only those required here

		//

		$ov = get_object_vars($this);
		
		if ($ov['connection'] != ''){
			unset($ov['connection']);
		}
		
		unset($ov['lesionid']);
		
		unset($ov['_k_lesion']);



		$ovMod = array();
		foreach ($ov as $key=>$value){

			if ($value != ''){

				$ovMod[$key] = $value;
			}

		}

		foreach ($ovMod as $key => $value) {

			$value = "'$value'";
			$updates[] = "$key = $value";

		}

		$implodeArray = implode(', ', $updates);

		//print_r($implodeArray);

		$q = "UPDATE `Lesion` SET $implodeArray WHERE _k_lesion = \"$this->_k_lesion\"";
		
		//print_r($q);
		return $q;


	}

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

				$ovMod[$key] = $value;
			}

		}

		foreach ($ovMod as $key => $value) {

			$value = "'$value'";
			$updates[] = "$key = $value";

		}

		$implodeArray = implode(', ', $updates);

		//print_r($implodeArray);

		$q = "UPDATE `Lesion` SET $implodeArray WHERE _k_lesion = \"$this->_k_lesion\"";

		//print_r($ovMod);
		//print_r($q);

		//$q = "UPDATE guests set firstname = \"$this->firstname\", surname = \"$this->surname\", otherhalf = \"$this->otherhalf\", firstround = \"$this->firstround\", language = \"$this->language\", firstroundprob = \"$this->firstroundprob\", secondround = \"$this->secondround\", addressedTo = \"$this->addressedTo\", email = \"$this->email\", number = \"$this->number\", Party = \"$this->Party\", townHall = \"$this->townHall\", dietary = \"$this->dietary\", kids = \"$this->kids\", stayLocation = \"$this->stayLocation\", stayHotel = \"$this->stayHotel\", arrivalDate = \"$this->arrivalDate\", over40 = \"$this->over40\", mailAddress1 = \"$this->mailAddress1\", mailAddress2 = \"$this->mailAddress2\", mailAddressTown = \"$this->mailAddressTown\", mailAddressCountry = \"$this->mailAddressCountry\", mailAddressCounty = \"$this->mailAddressCounty\", mailAddressPostcode = \"$this->mailAddressPostcode\", gift = \"$this->gift\", giftAmount = \"$this->giftAmount\", replySaveTheDate = \"$this->replySaveTheDate\", replyInvitation = \"$this->replyInvitation\", random = \"$this->random\" where guestid = \"$this->guestid\"";
		//print_r($q);
		$result = $this->connection->RunQuery($q);
		//echo $result;
		return $result;

	}


	public function Save_Active_Row_Transmit_q(){

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

				$ovMod[$key] = $value;
			}

		}

		foreach ($ovMod as $key => $value) {

			$value = "'$value'";
			$updates[] = "$key = $value";

		}

		$implodeArray = implode(', ', $updates);

		//print_r($implodeArray);

		$q = "UPDATE `Lesion` SET $implodeArray WHERE _k_lesion = \"$this->_k_lesion\"";

		//print_r($ovMod);
		//print_r($q);

		//$q = "UPDATE guests set firstname = \"$this->firstname\", surname = \"$this->surname\", otherhalf = \"$this->otherhalf\", firstround = \"$this->firstround\", language = \"$this->language\", firstroundprob = \"$this->firstroundprob\", secondround = \"$this->secondround\", addressedTo = \"$this->addressedTo\", email = \"$this->email\", number = \"$this->number\", Party = \"$this->Party\", townHall = \"$this->townHall\", dietary = \"$this->dietary\", kids = \"$this->kids\", stayLocation = \"$this->stayLocation\", stayHotel = \"$this->stayHotel\", arrivalDate = \"$this->arrivalDate\", over40 = \"$this->over40\", mailAddress1 = \"$this->mailAddress1\", mailAddress2 = \"$this->mailAddress2\", mailAddressTown = \"$this->mailAddressTown\", mailAddressCountry = \"$this->mailAddressCountry\", mailAddressCounty = \"$this->mailAddressCounty\", mailAddressPostcode = \"$this->mailAddressPostcode\", gift = \"$this->gift\", giftAmount = \"$this->giftAmount\", replySaveTheDate = \"$this->replySaveTheDate\", replyInvitation = \"$this->replyInvitation\", random = \"$this->random\" where guestid = \"$this->guestid\"";
		//print_r($q);

		//echo $result;
		return $q;

	}



	public function Save_Active_Row_OLD(){
		$this->connection->RunUpdateQuery("UPDATE Lesion set _k_procedure = \"$this->_k_procedure\", PreviousAttempt = \"$this->PreviousAttempt\", PreviousBiopsy = \"$this->PreviousBiopsy\", PreviousSPOT = \"$this->PreviousSPOT\", IntendedProcedure = \"$this->IntendedProcedure\", ActualPredominantProcedure = \"$this->ActualPredominantProcedure\", Size = \"$this->Size\", Location = \"$this->Location\", Paris = \"$this->Paris\", Morphology = \"$this->Morphology\", HighestKudo = \"$this->HighestKudo\", HighestSano = \"$this->HighestSano\", Predict_Cancer = \"$this->Predict_Cancer\", Predict_Histo = \"$this->Predict_Histo\", Predict_Histo_Confidence = \"$this->Predict_Histo_Confidence\", Feat_Invasion = \"$this->Feat_Invasion\", EnBloc = \"$this->EnBloc\", Access = \"$this->Access\", EMRAttempted = \"$this->EMRAttempted\", SMInjection = \"$this->SMInjection\", Constituent = \"$this->Constituent\", Constituent_other = \"$this->Constituent_other\", Adrenaline = \"$this->Adrenaline\", Dye = \"$this->Dye\", No_Injection = \"$this->No_Injection\", Lifting = \"$this->Lifting\", SnareType = \"$this->SnareType\", SnareSize = \"$this->SnareSize\", EndoscopeCapUsed = \"$this->EndoscopeCapUsed\", Current = \"$this->Current\", No_Pieces = \"$this->No_Pieces\", SnareExcision = \"$this->SnareExcision\", AddModality = \"$this->AddModality\", SuccessfulEMR = \"$this->SuccessfulEMR\", STSC_Margin = \"$this->STSC_Margin\", SCAR_complete = \"$this->SCAR_complete\", DefectTattoo = \"$this->DefectTattoo\", BookTwoStage = \"$this->BookTwoStage\", IPBleed = \"$this->IPBleed\", IPBleed_Control = \"$this->IPBleed_Control\", SMF = \"$this->SMF\", SMF_Fgrade = \"$this->SMF_Fgrade\", SMF_Prediction = \"$this->SMF_Prediction\", SMF_Prediction_confidence = \"$this->SMF_Prediction_confidence\", CentralSMF = \"$this->CentralSMF\", FibrosisCancerRisk = \"$this->FibrosisCancerRisk\", ProcedureStoppedCancer = \"$this->ProcedureStoppedCancer\", OverlyingFold = \"$this->OverlyingFold\", FibrosisofSignificance = \"$this->FibrosisofSignificance\", DeepInjury = \"$this->DeepInjury\", IPPerforation = \"$this->IPPerforation\", IPPerforation_Rx = \"$this->IPPerforation_Rx\", Defect_Clip_Closure = \"$this->Defect_Clip_Closure\", Defect_Clip_Closure_Number = \"$this->Defect_Clip_Closure_Number\", Duration = \"$this->Duration\", DurationComplication = \"$this->DurationComplication\", HistoPathMajor = \"$this->HistoPathMajor\", Cancer = \"$this->Cancer\", Dysplasia = \"$this->Dysplasia\", SMInvasion = \"$this->SMInvasion\", Margins = \"$this->Margins\", SpecimenSize = \"$this->SpecimenSize\", DelayedBleed = \"$this->DelayedBleed\", DelayedBleed_Admit = \"$this->DelayedBleed_Admit\", DelayedBleed_Colon = \"$this->DelayedBleed_Colon\", DelayedPerforation = \"$this->DelayedPerforation\", DelayedPerforation_Rx = \"$this->DelayedPerforation_Rx\", Disposition2Weeks = \"$this->Disposition2Weeks\", FollowUp2Weeks = \"$this->FollowUp2Weeks\", SurgReferral = \"$this->SurgReferral\", FirstFU = \"$this->FirstFU\", FirstFUMonths = \"$this->FirstFUMonths\", FirstFUDate = \"$this->FirstFUDate\", FirstFURecurrence = \"$this->FirstFURecurrence\", FirstFUNoRecurScarBx = \"$this->FirstFUNoRecurScarBx\", FirstFURecurrenceSites = \"$this->FirstFURecurrenceSites\", FirstFURecurrenceLocation = \"$this->FirstFURecurrenceLocation\", FirstFURecurrenceLargest = \"$this->FirstFURecurrenceLargest\", FirstFURecurrenceRx = \"$this->FirstFURecurrenceRx\", FirstFURecurrenceExcision = \"$this->FirstFURecurrenceExcision\", FirstFURecurrenceNotes = \"$this->FirstFURecurrenceNotes\", FirstFURecurHisto = \"$this->FirstFURecurHisto\", FirstFURecurHistoDysplasia = \"$this->FirstFURecurHistoDysplasia\", FirstFUNextColon_Mths = \"$this->FirstFUNextColon_Mths\", FirstFUOutcome = \"$this->FirstFUOutcome\", FirstFUDisposition = \"$this->FirstFUDisposition\", FirstFUSurgery = \"$this->FirstFUSurgery\", FirstFUSurgeryMethod = \"$this->FirstFUSurgeryMethod\", FirstFUSurgeryResidual = \"$this->FirstFUSurgeryResidual\", FirstFUSurgeryType = \"$this->FirstFUSurgeryType\", FirstFUSurgeryNotes = \"$this->FirstFUSurgeryNotes\", SecondFU = \"$this->SecondFU\", SecondFUMonths = \"$this->SecondFUMonths\", SecondFUDate = \"$this->SecondFUDate\", SecondFURecurrence = \"$this->SecondFURecurrence\", SecondFUNoRecurScarBx = \"$this->SecondFUNoRecurScarBx\", SecondFURecurrenceLargest = \"$this->SecondFURecurrenceLargest\", SecondFURecurrenceLocation = \"$this->SecondFURecurrenceLocation\", SecondFURecurrenceSites = \"$this->SecondFURecurrenceSites\", SecondFUDisposition = \"$this->SecondFUDisposition\", SecondFURecurrenceRx = \"$this->SecondFURecurrenceRx\", SecondFURecurrenceExcision = \"$this->SecondFURecurrenceExcision\", SecondFURecurrenceNotes = \"$this->SecondFURecurrenceNotes\", SecondFURecurHistoDysplasia = \"$this->SecondFURecurHistoDysplasia\", SecondFUNextColon_Mths = \"$this->SecondFUNextColon_Mths\", SecondFUOutcome = \"$this->SecondFUOutcome\", SecondFUSurgery = \"$this->SecondFUSurgery\", SecondFUSurgeryNotes = \"$this->SecondFUSurgeryNotes\", SecondFURecurHisto = \"$this->SecondFURecurHisto\", SecondFUSurgeryMethod = \"$this->SecondFUSurgeryMethod\", SecondFUSurgeryResidual = \"$this->SecondFUSurgeryResidual\", SecondFUSurgeryType = \"$this->SecondFUSurgeryType\", ThirdFU = \"$this->ThirdFU\", ThirdFUDate = \"$this->ThirdFUDate\", ThirdFUMonths = \"$this->ThirdFUMonths\", ThirdFUDisposition = \"$this->ThirdFUDisposition\", ThirdFUNoRecurScarBx = \"$this->ThirdFUNoRecurScarBx\", ThirdFUOutcome = \"$this->ThirdFUOutcome\", ThirdFUPostSurgery = \"$this->ThirdFUPostSurgery\", ThirdFURecurHisto = \"$this->ThirdFURecurHisto\", ThirdFURecurrence = \"$this->ThirdFURecurrence\", ThirdFURecurrenceExcision = \"$this->ThirdFURecurrenceExcision\", ThirdFURecurrenceRx = \"$this->ThirdFURecurrenceRx\", ThirdFURecurrenceSites = \"$this->ThirdFURecurrenceSites\", ThirdFURecurrenceLocation = \"$this->ThirdFURecurrenceLocation\", ThirdFURecurrenceLargest = \"$this->ThirdFURecurrenceLargest\", ThirdFURecurrenceNotes = \"$this->ThirdFURecurrenceNotes\", ThirdFURecurHistoDysplasia = \"$this->ThirdFURecurHistoDysplasia\", ThirdFUNextColon_Mths = \"$this->ThirdFUNextColon_Mths\", ThirdFUSurgeryNotes = \"$this->ThirdFUSurgeryNotes\", ThirdFUSurgeryMethod = \"$this->ThirdFUSurgeryMethod\", ThirdFUSurgeryResidual = \"$this->ThirdFUSurgeryResidual\", ThirdFUSurgeryType = \"$this->ThirdFUSurgeryType\", FourthFU = \"$this->FourthFU\", FourthFUMonths = \"$this->FourthFUMonths\", FourthFURecurrenceLocation = \"$this->FourthFURecurrenceLocation\", FourthFURecurrenceLargest = \"$this->FourthFURecurrenceLargest\", FourthFURecurrenceNotes = \"$this->FourthFURecurrenceNotes\", FourthFURecurHistoDysplasia = \"$this->FourthFURecurHistoDysplasia\", FourthFUNextColon_Mnths = \"$this->FourthFUNextColon_Mnths\", FourthFUSurgeryResidual = \"$this->FourthFUSurgeryResidual\", FourthFUDate = \"$this->FourthFUDate\", FourthFUDisposition = \"$this->FourthFUDisposition\", FourthFUNoRecurScarBx = \"$this->FourthFUNoRecurScarBx\", FourthFUOutcome = \"$this->FourthFUOutcome\", FourthFUPostSurgery = \"$this->FourthFUPostSurgery\", FourthFURecurHisto = \"$this->FourthFURecurHisto\", FourthFURecurrence = \"$this->FourthFURecurrence\", FourthFURecurrenceExcision = \"$this->FourthFURecurrenceExcision\", FourthFURecurrenceRx = \"$this->FourthFURecurrenceRx\", FourthFURecurrenceSites = \"$this->FourthFURecurrenceSites\", FourthFUSurgeryMethod = \"$this->FourthFUSurgeryMethod\", FourthFUSurgeryNotes = \"$this->FourthFUSurgeryNotes\", FourthFUSurgeryType = \"$this->FourthFUSurgeryType\", ClinSignificantBleedYN = \"$this->ClinSignificantBleedYN\", ClinSignificantPerfYN = \"$this->ClinSignificantPerfYN\", SSACharact_Dysplasia = \"$this->SSACharact_Dysplasia\", SSACharact_Dysplasia_Confidence = \"$this->SSACharact_Dysplasia_Confidence\", IPPerforation_Clips = \"$this->IPPerforation_Clips\", NICE_Overall = \"$this->NICE_Overall\", FirstFURecurrenceClipArtifact = \"$this->FirstFURecurrenceClipArtifact\", SecondFURecurrenceClipArtifact = \"$this->SecondFURecurrenceClipArtifact\", ThirdFURecurrenceClipArtifact = \"$this->ThirdFURecurrenceClipArtifact\", FourthFURecurrenceClipArtifact = \"$this->FourthFURecurrenceClipArtifact\", SERT_size = \"$this->SERT_size\", SERT_ipb = \"$this->SERT_ipb\", SERT_dysplasia = \"$this->SERT_dysplasia\", created = \"$this->created\", creating_user = \"$this->creating_user\", updated = \"$this->updated\", updating_user = \"$this->updating_user\", entrytype = \"$this->entrytype\", save = \"$this->save\", consent_PROSPER = \"$this->consent_PROSPER\", inPROSPER = \"$this->inPROSPER\", SERT = \"$this->SERT\", completeColon_PROSPER = \"$this->completeColon_PROSPER\", defectTattoo_PROSPER = \"$this->defectTattoo_PROSPER\", dateEnrolled_PROSPER = \"$this->dateEnrolled_PROSPER\", variation_PROSPER = \"$this->variation_PROSPER\", PROSPERSCDue = \"$this->PROSPERSCDue\", CLIP_consent = \"$this->CLIP_consent\", CLIP_preEMRexclusion = \"$this->CLIP_preEMRexclusion\", CLIP_postEMRexclusion = \"$this->CLIP_postEMRexclusion\", CLIP_randomisation = \"$this->CLIP_randomisation\", CLIP_category = \"$this->CLIP_category\", CLIP_active_closure_complete = \"$this->CLIP_active_closure_complete\", CLIP_active_closure_number = \"$this->CLIP_active_closure_number\", CLIP_no_closure_reason = \"$this->CLIP_no_closure_reason\", CLIP_doppler = \"$this->CLIP_doppler\", CLIP_doppler_signal = \"$this->CLIP_doppler_signal\", CLIP_doppler_signal_location = \"$this->CLIP_doppler_signal_location\", CLIP_doppler_signal_area_clipped = \"$this->CLIP_doppler_signal_area_clipped\", CLIP_notes = \"$this->CLIP_notes\", SMSA = \"$this->SMSA\", ESDType = \"$this->ESDType\", ESDTraineeID = \"$this->ESDTraineeID\", ESDTrainingCase = \"$this->ESDTrainingCase\", ESDTrainingCaseSelfCompleted = \"$this->ESDTrainingCaseSelfCompleted\", ESDTrainingCaseStageTakeoverCompleted = \"$this->ESDTrainingCaseStageTakeoverCompleted\", ESDTrainingCaseStageTakeoverReason = \"$this->ESDTrainingCaseStageTakeoverReason\", ESDTrainingCaseStageTakeoverReasonText = \"$this->ESDTrainingCaseStageTakeoverReasonText\", ESDhighDefScope = \"$this->ESDhighDefScope\", ESDcutCurrent = \"$this->ESDcutCurrent\", ESDcutCurrentWatts = \"$this->ESDcutCurrentWatts\", ESDcutCurrentEffect = \"$this->ESDcutCurrentEffect\", ESDcoagCurrent = \"$this->ESDcoagCurrent\", ESDcoagCurrentEffect = \"$this->ESDcoagCurrentEffect\", ESDcoagCurrentWatts = \"$this->ESDcoagCurrentWatts\", ESDIPBControl = \"$this->ESDIPBControl\", ESDIPBProphylacticCoag = \"$this->ESDIPBProphylacticCoag\", ESDPocket = \"$this->ESDPocket\", ESDaddSnareExcision = \"$this->ESDaddSnareExcision\", ESDnoPieces = \"$this->ESDnoPieces\", ESDknifeType1 = \"$this->ESDknifeType1\", ESDknifeType2 = \"$this->ESDknifeType2\", ESDflushingPump = \"$this->ESDflushingPump\", ESDtractionTechnique = \"$this->ESDtractionTechnique\", ESDdurationTotal = \"$this->ESDdurationTotal\", ESDdurationIncision = \"$this->ESDdurationIncision\", ESDdurationDissection = \"$this->ESDdurationDissection\", ESDdurationDefectAssess = \"$this->ESDdurationDefectAssess\", ESDlesionRemoved = \"$this->ESDlesionRemoved\", ESDenblocEndo = \"$this->ESDenblocEndo\", ESDdefectMuscleInjury = \"$this->ESDdefectMuscleInjury\", ESDHistoDimensionx = \"$this->ESDHistoDimensionx\", ESDHistoDimensiony = \"$this->ESDHistoDimensiony\", ESDHistoEnBloc = \"$this->ESDHistoEnBloc\", ESDHistoR0 = \"$this->ESDHistoR0\", ESDHistoVM = \"$this->ESDHistoVM\", ESDHistoHM = \"$this->ESDHistoHM\", ESDHistoType = \"$this->ESDHistoType\", ESDHistoDysplasia = \"$this->ESDHistoDysplasia\", ESDHistoInvasive = \"$this->ESDHistoInvasive\", ESDHistoSMICDepth = \"$this->ESDHistoSMICDepth\", ESDHistoSMICLVI = \"$this->ESDHistoSMICLVI\", ESDHistoSMICLVIconfidence = \"$this->ESDHistoSMICLVIconfidence\", ESDHistoSMICTB = \"$this->ESDHistoSMICTB\", ESDHistoSMICDifferentiation = \"$this->ESDHistoSMICDifferentiation\", ESDgeneralnotes = \"$this->ESDgeneralnotes\", ESDSurgeryNotes = \"$this->ESDSurgeryNotes\", inCSPEMRRCT = \"$this->inCSPEMRRCT\", Descriptor = \"$this->Descriptor\", CSPExcluded = \"$this->CSPExcluded\", CSPExclusionReason = \"$this->CSPExclusionReason\", CSPRandomisation = \"$this->CSPRandomisation\", Locationcm = \"$this->Locationcm\", LocationSpecific = \"$this->LocationSpecific\", CSPSnare = \"$this->CSPSnare\", CSPprotrusion = \"$this->CSPprotrusion\", CSPMarginbiopsy = \"$this->CSPMarginbiopsy\", trainingPercentperformed = \"$this->trainingPercentperformed\", trainingtakenoverreason = \"$this->trainingtakenoverreason\", trainingtakenoverreason2 = \"$this->trainingtakenoverreason2\", traineeinjection = \"$this->traineeinjection\", traineeresection = \"$this->traineeresection\", traineestsc = \"$this->traineestsc\", traineedefectcheck = \"$this->traineedefectcheck\", traineeclip = \"$this->traineeclip\", traineespecimenretrieve = \"$this->traineespecimenretrieve\", consultant_agrees_DMI = \"$this->consultant_agrees_DMI\", consultantassistancetraining = \"$this->consultantassistancetraining\", LANS_enrolled = \"$this->LANS_enrolled\", LANS_excluded = \"$this->LANS_excluded\", LANS_excludedwhy = \"$this->LANS_excludedwhy\", LANS_indication = \"$this->LANS_indication\", LANS_prechromokudo_observer1 = \"$this->LANS_prechromokudo_observer1\", LANS_prechromodemarcatedarea_observer1 = \"$this->LANS_prechromodemarcatedarea_observer1\", LANS_prechromosmi_observer1 = \"$this->LANS_prechromosmi_observer1\", LANS_prechromosmiconfidence_observer1 = \"$this->LANS_prechromosmiconfidence_observer1\", LANS_observer1 = \"$this->LANS_observer1\", LANS_observer2 = \"$this->LANS_observer2\", LANS_postchromokudo_observer1 = \"$this->LANS_postchromokudo_observer1\", LANS_postchromosmi_observer1 = \"$this->LANS_postchromosmi_observer1\", LANS_postchromosmiconfidence_observer1 = \"$this->LANS_postchromosmiconfidence_observer1\", LANS_postchromodemarcatedarea_observer1 = \"$this->LANS_postchromodemarcatedarea_observer1\", LANS_prechromokudo_observer2 = \"$this->LANS_prechromokudo_observer2\", LANS_prechromodemarcatedarea_observer2 = \"$this->LANS_prechromodemarcatedarea_observer2\", LANS_prechromosmi_observer2 = \"$this->LANS_prechromosmi_observer2\", LANS_prechromosmiconfidence_observer2 = \"$this->LANS_prechromosmiconfidence_observer2\", LANS_postchromokudo_observer2 = \"$this->LANS_postchromokudo_observer2\", LANS_postchromodemarcatedarea_observer2 = \"$this->LANS_postchromodemarcatedarea_observer2\", LANS_postchromosmi_observer2 = \"$this->LANS_postchromosmi_observer2\", LANS_postchromosmiconfidence_observer2 = \"$this->LANS_postchromosmiconfidence_observer2\", LANS_comment = \"$this->LANS_comment\", IsNumberNodules = \"$this->IsNumberNodules\", IsSizeDominantNodule = \"$this->IsSizeDominantNodule\", IsNumberNodulesLarger8mm = \"$this->IsNumberNodulesLarger8mm\", IsLesionInclude = \"$this->IsLesionInclude\", LPexcision = \"$this->LPexcision\", ICVFat = \"$this->ICVFat\", StalkStudy = \"$this->StalkStudy\", StalkNumber = \"$this->StalkNumber\", StalkHisto1 = \"$this->StalkHisto1\", StalkHisto2 = \"$this->StalkHisto2\", Significant_pain_requiring_control_PAIN = \"$this->Significant_pain_requiring_control_PAIN\", Consent_pain = \"$this->Consent_pain\", TempAtEntry_PAIN = \"$this->TempAtEntry_PAIN\", TempAtPain_PAIN = \"$this->TempAtPain_PAIN\", TempAtExit_PAIN = \"$this->TempAtExit_PAIN\", VASAtEntry_PAIN = \"$this->VASAtEntry_PAIN\", VasAtPain_PAIN = \"$this->VasAtPain_PAIN\", VASAtExit_PAIN = \"$this->VASAtExit_PAIN\", Length_of_pain_PAIN = \"$this->Length_of_pain_PAIN\", Time_to_pain_PAIN = \"$this->Time_to_pain_PAIN\", Intervention_Conservative_1_PAIN = \"$this->Intervention_Conservative_1_PAIN\", Intervention2_PAIN = \"$this->Intervention2_PAIN\", Intervention_Conservative_2_PAIN = \"$this->Intervention_Conservative_2_PAIN\", Intervention_Non_Conservative_1_PAIN = \"$this->Intervention_Non_Conservative_1_PAIN\", Investigation_findings_PAIN = \"$this->Investigation_findings_PAIN\", Surgery_findings_PAIN = \"$this->Surgery_findings_PAIN\", Extended_recovery_PAIN = \"$this->Extended_recovery_PAIN\", Propofol_PAIN = \"$this->Propofol_PAIN\", Fentanyl_PAIN = \"$this->Fentanyl_PAIN\", Buscopan_PAIN = \"$this->Buscopan_PAIN\", Glucagon_PAIN = \"$this->Glucagon_PAIN\", Paracetemol_PAIN = \"$this->Paracetemol_PAIN\", Intraprocedural_paracetemol_Number_PAIN = \"$this->Intraprocedural_paracetemol_Number_PAIN\", Anaesthetic_PAIN = \"$this->Anaesthetic_PAIN\", Paracetemol_post_PAIN = \"$this->Paracetemol_post_PAIN\", Fentanyl_post_PAIN = \"$this->Fentanyl_post_PAIN\", Other_post_PAIN = \"$this->Other_post_PAIN\", Opiod_painkiller = \"$this->Opiod_painkiller\", TimeinRoomPAIN = \"$this->TimeinRoomPAIN\", TimeinRecoveryPAIN = \"$this->TimeinRecoveryPAIN\", TimeinProcedurePAIN = \"$this->TimeinProcedurePAIN\", TimeinParacetemolPAIN = \"$this->TimeinParacetemolPAIN\", TimeinFentanylPAIN = \"$this->TimeinFentanylPAIN\", TimeNoFurtherPainPAIN = \"$this->TimeNoFurtherPainPAIN\", Timein2ndStagePAIN = \"$this->Timein2ndStagePAIN\", TimeinExitPAIN = \"$this->TimeinExitPAIN\", ARJRopivPAINandLESION = \"$this->ARJRopivPAINandLESION\" where _k_lesion = \"$this->_k_lesion\"");
	}

	/**
	 * Save the active var class as a new row on table
	 */
	public function Save_Active_Row_as_New(){
		$this->connection->RunQuery("Insert into Lesion (_k_procedure, PreviousAttempt, PreviousBiopsy, PreviousSPOT, IntendedProcedure, ActualPredominantProcedure, Size, Location, Paris, Morphology, HighestKudo, HighestSano, Predict_Cancer, Predict_Histo, Predict_Histo_Confidence, Feat_Invasion, EnBloc, Access, EMRAttempted, SMInjection, Constituent, Constituent_other, Adrenaline, Dye, No_Injection, Lifting, SnareType, SnareSize, EndoscopeCapUsed, Current, No_Pieces, SnareExcision, AddModality, SuccessfulEMR, STSC_Margin, SCAR_complete, DefectTattoo, BookTwoStage, IPBleed, IPBleed_Control, SMF, SMF_Fgrade, SMF_Prediction, SMF_Prediction_confidence, CentralSMF, FibrosisCancerRisk, ProcedureStoppedCancer, OverlyingFold, FibrosisofSignificance, DeepInjury, IPPerforation, IPPerforation_Rx, Defect_Clip_Closure, Defect_Clip_Closure_Number, Duration, DurationComplication, HistoPathMajor, Cancer, Dysplasia, SMInvasion, Margins, SpecimenSize, DelayedBleed, DelayedBleed_Admit, DelayedBleed_Colon, DelayedPerforation, DelayedPerforation_Rx, Disposition2Weeks, FollowUp2Weeks, SurgReferral, FirstFU, FirstFUMonths, FirstFUDate, FirstFURecurrence, FirstFUNoRecurScarBx, FirstFURecurrenceSites, FirstFURecurrenceLocation, FirstFURecurrenceLargest, FirstFURecurrenceRx, FirstFURecurrenceExcision, FirstFURecurrenceNotes, FirstFURecurHisto, FirstFURecurHistoDysplasia, FirstFUNextColon_Mths, FirstFUOutcome, FirstFUDisposition, FirstFUSurgery, FirstFUSurgeryMethod, FirstFUSurgeryResidual, FirstFUSurgeryType, FirstFUSurgeryNotes, SecondFU, SecondFUMonths, SecondFUDate, SecondFURecurrence, SecondFUNoRecurScarBx, SecondFURecurrenceLargest, SecondFURecurrenceLocation, SecondFURecurrenceSites, SecondFUDisposition, SecondFURecurrenceRx, SecondFURecurrenceExcision, SecondFURecurrenceNotes, SecondFURecurHistoDysplasia, SecondFUNextColon_Mths, SecondFUOutcome, SecondFUSurgery, SecondFUSurgeryNotes, SecondFURecurHisto, SecondFUSurgeryMethod, SecondFUSurgeryResidual, SecondFUSurgeryType, ThirdFU, ThirdFUDate, ThirdFUMonths, ThirdFUDisposition, ThirdFUNoRecurScarBx, ThirdFUOutcome, ThirdFUPostSurgery, ThirdFURecurHisto, ThirdFURecurrence, ThirdFURecurrenceExcision, ThirdFURecurrenceRx, ThirdFURecurrenceSites, ThirdFURecurrenceLocation, ThirdFURecurrenceLargest, ThirdFURecurrenceNotes, ThirdFURecurHistoDysplasia, ThirdFUNextColon_Mths, ThirdFUSurgeryNotes, ThirdFUSurgeryMethod, ThirdFUSurgeryResidual, ThirdFUSurgeryType, FourthFU, FourthFUMonths, FourthFURecurrenceLocation, FourthFURecurrenceLargest, FourthFURecurrenceNotes, FourthFURecurHistoDysplasia, FourthFUNextColon_Mnths, FourthFUSurgeryResidual, FourthFUDate, FourthFUDisposition, FourthFUNoRecurScarBx, FourthFUOutcome, FourthFUPostSurgery, FourthFURecurHisto, FourthFURecurrence, FourthFURecurrenceExcision, FourthFURecurrenceRx, FourthFURecurrenceSites, FourthFUSurgeryMethod, FourthFUSurgeryNotes, FourthFUSurgeryType, ClinSignificantBleedYN, ClinSignificantPerfYN, SSACharact_Dysplasia, SSACharact_Dysplasia_Confidence, IPPerforation_Clips, NICE_Overall, FirstFURecurrenceClipArtifact, SecondFURecurrenceClipArtifact, ThirdFURecurrenceClipArtifact, FourthFURecurrenceClipArtifact, SERT_size, SERT_ipb, SERT_dysplasia, created, creating_user, updated, updating_user, entrytype, save, consent_PROSPER, inPROSPER, SERT, completeColon_PROSPER, defectTattoo_PROSPER, dateEnrolled_PROSPER, variation_PROSPER, PROSPERSCDue, CLIP_consent, CLIP_preEMRexclusion, CLIP_postEMRexclusion, CLIP_randomisation, CLIP_category, CLIP_active_closure_complete, CLIP_active_closure_number, CLIP_no_closure_reason, CLIP_doppler, CLIP_doppler_signal, CLIP_doppler_signal_location, CLIP_doppler_signal_area_clipped, CLIP_notes, SMSA, ESDType, ESDTraineeID, ESDTrainingCase, ESDTrainingCaseSelfCompleted, ESDTrainingCaseStageTakeoverCompleted, ESDTrainingCaseStageTakeoverReason, ESDTrainingCaseStageTakeoverReasonText, ESDhighDefScope, ESDcutCurrent, ESDcutCurrentWatts, ESDcutCurrentEffect, ESDcoagCurrent, ESDcoagCurrentEffect, ESDcoagCurrentWatts, ESDIPBControl, ESDIPBProphylacticCoag, ESDPocket, ESDaddSnareExcision, ESDnoPieces, ESDknifeType1, ESDknifeType2, ESDflushingPump, ESDtractionTechnique, ESDdurationTotal, ESDdurationIncision, ESDdurationDissection, ESDdurationDefectAssess, ESDlesionRemoved, ESDenblocEndo, ESDdefectMuscleInjury, ESDHistoDimensionx, ESDHistoDimensiony, ESDHistoEnBloc, ESDHistoR0, ESDHistoVM, ESDHistoHM, ESDHistoType, ESDHistoDysplasia, ESDHistoInvasive, ESDHistoSMICDepth, ESDHistoSMICLVI, ESDHistoSMICLVIconfidence, ESDHistoSMICTB, ESDHistoSMICDifferentiation, ESDgeneralnotes, ESDSurgeryNotes, inCSPEMRRCT, Descriptor, CSPExcluded, CSPExclusionReason, CSPRandomisation, Locationcm, LocationSpecific, CSPSnare, CSPprotrusion, CSPMarginbiopsy, trainingPercentperformed, trainingtakenoverreason, trainingtakenoverreason2, traineeinjection, traineeresection, traineestsc, traineedefectcheck, traineeclip, traineespecimenretrieve, consultant_agrees_DMI, consultantassistancetraining, LANS_enrolled, LANS_excluded, LANS_excludedwhy, LANS_indication, LANS_prechromokudo_observer1, LANS_prechromodemarcatedarea_observer1, LANS_prechromosmi_observer1, LANS_prechromosmiconfidence_observer1, LANS_observer1, LANS_observer2, LANS_postchromokudo_observer1, LANS_postchromosmi_observer1, LANS_postchromosmiconfidence_observer1, LANS_postchromodemarcatedarea_observer1, LANS_prechromokudo_observer2, LANS_prechromodemarcatedarea_observer2, LANS_prechromosmi_observer2, LANS_prechromosmiconfidence_observer2, LANS_postchromokudo_observer2, LANS_postchromodemarcatedarea_observer2, LANS_postchromosmi_observer2, LANS_postchromosmiconfidence_observer2, LANS_comment, IsNumberNodules, IsSizeDominantNodule, IsNumberNodulesLarger8mm, IsLesionInclude, LPexcision, ICVFat, StalkStudy, StalkNumber, StalkHisto1, StalkHisto2, Significant_pain_requiring_control_PAIN, Consent_pain, TempAtEntry_PAIN, TempAtPain_PAIN, TempAtExit_PAIN, VASAtEntry_PAIN, VasAtPain_PAIN, VASAtExit_PAIN, Length_of_pain_PAIN, Time_to_pain_PAIN, Intervention_Conservative_1_PAIN, Intervention2_PAIN, Intervention_Conservative_2_PAIN, Intervention_Non_Conservative_1_PAIN, Investigation_findings_PAIN, Surgery_findings_PAIN, Extended_recovery_PAIN, Propofol_PAIN, Fentanyl_PAIN, Buscopan_PAIN, Glucagon_PAIN, Paracetemol_PAIN, Intraprocedural_paracetemol_Number_PAIN, Anaesthetic_PAIN, Paracetemol_post_PAIN, Fentanyl_post_PAIN, Other_post_PAIN, Opiod_painkiller, TimeinRoomPAIN, TimeinRecoveryPAIN, TimeinProcedurePAIN, TimeinParacetemolPAIN, TimeinFentanylPAIN, TimeNoFurtherPainPAIN, Timein2ndStagePAIN, TimeinExitPAIN, ARJRopivPAINandLESION) values (\"$this->_k_procedure\", \"$this->PreviousAttempt\", \"$this->PreviousBiopsy\", \"$this->PreviousSPOT\", \"$this->IntendedProcedure\", \"$this->ActualPredominantProcedure\", \"$this->Size\", \"$this->Location\", \"$this->Paris\", \"$this->Morphology\", \"$this->HighestKudo\", \"$this->HighestSano\", \"$this->Predict_Cancer\", \"$this->Predict_Histo\", \"$this->Predict_Histo_Confidence\", \"$this->Feat_Invasion\", \"$this->EnBloc\", \"$this->Access\", \"$this->EMRAttempted\", \"$this->SMInjection\", \"$this->Constituent\", \"$this->Constituent_other\", \"$this->Adrenaline\", \"$this->Dye\", \"$this->No_Injection\", \"$this->Lifting\", \"$this->SnareType\", \"$this->SnareSize\", \"$this->EndoscopeCapUsed\", \"$this->Current\", \"$this->No_Pieces\", \"$this->SnareExcision\", \"$this->AddModality\", \"$this->SuccessfulEMR\", \"$this->STSC_Margin\", \"$this->SCAR_complete\", \"$this->DefectTattoo\", \"$this->BookTwoStage\", \"$this->IPBleed\", \"$this->IPBleed_Control\", \"$this->SMF\", \"$this->SMF_Fgrade\", \"$this->SMF_Prediction\", \"$this->SMF_Prediction_confidence\", \"$this->CentralSMF\", \"$this->FibrosisCancerRisk\", \"$this->ProcedureStoppedCancer\", \"$this->OverlyingFold\", \"$this->FibrosisofSignificance\", \"$this->DeepInjury\", \"$this->IPPerforation\", \"$this->IPPerforation_Rx\", \"$this->Defect_Clip_Closure\", \"$this->Defect_Clip_Closure_Number\", \"$this->Duration\", \"$this->DurationComplication\", \"$this->HistoPathMajor\", \"$this->Cancer\", \"$this->Dysplasia\", \"$this->SMInvasion\", \"$this->Margins\", \"$this->SpecimenSize\", \"$this->DelayedBleed\", \"$this->DelayedBleed_Admit\", \"$this->DelayedBleed_Colon\", \"$this->DelayedPerforation\", \"$this->DelayedPerforation_Rx\", \"$this->Disposition2Weeks\", \"$this->FollowUp2Weeks\", \"$this->SurgReferral\", \"$this->FirstFU\", \"$this->FirstFUMonths\", \"$this->FirstFUDate\", \"$this->FirstFURecurrence\", \"$this->FirstFUNoRecurScarBx\", \"$this->FirstFURecurrenceSites\", \"$this->FirstFURecurrenceLocation\", \"$this->FirstFURecurrenceLargest\", \"$this->FirstFURecurrenceRx\", \"$this->FirstFURecurrenceExcision\", \"$this->FirstFURecurrenceNotes\", \"$this->FirstFURecurHisto\", \"$this->FirstFURecurHistoDysplasia\", \"$this->FirstFUNextColon_Mths\", \"$this->FirstFUOutcome\", \"$this->FirstFUDisposition\", \"$this->FirstFUSurgery\", \"$this->FirstFUSurgeryMethod\", \"$this->FirstFUSurgeryResidual\", \"$this->FirstFUSurgeryType\", \"$this->FirstFUSurgeryNotes\", \"$this->SecondFU\", \"$this->SecondFUMonths\", \"$this->SecondFUDate\", \"$this->SecondFURecurrence\", \"$this->SecondFUNoRecurScarBx\", \"$this->SecondFURecurrenceLargest\", \"$this->SecondFURecurrenceLocation\", \"$this->SecondFURecurrenceSites\", \"$this->SecondFUDisposition\", \"$this->SecondFURecurrenceRx\", \"$this->SecondFURecurrenceExcision\", \"$this->SecondFURecurrenceNotes\", \"$this->SecondFURecurHistoDysplasia\", \"$this->SecondFUNextColon_Mths\", \"$this->SecondFUOutcome\", \"$this->SecondFUSurgery\", \"$this->SecondFUSurgeryNotes\", \"$this->SecondFURecurHisto\", \"$this->SecondFUSurgeryMethod\", \"$this->SecondFUSurgeryResidual\", \"$this->SecondFUSurgeryType\", \"$this->ThirdFU\", \"$this->ThirdFUDate\", \"$this->ThirdFUMonths\", \"$this->ThirdFUDisposition\", \"$this->ThirdFUNoRecurScarBx\", \"$this->ThirdFUOutcome\", \"$this->ThirdFUPostSurgery\", \"$this->ThirdFURecurHisto\", \"$this->ThirdFURecurrence\", \"$this->ThirdFURecurrenceExcision\", \"$this->ThirdFURecurrenceRx\", \"$this->ThirdFURecurrenceSites\", \"$this->ThirdFURecurrenceLocation\", \"$this->ThirdFURecurrenceLargest\", \"$this->ThirdFURecurrenceNotes\", \"$this->ThirdFURecurHistoDysplasia\", \"$this->ThirdFUNextColon_Mths\", \"$this->ThirdFUSurgeryNotes\", \"$this->ThirdFUSurgeryMethod\", \"$this->ThirdFUSurgeryResidual\", \"$this->ThirdFUSurgeryType\", \"$this->FourthFU\", \"$this->FourthFUMonths\", \"$this->FourthFURecurrenceLocation\", \"$this->FourthFURecurrenceLargest\", \"$this->FourthFURecurrenceNotes\", \"$this->FourthFURecurHistoDysplasia\", \"$this->FourthFUNextColon_Mnths\", \"$this->FourthFUSurgeryResidual\", \"$this->FourthFUDate\", \"$this->FourthFUDisposition\", \"$this->FourthFUNoRecurScarBx\", \"$this->FourthFUOutcome\", \"$this->FourthFUPostSurgery\", \"$this->FourthFURecurHisto\", \"$this->FourthFURecurrence\", \"$this->FourthFURecurrenceExcision\", \"$this->FourthFURecurrenceRx\", \"$this->FourthFURecurrenceSites\", \"$this->FourthFUSurgeryMethod\", \"$this->FourthFUSurgeryNotes\", \"$this->FourthFUSurgeryType\", \"$this->ClinSignificantBleedYN\", \"$this->ClinSignificantPerfYN\", \"$this->SSACharact_Dysplasia\", \"$this->SSACharact_Dysplasia_Confidence\", \"$this->IPPerforation_Clips\", \"$this->NICE_Overall\", \"$this->FirstFURecurrenceClipArtifact\", \"$this->SecondFURecurrenceClipArtifact\", \"$this->ThirdFURecurrenceClipArtifact\", \"$this->FourthFURecurrenceClipArtifact\", \"$this->SERT_size\", \"$this->SERT_ipb\", \"$this->SERT_dysplasia\", \"$this->created\", \"$this->creating_user\", \"$this->updated\", \"$this->updating_user\", \"$this->entrytype\", \"$this->save\", \"$this->consent_PROSPER\", \"$this->inPROSPER\", \"$this->SERT\", \"$this->completeColon_PROSPER\", \"$this->defectTattoo_PROSPER\", \"$this->dateEnrolled_PROSPER\", \"$this->variation_PROSPER\", \"$this->PROSPERSCDue\", \"$this->CLIP_consent\", \"$this->CLIP_preEMRexclusion\", \"$this->CLIP_postEMRexclusion\", \"$this->CLIP_randomisation\", \"$this->CLIP_category\", \"$this->CLIP_active_closure_complete\", \"$this->CLIP_active_closure_number\", \"$this->CLIP_no_closure_reason\", \"$this->CLIP_doppler\", \"$this->CLIP_doppler_signal\", \"$this->CLIP_doppler_signal_location\", \"$this->CLIP_doppler_signal_area_clipped\", \"$this->CLIP_notes\", \"$this->SMSA\", \"$this->ESDType\", \"$this->ESDTraineeID\", \"$this->ESDTrainingCase\", \"$this->ESDTrainingCaseSelfCompleted\", \"$this->ESDTrainingCaseStageTakeoverCompleted\", \"$this->ESDTrainingCaseStageTakeoverReason\", \"$this->ESDTrainingCaseStageTakeoverReasonText\", \"$this->ESDhighDefScope\", \"$this->ESDcutCurrent\", \"$this->ESDcutCurrentWatts\", \"$this->ESDcutCurrentEffect\", \"$this->ESDcoagCurrent\", \"$this->ESDcoagCurrentEffect\", \"$this->ESDcoagCurrentWatts\", \"$this->ESDIPBControl\", \"$this->ESDIPBProphylacticCoag\", \"$this->ESDPocket\", \"$this->ESDaddSnareExcision\", \"$this->ESDnoPieces\", \"$this->ESDknifeType1\", \"$this->ESDknifeType2\", \"$this->ESDflushingPump\", \"$this->ESDtractionTechnique\", \"$this->ESDdurationTotal\", \"$this->ESDdurationIncision\", \"$this->ESDdurationDissection\", \"$this->ESDdurationDefectAssess\", \"$this->ESDlesionRemoved\", \"$this->ESDenblocEndo\", \"$this->ESDdefectMuscleInjury\", \"$this->ESDHistoDimensionx\", \"$this->ESDHistoDimensiony\", \"$this->ESDHistoEnBloc\", \"$this->ESDHistoR0\", \"$this->ESDHistoVM\", \"$this->ESDHistoHM\", \"$this->ESDHistoType\", \"$this->ESDHistoDysplasia\", \"$this->ESDHistoInvasive\", \"$this->ESDHistoSMICDepth\", \"$this->ESDHistoSMICLVI\", \"$this->ESDHistoSMICLVIconfidence\", \"$this->ESDHistoSMICTB\", \"$this->ESDHistoSMICDifferentiation\", \"$this->ESDgeneralnotes\", \"$this->ESDSurgeryNotes\", \"$this->inCSPEMRRCT\", \"$this->Descriptor\", \"$this->CSPExcluded\" , \"$this->CSPExclusionReason\", \"$this->CSPRandomisation\", \"$this->Locationcm\", \"$this->LocationSpecific\", \"$this->CSPSnare\", \"$this->CSPprotrusion\", \"$this->CSPMarginbiopsy\", \"$this->trainingPercentperformed\", \"$this->trainingtakenoverreason\", \"$this->trainingtakenoverreason2\", \"$this->traineeinjection\", \"$this->traineeresection\", \"$this->traineestsc\", \"$this->traineedefectcheck\", \"$this->traineeclip\", \"$this->traineespecimenretrieve\", \"$this->consultant_agrees_DMI\", \"$this->consultantassistancetraining\", \"$this->LANS_enrolled\", \"$this->LANS_excluded\", \"$this->LANS_excludedwhy\", \"$this->LANS_indication\", \"$this->LANS_prechromokudo_observer1\", \"$this->LANS_prechromodemarcatedarea_observer1\", \"$this->LANS_prechromosmi_observer1\", \"$this->LANS_prechromosmiconfidence_observer1\", \"$this->LANS_observer1\", \"$this->LANS_observer2\", \"$this->LANS_postchromokudo_observer1\", \"$this->LANS_postchromosmi_observer1\", \"$this->LANS_postchromosmiconfidence_observer1\", \"$this->LANS_postchromodemarcatedarea_observer1\", \"$this->LANS_prechromokudo_observer2\", \"$this->LANS_prechromodemarcatedarea_observer2\", \"$this->LANS_prechromosmi_observer2\", \"$this->LANS_prechromosmiconfidence_observer2\", \"$this->LANS_postchromokudo_observer2\", \"$this->LANS_postchromodemarcatedarea_observer2\", \"$this->LANS_postchromosmi_observer2\", \"$this->LANS_postchromosmiconfidence_observer2\", \"$this->LANS_comment\", \"$this->IsNumberNodules\", \"$this->IsSizeDominantNodule\", \"$this->IsNumberNodulesLarger8mm\", \"$this->IsLesionInclude\", \"$this->LPexcision\", \"$this->ICVFat\", \"$this->StalkStudy\", \"$this->StalkNumber\", \"$this->StalkHisto1\", \"$this->StalkHisto2\", \"$this->Significant_pain_requiring_control_PAIN\", \"$this->Consent_pain\", \"$this->TempAtEntry_PAIN\", \"$this->TempAtPain_PAIN\", \"$this->TempAtExit_PAIN\", \"$this->VASAtEntry_PAIN\", \"$this->VasAtPain_PAIN\", \"$this->VASAtExit_PAIN\", \"$this->Length_of_pain_PAIN\", \"$this->Time_to_pain_PAIN\", \"$this->Intervention_Conservative_1_PAIN\", \"$this->Intervention2_PAIN\", \"$this->Intervention_Conservative_2_PAIN\", \"$this->Intervention_Non_Conservative_1_PAIN\", \"$this->Investigation_findings_PAIN\", \"$this->Surgery_findings_PAIN\", \"$this->Extended_recovery_PAIN\", \"$this->Propofol_PAIN\", \"$this->Fentanyl_PAIN\", \"$this->Buscopan_PAIN\", \"$this->Glucagon_PAIN\", \"$this->Paracetemol_PAIN\", \"$this->Intraprocedural_paracetemol_Number_PAIN\", \"$this->Anaesthetic_PAIN\", \"$this->Paracetemol_post_PAIN\", \"$this->Fentanyl_post_PAIN\", \"$this->Other_post_PAIN\", \"$this->Opiod_painkiller\", \"$this->TimeinRoomPAIN\", \"$this->TimeinRecoveryPAIN\", \"$this->TimeinProcedurePAIN\", \"$this->TimeinParacetemolPAIN\", \"$this->TimeinFentanylPAIN\", \"$this->TimeNoFurtherPainPAIN\", \"$this->Timein2ndStagePAIN\", \"$this->TimeinExitPAIN\", \"$this->ARJRopivPAINandLESION\")");
	}

	/**
	 * Returns array of keys order by $column -> name of column $order -> desc or acs
	 *
	 * @param string $column
	 * @param string $order
	 */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT _k_lesion from Lesion order by $column $order");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$keys[$i] = $row["_k_lesion"];
			$i++;
		}
		return $keys;
	}

	/**
	 * @return _k_lesion - int(10)
	 */
	public function get_k_lesion(){
		return $this->_k_lesion;
	}

	/**
	 * @return _k_procedure - int(7)
	 */
	public function get_k_procedure(){
		return $this->_k_procedure;
	}

	/**
	 * @return PreviousAttempt - int(2)
	 */
	public function getPreviousAttempt(){
		return $this->PreviousAttempt;
	}

	/**
	 * @return PreviousBiopsy - int(2)
	 */
	public function getPreviousBiopsy(){
		return $this->PreviousBiopsy;
	}

	/**
	 * @return PreviousSPOT - int(2)
	 */
	public function getPreviousSPOT(){
		return $this->PreviousSPOT;
	}

	/**
	 * @return IntendedProcedure - int(10)
	 */
	public function getIntendedProcedure(){
		return $this->IntendedProcedure;
	}

	/**
	 * @return ActualPredominantProcedure - int(10)
	 */
	public function getActualPredominantProcedure(){
		return $this->ActualPredominantProcedure;
	}

	/**
	 * @return Size - int(4)
	 */
	public function getSize(){
		return $this->Size;
	}

	/**
	 * @return Location - int(2)
	 */
	public function getLocation(){
		return $this->Location;
	}

	/**
	 * @return Paris - int(2)
	 */
	public function getParis(){
		return $this->Paris;
	}

	/**
	 * @return Morphology - int(2)
	 */
	public function getMorphology(){
		return $this->Morphology;
	}

	/**
	 * @return HighestKudo - int(2)
	 */
	public function getHighestKudo(){
		return $this->HighestKudo;
	}

	/**
	 * @return HighestSano - int(2)
	 */
	public function getHighestSano(){
		return $this->HighestSano;
	}

	/**
	 * @return Predict_Cancer - int(2)
	 */
	public function getPredict_Cancer(){
		return $this->Predict_Cancer;
	}

	/**
	 * @return Predict_Histo - tinyint(2)
	 */
	public function getPredict_Histo(){
		return $this->Predict_Histo;
	}

	/**
	 * @return Predict_Histo_Confidence - tinyint(2)
	 */
	public function getPredict_Histo_Confidence(){
		return $this->Predict_Histo_Confidence;
	}

	/**
	 * @return Feat_Invasion - int(2)
	 */
	public function getFeat_Invasion(){
		return $this->Feat_Invasion;
	}

	/**
	 * @return EnBloc - int(2)
	 */
	public function getEnBloc(){
		return $this->EnBloc;
	}

	/**
	 * @return Access - int(2)
	 */
	public function getAccess(){
		return $this->Access;
	}

	/**
	 * @return EMRAttempted - int(2)
	 */
	public function getEMRAttempted(){
		return $this->EMRAttempted;
	}

	/**
	 * @return SMInjection - int(2)
	 */
	public function getSMInjection(){
		return $this->SMInjection;
	}

	/**
	 * @return Constituent - int(2)
	 */
	public function getConstituent(){
		return $this->Constituent;
	}

	/**
	 * @return Constituent_other - varchar(80)
	 */
	public function getConstituent_other(){
		return $this->Constituent_other;
	}

	/**
	 * @return Adrenaline - int(2)
	 */
	public function getAdrenaline(){
		return $this->Adrenaline;
	}

	/**
	 * @return Dye - int(2)
	 */
	public function getDye(){
		return $this->Dye;
	}

	/**
	 * @return No_Injection - int(2)
	 */
	public function getNo_Injection(){
		return $this->No_Injection;
	}

	/**
	 * @return Lifting - int(2)
	 */
	public function getLifting(){
		return $this->Lifting;
	}

	/**
	 * @return SnareType - int(2)
	 */
	public function getSnareType(){
		return $this->SnareType;
	}

	/**
	 * @return SnareSize - int(2)
	 */
	public function getSnareSize(){
		return $this->SnareSize;
	}

	/**
	 * @return EndoscopeCapUsed - int(10)
	 */
	public function getEndoscopeCapUsed(){
		return $this->EndoscopeCapUsed;
	}

	/**
	 * @return Current - int(2)
	 */
	public function getCurrent(){
		return $this->Current;
	}

	/**
	 * @return No_Pieces - int(2)
	 */
	public function getNo_Pieces(){
		return $this->No_Pieces;
	}

	/**
	 * @return SnareExcision - int(2)
	 */
	public function getSnareExcision(){
		return $this->SnareExcision;
	}

	/**
	 * @return AddModality - int(2)
	 */
	public function getAddModality(){
		return $this->AddModality;
	}

	/**
	 * @return SuccessfulEMR - int(2)
	 */
	public function getSuccessfulEMR(){
		return $this->SuccessfulEMR;
	}

	/**
	 * @return STSC_Margin - tinyint(2)
	 */
	public function getSTSC_Margin(){
		return $this->STSC_Margin;
	}

	/**
	 * @return SCAR_complete - int(2)
	 */
	public function getSCAR_complete(){
		return $this->SCAR_complete;
	}

	/**
	 * @return DefectTattoo - int(10)
	 */
	public function getDefectTattoo(){
		return $this->DefectTattoo;
	}

	/**
	 * @return BookTwoStage - int(2)
	 */
	public function getBookTwoStage(){
		return $this->BookTwoStage;
	}

	/**
	 * @return IPBleed - int(2)
	 */
	public function getIPBleed(){
		return $this->IPBleed;
	}

	/**
	 * @return IPBleed_Control - int(2)
	 */
	public function getIPBleed_Control(){
		return $this->IPBleed_Control;
	}

	/**
	 * @return SMF - int(2)
	 */
	public function getSMF(){
		return $this->SMF;
	}

	/**
	 * @return SMF_Fgrade - int(10)
	 */
	public function getSMF_Fgrade(){
		return $this->SMF_Fgrade;
	}

	/**
	 * @return SMF_Prediction - int(10)
	 */
	public function getSMF_Prediction(){
		return $this->SMF_Prediction;
	}

	/**
	 * @return SMF_Prediction_confidence - int(10)
	 */
	public function getSMF_Prediction_confidence(){
		return $this->SMF_Prediction_confidence;
	}

	/**
	 * @return CentralSMF - varchar(10)
	 */
	public function getCentralSMF(){
		return $this->CentralSMF;
	}

	/**
	 * @return FibrosisCancerRisk - varchar(10)
	 */
	public function getFibrosisCancerRisk(){
		return $this->FibrosisCancerRisk;
	}

	/**
	 * @return ProcedureStoppedCancer - varchar(10)
	 */
	public function getProcedureStoppedCancer(){
		return $this->ProcedureStoppedCancer;
	}

	/**
	 * @return OverlyingFold - varchar(10)
	 */
	public function getOverlyingFold(){
		return $this->OverlyingFold;
	}

	/**
	 * @return FibrosisofSignificance - varchar(250)
	 */
	public function getFibrosisofSignificance(){
		return $this->FibrosisofSignificance;
	}

	/**
	 * @return DeepInjury - tinyint(2)
	 */
	public function getDeepInjury(){
		return $this->DeepInjury;
	}

	/**
	 * @return IPPerforation - int(2)
	 */
	public function getIPPerforation(){
		return $this->IPPerforation;
	}

	/**
	 * @return IPPerforation_Rx - int(2)
	 */
	public function getIPPerforation_Rx(){
		return $this->IPPerforation_Rx;
	}

	/**
	 * @return Defect_Clip_Closure - tinyint(3)
	 */
	public function getDefect_Clip_Closure(){
		return $this->Defect_Clip_Closure;
	}

	/**
	 * @return Defect_Clip_Closure_Number - varchar(80)
	 */
	public function getDefect_Clip_Closure_Number(){
		return $this->Defect_Clip_Closure_Number;
	}

	/**
	 * @return Duration - int(5)
	 */
	public function getDuration(){
		return $this->Duration;
	}

	/**
	 * @return DurationComplication - varchar(100)
	 */
	public function getDurationComplication(){
		return $this->DurationComplication;
	}

	/**
	 * @return HistoPathMajor - int(2)
	 */
	public function getHistoPathMajor(){
		return $this->HistoPathMajor;
	}

	/**
	 * @return Cancer - int(2)
	 */
	public function getCancer(){
		return $this->Cancer;
	}

	/**
	 * @return Dysplasia - int(2)
	 */
	public function getDysplasia(){
		return $this->Dysplasia;
	}

	/**
	 * @return SMInvasion - int(2)
	 */
	public function getSMInvasion(){
		return $this->SMInvasion;
	}

	/**
	 * @return Margins - int(2)
	 */
	public function getMargins(){
		return $this->Margins;
	}

	/**
	 * @return SpecimenSize - varchar(80)
	 */
	public function getSpecimenSize(){
		return $this->SpecimenSize;
	}

	/**
	 * @return DelayedBleed - int(2)
	 */
	public function getDelayedBleed(){
		return $this->DelayedBleed;
	}

	/**
	 * @return DelayedBleed_Admit - int(2)
	 */
	public function getDelayedBleed_Admit(){
		return $this->DelayedBleed_Admit;
	}

	/**
	 * @return DelayedBleed_Colon - int(2)
	 */
	public function getDelayedBleed_Colon(){
		return $this->DelayedBleed_Colon;
	}

	/**
	 * @return DelayedPerforation - int(2)
	 */
	public function getDelayedPerforation(){
		return $this->DelayedPerforation;
	}

	/**
	 * @return DelayedPerforation_Rx - int(2)
	 */
	public function getDelayedPerforation_Rx(){
		return $this->DelayedPerforation_Rx;
	}

	/**
	 * @return Disposition2Weeks - int(2)
	 */
	public function getDisposition2Weeks(){
		return $this->Disposition2Weeks;
	}

	/**
	 * @return FollowUp2Weeks - int(2)
	 */
	public function getFollowUp2Weeks(){
		return $this->FollowUp2Weeks;
	}

	/**
	 * @return SurgReferral - int(2)
	 */
	public function getSurgReferral(){
		return $this->SurgReferral;
	}

	/**
	 * @return FirstFU - int(2)
	 */
	public function getFirstFU(){
		return $this->FirstFU;
	}

	/**
	 * @return FirstFUMonths - tinyint(4)
	 */
	public function getFirstFUMonths(){
		return $this->FirstFUMonths;
	}

	/**
	 * @return FirstFUDate - date
	 */
	public function getFirstFUDate(){
		return $this->FirstFUDate;
	}

	/**
	 * @return FirstFURecurrence - tinyint(4)
	 */
	public function getFirstFURecurrence(){
		return $this->FirstFURecurrence;
	}

	/**
	 * @return FirstFUNoRecurScarBx - tinyint(3)
	 */
	public function getFirstFUNoRecurScarBx(){
		return $this->FirstFUNoRecurScarBx;
	}

	/**
	 * @return FirstFURecurrenceSites - tinyint(4)
	 */
	public function getFirstFURecurrenceSites(){
		return $this->FirstFURecurrenceSites;
	}

	/**
	 * @return FirstFURecurrenceLocation - tinyint(4)
	 */
	public function getFirstFURecurrenceLocation(){
		return $this->FirstFURecurrenceLocation;
	}

	/**
	 * @return FirstFURecurrenceLargest - tinyint(4)
	 */
	public function getFirstFURecurrenceLargest(){
		return $this->FirstFURecurrenceLargest;
	}

	/**
	 * @return FirstFURecurrenceRx - tinyint(4)
	 */
	public function getFirstFURecurrenceRx(){
		return $this->FirstFURecurrenceRx;
	}

	/**
	 * @return FirstFURecurrenceExcision - tinyint(4)
	 */
	public function getFirstFURecurrenceExcision(){
		return $this->FirstFURecurrenceExcision;
	}

	/**
	 * @return FirstFURecurrenceNotes - varchar(80)
	 */
	public function getFirstFURecurrenceNotes(){
		return $this->FirstFURecurrenceNotes;
	}

	/**
	 * @return FirstFURecurHisto - int(2)
	 */
	public function getFirstFURecurHisto(){
		return $this->FirstFURecurHisto;
	}

	/**
	 * @return FirstFURecurHistoDysplasia - int(2)
	 */
	public function getFirstFURecurHistoDysplasia(){
		return $this->FirstFURecurHistoDysplasia;
	}

	/**
	 * @return FirstFUNextColon_Mths - varchar(80)
	 */
	public function getFirstFUNextColon_Mths(){
		return $this->FirstFUNextColon_Mths;
	}

	/**
	 * @return FirstFUOutcome - int(2)
	 */
	public function getFirstFUOutcome(){
		return $this->FirstFUOutcome;
	}

	/**
	 * @return FirstFUDisposition - int(2)
	 */
	public function getFirstFUDisposition(){
		return $this->FirstFUDisposition;
	}

	/**
	 * @return FirstFUSurgery - tinyint(3)
	 */
	public function getFirstFUSurgery(){
		return $this->FirstFUSurgery;
	}

	/**
	 * @return FirstFUSurgeryMethod - int(2)
	 */
	public function getFirstFUSurgeryMethod(){
		return $this->FirstFUSurgeryMethod;
	}

	/**
	 * @return FirstFUSurgeryResidual - int(2)
	 */
	public function getFirstFUSurgeryResidual(){
		return $this->FirstFUSurgeryResidual;
	}

	/**
	 * @return FirstFUSurgeryType - int(2)
	 */
	public function getFirstFUSurgeryType(){
		return $this->FirstFUSurgeryType;
	}

	/**
	 * @return FirstFUSurgeryNotes - varchar(80)
	 */
	public function getFirstFUSurgeryNotes(){
		return $this->FirstFUSurgeryNotes;
	}

	/**
	 * @return SecondFU - tinyint(3)
	 */
	public function getSecondFU(){
		return $this->SecondFU;
	}

	/**
	 * @return SecondFUMonths - int(3)
	 */
	public function getSecondFUMonths(){
		return $this->SecondFUMonths;
	}

	/**
	 * @return SecondFUDate - date
	 */
	public function getSecondFUDate(){
		return $this->SecondFUDate;
	}

	/**
	 * @return SecondFURecurrence - int(3)
	 */
	public function getSecondFURecurrence(){
		return $this->SecondFURecurrence;
	}

	/**
	 * @return SecondFUNoRecurScarBx - int(2)
	 */
	public function getSecondFUNoRecurScarBx(){
		return $this->SecondFUNoRecurScarBx;
	}

	/**
	 * @return SecondFURecurrenceLargest - int(2)
	 */
	public function getSecondFURecurrenceLargest(){
		return $this->SecondFURecurrenceLargest;
	}

	/**
	 * @return SecondFURecurrenceLocation - int(2)
	 */
	public function getSecondFURecurrenceLocation(){
		return $this->SecondFURecurrenceLocation;
	}

	/**
	 * @return SecondFURecurrenceSites - int(2)
	 */
	public function getSecondFURecurrenceSites(){
		return $this->SecondFURecurrenceSites;
	}

	/**
	 * @return SecondFUDisposition - int(2)
	 */
	public function getSecondFUDisposition(){
		return $this->SecondFUDisposition;
	}

	/**
	 * @return SecondFURecurrenceRx - tinyint(3)
	 */
	public function getSecondFURecurrenceRx(){
		return $this->SecondFURecurrenceRx;
	}

	/**
	 * @return SecondFURecurrenceExcision - tinyint(3)
	 */
	public function getSecondFURecurrenceExcision(){
		return $this->SecondFURecurrenceExcision;
	}

	/**
	 * @return SecondFURecurrenceNotes - varchar(80)
	 */
	public function getSecondFURecurrenceNotes(){
		return $this->SecondFURecurrenceNotes;
	}

	/**
	 * @return SecondFURecurHistoDysplasia - tinyint(3)
	 */
	public function getSecondFURecurHistoDysplasia(){
		return $this->SecondFURecurHistoDysplasia;
	}

	/**
	 * @return SecondFUNextColon_Mths - tinyint(3)
	 */
	public function getSecondFUNextColon_Mths(){
		return $this->SecondFUNextColon_Mths;
	}

	/**
	 * @return SecondFUOutcome - tinyint(3)
	 */
	public function getSecondFUOutcome(){
		return $this->SecondFUOutcome;
	}

	/**
	 * @return SecondFUSurgery - int(2)
	 */
	public function getSecondFUSurgery(){
		return $this->SecondFUSurgery;
	}

	/**
	 * @return SecondFUSurgeryNotes - varchar(80)
	 */
	public function getSecondFUSurgeryNotes(){
		return $this->SecondFUSurgeryNotes;
	}

	/**
	 * @return SecondFURecurHisto - int(2)
	 */
	public function getSecondFURecurHisto(){
		return $this->SecondFURecurHisto;
	}

	/**
	 * @return SecondFUSurgeryMethod - int(2)
	 */
	public function getSecondFUSurgeryMethod(){
		return $this->SecondFUSurgeryMethod;
	}

	/**
	 * @return SecondFUSurgeryResidual - int(2)
	 */
	public function getSecondFUSurgeryResidual(){
		return $this->SecondFUSurgeryResidual;
	}

	/**
	 * @return SecondFUSurgeryType - int(2)
	 */
	public function getSecondFUSurgeryType(){
		return $this->SecondFUSurgeryType;
	}

	/**
	 * @return ThirdFU - int(2)
	 */
	public function getThirdFU(){
		return $this->ThirdFU;
	}

	/**
	 * @return ThirdFUDate - date
	 */
	public function getThirdFUDate(){
		return $this->ThirdFUDate;
	}

	/**
	 * @return ThirdFUMonths - tinyint(3)
	 */
	public function getThirdFUMonths(){
		return $this->ThirdFUMonths;
	}

	/**
	 * @return ThirdFUDisposition - int(2)
	 */
	public function getThirdFUDisposition(){
		return $this->ThirdFUDisposition;
	}

	/**
	 * @return ThirdFUNoRecurScarBx - int(2)
	 */
	public function getThirdFUNoRecurScarBx(){
		return $this->ThirdFUNoRecurScarBx;
	}

	/**
	 * @return ThirdFUOutcome - int(2)
	 */
	public function getThirdFUOutcome(){
		return $this->ThirdFUOutcome;
	}

	/**
	 * @return ThirdFUPostSurgery - int(2)
	 */
	public function getThirdFUPostSurgery(){
		return $this->ThirdFUPostSurgery;
	}

	/**
	 * @return ThirdFURecurHisto - int(2)
	 */
	public function getThirdFURecurHisto(){
		return $this->ThirdFURecurHisto;
	}

	/**
	 * @return ThirdFURecurrence - int(2)
	 */
	public function getThirdFURecurrence(){
		return $this->ThirdFURecurrence;
	}

	/**
	 * @return ThirdFURecurrenceExcision - int(2)
	 */
	public function getThirdFURecurrenceExcision(){
		return $this->ThirdFURecurrenceExcision;
	}

	/**
	 * @return ThirdFURecurrenceRx - int(2)
	 */
	public function getThirdFURecurrenceRx(){
		return $this->ThirdFURecurrenceRx;
	}

	/**
	 * @return ThirdFURecurrenceSites - int(2)
	 */
	public function getThirdFURecurrenceSites(){
		return $this->ThirdFURecurrenceSites;
	}

	/**
	 * @return ThirdFURecurrenceLocation - tinyint(3)
	 */
	public function getThirdFURecurrenceLocation(){
		return $this->ThirdFURecurrenceLocation;
	}

	/**
	 * @return ThirdFURecurrenceLargest - tinyint(3)
	 */
	public function getThirdFURecurrenceLargest(){
		return $this->ThirdFURecurrenceLargest;
	}

	/**
	 * @return ThirdFURecurrenceNotes - varchar(80)
	 */
	public function getThirdFURecurrenceNotes(){
		return $this->ThirdFURecurrenceNotes;
	}

	/**
	 * @return ThirdFURecurHistoDysplasia - tinyint(3)
	 */
	public function getThirdFURecurHistoDysplasia(){
		return $this->ThirdFURecurHistoDysplasia;
	}

	/**
	 * @return ThirdFUNextColon_Mths - varchar(80)
	 */
	public function getThirdFUNextColon_Mths(){
		return $this->ThirdFUNextColon_Mths;
	}

	/**
	 * @return ThirdFUSurgeryNotes - varchar(80)
	 */
	public function getThirdFUSurgeryNotes(){
		return $this->ThirdFUSurgeryNotes;
	}

	/**
	 * @return ThirdFUSurgeryMethod - int(2)
	 */
	public function getThirdFUSurgeryMethod(){
		return $this->ThirdFUSurgeryMethod;
	}

	/**
	 * @return ThirdFUSurgeryResidual - int(2)
	 */
	public function getThirdFUSurgeryResidual(){
		return $this->ThirdFUSurgeryResidual;
	}

	/**
	 * @return ThirdFUSurgeryType - int(2)
	 */
	public function getThirdFUSurgeryType(){
		return $this->ThirdFUSurgeryType;
	}

	/**
	 * @return FourthFU - int(2)
	 */
	public function getFourthFU(){
		return $this->FourthFU;
	}

	/**
	 * @return FourthFUMonths - tinyint(3)
	 */
	public function getFourthFUMonths(){
		return $this->FourthFUMonths;
	}

	/**
	 * @return FourthFURecurrenceLocation - tinyint(3)
	 */
	public function getFourthFURecurrenceLocation(){
		return $this->FourthFURecurrenceLocation;
	}

	/**
	 * @return FourthFURecurrenceLargest - tinyint(3)
	 */
	public function getFourthFURecurrenceLargest(){
		return $this->FourthFURecurrenceLargest;
	}

	/**
	 * @return FourthFURecurrenceNotes - varchar(80)
	 */
	public function getFourthFURecurrenceNotes(){
		return $this->FourthFURecurrenceNotes;
	}

	/**
	 * @return FourthFURecurHistoDysplasia - tinyint(3)
	 */
	public function getFourthFURecurHistoDysplasia(){
		return $this->FourthFURecurHistoDysplasia;
	}

	/**
	 * @return FourthFUNextColon_Mnths - varchar(80)
	 */
	public function getFourthFUNextColon_Mnths(){
		return $this->FourthFUNextColon_Mnths;
	}

	/**
	 * @return FourthFUSurgeryResidual - tinyint(3)
	 */
	public function getFourthFUSurgeryResidual(){
		return $this->FourthFUSurgeryResidual;
	}

	/**
	 * @return FourthFUDate - date
	 */
	public function getFourthFUDate(){
		return $this->FourthFUDate;
	}

	/**
	 * @return FourthFUDisposition - int(2)
	 */
	public function getFourthFUDisposition(){
		return $this->FourthFUDisposition;
	}

	/**
	 * @return FourthFUNoRecurScarBx - int(2)
	 */
	public function getFourthFUNoRecurScarBx(){
		return $this->FourthFUNoRecurScarBx;
	}

	/**
	 * @return FourthFUOutcome - int(2)
	 */
	public function getFourthFUOutcome(){
		return $this->FourthFUOutcome;
	}

	/**
	 * @return FourthFUPostSurgery - int(2)
	 */
	public function getFourthFUPostSurgery(){
		return $this->FourthFUPostSurgery;
	}

	/**
	 * @return FourthFURecurHisto - int(2)
	 */
	public function getFourthFURecurHisto(){
		return $this->FourthFURecurHisto;
	}

	/**
	 * @return FourthFURecurrence - int(2)
	 */
	public function getFourthFURecurrence(){
		return $this->FourthFURecurrence;
	}

	/**
	 * @return FourthFURecurrenceExcision - int(2)
	 */
	public function getFourthFURecurrenceExcision(){
		return $this->FourthFURecurrenceExcision;
	}

	/**
	 * @return FourthFURecurrenceRx - int(2)
	 */
	public function getFourthFURecurrenceRx(){
		return $this->FourthFURecurrenceRx;
	}

	/**
	 * @return FourthFURecurrenceSites - int(2)
	 */
	public function getFourthFURecurrenceSites(){
		return $this->FourthFURecurrenceSites;
	}

	/**
	 * @return FourthFUSurgeryMethod - int(2)
	 */
	public function getFourthFUSurgeryMethod(){
		return $this->FourthFUSurgeryMethod;
	}

	/**
	 * @return FourthFUSurgeryNotes - varchar(1000)
	 */
	public function getFourthFUSurgeryNotes(){
		return $this->FourthFUSurgeryNotes;
	}

	/**
	 * @return FourthFUSurgeryType - int(2)
	 */
	public function getFourthFUSurgeryType(){
		return $this->FourthFUSurgeryType;
	}

	/**
	 * @return ClinSignificantBleedYN - int(2)
	 */
	public function getClinSignificantBleedYN(){
		return $this->ClinSignificantBleedYN;
	}

	/**
	 * @return ClinSignificantPerfYN - int(2)
	 */
	public function getClinSignificantPerfYN(){
		return $this->ClinSignificantPerfYN;
	}

	/**
	 * @return SSACharact_Dysplasia - int(2)
	 */
	public function getSSACharact_Dysplasia(){
		return $this->SSACharact_Dysplasia;
	}

	/**
	 * @return SSACharact_Dysplasia_Confidence - tinyint(2)
	 */
	public function getSSACharact_Dysplasia_Confidence(){
		return $this->SSACharact_Dysplasia_Confidence;
	}

	/**
	 * @return IPPerforation_Clips - int(2)
	 */
	public function getIPPerforation_Clips(){
		return $this->IPPerforation_Clips;
	}

	/**
	 * @return NICE_Overall - int(2)
	 */
	public function getNICE_Overall(){
		return $this->NICE_Overall;
	}

	/**
	 * @return FirstFURecurrenceClipArtifact - int(2)
	 */
	public function getFirstFURecurrenceClipArtifact(){
		return $this->FirstFURecurrenceClipArtifact;
	}

	/**
	 * @return SecondFURecurrenceClipArtifact - int(2)
	 */
	public function getSecondFURecurrenceClipArtifact(){
		return $this->SecondFURecurrenceClipArtifact;
	}

	/**
	 * @return ThirdFURecurrenceClipArtifact - int(2)
	 */
	public function getThirdFURecurrenceClipArtifact(){
		return $this->ThirdFURecurrenceClipArtifact;
	}

	/**
	 * @return FourthFURecurrenceClipArtifact - int(2)
	 */
	public function getFourthFURecurrenceClipArtifact(){
		return $this->FourthFURecurrenceClipArtifact;
	}

	/**
	 * @return SERT_size - int(2)
	 */
	public function getSERT_size(){
		return $this->SERT_size;
	}

	/**
	 * @return SERT_ipb - int(2)
	 */
	public function getSERT_ipb(){
		return $this->SERT_ipb;
	}

	/**
	 * @return SERT_dysplasia - int(2)
	 */
	public function getSERT_dysplasia(){
		return $this->SERT_dysplasia;
	}

	/**
	 * @return created - timestamp
	 */
	public function getcreated(){
		return $this->created;
	}

	/**
	 * @return creating_user - int(10)
	 */
	public function getcreating_user(){
		return $this->creating_user;
	}

	/**
	 * @return updated - timestamp
	 */
	public function getupdated(){
		return $this->updated;
	}

	/**
	 * @return updating_user - int(10)
	 */
	public function getupdating_user(){
		return $this->updating_user;
	}

	/**
	 * @return entrytype - int(2)
	 */
	public function getentrytype(){
		return $this->entrytype;
	}

	/**
	 * @return save - int(10)
	 */
	public function getsave(){
		return $this->save;
	}

	/**
	 * @return consent_PROSPER - int(2)
	 */
	public function getconsent_PROSPER(){
		return $this->consent_PROSPER;
	}

	/**
	 * @return inPROSPER - int(2)
	 */
	public function getinPROSPER(){
		return $this->inPROSPER;
	}

	/**
	 * @return SERT - int(2)
	 */
	public function getSERT(){
		return $this->SERT;
	}

	/**
	 * @return completeColon_PROSPER - int(3)
	 */
	public function getcompleteColon_PROSPER(){
		return $this->completeColon_PROSPER;
	}

	/**
	 * @return defectTattoo_PROSPER - int(3)
	 */
	public function getdefectTattoo_PROSPER(){
		return $this->defectTattoo_PROSPER;
	}

	/**
	 * @return dateEnrolled_PROSPER - date
	 */
	public function getdateEnrolled_PROSPER(){
		return $this->dateEnrolled_PROSPER;
	}

	/**
	 * @return variation_PROSPER - varchar(8000)
	 */
	public function getvariation_PROSPER(){
		return $this->variation_PROSPER;
	}

	/**
	 * @return PROSPERSCDue - date
	 */
	public function getPROSPERSCDue(){
		return $this->PROSPERSCDue;
	}

	/**
	 * @return CLIP_consent - int(2)
	 */
	public function getCLIP_consent(){
		return $this->CLIP_consent;
	}

	/**
	 * @return CLIP_preEMRexclusion - varchar(100)
	 */
	public function getCLIP_preEMRexclusion(){
		return $this->CLIP_preEMRexclusion;
	}

	/**
	 * @return CLIP_postEMRexclusion - varchar(100)
	 */
	public function getCLIP_postEMRexclusion(){
		return $this->CLIP_postEMRexclusion;
	}

	/**
	 * @return CLIP_randomisation - int(2)
	 */
	public function getCLIP_randomisation(){
		return $this->CLIP_randomisation;
	}

	/**
	 * @return CLIP_category - int(2)
	 */
	public function getCLIP_category(){
		return $this->CLIP_category;
	}

	/**
	 * @return CLIP_active_closure_complete - int(2)
	 */
	public function getCLIP_active_closure_complete(){
		return $this->CLIP_active_closure_complete;
	}

	/**
	 * @return CLIP_active_closure_number - int(2)
	 */
	public function getCLIP_active_closure_number(){
		return $this->CLIP_active_closure_number;
	}

	/**
	 * @return CLIP_no_closure_reason - varchar(80)
	 */
	public function getCLIP_no_closure_reason(){
		return $this->CLIP_no_closure_reason;
	}

	/**
	 * @return CLIP_doppler - int(2)
	 */
	public function getCLIP_doppler(){
		return $this->CLIP_doppler;
	}

	/**
	 * @return CLIP_doppler_signal - int(2)
	 */
	public function getCLIP_doppler_signal(){
		return $this->CLIP_doppler_signal;
	}

	/**
	 * @return CLIP_doppler_signal_location - int(2)
	 */
	public function getCLIP_doppler_signal_location(){
		return $this->CLIP_doppler_signal_location;
	}

	/**
	 * @return CLIP_doppler_signal_area_clipped - int(2)
	 */
	public function getCLIP_doppler_signal_area_clipped(){
		return $this->CLIP_doppler_signal_area_clipped;
	}

	/**
	 * @return CLIP_notes - varchar(8000)
	 */
	public function getCLIP_notes(){
		return $this->CLIP_notes;
	}

	/**
	 * @return SMSA - int(3)
	 */
	public function getSMSA(){
		return $this->SMSA;
	}

	/**
	 * @return ESDType - int(10)
	 */
	public function getESDType(){
		return $this->ESDType;
	}

	/**
	 * @return ESDTraineeID - int(10)
	 */
	public function getESDTraineeID(){
		return $this->ESDTraineeID;
	}

	/**
	 * @return ESDTrainingCase - int(10)
	 */
	public function getESDTrainingCase(){
		return $this->ESDTrainingCase;
	}

	/**
	 * @return ESDTrainingCaseSelfCompleted - int(10)
	 */
	public function getESDTrainingCaseSelfCompleted(){
		return $this->ESDTrainingCaseSelfCompleted;
	}

	/**
	 * @return ESDTrainingCaseStageTakeoverCompleted - int(10)
	 */
	public function getESDTrainingCaseStageTakeoverCompleted(){
		return $this->ESDTrainingCaseStageTakeoverCompleted;
	}

	/**
	 * @return ESDTrainingCaseStageTakeoverReason - int(10)
	 */
	public function getESDTrainingCaseStageTakeoverReason(){
		return $this->ESDTrainingCaseStageTakeoverReason;
	}

	/**
	 * @return ESDTrainingCaseStageTakeoverReasonText - varchar(400)
	 */
	public function getESDTrainingCaseStageTakeoverReasonText(){
		return $this->ESDTrainingCaseStageTakeoverReasonText;
	}

	/**
	 * @return ESDhighDefScope - int(10)
	 */
	public function getESDhighDefScope(){
		return $this->ESDhighDefScope;
	}

	/**
	 * @return ESDcutCurrent - int(10)
	 */
	public function getESDcutCurrent(){
		return $this->ESDcutCurrent;
	}

	/**
	 * @return ESDcutCurrentWatts - varchar(80)
	 */
	public function getESDcutCurrentWatts(){
		return $this->ESDcutCurrentWatts;
	}

	/**
	 * @return ESDcutCurrentEffect - int(10)
	 */
	public function getESDcutCurrentEffect(){
		return $this->ESDcutCurrentEffect;
	}

	/**
	 * @return ESDcoagCurrent - int(10)
	 */
	public function getESDcoagCurrent(){
		return $this->ESDcoagCurrent;
	}

	/**
	 * @return ESDcoagCurrentEffect - int(10)
	 */
	public function getESDcoagCurrentEffect(){
		return $this->ESDcoagCurrentEffect;
	}

	/**
	 * @return ESDcoagCurrentWatts - varchar(80)
	 */
	public function getESDcoagCurrentWatts(){
		return $this->ESDcoagCurrentWatts;
	}

	/**
	 * @return ESDIPBControl - int(10)
	 */
	public function getESDIPBControl(){
		return $this->ESDIPBControl;
	}

	/**
	 * @return ESDIPBProphylacticCoag - int(10)
	 */
	public function getESDIPBProphylacticCoag(){
		return $this->ESDIPBProphylacticCoag;
	}

	/**
	 * @return ESDPocket - int(10)
	 */
	public function getESDPocket(){
		return $this->ESDPocket;
	}

	/**
	 * @return ESDaddSnareExcision - int(10)
	 */
	public function getESDaddSnareExcision(){
		return $this->ESDaddSnareExcision;
	}

	/**
	 * @return ESDnoPieces - int(10)
	 */
	public function getESDnoPieces(){
		return $this->ESDnoPieces;
	}

	/**
	 * @return ESDknifeType1 - int(10)
	 */
	public function getESDknifeType1(){
		return $this->ESDknifeType1;
	}

	/**
	 * @return ESDknifeType2 - int(10)
	 */
	public function getESDknifeType2(){
		return $this->ESDknifeType2;
	}

	/**
	 * @return ESDflushingPump - int(10)
	 */
	public function getESDflushingPump(){
		return $this->ESDflushingPump;
	}

	/**
	 * @return ESDtractionTechnique - int(10)
	 */
	public function getESDtractionTechnique(){
		return $this->ESDtractionTechnique;
	}

	/**
	 * @return ESDdurationTotal - int(10)
	 */
	public function getESDdurationTotal(){
		return $this->ESDdurationTotal;
	}

	/**
	 * @return ESDdurationIncision - int(10)
	 */
	public function getESDdurationIncision(){
		return $this->ESDdurationIncision;
	}

	/**
	 * @return ESDdurationDissection - int(10)
	 */
	public function getESDdurationDissection(){
		return $this->ESDdurationDissection;
	}

	/**
	 * @return ESDdurationDefectAssess - int(10)
	 */
	public function getESDdurationDefectAssess(){
		return $this->ESDdurationDefectAssess;
	}

	/**
	 * @return ESDlesionRemoved - int(10)
	 */
	public function getESDlesionRemoved(){
		return $this->ESDlesionRemoved;
	}

	/**
	 * @return ESDenblocEndo - int(10)
	 */
	public function getESDenblocEndo(){
		return $this->ESDenblocEndo;
	}

	/**
	 * @return ESDdefectMuscleInjury - int(10)
	 */
	public function getESDdefectMuscleInjury(){
		return $this->ESDdefectMuscleInjury;
	}

	/**
	 * @return ESDHistoDimensionx - int(10)
	 */
	public function getESDHistoDimensionx(){
		return $this->ESDHistoDimensionx;
	}

	/**
	 * @return ESDHistoDimensiony - int(10)
	 */
	public function getESDHistoDimensiony(){
		return $this->ESDHistoDimensiony;
	}

	/**
	 * @return ESDHistoEnBloc - int(10)
	 */
	public function getESDHistoEnBloc(){
		return $this->ESDHistoEnBloc;
	}

	/**
	 * @return ESDHistoR0 - int(10)
	 */
	public function getESDHistoR0(){
		return $this->ESDHistoR0;
	}

	/**
	 * @return ESDHistoVM - int(10)
	 */
	public function getESDHistoVM(){
		return $this->ESDHistoVM;
	}

	/**
	 * @return ESDHistoHM - int(10)
	 */
	public function getESDHistoHM(){
		return $this->ESDHistoHM;
	}

	/**
	 * @return ESDHistoType - int(10)
	 */
	public function getESDHistoType(){
		return $this->ESDHistoType;
	}

	/**
	 * @return ESDHistoDysplasia - int(10)
	 */
	public function getESDHistoDysplasia(){
		return $this->ESDHistoDysplasia;
	}

	/**
	 * @return ESDHistoInvasive - int(10)
	 */
	public function getESDHistoInvasive(){
		return $this->ESDHistoInvasive;
	}

	/**
	 * @return ESDHistoSMICDepth - int(10)
	 */
	public function getESDHistoSMICDepth(){
		return $this->ESDHistoSMICDepth;
	}

	/**
	 * @return ESDHistoSMICLVI - int(10)
	 */
	public function getESDHistoSMICLVI(){
		return $this->ESDHistoSMICLVI;
	}

	/**
	 * @return ESDHistoSMICLVIconfidence - int(10)
	 */
	public function getESDHistoSMICLVIconfidence(){
		return $this->ESDHistoSMICLVIconfidence;
	}

	/**
	 * @return ESDHistoSMICTB - int(10)
	 */
	public function getESDHistoSMICTB(){
		return $this->ESDHistoSMICTB;
	}

	/**
	 * @return ESDHistoSMICDifferentiation - int(10)
	 */
	public function getESDHistoSMICDifferentiation(){
		return $this->ESDHistoSMICDifferentiation;
	}

	/**
	 * @return ESDgeneralnotes - varchar(400)
	 */
	public function getESDgeneralnotes(){
		return $this->ESDgeneralnotes;
	}

	/**
	 * @return ESDSurgeryNotes - varchar(400)
	 */
	public function getESDSurgeryNotes(){
		return $this->ESDSurgeryNotes;
	}

	/**
	 * @return inCSPEMRRCT - varchar(10)
	 */
	public function getinCSPEMRRCT(){
		return $this->inCSPEMRRCT;
	}

	/**
	 * @return Descriptor - varchar(10)
	 */
	public function getDescriptor(){
		return $this->Descriptor;
	}

	/**
	 * @return CSPExcluded - varchar(10)
	 */
	public function getCSPExcluded(){
		return $this->CSPExcluded;
	}
	/**
	 * @return CSPExcluded - varchar(10)
	 */
	public function getCSPExclusionReason(){
		return $this->CSPExclusionReason;
	}

	/**
	 * @return CSPRandomisation - varchar(10)
	 */
	public function getCSPRandomisation(){
		return $this->CSPRandomisation;
	}

	/**
	 * @return Locationcm - varchar(10)
	 */
	public function getLocationcm(){
		return $this->Locationcm;
	}

	/**
	 * @return LocationSpecific - varchar(100)
	 */
	public function getLocationSpecific(){
		return $this->LocationSpecific;
	}

	/**
	 * @return CSPSnare - varchar(10)
	 */
	public function getCSPSnare(){
		return $this->CSPSnare;
	}

	/**
	 * @return CSPprotrusion - varchar(10)
	 */
	public function getCSPprotrusion(){
		return $this->CSPprotrusion;
	}

	/**
	 * @return CSPMarginbiopsy - varchar(10)
	 */
	public function getCSPMarginbiopsy(){
		return $this->CSPMarginbiopsy;
	}

	/**
	 * @return trainingPercentperformed - varchar(10)
	 */
	public function gettrainingPercentperformed(){
		return $this->trainingPercentperformed;
	}

	/**
	 * @return trainingtakenoverreason - varchar(10)
	 */
	public function gettrainingtakenoverreason(){
		return $this->trainingtakenoverreason;
	}

	/**
	 * @return trainingtakenoverreason2 - varchar(10)
	 */
	public function gettrainingtakenoverreason2(){
		return $this->trainingtakenoverreason2;
	}

	/**
	 * @return traineeinjection - varchar(10)
	 */
	public function gettraineeinjection(){
		return $this->traineeinjection;
	}

	/**
	 * @return traineeresection - varchar(10)
	 */
	public function gettraineeresection(){
		return $this->traineeresection;
	}

	/**
	 * @return traineestsc - varchar(10)
	 */
	public function gettraineestsc(){
		return $this->traineestsc;
	}

	/**
	 * @return traineedefectcheck - varchar(10)
	 */
	public function gettraineedefectcheck(){
		return $this->traineedefectcheck;
	}

	/**
	 * @return traineeclip - varchar(10)
	 */
	public function gettraineeclip(){
		return $this->traineeclip;
	}

	/**
	 * @return traineespecimenretrieve - varchar(10)
	 */
	public function gettraineespecimenretrieve(){
		return $this->traineespecimenretrieve;
	}

	/**
	 * @return consultant_agrees_DMI - varchar(10)
	 */
	public function getconsultant_agrees_DMI(){
		return $this->consultant_agrees_DMI;
	}

	/**
	 * @return consultantassistancetraining - varchar(10)
	 */
	public function getconsultantassistancetraining(){
		return $this->consultantassistancetraining;
	}

	/**
	 * @return LANS_enrolled - varchar(10)
	 */
	public function getLANS_enrolled(){
		return $this->LANS_enrolled;
	}

	/**
	 * @return LANS_excluded - varchar(10)
	 */
	public function getLANS_excluded(){
		return $this->LANS_excluded;
	}

	/**
	 * @return LANS_excludedwhy - varchar(100)
	 */
	public function getLANS_excludedwhy(){
		return $this->LANS_excludedwhy;
	}

	/**
	 * @return LANS_indication - varchar(10)
	 */
	public function getLANS_indication(){
		return $this->LANS_indication;
	}

	/**
	 * @return LANS_prechromokudo_observer1 - varchar(10)
	 */
	public function getLANS_prechromokudo_observer1(){
		return $this->LANS_prechromokudo_observer1;
	}

	/**
	 * @return LANS_prechromodemarcatedarea_observer1 - varchar(10)
	 */
	public function getLANS_prechromodemarcatedarea_observer1(){
		return $this->LANS_prechromodemarcatedarea_observer1;
	}

	/**
	 * @return LANS_prechromosmi_observer1 - varchar(10)
	 */
	public function getLANS_prechromosmi_observer1(){
		return $this->LANS_prechromosmi_observer1;
	}

	/**
	 * @return LANS_prechromosmiconfidence_observer1 - varchar(10)
	 */
	public function getLANS_prechromosmiconfidence_observer1(){
		return $this->LANS_prechromosmiconfidence_observer1;
	}

	/**
	 * @return LANS_observer1 - varchar(10)
	 */
	public function getLANS_observer1(){
		return $this->LANS_observer1;
	}

	/**
	 * @return LANS_observer2 - varchar(10)
	 */
	public function getLANS_observer2(){
		return $this->LANS_observer2;
	}

	/**
	 * @return LANS_postchromokudo_observer1 - varchar(10)
	 */
	public function getLANS_postchromokudo_observer1(){
		return $this->LANS_postchromokudo_observer1;
	}

	/**
	 * @return LANS_postchromosmi_observer1 - varchar(10)
	 */
	public function getLANS_postchromosmi_observer1(){
		return $this->LANS_postchromosmi_observer1;
	}

	/**
	 * @return LANS_postchromosmiconfidence_observer1 - varchar(10)
	 */
	public function getLANS_postchromosmiconfidence_observer1(){
		return $this->LANS_postchromosmiconfidence_observer1;
	}

	/**
	 * @return LANS_postchromodemarcatedarea_observer1 - varchar(10)
	 */
	public function getLANS_postchromodemarcatedarea_observer1(){
		return $this->LANS_postchromodemarcatedarea_observer1;
	}

	/**
	 * @return LANS_prechromokudo_observer2 - varchar(10)
	 */
	public function getLANS_prechromokudo_observer2(){
		return $this->LANS_prechromokudo_observer2;
	}

	/**
	 * @return LANS_prechromodemarcatedarea_observer2 - varchar(10)
	 */
	public function getLANS_prechromodemarcatedarea_observer2(){
		return $this->LANS_prechromodemarcatedarea_observer2;
	}

	/**
	 * @return LANS_prechromosmi_observer2 - varchar(10)
	 */
	public function getLANS_prechromosmi_observer2(){
		return $this->LANS_prechromosmi_observer2;
	}

	/**
	 * @return LANS_prechromosmiconfidence_observer2 - varchar(10)
	 */
	public function getLANS_prechromosmiconfidence_observer2(){
		return $this->LANS_prechromosmiconfidence_observer2;
	}

	/**
	 * @return LANS_postchromokudo_observer2 - varchar(10)
	 */
	public function getLANS_postchromokudo_observer2(){
		return $this->LANS_postchromokudo_observer2;
	}

	/**
	 * @return LANS_postchromodemarcatedarea_observer2 - varchar(10)
	 */
	public function getLANS_postchromodemarcatedarea_observer2(){
		return $this->LANS_postchromodemarcatedarea_observer2;
	}

	/**
	 * @return LANS_postchromosmi_observer2 - varchar(10)
	 */
	public function getLANS_postchromosmi_observer2(){
		return $this->LANS_postchromosmi_observer2;
	}

	/**
	 * @return LANS_postchromosmiconfidence_observer2 - varchar(10)
	 */
	public function getLANS_postchromosmiconfidence_observer2(){
		return $this->LANS_postchromosmiconfidence_observer2;
	}

	/**
	 * @return LANS_comment - varchar(300)
	 */
	public function getLANS_comment(){
		return $this->LANS_comment;
	}

	/**
	 * @return IsNumberNodules - varchar(10)
	 */
	public function getIsNumberNodules(){
		return $this->IsNumberNodules;
	}

	/**
	 * @return IsSizeDominantNodule - varchar(10)
	 */
	public function getIsSizeDominantNodule(){
		return $this->IsSizeDominantNodule;
	}

	/**
	 * @return IsNumberNodulesLarger8mm - varchar(10)
	 */
	public function getIsNumberNodulesLarger8mm(){
		return $this->IsNumberNodulesLarger8mm;
	}

	/**
	 * @return IsLesionInclude - varchar(10)
	 */
	public function getIsLesionInclude(){
		return $this->IsLesionInclude;
	}

	/**
	 * @return LPexcision - varchar(10)
	 */
	public function getLPexcision(){
		return $this->LPexcision;
	}

	/**
	 * @return ICVFat - varchar(10)
	 */
	public function getICVFat(){
		return $this->ICVFat;
	}

	/**
	 * @return StalkStudy - varchar(10)
	 */
	public function getStalkStudy(){
		return $this->StalkStudy;
	}

	/**
	 * @return StalkNumber - varchar(10)
	 */
	public function getStalkNumber(){
		return $this->StalkNumber;
	}

	/**
	 * @return StalkHisto1 - varchar(10)
	 */
	public function getStalkHisto1(){
		return $this->StalkHisto1;
	}

	/**
	 * @return StalkHisto2 - varchar(10)
	 */
	public function getStalkHisto2(){
		return $this->StalkHisto2;
	}

	/**
	 * @return Significant_pain_requiring_control_PAIN - varchar(10)
	 */
	public function getSignificant_pain_requiring_control_PAIN(){
		return $this->Significant_pain_requiring_control_PAIN;
	}

	/**
	 * @return Consent_pain - varchar(10)
	 */
	public function getConsent_pain(){
		return $this->Consent_pain;
	}

	/**
	 * @return TempAtEntry_PAIN - varchar(10)
	 */
	public function getTempAtEntry_PAIN(){
		return $this->TempAtEntry_PAIN;
	}

	/**
	 * @return TempAtPain_PAIN - varchar(10)
	 */
	public function getTempAtPain_PAIN(){
		return $this->TempAtPain_PAIN;
	}

	/**
	 * @return TempAtExit_PAIN - varchar(10)
	 */
	public function getTempAtExit_PAIN(){
		return $this->TempAtExit_PAIN;
	}

	/**
	 * @return VASAtEntry_PAIN - varchar(10)
	 */
	public function getVASAtEntry_PAIN(){
		return $this->VASAtEntry_PAIN;
	}

	/**
	 * @return VasAtPain_PAIN - varchar(10)
	 */
	public function getVasAtPain_PAIN(){
		return $this->VasAtPain_PAIN;
	}

	/**
	 * @return VASAtExit_PAIN - varchar(10)
	 */
	public function getVASAtExit_PAIN(){
		return $this->VASAtExit_PAIN;
	}

	/**
	 * @return Length_of_pain_PAIN - varchar(10)
	 */
	public function getLength_of_pain_PAIN(){
		return $this->Length_of_pain_PAIN;
	}

	/**
	 * @return Time_to_pain_PAIN - varchar(10)
	 */
	public function getTime_to_pain_PAIN(){
		return $this->Time_to_pain_PAIN;
	}

	/**
	 * @return Intervention_Conservative_1_PAIN - varchar(10)
	 */
	public function getIntervention_Conservative_1_PAIN(){
		return $this->Intervention_Conservative_1_PAIN;
	}

	/**
	 * @return Intervention2_PAIN - varchar(10)
	 */
	public function getIntervention2_PAIN(){
		return $this->Intervention2_PAIN;
	}

	/**
	 * @return Intervention_Conservative_2_PAIN - varchar(10)
	 */
	public function getIntervention_Conservative_2_PAIN(){
		return $this->Intervention_Conservative_2_PAIN;
	}

	/**
	 * @return Intervention_Non_Conservative_1_PAIN - varchar(10)
	 */
	public function getIntervention_Non_Conservative_1_PAIN(){
		return $this->Intervention_Non_Conservative_1_PAIN;
	}

	/**
	 * @return Investigation_findings_PAIN - varchar(400)
	 */
	public function getInvestigation_findings_PAIN(){
		return $this->Investigation_findings_PAIN;
	}

	/**
	 * @return Surgery_findings_PAIN - varchar(400)
	 */
	public function getSurgery_findings_PAIN(){
		return $this->Surgery_findings_PAIN;
	}

	/**
	 * @return Extended_recovery_PAIN - varchar(10)
	 */
	public function getExtended_recovery_PAIN(){
		return $this->Extended_recovery_PAIN;
	}

	/**
	 * @return Propofol_PAIN - varchar(10)
	 */
	public function getPropofol_PAIN(){
		return $this->Propofol_PAIN;
	}

	/**
	 * @return Fentanyl_PAIN - varchar(10)
	 */
	public function getFentanyl_PAIN(){
		return $this->Fentanyl_PAIN;
	}

	/**
	 * @return Buscopan_PAIN - varchar(10)
	 */
	public function getBuscopan_PAIN(){
		return $this->Buscopan_PAIN;
	}

	/**
	 * @return Glucagon_PAIN - varchar(10)
	 */
	public function getGlucagon_PAIN(){
		return $this->Glucagon_PAIN;
	}

	/**
	 * @return Paracetemol_PAIN - varchar(10)
	 */
	public function getParacetemol_PAIN(){
		return $this->Paracetemol_PAIN;
	}

	/**
	 * @return Intraprocedural_paracetemol_Number_PAIN - varchar(10)
	 */
	public function getIntraprocedural_paracetemol_Number_PAIN(){
		return $this->Intraprocedural_paracetemol_Number_PAIN;
	}

	/**
	 * @return Anaesthetic_PAIN - varchar(10)
	 */
	public function getAnaesthetic_PAIN(){
		return $this->Anaesthetic_PAIN;
	}

	/**
	 * @return Paracetemol_post_PAIN - varchar(10)
	 */
	public function getParacetemol_post_PAIN(){
		return $this->Paracetemol_post_PAIN;
	}

	/**
	 * @return Fentanyl_post_PAIN - varchar(10)
	 */
	public function getFentanyl_post_PAIN(){
		return $this->Fentanyl_post_PAIN;
	}

	/**
	 * @return Other_post_PAIN - varchar(10)
	 */
	public function getOther_post_PAIN(){
		return $this->Other_post_PAIN;
	}

	/**
	 * @return Opiod_painkiller - varchar(100)
	 */
	public function getOpiod_painkiller(){
		return $this->Opiod_painkiller;
	}

	/**
	 * @return TimeinRoomPAIN - time
	 */
	public function getTimeinRoomPAIN(){
		return $this->TimeinRoomPAIN;
	}

	/**
	 * @return TimeinRecoveryPAIN - time
	 */
	public function getTimeinRecoveryPAIN(){
		return $this->TimeinRecoveryPAIN;
	}

	/**
	 * @return TimeinProcedurePAIN - time
	 */
	public function getTimeinProcedurePAIN(){
		return $this->TimeinProcedurePAIN;
	}

	/**
	 * @return TimeinParacetemolPAIN - time
	 */
	public function getTimeinParacetemolPAIN(){
		return $this->TimeinParacetemolPAIN;
	}

	/**
	 * @return TimeinFentanylPAIN - time
	 */
	public function getTimeinFentanylPAIN(){
		return $this->TimeinFentanylPAIN;
	}

	/**
	 * @return TimeNoFurtherPainPAIN - time
	 */
	public function getTimeNoFurtherPainPAIN(){
		return $this->TimeNoFurtherPainPAIN;
	}

	/**
	 * @return Timein2ndStagePAIN - time
	 */
	public function getTimein2ndStagePAIN(){
		return $this->Timein2ndStagePAIN;
	}

	/**
	 * @return TimeinExitPAIN - time
	 */
	public function getTimeinExitPAIN(){
		return $this->TimeinExitPAIN;
	}

	/**
	 * @return ARJRopivPAINandLESION - varchar(10)
	 */
	public function getARJRopivPAINandLESION(){
		return $this->ARJRopivPAINandLESION;
	}

	/**
	 * @param Type: int(10)
	 */
	public function set_k_lesion($_k_lesion){
		$this->_k_lesion = $_k_lesion;
	}

	/**
	 * @param Type: int(7)
	 */
	public function set_k_procedure($_k_procedure){
		$this->_k_procedure = $_k_procedure;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setPreviousAttempt($PreviousAttempt){
		$this->PreviousAttempt = $PreviousAttempt;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setPreviousBiopsy($PreviousBiopsy){
		$this->PreviousBiopsy = $PreviousBiopsy;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setPreviousSPOT($PreviousSPOT){
		$this->PreviousSPOT = $PreviousSPOT;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setIntendedProcedure($IntendedProcedure){
		$this->IntendedProcedure = $IntendedProcedure;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setActualPredominantProcedure($ActualPredominantProcedure){
		$this->ActualPredominantProcedure = $ActualPredominantProcedure;
	}

	/**
	 * @param Type: int(4)
	 */
	public function setSize($Size){
		$this->Size = $Size;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setLocation($Location){
		$this->Location = $Location;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setParis($Paris){
		$this->Paris = $Paris;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setMorphology($Morphology){
		$this->Morphology = $Morphology;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setHighestKudo($HighestKudo){
		$this->HighestKudo = $HighestKudo;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setHighestSano($HighestSano){
		$this->HighestSano = $HighestSano;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setPredict_Cancer($Predict_Cancer){
		$this->Predict_Cancer = $Predict_Cancer;
	}

	/**
	 * @param Type: tinyint(2)
	 */
	public function setPredict_Histo($Predict_Histo){
		$this->Predict_Histo = $Predict_Histo;
	}

	/**
	 * @param Type: tinyint(2)
	 */
	public function setPredict_Histo_Confidence($Predict_Histo_Confidence){
		$this->Predict_Histo_Confidence = $Predict_Histo_Confidence;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFeat_Invasion($Feat_Invasion){
		$this->Feat_Invasion = $Feat_Invasion;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setEnBloc($EnBloc){
		$this->EnBloc = $EnBloc;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setAccess($Access){
		$this->Access = $Access;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setEMRAttempted($EMRAttempted){
		$this->EMRAttempted = $EMRAttempted;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSMInjection($SMInjection){
		$this->SMInjection = $SMInjection;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setConstituent($Constituent){
		$this->Constituent = $Constituent;
	}

	/**
	 * @param Type: varchar(80)
	 */
	public function setConstituent_other($Constituent_other){
		$this->Constituent_other = $Constituent_other;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setAdrenaline($Adrenaline){
		$this->Adrenaline = $Adrenaline;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setDye($Dye){
		$this->Dye = $Dye;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setNo_Injection($No_Injection){
		$this->No_Injection = $No_Injection;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setLifting($Lifting){
		$this->Lifting = $Lifting;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSnareType($SnareType){
		$this->SnareType = $SnareType;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSnareSize($SnareSize){
		$this->SnareSize = $SnareSize;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setEndoscopeCapUsed($EndoscopeCapUsed){
		$this->EndoscopeCapUsed = $EndoscopeCapUsed;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setCurrent($Current){
		$this->Current = $Current;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setNo_Pieces($No_Pieces){
		$this->No_Pieces = $No_Pieces;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSnareExcision($SnareExcision){
		$this->SnareExcision = $SnareExcision;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setAddModality($AddModality){
		$this->AddModality = $AddModality;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSuccessfulEMR($SuccessfulEMR){
		$this->SuccessfulEMR = $SuccessfulEMR;
	}

	/**
	 * @param Type: tinyint(2)
	 */
	public function setSTSC_Margin($STSC_Margin){
		$this->STSC_Margin = $STSC_Margin;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSCAR_complete($SCAR_complete){
		$this->SCAR_complete = $SCAR_complete;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setDefectTattoo($DefectTattoo){
		$this->DefectTattoo = $DefectTattoo;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setBookTwoStage($BookTwoStage){
		$this->BookTwoStage = $BookTwoStage;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setIPBleed($IPBleed){
		$this->IPBleed = $IPBleed;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setIPBleed_Control($IPBleed_Control){
		$this->IPBleed_Control = $IPBleed_Control;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSMF($SMF){
		$this->SMF = $SMF;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setSMF_Fgrade($SMF_Fgrade){
		$this->SMF_Fgrade = $SMF_Fgrade;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setSMF_Prediction($SMF_Prediction){
		$this->SMF_Prediction = $SMF_Prediction;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setSMF_Prediction_confidence($SMF_Prediction_confidence){
		$this->SMF_Prediction_confidence = $SMF_Prediction_confidence;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setCentralSMF($CentralSMF){
		$this->CentralSMF = $CentralSMF;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setFibrosisCancerRisk($FibrosisCancerRisk){
		$this->FibrosisCancerRisk = $FibrosisCancerRisk;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setProcedureStoppedCancer($ProcedureStoppedCancer){
		$this->ProcedureStoppedCancer = $ProcedureStoppedCancer;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setOverlyingFold($OverlyingFold){
		$this->OverlyingFold = $OverlyingFold;
	}

	/**
	 * @param Type: varchar(250)
	 */
	public function setFibrosisofSignificance($FibrosisofSignificance){
		$this->FibrosisofSignificance = $FibrosisofSignificance;
	}

	/**
	 * @param Type: tinyint(2)
	 */
	public function setDeepInjury($DeepInjury){
		$this->DeepInjury = $DeepInjury;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setIPPerforation($IPPerforation){
		$this->IPPerforation = $IPPerforation;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setIPPerforation_Rx($IPPerforation_Rx){
		$this->IPPerforation_Rx = $IPPerforation_Rx;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setDefect_Clip_Closure($Defect_Clip_Closure){
		$this->Defect_Clip_Closure = $Defect_Clip_Closure;
	}

	/**
	 * @param Type: varchar(80)
	 */
	public function setDefect_Clip_Closure_Number($Defect_Clip_Closure_Number){
		$this->Defect_Clip_Closure_Number = $Defect_Clip_Closure_Number;
	}

	/**
	 * @param Type: int(5)
	 */
	public function setDuration($Duration){
		$this->Duration = $Duration;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setDurationComplication($DurationComplication){
		$this->DurationComplication = $DurationComplication;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setHistoPathMajor($HistoPathMajor){
		$this->HistoPathMajor = $HistoPathMajor;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setCancer($Cancer){
		$this->Cancer = $Cancer;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setDysplasia($Dysplasia){
		$this->Dysplasia = $Dysplasia;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSMInvasion($SMInvasion){
		$this->SMInvasion = $SMInvasion;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setMargins($Margins){
		$this->Margins = $Margins;
	}

	/**
	 * @param Type: varchar(80)
	 */
	public function setSpecimenSize($SpecimenSize){
		$this->SpecimenSize = $SpecimenSize;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setDelayedBleed($DelayedBleed){
		$this->DelayedBleed = $DelayedBleed;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setDelayedBleed_Admit($DelayedBleed_Admit){
		$this->DelayedBleed_Admit = $DelayedBleed_Admit;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setDelayedBleed_Colon($DelayedBleed_Colon){
		$this->DelayedBleed_Colon = $DelayedBleed_Colon;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setDelayedPerforation($DelayedPerforation){
		$this->DelayedPerforation = $DelayedPerforation;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setDelayedPerforation_Rx($DelayedPerforation_Rx){
		$this->DelayedPerforation_Rx = $DelayedPerforation_Rx;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setDisposition2Weeks($Disposition2Weeks){
		$this->Disposition2Weeks = $Disposition2Weeks;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFollowUp2Weeks($FollowUp2Weeks){
		$this->FollowUp2Weeks = $FollowUp2Weeks;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSurgReferral($SurgReferral){
		$this->SurgReferral = $SurgReferral;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFirstFU($FirstFU){
		$this->FirstFU = $FirstFU;
	}

	/**
	 * @param Type: tinyint(4)
	 */
	public function setFirstFUMonths($FirstFUMonths){
		$this->FirstFUMonths = $FirstFUMonths;
	}

	/**
	 * @param Type: date
	 */
	public function setFirstFUDate($FirstFUDate){
		$this->FirstFUDate = $FirstFUDate;
	}

	/**
	 * @param Type: tinyint(4)
	 */
	public function setFirstFURecurrence($FirstFURecurrence){
		$this->FirstFURecurrence = $FirstFURecurrence;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setFirstFUNoRecurScarBx($FirstFUNoRecurScarBx){
		$this->FirstFUNoRecurScarBx = $FirstFUNoRecurScarBx;
	}

	/**
	 * @param Type: tinyint(4)
	 */
	public function setFirstFURecurrenceSites($FirstFURecurrenceSites){
		$this->FirstFURecurrenceSites = $FirstFURecurrenceSites;
	}

	/**
	 * @param Type: tinyint(4)
	 */
	public function setFirstFURecurrenceLocation($FirstFURecurrenceLocation){
		$this->FirstFURecurrenceLocation = $FirstFURecurrenceLocation;
	}

	/**
	 * @param Type: tinyint(4)
	 */
	public function setFirstFURecurrenceLargest($FirstFURecurrenceLargest){
		$this->FirstFURecurrenceLargest = $FirstFURecurrenceLargest;
	}

	/**
	 * @param Type: tinyint(4)
	 */
	public function setFirstFURecurrenceRx($FirstFURecurrenceRx){
		$this->FirstFURecurrenceRx = $FirstFURecurrenceRx;
	}

	/**
	 * @param Type: tinyint(4)
	 */
	public function setFirstFURecurrenceExcision($FirstFURecurrenceExcision){
		$this->FirstFURecurrenceExcision = $FirstFURecurrenceExcision;
	}

	/**
	 * @param Type: varchar(80)
	 */
	public function setFirstFURecurrenceNotes($FirstFURecurrenceNotes){
		$this->FirstFURecurrenceNotes = $FirstFURecurrenceNotes;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFirstFURecurHisto($FirstFURecurHisto){
		$this->FirstFURecurHisto = $FirstFURecurHisto;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFirstFURecurHistoDysplasia($FirstFURecurHistoDysplasia){
		$this->FirstFURecurHistoDysplasia = $FirstFURecurHistoDysplasia;
	}

	/**
	 * @param Type: varchar(80)
	 */
	public function setFirstFUNextColon_Mths($FirstFUNextColon_Mths){
		$this->FirstFUNextColon_Mths = $FirstFUNextColon_Mths;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFirstFUOutcome($FirstFUOutcome){
		$this->FirstFUOutcome = $FirstFUOutcome;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFirstFUDisposition($FirstFUDisposition){
		$this->FirstFUDisposition = $FirstFUDisposition;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setFirstFUSurgery($FirstFUSurgery){
		$this->FirstFUSurgery = $FirstFUSurgery;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFirstFUSurgeryMethod($FirstFUSurgeryMethod){
		$this->FirstFUSurgeryMethod = $FirstFUSurgeryMethod;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFirstFUSurgeryResidual($FirstFUSurgeryResidual){
		$this->FirstFUSurgeryResidual = $FirstFUSurgeryResidual;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFirstFUSurgeryType($FirstFUSurgeryType){
		$this->FirstFUSurgeryType = $FirstFUSurgeryType;
	}

	/**
	 * @param Type: varchar(80)
	 */
	public function setFirstFUSurgeryNotes($FirstFUSurgeryNotes){
		$this->FirstFUSurgeryNotes = $FirstFUSurgeryNotes;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setSecondFU($SecondFU){
		$this->SecondFU = $SecondFU;
	}

	/**
	 * @param Type: int(3)
	 */
	public function setSecondFUMonths($SecondFUMonths){
		$this->SecondFUMonths = $SecondFUMonths;
	}

	/**
	 * @param Type: date
	 */
	public function setSecondFUDate($SecondFUDate){
		$this->SecondFUDate = $SecondFUDate;
	}

	/**
	 * @param Type: int(3)
	 */
	public function setSecondFURecurrence($SecondFURecurrence){
		$this->SecondFURecurrence = $SecondFURecurrence;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSecondFUNoRecurScarBx($SecondFUNoRecurScarBx){
		$this->SecondFUNoRecurScarBx = $SecondFUNoRecurScarBx;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSecondFURecurrenceLargest($SecondFURecurrenceLargest){
		$this->SecondFURecurrenceLargest = $SecondFURecurrenceLargest;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSecondFURecurrenceLocation($SecondFURecurrenceLocation){
		$this->SecondFURecurrenceLocation = $SecondFURecurrenceLocation;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSecondFURecurrenceSites($SecondFURecurrenceSites){
		$this->SecondFURecurrenceSites = $SecondFURecurrenceSites;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSecondFUDisposition($SecondFUDisposition){
		$this->SecondFUDisposition = $SecondFUDisposition;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setSecondFURecurrenceRx($SecondFURecurrenceRx){
		$this->SecondFURecurrenceRx = $SecondFURecurrenceRx;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setSecondFURecurrenceExcision($SecondFURecurrenceExcision){
		$this->SecondFURecurrenceExcision = $SecondFURecurrenceExcision;
	}

	/**
	 * @param Type: varchar(80)
	 */
	public function setSecondFURecurrenceNotes($SecondFURecurrenceNotes){
		$this->SecondFURecurrenceNotes = $SecondFURecurrenceNotes;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setSecondFURecurHistoDysplasia($SecondFURecurHistoDysplasia){
		$this->SecondFURecurHistoDysplasia = $SecondFURecurHistoDysplasia;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setSecondFUNextColon_Mths($SecondFUNextColon_Mths){
		$this->SecondFUNextColon_Mths = $SecondFUNextColon_Mths;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setSecondFUOutcome($SecondFUOutcome){
		$this->SecondFUOutcome = $SecondFUOutcome;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSecondFUSurgery($SecondFUSurgery){
		$this->SecondFUSurgery = $SecondFUSurgery;
	}

	/**
	 * @param Type: varchar(80)
	 */
	public function setSecondFUSurgeryNotes($SecondFUSurgeryNotes){
		$this->SecondFUSurgeryNotes = $SecondFUSurgeryNotes;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSecondFURecurHisto($SecondFURecurHisto){
		$this->SecondFURecurHisto = $SecondFURecurHisto;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSecondFUSurgeryMethod($SecondFUSurgeryMethod){
		$this->SecondFUSurgeryMethod = $SecondFUSurgeryMethod;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSecondFUSurgeryResidual($SecondFUSurgeryResidual){
		$this->SecondFUSurgeryResidual = $SecondFUSurgeryResidual;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSecondFUSurgeryType($SecondFUSurgeryType){
		$this->SecondFUSurgeryType = $SecondFUSurgeryType;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setThirdFU($ThirdFU){
		$this->ThirdFU = $ThirdFU;
	}

	/**
	 * @param Type: date
	 */
	public function setThirdFUDate($ThirdFUDate){
		$this->ThirdFUDate = $ThirdFUDate;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setThirdFUMonths($ThirdFUMonths){
		$this->ThirdFUMonths = $ThirdFUMonths;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setThirdFUDisposition($ThirdFUDisposition){
		$this->ThirdFUDisposition = $ThirdFUDisposition;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setThirdFUNoRecurScarBx($ThirdFUNoRecurScarBx){
		$this->ThirdFUNoRecurScarBx = $ThirdFUNoRecurScarBx;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setThirdFUOutcome($ThirdFUOutcome){
		$this->ThirdFUOutcome = $ThirdFUOutcome;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setThirdFUPostSurgery($ThirdFUPostSurgery){
		$this->ThirdFUPostSurgery = $ThirdFUPostSurgery;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setThirdFURecurHisto($ThirdFURecurHisto){
		$this->ThirdFURecurHisto = $ThirdFURecurHisto;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setThirdFURecurrence($ThirdFURecurrence){
		$this->ThirdFURecurrence = $ThirdFURecurrence;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setThirdFURecurrenceExcision($ThirdFURecurrenceExcision){
		$this->ThirdFURecurrenceExcision = $ThirdFURecurrenceExcision;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setThirdFURecurrenceRx($ThirdFURecurrenceRx){
		$this->ThirdFURecurrenceRx = $ThirdFURecurrenceRx;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setThirdFURecurrenceSites($ThirdFURecurrenceSites){
		$this->ThirdFURecurrenceSites = $ThirdFURecurrenceSites;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setThirdFURecurrenceLocation($ThirdFURecurrenceLocation){
		$this->ThirdFURecurrenceLocation = $ThirdFURecurrenceLocation;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setThirdFURecurrenceLargest($ThirdFURecurrenceLargest){
		$this->ThirdFURecurrenceLargest = $ThirdFURecurrenceLargest;
	}

	/**
	 * @param Type: varchar(80)
	 */
	public function setThirdFURecurrenceNotes($ThirdFURecurrenceNotes){
		$this->ThirdFURecurrenceNotes = $ThirdFURecurrenceNotes;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setThirdFURecurHistoDysplasia($ThirdFURecurHistoDysplasia){
		$this->ThirdFURecurHistoDysplasia = $ThirdFURecurHistoDysplasia;
	}

	/**
	 * @param Type: varchar(80)
	 */
	public function setThirdFUNextColon_Mths($ThirdFUNextColon_Mths){
		$this->ThirdFUNextColon_Mths = $ThirdFUNextColon_Mths;
	}

	/**
	 * @param Type: varchar(80)
	 */
	public function setThirdFUSurgeryNotes($ThirdFUSurgeryNotes){
		$this->ThirdFUSurgeryNotes = $ThirdFUSurgeryNotes;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setThirdFUSurgeryMethod($ThirdFUSurgeryMethod){
		$this->ThirdFUSurgeryMethod = $ThirdFUSurgeryMethod;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setThirdFUSurgeryResidual($ThirdFUSurgeryResidual){
		$this->ThirdFUSurgeryResidual = $ThirdFUSurgeryResidual;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setThirdFUSurgeryType($ThirdFUSurgeryType){
		$this->ThirdFUSurgeryType = $ThirdFUSurgeryType;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFourthFU($FourthFU){
		$this->FourthFU = $FourthFU;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setFourthFUMonths($FourthFUMonths){
		$this->FourthFUMonths = $FourthFUMonths;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setFourthFURecurrenceLocation($FourthFURecurrenceLocation){
		$this->FourthFURecurrenceLocation = $FourthFURecurrenceLocation;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setFourthFURecurrenceLargest($FourthFURecurrenceLargest){
		$this->FourthFURecurrenceLargest = $FourthFURecurrenceLargest;
	}

	/**
	 * @param Type: varchar(80)
	 */
	public function setFourthFURecurrenceNotes($FourthFURecurrenceNotes){
		$this->FourthFURecurrenceNotes = $FourthFURecurrenceNotes;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setFourthFURecurHistoDysplasia($FourthFURecurHistoDysplasia){
		$this->FourthFURecurHistoDysplasia = $FourthFURecurHistoDysplasia;
	}

	/**
	 * @param Type: varchar(80)
	 */
	public function setFourthFUNextColon_Mnths($FourthFUNextColon_Mnths){
		$this->FourthFUNextColon_Mnths = $FourthFUNextColon_Mnths;
	}

	/**
	 * @param Type: tinyint(3)
	 */
	public function setFourthFUSurgeryResidual($FourthFUSurgeryResidual){
		$this->FourthFUSurgeryResidual = $FourthFUSurgeryResidual;
	}

	/**
	 * @param Type: date
	 */
	public function setFourthFUDate($FourthFUDate){
		$this->FourthFUDate = $FourthFUDate;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFourthFUDisposition($FourthFUDisposition){
		$this->FourthFUDisposition = $FourthFUDisposition;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFourthFUNoRecurScarBx($FourthFUNoRecurScarBx){
		$this->FourthFUNoRecurScarBx = $FourthFUNoRecurScarBx;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFourthFUOutcome($FourthFUOutcome){
		$this->FourthFUOutcome = $FourthFUOutcome;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFourthFUPostSurgery($FourthFUPostSurgery){
		$this->FourthFUPostSurgery = $FourthFUPostSurgery;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFourthFURecurHisto($FourthFURecurHisto){
		$this->FourthFURecurHisto = $FourthFURecurHisto;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFourthFURecurrence($FourthFURecurrence){
		$this->FourthFURecurrence = $FourthFURecurrence;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFourthFURecurrenceExcision($FourthFURecurrenceExcision){
		$this->FourthFURecurrenceExcision = $FourthFURecurrenceExcision;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFourthFURecurrenceRx($FourthFURecurrenceRx){
		$this->FourthFURecurrenceRx = $FourthFURecurrenceRx;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFourthFURecurrenceSites($FourthFURecurrenceSites){
		$this->FourthFURecurrenceSites = $FourthFURecurrenceSites;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFourthFUSurgeryMethod($FourthFUSurgeryMethod){
		$this->FourthFUSurgeryMethod = $FourthFUSurgeryMethod;
	}

	/**
	 * @param Type: varchar(1000)
	 */
	public function setFourthFUSurgeryNotes($FourthFUSurgeryNotes){
		$this->FourthFUSurgeryNotes = $FourthFUSurgeryNotes;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFourthFUSurgeryType($FourthFUSurgeryType){
		$this->FourthFUSurgeryType = $FourthFUSurgeryType;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setClinSignificantBleedYN($ClinSignificantBleedYN){
		$this->ClinSignificantBleedYN = $ClinSignificantBleedYN;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setClinSignificantPerfYN($ClinSignificantPerfYN){
		$this->ClinSignificantPerfYN = $ClinSignificantPerfYN;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSSACharact_Dysplasia($SSACharact_Dysplasia){
		$this->SSACharact_Dysplasia = $SSACharact_Dysplasia;
	}

	/**
	 * @param Type: tinyint(2)
	 */
	public function setSSACharact_Dysplasia_Confidence($SSACharact_Dysplasia_Confidence){
		$this->SSACharact_Dysplasia_Confidence = $SSACharact_Dysplasia_Confidence;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setIPPerforation_Clips($IPPerforation_Clips){
		$this->IPPerforation_Clips = $IPPerforation_Clips;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setNICE_Overall($NICE_Overall){
		$this->NICE_Overall = $NICE_Overall;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFirstFURecurrenceClipArtifact($FirstFURecurrenceClipArtifact){
		$this->FirstFURecurrenceClipArtifact = $FirstFURecurrenceClipArtifact;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSecondFURecurrenceClipArtifact($SecondFURecurrenceClipArtifact){
		$this->SecondFURecurrenceClipArtifact = $SecondFURecurrenceClipArtifact;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setThirdFURecurrenceClipArtifact($ThirdFURecurrenceClipArtifact){
		$this->ThirdFURecurrenceClipArtifact = $ThirdFURecurrenceClipArtifact;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setFourthFURecurrenceClipArtifact($FourthFURecurrenceClipArtifact){
		$this->FourthFURecurrenceClipArtifact = $FourthFURecurrenceClipArtifact;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSERT_size($SERT_size){
		$this->SERT_size = $SERT_size;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSERT_ipb($SERT_ipb){
		$this->SERT_ipb = $SERT_ipb;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSERT_dysplasia($SERT_dysplasia){
		$this->SERT_dysplasia = $SERT_dysplasia;
	}

	/**
	 * @param Type: timestamp
	 */
	public function setcreated($created){
		$this->created = $created;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setcreating_user($creating_user){
		$this->creating_user = $creating_user;
	}

	/**
	 * @param Type: timestamp
	 */
	public function setupdated($updated){
		$this->updated = $updated;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setupdating_user($updating_user){
		$this->updating_user = $updating_user;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setentrytype($entrytype){
		$this->entrytype = $entrytype;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setsave($save){
		$this->save = $save;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setconsent_PROSPER($consent_PROSPER){
		$this->consent_PROSPER = $consent_PROSPER;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setinPROSPER($inPROSPER){
		$this->inPROSPER = $inPROSPER;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setSERT($SERT){
		$this->SERT = $SERT;
	}

	/**
	 * @param Type: int(3)
	 */
	public function setcompleteColon_PROSPER($completeColon_PROSPER){
		$this->completeColon_PROSPER = $completeColon_PROSPER;
	}

	/**
	 * @param Type: int(3)
	 */
	public function setdefectTattoo_PROSPER($defectTattoo_PROSPER){
		$this->defectTattoo_PROSPER = $defectTattoo_PROSPER;
	}

	/**
	 * @param Type: date
	 */
	public function setdateEnrolled_PROSPER($dateEnrolled_PROSPER){
		$this->dateEnrolled_PROSPER = $dateEnrolled_PROSPER;
	}

	/**
	 * @param Type: varchar(8000)
	 */
	public function setvariation_PROSPER($variation_PROSPER){
		$this->variation_PROSPER = $variation_PROSPER;
	}

	/**
	 * @param Type: date
	 */
	public function setPROSPERSCDue($PROSPERSCDue){
		$this->PROSPERSCDue = $PROSPERSCDue;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setCLIP_consent($CLIP_consent){
		$this->CLIP_consent = $CLIP_consent;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setCLIP_preEMRexclusion($CLIP_preEMRexclusion){
		$this->CLIP_preEMRexclusion = $CLIP_preEMRexclusion;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setCLIP_postEMRexclusion($CLIP_postEMRexclusion){
		$this->CLIP_postEMRexclusion = $CLIP_postEMRexclusion;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setCLIP_randomisation($CLIP_randomisation){
		$this->CLIP_randomisation = $CLIP_randomisation;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setCLIP_category($CLIP_category){
		$this->CLIP_category = $CLIP_category;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setCLIP_active_closure_complete($CLIP_active_closure_complete){
		$this->CLIP_active_closure_complete = $CLIP_active_closure_complete;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setCLIP_active_closure_number($CLIP_active_closure_number){
		$this->CLIP_active_closure_number = $CLIP_active_closure_number;
	}

	/**
	 * @param Type: varchar(80)
	 */
	public function setCLIP_no_closure_reason($CLIP_no_closure_reason){
		$this->CLIP_no_closure_reason = $CLIP_no_closure_reason;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setCLIP_doppler($CLIP_doppler){
		$this->CLIP_doppler = $CLIP_doppler;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setCLIP_doppler_signal($CLIP_doppler_signal){
		$this->CLIP_doppler_signal = $CLIP_doppler_signal;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setCLIP_doppler_signal_location($CLIP_doppler_signal_location){
		$this->CLIP_doppler_signal_location = $CLIP_doppler_signal_location;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setCLIP_doppler_signal_area_clipped($CLIP_doppler_signal_area_clipped){
		$this->CLIP_doppler_signal_area_clipped = $CLIP_doppler_signal_area_clipped;
	}

	/**
	 * @param Type: varchar(8000)
	 */
	public function setCLIP_notes($CLIP_notes){
		$this->CLIP_notes = $CLIP_notes;
	}

	/**
	 * @param Type: int(3)
	 */
	public function setSMSA($SMSA){
		$this->SMSA = $SMSA;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDType($ESDType){
		$this->ESDType = $ESDType;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDTraineeID($ESDTraineeID){
		$this->ESDTraineeID = $ESDTraineeID;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDTrainingCase($ESDTrainingCase){
		$this->ESDTrainingCase = $ESDTrainingCase;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDTrainingCaseSelfCompleted($ESDTrainingCaseSelfCompleted){
		$this->ESDTrainingCaseSelfCompleted = $ESDTrainingCaseSelfCompleted;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDTrainingCaseStageTakeoverCompleted($ESDTrainingCaseStageTakeoverCompleted){
		$this->ESDTrainingCaseStageTakeoverCompleted = $ESDTrainingCaseStageTakeoverCompleted;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDTrainingCaseStageTakeoverReason($ESDTrainingCaseStageTakeoverReason){
		$this->ESDTrainingCaseStageTakeoverReason = $ESDTrainingCaseStageTakeoverReason;
	}

	/**
	 * @param Type: varchar(400)
	 */
	public function setESDTrainingCaseStageTakeoverReasonText($ESDTrainingCaseStageTakeoverReasonText){
		$this->ESDTrainingCaseStageTakeoverReasonText = $ESDTrainingCaseStageTakeoverReasonText;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDhighDefScope($ESDhighDefScope){
		$this->ESDhighDefScope = $ESDhighDefScope;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDcutCurrent($ESDcutCurrent){
		$this->ESDcutCurrent = $ESDcutCurrent;
	}

	/**
	 * @param Type: varchar(80)
	 */
	public function setESDcutCurrentWatts($ESDcutCurrentWatts){
		$this->ESDcutCurrentWatts = $ESDcutCurrentWatts;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDcutCurrentEffect($ESDcutCurrentEffect){
		$this->ESDcutCurrentEffect = $ESDcutCurrentEffect;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDcoagCurrent($ESDcoagCurrent){
		$this->ESDcoagCurrent = $ESDcoagCurrent;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDcoagCurrentEffect($ESDcoagCurrentEffect){
		$this->ESDcoagCurrentEffect = $ESDcoagCurrentEffect;
	}

	/**
	 * @param Type: varchar(80)
	 */
	public function setESDcoagCurrentWatts($ESDcoagCurrentWatts){
		$this->ESDcoagCurrentWatts = $ESDcoagCurrentWatts;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDIPBControl($ESDIPBControl){
		$this->ESDIPBControl = $ESDIPBControl;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDIPBProphylacticCoag($ESDIPBProphylacticCoag){
		$this->ESDIPBProphylacticCoag = $ESDIPBProphylacticCoag;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDPocket($ESDPocket){
		$this->ESDPocket = $ESDPocket;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDaddSnareExcision($ESDaddSnareExcision){
		$this->ESDaddSnareExcision = $ESDaddSnareExcision;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDnoPieces($ESDnoPieces){
		$this->ESDnoPieces = $ESDnoPieces;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDknifeType1($ESDknifeType1){
		$this->ESDknifeType1 = $ESDknifeType1;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDknifeType2($ESDknifeType2){
		$this->ESDknifeType2 = $ESDknifeType2;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDflushingPump($ESDflushingPump){
		$this->ESDflushingPump = $ESDflushingPump;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDtractionTechnique($ESDtractionTechnique){
		$this->ESDtractionTechnique = $ESDtractionTechnique;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDdurationTotal($ESDdurationTotal){
		$this->ESDdurationTotal = $ESDdurationTotal;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDdurationIncision($ESDdurationIncision){
		$this->ESDdurationIncision = $ESDdurationIncision;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDdurationDissection($ESDdurationDissection){
		$this->ESDdurationDissection = $ESDdurationDissection;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDdurationDefectAssess($ESDdurationDefectAssess){
		$this->ESDdurationDefectAssess = $ESDdurationDefectAssess;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDlesionRemoved($ESDlesionRemoved){
		$this->ESDlesionRemoved = $ESDlesionRemoved;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDenblocEndo($ESDenblocEndo){
		$this->ESDenblocEndo = $ESDenblocEndo;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDdefectMuscleInjury($ESDdefectMuscleInjury){
		$this->ESDdefectMuscleInjury = $ESDdefectMuscleInjury;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDHistoDimensionx($ESDHistoDimensionx){
		$this->ESDHistoDimensionx = $ESDHistoDimensionx;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDHistoDimensiony($ESDHistoDimensiony){
		$this->ESDHistoDimensiony = $ESDHistoDimensiony;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDHistoEnBloc($ESDHistoEnBloc){
		$this->ESDHistoEnBloc = $ESDHistoEnBloc;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDHistoR0($ESDHistoR0){
		$this->ESDHistoR0 = $ESDHistoR0;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDHistoVM($ESDHistoVM){
		$this->ESDHistoVM = $ESDHistoVM;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDHistoHM($ESDHistoHM){
		$this->ESDHistoHM = $ESDHistoHM;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDHistoType($ESDHistoType){
		$this->ESDHistoType = $ESDHistoType;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDHistoDysplasia($ESDHistoDysplasia){
		$this->ESDHistoDysplasia = $ESDHistoDysplasia;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDHistoInvasive($ESDHistoInvasive){
		$this->ESDHistoInvasive = $ESDHistoInvasive;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDHistoSMICDepth($ESDHistoSMICDepth){
		$this->ESDHistoSMICDepth = $ESDHistoSMICDepth;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDHistoSMICLVI($ESDHistoSMICLVI){
		$this->ESDHistoSMICLVI = $ESDHistoSMICLVI;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDHistoSMICLVIconfidence($ESDHistoSMICLVIconfidence){
		$this->ESDHistoSMICLVIconfidence = $ESDHistoSMICLVIconfidence;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDHistoSMICTB($ESDHistoSMICTB){
		$this->ESDHistoSMICTB = $ESDHistoSMICTB;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setESDHistoSMICDifferentiation($ESDHistoSMICDifferentiation){
		$this->ESDHistoSMICDifferentiation = $ESDHistoSMICDifferentiation;
	}

	/**
	 * @param Type: varchar(400)
	 */
	public function setESDgeneralnotes($ESDgeneralnotes){
		$this->ESDgeneralnotes = $ESDgeneralnotes;
	}

	/**
	 * @param Type: varchar(400)
	 */
	public function setESDSurgeryNotes($ESDSurgeryNotes){
		$this->ESDSurgeryNotes = $ESDSurgeryNotes;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setinCSPEMRRCT($inCSPEMRRCT){
		$this->inCSPEMRRCT = $inCSPEMRRCT;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setDescriptor($Descriptor){
		$this->Descriptor = $Descriptor;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setCSPExcluded($CSPExcluded){
		$this->CSPExcluded = $CSPExcluded;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setCSPExclusionReason($CSPExclusionReason){
		$this->CSPExclusionReason = $CSPExclusionReason;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setCSPRandomisation($CSPRandomisation){
		$this->CSPRandomisation = $CSPRandomisation;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLocationcm($Locationcm){
		$this->Locationcm = $Locationcm;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setLocationSpecific($LocationSpecific){
		$this->LocationSpecific = $LocationSpecific;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setCSPSnare($CSPSnare){
		$this->CSPSnare = $CSPSnare;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setCSPprotrusion($CSPprotrusion){
		$this->CSPprotrusion = $CSPprotrusion;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setCSPMarginbiopsy($CSPMarginbiopsy){
		$this->CSPMarginbiopsy = $CSPMarginbiopsy;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function settrainingPercentperformed($trainingPercentperformed){
		$this->trainingPercentperformed = $trainingPercentperformed;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function settrainingtakenoverreason($trainingtakenoverreason){
		$this->trainingtakenoverreason = $trainingtakenoverreason;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function settrainingtakenoverreason2($trainingtakenoverreason2){
		$this->trainingtakenoverreason2 = $trainingtakenoverreason2;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function settraineeinjection($traineeinjection){
		$this->traineeinjection = $traineeinjection;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function settraineeresection($traineeresection){
		$this->traineeresection = $traineeresection;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function settraineestsc($traineestsc){
		$this->traineestsc = $traineestsc;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function settraineedefectcheck($traineedefectcheck){
		$this->traineedefectcheck = $traineedefectcheck;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function settraineeclip($traineeclip){
		$this->traineeclip = $traineeclip;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function settraineespecimenretrieve($traineespecimenretrieve){
		$this->traineespecimenretrieve = $traineespecimenretrieve;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setconsultant_agrees_DMI($consultant_agrees_DMI){
		$this->consultant_agrees_DMI = $consultant_agrees_DMI;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setconsultantassistancetraining($consultantassistancetraining){
		$this->consultantassistancetraining = $consultantassistancetraining;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_enrolled($LANS_enrolled){
		$this->LANS_enrolled = $LANS_enrolled;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_excluded($LANS_excluded){
		$this->LANS_excluded = $LANS_excluded;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setLANS_excludedwhy($LANS_excludedwhy){
		$this->LANS_excludedwhy = $LANS_excludedwhy;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_indication($LANS_indication){
		$this->LANS_indication = $LANS_indication;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_prechromokudo_observer1($LANS_prechromokudo_observer1){
		$this->LANS_prechromokudo_observer1 = $LANS_prechromokudo_observer1;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_prechromodemarcatedarea_observer1($LANS_prechromodemarcatedarea_observer1){
		$this->LANS_prechromodemarcatedarea_observer1 = $LANS_prechromodemarcatedarea_observer1;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_prechromosmi_observer1($LANS_prechromosmi_observer1){
		$this->LANS_prechromosmi_observer1 = $LANS_prechromosmi_observer1;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_prechromosmiconfidence_observer1($LANS_prechromosmiconfidence_observer1){
		$this->LANS_prechromosmiconfidence_observer1 = $LANS_prechromosmiconfidence_observer1;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_observer1($LANS_observer1){
		$this->LANS_observer1 = $LANS_observer1;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_observer2($LANS_observer2){
		$this->LANS_observer2 = $LANS_observer2;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_postchromokudo_observer1($LANS_postchromokudo_observer1){
		$this->LANS_postchromokudo_observer1 = $LANS_postchromokudo_observer1;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_postchromosmi_observer1($LANS_postchromosmi_observer1){
		$this->LANS_postchromosmi_observer1 = $LANS_postchromosmi_observer1;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_postchromosmiconfidence_observer1($LANS_postchromosmiconfidence_observer1){
		$this->LANS_postchromosmiconfidence_observer1 = $LANS_postchromosmiconfidence_observer1;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_postchromodemarcatedarea_observer1($LANS_postchromodemarcatedarea_observer1){
		$this->LANS_postchromodemarcatedarea_observer1 = $LANS_postchromodemarcatedarea_observer1;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_prechromokudo_observer2($LANS_prechromokudo_observer2){
		$this->LANS_prechromokudo_observer2 = $LANS_prechromokudo_observer2;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_prechromodemarcatedarea_observer2($LANS_prechromodemarcatedarea_observer2){
		$this->LANS_prechromodemarcatedarea_observer2 = $LANS_prechromodemarcatedarea_observer2;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_prechromosmi_observer2($LANS_prechromosmi_observer2){
		$this->LANS_prechromosmi_observer2 = $LANS_prechromosmi_observer2;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_prechromosmiconfidence_observer2($LANS_prechromosmiconfidence_observer2){
		$this->LANS_prechromosmiconfidence_observer2 = $LANS_prechromosmiconfidence_observer2;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_postchromokudo_observer2($LANS_postchromokudo_observer2){
		$this->LANS_postchromokudo_observer2 = $LANS_postchromokudo_observer2;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_postchromodemarcatedarea_observer2($LANS_postchromodemarcatedarea_observer2){
		$this->LANS_postchromodemarcatedarea_observer2 = $LANS_postchromodemarcatedarea_observer2;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_postchromosmi_observer2($LANS_postchromosmi_observer2){
		$this->LANS_postchromosmi_observer2 = $LANS_postchromosmi_observer2;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLANS_postchromosmiconfidence_observer2($LANS_postchromosmiconfidence_observer2){
		$this->LANS_postchromosmiconfidence_observer2 = $LANS_postchromosmiconfidence_observer2;
	}

	/**
	 * @param Type: varchar(300)
	 */
	public function setLANS_comment($LANS_comment){
		$this->LANS_comment = $LANS_comment;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setIsNumberNodules($IsNumberNodules){
		$this->IsNumberNodules = $IsNumberNodules;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setIsSizeDominantNodule($IsSizeDominantNodule){
		$this->IsSizeDominantNodule = $IsSizeDominantNodule;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setIsNumberNodulesLarger8mm($IsNumberNodulesLarger8mm){
		$this->IsNumberNodulesLarger8mm = $IsNumberNodulesLarger8mm;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setIsLesionInclude($IsLesionInclude){
		$this->IsLesionInclude = $IsLesionInclude;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLPexcision($LPexcision){
		$this->LPexcision = $LPexcision;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setICVFat($ICVFat){
		$this->ICVFat = $ICVFat;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setStalkStudy($StalkStudy){
		$this->StalkStudy = $StalkStudy;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setStalkNumber($StalkNumber){
		$this->StalkNumber = $StalkNumber;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setStalkHisto1($StalkHisto1){
		$this->StalkHisto1 = $StalkHisto1;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setStalkHisto2($StalkHisto2){
		$this->StalkHisto2 = $StalkHisto2;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSignificant_pain_requiring_control_PAIN($Significant_pain_requiring_control_PAIN){
		$this->Significant_pain_requiring_control_PAIN = $Significant_pain_requiring_control_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setConsent_pain($Consent_pain){
		$this->Consent_pain = $Consent_pain;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setTempAtEntry_PAIN($TempAtEntry_PAIN){
		$this->TempAtEntry_PAIN = $TempAtEntry_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setTempAtPain_PAIN($TempAtPain_PAIN){
		$this->TempAtPain_PAIN = $TempAtPain_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setTempAtExit_PAIN($TempAtExit_PAIN){
		$this->TempAtExit_PAIN = $TempAtExit_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setVASAtEntry_PAIN($VASAtEntry_PAIN){
		$this->VASAtEntry_PAIN = $VASAtEntry_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setVasAtPain_PAIN($VasAtPain_PAIN){
		$this->VasAtPain_PAIN = $VasAtPain_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setVASAtExit_PAIN($VASAtExit_PAIN){
		$this->VASAtExit_PAIN = $VASAtExit_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLength_of_pain_PAIN($Length_of_pain_PAIN){
		$this->Length_of_pain_PAIN = $Length_of_pain_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setTime_to_pain_PAIN($Time_to_pain_PAIN){
		$this->Time_to_pain_PAIN = $Time_to_pain_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setIntervention_Conservative_1_PAIN($Intervention_Conservative_1_PAIN){
		$this->Intervention_Conservative_1_PAIN = $Intervention_Conservative_1_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setIntervention2_PAIN($Intervention2_PAIN){
		$this->Intervention2_PAIN = $Intervention2_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setIntervention_Conservative_2_PAIN($Intervention_Conservative_2_PAIN){
		$this->Intervention_Conservative_2_PAIN = $Intervention_Conservative_2_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setIntervention_Non_Conservative_1_PAIN($Intervention_Non_Conservative_1_PAIN){
		$this->Intervention_Non_Conservative_1_PAIN = $Intervention_Non_Conservative_1_PAIN;
	}

	/**
	 * @param Type: varchar(400)
	 */
	public function setInvestigation_findings_PAIN($Investigation_findings_PAIN){
		$this->Investigation_findings_PAIN = $Investigation_findings_PAIN;
	}

	/**
	 * @param Type: varchar(400)
	 */
	public function setSurgery_findings_PAIN($Surgery_findings_PAIN){
		$this->Surgery_findings_PAIN = $Surgery_findings_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setExtended_recovery_PAIN($Extended_recovery_PAIN){
		$this->Extended_recovery_PAIN = $Extended_recovery_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setPropofol_PAIN($Propofol_PAIN){
		$this->Propofol_PAIN = $Propofol_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setFentanyl_PAIN($Fentanyl_PAIN){
		$this->Fentanyl_PAIN = $Fentanyl_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setBuscopan_PAIN($Buscopan_PAIN){
		$this->Buscopan_PAIN = $Buscopan_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setGlucagon_PAIN($Glucagon_PAIN){
		$this->Glucagon_PAIN = $Glucagon_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setParacetemol_PAIN($Paracetemol_PAIN){
		$this->Paracetemol_PAIN = $Paracetemol_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setIntraprocedural_paracetemol_Number_PAIN($Intraprocedural_paracetemol_Number_PAIN){
		$this->Intraprocedural_paracetemol_Number_PAIN = $Intraprocedural_paracetemol_Number_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setAnaesthetic_PAIN($Anaesthetic_PAIN){
		$this->Anaesthetic_PAIN = $Anaesthetic_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setParacetemol_post_PAIN($Paracetemol_post_PAIN){
		$this->Paracetemol_post_PAIN = $Paracetemol_post_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setFentanyl_post_PAIN($Fentanyl_post_PAIN){
		$this->Fentanyl_post_PAIN = $Fentanyl_post_PAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setOther_post_PAIN($Other_post_PAIN){
		$this->Other_post_PAIN = $Other_post_PAIN;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setOpiod_painkiller($Opiod_painkiller){
		$this->Opiod_painkiller = $Opiod_painkiller;
	}

	/**
	 * @param Type: time
	 */
	public function setTimeinRoomPAIN($TimeinRoomPAIN){
		$this->TimeinRoomPAIN = $TimeinRoomPAIN;
	}

	/**
	 * @param Type: time
	 */
	public function setTimeinRecoveryPAIN($TimeinRecoveryPAIN){
		$this->TimeinRecoveryPAIN = $TimeinRecoveryPAIN;
	}

	/**
	 * @param Type: time
	 */
	public function setTimeinProcedurePAIN($TimeinProcedurePAIN){
		$this->TimeinProcedurePAIN = $TimeinProcedurePAIN;
	}

	/**
	 * @param Type: time
	 */
	public function setTimeinParacetemolPAIN($TimeinParacetemolPAIN){
		$this->TimeinParacetemolPAIN = $TimeinParacetemolPAIN;
	}

	/**
	 * @param Type: time
	 */
	public function setTimeinFentanylPAIN($TimeinFentanylPAIN){
		$this->TimeinFentanylPAIN = $TimeinFentanylPAIN;
	}

	/**
	 * @param Type: time
	 */
	public function setTimeNoFurtherPainPAIN($TimeNoFurtherPainPAIN){
		$this->TimeNoFurtherPainPAIN = $TimeNoFurtherPainPAIN;
	}

	/**
	 * @param Type: time
	 */
	public function setTimein2ndStagePAIN($Timein2ndStagePAIN){
		$this->Timein2ndStagePAIN = $Timein2ndStagePAIN;
	}

	/**
	 * @param Type: time
	 */
	public function setTimeinExitPAIN($TimeinExitPAIN){
		$this->TimeinExitPAIN = $TimeinExitPAIN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setARJRopivPAINandLESION($ARJRopivPAINandLESION){
		$this->ARJRopivPAINandLESION = $ARJRopivPAINandLESION;
	}


	public function getLesionsCentre($centre){


		if ($centre == 'ALL'){

			$q = "SELECT a.*, b.*, c.*
				FROM `Patient` as a
				INNER JOIN `Procedure` as b ON a.`_k_patient` = b.`_k_patient`
				INNER JOIN `Lesion` as c ON b.`_k_procedure` = c.`_k_procedure`
				ORDER BY b.`ProcedureDate` DESC";

		}else{


			$q = "SELECT a.*, b.*, c.*
				FROM `Patient` as a
				INNER JOIN `Procedure` as b ON a.`_k_patient` = b.`_k_patient`
				INNER JOIN `Lesion` as c ON b.`_k_procedure` = c.`_k_procedure`
				WHERE a.`Institution` = $centre ORDER BY b.`ProcedureDate` DESC";

		}

		$lesionArray = array();
		$lesionsCentre = array();
		$result = $this->connection->RunQuery($q);

		//$row = $result->fetch_array(MYSQLI_ASSOC);
		//get all k_lesions into an array
		//then foreach this array and copy in the matching data

		while($row[] = $result->fetch_array(MYSQLI_ASSOC));


		return json_encode($row);



	}


	public function getSpecificLesionsCentre($centre, $patientFields, $procedureFields, $lesionFields){

		//construct the query

		if ($patientFields){

			$implodedPatientFields = implode('` , a.`', $patientFields);

		}

		if ($procedureFields){

			$implodedProcedureFields = implode('` , b.`', $procedureFields);

		}

		if ($lesionFields){

			$implodedLesionFields = implode('` , c.`', $lesionFields);

		}


		$fieldsSearch = 'a. `' . $implodedPatientFields . '` , b.`' . $implodedProcedureFields . '` , c.`' . $implodedLesionFields . '` ';


		if ($centre == 'ALL'){

			$q = "SELECT $fieldsSearch
				FROM `Patient` as a
				INNER JOIN `Procedure` as b ON a.`_k_patient` = b.`_k_patient`
				INNER JOIN `Lesion` as c ON b.`_k_procedure` = c.`_k_procedure`
				ORDER BY b.`ProcedureDate` DESC";

			//echo $q;

		}else{


			$q = "SELECT $fieldsSearch
				FROM `Patient` as a
				INNER JOIN `Procedure` as b ON a.`_k_patient` = b.`_k_patient`
				INNER JOIN `Lesion` as c ON b.`_k_procedure` = c.`_k_procedure`
				WHERE a.`Institution` = $centre ORDER BY b.`ProcedureDate` DESC";

			//echo $q;

		}

		$lesionArray = array();
		$lesionsCentre = array();
		$result = $this->connection->RunQuery($q);

		//$row = $result->fetch_array(MYSQLI_ASSOC);
		//get all k_lesions into an array
		//then foreach this array and copy in the matching data

		while($row[] = $result->fetch_array(MYSQLI_ASSOC));


		return json_encode($row);



	}
	
	public function getPROSPERLesionsCentre($centre, $patientFields, $procedureFields, $lesionFields){

		//construct the query

		if ($patientFields){

			$implodedPatientFields = implode('` , a.`', $patientFields);

		}

		if ($procedureFields){

			$implodedProcedureFields = implode('` , b.`', $procedureFields);

		}

		if ($lesionFields){

			$implodedLesionFields = implode('` , c.`', $lesionFields);

		}


		$fieldsSearch = 'a. `' . $implodedPatientFields . '` , b.`' . $implodedProcedureFields . '` , c.`' . $implodedLesionFields . '` ';


		if ($centre == 'ALL'){

			$q = "SELECT $fieldsSearch
				FROM `Patient` as a
				INNER JOIN `Procedure` as b ON a.`_k_patient` = b.`_k_patient`
				INNER JOIN `Lesion` as c ON b.`_k_procedure` = c.`_k_procedure`
				WHERE c.`inPROSPER` = 1
				AND (c.`FirstFU` IS NULL OR c.`FirstFU` = '')
				ORDER BY b.`ProcedureDate` DESC"
				
				;

			//echo $q;

		}else{


			$q = "SELECT $fieldsSearch
				FROM `Patient` as a
				INNER JOIN `Procedure` as b ON a.`_k_patient` = b.`_k_patient`
				INNER JOIN `Lesion` as c ON b.`_k_procedure` = c.`_k_procedure`
				WHERE c.`inPROSPER` = 1
				AND (c.`FirstFU` IS NULL OR c.`FirstFU` = '')
				AND a.`Institution` = $centre 
				ORDER BY b.`ProcedureDate` DESC";

			//echo $q;

		}

		$lesionArray = array();
		$lesionsCentre = array();
		$result = $this->connection->RunQuery($q);

		//$row = $result->fetch_array(MYSQLI_ASSOC);
		//get all k_lesions into an array
		//then foreach this array and copy in the matching data

		while($row[] = $result->fetch_array(MYSQLI_ASSOC));


		return json_encode($row);



	}

	public function getLesionCentre ($lesionid){

		$q = "SELECT a.`Institution`, d.`centre_name`, d.`inCLIP`, d.`inPROSPER`
				FROM `Patient` as a
				INNER JOIN `Procedure` as b ON a.`_k_patient` = b.`_k_patient`
				INNER JOIN `Lesion` as c ON b.`_k_procedure` = c.`_k_procedure`
				INNER JOIN `Centres` as d ON a.`Institution` = d.`_k_centre`
				WHERE c.`_k_lesion` = $lesionid;";

		$result = $this->connection->RunQuery($q);

		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$institution = $row['Institution'];
		}

		return $institution;


	}

	public function getLesionProcedure ($lesionid){

		$q = "SELECT b.`_k_procedure`
				FROM `Patient` as a
				INNER JOIN `Procedure` as b ON a.`_k_patient` = b.`_k_patient`
				INNER JOIN `Lesion` as c ON b.`_k_procedure` = c.`_k_procedure`
				WHERE c.`_k_lesion` = $lesionid;";

		$result = $this->connection->RunQuery($q);

		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$procedureid = $row['_k_procedure'];
		}

		return $procedureid;


	}

	public function getLesionPatient ($lesionid){

		$q = "SELECT a.`_k_patient`
				FROM `Patient` as a
				INNER JOIN `Procedure` as b ON a.`_k_patient` = b.`_k_patient`
				INNER JOIN `Lesion` as c ON b.`_k_procedure` = c.`_k_procedure`
				WHERE c.`_k_lesion` = $lesionid;";

		$result = $this->connection->RunQuery($q);

		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$studyid = $row['_k_patient'];
		}

		return $studyid;


	}

	public function isLesionCentreInCLIP ($lesionid){

		$q = "SELECT a.`Institution`, d.`centre_name`, d.`inCLIP`, d.`inPROSPER`
				FROM `Patient` as a
				INNER JOIN `Procedure` as b ON a.`_k_patient` = b.`_k_patient`
				INNER JOIN `Lesion` as c ON b.`_k_procedure` = c.`_k_procedure`
				INNER JOIN `Centres` as d ON a.`Institution` = d.`_k_centre`
				WHERE c.`_k_lesion` = $lesionid;";

		$result = $this->connection->RunQuery($q);

		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$CLIP = $row['inCLIP'];
		}

		if ($CLIP == '1'){

			return true;

		}else{

			return false;

		}

	}

	public function isLesionCentreInPROSPER ($lesionid){

		$q = "SELECT a.`Institution`, d.`centre_name`, d.`inCLIP`, d.`inPROSPER`
				FROM `Patient` as a
				INNER JOIN `Procedure` as b ON a.`_k_patient` = b.`_k_patient`
				INNER JOIN `Lesion` as c ON b.`_k_procedure` = c.`_k_procedure`
				INNER JOIN `Centres` as d ON a.`Institution` = d.`_k_centre`
				WHERE c.`_k_lesion` = $lesionid;";

		$result = $this->connection->RunQuery($q);

		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$PROSPER = $row['inPROSPER'];
		}

		if ($PROSPER == '1'){

			return true;

		}else{

			return false;

		}

	}

	public function isLesionCentreInCSP ($lesionid){

		$q = "SELECT a.`Institution`, d.`centre_name`, d.`inCSP`
				FROM `Patient` as a
				INNER JOIN `Procedure` as b ON a.`_k_patient` = b.`_k_patient`
				INNER JOIN `Lesion` as c ON b.`_k_procedure` = c.`_k_procedure`
				INNER JOIN `Centres` as d ON a.`Institution` = d.`_k_centre`
				WHERE c.`_k_lesion` = $lesionid;";

		$result = $this->connection->RunQuery($q);

		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$CSP = $row['inCSP'];
		}

		if ($CSP == '1'){

			return true;

		}else{

			return false;

		}

	}


	public function setMultiple($entryArray){

		unset($entryArray['connection']);
		foreach ($entryArray as $key=>$value){

			$this->$key = NULL;
			//once the lesion is loaded from the key perhaps the values are not 0
			//this needs to be the case, they need to be null

			if ($value != ''){

				$this->$key = $value;
				//echo 'set this->'.$key.' to'. $value . '<br>';
				//need some way of not setting all to 0 here

			}else {

				$this->$key = NULL;

			}
		}

	}

	public function setFromGet($getArray){

		//unset($entryArray['connection']);
		foreach ($getArray as $key=>$value){


			if ($value != ''){

				$this->$key = $value;
				//echo 'set this->'.$key.' to'. $value . '<br>';
				//need some way of not setting all to 0 here

			}
		}

	}


	public function JS_var_old(){

		//return json_encode($result);

		return json_encode($lesion->all_var());





	}


	public function JS_var(){

		//return json_encode($result);

		$result = get_object_vars($this);
		$json = json_encode($result);
		$error = json_last_error();

		if ($error !== JSON_ERROR_NONE) {

			return json_last_error_msg();

		}else {

			return $json;

		}






	}

	public function all_var(){
		$result = get_object_vars($this);
		return ($result);
	}


	public function GetValues($column){

		$column_t = $column . '_t';
		$values = array();
		$result = $this->connection->RunQuery("SELECT $column, $column_t from `values` WHERE $column IS NOT NULL");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$desiredKey = $row[$column];
			$desiredValue = $row[$column_t];
			$values[$desiredKey] = $desiredValue;
		}
		return $values;
	}

	public function GetValuesArray($values){

		//for each array value
		// generate column t
		// get as pairs
		$overallValues = array();

		foreach ($values as $key=>$value){

			$column_t = $value . '_t';

			$result = $this->connection->RunQuery("SELECT $value, $column_t from `values` WHERE $value IS NOT NULL");
			//print_r($result);
			if ($result->num_rows > 0){

				while($row = $result->fetch_array(MYSQLI_ASSOC)){
					$desiredKey = $row[$value];
					$desiredValue = $row[$column_t];
					$overallValues[$value][$desiredKey] = $desiredValue;
				}
			}

		}

		return $overallValues;

	}

	/*

		$values = $lesion->GetValuesAll();
		$overallvalues = $lesion->GetValuesArray($values);
		//print_r($overallvalues);
		//json_encode($overallvalues);
				$json = json_encode($overallvalues);
			$error = json_last_error();
			if ($error !== JSON_ERROR_NONE) {
				echo json_last_error_msg();
			} else {
				echo $json;
			}


	*/




	public function GetValuesv2(){

		$valuesFirst = $this->GetValuesAll();
		$overallvalues = $this->GetValuesArray($valuesFirst);
		$json = json_encode($overallvalues);
		$error = json_last_error();

		if ($error !== JSON_ERROR_NONE) {

			return json_last_error_msg();

		}else {

			return $json;

		}


	}

	public function GetValuesAll(){

		//$values = a rray();
		$values = array();
		$result = $this->connection->RunQuery("SELECT * from `values`");

		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$i=0;
			$string='_t';
			foreach ($row as $key=>$value){
				if (strpos($key, $string) === false) {
					$desiredKey = $key;
					$values[$i] = $desiredKey;
					$i++;
				}
			}

		}

		unset($values[0]);
		//$implodeArray = implode('\', \'', $values);
		return $values;
		//return $implodeArray;

	}


	public function GetValuesSpecific($specificValues){


		//get specific value lists

		$implodedSpecificValues = implode('` , `', $specificValues);


		//$values = a rray();
		$values = array();
		$q = "SELECT `". $implodedSpecificValues ."` from `values`";
		//echo $q;
		$result = $this->connection->RunQuery($q);

		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$i=0;
			$string='_t';
			foreach ($row as $key=>$value){
				if (strpos($key, $string) === false) {
					$desiredKey = $key;
					$values[$i] = $desiredKey;
					$i++;
				}
			}

		}

		//unset($values[0]);
		//$implodeArray = implode('\', \'', $values);
		return $values;
		//return $implodeArray;

	}


	public function returnWithValue($desired, $values){

		foreach ($values as $x=>$y) {

			if ($x == $desired){
				return $y;
				exit();

			}

		}

	}

	public function wasAttempted (){

		if ($this->EMRAttempted == '6'){
			return 1;
		} else {
			return 0;

		}


	}

	public function wasSuccessful (){

		if ($this->SuccessfulEMR == '1'){
			return 1;
		} else {
			return 0;

		}


	}

	public function wasEMR (){

		if ($this->ActualPredominantProcedure == '1' || $this->ActualPredominantProcedure == '2'){
			return 1;
		} else {
			return 0;

		}

	}

	public function wasESD (){

		if ($this->ActualPredominantProcedure == '3'){
			return 1;
		} else {
			return 0;

		}

	}

	public function wasCSP (){

		if ($this->ActualPredominantProcedure == '4'){
			return 1;
		} else {
			return 0;

		}

	}

	public function checkisValidLesion ($getLesion, $postLesion) {


		if((isset($getLesion)) && (is_numeric($getLesion))) {
			$lesionid = $getLesion;
			$result1 = $this->Load_from_key($lesionid);
			if ($result1->num_rows == '1'){
				return 1;
			} else {
				$lesionid = NULL;
				return 0;   }

		} elseif ((isset($postLesion)) && (is_numeric($postLesion))) {
			$lesionid = $postLesion;
			$result1 = $this->Load_from_key($lesionid);
			if ($result1->num_rows == '1'){
				return 1;
			} else {
				$lesionid = NULL;
				return 0;   }
		}




	}


	public function checkisValidLesionSimple ($lesionid){

		$result1 = $this->Load_from_key($lesionid);
		if ($result1->num_rows == '1'){
			return 1;
		} else {
			$lesionid = NULL;
			return 0;   }

	}

	public function removeFromPROSPER ($lesionid) {

		if ($this->checkisValidLesionSimple ($lesionid) == '1'){

			$this->Load_from_key($lesionid);


			if ($this->getinPROSPER() == '1'){


				$this->setinPROSPER('0');
				$this->setconsent_PROSPER('0');
				$this->setcompleteColon_PROSPER('0');
				$this->setdefectTattoo_PROSPER('0');
				$this->setdateEnrolled_PROSPER('0');
				$this->setvariation_PROSPER('0');
				if ($this->Save_Active_Row() == '0'){

					return 'Error, could not remove from PROSPER';

				}else if ($this->Save_Active_Row() == '1'){

						return 'Lesion removed from PROSPER';

					}

			} else {

				echo 'Error, lesion is not enrolled in PROSPER';


			}

		} else {

			echo 'Invalid Lesion, cannot delete';


		}




	}

	//!Start of metric calculators

	public function countPatientsAllCentres(){

		$q = "SELECT COUNT(`_k_patient`) AS `cp` FROM `Patient`";

		$result = $this->connection->RunQuery($q);

		while($row = $result->fetch_array(MYSQLI_ASSOC)){

			$numPatients = $row['cp'];

		}

		return $numPatients;

	}

	public function totalPatientsUserCentre($centreid){

		$q = "SELECT COUNT(`_k_patient`) AS `cp` FROM `Patient` WHERE `Institution` = $centreid";

		$result = $this->connection->RunQuery($q);

		while($row = $result->fetch_array(MYSQLI_ASSOC)){

			$numPatientsCentre = $row['cp'];

		}

		return $numPatientsCentre;

	}

	public function percentageAtMyCentre ($centreid){

		$myPatientPercentage = ($this->totalPatientsUserCentre($centreid) / $this->countPatientsAllCentres()) * 100;
		$myPatientPercentage = round($myPatientPercentage, 1);
		return $myPatientPercentage;


	}


	//!Data Summary Functions

	public function lesionsWithoutImages() {

		//all lesions without ANY images

		$q = "select Lesion._k_lesion from Lesion left outer join images on (Lesion._k_lesion = images._k_lesion)
				where images._k_lesion is null
				order by Lesion._k_lesion desc ";

	}

	public function doesLesionHaveAnyImages($lesionid) {

		//all lesions without ANY images

		$q = "select Lesion._k_lesion from Lesion left outer join images on (Lesion._k_lesion = images._k_lesion)
				where images._k_lesion is null
				and Lesion._k_lesion = $lesionid
				order by Lesion._k_lesion desc ";

		return $this->returnTrueFalseDBQuery($q);

	}

	public function returnTrueFalseDBQuery ($q){

		$result = $this->connection->RunQuery($q);

		if ($result1->num_rows == 1){
			return FALSE;

		} else {

			return TRUE;

		}


	}

	//!Use this for all returns to Javascript requiring knowledge of whether row updated or not

	public function returnYesNoDBQuery ($q){
		
		
		//print_r($q);
		
		
		$result = $this->connection->RunQuery($q);

		//print_r($result);
		
			//IF THERE is a database error return 2
			
			//IF THERE are no rows affected but no errors return 0
			
			//IF THERE is one row affected return 1
			
			if ($result){
			
			
				//print_r($this->connection->conn->affected_rows);
		
				//print_r($this->connection->conn, there is plenty else in this object including error_list as an array and connect_error);
		
				if ($this->connection->conn->affected_rows == 1){
					
					return 1;
		
				} else {
		
					return 0;
		
				}
			
			} else {
				
				return 2;
				
			}

	}

	public function updateLANS ($q){

		$this->returnYesNoDBQuery($q);


	}

	public function missing2week ($centre){

		if ($centre == 77){$centre=1;}

		$q = 'select count(a.`_k_lesion`) as numberLesions from `Lesion` as a
				INNER JOIN `Procedure` as b on b.`_k_procedure` = a.`_k_procedure`
				INNER JOIN `Patient` as c on c.`_k_patient` = b.`_k_patient`
				WHERE (`FollowUp2Weeks` = 0 OR `FollowUp2Weeks` IS NULL
				OR `DelayedBleed` IS NULL)
				AND ((SELECT TIMESTAMPDIFF(DAY, b.`ProcedureDate`, CURDATE()))>14)
				AND c.`Institution` = ' . $centre;

		$result = $this->connection->RunQuery($q);

		while($row = $result->fetch_array(MYSQLI_ASSOC)){

			$missing2week = $row['numberLesions'];

		}

		return $missing2week;




	}

	public function missingHistologyData($centre){

		if ($centre == 77){$centre=1;}


		$q = "select count(a.`_k_lesion`) as numberLesions from `Lesion` as a
				INNER JOIN `Procedure` as b on b.`_k_procedure` = a.`_k_procedure`
				INNER JOIN `Patient` as c on c.`_k_patient` = b.`_k_patient`
				WHERE (`HistoPathMajor` IS NULL)
				OR (`Cancer` = 1 AND (`SMInvasion` IS NULL OR `SMInvasion` = 0))
				OR (`HistoPathMajor` = 7 AND (`SMInvasion` IS NULL OR `SMInvasion` = 0))
				AND ((SELECT TIMESTAMPDIFF(DAY, b.`ProcedureDate`, CURDATE()))>14)
				AND c.`Institution` = $centre";


		$result = $this->connection->RunQuery($q);

		while($row = $result->fetch_array(MYSQLI_ASSOC)){

			$missingHistology = $row['numberLesions'];

		}

		return $missingHistology;


	}

	public function missingSC1data($centre){

		if ($centre == 77){$centre=1;}


		$q = "select count(a.`_k_lesion`) as numberLesions from `Lesion` as a
				INNER JOIN `Procedure` as b on b.`_k_procedure` = a.`_k_procedure`
				INNER JOIN `Patient` as c on c.`_k_patient` = b.`_k_patient`
				WHERE (`FirstFU` IS NULL)
				AND ((SELECT TIMESTAMPDIFF(MONTH, b.`ProcedureDate`, CURDATE()))>6)
				AND c.`Institution` = $centre";


		$result = $this->connection->RunQuery($q);

		while($row = $result->fetch_array(MYSQLI_ASSOC)){

			$missingSC1 = $row['numberLesions'];

		}

		return $missingSC1;


	}

	public function missingSC2data($centre){

		if ($centre == 77){$centre=1;}


		$q = "select count(a.`_k_lesion`) as numberLesions from `Lesion` as a
				INNER JOIN `Procedure` as b on b.`_k_procedure` = a.`_k_procedure`
				INNER JOIN `Patient` as c on c.`_k_patient` = b.`_k_patient`
				WHERE (`SecondFU` IS NULL)
				AND ((SELECT TIMESTAMPDIFF(MONTH, b.`ProcedureDate`, CURDATE()))>18)
				AND c.`Institution` = $centre";


		$result = $this->connection->RunQuery($q);

		while($row = $result->fetch_array(MYSQLI_ASSOC)){

			$missingSC2 = $row['numberLesions'];

		}

		return $missingSC2;


	}

	public function missingSC3data($centre){

		if ($centre == 77){$centre=1;}


		$q = "select count(a.`_k_lesion`) as numberLesions from `Lesion` as a
				INNER JOIN `Procedure` as b on b.`_k_procedure` = a.`_k_procedure`
				INNER JOIN `Patient` as c on c.`_k_patient` = b.`_k_patient`
				WHERE (`ThirdFU` IS NULL)
				AND ((SELECT TIMESTAMPDIFF(MONTH, b.`ProcedureDate`, CURDATE()))>54)
				AND c.`Institution` = $centre";


		$result = $this->connection->RunQuery($q);

		while($row = $result->fetch_array(MYSQLI_ASSOC)){

			$missingSC3 = $row['numberLesions'];

		}

		return $missingSC3;


	}

	public function missingSC4data($centre){

		if ($centre == 77){$centre=1;}


		$q = "select count(a.`_k_lesion`) as numberLesions from `Lesion` as a
				INNER JOIN `Procedure` as b on b.`_k_procedure` = a.`_k_procedure`
				INNER JOIN `Patient` as c on c.`_k_patient` = b.`_k_patient`
				WHERE (`FourthFU` IS NULL)
				AND ((SELECT TIMESTAMPDIFF(MONTH, b.`ProcedureDate`, CURDATE()))>114)
				AND c.`Institution` = $centre";


		$result = $this->connection->RunQuery($q);

		while($row = $result->fetch_array(MYSQLI_ASSOC)){

			$missingSC4 = $row['numberLesions'];

		}

		return $missingSC4;


	}


	public function getPercentageofCentreLesions ($centre, $value){

		if ($centre == 77){$centre=1;}

		$percentage = ($value / $this->totalPatientsUserCentre($centre)) * 100;
		$myPatientPercentage = round($percentage, 1);
		return $myPatientPercentage;

	}
	
	//!STUDY FUNCTIONS
	
	public function countPROSPER() {
		
		$q = "SELECT count(_k_lesion) AS count FROM Lesion
				WHERE inPROSPER = 1";
		
		$result = $this->connection->RunQuery($q);
		
		
		while($row = $result->fetch_array(MYSQLI_ASSOC)){

			$count = $row['count'];

		}
		
		return $count;
				
	}
	
	public function countPROSPERwithoutFollowUp() {
		
		$q = "SELECT count(_k_lesion) AS count FROM Lesion
				WHERE inPROSPER = 1
				AND (FirstFU IS NULL OR FirstFU = '')";
				
		$result = $this->connection->RunQuery($q);
		
		
		while($row = $result->fetch_array(MYSQLI_ASSOC)){

			$count = $row['count'];

		}
		
		return $count;
		
		
		
	}



	//!Image manipulation functions

	public function selectRandomImage ($centreid){

		//echo 'centre passed was ' . $centreid;

		if ($centreid == 77){$centreid=1;}

		$q = "SELECT a.`filename` FROM `images` as a
			  INNER JOIN `Lesion` as b ON a.`_k_lesion` = b.`_k_lesion`
			  INNER JOIN `Procedure` as c ON b.`_k_procedure` = c.`_k_procedure`
			  INNER JOIN `Patient` as d ON d.`_k_patient` = c.`_k_patient`
				WHERE d.`Institution` = $centreid
				AND a.`position` = 1
				AND a.`stage` = 1
				ORDER BY RAND()
				LIMIT 1";

		$result = $this->connection->RunQuery($q);

		//print_r($result);

		if ($result->num_rows == 1){

			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				$filename = $row['filename'];

			}

			return $filename;


		} else {

			return null;

		}

	}

	public function selectTenRandomImageSets ($centreid){

		//echo 'centre passed was ' . $centreid;
		

		$q = "SELECT a.`filename`, a.`position`, b.`_k_lesion`, b.`Size`, b.`Morphology`, b.`Location`, b.`HistoPathMajor`, b.`Dysplasia`, b.`Cancer`, b.`SMInvasion` FROM `images` as a
			  INNER JOIN `Lesion` as b ON a.`_k_lesion` = b.`_k_lesion`
			  INNER JOIN `Procedure` as c ON b.`_k_procedure` = c.`_k_procedure`
			  INNER JOIN `Patient` as d ON d.`_k_patient` = c.`_k_patient`
				WHERE d.`Institution` = $centreid
				AND a.`position` > 0
				AND a.`stage` = 1
				ORDER BY b.`_k_lesion`, a.`position` ASC
				";

		//modify this to only allow 8 picture groups in

		$result = $this->connection->RunQuery($q);

		//print_r($result);

		if ($result->num_rows > 1){

			$x = 0;
			$y = 1;
			$lesionid='';



			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				if ($lesionid == $row['_k_lesion']){

					//do for more images

					$filename = $row['filename'];
					$position = $row['position'];
					$lesionid = $row['_k_lesion'];
					$size = $row['Size'];
					$morphology = $row['Morphology'];
					$location = $row['Location'];


					echo "<div class='col-1'>";

					echo "<img id='$lesionid' class='lslimage zoom' src='https://www.acestudy.net/studyserver/$filename'>";

					echo "</div>";

					$x++;

				}else{

					//first time x=0

					if ($x==0){

						//do initial include define x as 1
						$x=1;

						echo "<div class='row'>";


						$filename = $row['filename'];
						$position = $row['position'];
						$lesionid = $row['_k_lesion'];
						$size = $row['Size'];
						$morphology = $row['Morphology'];
						$location = $row['Location'];
						$histology = $row['HistoPathMajor'];
						$dysplasia = $row['Dysplasia'];
						$cancer = $row['Cancer'];
						$sminvasion = $row['SMInvasion'];

						echo "<div class='col-2' data='$x'><div class='description'>$size mm " . $this->returnWithValue($morphology, $this->GetValues('Morphology')) . " LSL in the " . $this->returnWithValue($location, $this->GetValues('Location')) . ". <br>";

						if ($histology != null || $histology != ''){

							echo "Histology " . $this->returnWithValue($histology, $this->GetValues('HistoPathMajor')) . " with " . $this->returnWithValue($dysplasia, $this->GetValues('Dysplasia')) . ". <br>";

						}

						if ($cancer != null || $cancer != ''){

							if ($cancer == '1'){

								echo 'There was evidence of ' . $this->returnWithValue($sminvasion, $this->GetValues('SMinvasion'));

							}else if ($cancer == '0'){

									echo 'There was no evidence of SMIC';

								}


						}

						echo "</div>";

						echo "</div>";


						echo "<div data='$x' class='col-1'>";

						echo "<img id='$lesionid' class='lslimage zoom' src='https://www.acestudy.net/studyserver/$filename'>";

						echo "</div>";

						$x++;

						continue;


					}elseif ($x>0){

						//images where there are less than 8 images

						if ($x>1){



							echo "<div data='$x' class='col-";

							if ($x==2){echo '7';}
							if ($x==3){echo '6';}
							if ($x==4){echo '5';}
							if ($x==5){echo '4';}
							if ($x==6){echo '3';}
							if ($x==7){echo '2';}
							if ($x==8){echo '1';}


							echo "'></div>"; // add remaining columns

							echo "</div>"; // close the row



							$x=1; //reset x

							echo "<div class='row'>";

							$filename = $row['filename'];
							$position = $row['position'];
							$lesionid = $row['_k_lesion'];
							$size = $row['Size'];
							$morphology = $row['Morphology'];
							$location = $row['Location'];
							$histology = $row['HistoPathMajor'];
							$dysplasia = $row['Dysplasia'];
							$cancer = $row['Cancer'];
							$sminvasion = $row['SMInvasion'];

							echo "<div class='col-2' data='$x'><div class='description'>$size mm " . $this->returnWithValue($morphology, $this->GetValues('Morphology')) . " LSL in the " . $this->returnWithValue($location, $this->GetValues('Location')) . ". <br>";

							if ($histology != null || $histology != ''){

								echo "Histology " . $this->returnWithValue($histology, $this->GetValues('HistoPathMajor')) . " with " . $this->returnWithValue($dysplasia, $this->GetValues('Dysplasia')) . ". <br>";

							}

							if ($cancer != null || $cancer != ''){

								if ($cancer == '1'){

									echo 'There was evidence of ' . $this->returnWithValue($sminvasion, $this->GetValues('SMinvasion'));

								}else if ($cancer == '0'){

										echo 'There was no evidence of SMIC';

									}


							}

							echo "</div>";

							echo "</div>";

							echo "<div data='$x' class='col-1'>";

							echo "<img id='$lesionid' class='lslimage zoom' src='https://www.acestudy.net/studyserver/$filename'>";

							echo "</div>";

							$x++;
							$y++;




						}





					}



				}



				/*if ($x % 8 == 0){

					echo "</div>";
					echo "<div class='row'>";
					echo "<div class='col-2'></div>";

					} */





			}



		}

	}

	
	//!Sanitise form input and other important functions
	
	public function sanitiseInput ($data) {
		
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		
	}
	
	public function printFieldNames (){
		
		$q1 = "SELECT CONCAT('a.`', COLUMN_NAME , '`, ') AS names FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = 'VosCAR' AND TABLE_NAME = 'Patient'";
		$q2 = "SELECT CONCAT('b.`', COLUMN_NAME , '`, ') AS names FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = 'VosCAR' AND TABLE_NAME = 'Procedure'";
		$q3 = "SELECT CONCAT('c.`', COLUMN_NAME , '`, ') AS names FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = 'VosCAR' AND TABLE_NAME = 'Lesion'";
		
		$result = $this->connection->RunQuery($q1);
		
		while($row = $result->fetch_array(MYSQLI_ASSOC)){

				print_r($row['names']);

			}
			
		echo '<br>';
		
		$result2 = $this->connection->RunQuery($q2);
		
		while($row = $result2->fetch_array(MYSQLI_ASSOC)){

				echo $row['names'];

			}
			
			echo '<br>';


		$result3 = $this->connection->RunQuery($q3);
		

		print_r($result1);

					
			while($row = $result3->fetch_array(MYSQLI_ASSOC)){

				echo $row['names'];

			}

			
			
			

			
		
		
		
		
	
	}
	
	public function generateGetCSVQuery ($user_level, $user_centre) {
		
		//echo 'user centre passed is ' . $user_centre;
		
		//echo 'function entered';
		
		if ($user_level == 1) {
			
			$q = "SELECT  
			
			a.`_k_patient`, a.`_k_patient_old`, a.`extra`, a.`duplicate`, a.`Sex`, a.`DOB`, a.`Age`, a.`Institution`, a.`ProspectiveEthics`, a.`Family_Hx`, a.`Number_affected_FH`, a.`Relationship_1`, a.`Age_1_FH`, a.`Relationship_2`, a.`Age_2_FH`, b.`_k_procedure`, b.`_k_procedure_old`, b.`_k_procedure_original`, b.`_k_patient_updated_based_on_updates`, b.`toShift`, b.`toTransfer`, b.`duplicate`, b.`_k_patient`, b.`_k_patient_old`, b.`Institution`, b.`ProcedureDate`, b.`Age`, b.`Consultant`, b.`Endoscopist`, b.`Complete_Colon`, b.`TertiaryReferral`, b.`RefDocType`, b.`ASA`, b.`MajorComorb_Simple`, b.`MajorComorbNone`, b.`MajorComorbIHD`, b.`MajorComorbCCF`, b.`MajorComorbHT`, b.`MajorComorbCVA`, b.`MajorComorbChronicResp`, b.`MajorComorbChronicRenal`, b.`MajorComorbMajorRheum`, b.`MajorComorbLiverDisease`, b.`MajorComorbCirrhosis`, b.`MajorComorbActiveCa`, b.`MajorComorbDM1`, b.`MajorComorbDM2`, b.`MajorComorbHaem`, b.`MajorComorbObese`, b.`MajorComorbOther`, b.`MajorComorb_OtherNotes`, b.`Reg_Antithromb`, b.`Reg_Antithromb_1`, b.`Reg_Antithromb_1Other`, b.`Discontinuation1`, b.`Reg_Antithromb_2`, b.`Reg_Antithromb_2Other`, b.`Discontinuation2`, b.`Reg_Antithromb_7daySum`, b.`Pain`, b.`DirectAdmit`, b.`DirectAdmitReason`, b.`DirectAdmit_Other`, b.`MultipleEMRs`, b.`DirectAdmit_NoNights`, b.`DirectAdmit_NonSocialYN`, b.`DelayedAdmit`, b.`DelayedAdmit_Reason`, b.`DelayedAdmit_ReasonOther`, b.`DelayedAdmit_NoNights`, b.`AnyAdmit`, b.`TotalInpatientNights`, b.`AnyAdmitNotes`, b.`MainIndic`, b.`MainIndic_Other`, b.`Height`, b.`Weight`, b.`AbdoCirc`, b.`Smoking100CigsEver`, b.`SmokingCigsPerDay`, b.`AlcoholCurrent`, b.`AlcoholEver`, b.`Bowel_preparation`, b.`total_polyps`, b.`total_polyps_resected`,
c.`_k_lesion`, c.`_k_lesion_old`, c.`_k_lesion_original`, c.`toShift`, c.`toTransfer`, c.`duplicate`, c.`_k_procedure`, c.`_k_procedure_old`, c.`LegacyRecord`, c.`PreviousAttempt`, c.`PreviousBiopsy`, c.`PreviousSPOT`, c.`IntendedProcedure`, c.`ActualPredominantProcedure`, c.`Prev_HistoMajor`, c.`Prev_HistoDysplasia`, c.`Size`, c.`Location`, c.`Paris`, c.`Morphology`, c.`HighestKudo`, c.`HighestSano`, c.`NICE_Overall`, c.`SSADetail`, c.`Predict_Cancer`, c.`Predict_Histo`, c.`Predict_Histo_Confidence`, c.`Feat_Invasion`, c.`EnBloc`, c.`Access`, c.`EMRAttempted`, c.`SMInjection`, c.`Constituent`, c.`Constituent_other`, c.`Adrenaline`, c.`Dye`, c.`No_Injection`, c.`Lifting`, c.`SnareType`, c.`SnareSize`, c.`EndoscopeCapUsed`, c.`Current`, c.`No_Pieces`, c.`SnareExcision`, c.`AddModality`, c.`SuccessfulEMR`, c.`STSC_Margin`, c.`SCAR_complete`, c.`DefectTattoo`, c.`IPBleed`, c.`IPBleed_Control`, c.`SMF`, c.`SMF_Fgrade`, c.`SMF_Prediction`, c.`SMF_Prediction_confidence`, c.`CentralSMF`, c.`FibrosisCancerRisk`, c.`ProcedureStoppedCancer`, c.`OverlyingFold`, c.`FibrosisofSignificance`, c.`DeepInjury`, c.`IPPerforation`, c.`IPPerforation_Rx`, c.`Defect_Clip_Closure`, c.`Defect_Clip_Closure_Number`, c.`Duration`, c.`DurationComplication`, c.`HistoPathMajor`, c.`HistoPathNotes`, c.`HistoPathOtherNotes`, c.`PathologicalMPScore`, c.`MPWidth`, c.`MPDepth`, c.`MPSlices`, c.`MPNotes`, c.`FormalPathReview`, c.`PathologistFormalReview`, c.`Cancer`, c.`Dysplasia`, c.`SMInvasion`, c.`SMInvasionNotes`, c.`Margins`, c.`SpecimenSize`, c.`HistoPathWidth`, c.`DelayedBleed`, c.`DelayedBleed_Admit`, c.`DelayedBleed_Colon`, c.`DelayedPerforation`, c.`DelayedPerforation_Rx`, c.`Disposition2Weeks`, c.`FollowUp2Weeks`, c.`SurgReferral`, c.`BookTwoStage`, c.`TwoStageDate`, c.`TwoStageMonths`, c.`TwoStage`, c.`TwoStageSuccess`, c.`TwoStageOutcome`, c.`TwoStageOutcomeOther`, c.`FirstFU`, c.`FirstFUMonths`, c.`FirstFUDate`, c.`FirstFURecurrence`, c.`FirstFUNoRecurScarBx`, c.`FirstFURecurrenceSites`, c.`FirstFURecurrenceLocation`, c.`FirstFURecurrenceLargest`, c.`FirstFURecurrenceRx`, c.`FirstFURecurrenceRx_old`, c.`FirstFURecurrenceExcision`, c.`FirstFURecurrenceNotes`, c.`FirstFURecurHisto`, c.`FirstFURecurHistoDysplasia`, c.`FirstFUNextColon_Mths`, c.`FirstFUOutcome`, c.`FirstFUDisposition`, c.`FirstFUSurgery`, c.`FirstFUSurgeryMethod`, c.`FirstFUSurgeryResidual`, c.`FirstFUSurgeryType`, c.`FirstFUSurgeryNotes`, c.`SecondFU`, c.`SecondFUMonths`, c.`SecondFUDate`, c.`SecondFURecurrence`, c.`SecondFUNoRecurScarBx`, c.`SecondFURecurrenceLargest`, c.`SecondFURecurrenceLocation`, c.`SecondFURecurrenceSites`, c.`SecondFUDisposition`, c.`SecondFURecurrenceRx`, c.`SecondFURecurrenceRx_old`, c.`SecondFURecurrenceExcision`, c.`SecondFURecurrenceNotes`, c.`SecondFURecurHisto`, c.`SecondFURecurHistoDysplasia`, c.`SecondFUNextColon_Mths`, c.`SecondFUOutcome`, c.`SecondFUSurgery`, c.`SecondFUSurgeryNotes`, c.`SecondFUSurgeryMethod`, c.`SecondFUSurgeryResidual`, c.`SecondFUSurgeryType`, c.`ThirdFU`, c.`ThirdFUDate`, c.`ThirdFUMonths`, c.`ThirdFUDisposition`, c.`ThirdFUNoRecurScarBx`, c.`ThirdFUOutcome`, c.`ThirdFURecurHisto`, c.`ThirdFURecurrence`, c.`ThirdFURecurrenceExcision`, c.`ThirdFURecurrenceRx`, c.`ThirdFURecurrenceRx_old`, c.`ThirdFURecurrenceSites`, c.`ThirdFURecurrenceLocation`, c.`ThirdFURecurrenceLargest`, c.`ThirdFURecurrenceNotes`, c.`ThirdFURecurHistoDysplasia`, c.`ThirdFUNextColon_Mths`, c.`ThirdFUSurgery`, c.`ThirdFUSurgeryNotes`, c.`ThirdFUSurgeryMethod`, c.`ThirdFUSurgeryResidual`, c.`ThirdFUSurgeryType`, c.`FourthFU`, c.`FourthFUDate`, c.`FourthFUMonths`, c.`FourthFURecurrenceLocation`, c.`FourthFURecurrenceLargest`, c.`FourthFURecurrenceNotes`, c.`FourthFURecurHistoDysplasia`, c.`FourthFUNextColon_Mnths`, c.`FourthFUDisposition`, c.`FourthFUNoRecurScarBx`, c.`FourthFUOutcome`, c.`FourthFURecurHisto`, c.`FourthFURecurrence`, c.`FourthFURecurrenceExcision`, c.`FourthFURecurrenceRx`, c.`FourthFURecurrenceRx_old`, c.`FourthFURecurrenceSites`, c.`FourthFUSurgery`, c.`FourthFUSurgeryMethod`, c.`FourthFUSurgeryNotes`, c.`FourthFUSurgeryType`, c.`FourthFUSurgeryResidual`, c.`ClinSignificantBleedYN`, c.`ClinSignificantPerfYN`, c.`ComplicationNotes`, c.`SSACharact_Dysplasia`, c.`SSACharact_Dysplasia_Confidence`, c.`IPPerforation_Clips`, c.`FirstFURecurrenceClipArtifact`, c.`SecondFURecurrenceClipArtifact`, c.`ThirdFURecurrenceClipArtifact`, c.`FourthFURecurrenceClipArtifact`, c.`SERT_size`, c.`SERT_ipb`, c.`SERT_dysplasia`, c.`created`, c.`creating_user`, c.`updated`, c.`updating_user`, c.`entrytype`, c.`save`, c.`consent_PROSPER`, c.`ContactPROSPER`, c.`inPROSPER`, c.`PROSPERWMRecall`, c.`RFAinPROSPER`, c.`SERT`, c.`completeColon_PROSPER`, c.`defectTattoo_PROSPER`, c.`dateEnrolled_PROSPER`, c.`variation_PROSPER`, c.`PROSPERSCDue`, c.`ClipStudyParticipant`, c.`CLIP_consent`, c.`CLIP_preEMRexclusion`, c.`CLIP_postEMRexclusion`, c.`CLIP_randomisation`, c.`CLIP_category`, c.`CLIP_active_closure_complete`, c.`CLIP_active_closure_number`, c.`CLIP_no_closure_reason`, c.`CLIP_doppler`, c.`CLIP_doppler_signal`, c.`CLIP_doppler_signal_location`, c.`CLIP_doppler_signal_area_clipped`, c.`CLIP_notes`, c.`SMSA`, c.`ESDType`, c.`ESDTraineeID`, c.`ESDTrainingCase`, c.`ESDTrainingCaseSelfCompleted`, c.`ESDTrainingCaseStageTakeoverCompleted`, c.`ESDTrainingCaseStageTakeoverReason`, c.`ESDTrainingCaseStageTakeoverReasonText`, c.`ESDhighDefScope`, c.`ESDcutCurrent`, c.`ESDcutCurrentWatts`, c.`ESDcutCurrentEffect`, c.`ESDcoagCurrent`, c.`ESDcoagCurrentEffect`, c.`ESDcoagCurrentWatts`, c.`ESDIPBControl`, c.`ESDIPBProphylacticCoag`, c.`ESDPocket`, c.`ESDaddSnareExcision`, c.`ESDnoPieces`, c.`ESDknifeType1`, c.`ESDknifeType2`, c.`ESDflushingPump`, c.`ESDtractionTechnique`, c.`ESDdurationTotal`, c.`ESDdurationIncision`, c.`ESDdurationDissection`, c.`ESDdurationDefectAssess`, c.`ESDlesionRemoved`, c.`ESDenblocEndo`, c.`ESDdefectMuscleInjury`, c.`ESDHistoDimensionx`, c.`ESDHistoDimensiony`, c.`ESDHistoEnBloc`, c.`ESDHistoR0`, c.`ESDHistoVM`, c.`ESDHistoHM`, c.`ESDHistoType`, c.`ESDHistoDysplasia`, c.`ESDHistoInvasive`, c.`ESDHistoSMICDepth`, c.`ESDHistoSMICLVI`, c.`ESDHistoSMICLVIconfidence`, c.`ESDHistoSMICTB`, c.`ESDHistoSMICDifferentiation`, c.`ESDgeneralnotes`, c.`ESDSurgeryNotes`, c.`inCSPEMRRCT`, c.`Descriptor`, c.`CSPExcluded`, c.`CSPExclusionReason`, c.`CSPRandomisation`, c.`Locationcm`, c.`LocationSpecific`, c.`CSPSnare`, c.`CSPprotrusion`, c.`CSPMarginbiopsy`, c.`trainingPercentperformed`, c.`trainingtakenoverreason`, c.`trainingtakenoverreason2`, c.`traineeinjection`, c.`traineeresection`, c.`traineestsc`, c.`traineedefectcheck`, c.`traineeclip`, c.`traineespecimenretrieve`, c.`consultant_agrees_DMI`, c.`consultantassistancetraining`, c.`LANS_enrolled`, c.`LANS_excluded`, c.`LANS_excludedwhy`, c.`LANS_indication`, c.`LANS_prechromokudo_observer1`, c.`LANS_prechromodemarcatedarea_observer1`, c.`LANS_prechromosmi_observer1`, c.`LANS_prechromosmiconfidence_observer1`, c.`LANS_observer1`, c.`LANS_observer2`, c.`LANS_postchromokudo_observer1`, c.`LANS_postchromosmi_observer1`, c.`LANS_postchromosmiconfidence_observer1`, c.`LANS_postchromodemarcatedarea_observer1`, c.`LANS_prechromokudo_observer2`, c.`LANS_prechromodemarcatedarea_observer2`, c.`LANS_prechromosmi_observer2`, c.`LANS_prechromosmiconfidence_observer2`, c.`LANS_postchromokudo_observer2`, c.`LANS_postchromodemarcatedarea_observer2`, c.`LANS_postchromosmi_observer2`, c.`LANS_postchromosmiconfidence_observer2`, c.`LANS_comment`, c.`IsNumberNodules`, c.`IsSizeDominantNodule`, c.`IsNumberNodulesLarger8mm`, c.`IsLesionInclude`, c.`LPexcision`, c.`ICVFat`, c.`StalkStudy`, c.`StalkNumber`, c.`StalkHisto1`, c.`StalkHisto2`, c.`Significant_pain_requiring_control_PAIN`, c.`Consent_pain`, c.`TempAtEntry_PAIN`, c.`TempAtPain_PAIN`, c.`TempAtExit_PAIN`, c.`VASAtEntry_PAIN`, c.`VasAtPain_PAIN`, c.`VASAtExit_PAIN`, c.`Length_of_pain_PAIN`, c.`Time_to_pain_PAIN`, c.`Intervention_Conservative_1_PAIN`, c.`Intervention2_PAIN`, c.`Intervention_Conservative_2_PAIN`, c.`Intervention_Non_Conservative_1_PAIN`, c.`Investigation_findings_PAIN`, c.`Surgery_findings_PAIN`, c.`Extended_recovery_PAIN`, c.`Propofol_PAIN`, c.`Fentanyl_PAIN`, c.`Buscopan_PAIN`, c.`Glucagon_PAIN`, c.`Paracetemol_PAIN`, c.`Intraprocedural_paracetemol_Number_PAIN`, c.`Anaesthetic_PAIN`, c.`Paracetemol_post_PAIN`, c.`Fentanyl_post_PAIN`, c.`Other_post_PAIN`, c.`Opiod_painkiller`, c.`TimeinRoomPAIN`, c.`TimeinRecoveryPAIN`, c.`TimeinProcedurePAIN`, c.`TimeinParacetemolPAIN`, c.`TimeinFentanylPAIN`, c.`TimeNoFurtherPainPAIN`, c.`Timein2ndStagePAIN`, c.`TimeinExitPAIN`, c.`ARJRopivPAINandLESION`, c.`Bellringer`, c.`SCARStudy`, c.`SCARStudyStatus`, c.`EMR_d`, c.`Record_Complete`, c.`ToDo`, c.`ExtraNotes`
			FROM `Patient` AS a 
			INNER JOIN `Procedure` as b ON a.`_k_patient` = b.`_k_patient`
			INNER JOIN `Lesion` as c ON b.`_k_procedure` = c.`_k_procedure`
			ORDER BY a.`_k_patient` DESC";
			
			//echo $q;
			
			return $q;
			
			
		} else {
			
			$q = "SELECT
			
			a.`_k_patient`, a.`Sex`, a.`DOB`, a.`Age`, a.`Institution`, a.`ProspectiveEthics`, a.`Family_Hx`, a.`Number_affected_FH`, a.`Relationship_1`, a.`Age_1_FH`, a.`Relationship_2`, a.`Age_2_FH`, b.`_k_procedure`, b.`ProcedureDate`, b.`Age`, b.`Consultant`, b.`Endoscopist`, b.`Complete_Colon`, b.`TertiaryReferral`, b.`RefDocType`, b.`ASA`, b.`MajorComorb_Simple`, b.`MajorComorbNone`, b.`MajorComorbIHD`, b.`MajorComorbCCF`, b.`MajorComorbHT`, b.`MajorComorbCVA`, b.`MajorComorbChronicResp`, b.`MajorComorbChronicRenal`, b.`MajorComorbMajorRheum`, b.`MajorComorbLiverDisease`, b.`MajorComorbCirrhosis`, b.`MajorComorbActiveCa`, b.`MajorComorbDM1`, b.`MajorComorbDM2`, b.`MajorComorbHaem`, b.`MajorComorbObese`, b.`MajorComorbOther`, b.`MajorComorb_OtherNotes`, b.`Reg_Antithromb`, b.`Reg_Antithromb_1`, b.`Reg_Antithromb_1Other`, b.`Discontinuation1`, b.`Reg_Antithromb_2`, b.`Reg_Antithromb_2Other`, b.`Discontinuation2`, b.`Reg_Antithromb_7daySum`, b.`Pain`, b.`DirectAdmit`, b.`DirectAdmitReason`, b.`total_polyps`, b.`total_polyps_resected`, c.`_k_lesion`, c.`PreviousAttempt`, c.`PreviousBiopsy`, c.`PreviousSPOT`, c.`IntendedProcedure`, c.`ActualPredominantProcedure`, c.`Prev_HistoMajor`, c.`Prev_HistoDysplasia`, c.`Size`, c.`Location`, c.`Paris`, c.`Morphology`, c.`HighestKudo`, c.`HighestSano`, c.`NICE_Overall`, c.`SSADetail`, c.`Predict_Cancer`, c.`Predict_Histo`, c.`Predict_Histo_Confidence`, c.`Feat_Invasion`, c.`EnBloc`, c.`Access`, c.`EMRAttempted`, c.`SMInjection`, c.`Constituent`, c.`Constituent_other`, c.`Adrenaline`, c.`Dye`, c.`No_Injection`, c.`Lifting`, c.`SnareType`, c.`SnareSize`, c.`EndoscopeCapUsed`, c.`Current`, c.`No_Pieces`, c.`SnareExcision`, c.`AddModality`, c.`SuccessfulEMR`, c.`STSC_Margin`, c.`SCAR_complete`, c.`DefectTattoo`, c.`IPBleed`, c.`IPBleed_Control`, c.`SMF`, c.`DeepInjury`, c.`IPPerforation`, c.`IPPerforation_Rx`, c.`Defect_Clip_Closure`, c.`Defect_Clip_Closure_Number`, c.`Duration`, c.`DurationComplication`, c.`HistoPathMajor`, c.`HistoPathNotes`, c.`HistoPathOtherNotes`, c.`Cancer`, c.`Dysplasia`, c.`SMInvasion`, c.`SMInvasionNotes`, c.`Margins`, c.`DelayedBleed`, c.`DelayedBleed_Admit`, c.`DelayedBleed_Colon`, c.`DelayedPerforation`, c.`DelayedPerforation_Rx`, c.`Disposition2Weeks`, c.`FollowUp2Weeks`, c.`SurgReferral`, c.`FirstFU`, c.`FirstFUMonths`, c.`FirstFUDate`, c.`FirstFURecurrence`, c.`FirstFUNoRecurScarBx`, c.`FirstFURecurrenceSites`, c.`FirstFURecurrenceLocation`, c.`FirstFURecurrenceLargest`, c.`FirstFURecurrenceRx`, c.`FirstFURecurrenceRx_old`, c.`FirstFURecurrenceExcision`, c.`FirstFURecurrenceNotes`, c.`FirstFURecurHisto`, c.`FirstFURecurHistoDysplasia`, c.`FirstFUNextColon_Mths`, c.`FirstFUOutcome`, c.`FirstFUDisposition`, c.`FirstFUSurgery`, c.`FirstFUSurgeryMethod`, c.`FirstFUSurgeryResidual`, c.`FirstFUSurgeryType`, c.`FirstFUSurgeryNotes`, c.`SecondFU`, c.`SecondFUMonths`, c.`SecondFUDate`, c.`SecondFURecurrence`, c.`SecondFUNoRecurScarBx`, c.`SecondFURecurrenceLargest`, c.`SecondFURecurrenceLocation`, c.`SecondFURecurrenceSites`, c.`SecondFUDisposition`, c.`SecondFURecurrenceRx`, c.`SecondFURecurrenceRx_old`, c.`SecondFURecurrenceExcision`, c.`SecondFURecurrenceNotes`, c.`SecondFURecurHisto`, c.`SecondFURecurHistoDysplasia`, c.`SecondFUNextColon_Mths`, c.`SecondFUOutcome`, c.`SecondFUSurgery`, c.`SecondFUSurgeryNotes`, c.`SecondFUSurgeryMethod`, c.`SecondFUSurgeryResidual`, c.`SecondFUSurgeryType`, c.`ThirdFU`, c.`ThirdFUDate`, c.`ThirdFUMonths`, c.`ThirdFUDisposition`, c.`ThirdFUNoRecurScarBx`, c.`ThirdFUOutcome`, c.`ThirdFURecurHisto`, c.`ThirdFURecurrence`, c.`ThirdFURecurrenceExcision`, c.`ThirdFURecurrenceRx`, c.`ThirdFURecurrenceRx_old`, c.`ThirdFURecurrenceSites`, c.`ThirdFURecurrenceLocation`, c.`ThirdFURecurrenceLargest`, c.`ThirdFURecurrenceNotes`, c.`ThirdFURecurHistoDysplasia`, c.`ThirdFUNextColon_Mths`, c.`ThirdFUSurgery`, c.`ThirdFUSurgeryNotes`, c.`ThirdFUSurgeryMethod`, c.`ThirdFUSurgeryResidual`, c.`ThirdFUSurgeryType`, c.`FourthFU`, c.`FourthFUDate`, c.`FourthFUMonths`, c.`FourthFURecurrenceLocation`, c.`FourthFURecurrenceLargest`, c.`FourthFURecurrenceNotes`, c.`FourthFURecurHistoDysplasia`, c.`FourthFUNextColon_Mnths`, c.`FourthFUDisposition`, c.`FourthFUNoRecurScarBx`, c.`FourthFUOutcome`, c.`FourthFURecurHisto`, c.`FourthFURecurrence`, c.`FourthFURecurrenceExcision`, c.`FourthFURecurrenceRx`, c.`FourthFURecurrenceRx_old`, c.`FourthFURecurrenceSites`, c.`FourthFUSurgery`, c.`FourthFUSurgeryMethod`, c.`FourthFUSurgeryNotes`, c.`FourthFUSurgeryType`, c.`FourthFUSurgeryResidual`, c.`ClinSignificantBleedYN`, c.`ClinSignificantPerfYN`, c.`ComplicationNotes`, c.`SSACharact_Dysplasia`, c.`SSACharact_Dysplasia_Confidence`, c.`IPPerforation_Clips`, c.`SERT_size`, c.`SERT_ipb`, c.`SERT_dysplasia`, c.`created`, c.`creating_user`, c.`updated`, c.`updating_user`, c.`ToDo`, c.`ExtraNotes`
			FROM `Patient` AS a 
			INNER JOIN `Procedure` as b ON a.`_k_patient` = b.`_k_patient`
			INNER JOIN `Lesion` as c ON b.`_k_procedure` = c.`_k_procedure`
			WHERE a.`Institution` = $user_centre
			ORDER BY a.`_k_patient` ASC";
			
			return $q;
			
			//echo $q;
			
			
			
		}
		
		
		
	}
	
	//!iACE wiki functions
	
	public function generateTableWiki(){
		
		
		$q = "SELECT `name`, `category`, `vimeourl`, `dateCreated` from learningVideos ORDER BY `dateCreated` DESC";
		
		$result = $this->connection->RunQuery($q);
		
		echo '<table style="max-width:60%;">';
		
		echo '<tr><th>Category</th><th>Video Name</th><th>Date Created</th></tr>';
		
		while($row = $result->fetch_array(MYSQLI_ASSOC)){

				echo '<tr class="tableRow" href="#" onclick="javascript:window.open(\'' . $row['vimeourl'] .  '\',\'iACE video\',\'width= 640,height= 480,toolbar= no,location= no,directories= 0,status= no,menuBar= no,scrollBars= no,resizable= yes,left= ,top= ,screenX= ,screenY= \');">';
				
				echo '<td class="category">' . $row['category'] . '</td>';
				
				echo '<td class="name">' . $row['name'] . '</td>';

				echo '<td class="dateCreated">' . $row['dateCreated'] . '</td>';
				
				echo '<td class="vimeourl" style="display:none;">' . $row['vimeourl'] . '</td>';

				echo '</tr>';
				
		}
			
		echo '</table>';
		
		
	}
	
	public function isLegacyLesion ($_k_lesion) {
		
		$q = "SELECT `LegacyRecord` from Lesion WHERE `_k_lesion` = $_k_lesion";
		
		$result = $this->connection->RunQuery($q);
		
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			
			if ($row['LegacyRecord'] == 1){
				
				return 1;
				
				}else{
					
				return 0;
					
				}
		}
		
		
		
	}
	
	
	
	/**
	 * Close mysql connection
	 */
	public function endLesion(){
		$this->connection->CloseMysql();
	}

}