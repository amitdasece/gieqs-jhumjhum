<?php
	
//


require(BASE_URI1 . '/includes/login_functions.php');



//place to redirect the user if not allowed access
if (!isset($location)){
    $location = BASE_URL1 . '/index.php';
}



if (!($dbc)){
    require(DB);
    }



require(BASE_URI1 . '/scripts/interpretUserAccess.php');


?>

<noscript>
    <style type="text/css">
        .content {display:none;}
        #content {display:none;}
    </style>
    <div class="noscriptmsg">
    You don't have javascript enabled. It is required to view this site.
    </div>
</noscript>

 <script src="<?php echo BASE_URL1 . '/includes/jquery.min.js'; ?>" type="text/javascript"></script>
   
	    <script src="<?php echo BASE_URL1 . '/includes/generaljs.js'; ?>" type="text/javascript">
</script>

	






<?php echo '<script src="' . BASE_URL1 . '/includes/jquery.validate.js"></script>';

    echo '<link rel="stylesheet" type="text/css" href="'. BASE_URL1 . '/styles%20image.css">';
    
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';



    ?>

<div id="loading">
	
    </div>