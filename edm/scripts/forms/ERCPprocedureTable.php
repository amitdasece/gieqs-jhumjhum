<?php
		
			
			$openaccess = 0;
			$requiredUserLevel = 4;
			
			require ('../../includes/config.inc.php');		
			
			require (BASE_URI1.'/scripts/headerCreatorV2.php');

		
		$formv1 = new formGenerator;
		$general = new general;
		$video = new video;
		$tagCategories = new tagCategories;
		
		
		
		?>
		<!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01//EN'>
		
		<html>
		<head>
		    <title>ERCPprocedure Table</title>
		</head>
		
		<?php
		include($root . "/scripts/logobar.php");
		
		include($root . "/includes/naviERCP.php");
		?>
		
		
		<body>
			
				
		    <div id='content' class='content'>
			    
		        <div class='responsiveContainer white'>
			        
			        <div class='row'>
		                <div class='col-9'>
		                    <h2 style="text-align:left;">List of ERCP procedures</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p><button id="newERCPprocedure" onclick="window.location.href = '<?php echo $roothttp;?>/scripts/forms/ERCPprocedureForm.php';">New ERCPprocedure</button></p>
		                </div>
		            </div>
			        
			        <div class='row'>
		                <div class='col-1'></div>
		
		                <div class='col-10 narrow' style='overflow-x: scroll;'>
		                    <p><?php $general->makeTable("SELECT b.`id` as `Patient ID`, a.`id` as `Procedure ID`, dateprocedure as `Date of Procedure`, gradedifficultyERCP, technicalsuccess, clinicalsuccess from ERCPprocedure as a INNER JOIN ERCPpatient as b on a.`patientid` = b.`id`"); ?></p>
		                </div>
		
		                <div class='col-1'></div>
		            </div>
		
			        
		        </div>
		        
		    </div>
		<script>
			switch (true) {
			case winLocation('gieqs.com'):

				var rootFolder = 'https://www.gieqs.com/edm/';
				break;

			case winLocation('localhost'):
				var rootFolder = 'http://localhost:90/dashboard/gieqs/edm/';
				break;

			default: // set whatever you want
				var rootFolder = 'https://www.gieqs.com/edm/';
				break;
		}
			
var siteRoot = rootFolder;
		
				
			$(document).ready(function() {
		
				$("#dataTable").find("tr");
		
				$(".content").on("click", ".datarow", function(){
					
					var id = $(this).find("td:eq(1)").text();
					
					//console.log(id);
					
					window.location.href = siteRoot + 'scripts/forms/ERCPprocedureForm.php?id=' + id;
		
					
				})
				
				
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
		
		
		
		    });
		
		
		
			</script>    
		    
		    
		<?php
		
		    // Include the footer file to complete the template:
		    include($root ."/includes/footer.php");
		
		
		
		
		    ?>
		</body>
		</html>
		
		