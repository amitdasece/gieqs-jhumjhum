
		
		
			<?php
		
			require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');
		
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
		    <title>pagelayoutercpprocedure Form</title>
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
		                    <h2 style="text-align:left;">pagelayoutercpprocedure Form</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p></p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  id  FROM  pagelayoutercpprocedure  WHERE  id  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    <form id="pagelayoutercpprocedure">
					    <?php echo $formv1->generateText('?Number', '?Number', '', 'tooltip here');
echo $formv1->generateText('Name', 'Name', '', 'tooltip here');
echo $formv1->generateText('Position', 'Position', '', 'tooltip here');
echo $formv1->generateText('Order', 'Order', '', 'tooltip here');
echo $formv1->generateText('Type', 'Type', '', 'tooltip here');
echo $formv1->generateText('textType', 'textType', '', 'tooltip here');
echo $formv1->generateText('Value1', 'Value1', '', 'tooltip here');
echo $formv1->generateText('Value2', 'Value2', '', 'tooltip here');
echo $formv1->generateText('Text', 'Text', '', 'tooltip here');
echo $formv1->generateText('Link', 'Link', '', 'tooltip here');
echo $formv1->generateText('Message_t', 'Message_t', '', 'tooltip here');
echo $formv1->generateText('RequiredIndex', 'RequiredIndex', '', 'tooltip here');
echo $formv1->generateText('Required4weeks', 'Required4weeks', '', 'tooltip here');
?>
						    <button id="submitpagelayoutercpprocedure">Submit</button>
		
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
		
			 pagelayoutercpprocedurePassed = $("#id").text();
		
			if ( pagelayoutercpprocedurePassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("pagelayoutercpprocedure");
		
				pagelayoutercpprocedureRequired = new Object;
		
				pagelayoutercpprocedureRequired = getNamesFormElements("pagelayoutercpprocedure");
		
				pagelayoutercpprocedureString = '`id`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("pagelayoutercpprocedure", pagelayoutercpprocedureString, getNamesFormElements("pagelayoutercpprocedure"), 1);
		
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
				    
				    $("#messageBox").text("Editing pagelayoutercpprocedure id "+idPassed);
		
				    enableFormInputs("pagelayoutercpprocedure");
		
				});
		
				try {
		
					$("form#pagelayoutercpprocedure").find("button#deletepagelayoutercpprocedure").length();
		
				}catch(error){
		
					$("form#pagelayoutercpprocedure").find("button").after("<button id='deletepagelayoutercpprocedure'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deletepagelayoutercpprocedure (){
		
				//pagelayoutercpprocedurePassed is the current record, some security to check its also that in the id field
		
				if (pagelayoutercpprocedurePassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this pagelayoutercpprocedure?")) {
		
					disableFormInputs("pagelayoutercpprocedure");
		
					var pagelayoutercpprocedureObject = pushDataFromFormAJAX("pagelayoutercpprocedure", "pagelayoutercpprocedure", "id", pagelayoutercpprocedurePassed, "2"); //delete pagelayoutercpprocedure
		
					pagelayoutercpprocedureObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("pagelayoutercpprocedure deleted");
								edit = 0;
								pagelayoutercpprocedurePassed = null;
								window.location.href = siteRoot + "scripts/forms/pagelayoutercpprocedureTable.php";
								//go to pagelayoutercpprocedure list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("pagelayoutercpprocedure");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitpagelayoutercpprocedureForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var pagelayoutercpprocedureObject = pushDataFromFormAJAX("pagelayoutercpprocedure", "pagelayoutercpprocedure", "id", null, "0"); //insert new object
		
					pagelayoutercpprocedureObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							alert ("New pagelayoutercpprocedure no "+data+" created");
							edit = 1;
							$("#id").text(data);
							pagelayoutercpprocedurePassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var pagelayoutercpprocedureObject = pushDataFromFormAJAX("pagelayoutercpprocedure", "pagelayoutercpprocedure", "id", pagelayoutercpprocedurePassed, "1"); //insert new object
		
					pagelayoutercpprocedureObject.done(function (data){
		
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
		
					fillForm(pagelayoutercpprocedurePassed);
		
				}else{
					
					$("#messageBox").text("New pagelayoutercpprocedure");
					
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
		
		
				$("#content").on('click', '#submitpagelayoutercpprocedure', (function(event) {
			        event.preventDefault();
			        $('#pagelayoutercpprocedure').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deletepagelayoutercpprocedure', (function(event) {
			        event.preventDefault();
			        deletepagelayoutercpprocedure();
		
		
			    }));
		
				$("#pagelayoutercpprocedure").validate({
		
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
		
			            submitpagelayoutercpprocedureForm();
		
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