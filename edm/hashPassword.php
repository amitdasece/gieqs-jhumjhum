<?php

function hash_password($password, $salt) {
    $salted_password = substr($password, 0, 4) . $salt . substr($password, 4);
    return hash('sha512', $salted_password);}

if (isset($_POST)) {
	$salt = 'westmead';
	$inputPassword = $_POST['Password'];
	
	echo hash_password($inputPassword, $salt);
	
	
}
	
    
            ?>
<html>
<form>

	<input type="text" name="Password">
	
	<button type="submit" formmethod="post" formaction="hashPassword.php">Submit using POST</button>


</form>
</html>
