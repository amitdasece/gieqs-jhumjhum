<?php

 
//RESTART WHEN LIVE

define('BASE_URI', '/home/u8l2e829uoi9/public_html');

define('BASE_URL', '<?php echo BASE_URL;?>');

//TESTING KEYS


//define('BASE_URI', '/Applications/XAMPP/xamppfiles/htdocs/dashboard/gieqs');

//define('BASE_URL', 'localhost:90/dashboard/gieqs');


//LIVE KEYS


define('BASE_URI', $_SERVER['DOCUMENT_ROOT']);

define('BASE_URL', '<?php echo BASE_URL;?>');



$location = BASE_URL . '/index.php';

//require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$_SESSION['debug'] = TRUE;

require_once(BASE_URI . '/assets/scripts/classes/userFunctions.class.php');
$userFunctions = new userFunctions;

require_once(BASE_URI . '/assets/scripts/classes/users.class.php');
$users = new users;

/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(BASE_URI . '/assets/scripts/classes/general.class.php');
$general = new general;



require_once(BASE_URI . '/assets/scripts/classes/programme.class.php');
$programme = new programme;
require_once(BASE_URI . '/assets/scripts/classes/sessionView.class.php');
$sessionView = new sessionView;
require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;




//



require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;



require_once(BASE_URI . '/assets/scripts/classes/user_email.class.php');
$user_email = new user_email;

require_once(BASE_URI . '/assets/scripts/classes/userActivity.class.php');
$userActivity = new userActivity;

require_once BASE_URI . '/assets/scripts/classes/coin_grant.class.php';
$coin_grant = new coin_grant;
 */

spl_autoload_unregister ('class_loader');
//require_once BASE_URI .'/../scripts/config.php'; // KEY CODE TO REPLICATE

require_once BASE_URI . "/vendor/autoload.php";


//make an admin database
//add each userid as go through
//clean at end




//now checking

//check whether the subscribers are 

//open users list
//check they exist in mailing db
//if not add

//check that they are not unsubscribed in gieqs, if they are pass this to mailerlite
//check they are not unsubscribed in mailerlite if so pass this to gieqs

//check they are not bounced, if so remove from emailList


