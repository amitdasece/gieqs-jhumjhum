
		
		

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
</span>

        }

		.modal td {

			white-space:normal !important;
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
		
		//include(BASE_URI . "/includes/naviCreator.php");
		?>
		
		
		
		
		
		
		
		<body>
			
		<div class="text-right container mt-10">
	
                                        <div class="actions" id="messageBox">
                                            
                                            <?php if ($currentUserLevel < 3){?>

												<a href="<?php echo BASE_URL; ?>/pages/learning/scripts/forms/tagsForm.php" class="action-item"><i class="fas fa-plus" data-toggle="tooltip" data-placement="bottom" title="new Tag"></i> New Tag</a>
												<a id="showStructureButton" class="action-item"><i class="fas fa-table" title="show tag structure"></i> Show Tag Structure</a>



                                            

                                            <?php }?>

										</div>
											</div>
		    <div id='content' class='content container-fluid mt-2'>
			
		        <div class='white'>
			        
			        <div class='row'>
		                <div class='col-6'>
		                    <h2 class="ml-5" style="text-align:left;">Tag and Reference Manager</h2>
		                </div>
		
		                
					</div>
					
					<div class='row'>
					<div class='col-6'>
		                    
							</div>
		                <div class='col-3'>
		                  
							
						</div>
						
						
		            </div>
			        
			        <div class='row'>
		                <div class='col-1'></div>
		
		                <div class='col-10 narrow' style='overflow-x: scroll;'>
		                    <p><?php $general->makeTableTagManager("SELECT a.`id`, a.`tagCategories_id`, a.`tagName` from `tags` as a ORDER BY tagCategories_id, tagName ASC", BASE_URL); ?></p>
		                </div>
		
		                <div class='col-1'></div>
		            </div>
		
			        
		        </div>
		        
			</div>

		</div>
			
			<div class="modal fade docs-example-modal-xl" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-xl modal-dialog-centered">
					<div class='modalContent modal-content p-3'>
				
					</div>
					<div class='modalClose modal-footer'>
						<p><br><button onclick="$('.modal, .darkClass').modal('hide');">Close this window</button></p>
					</div>
				</div>
			</div>
		<script>
			

			var siteRoot = rootFolder;

			var tagsid = null;

			//var alreadyExists = null;

			

			$(document).ready(function () {

				$("#dataTable").find("tr");

				$(".content").on("click", ".datarow", function () {

					var id = $(this).parent().find("td:first").text();

					id.trim();

					console.log(id);

					window.location.href = siteRoot + 'scripts/forms/tagsForm.php?id=' + id;


				})

				$('.modal').on('click', '#newReference', function() {

					$('.modal').modal('hide');

					

					PopupCenter(siteRoot + "scripts/forms/referencesForm.php", 'New Reference', 600, 700);

					//window.open(, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,width=600,height=700");



				})


				$('#dataTable').DataTable();

				//for each .header find th . data 
				//makeSearchBox();
				//make a searchBox
				//search to find like


				

				$('.content').on('click', '.referenceintable', function (e) {

					var myid = $(this).attr('data');

					

					console.log(myid);

					if (confirm("Do you wish to delete this reference from the tag [can't be undone]?")) {

						var id = $(this).closest('tr').find("td:eq(0)").text();

						console.log(id + 'is tagid');

						var tr=$(this);

						

						var imagesObject = pushDataAJAX('referencesTag', 'id', myid, 2, ''); //delete tags

						imagesObject.done(function (data) {

							console.log(data);

							if (data) {

								if (data == 1) {

									alert("tag-reference connection deleted");
									$(tr).hide();

									//edit = 0;
									//imagesPassed = null;
									//window.location.href = siteRoot + "scripts/forms/imagesTable.php";
									//go to images list

								} else {

									alert("Error, try again");

									//enableFormInputs("images");

								}
							}
							
						});

						
					
					}
						
					
				});

				

				$('.modal').on('click', '.referencesrow', function (e) {

							var id = $(this).find("td:first").text();

							id.trim();

							//alert(id + tagsid);

							if (tagsid) {
								var selectorObject = getDataQuery('referencesTag', '`references_id` = ' + id + ' and `tag_id` = ' + tagsid + '', {
									'0': 'references_id',
									'1': 'tag_id'
								}, 3);

								var alreadyExists;

								selectorObject.done(function (data) {

										if (data) {

											//console.log('important data is' + data);

											if (data == 1) {

												alert('This reference tag combination already exists');
												alreadyExists = 1;
												$('.modal').modal('hide');

												

											} else {

												alreadyExists = 0;
											}



											if (alreadyExists == 0) {

												var tagsImagesObject = pushDataAJAX('referencesTag', 'id', '', 0, {
													'references_id': id,
													'tag_id': tagsid
												}); //insert new object

												tagsImagesObject.done(function (data) {

													//console.log('tagsImagesObject = ' + data);

													if (data) {

														if (isNormalInteger(data)) {

															alert("Reference added");

															//add the tag to the table

															//$('.file').find('td[id=' + imageID + ']').closest('tr').find('td:eq(6)').append('<button id="' + data + '" class="tagButton">' + $(cellClicked).closest('tr').find('td:eq(1)').text() + '</button>');

															$('.modal').modal('hide');

															//$('.darkClass').hide();

															location.reload();

															return;


														} else {

															alert("Error, try again");

														}



													}


												});

											}
										}

										
								})
								
							}
							
						});


				

				$('.content').on('click', '.deleteTag', function () {

					if (confirm("Do you wish to delete this tag [can't be undone]?")) {

						var id = $(this).closest('tr').find("td:eq(0)").text();

						var tr = $(this).closest('tr');

						var imagesObject = pushDataAJAX('tags', 'id', id, 2, ''); //delete tags

						imagesObject.done(function (data) {

							console.log(data);

							if (data) {

								if (data == 1) {

									alert("tag connection deleted");
									$(tr).hide();

									//edit = 0;
									//imagesPassed = null;
									//window.location.href = siteRoot + "scripts/forms/imagesTable.php";
									//go to images list

								} else {

									alert("Error, try again");

									//enableFormInputs("images");

								}
							}
						});

					}


				});

				$('.content').on('click', '.reference', function () {


					event.preventDefault();

					var cellClicked = $(this);

					imageID = $(this).closest('tr').find("td:eq(0)").text();;

					console.log('tag id is' + imageID);

					tagsid = imageID;

					singleTag = 1;

					//$('.darkClass').show();



					var selectorObject = getDataQuery('references', '', {
						'id': 'id',
						'authors': 'authors',
						'reference': 'formatted',
						'DOI': 'DOI',
						'journal': 'journal',

					}, 2);

					//console.log(selectorObject);

					selectorObject.done(function (data) {

						//console.log(data);

						$('.modal').modal('show');

						//$('.modal').show();
						/* $('.modal').css('max-height', 800);
						$('.modal').css('max-width', 800);
						$('.modal').css('overflow', 'scroll'); */



						$('.modal').find('.modalContent').html('<h3>Choose Reference</h3>');

						$('.modal').find('.modalContent').append('<div class="modalMessageBox"></div>');

						$('.modal').find('.modalContent').append('<p>' + data + '</p>');

						$('.modal').find('.modalContent').append('<button id="newReference">Add new reference</button>');

						$('.modal').find('#dataTable2').DataTable();

						//makeSearchBoxModal();

						return;



					})

				})

				$('body').on('click', '#showStructureButton', function () {


					var dataToSend = {

						requiredTagCategories: null

					}

					const jsonString = JSON.stringify(dataToSend);



					var request2 = $.ajax({
						beforeSend: function () {

							//$('#videoCards').html("<div class=\"d-flex align-items-center\"><strong>Loading...</strong><div class=\"spinner-border ml-auto\" role=\"status\" aria-hidden=\"true\"></div></div>");

						},
						url: siteRoot + "scripts/getTagStructure.php",
						type: "POST",
						contentType: "application/json",
						data: jsonString,
					});



					request2.done(function (data) {
						// alert( "success" );
						if (data) {
							//var toKeep = $.parseJSON(data.trim());
							//alert(data.trim());
							//console.dir(toKeep);


							//console.log(data);

							$('.modal').modal('show');

							//$('.modal').show();
							/* $('.modal').css('max-height', 800);
							$('.modal').css('max-width', 800);
							$('.modal').css('overflow', 'scroll'); */



							$('.modal').find('.modalContent').html('<h3>Data Structure</h3>');

							$('.modal').find('.modalContent').append('<div class="modalMessageBox"></div>');

							$('.modal').find('.modalContent').append('<p>' + data + '</p>');

							$('.modal').find('.modalContent').append('<button id="newReference">Add new reference</button>');

							$('.modal').find('#dataTable2').DataTable();

							//makeSearchBoxModal();

							return;


						}
						//$(document).find('.Thursday').hide();
					})







				})

			});
			</script>    
		    
		    
		<?php
		
		    // Include the footer file to complete the template:
		    include(BASE_URI . "/includes/footer.html");
		
		
		
		
		    ?>
		</body>
		</html>
		
		