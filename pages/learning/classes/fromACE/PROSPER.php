 <?php  
        $page_title='iACE Study - Login';
        $page_header='iACE Study';
        include ('initial_header.php');

		$matchFound = ( isset($_GET["id"]) && filter_var($_GET["id"], FILTER_VALIDATE_URL) );
		$target = $matchFound ? trim ($_GET["id"]) : null;

		            
        
?>




    <div id="navi">
        <li class="active"><a href="PROSPER.php">Login page for iACE Server</a></li>
        <li><a href="../../index.php">Back to main ACE site</a></li>

    </div>
    
</div>
</header>


<div class="content">
 <?php
    
    
      // Check if the form has been submitted:
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				//CHECK FOR THE PRESENCE OF A REFERRING PAGE
				
				$matchFound = ( isset($_POST["id"]) && filter_var($_POST["id"], FILTER_VALIDATE_URL) );
				$target = $matchFound ? trim ($_POST["id"]) : null;


              // Need two helper files:
              require ('login_functions.php');
             define ('MYSQL', '../../../mysqli_connect_PROSPER.php');
             require (MYSQL);

           // Check the login:
             list ($check, $data) = check_login($dbc,
               $_POST['email'], $_POST['pass']);

             if ($check) { // OK!

                // Set the session data:
                $_SESSION['user_id'] = $data['user_id'];
                $_SESSION['firstname'] = $data['firstname'];
                $_SESSION['surname'] = $data['surname'];  
                $_SESSION['centre'] = $data['centre']; 
				$_SESSION['timezone'] = $data['timezone'];
            

                  if (!(isset($_SESSION["user_id"]))){
                 echo "User ID is not set in the session";
                 echo 'row dump'; var_dump($row);
                 echo '<br> data dum; '; var_dump($data);
                 echo '<br> session dump '; var_dump($_SESSION);
                    echo $_SESSION["user_id"];
                 }
                 
                 
                 
                    // Redirect:
					if ($target){
						echo "$target exists";
						redirect_user_full_url($target);

						
					}else{
						
						redirect_user_url('index.php');
						
						//redirect_user_url('index.php');
					
					}

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
    
   <form action="PROSPER.php" method="post">
       <fieldset>
	       
	   <?php if ($target) {echo "Enter your login details to proceed to the provided link - $target";}?>
	   
	   <p style="display:none;"> Target URL: <input type="text" name="id" size="90" maxlength="90" value="<?php echo $target?>"></p>
       <p> Email address: <input type="text" name="email" size="30" maxlength="80"></p>
        <p> Password: <input type="password" name="pass" size="30" maxlength="80"></p>
        <p><input type="submit" name="submit" value="Submit" /></p>
           <p> </p>
       </fieldset>
    </form>
    <br>
    <br>
    <br>
    <p><b>Note: </b>login to this system is by invitation only.  Please enter the login details you were provided.  
    If you believe you should be able to login but do not have login credentials please contact the host study centre.</p>
	
	<p>We suggest using <b>a modern browser</b> such as <a href='https://www.mozilla.org/en-GB/firefox/new/'>Firefox Quantum</a> or <a href='https://www.google.co.uk/chrome/browser/desktop/index.html'>Chrome</a>.  Other browsers, particularly older versions of internet explorer, my not work correctly.</p>
      </div>
    </body>
   <?php include ('footer.html'); ?>