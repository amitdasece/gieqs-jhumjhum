
		

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      $requiredUserLevel = 2;

      require BASE_URI . '/pages/learning/includes/head.php';

	  $general = new general;
	  $formv1 = new formGenerator;
	  $tagCategories = new tagCategories;

      $navigator = new navigator;

      ?>

    <!--Page title-->
    <title>GIEQs Online Backend - Video Table</title>

	<script src=<?php echo BASE_URL . "/assets/js/jquery.vimeo.api.min.js"?>></script>
	<!-- Datatables -->
<script src="<?php echo BASE_URL; ?>/node_modules/datatables.net/js/jquery.datatables.min.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.js"></script>
    
<link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/datatables/datatables.min.css">
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
		
		
		//TERMINATE THE SCRIPT IF NOT A SUPERUSER
		
		
		
		// Page content
		?>
		
		<?php
		//include(BASE_URI . "/scripts/logobar.php");
		
		//include(BASE_URI . "/includes/naviCreator.php");
		?>
		
		<body>
		
			<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
		
		    <div id='content' class='content container mt-10'>
		
		        <div class='responsiveContainer white'>
		
			        <div class='row'>
		                <div class='col-9'>
		                    <h2 style="text-align:left;">references Form</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
							<p><button id="tablereferences" onclick="window.location.href = '<?php echo BASE_URL;?>/scripts/forms/referencesTable.php';">Table of references</button></p>
		              
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  `id`  FROM  `references`  WHERE  id  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    <form id="references">
						<?php 
						echo $formv1->generateText('PMID', 'PMID', '', 'tooltip here');
						echo $formv1->generateText('DOI', 'DOI', '', 'tooltip here');
echo $formv1->generateText('formatted', 'formatted', '', 'tooltip here');
echo $formv1->generateText('authors', 'authors', '', 'tooltip here');
echo $formv1->generateText('journal', 'journal', '', 'tooltip here');
?>							
							<button class="btn btn-small bg-dark py-0" id="submitreferences">Submit</button>
							
		
					    </form>
						<button class="btn btn-small bg-dark py-0 mt-2" id="queryDOI">Get info from Pubmed using PMID</button>
				        </p>
		
		
		
		        </div>
		
		    </div>
		<script>
			

		var siteRoot = rootFolder;
		
			 referencesPassed = $("#id").text();
		
			if ( referencesPassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("references");
		
				referencesRequired = new Object;
		
				referencesRequired = getNamesFormElements("references");
		
				referencesString = '`id`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("references", referencesString, getNamesFormElements("references"), 1);
		
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
				    
				    $("#messageBox").append("Editing references id "+idPassed);
		
				    enableFormInputs("references");
		
				});
		
				try {
		
					$("form#references").find("button#deletereferences").length();
		
				}catch(error){
		
					$("form#references").find("button").after("<button id='deletereferences'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deletereferences (){
		
				//referencesPassed is the current record, some security to check its also that in the id field
		
				if (referencesPassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this references?")) {
		
					disableFormInputs("references");
		
					var referencesObject = pushDataFromFormAJAX("references", "references", "id", referencesPassed, "2"); //delete references
		
					referencesObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("references deleted");
								edit = 0;
								referencesPassed = null;
								window.location.href = siteRoot + "scripts/forms/referencesTable.php";
								//go to references list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("references");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitreferencesForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var referencesObject = pushDataFromFormAJAX("references", "references", "id", null, "0"); //insert new object
		
					referencesObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							alert ("New references no "+data+" created");
							edit = 1;
							$("#id").text(data);
							referencesPassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var referencesObject = pushDataFromFormAJAX("references", "references", "id", referencesPassed, "1"); //insert new object
		
					referencesObject.done(function (data){
		
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

			function getDOI (){

				//check #pmid is not empty

				if ($('#PMID').val() == ''){

					alert ('Please enter a PMID (PubMed ID))');
					return null;

				}else{

					var DOI = $('#PMID').val();

				}

				var dataObject = new Object();
	
				dataObject.DOI = DOI;
			            
			            var datastring = JSON.stringify(dataObject);
			
			            var imagesObject = $.ajax({
												url: siteRoot + "scripts/decodeDOI.php",
												type: "POST",
												contentType: "application/json",
												data: datastring,
											    });
			
			            imagesObject.done(function(data) {
			
			                console.log(data);
			
			                if (data) {
				                
				                try {
				                
				                var newObject = $.parseJSON(data);
				                console.dir(newObject);
				                //delete the old data row by adding approved
				                $.each(newObject, function(k, v) {
									$('#' + k).val(v);

								});
				                /*var imageSetObject = pushDataAJAX('imageSetDraft', 'id', id, 1, {
						                        'approved': 1,
						                     
						                 
											}); */
											
										} catch (err) {



										}
									}

								})

				//convert the #DOI to a PMID
				//https://www.ncbi.nlm.nih.gov/pmc/utils/idconv/v1.0/?ids=[[either DOI or PMID here]]

				//parse this XML for the <record pmid=''>		

				//get the XML from pubmed using the pmid http://eutils.ncbi.nlm.nih.gov/entrez/eutils/efetch.fcgi?db=pubmed&id=20598978&retmode=xml

				//return the author, title and journal and page and volume as json

				//parse this into the required fields

				//if nothing display error




			}
		
			$(document).ready(function() {
		
				if (edit == 1){
		
					fillForm(referencesPassed);
		
				}else{
					
					$("#messageBox").append("New references");
					
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
		
		
				$("#content").on('click', '#submitreferences', (function(event) {
			        event.preventDefault();
			        $('#references').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deletereferences', (function(event) {
			        event.preventDefault();
			        deletereferences();
		
		
				}));
				
				$("#content").on('click', '#queryDOI', (function(event) {
			        event.preventDefault();
					
					getDOI();

					
		
			    }));
		
				$("#references").validate({
		
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
  
formatted: { required: true },   
authors: { required: true },   
journal: { required: true },   
},messages: {

formatted: { required: 'message' },   
authors: { required: 'message' },   
},
			        submitHandler: function(form) {
		
			            submitreferencesForm();
		
			          	console.log("submitted form");
		
		
		
			    }
		
		
		
		
		    });
		
		})
		
			</script>
		<?php
		
		    // Include the footer file to complete the template:
		    include(BASE_URI ."/includes/footer.html");
		
		
		
		
		    ?>
		</body>
		</html>