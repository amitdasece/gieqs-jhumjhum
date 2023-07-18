
 <?php  
        $page_title='Table Mock Form';
        $page_header='Table Mock Form';
        require ('../scroll_header.php');
		
         
	

?> 



	
  	<body>
	
	<style>
		
	#content {
    	display: none;
	}
	#loading {
	    display: block;
	    position: absolute;
	    top: 0;
	    left: 0;
	    z-index: 100;
	    width: 100vw;
	    height: 100vh;
	    background-color: rgba(192, 192, 192, 0.5);
	    background-image: url("https://www.acestudy.net/studyserver/PROSPER/scripts/loader.gif");
	    background-repeat: no-repeat;
	    background-position: center;
	}
	
	#searchArea{
		background-color: #b2ccff;
		padding: 8px;
		margin-bottom: 20px;
		overflow: hidden;
	}
	
	.searchBoxes {
		
		float: left;
		padding: 5px;
		padding-right: 15px;
		
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

	
		
	</style>
	
	<!-- include the necessary JavaScript libraries-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://www.acestudy.net/studyserver/PROSPER/includes/moment-with-locales.js" type="text/javascript"></script>
	<script src="https://www.acestudy.net/studyserver/PROSPER/includes/jquery.tablesort.js" type="text/javascript"></script>
	<script src="https://www.acestudy.net/studyserver/PROSPER/scripts/colResizable.min.js" type="text/javascript"></script>
	<script src="https://www.acestudy.net/studyserver/PROSPER/papaparse.js" type="text/javascript"></script>

	
  
	<!-- include the custom iACE libraries-->
	
	<script src="<?php echo $folder?>includes/tableCode.js" type="text/javascript"></script>
	<script src="<?php echo $folder?>scripts/iACEfunctions.js" type="text/javascript"></script>

	
	<div id="loading">
	
	</div>
	

<?php
	
	
	
	include ($includePath . '/navi.php');
	
	
?>
	
	<div id="content" class="content">

<?php
		echo "<div id='helpArea'></div>";
	echo '<button id="identifyData" style="float: right;">Identify the data (requires iACEkey file)</button>';
	echo '<input type="file" id="csv-file" accept=".csv" style="float: right;" name="files"/>';
	echo "<div id='identifiedData' style='display:none;'>0</div>";
	//include("../centres.php");
?>
	
	<h1>This is the table template</h1>
	
	<p>This has a test table below</p>
	
<?php	
	
	(0);
	
	//load the classes that provide the data
	
	$lesion = new Lesion;
	$table = new tableGenerator;
	$formv1 = new formGenerator;
	$user = new users;
	
	
	//create the page data

	echo "<div id='data' style='display: none;'>";
	
	$requiredPatientFields = array('_k_patient');
	$requiredProcedureFields = array('ProcedureDate');  // works without k procedure
	$requiredLesionFields = array('_k_lesion', 'Size', 'Paris', 'Location', 'Dysplasia', 'IPBleed', 'Morphology', 'FollowUp2Weeks', 'inPROSPER');


	print_r($lesion->getSpecificLesionsCentre('ALL', $requiredPatientFields, $requiredProcedureFields, $requiredLesionFields)); // gets lesion data for only the required fields
	
	//print_r($lesion->getLesionsCentre('16'));  gets all the lesion data from this centre
	echo "</div>";
	
	//value list data here
	
	echo '<div id="values" style="display: none;">';
	
	// $values = $lesion->GetValuesAll(); - gets all values
	
	
	$requiredValues = array("Paris", "Location", "Morphology", "Called");  // just gets those required fields reducing data pull
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

		
	<div id="searchArea">
		
		<?php
		//echo $includePath . '/scripts/tableSearchBox.php';
		require($includePath . '/includes/tableSearchBox.php');	
		
		?>
	
	</div>
	
	<div id='table'>
		
		
	</div>
	
	
	</div>
	
	
	
	<script>
		
	//part of the loading function
		
	
		var data;
		
		var lesions = $.parseJSON($('#data').text());
		var valueList = $.parseJSON($('#values').text());
		
		var siteRoot = 'https://www.acestudy.net/studyserver/PROSPER/';
		
		var headers = { _k_lesion: { name: 'Lesion ID', tooltip: '', display: 0, usesDatabase: 1, usesValueList: 0, valueListName: null, values:null, function:0 }, 
					    _k_patient: { name: 'Study ID', tooltip: '', display: 0, usesDatabase: 1, usesValueList: 0, valueListName: null, values:null, function:0 },
					    ProcedureDate: { name: 'Procedure Date', display: 1, tooltip: '', usesDatabase: 1, usesValueList: 0, valueListName: null, values:null, function:'moment(value).format("D MMM YYYY")' }, 
					    Size: { name: 'Size', display: 1, tooltip: '', usesDatabase: 1, usesValueList: 0, valueListName: null, values:null, function:null },
					    Paris: { name: 'Paris', display: 1, tooltip: '', usesDatabase: 1, usesValueList: 1, valueListName: 'Paris', values:null, function:null },
					    SecondFU: { name: 'Second FU', display: 1, tooltip: '', usesDatabase: 0, usesValueList: 0, valueListName: null, values:null, function:'calculateSC2(lesionArray.ProcedureDate, lesionArray.inPROSPER , determineSERT(lesionArray.Size, lesionArray.Dysplasia, lesionArray.IPBleed))' },
					    ThirdFU: { name: 'Third FU', display: 1, tooltip: '', usesDatabase: 0, usesValueList: 0, valueListName: null, values:null, function:'calculateSC3(lesionArray.ProcedureDate, lesionArray.inPROSPER , determineSERT(lesionArray.Size, lesionArray.Dysplasia, lesionArray.IPBleed))' },
					    Location: { name: 'Location', display: 1, tooltip: '', usesDatabase: 1, usesValueList: 1, valueListName: 'Location', values:null, function:null },
					    Morphology: { name: 'Morphology', display: 1, tooltip: '', usesDatabase: 1, usesValueList: 1, valueListName: 'Morphology', values:null, function:null },
					    FollowUp2Weeks: { name: '2 week check', display: 1, tooltip: '', usesDatabase: 1, usesValueList: 1, valueListName: 'Called', values:null, function:null },
					     };
		
	function handleFileSelect(evt) {
		    var file = evt.target.files[0];
		 
		    Papa.parse(file, {
		      header: true,
		      dynamicTyping: true,
		      complete: function(results) {
		        data = results;
				console.log(data);
		      }
		    });
		  }
		  
		  
	$(document).ready(function() {	  
		  
	//!Click on .lesioncell to go to lesion
			$('.content').on("click", ".lesionCell", (function() {    
			   
			   var cellClicked = $(this);
			   
			   goToLesion(cellClicked);
			   //goToStudies(cellClicked);
			   //goToPatient(cellClicked);
			    
			}));
			
			setTimeout(
				  function() 
				  {
				   $("#patientTable").colResizable({partialRefresh:true, resizeMode:'flex', marginLeft:'2px', marginRight:'2px'});
				  }, 5000);
			
	})
		
	</script>
	<!-- Extra table code for iACE tables only follows-->
	
	<script src="<?php echo $folder?>includes/extraTableCode.js" type="text/javascript">
		
	</script>
	
 </body>
     <?php include ('../footer.html'); ?>	
	
	
	</html>