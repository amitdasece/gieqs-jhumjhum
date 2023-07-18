

</div>
</header>

<div class="content">

   <?php // Unset all of the session variables.
$openaccess = 1;

require 'includes/config.inc.php';
require BASE_URI1 . '/scripts/headerScript.php';
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();

//header ("Location: ". BASE_URI1 ."elearn.php");
//  exit ();

?>

<h1>Logged Out!</h1>
 <p>You are now logged out!</p>
    </div>


