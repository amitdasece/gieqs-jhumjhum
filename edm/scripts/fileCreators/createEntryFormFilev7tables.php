<?php

$host = substr($_SERVER['HTTP_HOST'], 0, 5);
if (in_array($host, array('local', '127.0', '192.1'))) {
	$local = TRUE;
} else {
	$local = FALSE;
}

if ($local){

	$root = $_SERVER['DOCUMENT_ROOT'].'/dashboard/esd/';
	$roothttp = 'http://' . $_SERVER['HTTP_HOST'].'/dashboard/esd/';
	require($_SERVER['DOCUMENT_ROOT'].'/dashboard/esd/includes/config.inc.php');
}else{
	$root = $_SERVER['DOCUMENT_ROOT'].'/esd/';
	$roothttp = 'http://' . $_SERVER['HTTP_HOST'].'/esd/';

	require($_SERVER['DOCUMENT_ROOT'].'/esd/includes/config.inc.php');

}
$location = $roothttp . 'elearn.php';

session_start();
if (!isset($_SESSION['user_id'])) {

	// Need the functions:
	require ($root . 'includes/login_functions.php');
	redirect_login($location);
}

(1);

?>

<script src="<?php echo $roothttp . 'includes/generaljs.js'; ?>" type="text/javascript"></script>
<script src="<?php echo $roothttp . 'includes/jquery.min.js'; ?>" type="text/javascript"></script>
<script src="<?php echo $roothttp . 'includes/jquery-ui.js'; ?>" type="text/javascript"></script>



<?php

$formv1 = new formGenerator;
$general = new general;
$video = new video;
$tagCategories = new tagCategories;

//starts here

//php creator



/**
 * Create Directory to save the files if don¥t exist
 *
 */
function VerifyDirectory(){
	if(is_dir($root . "scripts/fileCreators/files")){
		return true;
	}else{
		mkdir($root . "scripts/fileCreators/files", "0777", true);
		return true;
	}
}


function SaveFile($filename, $text){
	if(VerifyDirectory()){
		$file = fopen($filename, "w");
		if ($file){

			fwrite($file, $text);
			fclose($file);
			echo 'File written';
		}else{

			echo 'cannot open';

		}
	}
}

function createWritableFolder($folder)
{
	if (file_exists($folder)) {
		echo 'folder exists';
		return is_writable($folder);
	}
	// Folder not exit, check parent folder.
	$folderParent = dirname($folder);
	if($folderParent != '.' && $folderParent != '/' ) {
		if(!createWritableFolder(dirname($folder))) {
			echo 'Failed to create folder ' . $folder;
			return false;
		}
		// Folder parent created.
	}

	if ( is_writable($folderParent) ) {
		echo' Folder parent is writable';
		if ( mkdir($folder, 0777, true) ) {
			echo 'Folder created';
			return true;
		}
		echo 'Failed to create folder';
	}
	echo ' Folder parent is not writable';
	return false;
}


//$databaseTable = 'chapter';
//$databaseIdentifier = 'id';
//$title = 'Chapter Form';
//$pageURLIdentifier = 'id';

$columns = $formv1->getAllDatabaseTables();

$datafields = array();

$x=0;

foreach ($columns as $key=>$value){
	
	if 	($table != $value['table']) {

	
		$table = $value['table'];
		$identifier = $value['name'];
		
		$datafields[$x] = array ('databaseTable' => $table, 'databaseIdentifier' => $identifier, 'title' => $table . ' Form', 'pageURLIdentifier' => 'id'); 
		
		$x++;
	
	}
		
} 




/*

$datafields[1] = array(
	
	'databaseTable' => 'chapter',
	'databaseIdentifier' => 'id',
	'title' => 'Chapter Form',
	'pageURLIdentifier' => 'id',
	
	
);

$datafields[2] = array(
	
	'databaseTable' => 'audio',
	'databaseIdentifier' => 'id',
	'title' => 'Audio Form',
	'pageURLIdentifier' => 'id',
	
	
);
*/

