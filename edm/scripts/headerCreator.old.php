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

//echo $root;

?>


    <script src="<?php echo $roothttp . 'includes/jquery.min.js'; ?>" type="text/javascript">
</script>
   
	    
	    
</script>

<script src="<?php echo $roothttp . 'includes/generaljs.js'; ?>" type="text/javascript"></script>



<?php echo '<script src="' . $roothttp . 'includes/jquery.validate.js"></script>';

    echo '<link rel="stylesheet" type="text/css" href="'. $roothttp . '/styles%20image.css">';
    
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';


    ?>
