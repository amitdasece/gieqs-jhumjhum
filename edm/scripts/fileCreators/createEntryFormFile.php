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
     * Create Directory to save the files if don�t exist
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
		

$databaseTable = 'chapter';
$databaseIdentifier = 'id';
$title = 'Chapter Form';
$pageURLIdentifier = 'id';

?>



<?php
	
	$file_in = "
	
	
	
	
	require ('../headerCreator.php');	
	
	\$formv1 = new formGenerator;
	\$general = new general;
	\$video = new video;
	\$tagCategories = new tagCategories;";


$file_in .= '



foreach ($_GET as $k=>$v){
	
	$sanitised = $general->sanitiseInput($v);
	$_GET[$k] = $sanitised;
	
	
}

if (isset($_GET[\''. $pageURLIdentifier .'\']) && is_numeric($_GET[\''.$pageURLIdentifier.'\'])){
	$id = $_GET[\''.$pageURLIdentifier.'\'];
	
}else{
	
	$id = null;
	
}



//TERMINATE THE SCRIPT IF NOT A SUPERUSER



// Page content
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html>
<head>
    <title>' . $title . '</title>
</head>

<?php
include($root . \'/scripts/logobar.php\');

include($root . \'/includes/naviCreator.php\');
?>

<body>
	
	<div id=\'id\' style=\'display:none;\'><?php if ($id){echo $id;}?></div>
	
    <div id="content" class="content">
	    
        <div class="responsiveContainer white">
	        
	        <div class="row">
                <div class="col-9">
                    <h2 style=\'text-align:left;\'>'. $title .'</h2>
                </div>

                <div id=\'messageBox\' class="col-3 yellow-light narrow center">
                    <p></p>
                </div>
            </div>
	        
	        
	        <p><?php
		        
		        if ($id){
	
					$q = "SELECT '. $databaseIdentifier .' FROM '. $databaseTable .' WHERE '. $databaseIdentifier .' = $id";
					if ($general->returnYesNoDBQuery($q) === 0){
						echo \'Passed id does not exist in the database\';
						exit();
						
					}
				}
	
?></p>
	        
	        	        
	        <p>
			    
			    <form id=\''.$databaseTable.'\'>
			    <?php ';
				   /*     
				    
				   //$file_in .=  $general->generateFormField($databaseTable);
				    
				    $file_in .=  '?>
				    <button id=\'submit'. $databaseTable .'\'>Submit</button>
				        
			    </form>   
			        
		        </p>
		        
		        
	        
        </div>
        
    </div>';
    
    
    
    
    
    
    
$file_in .= '
<script>
	var siteRoot = \'http://localhost:90/dashboard/esd/\';

	'. $databaseTable .'Passed = $(\'#id\').text();
	
	if ('. $databaseTable .'Passed == \'\'){
		
		var edit = 0;
		
	}else{
		
		var edit = 1;
		
	}
	

    

	
	function fillForm (idPassed){
	
		disableFormInputs(\''.$databaseTable.'\');
		
		'.$databaseTable.'Required = new Object;
			
		'.$databaseTable.'Required = getNamesFormElements(\''.$databaseTable.'\');
		
		'.$databaseTable.'String = \'`'. $databaseIdentifier .'`=\\\'\'+idPassed+\'\\\'\';
		
		var selectorObject = getDataQuery (\''.$databaseTable.'\', '.$databaseTable.'String, getNamesFormElements(\''.$databaseTable.'\'), 1);
		
		//console.log(selectorObject);
		
		selectorObject.done(function (data){
			
			//console.log(data);
			
			var formData = $.parseJSON(data);
			    
			 
		    $(formData).each(function(i,val){
			    $.each(val,function(k,v){
			        $(\'#\'+k).val(v);  
			        //console.log(k+" : "+ v);     
			    });
		        
		    });
		    
		    enableFormInputs(\''.$databaseTable.'\');
		
		});
		
		try {
			
			$(\'form#'.$databaseTable.'\').find(\'button#delete'.$databaseTable.'\').length();
			
		}catch(error){
			
			$(\'form#'.$databaseTable.'\').find(\'button\').after(\'<button id="delete'.$databaseTable.'">Delete</button>\');
			
		}
	
	}
	
	
	//delete behaviour
	
	function delete'.$databaseTable.' (){
		
		//'.$databaseTable.'Passed is the current record, some security to check its also that in the id field
		
		if ('.$databaseTable.'Passed != $(\'#id\').text()){
			
			return;
			
		}
		
		
		if (confirm(\'Do you wish to delete this '.$databaseTable.'?\')) {
		
			disableFormInputs(\''.$databaseTable.'\');
			
			var '.$databaseTable.'Object = pushDataFromFormAJAX(\''.$databaseTable.'\', \''.$databaseTable.'\', \''.$databaseIdentifier.'\', '.$databaseTable.'Passed, \'2\'); //delete '.$databaseTable.'
			
			'.$databaseTable.'Object.done(function (data){
		
				//console.log(data);

				if (data){
					
					if (data == 1){
					
						alert (\''.$databaseTable.' deleted\');
						edit = 0;
						'.$databaseTable.'Passed = null;
						window.location.href = siteRoot + \'scripts/forms/'.$databaseTable.'Table.php\';
						//go to '.$databaseTable.' list
						
					}else {
					
					alert(\'Error, try again\');
					
					enableFormInputs(\''.$databaseTable.'\');
					
				    }
					
					
					
				}
	      
		
			});
		
		}
		
		
	}
	
	function submit'.$databaseTable.'Form (){
		
		//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
		if (edit == 0){
			
			var '.$databaseTable.'Object = pushDataFromFormAJAX(\''.$databaseTable.'\', \''.$databaseTable.'\', \''.$databaseIdentifier.'\', null, \'0\'); //insert new object
			
			'.$databaseTable.'Object.done(function (data){
		
				//console.log(data);

				if (data){
					
					alert (\'New '.$databaseTable.' no \'+data+\' created\');
					edit = 1;
					$(\'#id\').text(data);
					'.$databaseTable.'Passed = data;
					fillForm(data);
					
					
					
					
				}else {
					
					alert(\'No data inserted, try again\');
					
				}
	      
		
			});
			
		} else if (edit == 1){
			
			var '.$databaseTable.'Object = pushDataFromFormAJAX(\''.$databaseTable.'\', \''.$databaseTable.'\', \''.$databaseIdentifier.'\', '.$databaseTable.'Passed, \'1\'); //insert new object
			
			'.$databaseTable.'Object.done(function (data){
		
				//console.log(data);

				if (data){
					
					if (data == 1){
					
						alert (\'Data updated\');
						edit = 1;
						
					} else if (data == 0) {
					
					alert(\'No change in data detected\');
					
				    } else if (data == 2) {
					
					alert(\'Error, try again\');
					
				    }
					
					
					
				}
	      
		
			});
			
			
			
			
		}
		
		
	}
	
	$(document).ready(function() {

		if (edit == 1){
		
			fillForm('.$databaseTable.'Passed);
	
		}
		
			  	
	  	var titleGraphic = $(\'.title\').height();
		var titleBar = $(\'#menu\').height();
		$(\'.title\').css("height",(titleBar));	
		
		
		$(window).resize(function () {
	    waitForFinalEvent(function(){
	      //alert(\'Resize...\');
	      var titleGraphic = $(\'.title\').height();
		  var titleBar = $(\'#menu\').height();
		  $(\'.title\').css("height",(titleBar));	
			
	    }, 100, "Resize header");
			});

		
		$(\'#content\').on("click", "#submit'.$databaseTable.'", (function(event) {
	        event.preventDefault();
	        $("#'.$databaseTable.'").submit();
	
	
	    }));
	    
	    $(\'#content\').on("click", "#delete'.$databaseTable.'", (function(event) {
	        event.preventDefault();
	        delete'.$databaseTable.'();
	
	
	    }));
	
		$(\'#'.$databaseTable.'\').validate({
	
	        invalidHandler: function(event, validator) {
	            var errors = validator.numberOfInvalids();
	            console.log(\'there were \' + errors + \'errors\');
	            if (errors) {
	                var message = errors == 1 ?
	                    \'You missed 1 field. It has been highlighted\' :
	                    \'You missed \' + errors + \' fields. They have been highlighted\';
	                $("div.error span").html(message);
	                $("div.error").show();
	            } else {
	                $("div.error").hide();
	            }
	        },';
	        
	        //$file_in .= $general->generateLogicValidate($databaseTable);
	        
	        $file_in .= '	
	        submitHandler: function(form) {
	
	            submit'.$databaseTable.'Form();
	            
	          	console.log(\'submitted form\');
	
	
	
	    }




    });

})

	</script>';    
    
    $file_in .= '
<?php

    // Include the footer file to complete the template:
    include($root .\'/includes/footer.php\');




    ?>
</body>
</html>';
*/
print_r($file_in);
print_r(createWritableFolder($root . "scripts/fileCreators/files"));

SaveFile($root . "scripts/fileCreators/files/output.txt", $file_in);