$client = new \GuzzleHttp\Client(['headers' => ['X-MailerLite-ApiKey' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI0IiwianRpIjoiNTE5NzY5YmU1ZjlkOGI1OTZmMTk5N2RiY2FlODU2NjhkYTQxZDVlYzhhNjUyMWU0YjU5OWM4ZDlkYTU5ZWIzZDI2NjkyMzZjNzIwODIzZmUiLCJpYXQiOjE2Njg0OTMwNDQuMjQ3NDA5LCJuYmYiOjE2Njg0OTMwNDQuMjQ3NDExLCJleHAiOjQ4MjQxNjY2NDQuMjQxODczLCJzdWIiOiIyMzkzMzIiLCJzY29wZXMiOltdfQ.OC8LqoMQ0n4kgp2xfeSbv62wwDRxBm4Mw3nL9e3cBgzVr5i49SDGzxiXNNKDaQ1oVcfxTrlnVm7wrHbcxryBx_aRl77GE3dbFoFsy4_VXtxlixIjS8GUufqZ-i0uWIXAcWSpbeYKG-IMDaeTaAYP4SfJFLdVIa8OOzjkWGTBYz0PP5Y-_sRx8iClF3BsoIZEQxsbLRLjgJh9wLeEeuO_aYxsxl8At9CATbyZMpAbLPm1BqE8vzSDMT1Rgz-2F720eGaeYl1Iao7ral1dO_Z11TnmxZp5EQVXkO48U4ToicEzhs1xhymUVmYjHHo3iRPK2vB9wfI4VafmBlzQqHKroIm-kWaXt5t0jBJRGGBUtxodijpHsUr6iM7yJAC0aNPiGt9-XDfV1yq4JEIth3nPOQv1PFe2v3X9kp8tXabeBf98YmzZLhBCnny02CnZRW2cxul3j7gl9fB6NNnUSPdmPypxmv3TTqIkPNRXYrAnjzHk7y45CL28bvUCinF5rR0mDt4uZ9mHSJXoymslQ7Wx3KeTNefsftKhbZad-IKbhtpV6phQ1llZX1MNQixM7dBThpkmsEmBC95r6Rj1Zhkv2-ThnlS9CIiE0RstiTYe5zVTA6RU6HDSjAom2IBI2ZHqwKIipxgoiDJ_35p9TFM_lZDFz3QAdJuOXFTMyyQGVv8']]);






$users_list = $userFunctions->getAllUsers();

shuffle($users_list);

var_dump($users_list);

//for each user load from key

$x=1;


foreach ($users_list as $key => $value) {
    
    if ($x>60){

        break;

    }

    //load them from database
    $users->Load_from_key($value);

    //check their mailing preferences
   // $users->getemailPreferences;
    //echo $users->getemailServices();

    $email_user = $users->getemail();

    //check the user exists in mailer lite

    try {
        $response = $client->request('GET', 'https://api.mailerlite.com/api/v2/subscribers/' . $email_user,);
        //user exists

        if ($response->getStatusCode() == 200){

            $response_body = $response->getBody()->read(40000);

            $response_array = json_decode($response_body);


        echo 'user ' . $users->getfirstname() . ' ' . $users->getsurname() . ' found';

        echo '<br/><br/>User type in Mailer lite is ' . $response_array->type;

        echo '<br/><br/>User GIEQs services setting is ' .  $users->getemailServices();


        $mailer_lite_value = null;
        $mailer_lite_value = $response_array->type;
        //unsubscribed //active

        //if mailerlite type and 
        if ($mailer_lite_value == 'active' && $users->getemailServices() == '1'){

            //echo values match do nothing

        }elseif ($mailer_lite_value == 'unsubscribed' && $users->getemailServices() == '1') {

            //change gieqs value

            $users->setemailServices('0');
            if ($users->prepareStatementPDOUpdate() > 0){

                echo 'user ' . $users->getfirstname() . ' ' . $users->getsurname() . ' updated in gieqs to unsubscribed';


            }


        }elseif ($mailer_lite_value == 'active' && $users->getemailServices() == '0') {

            //change mailer lite value

            $response = $client->request('PUT', 'https://api.mailerlite.com/api/v2/subscribers/' . $email_user, [
                'form_params' => [
                    'type' => 'unsubscribed',
                ]
            ]);
            
            if ($response->getStatusCode() == 200){

                echo 'user ' . $users->getfirstname() . ' ' . $users->getsurname() . ' set as inactive in mailerlite';


            } // 200

        }elseif ($mailer_lite_value == 'unsubscribed' && $users->getemailServices() == '0') {

            //do nothing

        }



        }

        //get mailerlite value

        //is mailer lite value like services?

        //if so do nothing, if not change
    
    } catch (\Throwable $th) {
    
        //if subscriber not found
        echo 'user ' . $users->getfirstname() . $users->getsurname() . ' not found';
        echo 'proceeding to add to mailerlite';

        //add to mailer lite if emailservices is positive
        //test HOW TO UPDATE A SUBSCRIBER

        $response = $client->request('POST', 'https://api.mailerlite.com/api/v2/subscribers', [
            'form_params' => [
                'email' => $users->getemail(),
                'fields' => [

                    'name' => $users->getfirstname(),
                    'last_name' => $users->getsurname(),

                ],
                
                
            
            ]
        ]);

        if ($response->getStatusCode() == 201){

            echo 'user created';

        }elseif ($response->getStatusCode() == 200){

            echo 'user updated';
        }else{

            echo 'user not created';
        }








    
    }

    echo '<br/><br/>';



    //if not add


    //if exists

    //if they agree check against their email with mailerlite

    //if they don't cancel
    
    # code...

    $x++;
}


//run this code every















//get a specific user

try {
    $response = $client->request('GET', 'https://api.mailerlite.com/api/v2/subscribers/djtate@gmail.com',);

} catch (\Throwable $th) {

    //if subscriber not found
    echo 'Subscriber not found';

}


if ($response->getStatusCode() == 200){
$response_body = $response->getBody()->read(40000);

$response_array = json_decode($response_body);
var_dump($response_array);

echo '<br/><br/>User type is ' . $response_array->type;

//get all users

echo $response->getStatusCode(); // 200
echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

}else{


}

//add a new user





/* $response = $client->request('GET', 'https://api.mailerlite.com/api/v2/subscribers',);

//get all users

echo $response->getStatusCode(); // 200
echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

//add a new user

 */
/* $response = $client->request('POST', 'https://api.mailerlite.com/api/v2/subscribers', [
    'form_params' => [
        'email' => 'test@test.com',
        'name' => 'test user',
    ]
]); */

//$response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');

/* echo $response->getStatusCode(); // 200
echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}' */






//update the subscription status of a specific user to unsubscribed

$response = $client->request('PUT', 'https://api.mailerlite.com/api/v2/subscribers/kristy.kleinig@sa.gov.au', [
    'form_params' => [
        'type' => 'unsubscribed',
    ]
]);

echo $response->getStatusCode(); // 200
echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'



//update the subscription status of a specific user to subscribed

$response = $client->request('PUT', 'https://api.mailerlite.com/api/v2/subscribers/kristy.kleinig@sa.gov.au', [
    'form_params' => [
        'type' => 'active',
    ]
]);

echo $response->getStatusCode(); // 200
echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'




//test HOW TO UPDATE A SUBSCRIBER

$response = $client->request('POST', 'https://api.mailerlite.com/api/v2/subscribers', [
    'form_params' => [
        'email' => 'hello@test-mailerlite.com',
        'fields' => [

            'name' => 'Hello',
            'last_name' => 'Mailer',

        ],
        
        
       
    ]
]);

echo $response->getStatusCode(); // 200
echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'



exit();


//delete a specific user





// Send an asynchronous request.
//$request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
/* $promise = $client->sendAsync($request)->then(function ($response) {
    echo 'I completed! ' . $response->getBody();
});
 */
//$promise->wait();

//http_response_code(200);
/* 

$data = implode(" - ", $dataToLog);

//Add a newline onto the end.
$data .= PHP_EOL;

if ($debugPrint){

    var_dump($dataToLog);
}

//The name of your log file.
//Modify this and add a full path if you want to log it in 
//a specific directory.
$pathToFile = 'mylogname.log';

//Log the data to your file using file_put_contents.
file_put_contents(BASE_URI . '/pages/learning/scripts/subscriptions/log.log', $data, FILE_APPEND);

 */