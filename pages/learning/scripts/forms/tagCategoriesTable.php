
		
	

<?php require '../../includes/config.inc.php';?>


<head>
	
	<?php
		
		
		
//error_reporting(E_ALL);


      //define user access level

      $requiredUserLevel = 2;

      require BASE_URI . '/pages/learning/includes/head.php';

      $general = new general;

      $navigator = new navigator;

      ?>

    <!--Page title-->
    <title>GIEQs Online Backend - Video Table</title>

	<script src=<?php echo BASE_URL . "/assets/js/jquery.vimeo.api.min.js"?>></script>
	<!-- Datatables -->
<script src="<?php echo BASE_URL; ?>/node_modules/datatables.net/js/jquery.datatables.min.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.js"></script>
    
<link rel="stylesheet" href="<?php echo BASE_URL1; ?>/assets/libs/datatables/datatables.min.css">
    <style>
       
        .gieqsGold {

            color: rgb(238, 194, 120);


        }

        .card-placeholder{

            width: 344px;

        }

        .break {
  flex-basis: 100%;
  height: 0;
}

.flex-even {
  flex: 1;
}


        
        .gieqsGoldBackground {

background-color: rgb(238, 194, 120);


}

        .tagButton {

            cursor: pointer;

        }

        

        

        iframe {
  box-sizing: border-box;
    height: 25.25vw;
    left: 50%;
    min-height: 100%;
    min-width: 100%;
    transform: translate(-50%, -50%);
    position: absolute;
    top: 50%;
    width: 100.77777778vh;
}
.cursor-pointer {

    cursor: pointer;

}

@media (max-width: 768px) {

    .flex-even {
  flex-basis: 100%;
}
}

@media (max-width: 768px) {

.card-header {
    height:250px;
}

.card-placeholder{

    width: 204px;

}


}

@media (min-width: 1200px) {
        #chapterSelectorDiv{

            
                
                top:-3vh;
            

        }
        #playerContainer{

                margin-top:-20px;

        }
        #collapseExample {

            position: absolute; 
            max-width: 50vh; 
            z-index: 25;
        }

        

}
    </style>


</head>

<body>
    <header class="header header-transparent" id="header-main">

        <!-- Topbar -->

        <?php require BASE_URI . '/pages/learning/includes/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/pages/learning/includes/nav.php';?>

        


    </header>

    <?php
		if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			$id = $_GET["id"];
		
		}else{
		
			$id = null;
		
		}
				    
                        
                        
		
        
		

		$formv1 = new formGenerator;
		$general = new general;
		$video = new video;
		$tagCategories = new tagCategories;
		
		
		
		?>
		<!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01//EN'>
		
		<html>
		<head>
		    <title>tagCategories Table</title>
		</head>
		
		<?php
		//include(BASE_URI . "/scripts/logobar.php");
		
		include(BASE_URI . "/includes/naviCreator.php");
		?>
		
		
		<body>
			
				
		    <div id='content' class='content container mt-10'>
			    
		        <div class='responsiveContainer white'>
			        
			        <div class='row'>
		                <div class='col-12'>
		                    <h2 style="text-align:left;">List of tagCategories</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p><button id="newtagCategories" onclick="window.location.href = '<?php echo BASE_URL;?>/scripts/forms/tagCategoriesForm.php';">New tagCategories</button></p>
		                </div>
		            </div>
			        
			        <div class='row mt-5'>
		                <div class='col-1'></div>
		
		                <div class='col-12 narrow' style='overflow-x: scroll;'>
		                    <p><?php $general->makeTable("SELECT `id`, `tagCategoryName`, `active` from tagCategories"); ?></p>
		                </div>
		
		                <div class='col-1'></div>
		            </div>
		
			        
		        </div>
		        
		    </div>
		<script>
	
			
var siteRoot = rootFolder;
		
				
			$(document).ready(function() {
		
				$("#dataTable").find("tr");
		
				$(".content").on("click", ".datarow", function(){
					
					var id = $(this).find("td:first").text();
					
					//console.log(id);
					
					window.location.href = siteRoot + 'scripts/forms/tagCategoriesForm.php?id=' + id;
		
					
				})
				
				$('#dataTable').DataTable();

			  	
		
		
		    });
		
		
		
			</script>    
		    
		    
		<?php
		
		    // Include the footer file to complete the template:
		    include(BASE_URI . "/footer.php");
		
		
		
		
		    ?>
		</body>
		</html>
		
		