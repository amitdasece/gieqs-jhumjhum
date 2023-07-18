

			

<?php require '../../includes/config.inc.php';?>


<head>
		
<?php

//error_reporting(E_ALL);


      //define user access level

      $requiredUserLevel = 1;

      require BASE_URI . '/pages/learning/includes/head.php';

      $general = new general;

      $navigator = new navigator;

      ?>

    <!--Page title-->
    <title>GIEQs Online Backend - Tag Categories Table</title>

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
			//require ('../../includes/config.inc.php'); require (BASE_URI.'/scripts/headerCreator.php');
		
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
		    <title>tagCategories Form</title>
		</head>
		
		<?php
		//include(BASE_URI . "/scripts/logobar.php");
		
		//include(BASE_URI . "/includes/naviCreator.php");
		?>
		<div class="darkClass">
		
		</div>
		
		<div class="modal" style="display:none;">
			
			<div class='modalContent'>
				
			</div>
			<div class='modalClose'>
				<p><br><button onclick="$('.modal, .darkClass').hide();">Close this window</button></p>
			</div>
			
		</div>
		
		<body>
		
			<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
		
			<div id='content' class='content container mt-10 mb-6'>
		
		        <div class='responsiveContainer white'>
		
			        <div class='row'>
		                <div class='col-9'>
		                    <h2 style="text-align:left;">Tag Category Form</h2>
						</div>
						<div class='col-3'>
						<a href="<?php echo BASE_URL; ?>/pages/learning/scripts/forms/tagCategoriesTable.php"><i class="fas fa-table cursor-pointer"></i></a>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  `id` FROM  `tagCategories`  WHERE  `id`  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								echo '</div></div>';
								include(BASE_URI . "/footer.php");
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    <form id="tagCategories" class="m-3">
						<?php 
						echo $formv1->generateSelect('superCategory', 'superCategory', '', 'superCategory', 'tooltip here');
						echo $formv1->generateText('tagCategoryName', 'tagCategoryName', '', 'tooltip here');
								echo $formv1->generateSelect('active', 'active', '', 'Yes_No', 'tooltip here');
?>
						    <button id="submittagCategories" class="btn btn-sm bg-dark">Submit</button>
		
					    </form>
		
				        </p>
		
		
		
		        </div>
		
		    </div>
		<script>

			
var siteRoot = rootFolder;
		
			 tagCategoriesPassed = $("#id").text();
		
			if ( tagCategoriesPassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("tagCategories");
		
				tagCategoriesRequired = new Object;
		
				tagCategoriesRequired = getNamesFormElements("tagCategories");
		
				tagCategoriesString = '`id`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("tagCategories", tagCategoriesString, getNamesFormElements("tagCategories"), 1);
		
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
				    
				    $("#messageBox").text("Editing tagCategories id "+idPassed);
		
				    enableFormInputs("tagCategories");
		
				});
		
				try {
		
					$("form#tagCategories").find("button#deletetagCategories").length();
		
				}catch(error){
		
					$("form#tagCategories").find("button").after("<button id='deletetagCategories' class='btn btn-sm bg-dark'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deletetagCategories (){
		
				//tagCategoriesPassed is the current record, some security to check its also that in the id field
		
				if (tagCategoriesPassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this tagCategories?")) {
		
					disableFormInputs("tagCategories");
		
					var tagCategoriesObject = pushDataFromFormAJAX("tagCategories", "tagCategories", "id", tagCategoriesPassed, "2"); //delete tagCategories
		
					tagCategoriesObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("tagCategories deleted");
								edit = 0;
								tagCategoriesPassed = null;
								window.location.href = siteRoot + "scripts/forms/tagCategoriesTable.php";
								//go to tagCategories list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("tagCategories");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submittagCategoriesForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var tagCategoriesObject = pushDataFromFormAJAX("tagCategories", "tagCategories", "id", null, "0"); //insert new object
		
					tagCategoriesObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							alert ("New tagCategories no "+data+" created");
							edit = 1;
							$("#id").text(data);
							tagCategoriesPassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var tagCategoriesObject = pushDataFromFormAJAX("tagCategories", "tagCategories", "id", tagCategoriesPassed, "1"); //insert new object
		
					tagCategoriesObject.done(function (data){
		
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
		
					fillForm(tagCategoriesPassed);
		
				}else{
					
					$("#messageBox").text("New tagCategories");
					
				}
		
				
				
			  
		
		
				$("#content").on('click', '#submittagCategories', (function(event) {
			        event.preventDefault();
			        $('#tagCategories').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deletetagCategories', (function(event) {
			        event.preventDefault();
			        deletetagCategories();
		
		
			    }));
		
				$("#tagCategories").validate({
		
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
			        },rules: {
tagCategoryName: { required: true },   
active: { required: true },   
},messages: {
tagCategoryName: { required: 'message' },   
active: { required: 'message' },   
},
			        submitHandler: function(form) {
		
			            submittagCategoriesForm();
		
			          	console.log("submitted form");
		
		
		
			    }
		
		
		
		
		    });
		
		})
		
			</script>
		<?php
		
		    // Include the footer file to complete the template:
		   
			 require BASE_URI . '/footer.php';
		
		
		
		
		    ?>
		</body>
		</html>