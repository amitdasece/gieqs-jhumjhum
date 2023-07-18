
		
		
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
		    <title>users Form</title>
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
		                    <h2 style="text-align:left;">users Form</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p></p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  user_id  FROM  users  WHERE  user_id  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    <form id="users">
					    <?php echo $formv1->generateText('user_id', 'user_id', '', 'tooltip here');
echo $formv1->generateText('firstname', 'firstname', '', 'tooltip here');
echo $formv1->generateText('surname', 'surname', '', 'tooltip here');
echo $formv1->generateText('email', 'email', '', 'tooltip here');
echo $formv1->generateText('password', 'password', '', 'tooltip here');
echo $formv1->generateText('centre', 'centre', '', 'tooltip here');
echo $formv1->generateText('registered_date', 'registered_date', '', 'tooltip here');
echo $formv1->generateText('last_login', 'last_login', '', 'tooltip here');
echo $formv1->generateText('previous_login', 'previous_login', '', 'tooltip here');
echo $formv1->generateText('timezone', 'timezone', '', 'tooltip here');
echo $formv1->generateText('access_level', 'access_level', '', 'tooltip here');
echo $formv1->generateText('contactPhone', 'contactPhone', '', 'tooltip here');
echo $formv1->generateText('key', 'key', '', 'tooltip here');
?>
						    <button id="submitusers">Submit</button>
		
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
		
			 usersPassed = $("#id").text();
		
			if ( usersPassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("users");
		
				usersRequired = new Object;
		
				usersRequired = getNamesFormElements("users");
		
				usersString = '`user_id`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("users", usersString, getNamesFormElements("users"), 1);
		
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
				    
				    $("#messageBox").text("Editing users id "+idPassed);
		
				    enableFormInputs("users");
		
				});
		
				try {
		
					$("form#users").find("button#deleteusers").length();
		
				}catch(error){
		
					$("form#users").find("button").after("<button id='deleteusers'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deleteusers (){
		
				//usersPassed is the current record, some security to check its also that in the id field
		
				if (usersPassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this users?")) {
		
					disableFormInputs("users");
		
					var usersObject = pushDataFromFormAJAX("users", "users", "user_id", usersPassed, "2"); //delete users
		
					usersObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("users deleted");
								edit = 0;
								usersPassed = null;
								window.location.href = siteRoot + "scripts/forms/usersTable.php";
								//go to users list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("users");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitusersForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var usersObject = pushDataFromFormAJAX("users", "users", "user_id", null, "0"); //insert new object
		
					usersObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							alert ("New users no "+data+" created");
							edit = 1;
							$("#id").text(data);
							usersPassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var usersObject = pushDataFromFormAJAX("users", "users", "user_id", usersPassed, "1"); //insert new object
		
					usersObject.done(function (data){
		
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
		
					fillForm(usersPassed);
		
				}else{
					
					$("#messageBox").text("New users");
					
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
		
		
				$("#content").on('click', '#submitusers', (function(event) {
			        event.preventDefault();
			        $('#users').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deleteusers', (function(event) {
			        event.preventDefault();
			        deleteusers();
		
		
			    }));
		
				$("#users").validate({
		
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
		
			            submitusersForm();
		
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