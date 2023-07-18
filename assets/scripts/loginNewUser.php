<?php
error_reporting(E_ALL);
//;
$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require ('../../assets/includes/config.inc.php');		
//echo 'hello2';
require (BASE_URI.'/assets/scripts/headerScript.php');

//require (BASE_URI.'/assets/scripts/login_functions.php');

//echo 'hello3';sss
$general = new general;
$users = new users;
$userFunctions = new userFunctions;
//echo 'hello4';




function ne($v) {
    return $v != '';
}

$current_date = new DateTime('now', new DateTimeZone('UTC'));
$current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');




$debug = $gigs_debug;
$explicit = true;
//echo 'hello';

if (count($_GET) > 0){

	if ($debug){

        print_r($_GET);
    }

	
	$data = $general->sanitiseGET($_GET);
	
	/* foreach ($data as $key=>$value){
		
		$GLOBALS[$key] = $value;
		
    } */

    if ($debug){

        print_r($data);
        
        }


    //look up the user

    $log=[];

    
    $log[] = "New user script run with key" . $data['key'];

    if ($debug){

        var_dump($userFunctions->getUserFromKey($data['key']));

    }

    if ($userFunctions->getUserFromKey($data['key']) != FALSE){

    $userid = $userFunctions->getUserFromKey($data['key']);
    //echo $userid;

    $log[] = "User id $userid with key" . $data['key'] .  "attempting to register as new user";




    //switch the userLevel to 6

    $users->Load_from_key($userid);
    $users->setaccess_level(6);
    
        //get a new key

        $key = $userFunctions->generateRandomString('10');
        $users->setkey($key);

        //commit changes to DB

        if ($users->prepareStatementPDOUpdate() > 0){

            //login

            //get from the users class

            $log[] = "User id $userid key updated to $key";


            $_SESSION['user_id'] = $users->getuser_id();
            $_SESSION['firstname'] = $users->getfirstname();
            $_SESSION['surname'] = $users->getsurname();
            $_SESSION['access_level'] = $users->getaccess_level();
            $_SESSION['siteKey'] = 'TxsvAb6KDYpmdNk';

            //redirect gieqs.com

           
                if ($access_token){

                    $log[] = "Redirect to " . BASE_URL . '/pages/authentication/welcomeNewUser.php?signup_redirect=' . $signup_redirect . '&access_token=' . $access_token;

                    $dataLogFile = implode(" - ", $log);

//Add a newline onto the end.
$dataLogFile .= PHP_EOL;

if ($debugPrint){

    var_dump($dataLogFile);
}



//Log the data to your file using file_put_contents.
$myfile = fopen(BASE_URI . '/assets/scripts/newuser_log.log', "a");
fwrite($myfile, "\n New Log, at " . $current_date_sqltimestamp . "\n");
fwrite($myfile, $dataLogFile);
fclose($myfile);



                    redirect_user(BASE_URL . '/pages/authentication/welcomeNewUser.php?signup_redirect=' . $signup_redirect . '&access_token=' . $access_token);


                }else{

                
                    $log[] = "Redirect to " . BASE_URL . '/pages/authentication/welcomeNewUser.php?signup_redirect=' . $signup_redirect;

                    $dataLogFile = implode(" - ", $log);

//Add a newline onto the end.
$dataLogFile .= PHP_EOL;

if ($debugPrint){

    var_dump($dataLogFile);
}



//Log the data to your file using file_put_contents.
$myfile = fopen(BASE_URI . '/assets/scripts/newuser_log.log', "a");
fwrite($myfile, "\n New Log, at " . $current_date_sqltimestamp . "\n");
fwrite($myfile, $dataLogFile);
fclose($myfile);


                redirect_user(BASE_URL . '/pages/authentication/welcomeNewUser.php?signup_redirect=' . $signup_redirect);

                

                }





        }else{

            //failed to update user account
            //show error
            $log[] = "Can't update user account for $userid using key" . $data[$key];


        }


    }else{
        
        if ($explicit){?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <div class="container">
        <?php

                echo '<h4 class="mt-5">Oops!  You clicked an invalid Email Link.  We could not confirm your user account.</h4><p>This may be because of multiple clicks on the link.</p> <h4>No problem, we will get you logged in.</h4><br/> 
                Please go to <a href="' . BASE_URL . '/pages/authentication/recover.php">the forgot password page</a>.  Enter your email address to receieve a password reset link by mail.<br/><br/>If you were in the middle of activating a free link <b>you must click the link again from your email</b> once you have reset your password to receive the free course.  <br/><br/>You can always contact us if you are still having trouble (<a href="mailto:admin@gieqs.com">here</a>).  <br/><br/>Remember Internet Explorer is not supported on our site and you will not be able to login using this browser.';
                $log[] = "Invalid Key.  Please go to login and request a new account reset or contact us.  Can't open user account for $userid using key" . $data['key'];


    ?>
    </div>
<?php

            }


    }


    //log the user in


    
    }else{

        if ($debug){
            echo 'data array empty';
            $log[] = 'data array empty';

            }
    }

    $dataLogFile = implode(" - ", $log);

    //Add a newline onto the end.
    $dataLogFile .= PHP_EOL;

    if ($debug){

        var_dump($dataLogFile);
    }



    //Log the data to your file using file_put_contents.
    $myfile = fopen(BASE_URI . '/assets/scripts/newuser_log.log', "a");
    fwrite($myfile, "\n New Log, at " . $current_date_sqltimestamp . "\n");
    fwrite($myfile, $dataLogFile);
    fclose($myfile);