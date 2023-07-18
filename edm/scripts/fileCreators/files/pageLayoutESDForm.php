
		
		
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
		    <title>pageLayoutESD Form</title>
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
		                    <h2 style="text-align:left;">pageLayoutESD Form</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p></p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  ?Number  FROM  pageLayoutESD  WHERE  ?Number  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    <form id="pageLayoutESD">
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
						    <button id="submitpageLayoutESD">Submit</button>
		
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
		
			 pageLayoutESDPassed = $("#id").text();
		
			if ( pageLayoutESDPassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("pageLayoutESD");
		
				pageLayoutESDRequired = new Object;
		
				pageLayoutESDRequired = getNamesFormElements("pageLayoutESD");
		
				pageLayoutESDString = '`?Number`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("pageLayoutESD", pageLayoutESDString, getNamesFormElements("pageLayoutESD"), 1);
		
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
				    
				    $("#messageBox").text("Editing pageLayoutESD id "+idPassed);
		
				    enableFormInputs("pageLayoutESD");
		
				});
		
				try {
		
					$("form#pageLayoutESD").find("button#deletepageLayoutESD").length();
		
				}catch(error){
		
					$("form#pageLayoutESD").find("button").after("<button id='deletepageLayoutESD'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deletepageLayoutESD (){
		
				//pageLayoutESDPassed is the current record, some security to check its also that in the id field
		
				if (pageLayoutESDPassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this pageLayoutESD?")) {
		
					disableFormInputs("pageLayoutESD");
		
					var pageLayoutESDObject = pushDataFromFormAJAX("pageLayoutESD", "pageLayoutESD", "?Number", pageLayoutESDPassed, "2"); //delete pageLayoutESD
		
					pageLayoutESDObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("pageLayoutESD deleted");
								edit = 0;
								pageLayoutESDPassed = null;
								window.location.href = siteRoot + "scripts/forms/pageLayoutESDTable.php";
								//go to pageLayoutESD list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("pageLayoutESD");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitpageLayoutESDForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var pageLayoutESDObject = pushDataFromFormAJAX("pageLayoutESD", "pageLayoutESD", "?Number", null, "0"); //insert new object
		
					pageLayoutESDObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							alert ("New pageLayoutESD no "+data+" created");
							edit = 1;
							$("#id").text(data);
							pageLayoutESDPassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var pageLayoutESDObject = pushDataFromFormAJAX("pageLayoutESD", "pageLayoutESD", "?Number", pageLayoutESDPassed, "1"); //insert new object
		
					pageLayoutESDObject.done(function (data){
		
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
		
					fillForm(pageLayoutESDPassed);
		
				}else{
					
					$("#messageBox").text("New pageLayoutESD");
					
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
		
		
				$("#content").on('click', '#submitpageLayoutESD', (function(event) {
			        event.preventDefault();
			        $('#pageLayoutESD').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deletepageLayoutESD', (function(event) {
			        event.preventDefault();
			        deletepageLayoutESD();
		
		
			    }));
		
				$("#pageLayoutESD").validate({
		
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
		
			            submitpageLayoutESDForm();
		
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