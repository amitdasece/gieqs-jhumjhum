
		
		
			<?php

			$openaccess = 0;
			$requiredUserLevel = 2;
			
			require ('../../includes/config.inc.php');		
			
			require (BASE_URI1.'/scripts/headerCreatorV2.php');
		
			//(1);
			//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');
		
			$formv1 = new formGenerator;
			$general = new general;
			
			
		
		
		
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
		    <title>POEM data entry Form</title>  <!-- CHANGE -->
            <style>
               
               .text-gieqsGold {

color: rgb(238, 194, 120);

               }
               .bg-gieqsGold {

background-color: rgb(238, 194, 120);

}
.pointer {

	cursor: pointer;
	display: none;
}

                    @media only screen and (max-width: 992px) {
                        
						.pointer {

							display: block;
						}

                        #sticky {

                            
								border: rgb(238, 194, 120), 1px;
							   right: 1%;
								display: none;
							
								z-index: 10;
								
								background-color: #162e4d;
								top: 25%;
								max-width: 50%;
								min-width: 50%;
							
    						

                        }

                    }
					@media only screen and (min-width: 992px) {
                        
						.pointer {

							display: none;
						}

                        #sticky {

                            
								position: fixed;
								display: block;
								top: 25%;
								
    						

                        }

                    }

               

}
            </style>
		</head>
		
		<?php
		//include($root . "/scripts/logobar.php");
		include(BASE_URI1 . "/includes/topbar.php");
		include(BASE_URI1 . "/includes/naviv2.php");
		?>
		
		<body>
		
			<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
		
		    <div id='content' class='content'>
		
		        <div class='responsiveContainer container'>
                
			        
        </div> <!--close container-->
		</div> <!--close content-->

			
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
		
			 
		
			</script>
		<?php
		
		    // Include the footer file to complete the template:
		    include(BASE_URI1 ."/includes/footer.php");
		
		
		
		
		    ?>
		</body>
		</html>