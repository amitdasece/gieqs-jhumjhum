
		
		
			<?php
		
			$openaccess = 0;
			$requiredUserLevel = 2;
			
			require ('../../includes/config.inc.php');		
			
			require (BASE_URI1.'/scripts/headerCreatorV2.php');
			
			$formv1 = new formGenerator;
			$general = new general;
			$video = new video;
			$tagCategories = new tagCategories;
		
		
		
		foreach ($_GET as $k=>$v){
		
			$sanitised = $general->sanitiseInput($v);
			$_GET[$k] = $sanitised;
		
		
		}
		
		if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			$id = $_GET["id"];
		
		}else{
		
			$id = null;
		
		}
		
		
		
		//TERMINATE THE SCRIPT IF NOT A SUPERUSER
		
		
		
		// Page content
		?>
		<!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01//EN'>
		
		<html>
		<head>
		    <title>valuesPolypectomyTool Form</title>
		</head>
		
		<?php
		include($root . "/scripts/logobar.php");
		
		include($root . "/includes/naviCreator.php");
		?>
		
		<body>
		
			<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
		
		    <div id='content' class='content'>
		
		        <div class='responsiveContainer white'>
		
			        <div class='row'>
		                <div class='col-9'>
		                    <h2 style="text-align:left;">valuesPolypectomyTool Form</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p></p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  id  FROM  valuesPolypectomyTool  WHERE  id  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    <form id="valuesPolypectomyTool">
					    <?php echo $formv1->generateText('Access', 'Access', '', 'tooltip here');