print_r($datafields);



?>



<?php
	
	foreach ($datafields as $key=>$value){
		
		$databaseTable = $value['databaseTable'];
		$databaseIdentifier = $value['databaseIdentifier'];
		$title = $value['title'];
		$pageURLIdentifier = $value['pageURLIdentifier'];
		
		
		foreach ($value as $key2=>$value2){
	

		$file_in = "
		
		
			<?php
		
			require ('{$root}scripts/headerCreator.php');
		
			\$formv1 = new formGenerator;
			\$general = new general;
			\$video = new video;
			\$tagCategories = new tagCategories;";
		
		
		$file_in .= "
		
		
		
		foreach (\$_GET as \$k=>\$v){
		
			\$sanitised = \$general->sanitiseInput(\$v);
			\$_GET[\$k] = \$sanitised;
		
		
		}
		
		if (isset(\$_GET[\"{$pageURLIdentifier}\"]) && is_numeric(\$_GET[\"{$pageURLIdentifier}\"])){
			\$id = \$_GET[\"{$pageURLIdentifier}\"];
		
		}else{
		
			\$id = null;
		
		}
		
		
		
		//TERMINATE THE SCRIPT IF NOT A SUPERUSER
		
		
		
		// Page content
		?>
		<!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01//EN'>
		
		<html>
		<head>
		    <title>{$title}</title>
		</head>
		
		<?php
		include(\$root . \"/scripts/logobar.php\");
		
		include(\$root . \"/includes/naviCreator.php\");
		?>
		
		<body>
		
			<div id=\"id\" style=\"display:none;\"><?php if (\$id){echo \$id;}?></div>
		
		    <div id='content' class='content'>
		
		        <div class='responsiveContainer white'>
		
			        <div class='row'>
		                <div class='col-9'>
		                    <h2 style=\"text-align:left;\">{$title}</h2>
		                </div>
		
		                <div id=\"messageBox\" class='col-3 yellow-light narrow center'>
		                    <p></p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if (\$id){
		
							\$q = \"SELECT  {$databaseIdentifier}  FROM  {$databaseTable}  WHERE  {$databaseIdentifier}  = \$id\";
							if (\$general->returnYesNoDBQuery(\$q) != 1){
								echo \"Passed id does not exist in the database\";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    <form id=\"$databaseTable\">
					    <?php ";
		
		ob_start();
		$general->generateFormField($databaseTable);
		$file_in .= ob_get_contents();
		ob_end_clean();
		
		
		//echo $general->generateFormField($databaseTable);
		
		
		//echo addslashes($fields1);
		
		//$file_in .= addslashes($fields1);
		
		$file_in .= "?>
						    <button id=\"submit$databaseTable\">Submit</button>
		
					    </form>
		
				        </p>
		
		
		
		        </div>
		
		    </div>";
		
		
		
		
		
		
		
		$file_in .= "
		<script>
			var siteRoot = \"http://localhost:90/dashboard/esd/\";
		
			 {$databaseTable}Passed = $(\"#id\").text();
		
			if ( {$databaseTable}Passed == \"\"){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs(\"{$databaseTable}\");
		
				{$databaseTable}Required = new Object;
		
				{$databaseTable}Required = getNamesFormElements(\"{$databaseTable}\");
		
				{$databaseTable}String = '`{$databaseIdentifier}`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery (\"{$databaseTable}\", {$databaseTable}String, getNamesFormElements(\"{$databaseTable}\"), 1);
		
				//console.log(selectorObject);
		
				selectorObject.done(function (data){
		
					//console.log(data);
		
					var formData = $.parseJSON(data);
		
		
				    $(formData).each(function(i,val){
					    $.each(val,function(k,v){
					        $(\"#\"+k).val(v);
					        //console.log(k+' : '+ v);
					    });
		
				    });
				    
				    $(\"#messageBox\").text(\"Editing {$databaseTable} id \"+idPassed);
		
				    enableFormInputs(\"{$databaseTable}\");
		
				});
		
				try {
		
					$(\"form#{$databaseTable}\").find(\"button#delete{$databaseTable}\").length();
		
				}catch(error){
		
					$(\"form#{$databaseTable}\").find(\"button\").after(\"<button id='delete{$databaseTable}'>Delete</button>\");
		
				}
		
			}
		
		
			//delete behaviour
		
			function delete{$databaseTable} (){
		
				//{$databaseTable}Passed is the current record, some security to check its also that in the id field
		
				if ({$databaseTable}Passed != $(\"#id\").text()){
		
					return;
		
				}
		
		
				if (confirm(\"Do you wish to delete this {$databaseTable}?\")) {
		
					disableFormInputs(\"{$databaseTable}\");
		
					var {$databaseTable}Object = pushDataFromFormAJAX(\"{$databaseTable}\", \"{$databaseTable}\", \"{$databaseIdentifier}\", {$databaseTable}Passed, \"2\"); //delete {$databaseTable}
		
					{$databaseTable}Object.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert (\"{$databaseTable} deleted\");
								edit = 0;
								{$databaseTable}Passed = null;
								window.location.href = siteRoot + \"scripts/forms/{$databaseTable}Table.php\";
								//go to {$databaseTable} list
		
							}else {
		
							alert(\"Error, try again\");
		
							enableFormInputs(\"{$databaseTable}\");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submit{$databaseTable}Form (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var {$databaseTable}Object = pushDataFromFormAJAX(\"{$databaseTable}\", \"{$databaseTable}\", \"{$databaseIdentifier}\", null, \"0\"); //insert new object
		
					{$databaseTable}Object.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							alert (\"New {$databaseTable} no \"+data+\" created\");
							edit = 1;
							$(\"#id\").text(data);
							{$databaseTable}Passed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert(\"No data inserted, try again\");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var {$databaseTable}Object = pushDataFromFormAJAX(\"{$databaseTable}\", \"{$databaseTable}\", \"{$databaseIdentifier}\", {$databaseTable}Passed, \"1\"); //insert new object
		
					{$databaseTable}Object.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert (\"Data updated\");
								edit = 1;
		
							} else if (data == 0) {
		
							alert(\"No change in data detected\");
		
						    } else if (data == 2) {
		
							alert(\"Error, try again\");
		
						    }
		
		
		
						}
		
		
					});
		
		
		
		
				}
		
		
			}
		
			$(document).ready(function() {
		
				if (edit == 1){
		
					fillForm({$databaseTable}Passed);
		
				}else{
					
					$(\"#messageBox\").text(\"New {$databaseTable}\");
					
				}
		
				
		
			  	var titleGraphic = $(\".title\").height();
				var titleBar = $(\"#menu\").height();
				$(\".title\").css('height',(titleBar));
		
		
				$(window).resize(function () {
			    waitForFinalEvent(function(){
			      //alert(\"Resize...\");
			      var titleGraphic = $(\".title\").height();
				  var titleBar = $(\"#menu\").height();
				  $(\".title\").css('height',(titleBar));
		
			    }, 100, 'Resize header');
					});
		
		
				$(\"#content\").on('click', '#submit{$databaseTable}', (function(event) {
			        event.preventDefault();
			        $('#{$databaseTable}').submit();
		
		
			    }));
		
			    $(\"#content\").on('click', '#delete{$databaseTable}', (function(event) {
			        event.preventDefault();
			        delete{$databaseTable}();
		
		
			    }));
		
				$(\"#{$databaseTable}\").validate({
		
			        invalidHandler: function(event, validator) {
			            var errors = validator.numberOfInvalids();
			            console.log(\"there were \" + errors + \"errors\");
			            if (errors) {
			                var message = errors == 1 ?
			                    \"You missed 1 field. It has been highlighted\" :
			                    \"You missed \" + errors + \" fields. They have been highlighted\";
			                $('div.error span').html(message);
			                $('div.error').show();
			            } else {
			                $('div.error').hide();
			            }
			        },";
		
		
		ob_start();
		$general->generateLogicValidate($databaseTable);
		$file_in .= ob_get_contents();
		ob_end_clean();
		
		$file_in .= "
			        submitHandler: function(form) {
		
			            submit{$databaseTable}Form();
		
			          	console.log(\"submitted form\");
		
		
		
			    }
		
		
		
		
		    });
		
		})
		
			</script>";
		
		$file_in .= "
		<?php
		
		    // Include the footer file to complete the template:
		    include(\$root .\"/includes/footer.php\");
		
		
		
		
		    ?>
		</body>
		</html>";

}

print_r($file_in);
print_r(createWritableFolder($root . "scripts/fileCreators/files"));

SaveFile($root . "scripts/fileCreators/files/{$databaseTable}Form.php", $file_in);


	foreach ($value as $key2=>$value2){
		
		//!start the table generator

		$file_in = "
		
		<?php
		
			require ('{$root}scripts/headerCreator.php');
		
		
		\$formv1 = new formGenerator;
		\$general = new general;
		\$video = new video;
		\$tagCategories = new tagCategories;
		
		
		
		?>
		<!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01//EN'>
		
		<html>
		<head>
		    <title>{$databaseTable} Table</title>
		</head>
		
		<?php
		include(\$root . \"/scripts/logobar.php\");
		
		include(\$root . \"/includes/naviCreator.php\");
		?>
		
		
		<body>
			
				
		    <div id='content' class='content'>
			    
		        <div class='responsiveContainer white'>
			        
			        <div class='row'>
		                <div class='col-9'>
		                    <h2 style=\"text-align:left;\">List of {$databaseTable}</h2>
		                </div>
		
		                <div id=\"messageBox\" class='col-3 yellow-light narrow center'>
		                    <p><button id=\"new{$databaseTable}\" onclick=\"window.location.href = '<?php echo \$roothttp;?>/scripts/forms/{$databaseTable}Form.php';\">New {$databaseTable}</button></p>
		                </div>
		            </div>
			        
			        <div class='row'>
		                <div class='col-1'></div>
		
		                <div class='col-10 narrow' style='overflow-x: scroll;'>
		                    <p><?php \$general->makeTable(\"SELECT {$databaseIdentifier} from {$databaseTable}\"); ?></p>
		                </div>
		
		                <div class='col-1'></div>
		            </div>
		
			        
		        </div>
		        
		    </div>
		<script>
			var siteRoot = \"http://localhost:90/dashboard/esd/\";
		
				
			$(document).ready(function() {
		
				$(\"#dataTable\").find(\"tr\");
		
				$(\".content\").on(\"click\", \".datarow\", function(){
					
					var id = $(this).find(\"td:first\").text();
					
					//console.log(id);
					
					window.location.href = siteRoot + 'scripts/forms/{$databaseTable}Form.php?id=' + id;
		
					
				})
				
				
			  	var titleGraphic = $(\".title\").height();
				var titleBar = $(\"#menu\").height();
				$(\".title\").css('height',(titleBar));	
				
				
				$(window).resize(function () {
			    waitForFinalEvent(function(){
			      //alert(\"Resize...\");
			      var titleGraphic = $(\".title\").height();
				  var titleBar = $(\"#menu\").height();
				  $(\".title\").css('height',(titleBar));	
					
			    }, 100, 'Resize header');
					});
		
		
		
		    });
		
		
		
			</script>    
		    
		    
		<?php
		
		    // Include the footer file to complete the template:
		    include(\$root .\"/includes/footer.php\");
		
		
		
		
		    ?>
		</body>
		</html>
		
		";

		
		
		
	}

print_r($file_in);
print_r(createWritableFolder($root . "scripts/fileCreators/files"));

SaveFile($root . "scripts/fileCreators/files/{$databaseTable}Table.php", $file_in);


}




