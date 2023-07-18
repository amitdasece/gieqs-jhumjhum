
 <?php  
        $page_title='iACE study';
        $page_header='iACE study';
        require ('/home/djt35/public_html/studyserver/PROSPER/scroll_header.php');
		
         
	

?> 



	
  	<body>
	
	<style>
		
	
	.content {
		
		padding: 1.5%;
		background-color: black;
		
	}
	
	h2 {
		margin: 3px;
		
	}
	
	a {
		
		color: #fbc934; 
		
	}
	
	.contentBoxes {
		
		float: left;
		width: 45%;
		padding: 20px;
		margin: 20px;
		background-color: fuchsia;
		
	}
	
	#table {
    text-align: left;
    /*max-height: 50vh;
	min-height: 50vh;
    overflow-y: auto;
	overflow-x: auto;*/
	overflow: auto;
    height: 60vh;
	
    }

	th.sorted.ascending:after {
		content: "  \2191";
	}

	th.sorted.descending:after {
		content: " \2193";
	}
	
	th:hover {
		
		cursor: pointer;
	}
	
	.patientRow:hover {background-color: #f75345; color: white;}
	
	img {
		
		max-width: 100%;
		
	}
	
	@media (max-width: 500px){
.content {
		
		padding:0px;
	
	}
	}
		
	</style>
	
	<!-- include the necessary JavaScript libraries-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://www.acestudy.net/studyserver/PROSPER/includes/moment-with-locales.js" type="text/javascript"></script>
	<script src="https://www.acestudy.net/studyserver/PROSPER/includes/jquery.tablesort.js" type="text/javascript"></script>
	<script src="https://www.acestudy.net/studyserver/PROSPER/scripts/colResizable.min.js" type="text/javascript"></script>
	<script src="https://www.acestudy.net/studyserver/PROSPER/papaparse.js" type="text/javascript"></script>

	
  
	<!-- include the custom iACE libraries
	
	<script src="<?php echo $folder?>includes/tableCode.js" type="text/javascript"></script>
	
	-->
	<script src="<?php echo $folder?>scripts/iACEfunctions.js" type="text/javascript"></script>

	
	
	

<?php
	
	
	
	include ($includePath . '/navi.php');
	
	$lesion = new Lesion;
	$table = new tableGenerator;
	$formv1 = new formGenerator;
	$user = new users;
	$centre = new Centres;
	
	
	
	
?>
	
	<div id="content" class="content">

	<div class="responsiveContainer black">
	
	<div class="row">
		
		<div class="col-6">
		
		
			<h2>Welcome to your iACE Dashboard</h2>
			
			
		</div>
		
		<div class="col-3">
		
		
			
			
			
		</div>
		
		<div class="col-3 yellow-light narrow center">
		
		
			<p><input type="button" onclick="location.href='<?php echo $folder?>new.php';" value="Enter New Patient" /></p>
			
			
		</div>
		
	</div>
	
	<div class="row">
		
		<div class="col-1"></div>

		<div class="col-6 yellow narrow">
			
			
			
			<div class="row">
			
				<div class="col-4">
					
					<h2 class='center'>iACE metrics</h2>
					
				</div>
				
				<div class="col-3">
					
					Centre: <?php echo $user->getUserCentre($_SESSION['user_id']);?>
					
				</div>
				
				<div class="col-3">
					
					User: <?php 
						
						$user->Load_from_key($_SESSION['user_id']);
						
						echo $user->getfirstname() . ' ' . $user->getsurname();
						
						?>
					
				</div>
				
			</div>
			
			<div class="row">
					
					<div class="col-5">
						
						<ul>Total lesions iACE</ul>
						
					</div>
					
					<div class="col-5">
						
						<ul><b><?php echo $lesion->countPatientsAllCentres();?></b></ul>
						
					</div>
					
			</div>
				
			<div class="row">
					
					
					<div class="col-5">
						
						<ul>Total lesions at <?php echo $user->getUserCentre($_SESSION['user_id']);?></ul>
						
					</div>
					
					<div class="col-5">
						
						<ul><b><?php echo $lesion->totalPatientsUserCentre($user->getcentre());?></b></ul>						
						
					</div>
					
			</div>
				
			<div class="row">
					
					<div class="col-5">
						
						<ul>Percentage of lesions recruited at this centre</ul>
						
					</div>
					
					<div class="col-5">
						
						<ul><b><?php echo $lesion->percentageAtMyCentre($user->getcentre()) . '%';?></b></ul>						
						
					</div>
					
			</div>
					
		
			
		</div>
		
		<div class="col-1">
			
			
		</div>
		
		<div class="col-4 blue">
		
		
			<h2 class='center'>iACE News</h2>
			
			<p>
				
				<ul class='news'>&#9654;&nbsp;&nbsp;<b>Upgraded data</b></ul>
					
					<p>Legacy data from the ACE study is now available in iACE for your centre.  Old patient, procedure and lesion study numbers include a prefix of 10000.  </p>
					
					<p><strong>You must maintain the <a href="https://www.acestudy.net/studyserver/PROSPER/iACEhelp.php#identification" style="text-decoration-color: none;">iACE key file</a> for your centre.</strong></p>

					
				<ul class='news'>&#9654;&nbsp;&nbsp;<b>Surveillance chasing screens</b></ul>
				
					<p>From the Data Management menu you can now view data from multiple points of surveillance to chase outcomes.</p>
				
				<ul class='news'>&#9654;&nbsp;&nbsp;<b>Tidied layout and fixed navigation</b></ul>
				
					<p>Easier to find data and navigate between pages.</p>
				
			</p>	
				
				
			
		</div>
		
		
	</div>
	<br>
	<div class="row">
		
		<div class="col-1"></div>
		
		<div class="col-5 black whiteborder">
			
			
			
			<div class="row">
			
				<div class="col-12">
					
					<h2 >Data Summary</h2>
					
				</div>
			
			</div>
			
			<div class="row datarow">
				
				<div class="col-6 datarow">
					
					Centre: <?php echo $user->getUserCentre($_SESSION['user_id']);?>
					
				</div>
				
				<div class="col-5 datarow">
					
					User: <?php 
						
						$user->Load_from_key($_SESSION['user_id']);
						
						echo $user->getfirstname() . ' ' . $user->getsurname();
						
						?>
					
				</div>
				
			</div>
			
			<div class="row datarow">
					
					<div class="col-5 datarow">
						
						<p class='center'>Total lesions <?php echo $user->getUserCentre($_SESSION['user_id']);?></p>
						
					</div>
					
					<div class="col-5 datarow">
						
						<p class='center'><?php echo $lesion->totalPatientsUserCentre($user->getcentre());?></p>
						
					</div>
					
			</div>
			
			<div class="row datarow">
					
					<div class="col-5 datarow">
						
						<p class='center'>Missing and due <b>2 week check</b> data</p>
						
					</div>
					
					<div class="col-5 datarow">
						
						<p class='center'><?php echo $lesion->missing2week($user->getcentre()) . '&nbsp;&nbsp;(' . $lesion->getPercentageofCentreLesions($user->getcentre(), $lesion->missing2week($user->getcentre())) . '%)';?></p>
						
					</div>
					
			</div>	
			
			<div class="row datarow">
					
					<div class="col-5 datarow">
						
						<p class='center'>Missing <b>histopathology</b> data</p>
						
					</div>
					
					<div class="col-5 datarow">
						
						<p class='center'><?php echo $lesion->missingHistologyData($user->getcentre()) . '&nbsp;&nbsp;(' . $lesion->getPercentageofCentreLesions($user->getcentre(), $lesion->missingHistologyData($user->getcentre())) . '%)';?></p>
						
					</div>
					
			</div>	
			
			<div class="row datarow">
					
					<div class="col-5 datarow">
						
						<p class='center'>Missing <b>First Surveillance</b> data</p>
						
					</div>
					
					<div class="col-5 datarow">
						
						<p class='center'><?php echo $lesion->missingSC1Data($user->getcentre()) . '&nbsp;&nbsp;(' . $lesion->getPercentageofCentreLesions($user->getcentre(), $lesion->missingSC1Data($user->getcentre())) . '%)';?></p>
						
					</div>
					
			</div>			
		
			<div class="row datarow">
					
					<div class="col-5 datarow">
						
						<p class='center'>Missing <b>Second Surveillance</b> data</p>
						
					</div>
					
					<div class="col-5 datarow">
						
						<p class='center'><?php echo $lesion->missingSC2Data($user->getcentre()) . '&nbsp;&nbsp;(' . $lesion->getPercentageofCentreLesions($user->getcentre(), $lesion->missingSC2Data($user->getcentre())) . '%)';?></p>
						
					</div>
					
			</div>		
			
			<div class="row datarow">
					
					<div class="col-5 datarow">
						
						<p class='center'>Missing <b>Third Surveillance</b> data</p>
						
					</div>
					
					<div class="col-5 datarow">
						
						<p class='center'><?php echo $lesion->missingSC3Data($user->getcentre()) . '&nbsp;&nbsp;(' . $lesion->getPercentageofCentreLesions($user->getcentre(), $lesion->missingSC3Data($user->getcentre())) . '%)';?></p>
						
					</div>
					
			</div>	
			
			<div class="row datarow">
					
					<div class="col-5 datarow">
						
						<p class='center'>Missing <b>Fourth Surveillance</b> data</p>
						
					</div>
					
					<div class="col-5 datarow">
						
						<p class='center'><?php echo $lesion->missingSC4Data($user->getcentre()) . '&nbsp;&nbsp;(' . $lesion->getPercentageofCentreLesions($user->getcentre(), $lesion->missingSC4Data($user->getcentre())) . '%)';?></p>
						
					</div>
					
			</div>	
			
		</div>
		
		<div class="col-2">
			
			
		</div>
		
		<div class="col-5 black">
			
			<?php
				
				if ($lesion->selectRandomImage($user->getcentre())){
					
					echo '<img class="lslimage" src="' . $folder . '../' . $lesion->selectRandomImage($user->getcentre()) . '">';
					
				} else {
					
					
					echo 'This would be an LSL image randomly selected from your collection but you haven\'t included any.  Click here to start';
					
				}
				
			?>				
				
			
		</div>
		
		
	</div>
	
		
<?php	
	
	
	
	;
	
	//load the classes that provide the data
	
	
	//create the page data

	echo "<div id='data' style='display: none;'>";
	
	$requiredPatientFields = array('_k_patient');
	$requiredProcedureFields = array('ProcedureDate', 'DirectAdmit', 'DirectAdmitReason', 'DelayedAdmit', 'DelayedAdmit_Reason', 'AnyAdmit');  // works without k procedure
	$requiredLesionFields = array('_k_lesion', 'FollowUp2Weeks', 'DelayedBleed', 'DelayedBleed_Admit', 'DelayedBleed_Colon', 'DelayedPerforation', 'DelayedPerforation_Rx', 'Disposition2Weeks', 'SurgReferral');


	print_r($lesion->getSpecificLesionsCentre('ALL', $requiredPatientFields, $requiredProcedureFields, $requiredLesionFields)); // gets lesion data for only the required fields
	
	//print_r($lesion->getLesionsCentre('16'));  gets all the lesion data from this centre
	echo "</div>";
	
	//value list data here
	
	echo '<div id="values" style="display: none;">';
	
	// $values = $lesion->GetValuesAll(); - gets all values
	
	
	$requiredValues = array('DirectAdmit', 'Called', 'DelayedBleed', 'DelayedPerforation_Rx', 'Dispostion2Weeks', 'Yes_No');  // just gets those required fields reducing data pull
	$values = $lesion->GetValuesSpecific($requiredValues);
	$overallvalues = $lesion->GetValuesArray($values);
	$json = json_encode($overallvalues);
	$error = json_last_error();
			if ($error !== JSON_ERROR_NONE) {
				echo json_last_error_msg();
			} else {
				echo $json;
			}

	
	//echo $lesion->getValuesv2();
	echo "</div>";
?>

		
	
	</div>
	
	</div>
	
	
	
	<script>
		
	//part of the loading function
		
	
		var data;
		
		var lesions = $.parseJSON($('#data').text());
		var valueList = $.parseJSON($('#values').text());
		
		var siteRoot = 'https://www.acestudy.net/studyserver/PROSPER/';
		
				
		
	$(document).ready(function() {	  
		  
	//!Click on .lesioncell to go to lesion at point of histology
			
				  
	})	
	
	
	</script>
	<!-- Extra table code for iACE tables only follows	
	<script src="<?php echo $folder?>includes/extraTableCode.js" type="text/javascript"></script>
		-->

		
 </body>
     <?php include ($includePath . '/footer.html'); ?>	
	
	
	</html>