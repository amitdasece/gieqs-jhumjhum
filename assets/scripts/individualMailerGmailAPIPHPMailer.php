<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once (BASE_URI . '/vendor/autoload.php');

date_default_timezone_set('Europe/Brussels');


/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */

if(!function_exists("getClient")) {
  
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Gmail API PHP Quickstart');
    define('SCOPES', implode(' ', array(
        Google_Service_Gmail::MAIL_GOOGLE_COM,
        Google_Service_Gmail::GMAIL_COMPOSE)
      ));  
    $client->setScopes(SCOPES);
    // $crepath = BASE_URI . '/scripts/credentials.json';

    // require_once(BASE_URI . '/assets/scripts/classes/general.class.php');
    // $general = new general;  

    // $gtdetails= $general->getgoogleSecretDetails();


    // file_put_contents($crepath, $gtdetails);
    $client->setAuthConfig(BASE_URI . '/scripts/credentials.json');  
   
      
    // echo $gtdetails;
    // exit;  
// $dert[web] = [ 'web' =>[
//     'client_id' => $gtdetails['client_id'],
//     'project_id' => $gtdetails['project_id'],
//     'auth_uri' => $gtdetails['auth_uri'],
//     'token_uri' => $gtdetails['token_uri'],

// ]];
    //$credentiiil =  $gtdetails;

    //$client->setAuthConfig($credentiiil);
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
      //$tokenPath= $general->gettokennDetails();
     //echo $tokenPath;
     // echo json_decode($tokenPath);
      
    // exit();
    $tokenPath = BASE_URI . '/scripts/token.json';
    if (file_exists($tokenPath)) {
      $accessToken = json_decode(file_get_contents($tokenPath), true);
      $client->setAccessToken($accessToken);
  }

    //$accessToken = $tokenPath;
    //$client->setAccessToken($accessToken);


    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
      // Refresh the token if possible, else fetch a new one.
      if ($client->getRefreshToken()) {
          $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
      } else {
          // Request authorization from the user.
          $authUrl = $client->createAuthUrl();
          printf("Open the following link in your browser:\n%s\n", $authUrl);
          print 'Enter verification code: ';
          $authCode = trim(fgets(STDIN));

          // Exchange authorization code for an access token.
          $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
          $client->setAccessToken($accessToken);

          // Check to see if there was an error.
          if (array_key_exists('error', $accessToken)) {
              throw new Exception(join(', ', $accessToken));
          }
      }
      // Save the token to a file.
      //print_r($tokenPath);
      if (!file_exists(dirname($tokenPath))) {
          mkdir(dirname($tokenPath), 0700, true);
      }
      file_put_contents($tokenPath, json_encode($client->getAccessToken()));
  }
    return $client;
}
}

if(!function_exists("createDraft")) {

function createDraft($service, $user, $message) {
    $draft = new Google_Service_Gmail_Draft();
    $draft->setMessage($message);
   
    try {
      $draft = $service->users_drafts->create($user, $draft);
      //print 'Draft ID: ' . $draft->getId();
    } catch (Exception $e) {
      print 'An error occurred: ' . $e->getMessage();
    }
   
    return $draft;
   }

   /**
* @param $service Google_Service_Gmail an authorized Gmail API service instance.
* @param $userId string User's email address or "me"
* @param $message Google_Service_Gmail_Message
* @return null|Google_Service_Gmail_Message
*/
function sendMessage($service, $userId, $message) {
    try {
      $message = $service->users_messages->send($userId, $message);
      //print 'Message with ID: ' . $message->getId() . ' sent.';
      //print ' Please check your inbox. ';
      return $message;
    } catch (Exception $e) {
      print 'An error occurred: ' . $e->getMessage();
      print 'Mail could not be sent.  Please contact the system administrator';
      return false;
    }
   
    return null;
   }

}


// Get the API client and construct the service object.
//$client = getClient();
//$service = new Google_Service_Gmail($client);

// Print the labels in the user's account.
$user = 'me';
//$results = $service->users_labels->listUsersLabels($user);



$client = getClient();

$service = new \Google_Service_Gmail($client);
$mailer = $service->users_messages;

$message = new Google_Service_Gmail_Message();
$message->setRaw($mime);


createDraft($service, $user, $message);

sendMessage($service, $user, $message);

?>