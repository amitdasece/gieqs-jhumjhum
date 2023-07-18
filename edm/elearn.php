 <?php
$page_title='ACE wiki Login';
$page_header='ACE wiki Login';
include ('image_header_initial.php');
require ('includes/config.inc.php');

?>

    <div class="navbar">
        <a href="elearn.php" class='dropbtn'>Login page iACE wiki</a>
        <a href="https://www.acestudy.net/index.php" class='dropbtn'>Back to main ACE site</a>

    </div>

</div>
</header>


<div id='loginElearn' class="content">
 <?php


// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Need two helper files:
	require ('includes/login_functions.php');
	require (DB);

	// Check the login:
	list ($check, $data) = check_login($dbc,
		$_POST['email'], $_POST['pass']);

	if ($check) { // OK!

		// Set the session data:
		$_SESSION['user_id'] = $data['user_id'];
		$_SESSION['firstname'] = $data['firstname'];
		$_SESSION['surname'] = $data['surname'];
		$_SESSION['centre'] = $data['centre'];


		


		// Redirect:
		redirect_user('index.php');

	} else { // Unsuccessful!

		// Assign $data to $errors for
		$errors = $data;
		foreach ($errors as $msg) {
			echo " - $msg<br />\n";
		}

		mysqli_close($dbc); // Close the database connection.

	} // End of the main submit conditional.
}
// Create the page:
?>

<h2>Login</h2>

   <form action="elearn.php" method="post">
       <fieldset>
       <p> Email address: <input type="text" name="email" size="30" maxlength="80"></p>
        <p> Password: <input type="password" name="pass" size="30" maxlength="80"></p>
        <p><input type="submit" name="submit" value="Submit" /></p>
           <p> </p>
       </fieldset>
	   <br><br>
	  <button type='button' id='register'>Register for this site</button>&nbsp;&nbsp;<button type='button' id='forgot'>Forgot Password</button>


    </form>
    <br>
    <br>
    <br>
	<p><b>Note: </b>All are welcome to register for this site.</p><p>  Registration is invited from healthcare professionals with an interest in endoscopic tissue resection techniques. </p><p> All logins are individually approved so it may take up to 2 working days for approval</p>
      </div>
    </body>
<script>

var waitForFinalEvent = (function () {
  var timers = {};
  return function (callback, ms, uniqueId) {
    if (!uniqueId) {
      uniqueId = "Don't call this twice without a uniqueId";
    }
    if (timers[uniqueId]) {
      clearTimeout (timers[uniqueId]);
    }
    timers[uniqueId] = setTimeout(callback, ms);
  };
})();

$(document).ready(function() {

	var titleGraphic = $('.title').height();
	var titleBar = $('#menu').height();
	$('.title').css("height",(titleBar));


	$(window).resize(function () {
    waitForFinalEvent(function(){
      //alert('Resize...');
      var titleGraphic = $('.title').height();
	  var titleBar = $('#menu').height();
	  $('.title').css("height",(titleBar));

    }, 100, "Resize header");
		});

});
</script>




   <?php include ('includes/footer.html'); ?>