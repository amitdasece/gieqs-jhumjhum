<?php
	
(1);

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

 <script src="<?php echo BASE_URL1 . '/includes/jquery.min.js'; ?>" type="text/javascript"></script>
   
	    <script src="<?php echo BASE_URL1 . '/includes/generaljs.js'; ?>" type="text/javascript">
</script>

	    
</script>



<script>
	
	
	
</script>



<?php echo '<script src="' . BASE_URL1 . '/includes/jquery.validate.js"></script>';

    echo '<link rel="stylesheet" type="text/css" href="'. BASE_URL1 . '/styles%20image.css">';
    
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';



    ?>

<div id="loading">
	
    </div>