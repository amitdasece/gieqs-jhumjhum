<?php
error_reporting(E_ALL);
$openaccess = 1;
//$requiredUserLevel = 1;
			require ('../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

// Visit https://developers.google.com/gmail/api/quickstart/php
// for an example of how to build the getClient() function.
require (BASE_URI . '/vendor/autoload.php');

/* if (php_sapi_name() != 'cli') {
    throw new Exception('This application must be run on the command line.');
} */
function get_include_contents($filename, $variablesToMakeLocal) {
    extract($variablesToMakeLocal);
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}
/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Gmail API PHP Quickstart');
    define('SCOPES', implode(' ', array(
        Google_Service_Gmail::MAIL_GOOGLE_COM,
        Google_Service_Gmail::GMAIL_COMPOSE)
      ));  
    $client->setScopes(SCOPES);
    $client->setAuthConfig(BASE_URI . '/scripts/credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = BASE_URI . '/scripts/token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

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
        print_r($tokenPath);
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
}


// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Gmail($client);

// Print the labels in the user's account.
$user = 'me';
$results = $service->users_labels->listUsersLabels($user);

if (count($results->getLabels()) == 0) {
  print "No labels found.\n";
} else {
  print "Labels:\n";
  foreach ($results->getLabels() as $label) {
    printf("- %s\n", $label->getName());
  }
}

$client = getClient();

$service = new \Google_Service_Gmail($client);
$mailer = $service->users_messages;

function createMessage($sender, $to, $subject, $messageText) {
    $message = new Google_Service_Gmail_Message();
   
    $rawMessageString = "From: <{$sender}>\r\n";
    $rawMessageString .= "To: <{$to}>\r\n";
    $rawMessageString .= 'Subject: =?utf-8?B?' . base64_encode($subject) . "?=\r\n";
    $rawMessageString .= "MIME-Version: 1.0\r\n";
    $rawMessageString .= "Content-Type: text/html; charset=utf-8\r\n";
    $rawMessageString .= 'Content-Transfer-Encoding: base64' . "\r\n\r\n";
    $rawMessageString .= "{$messageText}\r\n";
   
    $rawMessage = strtr(base64_encode($rawMessageString), array('+' => '-', '/' => '_'));
    print_r($rawMessage);
    $message->setRaw($rawMessage);
    return $message;
   }

$sender = 'djtate@gmail.com';
$to = 'david.tate@uzgent.be';
$subject = 'hello david';

//$emailVaryarray['firstname'] = $firstname;
  //  $emailVaryarray['surname'] = $surname;
    $emailVaryarray['email'] = $to;
    $emailVaryarray['title'] = $subject;

    $filename = BASE_URI . '/assets/email/new_template/promo_mail_faculty_june.php'; 

//$messageText = 'whatever';

$messageText = get_include_contents($filename, $emailVaryarray);

$message = createMessage($sender, $to, $subject, $messageText);

print_r($message);

function createDraft($service, $user, $message) {
    $draft = new Google_Service_Gmail_Draft();
    $draft->setMessage($message);
   
    try {
      $draft = $service->users_drafts->create($user, $draft);
      print 'Draft ID: ' . $draft->getId();
    } catch (Exception $e) {
      print 'An error occurred: ' . $e->getMessage();
    }
   
    return $draft;
   }

createDraft($service, $user, $message);

/**
* @param $service Google_Service_Gmail an authorized Gmail API service instance.
* @param $userId string User's email address or "me"
* @param $message Google_Service_Gmail_Message
* @return null|Google_Service_Gmail_Message
*/
function sendMessage($service, $userId, $message) {
    try {
      $message = $service->users_messages->send($userId, $message);
      print 'Message with ID: ' . $message->getId() . ' sent.';
      return $message;
    } catch (Exception $e) {
      print 'An error occurred: ' . $e->getMessage();
    }
   
    return null;
   }

sendMessage($service, $user, $message);

?>