echo $formv1->generateText('Access_t', 'Access_t', '', 'tooltip here');
echo $formv1->generateText('Access_weight', 'Access_weight', '', 'tooltip here');
echo $formv1->generateText('Access_denominator', 'Access_denominator', '', 'tooltip here');
echo $formv1->generateText('Antispasmodics', 'Antispasmodics', '', 'tooltip here');
echo $formv1->generateText('Antispasmodics_t', 'Antispasmodics_t', '', 'tooltip here');
echo $formv1->generateText('Antispasmodics_weight', 'Antispasmodics_weight', '', 'tooltip here');
echo $formv1->generateText('Antispasmodics_denominator', 'Antispasmodics_denominator', '', 'tooltip here');
echo $formv1->generateText('Anorectal junction', 'Anorectal junction', '', 'tooltip here');
echo $formv1->generateText('Anorectal junction_t', 'Anorectal junction_t', '', 'tooltip here');
echo $formv1->generateText('Anorectal junction_weight', 'Anorectal junction_weight', '', 'tooltip here');
echo $formv1->generateText('Anorectal junction_denominator', 'Anorectal junction_denominator', '', 'tooltip here');
echo $formv1->generateText('APCTechnique', 'APCTechnique', '', 'tooltip here');
echo $formv1->generateText('APCTechnique_t', 'APCTechnique_t', '', 'tooltip here');
echo $formv1->generateText('APCTechnique_weight', 'APCTechnique_weight', '', 'tooltip here');
echo $formv1->generateText('APCTechnique_denominator', 'APCTechnique_denominator', '', 'tooltip here');
echo $formv1->generateText('AppendicealOrfice', 'AppendicealOrfice', '', 'tooltip here');
echo $formv1->generateText('AppendicealOrfice_t', 'AppendicealOrfice_t', '', 'tooltip here');
echo $formv1->generateText('AppendicealOrfice_weight', 'AppendicealOrfice_weight', '', 'tooltip here');
echo $formv1->generateText('AppendicealOrfice_denominator', 'AppendicealOrfice_denominator', '', 'tooltip here');
echo $formv1->generateText('AttemptBeyondCapabilities', 'AttemptBeyondCapabilities', '', 'tooltip here');
echo $formv1->generateText('AttemptBeyondCapabilities_t', 'AttemptBeyondCapabilities_t', '', 'tooltip here');
echo $formv1->generateText('AttemptBeyondCapabilities_weight', 'AttemptBeyondCapabilities_weight', '', 'tooltip here');
echo $formv1->generateText('AttemptBeyondCapabilities_denominator', 'AttemptBeyondCapabilities_denominator', '', 'tooltip here');
echo $formv1->generateText('CauseOfBleedingIdentified', 'CauseOfBleedingIdentified', '', 'tooltip here');
echo $formv1->generateText('CauseOfBleedingIdentified_t', 'CauseOfBleedingIdentified_t', '', 'tooltip here');
echo $formv1->generateText('CauseOfBleedingIdentified_weight', 'CauseOfBleedingIdentified_weight', '', 'tooltip here');
echo $formv1->generateText('CauseOfBleedingIdentified_denominator', 'CauseOfBleedingIdentified_denominator', '', 'tooltip here');
echo $formv1->generateText('ClipUses', 'ClipUses', '', 'tooltip here');
echo $formv1->generateText('ClipUses_t', 'ClipUses_t', '', 'tooltip here');
echo $formv1->generateText('ClipUses_weight', 'ClipUses_weight', '', 'tooltip here');
echo $formv1->generateText('ClipUses_denominator', 'ClipUses_denominator', '', 'tooltip here');
echo $formv1->generateText('CoagForceps', 'CoagForceps', '', 'tooltip here');
echo $formv1->generateText('CoagForceps_t', 'CoagForceps_t', '', 'tooltip here');
echo $formv1->generateText('CoagForceps_weight', 'CoagForceps_weight', '', 'tooltip here');
echo $formv1->generateText('CoagForceps_denominator', 'CoagForceps_denominator', '', 'tooltip here');
echo $formv1->generateText('ColdSnare', 'ColdSnare', '', 'tooltip here');
echo $formv1->generateText('ColdSnare_t', 'ColdSnare_t', '', 'tooltip here');
echo $formv1->generateText('ColdSnare_weight', 'ColdSnare_weight', '', 'tooltip here');
echo $formv1->generateText('ColdSnare_denominator', 'ColdSnare_denominator', '', 'tooltip here');
echo $formv1->generateText('ColonCleanliness', 'ColonCleanliness', '', 'tooltip here');
echo $formv1->generateText('ColonCleanliness_t', 'ColonCleanliness_t', '', 'tooltip here');
echo $formv1->generateText('GoodResection_EnBloc', 'GoodResection_EnBloc', '', 'tooltip here');
echo $formv1->generateText('GoodResection_EnBloc_t', 'GoodResection_EnBloc_t', '', 'tooltip here');
echo $formv1->generateText('GoodResection_EnBloc_weight', 'GoodResection_EnBloc_weight', '', 'tooltip here');
echo $formv1->generateText('GoodResection_EnBloc_denominator', 'GoodResection_EnBloc_denominator', '', 'tooltip here');
echo $formv1->generateText('GoodResection_Piecemeal', 'GoodResection_Piecemeal', '', 'tooltip here');
echo $formv1->generateText('GoodResection_Piecemeal_t', 'GoodResection_Piecemeal_t', '', 'tooltip here');
echo $formv1->generateText('GoodResection_Piecemeal_weight', 'GoodResection_Piecemeal_weight', '', 'tooltip here');
echo $formv1->generateText('GoodResection_Piecemeal_denominator', 'GoodResection_Piecemeal_denominator', '', 'tooltip here');
echo $formv1->generateText('DiathermyApplication', 'DiathermyApplication', '', 'tooltip here');
echo $formv1->generateText('DiathermyApplication_t', 'DiathermyApplication_t', '', 'tooltip here');
echo $formv1->generateText('DiathermyApplication_weight', 'DiathermyApplication_weight', '', 'tooltip here');
echo $formv1->generateText('DiathermyApplication_denominator', 'DiathermyApplication_denominator', '', 'tooltip here');
echo $formv1->generateText('Grade', 'Grade', '', 'tooltip here');
echo $formv1->generateText('Grade_t', 'Grade_t', '', 'tooltip here');
echo $formv1->generateText('HighestKudo', 'HighestKudo', '', 'tooltip here');
echo $formv1->generateText('HighestKudo_t', 'HighestKudo_t', '', 'tooltip here');
echo $formv1->generateText('HighestNICE', 'HighestNICE', '', 'tooltip here');
echo $formv1->generateText('HighestNICE_t', 'HighestNICE_t', '', 'tooltip here');
echo $formv1->generateText('ICV', 'ICV', '', 'tooltip here');
echo $formv1->generateText('ICV_t', 'ICV_t', '', 'tooltip here');
echo $formv1->generateText('ICV_weight', 'ICV_weight', '', 'tooltip here');
echo $formv1->generateText('ICV_denominator', 'ICV_denominator', '', 'tooltip here');
echo $formv1->generateText('InjectionThroughMalignant', 'InjectionThroughMalignant', '', 'tooltip here');
echo $formv1->generateText('InjectionThroughMalignant_t', 'InjectionThroughMalignant_t', '', 'tooltip here');
echo $formv1->generateText('InjectionThroughMalignant_weight', 'InjectionThroughMalignant_weight', '', 'tooltip here');
echo $formv1->generateText('InjectionThroughMalignant_denominator', 'InjectionThroughMalignant_denominator', '', 'tooltip here');
echo $formv1->generateText('IntramucosalBlebs', 'IntramucosalBlebs', '', 'tooltip here');
echo $formv1->generateText('IntramucosalBlebs_t', 'IntramucosalBlebs_t', '', 'tooltip here');
echo $formv1->generateText('IntramucosalBlebs_weight', 'IntramucosalBlebs_weight', '', 'tooltip here');
echo $formv1->generateText('IntramucosalBlebs_denominator', 'IntramucosalBlebs_denominator', '', 'tooltip here');
echo $formv1->generateText('LesionPosition', 'LesionPosition', '', 'tooltip here');
echo $formv1->generateText('LesionPosition_t', 'LesionPosition_t', '', 'tooltip here');
echo $formv1->generateText('LesionPosition_weight', 'LesionPosition_weight', '', 'tooltip here');
echo $formv1->generateText('LesionPosition_denominator', 'LesionPosition_denominator', '', 'tooltip here');
echo $formv1->generateText('LifetimeProcedures', 'LifetimeProcedures', '', 'tooltip here');
echo $formv1->generateText('LifetimeProcedures_t', 'LifetimeProcedures_t', '', 'tooltip here');
echo $formv1->generateText('Location', 'Location', '', 'tooltip here');
echo $formv1->generateText('Location_t', 'Location_t', '', 'tooltip here');
echo $formv1->generateText('Location_weight', 'Location_weight', '', 'tooltip here');
echo $formv1->generateText('Location_denominator', 'Location_denominator', '', 'tooltip here');
echo $formv1->generateText('MarginTreatment', 'MarginTreatment', '', 'tooltip here');
echo $formv1->generateText('MarginTreatment_t', 'MarginTreatment_t', '', 'tooltip here');
echo $formv1->generateText('MarginTreatment_weight', 'MarginTreatment_weight', '', 'tooltip here');
echo $formv1->generateText('MarginTreatment_denominator', 'MarginTreatment_denominator', '', 'tooltip here');
echo $formv1->generateText('MetalImplant', 'MetalImplant', '', 'tooltip here');
echo $formv1->generateText('MetalImplant_t', 'MetalImplant_t', '', 'tooltip here');
echo $formv1->generateText('MetalImplant_weight', 'MetalImplant_weight', '', 'tooltip here');
echo $formv1->generateText('MetalImplant_denominator', 'MetalImplant_denominator', '', 'tooltip here');
echo $formv1->generateText('MildBleeding', 'MildBleeding', '', 'tooltip here');
echo $formv1->generateText('MildBleeding_t', 'MildBleeding_t', '', 'tooltip here');
echo $formv1->generateText('MildBleeding_weight', 'MildBleeding_weight', '', 'tooltip here');
echo $formv1->generateText('MildBleeding_denominator', 'MildBleeding_denominator', '', 'tooltip here');
echo $formv1->generateText('MobilityChecks', 'MobilityChecks', '', 'tooltip here');
echo $formv1->generateText('MobilityChecks_t', 'MobilityChecks_t', '', 'tooltip here');
echo $formv1->generateText('MobilityChecks_weight', 'MobilityChecks_weight', '', 'tooltip here');
echo $formv1->generateText('MobilityChecks_denominator', 'MobilityChecks_denominator', '', 'tooltip here');
echo $formv1->generateText('Morphology', 'Morphology', '', 'tooltip here');
echo $formv1->generateText('Morphology_t', 'Morphology_t', '', 'tooltip here');
echo $formv1->generateText('NLATreatment', 'NLATreatment', '', 'tooltip here');
echo $formv1->generateText('NLATreatment_t', 'NLATreatment_t', '', 'tooltip here');
echo $formv1->generateText('NLATreatment_weight', 'NLATreatment_weight', '', 'tooltip here');
echo $formv1->generateText('NLATreatment_denominator', 'NLATreatment_denominator', '', 'tooltip here');
echo $formv1->generateText('No_yes', 'No_yes', '', 'tooltip here');
echo $formv1->generateText('No_yes_t', 'No_yes_t', '', 'tooltip here');
echo $formv1->generateText('No_yes_weight', 'No_yes_weight', '', 'tooltip here');
echo $formv1->generateText('No_yes_denominator', 'No_yes_denominator', '', 'tooltip here');
echo $formv1->generateText('No_yes_notEncountered', 'No_yes_notEncountered', '', 'tooltip here');
echo $formv1->generateText('No_yes_notEncountered_t', 'No_yes_notEncountered_t', '', 'tooltip here');
echo $formv1->generateText('No_yes_notEncountered_weight', 'No_yes_notEncountered_weight', '', 'tooltip here');
echo $formv1->generateText('No_yes_notEncountered_denominator', 'No_yes_notEncountered_denominator', '', 'tooltip here');
echo $formv1->generateText('NotControlledBleeding', 'NotControlledBleeding', '', 'tooltip here');
echo $formv1->generateText('NotControlledBleeding_t', 'NotControlledBleeding_t', '', 'tooltip here');
echo $formv1->generateText('NotControlledBleeding_weight', 'NotControlledBleeding_weight', '', 'tooltip here');
echo $formv1->generateText('NotControlledBleeding_denominator', 'NotControlledBleeding_denominator', '', 'tooltip here');
echo $formv1->generateText('NotControlledBleeding_1', 'NotControlledBleeding_1', '', 'tooltip here');
echo $formv1->generateText('NotControlledBleeding_1_t', 'NotControlledBleeding_1_t', '', 'tooltip here');
echo $formv1->generateText('NotControlledBleeding_1_weight', 'NotControlledBleeding_1_weight', '', 'tooltip here');
echo $formv1->generateText('NotControlledBleeding_1_denominator', 'NotControlledBleeding_1_denominator', '', 'tooltip here');
echo $formv1->generateText('OTSCTechnique', 'OTSCTechnique', '', 'tooltip here');
echo $formv1->generateText('OTSCTechnique_t', 'OTSCTechnique_t', '', 'tooltip here');
echo $formv1->generateText('OTSCTechnique_weight', 'OTSCTechnique_weight', '', 'tooltip here');
echo $formv1->generateText('OTSCTechnique_denominator', 'OTSCTechnique_denominator', '', 'tooltip here');
echo $formv1->generateText('Paris', 'Paris', '', 'tooltip here');
echo $formv1->generateText('Paris_t', 'Paris_t', '', 'tooltip here');
echo $formv1->generateText('PatientPosition', 'PatientPosition', '', 'tooltip here');
echo $formv1->generateText('PatientPosition_t', 'PatientPosition_t', '', 'tooltip here');
echo $formv1->generateText('PatientPosition_weight', 'PatientPosition_weight', '', 'tooltip here');
echo $formv1->generateText('PatientPosition_denominator', 'PatientPosition_denominator', '', 'tooltip here');
echo $formv1->generateText('Position', 'Position', '', 'tooltip here');
echo $formv1->generateText('Position_t', 'Position_t', '', 'tooltip here');
echo $formv1->generateText('Position_weight', 'Position_weight', '', 'tooltip here');
echo $formv1->generateText('Position_denominator', 'Position_denominator', '', 'tooltip here');
echo $formv1->generateText('PriorClosure', 'PriorClosure', '', 'tooltip here');
echo $formv1->generateText('PriorClosure_t', 'PriorClosure_t', '', 'tooltip here');
echo $formv1->generateText('PriorClosure_weight', 'PriorClosure_weight', '', 'tooltip here');
echo $formv1->generateText('PriorClosure_denominator', 'PriorClosure_denominator', '', 'tooltip here');
echo $formv1->generateText('Q11', 'Q11', '', 'tooltip here');
echo $formv1->generateText('Q11_t', 'Q11_t', '', 'tooltip here');
echo $formv1->generateText('Q11_weight', 'Q11_weight', '', 'tooltip here');
echo $formv1->generateText('Q11_denominator', 'Q11_denominator', '', 'tooltip here');
echo $formv1->generateText('Q14', 'Q14', '', 'tooltip here');
echo $formv1->generateText('Q14_t', 'Q14_t', '', 'tooltip here');
echo $formv1->generateText('Q14_weight', 'Q14_weight', '', 'tooltip here');
echo $formv1->generateText('Q14_denominator', 'Q14_denominator', '', 'tooltip here');
echo $formv1->generateText('Q44', 'Q44', '', 'tooltip here');
echo $formv1->generateText('Q44_t', 'Q44_t', '', 'tooltip here');
echo $formv1->generateText('Q44_weight', 'Q44_weight', '', 'tooltip here');
echo $formv1->generateText('Q44_denominator', 'Q44_denominator', '', 'tooltip here');
echo $formv1->generateText('Q77', 'Q77', '', 'tooltip here');
echo $formv1->generateText('Q77_t', 'Q77_t', '', 'tooltip here');
echo $formv1->generateText('Q77_weight', 'Q77_weight', '', 'tooltip here');
echo $formv1->generateText('Q77_denominator', 'Q77_denominator', '', 'tooltip here');
echo $formv1->generateText('Retroflextion', 'Retroflextion', '', 'tooltip here');
echo $formv1->generateText('Retroflextion_t', 'Retroflextion_t', '', 'tooltip here');
echo $formv1->generateText('Retroflextion_weight', 'Retroflextion_weight', '', 'tooltip here');
echo $formv1->generateText('Retroflextion_denominator', 'Retroflextion_denominator', '', 'tooltip here');
echo $formv1->generateText('RiskOfSMIC', 'RiskOfSMIC', '', 'tooltip here');
echo $formv1->generateText('RiskOfSMIC_t', 'RiskOfSMIC_t', '', 'tooltip here');
echo $formv1->generateText('SecondLine', 'SecondLine', '', 'tooltip here');
echo $formv1->generateText('SecondLine_t', 'SecondLine_t', '', 'tooltip here');
echo $formv1->generateText('SecondLine_weight', 'SecondLine_weight', '', 'tooltip here');
echo $formv1->generateText('SecondLine_denominator', 'SecondLine_denominator', '', 'tooltip here');
echo $formv1->generateText('ScopeChanged', 'ScopeChanged', '', 'tooltip here');
echo $formv1->generateText('ScopeChanged_t', 'ScopeChanged_t', '', 'tooltip here');
echo $formv1->generateText('ScopeChanged_weight', 'ScopeChanged_weight', '', 'tooltip here');
echo $formv1->generateText('ScopeChanged_denominator', 'ScopeChanged_denominator', '', 'tooltip here');
echo $formv1->generateText('ScopeUsed', 'ScopeUsed', '', 'tooltip here');
echo $formv1->generateText('ScopeUsed_t', 'ScopeUsed_t', '', 'tooltip here');
echo $formv1->generateText('ScopeUsed_weight', 'ScopeUsed_weight', '', 'tooltip here');
echo $formv1->generateText('ScopeUsed_denominator', 'ScopeUsed_denominator', '', 'tooltip here');
echo $formv1->generateText('SevereBleeding', 'SevereBleeding', '', 'tooltip here');
echo $formv1->generateText('SevereBleeding_t', 'SevereBleeding_t', '', 'tooltip here');
echo $formv1->generateText('SevereBleeding_weight', 'SevereBleeding_weight', '', 'tooltip here');
echo $formv1->generateText('SevereBleeding_denominator', 'SevereBleeding_denominator', '', 'tooltip here');
echo $formv1->generateText('SubjectiveScore', 'SubjectiveScore', '', 'tooltip here');
echo $formv1->generateText('SubjectiveScore_t', 'SubjectiveScore_t', '', 'tooltip here');
echo $formv1->generateText('SydneyDMIScore', 'SydneyDMIScore', '', 'tooltip here');
echo $formv1->generateText('SydneyDMIScore_t', 'SydneyDMIScore_t', '', 'tooltip here');
echo $formv1->generateText('SydneyDMIScore_weight', 'SydneyDMIScore_weight', '', 'tooltip here');
echo $formv1->generateText('SydneyDMIScore_denominator', 'SydneyDMIScore_denominator', '', 'tooltip here');
echo $formv1->generateText('SMSAAccess', 'SMSAAccess', '', 'tooltip here');
echo $formv1->generateText('SMSAAccess_t', 'SMSAAccess_t', '', 'tooltip here');
echo $formv1->generateText('SMSAAccess_weight', 'SMSAAccess_weight', '', 'tooltip here');
echo $formv1->generateText('SMSAAccess_denominator', 'SMSAAccess_denominator', '', 'tooltip here');
echo $formv1->generateText('SMSAMorphology', 'SMSAMorphology', '', 'tooltip here');
echo $formv1->generateText('SMSAMorphology_t', 'SMSAMorphology_t', '', 'tooltip here');
echo $formv1->generateText('SMSAMorphology_weight', 'SMSAMorphology_weight', '', 'tooltip here');
echo $formv1->generateText('SMSAMorphology_denominator', 'SMSAMorphology_denominator', '', 'tooltip here');
echo $formv1->generateText('SMSASite', 'SMSASite', '', 'tooltip here');
echo $formv1->generateText('SMSASite_t', 'SMSASite_t', '', 'tooltip here');
echo $formv1->generateText('SMSASite_weight', 'SMSASite_weight', '', 'tooltip here');
echo $formv1->generateText('SMSASite_denominator', 'SMSASite_denominator', '', 'tooltip here');
echo $formv1->generateText('SMSASize', 'SMSASize', '', 'tooltip here');
echo $formv1->generateText('SMSASize_t', 'SMSASize_t', '', 'tooltip here');
echo $formv1->generateText('SMSASize_weight', 'SMSASize_weight', '', 'tooltip here');
echo $formv1->generateText('SMSASize_denominator', 'SMSASize_denominator', '', 'tooltip here');
echo $formv1->generateText('SnareClosure', 'SnareClosure', '', 'tooltip here');
echo $formv1->generateText('SnareClosure_t', 'SnareClosure_t', '', 'tooltip here');
echo $formv1->generateText('SnareClosure_weight', 'SnareClosure_weight', '', 'tooltip here');
echo $formv1->generateText('SnareClosure_denominator', 'SnareClosure_denominator', '', 'tooltip here');
echo $formv1->generateText('StopInjection', 'StopInjection', '', 'tooltip here');
echo $formv1->generateText('StopInjection_t', 'StopInjection_t', '', 'tooltip here');
echo $formv1->generateText('StopInjection_weight', 'StopInjection_weight', '', 'tooltip here');
echo $formv1->generateText('StopInjection_denominator', 'StopInjection_denominator', '', 'tooltip here');
echo $formv1->generateText('STSC', 'STSC', '', 'tooltip here');
echo $formv1->generateText('STSC_t', 'STSC_t', '', 'tooltip here');
echo $formv1->generateText('STSC_weight', 'STSC_weight', '', 'tooltip here');
echo $formv1->generateText('STSC_denominator', 'STSC_denominator', '', 'tooltip here');
echo $formv1->generateText('STSCTechnique', 'STSCTechnique', '', 'tooltip here');
echo $formv1->generateText('STSCTechnique_t', 'STSCTechnique_t', '', 'tooltip here');
echo $formv1->generateText('STSCTechnique_weight', 'STSCTechnique_weight', '', 'tooltip here');
echo $formv1->generateText('STSCTechnique_denominator', 'STSCTechnique_denominator', '', 'tooltip here');
echo $formv1->generateText('TactileFeedback', 'TactileFeedback', '', 'tooltip here');
echo $formv1->generateText('TactileFeedback_t', 'TactileFeedback_t', '', 'tooltip here');
echo $formv1->generateText('TactileFeedback_weight', 'TactileFeedback_weight', '', 'tooltip here');
echo $formv1->generateText('TactileFeedback_denominator', 'TactileFeedback_denominator', '', 'tooltip here');
echo $formv1->generateText('TTSNotUsed', 'TTSNotUsed', '', 'tooltip here');
echo $formv1->generateText('TTSNotUsed_t', 'TTSNotUsed_t', '', 'tooltip here');
echo $formv1->generateText('TTSNotUsed_weight', 'TTSNotUsed_weight', '', 'tooltip here');
echo $formv1->generateText('TTSNotUsed_denominator', 'TTSNotUsed_denominator', '', 'tooltip here');
echo $formv1->generateText('TTSTechnique', 'TTSTechnique', '', 'tooltip here');
echo $formv1->generateText('TTSTechnique_t', 'TTSTechnique_t', '', 'tooltip here');
echo $formv1->generateText('TTSTechnique_weight', 'TTSTechnique_weight', '', 'tooltip here');
echo $formv1->generateText('TTSTechnique_denominator', 'TTSTechnique_denominator', '', 'tooltip here');
echo $formv1->generateText('Uncertainty', 'Uncertainty', '', 'tooltip here');
echo $formv1->generateText('Uncertainty_t', 'Uncertainty_t', '', 'tooltip here');
echo $formv1->generateText('Uncertainty_weight', 'Uncertainty_weight', '', 'tooltip here');
echo $formv1->generateText('Uncertainty_denominator', 'Uncertainty_denominator', '', 'tooltip here');
echo $formv1->generateText('Yes_no_notReq', 'Yes_no_notReq', '', 'tooltip here');
echo $formv1->generateText('Yes_no_notReq_t', 'Yes_no_notReq_t', '', 'tooltip here');
echo $formv1->generateText('Yes_no_notReq_weight', 'Yes_no_notReq_weight', '', 'tooltip here');
echo $formv1->generateText('Yes_no_notReq_denominator', 'Yes_no_notReq_denominator', '', 'tooltip here');
echo $formv1->generateText('Yes_no', 'Yes_no', '', 'tooltip here');
echo $formv1->generateText('Yes_no_t', 'Yes_no_t', '', 'tooltip here');
echo $formv1->generateText('Yes_no_weight', 'Yes_no_weight', '', 'tooltip here');
echo $formv1->generateText('Yes_no_denominator', 'Yes_no_denominator', '', 'tooltip here');
echo $formv1->generateText('Yes_no_required', 'Yes_no_required', '', 'tooltip here');
echo $formv1->generateText('Yes_no_required_t', 'Yes_no_required_t', '', 'tooltip here');
echo $formv1->generateText('Yes_no_required_weight', 'Yes_no_required_weight', '', 'tooltip here');
echo $formv1->generateText('Yes_no_required_denominator', 'Yes_no_required_denominator', '', 'tooltip here');
echo $formv1->generateText('Yes_no_notOccur', 'Yes_no_notOccur', '', 'tooltip here');
echo $formv1->generateText('Yes_no_notOccur_t', 'Yes_no_notOccur_t', '', 'tooltip here');
echo $formv1->generateText('Yes_no_notOccur_weight', 'Yes_no_notOccur_weight', '', 'tooltip here');
echo $formv1->generateText('Yes_no_notOccur_denominator', 'Yes_no_notOccur_denominator', '', 'tooltip here');
echo $formv1->generateText('Yes_no_addweight', 'Yes_no_addweight', '', 'tooltip here');
echo $formv1->generateText('Yes_no_addweight_t', 'Yes_no_addweight_t', '', 'tooltip here');
echo $formv1->generateText('Yes_no_addweight_weight', 'Yes_no_addweight_weight', '', 'tooltip here');
echo $formv1->generateText('Yes_no_addweight_denominator', 'Yes_no_addweight_denominator', '', 'tooltip here');
?>
						    <button id="submitvaluesPolypectomyTool">Submit</button>
		
					    </form>
		
				        </p>
		
		
		
		        </div>
		
		    </div>
		<script>
			switch (true) {
	case winLocation('endoscopy.wiki'):

		var rootFolder = 'https://www.endoscopy.wiki/esd/';
		break;
	case winLocation('localhost'):
		var rootFolder = 'http://localhost:90/dashboard/esd/';
		break;
	default: // set whatever you want
		var rootFolder = 'https://www.endoscopy.wiki/esd/';
		break;
}

			var siteRoot = rootFolder;
		
			 valuesPolypectomyToolPassed = $("#id").text();
		
			if ( valuesPolypectomyToolPassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("valuesPolypectomyTool");
		
				valuesPolypectomyToolRequired = new Object;
		
				valuesPolypectomyToolRequired = getNamesFormElements("valuesPolypectomyTool");
		
				valuesPolypectomyToolString = '`id`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("valuesPolypectomyTool", valuesPolypectomyToolString, getNamesFormElements("valuesPolypectomyTool"), 1);
		
				//console.log(selectorObject);
		
				selectorObject.done(function (data){
		
					//console.log(data);
		
					var formData = $.parseJSON(data);
		
		
				    $(formData).each(function(i,val){
					    $.each(val,function(k,v){
					        $("#"+k).val(v);
					        //console.log(k+' : '+ v);
					    });
		
				    });
				    
				    $("#messageBox").text("Editing valuesPolypectomyTool id "+idPassed);
		
				    enableFormInputs("valuesPolypectomyTool");
		
				});
		
				try {
		
					$("form#valuesPolypectomyTool").find("button#deletevaluesPolypectomyTool").length();
		
				}catch(error){
		
					$("form#valuesPolypectomyTool").find("button").after("<button id='deletevaluesPolypectomyTool'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deletevaluesPolypectomyTool (){
		
				//valuesPolypectomyToolPassed is the current record, some security to check its also that in the id field
		
				if (valuesPolypectomyToolPassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this valuesPolypectomyTool?")) {
		
					disableFormInputs("valuesPolypectomyTool");
		
					var valuesPolypectomyToolObject = pushDataFromFormAJAX("valuesPolypectomyTool", "valuesPolypectomyTool", "id", valuesPolypectomyToolPassed, "2"); //delete valuesPolypectomyTool
		
					valuesPolypectomyToolObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("valuesPolypectomyTool deleted");
								edit = 0;
								valuesPolypectomyToolPassed = null;
								window.location.href = siteRoot + "scripts/forms/valuesPolypectomyToolTable.php";
								//go to valuesPolypectomyTool list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("valuesPolypectomyTool");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitvaluesPolypectomyToolForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var valuesPolypectomyToolObject = pushDataFromFormAJAX("valuesPolypectomyTool", "valuesPolypectomyTool", "id", null, "0"); //insert new object
		
					valuesPolypectomyToolObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							alert ("New valuesPolypectomyTool no "+data+" created");
							edit = 1;
							$("#id").text(data);
							valuesPolypectomyToolPassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var valuesPolypectomyToolObject = pushDataFromFormAJAX("valuesPolypectomyTool", "valuesPolypectomyTool", "id", valuesPolypectomyToolPassed, "1"); //insert new object
		
					valuesPolypectomyToolObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("Data updated");
								edit = 1;
		
							} else if (data == 0) {
		
							alert("No change in data detected");
		
						    } else if (data == 2) {
		
							alert("Error, try again");
		
						    }
		
		
		
						}
		
		
					});
		
		
		
		
				}
		
		
			}
		
			$(document).ready(function() {
		
				if (edit == 1){
		
					fillForm(valuesPolypectomyToolPassed);
		
				}else{
					
					$("#messageBox").text("New valuesPolypectomyTool");
					
				}
		
				
		
			  	var titleGraphic = $(".title").height();
				var titleBar = $("#menu").height();
				$(".title").css('height',(titleBar));
		
		
				$(window).resize(function () {
			    waitForFinalEvent(function(){
			      //alert("Resize...");
			      var titleGraphic = $(".title").height();
				  var titleBar = $("#menu").height();
				  $(".title").css('height',(titleBar));
		
			    }, 100, 'Resize header');
					});
		
		
				$("#content").on('click', '#submitvaluesPolypectomyTool', (function(event) {
			        event.preventDefault();
			        $('#valuesPolypectomyTool').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deletevaluesPolypectomyTool', (function(event) {
			        event.preventDefault();
			        deletevaluesPolypectomyTool();
		
		
			    }));
		
				$("#valuesPolypectomyTool").validate({
		
			        invalidHandler: function(event, validator) {
			            var errors = validator.numberOfInvalids();
			            console.log("there were " + errors + "errors");
			            if (errors) {
			                var message = errors == 1 ?
			                    "You missed 1 field. It has been highlighted" :
			                    "You missed " + errors + " fields. They have been highlighted";
			                $('div.error span').html(message);
			                $('div.error').show();
			            } else {
			                $('div.error').hide();
			            }
			        },
			        submitHandler: function(form) {
		
			            submitvaluesPolypectomyToolForm();
		
			          	console.log("submitted form");
		
		
		
			    }
		
		
		
		
		    });
		
		})
		
			</script>
		<?php
		
		    // Include the footer file to complete the template:
		    include($root ."/includes/footer.php");
		
		
		
		
		    ?>
		</body>
		</html>