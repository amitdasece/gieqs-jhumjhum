
		
		
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
		    <title>pageLayoutPolypectomyTool Form</title>
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
		                    <h2 style="text-align:left;">pageLayoutPolypectomyTool Form</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p></p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  id  FROM  pageLayoutPolypectomyTool  WHERE  id  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    <form id="pageLayoutPolypectomyTool">
					    <?php echo $formv1->generateText('?Number', '?Number', '', 'tooltip here');
echo $formv1->generateText('Name', 'Name', '', 'tooltip here');
echo $formv1->generateText('Position', 'Position', '', 'tooltip here');
echo $formv1->generateText('Order', 'Order', '', 'tooltip here');
echo $formv1->generateText('Type', 'Type', '', 'tooltip here');
echo $formv1->generateText('textType', 'textType', '', 'tooltip here');
echo $formv1->generateText('Value1', 'Value1', '', 'tooltip here');
echo $formv1->generateText('Value2', 'Value2', '', 'tooltip here');
echo $formv1->generateText('Weight', 'Weight', '', 'tooltip here');
echo $formv1->generateText('Value3', 'Value3', '', 'tooltip here');
echo $formv1->generateText('Value4', 'Value4', '', 'tooltip here');
echo $formv1->generateText('Text', 'Text', '', 'tooltip here');
echo $formv1->generateText('Link', 'Link', '', 'tooltip here');
echo $formv1->generateText('Message_t', 'Message_t', '', 'tooltip here');
echo $formv1->generateText('ForVideo', 'ForVideo', '', 'tooltip here');
echo $formv1->generateText('SelectMultiple', 'SelectMultiple', '', 'tooltip here');
echo $formv1->generateText('AlwaysRequired', 'AlwaysRequired', '', 'tooltip here');
echo $formv1->generateText('RequiredIfCondition', 'RequiredIfCondition', '', 'tooltip here');
echo $formv1->generateText('Condition', 'Condition', '', 'tooltip here');
echo $formv1->generateText('T', 'T', '', 'tooltip here');
?>
						    <button id="submitpageLayoutPolypectomyTool">Submit</button>
		
					    </form>
		
				        </p>
		
		
		
		        </div>
		
		    </div>
		<script>
			var siteRoot = "http://localhost:90/dashboard/esd/";
		
			 pageLayoutPolypectomyToolPassed = $("#id").text();
		
			if ( pageLayoutPolypectomyToolPassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("pageLayoutPolypectomyTool");
		
				pageLayoutPolypectomyToolRequired = new Object;
		
				pageLayoutPolypectomyToolRequired = getNamesFormElements("pageLayoutPolypectomyTool");
		
				pageLayoutPolypectomyToolString = '`id`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("pageLayoutPolypectomyTool", pageLayoutPolypectomyToolString, getNamesFormElements("pageLayoutPolypectomyTool"), 1);
		
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
				    
				    $("#messageBox").text("Editing pageLayoutPolypectomyTool id "+idPassed);
		
				    enableFormInputs("pageLayoutPolypectomyTool");
		
				});
		
				try {
		
					$("form#pageLayoutPolypectomyTool").find("button#deletepageLayoutPolypectomyTool").length();
		
				}catch(error){
		
					$("form#pageLayoutPolypectomyTool").find("button").after("<button id='deletepageLayoutPolypectomyTool'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deletepageLayoutPolypectomyTool (){
		
				//pageLayoutPolypectomyToolPassed is the current record, some security to check its also that in the id field
		
				if (pageLayoutPolypectomyToolPassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this pageLayoutPolypectomyTool?")) {
		
					disableFormInputs("pageLayoutPolypectomyTool");
		
					var pageLayoutPolypectomyToolObject = pushDataFromFormAJAX("pageLayoutPolypectomyTool", "pageLayoutPolypectomyTool", "id", pageLayoutPolypectomyToolPassed, "2"); //delete pageLayoutPolypectomyTool
		
					pageLayoutPolypectomyToolObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("pageLayoutPolypectomyTool deleted");
								edit = 0;
								pageLayoutPolypectomyToolPassed = null;
								window.location.href = siteRoot + "scripts/forms/pageLayoutPolypectomyToolTable.php";
								//go to pageLayoutPolypectomyTool list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("pageLayoutPolypectomyTool");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitpageLayoutPolypectomyToolForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var pageLayoutPolypectomyToolObject = pushDataFromFormAJAX("pageLayoutPolypectomyTool", "pageLayoutPolypectomyTool", "id", null, "0"); //insert new object
		
					pageLayoutPolypectomyToolObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							alert ("New pageLayoutPolypectomyTool no "+data+" created");
							edit = 1;
							$("#id").text(data);
							pageLayoutPolypectomyToolPassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var pageLayoutPolypectomyToolObject = pushDataFromFormAJAX("pageLayoutPolypectomyTool", "pageLayoutPolypectomyTool", "id", pageLayoutPolypectomyToolPassed, "1"); //insert new object
		
					pageLayoutPolypectomyToolObject.done(function (data){
		
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
		
					fillForm(pageLayoutPolypectomyToolPassed);
		
				}else{
					
					$("#messageBox").text("New pageLayoutPolypectomyTool");
					
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
		
		
				$("#content").on('click', '#submitpageLayoutPolypectomyTool', (function(event) {
			        event.preventDefault();
			        $('#pageLayoutPolypectomyTool').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deletepageLayoutPolypectomyTool', (function(event) {
			        event.preventDefault();
			        deletepageLayoutPolypectomyTool();
		
		
			    }));
		
				$("#pageLayoutPolypectomyTool").validate({
		
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
		
			            submitpageLayoutPolypectomyToolForm();
		
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